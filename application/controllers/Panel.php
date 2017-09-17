<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends LH_Controller {

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
		else if(!$this->Auth_model->estaPago())
    	{
    		redirect('/pago' ,'refresh');
    	}
    	else if($this->scope['info_usuario']['data']->tipo != 1)
    	{
			redirect('/dashboard' ,'refresh');
		}

		$this->load->model('Panel_model');
	}


	public function index()
	{
		$this->scope['titulo'] = "Panel";

		$this->scope['lista_usuarios_admin'] = $this->Panel_model->obtenerUsuarios();
		$this->scope['lista_ganancias_admin'] = $this->Panel_model->obtenerGanancias();
		
		$this->load->view('Panel_view',$this->scope);
		
	}

	public function generarPrueba()
	{
		set_time_limit(100);
            ini_set('max_execution_time', 100);

		$this->Matriz_model->agregarFactura(1);

		$n = 2;

		$usuario = array(
			'nombre' => 'leonard'.$n,
			'apellido' => 'jimen'.$n,
			'fecha_nacimiento' => NULL,
			'email' => 'admin1@circulo.com'.$n,
			'telefono' => '000000',
			'usuario' => 'leonard'.$n,
			'password' => 'leonard'.$n,
			'referido' => 1,
			'tipo' => 0
		);

		$this->Auth_model->registrar($usuario);
		$this->Matriz_model->agregarFactura($n);
		$this->Matriz_model->agregarCuenta($n);
        

		for ($n=3; $n < 30; $n++) { 

			

			$usuario = array(
				'nombre' => 'leonard'.$n,
				'apellido' => 'jimen'.$n,
				'fecha_nacimiento' => NULL,
				'email' => 'admin1@circulo.com'.$n,
				'telefono' => '000000',
				'usuario' => 'leonard'.$n,
				'password' => 'leonard'.$n,
				'referido' => 1,
				'tipo' => 0
			);

			$this->Auth_model->registrar($usuario);
			$this->Matriz_model->agregarFactura($n);
			$this->Matriz_model->agregarCuenta($n);
            
		}
		


	}

	public function generarPrueba2()
	{
		set_time_limit(100);
            ini_set('max_execution_time', 100);
		for ($n=162; $n < 300; $n++) { 

			

			$usuario = array(
				'nombre' => 'leonard'.$n,
				'apellido' => 'jimen'.$n,
				'fecha_nacimiento' => NULL,
				'email' => 'admin1@circulo.com'.$n,
				'telefono' => '000000',
				'usuario' => 'leonard'.$n,
				'password' => 'leonard'.$n,
				'referido' => 1,
				'tipo' => 0
			);

			$this->Auth_model->registrar($usuario);
			$this->Matriz_model->agregarFactura($n);
			$this->Matriz_model->agregarCuenta($n);
            
		}
	}

	public function init()
	{
		//$this->Auth_model->activarUsuarioPago(1);
        $this->Matriz_model->agregarFactura(1,1);
        //$this->Matriz_model->agregarCuenta(1);
	}

	public function activar($id = 1)
	{
		$this->Auth_model->activarUsuarioPago($id);
        $this->Matriz_model->agregarFactura($id,1);
        $this->Matriz_model->agregarCuenta($id);
	}
}
