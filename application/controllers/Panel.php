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
		$this->scope['lista_indicios_admin'] = $this->Academia_model->obtenerIndicios();
		
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
		if($this->Auth_model->isLoggedIn() && $this->scope['info_usuario']->tipo == 1)
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{

				$this->db->select('*');
		        $this->db->where('coinbase_invoice.id_invoice',$this->input->post('id_invoice'));
		        $this->db->from('coinbase_invoice');
		        $this->db->join('coinbase_address', 'coinbase_invoice.id_invoice = coinbase_address.id_invoice', 'left');

		        $query_coinbase = $this->db->get();

		        $invoice_data = FALSE;

		        if($query_coinbase->num_rows() > 0)
		        {
		            foreach ($query_coinbase->result() as $coinbase_invoice)
		            {
		                $invoice_data = $coinbase_invoice;
		            }

		            $this->db->where('id_invoice', $invoice_data->id_invoice);
		            $query_activeuser = $this->db->update('coinbase_invoice', array('estado' => 1));

		            //AgregarCuentaAlSistema

		            $this->Cuenta_model->AgregarCuentaAlSistema($invoice_data->id_usuario,$invoice_data->usuario_codigo);

		            $this->Matriz_model->AgregarCuentaAMatriz($invoice_data->usuario_codigo,$invoice_data->id_usuario);

		            response_good('Correcto','Pagada');

		            return;
		        }

		        response_bad('No se encontro el invoice');


				


			}
		}
	}

	public function agregarIndicio()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{



			if($this->Panel_model->agregarIndicio($this->input->post()))
			{
				echo response_good('Correcto','Señal agregada');
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

	public function activar($id = 1)
	{
		$this->Auth_model->activarUsuarioPago($id);
        $this->Matriz_model->agregarFactura($id,1);
        $this->Matriz_model->agregarCuenta($id);
	}
}
