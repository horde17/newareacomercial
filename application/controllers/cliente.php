<?php

class Cliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cliente_model');
        $this->load->model('admin_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/lista_clientes',
                "titulo" => 'Lista De Clientes',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "clientes" => $this->cliente_model->get_clientes(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Lista de Clientes',
                "titulo_page" => "Lista de Clientes",
                "subtitulo_page" => "Listado de clientes en la Constructora JYP",
                "box_title" => "Existen " . count($this->cliente_model->get_clientes()) . " en la base de datos"
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function clientes_proyecto() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/lista_clientes_proyecto',
                "titulo" => 'Lista de Clientes por Proyecto',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "cliente" => $this->cliente_model->get_clientes_proyecto(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Lista de clientes por proyecto',
                "titulo_page" => "Lista de clientes por proyecto",
                "subtitulo_page" => "Listado de clientes por proyecto de la Constructora JYP",
                "box_title" => "Existen " . count($this->cliente_model->get_clientes_proyecto()) . " que estan en un proceso de ventas"
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function lista_cliente_proyecto() {
        if ($this->session->userdata('logged_in')) {
            $proyecto = $this->input->post('proyecto');
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function ficha_tecnica() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/ficha_tecnica',
                "titulo" => 'Ficha Técnica',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Ficha técnica',
                "titulo_page" => "Ficha técnica",
                "subtitulo_page" => "Ficha técnica digital",
                "box_title" => "Ficha técnica"
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function nueva_ficha_tecnica() {
        if ($this->session->userdata('logged_in')) {
            $datosasesor = $this->session->userdata('logged_in');
            $cedula_cliente = $this->input->get('cedula');
            $nombre_cliente = $this->input->get('nombre');
            $apellido_cliente = $this->input->get('apellido');
            $direccion_cliente = $this->input->get('direccion');
            $expedicion_cliente = $this->input->get('expedicion');
            $email_cliente = $this->input->get('email');
            $telefono_fijo_cliente = $this->input->get('telefono_fijo');
            $celular_cliente = $this->input->get('celular');
            $estadocivil_cliente = $this->input->get('estadocivil');
            $cedula_cony = $this->input->get('cedula_cony');
            $nombre_cony = $this->input->get('nombre_cony');
            $expedicion_cony = $this->input->get('expedicion_cony');
            $tipo_financiacion = $this->input->get("tipofinanciacion");
            $barrio_cliente = $this->input->get('barrio_cliente');
            $proyecto = $this->input->get('proyecto');
            $num_apto = $this->input->get('num_apto');
            $num_apto_habi = $this->input->get('num_apto_habi');
            $espacio_apto = $this->input->get('espacio_apto');
            $num_paqueadero = $this->input->get('num_paqueadero');
            $valorapto = $this->input->get('valorapto');
            $parquadero_inc = $this->input->get('parquadero_inc');
            $precio_parq = $this->input->get('precio_parq');
            $especificaciontec = $this->input->get('especificaciontec');
            $otro_reque = $this->input->get('otro_reque');
            $observacionesdescto = $this->input->get('observacionesdescto');
            $coutainicial = $this->input->get('coutainicial');
            $fechaseparacion = $this->input->get('fechaseparacion');
            $tipofinanciacion = $this->input->get('tipofinanciacion');
            $fechapagoinicial = $this->input->get('fechapagoinicial');
            $subsidio = $this->input->get('subsidio');
            $credito = $this->input->get('credito');
            $valorcredito = $this->input->get('valorcredito');
            $entidadfinanciera = $this->input->get('entidadfinanciera');
            $asesorentidad = $this->input->get('asesor');
            $telefonoasesor = $this->input->get('telefonoasesor');
            $subsidiofamiliar = $this->input->get('subsidiofamiliar');
            $valorsubsidiofamiliar = $this->input->get('valorsubsidiofamiliar');
            $telefonofamiliar = $this->input->get('telefonofamiliar');
            $otrasformas = $this->input->get('otrasformas');
            $tipotrabajador = $this->input->get('tipotrabajador');
            $empresalabora = $this->input->get('empresalabora');
            $tiempoempresa = $this->input->get('tiempoempresa');
            $cargoempresa = $this->input->get('cargoempresa');
            $ingresosmensuales = $this->input->get('ingresosmensuales');
            $actividadindependiente = $this->input->get('actindependiente');
            $ingresosmensualesindependiente = $this->input->get('ingresoindependi');
            $ingresospensionado = $this->input->get('ingresospensionado');
            $tiempoindependiente = $this->input->get('tiempoindependiente');
            $actanumero = $this->input->get('actanumero');
            $fechaacta = $this->input->get('fechaacta');
            $fechavencimiento = $this->input->get('fechavencimiento');
            $hansontableci = $this->input->get('hansontableci');
            $porcentajeinicial = $this->input->get('porcentajeinicial');
            $hansontable = $this->input->get('hansontable');


            $insert = array(
                'cli_cedula' => $cedula_cliente,
                'cli_nombre' => $nombre_cliente,
                'cli_apellido' => $apellido_cliente,
                'cli_direccion' => $direccion_cliente,
                'cli_telefono_cel' => $celular_cliente,
                'cli_telefono' => $telefono_fijo_cliente,
                'cli_email' => $email_cliente,
                'cli_cedula_expedicion' => $expedicion_cliente,
                'estado_civil' => $estadocivil_cliente,
                "cli_barrio" => $barrio_cliente
            );

            $this->cliente_model->insertar_cliente($insert);
            $tipocreditof = "";
            if ($tipo_financiacion <> "credito") {
                $tipocreditof = 6;
            } else {
                $tipocreditof = 5;
            }


            if ($estadocivil_cliente != '1') {
                $insertar_conyuge = array(
                    'cli_cedula' => $cedula_cliente,
                    'cony_cedula' => $cedula_cony,
                    'cony_nombre' => $nombre_cony,
                    'cony_expedicion' => $expedicion_cony,
                );
                $this->cliente_model->insertar_conyuge($insertar_conyuge);
            }

            $insertar_apto = array(
                'id_proyecto' => $proyecto,
                'cli_cedula' => $cedula_cliente,
                'apto_numero' => $num_apto,
                'apto_habitaciones' => $num_apto_habi,
                'apto_medicion' => $espacio_apto,
                'apto_parqueadero' => $num_paqueadero,
                'apto_precio' => $valorapto,
                'apto_otros_requerimientos' => $otro_reque,
                'apto_descuento' => $observacionesdescto,
                'apto_parqueadero_inc' => $parquadero_inc,
                "apto_estado_venta" => 4,
                "apto_precio_parq" => $precio_parq
            );

            $this->cliente_model->insertar_apto($insertar_apto);
            $id_apartamento = $this->cliente_model->get_id_apto($proyecto, $num_apto);



            $id_especificacion_tec = $this->cliente_model->get_id_espec($especificaciontec, $proyecto);

            $insertar_estado_venta = array(
                'id_especificacion_tecnica' => $id_especificacion_tec[0]['id_especificacion_tecnica'],
                'id_proyecto' => $proyecto,
                'id_apartamento' => $id_apartamento[0]['id_apartamento'],
                'id_tipo_tecnico' => $especificaciontec,
            );

            $this->cliente_model->insertar_entrega_estados($insertar_estado_venta);


//            Insertar Cuota Inicial
            $id_entrega = $this->cliente_model->get_id_entrega($id_apartamento[0]['id_apartamento'], $proyecto, $id_especificacion_tec[0]['id_especificacion_tecnica']);
//            print_r($id_entrega);
            $numinicialcuota = 1;
            $cuotasiniciales = json_decode($hansontableci);
//            print_r($cuotasiniciales);
            for ($j = 0; $j < count($cuotasiniciales); $j++) {
                $actanum = "";
                $fechaac = "";
                $fechav = "";
                if ($cuotasiniciales[$j][0] == "Subsidio") {
                    $actanum = $actanumero;
                    $fechaac = $fechaacta;
                    $fechav = $fechavencimiento;
                    $credito_id = 1;
                }
                echo $coutainicial[0][0];
                if (($cuotasiniciales[$j][0]) == "CDT") {
                    $credito_id = 3;
                }
                if (($cuotasiniciales[$j][0]) == "Cesantias") {
                    $credito_id = 2;
                }
                if (($cuotasiniciales[$j][0]) == "Recursos Propios") {
                    echo "algo";
                    $credito_id = 6;
                }
                if (($cuotasiniciales[$j][0]) == "Otros") {
                    $credito_id = 4;
                }

                $insert_cuota_iniciales = array(
                    "cli_cedula" => $cedula_cliente,
                    "id_entrega" => $id_entrega[0]['id_entrega'],
                    "credito_id" => $credito_id,
                    "fecha_separacion" => $fechaseparacion,
                    "fecha_pago_cuota" => $cuotasiniciales[$j][3],
                    "valor_couta" => (int) $cuotasiniciales[$j][2],
                    "acta_subisidio" => $actanum,
                    "fecha_subsidio" => $fechaac,
                    "fecha_vencimiento_subsidio" => $fechav,
                    "porcentaje_cuota_inicial" => $porcentajeinicial,
                    "observaciones" => ""
                );
                $this->cliente_model->insertar_cuotas_iniciales($insert_cuota_iniciales);
            }


            $numcoutainicial = 1;
            if ($subsidiofamiliar == "Si") {
                $insertar_cuotas_restantes = array(
                    "id_entrega" => (int) $id_entrega[0]["id_entrega"],
                    "cli_cedula" => $cedula_cliente,
                    "id_apartamento" => $id_apartamento[0]['id_apartamento'],
                    "credito_id" => 1,
                    "num_couta" => $numcoutainicial,
                    "entidad_bancaria" => "Subsidio Familiar",
                    "asesor" => "Familiar o allegado",
                    "telefono_asesor_entidad" => $telefonofamiliar,
                    "valor_cuota" => (double) $valorsubsidiofamiliar,
                    "observaciones" => $otrasformas
                );

                $numcoutainicial+=1;
                $this->cliente_model->insertar_cuotas_restantes($insertar_cuotas_restantes);
            }

            $cuotasvalorR = json_decode($hansontable);
            $numerocuotas = count($cuotasvalorR);

            for ($i = 0; $i < $numerocuotas; $i++) {
                $insertar_cuotas_restantes = array(
                    "id_entrega" => (int) $id_entrega[0]["id_entrega"],
                    "cli_cedula" => $cedula_cliente,
                    "id_apartamento" => $id_apartamento[0]['id_apartamento'],
                    "credito_id" => $tipocreditof,
                    "num_couta" => $numcoutainicial,
                    "entidad_bancaria" => $entidadfinanciera,
                    "asesor_entidad" => $asesorentidad,
                    "telefono_asesor_entidad" => $telefonoasesor,
                    "valor_cuota" => (double) $cuotasvalorR[$i][2],
                    "fecha_pago_cuota" => $cuotasvalorR[$i][3],
                    "tipo_pago" => $cuotasvalorR[$i][0],
                    "estado_credito" => $credito,
                    "tipo_financiacion" => $tipofinanciacion,
                    "observaciones" => $otrasformas
                );
                $numcoutainicial+=1;
                $this->cliente_model->insertar_cuotas_restantes($insertar_cuotas_restantes);
            }


            if ($tipotrabajador == 1) {
                $insertar_info_laboral = array(
                    "cli_cedula" => $cedula_cliente,
                    "tipo_trabajador" => $tipotrabajador,
                    "empresa_labora" => $empresalabora,
                    "tiempo_empresa" => (int) $tiempoempresa,
                    "cargo_actual" => $cargoempresa,
                    "tiempo_independiente" => $tiempoindependiente,
                    "actividad_independiente" => $actividadindependiente,
                    "ingresos_mensuales" => (int) $ingresosmensuales
                );
                $this->cliente_model->insertar_info_laboral($insertar_info_laboral);
            }
            if ($tipotrabajador == 2) {
                $insertar_info_laboral = array(
                    "cli_cedula" => $cedula_cliente,
                    "tipo_trabajador" => $tipotrabajador,
                    "empresa_labora" => $empresalabora,
                    "tiempo_empresa" => $tiempoempresa,
                    "cargo_actual" => $cargoempresa,
                    "tiempo_independiente" => $tiempoindependiente,
                    "actividad_independiente" => $actividadindependiente,
                    "ingresos_mensuales" => (int) $ingresosmensualesindependiente
                );
                $this->cliente_model->insertar_info_laboral($insertar_info_laboral);
            }
            if ($tipotrabajador == 3) {
                $insertar_info_laboral = array(
                    "cli_cedula" => $cedula_cliente,
                    "tipo_trabajador" => $tipotrabajador,
                    "empresa_labora" => $empresalabora,
                    "tiempo_empresa" => $tiempoempresa,
                    "cargo_actual" => $cargoempresa,
                    "tiempo_independiente" => $tiempoindependiente,
                    "actividad_independiente" => $actividadindependiente,
                    "ingresos_mensuales" => (int) $ingresospensionado
                );
                $this->cliente_model->insertar_info_laboral($insertar_info_laboral);
            }
            $insertar_venta = array(
                "cli_cedula" => $cedula_cliente,
                "id_apartamento" => $id_apartamento[0]['id_apartamento'],
                "ase_cedula" => $datosasesor['username'],
                "id_entrega" => $id_entrega[0]["id_entrega"],
                "valor_total_venta" => $valorapto,
                "id_proyecto" => $proyecto,
                "fecha" => date("Y-m-d"),
                "estado_venta_apto" => 4
            );
            $this->cliente_model->insertar_venta_nueva($insertar_venta);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function pdf_ficha_tecnica() {
        if ($this->session->userdata('logged_in')) {
            $datosasesor = $this->session->userdata('logged_in');
            $cedula_cliente = $this->input->get('cedula');
            $nombre_cliente = $this->input->get('nombre');
            $apellido_cliente = $this->input->get('apellido');
            $direccion_cliente = $this->input->get('direccion');
            $expedicion_cliente = $this->input->get('expedicion');
            $email_cliente = $this->input->get('email');
            $telefono_fijo_cliente = $this->input->get('telefono_fijo');
            $celular_cliente = $this->input->get('celular');
            $estadocivil_cliente = $this->input->get('estadocivil');
            $cedula_cony = $this->input->get('cedula_cony');
            $nombre_cony = $this->input->get('nombre_cony');
            $expedicion_cony = $this->input->get('expedicion_cony');
            $tipo_financiacion = $this->input->get("tipofinanciacion");
            $barrio_cliente = $this->input->get('barrio_cliente');
            $proyecto = $this->input->get('proyecto');
            $num_apto = $this->input->get('num_apto');
            $num_apto_habi = $this->input->get('num_apto_habi');
            $espacio_apto = $this->input->get('espacio_apto');
            $num_paqueadero = $this->input->get('num_paqueadero');
            $valorapto = $this->input->get('valorapto');
            $parquadero_inc = $this->input->get('parquadero_inc');
            $precio_parq = $this->input->get('precio_parq');
            $especificaciontec = $this->input->get('especificaciontec');
            $otro_reque = $this->input->get('otro_reque');
            $observacionesdescto = $this->input->get('observacionesdescto');
            $coutainicial = $this->input->get('coutainicial');
            $fechaseparacion = $this->input->get('fechaseparacion');
            $tipofinanciacion = $this->input->get('tipofinanciacion');
            $fechapagoinicial = $this->input->get('fechapagoinicial');
            $subsidio = $this->input->get('subsidio');
            $credito = $this->input->get('credito');
            $valorcredito = $this->input->get('valorcredito');
            $entidadfinanciera = $this->input->get('entidadfinanciera');
            $asesorentidad = $this->input->get('asesor');
            $telefonoasesor = $this->input->get('telefonoasesor');
            $subsidiofamiliar = $this->input->get('subsidiofamiliar');
            $valorsubsidiofamiliar = $this->input->get('valorsubsidiofamiliar');
            $telefonofamiliar = $this->input->get('telefonofamiliar');
            $otrasformas = $this->input->get('otrasformas');
            $tipotrabajador = $this->input->get('tipotrabajador');
            $empresalabora = $this->input->get('empresalabora');
            $tiempoempresa = $this->input->get('tiempoempresa');
            $cargoempresa = $this->input->get('cargoempresa');
            $ingresosmensuales = $this->input->get('ingresosmensuales');
            $actividadindependiente = $this->input->get('actindependiente');
            $ingresosmensualesindependiente = $this->input->get('ingresoindependi');
            $ingresospensionado = $this->input->get('ingresospensionado');
            $tiempoindependiente = $this->input->get('tiempoindependiente');
            $actanumero = $this->input->get('actanumero');
            $fechaacta = $this->input->get('fechaacta');
            $fechavencimiento = $this->input->get('fechavencimiento');
            $hansontableci = $this->input->get('hansontableci');
            $porcentajeinicial = $this->input->get('porcentajeinicial');
            $hansontable = $this->input->get('hansontable');
            $nombre_proyecto = $this->cliente_model->nombre_proyecto($proyecto);
            $sesiondata = $this->session->userdata('logged_in');
            $persona = $this->admin_model->get_user($sesiondata['username']);
            $personaasesor = $persona[0]['ase_nombre'] . $persona[0]['ase_apellido'];
            $especificaciontecnica = $this->cliente_model->get_nom_espec($especificaciontec, $proyecto);
            $nombre_espec = $especificaciontecnica[0]["descripcion_tecnica"];


//            Aca comienzo a crear el pdf de la ficha técnica
            $this->load->library('Pdf');
            $date = date("Y-m-d");
            $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor("Constructora JYP");
            $pdf->SetTitle("Ficha técnica cliente " . $nombre_cliente . " Proyecto " . $proyecto);
            $pdf->SetSubject("Ficha Técnica cliente " . $nombre_cliente . " Proyecto " . $proyecto);
            $pdf->SetKeywords("Ficha Técnica", date("%Y-%mm-%dd"), $nombre_cliente, $proyecto);
            $pdf->SetDisplayMode('real', 'default');
            $pdf->Addpage();
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->Image(base_url() . "images/fichas_tecnicas/fichatecnicabambu.jpg", 10, 10, 190, 25, 'JPG', 'http://www.jypconstrucciones.com', '', true, 150, '', false, false, 1, false, false, false);
            $texto = <<<EOD
               <style>
                    .container{
                width:500px;
                height:450px;
                border-style:solid;
                border-top-style:solid;
                border-right-style:solid;
                border-bottom-style:solid;
                border-left-style:solid;
                border-color:#000;
                padding: 0px 30px 50px 60px;
                }
                 td{
                    border-top: 1px solid #000;
                    border-right: 1px solid #000;   
                    border-bottom: 1px solid #000;
                    border-left: 1px solid #000;
                     }
                
                .test {
                    
                    color: #000;        
                    font-family: helvetica;
                    font-size: 10px;                    
                    font-weight:bold;
                    text-align:left;       
                }
                .test1 {
                    display:block;
                    border-color: #000;
                    border-style:solid;
                    border-width:20px;
                    color: #000;        
                    font-family: helvetica;
                    font-size: 10px;                   
                    text-align:left;
                text-decoration:underline;
                }
               .test2 {
                    color: #000;        
                    font-family: helvetica;
                    font-size: 13px;                   
                    text-align:left;
                
                }
                .test3 {                  
                    
                    border-top: 1px solid #000;
                    border-right: 1px solid #000;   
                    border-bottom: 1px solid #000;
                    border-left: 1px solid #000;
                                    
                }
                
                </style>
                <br/>
                <br/>
                <br/>   
                <br/>   
                <br/>   
                <br/>
                    <span style="font-size:13px; font-weight:bold;">Ciudad y fecha: </span><span style="text-decoration:underline; color: #000;font-family: helvetica;font-size: 12px;text-align:left;">Manizales $date</span>
                    <span style="font-size:13px; font-weight:bold;">Asesor: </span><span style="text-decoration:underline; color: #000;font-family: helvetica;font-size: 12px;text-align:left;">$personaasesor</span>
                    <br>
                    
                                                             
                    <div>
                    <table cellpadding="3">                                
                    <tr>
                    <td colspan="4"><span class ="test">Nombre Completo del Cliente: </span><span class="test1">$nombre_cliente $apellido_cliente</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="2"><span class ="test">Numero indentificación: </span><span class="test1">$cedula_cliente</span></td>
                    <td colspan="2"><span class ="test">Lugar de expedición: </span><span class="test1">$expedicion_cliente</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="2"><span class ="test">Dirección: </span><span class="test1">$direccion_cliente</span></td>
                    <td colspan="2"><span class ="test">Barrio: </span><span class="test1">$barrio_cliente</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="4"><span class ="test">Correo Electrónico: </span><span class="test1">$email_cliente</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="2" ><span class ="test">Telefono Fijo: </span><span class="test1">$telefono_fijo_cliente</span></td>
                    <td colspan="2" ><span class ="test">Telefono Celular: </span><span class="test1">$celular_cliente</span></td>
                    </tr>                    
EOD;
            if ($estadocivil_cliente != 1) {
                $texto.=<<<EOD
                    
                    <tr>
                    <td colspan="4"><span class ="test">Nombre del Conyuge: </span><span class="test1">$nombre_cony</span></td>                    
                    </tr>                        
                    
                    <tr>
                    <td colspan="2"><span class ="test">Número de Identificación: </span><span class="test1">$cedula_cony</span></td>
                    <td colspan="2"><span class ="test">Lugar de Expedición: </span><span class="test1">$expedicion_cony</span></td>
                    </tr>                    
EOD;
            }

            $texto.=<<<EOD
                    
                    <tr>
                    <td><span class ="test">Apartamento Número: </span><span class="test1">$num_apto</span></td>
                    <td><span class ="test">Habitaciones: </span><span class="test1">$num_apto_habi</span></td>
                    <td><span class ="test">Metros Cuadrados: </span><span class="test1">$espacio_apto</span></td>
                    <td><span class ="test">Parqueadero #: </span><span class="test1">$num_paqueadero</span></td>
                    </tr>
                    
                    
                    <tr>
                    <td colspan="2"><span class ="test">Valor del Apartamento: </span><span class="test1">$$valorapto</span></td>
                    <td colspan="2"><span class ="test">Parqueadero Incluido: </span><span class="test1">$parquadero_inc</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="4"><span class ="test">Especificaciones Técnicas: </span><span class="test1">$nombre_espec</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="4"><span class ="test">Otros requerimientos de Acabados: </span><span class="test1">$otro_reque</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="4"><span class ="test">Observaciones Por Descuento Especial: </span><span class="test1">$observacionesdescto</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="4"> <span style="font-size:11px; font-weight:bold; color: #000; font-family: helvetica;"> Información Laboral</span></td>
                    </tr>                    
EOD;
            if ((int) $tipotrabajador == 1) {
                $texto.=<<<EOD
                        
                    <tr>
                    <td colspan="4"><span class ="test">Empresa donde labora: </span><span class="test1">$empresalabora</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="4"><span class ="test">Tiempo en la empresa: </span><span class="test1">$tiempoempresa</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="4"><span class ="test">Cargo que desempeña: </span><span class="test1">$cargoempresa</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="4"><span class ="test">Ingresos Mensuales: </span><span class="test1">$ingresosmensuales</span></td>
                    </tr>
                    
EOD;
            }
            if ((int) $tipotrabajador == 2) {
                $texto.=<<<EOD
                    
                    <tr>
                    <td colspan="4"><span class ="test">Tiempo como independiente: </span><span class="test1">$tiempoindependiente</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="4"><span class ="test">Actividad a la que se dedica: </span><span class="test1">$actividadindependiente</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="4"><span class ="test">Ingresos Mensuales: </span><span class="test1">$ingresosmensualesindependiente</span></td>
                    </tr>
EOD;
            }
            if ((int) $tipotrabajador == 3) {
                $texto.=<<<EOD
                    
                    <tr>
                    <td colspan="4"><span class ="test">Ingresos Mensuales como Independiente: </span><span class="test1">$ingresospensionado</span></td>
                    </tr>
EOD;
            }
            $texto.=<<<EOD
                    
                    <tr>
                    <td colspan="4"><span style="font-size:11px; font-weight:bold; color: #000; font-family: helvetica;"> Relación Pago Cuota Inicial </span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="2" width="30%"><span class ="test"> Valor Cuota Inicial: </span><span class="test1">$$coutainicial</span></td>
                    <td width="35%"><span class ="test">Fecha de Separación </span><span class="test1">$fechaseparacion</span></td>
                    <td width="35%"><span class ="test">Fecha de Pago Inicial: </span><span class="test1">$fechapagoinicial</span></td>
                    </tr>
EOD;
            if ($subsidio == "si") {
                $texto.=<<<EOD
                    
                    <tr>
                    <td colspan="2"><span class ="test"> Subsidio: </span><span class="test1">Si</span></td>
                    <td colspan="2"><span class ="test"> Valor del Subsidio: </span><span class="test1">$$valorsubsidio</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="2"><span class ="test"> Acta del Subsidio: </span><span class="test1">$actanumero</span></td>
                    <td><span class ="test"> Fecha del Acta </span><span class="test1">$fechaacta</span></td>
                    <td><span class ="test"> Fecha de vencimiento del Subsidio: </span><span class="test1">$fechavencimiento</span></td>
                    </tr>
EOD;
            }
            if ($cesantias == "si") {
                $texto.=<<<EOD
                    
                    <tr>
                    <td colspan="2"><span class ="test">Cesantias: </span><span class="test1">Si</span></td>
                    <td colspan="2"><span class ="test">Valor: </span><span class="test1">$$valorcesantias</span></td>
                    </tr>
EOD;
            }
            if ($cdt == "si") {
                $texto.=<<<EOD
                    
                    <tr>
                    <td colspan="2"><span class ="test">CDT: </span><span class="test1">Si</span></td>
                    <td colspan="2"><span class ="test">Valor: </span><span class="test1">$$valorcdt</span></td>
                    </tr>
EOD;
            }
            if ($otro == "si") {
                $texto.=<<<EOD
                    
                    <tr>
                    <td colspan="2"><span class ="test">Otro: </span><span class="test1">Si</span></td>
                    <td><span class ="test">Cual?: </span><span class="test1">$cualotro</span></td>
                    <td><span class ="test">Valor: </span><span class="test1">$$otrovalor</span></td>
                    </tr>
EOD;
            }
            $texto.=<<<EOD
                    
                    <tr>
                    <td colspan="4"><span style="font-size:11px; font-weight:bold; color: #000; font-family: helvetica;"> Forma de Cancelación Restante</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="2"><span class ="test">Credito: </span><span class="test1">$credito</span></td>
                    <td colspan="2"><span class ="test">Valor del Credito: </span><span class="test1">$$valorcredito</span></td>
                    </tr>
                    
                    <tr>
                    <td colspan="2"><span class ="test">Entidad Financiera: </span><span class="test1">$entidadfinanciera</span></td>
                    <td><span class ="test">Asesor: </span><span class="test1">$asesorentidad</span></td>
                    <td><span class ="test"> Telefono del Asesor: </span><span class="test1">$telefonoasesor</span></td>
                    </tr>
EOD;
            if ($subsidiofamiliar == "Si") {
                $texto.=<<<EOD
                    
                    <tr>
                    <td colspan="2"><span class ="test">Subsidio Familiar: </span><span class="test1">Si</span></td>
                    <td><span class ="test">Valor: </span><span class="test1">$$valorsubsidiofamiliar</span></td>
                    <td><span class ="test"> Telefono del Familiar: </span><span class="test1">telefonofamiliar</span></td>
                    </tr>
EOD;
            }
            for ($i = 0; $i < $numerocuotas; $i++) {
                $tipopagocuota = $cuotasvalorR[$i][0];
                $numerodecuota = $cuotasvalorR[$i][1];
                $valordelacuota = $cuotasvalorR[$i][2];
                $fechapagocuota = $cuotasvalorR[$i][3];
                $texto.=<<<EOD
                    
                    <tr>
                    <td><span class ="test"> Tipo de Pago: </span><span class="test1">$tipopagocuota</span></td>
                    <td><span class ="test"> Numero de Cuota: </span><span class="test1">$numerodecuota</span></td>
                    <td><span class ="test"> Valor de la cuota: </span><span class="test1">$$valordelacuota</span></td>
                    <td><span class ="test"> Fecha de Pago Cuota: </span><span class="test1">$fechapagocuota</span></td>
                    </tr>
EOD;
            }
            $texto.=<<<EOD
                    <br>
                    <br>
                    <br>                   
                    
                    __________________________________________________________<BR>
                    <strong>ING. JAIRO JOHANNY POSADA TRUJILLO</strong>
                    <BR>
                    <BR>
                    <span >PROMITENTE VENDEDOR</span>
                    </tbody>
                    </table>
                
                </div>
               
EOD;

            $pdf->writeHTML($texto, true, false, true, false, '');
            if (!file_exists($nombre_proyecto[0]['pro_nombre'])) {
                mkdir("fichas_tecnicas/" . $nombre_proyecto[0]['pro_nombre']);
            }
            $guardarficha = "fichas_tecnicas/" . $nombre_proyecto[0]['pro_nombre'] . "/ficha_tecnica_de_" . $nombre_cliente . "_" . $apellido_cliente . "_" . $cedula_cliente . ".pdf";
            $pdf->Output($guardarficha, 'F');
            $this->enviar_ficha_tecnica($email_cliente, $guardarficha, $nombre_cliente . " " . $apellido_cliente, $proyecto);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function separacion_inmueble() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/consultar_ficha_tecnica',
                "titulo" => 'Separación Inmueble',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "entidadesf" => $this->cliente_model->get_entidades_financieras(),
                "proyectos" => $this->cliente_model->get_proyectos_activos(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Separación inmueble',
                "titulo_page" => "Separación inmueble",
                "subtitulo_page" => "Separación inmueble digital",
                "box_title" => "Separación inmueble"
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function consultar_ficha_tecnica() {
        if ($this->session->userdata('logged_in')) {
            $cedula = (string) $this->input->get('cedula');
            $proyecto = (int) $this->input->get('proyecto');
            $cliente = $this->cliente_model->get_cliente_ficha($cedula);
            $venta_info = $this->cliente_model->get_venta_ficha($cedula, $proyecto);
            $informacion_laboral = $this->cliente_model->get_info_lab_ficha($cedula);
            $coutas_restantes = $this->cliente_model->get_info_cuotas_ficha($cedula, $venta_info[0]['id_apartamento'], $venta_info[0]['id_entrega']);
            $coutas_iniciales = $this->cliente_model->get_info_coutas_ini_ficha($cedula, $venta_info[0]['id_entrega']);
            $estado_venta = $this->cliente_model->get_estado_venta_ficha($venta_info[0]['id_apartamento']);
            $apto = $this->cliente_model->get_apto_ficha($venta_info[0]['id_apartamento'], $cedula);
            $entrega_estados = $this->cliente_model->get_especificacion_tecnica($estado_venta[0]['id_especificacion_tecnica']);

            $datajson = array();

            $i = 0;
            foreach ($cliente as $key) {
                $datajson[$i] = array("datos_cliente", $key['cli_cedula'], $key['cli_nombre'], $key['cli_apellido'], $key['cli_direccion'],
                    $key['cli_telefono_cel'], $key['cli_telefono'],
                    $key['cli_email'], $key['cli_cedula_expedicion'], $key['estado_civil'], $key['cli_barrio']);
                $conyugesi = $key['estado_civil'];
            }
            if ((int) $conyugesi <> 1) {
                $conyuge = $this->cliente_model->get_conyuge_ficha($cedula);
                $i+=1;
                foreach ($conyuge as $key) {
                    $datajson[$i] = array("conyuge", $key['cony_cedula'], $key['cony_nombre'], $key['cony_expedicion']);
                }
            }

            $i+=1;

            foreach ($apto as $key) {
                $datajson[$i] = array("apartamento", $key['apto_numero'], $key['id_proyecto'], $key['apto_habitaciones'], $key['apto_medicion'], $key['apto_parqueadero'],
                    $key['apto_precio'], $key['apto_otros_requerimientos'], $key['apto_descuento'], $key['apto_parqueadero_inc'], $key['apto_precio_parq']);
            }


            $i+=1;
            foreach ($estado_venta as $key) {
                $datajson[$i] = array("entrega_estados", $key['id_entrega'], $key['id_especificacion_tecnica'], $key['id_proyecto'], $key['id_apartamento'],
                    $key['id_tipo_tecnico']);
            }
            $i+=1;
            foreach ($entrega_estados as $key) {
                $datajson[$i] = array("especificacion_tecnica", $key['id_tipo_tecnico'], $key['id_proyecto'], $key['descripcion_tecnica'], $key['requerimiento_adicional']);
            }

            $i+=1;
            foreach ($venta_info as $key) {
                $datajson[$i] = array("valor_total_venta", $key['valor_total_venta']);
            }

            $i+=1;
            foreach ($informacion_laboral as $key) {
                $datajson[$i] = array("informacion_laboral", $key['tipo_trabajador'], $key['empresa_labora'], $key['tiempo_empresa'], $key['cargo_actual'],
                    $key['tiempo_independiente'], $key['actividad_independiente'], $key['ingresos_mensuales']);
            }

            $i+=1;
            foreach ($venta_info as $key) {
                $datajson[$i] = array("informacion_venta", $key['id_venta'], $key['cli_cedula'], $key['id_apartamento'], $key['ase_cedula'],
                    $key['id_entrega'], $key['valor_total_venta'], $key['id_proyecto']);
            }


            foreach ($coutas_iniciales as $key) {
                $i+=1;
                $datajson[$i] = array("cuotas_iniciales", $key['couta_inicial_id'],
                    $key['cli_cedula'], $key['credito_id'],
                    $key['fecha_separacion'],
                    $key['fecha_pago_cuota'], $key['valor_couta'], $key['acta_subisidio'],
                    $key['fecha_subsidio'], $key['fecha_vencimiento_subsidio'],
                    $key['observaciones'], $key['porcentaje_cuota_inicial']);
            }


            foreach ($coutas_restantes as $key) {
                $i+=1;
                $datajson[$i] = array("cuotas_restantes", $key['num_couta'], $key['entidad_bancaria'], $key['asesor_entidad'], $key['telefono_asesor_entidad'],
                    $key['valor_cuota'], $key['fecha_pago_cuota'], $key['tipo_pago'], $key['estado_credito'], $key['observaciones'], $key['tipo_financiacion']);
            }
            echo json_encode($datajson);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function confirmar_separar_inmueble() {
        if ($this->session->userdata('logged_in')) {
            $datosasesor = $this->session->userdata('logged_in');
            $cedula_cliente = $this->input->get('cedula');
            $nombre_cliente = $this->input->get('nombre');
            $apellido_cliente = $this->input->get('apellido');
            $direccion_cliente = $this->input->get('direccion');
            $expedicion_cliente = $this->input->get('expedicion');
            $email_cliente = $this->input->get('email');
            $telefono_fijo_cliente = $this->input->get('telefono_fijo');
            $celular_cliente = $this->input->get('celular');
            $estadocivil_cliente = $this->input->get('estadocivil');
            $cedula_cony = $this->input->get('cedula_cony');
            $nombre_cony = $this->input->get('nombre_cony');
            $expedicion_cony = $this->input->get('expedicion_cony');
            $tipo_financiacion = $this->input->get("tipofinanciacion");
            $barrio_cliente = $this->input->get('barrio_cliente');
            $proyecto = $this->input->get('proyecto');
            $num_apto = $this->input->get('num_apto');
            $num_apto_habi = $this->input->get('num_apto_habi');
            $espacio_apto = $this->input->get('espacio_apto');
            $num_paqueadero = $this->input->get('num_paqueadero');
            $valorapto = $this->input->get('valorapto');
            $parquadero_inc = $this->input->get('parquadero_inc');
            $precio_parq = $this->input->get('precio_parq');
            $especificaciontec = $this->input->get('especificaciontec');
            $otro_reque = $this->input->get('otro_reque');
            $observacionesdescto = $this->input->get('observacionesdescto');
            $coutainicial = $this->input->get('coutainicial');
            $fechaseparacion = $this->input->get('fechaseparacion');
            $tipofinanciacion = $this->input->get('tipofinanciacion');
            $fechapagoinicial = $this->input->get('fechapagoinicial');
            $subsidio = $this->input->get('subsidio');
            $credito = $this->input->get('credito');
            $valorcredito = $this->input->get('valorcredito');
            $entidadfinanciera = $this->input->get('entidadfinanciera');
            $asesorentidad = $this->input->get('asesor');
            $telefonoasesor = $this->input->get('telefonoasesor');
            $subsidiofamiliar = $this->input->get('subsidiofamiliar');
            $valorsubsidiofamiliar = $this->input->get('valorsubsidiofamiliar');
            $telefonofamiliar = $this->input->get('telefonofamiliar');
            $otrasformas = $this->input->get('otrasformas');
            $tipotrabajador = $this->input->get('tipotrabajador');
            $empresalabora = $this->input->get('empresalabora');
            $tiempoempresa = $this->input->get('tiempoempresa');
            $cargoempresa = $this->input->get('cargoempresa');
            $ingresosmensuales = $this->input->get('ingresosmensuales');
            $actividadindependiente = $this->input->get('actindependiente');
            $ingresosmensualesindependiente = $this->input->get('ingresoindependi');
            $ingresospensionado = $this->input->get('ingresospensionado');
            $tiempoindependiente = $this->input->get('tiempoindependiente');
            $actanumero = $this->input->get('actanumero');
            $fechaacta = $this->input->get('fechaacta');
            $fechavencimiento = $this->input->get('fechavencimiento');
            $hansontableci = $this->input->get('hansontableci');
            $porcentajeinicial = $this->input->get('porcentajeinicial');
            $hansontable = $this->input->get('hansontable');
            $insert = array(
                'cli_cedula' => $cedula_cliente,
                'cli_nombre' => $nombre_cliente,
                'cli_apellido' => $apellido_cliente,
                'cli_direccion' => $direccion_cliente,
                'cli_telefono_cel' => $celular_cliente,
                'cli_telefono' => $telefono_fijo_cliente,
                'cli_email' => $email_cliente,
                'cli_cedula_expedicion' => $expedicion_cliente,
                'estado_civil' => $estadocivil_cliente,
                "cli_barrio" => $barrio_cliente
            );

            $this->cliente_model->update_cliente($insert);



            if ($estadocivil_cliente != '1') {
                $insertar_conyuge = array(
                    'cli_cedula' => $cedula_cliente,
                    'cony_cedula' => $cedula_cony,
                    'cony_nombre' => $nombre_cony,
                    'cony_expedicion' => $expedicion_cony,
                );
                $this->cliente_model->update_conyuge($insertar_conyuge);
            }

            $insertar_apto = array(
                'id_proyecto' => $proyecto,
                'cli_cedula' => $cedula_cliente,
                'apto_numero' => $num_apto,
                'apto_habitaciones' => $num_apto_habi,
                'apto_medicion' => $espacio_apto,
                'apto_parqueadero' => $num_paqueadero,
                'apto_precio' => $valorapto,
                'apto_otros_requerimientos' => $otro_reque,
                'apto_descuento' => $observacionesdescto,
                'apto_parqueadero_inc' => $parquadero_inc,
                "apto_estado_venta" => 1,
                "apto_precio_parq" => $precio_parq
            );

            $this->cliente_model->update_apto($insertar_apto);
            $id_apartamento = $this->cliente_model->get_id_apto($proyecto, $num_apto);



            $id_especificacion_tec = $this->cliente_model->get_id_espec($especificaciontec, $proyecto);

            $insertar_estado_venta = array(
                'id_especificacion_tecnica' => $id_especificacion_tec[0]['id_especificacion_tecnica'],
                'id_proyecto' => $proyecto,
                'id_apartamento' => $id_apartamento[0]['id_apartamento'],
                'id_tipo_tecnico' => $especificaciontec,
            );

            $this->cliente_model->update_entrega_estados($insertar_estado_venta);
            $id_entrega = $this->cliente_model->get_id_entrega($id_apartamento[0]['id_apartamento'], $proyecto, $id_especificacion_tec[0]['id_especificacion_tecnica']);

//            Insertar Cuota Inicial
            $this->cliente_model->delete_cuotas_iniciales($cedula_cliente, (int) $id_entrega[0]["id_entrega"]);

//            print_r($id_entrega);
            $numinicialcuota = 1;
            $cuotasiniciales = json_decode($hansontableci);
//            print_r($cuotasiniciales);
            foreach ($cuotasiniciales as $key) {
                $actanum = "";
                $fechaac = "";
                $fechav = "";
                if ($key->cual == "Subsidio") {
                    $actanum = $actanumero;
                    $fechaac = $fechaacta;
                    $fechav = $fechavencimiento;
                    $credito_id = 1;
                }

                if ($key->cual == "CDT") {
                    $credito_id = 3;
                }
                if ($key->cual == "Cesantias") {
                    $credito_id = 2;
                }
                if ($key->cual == "Recursos Propios") {
                    echo "algo";
                    $credito_id = 6;
                }
                if ($key->cual == "Otros") {
                    $credito_id = 4;
                }

                $insert_cuota_iniciales = array(
                    "cli_cedula" => $cedula_cliente,
                    "id_entrega" => $id_entrega[0]['id_entrega'],
                    "credito_id" => $credito_id,
                    "fecha_separacion" => $fechaseparacion,
                    "fecha_pago_cuota" => $key->fecha,
                    "valor_couta" => (int) $key->numeropesos,
                    "acta_subisidio" => $actanum,
                    "fecha_subsidio" => $fechaac,
                    "fecha_vencimiento_subsidio" => $fechav,
                    "porcentaje_cuota_inicial" => $porcentajeinicial,
                    "observaciones" => ""
                );
                $this->cliente_model->insertar_cuotas_iniciales($insert_cuota_iniciales);
            }

            $tipocreditof = "";
            if ($tipo_financiacion <> "credito") {
                $tipocreditof = 6;
            } else {
                $tipocreditof = 5;
            }

            $numcoutainicial = 1;
            if ($subsidiofamiliar == "Si") {
                $insertar_cuotas_restantes = array(
                    "id_entrega" => (int) $id_entrega[0]["id_entrega"],
                    "cli_cedula" => $cedula_cliente,
                    "id_apartamento" => $id_apartamento[0]['id_apartamento'],
                    "credito_id" => 1,
                    "num_couta" => $numcoutainicial,
                    "entidad_bancaria" => "Subsidio Familiar",
                    "asesor" => "Familiar o allegado",
                    "telefono_asesor_entidad" => $telefonofamiliar,
                    "valor_cuota" => (double) $valorsubsidiofamiliar,
                    "fecha_pago_cuota" => $cuotasvalorR[$i][3],
                    "tipo_pago" => $cuotasvalorR[$i][0],
                    "observaciones" => $otrasformas
                );

                $numcoutainicial +=1;
                $this->cliente_model->insertar_cuotas_iniciales($insertar_cuotas_restantes);
            }

            $this->cliente_model->delete_cuotas_restantes($id_apartamento[0]['id_apartamento']);
//            echo "Borre cuotas restantes";
            $cuotasvalorR = json_decode($hansontable);

            $arraytemp = array();
            $contadori = 0;
            foreach ($cuotasvalorR as $obj) {
                $arraytemp[$contadori] = array($obj->numero, $obj->numeropesos, $obj->fecha);
                $contadori +=1;
            }

            $numerocuotas = count($cuotasvalorR);
//            echo $numerocuotas;
            for ($i = 0; $i < $numerocuotas; $i++) {
//                echo $i."Jajajajaja";
//                echo $cuotasvalorR["numero"][];
                $insertar_cuotas_restantes = array(
                    "id_entrega" => (int) $id_entrega[0]["id_entrega"],
                    "cli_cedula" => $cedula_cliente,
                    "id_apartamento" => $id_apartamento[0]['id_apartamento'],
                    "credito_id" => $tipocreditof,
                    "num_couta" => $numcoutainicial,
                    "entidad_bancaria" => $entidadfinanciera,
                    "asesor_entidad" => $asesorentidad,
                    "telefono_asesor_entidad" => $telefonoasesor,
                    "valor_cuota" => (double) $arraytemp[$i][1],
                    "fecha_pago_cuota" => $arraytemp[$i][2],
                    "tipo_financiacion" => $tipo_financiacion,
                    "observaciones" => $otrasformas
                );

                $numcoutainicial+=1;
//                echo $numcoutainicial . "No se que carajos";
                $this->cliente_model->insertar_cuotas_restantes($insertar_cuotas_restantes);
            }
//            echo "por aca despues de insertar cuotas restantes";
            echo $ingresospensionado;
            echo $ingresospensionado;
            echo $tipotrabajador;
            if ($tipotrabajador == 1) {
                $insertar_info_laboral = array(
                    "cli_cedula" => $cedula_cliente,
                    "tipo_trabajador" => $tipotrabajador,
                    "empresa_labora" => $empresalabora,
                    "tiempo_empresa" => (int) $tiempoempresa,
                    "cargo_actual" => $cargoempresa,
                    "tiempo_independiente" => $tiempoindependiente,
                    "actividad_independiente" => $actividadindependiente,
                    "ingresos_mensuales" => (int) $ingresosmensuales
                );
                $this->cliente_model->update_info_laboral($insertar_info_laboral);
            }
            if ($tipotrabajador == 2) {
                $insertar_info_laboral = array(
                    "cli_cedula" => $cedula_cliente,
                    "tipo_trabajador" => $tipotrabajador,
                    "empresa_labora" => $empresalabora,
                    "tiempo_empresa" => $tiempoempresa,
                    "cargo_actual" => $cargoempresa,
                    "tiempo_independiente" => $tiempoindependiente,
                    "actividad_independiente" => $actividadindependiente,
                    "ingresos_mensuales" => (int) $ingresosmensualesindependiente
                );
                $this->cliente_model->update_info_laboral($insertar_info_laboral);
            }

            if ($tipotrabajador == 3) {
                $insertar_info_laboral = array(
                    "cli_cedula" => $cedula_cliente,
                    "tipo_trabajador" => $tipotrabajador,
                    "empresa_labora" => $empresalabora,
                    "tiempo_empresa" => $tiempoempresa,
                    "cargo_actual" => $cargoempresa,
                    "tiempo_independiente" => $tiempoindependiente,
                    "actividad_independiente" => $actividadindependiente,
                    "ingresos_mensuales" => (int) $ingresospensionado
                );
                $this->cliente_model->update_info_laboral($insertar_info_laboral);
            }
            $insertar_venta = array(
                "cli_cedula" => $cedula_cliente,
                "id_apartamento" => $id_apartamento[0]['id_apartamento'],
                "ase_cedula" => $datosasesor['username'],
                "id_entrega" => $id_entrega[0]["id_entrega"],
                "valor_total_venta" => $valorapto,
                "id_proyecto" => $proyecto,
                "fecha" => date("Y-m-d"),
                "estado_venta_apto" => 1
            );

            $this->cliente_model->update_venta_nueva($insertar_venta);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function enviar_ficha_tecnica($email, $ficha_tecnica, $nombre, $proyecto) {

        $this->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['smtp_host'] = "box389.bluehost.com";
        $config['smtp_user'] = "enviarmensajes@jypconstrucciones.com";
        $config['smtp_pass'] = "enviarmensajes@";
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from("direccioncomercial@jypconstrucciones.com", "Constructora JYP");
        $this->email->to("horde17@gmail.com");
        $body = "<p style='font-weight:bold; font-size:14px; font-family;Arial'>Apreciado Cliente $nombre<p>"
                . "<br>"
                . "<p>En el archivo adjunto encontrará la ficha técnica con toda la información"
                . "de la adquisición del Inmueble</p><br>"
                . "<p>Si tiene alguna inquietud y si desea cambiar algun dato, por favor hacerlonos saber"
                . "</p>"
                . "<p style='font-weight:bold; font-size:12px; font-family;Arial'>Gracias por su compra. Nuestro deseo es hacer las cosas para satisfacer sus necesidades de vivienda</p>";
        $this->email->subject("Ficha Técnica de " . $nombre . " Proyecto " . $proyecto);
        $this->email->message($body);
        $this->email->attach($ficha_tecnica);
        $this->email->send();
    }

    public function buscar_ficha_tecnica() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/buscar_ficha_tecnica',
                "titulo" => "Buscar Ficha Técnica",
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "clientes" => $this->cliente_model->get_clientes(),
                "proyectos" => $this->cliente_model->get_proyectos_activos(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Buscar ficha técnica',
                "titulo_page" => "Buscar ficha técnica",
                "subtitulo_page" => "Buscar ficha técnica de cliente",
                "box_title" => "Buscar ficha técnica digital de cliente"
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function buscar_ficha_pdf() {
        if ($this->session->userdata('logged_in')) {
            $cedula = $this->input->get('cedula');
            $proyecto = $this->input->get('proyecto');
            $cliente = $this->cliente_model->get_cliente_ficha($cedula);
            $nombre_proyecto = $this->cliente_model->nombre_proyecto($proyecto);
            $datajson = array();
            $datajson[0] = array($nombre_proyecto[0]["pro_nombre"], $cliente[0]["cli_nombre"], $cliente[0]["cli_apellido"]);
            echo json_encode($datajson);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function clientes_separacion() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/clientes_separacion_view',
                "titulo" => "Clientes con Separación",
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "clientes" => $this->cliente_model->get_clientes(),
                "proyectos" => $this->cliente_model->get_proyectos_activos(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Clientes en separación de inmueble',
                "titulo_page" => "Clientes en separación de inmueble",
                "subtitulo_page" => "Clientes en proceso de separación de inmueble",
                "box_title" => "Clientes en proceso de separación de inmueble por proyecto"
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function mostrar_clientes_separacion($proyecto) {
        if ($this->session->userdata('logged_in')) {
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "cliente" => $this->cliente_model->get_clientes_separacion($proyecto)
            );
            $this->load->view('clientes/mostrar_cliente_separacion_view', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function clientes_compra_venta() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/cliente_compromiso_view',
                "titulo" => "Clientes Con Compromiso Compra-Venta",
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "clientes" => $this->cliente_model->get_clientes(),
                "proyectos" => $this->cliente_model->get_proyectos_activos(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Clientes Con Compromiso Compra-Venta',
                "titulo_page" => "Clientes Con Compromiso Compra-Venta",
                "subtitulo_page" => "Clientes en proceso de Compra-venta de inmueble",
                "box_title" => "Clientes en proceso de Compra-venta de inmueble por proyecto"
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function mostrar_clientes_compromiso($proyecto) {
        if ($this->session->userdata('logged_in')) {
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "cliente" => $this->cliente_model->get_clientes_compromiso($proyecto)
            );
            $this->load->view('clientes/mostrar_cliente_compromiso_view', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function clientes_escritura_vivienda() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/cliente_escritura_view',
                "titulo" => "Clientes Con Escrituración De Vivienda",
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "clientes" => $this->cliente_model->get_clientes(),
                "proyectos" => $this->cliente_model->get_proyectos_activos(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Clientes Con Escrituración De Vivienda',
                "titulo_page" => "Clientes Con Escrituración De Vivienda",
                "subtitulo_page" => "Clientes en Escrituración De Vivienda",
                "box_title" => "Clientes en Escrituración De Vivienda por proyecto"
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function mostrar_clientes_escritura($proyecto) {
        if ($this->session->userdata('logged_in')) {
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "cliente" => $this->cliente_model->get_clientes_escritura($proyecto)
            );
            $this->load->view('clientes/mostrar_clientes_escritura_view', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function modelo_separacion_bambu() {
        $this->load->library("Number2word");
        $this->load->library("Separacion_bambu");
        $cliente = $this->input->get('nombre') . "_" . $this->input->get('apellido');
        $cedula = $this->input->get('cedula');
        $precio_parqueadero = $this->input->get('precio_parq');
        $parqueadero = $this->input->get('parqueadero');
        $apartamento = $this->input->get('apartamento');
        $apto_precio = $this->input->get('apto_precio');
        $pago_cuotas_iniciales = $this->input->get('cuotas_iniciales');
        $med_apato = $this->input->get('metroscuadrado');
        $direccion = $this->input->get('barrio');
        $barrio = $this->input->get('direccion');
        $expedicion = $this->input->get('expedicion');

        $numerotoletras = new Number2word();
        $numeroletra = $numerotoletras->num2word($apto_precio + $precio_parqueadero);

        $pdfbambu = new Separacion_bambu();
        $textopdf = $pdfbambu->crear_bambu_pdf($cliente, $cedula, $precio_parqueadero, $parqueadero, $apartamento, $apto_precio, $pago_cuotas_iniciales, $numeroletra, $med_apato, $direccion, $barrio, $expedicion);
        $this->load->library("Docx");
        $word = new Docx();
        $fileword = "separaciones/" . "Bambú" . "/separacion_de_" . $cliente . "_" . $cedula;
        $word->generar_docx($textopdf, $fileword);




        $this->generar_separacion_pdf($cliente, $cedula, "Bambú", $textopdf);
    }

    function generar_separacion_pdf($cliente, $cedula, $proyecto, $textopdf) {

        $this->load->library('Pdf');

        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor("Constructora JYP");
        $pdf->SetTitle("Separacion  " . $cliente . " Proyecto " . $proyecto);
        $pdf->SetSubject("Separacion " . $cliente . " Proyecto " . $proyecto);
        $pdf->SetKeywords("Separacion", date("%Y-%mm-%dd"), $cliente, $proyecto);
        $pdf->SetDisplayMode('real', 'default');
        $pdf->Addpage();
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $texto = <<<EOD
                $textopdf
EOD;

        if (!file_exists("separaciones/" . $proyecto)) {
            mkdir("separaciones/" . $proyecto);
        }


        $pdf->writeHTML($texto, true, false, true, false, '');
        $guardarficha = "separaciones/" . $proyecto . "/separacion_de_" . $cliente . "_" . $cedula . ".pdf";
        $pdf->Output($guardarficha, 'F');
    }

    public function compromiso_compraventa() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/compromiso_compraventa_view',
                "titulo" => 'Compromiso De Compraventa',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Compromiso De Compraventa',
                "titulo_page" => "Compromiso De Compraventa",
                "subtitulo_page" => "Compromiso De Compraventa digital",
                "box_title" => "Información para Compromiso de Compraventa",
                "proyectos" => $this->cliente_model->get_proyectos_activos()
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function mostrar_ficha_tecnica() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $cedula = $this->input->get('cedula');
            $proyecto = $this->input->get('proyecto');
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/mostrar_ficha_tecnica_view',
                "titulo" => 'Ficha Técnica Del Cliente',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Ficha técnica del cliente',
                "titulo_page" => "Ficha técnica del cliente",
                "subtitulo_page" => "Ficha técnica digital del cliente",
                "box_title" => "Ficha técnica",
                "proyecto" => $proyecto,
                "cedula" => $cedula
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function mostrar_separacion_apto() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/mostrar_separacion_apto_view',
                "titulo" => 'Separación Del Cliente',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "clientes" => $this->cliente_model->get_clientes(),
                "proyectos" => $this->cliente_model->get_proyectos_activos(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Separación del cliente',
                "titulo_page" => "Separación del cliente",
                "subtitulo_page" => "Separación digital del cliente",
                "box_title" => "Separación de inmueble"
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function mostrar_compromiso_apto() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/mostrar_compromiso_apto_view',
                "titulo" => 'Compromiso Del Cliente',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "clientes" => $this->cliente_model->get_clientes(),
                "proyectos" => $this->cliente_model->get_proyectos_activos(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Compromiso del cliente',
                "titulo_page" => "Compromiso del cliente",
                "subtitulo_page" => "Compromiso digital del cliente",
                "box_title" => "Compromiso de inmueble"
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function actualizar_informacion() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/actualizar_informacion_view',
                "titulo" => 'Actualización de Datos',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "clientes" => $this->cliente_model->get_clientes(),
                "proyectos" => $this->cliente_model->get_proyectos_activos(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Actualización de Datos',
                "titulo_page" => "Actualización de Datos",
                "subtitulo_page" => "Actualización de Datos de cuenta",
                "box_title" => "Actualización de datos"
            );
            $this->load->view('include/asesor_template', $data);
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
                $this->cliente_model->actualizar_asesor2($nombre, $apellido, $cedula, $direccion, $telefono, $contraseña);
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
                    $this->cliente_model->actualizar_asesor($nombre, $apellido, $cedula, $direccion, $telefono, $contraseña, str_replace(" ", "_", $_FILES['file_browse']['name']));
//                echo "se realizo satisfactoriamente";
                    $this->index();
                }
            }
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function nuevo_clientes_excel() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/clientes_excel_view',
                "titulo" => 'Nuevos clientes',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "clientes" => $this->cliente_model->get_clientes(),
                "proyectos" => $this->cliente_model->get_proyectos_activos(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Nuevos clientes',
                "titulo_page" => "Nuevos clientes",
                "subtitulo_page" => "Nuevos clientes desde archivo excel",
                "box_title" => "Subir archivo excel"
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function upload_cliente_excel() {
        $direccionima = "./uploads/";
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
            $this->index();
//              
//                $this->load->view('formulario_carga', $error);
        } else {
            $this->read_excel($namefile);
            $this->index();
        }
    }

    public function read_excel($nombre) {

        $direccion = "./uploads/" . $nombre;
        $this->load->library('excel');
//        $excel = new Excel();
        $excel2 = new PHPExcel_IOFactory();
        $tipoarchivo = $excel2->identify($direccion);
        $objreader = $excel2->createReader($tipoarchivo);
        $objphpexcel = $objreader->load($direccion);

        $sheet = $objphpexcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for ($row = 2; $row <= $highestRow; $row++) {
            //  Read a row of data into an array
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

            $cedula = str_replace(".", "", (string) $rowData[0][0]);
//            echo $cedula;
            $existe = $this->cliente_model->existe_cliente($cedula);
//            echo $existe;
            $estadocivil = strtolower($rowData[0][9]);
            $idestadociv;
            if ($estadocivil == "casado" || $estadocivil == "casada") {
                $idestadociv = 2;
            }
            if ($estadocivil == "divorciado" || $estadocivil == "divorciada" || $estadocivil == "soltero" || $estadocivil == "soltera") {
                $idestadociv = 1;
            }
            if ($estadocivil == "union libre") {
                $idestadociv = 3;
            }
            if ($existe == "false") {
                $insert = array(
                    'cli_cedula' => $cedula,
                    'cli_nombre' => $rowData[0][2],
                    'cli_apellido' => $rowData[0][3],
                    'cli_direccion' => $rowData[0][4],
                    'cli_telefono_cel' => $rowData[0][6],
                    'cli_telefono' => $rowData[0][5],
                    'cli_email' => $rowData[0][7],
                    'cli_cedula_expedicion' => $rowData[0][1],
                    'estado_civil' => $idestadociv,
                    "cli_barrio" => $rowData[0][8]
                );
                $this->cliente_model->insertar_cliente($insert);
                if ($idestadociv == 2) {
                    $insertar_conyuge = array(
                        'cli_cedula' => $cedula,
                        'cony_cedula' => str_replace(".", "", (string) $rowData[0][10]),
                        'cony_nombre' => $rowData[0][12],
                        'cony_expedicion' => $rowData[0][11],
                    );
                    $this->cliente_model->insertar_conyuge($insertar_conyuge);
                }
            }
        }
    }

    public function subir_contacto() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/nuevos_contactos_excel_view',
                "titulo" => 'Nuevos contactos',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "proyectos" => $this->cliente_model->get_proyectos_activos(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Nuevos contactos',
                "titulo_page" => "Nuevos contactos",
                "subtitulo_page" => "Nuevos contactos desde archivo excel",
                "box_title" => "Subir archivo excel"
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function nuevo_contacto() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/nuevos_contactos_view',
                "titulo" => 'Nuevos contactos',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "proyectos" => $this->cliente_model->get_proyectos_activos(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Nuevos contactos',
                "titulo_page" => "Nuevos contactos",
                "subtitulo_page" => "Nuevos contactos",
                "box_title" => "Nuevo contacto"
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function new_form_contacto() {
        if ($this->session->userdata('logged_in')) {
            $nombre = $this->input->post('nombre');
            $telfijo = $this->input->post('telefijo');
            $telefonocel = $this->input->post('telefonocel');
            $correo = $this->input->post('correo');
            $presupuesto = $this->input->post('presupuesto');
            $proyectos = $this->input->post('proyectos');
//            echo $proyectos;
            $presupuesto = str_replace(".", "", $presupuesto);


            $data = array(
                "nombre" => $nombre,
                "telefono_fijo" => $telfijo,
                "telefono_cel" => $telefonocel,
                "correo" => $correo,
                "presupuesto" => (double) $presupuesto,
                "pro_nombre" => $proyectos
            );
            $this->cliente_model->insertar_contactos($data);
            redirect('cliente/nuevo_contacto/', 'refresh');
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function read_excel_contactos() {
        $direccionima = "./uploads/";
        $fecha = date("Y-m-d");
        $config['upload_path'] = $direccionima;
        $config['allowed_types'] = 'gif|jpg|png|xls|xlsx';
        $config['max_size'] = '10000';
        $config['file_name'] = 'excel_contactos' . $fecha;
        $nombre = $_FILES['files']['name'];
        $extension = end(explode(".", $nombre));

        $namefile = "excel_contactos" . $fecha . "." . $extension;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('files')) {
            echo "errores";
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
//            $this->index();
//              
//                $this->load->view('formulario_carga', $error);
        } else {
            $this->read_excel_new_contactos($namefile);
            $this->contactos();
        }
    }

    public function read_excel_new_contactos($nombre) {

        $direccion = "./uploads/" . $nombre;
        $this->load->library('excel');
//        $excel = new Excel();
        $excel2 = new PHPExcel_IOFactory();
        $tipoarchivo = $excel2->identify($direccion);
        $objreader = $excel2->createReader($tipoarchivo);
        $objphpexcel = $objreader->load($direccion);

        $sheet = $objphpexcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for ($row = 2; $row <= $highestRow; $row++) {

            //  Read a row of data into an array
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            if ($rowData[0][0] == NULL) {
                break;
            } else {
                $presupuesto = str_replace(".", "", (string) $rowData[0][4]);
                $data = array(
                    "nombre" => $rowData[0][0],
                    "telefono_fijo" => $rowData[0][1],
                    "telefono_cel" => $rowData[0][2],
                    "correo" => $rowData[0][3],
                    "presupuesto" => (double) $presupuesto,
                    "pro_nombre" => $rowData[0][5]
                );
                $this->cliente_model->insertar_contactos($data);
            }
        }
    }

    public function contactos() {
        if ($this->session->userdata('logged_in')) {
            $año_mes = date("Y-m");
            $sesiondata = $this->session->userdata('logged_in');
            $data = array(
                "main" => 'clientes/contactos_view',
                "titulo" => 'Contactos potenciales',
                "persona" => $this->admin_model->get_user($sesiondata['username']),
                "contactos" => $this->cliente_model->get_contactos(),
                "proyectos" => $this->cliente_model->get_proyectos_activos(),
                "ventasasesores" => $this->admin_model->ventas_por_asesor($año_mes),
                "noventasasesores" => $this->admin_model->asesores_sin_venta($año_mes),
                "lugar" => 'Contactos potenciales',
                "titulo_page" => "Contactos potenciales",
                "subtitulo_page" => "Contactos potenciales",
                "box_title" => "Contactos"
            );
            $this->load->view('include/cliente_template', $data);
        } else {
            redirect('sesion', 'refresh');
        }
    }

    public function eliminar_contacto() {
        if ($this->session->userdata('logged_in')) {
            $correocontac = $this->input->get('correoc');
            $this->cliente_model->borrar_contacto($correocontac);
        } else {
            redirect('sesion', 'refresh');
        }
    }

}

?>
