<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to finish 
	/* rendering the page and display the footer area/content
	/*-----------------------------------------------------------------------------------*/
?>

<footer id="footer">
	<div class="row">
			
		<div class="columns small-12 medium-4 large-4">	
			<?php get_sidebar('footer')?>
		</div>
		
		<div class="columns small-12 medium-4 large-4">	
			<?php get_sidebar('footer2')?>
		</div>	
		
		<div class="columns small-12 medium-4 large-4">	
			<?php get_sidebar('footer3')?>
		</div>	
	</div>	
	<section class="bottomBar">
		<div class="row">
			<div class="small-12 medium-6 large-6 columns left">
				<p>© <?php bloginfo('name'); // show the blog name, from settings ?> - <?php echo date('Y'); ?></p>
			</div>
			<div class="small-12 medium-6 large-6 columns right">
				<p>Website door <a href="http://www.anotherconcept.nl/" target="_blank" title="Webdesign en online marketing in Elst, Arnhem en Nijmegen">Another Concept</a></p>
			</div>	
		</div>	
	</section>	
</footer>	
<a class="exit-off-canvas"></a>

  </div>
</div>				

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/jquery.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/foundation.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.sticky.js" type="text/javascript"></script>

<script>
	$(document).foundation();
	
	 $(window).bind("load", function () {
	    var footer = $("#footer");
	    var pos = footer.position();
	    var height = $(window).height();
	    height = height - pos.top;
	    height = height - footer.height();
		height = height + 20;
	    if (height > 0) {
	        footer.css({
	            'margin-top': height + 'px'
	        });
	    }
	});
</script>


<?php wp_footer(); 
// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website. 
// Removing this fxn call will disable all kinds of plugins. 
// Move it if you like, but keep it around.
?>

</body>
</html>
