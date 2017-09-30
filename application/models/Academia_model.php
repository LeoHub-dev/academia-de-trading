<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Academia_model extends CI_Model 
{



    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
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

    public function __get($var)
    {
        return get_instance()->$var;
    }

}
?>