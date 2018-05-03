<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planes extends LH_Controller {

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
		
		$this->scope['titulo'] = "Compra un plan";

		$this->scope['saldo'] = $this->Saldo_model->obtenerSaldo($this->session->userdata('id_usuario'));
		
		$this->load->view('Planes_view',$this->scope);
		

	}

	public function comprar_paquete($paquete = NULL)
	{
		if($this->Academia_model->comprarPaquete($paquete))
		{
			$this->session->set_flashdata('resultado', TRUE);
			$this->session->set_flashdata('respuesta', 'Paquete comprado correctamente');
            redirect('planes', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('resultado', FALSE);
			$this->session->set_flashdata('respuesta', 'Saldo insuficiente o el Paquete no existe');
            redirect('planes', 'refresh');
		}
	}




	


	



	
}
