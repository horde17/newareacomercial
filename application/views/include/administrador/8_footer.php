
<script>
    jQuery(document).ready(function() {
        App.setPage("inbox");  //Set current page
        App.init(); //Initialise plugins and elements
        Inbox.init();
    });
    
    var handleThemeSkins = function () {
		// Handle theme colors
        var setSkin = function (color) {
            $('#skin-switcher').attr("href", "<?php echo base_url()?>css/themes/" + color + ".css");
			
            $.cookie('skin_color', color);
        }
		$('ul.skins > li a').click(function () {
            var color = $(this).data("skin");
            setSkin(color);
        });
		
		//Check which theme skin is set
		 if ($.cookie('skin_color')) {
            setSkin($.cookie('skin_color'));
        }
	}
</script>
<!-- /JAVASCRIPTS -->

</body>
</html>