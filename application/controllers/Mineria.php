<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mineria extends LH_Controller {

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
		if($this->scope['info_usuario']['data']->mineria == 0)
		{
			$this->scope['titulo'] = "Cuenta en mineria";

			$this->scope['cuenta_mineria'] = $this->Matriz_model->obtenerCuentaMineria($this->scope['info_usuario']['data']->id_usuario);
			$this->load->view('Mineria_view',$this->scope);
		}
		else
		{
			redirect('/dashboard' ,'refresh');
		}
		
	}



}
