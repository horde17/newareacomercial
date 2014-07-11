

<script type="text/javascript">
    function controlformularios() {
        if ($('#nombre').val() == '') {
            $("#labelnombre").append("Se te ha olvidado algo?");
            $('#nombre').focus();
            return false;
        }
        if ($('#telefonocel').val() == '') {
            $("#labeltelefonocel").append("Se te ha olvidado algo?");
            $('#telefonocel').focus();
            return false;
        }
        if ($('#correo').val() == '') {
            $("#labelcorreo").append("Se te ha olvidado algo?");
            $('#correo').focus();
            return false;
        }
        if ($('#presupuesto').val() == '') {
            $("#labelpresupuesto").append("Se te ha olvidado algo?");
            $('#presupuesto').focus();
            return false;
        }
        if ($('#direccion').val() == '') {
            $("#labeldireccion").append("Se te ha olvidado algo?");
            $('#direccion').focus();
            return false;
        }
        if ($('#telefono').val() == '') {
            $("#labeltelefono").append("Se te ha olvidado algo?");
            $('#telefono').focus();
            return false;
        }

        if ($('#file_browse').val() == '') {
            $("#labelfile_browse").append("Se te ha olvidado algo?");
            return false;
        }

    }

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
                                        <form id="da-login-form"  enctype="multipart/form-data"  onsubmit="return controlformularios();" method="get" action="<?php echo base_url(); ?>admin/crear_nuevo_asesor/">

                                            <label class="labelform" for="nombre">Nombre</label>
                                            <br/>
                                            <input type="text" class="form-control" name="nombre" id="nombre" onblur="eliminarlabel(this.id);" placeholder="nombres"/>
                                            <label id="labelnombre"></label>
                                            <br/>
                                            
                                            <label class="labelform" for="telefijo">Telefono fijo</label>
                                            <br/>
                                            <input type="text" class="form-control" name="telefijo" id="telefijo" onblur="eliminarlabel(this.id);"  placeholder="Dirección"/>
                                            <label id="labeldireccion"></label>
                                            <br/>
                                            <label class="labelform" for="telefonocel">Celular</label>
                                            <br/>
                                            <input type="tel" class="form-control" name="telefonocel" id="telefonocel" onblur="eliminarlabel(this.id);" placeholder="Telefono" />
                                            <label id="labeltelefonocel"></label>  
                                            <br/>
                                            <label class="labelform" for="correo">Correo</label>
                                            <br/>
                                            <input type="tel" class="form-control" name="correo" id="correo" onblur="eliminarlabel(this.id);" placeholder="Telefono" />
                                            <label id="labelcorreo"></label>  
                                            <br/>
                                            <label class="labelform" for="presupuesto">Presupuesto</label>
                                            <br/>
                                            <input type="tel" class="form-control" name="presupuesto" id="presupuesto" onblur="eliminarlabel(this.id);" placeholder="Telefono" />
                                            <label id="labelpresupuesto"></label>  
                                            <br/>
                                            <label class="labelform" for="proyecto">Proyecto</label>
                                            <br/>
                                            <input type="tel" class="form-control" name="proyecto" id="proyecto" onblur="eliminarlabel(this.id);" placeholder="Telefono" />
                                            <label id="labeltelefono"></label>  
                                            <br/>
                                            <div class="col-sm-offset-10">
                                            
                                            <button  type="submit" id="enviarasesor" class="btn btn-success"> Enviar </button>
                                            <button  type="reset" class="btn btn-danger" > Cancelar </button>
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
