<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matriz_model extends CI_Model {



    public $matriz_niveles_a_mostrar = 1;
    public $matriz_array = NULL;
    public $matriz_inicio = NULL; 
    public $matriz_chart = array();
    public $matriz_info_cuenta_inicial = NULL;

    public $circulo_niveles_a_mostrar = 2;
    public $circulo_array = NULL;
    public $circulo_inicio = NULL; 
    public $circulo_chart = array();
    public $circulo_info_cuenta_inicial = NULL;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }


    /******************************************************************************************************

    *****************************************

    SISTEMA DE MATRIZ 1*2

    ******************************************

    ****************************************************************************************************/

    public function obtenerMatrizCompletasTotal()
    {
        $old_matriz_list = NULL;

        $this->db->where('completa',1);

        $query = $this->db->get('matriz');
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $matriz)
            {
                $old_matriz_list[] = $matriz;
            }
        }

        return $old_matriz_list;
    }



    public function obtenerMatrizCompletas($id_usuario)
    {
        $old_matriz_list = NULL;

        $this->db->where('id_usuario',$id_usuario);
        $this->db->where('completa',1);

        $query = $this->db->get('matriz');
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $matriz)
            {
                $old_matriz_list[] = $matriz;
            }
        }

        return $old_matriz_list;
    }

    public function obtenerCuentaMatriz($id_matriz)
    {
        $this->db->where('id_matriz',$id_matriz);

        $this->db->join('usuarios_data', 'usuarios_data.id_usuario = matriz.id_usuario');
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query_cuentas = $this->db->get('matriz');

        if($query_cuentas->num_rows() > 0)
        {
            foreach ($query_cuentas->result() as $query_cuenta)
            {
                return $query_cuenta;
            }
        }
        else
        {
            return NULL;
        }
    }

    public function obtenerRaizMatriz()
    {

        $this->db->join('usuarios_data', 'usuarios_data.id_usuario = matriz.id_usuario');
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');


        $query_cuentas = $this->db->get('matriz');

        if($query_cuentas->num_rows() > 0)
        {
            foreach ($query_cuentas->result() as $query_cuenta)
            {
                return $query_cuenta;
            }
        }
        else
        {
            return NULL;
        }
    }

    public function obtenerMatrizActiva($id_usuario)
    {

        $this->db->where('completa',0);

        $this->db->where('matriz.id_usuario',$id_usuario);

        $this->db->join('usuarios_data', 'usuarios_data.id_usuario = matriz.id_usuario');
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query_cuentas = $this->db->get('matriz');

        if($query_cuentas->num_rows() > 0)
        {
            foreach ($query_cuentas->result() as $query_cuenta)
            {
                return $query_cuenta;
            }
        }
        else
        {
            return NULL;
        }
    }

    public function crearMatriz($id_inicio)
    {
        $this->db->where('matriz_hasta',$id_inicio);

        $query_hijos = $this->db->get('matriz_relaciones');
        
        $h_n = 0;

        $nivel = 1;

        $this->matriz_info_cuenta_inicial = $this->obtenerCuentaMatriz($id_inicio);

        $this->matriz_inicio = $id_inicio;

        $this->matriz_chart = array('chart' => array('container' => '#matriz_nivel_1', 'connectors' => array('type' => 'step'), 'node' => array('HTMLclass' => 'nodeCss')));

        $this->matriz_chart = $this->matriz_chart + array('nodeStructure' => array('text' => array('name' => 'Tu', 'title' => 'Inicio'), 'HTMLclass' => ''));

        if($query_hijos->num_rows() > 0)
        {
            foreach ($query_hijos->result() as $relacion_hijo)
            {
                $info_hijo = $this->obtenerCuentaMatriz($relacion_hijo->matriz_desde);

                if($info_hijo->referido == $this->matriz_info_cuenta_inicial->id_usuario)
                {
                    $this->matriz_chart['nodeStructure']['children'][$h_n] = array('text' => array('name' => $info_hijo->nombre." (Directo)", 'title' => 'Code : '.$info_hijo->id_usuario), 'HTMLclass' => 'nodeCssDirect');
                }
                else
                {
                    $this->matriz_chart['nodeStructure']['children'][$h_n] = array('text' => array('name' => $info_hijo->nombre, 'title' => 'Code : '.$info_hijo->id_usuario), 'HTMLclass' => '');
                }

                

                $this->matriz_chart['nodeStructure']['children'][$h_n] = $this->recursivoCrearMatriz($relacion_hijo->matriz_desde,$this->matriz_chart['nodeStructure']['children'][$h_n],$nivel);

                $h_n++;

            }
        }

        return (object) $this->matriz_chart;
    }

    public function recursivoCrearMatriz($id_busqueda,$array_padre,$nivel)
    {
        $n_n = 0;

        $this->db->where('matriz_hasta',$id_busqueda);

        $query_nietos = $this->db->get('matriz_relaciones');


        $nivel++;

        if($query_nietos->num_rows() > 0)
        {
            foreach ($query_nietos->result() as $relacion_nieto)
            {
                $info_hijo = $this->obtenerCuentaMatriz($relacion_nieto->matriz_desde);

                if($nivel > $this->matriz_niveles_a_mostrar)
                {
                    return $array_padre;
                }

                if($info_hijo->referido == $this->matriz_info_cuenta_inicial->id_usuario)
                {
                    $array_padre['children'][$n_n] = array('text' => array('name' => $info_hijo->nombre." (Directo)", 'title' => 'Code : '.$info_hijo->id_usuario), 'HTMLclass' => 'nodeCssDirect');
                }
                else
                {
                    $array_padre['children'][$n_n] = array('text' => array('name' => $info_hijo->nombre, 'title' => 'Code : '.$info_hijo->id_usuario), 'HTMLclass' => '');
                }

                
                $array_padre['children'][$n_n] = $this->recursivoCrearMatriz($relacion_nieto->matriz_desde,$array_padre['children'][$n_n],$nivel);


                $n_n++;

            }
        }

        return $array_padre;

    }



    public function asignarRelacionMatriz($id_matriz_desde,$id_matriz_hasta)
    {
        if($id_matriz_desde == $id_matriz_hasta)
        {
            return;
        }

        $data = array(
           'matriz_desde' => $id_matriz_desde,
           'matriz_hasta' => $id_matriz_hasta
        );

        $query = $this->db->insert('matriz_relaciones',$data); 

        if($query)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function asignarRelacionDerrameMatriz($id_matriz_desde,$id_matriz_hasta)
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

            $query_sons = $this->db->get('matriz_relaciones');



            if($query_sons->num_rows() > 0)
            {
                if($query_sons->num_rows() == 1)
                {
                    $this->asignarRelacionMatriz($id_matriz_desde,$nodo);
                    break 1;
                    
                }
                else
                {
                    foreach ($query_sons->result() as $son)
                    {
                        array_push($cola,$son->matriz_desde);
                    }
                }
            }
            else
            {

                $this->asignarRelacionMatriz($id_matriz_desde,$nodo);
                break 1;
                
            }
        }
    }



    public function agregarCuentaMatriz($id_usuario,$temp = NULL)
    {

        $data = array(
           'id_usuario' => $id_usuario,
           'temp' => $temp
        );

        $query = $this->db->insert('matriz',$data);


        if($query)
        {
            $matriz_id = $this->db->insert_id();

            if($temp == NULL)
            {
                $this->agregarCuentaAMatriz($matriz_id);

                return TRUE;
            }
            else
            {
                return $matriz_id;
            }
            
        }
        else
        {
            return FALSE;
        }
        
        
    }

    public function agregarCuentaAMatriz($id_matriz)
    {
        $account = $this->obtenerCuentaMatriz($id_matriz);

        $ref_matriz = $this->obtenerMatrizActiva($account->referido);

        if($ref_matriz != NULL)
        {
            
            $this->asignarRelacionDerrameMatriz($id_matriz,$ref_matriz->id_matriz);

            $father = $this->obtenerPadreMatriz($id_matriz,1);

            if($father && $this->matrizEstaLista($father))
            {

                $this->matriz_array = NULL;

                $father_account = $this->obtenerCuentaMatriz($father);

                if($father_account->temp == NULL)
                {

                    /*if($this->Matriz_model->obtenerCirculoActivo($father_account->id_usuario) == NULL)
                    {
                        $this->Academia_model->agregarGanancia($father_account->id_usuario,210,"Pago por Completar Matriz");
                        $this->Academia_model->agregarGanancia($father_account->id_usuario,40,"Pago mensualidad",1);
                        $this->Academia_model->agregarGanancia($father_account->id_usuario,250,"Nueva Matriz",1);
                        $this->agregarCuentaCirculo($father_account->id_usuario);
                        $this->Academia_model->marcarPagadoFactura($father_account->id_usuario);
                    }
                    else
                    {*/
                        $this->Academia_model->agregarGanancia($father_account->id_usuario,100,"Pago por Completar Matriz");
                        $this->Academia_model->agregarGanancia($father_account->id_usuario,150,"Nueva Matriz",1);
                    //}

                }

                $this->agregarCuentaMatriz($father_account->id_usuario);
                


                /*$this->giveEarnings($father_account->id_usuario,570,"Matriz de 150$ Terminada");
                $this->giveEarnings($father_account->id_usuario,150,"Nueva Matriz de 150$",1);
                $this->giveEarnings($father_account->id_usuario,80,"10% de comision de la pagina",1);*/
                
                //$this->Academia_model->agregarGanancia($id_usuario,$cantidad,$razon = "Sin asignar");
                

                
                $this->marcarMatrizComoCompletada($father);
            }
            else
            {
                $this->matriz_array = NULL;
            }

        }
        else
        {
            if($account->referido != NULL)
            {
                $matriz_padre = $this->agregarCuentaMatriz($account->referido,1);

                $this->asignarRelacionDerrameMatriz($id_matriz,$matriz_padre);
            }

        }


    }

    public function obtenerPadreMatriz($id_matriz,$n)
    {
        for ($i=0; $i < $n; $i++) 
        { 
            $this->db->where('matriz_desde',$id_matriz);

            $query_father = $this->db->get('matriz_relaciones');

            if($query_father->num_rows() > 0)
            {
                foreach ($query_father->result() as $father)
                {
                    $id_matriz = $father->matriz_hasta;
                    
                }
            }
            else
            {
                return FALSE;
            }

        }


        return $id_matriz;
            
    }


    public function matrizEstaLista($id_matriz_inicio, $nivel = 1)
    {
        if($nivel > 3)
        {
            return;
        }

        $this->db->where('matriz_hasta',$id_matriz_inicio);

        $query_hijos = $this->db->get('matriz_relaciones');

        
        if($query_hijos->num_rows() > 0)
        {

            foreach ($query_hijos->result() as $hijo)
            {
                $this->matriz_array[$nivel][] = $hijo->matriz_desde;
                $this->matrizEstaLista($hijo->matriz_desde,($nivel+1)); 
            }
            
        }

   

        

        if(isset($this->matriz_array[1]) && count($this->matriz_array[1]) == 2)
        {
            
            return TRUE;
        }
        else
        {
            return FALSE;
        }

        return FALSE;
    }

    

    public function marcarMatrizComoCompletada($id_matriz)
    {
        
        $status = $this->db->update('matriz', array('completa' => 1), array('id_matriz' => $id_matriz));


        if($status)
        {
            return TRUE;
        }
    }

    

    /******************************************************************************************************

    *****************************************

    SISTEMA DE COMPENSACION PAGO 100% REFERIDO

    ******************************************

    ****************************************************************************************************/

    public function obtenerCuentaCirculo($id_circulo)
    {
        $this->db->select('usuario, nombre, apellido, usuarios_data.id_usuario, id_circulo, imagen, usuarios_data.id_persona, referido, circulo.id_usuario, usuarios_personas.id_persona');
        
        $this->db->where('id_circulo',$id_circulo);

        $this->db->join('usuarios_data', 'usuarios_data.id_usuario = circulo.id_usuario');
        $this->db->join('usuarios_personas', 'usuarios_personas.id_persona = usuarios_data.id_persona', 'left');

        $query = $this->db->get('circulo');
        
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

    public function obtenerCirculoActivo($id_usuario)
    {

        $this->db->select('usuario, nombre, apellido, usuarios_data.id_usuario, id_circulo, imagen, usuarios_data.id_persona, referido, circulo.id_usuario, usuarios_personas.id_persona');

        $this->db->where('circulo.id_usuario',$id_usuario);

        $this->db->join('usuarios_data', 'usuarios_data.id_usuario = circulo.id_usuario');
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('circulo');
        

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
        $this->db->select('usuario, nombre, apellido, usuarios_data.id_usuario, id_circulo, imagen, usuarios_data.id_persona, referido, circulo.id_usuario, usuarios_personas.id_persona');

        $this->db->join('usuarios_data', 'usuarios_data.id_usuario = circulo.id_usuario');
        $this->db->join('usuarios_personas', 'usuarios_data.id_persona = usuarios_personas.id_persona', 'left');

        $query = $this->db->get('circulo');
       
        
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
        $circulo = $this->obtenerCirculoActivo($id_usuario);

        $lista_hijos = NULL;

        $this->db->where('circulo_hasta',$circulo->id_circulo);

        $query_hijos = $this->db->get('circulo_relaciones');

        $n = 0;

        if($query_hijos->num_rows() > 0)
        {
            foreach ($query_hijos->result() as $relacion_hijo)
            {
                $lista_hijos[$n] = $this->obtenerCuentaCirculo($relacion_hijo->circulo_desde);
                $n++;
            }
        }

        return $lista_hijos;

    }

    public function obtenerListaCirculo2($id_usuario)
    {
        $circulo = $this->obtenerCirculoActivo($id_usuario);

        $lista_hijos = NULL;

        $this->db->where('circulo_hasta',$circulo->id_circulo);

        $query_hijos = $this->db->get('circulo_relaciones');

        $n = 0;

        if($query_hijos->num_rows() > 0)
        {
            foreach ($query_hijos->result() as $relacion_hijo)
            {
                $this->db->where('circulo_hasta',$relacion_hijo->circulo_desde);

                $query_nietos = $this->db->get('circulo_relaciones');

                if($query_nietos->num_rows() > 0)
                {
                    foreach ($query_nietos->result() as $relacion_nieto)
                    {
                        $lista_hijos[$n] = $this->obtenerCuentaCirculo($relacion_nieto->circulo_desde);
                        $n++;
                    }
                }
            }
        }

        return $lista_hijos;

    }

    

    public function crearCirculo($id_inicio)
    {
        $this->db->where('circulo_hasta',$id_inicio);

        $query_hijos = $this->db->get('circulo_relaciones');

        $h_n = 0;

        $nivel = 1;

        $this->circulo_info_cuenta_inicial = $this->obtenerCuentaCirculo($id_inicio);

        $this->circulo_inicio = $id_inicio;

        $this->circulo_chart[] = array('key' => 'Tu',  'color' => 'blues[0]', 'everExpanded' => false) ;

        //echo "{ key: Tu, color: blues[0], everExpanded: false }";

        if($query_hijos->num_rows() > 0)
        {
            foreach ($query_hijos->result() as $relacion_hijo)
            {
                $this->recursivoCrearCirculo($relacion_hijo->circulo_desde,"Tu",$nivel);
            }
        }



        return $this->circulo_chart;
    }

    public function recursivoCrearCirculo($id_busqueda,$padre,$nivel)
    {
        $info_hijo = $this->obtenerCuentaCirculo($id_busqueda);

        if($info_hijo->referido == $this->circulo_info_cuenta_inicial->id_usuario)
        {
            $padre = array('key' => $info_hijo->nombre, 'parent' => $padre, 'rootdistance' => 1);

            if($nivel >= $this->circulo_niveles_a_mostrar)
            {
                $this->circulo_chart[] = $padre + array('isLeaf' => true);
                return;
            }
        }
        else
        {
            $padre = array('key' => $info_hijo->nombre, 'parent' => $padre, 'rootdistance' => 1);

            if($nivel >= $this->circulo_niveles_a_mostrar)
            {
                $this->circulo_chart[] = $padre + array('isLeaf' => true);
                return;
            }
        }

        $n_n = 0;

        $this->db->where('circulo_hasta',$id_busqueda);

        $query_nietos = $this->db->get('circulo_relaciones');
        
        $nivel++;

        if($query_nietos->num_rows() > 0)
        {
            $this->circulo_chart[] = $padre;

            foreach ($query_nietos->result() as $relacion_nieto)
            {

                if($nivel > $this->circulo_niveles_a_mostrar)
                {
                    return;
                }

                
                $this->recursivoCrearCirculo($relacion_nieto->circulo_desde,$info_hijo->nombre,$nivel);


                $n_n++;

            }
        }
        else
        {
            if($nivel >= $this->circulo_niveles_a_mostrar)
            {
                $this->circulo_chart[] = $padre + array('isLeaf' => true);
            }

        }

        return;

    }

    



    public function asignarRelacion($id_circulo_desde,$id_circulo_hasta)
    {
        if($id_circulo_desde == $id_circulo_hasta)
        {
            return;
        }

        $data = array(
           'circulo_desde' => $id_circulo_desde,
           'circulo_hasta' => $id_circulo_hasta
        );

        $query = $this->db->insert('circulo_relaciones',$data); 

        if($query)
        {
            $cuenta_circulo = $this->obtenerCuentaCirculo($id_circulo_desde);

            /*$this->darGanancias($id_circulo_hasta,5,"Parte Circulo 1 - (".$cuenta_circulo->nombre." ".$cuenta_circulo->apellido.")");*/

            $padre = $this->obtenerPadreCirculo($id_circulo_desde,2);

            if($padre)
            {

                $account = $this->obtenerCuentaCirculo($padre);

                $this->Academia_model->agregarGanancia($account->id_usuario,10,"Pago Circulo 2 (".$cuenta_circulo->nombre." ".$cuenta_circulo->apellido.")");

                $cuenta_referido = $this->obtenerCirculoActivo($account->referido);

                if($cuenta_referido != NULL)
                {
                    $this->Academia_model->agregarGanancia($account->referido,10,"Pago por bono de igualdad (".$cuenta_circulo->nombre." ".$cuenta_circulo->apellido.")");
                }
                else
                {
                    $this->darGanancias(0,10,"Pago por parte de referido (Sistema)");
                }

                

                /*$this->darGanancias($padre,10,"Parte Circulo 2 - (".$cuenta_circulo->nombre." ".$cuenta_circulo->apellido.")");

                if($cuenta_referido != NULL)
                {
                    $this->darGanancias($cuenta_referido->id_circulo,10,"Pago por parte de referido (".$cuenta_referido->nombre." ".$cuenta_referido->apellido.")");
                }
                else
                {
                    $this->darGanancias(0,10,"Pago por parte de referido (Sistema)");
                }*/

            }
            else
            {
                //$this->darGanancias($padre,20,"Parte Circulo 2");
            }

            

            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function asignarRelacionDerrame($id_circulo_desde,$id_circulo_hasta)
    {
        if($id_circulo_desde == $id_circulo_hasta)
        {
            return;
        }

        $cola = array();

        array_push($cola, $id_circulo_hasta);

        while(!empty($cola))
        {

            $nodo = array_shift($cola); //Sacamos el primero de la cola

            $this->db->where('circulo_hasta',$nodo);

            $query_hijos = $this->db->get('circulo_relaciones');

            if($query_hijos->num_rows() > 0)
            {
                if($query_hijos->num_rows() >= 3)
                {
                    foreach ($query_hijos->result() as $hijo)
                    {
                        array_push($cola,$hijo->circulo_desde);
                    }
                }
                else
                {
                    $this->asignarRelacion($id_circulo_desde,$nodo);
                    break 1;
                }
            }
            else
            {

                $this->asignarRelacion($id_circulo_desde,$nodo);
                break 1;
                
            }
        }
    }

    public function agregarCuentaCirculo($id_usuario)
    {

        $data = array(
           'id_usuario' => $id_usuario
        );

        $query = $this->db->insert('circulo',$data);

        if($query)
        {
            $circulo_id = $this->db->insert_id();

            $this->agregarCuentaACirculo($circulo_id);

            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
        
    }

    public function agregarCuentaACirculo($id_circulo)
    {

        $account = $this->obtenerCuentaCirculo($id_circulo);


        $ref_circulo = $this->obtenerCirculoActivo($account->referido);

        
        if($ref_circulo != NULL)
        {
          

            $this->asignarRelacionDerrame($id_circulo,$ref_circulo->id_circulo);
            
            $padre = $this->obtenerPadreCirculo($id_circulo,1);


            while($padre) 
            {
                /*if($this->debePagar($padre))
                {

                    $cuenta_padre = $this->obtenerCuentaCirculo($padre);

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
                }*/


                $padre = $this->obtenerPadreCirculo($padre,1);


            }

        }

    }


    public function obtenerPadreCirculo($id_circulo,$n)
    {
        for ($i=0; $i < $n; $i++) 
        { 
            $this->db->where('circulo_desde',$id_circulo);

            $query_padre = $this->db->get('circulo_relaciones');
           
            if($query_padre->num_rows() > 0)
            {
                foreach ($query_padre->result() as $padre)
                {
                    $id_circulo = $padre->circulo_hasta;
                }
            }
            else
            {
                return FALSE;
            }

        }

        return $id_circulo;
            
    }

    public function desactivarCirculo($id_usuario)
    {
        
        $status = $this->db->update('circulo', array('id_usuario' => NULL), array('id_usuario' => $id_usuario));


        if($status)
        {
            return TRUE;
        }
    }


}
?>