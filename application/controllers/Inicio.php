<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends LH_Controller {


	public function __construct()
	{
		parent::__construct();

	}


	public function index()
	{
		$this->scope['lista_old_matriz'] = $this->Matriz_model->obtenerMatrizCompletasTotal();
		$this->scope['lista_indicios'] = $this->Academia_model->obtenerIndicios();
		$this->load->view('Home_view',$this->scope);
	}

	public function ventas()
	{

        $this->scope['send'] = $this->input->get('send');
       $this->scope['referido_id'] = $this->session->userdata('ref');
       

if ($this->session->userdata('usuario')) {
 $user = $this->session->userdata('usuario');
       $user2 = $user['data'];
       $this->scope['referido_name'] =  $user2->nombre.' '.$user2->apellido;
}
      

       $this->load->view('Ventas_view',$this->scope);


	}

	public function ver_indicio($indicio = NULL)
	{
		if($indicio == NULL)
		{
			redirect('/inicio' ,'refresh');
		}

		$this->scope['fecha'] = $indicio;

		$this->scope['lista_indicios'] = $this->Academia_model->obtenerIndicios();
		$this->load->view('HomeIndicio_view',$this->scope);
	}


}
