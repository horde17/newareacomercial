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
                                <h3 class="content-title pull-left"><?php echo $titulo_page ?></h3>
                            </div>
                            <div class="description"><?php echo $subtitulo_page ?></div>
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
                                <h4><i class="fa fa-home"></i><?php echo $box_title ?></h4>
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
                                        <!-- BOX -->
                                        <div class="col-lg-2">
                                            <a href="<?php echo base_url() ?>uploads/excel/ejemplo_contactos.xlsx">
                                                <img style="max-height: 100px; max-width: 100px;" id="descargarexcel" title="Descargar excel de ejemplo" src="<?php echo base_url() ?>images/excel.jpg" class="img-responsive" alt="Descargar excel de ejemplo">
                                            </a>

                                        </div>
                                        <div class="col-lg-9 center">
                                            <form action="<?php echo base_url() ?>index.php/cliente/read_excel_contactos/" method="POST" enctype="multipart/form-data">
                                                <input type="file" name="files" class="filestyle" data-buttonText="Subir clientes">
                                                <br>


                                                <button style="" class="btn btn-success" type="submit">Cargar clientes</button>
                                                <button class="btn btn-danger" id="cancelar" type="button">Cancelar</button>

                                            </form>
                                        </div>
                                        <!--                                        <div class="col-lg-4"></div>-->

                                        <!-- /BOX -->
                                    </div>
                                </div>
                                <!-- /BOX -->
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

    $("#cancelar").click(function() {
        window.location = "<?php echo base_url() ?>admin/";
    });
</script>
<script>
    $(function() {
        $("#descargarexcel").tooltip({
            show: {
                effect: "slideDown",
                delay: 250
            }
        });
    });

</script>

