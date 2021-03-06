<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pago extends LH_Controller {

	public function __construct()
    {
    	parent::__construct();

    	if($this->Auth_model->estaConectado())
        {
        	$this->load->library('Coinpayments');
        }
        else
        {
        	redirect('/auth' ,'refresh');
        }
    }

	public function index()
	{
		/*if($this->scope['info_usuario']['data']->tipo != 1)
    	{
			$this->scope['titulo'] = "En mantenimiento";
			$this->scope['mensaje'] = "El area de pagos actualmente esta en mantenimiento, para agregar mas metodos de pagos (mas altcoins)<br>Puede realizar el pago de los 20$ o 250$ a esta direccion : 1MmywEQD867NaU9unAffygXpeEosHpkqfa (Solo BTC) <br> Al realizar el pago contactar en el grupo de telegram con Sugey o Leonardo para la activacion de su cuenta.<br> <br> ";
			$this->load->view('Error_view',$this->scope);
		/*}
		else
		{*/
			$this->scope['saldo'] = $this->Saldo_model->obtenerSaldo($this->session->userdata('id_usuario'));
			$this->scope['titulo'] = "Recarga Saldo en tu cuenta";
			//$this->scope['lista_monedas'] = $this->coinpayments->obtenerMonedas();
			$this->load->view('Pago_view',$this->scope);
		/*}*/

	}

	public function multinivel()
	{
		if($this->Matriz_model->obtenerMatrizActiva($this->session->userdata('id_usuario')) != NULL)
		{
			redirect('/dashboard' ,'refresh');
		}
		$this->scope['titulo'] = "Paga tu inicial";
		//$this->scope['lista_monedas'] = $this->coinpayments->obtenerMonedas();
		$this->load->view('Pago_Multinivel_view',$this->scope);
	}


	public function get_coinbase_hash()
	{
		if($this->Auth_model->estaConectado())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				$this->load->library('Coinbase',array('moneda' => $this->input->post('moneda')));

				$this->coinbase->setIdUser($this->session->userdata('id_usuario'));
				$this->coinbase->setTipo($this->input->post('tipo'));
				$this->coinbase->setMoneda($this->input->post('moneda'));

				$payment_info_address = $this->coinbase->coinBaseAddress();

				echo response_good(FALSE,FALSE,array('data' => $payment_info_address, 'payment_amount' => $payment_info_address->total_a_pagar));
				
			}
		}
	}

	public function get_coinpayments_hash()
	{
		if($this->Auth_model->estaConectado())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				$this->load->library('Coinpayments');

				$this->coinpayments->setIdUsuario($this->session->userdata('id_usuario'));
				$this->coinpayments->setTipo($this->input->post('tipo'));
				$this->coinpayments->setMoneda($this->input->post('moneda'));

				$payment_info_address = $this->coinpayments->coinpaymentsAddress();

				echo response_good(FALSE,FALSE,array('data' => $payment_info_address, 'payment_amount' => $payment_info_address->total_a_pagar));
				
			}
		}
	}

	public function guardar_pago()
	{
		if($this->Auth_model->estaConectado())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{

				if($this->Academia_model->agregarPago($this->session->userdata('id_usuario'), $this->input->post('hash_id')))
				{
					echo response_good('Pago informado','La activación puede demorar hasta 6 horas');
				}
			}
		}

	}


	


	



	
}
