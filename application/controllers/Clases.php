<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clases extends LH_Controller {

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

		$this->scope['titulo'] = "Clases";
		
		$this->load->view('Clases_view',$this->scope);
		
	}

	public function vip()
	{
		if($this->scope['info_usuario']['data']->tipo == 2 || $this->scope['info_usuario']['data']->tipo == 1 || $this->Matriz_model->obtenerMatrizActiva($this->scope['info_usuario']['data']->id_usuario) != NULL)
		{
			$this->scope['titulo'] = "Clases Vip";
		
			$this->load->view('Clases_Vip_view',$this->scope);
		}
		else
		{
			redirect('/dashboard' ,'refresh');
		}
		
	}

	public function inversionistas()
	{
		if($this->scope['info_usuario']['data']->tipo == 6) 
		{
			$this->scope['titulo'] = "Clases Masternodos";
		
			$this->load->view('Clases_Inversionistas_view',$this->scope);
		}
		else
		{
			redirect('/dashboard' ,'refresh');
		}
		
	}

	public function biginversionistas()
	{
		if($this->scope['info_usuario']['data']->tipo == 5) 
		{
			$this->scope['titulo'] = "Clases Inversionistas";
		
			$this->load->view('Clases_GranInversion_view',$this->scope);
		}
		else
		{
			redirect('/dashboard' ,'refresh');
		}
		
	}

	
}
