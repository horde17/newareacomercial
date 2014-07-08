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
                                <input id="filtrar" type="text" />
                                <select id="proyectos">
                                    <option value="0">--Seleccione un Proyecto--</option>
                                    <?php foreach ($proyectos as $key) { ?>

                                        <option value="<?php echo $key["id_proyecto"]; ?>"><?php echo $key["pro_nombre"]; ?></option>
                                    <?php } ?>

                                </select>
                                <input type="submit" value="Buscar Ficha Tecnica" id="search_ficha"/>
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
                            <div class="box-body" style="display: none;" id="da-login-box-content">
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
                                                            <select id="estadocivil" class="form-control col-md-6" name="estadocivil">
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
                                                            <select class="form-control col-md-12" id="proyecto" name="proyecto">

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
                                                            <select class="form-control col-md-12" id="especificaciones" name="especificaciones">
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
                                                            <select id="parqueaderoincluido" class="form-control col-md-12" name="parqueaderoincluido">
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
                                                        <select class="form-control col-md-6" id="porcentajeinicial">
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
                                                        <select class="form-control col-md-6" id="subsidio">
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
                                                    <select id="tipofinanciacion" class="form-control col-md-6" >
                                                        <option value="0" selected="selected">--Seleccione Tipo De Financiación--</option>
                                                        <option value="credito" >Credito</option>
                                                        <option value="propio">Propio</option>

                                                    </select>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div id="divcredito" style="display: none;"  class="col-lg-4">
                                                        <label class="control-label2 col-md-12" for="credito">Crédito</label>
                                                        <select id="credito" class="form-control col-md-12">
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
                                                        <select id="entidadfinanciera" class="form-control col-md-12">
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
                                                            <select id="tipotrabajador" class="form-control col-md-12">
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
<div id="dialogoalert">

</div>

<div title="Información Subsidio" id="infosubsidio" style="display: none">
    <div class="divform">
        <label for="actanumero">Acta No.</label>
        <input type="text" id="actanumero" name="actanumero" class="inputtext"/>
    </div>
    <div class="divform">
        <label for="fechaacta">Fecha</label>
        <input type="text" id="fechaacta" name="fechaacta" class="inputtext"/>
    </div> 
    <div class="divform">
        <label for="fechavencimiento">Fecha de Vencimiento</label>
        <input type="text" id="fechavencimiento" name="fechavencimiento" class="inputtext"/>
    </div> 
</div>

