<?php
/**
 * The template for displaying any single post.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	<div class="row content">
		<div class="columns small-12 medium-8">
			<?php if ( have_posts() ) : 
			// Do we have any posts in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a post to show, start a loop that will display it
				?>						
						<div class="news-image">
							 <?php  
							 	if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							} ?> 
						</div>		
					
						<h1 class="title"><?php the_title(); // Display the title of the post ?></h1>
						<div class="the-content">
							<?php the_content(); ?>
							<?php wp_link_pages();?>
						</div><!-- the-content -->
						<a class="button" href="javascript:history.go(-1)" onMouseOver="self.status=document.referrer;return true">Ga terug</a>



				<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>
		</div>
		
		<div class="small-12 medium-4 columns">
			<?php the_block('Zijkant pagina'); ?>
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
