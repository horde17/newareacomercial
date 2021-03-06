<!-- HEADER -->
<header class="navbar clearfix" id="header">
    <div class="container">
        <div class="navbar-brand">
            <!-- COMPANY LOGO -->
            <a href="<?php echo base_url() ?>admin/">
                <img src="<?php echo base_url() ?>img/logo/logo.png" alt="Cloud Admin Logo" class="img-responsive">
            </a>
            <!-- /COMPANY LOGO -->
            <!-- TEAM STATUS FOR MOBILE -->
            <div class="visible-xs">
                <a href="#" class="team-status-toggle switcher btn dropdown-toggle">
                    <i class="fa fa-users"></i>
                </a>
            </div>
            <!-- /TEAM STATUS FOR MOBILE -->
            <!-- SIDEBAR COLLAPSE -->
            <div id="sidebar-collapse" class="sidebar-collapse btn">
                <i class="fa fa-bars" 
                   data-icon1="fa fa-bars" 
                   data-icon2="fa fa-bars" ></i>
            </div>
            <!-- /SIDEBAR COLLAPSE -->
        </div>
        <!-- NAVBAR LEFT -->
        <ul class="nav navbar-nav pull-left hidden-xs" id="navbar-left">
            <li class="dropdown">
                <a href="#" class="team-status-toggle dropdown-toggle tip-bottom" data-toggle="tooltip" title="Toggle Team View">
                    <i class="fa fa-users"></i>
                    <span class="name">Team Status</span>
                    <i class="fa fa-angle-down"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-cog"></i>
                    <span class="name">Skins</span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu skins">
                    <li class="dropdown-title">
                        <span><i class="fa fa-leaf"></i> Theme Skins</span>
                    </li>
                    <li><a href="#" data-skin="default">Subtle (default)</a></li>
                    <li><a href="#" data-skin="night">Night</a></li>
                    <li><a href="#" data-skin="earth">Earth</a></li>
                    <li><a href="#" data-skin="utopia">Utopia</a></li>
                    <li><a href="#" data-skin="nature">Nature</a></li>
                    <li><a href="#" data-skin="graphite">Graphite</a></li>
                </ul>
            </li>
        </ul>
        <!-- /NAVBAR LEFT -->
        <!-- BEGIN TOP NAVIGATION MENU -->					
        <ul class="nav navbar-nav pull-right">
            <!-- BEGIN NOTIFICATION DROPDOWN -->	

            </li>
            <!-- END NOTIFICATION DROPDOWN -->
            <!-- BEGIN INBOX DROPDOWN -->
            <li class="dropdown" id="header-message">

            </li>
            <!-- END INBOX DROPDOWN -->
            <!-- BEGIN TODO DROPDOWN -->
            <li class="dropdown" id="header-tasks">

            </li>
            <!-- END TODO DROPDOWN -->
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user" style="float: right;" id="header-user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img alt="" src="<?php echo base_url() ?>uploads/asesores/administrador.jpg" />
                    <span class="username">Director Comercial</span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
