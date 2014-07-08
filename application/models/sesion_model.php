<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sesion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function autorizacion($username, $password) {
        $this->db->select("ase_cedula,ase_password,ase_tipo");
        $this->db->from("asesor");
        $this->db->where('ase_cedula', $username);
        $this->db->where("ase_password", md5($password));
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    public function tipo_sesion($username){
        $this->db->select("ase_tipo");
        $this->db->from("asesor");
        $this->db->where('ase_cedula', $username);
        $query = $this->db->get();
        return $query->result_array();
    }

}
?>
