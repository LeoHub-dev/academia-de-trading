<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'coinpayments/coinpayments.inc.php';


class Coinpayments
{

    private $coinpayments_public_key;
    private $coinpayments_private_key;

    private $id_usuario;
    private $tipo;
    private $moneda;

    private $error;


    private $cps;


    public function setIdUsuario($id)
    {
        $this->id_usuario = $id;
    }

    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

	
    public function __construct()
    {
        // Call the CI_Model constructor
        $this->config->load('coinpayments_config');

        $this->coinpayments_public_key = $this->config->item('coinpayments_public_key');
        $this->coinpayments_private_key = $this->config->item('coinpayments_private_key');

        $this->cps = new CoinPaymentsAPI();
        $this->cps->Setup($this->coinpayments_private_key, $this->coinpayments_public_key);

    }

    public function obtenerMonedas()
    {
        return $this->cps->GetRates();
    }

    public function obtenerInvoice()
    {
        $this->db->where('id_usuario',$this->id_usuario);
        $this->db->where('tipo',$this->tipo);
        $this->db->where('estado',0);

        $coinpayments = $this->db->get('coinpayments_invoice');

        if($coinpayments->num_rows() > 0)
        {
            foreach ($coinpayments->result() as $info)
            {
                return $info;
            }
        }
        else
        {
            
            $coinpayments_invoice = array(
               'id_usuario' => $this->id_usuario,
               'tipo' => $this->tipo
            );

            $this->db->insert('coinpayments_invoice', $coinpayments_invoice); 

            return (object) ($coinpayments_invoice + array('id_invoice' => $this->db->insert_id()));
            
        }
    }

    public function createCoinpaymentsAddress($name = "Pago Academia",$id_invoice)
    {

        $usuario = $this->Auth_model->obtenerUsuarioID($this->id_usuario)['data'];

        

        if($this->tipo == 1)
        {
            if($usuario->tipo == 0)
            {

                $req = array(
                    'amount' => 20.00,
                    'currency1' => 'USD',
                    'currency2' => $this->moneda,
                    'address' => '', // send to address in the Coin Acceptance Settings page
                    'item_name' => $name,
                    'invoice' => $id_invoice,
                    'ipn_url' => site_url('api/coinpaymentscallback'),
                );
            }
            else
            {
                $req = array(
                    'amount' => 40.00,
                    'currency1' => 'USD',
                    'currency2' => $this->moneda,
                    'address' => '', // send to address in the Coin Acceptance Settings page
                    'item_name' => $name,
                    'invoice' => $id_invoice,
                    'ipn_url' => site_url('api/coinpaymentscallback'),
                );
            }
        }
        else if($this->tipo == 2)
        {
            $req = array(
                'amount' => 250.00,
                'currency1' => 'USD',
                'currency2' => $this->moneda,
                'address' => '', // send to address in the Coin Acceptance Settings page
                'item_name' => $name,
                'invoice' => $id_invoice,
                'ipn_url' => site_url('api/coinpaymentscallback'),
            );
        }


        $result = $this->cps->CreateTransaction($req);

        if ($result['error'] == 'ok') 
        {
            return $result['result'];
        }
        else 
        {
            $this->error = $result['error'];
            return FALSE;
        }

       
    }

    public function coinpaymentsAddress()
    {
        $invoice = $this->obtenerInvoice();

        $id_invoice = $invoice->id_invoice;

        $this->db->where('id_invoice',$id_invoice);
        $this->db->where('moneda',$this->moneda);

        $coinpayment_address = $this->db->get('coinpayments_address');

        if($coinpayment_address->num_rows() == 0)
        {
            $coinpayment_invoice_data = $this->createCoinpaymentsAddress('Invoice numero '.$id_invoice,$id_invoice);

            $coinpayment_invoice = array(
               'id_invoice' => $id_invoice,
               'moneda' => $this->moneda,
               'txn_id' => $coinpayment_invoice_data['txn_id'],
               'tiempo' => $coinpayment_invoice_data['timeout'],
               'address' => $coinpayment_invoice_data['address'],
               'status_url' => $coinpayment_invoice_data['status_url'],
               'qrcode_url' => $coinpayment_invoice_data['qrcode_url'],
               'total_a_pagar' => $coinpayment_invoice_data['amount'],
               'coinpayments_address_datetime' => date('Y-m-d H:i:s')
            );
            
            $query = $this->db->insert('coinpayments_address',$coinpayment_invoice); 

            return (object)  $coinpayment_invoice;
        }
        else
        {
            foreach ($coinpayment_address->result() as $row)
            {
                return $row;
            }
        }
        return FALSE;
    }

    public function errorAndDie($error_msg,$cp_debug_email,$post) 
    { 
        if (!empty($cp_debug_email)) { 
            $report = 'Error: '.$error_msg."\n\n"; 
            $report .= "POST Data\n\n"; 
            foreach ($post as $k => $v) { 
                $report .= "|$k| = |$v|\n"; 
            } 
            mail($cp_debug_email, 'CoinPayments IPN Error', $report); 
        } 
        $coinpayment_invoice = array(
           'moneda' => $_SERVER['REMOTE_ADDR'],
           'address' => $error_msg,
           'monto' => 0,
           'id_invoice' => 0
        );
    
        
        $query = $this->db->insert('coinpayments_payments',$coinpayment_invoice); 
        die('IPN Error: '.$error_msg); 
    } 


