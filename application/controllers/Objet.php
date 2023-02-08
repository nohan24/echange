<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Objet extends CI_Controller{
        public function addObject($error=-5){
            is_log_user();
            $data['title'] = 'Ajouter objet';
            $data['error'] = $error;
            $data['cat'] = $this->admin_model->get_cat();
            $this->load->view('nav',$data);
            $this->load->view('add_object');
            $this->load->view('footer');
        }

        public function g($id){
            if($_FILES['img0']['size'] == 0){
                redirect(site_url('objet/addImage?idimg='.$id.'&err=1'));
            }
            $img = array();
            for ($i=0; $i < 4; $i++) { 
                if($_FILES['img'.$i]['size'] > 0){
                    array_push($img,'img'.$i);
                }
            }
            $this->objet_model->addImage($id,$img);
            redirect(site_url('home/items'));
        }

        public function addImage(){
            is_log_user();
            $data['title'] = 'Ajouter objet';
            $data['cat'] = $this->admin_model->get_cat();
            $this->load->view('nav',$data);
            $this->load->view('add_image');
            $this->load->view('footer');
        }

        public function ajout(){
            $id = $this->objet_model->insertObj($_POST['name'],$_POST['description'],$_POST['estimation'],$_POST['cat']);
            if($id < 0){
                redirect(site_url('objet/addObject/'.$id));
            }else{
                redirect(site_url('objet/addImage?idimg='.$id));
            }   
        }

        public function updatee($id){
            $this->objet_model->update($id,$_POST['name'],$_POST['description'],$_POST['estimation'],$_POST['cat']);
            redirect(site_url('home/items'));
        }

        public function ask($idEnv, $idRec){
            $this->objet_model->makeNotif($idEnv,$idRec);
            redirect(site_url('home/detail/'.$idRec));
        }
    }
?>