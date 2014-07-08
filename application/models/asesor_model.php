<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Asesor_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get_user($username) {
        $query = $this->db->get_where('asesor', array('ase_tipo' => '2', 'ase_cedula' => $username));
        return $query->result_array();
    }
    public function get_foto($cedula) {
        $this->db->select('ase_foto');
        $this->db->from('asesor');
        $this->db->where('ase_cedula', $cedula);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function actualizar_asesor($nombre, $apellido, $cedula, $direccion, $telefono, $contraseña, $foto){
        $data =array(
            "ase_nombre" => $nombre,
            "ase_apellido" => $apellido,
            "ase_direccion" => $direccion,
            "ase_telefono_cel" => $telefono,
            "ase_telefono" => $telefono,
            "ase_password" => md5($contraseña),
            "ase_foto" => $foto
        );
        $this->db->where("ase_cedula", $cedula);
        $this->db->update("asesor", $data);
    }
    
    public function actualizar_asesor2($nombre, $apellido, $cedula, $direccion, $telefono, $contraseña){
        $data =array(
            "ase_nombre" => $nombre,
            "ase_apellido" => $apellido,
            "ase_direccion" => $direccion,
            "ase_telefono_cel" => $telefono,
            "ase_telefono" => $telefono,
            "ase_password" => md5($contraseña),
            
        );
        $this->db->where("ase_cedula", $cedula);
        $this->db->update("asesor", $data);
    }
}

