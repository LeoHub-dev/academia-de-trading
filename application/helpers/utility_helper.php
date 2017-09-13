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


?>