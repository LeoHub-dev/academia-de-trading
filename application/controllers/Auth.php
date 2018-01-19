<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends LH_Controller {

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
		if(!$this->Auth_model->estaConectado())
		{
			$this->scope['titulo'] = "Inicio de sesion";

			$this->scope['referido_id'] = NULL;

			$referido = $this->session->userdata('ref');

			if(isset($referido))
			{
				$this->scope['referido_id'] = $this->session->userdata('ref');
			}

			$this->load->view('Auth_view',$this->scope);
		}
	    else
	    {
	    	redirect('/dashboard' ,'refresh');
	    }
	}

	public function ingreso()
	{
		if(!$this->Auth_model->estaConectado())
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
						'password' => myHash($this->input->post('password'))
					);

		        	if($this->Auth_model->ingresar($usuario))
		        	{
		        		$this->Academia_model->verificarMensualidad();
		        		echo response_good('Has ingresado','Bienvenido');

		        		//redirect('/dashboard' ,'refresh');
		        	}
		        	else
		        	{
		        		echo response_bad('Error contraseña incorrecta');
		        	}
	        	}
	        }
	        else
		    {
		    	redirect('/dashboard' ,'refresh');
		    }
	    }
	    else
	    {
	    	echo response_good('Has ingresado','Bienvenido');
	    }

	}

	public function registro()
	{
		if ($this->Auth_model->estaConectado())
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
						'password' => myHash($this->input->post('password')),
						'referido' => $this->input->post('referido')
					);



					if($this->Auth_model->registrar($usuario))
					{
						$this->Auth_model->ingresar($usuario);
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

					$referido = $this->session->userdata('ref');

					if(isset($referido))
					{
						$referido = $this->session->userdata('ref');
					}
					else
					{
						$referido = 1;
					}

					$usuario = array(
						'nombre' => $user['first_name'],
						'apellido' => $user['last_name'],
						'email' => $user['email'],
						'fecha_nacimiento' => NULL,
						'telefono' => NULL,
						'usuario' => str_replace(' ', '', $user['first_name'].$user['last_name'].$user['id']),
						'password' => myHash('fbpw'.$user['email'].myHash('fb_login_lh').myHash($user['id'])),
						'referido' => $referido
					);

					if($this->Auth_model->registrar($usuario))
					{
						if($this->Auth_model->ingresar($usuario))
			        	{
			        		echo "<script> window.opener.responseFb('".response_good(false,false)."'); window.close();</script>";
			        	}
			        	else
			        	{
							echo "<script> window.opener.responseFb('".response_bad('Ya ese email fue registrado de forma manual')."'); window.close(); </script>";
			        	}
			        	
						
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

	public function reiniciar_pw()
	{
		$usuario = $this->Auth_model->obtenerUsuarioEmail($this->input->post('email'));

		if($usuario['response'])
		{
			$this->load->model('Mail_model');
			$this->Mail_model->setTo($this->input->post('email'));
			$this->Mail_model->setSubject('Academia de Trading - Recuperacion');

			$data = array( 
			"titulo" => "Academia de Trading",
			"texto" => "Hemos recibido su solicitud para reiniciar su password",
			"link" => site_url('auth/reiniciar_password')."?h=".myHash($usuario['data']->fecha_creacion)."&e=".myHash($usuario['data']->email)."&i=".$usuario['data']->id_usuario."&p=".myHash($usuario['data']->password),
			"texto_link" => "Reiniciar Password"
			);

			$this->Mail_model->setMessage($data);
			@$this->Mail_model->sendMail();

			echo response_good('Correcto','Se envio un mensaje a tu email para re-establecer tu contraseña');
			return;
		}
		
	}

	public function reiniciar_password()
	{
		$this->scope['h'] = $this->input->get('h');
		$this->scope['e'] = $this->input->get('e');
		$this->scope['i'] = $this->input->get('i');
		$this->scope['p'] = $this->input->get('p');
		$this->load->view('Reiniciar_Password_view',$this->scope);
	}

	public function reset()
	{
		$h = $this->input->post('h');
		$e = $this->input->post('e');
		$i = $this->input->post('i');	
		$p = $this->input->post('p');
		$np = $this->input->post('np');

		$cnp = $this->input->post('cnp');

		if($this->Auth_model->editarPassword($i,$h,$e,$p,$np))
		{
			echo response_good('Correcto','Se ha reiniciado su contraseña');
			return;
		}
		else
		{
			echo response_bad('Error - Fallo sistema');
			return;
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





	public function formcontactos()
	{
	 
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				if ($this->form_validation->run('contactos') == FALSE)
	        	{
	        		echo response_bad(validation_errors());
	        	}
	        	else
	        	{
					$usuario = array(
						'name' => $this->input->post('name'),
						

						'email' => $this->input->post('email'),
						'whatsapp' => $this->input->post('whatsapp'),
						'ciudad' => $this->input->post('ciudad'),
						'inversion' => $this->input->post('inversion'),
						 
					);



					if($this->Contacto_model->registrar($usuario))
					{
				
						echo response_good('Correcto','Ya puede ingresar a su cuenta');
		        	}
		        	


				}
			}


			else
		    {
		    	echo response_bad('Error - Fallo sistema');
		    }
	 
		
	}

	
}
