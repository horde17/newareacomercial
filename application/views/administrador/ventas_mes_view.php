<script src="<?php echo base_url() ?>js/highcharts.js"></script>
<script src="<?php echo base_url() ?>js/modules/exporting.js"></script>

<script>
    var vector = <?php echo $ventas_mes_actual ?>;
    var proyectos = new Array();
    var colors = new Array();

    for (var i = 0; i < vector.length; i++) {
        proyectos[i] = vector[i][0];
        colors[i] = getRandomColor();

    }


    $(function() {


        $('#mes_actual').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: proyectos
            },
            yAxis: {
                title: {
                    text: 'Ventas de apartamentos'
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: colors
                    }]
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black, 0 0 3px black'
                        }
                    }
                }
            },
            series: [{
                    type: 'column',
                    name: 
                    data: <?php echo $ventas_mes_actual ?>,
                    
                }],
            credits: {
                enabled: false
            }
        });
    });

    $(function() {
        $('#mes_anterior').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: <?php echo $ventas_mes_anterior ?>
            },
            yAxis: {
                title: {
                    text: 'Ventas de apartamentos'
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black, 0 0 3px black'
                        }
                    }
                }
            },
            series: [{
                    type: 'column',
                    name: 'Proyectos',
                    data: <?php echo $ventas_mes_anterior ?>
                }],
            credits: {
                enabled: false
            }
        });
    });

    $(function() {
        $('#mes_anterior2').highcharts({
            chart: {
                renderTo: 'container',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: <?php echo $ventas_mes_anterior2 ?>
            },
            yAxis: {
                title: {
                    text: 'Ventas de apartamentos'
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black, 0 0 3px black'
                        }
                    }
                }
            },
            series: [{
                    type: 'column',
                    name: 'Proyectos',
                    data: <?php echo $ventas_mes_anterior2 ?>
                }],
            credits: {
                enabled: false
            }
        });
    });


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
                                        <div class="tabbable">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab_1_1" data-toggle="tab"><i class="fa fa-android"></i> Ventas de <?php echo $nombre_mes_actual ?></a></li>
                                                <li><a href="#tab_1_2" data-toggle="tab"><i class="fa fa-android"></i> Ventas de <?php echo $nombre_mes_anterior ?></a></li>
                                                <li><a href="#tab_1_3" data-toggle="tab"><i class="fa fa-android"></i>Ventas de <?php echo $nombre_mes_anterior2 ?></a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="tab_1_1">
                                                    <div class="divide-10"></div>
                                                    <!--<p> There were flying cantaloupes, rainbows and songs of happiness near by, I mean I was a little frightened by the flying fruit but I'll take this any day over prison inmates. I skipped closer and closer to the festivities and when I arrived I seen all my friends I had went to high school with there were holding hands and singing Kumbayah around the camp ice.. Yes It was a giant block of ice situated on three wood logs. </p>-->
                                                    <div id="mes_actual" class="col-lg-9" >

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab_1_2">
                                                    <div class="divide-10"></div>
                                                    <!--<p> Everyone turned toward me and gave me the death stare and I knew I had screwed up once again, they all walked in slow motion towards me saying the same familiar chant I had heard earlier, before anyone could reach me I awoke in a frantic sweaty rush in my bed. My legs were no longer on fire and I felt slightly normal again. I noticed that my mom, a preacher, and several other family members were standing around me. </p>-->
                                                    <div class="col-lg-9" id="mes_anterior" >

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab_1_3">
                                                    <div class="divide-10"></div>
                                                    <div class="col-lg-9" id="mes_anterior2" >

                                                    </div>
                                                </div>
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
