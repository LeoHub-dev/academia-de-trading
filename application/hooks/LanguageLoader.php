<?php
class LanguageLoader
{
    function initialize() 
    {
        $ci =& get_instance();
        $ci->load->helper('language');

        $site_lang = $ci->session->userdata('site_lang');
        
        if($site_lang) 
        {
            $ci->lang->load('words',$ci->session->userdata('site_lang'));
            $ci->lang->load('data',$ci->session->userdata('site_lang'));
        } 
        else 
        {
            $ci->lang->load('words','spanish');
            $ci->lang->load('data','spanish');

        }
    }
}