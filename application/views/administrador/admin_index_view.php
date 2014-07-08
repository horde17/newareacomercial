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
                                        <table>
                                    <thead>
                                    <th>
                                        Nueva Ficha Técnica
                                    </th>
                                    <th>
                                        Nuevo Asesor
                                    </th>
                                    <th>
                                        Reportes Y Estadisticas
                                    </th>
                                    </thead>
                                    <tr>
                                        <td>
                                            <div title="Ficha Técnica" >
                                                <center>
                                                    <a href="<?php echo base_url() ?>cliente/ficha_tecnica/"><img src="<?php echo base_url() ?>images/pdf.png" style="width: 128px;height: 128px;" /></a> 
                                                </center>
                                            </div>
                                        </td>
                                        <td>
                                            <div title="Asesores Comerciales">
                                                <center>
                                                    <a href="<?php echo base_url() ?>admin/lista_asesores/"><img src="<?php echo base_url() ?>images/Programa-Comercial-Seguros.png" style="width: 128px;height: 128px;" /></a>
                                                </center>

                                            </div>
                                        </td>
                                        <td>
                                            <div title="Reprotes y Estadisticas" >
                                                <center>
                                                    <a href="<?php echo base_url() ?>admin/ventas_mes/"><img src="<?php echo base_url() ?>images/estadisticas.png" style="width: 128px;height: 128px"/></a>
                                                </center>
                                            </div>
                                        </td>
                                    </tr>
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