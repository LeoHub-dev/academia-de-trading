<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Academia_model extends CI_Model 
{
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function verificarMensualidad()
    {

        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('usuarios_data');

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {
                if($this->debePagar($inf))
                {
                    if($inf->tipo != 3 || $inf->tipo != 5 || $inf->tipo != 6)
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
                    else
                    {
                        $ganancias = $this->listaGanancias($inf->id_usuario);
                        $costo_mensualidad = 40;
                        $total_ganancias = 0;

                        foreach ((array) $ganancias as $ganancia) 
                        {

                            if($ganancia->pagada == 0)
                            {
                                $total_ganancias = $total_ganancias + $ganancia->cantidad;
                               
                            }
            
                        }

                        if($total_ganancias >= $costo_mensualidad)
                        {
                            foreach ((array) $ganancias as $ganancia) 
                            {
  
                                if($costo_mensualidad >= $ganancia->cantidad)
                                {
                                    $this->Panel_model->marcarPagado($ganancia->id_ganancia);
                                    $costo_mensualidad = $costo_mensualidad - $ganancia->cantidad;

                                }
                                else
                                {
                                    $monto_ganancia = $ganancia->cantidad - $costo_mensualidad;
                                    $this->agregarGanancia($inf->id_usuario,$costo_mensualidad,$ganancia->razon,1);
                                    $this->editarGanancia($ganancia->id_ganancia,$monto_ganancia);   
                                    $costo_mensualidad = $costo_mensualidad - $monto_ganancia;
                                }

                                if($costo_mensualidad <= 0)
                                {
                                    $this->marcarPagadoFactura($inf->id_usuario);
                                    if($this->Matriz_model->obtenerCirculoActivo($inf->id_usuario) == NULL)
                                    {
                                        $this->Matriz_model->agregarCuentaCirculo($inf->id_usuario);
                                    }
                                }
                                
                            }
                        }
                        else
                        {
                            $this->Matriz_model->desactivarCirculo($inf->id_usuario);
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


    public function debePagar($usuario)
    {
        if ($usuario->tipo == 2 || $usuario->tipo == 1 ||
           $this->Matriz_model->obtenerCirculoActivo($usuario->id_usuario) == NULL ||
           $this->Matriz_model->obtenerMatrizActiva($usuario->id_usuario) != NULL
        ) {
            return FALSE;
        }

        $factura = $this->obtenerFactura($usuario->id_usuario);

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

    public function agregarGanancia($id_usuario,$cantidad,$razon = "Sin asignar",$pagada = 0)
    {

        $data = array(
           'id_usuario' => $id_usuario,
           'cantidad' => $cantidad,
           'razon' => $razon,
           'pagada' => $pagada
        );

        $query = $this->db->insert('ganancias',$data);

        if($query)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
        
    }

    public function editarGanancia($id_ganancia,$monto)
    {
        $status = $this->db->update('ganancias', array('cantidad' => $monto), array('id_ganancia' => $id_ganancia));

        if($status)
        {
            return TRUE;
        }

        return FALSE;
    }

    public function listaGanancias($id_usuario)
    {
        $lista_ganancias = NULL;

        $this->db->where('id_usuario',$id_usuario);

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
        $query = $this->db->insert('facturas', [
	            'id_usuario' => $id_usuario,
	         'fecha_inicial' => $fecha_inicial,
	           'fecha_final' => $fecha_final
        ]);

        if($query)
        {
            return TRUE;
        }

        return FALSE;
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
                $f = $cuenta;
            }
            return $f;
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



        $status = $this->db->update('facturas', array('pagada' => 1), array('id_usuario' => $id_usuario));

        //$this->Auth_model->activarUsuario($id_usuario);

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
        }
        else
        {
            return NULL;
        }
    }

    public function agregarPago($id_usuario, $hash_id)
    {
		$query = $this->db->insert('pagos',[
			'id_usuario' => $id_usuario,
			'hash_id' => $hash_id
		]);

		$user = $this->Auth_model->obtenerUsuarioID($id_usuario);
		$user2 = $user['data'];

		////Enviar email
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

        $this->Mail_model->sendMail();

        if($query)
        {
            return TRUE;
        }

        return FALSE;
    }

    public function listaPagosGeneral()
    {
        $lista_pagos = NULL;

        $query = $this->db->get('pagos');

        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $inf)
            {
                $lista_pagos[] = $inf;
            }
        }

        return $lista_pagos;
    }

    public function calcularMeses($fecha)
    {
        //FECHA ACTUAL
        $fechainicial = date('Y-m-d H:m:s');
        //SUMAMOS UN DIA A LA FECHA OBTENIDA CON EL FIN DE OBTENER EL ULTIMO DIA DEL MES CUMPLIDO
        $ultimoDia = date ( 'Y-m-d H:m:s' , strtotime ( '+0 day', strtotime ( $fecha ) ) );
        //FECHA PRIMER PAGO
        $fecha_primer_pago = new DateTime($ultimoDia);
        //FECHA ACTUAL PARA CALCULAR LOS 6 MESES
        $date_actual = new DateTime($fechainicial);

        $diferencia = $date_actual->diff($fecha_primer_pago);

        $meses = ( $diferencia->y * 12 ) + $diferencia->m;

        return (int) $meses;
    }

    public function getUsersMesMin($iduser)
    {
        return $this->db->select('comisiones_diarias.id_usuario,MIN(comisiones_diarias.fecha) as fecha')
                    ->from('comisiones_diarias')
                    ->where('comisiones_diarias.estatus', 'A')
                    ->where('comisiones_diarias.id_usuario', $iduser)
                    ->group_by('comisiones_diarias.id_usuario')
                    ->order_by('comisiones_diarias.fecha', 'ASC')
                    ->get()
                    ->result_object();
    }

    public function getUsesAll()
    {
        return $this->db
            ->select('coinbase_invoice.tipo,usuarios_personas.nombre,usuarios_personas.apellido,usuarios_personas.id_persona,usuarios_data.id_usuario')
            ->from('coinbase_invoice')
            ->join('usuarios_data', 'usuarios_data.id_usuario = coinbase_invoice.id_user')
            ->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona')
            ->where('coinbase_invoice.status', '1')
            ->where('coinbase_invoice.tipo', '5')
            ->get()
            ->result_object();
    }

    public function verificarAndUpdateUserMes($meses = 6)
    {
        //ESTATUS ---> L = LIQUIDADO && A = ACTIVO && I = INACTIVO
        //$users_paquete = $this->getUsersMesMin();
        $users = $this->getUsesAll();
        $array_users = [];

        foreach ($users as $value) {
            $user = $this->getUsersMesMin($value->id_usuario);
            if(count($user) > 0) {
                $mes = $this->calcularMeses($user[0]->fecha);
                //SI EL MES >= 6 ACTUALIZA EL ESTATUS DE TODOS LOS PAGOS A 'L'
                if ($mes >= $meses) {
                    $this->db->update('comisiones_diarias',
                        ['estatus' => 'L'],
                        ['id_usuario' => $user[0]->id_usuario, 'estatus' => 'A']);
                }
                else
                {
                    $array_users[] = $user[0]->id_usuario;
                }
            }
            else
            {
                $array_users[] = $value->id_usuario;
            }
        }

        return $array_users;
    }

    public function checkUserPaquete($id_user, $num)
    {
        $query = $this->db->from('coinbase_invoice')
                    ->where('coinbase_invoice.status', '1')
                    ->where('coinbase_invoice.tipo', $num)
                    ->where('coinbase_invoice.id_user', $id_user)
                    ->get();
        if($query->num_rows() > 0 )
        {
            return TRUE;
        }

        return FALSE;
    }

	public function listaPagosGeneralPaquete($num)
	{
	    //VERIFICAR SOLO LOS USUARIOS QUE ESTAN EN LA LISTA
        $usuarios = $this->verificarAndUpdateUserMes();

        if(count($usuarios) >= 0 && !empty($usuarios))
        {
	      $query = $this->db
				->select('coinbase_invoice.tipo,usuarios_personas.wallet_btc,usuarios_personas.wallet_ltc,
						usuarios_personas.wallet_bth,usuarios_personas.nombre,usuarios_personas.apellido,
						usuarios_data.usuario,usuarios_personas.id_persona,usuarios_data.id_usuario')
				->from('coinbase_invoice')
                ->join('usuarios_data', 'usuarios_data.id_usuario = coinbase_invoice.id_user')
				->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona')
				->where('coinbase_invoice.status', '1')
				->where('coinbase_invoice.tipo', $num)
                ->where_in('usuarios_data.id_usuario', $usuarios)
				->get()
				->result_object();

		  return $query;
        }
	}

	public function pagoConfirmados($id_usuario, $numpaquete = 5)
    {
        return $this->db->select('comisiones_diarias.id_usuario,comisiones_diarias.fecha,comisiones_diarias.razon,
                    comisiones_diarias.cantidad,comisiones_diarias.pagada')
                    ->from('comisiones_diarias')
                    ->join('usuarios_data', 'usuarios_data.id_usuario = comisiones_diarias.id_usuario')
                    ->where('comisiones_diarias.pagada', '1')
                    ->where_in('comisiones_diarias.estatus', ['A','L'])
                    ->where('comisiones_diarias.id_usuario', $id_usuario)
                    ->order_by('comisiones_diarias.fecha', 'ASC')
                    ->get()
                    ->result_object();
    }

    public function comprarPaquete($id_paquete)
    {
        //$usuario = $this->Auth_model->obtenerUsuarioID($this->session->userdata('id_usuario'))['data'];

        $saldo = $this->Saldo_model->obtenerSaldo($this->session->userdata('id_usuario'));

        if($id_paquete == 1)
        {
            
            if($saldo >= 50)
            {
                $this->Auth_model->activarUsuario($this->session->userdata('id_usuario'));
                $this->marcarPagadoFactura($this->session->userdata('id_usuario'));
                $this->verificarMensualidad();
                $this->Saldo_model->removerSaldo($this->session->userdata('id_usuario'),50,"Compra paquete Nº".$id_paquete);

                return TRUE;
            }
            else
            {
                return FALSE;
            }
                
        }
        else if($id_paquete == 3)
        {

            if($saldo >= 150)
            {

                $this->Auth_model->matrizUsuario($this->session->userdata('id_usuario'));
                //Agrego a la Matriz
                $this->Matriz_model->agregarCuentaMatriz($this->session->userdata('id_usuario'));

                $this->Auth_model->activarUsuario($this->session->userdata('id_usuario'));
                $this->Saldo_model->removerSaldo($this->session->userdata('id_usuario'),150,"Compra paquete Nº".$id_paquete);
                return TRUE;
            }
            else
            {
                return FALSE;
            }

            
        }
        else if($id_paquete == 4)
        {
            if($saldo >= 200){

                $this->Auth_model->matrizUsuario($this->session->userdata('id_usuario'));
                //Agrego a la Matriz
                //Agrego a los Circulos
                $this->Matriz_model->agregarCuentaMatriz($this->session->userdata('id_usuario'));
                $this->Matriz_model->agregarCuentaCirculo($this->session->userdata('id_usuario'));
                $this->Auth_model->activarUsuario($this->session->userdata('id_usuario'));

                $this->Saldo_model->removerSaldo($this->session->userdata('id_usuario'),200,"Compra paquete Nº".$id_paquete);
                return TRUE;
            }
            else
            {
                return FALSE;
            }
            
        }
        else if($id_paquete == 5)
        {
            if($saldo >= 1500){
                $this->Auth_model->activarUsuario($this->session->userdata('id_usuario'));
                $this->Saldo_model->removerSaldo($this->session->userdata('id_usuario'),1500,"Compra paquete Nº".$id_paquete);
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        
        }
        else if($id_paquete == 6)
        {
            if($saldo >= 500){
                $this->Auth_model->activarUsuario($this->session->userdata('id_usuario'));
                $this->Saldo_model->removerSaldo($this->session->userdata('id_usuario'),500,"Compra paquete Nº".$id_paquete);
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else if($id_paquete == 7)
        {
            if($saldo >= 2000){
                $this->Auth_model->activarUsuario($this->session->userdata('id_usuario'));
                $this->Saldo_model->removerSaldo($this->session->userdata('id_usuario'),2000,"Compra paquete Nº".$id_paquete);
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else if($id_paquete == 8)
        {

            if($saldo >= 1000){

                $this->Auth_model->matrizUsuario($this->session->userdata('id_usuario'));
                //Agrego a la Matriz
                $this->Matriz_Pro_model->agregarCuentaMatriz($this->session->userdata('id_usuario'));

                $this->Auth_model->activarUsuario($this->session->userdata('id_usuario'));

                $this->Saldo_model->removerSaldo($this->session->userdata('id_usuario'),1000,"Compra paquete Nº".$id_paquete);
                return TRUE;
            }
            else
            {
                return FALSE;
            }

            
        }

        return FALSE;
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }

}
?>