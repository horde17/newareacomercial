<?php

class Cliente_model extends CI_Model {

    public function get_clientes() {
        $this->db->select("cliente.*, proyecto.pro_nombre");
        $this->db->from("cliente");
        $this->db->join("proyecto", "proyecto.id_proyecto=cliente.pro_interes");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function nombre_proyecto($proyecto) {
        $this->db->select('pro_nombre');
        $this->db->from("proyecto");
        $this->db->where("id_proyecto", $proyecto);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_clientes_proyecto() {
        $this->db->select('cliente.cli_cedula, cliente.cli_nombre, cliente.cli_apellido, cliente.cli_direccion,
cliente.cli_telefono_cel as cli_celular, cliente.cli_email, proyecto.pro_nombre,proyecto.id_proyecto');
        $this->db->from('venta');
        $this->db->join('entrega_estados', 'entrega_estados.id_entrega=venta.id_entrega');
        $this->db->join('proyecto', 'proyecto.id_proyecto=entrega_estados.id_proyecto');
        $this->db->join('cliente', 'cliente.cli_cedula=venta.cli_cedula');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_user($username) {
        $this->db->select('ase_nombre, ase_apellido');
        $this->db->from('asesor');
        $this->db->where('ase_cedula', $username);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_proyectos_activos() {
        $this->db->select('id_proyecto, pro_nombre');
        $this->db->from("proyecto");
        $this->db->where("pro_activo", 'true');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertar_cliente($datos) {
        $this->db->insert('cliente', $datos);
    }

    public function insertar_conyuge($datos) {

        $this->db->insert('conyuge', $datos);
    }

    public function insertar_apto($datos) {
        $this->db->insert('apartamento', $datos);
    }

    public function get_id_apto($proyecto, $numapto) {
        $this->db->select('id_apartamento');
        $this->db->from("apartamento");
        $this->db->where('id_proyecto', $proyecto);
        $this->db->where('apto_numero', $numapto);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_id_espec($especificaciontec, $proyecto) {
        $this->db->select("id_especificacion_tecnica");
        $this->db->from("especificacion_tecnica");
        $this->db->where("id_tipo_tecnico", $especificaciontec);
        $this->db->where("id_proyecto", $proyecto);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_id_entrega($id_apartamento, $proyecto, $id_especificacion_tec) {
        $this->db->select("id_entrega");
        $this->db->from("entrega_estados");
        $this->db->where("id_apartamento", $id_apartamento);
        $this->db->where("id_proyecto", $proyecto);
        $this->db->where("id_especificacion_tecnica", $id_especificacion_tec);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertar_cuotas_iniciales($datos) {
        $this->db->insert('couta_inicial', $datos);
    }

    public function insertar_cuotas_restantes($cuotas) {
        $this->db->insert('coutas_pagar', $cuotas);
    }

    public function insertar_info_laboral($insertar_info_laboral) {
        $this->db->insert('informacion_laboral', $insertar_info_laboral);
    }

    public function insertar_venta_nueva($venta) {
        $this->db->insert('venta', $venta);
    }

    public function insertar_entrega_estados($insertar_estado_venta) {
        $this->db->insert('entrega_estados', $insertar_estado_venta);
    }

    public function get_cliente_ficha($cedula) {
        $query = $this->db->get_where('cliente', array('cli_cedula' => $cedula));
        return $query->result_array();
    }

    public function get_conyuge_ficha($cedula) {
        $query = $this->db->get_where('conyuge', array('cli_cedula' => $cedula));
        return $query->result_array();
    }

    public function get_venta_ficha($cedula, $proyecto) {
        $query = $this->db->get_where('venta', array('cli_cedula' => $cedula, 'id_proyecto' => $proyecto));
        return $query->result_array();
    }

    public function get_info_lab_ficha($cedula) {
        $query = $this->db->get_where("informacion_laboral", array("cli_cedula" => $cedula));
        return $query->result_array();
    }

    public function get_info_cuotas_ficha($cedula, $idapartamento, $identrega) {
        $query = $this->db->get_where("coutas_pagar", array("cli_cedula" => $cedula, "id_apartamento" => $idapartamento, "id_entrega" => $identrega));
        return $query->result_array();
    }

    public function get_info_coutas_ini_ficha($cedula, $identrega) {
        $query = $this->db->get_where("couta_inicial", array("cli_cedula" => $cedula, "id_entrega" => $identrega));
        return $query->result_array();
    }

    public function get_estado_venta_ficha($idapartamento) {
        $query = $this->db->get_where("entrega_estados", array("id_apartamento" => $idapartamento));
        return $query->result_array();
    }

    public function get_apto_ficha($idapartamento, $cliente) {
        $query = $this->db->get_where("apartamento", array("id_apartamento" => $idapartamento, "cli_cedula" => $cliente));
        return $query->result_array();
    }

    public function get_especificacion_tecnica($id_especificacion_tecnica) {
        $query = $this->db->get_where('especificacion_tecnica', array("id_especificacion_tecnica" => $id_especificacion_tecnica));
        return $query->result_array();
    }

    //Actualizar Cliente Con Separacion INmueble
    public function update_cliente($insert) {
        $this->db->where('cli_cedula', $insert['cli_cedula']);
        $this->db->update('cliente', $insert);
    }

    public function update_conyuge($insertar_conyuge) {
        $this->db->where("cli_cedula", $insertar_conyuge['cli_cedula']);
        $this->db->update('conyuge', $insertar_conyuge);
    }

    public function update_apto($info_apto) {
        $this->db->where('id_proyecto', $info_apto['id_proyecto']);
        $this->db->where('cli_cedula', $info_apto['cli_cedula']);
        $this->db->where('apto_numero', $info_apto['apto_numero']);
        $this->db->update('apartamento', $info_apto);
    }

    public function update_entrega_estados($insertar_estado_venta) {
        $this->db->where('id_especificacion_tecnica', $insertar_estado_venta['id_especificacion_tecnica']);
        $this->db->where('id_proyecto', $insertar_estado_venta['id_proyecto']);
        $this->db->where('id_apartamento', $insertar_estado_venta['id_apartamento']);
        $this->db->update('entrega_estados', $insertar_estado_venta);
    }

    public function delete_cuotas_iniciales($cedula, $id_entega) {
        $this->db->where("cli_cedula", $cedula);
        $this->db->where("id_entrega", $id_entega);
        $this->db->delete("couta_inicial");
    }

    public function delete_cuotas_restantes($id_apto) {
        $this->db->where("id_apartamento", $id_apto);
        $this->db->delete("coutas_pagar");
//        echo "Algo pasa aca";
    }

    public function update_info_laboral($info_laboral) {
        $this->db->where("cli_cedula", $info_laboral['cli_cedula']);
        $this->db->update('informacion_laboral', $info_laboral);
    }

    public function update_venta_nueva($venta_nueva) {
        $this->db->where("cli_cedula", $venta_nueva['cli_cedula']);
        $this->db->where("id_apartamento", $venta_nueva['id_apartamento']);
        $this->db->where("id_proyecto", $venta_nueva['id_proyecto']);
        $this->db->update('venta', $venta_nueva);
    }

    public function get_nom_espec($especificaciontec, $proyecto) {
        $this->db->select("descripcion_tecnica");
        $this->db->from("especificacion_tecnica");
        $this->db->where("id_tipo_tecnico", $especificaciontec);
        $this->db->where("id_proyecto", $proyecto);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_clientes_separacion($proyecto) {
        $sql = "select cliente.cli_cedula, cliente.cli_nombre, 
        cliente.cli_apellido, cliente.cli_direccion,
        cliente.cli_telefono_cel,cliente.cli_email,proyecto.pro_nombre,proyecto.id_proyecto
        from cliente, apartamento, proyecto
        where apartamento.id_proyecto=$proyecto
        and apartamento.cli_cedula=cliente.cli_cedula
        and apto_estado_venta=1
        and apartamento.id_proyecto=proyecto.id_proyecto";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function get_clientes_compromiso($proyecto) {
        $sql = "select cliente.cli_cedula, cliente.cli_nombre, 
        cliente.cli_apellido, cliente.cli_direccion,
        cliente.cli_telefono_cel,cliente.cli_email,proyecto.pro_nombre,proyecto.id_proyecto
        from cliente, apartamento, proyecto
        where apartamento.id_proyecto=$proyecto
        and apartamento.cli_cedula=cliente.cli_cedula
        and apto_estado_venta=2
        and apartamento.id_proyecto=proyecto.id_proyecto";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function get_clientes_escritura($proyecto) {
        $sql = "select cliente.cli_cedula, cliente.cli_nombre, 
        cliente.cli_apellido, cliente.cli_direccion,
        cliente.cli_telefono_cel,cliente.cli_email,proyecto.pro_nombre,proyecto.id_proyecto
        from cliente, apartamento, proyecto
        where apartamento.id_proyecto=$proyecto
        and apartamento.cli_cedula=cliente.cli_cedula
        and apto_estado_venta=3
        and apartamento.id_proyecto=proyecto.id_proyecto";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function get_entidades_financieras() {
        $query = $this->db->get("entidad_financiera");
        return $query->result_array();
    }

    public function get_compromiso($cedula, $proyecto) {
        $this->db->select('cli_nombre,cli_apellido,apto_numero,apto_precio');
        $this->db->from("cliente");
        $this->db->join("apartamento", "apartamento.cli_cedula=cliente.cli_cedula");
        $this->db->where("cliente.cli_cedula", $cedula);
        $this->db->where("id_proyecto", $proyecto);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_estado_venta_compromiso($cedula, $proyecto, $apto_num) {
        $data = array(
            "apto_estado_venta" => 2
        );
        $this->db->where("cli_cedula", $cedula);
        $this->db->where("id_proyecto", $proyecto);
        $this->db->where("apto_numero", $apto_num);
        $this->db->update("apartamento", $data);
    }

    public function get_usuario_especifico($cedula) {
        $this->db->select('cli_cedula_expedicion, estado_civil.est_civil_nombre');
        $this->db->from("cliente");
        $this->db->join("estado_civil", "est_civil_id=cliente.estado_civil");
        $this->db->where("cliente.cli_cedula", $cedula);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_info_apto($proyecto, $apto_num, $cedula) {
        $this->db->select('apto_precio,apto_medicion,apto_torre,apto_parqueadero');
        $this->db->from("apartamento");
        $this->db->where("id_proyecto", $proyecto);
        $this->db->where("apto_numero", $apto_num);
        $this->db->where("cli_cedula", $cedula);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_apto_estado($insertar_apto, $proyecto, $apto_num, $cedula) {
        $this->db->where("id_proyecto", $proyecto);
        $this->db->where("apto_numero", $apto_num);
        $this->db->where("cli_cedula", $cedula);
        $this->db->update("apartamento", $insertar_apto);
    }

    public function update_venta_compromiso($venta_nueva, $cedula, $proyecto) {
        $this->db->where("cli_cedula", $cedula);
        $this->db->where("id_proyecto", $proyecto);
        $this->db->update('venta', $venta_nueva);
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

    public function actualizar_asesor($nombre, $apellido, $cedula, $direccion, $telefono, $contraseña, $foto) {
        $data = array(
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

    public function existe_cliente($cedula) {
        $this->db->select("*");
        $this->db->from("cliente");
        $this->db->where("cli_cedula", $cedula);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return "true";
        } else {
            return "false";
        }
    }
    
    public function existe_proyecto($proyecto) {
        $proyecto = strtolower($proyecto);
        $query = $this->db->query("select * from proyecto where lower(pro_nombre) like ('%$proyecto%')");
        
        return $query->result_array();
        
    }
    
    public function insertar_expectativas($param) {
        $this->db->insert('expectativa_ventas', $param);
    }
    
    public function insertar_contactos($datos) {
        $this->db->insert("contactos",$datos);
    }
    
    public function get_contactos(){
        $query = $this->db->get("contactos");
        return $query->result_array();
    }
    
    public function borrar_contacto($correo) {
        $this->db->where("correo", $correo);
        $this->db->delete("contactos");
        
    }

}

?>
