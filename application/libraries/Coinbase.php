<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'vendor/autoload.php';

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\HttpClient;
use Coinbase\Wallet\Mapper;
use Coinbase\Wallet\Resource\Account;
use Coinbase\Wallet\Resource\Address;
use Psr\Http\Message\ResponseInterface;

class Coinbase
{

    /** @var \PHPUnit_Framework_MockObject_MockObject|HttpClient */
    private $http;

    /** @var \PHPUnit_Framework_MockObject_MockObject|Mapper */
    private $mapper;

    /** @var Client */
    private $client;

    /** @var Client */
    private $account;

    private $id_user;
    private $cuenta;
    private $tipo;
    private $moneda;

    private $cb;

    private $coinbase_secret;
    private $coinbase_apikey;

    public function setCB($n)
    {
        $this->cb = $n;
    }

    public function setIdUser($id)
    {
        $this->id_user = $id;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;
    }

	
    public function __construct($params = array())
    {
        // Call the CI_Model constructor
        $this->config->load('coinbase_config');


        $this->cb = 0;

        $this->coinbase_secret = $this->config->item('coinbase_secret');
        $this->coinbase_apikey = $this->config->item('coinbase_apikey');

        $configuration = Configuration::apiKey($this->coinbase_apikey[$this->cb], $this->coinbase_secret[$this->cb]);

        $this->client = Client::create($configuration);

        try {



            foreach(@$this->client->getAccounts() as $account) :

                if($account->getCurrency() == $params['moneda']):
                    $this->account = $this->client->getAccount($account->getId());
                  
                endif;

            endforeach;

        
        } catch (Exception $e) {
            echo $e;
        }

        
        //$this->mapper = $this->getMock(Mapper::class);

        
    }

    public function usdToBtc($usd = 0)
    {

        $data = $this->client->getExchangeRates('USD');
        return $data['rates'][$this->moneda] * $usd;
        
    }


    public function createCoinBaseInvoice()
    {

        $factura = $this->Academia_model->obtenerFactura($this->id_user);
        $usuario = $this->Auth_model->obtenerUsuarioID($this->id_user)['data'];

        if($this->tipo == 1)
        {
            if($usuario->tipo == 0)
            {
                $coinbase_invoice = array(
                    'id_user' => $this->id_user,
                    'tipo' => $this->tipo,
                    'total_to_pay' => $this->usdToBtc(44),
                    'usd' => 44,
                    'moneda' => $this->moneda,
                    'id_factura' => $factura->id_factura
                );
            }
            else if($usuario->tipo == 1)
            {
                $coinbase_invoice = array(
                    'id_user' => $this->id_user,
                    'tipo' => $this->tipo,
                    'total_to_pay' => $this->usdToBtc(44),
                    'usd' => 44,
                    'moneda' => $this->moneda,
                    'id_factura' => $factura->id_factura
                );
            }
            else if($usuario->tipo == 3)
            {
                $coinbase_invoice = array(
                    'id_user' => $this->id_user,
                    'tipo' => $this->tipo,
                    'total_to_pay' => $this->usdToBtc(44),
                    'usd' => 44,
                    'moneda' => $this->moneda,
                    'id_factura' => $factura->id_factura
                );
            }
            else
            {
                $this->error = "No posees Matriz 1 por 2";
                return FALSE;
            }

            
            
        }
        else if($this->tipo == 2  || $this->tipo == 3)
        {
            $coinbase_invoice = array(
               'id_user' => $this->id_user,
               'tipo' => $this->tipo,
               'total_to_pay' => $this->usdToBtc(260),
               'usd' => 260,
               'moneda' => $this->moneda,
               'id_factura' => $factura->id_factura
            );

        }
        else if($this->tipo == 4)
        {
            $coinbase_invoice = array(
               'id_user' => $this->id_user,
               'tipo' => $this->tipo,
               'usd' => 300,
               'moneda' => $this->moneda,
               'total_to_pay' => $this->usdToBtc(300),
               'id_factura' => $factura->id_factura
            );

        }
        else if($this->tipo == 5)
        {
            $coinbase_invoice = array(
               'id_user' => $this->id_user,
               'tipo' => $this->tipo,
               'usd' => 1500,
               'moneda' => $this->moneda,
               'total_to_pay' => $this->usdToBtc(1500),
               'id_factura' => NULL
            );
        }
        else if($this->tipo == 6)
        {
            $coinbase_invoice = array(
                'id_user' => $this->id_user,
                'tipo' => $this->tipo,
                'usd' => 497,
                'moneda' => $this->moneda,
                'total_to_pay' => $this->usdToBtc(497),
                'id_factura' => NULL
            );
        }
        else if($this->tipo == 7)
        {
            $coinbase_invoice = array(
                'id_user' => $this->id_user,
                'tipo' => $this->tipo,
                'usd' => 2000,
                'moneda' => $this->moneda,
                'total_to_pay' => $this->usdToBtc(2000),
                'id_factura' => NULL
            );
        }

        $coinbase_invoice_search = array(
            'id_user' => $this->id_user,
            'tipo' => $this->tipo,
            'moneda' => $this->moneda,
            'id_factura' => $factura->id_factura
        );


        $this->db->where($coinbase_invoice);

        $coinbase_address = $this->db->get('coinbase_invoice');

        if($coinbase_address->num_rows() > 0)
        {
            foreach($coinbase_address->result() as $invoice)
            {
                return $invoice;
            }
        }
        else
        {
            $this->db->insert('coinbase_invoice', $coinbase_invoice); 

            return ($coinbase_invoice + array('id_invoice' => $this->db->insert_id()));
        }

    }

