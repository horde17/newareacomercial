
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
                                <select  id="proyectos">
                                    <option value="0">--Seleccione un Proyecto--</option>
                                    <?php foreach ($proyectos as $key) { ?>
                                        <option value="<?php echo $key["id_proyecto"]; ?>"><?php echo $key["pro_nombre"]; ?></option>
                                    <?php } ?>

                                </select>
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
                                        <div id="infoproyecto" style="display: none;">

                                            <form id="da-login-form" enctype="multipart/form-data" onsubmit="return controlformularios();" method="post" action="">

                                                <label  for="nombre">Nombre del Proyecto</label>
                                                <br/>
                                                <input type="text" class="form-control" name="nombreproyecto" id="nombreproyecto" onkeydown="eliminarlabel(this.id);" placeholder="Nombre del Proyecto"/>
                                                <label id="labelnombreproyecto"></label>
                                                <br/>

                                                <label  for="estrato">Estrato donde se encuentra</label>
                                                <br/>
                                                <input type="text" class="form-control" name="estrato" id="estrato" onkeydown="eliminarlabel(this.id);"  placeholder="Estrato del Proyecto" />
                                                <label id="labelestrato"></label>
                                                <br>

                                                <label  for="ubicacion">Ubicación del Proyecto</label>

                                                <br/>
                                                <input type="text" class="form-control" name="ubicacion" id="ubicacion" onkeydown="eliminarlabel(this.id);"  placeholder="Ubicación del Proyecto" />
                                                <label id="labelubicacion"></label>
                                                <br>

                                                <label  for="numpatos">Numero de Apartamentos</label>
                                                <br/>
                                                <input type="text" class="form-control" name="numpatos" id="numpatos" onkeydown="eliminarlabel(this.id);"  placeholder="Numero de Apartamentos    "/>
                                                <label id="labelnumpatos"></label>
                                                <br />

                                                <input type="button" id="enviarproyecto" class="buttonsubmit" value="Enviar"/>
                                            </form>
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
        $("#proyectos").change(function() {
            $.ajax({
                url: "<?php echo base_url() ?>admin/busqueda_proyecto/",
                type: "POST",
                data: {proyecto: $("#proyectos").val()}

            }).done(function(proyecto) {
                var proyecto1 = JSON.parse(proyecto);
                $("#nombreproyecto").val(proyecto1[0][0]);
                $("#estrato").val(proyecto1[0][1]);
                $("#ubicacion").val(proyecto1[0][2]);
                $("#numpatos").val(proyecto1[0][3]);
                $("#infoproyecto").show("slow");

            });
        });
        $("#enviarproyecto").click(function() {
            if ($('#nombreproyecto').val() == '') {
                $("#labelnombreproyecto").append("Se te ha olvidado algo?");
                $('#nombreproyecto').focus();
                return false;
            }
            if ($('#estrato').val() == '') {
                $("#labelestrato").append("Se te ha olvidado algo?");
                $('#estrato').focus();
                return false;
            }
            if ($('#ubicacion').val() == '') {
                $("#labelubicacion").append("Se te ha olvidado algo?");
                $('#ubicacion').focus();
                return false;
            }
            if ($('#numpatos').val() == '') {
                $("#labelnumpatos").append("Se te ha olvidado algo?");
                $('#numpatos').focus();
                return false;
            }
            $.ajax({
                url: "<?php echo base_url(); ?>admin/actualizar_proyecto/",
                data: {id: $("#proyectos").val(), proyecto: $("#nombreproyecto").val(), estrato: $("#estrato").val(), ubicacion: $("#ubicacion").val(), numpatos: $("#numpatos").val()},
                type: "POST"
            }).done(function() {
                location.href = "<?php echo base_url() ?>admin/modificar_proyecto/";
            });

        });
        function eliminarlabel(id) {
            if ($('#' + id).val() != '') {
                $('#label' + id).remove('');
            }
        }
    });

</script>