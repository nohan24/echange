<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function checkUser($email, $passw){
		$this->load->helper('email_helper');
		if ($email == '' || $passw == '') {
			return 1;
		}
		if(!valid_email($email)){
			return 2;
		}
		$sql = "select * from users where email=%s AND password=%s";
		$sql = sprintf($sql, $this->db->escape($email), $this->db->escape($passw));
		$row = $this->db->query($sql);
		$row = $row->row_array();
		if($email == $row['email'] && $passw == $row['password']){
			$this->session->set_userdata('user',$row['idUser']);
			$this->session->set_userdata('name',$row['name']);
			return 0;
		}
		return 3;
	}

	public function checkAdmin($email, $passw){
		$this->load->helper('email_helper');
		if ($email == '' || $passw == '') {
			return 1;
		}
		if(!valid_email($email)){
			return 2;
		}
		$sql = "select * from admin where email=%s AND password =%s";
		$sql = sprintf($sql, $this->db->escape($email), $this->db->escape($passw));
		$row = $this->db->query($sql);
		$row = $row->row_array();
		if($email == $row['email'] && $passw == $row['password']){
			$this->session->set_userdata('admin',$row['idAdmin']);
			return 0;
		}
		return 3;
	}

	public function inscription($email, $name, $passw){
		$this->load->helper('email_helper');
		if ($email == '' || $passw == '' || $name == '') {
			return 1;
		}
		if(!valid_email($email)){
			return 2;
		}
		$sql = "INSERT INTO users(name,email,password) VALUES(%s,%s,%s)";
		$sql = sprintf($sql, $this->db->escape($name), $this->db->escape($email), $this->db->escape($passw));
		$this->db->query($sql);
		return 0;
	}

	public function get_admin()
	{
		$query = $this->db->query("SELECT email FROM admin");
		$row = $query->row_array();
		return $row['email'];
	}
}