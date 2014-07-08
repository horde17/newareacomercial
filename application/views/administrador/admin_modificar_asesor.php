<style type="text/css">
    .labelform {
        font-weight: bold;
        font-family: sans-serif; 
        font-size: 14px;
    }

</style>

<script type="text/javascript">

    function controlformularios() {
        if ($('#nombre').val() == '') {
            $("#labelnombre").append("Se te ha olvidado algo?");
            $('#nombre').focus();
            return false;
        }
        if ($('#apellidos').val() == '') {
            $("#labelapellidos").append("Se te ha olvidado algo?");
            $('#apellidos').focus();
            return false;
        }
        if ($('#cedula').val() == '') {
            $("#labelcedula").append("Se te ha olvidado algo?");
            $('#cedula').focus();
            return false;
        }
        if ($('#password').val() == '') {
            $("#labelpassword").append("Se te ha olvidado algo?");
            $('#password').focus();
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


<script type="text/javascript">


    function borrar_asesor(ase_cedula, nombre) {
        var confirmar = confirm("Desea Eliminar El Asesor " + nombre);
        if (confirmar) {
            var parametro = {'asesor': ase_cedula};
            $.ajax({
                url: "<?php echo base_url() ?>index.php/admin/eliminar_asesor/",
                data: parametro,
                async: false
            });
            location.href = "<?php echo base_url() ?>admin/lista_asesores/";
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
                                        <form id="da-login-form" enctype="multipart/form-data" onsubmit="return controlformularios();" method="post" action="<?php echo base_url(); ?>admin/modificar_asesor/">
                                            <?php foreach ($asesor_m as $key) { ?>
                                                <input type="hidden" name="antigua_cedula" value="<?php echo $key['ase_cedula'] ?>" />
                                                <label class="labelform" for="nombre">Nombre</label>
                                                <br/>
                                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre" value="<?php echo $key['ase_nombre'] ?>"/>
                                                <label id="labelnombre"></label>
                                                <br/>
                                                <label class="labelform" for="apellido">Apellidos</label>
                                                <br/>
                                                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="apellido" value="<?php echo $key['ase_apellido'] ?>"/>
                                                <label id="labelnombre"></label>
                                                <br/>
                                                <label class="labelform" for="cedula">Cedula</label>
                                                <br/>
                                                <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cedula" value="<?php echo $key['ase_cedula'] ?>"/>
                                                <label id="labelnombre"></label>

                                                <br/>
                                                <label class="labelform" for="direccion">Dirección</label>
                                                <br/>
                                                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" value="<?php echo $key['ase_direccion'] ?>"/>
                                                <label id="labelnombre"></label>
                                                <br/>
                                                <label class="labelform" for="telefono">Telefono</label>
                                                <br/>
                                                <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="<?php echo $key['ase_telefono'] ?>" />
                                                <label id="labelnombre"></label>
                                                <br/>                                                                
                                                
                                            <?php } ?>
                                            <div class="col-sm-offset-10">

                                                <button  type="submit" id="enviarasesor" class="btn btn-success"> Enviar </button>
                                                <a href="<?php echo base_url() ?>admin/lista_asesores/"><button  type="button" class="btn btn-danger" >Cancelar </button></a>
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


