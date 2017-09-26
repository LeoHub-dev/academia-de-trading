<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Matriz_model extends CI_Model 
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

    public function obtenerCuenta($id_matriz)
    {
        $this->db->select('usuario, nombre, apellido, usuarios_data.id_usuario, id_matriz, imagen, usuarios_data.id_persona, referido, mineria');
        
        $this->db->where('id_matriz',$id_matriz);

        $this->db->join('usuarios_data', 'usuarios_data.id_usuario = matriz.id_usuario');
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('matriz');
        
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

    public function obtenerMatrizActiva($id_usuario)
    {

        $this->db->select('usuario, nombre, apellido, usuarios_data.id_usuario, id_matriz, imagen, usuarios_data.id_persona, referido, mineria');

        $this->db->where('matriz.id_usuario',$id_usuario);

        $this->db->join('usuarios_data', 'usuarios_data.id_usuario = matriz.id_usuario');
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('matriz');
        

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



    public function obtenerRaiz()
    {

        $this->db->join('usuarios_data', 'usuarios_data.id_usuario = matriz.id_usuario');
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('matriz');
       
        
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

    public function obtenerListaCirculo1($id_usuario)
    {
        $matriz = $this->obtenerMatrizActiva($id_usuario);

        $lista_hijos = NULL;

        $this->db->where('matriz_hasta',$matriz->id_matriz);

        $query_hijos = $this->db->get('relaciones');

        $n = 0;

        if($query_hijos->num_rows() > 0)
        {
            foreach ($query_hijos->result() as $relacion_hijo)
            {
                $lista_hijos[$n] = $this->obtenerCuenta($relacion_hijo->matriz_desde);
                $n++;
            }
        }

        return $lista_hijos;

    }

    public function obtenerListaCirculo2($id_usuario)
    {
        $matriz = $this->obtenerMatrizActiva($id_usuario);

        $lista_hijos = NULL;

        $this->db->where('matriz_hasta',$matriz->id_matriz);

        $query_hijos = $this->db->get('relaciones');

        $n = 0;

        if($query_hijos->num_rows() > 0)
        {
            foreach ($query_hijos->result() as $relacion_hijo)
            {
                $this->db->where('matriz_hasta',$relacion_hijo->matriz_desde);

                $query_nietos = $this->db->get('relaciones');

                

                if($query_nietos->num_rows() > 0)
                {
                    foreach ($query_nietos->result() as $relacion_nieto)
                    {
                        $lista_hijos[$n] = $this->obtenerCuenta($relacion_nieto->matriz_desde);
                        $n++;
                    }
                }
            }
        }

        return $lista_hijos;

    }

    

    public function crearMatriz($id_inicio)
    {
        $this->db->where('matriz_hasta',$id_inicio);

        $query_hijos = $this->db->get('relaciones');

        $h_n = 0;

        $nivel = 1;

        $this->info_cuenta_inicial = $this->obtenerCuenta($id_inicio);

        $this->matriz_inicio = $id_inicio;

        $this->chart[] = array('key' => 'Tu',  'color' => 'blues[0]', 'everExpanded' => false) ;

        //echo "{ key: Tu, color: blues[0], everExpanded: false }";

        if($query_hijos->num_rows() > 0)
        {
            foreach ($query_hijos->result() as $relacion_hijo)
            {
                $this->recursivoCrearMatriz($relacion_hijo->matriz_desde,"Tu",$nivel);
            }
        }



        return $this->chart;
    }

    public function recursivoCrearMatriz($id_busqueda,$padre,$nivel)
    {
        $info_hijo = $this->obtenerCuenta($id_busqueda);

        if($info_hijo->referido == $this->info_cuenta_inicial->id_usuario)
        {
            $padre = array('key' => $info_hijo->nombre, 'parent' => $padre, 'rootdistance' => 1);

            if($nivel >= $this->niveles_a_mostrar)
            {
                $this->chart[] = $padre + array('isLeaf' => true);
                return;
            }
        }
        else
        {
            $padre = array('key' => $info_hijo->nombre, 'parent' => $padre, 'rootdistance' => 1);

            if($nivel >= $this->niveles_a_mostrar)
            {
                $this->chart[] = $padre + array('isLeaf' => true);
                return;
            }
        }

        $n_n = 0;

        $this->db->where('matriz_hasta',$id_busqueda);

        $query_nietos = $this->db->get('relaciones');
        
        $nivel++;

        if($query_nietos->num_rows() > 0)
        {
            $this->chart[] = $padre;

            foreach ($query_nietos->result() as $relacion_nieto)
            {

                if($nivel > $this->niveles_a_mostrar)
                {
                    return;
                }

                
                $this->recursivoCrearMatriz($relacion_nieto->matriz_desde,$info_hijo->nombre,$nivel);


                $n_n++;

            }
        }
        else
        {
            if($nivel >= $this->niveles_a_mostrar)
            {
                $this->chart[] = $padre + array('isLeaf' => true);
            }

        }

        return;

    }

    



    public function asignarRelacion($id_matriz_desde,$id_matriz_hasta)
    {
        if($id_matriz_desde == $id_matriz_hasta)
        {
            return;
        }

        $data = array(
           'matriz_desde' => $id_matriz_desde,
           'matriz_hasta' => $id_matriz_hasta
        );

        $query = $this->db->insert('relaciones',$data); 

        if($query)
        {
            $cuenta_circulo = $this->obtenerCuenta($id_matriz_desde);

            $this->darGanancias($id_matriz_hasta,5,"Parte Circulo 1 - (".$cuenta_circulo->nombre." ".$cuenta_circulo->apellido.")");
            $padre = $this->obtenerPadre($id_matriz_desde,2);

            if($padre)
            {
                /*if($this->debePagar($padre) || $this->debePagarMineria($padre))
                {
                    $this->darGanancias($padre,20,"Parte Circulo 2");
                }
                else
                {*/


                $account = $this->obtenerCuenta($padre);

                $cuenta_referido = $this->obtenerMatrizActiva($account->referido);

                $this->darGanancias($padre,10,"Parte Circulo 2 - (".$cuenta_circulo->nombre." ".$cuenta_circulo->apellido.")");

                if($cuenta_referido != NULL)
                {
                    $this->darGanancias($cuenta_referido->id_matriz,10,"Pago por parte de referido (".$cuenta_referido->nombre." ".$cuenta_referido->apellido.")");
                }
                else
                {
                    $this->darGanancias(0,10,"Pago por parte de referido (Sistema)");
                }

                /*}*/
            }
            else
            {
                $this->darGanancias($padre,20,"Parte Circulo 2");
            }

            

            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function asignarRelacionDerrame($id_matriz_desde,$id_matriz_hasta)
    {
        if($id_matriz_desde == $id_matriz_hasta)
        {
            return;
        }

        $cola = array();

        array_push($cola, $id_matriz_hasta);

        while(!empty($cola))
        {

            $nodo = array_shift($cola); //Sacamos el primero de la cola

            $this->db->where('matriz_hasta',$nodo);

            $query_hijos = $this->db->get('relaciones');

            if($query_hijos->num_rows() > 0)
            {
                if($query_hijos->num_rows() >= 5)
                {
                    foreach ($query_hijos->result() as $hijo)
                    {
                        array_push($cola,$hijo->matriz_desde);
                    }
                }
                else
                {
                    $this->asignarRelacion($id_matriz_desde,$nodo);
                    break 1;
                }
            }
            else
            {

                $this->asignarRelacion($id_matriz_desde,$nodo);
                break 1;
                
            }
        }
    }

    public function agregarCuenta($id_usuario)
    {

        $data = array(
           'id_usuario' => $id_usuario
        );

        $query = $this->db->insert('matriz',$data);

        if($query)
        {
            $matriz_id = $this->db->insert_id();

            $this->agregarCuentaAMatriz($matriz_id);

            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
        
    }

    public function agregarCuentaAMatriz($id_matriz)
    {

        $account = $this->obtenerCuenta($id_matriz);


        $ref_matriz = $this->obtenerMatrizActiva($account->referido);

        
        if($ref_matriz == NULL)
        {
            $ref_matriz = $this->obtenerMatrizActiva($this->obtenerRaiz()->id_usuario);
        }

  

        $this->asignarRelacionDerrame($id_matriz,$ref_matriz->id_matriz);
        
        $padre = $this->obtenerPadre($id_matriz,1);


        while($padre) 
        {
            if($this->debePagar($padre))
            {



                $cuenta_padre = $this->obtenerCuenta($padre);

                $ganancias = $this->obtenerGanancias($padre);

                $factura = $this->obtenerFactura($cuenta_padre->id_usuario);


                $monto = $factura->monto;

                foreach ((array) $ganancias as $ganancia) 
                {
                    if($monto > 0)
                    {
                        if($monto >= $ganancia->monto)
                        {
                            $this->marcarPagado($ganancia->id_ganancia);
                            $monto = $monto - $ganancia->monto;

                        }
                        else
                        {
                            $monto_ganancia = $ganancia->monto - $monto;
                            $this->darGanancias($padre,$monto,$ganancia->razon,1);
                            $this->editarGanancia($ganancia->id_ganancia,$monto_ganancia);
                            $monto = $monto - $monto_ganancia;

                            
                        }

                        $this->editarFactura($factura->id_factura,$monto);
                    }


                    if($monto == 0)
                    {
                        $this->marcarPagadoFactura($factura->id_factura,$cuenta_padre->id_usuario);
                        break;
                    }
    
                }
            }
            else if($this->debePagarMineria($padre))
            {

                $cuenta_padre = $this->obtenerCuenta($padre);

                $ganancias = $this->obtenerGanancias($padre);

                $monto_mineria = $cuenta_padre->mineria;

                foreach ((array) $ganancias as $ganancia) 
                {
                    if($monto_mineria > 0)
                    {
                        if($monto_mineria >= $ganancia->monto)
                        {
                            $this->marcarPagado($ganancia->id_ganancia);
                            $monto_mineria = $monto_mineria - $ganancia->monto;
                            
                        }
                        else
                        {
                            $monto_ganancia = $ganancia->monto - $monto_mineria;
                            $this->darGanancias($padre,$monto_mineria,$ganancia->razon,1);
                            $this->editarGanancia($ganancia->id_ganancia,$monto_ganancia);
                            $monto_mineria = $monto_mineria - $monto_ganancia;
                            
                        }

                        $this->editarMontoMineria($cuenta_padre->id_usuario,$monto_mineria);
                    }

                    if($monto_mineria == 0)
                    {
                        $this->crearCuentaMineria($cuenta_padre);
                        //$this->darGanancias($padre,150,$ganancia->razon,1);
                        break;
                    }

    
                }

                
            }

            $padre = $this->obtenerPadre($padre,1);


        }

    }

    public function debePagar($id_matriz)
    {
        $cuenta = $this->obtenerCuenta($id_matriz);

        $factura = $this->obtenerFactura($cuenta->id_usuario);

        $dt1 = new DateTime("+1 month", new DateTimeZone(TIMEZONE));
        $today = $dt1->format("Y-m-d");

        $factura_date = new DateTime($factura->fecha_inicial, new DateTimeZone(TIMEZONE));
        $before = $factura_date->format("Y-m-d");

        if($before <= $today)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }

    public function debePagarMineria($id_matriz)
    {
        $cuenta = $this->obtenerCuenta($id_matriz);

        if($cuenta->mineria > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }


    }

    public function agregarFactura($id_usuario,$pagada = 0)
    {

        $dt1 = new DateTime(NULL, new DateTimeZone(TIMEZONE));
        $today = $dt1->format("Y-m-d");
        $dt2 = new DateTime("+1 month", new DateTimeZone(TIMEZONE));
        $date = $dt2->format("Y-m-d");

        if($pagada == 1)
        {
            $monto = 0;
        }
        else
        {
            $monto = 25;
        }

        $data = array(
           'id_usuario' => $id_usuario,
           'monto' => $monto,
           'fecha_inicial' => $today,
           'fecha_final' => $date
        );

        $query = $this->db->insert('facturas',$data);

        if($query)
        {
            if($pagada == 1)
            {
                $this->marcarPagadoFactura($this->db->insert_id(),$id_usuario);
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
           'monto' => 25,
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

    public function marcarPagadoFactura($id_factura,$id_usuario = 0)
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



        $status = $this->db->update('facturas', array('pagada' => 1), array('id_factura' => $id_factura));

        if($status)
        {
            $this->agregarFacturaEspecifica($id_usuario,$fecha_inicial,$fecha_final);
            return TRUE;
        }

        return FALSE;
    }

    public function editarFactura($id_factura,$monto)
    {
        $status = $this->db->update('facturas', array('monto' => $monto), array('id_factura' => $id_factura));

        if($status)
        {
            return TRUE;
        }

        return FALSE;
    }

    public function obtenerPadre($id_matriz,$n)
    {
        for ($i=0; $i < $n; $i++) 
        { 
            $this->db->where('matriz_desde',$id_matriz);

            $query_padre = $this->db->get('relaciones');
           
            if($query_padre->num_rows() > 0)
            {
                foreach ($query_padre->result() as $padre)
                {
                    $id_matriz = $padre->matriz_hasta;
                }
            }
            else
            {
                return FALSE;
            }

        }

        return $id_matriz;
            
    }

    public function darGanancias($id_matriz,$monto,$razon = "None",$pagada = 0)
    {
        $data = array(
           'id_matriz' => $id_matriz,
           'monto' => $monto,
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

    public function obtenerGanancias($id_matriz)
    {
        $ganancias = NULL;

        $this->db->where('id_matriz',$id_matriz);
        $this->db->where('pagada',0);

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

    public function obtenerGananciasTotal($id_matriz)
    {
        $ganancias = NULL;

        $this->db->where('id_matriz',$id_matriz);

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

    public function crearCuentaMineria($cuenta)
    {
        $respuesta = (object) array('response' => FALSE);

        $usuario = $cuenta->usuario;
        $password = getRandomCode(8);
        $email = $cuenta->email;

        var_dump($respuesta);

        while(!$respuesta->response)
        {
            // abrimos la sesión cURL
            $ch = curl_init();
             
            // definimos la URL a la que hacemos la petición
            curl_setopt($ch, CURLOPT_URL,"http://mineriadecriptomonedas.com/api/crear_usuario");
            // indicamos el tipo de petición: POST
            curl_setopt($ch, CURLOPT_POST, TRUE);
            // definimos cada uno de los parámetros
            curl_setopt($ch, CURLOPT_POSTFIELDS, "name=".$cuenta->nombre."&email=".$email."&username=".$usuario."&password=".$password."&repeat_password=".$password."&agree_terms=1&traders=554488");
             
            // recibimos la respuesta y la guardamos en una variable
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $remote_server_output = curl_exec ($ch);
             
            // cerramos la sesión cURL
            curl_close ($ch);
             
            // hacemos lo que queramos con los datos recibidos
            // por ejemplo, los mostramos
            $respuesta = json_decode($remote_server_output);

            //var_dump($remote_server_output);

            if($respuesta->response)
            {
                $data = array(
                   'id_usuario' => $cuenta->id_usuario,
                   'usuario' => $usuario,
                   'password' => $password
                );

                $query = $this->db->insert('cuenta_mineria',$data); 


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
                $usuario = $usuario.getRandomCode(3);
                $email = getRandomCode(1).$email;
            }
        }

        return;
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