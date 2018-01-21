<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_model extends CI_Model {

	public $to;
    public $from = "soporte@academiadetrading.net";
    public $from_name = "Academia de Trading - Soporte";
	public $subject;
    public $message;

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
        

        $config = Array(   
            'protocol' => 'smtp',
            'smtp_host' => 'mail.academiadetrading.net',
            'smtp_port' => 25,
            'smtp_user' => 'soporte@academiadetrading.net',
            'smtp_pass' => '@Academia123',
            'smtp_timeout' => '30', //in seconds 
            'smtp_keepalive' => true,  
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        

 $config_local = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'smtp.mailtrap.io',
  'smtp_port' => 2525,
  'smtp_user' => 'fb384a47eedc9f',
  'smtp_pass' => '65e9cd3717b8e4',
  'crlf' => "\r\n",
  'newline' => "\r\n",
   'mailtype'  => 'html', 
);
        



        /*$config = Array(   
            'protocol' => 'smtp',
            'smtp_host' => 'server231.web-hosting.com',
            'smtp_port' => 25,
            'smtp_user' => 'support@leohub.online',
            'smtp_pass' => 'supportleohub123',
            'smtp_timeout' => '30', //in seconds 
            'smtp_keepalive' => true,  
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );*/

        /*$config = Array(      
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );*/
        
        $this->load->library('email',$config_local);


        
	}

	/**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setTo($email)
    {
        $this->to = $email;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }


	public function sendMail($type = "general")
	{

        $this->email->from($this->from, $this->from_name);
        $this->email->to($this->to);

        if($type == "general")
        {
            $this->email->subject($this->subject);
            $message_html = $this->load->view('mails/general_mail_format',$this->message,TRUE);
            $this->email->message($message_html);
        }


        if($this->email->send())
        {
            return TRUE;
        }

        return FALSE;
        
        
	}

    public function deBug()
    {
        echo $this->email->print_debugger(array('headers'));
    }


}
?>