<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

date_default_timezone_set('America/Los_Angeles');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin_model');
        $this->load->model('cliente_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/admin_index_view',
                "titulo" => 'Inicio',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "fotosesion" => $this->admin_model->get_foto($sesiondata['username']),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Bienvenido',
                "titulo_page" => "Dashboard",
                "subtitulo_page" => "Resumen indicadores Constructora JYP",
                "box_title" => "Dashboard"
            );
            $this->load->view('include/admin_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function nuevo_asesor() {
        if ($this->session->userdata('logged_in')) {
            $sesiondata = $this->session->userdata('logged_in');
            $año_mes = date("Y-m");
            $data = array(
                "main" => 'administrador/admin_nuevo_asesor',
                "titulo" => 'Crear nuevo Asesor',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "fotosesion" => $this->admin_model->get_foto($sesiondata['username']),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Nuevo asesor',
                "titulo_page" => "Nuevo asesor",
                "subtitulo_page" => "Crear nuevo asesor para la Constructora JYP",
                "box_title" => "Nuevo asesor de ventas"
            );
            $this->load->view('include/admin_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function crear_nuevo_asesor() {
        if ($this->session->userdata('logged_in')) {

            $nombre = $this->input->get('nombre');
            $apellido = $this->input->get('apellidos');
            $cedula = $this->input->get('cedula');
            $direccion = $this->input->get('direccion');
            $telefono = $this->input->get('telefono');
            $contraseña = $this->input->get('password');
            $this->admin_model->guardar_asesor($nombre, $apellido, $cedula, $direccion, $telefono, $contraseña, "asesor.jpg");
//                echo "se realizo satisfactoriamente";
            $this->creacion_exitosa();
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function creacion_exitosa() {
        if ($this->session->userdata('logged_in')) {
            $sesiondata = $this->session->userdata('logged_in');
            $año_mes = date("Y-m");
            $data = array(
                "main" => 'administrador/admin_nuevo_asesor',
                "titulo" => 'Crear nuevo Asesor',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "fotosesion" => $this->admin_model->get_foto($sesiondata['username']),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Nuevo asesor',
                "titulo_page" => "Nuevo asesor",
                "subtitulo_page" => "Crear nuevo asesor para la Constructora JYP",
                "box_title" => "Nuevo asesor de ventas"
            );
            $this->load->view('include/admin_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function lista_asesores() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/lista_asesores',
                "titulo" => 'Asesores de Ventas Constructora JYP',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "fotosesion" => $this->admin_model->get_foto($sesiondata['username']),
                "lista_asesores" => $this->admin_model->mostrar_lista_asesores(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Lista asesores',
                "titulo_page" => "Lista asesores",
                "subtitulo_page" => "Asesores adscritos a la Constructora JYP",
                "box_title" => "Lista de asesores"
            );
            $this->load->view('include/admin_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function eliminar_asesor() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $asesor = $this->input->get('asesor');
            $sesiondata = $this->session->userdata('logged_in');
            $this->admin_model->delete_asesor($asesor);
            $data = array(
                "main" => 'administrador/lista_asesores',
                "titulo" => 'Asesores de Ventas Constructora JYP',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "fotosesion" => $this->admin_model->get_foto($sesiondata['username']),
                "lista_asesores" => $this->admin_model->mostrar_lista_asesores(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Lista asesores',
                "titulo_page" => "Lista asesores",
                "subtitulo_page" => "Asesores adscritos a la Constructora JYP",
                "box_title" => "Lista de asesores"
            );
            $this->load->view('include/admin_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function asesor_modificar() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $asesor = $this->input->get('ase_cedula');
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/admin_modificar_asesor',
                "titulo" => 'Modificar Asesores',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "asesor_m" => $this->admin_model->get_asesor_m($asesor),
                "fotosesion" => $this->admin_model->get_foto($sesiondata['username']),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Modificar Asesor',
                "titulo_page" => "Modificar Asesor",
                "subtitulo_page" => "Información a modificar",
                "box_title" => "Información actualmente registrada"
            );
            $this->load->view('include/admin_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function modificar_asesor() {
        if ($this->session->userdata('logged_in')) {
            $nombre = $this->input->post('nombre');
            $apellido = $this->input->post('apellido');
            $cedula = $this->input->post('cedula');
            $direccion = $this->input->post('direccion');
            $telefono = $this->input->post('telefono');
            $antigua = $this->input->post('antigua_cedula');
            $this->admin_model->update_modificar($cedula, $nombre, $apellido, $direccion, $telefono, $antigua);
            $this->lista_asesores();
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function nuevo_proyecto() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/admin_crear_proyecto',
                "titulo" => 'Nuevo Proyecto',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "fotosesion" => $this->admin_model->get_foto($sesiondata['username']),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Nuevo proyecto',
                "titulo_page" => "Nuevo proyecto",
                "subtitulo_page" => "Crear un nuevo proyecto de vivienda",
                "box_title" => "Información a registrar para nuevo proyecto"
            );
            $this->load->view("include/admin_template", $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function crear_nuevo_proyecto() {
        if ($this->session->userdata('logged_in')) {
            $nombre_proyecto = $this->input->post('proyecto');
            $estrato = $this->input->post('estrato');
            $ubicacion = $this->input->post('ubicacion');
            $numpatos = $this->input->post('numpatos');
            $comisiones = $this->input->post('comisiones');
            $this->admin_model->create_new_project($nombre_proyecto, $estrato, $ubicacion, $numpatos, $comisiones);
        } else {
            redirect("sesion", 'refresh');
        }
    }

    public function proyectos_inscritos() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/admin_mostrar_proyectos',
                "titulo" => 'Proyectos Inscritos',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "fotosesion" => $this->admin_model->get_foto($sesiondata['username']),
                "proyectos" => $this->admin_model->get_projects(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Proyectos inscritos',
                "titulo_page" => "Proyectos inscritos actualmente",
                "subtitulo_page" => "Proyectos actuales en venta",
                "box_title" => "Proyectos actualmente vendiendose"
            );
            $this->load->view("include/admin_template", $data);
        } else {
            redirect("sesion", 'refresh');
        }
    }

    public function modificar_proyecto() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/admin_modificar_proyecto',
                "titulo" => 'Modificar Proyecto',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "fotosesion" => $this->admin_model->get_foto($sesiondata['username']),
                "proyectos" => $this->admin_model->get_projects(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Modificar proyecto',
                "titulo_page" => "Modificar proyecto",
                "subtitulo_page" => "Cambiar información de proyecto",
                "box_title" => "Información actualmente registrada"
            );
            $this->load->view("include/admin_template", $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function busqueda_proyecto() {
        if ($this->session->userdata('logged_in')) {
            $proyecto = $this->input->post('proyecto');
            $query = $this->admin_model->get_proyecto_id($proyecto);
            $datajson = array();
            $i = 0;
            foreach ($query as $key) {
                $datajson[$i] = array($key['pro_nombre'], $key['pro_estrato'], $key['pro_ubicacion'], $key['pro_num_aptos']);
            }
            echo json_encode($datajson);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function actualizar_proyecto() {
        if ($this->session->userdata('logged_in')) {
            $id = $this->input->post('id');
            $nombre_proyecto = $this->input->post('proyecto');
            $estrato = $this->input->post('estrato');
            $ubicacion = $this->input->post('ubicacion');
            $numpatos = $this->input->post('numpatos');
            $comisiones = $this->input->post('comisiones');
            $this->admin_model->update_project($id, $nombre_proyecto, $estrato, $ubicacion, $numpatos, $comisiones);
        } else {
            redirect("sesion", 'refresh');
        }
    }

    public function ventas_mes() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $año_mes_actual = date("Y-m");
            $nuevafecha = strtotime('-1 month', strtotime($año_mes_actual));
            $año_mes_anterior = date("Y-m", $nuevafecha);
            $nuevafecha = strtotime('-2 month', strtotime($año_mes_actual));
            $año_mes_anterior2 = date("Y-m", $nuevafecha);
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/ventas_mes_view',
                "titulo" => 'Ventas del Mes',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "fotosesion" => $this->admin_model->get_foto($sesiondata['username']),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Ventas',
                "titulo_page" => "Ventas de tres meses",
                "subtitulo_page" => "Ventas de este mes y 2 anteriores",
                "box_title" => "Gráficas de ventas",
                "ventas_mes_actual" => $this->get_ventas_mes($año_mes_actual),
                "nombre_mes_actual" => $this->get_mes($año_mes_actual),
                "ventas_mes_anterior" => $this->get_ventas_mes($año_mes_anterior),
                "nombre_mes_anterior" => $this->get_mes($año_mes_anterior),
                "ventas_mes_anterior2" => $this->get_ventas_mes($año_mes_anterior2),
                "nombre_mes_anterior2" => $this->get_mes($año_mes_anterior2)
            );
            $this->load->view('include/admin_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    protected function get_ventas_mes($año_mes) {
        $ventas_mes_actual = $this->admin_model->get_ventas_mes($año_mes);
        $i = 0;
//        $datajson = array();
//        $datajson[$i] = array("Proyecto", "Numero Total Vendidos");
        $i+=1;
        $datajson = array();
        foreach ($ventas_mes_actual as $key) {
            $datajson[] = array((string) $key['pro_nombre'], (int) $key["ventas_mes"]);
        }

        return json_encode($datajson);
//        foreach ($ventas_mes_actual as $key) {
//            $datajson[$i] = array($key['pro_nombre'], (int) $key['ventas_mes']);
//            $i+=1;
//        }
//        return json_encode($datajson);
    }

    protected function get_mes($año_mes) {
        $array_meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $separar = explode("-", $año_mes);
        $numero_mes = (int) $separar[1];
        return $array_meses[$numero_mes - 1];
    }

    public function ventas_asesores() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $año_mes_actual = date("Y-m");
            $nuevafecha = strtotime('-1 month', strtotime($año_mes_actual));
            $año_mes_anterior = date("Y-m", $nuevafecha);
            $nuevafecha = strtotime('-2 month', strtotime($año_mes_actual));
            $año_mes_anterior2 = date("Y-m", $nuevafecha);
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/admin_ventas_por_asesor_view',
                "titulo" => 'Ventas Por Asesores',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "fotosesion" => $this->admin_model->get_foto($sesiondata['username']),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Ventas por asesores',
                "titulo_page" => "Ventas por asesores",
                "subtitulo_page" => "Ventas de asesor que desea consultar",
                "box_title" => "Gráficas de ventas por asesor escogido",
                "asesores" => $this->admin_model->mostrar_lista_asesores(),
                "nombre_mes_actual" => $this->get_mes($año_mes_actual),
                "nombre_mes_anterior" => $this->get_mes($año_mes_anterior),
                "nombre_mes_anterior2" => $this->get_mes($año_mes_anterior2)
            );
            $this->load->view('include/admin_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function venta_asesor_mes() {
        if ($this->session->userdata('logged_in')) {

            $asesor_id = $this->input->get('asesor');
            $ventas_asesor = $this->admin_model->get_ventas_asesor($asesor_id);
            $i = 0;
            $datajson = array();
            $datajson[$i] = array("Proyecto", "Numero Total Aptos Vendidos");
            $i = 1;
            foreach ($ventas_asesor as $key) {
                $datajson[$i] = array($key['pro_nombre'], (int) $key['num_ventas']);
                $i+=1;
            }
            echo utf8_decode(json_encode($datajson));
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function venta_asesor_mes_anterior() {
        if ($this->session->userdata('logged_in')) {

            $asesor_id = $this->input->get('asesor');
            $ventas_asesor = $this->admin_model->ventas_por_asesor_mes_anterior($asesor_id);
            $i = 0;
            $datajson = array();
            $datajson[$i] = array("Proyecto", "Numero Total Aptos Vendidos");
            $i = 1;
            foreach ($ventas_asesor as $key) {
                $datajson[$i] = array($key['pro_nombre'], (int) $key['num_ventas']);
                $i+=1;
            }
            echo json_encode($datajson);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function venta_asesor_mes_anterior2() {
        if ($this->session->userdata('logged_in')) {
            $asesor_id = $this->input->get('asesor');
            $ventas_asesor = $this->admin_model->ventas_por_asesor_mes_anterior2($asesor_id);
            $i = 0;
            $datajson = array();
            $datajson[$i] = array("Proyecto", "Numero Total Aptos Vendidos");
            $i+=1;
            foreach ($ventas_asesor as $key) {
                $datajson[$i] = array($key['pro_nombre'], (int) $key['num_ventas']);
                $i+=1;
            }
            echo json_encode($datajson);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function ventas_proyecto() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/admin_ventas_proyecto',
                "titulo" => 'Ventas Por Proyectos',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "fotosesion" => $this->admin_model->get_foto($sesiondata['username']),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Ventas por proyecto',
                "titulo_page" => "Ventas por proyecto",
                "subtitulo_page" => "Ventas por proyecto que desea consultar",
                "box_title" => "Gráficas de ventas por proyecto escogido",
                "proyectos" => $this->admin_model->get_projects()
            );
            $this->load->view('include/admin_template', $data);
        } else {
            
        }
    }

    public function ventas_proyecto_meses() {
        if ($this->session->userdata('logged_in')) {
            $proyecto = $this->input->post('proyecto');
            $año_mes_actual = date("Y-m");
            $nuevafecha = strtotime('-1 month', strtotime($año_mes_actual));
            $año_mes_anterior = date("Y-m", $nuevafecha);
            $nuevafecha = strtotime('-2 month', strtotime($año_mes_actual));
            $año_mes_anterior2 = date("Y-m", $nuevafecha);
            $ventas_meses_proyecto = $this->admin_model->ventas_por_proyecto_meses($año_mes_actual, $año_mes_anterior, $año_mes_anterior2, $proyecto);
            $nombre_mes_actual = $this->get_mes($año_mes_actual);
            $nombre_mes_anterior = $this->get_mes($año_mes_anterior);
            $nombre_mes_anterior2 = $this->get_mes($año_mes_anterior2);
            $array_nom_meses = array($nombre_mes_actual, $nombre_mes_anterior, $nombre_mes_anterior2);
            $datajson = array();
            $i = 0;
            $datajson[$i] = array('Meses', 'Numero De Ventas','Expectativas de ventas');
            $i+=1;
            $j = 0;
            foreach ($ventas_meses_proyecto as $key) {
                $datajson[$i] = array($array_nom_meses[$j], (int) $key['num_ventas']);
                $i+=1;
                $j+=1;
            }
            echo json_encode($datajson);
        } else {
            redirect("sesion", "refresh");
        }
    }

    public function ventas_totales_proyecto() {
        if ($this->session->userdata('logged_in')) {
            $proyecto = $this->input->get('proyecto');
            $nombre_proyecto = $this->admin_model->get_nom_proyecto($proyecto);
            $fecha_creacion = $this->admin_model->get_fecha_creacion($proyecto);
            $ventas_totales = $this->admin_model->ventas_totales_proyecto($proyecto, $fecha_creacion[0]['pro_fecha_creacion']);
            $apto_total = $this->admin_model->numero_total_apto_poyecto($proyecto);
            $i = 0;
            $datajson = array();
            $datajson[$i] = array('Nombre Proyecto', 'Numero Total de Ventas al Dia de Hoy', "Numero Total Apartamentos");
            $i+=1;
            foreach ($ventas_totales as $key) {
                $datajson[$i] = array($nombre_proyecto[0]['pro_nombre'], (int) $key['num_total'], (int) $apto_total[0]['pro_num_aptos']);
            }

            echo json_encode($datajson);
        } else {
            redirect("sesion", "refresh");
        }
    }

    public function ventas_por_etapas() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/admin_ventas_por_etapas_view',
                "titulo" => 'Estado de Ventas por Etapa',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "fotosesion" => $this->admin_model->get_foto($sesiondata['username']),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Ventas por proyecto',
                "titulo_page" => "Ventas por proyecto",
                "subtitulo_page" => "Ventas por proyecto que desea consultar",
                "box_title" => "Gráficas de ventas por proyecto escogido",
                "proyectos" => $this->admin_model->get_projects(),
            );
            $this->load->view('include/admin_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function mostrar_ventas_etapa() {
        if ($this->session->userdata('logged_in')) {
            $proyecto = $this->input->post('proyecto');
            $ventas_totales = $this->admin_model->get_ventas_etapas($proyecto);
            $datajson = array();
            $datajson[0] = array("Nombre de Ventas por Estado", "Numero de Ventas por Estado");
            $i = 1;
            foreach ($ventas_totales as $key) {
                $datajson[$i] = array($key['nombre_est_venta'], (int) $key['numero_ventas']);
                $i+=1;
            }

            echo json_encode($datajson);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function actualizar_informacion() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/actualizar_informacion_view',
                "titulo" => 'Actualización de Datos',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "lugar" => 'Actualización de Datos',
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Actualización de datos',
                "titulo_page" => "Actualización de datos",
                "subtitulo_page" => "Modificar datos guardados",
                "box_title" => "Datos actualmente almacenados",
            );
            $this->load->view('include/admin_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function actualizar_info_cuenta() {
        if ($this->session->userdata('logged_in')) {
            $sesiondata = $this->session->userdata('logged_in');
            if ($this->input->post('file_browse') == "") {
                $nombre = $this->input->post('nombre');
                $apellido = $this->input->post('apellidos');
                $cedula = $this->input->post('cedula');
                $direccion = $this->input->post('direccion');
                $telefono = $this->input->post('telefono');
                $contraseña = $this->input->post('password');
                $this->admin_model->actualizar_asesor2($nombre, $apellido, $cedula, $direccion, $telefono, $contraseña);
//                echo "se realizo satisfactoriamente";
                $this->index();
            } else {
                $direccionima = "./uploads/asesores/";

                $config['upload_path'] = $direccionima;
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10000';


                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file_browse')) {
                    echo "errores";
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
//              
//                $this->load->view('formulario_carga', $error);
                } else {
                    $nombre = $this->input->post('nombre');
                    $apellido = $this->input->post('apellidos');
                    $cedula = $this->input->post('cedula');
                    $direccion = $this->input->post('direccion');
                    $telefono = $this->input->post('telefono');
                    $contraseña = $this->input->post('password');
                    $this->admin_model->actualizar_asesor($nombre, $apellido, $cedula, $direccion, $telefono, $contraseña, str_replace(" ", "_", $_FILES['file_browse']['name']));
//                echo "se realizo satisfactoriamente";
                    $this->index();
                }
            }
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function expectativas_ventas_excel() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/expectativas_ventas_excel',
                "titulo" => 'Expectativas de ventas desde excel',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "clientes" => $this->cliente_model->get_clientes(),
                "proyectos" => $this->cliente_model->get_proyectos_activos(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Expectativas de ventas desde excel',
                "titulo_page" => "Expectativas de ventas desde excel",
                "subtitulo_page" => "Subir expectativas de ventas de un proyecto",
                "box_title" => "Subir archivo excel"
            );
            $this->load->view('include/admin_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function upload_expectativas_excel() {
        $direccionima = "./uploads/expectativas/";
        $fecha = date("Y-m-d");
        $config['upload_path'] = $direccionima;
        $config['allowed_types'] = 'gif|jpg|png|xls|xlsx';
        $config['max_size'] = '10000';
        $config['file_name'] = 'excel' . $fecha;
        $nombre = $_FILES['files']['name'];
        $extension = end(explode(".", $nombre));

        $namefile = "excel" . $fecha . "." . $extension;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('files')) {
            echo "errores";
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
//            echo "error";
//            $this->index();
//              
//                $this->load->view('formulario_carga', $error);
        } else {
//            echo "no error";
            $this->read_excel_expectativas($namefile);
        }
    }

    public function read_excel_expectativas($nombre) {
//        echo $nombre;
        $direccion = "./uploads/expectativas/" . $nombre;
        $this->load->library('excel');
//        $excel = new Excel();
        $excel2 = new PHPExcel_IOFactory();
        $tipoarchivo = $excel2->identify($direccion);
        $objreader = $excel2->createReader($tipoarchivo);
        $objphpexcel = $objreader->load($direccion);

        $sheet = $objphpexcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $depende = "";
        $i = 0;
        $aux1 = 2;
        $rowproyecto = $sheet->rangeToArray('A' . $aux1 . ':' . $highestColumn . $aux1, NULL, TRUE, FALSE);
        $aux2 = $rowproyecto[0][0];
        $aux = $this->admin_model->existe_expectativa(strtolower($aux2));
        $existe = $this->cliente_model->existe_proyecto($rowproyecto[0][0]);
        if ($aux >= 1) {
            $depende = "no";
        } else {
            for ($row = 2; $row <= $highestRow; $row++) {

                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                $proyecto = $rowData[0][0];


                $existe = $this->cliente_model->existe_proyecto($proyecto);
                $insert = array(
                    'fecha_venta' => $rowData[0][1] . "-01",
                    'num_ventas' => $rowData[0][2],
                    "id_proyecto" => $existe[0]['id_proyecto'],
                );

                $this->cliente_model->insertar_expectativas($insert);
                $depende = "si";
            }
        }

        if ($depende == "no") {
            $expectativas = $this->admin_model->get_expectativas(strtolower($rowproyecto[0][0]));
            $datajson = array();

            foreach ($expectativas as $key) {
                $datajson[$i] = array($i + 1, $key["fecha_venta"], (int) $key["num_ventas"]);
                $i++;
            }

            $data = array(
                "error" => "Ya existe una expectativa de venta para este proyecto, se muestra una modificación",
                "datos" => json_encode($datajson),
                "proyectoe" => $existe[0]['pro_nombre'],
                "id_proyecto" => $existe[0]['id_proyecto']
            );
            $this->modificar_expectativas($data);
        } else {
            $this->index();
        }
    }

    public function modificar_expectativas($datos) {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/modificar_expectativas_view',
                "titulo" => 'Modificación de Datos de expectativas',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "lugar" => 'Actualización de Datos',
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Modificación de Datos de expectativas',
                "titulo_page" => "Modificación de Datos de expectativas",
                "subtitulo_page" => "Modificar expectativas de ventas",
                "box_title" => "Datos actualmente almacenados",
                "error" => $datos["error"],
                "datos" => $datos["datos"],
                "proyectoe" => $datos["proyectoe"],
                "id_proyecto" => $datos['id_proyecto']
            );
            $this->load->view('include/admin_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function nuevas_expectativas() {
        if ($this->session->userdata('logged_in')) {
            $proyecto = $this->input->get('proyecto');
            $expectativas = json_decode($this->input->get('expectativa'));
            print_r($expectativas);
            $this->admin_model->borrar_expectativas($proyecto);
            echo count($expectativas);
            foreach( $expectativas  as $key) {
                $data = array(
                    "fecha_venta" => $key->fecha,
                    "num_ventas" => $key->total,
                    "id_proyecto" => $proyecto
                );
                $this->admin_model->insertar_expectativas($data);
            }
        } else {
            redirect('sesion', 'refresh');
        }
    }
    
    public function pago_mes_actual() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/pagos_mes_actual_view',
                "titulo" => 'Pagos del mes actual',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "lugar" => 'Pagos del mes actual',
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes), 
                "pago_cuota_inicial" => $this->admin_model->pago_mes_ini_actual($año_mes),
                "pago_cuotas" => $this->admin_model->pago_mes_actual($año_mes),
                "titulo_page" => "Pagos del mes actual",
                "subtitulo_page" => "Pagos que deben realizar los clientes",
                "box_title" => "Datos de las separaciones de inmueble",
                
            );
            $this->load->view('include/admin_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
        
    }
    
    public function pago_mes_anterior() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $año_mes_actual = date("Y-m");
            $nuevafecha = strtotime('-1 month', strtotime($año_mes_actual));
            $año_mes_anterior = date("Y-m", $nuevafecha);
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'administrador/pagos_mes_anterior_view',
                "titulo" => 'Pagos del mes actual',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "lugar" => 'Pagos del mes actual',
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes), 
                "pago_cuota_inicial" => $this->admin_model->pago_mes_ini_actual($año_mes_anterior),
                "pago_cuotas" => $this->admin_model->pago_mes_actual($año_mes_anterior),
                "titulo_page" => "Pagos del mes actual",
                "subtitulo_page" => "Pagos que deben realizar los clientes",
                "box_title" => "Datos de las separaciones de inmueble",
                
            );
            $this->load->view('include/admin_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
        
    }

}

?>
