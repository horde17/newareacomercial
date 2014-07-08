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
                                    <div class="col-md-12">
                                        <!-- BOX -->


                                        <div class="box-body">
                                            <table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">

                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Cedula
                                                        </th>
                                                        <th>
                                                            Nombre
                                                        </th>
                                                        <th>
                                                            Telefono
                                                        </th>
                                                        <th>
                                                            Email
                                                        </th>
                                                        <th>
                                                            Dirección
                                                        </th>
                                                        <th>
                                                            Nombre Proyecto
                                                        </th>
                                                        <th>
                                                            Ficha Técnica
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    foreach ($cliente as $key) {
                                                        ?>
                                                        <?php
                                                        if ($i % 2 == 0) {
                                                            echo '<tr class="alt">';
                                                        } else {
                                                            echo '<tr>';
                                                        }
                                                        ?>


                                                    <td>
                                                        <strong><?php echo $key['cli_cedula']; ?></strong>
                                                    </td>
                                                    <td>
                                                        <?php echo $key['cli_nombre'] . " " . $key['cli_apellido']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $key['cli_celular']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $key['cli_email']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $key['cli_direccion']; ?> 
                                                    </td>

                                                    <td>                                   
                                                        <?php echo $key['pro_nombre']; ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url() ?>cliente/mostrar_ficha_tecnica/?cedula=<?php echo $key["cli_cedula"] ?>&proyecto=<?php echo $key["id_proyecto"] ?>"><img src="<?php echo base_url() ?>images/icon-monitor.gif"/></a>
                                                    </td>

                                                    </tr>
                                                    <?php
                                                    $i+=1;
                                                }
                                                ?>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Cedula</th>
                                                        <th>Nombre</th>
                                                        <th>Telefono</th>
                                                        <th>Celular</th>
                                                        <th>Email</th>
                                                        <th>Dirección</th>
                                                        <th>Nombre Proyecto</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        <!-- /BOX -->
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
    $('#datatable2').dataTable({
        "sPaginationType": "bs_full",
        sDom: "<'row'<'dataTables_header clearfix'<'col-md-4'l><'col-md-8'Tf>r>>t<'row'<'dataTables_footer clearfix'<'col-md-6'i><'col-md-6'p>>>",
        oTableTools: {
            "aButtons": [
                {
                    "sExtends": "copy",
                    "mColumns": [0, 1, 2, 3, 4, 5]
                },
                {
                    "sExtends": "xls",
                    "mColumns": [0, 1, 2, 3, 4, 5],                    
                    "sFileName": "*.xls"
                },
                {
                    "sExtends": "pdf",
                    "mColumns": [0, 1, 2, 3, 4, 5]
                }
            ],
            sSwfPath: "<?php echo base_url() ?>js/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
        }
    });

    $('.datatable').each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.addClass('form-control input-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-sm');
    });

</script>

