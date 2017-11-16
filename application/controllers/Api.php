<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends LH_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	

	public function index()
	{
		redirect('Inicio','refresh');
	}

	public function referido($id_usuario = NULL)
	{
		$referido = $this->Auth_model->obtenerReferidoID($id_usuario);
		echo json_encode($referido);
	}

	public function c($cuenta = NULL)
	{
		if(!$this->Auth_model->estaConectado())
		{
			if($this->Auth_model->obtenerReferidoID($cuenta)['response'])
	        {
	            $this->session->set_userdata('ref',$cuenta);
	        }
	        
			redirect('' ,'refresh');
		}
		else
		{
			redirect('/dashboard' ,'refresh');
		}
	}

	public function admin_usuario($id_usuario)
	{
		$usuario = $this->Auth_model->obtenerUsuarioID($id_usuario);

		$array = array('response' => true, 'usuario' => $usuario['data']);

		echo json_encode($array);

	}

	public function coinbase_callback()
	{
		$this->load->library('Coinbase');

		$data = file_get_contents('php://input');
		$signature = $_SERVER['HTTP_CB_SIGNATURE'];

		$this->coinbase->callback($data,$signature);

	}

	public function verificar_pago($payment = NULL)
	{
		$this->load->library('Coinbase');
		$response = $this->coinbase->verifyPayment($payment);

		if($response || $response == 0)
		{
			echo response_good(FALSE,FALSE,array('amount_paid' => $response));
		}
		else
		{
			echo response_bad('Error al verificar');
		}

	}

	public function verificar_mensualidad()
	{
		$this->Academia_model->verificarMensualidad();
	}


	
}
