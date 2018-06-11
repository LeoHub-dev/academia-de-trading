<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends LH_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->scope['lista_old_matriz'] = $this->Matriz_model->obtenerMatrizCompletasTotal();
		$this->scope['lista_indicios'] = $this->Academia_model->obtenerIndicios();
		$this->load->view('Home_view',$this->scope);
	}

    public function beta()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $query = $this->db->insert('beta',[
                'email' => $this->input->post('email')
            ]);

            /*$user = $this->Auth_model->obtenerUsuarioID($id_usuario);
            $user2 = $user['data'];

           
            $this->load->model('Mail_model');
            $this->Mail_model->setTo($user2->email);
            $this->Mail_model->setToCC('soporte@academiadetrading.net');
            $this->Mail_model->setSubject('Academia de Trading - Pago Hash Id: '.$hash_id.'');
            //$this->Mail_model->setTo('Douglasjosenieves@gmail.com');

            $this->Mail_model->setMessage([
                "titulo" => "Estimado(a) ".$user2->nombre.". Su pago se ha reportado con exito! Hash Id: ".$hash_id."" ,
                "texto" => "Pronto nuestro staff administrativo verificará su pago.",
                "link" => "https://academiadetrading.net/",
                "texto_link" => "Ir a la Academia"
            ]);

            $this->Mail_model->sendMail();*/

            if($query)
            {
                echo response_good('Registrado','Estara recibiendo noticias sobre nuestro bot');
            }


            
            
        }
    }

	public function ventas()
	{
		$this->scope['send'] = $this->input->get('send');


    	if ($this->session->userdata('ref'))
    	{
    		$this->scope['referido_id'] = $this->session->userdata('ref');
    		$user = $this->Auth_model->obtenerReferidoID($this->scope['referido_id'])['data'];
    		$this->scope['referido_name'] =  $user->nombre.' '.$user->apellido;
    	}
    	else
    	{
    		$this->scope['referido_id'] = 1;
    		$user = $this->Auth_model->obtenerReferidoID($this->scope['referido_id'])['data'];
    		$this->scope['referido_name'] =  $user->nombre.' '.$user->apellido;
    	}
		

        $this->load->view('Ventas_view',$this->scope);
	}

    public function ventas_inversionista()
    {
    	if($this->Auth_model->estaConectado())
		{
			if($this->scope['info_usuario']['data']->tipo != 5)
			{
				redirect('/dashboard' ,'refresh');
			}
		}


        $this->scope['send'] = $this->input->get('send');

        $this->session->set_userdata('tipo_registro',5);

        if ($this->session->userdata('ref'))
    	{
    		$this->scope['referido_id'] = $this->session->userdata('ref');
    		$user = $this->Auth_model->obtenerReferidoID($this->scope['referido_id'])['data'];
    		$this->scope['referido_name'] =  $user->nombre.' '.$user->apellido;
    	}
    	else
    	{
    		$this->scope['referido_id'] = 1;
    		$user = $this->Auth_model->obtenerReferidoID($this->scope['referido_id'])['data'];
    		$this->scope['referido_name'] =  $user->nombre.' '.$user->apellido;
    	}

        $this->load->view('VentasInversores_view',$this->scope);
    }

    public function master_nodes()
    {
    	if($this->Auth_model->estaConectado())
		{
			if($this->scope['info_usuario']['data']->tipo != 6)
			{
				redirect('/dashboard' ,'refresh');
			}
		}

        $this->scope['send'] = '';

        if ($this->session->userdata('ref'))
    	{
    		$this->scope['referido_id'] = $this->session->userdata('ref');
    		$user = $this->Auth_model->obtenerReferidoID($this->scope['referido_id'])['data'];
    		$this->scope['referido_name'] =  $user->nombre.' '.$user->apellido;
    	}
    	else
    	{
    		$this->scope['referido_id'] = 1;
    		$user = $this->Auth_model->obtenerReferidoID($this->scope['referido_id'])['data'];
    		$this->scope['referido_name'] =  $user->nombre.' '.$user->apellido;
    	}

        $this->session->set_userdata('tipo_registro',6);


        $this->load->view('master_node_view',$this->scope);
    }

	public function ventas_adrian()
	{
		$this->scope['send'] = $this->input->get('send');

		$this->load->view('VentasAdrian_view',$this->scope);
	}

	public function ver_indicio($indicio = NULL)
	{
		if($indicio == NULL)
		{
			redirect('/inicio' ,'refresh');
		}

		$this->scope['fecha'] = $indicio;

		$this->scope['lista_indicios'] = $this->Academia_model->obtenerIndicios();
		$this->load->view('HomeIndicio_view',$this->scope);
	}



}
