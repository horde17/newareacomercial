<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script src="<?php echo base_url() ?>js/fichatecnica.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>js/jquerypriceformat.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>js/jquerypriceformat.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.timeentry.js"></script>
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
<script>
    $(document).ready(function() {
        $("#horaescritura").timeEntry();
        tinymce.init(
                {
                    plugins: "contextmenu paste",
                    paste_word_valid_elements: "b,strong,i,em,h1,h2,span",
                    menu: {},
                    menubar: true,
                    toolbar1: "undo redo |  bold italic | formatselect | fontsizeselect | cut copy paste | bullist numlist  ",
                    toolbar2: "link image",
                    selector: 'textarea',
                    forced_root_block: "",
                    height: 300,
                    contextmenu: "undo redo |  bold italic | formatselect | fontsizeselect | cut copy paste | bullist numlist",
                    language_url: '<?php echo base_url() ?>js/es.js'

                }
        );


        $("#entregaapto").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd"

        });
        $("#fechaescritura").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd"

        });
    });</script>

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
                            <div class="box-body">
                                <!-- TOP ROW -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div  id="da-login-box-content" style="display: none;">
                                            
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="nombre">Nombre</label>
                                                    <input type="text" id="nombre" name="nombre" class="form-control" />
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="apellidos">Apellidos</label>
                                                    <input type="text" id="apellidos" name="apellidos" class="form-control" />
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="apartamento">Apartamento</label>
                                                    <input type="text" id="apartamento" name="apartamento" class="form-control" />
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="preciopato">Valor Apartamento</label>
                                                    <input type="text" id="preciopato" name="preciopato" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="entregaapto">Fecha Entrega Apartamento</label>
                                                    <input type="text" id="entregaapto" name="entregaapto" class="form-control" />
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="numsotano">Numero Sotano</label>
                                                    <input type="text" id="numsotano" name="numsotano" class="form-control" />
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="numdeposito">Numero Deposito</label>
                                                    <input type="text" id="numdeposito" name="numdeposito"  class="form-control" />
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="fechaescritura">Fecha Escrituración</label>
                                                    <input type="text" id="fechaescritura" name="fechaescritura" class="form-control" />
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="horaescritura">Hora Escrituración</label>
                                                    <input type="text" id="horaescritura" name="horaescritura" class="form-control" />
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="notaria">Notaría</label>
                                                    <input type="text" id="notaria" name="notaria"  class="form-control" />
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="control-label2" for="linderosparticulares">Linderos Particulares</label>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <textarea class="form-control" id="linderosparticulares"></textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-4">
                                                    <button type="button" class="btn btn-info" id="datoscliente4" name="datoscliente">Compromiso Compraventa</button>
                                                    <button type="reset" class="btn btn-danger" id="borrardatos" name="borrardatos">Cancelar</button>
                                                </div>
                                                <div class="col-lg-4"></div>
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



<div title="Error" id="dialogoalert">

</div>

<script>
    $("#search_ficha").click(function() {
        if (($("#filtrar").val() == "") || ($("#proyectos").val() == "0")) {
            $("#errordiv").html("<p>Por favor digite el numero de cedula y el proyecto</p>");
            $("#errordiv").dialog({
                autoOpen: true,
                show: {
                    effect: "blind",
                    duration: 500
                },
                hide: {
                    effect: "explode",
                    duration: 500
                },
                width: 400,
                buttons: [
                    {
                        text: "Ok",
                        click: function() {
                            $(this).dialog("close");
                        }
                    }
                ]
            });
        } else {
            $.ajax({
                url: "<?php echo base_url() ?>asesor/get_user_compromiso/",
                data: {cedula: $("#filtrar").val(), proyecto: $("#proyectos").val()}
            }).done(function(answer) {

                $("#da-login-box-content").show('slow');
                answer2 = JSON.parse(answer);
                $("#nombre").val(answer2[0][0]);
                $("#apellidos").val(answer2[0][1]);
                $("#apartamento").val(answer2[0][2]);
                $("#preciopato").val(answer2[0][3]);
                $("#preciopato").priceFormat({
                    prefix: '',
                    thousandsSeparator: '.',
                    centsSeparator: ',',
                    centsLimit: 0
                });
            });
        }

    });
    $("#datoscliente4").click(function() {

        if ($("#entregaapto").val() == "") {
            $("#dialogoalert").html("<p>Por favor ingrese la fecha de entrega del Apartamento</p>");
            alertdialog("Ok", "entregaapto");
            return false;
        }

        if ($("#numdeposito").val() == "") {
            $("#dialogoalert").html("<p>Por favor ingrese el numero de deposito asignado</p>");
            alertdialog("Ok", "numdeposito");
            return false;
        }
        if ($("#fechaescritura").val() == "") {
            $("#dialogoalert").html("<p>Por favor ingrese la fecha de la escritura</p>");
            alertdialog("Ok", "fechaescritura");
            return false;
        }
        if ($("#horaescritura").val() == "") {
            $("#dialogoalert").html("<p>Por favor ingrese la hora para realizar la escritura</p>");
            alertdialog("Ok", "horaescritura");
            return false;
        }
        if ($("#notaria").val() == "") {
            $("#dialogoalert").html("<p>Por favor ingrese la notaria donde se firmará la escritura</p>");
            alertdialog("Ok", "notaria");
            return false;
        } else {
            $.ajax({
                url: "<?php echo base_url() ?>index.php/asesor/compromiso_aceptado/",
                data: {cedula: $("#filtrar").val(), proyecto: $("#proyectos").val(),
                    nombre: $("#nombre").val(), apellidos: $("#apellidos").val(),
                    apartamento: $("#apartamento").val(), precioapto: $("#precioapto").val(),
                    entregaapto: $("#entregaapto").val(), numsotano: $("#numsotano").val(),
                    numdeposito: $("#numdeposito").val(), fechaescritura: $("#fechaescritura").val(),
                    horaescritura: $("#horaescritura").val(), notaria: $("#notaria").val(),
                    linderosparticulares: tinyMCE.get('linderosparticulares').getContent()
                },
            });
        }
    });

</script>