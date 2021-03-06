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
        $query = $this->db->insert('contactos', $data);

        $error = $this->db->error();

        if(!$query || $error['code'] == '1054'){
            return FALSE;
        }

        $this->load->model('Mail_model');
        $this->Mail_model->setTo($data['email']);

        $this->Mail_model->setToCC('soporte@academiadetrading.net');
        //$this->Mail_model->setTo('Douglasjosenieves@gmail.com');
        $this->Mail_model->setSubject('Academia de Trading - Forulario Web - '.$data['name'].'');

        $data = array(
            "titulo" => "Estimado(a) ".$data['name']." gracias por escribirnos",
            "texto" => "Email: ".$data['email'].", 
                        whatsapp: ".$data['whatsapp'].", 
                        Ciudad: ".$data['ciudad'].", 
                        Inversion: ".$data['inversion'].", 
                        Referido: ".$data['referido_id']." ",
            "link" => "https://academiadetrading.net/auth#_registro",
            "texto_link" => "Registrarme"
        );

        $this->Mail_model->setMessage($data);
        $this->Mail_model->sendMail();

        redirect('/trading?send=true', 'location');
        return TRUE;
    }
    
    public function getContactos()
    {
        $this->db->order_by("id","desc");
        $query = $this->db->get('contactos');

        return $query->result();
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