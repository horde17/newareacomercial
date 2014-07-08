<script src="<?php echo base_url() ?>js/jquery.handsontable.full.js"></script>
<link rel="stylesheet" media="screen" href="<?php echo base_url() ?>css/jquery.handsontable.full.css" />
<script data-jsfiddle="common" src="<?php echo base_url() ?>js/jquery.handsontable.removeRow.js"></script>
<link data-jsfiddle="common" rel="stylesheet" media="screen" href="<?php echo base_url() ?>css/jquery.handsontable.removeRow.css" />
<script src="<?php echo base_url() ?>js/fichatecnica.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>js/jquerypriceformat.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>js/jquerypriceformat.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/areacomercial-theme/jquery-ui-1.10.3.custom.css"/>
<style>
    .control-label2{
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
        font-size : 13px !important;
        line-height: 1.428571429 !important;
        color: #333333 !important;
        font-weight: bold !important;        
        background-color: #ffffff !important;
    }
    .next-tab {
        bottom: 0;
        right: 0;
        -moz-border-radius-topleft: 10px;
        -webkit-border-top-left-radius: 10px;
        background: #0176bb;
        padding: 6px 12px;
        position: absolute;
        color:  white !important;
        font-weight: bold;
        text-decoration: none;
    }

    .prev-tab {
        bottom: 0;
        left: 0;
        -moz-border-radius-topleft: 10px;
        -webkit-border-top-left-radius: 10px;
        background: #c10505;
        padding: 6px 12px;
        position: absolute;
        color:  white !important;
        font-weight: bold;
        text-decoration: none;
    }

</style>