<script>
    $(function() {


        var $tabs = $('#tabs').tabs();
        $tabs.effect("slide", 'slow');
        $(".ui-tabs-panel").each(function(i) {

            var totalSize = $(".ui-tabs-panel").size() - 1;
            if (i != totalSize) {
                next = i + 1;
                $(this).append("<a href='#' class='next-tab mover' rel='" + next + "'>Next Page &#187;</a>");
            }

            if (i != 0) {
                prev = i - 1;
                $(this).append("<a  href='#' class='prev-tab mover' rel='" + prev + "'>&#171; Prev Page</a>");
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

<script>


    $(document).ready(function(e) {
        $("#cuota_caso").click(function(e) {
            var last = $('#cuotasiniciales').handsontable('countRows');
            var ht = $("#cuotasiniciales").handsontable('getInstance');
            ht.alter('insert_row');
            ht.setDataAtCell(last, 1, last + 1);

        });
        $("#n_caso").click(function(e) {
            var last = $('#cuotasapagar').handsontable('countRows');
            var ht = $("#cuotasapagar").handsontable('getInstance');
            ht.alter('insert_row');
            ht.setDataAtCell(last, 1, last + 1);

        });
    });</script>

<script type="text/javascript">
    $("#search_ficha").click(function() {
        var data = {cedula: $("#filtrar").val(), proyecto: $("#proyectos").val()};
        $.ajax({
            url: "<?php echo base_url() ?>cliente/consultar_ficha_tecnica/",
            data: data

        }).done(function(answer) {
//            alert(answer);
            var answer2 = JSON.parse(answer);
//                        alert(answer2);
            $("#dialogoalert").html("<p>Se ha Encontrado el cliente que buscaba</p>");
            alertdialog("Ok", "filtrar");
            $("#nombre").val(answer2[0][2]);
            $("#apellido").val(answer2[0][3]);
            $("#direccion").val(answer2[0][4]);
            $("#cedula").val(answer2[0][1]);
            $("#expedicion").val(answer2[0][8]);
            $("#correoelectronico").val(answer2[0][7]);
            $("#barrio").val(answer2[0][10]);
            $("#telefonofijo").val(answer2[0][5]);
            $("#celular").val(answer2[0][6]);
            $("#estadocivil").val(answer2[0][9]);
            if ($("#estadocivil").val() != '1') {
                $("#conyugediv").show();
                $("#conyugeceduladiv").show();
                $("#expedicionconyugediv").show();
                $("#nombreconyuge").val(answer2[1][2]);
                $("#cedulaconyuge").val(answer2[1][1]);
                $("#expedicionconyuge").val(answer2[1][3]);
                var inicioapto = 2;
            }
            else {
                $("#conyugediv").hide();
                $("#conyugeceduladiv").hide();
                $("#expedicionconyugediv").hide();
                var inicioapto = 1;
            }

            $("#especificaciones").val(answer2[inicioapto + 2][1]);
//            alert(answer2[inicioapto+2][2]);

//            alert(answer2[inicioapto][2]);
            $("#proyecto").val(answer2[inicioapto][2]);
            $("#numaparamento").val(parseInt(answer2[inicioapto][1]));
            $("#habitaciones").val(parseInt(answer2[inicioapto][3]));
            $("#metrocuadrados").val(parseInt(answer2[inicioapto][4]));
            $("#numparqueadero").val(parseInt(answer2[inicioapto][5]));
            $("#valorapartamento").val(parseInt(answer2[inicioapto][6]));
            $("#parqueaderoincluido").val(answer2[inicioapto][9]);
            $("#precio_parq").val(answer2[inicioapto][10]);
//            $("#especificaciones").val(answer2[3][2]);
            $("#otrosrequerimientos").val(answer2[inicioapto][7]);
            $("#observacionesdescuento").val(answer2[inicioapto][8]);
            var inicioini = 0;
            var iniciofinales = 0;
            var cuantascuotasini = 0;
            var cuotasfinales = 0;
            var bandera = 0;
            for (var i = 0; i < (answer2.length); i++) {
                var espacioarray = answer2[i][0];
                if ((espacioarray === "cuotas_iniciales") && (bandera === 0)) {
                    inicioini = i;
                    bandera = 1;
                    cuantascuotasini += 1;
                }
                else if (espacioarray === "cuotas_iniciales") {
                    cuantascuotasini += 1;
                }
            }
            var tempi = inicioini;
            var numerocuotasiniciales = tempi + cuantascuotasini;
            var valcuotaini = 0;
            var handsontableci = [];
            var posicion = 0;
            var contador = 1;
            var total = 0;
            for (tempi; tempi < numerocuotasiniciales; tempi++) {
                var cuotainicial = answer2[tempi][3];
                var credito_id = "";
                if (answer2[tempi][3] == "1") {

                    $("#subsidio").val('si');
                    $("#subsidiodiv").show();
                    $("#actanumero").val(answer2[tempi][7]);
                    $("#fechaacta").val(answer2[tempi][8]);
                    $("#fechavencimiento").val(answer2[tempi][9]);

                }
                if ((cuotainicial) == "CDT") {
                    credito_id = "CDT";

                }
                if ((cuotainicial) == "Cesantias") {
                    credito_id = "Cesantias";
                }
                if ((cuotainicial) == "Recursos Propios") {
                    credito_id = "Recursos Propios";
                }
                if ((cuotainicial) == "Otros") {
                    credito_id = "Otros";
                }
                $("#porcentajeinicial").val(answer2[tempi][11]);
                valcuotaini += parseInt(answer2[tempi][6]);
                $("#fechaseparacion").val(answer2[tempi][5]);
                $("#fechapagoinicial").val(answer2[tempi][4]);
                handsontableci[posicion] = {cual: credito_id, numero: contador, numeropesos: parseInt(answer2[tempi][6]), fecha: answer2[tempi][5]};

                contador += 1;
                posicion += 1;

            }
//            alert(handsontableci);



            $("#cuotainicial").val(valcuotaini);
            var bandera = 0;
            for (var i = 0; i < (answer2.length); i++) {
                var espacioarray = answer2[i][0];
                if ((espacioarray === "cuotas_restantes") && (bandera === 0)) {
                    iniciofinales = i;
                    bandera = 1;
                    cuotasfinales += 1;
                }
                else if (espacioarray === "cuotas_restantes") {
                    cuotasfinales += 1;
                }
            }
            tempi = iniciofinales;
            var numerocuotasfin = tempi + cuotasfinales;
            var valcuotafin = 0;
            var handsontable = [];
            var contador = 1;
            var posicion = 0;
            for (tempi; tempi < numerocuotasfin; tempi++) {

                if (answer2[tempi][2] == "Subsidio Familiar") {
                    $("#valorsubsidiofamiliar").val(answer2[tempi][5]);
                    $("#telefonofamiliar").val(answer2[tempi][4]);
                    $("#subsidiofamiliar").val("Si");
                    valcuotafin += parseInt(answer2[tempi][5]);
                    //handsontable[posicion] = {numero: parseInt(contador), numeropesos: parseInt(answer2[tempi][5]), fecha: answer2[tempi][6]};
                }
                else {
                    if (answer2[tempi][10] == "credito") {
                        $("#tipofinanciacion").val("credito");
                        $("#divcredito").show();
                        $("#diventidadfinanciera4").show();
                        $("#diventidadfinanciera3").show();
                        $("#diventidadfinanciera2").show();
                        $("#diventidadfinanciera").show();
                        $("#credito").val(answer2[tempi][8]);
                        $("#entidadfinanciera").val(answer2[tempi][2]);
                        $("#asesor").val(answer2[tempi][3]);
                        $("#telefonoasesor").val(answer2[tempi][4]);
                        handsontable[posicion] = {cual: answer2[tempi][7], numero: contador, numeropesos: parseInt(answer2[tempi][5]), fecha: answer2[tempi][6]};
                        valcuotafin += parseInt(answer2[tempi][5]);

                        $("#otrasformas").val(answer2[tempi][9]);
                    }
                }
                contador += 1;
                posicion += 1;
            }

            function getdataci() {
                var data = handsontableci;
                return data;
            }
//                alert(handsontable);
            function getdata() {
                var data = handsontable;
//                        alert(handsontable);
                return data;
            }
            function myAutocompleteRenderer(instance, td, row, col, prop, value, cellProperties) {
                Handsontable.AutocompleteCell.renderer.apply(this, arguments);
                td.style.fontStyle = 'italic';
                td.style.fontSize = '13px';
                td.title = 'Type to show the list of options';
            }


            $("#cuotasapagar").handsontable({
                data: getdata(),
                removeRowPlugin: true,
                cells: function(row, col, prop) {
                    var cellProperties = {};
                    return cellProperties;
                },
                colHeaders: ["Cual?", "Numero", "Valor Cuota", "Fecha Pagar"],
                columns: [
                    {data: "cual", type: {renderer: myAutocompleteRenderer, editor: Handsontable.AutocompleteEditor},
                        source: ["Credito Bancario", "CDT", "Ingresos Exterior", "Recursos Propios", "Otros"],
                        strict: false
                    },
                    {data: "numero", type: 'numeric'},
                    {data: "numeropesos", type: 'numeric', format: '$ 0,0'},
                    {data: "fecha", type: 'date', dateFormat: 'yy-mm-dd'}
                ],
                colWidths: [140, 70, 200, 200],
            });

            $("#cuotasiniciales").handsontable({
                data: getdataci(),
                removeRowPlugin: true,
                cells: function(row, col, prop) {
                    var cellProperties = {};
                    return cellProperties;
                },
                colHeaders: ["Cual?", "Numero", "Valor Cuota", "Fecha Pagar"],
                columns: [
                    {data: "cual", type: {renderer: myAutocompleteRenderer, editor: Handsontable.AutocompleteEditor},
                        source: ["Credito Bancario", "CDT", "Ingresos Exterior", "Recursos Propios", "Otros"],
                        strict: false
                    },
                    {data: "numero", type: 'numeric'},
                    {data: "numeropesos", type: 'numeric', format: '$ 0,0'},
                    {data: "fecha", type: 'date', dateFormat: 'yy-mm-dd'}
                ],
                colWidths: [140, 70, 200, 200],
            });

            $("#valorcredito").val(valcuotafin);
            $("#tipotrabajador").val(answer2[2][7]);
            var tempilab = 0;
            var labposicion = 0;
            for (tempilab; tempilab < answer2.length; tempilab++) {
                if (answer2[tempilab][0] == "informacion_laboral") {
                    labposicion = tempilab;
                }
            }
//            alert(labposicion);
//            alert(answer);
//                alert(answer2.length);
            if (answer2[labposicion][1] == "1") {
                $("#empresalabora").val(answer2[labposicion][2]);
                $("#tiempoempresa").val(answer2[labposicion][3]);
                $("#cargoempresa").val(answer2[labposicion][4]);
                $("#ingresosmensuales").val(answer2[labposicion][7]);
                $("#empresalaboradiv").show();
                $("#tiempoempresadiv").show();
                $("#cargoempresadiv").show();
                $("#ingresosmensualesdiv").show();
                $("#tipotrabajador").val("1");
            }
            if (answer2[labposicion][1] == "2") {
                $("#tiempoindependiente").val(answer2[labposicion][5]);
                $("#actividadindependiente").val(answer2[labposicion][6]);
                $("#ingresosmensualesindependiente").val(answer2[labposicion][7]);
                $("#tiempoindependientediv").show();
                $("#actividadindependientediv").show();
                $("#ingresosmensualesindependientediv").show();
                $("#tipotrabajador").val("2");
            }
            if (answer2[labposicion][1] == "3") {
//                alert(parseInt(answer2[labposicion][7]));
                $("#ingresospensionado").val(parseInt(answer2[labposicion][7]));
                $("#ingresospensionadodiv").show();
                $("#tipotrabajador").val("3");
            }
            $("#valorapartamento").priceFormat({
                prefix: '',
                thousandsSeparator: '.',
                centsSeparator: ',',
                centsLimit: 0
            });
            $("#cuotainicial").priceFormat({
                prefix: '',
                thousandsSeparator: '.',
                centsSeparator: ',',
                centsLimit: 0
            });
            $("#valorsubsidio").priceFormat({
                prefix: '',
                thousandsSeparator: '.',
                centsSeparator: ',',
                centsLimit: 0
            });
            $("#valorcesantias").priceFormat({
                prefix: '',
                thousandsSeparator: '.',
                centsSeparator: ',',
                centsLimit: 0
            });
            $("#valorcdt").priceFormat({
                prefix: '',
                thousandsSeparator: '.',
                centsSeparator: ',',
                centsLimit: 0
            });
            $("#otrovalor").priceFormat({
                prefix: '',
                thousandsSeparator: '.',
                centsSeparator: ',',
                centsLimit: 0
            });
            $("#valorcredito").priceFormat({
                prefix: '',
                thousandsSeparator: '.',
                centsSeparator: ',',
                centsLimit: 0
            });
            $("#ingresosmensualesindependiente").priceFormat({
                prefix: '',
                thousandsSeparator: '.',
                centsSeparator: ',',
                centsLimit: 0
            });
            $("#ingresosmensuales").priceFormat({
                prefix: '',
                thousandsSeparator: '.',
                centsSeparator: ',',
                centsLimit: 0
            });
            $("#ingresospensionado").priceFormat({
                prefix: '',
                thousandsSeparator: '.',
                centsSeparator: ',',
                centsLimit: 0
            });

            $("#precio_parq").priceFormat({
                prefix: '',
                thousandsSeparator: '.',
                centsSeparator: ',',
                centsLimit: 0
            });


            $("#da-login-box-content").show("slow");
        }).fail(function() {
            $("#dialogoalert").html("<p>No Se ha Encontrado el cliente que buscaba</p>");
            alertdialog("Ok", "filtrar");
        });
    });</script>

<script type="text/javascript">
    
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
        var datospdf = {nombre: nombrecliente, apellido: apellidocliente,
            cedula: cedulacliente, precio_parq: $("#precio_parq").unmask(),
            parqueadero: numparquedadero, apartamento: numeroapartamento,
            apto_precio: valorapto, cuotas_iniciales: hansontableci, metroscuadrado: medicionapto, barrio: barriocliente, direccion: direccioncliente, expedicion: expedicioncedula};


        Concurrent.Thread.create(confirmar_ficha, datos);
        Concurrent.Thread.create(separacion_inmueble, datospdf);

    });



</script>
<script>
    function confirmar_ficha(datos) {
        $.ajax({
            url: "<?php echo base_url() ?>cliente/confirmar_separar_inmueble/",
            data: datos
        });
    }

    function separacion_inmueble(datos) {
        $.ajax({
            url: "<?php echo base_url() ?>cliente/modelo_separacion_bambu/",
            data: datos
        });
    }
</script>


