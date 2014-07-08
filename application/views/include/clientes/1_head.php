<?php
session_start();
if (empty($_SESSION['username'])) {
    $pagina = base_url();
    header("Location:$pagina");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title><?php echo $titulo ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/cloud-admin.css" >
        <link rel="stylesheet" type="text/css"  href="<?php echo base_url() ?>css/themes/default.css" id="skin-switcher" >
        <link rel="stylesheet" type="text/css"  href="<?php echo base_url() ?>css/responsive.css" >
        <link rel="shortcut icon" href="<?php echo base_url() ?>images/constructora.ico" /> 
        <link href="<?php echo base_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- DATE RANGE PICKER -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
        <!-- UNIFORM -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>js/uniform/css/uniform.default.min.css" />
        <!-- INBOX CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>css/inbox.css">
        <!-- FONTS -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
        <!--/PAGE -->
        <!-- JAVASCRIPTS -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- JQUERY -->
         

        <script src="<?php echo base_url() ?>js/jquery/jquery-2.0.3.min.js"></script>
        <!-- JQUERY UI-->
        <script src="<?php echo base_url() ?>js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
        <!-- BOOTSTRAP -->
        <script src="<?php echo base_url() ?>bootstrap-dist/js/bootstrap.min.js"></script>
        <!-- LESS CSS -->
        <script src="<?php echo base_url() ?>js/lesscss/less-1.4.1.min.js" type="text/javascript"></script>	
        <!-- DATE RANGE PICKER -->
        <script src="<?php echo base_url() ?>js/bootstrap-daterangepicker/moment.min.js"></script>
        <script src="<?php echo base_url() ?>js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
        <!-- SLIMSCROLL -->
        <script type="text/javascript" src="<?php echo base_url() ?>js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
        <!-- BLOCK UI -->
        <script type="text/javascript" src="<?php echo base_url() ?>js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
        <!-- UNIFORM -->
        <script type="text/javascript" src="<?php echo base_url() ?>js/uniform/jquery.uniform.min.js"></script>
        <!-- BOOTSTRAP WYSIWYG -->
        <script type="text/javascript" src="<?php echo base_url() ?>js/bootstrap-wysiwyg/jquery.hotkeys.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/bootstrap-wysiwyg/bootstrap-wysiwyg.min.js"></script>
        <!-- COOKIE -->
        <script type="text/javascript" src="<?php echo base_url() ?>js/jQuery-Cookie/jquery.cookie.min.js"></script>
        <!-- CUSTOM SCRIPT -->
        <script src="<?php echo base_url() ?>js/script.js"></script>
        <script src="<?php echo base_url() ?>js/inbox.js"></script>
        <!--<script type="text/javascript" src="<php echo base_url() ?>js/googlecharts.js"></script>-->
        <!-- DATA TABLES -->
        
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>js/datatables/media/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>js/datatables/media/assets/css/datatables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>js/datatables/extras/TableTools/media/css/TableTools.min.css" />

	<script type="text/javascript" src="<?php echo base_url() ?>js/datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>js/datatables/media/assets/js/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
        
        <!-- Select -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>js/select2/select2.min.css" />
        <script type="text/javascript" src="<?php echo base_url()?>js/select2/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/Concurrent.Thread.js"></script>
        
        <!-- Fileupload -->
        <link rel="stylesheet" href="<?php echo base_url()?>js/jquery-upload/css/jquery.fileupload.css">
	<link rel="stylesheet" href="<?php echo base_url()?>js/jquery-upload/css/jquery.fileupload-ui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>js/bootstrap-fileupload/bootstrap-fileupload.min.css" />
        <script type="text/javascript" src="<?php echo base_url()?>js/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
         <!-- Filestyle -->
         <script src="<?php echo base_url()?>js/filestyle.js" type="text/javascript"></script>
         <!--<script src="<php echo base_url() ?>js/fichatecnica.js" type="text/javascript"></script>-->



        

        
    </head>
    <body>



