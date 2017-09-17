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
	        
			redirect('/auth#_registro' ,'refresh');
		}
		else
		{
			redirect('/dashboard' ,'refresh');
		}
	}

	public function admin_usuario($id_usuario)
	{
		$usuario = $this->Auth_model->obtenerUsuarioID($id_usuario);
		$id_matriz = $this->Matriz_model->obtenerMatrizActiva($id_usuario)->id_matriz;
		if($id_matriz == NULL) { return; }
		$ganancias = $this->Matriz_model->obtenerGananciasTotal($id_matriz);
		$circulo_1 = $this->Matriz_model->obtenerListaCirculo1($id_usuario);
		$circulo_2 = $this->Matriz_model->obtenerListaCirculo2($id_usuario);

		$array = array('response' => true, 'usuario' => $usuario['data'], 'id_matriz' => $id_matriz, 'ganancias' => $ganancias, 'circulo_1' => $circulo_1, 'circulo_2' => $circulo_2);

		echo json_encode($array);

	}


	
}
