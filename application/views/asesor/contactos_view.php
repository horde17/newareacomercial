<script type="text/javascript">


    function borrar_asesor(correo) {
        var confirmar = confirm("Desea Eliminar contacto ");
        if (confirmar) {
            var parametro = {'correoc': correo};
            $.ajax({
                url: "<?php echo base_url() ?>index.php/cliente/eliminar_contacto/",
                data: parametro,
                async: false
            });
            location.href = "<?php echo base_url() ?>cliente/contactos/";
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
                                    <div class="col-md-12">
                                        <!-- BOX -->


                                        <div class="box-body">
                                            <table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                                
                                                    <thead>
                                                        <tr>                                                            
                                                            <th>
                                                                Nombre
                                                            </th>
                                                            
                                                            <th>
                                                                Telefono
                                                            </th>
                                                            <th>
                                                                Celular
                                                            </th>
                                                            <th>
                                                                Email
                                                            </th>
                                                            <th>
                                                                Presupuesto
                                                            </th>
                                                            
                                                            <th>
                                                                Proyecto intéres
                                                            </th>
                                                            <th>
                                                                Acciones
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($contactos as $key) { ?>
                                                            <tr>
                                                                <td class="gradeX">
                                                                    <strong><?php echo $key['nombre']; ?></strong>
                                                                </td>
                                                                <td class="gradeX">
                                                                    <?php echo utf8_decode($key['telefono_fijo']); ?>
                                                                </td>
                                                                <td class="gradeX">
                                                                    <?php echo utf8_decode($key['telefono_cel']); ?>
                                                                </td>
                                                                <td class="gradeX">
                                                                    <?php echo utf8_decode($key['correo']); ?>
                                                                </td>
                                                                <td class="gradeX">
                                                                    <?php echo utf8_decode($key['presupuesto']); ?>
                                                                </td>
                                                                <td class="gradeX">
                                                                    <?php echo utf8_decode($key['pro_nombre']); ?>
                                                                </td>
                                                                <td class="gradeX">
                                                                    <button id="eliminar"  onclick="borrar_asesor('<?php echo $key['correo'] ?>')"><img   src="<?php echo base_url() ?>images/delete.png" width="25px" height="25px;" alt="Eliminar Asesor" /></button>                                                        
                                                                </td>
                                                                
                                                                

                                                            </tr>
                                                        <?php } ?> 
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            
                                                            <th>Nombre</th>                                                            
                                                            <th>Telefono</th>
                                                            <th>Celular</th>
                                                            <th>Email</th>
                                                            <th>Presupuesto</th>
                                                            <th>Proyecto intéres</th>
                                                            <th>Acciones</th>
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
            aButtons: ["copy", "print", "csv", "xls", "pdf"],
            sSwfPath: "<?php echo base_url()?>js/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
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



