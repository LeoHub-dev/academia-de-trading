<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Academia_model extends CI_Model 
{



    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function prepararNuevoSistema()
    {
        $this->db->empty_table('facturas');

        //$this->db->where('pago',1);
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('usuarios_data');

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {

                if($inf->pago == 1)
                {
                    $this->db->set('pago', 1);
        
                    $this->db->where('id_usuario',$inf->id_usuario);

                    $this->db->update('usuarios_data');

                    $this->agregarFactura($inf->id_usuario,1);
                }
                else
                {
                    $this->db->set('pago', 0);
        
                    $this->db->where('id_usuario',$inf->id_usuario);

                    $this->db->update('usuarios_data');

                    $this->agregarFactura($inf->id_usuario);
                }
            }
        }

        $this->verificarMensualidad();

                
    }

    public function verificarMensualidad()
    {

        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('usuarios_data');

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {
                if($this->debePagar($inf->id_usuario))
                {

                    if($this->cantidadReferidosAccesibles($inf->id_usuario) >= 3)
                    {

                        $this->Auth_model->activarUsuario($inf->id_usuario);
                        $this->marcarPagadoFactura($inf->id_usuario);
                    }
                    else
                    {

                        if($inf->pago == 1)
                        {
                            $this->Auth_model->desactivarUsuario($inf->id_usuario);
                        }
                    }
                }
            }
        }
    }

    public function cantidadReferidosAccesibles($id_usuario)
    {
        $factura = $this->obtenerFactura($id_usuario);

        $cantidad_referidos = 0;

        $this->db->where('referido',$id_usuario);
        $this->db->where('pago',1);
        $this->db->where('fecha_creacion >=', $factura->fecha_inicial);
        $this->db->where('fecha_creacion <=', $factura->fecha_final);
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('usuarios_data');

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {
                $cantidad_referidos++;
            }
        }

        return $cantidad_referidos;
    }


    public function debePagar($id_usuario)
    {
        if($this->scope['info_usuario']['data']->tipo == 2 || $this->scope['info_usuario']['data']->tipo == 1)
        {
            return FALSE;
        }

        $factura = $this->obtenerFactura($id_usuario);

        $data_fecha_hoy = new DateTime(NULL, new DateTimeZone(TIMEZONE));
        $fecha_actual = $data_fecha_hoy->format("Y-m-d");

        $data_fecha_inicial = new DateTime($factura->fecha_inicial, new DateTimeZone(TIMEZONE));
        $fecha_inicial = $data_fecha_inicial->format("Y-m-d");

        $data_fecha_final = new DateTime($factura->fecha_final, new DateTimeZone(TIMEZONE));
        $fecha_final = $data_fecha_final->format("Y-m-d");

        
        if($fecha_actual >= $fecha_inicial)
        {
            return TRUE;
        }
        else
        {
            if(($fecha_inicial <= $fecha_actual) && ($fecha_actual <= $fecha_final))
            {
                if($factura->pagada == 0)
                {
                    return TRUE;
                }
            }

            return FALSE;
        }

    }

    public function vipAgregarReferido($id_usuario,$referido)
    {

        $data = array(
           'id_usuario' => $id_usuario,
           'referido' => $referido
        );

        $query = $this->db->insert('vip_referidos',$data);

        if($query)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
        
    }

    public function vipAgregarGanancia($id_usuario,$cantidad)
    {

        $data = array(
           'id_usuario' => $id_usuario,
           'cantidad' => $cantidad
        );

        $query = $this->db->insert('vip_ganancias',$data);

        if($query)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
        
    }

    public function vipGanancias($id_usuario)
    {
        $lista_ganancias = NULL;

        $this->db->where('id_usuario',$id_usuario);

        $query = $this->db->get('vip_ganancias');

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {
                $lista_ganancias[] = $inf;
            }
        }

        return $lista_ganancias;
    }

    public function vipCantidadReferidos($id_usuario)
    {
        $cantidad_referidos = 0;

        $this->db->where('referido',$id_usuario);

        $query = $this->db->get('vip_referidos');

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {
                $cantidad_referidos++;
            }
        }

        return $cantidad_referidos;
    }

    public function agregarFactura($id_usuario,$pagada = 0)
    {

        $dt1 = new DateTime(NULL, new DateTimeZone(TIMEZONE));
        $today = $dt1->format("Y-m-d");
        $dt2 = new DateTime("+1 month", new DateTimeZone(TIMEZONE));
        $date = $dt2->format("Y-m-d");


        $data = array(
           'id_usuario' => $id_usuario,
           'fecha_inicial' => $today,
           'fecha_final' => $date
        );

        $query = $this->db->insert('facturas',$data);

        if($query)
        {
            if($pagada == 1)
            {
                $this->marcarPagadoFactura($id_usuario);
            }

            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
        
    }

    public function agregarFacturaEspecifica($id_usuario,$fecha_inicial,$fecha_final)
    {

        $data = array(
           'id_usuario' => $id_usuario,
           'fecha_inicial' => $fecha_inicial,
           'fecha_final' => $fecha_final
        );

        $query = $this->db->insert('facturas',$data);

        if($query)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
        
    }

    public function obtenerFactura($id_usuario)
    {
        $this->db->where('id_usuario',$id_usuario);
        $this->db->where('pagada',0);

        $query = $this->db->get('facturas');
        
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

    public function marcarPagadoFactura($id_usuario)
    {
        $factura = $this->obtenerFactura($id_usuario);

        $time_today = new DateTime(NULL, new DateTimeZone(TIMEZONE));
        $today = $time_today->format("Y-m-d");

        $factura_final = new DateTime($factura->fecha_final, new DateTimeZone(TIMEZONE));
        $final = $factura_final->format("Y-m-d");

        if($today > $final)
        {
            $fecha_inicial = $today;
        }
        else
        {
            $factura_final->modify('+1 day');
            $fecha_inicial = $final;
        }

        $fecha_final_new = new DateTime($fecha_inicial, new DateTimeZone(TIMEZONE));
        $fecha_final_new->modify('+1 month');
        $fecha_final = $fecha_final_new->format("Y-m-d");



        $status = $this->db->update('facturas', array('pagada' => 1), array('id_factura' => $factura->id_factura));

        $this->Auth_model->activarUsuario($id_usuario);

        if($status)
        {
            $this->agregarFacturaEspecifica($id_usuario,$fecha_inicial,$fecha_final);
            return TRUE;
        }

        return FALSE;
    }


    public function obtenerIndicios()
    {
        $indicios = NULL;

        $this->db->order_by("fecha", "desc");

        $query = $this->db->get('indicios');
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $indicio)
            {
                $indicios[] = $indicio;
            }

            return $indicios;
        }
        else
        {
            return NULL;
        }
    }

    public function obtenerCalendario()
    {

        $query = $this->db->get('calendarios');
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $calendario)
            {
                return $calendario;
            }

            //return $indicios;
        }
        else
        {
            return NULL;
        }
    }


    public function tienePase($id_usuario = NULL)
    {
        $this->db->where('id_usuario',$id_usuario);
        $this->db->or_where('ip', $_SERVER['REMOTE_ADDR']);

        $query = $this->db->get('indicios_temporal');

        if($query->num_rows() > 0 )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }

    public function paseActivo($id_usuario = NULL)
    {
        $this->db->where('id_usuario',$id_usuario);
        $this->db->or_where('ip', $_SERVER['REMOTE_ADDR']);

        $query = $this->db->get('indicios_temporal');

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {
                $fecha_hoy_data = new DateTime(NULL, new DateTimeZone(TIMEZONE));
                $fecha_hoy = $fecha_hoy_data->format("Y-m-d");

                $fecha_inicial_data = new DateTime($inf->fecha_inicio, new DateTimeZone(TIMEZONE));
                $fecha_inicial_data->modify('+7 day');
                $fecha_inicial = $fecha_inicial_data->format("Y-m-d");

                if($fecha_inicial >= $fecha_hoy)
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }

            }
        }
    }

    public function crearPase($id_usuario = NULL)
    {

        $fecha_hoy_data = new DateTime(NULL, new DateTimeZone(TIMEZONE));
        $fecha_hoy = $fecha_hoy_data->format("Y-m-d");

        $pase = array(
           'id_usuario' => $id_usuario,
           'ip' => $_SERVER['REMOTE_ADDR'],
           'fecha_inicio' => $fecha_hoy
        );

        $query = $this->db->insert('indicios_temporal',$pase); 

        if($query)
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
?>