    public function coinBaseAddress()
    {

        $invoice = (object) $this->createCoinBaseInvoice();

        $this->db->where('id_invoice',$invoice->id_invoice);

        $coinbase_address = $this->db->get('coinbase_address');

        if($coinbase_address->num_rows() == 0)
        {
            $coinbase_invoice_address = $this->createCoinbaseAddress('Web 3por2 Invoice numero '.$invoice->id_invoice);

            $coinbase_invoice = array(
               'id_invoice' => $invoice->id_invoice,
               'address' => $coinbase_invoice_address,
               'coinbase_address_datetime' => date('Y-m-d H:i:s')
            );
            
            $query = $this->db->insert('coinbase_address',$coinbase_invoice); 

            $coinbase_invoice = $coinbase_invoice + array('total_a_pagar' => $invoice->total_to_pay);

            return (object) $coinbase_invoice;
        }
        else
        {
            foreach ($coinbase_address->result() as $row)
            {
                $data = array(
                'id_invoice' => $row->id_invoice,
                'address'=> $row->address
                );

                $data = $data + array('total_a_pagar' => $invoice->total_to_pay);

                return (object) $data;
            }
        }
        return FALSE;
    }

    public function createCoinbaseAddress($name = NULL)
    {

        $address = new Address([
            'name' => $name
        ]);

        $address_info = $this->client->createAccountAddress($this->account, $address);

        if($address_info)
        {
            return $address_info->getAddress();
        }
        else
        {
            return FALSE;
        }
    }

    
    public function callback($data,$signature)
    {
        if($this->client->verifyCallback($data, $signature))
        {
            $info = json_decode($data);
            $invoice_data = FALSE;

            $this->db->select('*');
            $this->db->where('coinbase_address.address',$info->data->address);
            $this->db->from('coinbase_invoice');
            $this->db->join('coinbase_address', 'coinbase_invoice.id_invoice = coinbase_address.id_invoice', 'left');

            $query_coinbase = $this->db->get();

            if($query_coinbase->num_rows() > 0)
            {
                foreach ($query_coinbase->result() as $coinbase_invoice)
                {
                    $invoice_data = $coinbase_invoice;
                }
            }

            if(!$invoice_data)
            {
                return FALSE;
            }

            $this->db->select('*');
            $this->db->where('coinbase_payments.address',$info->data->address);
            $this->db->from('coinbase_payments');

            $query_payments = $this->db->get();

            $total_paid = 0;

            if($query_payments->num_rows() > 0)
            {
                foreach ($query_payments->result() as $payments)
                {
                    $total_paid = $total_paid + $payments->amount;
                }
            }

            $total_paid = floatval($info->additional_data->amount->amount) + $total_paid;

            if((floatval($invoice_data->total_to_pay)) <= floatval($total_paid))
            {
                if($invoice_data->status == 0)
                {

                    /*if($invoice_data->tipo == 1)
                    {
                        $this->db->where('id_invoice', $invoice_data->id_invoice);
                        $query_activeuser = $this->db->update('coinbase_invoice', array('status' => 1));
                        //AgregarCuentaAlSistema
                        $this->Auth_model->activarUsuario($invoice_data->id_user);
                        $this->Academia_model->marcarPagadoFactura($invoice_data->id_user);
                        $this->Academia_model->verificarMensualidad();
                    }
                    else if($invoice_data->tipo == 2)
                    {
                        $this->db->where('id_invoice', $invoice_data->id_invoice);
                        $query_activeuser = $this->db->update('coinbase_invoice', array('status' => 1));

                        $this->Auth_model->vipUsuario($invoice_data->id_user);
                    }*/

                    $usuario = $this->Auth_model->obtenerUsuarioID($invoice_data->id_user)['data'];

                    $this->db->where('id_invoice', $invoice_data->id_invoice);
                    $query_activeuser = $this->db->update('coinbase_invoice', array('status' => 1));


                    if($invoice_data->tipo == 1)
                    {
                        

                       
                        $this->Auth_model->activarUsuario($invoice_data->id_user);
                        $this->Academia_model->marcarPagadoFactura($invoice_data->id_user);
                        $this->Academia_model->verificarMensualidad();

                        if($usuario->tipo == 3)
                        {
                            //Se integra en los circulos
                            if($this->Matriz_model->obtenerCirculoActivo($usuario->id_usuario) == NULL)
                            {
                                $this->Matriz_model->agregarCuentaCirculo($invoice_data->id_user);
                            }

                            $this->Auth_model->activarUsuario($invoice_data->id_user);
                            $this->Academia_model->marcarPagadoFactura($invoice_data->id_user);
                            
                        }
                            
                    }
                    else if($invoice_data->tipo == 3)
                    {


                        $this->Auth_model->matrizUsuario($invoice_data->id_user);
                        //Agrego a la Matriz
                        $this->Matriz_model->agregarCuentaMatriz($invoice_data->id_user);

                        $this->Auth_model->activarUsuario($invoice_data->id_user);

                        
                    }
                    else if($invoice_data->tipo == 4)
                    {


                        $this->Auth_model->matrizUsuario($invoice_data->id_user);
                        //Agrego a la Matriz
                        //Agrego a los Circulos
                        $this->Matriz_model->agregarCuentaMatriz($invoice_data->id_user);
                        $this->Matriz_model->agregarCuentaCirculo($invoice_data->id_user);
                        $this->Auth_model->activarUsuario($invoice_data->id_user);
                        
                    }

                }
                
                
            }

            $coinbase_invoice = array(
               'name' => $info->data->name,
               'address' => $info->data->address,
               'id_notification' => $info->id,
               'id_transaction' => $info->additional_data->transaction->id,
               'hash_transaction' => $info->additional_data->hash,
               'amount' => $info->additional_data->amount->amount
            );
        
            
            $query = $this->db->insert('coinbase_payments',$coinbase_invoice); 

        }

        
    }

