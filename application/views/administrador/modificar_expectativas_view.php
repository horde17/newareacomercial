<script src="<?php echo base_url() ?>js/jquery.handsontable.full.js"></script>
<link rel="stylesheet" media="screen" href="<?php echo base_url() ?>css/jquery.handsontable.full.css" />
<script data-jsfiddle="common" src="<?php echo base_url() ?>js/jquery.handsontable.removeRow.js"></script>
<link data-jsfiddle="common" rel="stylesheet" media="screen" href="<?php echo base_url() ?>css/jquery.handsontable.removeRow.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/areacomercial-theme/jquery-ui-1.10.3.custom.css"/>


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
                                    <div class="col-lg-2">

                                    </div>
                                    <div class="col-lg-8">
                                        <h2>Expectativas de ventas <?php echo " " . $proyectoe ?></h2>

                                        <div id="expectativas" >

                                        </div>
                                        <br/>
                                        <button type="button" id="cuota_caso" class="btn btn-primary col-sm-offset-8">Agregar mes</button>
                                    </div>
                                    <div class="col-lg-2">

                                    </div>
                                </div>
                                <div class="row">


                                    <br/>
                                    <div class="col-sm-offset-5">

                                        <button  type="submit" id="enviarexpe" class="btn btn-success"> Enviar </button>
                                        <button  type="reset" class="btn btn-danger" > Cancelar </button>
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
    $(document).ready(function() {
        $("#cuota_caso").click(function(e) {
            var last = $('#expectativas').handsontable('countRows');
            var ht = $("#expectativas").handsontable('getInstance');
            ht.alter('insert_row');
            ht.setDataAtCell(last, 0, last + 1);
        });


    });
    answer = <?php echo $datos ?>;
    handsontableci = [];
    for (var i = 0; i < answer.length; i++) {
        handsontableci[i] = {numero: answer[i][0], fecha: answer[i][1], total: answer[i][2]};
    }
    function getdataci() {
        var data = handsontableci;
        return data;
    }
//                alert(handsontable);
    function getdata() {
        var data = handsontableci;
//                        alert(handsontable);
        return data;
    }
    function myAutocompleteRenderer(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.AutocompleteCell.renderer.apply(this, arguments);
        td.style.fontStyle = 'italic';
        td.style.fontSize = '13px';
        td.title = 'Type to show the list of options';
    }
    $("#expectativas").handsontable({
        data: getdata(),
        removeRowPlugin: true,
        cells: function(row, col, prop) {
            var cellProperties = {};
            return cellProperties;
        },
        colHeaders: ["<strong>#</strong>", "<strong>Fecha</strong>", "<strong>Numero de ventas</strong>"],
        columns: [
            {data: "numero", type: 'numeric'},
            {data: "fecha", type: 'date', dateFormat: 'yy-mm-dd'},
            {data: "total", type: 'numeric'},
        ],
        colWidths: [100, 300, 200],
    });

    $("#enviarexpe").click(function() {
        var hansontable = $("#expectativas").handsontable('getInstance');
        var tabla = JSON.stringify(hansontable.getData());
        var proyectoa = "<?php echo $id_proyecto ?>";
//        alert("<php echo $id_proyecto ?>");
        $.ajax({
            url: "<?php echo base_url() ?>index.php/admin/nuevas_expectativas/",
            data: {proyecto: proyectoa, expectativa: tabla}
        }).done(function() {
            $("#alertdialog").html("Se ha guardado correctamente las nuevas expectativas de ventas");
            $("#alertdialog").dialog({
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
                            window.location = "<?php echo base_url()?>admin/"
                        }
                    }
                ]
            });
        });
    });



</script>
<div id="alertdialog" title="Éxito">

</div>


