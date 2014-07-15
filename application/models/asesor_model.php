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
    
    public function ventas_por_asesor($añomes) {
        $query = $this->db->query("select asesor.ase_nombre, asesor.ase_apellido, count(apartamento.id_apartamento) as aptos_vendidos from venta
inner join apartamento on apartamento.id_apartamento=venta.id_apartamento
inner join asesor on asesor.ase_cedula=venta.ase_cedula
where cast(venta.fecha as text) like '%2013-10%'
group by asesor.ase_nombre, asesor.ase_apellido");
        return $query->result_array();
    }
    
    public function asesores_sin_venta($añomes) {
        $query = $this->db->query("select asesor.ase_nombre, asesor.ase_apellido from asesor
where ase_nombre not in(
select asesor.ase_nombre from venta 
inner join apartamento on apartamento.id_apartamento=venta.id_apartamento
inner join asesor on asesor.ase_cedula=venta.ase_cedula
where cast(venta.fecha as text) like '%2013-10%')");
        return $query->result_array();
    }
}