    public function verifyPayment($address)
    {
        
        $this->db->select('*');
        $this->db->where('coinbase_address.address',$address);
        $this->db->where('coinbase_invoice.status',0);
        $this->db->from('coinbase_invoice');
        $this->db->join('coinbase_address', 'coinbase_invoice.id_invoice = coinbase_address.id_invoice', 'left');

        $query_coinbase = $this->db->get();

        $invoice_data = FALSE;

        if($query_coinbase->num_rows() > 0)
        {
            foreach ($query_coinbase->result() as $coinbase_invoice)
            {
                $invoice_data = $coinbase_invoice;
            }
        }

        if(!$invoice_data)
        {
            return FALSE;
        }

        $this->db->select('*');
        $this->db->where('coinbase_payments.address',$address);
        $this->db->from('coinbase_payments');

        $query_payments = $this->db->get();

        $total_paid = 0;

        if($query_payments->num_rows() > 0)
        {
            foreach ($query_payments->result() as $payments)
            {
                $total_paid = $total_paid + $payments->amount;
            }
        }

        if((floatval($invoice_data->total_to_pay)) <= floatval($total_paid))
        {

            if($invoice_data->status == 0)
            {

                /*if($invoice_data->tipo == 1)
                {
                    $this->db->where('id_invoice', $invoice_data->id_invoice);
                    $query_activeuser = $this->db->update('coinbase_invoice', array('status' => 1));
                    //AgregarCuentaAlSistema
                    $this->Auth_model->activarUsuario($invoice_data->id_user);
                    $this->Academia_model->marcarPagadoFactura($invoice_data->id_user);
                    $this->Academia_model->verificarMensualidad();
                }
                else if($invoice_data->tipo == 2)
                {
                    $this->db->where('id_invoice', $invoice_data->id_invoice);
                    $query_activeuser = $this->db->update('coinbase_invoice', array('status' => 1));

                    $this->Auth_model->vipUsuario($invoice_data->id_user);
                }*/

                $usuario = $this->Auth_model->obtenerUsuarioID($invoice_data->id_user)['data'];

                $this->db->where('id_invoice', $invoice_data->id_invoice);
                $query_activeuser = $this->db->update('coinbase_invoice', array('status' => 1));


                if($invoice_data->tipo == 1)
                {
                    

                   
                    $this->Auth_model->activarUsuario($invoice_data->id_user);
                    $this->Academia_model->marcarPagadoFactura($invoice_data->id_user);
                    $this->Academia_model->verificarMensualidad();

                    if($usuario->tipo == 3)
                    {
                        //Se integra en los circulos
                        if($this->Matriz_model->obtenerCirculoActivo($usuario->id_usuario) == NULL)
                        {
                            $this->Matriz_model->agregarCuentaCirculo($invoice_data->id_user);
                        }

                        $this->Auth_model->activarUsuario($invoice_data->id_user);
                        $this->Academia_model->marcarPagadoFactura($invoice_data->id_user);
                        
                    }
                        
                }
                else if($invoice_data->tipo == 3)
                {


                    $this->Auth_model->matrizUsuario($invoice_data->id_user);
                    //Agrego a la Matriz
                    $this->Matriz_model->agregarCuentaMatriz($invoice_data->id_user);

                    $this->Auth_model->activarUsuario($invoice_data->id_user);

                    
                }
                else if($invoice_data->tipo == 4)
                {


                    $this->Auth_model->matrizUsuario($invoice_data->id_user);
                    //Agrego a la Matriz
                    //Agrego a los Circulos
                    $this->Matriz_model->agregarCuentaMatriz($invoice_data->id_user);
                    $this->Matriz_model->agregarCuentaCirculo($invoice_data->id_user);
                    $this->Auth_model->activarUsuario($invoice_data->id_user);
                    
                }

            }


            return $total_paid;
        }

        return $total_paid;
        
    }

