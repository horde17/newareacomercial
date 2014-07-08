<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function guardar_asesor($nombre, $apellido, $cedula, $direccion, $telefono, $constraseña, $imagen) {
        $data = array(
            "ase_cedula" => $cedula,
            "ase_nombre" => $nombre,
            "ase_apellido" => $apellido,
            "ase_direccion" => $direccion,
            "ase_telefono" => $telefono,
            "ase_foto" => $imagen,
            "ase_password" => md5($constraseña),
            "ase_tipo" => 2,
            "ase_active" => 'si'
        );
        $this->db->insert('asesor', $data);
    }

    public function get_foto($cedula) {
        $this->db->select('ase_foto');
        $this->db->from('asesor');
        $this->db->where('ase_cedula', $cedula);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function mostrar_lista_asesores() {
        $query = $this->db->get_where('asesor', array('ase_active' => 'si'));
        return $query->result_array();
    }

    public function delete_asesor($asesor) {
        $data = array(
            "ase_active" => 'no'
        );
        $this->db->where('ase_cedula', $asesor);
        $this->db->update('asesor', $data);
    }

    public function get_asesor_m($ase_cedula) {
        $query = $this->db->get_where('asesor', array('ase_cedula' => $ase_cedula));
        return $query->result_array();
    }

    public function update_modificar($cedula, $nombre, $apellido, $direccion, $telefono, $antigua_cedula) {
        $data = array(
            "ase_cedula" => $cedula,
            "ase_nombre" => $nombre,
            "ase_apellido" => $apellido,
            "ase_direccion" => $direccion,
            "ase_telefono" => $telefono
        );
        $this->db->where('ase_cedula', $antigua_cedula);
        $this->db->update('asesor', $data);
    }

    public function get_user($username) {
        $query = $this->db->get_where('asesor', array('ase_tipo' => '1', 'ase_cedula' => $username));
        return $query->result_array();
    }

    public function create_new_project($nombre_proyecto, $estrato, $ubicacion, $numpatos, $comisiones) {
        $data = array(
            "pro_nombre" => $nombre_proyecto,
            "pro_estrato" => $estrato,
            "pro_ubicacion" => $ubicacion,
            "pro_num_aptos" => $numpatos,
            "pro_comision" => $comisiones
        );
        $this->db->insert("proyecto", $data);
    }

    public function get_projects() {
        $query = $this->db->get('proyecto');
        return $query->result_array();
    }

    public function get_proyecto_id($id) {
        $query = $this->db->get_where('proyecto', array('id_proyecto' => $id));
        return $query->result_array();
    }

    public function update_project($id, $nombre_proyecto, $estrato, $ubicacion, $numpatos, $comisiones) {
        $data = array(
            "pro_nombre" => $nombre_proyecto,
            "pro_estrato" => $estrato,
            "pro_ubicacion" => $ubicacion,
            "pro_num_aptos" => $numpatos,
            "pro_comision" => $comisiones
        );
        $this->db->where("id_proyecto", $id);
        $this->db->update('proyecto', $data);
    }

    public function get_ventas_mes($año_mes) {
        $query = $this->db->query("select proyecto.pro_nombre, count(venta.cli_cedula) as ventas_mes 
from proyecto,venta,apartamento
where venta.id_apartamento=apartamento.id_apartamento 
and venta.id_proyecto=proyecto.id_proyecto 
and cast(venta.fecha as text) like '%2013-10%'
group by proyecto.pro_nombre
order by proyecto.pro_nombre");
        return $query->result_array();
    }

    public function get_ventas_asesor($asesor) {
        $año_mes = date("Y-m");
        $query = $this->db->query("select proyecto.pro_nombre, count(venta.cli_cedula) as num_ventas 
                from proyecto,venta,apartamento
                where venta.id_apartamento=apartamento.id_apartamento 
                and venta.id_proyecto=proyecto.id_proyecto 
                and cast(venta.fecha as text) like '%2013-10%' and venta.ase_cedula='$asesor'
                group by proyecto.pro_nombre");
        return $query->result_array();
    }

    public function ventas_por_asesor_mes_anterior($asesor_id) {
        $año_mes_actual = date("Y-m");
        $nuevafecha = strtotime('-1 month', strtotime($año_mes_actual));
        $año_mes_anterior = date("Y-m", $nuevafecha);
        $query = $this->db->query("select proyecto.pro_nombre, count(venta.cli_cedula) as num_ventas 
from proyecto,venta,apartamento
where venta.id_apartamento=apartamento.id_apartamento 
and venta.id_proyecto=proyecto.id_proyecto 
and cast(venta.fecha as text) like '%$año_mes_anterior%' and venta.ase_cedula='$asesor_id'
group by proyecto.pro_nombre");
        return $query->result_array();
    }

    public function get_nom_proyecto($proyecto) {
        $this->db->select('pro_nombre');
        $this->db->from("proyecto");
        $this->db->where("id_proyecto", $proyecto);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function ventas_por_asesor_mes_anterior2($asesor_id) {
        $año_mes_actual = date("Y-m");
        $nuevafecha = strtotime('-2 month', strtotime($año_mes_actual));
        $año_mes_anterior = date("Y-m", $nuevafecha);
        $query = $this->db->query("select proyecto.pro_nombre, count(venta.cli_cedula) as num_ventas 
from proyecto,venta,apartamento
where venta.id_apartamento=apartamento.id_apartamento 
and venta.id_proyecto=proyecto.id_proyecto 
and cast(venta.fecha as text) like '%$año_mes_anterior%' and venta.ase_cedula='$asesor_id'
group by proyecto.pro_nombre");
        return $query->result_array();
    }

    public function ventas_por_proyecto_meses($mes_actual, $mes_anterior, $mes_anterior2, $proyecto) {
        $query = $this->db->query("select count(venta.cli_cedula) as num_ventas 
            from venta
            where venta.id_proyecto=$proyecto
            and cast(venta.fecha as text) like '%$mes_actual%'
            union all
            select count(venta.cli_cedula) as num_ventas
            from venta
            where venta.id_proyecto=1
            and cast(venta.fecha as text) like '%$mes_anterior%'
            union all
            select count(venta.cli_cedula) as num_ventas
            from venta
            where venta.id_proyecto=1
            and cast(venta.fecha as text) like '%$mes_anterior2%'");
        return $query->result_array();
    }

    public function ventas_totales_proyecto($proyecto, $fecha_creacion) {
        $today = date("Y-m-d");
        $query = $this->db->query("select count(cli_cedula) as num_total from venta where venta.id_proyecto=$proyecto and venta.fecha between '$fecha_creacion'
and '$today'");
        return $query->result_array();
    }

    public function numero_total_apto_poyecto($proyecto) {
        $query = $this->db->query("select pro_num_aptos from proyecto where id_proyecto=$proyecto");
        return $query->result_array();
    }

    public function get_fecha_creacion($proyecto) {
        $this->db->select('pro_fecha_creacion');
        $this->db->from("proyecto");
        $this->db->where("id_proyecto", $proyecto);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ventas_etapas($proyecto) {
        $this->db->select('nombre_est_venta,count(apto_estado_venta) as numero_ventas');
        $this->db->from('apartamento');
        $this->db->join('estados_venta', 'id_estados_venta=apto_estado_venta');
        $this->db->where('id_proyecto', $proyecto);
        $this->db->group_by("nombre_est_venta,apto_estado_venta");
        $this->db->order_by("apto_estado_venta");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function actualizar_asesor2($nombre, $apellido, $cedula, $direccion, $telefono, $contraseña) {
        $data = array(
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
    
    public function existe_expectativa($proyecto){
        $query = $this->db->query("select expectativa_ventas.* from expectativa_ventas
inner join proyecto on proyecto.id_proyecto=expectativa_ventas.id_proyecto
where lower(proyecto.pro_nombre) like '%$proyecto%'");
       
        if($query->num_rows()>0){
            return 1;
        } else{
            return 0;
        }
    }
    
    public function get_expectativas($proyecto){
        $query = $this->db->query("select expectativa_ventas.* from expectativa_ventas
inner join proyecto on proyecto.id_proyecto=expectativa_ventas.id_proyecto
where lower(proyecto.pro_nombre) like '%$proyecto%'");
        return $query->result_array();
    }
    
    public function borrar_expectativas($proyecto){
        $this->db->where("id_proyecto", $proyecto);
        $this->db->delete("expectativa_ventas");
    }


    public function insertar_expectativas($datos) {
        $this->db->insert('expectativa_ventas', $datos);
    }


}

?>
