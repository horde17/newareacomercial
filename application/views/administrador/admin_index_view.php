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
                        <?php foreach ($proyectos_venta as $key){?>
                        <div class="box">
                            <div class="box-title">
                                <h4><i class="fa fa-home"></i><?php echo ucfirst($key['nom_proyecto']) ?></h4>
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-md-4">
                                            <div class="dashbox panel panel-default">
                                                <div class="panel-body">
                                                    <div class="panel-left red">
                                                        <i class="fa fa-building-o fa-3x"></i>
                                                    </div>
                                                    <div class="panel-right">
                                                        <div class="number"><?php echo $key['ventas_mes'] ?></div>
                                                        <div class="title">Aptos vendidos este mes</div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="dashbox panel panel-default">
                                                <div class="panel-body">
                                                    <div class="panel-left blue">
                                                        <i class="fa fa-flag fa-3x"></i>
                                                    </div>
                                                    <div class="panel-right">
                                                        <div class="number"><?php echo $key['expectativas'] ?></div>
                                                        <div class="title">Expectativas de ventas  mes</div>

                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-4">
                                            <div class="dashbox panel panel-default">
                                                <div class="panel-body">
                                                    <div class="panel-left blue">
                                                        <i class="fa fa-fire fa-3x"></i>
                                                    </div>
                                                    <div class="panel-right">
                                                        <div class="number"><?php echo $key['ventas_hasta_hoy'] ?></div>
                                                        <div class="title">Aptos vendidos hasta hoy</div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="dashbox panel panel-default">
                                                <div class="panel-body">
                                                    <div class="panel-left red">
                                                        <i class="fa fa-users fa-3x"></i>
                                                    </div>
                                                    <div class="panel-right">
                                                        <div class="number"><?php echo $key['fichas_tecnicas'] ?></div>
                                                        <div class="title">Clientes con fichas técnicas</div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="dashbox panel panel-default">
                                                <div class="panel-body">
                                                    <div class="panel-left blue">
                                                        <i class="fa fa-users fa-3x"></i>
                                                    </div>
                                                    <div class="panel-right">
                                                        <div class="number"><?php echo $key['separaciones'] ?></div>
                                                        <div class="title">Clientes con separaciones de inmueble</div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="dashbox panel panel-default">
                                                <div class="panel-body">
                                                    <div class="panel-left blue">
                                                        <i class="fa fa-users fa-3x"></i>
                                                    </div>
                                                    <div class="panel-right">
                                                        <div class="number"><?php echo $key['compromisos'] ?></div>
                                                        <div class="title">Clientes con compromisos de Compra-Venta</div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="quick-pie panel panel-default">
                                            <div class="panel-body">
                                                <div class="col-md-12 text-center">
                                                    <div class="piechart" data-percent="<?php echo $key['porcentaje'] ?>">
                                                        <span class="percent"></span>
                                                    </div>
                                                    <a href="#" class="title">Porcentaje de ventas hasta hoy <i class="fa fa-angle-right"></i></a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <!-- /INBOX -->
                        </div>
                        <?php }?>

                        <!-- /BOX -->
                    </div>
                    
                    <div class="col-md-12">
                        <!-- BOX -->
                       
                        <div class="box">
                            <div class="box-title">
                                <h4><i class="fa fa-home"></i>Clientes potenciales</h4>
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php foreach ($clientes_potenciales as $key) {?>
                                            
                                        
                                        <div class="col-md-4">
                                            <div class="dashbox panel panel-default">
                                                <div class="panel-body">
                                                    <div class="panel-left red">
                                                        <i class="fa fa-user fa-3x"></i>
                                                    </div>
                                                    <div class="panel-right">
                                                        <div class="number"><?php echo $key['total'] ?></div>
                                                        <div class="title"><?php echo  $key['presu']?></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    <?php }?>
                                        
                                    </div>
                                    

                                </div>
                            </div>


                            <!-- /INBOX -->
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

$('.piechart').easyPieChart({
			easing: 'easeOutBounce',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent)+"%");
			},
			lineWidth: 6,
			barColor: Theme.colors.purple
		});
		var chart1 = window.chart = $('#dash_pie_1').data('easyPieChart');</script>