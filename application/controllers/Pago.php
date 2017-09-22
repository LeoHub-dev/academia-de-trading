<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pago extends LH_Controller {

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

	public function __construct()
    {
    	parent::__construct();

    	if($this->Auth_model->estaConectado())
        {
        	if($this->Auth_model->estaPago())
    		{
        		redirect('/dashboard' ,'refresh');
        	}
        	else
        	{
        		//
        	}
        }
        else
        {
        	redirect('/auth' ,'refresh');
        }
    }

	public function index()
	{
		if(!$this->Auth_model->estaPago())
    	{
			$this->scope['titulo'] = "Paga tu inicial";
			$this->load->view('Pago_view',$this->scope);
		}
		else
		{
			redirect('/dashboard' ,'refresh');
		}

	}


	public function get_coinbase_hash()
	{
		if($this->Auth_model->estaConectado())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{

				$this->load->library('Coinbase');

				$this->coinbase->setIdUser($this->session->userdata('id_usuario'));

				$payment_info_address = $this->coinbase->coinBaseAddress();


				echo response_good(FALSE,FALSE,array('data' => $payment_info_address, 'payment_amount' => $payment_info_address->total_a_pagar));
				
			}
		}
	}


	


	



	
}
