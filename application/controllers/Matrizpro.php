<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MatrizPro extends LH_Controller {

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
        	$this->load->library('Coinpayments');
        	
        }
        else
        {
        	redirect('/auth' ,'refresh');
        }
    }

	public function index()
	{
		if($this->Matriz_Pro_model->obtenerMatrizActiva($this->session->userdata('id_usuario')) == NULL)
		{
			redirect('/dashboard' ,'refresh');
		}

		$this->scope['titulo'] = "Matriz";

		$this->load->view('Matriz_Pro_view',$this->scope);
		

	}

	public function circulo()
	{
		if($this->Matriz_Pro_model->obtenerCirculoActivo($this->session->userdata('id_usuario')) == NULL)
		{
			redirect('/dashboard' ,'refresh');
		}

		$this->scope['titulo'] = "Matriz";

		$this->load->view('Circulo_Pro_view',$this->scope);
		

	}

	public function circulo_basico()
	{

		$this->scope['titulo'] = "Matriz";

		$this->scope['lista_circulo_1'] = $this->Matriz_Pro_model->obtenerListaCirculo1($this->scope['info_usuario']['data']->id_usuario);
		$this->scope['lista_circulo_2'] = $this->Matriz_Pro_model->obtenerListaCirculo2($this->scope['info_usuario']['data']->id_usuario);

		$this->load->view('Circulo_basic_view',$this->scope);
		

	}


	


	



	
}
