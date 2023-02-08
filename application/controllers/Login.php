<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login_user');	
	}

	public function admin()
	{
		$this->load->model('login_model');
		$data['admin'] = $this->login_model->get_admin();
		$this->load->view('login_admin',$data);
	}

	public function adminlog()
	{
		$this->load->model('login_model');	
		$var = $this->login_model->checkAdmin($_POST['mail'],$_POST['pwd']);
		if($var == 0){
			redirect(site_url('admin/'));
		}else{
			$data['error'] = $var;
			$data['admin'] = $this->login_model->get_admin();;
			$this->load->view('login_admin', $data);
		}
	}

	public function inscription()
	{
		$this->load->view('sign');
	}

	public function userlog()
	{
		$this->load->model('login_model');
		$var = $this->login_model->checkUser($_POST['mail'],$_POST['pwd']);
		if($var == 0){
			redirect(site_url('home/'));
		}else{
			$data['error'] = $var;
			$this->load->view('login_user', $data);
		}
	}

	public function useradd()
	{
		$this->load->model('login_model');
		$var = $this->login_model->inscription($_POST['mail'],$_POST['nom'],$_POST['pwd']);
		$data['error'] = $var;
		if($var == 0){
			$this->load->view('login_user', $data);
		}else{
			$this->load->view('sign',$data);
		}
	}

	public function logout()
	{
		session_start();
		session_destroy();
		redirect(site_url('login/'));
	}
}
