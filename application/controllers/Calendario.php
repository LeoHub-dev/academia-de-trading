<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario extends LH_Controller
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
		$this->scope['titulo'] = "Calendario";

        $this->scope['calendario'] = $this->Academia_model->obtenerCalendario();
        $this->scope['verificar'] = $this->Academia_model->checkUserPaquete($this->session->userdata('id_usuario'), 5);

        $this->scope['lista_ganancias'] = $this->Academia_model->listaGanancias($this->scope['info_usuario']['data']->id_usuario);
		$this->scope['lista_old_matriz'] = $this->Matriz_model->obtenerMatrizCompletas($this->scope['info_usuario']['data']->id_usuario);
		$this->scope['lista_ganancias_paquete'] = $this->Academia_model->pagoConfirmados($this->session->userdata('id_usuario'));

        $this->scope['ganancias'] = [
            'semanal' => $this->CalendarioPago_model->getGananciasSemanalUser($this->session->userdata('id_usuario')),
            'mensual' => $this->CalendarioPago_model->getGananciasMensualUser($this->session->userdata('id_usuario')),
            'total' => $this->CalendarioPago_model->getGananciasTotalUser($this->session->userdata('id_usuario'))
        ];

		$this->load->view('Calendario_view',$this->scope);
	}
}
