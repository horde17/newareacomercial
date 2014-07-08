<script>
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
        if ("#comisiones").val() == ''{
            $("#labelcomisiones").append("Se te ha olvidado algo?");
            $('#comisiones').focus();
            return false;
        }
        $.ajax({
            url: "<?php echo base_url(); ?>admin/crear_nuevo_proyecto/",
            data: {proyecto: $("#nombreproyecto").val(), estrato: $("#estrato").val(),
                ubicacion: $("#ubicacion").val(), numpatos: $("#numpatos").val(), comisiones: $("#comisiones").val()},
            type: "POST"
        }).done(function() {
            location.href = "<?php echo base_url() ?>/admin/";
        });
    });

    function eliminarlabel(id) {
        if ($('#' + id).val() != '') {
            $('#label' + id).remove('');
        }
    }
</script>

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
                                        <form id="da-login-form" enctype="multipart/form-data" onsubmit="return controlformularios();" method="post" action="">

                                            <label class="labelform" for="nombre">Nombre del Proyecto</label>
                                            <br/>
                                            <input type="text" class="form-control" name="nombreproyecto" id="nombreproyecto" onkeydown="eliminarlabel(this.id);" placeholder="Nombre del Proyecto"/>
                                            <label id="labelnombreproyecto"></label>
                                            <br/>
                                            <label class="labelform" for="estrato">Estrato donde se encuentra</label>
                                            <br/>
                                            <input type="text" class="form-control" name="estrato" id="estrato" onkeydown="eliminarlabel(this.id);"  placeholder="Estrato del Proyecto" />
                                            <label id="labelestrato"></label>
                                            <br/>                       
                                            <label class="labelform" for="ubicacion">Ubicación del Proyecto</label>
                                            <label id="labelubicacion"></label>
                                            <br/>
                                            <input type="text" class="form-control" name="ubicacion" id="ubicacion" onkeydown="eliminarlabel(this.id);"  placeholder="Ubicación del Proyecto" />
                                            <br/>
                                            <label class="labelform" for="numpatos">Numero de Apartamentos</label>
                                            <br/>
                                            <input type="text" class="form-control" name="numpatos" id="numpatos" onkeydown="eliminarlabel(this.id);"  placeholder="Numero de Apartamentos    "/>
                                            <label id="labelnumpatos"></label>
                                            <br/>
                                            <label class="labelform" for="comisiones">Comisión por venta de Apartamentos</label>
                                            <br/>
                                            <input type="text" class="form-control" name="comisiones" id="comisiones" onkeydown="eliminarlabel(this.id);"  placeholder="Comision en Porcentaje 0.5% = 0.005    "/>
                                            <label id="labelcomisiones"></label>
                                            <br />
                                            <div class="col-sm-offset-10">

                                                <button  type="submit" id="enviarasesor" class="btn btn-success"> Enviar </button>
                                                <a href="<?php echo base_url() ?>admin/"><button  type="button" class="btn btn-danger" >Cancelar </button></a>
                                            </div>
                                        </form>
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



