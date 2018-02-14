<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function asset_url()
{
   return base_url().'assets/';
}

function myHash($value)
{
    $hashed_value = sha1(md5(md5(sha1($value."jarcorPw")))); 
    return $hashed_value;
}

function response_good($response_title, $response_text, $extra = array())
{
	return json_encode(array('response' => true, 'response_title' => $response_title, 'response_text' => $response_text) + $extra);
}

function response_bad($errors)
{
	return json_encode(array('response' => false, 'errors' => $errors));
	
}

function getRandomCode($length = 10) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getmes($mes) {
    $meses = array(
        "01" => "Enero",
        "02" => "Febrero",
        "03" => "Marzo",
        "04" => "Abril",
        "05" => "Mayo",
        "06" => "Junio",
        "07" => "Julio",
        "08" => "Agosto",
        "09" => "Septiembre",
        "10" => "Octubre",
        "11" => "Noviembre",
        "12" => "Diciembre"
    );

    return $meses[$mes];
}

function calcular_ganancia_mensual ($dias) {
    $monto = 0;
    foreach ($dias as $dia => $m) {
        if ( is_object($m) ) {
            $monto += (float) $m->monto;
        }
    }

    return $monto;
}
?>