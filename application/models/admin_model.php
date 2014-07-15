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
and cast(venta.fecha as text) like '%$año_mes%'
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
                and cast(venta.fecha as text) like '%$año_mes%' and venta.ase_cedula='$asesor'
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
        $query = $this->db->query("select count(cli_cedula) as num_total from venta where venta.id_proyecto=$proyecto and cast(venta.fecha as text) between '$fecha_creacion'
and '$today'");
        return $query->result_array();
    }

    public function numero_total_apto_proyecto($proyecto) {
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
        $query = $this->db->query("select asesor.ase_nombre, asesor.ase_apellido, asesor.ase_foto, count(apartamento.id_apartamento) as aptos_vendidos from venta
inner join apartamento on apartamento.id_apartamento=venta.id_apartamento
inner join asesor on asesor.ase_cedula=venta.ase_cedula
where cast(venta.fecha as text) like '%$añomes%'
group by asesor.ase_nombre, asesor.ase_apellido, asesor.ase_foto");
        return $query->result_array();
    }

    public function asesores_sin_venta($añomes) {
        $query = $this->db->query("select asesor.ase_nombre, asesor.ase_apellido, asesor.ase_foto from asesor
where ase_nombre not in( select asesor.ase_nombre from venta 
inner join apartamento on apartamento.id_apartamento=venta.id_apartamento
inner join asesor on asesor.ase_cedula=venta.ase_cedula
where cast(venta.fecha as text) like '%$añomes%')");
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
    
    public function pago_mes_ini_actual($año_mes){
        $query = $this->db->query("select cliente.cli_cedula, cliente.cli_nombre, cliente.cli_apellido, 
            cliente.cli_telefono_cel, cliente.cli_telefono, cliente.cli_email, proyecto.pro_nombre, 
apartamento.apto_numero,couta_inicial.valor_couta, couta_inicial.fecha_pago_cuota
from cliente 
inner join apartamento on apartamento.cli_cedula=cliente.cli_cedula
inner join proyecto on proyecto.id_proyecto=apartamento.id_proyecto
inner join couta_inicial on couta_inicial.cli_cedula=cliente.cli_cedula
where (apartamento.apto_estado_venta=1 and cast(couta_inicial.fecha_pago_cuota as text) like '%$año_mes%')");
        return $query->result_array();
    }
    
    public function pago_mes_actual($param) {
       $query = $this->db->query("select cliente.cli_cedula, cliente.cli_nombre, cliente.cli_apellido, 
cliente.cli_telefono_cel, cliente.cli_telefono, cliente.cli_email, proyecto.pro_nombre, 
apartamento.apto_numero, coutas_pagar.valor_cuota, coutas_pagar.num_couta, coutas_pagar.fecha_pago_cuota
from cliente 
inner join apartamento on apartamento.cli_cedula=cliente.cli_cedula
inner join proyecto on proyecto.id_proyecto=apartamento.id_proyecto
inner join coutas_pagar on coutas_pagar.cli_cedula=cliente.cli_cedula
where (apartamento.apto_estado_venta=1 and cast(coutas_pagar.fecha_pago_cuota as text) like '%$param%')") ;
       return $query->result_array();
    }
    
    public function get_ventas_mes_proyecto($proyecto,$año_mes) {
        $query = $this->db->query("select count(venta.cli_cedula) as ventas_mes  
from proyecto,venta,apartamento
where venta.id_apartamento=apartamento.id_apartamento 
and venta.id_proyecto=proyecto.id_proyecto 
and cast(venta.fecha as text) like '%$año_mes%'
and proyecto.id_proyecto=$proyecto group by pro_nombre");
        return $query->result_array();
    }
    
    public function get_expectativas_mes($proyecto,$año_mes) {
        $query = $this->db->query("select expectativa_ventas.* from expectativa_ventas
inner join proyecto on proyecto.id_proyecto=expectativa_ventas.id_proyecto
where proyecto.id_proyecto=$proyecto and expectativa_ventas.fecha_venta like ('%$año_mes%')");
        return $query->result_array();
    }
    
    public function num_estados_cliente_proyecto($proyecto,$estado) {
        $this->db->select('count(apartamento.cli_cedula) as num_cliente');
        $this->db->from("proyecto");
        $this->db->join("apartamento", "apartamento.id_proyecto=proyecto.id_proyecto");
        $this->db->where("proyecto.id_proyecto", $proyecto);
        $this->db->where("apartamento.apto_estado_venta", $estado);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function clientes_potenciales() {
        $query = $this->db->query("select case when (presupuesto between 1 and 90000000) then 'Clientes con un presupuesto entre 0 y 90.000.000 millones' else
case when (presupuesto between 90000001 and 180000000) then 'Clientes con un presupuesto entre 90.000.001 y 180.000.000 Millones' else
case when (presupuesto > 180000000) then 'Clientes con un presupuesto mayor a 180.000.000'
END
END
END presu,
count(*) total
from contactos
group by presu
order by presu");
        return $query->result_array();
    }


}

?>