    public function verifyNotifications()
    {
        $notifications_list = $this->getNotificationsList();
        foreach ($notifications_list as $notification) 
        {
            $this->db->select('*');
            $this->db->where('coinbase_payments.id_notification',$notification->getId());
            $this->db->from('coinbase_payments');

            $query_payments = $this->db->get();

            if($query_payments->num_rows() > 0)
            {
                foreach ($query_payments->result() as $payments)
                {
                }
            }
            else
            {
                $coinbase_invoice = array(
                   'name' => $notification->getData()->getName(),
                   'address' => $notification->getData()->getAddress(),
                   'id_notification' => $notification->getId(),
                   'id_transaction' => $notification->getAdditionalData()['transaction']['id'],
                   'hash_transaction' => $notification->getAdditionalData()['hash'],
                   'amount' => $notification->getAdditionalData()['amount']['amount']
                );
            
                
                $query = $this->db->insert('coinbase_payments',$coinbase_invoice); 

            }
        }
    }

    public function verifyAllPayments()
    {
        $this->db->select('*');
        $this->db->from('coinbase_invoice');
        $this->db->join('coinbase_address', 'coinbase_invoice.id_invoice = coinbase_address.id_invoice', 'left');

        $query_coinbase = $this->db->get();

        if($query_coinbase->num_rows() > 0)
        {
            foreach ($query_coinbase->result() as $invoice_data)
            {

                $this->db->select('*');
                $this->db->where('coinbase_payments.address',$invoice_data->address);
                $this->db->from('coinbase_payments');

                $query_payments = $this->db->get();

                $total_paid = 0;

                if($query_payments->num_rows() > 0)
                {
                    foreach ($query_payments->result() as $payments)
                    {
                        $total_paid = $total_paid + floatval($payments->amount);
                    }
                }


                if(floatval($invoice_data->total_to_pay) <= floatval($total_paid))
                {
                    
                    
                }
            }
        }
    }

    public function getNotificationsList()
    {

        $list_notifications = $this->client->getNotifications();

        return $list_notifications;
    }

    public function getNotification($id)
    {
        $notification = $this->client->getNotification($id);

        return $notification;
    }

    

    public function __get($var)
    {
        return get_instance()->$var;
    }

}
?>