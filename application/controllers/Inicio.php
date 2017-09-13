<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends LH_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();

	}


	public function index()
	{
		$this->load->view('Home_view',$this->scope);
	}


	public function send()
	{


		$data = array(
           'name' => $this->input->post('name'),
           'last_name' => $this->input->post('last_name'),
           'email' => $this->input->post('email'),
           'skype' => $this->input->post('skype'),
           'username' => $this->input->post('username'),
           'password' => $this->input->post('password'),
           'ref_name' => $this->input->post('ref_name'),
           'ref_last_name' => $this->input->post('ref_last_name'),
           'message' => $this->input->post('message'),
           'hash' => $this->input->post('hash')
        );


        $query = $this->db->insert('dolares',$data); 

        if($query)
        {
            echo response_good('Correcto','Has sido registrado correctamente. Ya puedes ingresar al sistema');
            die;
        }
        else
        {
            echo response_bad('Error - intente mas tarde');
            die;
        }   
	}

	



}
