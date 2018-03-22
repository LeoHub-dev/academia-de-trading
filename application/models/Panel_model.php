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

    public function listaPagos()
    {
        $lista_pagos = NULL;

        $this->db->join('coinbase_invoice', 'coinbase_invoice.id_invoice = coinbase_address.id_invoice', 'left');

        $query = $this->db->get('coinbase_address');

        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $coinbase_address)
            {
                $lista_pagos[$coinbase_address->id_invoice]['data'] = $coinbase_address;

                $this->db->where('address',$coinbase_address->address);

                $query_payments = $this->db->get('coinbase_payments');

                $lista_pagos[$coinbase_address->id_invoice]['pagos'] = NULL;

                if($query_payments->num_rows() > 0)
                {
                    foreach ($query_payments->result() as $payment)
                    {

                        $lista_pagos[$coinbase_address->id_invoice]['pagos'][] = $payment;

                    }
                }
            }
        }

        return $lista_pagos;


    }

    public function listaGanancias()
    {
        $lista_ganancias = NULL;

        $query = $this->db->get('ganancias');

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {
                $lista_ganancias[] = $inf;
            }
        }

        return $lista_ganancias;
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
                
            }

        }

        return $lista_usuarios;

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
                $this->db->set('password', myHash($post['password']));
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

    public function agregarIndicio($data)
    {
        $query = $this->db->insert('indicios',[
        	 'titulo' => $data['titulo'],
             'imagen' => $data['imagen'],
              'fecha' => $data['fecha'],
	        'seccion' => $data['seccion'],
	           'info' => $data['info']
        ]);

        if ($query) {
            return $this->db->insert_id();
        }

        return FALSE;
    }

    public function agregarCalendario($data)
    {
        $this->db->truncate('calendarios');

        $query = $this->db->insert('calendarios',[
	        'imagen' => $data['imagen']
        ]);

        if($query)
        {
            return $this->db->insert_id();
        }

        return FALSE;
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

    public function confirmarPago($data)
    {
        return $this->db->update('comisiones_diarias', array('pagada' => 1, 'fecha_pagado' => date('Y-m-d H:m:s')), $data);
    }

    public function confirmarPagoMesual($data)
    {
        return $this->db->update('comisiones_diarias', array('pagada' => 1, 'fecha_pagado' => date('Y-m-d H:m:s')), $data);
    }

    public function eliminarIndicio($id)
    {
        $this->db->delete('indicios', array('id_indicio' => $id));
    }

    public function eliminarPago($id)
    {
        $this->db->delete('pagos', array('id_pago' => $id));
    }

    public function establecerPagoDiario(array $data)
    {
		$this->db->insert('comisiones_diarias', $data);
    }


    public function __get($var)
    {
        return get_instance()->$var;
    }

}
?>