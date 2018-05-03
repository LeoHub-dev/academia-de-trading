<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Saldo_model extends CI_Model {



    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }



    public function obtenerSaldo($id_usuario)
    {
        $total = 0;

        $this->db->where('id_usuario',$id_usuario);

        $query = $this->db->get('saldo');
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $saldo)
            {
                if($saldo->tipo == "+")
                {
                    $total = $total + $saldo->monto;
                }

                if($saldo->tipo == "-")
                {
                    $total = $total - $saldo->monto;
                }
                
            }
        }

        return $total;
    }




    public function agregarSaldo($id_usuario,$monto,$desc = "No desc")
    {

        $data = array(
           'id_usuario' => $id_usuario,
           'monto' => $monto,
           'tipo' => '+',
           'desc' => $desc
        );

        $query = $this->db->insert('saldo',$data);


        if($query)
        {

            //$this->db->insert_id();

            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
        
    }


    public function removerSaldo($id_usuario,$monto,$desc = "No desc")
    {

        $data = array(
           'id_usuario' => $id_usuario,
           'monto' => $monto,
           'tipo' => '-',
           'desc' => $desc
        );

        $query = $this->db->insert('saldo',$data);


        if($query)
        {

            //$this->db->insert_id();

            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
        
    }

    


}
?>