    public function coinpaymentsCallBack()
    {
         // Fill these in with the information from your CoinPayments.net account. 
        $cp_merchant_id = '6596e32a346c9c758841da83a2d152e3'; 
        $cp_ipn_secret = '@SnakeMadreMiaWilly'; 
        $cp_debug_email = 'jimenezleonardop@gmail.com'; 

        $request = file_get_contents('php://input'); 
         
        if (!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac') { 
            $this->errorAndDie('IPN Mode is not HMAC',$cp_debug_email,$_POST); 
        } 
         
        if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) { 
            $this->errorAndDie('No HMAC signature sent.',$cp_debug_email,$_POST); 
        } 
         
        
        if ($request === FALSE || empty($request)) { 
            $this->errorAndDie('Error reading POST data',$cp_debug_email,$_POST); 
        } 
         
        if (!isset($_POST['merchant']) || $_POST['merchant'] != trim($cp_merchant_id)) { 
            $this->errorAndDie('No or incorrect Merchant ID passed',$cp_debug_email,$_POST); 
        } 
             
        $hmac = hash_hmac("sha512", $request, trim($cp_ipn_secret)); 
        if ($hmac != $_SERVER['HTTP_HMAC']) { 
            $this->errorAndDie('HMAC signature does not match',$cp_debug_email,$_POST); 
        } 
         
        // HMAC Signature verified at this point, load some variables. 

        $txn_id = $_POST['txn_id']; 
        $item_name = $_POST['item_name']; 
        $item_number = $_POST['item_number']; 
        $amount1 = floatval($_POST['amount1']); 
        $amount2 = floatval($_POST['amount2']); 
        $currency1 = $_POST['currency1']; 
        $currency2 = $_POST['currency2']; 
        $status = intval($_POST['status']); 
        $status_text = $_POST['status_text']; 
        $id_invoice = intval($_POST['invoice']);

        //depending on the API of your system, you may want to check and see if the transaction ID $txn_id has already been handled before at this point 
        $this->db->where('coinpayments_address.id_invoice',$_POST['invoice']);
        $this->db->where('coinpayments_address.moneda',$_POST['currency2']);

        $this->db->join('coinpayments_address', 'coinpayments_address.id_invoice = coinpayments_invoice.id_invoice', 'left');
        $coinpayments = $this->db->get('coinpayments_invoice');

        $data_invoice = NULL;

        if($coinpayments->num_rows() > 0)
        {
            foreach ($coinpayments->result() as $info)
            {
                $data_invoice = $info;
            }
        }
        else
        {
            
            $this->errorAndDie('No invoice exist',$cp_debug_email,$_POST); 
            
        }

        // Check the original currency to make sure the buyer didn't change it. 
        /*if ($currency2 != $data_invoice->moneda) { 
            errorAndDie('Original currency mismatch!'); 
        }  
        // Check amount against order total 
        if ($amount1 < $data_invoice->total_a_pagar) { 
            //errorAndDie('Amount is less than order total!'); 

        } */

        $coinpayment_invoice = array(
           'moneda' => $data_invoice->moneda,
           'address' => $data_invoice->address,
           'monto' => $amount2,
           'id_invoice' => $data_invoice->id_invoice
        );
    
        
        $query = $this->db->insert('coinpayments_payments',$coinpayment_invoice); 
       
        if ($status >= 100 || $status == 2) { 

            //
            $this->verifyPayment($data_invoice->address);
            

        } else if ($status < 0) { 
            //payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent 
        } else { 
            //payment is pending, you can optionally add a note to the order page 
        } 
        die('IPN OK'); 
    }

    public function verifyPayment($address)
    {

        $this->db->where('coinpayments_address.address',$address);

        $this->db->join('coinpayments_address', 'coinpayments_address.id_invoice = coinpayments_invoice.id_invoice', 'left');
        $coinpayments = $this->db->get('coinpayments_invoice');

        $invoice_data = NULL;

        if($coinpayments->num_rows() > 0)
        {
            foreach ($coinpayments->result() as $info)
            {
                $invoice_data = $info;
            }
        }

        if(!$invoice_data)
        {
            return FALSE;
        }


        $this->db->where('address',$address);

        $coinpayments = $this->db->get('coinpayments_payments');

        $pagado = 0;
        $invoice_id = NULL;

        if($coinpayments->num_rows() > 0)
        {
            foreach ($coinpayments->result() as $info)
            {
                $pagado = $pagado + $info->monto;
            }
        }



        if(floatval($invoice_data->total_a_pagar) <= floatval($pagado))
        {
            if($invoice_data->estado == 0)
            {
                if($invoice_data->tipo == 1)
                {

                    $this->db->where('id_invoice', $invoice_data->id_invoice);
                    $query_activeuser = $this->db->update('coinpayments_invoice', array('estado' => 1));

                    $this->Auth_model->activarUsuario($invoice_data->id_usuario);
                    $this->Academia_model->marcarPagadoFactura($invoice_data->id_usuario);
                    $this->Academia_model->verificarMensualidad();
                }
                else if($invoice_data->tipo == 2)
                {
                    $this->db->where('id_invoice', $invoice_data->id_invoice);
                    $query_activeuser = $this->db->update('coinpayments_invoice', array('estado' => 1));

                    $this->Auth_model->vipUsuario($invoice_data->id_usuario);
                }


            }

            return $pagado;
        }

        return $pagado;
        
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }

}
?>