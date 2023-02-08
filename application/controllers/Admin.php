<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
        is_log_admin();
	    $this->load->view('admin_nav');
	    $this->load->view('admin_accueil');
        $this->load->view('footer');
	}

    public function categories()
    {
        is_log_admin();
        $this->load->model('admin_model');
        $data['categories'] = $this->admin_model->get_cat();
        $this->load->view('admin_nav');
	    $this->load->view('categories',$data);
        $this->load->view('footer');
    }

    public function delete($id)
    {
        is_log_admin();
        $this->load->model('admin_model');
        $this->admin_model->delete($id);
        redirect(site_url('admin/categories'));
    }

    public function add_category()
    {
        is_log_admin();
        $this->load->view('admin_nav');
	    $this->load->view('add_categories');
        $this->load->view('footer');
    }

    public function traitement_add()
    {
        is_log_admin();
        $this->load->model('admin_model');
        $this->admin_model->add_cat($_GET['cat']);
        redirect(site_url('admin/categories'));
    }

    public function stat()
    {
        is_log_admin();
        $this->load->model('admin_model');
        $data['stat'] = $this->admin_model->get_stat();
        $this->load->view('admin_nav');
	    $this->load->view('statistique', $data);
        $this->load->view('footer');
    }

}
