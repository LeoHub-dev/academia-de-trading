<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indicios extends LH_Controller {

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

	}


	public function index()
	{
		$this->scope['lista_indicios'] = $this->Academia_model->obtenerIndicios();

		if($this->Auth_model->tienePase($this->scope['info_usuario']['data']->id_usuario))
		{
			$this->scope['tienePase'] = 1;

			if(!$this->Auth_model->paseActivo($this->scope['info_usuario']['data']->id_usuario))
			{
				//redirect('/home' ,'refresh');
				$this->scope['paseTerminado'] = 1;
			}
			else
			{
				$this->scope['paseTerminado'] = 0;
			}
		}
		else
		{
			$this->scope['tienePase'] = 0;
		}

		$this->scope['titulo'] = "Indicios";
		
		$this->load->view('Indicios_view',$this->scope);
		
		
	}

	public function activar_temporal()
	{
		if($this->Auth_model->estaPago())
    	{
    		redirect('/indicios' ,'refresh');
    	}
    	else
    	{
    		if($this->Auth_model->tienePase($this->scope['info_usuario']['data']->id_usuario))
    		{
    			redirect('/indicios' ,'refresh');
    		}
    		else
    		{
    			$this->Auth_model->crearPase($this->scope['info_usuario']['data']->id_usuario);
    			redirect('/indicios' ,'refresh');
    		}
    	}
	}

	
}
