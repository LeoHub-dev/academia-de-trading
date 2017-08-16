<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

    public function isLoggedIn(){
        
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
        $this->db->where('password',$data['password']);

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
               'id_persona' => $id_persona
            );

            $query = $this->db->insert('usuarios_data',$usuario_data); 

            if($query)
            {
                //$this->confirmarTerminos($this->db->insert_id());
                
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

    

    public function obtenerUsuario($id_usuario)
    {
        $this->db->where('id_usuario',$id_usuario);
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('usuarios_data',1);

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {
                return $inf;
            }

            return TRUE;
        }
        else
        {
            return FALSE;
        }    
    }

    
}
?>