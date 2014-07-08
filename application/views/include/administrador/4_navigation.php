<!-- PAGE -->
<section id="page">
    <!-- SIDEBAR -->
    <div id="sidebar" class="sidebar">
        <div class="sidebar-menu nav-collapse">
            <div class="divide-20"></div>
            <!-- SEARCH BAR -->
            <div id="search-bar">
                <a href="<?php echo base_url() ?>admin/"><img class="img-responsive" src="<?php echo base_url() ?>images/fotojyp.png" alt="Constructora JYP"/></a>
                
            </div>
            <!-- /SEARCH BAR -->

            <!-- SIDEBAR QUICK-LAUNCH -->
            <!-- <div id="quicklaunch">
            <!-- /SIDEBAR QUICK-LAUNCH -->

            <!-- SIDEBAR MENU -->
            <ul>
                <li>
                    <a href="<?php echo base_url() ?>admin/">
                        <i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
                        <span class="selected"></span>
                    </a>					
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <i class="fa fa-user fa-fw"></i> <span class="menu-text">Gestión de Asesores</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url() ?>admin/nuevo_asesor/"><span class="sub-menu-text">Agregar Un Nuevo Asesor</span></a></li>
                        <li><a class="" href="<?php echo base_url() ?>admin/lista_asesores/"><span class="sub-menu-text">Lista Asesores</span></a></li>
                        <li><a class="" href="<?php echo base_url() ?>admin/actualizar_informacion/"><span class="sub-menu-text">Actualizar Información De Cuenta</span></a></li>

                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">Gestión de Proyectos de Vivienda</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url()?>admin/proyectos_inscritos/"><span class="sub-menu-text">Mostrar Proyectos</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>admin/nuevo_proyecto/"><span class="sub-menu-text">Crear un Proyecto De Vivienda</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>admin/modificar_proyecto/"><span class="sub-menu-text">Modificar Proyecto de Vivienda</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>admin/expectativas_ventas_excel/"><span class="sub-menu-text">Expectativas de ventas proyecto</span></a></li>

                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <i class="fa fa-table fa-fw"></i> <span class="menu-text">Clientes</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url()?>cliente/"><span class="sub-menu-text">Clientes Constructora JYP</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>cliente/clientes_proyecto/"><span class="sub-menu-text">Clientes Constructora JYP Proyecto</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>cliente/clientes_separacion/"><span class="sub-menu-text">Clientes Que han Separado</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>cliente/clientes_compra_venta/"><span class="sub-menu-text">Clientes Compromiso Compra-Venta</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>cliente/clientes_escritura_vivienda/"><span class="sub-menu-text">Clientes Escritura Vivienda</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>cliente/nuevo_clientes_excel/"><span class="sub-menu-text">Clientes desde Excel</span></a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <i class="fa fa-briefcase fa-fw fa-fw"></i> <span class="menu-text">Proceso de Ventas</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url()?>cliente/ficha_tecnica/"><span class="sub-menu-text">Ficha Técnica</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>cliente/separacion_inmueble/"><span class="sub-menu-text">Separacion Inmueble</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>cliente/compromiso_compraventa/"><span class="sub-menu-text">Compromiso de CompraVenta</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>cliente/buscar_ficha_tecnica/"><span class="sub-menu-text">Buscar Ficha Técnica</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>cliente/mostrar_separacion_apto/"><span class="sub-menu-text">Buscar Separación</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>cliente/mostrar_compromiso_apto/"><span class="sub-menu-text">Buscar Compromiso Compra-Venta</span></a></li>
                    </ul>
                </li>
                
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <i class="fa fa-bar-chart-o fa-fw"></i> <span class="menu-text">Reportes Gráficos y Estadísticas</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url()?>admin/ventas_mes/"><span class="sub-menu-text">Ventas Del Mes</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>admin/ventas_asesores/"><span class="sub-menu-text">Ventas por Asesor</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>admin/ventas_proyecto/"><span class="sub-menu-text">Ventas por Proyecto</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>admin/ventas_ano/"><span class="sub-menu-text">Ventas Del Año</span></a></li>
                        <li><a class="" href="<?php echo base_url()?>admin/ventas_fecha_determinada/"><span class="sub-menu-text">Ventas Desde Fecha Determinada</span></a></li>
                        
                    </ul>
                </li>
