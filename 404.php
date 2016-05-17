<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>
	<div class="row content">
		<div class="small-12 medium-8 columns">
				<h1 class="page-title">Pagina niet gevonden</h1>
				<p>De pagina is niet gevonden. Probeer de navigatie, het zoekformulier of <a href="/" title="Keer terug naar de homepagina">keer terug naar de homepagina</a>.</p>

				<?php get_search_form(); ?>

		</div><!-- #content .site-content -->
		<div class="small-12 medium-4 columns">
			<?php get_sidebar(); ?>
			<?php the_block('Zijkant pagina'); ?>
			
		</div>	
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>