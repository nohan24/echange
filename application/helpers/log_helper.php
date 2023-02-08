<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('is_log')){

    function is_log_user(){
        if(!isset($_SESSION['user'])){
            redirect(site_url('login/'));
        }
    }

    function is_log_admin(){
        if(!isset($_SESSION['admin'])){
            redirect(site_url('login/'));
        }
    }
    
}