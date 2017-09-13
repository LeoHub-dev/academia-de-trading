<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends LH_Controller {

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
		$this->scope['titulo'] = "Perfil";
		$this->load->view('Perfil_view',$this->scope);
	}

	public function editar()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{

			if($this->scope['info_usuario']['data']->usuario != $this->input->post('usuario'))
    		{
    			if($this->form_validation->noEsUnUsuarioUnico($this->input->post('usuario')))
    			{
    				echo response_bad('El usuario ya existe');
    				return;
    			}
    		}

    		if(empty($this->input->post('image')))
			{
				echo response_bad('Imagen vacia');
				return;
			}

			if($this->Auth_model->editarUsuario($this->input->post(),$this->scope['info_usuario']['data']->id_persona))
			{
				echo response_good('Usuario editado','Tu información ha sido editada');
			}
			else
			{
				echo response_bad('Error al editar (Contraseña incorrecta)');
			}
        	
		}
	}

	public function uploadimg()
	{

		$config['upload_path']          = './assets/images/perfil/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_ext_tolower'] = TRUE;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('imgPerfil'))
        {
                $error = array('error' => $this->upload->display_errors());


      
            echo json_encode($error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                echo json_encode($data['upload_data']['file_name']);
        }
	}



}
