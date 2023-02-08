<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        is_log_user();
        $data['cat'] = $this->admin_model->get_cat();
		$data['title'] = 'Accueil';
	    $this->load->view('nav',$data);
        $this->load->view('accueil');
        $this->load->view('footer');
	}

    public function all()
    {
        is_log_user();
        $all['objects'] = $this->objet_model->getAll();
        $data['title'] = 'Liste des objets';
        $all['link'] = 'detail';
        $all['in'] = 'View';
        $data['cat'] = $this->admin_model->get_cat();
        $this->load->view('nav',$data);
        $this->load->view('all_object',$all);
        $this->load->view('footer');
    }

    public function items()
    {
        is_log_user();
        $all['objects'] = $this->objet_model->getMyObject();
        $all['link'] = 'modif';
        $data['title'] = 'Mes objets';
        $all['in'] = 'Edit';
        $data['cat'] = $this->admin_model->get_cat();
        $this->load->view('nav',$data);
        $this->load->view('all_object',$all);
        $this->load->view('footer');
    }

    public function dropnotif($idnotif){
        $this->objet_model->deleteNotif($idnotif);
        redirect(site_url('home/demande'));
    }

    public function confirm($idobj1,$idobj2){
        $this->objet_model->echange($idobj1,$idobj2);
        redirect(site_url('home/demande'));
    }


    public function demande(){
        $data['title'] = 'Demande(s)';
        $data['cat'] = $this->admin_model->get_cat();
        $data['notif'] = $this->objet_model->getNotif();
        $this->load->view('nav',$data);
        $this->load->view('notif');
        $this->load->view('footer');
    }

    public function update($id){
        is_log_user();
        $data['cat'] = $this->admin_model->get_cat();
        $data['bout'] = $this->objet_model->getObject($id);
        $data['id'] = $id;
        $data['title'] = 'Update';
        $this->load->view('nav',$data);
        $this->load->view('update');
        $this->load->view('footer');
    }

    public function detail($id)
    {
        is_log_user();
        $data['cat'] = $this->admin_model->get_cat();
        $all['objects'] = $this->objet_model->getMyObject();
        $ar = $this->objet_model->get_item($id);
        $im = $this->objet_model->get_img($id);
        $data['title'] = 'About';
        $all['obj'] = $id;
        $data['img'] = $im;
        $data['item'] = $ar;
        $this->load->view('nav',$data);
        $this->load->view('about',$all);
        $this->load->view('footer');
    }

    public function search()
    {
        is_log_user();
        $all['objects'] = $this->objet_model->search($_GET['title'],$_GET['cat']);
        $data['title'] = 'Résultat recherche';
        $all['in'] = 'View';
        $all['link'] = 'detail';
        $data['cat'] = $this->admin_model->get_cat();
        $this->load->view('nav',$data);
        $this->load->view('all_object',$all);
        $this->load->view('footer');
    }

    public function history($id)
    {
        is_log_user();
        $data['hist'] = $this->objet_model->historique($id);
        $data['cat'] = $this->admin_model->get_cat();
        $data['title'] = 'Historique';
        $data['idPr'] = $id;
        $this->load->view('nav',$data);
        $this->load->view('historique_echange');
        $this->load->view('footer');
    }

}