<div id="main-content">
    <div class="container">
        <div class="row">
            <div id="content" class="col-lg-12">
                <!-- PAGE HEADER-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-header">
                            <!-- STYLER -->

                            <!-- /STYLER -->
                            <!-- BREADCRUMBS -->
                            <ul class="breadcrumb">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <a href="<?php echo base_url() ?>admin"><?php echo $lugar ?></a>
                                </li>
                                
                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left"><?php echo $titulo_page?></h3>
                            </div>
                            <div class="description"><?php echo $subtitulo_page?></div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->
                <!-- INBOX -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BOX -->
                        <div class="box border primary">
                            <div class="box-title">
                                <h4><i class="fa fa-home"></i><?php echo $box_title?></h4>
                                <div class="tools">
                                    <a href="#box-config" data-toggle="modal" class="config">
                                        <i class="fa fa-cog"></i>
                                    </a>
                                    <a href="javascript:;" class="reload">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <a href="javascript:;" class="collapse">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a href="javascript:;" class="remove">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="box-body">
                                <!-- TOP ROW -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id="tabs">
                                            <ul>
                                                <li><a  href="#tabs-1">Datos Cliente</a></li>
                                                <li><a href="#tabs-2">Relación Pago Cuota Inicial</a></li>
                                                <li><a href="#tabs-3">Forma Cancelación Valor Restante</a></li>
                                                <li ><a href="#tabs-4">Información Laboral</a></li>
                                            </ul>
                                            <div id="tabs-1"  class="ui-tabs-panel">                        
                                                <form id="datos_cliente" enctype="multipart/form-data">
                                                    <h1>Datos del Cliente</h1>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="nombre">Nombre</label>
                                                            <input type="text" id="nombre" name="nombre" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="apellido">Apellido</label>
                                                            <input type="text" id="apellido" name="apellido" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="direccion">Dirección</label>
                                                            <input type="text" id="direccion" name="direccion" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="cedula">Cédula</label>
                                                            <input type="text" id="cedula"  name="cedula" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="expedicion">Expedición</label>
                                                            <input type="text" id="expedicion" name="expedicion" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="correoelectronico">Correo</label>
                                                            <input type="text" id="correoelectronico" onblur="validateEmail()" name="correoelectronico" class="form-control" />
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="barrio">Barrio</label>
                                                            <input type="text" id="barrio" name="barrio" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="telefonofijo">Telefono fijo</label>
                                                            <input type="text" id="telefonofijo" name="telefonofijo" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="celular">Celular</label>
                                                            <input type="text" id="celular" name="celular" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label class="control-label2" for="estadocivil">Estado Civil</label><br>
                                                            <select id="estadocivil" class="select2-container col-md-6" name="estadocivil">
                                                                <option value="1" selected="selected">Soltero</option>
                                                                <option value="2">Casado</option>
                                                                <option value="3">Únion libre</option>

                                                            </select>

                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row" id="conyugediv" style="display: none;">
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="nombreconyuge">Nombre Conyuge</label>
                                                            <input type="text" class="form-control" id="nombreconyuge" name="nombreconyuge" />
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="cedulaconyuge">Cédula Conyuge</label>
                                                            <input type="text" class="form-control" id="cedulaconyuge" name="cedulaconyuge" />
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="expedicionconyuge">Expedicion</label>
                                                            <input type="text" class="form-control" id="expedicionconyuge" name="expedicionconyuge" />
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="proyecto">Proyecto</label>
                                                            <select class="select2-container col-md-12" id="proyecto" name="proyecto">

                                                                <?php foreach ($proyectos as $key) { ?>
                                                                    <option value="<?php echo $key["id_proyecto"]; ?>"><?php echo $key["pro_nombre"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="numaparamento">Numero Apartamento</label>
                                                            <input type="text" id="numaparamento" name="numaparamento" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="habitaciones">Habitaciones</label>
                                                            <input type="text" id="habitaciones" name="habitaciones" class="form-control" />
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="metrocuadrados">Metros Cuadrados</label>
                                                            <input type="text" id="metrocuadrados" name="metrocuadrados" class="form-control" />

                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="proyecto">Proyecto</label>
                                                            <label class="control-label2" class="control-label2" for="especificaciones">Especificaciones Técnicas</label><br>
                                                            <select class="select2-container col-md-12" id="especificaciones" name="especificaciones">
                                                                <option value="3" selected="selected">Terminada</option>
                                                                <option value="2">Obra Gris</option>
                                                                <option value="1">Obra Negra</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="valorapartamento">Valor Apartamento</label>
                                                            <input type="text" id="valorapartamento" name="valorapartamento" value="0" class="form-control" />
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" class="control-label2" for="parqueaderoincluido">Parqueadero Incluido</label>
                                                            <select id="parqueaderoincluido" class="select2-container col-md-12" name="parqueaderoincluido">
                                                                <option value="Si">Si</option>
                                                                <option value="No">No</option>
                                                            </select>  

                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" for="numparqueadero">Numero Parqueadero</label>
                                                            <input type="text" id="numparqueadero" name="numparqueadero" class="form-control" />

                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" for="precio_parq">Precio Parqueadero</label>
                                                            <input type="text" id="precio_parq" name="precio_parq" class="form-control" />
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="control-label2" for="otrosrequerimientos" >Otros requerimientos acabados</label>
                                                            <textarea rows="6" id="otrosrequerimientos"  class="form-control" name="otrosrequerimientos">
                                                            </textarea>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="control-label2" for="observacionesdescuento">Observaciones por descuento especial</label>
                                                            <textarea rows="6" id="observacionesdescuento" class="form-control" name="observacionesdescuento">

                                                            </textarea>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                </form>
                                            </div>

                                            <div id="tabs-2"  class="ui-tabs-panel ui-tabs-hide">
                                                <h1>Pago Cuota Inicial </h1>
                                                <div class="row">
                                                    <h5><label class="control-label2" for="porcentajeinicial">Porcentaje Cuota Inicial</label><br>
                                                        <select class="select2-container col-md-6" id="porcentajeinicial">
                                                            <option value="0">--Seleccione un Porcentaje--</option>
                                                            <?php for ($i = 20; $i <= 30; $i++) { ?>
                                                                <option value="<?php echo $i ?>"><?php echo $i . " %" ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </h5>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label class="control-label2" for="cuotainicial">Valor Cuota Inicial</label>
                                                        <input type="text" id="cuotainicial" name="cuotainicial" value="0" class="form-control" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="control-label2" for="fechaseparacion">Fecha de Separacion</label>
                                                        <input type="text" id="fechaseparacion" name="fechaseparacion" class="form-control" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="control-label2" for="fechapagoinicial">Fecha Pago Inicial</label>
                                                        <input type="text" id="fechapagoinicial" name="fechapagoinicial" class="form-control" />
                                                    </div>
                                                </div>
                                                <br/>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="control-label2" for="subsidio">Subsidio</label>
                                                        <select class="select2-container col-md-6" id="subsidio">
                                                            <option value="no">No</option>
                                                            <option value="si">Si</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        <div id="cuotasiniciales">

                                                        </div>

                                                    </div>
                                                    <div class="col-lg-3">
                                                        <button id="cuota_caso"  type="button" class="btn btn-info"  value="Agregar Cuota">Agregar Cuota</button>
                                                    </div>
                                                </div>
                                                <br/>   
                                            </div>
                                            <div id="tabs-3"  class="ui-tabs-panel ui-tabs-hide">
                                                <div class="row">
                                                    <h1>Cancelación Valor Restante</h1>
                                                    <hr>
                                                    <label class="control-label2">Tipo Financiación</label><br/>
                                                    <select id="tipofinanciacion" class="select2-container col-md-6" >
                                                        <option value="0" selected="selected">--Seleccione Tipo De Financiación--</option>
                                                        <option value="credito" >Credito</option>
                                                        <option value="propio">Propio</option>

                                                    </select>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div id="divcredito" style="display: none;"  class="col-lg-4">
                                                        <label class="control-label2 col-md-12" for="credito">Crédito</label>
                                                        <select id="credito" class="select2-container col-md-12">
                                                            <option value="En tramite" selected="selected">En tramite</option>
                                                            <option value="Aprobado">Aprobado</option>
                                                            <option value="Preaprobado">Preaprobado</option>
                                                        </select>
                                                    </div>
                                                    <div id="diventidadfinanciera4" style="display: none;" class="col-lg-4">
                                                        <label class="control-label2" for="valorcredito">Valor</label>
                                                        <input type="text" id="valorcredito" value="0" name="valorcredito"  class="form-control" /> 
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div id="diventidadfinanciera" style="display: none" class="col-lg-4">
                                                        <label class="control-label2" for="entidadfinanciera">Entidad Financiera</label>
                                                        <select id="entidadfinanciera" class="select2-container col-md-12">
                                                            <option value="0" selected="selected">--Eliga un Banco--</option>
                                                            <?php foreach ($entidadesf as $key) { ?>
                                                                <option value="<?php echo $key['nombre_entidad_financiera'] ?>"><?php echo $key['nombre_entidad_financiera'] ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>
                                                    </div> 
                                                    <div id="diventidadfinanciera2" style="display: none" class="col-lg-4">
                                                        <label class="control-label2" for="asesor">Asesor</label>
                                                        <input type="text" id="asesor" name="asesor" class="form-control" />
                                                    </div> 
                                                    <div id="diventidadfinanciera3" style="display: none" class="col-lg-4">
                                                        <label class="control-label2" for="telefonoasesor">Telefono</label>
                                                        <input type="text" id="telefonoasesor" name="telefonoasesor" class="form-control" />
                                                    </div> 
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        <div  id="cuotasapagar">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <button id="n_caso"  type="button" class="btn btn-info">Agregar Cuota</button>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="control-label2" for="otrasformas">Otro Formas de Cancelación</label>
                                                        <textarea rows="6" id="otrasformas"  class="form-control" style="width: 100%;" name="otrasformas">
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <br>


                                            </div>
                                            <div id="tabs-4"  class="ui-tabs-panel ui-tabs-hide">
                                                <form autocomplete="off" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <h1>Información Laboral</h1>
                                                        <hr> 
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4"></div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label2" for="tipotrabajador">Tipo de Trabajador</label>
                                                            <select id="tipotrabajador" class="select2-container col-md-12">
                                                                <option value="0" selected="selected">seleccione una opción</option>
                                                                <option value="1">Empleado</option>
                                                                <option value="2">Independiente</option>
                                                                <option value="3">Pensionado</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-lg-4">

                                                        </div>
                                                    </div>

                                                    <br/>
                                                    <div class="row">
                                                        <div id="empresalaboradiv" style="display: none;" class="col-lg-4">
                                                            <label class="control-label2"  for="empresalabora">Empresa donde labora</label>
                                                            <input type="text" id="empresalabora" name="empresalabora" class="form-control"/>
                                                        </div>
                                                        <div id="tiempoempresadiv" style="display: none;" class="col-lg-4">
                                                            <label class="control-label2"  for="tiempoempresa">Tiempo en la empresa</label>
                                                            <input type="text" id="tiempoempresa" name="tiempoempresa" class="form-control" />                                    
                                                        </div>
                                                        <div id="cargoempresadiv" style="display: none;" class="col-lg-4">
                                                            <label class="control-label2"  for="cargoempresa">Cargo que desempeña</label>
                                                            <input type="text" id="cargoempresa" name="cargoempresa" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-lg-4"></div>
                                                        <div id="ingresosmensualesdiv" style="display: none;" class="col-lg-4">
                                                            <label class="control-label2"  for="ingresosmensuales">Ingresos Mensuales</label>
                                                            <input type="text" id="ingresosmensuales" value="0" name="ingresosmensuales" class="form-control"/>
                                                        </div>
                                                        <div class="col-lg-4">

                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                        <div id="tiempoindependientediv" style="display: none;" class="col-lg-4">
                                                            <label class="control-label2"  for="tiempoindependiente">Tiempo como independiente</label>
                                                            <input type="text" id="tiempoindependiente" name="tiempoindependiente" class="form-control" />
                                                        </div>
                                                        <div id="actividadindependientediv" style="display: none;" class="col-lg-4">
                                                            <label class="control-label2"  for="actividadindependiente">Actividad a la que se dedica</label>
                                                            <input type="text" id="actividadindependiente" name="actividadindependiente " class="form-control" />   
                                                        </div>
                                                        <div id="ingresosmensualesindependientediv" style="display: none;" class="col-lg-4">
                                                            <label class="control-label2"  for="ingresosmensualesindependiente">Ingresos Mensuales</label>
                                                            <input type="text" id="ingresosmensualesindependiente" value="0" name="ingresosmensualesindependiente" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-lg-4"></div>
                                                        <div id="ingresospensionadodiv" style="display: none;" class="col-lg-4">
                                                            <label class="control-label2"  for="ingresospensionado">Ingresos Mensuales</label>
                                                            <input type="text" id="ingresospensionado" name="ingresospensionado" value="0" class="form-control"/>
                                                        </div>
                                                        <div class="col-lg-4">

                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-lg-4"></div>
                                                        <div class="col-lg-4">
                                                            <button type="button" class="btn btn-primary" id="datoscliente4" name="datoscliente" value="">Guardar Datos</button>
                                                            <button type="reset" class="btn btn-danger" id="borrardatos" name="borrardatos" value="">Borrar Datos</button>
                                                        </div>
                                                        <div class="col-lg-4">

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /INBOX -->
                            </div>
                        </div>
                        <!-- /BOX -->
                    </div>
                </div>
                <!-- /INBOX -->
                <div class="footer-tools">
                    <span class="go-top">
                        <i class="fa fa-chevron-up"></i> Top
                    </span>
                </div>
            </div><!-- /CONTENT-->
        </div>
    </div>
</div>

<script>
    $(function() {
    $('#tabs').tabs();

    var $tabs = $('#tabs').tabs();
    $tabs.effect("slide", 'slow');



    $(".ui-tabs-panel").each(function(i) {

    var totalSize = $(".ui-tabs-panel").size() - 1;


    if (i != totalSize) {
    next = i + 1;
    $(this).append("<a href='#' class='next-tab' rel='" + next + "'>Próxima página &#187;</a>");
    }

    if (i != 0) {
    prev = i - 1;
    $(this).append("<a  href='#' class='prev-tab' rel='" + prev + "'>&#171; Página anterior</a>");
    }

    });

    $('.next-tab').click(function() {
    if (corroborardatos($(this).attr("rel"))) {
    $tabs.tabs({active: $(this).attr("rel")});
    return false;
    }


    });
    $(".prev-tab").click(function() {

    $tabs.tabs({active: $(this).attr("rel")});
    return false;
    });



    });


</script>

<div id="dialogoalert" title="Corregir Error">

</div>
<script>
    $("#entidadfinanciera").select2();
    $("#estadocivil").select2();
    $("#proyecto").select2();
    $("#especificaciones").select2();
    $("#parqueaderoincluido").select2();
    $("#porcentajeinicial").select2();
    $("#subsidio").select2();
    $("#tipofinanciacion").select2();
    $("#credito").select2();
    $("#tipotrabajador").select2();

    $("#datoscliente4").click(function() {
    var nombrecliente = $("#nombre").val();
    var apellidocliente = $("#apellido").val();
    var direccioncliente = $("#direccion").val();
    var cedulacliente = $("#cedula").val();
    var expedicioncedula = $("#expedicion").val();
    var correoelectronico = $("#correoelectronico").val();
    var barriocliente = $("#barrio").val();
    var telefijocliente = $("#telefonofijo").val();
    var celularcliente = $("#celular").val();
    var estadocivilcliente = $("#estadocivil").val();
    var nombreconyuge = $("#nombreconyuge").val();
    var cedulaconyuge = $("#cedulaconyuge").val();
    var expedicionconyuge = $("#expedicionconyuge").val();
    var nombreproyecto = $("#proyecto").val();
    var numeroapartamento = $("#numaparamento").val();
    var numhabitaciones = $("#habitaciones").val();
    var medicionapto = $("#metrocuadrados").val();
    var numparquedadero = $("#numparqueadero").val();
    var valorapto = $("#valorapartamento").unmask();
    var parqueadero = $("#parqueaderoincluido").val();
    var especificaciontecnica = $("#especificaciones").val();
    var otrorequerimientos = $("#otrosrequerimientos").val();
    var observacionesdesto = $("#observacionesdescuento").val();
    var coutainicial = $("#cuotainicial").unmask();
    var fechaseparacion = $("#fechaseparacion").val();
    var fechapagoinicial = $("#fechapagoinicial").val();
    var subsidio = $("#subsidio").val();
    var tablecuotasini = $("#cuotasiniciales").handsontable('getInstance');
    var hansontableci = JSON.stringify(tablecuotasini.getData());
    var credito = $("#credito").val();
    var valorcredito = $("#valorcredito").unmask();
    var entidadfinanciera = $("#entidadfinanciera").val();
    var asesor = $("#asesor").val();
    var telefonoasesor = $("#telefonoasesor").val();
    var subsidiofamiliar = $("#subsidiofamiliar").val();
    var valorsubsidiofamiliar = $("#valorsubsidiofamiliar").unmask();
    var telefonofamiliar = $("#telefonofamiliar").val();
    var otrasformas = $("#otrasformas").val();
    var tipotrabajador = $("#tipotrabajador").val();
    var empresalabora = $("#empresalabora").val();
    var tiempoempresa = $("#tiempoempresa").val();
    var cargoempresa = $("#cargoempresa").val();
    var ingresosmensuales = $("#ingresosmensuales").unmask();
    var actindependiente = $("#actividadindependiente").val();
    var ingresoindependi = $("#ingresosmensualesindependiente").unmask();
    var ingresopensionado = $("#ingresospensionado").unmask();
    var tiempoindependiente = $("#tiempoindependiente").val();
    var tablecuotas = $("#cuotasapagar").handsontable('getInstance');
    var hansontable = JSON.stringify(tablecuotas.getData());
    var datos = {
    nombre: nombrecliente,
    apellido: apellidocliente,
    direccion: direccioncliente,
    cedula: cedulacliente,
    expedicion: expedicioncedula,
    email: correoelectronico,
    telefono_fijo: telefijocliente,
    celular: celularcliente,
    estadocivil: estadocivilcliente,
    cedula_cony: cedulaconyuge,
    nombre_cony: nombreconyuge,
    expedicion_cony: expedicionconyuge,
    barrio_cliente: barriocliente,
    proyecto: nombreproyecto,
    num_apto: numeroapartamento,
    num_apto_habi: numhabitaciones,
    espacio_apto: medicionapto,
    tipofinanciacion: $("#tipofinanciacion").val(),
    num_paqueadero: numparquedadero,
    valorapto: valorapto,
    parquadero_inc: parqueadero,
    precio_parq: $("#precio_parq").unmask(),
    especificaciontec: especificaciontecnica,
    otro_reque: otrorequerimientos,
    observacionesdescto: observacionesdesto,
    coutainicial: coutainicial,
    fechaseparacion: fechaseparacion,
    fechapagoinicial: fechapagoinicial,
    subsidio: subsidio,
    credito: credito,
    valorcredito: valorcredito,
    entidadfinanciera: entidadfinanciera,
    asesor: asesor, telefonoasesor: telefonoasesor,
    subsidiofamiliar: subsidiofamiliar,
    valorsubsidiofamiliar: valorsubsidiofamiliar,
    telefonofamiliar: telefonofamiliar,
    otrasformas: otrasformas,
    tipotrabajador: tipotrabajador,
    empresalabora: empresalabora,
    tiempoempresa: tiempoempresa,
    cargoempresa: cargoempresa,
    ingresosmensuales: ingresosmensuales,
    actindependiente: actindependiente,
    tiempoindependiente: tiempoindependiente,
    ingresoindependi: ingresoindependi,
    porcentajeinicial: $("#porcentajeinicial").val(),
    ingresospensionado: ingresopensionado,
    actanumero: $("#actanumero").val(),
    fechaacta: $("#fechaacta").val(),
    fechavencimiento: $("#fechavencimiento").val(),
    hansontable: hansontable,
    hansontableci: hansontableci
    };

    Concurrent.Thread.create(guardarficha, datos);
    Concurrent.Thread.create(crearpdf, datos);




    });
</script>
<script>
    function myAutocompleteRenderer(instance, td, row, col, prop, value, cellProperties) {
    Handsontable.AutocompleteCell.renderer.apply(this, arguments);
    td.style.fontStyle = 'italic';
    td.title = 'Type to show the list of options';
    }


    $(document).ready(function(e) {

    var data = [
    ["", 1, "", ""]
    ];

    $("#cuotasapagar").handsontable({
    data: data,
    removeRowPlugin: true,
    cells: function(row, col, prop) {
    var cellProperties = {};
    return cellProperties;
    },
    colHeaders: ["Cual?", "Num Cuota", "Valor Cuota", "Fecha a Pagar"],
    columns: [
    {type: {renderer: myAutocompleteRenderer, editor: Handsontable.AutocompleteEditor},
    source: ["Credito Bancario", "CDT", "Ingresos Exterior", "Cesantias", "Recursos Propios", "Otros"],
    strict: false,
    },
    {type: 'numeric'},
    {type: 'numeric', format: '$ 0,0'},
    {type: 'date', dateFormat: 'yy-mm-dd'}
    ],
    colWidths: [120, 100, 220, 220],
    });

    var data2 = [
    ["", 1, "", ""]
    ];

    $("#cuotasiniciales").handsontable({
    data: data2,
    removeRowPlugin: true,
    cells: function(row, col, prop) {
    var cellProperties = {};
    return cellProperties;
    },
    colHeaders: ["Cual?", "Num Cuota", "Valor Cuota", "Fecha a Pagar"],
    columns: [
    {type: {renderer: myAutocompleteRenderer, editor: Handsontable.AutocompleteEditor},
    source: ["Subsidio", "CDT", "Cesantias", "Recursos Propios", "Otros"],
    strict: false,
    },
    {type: 'numeric'},
    {type: 'numeric', format: '$ 0,0'},
    {type: 'date', dateFormat: 'yy-mm-dd'}
    ],
    colWidths: [120, 100, 220, 220],
    });

    $("#n_caso").click(function(e) {
    var last = $('#cuotasapagar').handsontable('countRows');
    var ht = $("#cuotasapagar").handsontable('getInstance');
    ht.alter('insert_row');
    ht.setDataAtCell(last, 1, last + 1);

    });
    $("#cuota_caso").click(function(e) {
    var last = $('#cuotasiniciales').handsontable('countRows');
    var ht = $("#cuotasiniciales").handsontable('getInstance');
    ht.alter('insert_row');
    ht.setDataAtCell(last, 1, last + 1);

    });



    });
</script>

<div title="Información Subsidio" id="infosubsidio" style="display: none">
    <div class="divform">
        <label class="control-label2" for="actanumero">Acta No.</label>
        <input type="text" id="actanumero" name="actanumero" class="form-control"/>
    </div>
    <div class="divform">
        <label class="control-label2" for="fechaacta">Fecha</label>
        <input type="text" id="fechaacta" name="fechaacta" class="form-control"/>
    </div> 
    <div class="divform">
        <label class="control-label2" for="fechavencimiento">Fecha de Vencimiento</label>
        <input type="text" id="fechavencimiento" name="fechavencimiento" class="form-control"/>
    </div> 
</div>

<script>
    function guardarficha(datos) {
    $.ajax({
    url: "<?php echo base_url() ?>cliente/nueva_ficha_tecnica/",
    data: datos
    });
    }

    function crearpdf(datos) {
    $.ajax({
    url: "<?php echo base_url() ?>cliente/pdf_ficha_tecnica/",
    data: datos
    });
    }

</script>


