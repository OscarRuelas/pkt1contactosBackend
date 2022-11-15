<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactoModel extends CI_Model {
    
    public function save($data){
        $this->db->query("ALTER TABLE contacto AUTO_INCREMENT 1");
        $this->db->insert("contacto",$data);
    }

    public function getContacto(){
        $results= $this->db->query("SELECT * FROM contacto");
        return $results->result();
    }
    
    public function getOneContacto($id){
        $results= $this->db->query("SELECT * FROM contacto WHERE idcontacto = $id");
        // $this->db->select("c.*");
        // $this->db->from("cita c");
        // $this->db->where("c.idcita",$id);
        // $results=$this->db->get();
        return $results->result();
    }

    public function update($data,$id){
        $this->db->where("idcontacto",$id);
        $this->db->update("contacto",$data);
    }

    public function delete($id){
        $this->db->where("idcontacto",$id);
        $this->db->delete("contacto");
    }

}