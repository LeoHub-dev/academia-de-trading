<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class CalendarioPago_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function process_calendar_user_unique($data)
    {
        $semana = [];
        $fecha = [];
        $mes = [];
        $data_results = [];

        foreach ($data as $user) {
            if ($user->fecha != null || $user->fecha != "") {
                $numsemana = $this->getNumeroSemana($user->fecha);
                $yearFecha = $this->getNumeroYear($user->fecha);
                $mesFecha = $this->getNumeroMes($user->fecha);
                $diaFecha = $this->getStringDia($user->fecha);

                $fechaInitFin = $this->getFechaInitAndFechaFin($numsemana, $yearFecha);
                $dayporsemana = $this->getDatesNumberWeek($user->fecha);
                /*if(in_array($user->fecha, $fecha)) {

                }*/
                /*if (!in_array($mesFecha, $mes)) {
                    $mes[] = $mesFecha;
                    $data_results[$mesFecha] = [];
                }*/
                $data = (object)[
                    'monto' => $user->cantidad,
                    'id_usuario' => $user->id_usuario,
                    'id_comision' => $user->id_comision,
                    'nombre' => $user->nombre,
                    'apellido' => $user->apellido,
                    'usuario' => $user->usuario,
                    'fecha' => $user->fecha
                ];

                if (!in_array($numsemana, $semana)) {

                    $semana[] = $numsemana;

                    $data_results[$mesFecha][$numsemana] = $dayporsemana;

                    $data_results[$mesFecha][$numsemana][$diaFecha] = $data;

                } else {
                    $mesA = explode("-", $fechaInitFin[0])[1];
                    $mesB = explode("-", $fechaInitFin[1])[1];


                    if ($mesA == $mesB) {
                        $data_results[$mesFecha][$numsemana][$diaFecha] = $data;
                    } else {
                        $data_results[$mesA][$numsemana][$diaFecha] = $data;
                    }
                }
            }
        }
        /* echo "<pre>";
         print_r($data_results);
         echo "</pre>";
         exit;*/
        return $data_results;
    }

    public function process_calendar_user_all($data)
    {
        $users = [];
        $user_fecha = [];
        $data_results = [];
        foreach ($data as $user) {
            if ($user->fecha != null && $user->fecha != "" && !in_array([$user->fecha, $user->id_usuario], $user_fecha)) {

                $user_fecha[] = [$user->fecha, $user->id_usuario];

                $numsemana = $this->getNumeroSemana($user->fecha);
                $yearFecha = $this->getNumeroYear($user->fecha);
                $mesFecha = $this->getNumeroMes($user->fecha);
                $diaFecha = $this->getStringDia($user->fecha);

                $fechaInitFin = $this->getFechaInitAndFechaFin($numsemana, $yearFecha);
                $dayporsemana = $this->getDatesNumberWeek($user->fecha);

                $mesA = explode("-", $fechaInitFin[0])[1];
                $mesB = explode("-", $fechaInitFin[1])[1];

                $mescalculado = ($mesA == $mesB) ? $mesFecha : $mesA;

                $data = (object)[
                    'monto' => $user->cantidad,
                    'id_usuario' => $user->id_usuario,
                    'id_comision' => $user->id_comision,
                    'fecha' => $user->fecha
                ];

                $data_user = (object)[
                    'id_usuario' => $user->id_usuario,
                    'nombre' => $user->nombre,
                    'apellido' => $user->apellido,
                    'usuario' => $user->usuario
                ];

                if (!in_array([$numsemana, $user->id_usuario], $users)) {
                    $users[] = [$numsemana, $user->id_usuario];
                    $data_results[$mescalculado][$numsemana][$user->id_usuario] = $dayporsemana;
                    $data_results[$mescalculado][$numsemana][$user->id_usuario]['user'] = $data_user;
                    $data_results[$mescalculado][$numsemana][$user->id_usuario][$diaFecha] = $data;
                } else {
                    $data_results[$mescalculado][$numsemana][$user->id_usuario][$diaFecha] = $data;
                }
            }
        }

        /* echo "<pre>";
          print_r($user_fecha);
          echo "</pre>";
          exit;*/
        return $data_results;
    }

    public function getPagosDiariosAllUser()
    {
        $query = $this->db
            ->select('comisiones_diarias.id_usuario,comisiones_diarias.id_comision,
                    comisiones_diarias.cantidad,DATE_FORMAT(comisiones_diarias.fecha,"%Y-%m-%d") as fecha,usuarios_personas.nombre,
                    usuarios_personas.apellido,usuarios_data.usuario')
            ->from('comisiones_diarias')
            ->join('usuarios_personas', 'usuarios_personas.id_persona = comisiones_diarias.id_usuario')
            ->join('usuarios_data', 'usuarios_data.id_persona = comisiones_diarias.id_usuario')
            ->where('comisiones_diarias.pagada', '0')
            ->order_by('comisiones_diarias.fecha', 'ASC')
            ->get()
            ->result_object();

        $results = $this->process_calendar_user_all($query);

        //echo json_encode($results);
        /*echo "<pre>";
        print_r($results);
        echo "</pre>";*/
        //exit;
        return $results;
    }

    public function getPagosDiariosUser($idusuario)
    {
        $query = $this->db
            ->select('comisiones_diarias.id_usuario,comisiones_diarias.id_comision,
                    comisiones_diarias.cantidad,comisiones_diarias.fecha,usuarios_personas.nombre,
                    usuarios_personas.apellido,usuarios_data.usuario')
            ->from('comisiones_diarias')
            ->join('usuarios_personas', 'usuarios_personas.id_persona = comisiones_diarias.id_usuario')
            ->join('usuarios_data', 'usuarios_data.id_persona = comisiones_diarias.id_usuario')
            ->where('comisiones_diarias.id_usuario', $idusuario)
            ->order_by('comisiones_diarias.fecha', 'ASC')
            ->get()
            ->result_object();

        $results = $this->process_calendar_user_unique($query);

        return $results;
    }

    public function getFechaInitAndFechaFin($week, $year)
    {
        $dates[0] = date("Y-m-d", strtotime($year . 'W' . str_pad($week, 2, 0, STR_PAD_LEFT)));
        $dates[1] = date("Y-m-d", strtotime($year . 'W' . str_pad($week, 2, 0, STR_PAD_LEFT) . ' +6 days'));
        return $dates;
    }

    public function getDatesNumberWeek($fecha)
    {
        $dt = explode('-', $fecha);
        $year = (int)$dt[0];
        $first_week_no = $this->getNumeroSemana($fecha);

        $range = range($first_week_no, $first_week_no);
        foreach ($range as $week_no) {

            $week_start = new DateTime();
            $week_start->setISODate($year, $week_no);
            $week_start->modify('0 day');

            $seven_day_week = array('lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo');
            $week = array();

            for ($i = 0; $i < 7; $i++) {
                $day = $seven_day_week[$i];
                $week[$day] = $week_start->format('Y-m-d');
                $week_start->modify('+1 day');
            }

            return $week;
        }
    }

    public function getNumeroSemana($fecha)
    {
        return date("W", strtotime($fecha));
    }

    public function getStringDia($dia)
    {
        $dias = array('lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo');

        $fecha = $dias[date('N', strtotime($dia)) - 1];

        return $fecha;
    }

    public function getNumeroMes($fecha)
    {
        return explode('-', $fecha)[1];
    }

    public function getNumeroYear($fecha)
    {
        return explode('-', $fecha)[0];
    }


}

?>