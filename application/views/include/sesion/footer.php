</section>
<!--/PAGE -->
<!-- JAVASCRIPTS -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JQUERY -->
<script src="<?php echo base_url()?>js/jquery/jquery-2.0.3.min.js"></script>
<!-- JQUERY UI-->
<script src="<?php echo base_url()?>js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
<!-- BOOTSTRAP -->
<script src="<?php echo base_url()?>bootstrap-dist/js/bootstrap.min.js"></script>


<!-- UNIFORM -->
<script type="text/javascript" src="<?php echo base_url()?>js/uniform/jquery.uniform.min.js"></script>
<!-- CUSTOM SCRIPT -->
<script src="<?php echo base_url()?>js/script.js"></script>
<script>
    jQuery(document).ready(function() {
        App.setPage("login");  //Set current page
        App.init(); //Initialise plugins and elements
    });
</script>
<script type="text/javascript">
    function swapScreen(id) {
        jQuery('.visible').removeClass('visible animated fadeInUp');
        jQuery('#' + id).addClass('visible animated fadeInUp');
    }
</script>
<!-- /JAVASCRIPTS -->
</body>
</html>