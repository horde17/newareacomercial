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
                                        <div style="display: none;" id="da-login-box-content">
                                            <h1><center><?php echo $lugar ?></center></h1>
                                            <script>
                                                function errordialog() {
                                                    $("#error_pdf").dialog({
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
                                                                    $("#" + input).focus();
                                                                }
                                                            }
                                                        ]
                                                    });
                                                }
                                                $("#search_ficha").click(function() {
                                                    if ($("#proyectos").val() == "0") {
                                                        $("#error_pdf").html("<p>Debe elegir un proyecto</p>");
                                                    }
                                                    if ($("#filtrar").val() == "") {
                                                        $("#error_pdf").html("<p>Por favor </p>");

                                                    }
                                                    var lugar = $.ajax({
                                                        url: "<?php echo base_url() ?>cliente/buscar_ficha_pdf/",
                                                        data: {cedula: $("#filtrar").val(), proyecto: $("#proyectos").val()},
                                                    });
                                                    lugar.done(function(msg) {
                                                        $("#da-login-box-content").show('slow');
//                                                        alert(msg);
                                                        var msg2 = JSON.parse(msg);
                                                        //                            alert(msg2[0][2]);
                                                        var nombre = msg2[0][1] + "_" + msg2[0][2];
                                                        var extension = ".pdf";
                                                        var localizacion = "<?php echo base_url() ?>" + "fichas_tecnicas/" + msg2[0][0] + "/ficha_tecnica_de_" + nombre + "_" + $("#filtrar").val() + extension;
                                                        //                            alert(localizacion);
                                                        $("#pdfficha").attr('src', localizacion);

                                                    });
                                                    lugar.fail(function() {
                                                        $("#error_pdf").html("<p>No se ha encontrado la ficha técnica del cliente buscado");

                                                    });
                                                });
                                            </script>
                                            <div class="row">
                                                <div id="googledrive" class="col-lg-12">
                                                    <iframe style="width: 100%;height:850px;" id="pdfficha"></iframe>
                                                </div>
                                            </div>
                                            <div >
                                                
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
<div title="Error " id="error_pdf"></div>


