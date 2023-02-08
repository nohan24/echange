<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objet_model extends CI_Model{
    public function getAll(){
        $sql = "SELECT objets.idObject as idObject,objets.name as name,objets.iduser as iduser,users.name as pseudo,description,estimation,src FROM objets JOIN users ON objets.idUser = users.idUser JOIN objet_image ON objets.idObject = objet_image.idObject  where bgi = 1 and objets.idUser!=" . $this->db->escape($_SESSION['user']);
        $sql = $this->db->query($sql);
        $res = array();
        foreach ($sql->result_array() as $row){
            array_push($res, $row);
        }
        return $res;
    }

    public function get_item($id){
        $sql = "SELECT objets.idObject as idObject,objets.name as name,objets.iduser as iduser,users.name as pseudo,description,estimation FROM objets JOIN users ON objets.idUser = users.idUser  where objets.idObject = " . $id;
        $sql = $this->db->query($sql);
        $row = $sql->row_array();
        return $row;
    }

    public function getMyObject(){
        $sql = "SELECT objets.idObject as idObject,objets.name as name,objets.iduser as iduser,users.name as pseudo,description,estimation,src FROM objets JOIN users ON objets.idUser = users.idUser JOIN objet_image ON objets.idObject = objet_image.idObject WHERE bgi = 1 and objets.idUser = " . $_SESSION['user'];
        $sql = $this->db->query($sql);
        $res = array();
        foreach ($sql->result_array() as $row){
            array_push($res, $row);
        }
        return $res;
    }

    public function search($title,$cat){
        $sql = "SELECT objets.idObject as idObject,objets.name as name,objets.iduser as iduser,users.name as pseudo,description,estimation,src FROM objets JOIN users ON objets.idUser = users.idUser JOIN objet_image ON objets.idObject = objet_image.idObject  WHERE bgi = 1 and objets.name like '%". $title ."%' and objets.idObject in (select idObject from category_objet where idCategory = $cat)";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function historique($idObjet){
        $sql = "select echange.idEchange,echange.idObjEnv as oe,echange.idObjRec as ore,env.name as envoyeur,rec.name as receveur,daty from echange join users env on echange.idEnv = env.idUser left join users rec on echange.idRec = rec.idUser where idObjEnv = " . $idObjet . " or idObjRec = " . $idObjet . " order by daty asc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function update($id, $name, $description, $estimation, $cat){
        if($name == '' || $description == '' || $estimation == '')return -1;
        if(!is_numeric($estimation))return -2;
        if($cat == '')return -3;
        $sql = "UPDATE objets SET name = %s and description = %s and estimation = %s WHERE idObject = %s)";
        $sql = sprintf($this->db->escape($name),$this->db->escape($description),$estimation,$id);
        $this->db->query($sql);
        $this->db->query("UPDATE category_objet SET idCategory = " . $cat . " WHERE idObject = " . $id);

    }

    public function insertObj($name, $description, $estimation, $cat){
        if($name == '' || $description == '' || $estimation == '')return -1;
        if(!is_numeric($estimation))return -2;
        if($cat == '')return -3;
        $sql = "INSERT INTO objets VALUES(null,%s,%s,%s,%s)";
        $sql = sprintf($sql,$_SESSION['user'],$this->db->escape($name),$this->db->escape($description),$estimation);
        $query = $this->db->query($sql);
        $sql = "SELECT last_insert_id() as id";
        $query = $this->db->query($sql);
        $query = $query->row_array();
        //insert category
        $quer = "INSERT INTO category_objet VALUES(%s,%s)";
        $sql = sprintf($quer,$cat,$query['id']);
        $this->db->query($sql);
        return $query['id'];
    }

    public function addImage($idobjet,$array){
        for ($i=0; $i < count($array); $i++) { 
            $this->upload($array[$i],$idobjet);
        }
    }

    public function upload($name,$idobjet){
        if(!is_dir('./assets/img/objets/'.$idobjet))mkdir('./assets/img/objets/'.$idobjet, 0777, true);
        $dir="./assets/img/objets/".$idobjet."/" ;
        $extensions = array("jpg","jpeg","png","svg");
        $check = 0; 
        $ext = explode("/",$_FILES[$name]['type'], 2);
        $check = in_array($ext[1],$extensions); 
        if($check == 0){
            return;
        }
        $target_file = $dir . $name . ".jpg";
        $bgi = 0;
        if($name == 'img0')$bgi = 1;
        $sql = "INSERT INTO objet_image values(null,%s,%s,$bgi)";
        $sql = sprintf($sql,$idobjet,$this->db->escape($name . "." . 'jpg'));
        $this->db->query($sql);
        if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES[$name]["name"])). " has been uploaded.";
        } 
        else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    public function get_img($idObjet){
        $query = $this->db->query("SELECT * FROM objet_image WHERE idObject = ".$idObjet);
        return $query->result_array();
    }

    public function getIduser($idobjet){
        $query = $this->db->query("SELECT * FROM objets WHERE idObject = " .$idobjet);
        $ss = $query->row_array();
        var_dump($ss);
        return $ss['idUser'];
    }

    public function getObj($marge,$idObjet,$estimation){
        $sql = "SELECT * FROM objets WHERE estimation<=%s AND estimation>=%s AND idObject!=%s";
        $sql = sprintf($sql, $estimation * (1 + ($marge / 100)), $estimation * (1 - ($marge / 100)), $idObjet);
        echo $sql;
    }

    public function getObject($id){
        $query = $this->db->query("SELECT * FROM objets WHERE idobject = ". $id);
        return $query->row_array();
    }

    public function makeNotif($obj1,$obj2){
        $sql = "INSERT INTO notification VALUES(null,%s,%s,%s,%s)";
        $sql = sprintf($sql, $this->getIduser($obj1),$this->getIduser($obj2),$obj1,$obj2);
        $this->db->query($sql);
    }

    public function echange($obj1,$obj2){
        echo $this->getIduser($obj1);
        $sql = "INSERT INTO echange VALUES(null,%s,%s,%s,%s,now())";
        $sql = sprintf($sql, $this->getIduser($obj1),$this->getIduser($obj2),$obj1,$obj2);
        $this->db->query($sql);
        $sql = "SELECT last_insert_id() as id";
        $query = $this->db->query($sql);
        $query = $query->row_array();
        
        $this->db->query($sql);
        $this->confirmation($query['id']);
        $this->db->query('DELETE FROM notification WHERE idObjet1 = '.$obj1);
        $this->db->query('DELETE FROM notification WHERE idObjet1 = '.$obj2);
        $this->db->query('DELETE FROM notification WHERE idObjet2 = '.$obj2);
        $this->db->query('DELETE FROM notification WHERE idObjet2 = '.$obj1);
    }

    public function confirmation($idechange){
        $sql = "SELECT * FROM echange WHERE idechange=%s";
        $sql = sprintf($sql, $idechange);
        $query = $this->db->query($sql);
        $query = $query->row_array();

        $sql = "UPDATE objets SET idUser=%s WHERE idObject=%s";
        $sql = sprintf($sql, $query['idEnv'], $query['idObjRec']);
        $this->db->query($sql);

        $sql = "UPDATE objets SET idUser=%s WHERE idObject=%s";
        $sql = sprintf($sql, $query['idRec'], $query['idObjEnv']);
        $this->db->query($sql);
    }

    public function multiExchange($objArray,$obj){
        $sql = array();
        $str = "INSERT INTO echange VALUES(null,%s,%s,%s,%s,null)";
        foreach ($objArray as $objet) {
            array_push($sql,sprintf($str, $this->getIduser($objet),$objet,$this->getIduser($obj),$obj));
        }
    }

    public function getNotif(){
        $query = $this->db->query("SELECT idNotif,notification.idObjet1 as envi,notification.idObjet2 as reci,env.name as envoyeur,objEnv.name as objetEnvoyer,objEnv.estimation,objRec.name as objDemande FROM notification JOIN users env on notification.idEnv=env.idUser JOIN objets objEnv ON notification.idObjet1=objEnv.idObject JOIN objets objRec ON notification.idObjet2=objRec.idObject where notification.idRec=" . $_SESSION['user']);
        return $query->result_array();
    }

    public function deleteNotif($idnotif){
        $this->db->query("DELETE FROM notification WHERE idNotif = ".$idnotif);
    }
}
?>
