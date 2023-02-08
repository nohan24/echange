<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function get_cat(){
        $query = $this->db->query("SELECT * FROM category");
        return $query->result_array();
    }

    public function delete($id){
        $this->db->query("DELETE FROM category WHERE idCategory = ". $id);
    }

    public function add_cat($cat){
        $sql = "INSERT INTO category VALUES(null,%s)";
        $sql = sprintf($sql, $this->db->escape($cat));
        $this->db->query($sql);
    }

    public function get_stat(){
        $sql = "SELECT coalesce(count(*),0) as c FROM users";
        $query = $this->db->query($sql);
        $data['inscrit'] = $query->row_array()['c'];
        $sql = "SELECT coalesce(count(*),0) as c FROM echange";
        $query = $this->db->query($sql);
        $data['echange'] = $query->row_array()['c'];
        return $data;
    }
}