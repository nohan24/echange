<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {

	public function checkLogin($user, $passw)
	{
		if($user == 'admin' && $passw == 'root'){
			$this->session->set_userdata('user','admin');
			return true;
		}
		return false;
	}

}
