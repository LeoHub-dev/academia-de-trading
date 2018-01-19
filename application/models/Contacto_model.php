<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto_model extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

   



    public function registrar($data)
    {
        $usuario_persona = array(


                 

           'name' => $data['name'],
           'email' => $data['email'],
           'whatsapp' => $data['whatsapp'],
           'ciudad' => $data['ciudad'],
           'inversion' => $data['inversion']
         
        );

        $query = $this->db->insert('contactos',$usuario_persona); 

        if($query)
        {
           

 redirect('/trading?send=true', 'location');
return TRUE;


         }

           
       
        else
        {
            return FALSE;
        }   
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



    
    
}
?>