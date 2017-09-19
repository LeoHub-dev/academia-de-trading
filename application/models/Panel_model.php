<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Panel_model extends CI_Model 
{

    public $niveles_a_mostrar = 2;
    public $matriz_array = NULL;
    public $matriz_inicio = NULL; 
    public $chart = array();
    public $info_cuenta_inicial = NULL;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function obtenerUsuarios()
    {

        $lista_usuarios = NULL;

        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('usuarios_data');

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {
                $lista_usuarios['usuario'][$inf->id_usuario] = $inf;
                $id_matriz = $this->Matriz_model->obtenerMatrizActiva($inf->id_usuario);

                if($id_matriz != NULL)
                {
                    $lista_usuarios['matriz'][$id_matriz->id_matriz] = $inf;
                }
                
            }

        }

        return $lista_usuarios;

    }


    public function obtenerGanancias()
    {
        $ganancias = NULL;


        $query = $this->db->get('ganancias');
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $ganancia)
            {
                $gananacias[] = $ganancia;
            }

            return $gananacias;
        }
        else
        {
            return NULL;
        }
    }

    public function marcarPagado($id_ganancia)
    {
        $status = $this->db->update('ganancias', array('pagada' => 1), array('id_ganancia' => $id_ganancia));

        if($status)
        {
            return TRUE;
        }

        return FALSE;
    }

    public function editarUsuario($post,$id_usuario)
    {
        

        $usuario = $this->Auth_model->obtenerUsuarioID($id_usuario);

        if(isset($post['usuario']) && !empty($post['usuario']))
        {
            $this->db->set('usuario', $post['usuario']);
        }
        else
        {
            return FALSE;
        }

        if(isset($post['password']) && !empty($post['password']))
        {
            if($usuario['data']->password != $post['password'])
            {
                $this->db->set('password', $post['password']);
            }

        }
        else
        {
            return FALSE;
        }

        if(isset($post['referido']) && !empty($post['referido']))
        {
            $this->db->set('referido', $post['referido']);
        }
        else
        {
            return FALSE;
        }

        $this->db->where('id_usuario',$id_usuario);

        $user_status = $this->db->update('usuarios_data');

        

        if(!$user_status)
        {
            return FALSE;
        }

        if(isset($post['nombre']) && !empty($post['nombre']))
        {
            $this->db->set('nombre', $post['nombre']);
        }

        if(isset($post['apellido']) && !empty($post['apellido']))
        {
            $this->db->set('apellido', $post['apellido']);
        }

        if(isset($post['email']) && !empty($post['email']))
        {
            $this->db->set('email', $post['email']);
        }

        if(isset($post['wallet']) && !empty($post['wallet']))
        {
            $this->db->set('wallet', $post['wallet']);
        }

        $this->db->where('id_persona',$usuario['data']->id_persona);

        $user_status = $this->db->update('usuarios_personas');

        if($user_status)
        {
            return TRUE;
        }

        return FALSE;


    }



    public function editarGanancia($id_ganancia,$monto)
    {
        $status = $this->db->update('ganancias', array('monto' => $monto), array('id_ganancia' => $id_ganancia));

        if($status)
        {
            return TRUE;
        }

        return FALSE;
    }


    public function editarMontoMineria($id_usuario,$monto)
    {
        $status = $this->db->update('usuarios_data', array('mineria' => $monto), array('id_usuario' => $id_usuario));

        if($status)
        {
            return TRUE;
        }

        return FALSE;
    }



    public function obtenerCuentaMineria($id_usuario)
    {
        $this->db->where('cuenta_mineria.id_usuario',$id_usuario);


        $query = $this->db->get('cuenta_mineria');
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $cuenta)
            {
                return $cuenta;
            }
        }
        else
        {
            return NULL;
        }
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }

}
?>