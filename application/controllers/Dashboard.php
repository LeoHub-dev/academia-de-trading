<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends LH_Controller {

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

	}


	public function index()
	{
		if($this->Auth_model->isLoggedIn())
		{
			$this->load->view('Dashboard_view',$this->scope);
		}

		$this->load->view('Dashboard_view',$this->scope);

	}

	public function ingreso()
	{
		if(!$this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{

				/*response_bad('Sistema En pausa - Pronto volveremos a estar disponibles');
				return;*/

				if ($this->form_validation->run('login') == FALSE)
	        	{
	        		echo response_bad(validation_errors());
	        	}
	        	else
	        	{


		        	$usuario = array(
						'usuario' => $this->input->post('usuario'),
						'password' => $this->input->post('password')
					);

		        	if($this->Auth_model->ingresar($usuario))
		        	{
		        		echo response_good('Has ingresado','Bienvenido');

		        		redirect('/dashboard' ,'refresh');
		        	}
		        	else
		        	{
		        		echo response_bad('Error contraseña incorrecta');
		        	}
	        	}
	        }
	    }
	    else
	    {
	    	echo "conectado";
	    	//redirect('/dashboard' ,'refresh');
	    }

	}

	public function registro()
	{
		if ($this->Auth_model->isLoggedIn())
		{
			redirect('/dashboard' ,'refresh');
		}
		else
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				if ($this->form_validation->run('registro') == FALSE)
	        	{
	        		echo response_bad(validation_errors());
	        	}
	        	else
	        	{
					$usuario = array(
						'nombre' => $this->input->post('nombre'),
						'apellido' => $this->input->post('apellido'),
						'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
						'email' => $this->input->post('email'),
						'telefono' => $this->input->post('telefono'),
						'usuario' => $this->input->post('usuario'),
						'password' => $this->input->post('password')
					);



					if($this->Auth_model->registrar($usuario))
					{
						echo response_good('Correcto','Ya puede ingresar a su cuenta');
		        	}
		        	else
		        	{
		        		echo response_bad('Error - intente mas tarde');
		        	}

				}
			}
			else
		    {
		    	echo response_bad('Error - Fallo sistema');
		    }
		}
		
	}

	public function facebook()
	{

		if ($this->facebook->is_authenticated())
		{
			
			$user = $this->facebook->request('get', '/me?fields=id,email,first_name,last_name');

			//var_dump($user);

			if (!isset($this->scope['error']))
			{

				if($this->form_validation->esUnEmailUnico($user['email']))
				{

					$usuario = array(
						'nombre' => $user['first_name'],
						'apellido' => $user['last_name'],
						'email' => $user['email'],
						'fecha_nacimiento' => NULL,
						'telefono' => NULL,
						'usuario' => $user['first_name'].$user['last_name'].$user['id'],
						'password' => myHash('fbpw'.$user['email'].myHash('fb_login_lh').myHash($user['id']))
					);

					if($this->Auth_model->registrar($usuario))
					{
						if($this->Auth_model->ingresar($usuario))
			        	{
			        		echo "<script> window.opener.responseFb('".response_good(false,false)."'); window.close();</script>";
			        	
			        		//redirect('/dashboard' ,'refresh');
			        	}
			        	else
			        	{
							echo "<script> window.opener.responseFb('".response_bad('Ya ese email fue registrado de forma manual')."'); window.close(); </script>";
			        	}
			        	
						//echo "<script> window.opener.responseFb('".response_good('Correcto','Ya puede ingresar a su cuenta')."'); window.close(); </script>";
		        	}
		        	else
		        	{
		        		echo "<script> window.opener.responseFb('".response_bad('Error - intente mas tarde')."'); window.close(); </script>";
		        	}
				}
				else
				{
		        	$usuario = array(
						'usuario' => $user['first_name'].$user['last_name'].$user['id'],
						'password' => myHash('fbpw'.$user['email'].myHash('fb_login_lh').myHash($user['id']))
					);
					
		        	if($this->Auth_model->ingresar($usuario))
		        	{
		        		echo "<script> window.opener.responseFb('".response_good(false,false)."'); window.close();</script>";
		        	
		        		//redirect('/dashboard' ,'refresh');
		        	}
		        	else
		        	{
						echo "<script> window.opener.responseFb('".response_bad('Ya ese email fue registrado de forma manual')."'); window.close(); </script>";
		        	}
				}
			}


		}
		else
		{
			echo "<script> window.opener.responseFb('".response_bad('Error - intente mas tarde')."'); window.close(); </script>";
		}

	}

	public function desconectarse()
	{
		
		header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

        $this->facebook->destroy_session();
        $sess_array = $this->session->all_userdata();
		foreach($sess_array as $key =>$val)
		{
		   	if($key!='site_lang')
		   	{
		   		$this->session->unset_userdata($key);
		   	}
		}

        redirect('/auth' ,'refresh');
        exit;
	}
}