<!--                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <i class="fa fa-columns fa-fw"></i> <span class="menu-text">Layouts</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="mini_sidebar.html"><span class="sub-menu-text">Mini Sidebar</span></a></li>
                        <li><a class="" href="fixed_header.html"><span class="sub-menu-text">Fixed Header</span></a></li>

                        <li><a class="" href="fixed_header_sidebar.html"><span class="sub-menu-text">Fixed Header & Sidebar</span></a></li>
                    </ul>
                </li>-->
<!--                <li><a class="" href="calendar.html"><i class="fa fa-calendar fa-fw"></i> 
                        <span class="menu-text">Calendar 
                            <span class="tooltip-error pull-right" title="" data-original-title="3 New Events">
                                <span class="label label-success">New</span>
                            </span>
                        </span>
                    </a>
                </li>-->
<!--                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <i class="fa fa-map-marker fa-fw"></i> <span class="menu-text">Maps</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="google_maps.html"><span class="sub-menu-text">Google Maps</span></a></li>
                        <li><a class="" href="vector_maps.html"><span class="sub-menu-text">Vector Maps</span></a></li>
                    </ul>
                </li>-->
<!--                <li><a class="" href="gallery.html"><i class="fa fa-picture-o fa-fw"></i> <span class="menu-text">Gallery</span></a></li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <i class="fa fa-file-text"></i> <span class="menu-text">More Pages</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="login.html"><span class="sub-menu-text">Login & Register Option 1</span></a></li><li><a class="" href="login_bg.html"><span class="sub-menu-text">Login & Register Option 2</span></a></li>
                        <li><a class="" href="user_profile.html"><span class="sub-menu-text">User profile</span></a></li>
                        <li><a class="" href="chats.html"><span class="sub-menu-text">Chats</span></a></li>
                        <li><a class="" href="todo_timeline.html"><span class="sub-menu-text">Todo & Timeline</span></a></li>
                        <li><a class="" href="address_book.html"><span class="sub-menu-text">Address Book</span></a></li>									
                        <li><a class="" href="pricing.html"><span class="sub-menu-text">Pricing</span></a></li>
                        <li><a class="" href="invoice.html"><span class="sub-menu-text">Invoice</span></a></li>
                        <li><a class="" href="orders.html"><span class="sub-menu-text">Orders</span></a></li>
                    </ul>
                </li>-->
<!--                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <i class="fa fa-briefcase fa-fw"></i> <span class="menu-text">Other Pages <span class="badge pull-right">9</span></span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="search_results.html"><span class="sub-menu-text">Search Results</span></a></li>
                        <li><a class="" href="email_templates.html"><span class="sub-menu-text">Email Templates</span></a></li>

                        <li><a class="" href="error_404.html"><span class="sub-menu-text">Error 404 Option 1</span></a></li><li><a class="" href="error_404_2.html"><span class="sub-menu-text">Error 404 Option 2</span></a></li><li><a class="" href="error_404_3.html"><span class="sub-menu-text">Error 404 Option 3</span></a></li>
                        <li><a class="" href="error_500.html"><span class="sub-menu-text">Error 500 Option 1</span></a></li><li><a class="" href="error_500_2.html"><span class="sub-menu-text">Error 500 Option 2</span></a></li>
                        <li><a class="" href="faq.html"><span class="sub-menu-text">FAQ</span></a></li>
                        <li><a class="" href="blank_page.html"><span class="sub-menu-text">Blank Page</span></a></li>
                    </ul>
                </li>-->
            </ul>
            <!-- /SIDEBAR MENU -->
        </div>
    </div>
    <!-- /SIDEBAR -->