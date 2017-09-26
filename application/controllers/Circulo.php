<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Circulo extends LH_Controller {

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
		$this->scope['titulo'] = "Circulos";

		$this->scope['lista_circulo_1'] = $this->Matriz_model->obtenerListaCirculo1($this->scope['info_usuario']['data']->id_usuario);
		$this->scope['lista_circulo_2'] = $this->Matriz_model->obtenerListaCirculo2($this->scope['info_usuario']['data']->id_usuario);
		$this->load->view('Circulo_basic_view',$this->scope);
	}

	public function avanzado()
	{
		$this->scope['titulo'] = "Circulos";
		$this->load->view('Circulo_view',$this->scope);
	}

	public function obtenerMatriz()
	{
		header("Content-type: application/x-javascript");

		echo "var chart_config = '".json_encode($this->Matriz_model->crearMatriz($this->Matriz_model->obtenerMatrizActiva($this->scope['info_usuario']['data']->id_usuario)->id_matriz))."';";
	}


}
