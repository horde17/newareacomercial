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
                                        <table  class="table table-paper table-striped">
                                            <thead>
                                                <tr>
                                                <th>
                                                    Cédula
                                                </th>
                                                <th>
                                                    Nombre
                                                </th>
                                                <th>
                                                    Apellido
                                                </th>
                                                <th>
                                                    Dirección
                                                </th>
                                                <th>
                                                    Telefono
                                                </th>

                                                <th>
                                                    Acciones
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($lista_asesores as $key) { ?>
                                                <tr>
                                                    <td>
                                                        <strong><?php echo $key['ase_cedula']; ?></strong>
                                                    </td>
                                                    <td>
                                                        <?php echo utf8_decode($key['ase_nombre']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo utf8_decode($key['ase_apellido']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo utf8_decode($key['ase_direccion']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $key['ase_telefono']; ?>
                                                    </td>

                                                    <td>



                                                        <button id="eliminar"  onclick="borrar_asesor('<?php echo $key['ase_cedula'] ?>', '<?php echo utf8_decode($key['ase_nombre']) ?>');"><img   src="<?php echo base_url() ?>images/delete.png" width="25px" height="25px;" alt="Eliminar Asesor" /></button>


                                                        <a href="<?php echo base_url() . 'index.php/admin/asesor_modificar/?ase_cedula=' . $key['ase_cedula']; ?>"><button id="modificar" ><img  src="<?php echo base_url() ?>images/modificar.jpg" width="25px" height="25px;" alt="Modificar Asesor"/></button></a>



                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                            
                                            

                                        </table>
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
