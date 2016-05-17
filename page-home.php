<?php 
/**
 * 	Template Name: Sidebar/Home Page
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
?>
<!DOCTYPE html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?> | 
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/foundation.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/component.css" />
<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file, 
	// so if you want to load other stylesheets,
	// I would load them with an @import call in your style.css
?>
<link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:300,100,400' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery.maximage.css" type="text/css" media="screen" title="CSS" charset="utf-8" />


<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); 
// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
// (right here) into the head of your website. 
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions. 
// Move it if you like, but I would keep it around.
?>

</head>

<body <?php body_class();?>>
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">

    

    <!-- Off Canvas Menu -->
    <aside class="left-off-canvas-menu">
        <!-- whatever you want goes here -->
		<h4>Menu</h4>
        	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
    </aside>

<header class="home" id="headerhome">
	<div id="maximage">
		<?php echo do_shortcode( '[slider-shortcode]' ); ?>
	</div>
	<div class="row">
		<div class="columns small-12 show-for-small-down mobileBar">
			<a class="left-off-canvas-toggle" ><i class="fa fa-navicon"></i></a>
		</div>
	</div>	
	<section class="intro">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo2.png"></a>
		<section class="nav-wrap hide-for-small-down">
			<div class="row">
				<div class="columns small-12 medium-12 large-12 hide-for-small-down">
					<nav role="navigation" class="site-navigation main-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
					</nav><!-- .site-navigation .main-navigation -->
				</div>
			</div>
		</section>
	</section>		

	<a class="arrow"></a>
</header>

<section class="homeblock" id="first">
	<div class="row" data-equalizer>
		<div class="small-12 medium-12 columns" >
			<div class="home-content" data-equalizer-watch>
				<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

							<?php the_content(); ?>
				<?php endwhile;  ?>

				<?php else :  ?>
				
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

				<?php endif;?>	
			</div>
		</div>
	</div>
</section>

<section id="swap-wrap">
	<section class="homeblock" id="swap1">
		<div class="row" data-equalizer>
			<div class="small-12 medium-6 columns" >
				<div class="home-content" data-equalizer-watch>
					<?php the_block('Home Links'); ?>
				</div>
			</div>
			<div class="small-12 medium-6 columns" >
				<div class="home-content" data-equalizer-watch>
					<?php the_block('Home Rechts'); ?>
				</div>
			</div>
		</div>
	</section>
	
	<?php the_block('Home Progression'); ?>
</section>

<footer id="footer" class="home">
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
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.cycle.all.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.maximage.min.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/modernizr.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/classie.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/photostack.js"></script>
<script>
	$(document).foundation();
	
	 $(window).bind("load", function () {
	    var footer = $("#footer");
	    var pos = footer.position();
	    var height = $(window).height();
	    height = height - pos.top;
	    height = height - footer.height();
	    if (height > 0) {
	        footer.css({
	            'margin-top': height + 'px'
	        });
	    }
	});

	$(".arrow").click(function() {
	    $('html, body').animate({
	        scrollTop: $("#first").offset().top
	    }, 900);
	});

	$(function(){
		$('#maximage').maximage({
			cycleOptions: {
				speed: 1000,
				timeout: 5000,
				pause: 1
			},
			fillElement: '#headerhome',
			backgroundSize: 'contain'
		});
	});

	//PHOTO STACK
	
	// [].slice.call( document.querySelectorAll( '.photostack' ) ).forEach( function( el ) { new Photostack( el ); } );
			
			new Photostack( document.getElementById( 'photostack-1' ), {
				callback : function( item ) {
					//console.log(item)
				}
			} );

	// SWITCH DIV ORDER
	$("#swap1").insertAfter("#photostack-1");		
</script>



<?php wp_footer(); 
// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website. 
// Removing this fxn call will disable all kinds of plugins. 
// Move it if you like, but keep it around.
?>

</body>
</html>
		