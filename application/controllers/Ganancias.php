<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ganancias extends LH_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->Auth_model->estaConectado())
		{
			redirect('/auth' ,'refresh');
		}
		else
		{
			if(!$this->Auth_model->estaPago())
        	{
        		redirect('/pago' ,'refresh');
        	}
		}
	}

	public function index()
	{
		$this->scope['titulo'] = "Ganancias";
		$this->scope['lista_ganancias'] = $this->Academia_model->listaGanancias($this->scope['info_usuario']['data']->id_usuario);
		$this->scope['lista_old_matriz'] = $this->Matriz_model->obtenerMatrizCompletas($this->scope['info_usuario']['data']->id_usuario);
		$this->scope['lista_ganancias_paquete'] = $this->Academia_model->pagoConfirmados($this->session->userdata('id_usuario'));
		$this->load->view('Ganancias_view',$this->scope);
	}
}
