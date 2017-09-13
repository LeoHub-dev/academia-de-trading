<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LH_Form_validation extends CI_Form_validation 
{    
 	function __construct($config = array()){
        $config['error_prefix'] = '<p>';
        $config['error_suffix'] = '</p>';

      	parent::__construct($config);

 	}
     
 	public function esUnEmailUnico($email)
    {
        $this->db->where('email',$email);

        $query = $this->db->get('usuarios_personas');

        if($query->num_rows() == 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }    
    }

    public function noEsUnEmailUnico($email)
    {
        $this->db->where('email',$email);

        $query = $this->db->get('usuarios_personas');

        if($query->num_rows() == 0)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }    
    }

    public function esUnUsuarioUnico($usuario)
    {
        $this->db->where('usuario',$usuario);

        $query = $this->db->get('usuarios_data');

        if($query->num_rows() == 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }    
    }

    public function noEsUnUsuarioUnico($usuario)
    {
        $this->db->where('usuario',$usuario);

        $query = $this->db->get('usuarios_data');

        if($query->num_rows() == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }    
    }

    public function referidoExiste($id_usuario)
    {
        $this->db->where('id_usuario',$id_usuario);

        $query = $this->db->get('usuarios_data');

        if($query->num_rows() == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }    
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }
}