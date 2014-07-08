<script>
    google.load("visualization", "1", {packages: ["corechart"]});
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
                                <select id="asesores">
                                    <option value="0">--Seleccione el Asesor--</option>
                                    <?php foreach ($asesores as $key) { ?>

                                        <option value="<?php echo $key["ase_cedula"]; ?>"><?php echo $key["ase_nombre"] . " " . $key["ase_apellido"]; ?></option>
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <a id="grafica1"><button id="button1gra" class="btn btn-small btn-primary" style="display: none; float: right" type="button">Descargar gráfica</button></a>
                                            </div>
                                            <div class="col-lg-12">
                                                <div  title="Ventas Mes Actual" id="ventas_mes_actual" >
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a id="grafica2"><button class="btn btn-small btn-primary" style="display: none" type="button">Descargar gráfica</button></a>
                                    </div>
                                    <div class="col-lg-12">
                                        <div title="Ventas Mes Pasado" id="ventas_mes_anterior"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a id="grafica3"><button class="btn btn-small btn-primary" style="display: none" type="button">Descargar gráfica</button></a>
                                    </div>
                                    <div class="col-lg-12">
                                        <div title="Ventas del Mes Antepasado" id="ventas_mes_anterior2">

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
    window.resize = function(event) {
        ventas_mes("300");
        ventas_mes_anterior("300");
        ventas_mes_anterior2("300");
    }

    function ventas_mes(alto) {

        $.ajax({
            url: "<?php echo base_url() ?>admin/venta_asesor_mes/",
            data: {asesor: $("#asesores").val()},
        }).done(function(answer) {
            answer2 = JSON.parse(answer);
            if (answer2.length > 1) {
                var colores = Array();
                for (var i = 0; i < answer2.length; i++) {
                    if (i == 0) {
                        colores[i] = new Array(answer2[i][0], answer2[i][1], {role: "style"});
                    } else {
                        colores[i] = new Array(answer2[i][0], answer2[i][1], "#" + getRandomColor());
                    }

                }
            } else {
                colores = answer2;
            }

//            alert(colores);
            var data = google.visualization.arrayToDataTable(colores);
            var mes = "<?php echo $nombre_mes_actual ?>";
            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"}, 2]);
            var options = {
                width: '100%',
                height: alto,
                title: 'Pocentaje de Ventas Por Proyecto Del Asesor Para El Mes de ' + mes,
                bar: {groupWidth: "30%"},
                legend: {position: "none"},
                vAxis: {title: "Apartamentos vendidos"}
            };
            var chart_div = document.getElementById('ventas_mes_actual');
            var chart = new google.visualization.ColumnChart(chart_div);

            // Wait for the chart to finish drawing before calling the getImageURI() method.
            google.visualization.events.addListener(chart, 'ready', function() {
                var cosa = chart.getImageURI();
                var descarga = cosa.replace(/^data:image\/[^;]/, 'data:application/octet-stream')
                $("#grafica1").attr('href', cosa);
                $("#grafica1").attr('download', "ventas del mes");

                $("#button1gra").show('slow');
//                chart_div.innerHTML = '<img class="img-responsive"  src="' + chart.getImageURI() + '">';
//                console.log(chart_div.innerHTML);

            });


            chart.draw(view, options);


        });


    }

    function ventas_mes_anterior(alto) {

        $.ajax({
            url: "<?php echo base_url() ?>admin/venta_asesor_mes_anterior/",
            type: "GET",
            data: {asesor: $("#asesores").val()}
        }).done(function(answer) {
            answer2 = JSON.parse(answer);
            if (answer2.length > 1) {
                var colores = Array();
                for (var i = 0; i < answer2.length; i++) {
                    if (i == 0) {
                        colores[i] = new Array(answer2[i][0], answer2[i][1], {role: "style"});
                    } else {
                        colores[i] = new Array(answer2[i][0], answer2[i][1], "#" + getRandomColor());
                    }

                }
            } else {
                colores = answer2;
            }
//            alert((JSON.parse(answer)).length)
//            alert(answer2[0][0]);


//            alert(colores);
            var data = google.visualization.arrayToDataTable(colores);
            var mes = "<?php echo $nombre_mes_anterior ?>";
            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"}, 2]);
            var options = {
                width: '100%',
                height: alto,
                title: 'Pocentaje de Ventas Por Proyecto Del Asesor Para El Mes de ' + mes,
                bar: {groupWidth: "30%"},
                legend: {position: "none"},
                vAxis: {title: "Apartamentos vendidos"}
            };
            var chart_div = document.getElementById('ventas_mes_anterior');
            var chart = new google.visualization.ColumnChart(chart_div);

            // Wait for the chart to finish drawing before calling the getImageURI() method.
            google.visualization.events.addListener(chart, 'ready', function() {
                chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
                console.log(chart_div.innerHTML);
            });

            chart.draw(view, options);
            $("#ventas_mes_anterior").show('slow');
        });
    }

    function ventas_mes_anterior2(alto) {

        $.ajax({
            url: "<?php echo base_url() ?>admin/venta_asesor_mes_anterior2/",
            type: "GET",
            data: {asesor: $("#asesores").val()}
        }).done(function(answer) {
            answer2 = JSON.parse(answer);
            if (answer2.length > 1) {
                var colores = Array();
                for (var i = 0; i < answer2.length; i++) {
                    if (i == 0) {
                        colores[i] = new Array(answer2[i][0], answer2[i][1], {role: "style"});
                    } else {
                        colores[i] = new Array(answer2[i][0], answer2[i][1], "#" + getRandomColor());
                    }

                }
            } else {
                colores = answer2;
            }

//            alert(colores);
            var data = google.visualization.arrayToDataTable(colores);
            var mes = "<?php echo $nombre_mes_anterior2 ?>";
            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"}, 2]);
            var options = {
                width: '100%',
                height: alto,
                title: 'Pocentaje de Ventas Por Proyecto Del Asesor Para El Mes de ' + mes,
                bar: {groupWidth: "30%"},
                legend: {position: "none"},
                vAxis: {title: "Apartamentos vendidos"}
            };
            var chart_div = document.getElementById('ventas_mes_anterior2');
            var chart = new google.visualization.ColumnChart(chart_div);

            // Wait for the chart to finish drawing before calling the getImageURI() method.
            google.visualization.events.addListener(chart, 'ready', function() {
                chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
                console.log(chart_div.innerHTML);
            });

            chart.draw(view, options);
            $("#ventas_mes_anterior2").show('slow');
        });
    }
    $("#asesores").change(function() {
        ventas_mes("400");
        ventas_mes_anterior2("400");
        ventas_mes_anterior("400");

    });

</script>











