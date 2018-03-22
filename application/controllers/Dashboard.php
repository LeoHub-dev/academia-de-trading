<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends LH_Controller
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
			/*if(!$this->Auth_model->estaPago())
        	{
        		redirect('/pago' ,'refresh');
        	}*/
		}
	}


	public function index()
	{
		$this->scope['titulo'] = "Dashboard";

		$this->scope['cantidad_referidos'] = $this->Academia_model->cantidadReferidosAccesibles($this->scope['info_usuario']['data']->id_usuario);

		$this->scope['calendario'] = $this->Academia_model->obtenerCalendario();

		$this->scope['ganancias'] = [
		    'semanal' => $this->CalendarioPago_model->getGananciasSemanalUser($this->session->userdata('id_usuario')),
            'mensual' => $this->CalendarioPago_model->getGananciasMensualUser($this->session->userdata('id_usuario')),
              'total' => $this->CalendarioPago_model->getGananciasTotalUser($this->session->userdata('id_usuario'))
        ];

        
        $this->scope['verificar'] = $this->Academia_model->checkUserPaquete($this->session->userdata('id_usuario'), 5);

		$this->load->view('Dashboard_view',$this->scope);
	}

	
}