<!--                    <li><a href="#"><i class="fa fa-user"></i> My Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Account Settings</a></li>
                    <li><a href="#"><i class="fa fa-eye"></i> Privacy Settings</a></li>-->
                    <li><a href="<?php echo base_url() ?>index.php/sesion/logout/"><i class="fa fa-power-off"></i> Cerrar sesión</a></li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>

    <!-- TEAM STATUS -->
    <div class="container team-status" id="team-status">
        <div id="scrollbar">
            <div class="handle">
            </div>
        </div>
        <div id="teamslider">
            <ul class="team-list">
                <?php foreach ($ventasasesores as $key) { ?>
                    <li class="current">
                        <a href="javascript:void(0);">
                            <span class="image">
                                <img src="<?php echo base_url()."uploads/asesores/".$key["ase_foto"]?>" alt="" />
                            </span>
                            <span class="title">
                                <?php echo $key["ase_nombre"] . " " . $key["ase_apellido"] ?>
                            </span>
                            <!--                        <div class="progress">
                                                        <div class="progress-bar progress-bar-success" style="width: 35%">
                                                            <span class="sr-only">35% Complete (success)</span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-warning" style="width: 20%">
                                                            <span class="sr-only">20% Complete (warning)</span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-danger" style="width: 10%">
                                                            <span class="sr-only">10% Complete (danger)</span>
                                                        </div>
                                                    </div>-->
                            <span class="status">
                                <div class="field">
                                    <span class="badge badge-green"><?php echo $key["aptos_vendidos"] ?></span> Apartamentos vendidos este mes
                                    <span class="pull-right fa fa-check"></span>
                                </div>
                                <!--                            <div class="field">
                                                                <span class="badge badge-orange">3</span> in-progress
                                                                <span class="pull-right fa fa-adjust"></span>
                                                            </div>
                                                            <div class="field">
                                                                <span class="badge badge-red">1</span> pending
                                                                <span class="pull-right fa fa-list-ul"></span>
                                                            </div>-->
                            </span>
                        </a>
                    </li>

                <?php } ?>

                <?php
                if ($noventasasesores != "false") {
                    foreach ($noventasasesores as $key) {
                        echo '<li class = "current">';
                        echo '<a href = "javascript:void(0);">';
                        echo '<span class = "image">';
                        echo '<img src = '. base_url().'uploads/asesores/'.$key["ase_foto"]. ' alt = "Asesor COnstructora" />';
                        echo '</span>';
                        echo '<span class = "title">';
                        echo $key["ase_nombre"] . " " . $key["ase_apellido"];
                        echo '</span>';
                        echo '<span class="status">';
                        echo '<div class="field">';
                        echo '<span class="badge badge-green">0</span> Apartamentos vendidos este mes';
                        echo '<span class="pull-right fa fa-check"></span></div>';
                        echo '</span></a></li>';
                    }
                }
                ?>
                <!--                <li>
                                    <a href="javascript:void(0);">
                                        <span class="image">
                                            <img src="<?php echo base_url() ?>img/avatars/avatar1.jpg" alt="" />
                                        </span>
                                        <span class="title">
                                            Max Doe
                                        </span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" style="width: 15%">
                                                <span class="sr-only">35% Complete (success)</span>
                                            </div>
                                            <div class="progress-bar progress-bar-warning" style="width: 40%">
                                                <span class="sr-only">20% Complete (warning)</span>
                                            </div>
                                            <div class="progress-bar progress-bar-danger" style="width: 20%">
                                                <span class="sr-only">10% Complete (danger)</span>
                                            </div>
                                        </div>
                                        <span class="status">
                                            <div class="field">
                                                <span class="badge badge-green">2</span> completed
                                                <span class="pull-right fa fa-check"></span>
                                            </div>
                                            <div class="field">
                                                <span class="badge badge-orange">8</span> in-progress
                                                <span class="pull-right fa fa-adjust"></span>
                                            </div>
                                            <div class="field">
                                                <span class="badge badge-red">4</span> pending
                                                <span class="pull-right fa fa-list-ul"></span>
                                            </div>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="image">
                                            <img src="<?php echo base_url() ?>img/avatars/avatar2.jpg" alt="" />
                                        </span>
                                        <span class="title">
                                            Jane Doe
                                        </span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" style="width: 65%">
                                                <span class="sr-only">35% Complete (success)</span>
                                            </div>
                                            <div class="progress-bar progress-bar-warning" style="width: 10%">
                                                <span class="sr-only">20% Complete (warning)</span>
                                            </div>
                                            <div class="progress-bar progress-bar-danger" style="width: 15%">
                                                <span class="sr-only">10% Complete (danger)</span>
                                            </div>
                                        </div>
                                        <span class="status">
                                            <div class="field">
                                                <span class="badge badge-green">10</span> completed
                                                <span class="pull-right fa fa-check"></span>
                                            </div>
                                            <div class="field">
                                                <span class="badge badge-orange">3</span> in-progress
                                                <span class="pull-right fa fa-adjust"></span>
                                            </div>
                                            <div class="field">
                                                <span class="badge badge-red">4</span> pending
                                                <span class="pull-right fa fa-list-ul"></span>
                                            </div>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="image">
                                            <img src="<?php echo base_url() ?>img/avatars/avatar4.jpg" alt="" />
                                        </span>
                                        <span class="title">
                                            Ellie Doe
                                        </span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" style="width: 5%">
                                                <span class="sr-only">35% Complete (success)</span>
                                            </div>
                                            <div class="progress-bar progress-bar-warning" style="width: 48%">
                                                <span class="sr-only">20% Complete (warning)</span>
                                            </div>
                                            <div class="progress-bar progress-bar-danger" style="width: 27%">
                                                <span class="sr-only">10% Complete (danger)</span>
                                            </div>
                                        </div>
                                        <span class="status">
                                            <div class="field">
                                                <span class="badge badge-green">1</span> completed
                                                <span class="pull-right fa fa-check"></span>
                                            </div>
                                            <div class="field">
                                                <span class="badge badge-orange">6</span> in-progress
                                                <span class="pull-right fa fa-adjust"></span>
                                            </div>
                                            <div class="field">
                                                <span class="badge badge-red">2</span> pending
                                                <span class="pull-right fa fa-list-ul"></span>
                                            </div>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="image">
                                            <img src="<?php echo base_url() ?>img/avatars/avatar5.jpg" alt="" />
                                        </span>
                                        <span class="title">
                                            Lisa Doe
                                        </span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" style="width: 21%">
                                                <span class="sr-only">35% Complete (success)</span>
                                            </div>
                                            <div class="progress-bar progress-bar-warning" style="width: 20%">
                                                <span class="sr-only">20% Complete (warning)</span>
                                            </div>
                                            <div class="progress-bar progress-bar-danger" style="width: 40%">
                                                <span class="sr-only">10% Complete (danger)</span>
                                            </div>
                                        </div>
                                        <span class="status">
                                            <div class="field">
                                                <span class="badge badge-green">4</span> completed
                                                <span class="pull-right fa fa-check"></span>
                                            </div>
                                            <div class="field">
                                                <span class="badge badge-orange">5</span> in-progress
                                                <span class="pull-right fa fa-adjust"></span>
                                            </div>
                                            <div class="field">
                                                <span class="badge badge-red">9</span> pending
                                                <span class="pull-right fa fa-list-ul"></span>
                                            </div>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="image">
                                            <img src="<?php echo base_url() ?>img/avatars/avatar6.jpg" alt="" />
                                        </span>
                                        <span class="title">
                                            Kelly Doe
                                        </span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" style="width: 45%">
                                                <span class="sr-only">35% Complete (success)</span>
                                            </div>
                                            <div class="progress-bar progress-bar-warning" style="width: 21%">
                                                <span class="sr-only">20% Complete (warning)</span>
                                            </div>
                                            <div class="progress-bar progress-bar-danger" style="width: 10%">
                                                <span class="sr-only">10% Complete (danger)</span>
                                            </div>
                                        </div>
                                        <span class="status">
                                            <div class="field">
                                                <span class="badge badge-green">6</span> completed
                                                <span class="pull-right fa fa-check"></span>
                                            </div>
                                            <div class="field">
                                                <span class="badge badge-orange">3</span> in-progress
                                                <span class="pull-right fa fa-adjust"></span>
                                            </div>
                                            <div class="field">
                                                <span class="badge badge-red">1</span> pending
                                                <span class="pull-right fa fa-list-ul"></span>
                                            </div>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="image">
                                            <img src="<?php echo base_url() ?>img/avatars/avatar7.jpg" alt="" />
                                        </span>
                                        <span class="title">
                                            Jessy Doe
                                        </span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" style="width: 7%">
                                                <span class="sr-only">35% Complete (success)</span>
                                            </div>
                                            <div class="progress-bar progress-bar-warning" style="width: 30%">
                                                <span class="sr-only">20% Complete (warning)</span>
                                            </div>
                                            <div class="progress-bar progress-bar-danger" style="width: 10%">
                                                <span class="sr-only">10% Complete (danger)</span>
                                            </div>
                                        </div>
                                        <span class="status">
                                            <div class="field">
                                                <span class="badge badge-green">1</span> completed
                                                <span class="pull-right fa fa-check"></span>
                                            </div>
                                            <div class="field">
                                                <span class="badge badge-orange">6</span> in-progress
                                                <span class="pull-right fa fa-adjust"></span>
                                            </div>
                                            <div class="field">
                                                <span class="badge badge-red">2</span> pending
                                                <span class="pull-right fa fa-list-ul"></span>
                                            </div>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="image">
                                            <img src="<?php echo base_url() ?>img/avatars/avatar8.jpg" alt="" />
                                    </span>
                                    <span class="title">
                                        Debby Doe
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" style="width: 70%">
                                            <span class="sr-only">35% Complete (success)</span>
                                        </div>
                                        <div class="progress-bar progress-bar-warning" style="width: 20%">
                                            <span class="sr-only">20% Complete (warning)</span>
                                        </div>
                                        <div class="progress-bar progress-bar-danger" style="width: 5%">
                                            <span class="sr-only">10% Complete (danger)</span>
                                        </div>
                                    </div>
                                    <span class="status">
                                        <div class="field">
                                            <span class="badge badge-green">13</span> completed
                                            <span class="pull-right fa fa-check"></span>
                                        </div>
                                        <div class="field">
                                            <span class="badge badge-orange">7</span> in-progress
                                            <span class="pull-right fa fa-adjust"></span>
                                        </div>
                                        <div class="field">
                                            <span class="badge badge-red">1</span> pending
                                            <span class="pull-right fa fa-list-ul"></span>
                                        </div>
                                    </span>
                                </a>
                            </li>-->
            </ul>
        </div>
    </div>
    <!-- /TEAM STATUS -->
</header>
<!--/HEADER -->