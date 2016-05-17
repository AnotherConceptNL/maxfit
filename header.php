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
<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file, 
	// so if you want to load other stylesheets,
	// I would load them with an @import call in your style.css
?>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,700,500,500italic,300italic,300' rel='stylesheet' type='text/css'>

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

<header>
	<div class="row">
		<div class="columns small-12 show-for-small-down mobileBar">
			<a class="left-off-canvas-toggle" href="#" ><i class="fa fa-navicon"></i></a>
		</div>	
		<div class="columns small-12 medium-12 large-12">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png"></a>
		</div>
	</div>
	<section class="nav-wrap">
		<div class="row">
			<div class="columns small-12 medium-12 large-12 hide-for-small-down">
				<nav role="navigation" class="site-navigation main-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
				</nav><!-- .site-navigation .main-navigation -->
			</div>
		</div>
	</section>
</header>
		
