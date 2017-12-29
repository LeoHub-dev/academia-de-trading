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
		$this->scope['lista_pagos_admin'] = $this->Panel_model->listaPagos();
		$this->scope['lista_indicios_admin'] = $this->Academia_model->obtenerIndicios();
		$this->scope['lista_ganancias_admin'] = $this->Panel_model->listaGanancias();
		$this->scope['lista_pagos_manual_admin'] = $this->Academia_model->listaPagosGeneral();
		
		$this->load->view('Panel_view',$this->scope);
		
	}

	public function marcar_pago()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			if($this->Panel_model->marcarPagado($this->input->post('id_ganancia')))
			{
				echo response_good('Correcto','Pagada');
			}
		}

	}

	public function editar_usuario()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			if($this->form_validation->run('editarusuario') == FALSE)
        	{
        		echo response_bad(validation_errors());
        	}
        	else
        	{
        		if($this->input->post('usuario_default') != $this->input->post('usuario'))
        		{
        			if($this->form_validation->noEsUnUsuarioUnico($this->input->post('usuario')))
        			{
        				echo response_bad('El usuario ya existe');
        				return;
        			}
        		}

				if($this->Panel_model->editarUsuario($this->input->post(),$this->input->post('id_usuario')))
				{
					echo response_good('Usuario editado','Informacion editada',array('posted_data' => $this->input->post()));
				}
				else
				{
					echo response_bad('Error al editar');
				}
			}
        	
		}
		
	}

	public function activar_cuenta()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{


			if($this->input->post('tipo') == 1)
			{
			 	$this->Auth_model->activarUsuario($this->input->post('id_usuario'));
                $this->Academia_model->marcarPagadoFactura($this->input->post('id_usuario'));
                $this->Academia_model->verificarMensualidad();
                echo response_good('Activado','Pagada');

	        	return;
            }
            else if($this->input->post('tipo') == 2)
            {

                $this->Auth_model->vipUsuario($this->input->post('id_usuario'));

                echo response_good('Activado','Pagada');

	        	return;

            }
            else if($this->input->post('tipo') == 3)
            {
            	if($this->Matriz_model->obtenerMatrizActiva($this->input->post('id_usuario')) == NULL)
            	{
	            	$this->Auth_model->matrizUsuario($this->input->post('id_usuario'));
	                //Agrego a la Matriz
	                $this->Matriz_model->agregarCuentaMatriz($this->input->post('id_usuario'));

	                $this->Auth_model->activarUsuario($this->input->post('id_usuario'));

	                $this->Academia_model->marcarPagadoFactura($this->input->post('id_usuario'));

	                echo response_good('Matriz Agregada','Pagada');

		        	return;
		        }
		        else
		        {
		        	echo response_bad('El usuario ya tiene matriz');
	        		return;
		        }
            }
            else if($this->input->post('tipo') == 4)
            {
            	if($this->Matriz_model->obtenerMatrizActiva($this->input->post('id_usuario')) == NULL)
            	{
	            	$this->Auth_model->matrizUsuario($this->input->post('id_usuario'));
	                //Agrego a la Matriz
	                //Agrego a los Circulos
	                $this->Matriz_model->agregarCuentaMatriz($this->input->post('id_usuario'));
	                if($this->Matriz_model->obtenerCirculoActivo($this->input->post('id_usuario')) == NULL)
	                {
	                    $this->Matriz_model->agregarCuentaCirculo($this->input->post('id_usuario'));
	                }
	                $this->Auth_model->activarUsuario($this->input->post('id_usuario'));
	                $this->Academia_model->marcarPagadoFactura($this->input->post('id_usuario'));
	                echo response_good('Matriz y Residual Agregada','Pagada');

		        	return;
	        	}
		        else
		        {
		        	echo response_bad('El usuario ya tiene matriz');
	        		return;
		        }
            }



	        echo response_bad('Error');
	        return;


		}

	}

	public function agregarMatrizPersonalizada($id_usuario1 = NULL, $id_usuario2 = NULL)
	{
		$id_usuario1 = $this->input->post('id_usuario1');
		$id_usuario2 = $this->input->post('id_usuario2');

		if($id_usuario1 != NULL && $id_usuario2 != NULL)
		{
			if($this->Matriz_model->obtenerMatrizActiva($id_usuario1) != NULL)
	        {
	            echo response_bad('El usuario al que se pondra debajo de otro, ya posee matriz');
        		return;
	        }
	        else if($this->Matriz_model->obtenerMatrizActiva($id_usuario2) == NULL)
	        {
	            echo response_bad('El usuario al que desea adjuntarle alguien no posee matriz');
        		return;
	        }
	        else
	        {
	        	$usuario1_info = $this->Auth_model->obtenerUsuarioID($id_usuario1);
	        	$usuario2_info = $this->Auth_model->obtenerUsuarioID($id_usuario2);

	        	$this->db->update('usuarios_data', array('referido' => $id_usuario2), array('id_usuario' => $id_usuario1));

	        	$this->Matriz_model->agregarCuentaMatriz($id_usuario1);

	        	$this->Auth_model->matrizUsuario($id_usuario1);

	        	$this->Auth_model->activarUsuario($id_usuario1);
	            
	            $this->Academia_model->marcarPagadoFactura($id_usuario1);

	            $this->db->update('usuarios_data', array('referido' => $usuario1_info['data']->referido), array('id_usuario' => $id_usuario1));

	            echo response_good('Matriz Agregada','Listo');

	        	return;

	        }
		}
		
	}

	public function agregarIndicio()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{



			if($info = $this->Panel_model->agregarIndicio($this->input->post()))
			{
				echo response_good('Correcto','Señal agregada',array('indicio' => $this->input->post(), 'id_indicio' => $info));
        	}
        	else
        	{
        		echo response_bad('Error - intente mas tarde');
        	}

			
		}
		else
	    {
	    	echo response_bad('Error - Fallo sistema');
	    }
	
	}

	public function eliminarIndicio()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{

			$this->Panel_model->eliminarIndicio($this->input->post('id'));

			echo response_good('Correcto','Eliminada');

	        return;
	    }
		
	}

	public function eliminarPago()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{

			$this->Panel_model->eliminarPago($this->input->post('id'));

			echo response_good('Correcto','Eliminado');

	        return;
	    }
		
	}

	public function uploadimg()
	{

		$config['upload_path']          = './assets/images/indicios/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 500;
        $config['max_width']            = 1500;
        $config['max_height']           = 1500;
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

	public function editarCalendario()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{



			if($info = $this->Panel_model->agregarCalendario($this->input->post()))
			{
				echo response_good('Correcto','Calendario Cambiado');
        	}
        	else
        	{
        		echo response_bad('Error - intente mas tarde');
        	}

			
		}
		else
	    {
	    	echo response_bad('Error - Fallo sistema');
	    }
	
	}

	public function uploadcalendario()
	{

		$config['upload_path']          = './assets/images/calendarios/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 500;
        $config['max_width']            = 1500;
        $config['max_height']           = 1500;
        $config['file_ext_tolower'] = TRUE;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('imgCalendario'))
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

	public function activar($id = 1)
	{
		$this->Academia_model->marcarPagadoFactura($id);
        $this->Academia_model->verificarMensualidad();
	}

	public function nuevosistema()
	{
		$this->Academia_model->prepararNuevoSistema();
	}
}
