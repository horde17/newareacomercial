
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
                                <select id="proyectos">
                                    <option value="0">--Seleccion el proyecto--</option>
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
                                <div  class="row">
                                    <div class="col-lg-12">
                                        <div  class="row">
                                            <div class="col-md-12">
                                                <!-- BOX -->
                                                <div class="box border primary">
                                                    <div class="box-title">
                                                        <h4><i class="fa fa-home"></i>Ventas de 3 meses</h4>

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

                                                                <div  title="Ventas Mes Actual" id="ventas_meses">

                                                                </div>

                                                            </div>
                                                        </div>

                                                        <!-- /INBOX -->
                                                    </div>
                                                </div>
                                                <!-- /BOX -->
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BOX -->
                                                <div class="box border primary">
                                                    <div class="box-title">
                                                        <h4><i class="fa fa-home"></i>Ventas Totales Por Proyecto Hasta Hoy</h4>

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
                                                                <div  title="Ventas Mes Pasado" id="ventas_totales">

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- /INBOX -->
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
<div title="Por Favor Corriga El Error" id="Error">

</div>
<script>
    google.load("visualization", "1", {packages: ["corechart"]});
</script>
<script>

    $("#proyectos").change(function() {
        $("#1").show('slow');
        $("#2").show('slow');
        if ($("#proyectos").val() == "0") {
            alertdialog();
            $("#ventas_meses").hide('slow');
            $("#ventas_totales").hide('slow');
            return false;
        } else {

            ventas_3_meses();
            ventas_totales();

        }

    });

    function ventas_3_meses() {
        $.ajax({
            url: "<?php echo base_url() ?>index.php/admin/ventas_proyecto_meses/",
            data: {proyecto: $("#proyectos").val()},
            type: "POST"
        }).done(function(answer) {
            var data = google.visualization.arrayToDataTable(JSON.parse(answer));

            var options = {
                title: '',
                width: '100%',
                height: '300',
                legend: {position: 'top', maxLines: 3},
                bar: {groupWidth: '50%'},
                isStacked: true,
                animation: {
                    duration: 1000,
                    easing: 'out'
                },
                 
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('ventas_meses'));
            chart.draw(data, options);
            $("#ventas_meses").show('slow');
        });
    }

    function ventas_totales() {

        $.ajax({
            url: "<?php echo base_url() ?>index.php/admin/ventas_totales_proyecto/",
            data: {proyecto: $("#proyectos").val()},
            type: "get"
        }).done(function(answer) {

            var data = google.visualization.arrayToDataTable(JSON.parse(answer));
            var options = {
                title: '',
                width: '100%',
                height: '100%',
                legend: {position: 'top', maxLines: 3},
                bar: {groupWidth: '50%'},
                isStacked: true,
            };
            var chart = new google.visualization.BarChart(document.getElementById('ventas_totales'));
            chart.draw(data, options);
            $("#ventas_totales").show('slow');
        });
    }

    $(window).resize(function() {

        ventas_3_meses();
        ventas_totales();
    });

    function alertdialog() {
        $("#Error").html("<p>Por Favor Eliga Un Proyecto</p>");
        $("#Error").dialog({
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
                    text: "OK",
                    click: function() {
                        $(this).dialog("close");
                        $("#" + "proyectos").focus();
                    }
                }
            ]
        });
    }
</script>

