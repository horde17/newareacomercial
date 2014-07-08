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
        <?php foreach ($cliente as $key) { ?>
            <tr>


                <td>
                    <strong><?php echo $key['cli_cedula']; ?></strong>
                </td>
                <td>
                    <?php echo $key['cli_nombre'] . " " . $key['cli_apellido']; ?>
                </td>
                <td>
                    <?php echo $key['cli_telefono_cel']; ?>
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
        <?php } ?>

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


