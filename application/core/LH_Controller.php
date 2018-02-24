<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LH_Controller extends CI_Controller
{
	public $scope;

    public function __construct()
    {
        parent::__construct();

        if($this->Auth_model->estaConectado())
        {
            if(!isset($this->scope['info_usuario']))
            {
                $this->scope['info_usuario'] = $this->Auth_model->obtenerUsuarioID($this->session->userdata('id_usuario'));
            }

            $this->scope['factura'] = $this->Academia_model->obtenerFactura($this->session->userdata('id_usuario'));

            if($this->scope['info_usuario']['data']->pago == 1)
            {
                
            }
        }

        if($this->session->userdata('site_lang'))
        {
            $this->scope['site_lang'] = $this->session->userdata('site_lang');
        }
        else
        {
            $this->scope['site_lang'] = $this->config->item('language');;
        }

        $this->scope['calendario_pagos'] = $this->CalendarioPago_model->getPagosDiariosUser($this->session->userdata('id_usuario'));


        $this->form_validation->set_message('isNotUniqueMail', 'El email no existe');
        $this->form_validation->set_message('esUnEmailUnico', 'El email debe ser unico');
        $this->form_validation->set_message('esUnUsuarioUnico', 'El usuario debe ser unico');
        $this->form_validation->set_message('noEsUnUsuarioUnico', 'El usuario no existe');
        $this->form_validation->set_message('referidoExiste', 'El referido no existe');
        $this->form_validation->set_message('esUnDniUnico', 'Esa dni ya esta usada');
        $this->form_validation->set_message('isConfirmed', 'No esta confirmado');
        $this->form_validation->set_message('notPaidUser', 'No realizo su pago en una mesa en el tiempo necesario');
        $this->form_validation->set_message('isConfirmedUser', 'Debe confirmar su email para poder entrar');
        $this->form_validation->set_message('isSuscribed', 'Esta suscrito');
        $this->form_validation->set_message('ifCodeExist', 'No existe este codigo de referido');
    }

    public function setlang($lang = 'english')
	{
        $back = $this->input->get('gob');

        if(!isset($back) || empty($back))
        {
            $back = site_url('home');
        }

        if($lang == 'english')
        {
            $this->session->set_userdata('site_lang','english');
        }

        if($lang == 'spanish')
        {
            $this->session->set_userdata('site_lang','spanish');
        }

        redirect($back ,'refresh');
	}


}

