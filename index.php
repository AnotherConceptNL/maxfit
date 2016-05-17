<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine 
 * doesn't know which template to use (e.g. 404 error)
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	<div class="row content">
		
			<div class="small-12 medium-12 large-12 columns">
				<h1>Nieuws</h1>
			
			
			<?php if ( have_posts() ) : 
			// Do we have any posts in the databse that match our query?
			// In the case of the home page, this will call for the most recent posts 
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have some posts to show, start a loop that will display each one the same way
				?>

					<div class="row">
						
						<div class="columns small-12 medium-8 large-8">
							<div class="the-content message">
								<h5 class="news-title"><a href="<?php the_permalink(); // Get the link to this post ?>" title="<?php the_title(); ?>">
									<?php the_title(); // Show the title of the posts as a link ?>
								</a></h5>
								<p><?php the_excerpt(); ?></p>
								<div class="row">
									<div class="small-6 columns">
										<span class="message-list"><?php the_category(); ?></span> <span class="message-list"><?php the_tags( '<p><i class="fa fa-tags"></i>', ', ', '</p>' ); ?></span>
									</div>
									<div class="small-6 columns">
										<a class="button" href="<?php the_permalink(); // Get the link to this post ?>" title="<?php the_title(); ?>">Lees meer</a>
									</div>
								</div>
								<?php wp_link_pages();?>
							</div><!-- the-content -->
						</div>
						<div class="columns small-12 medium-4">
							<?php the_post_thumbnail(); ?>
						</div>
					</div>
	
				<?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>
				
				<!-- pagintation -->
				<div class="small-12 columns">
					<div class="past-page"><?php previous_posts_link( 'Nieuwer' ); // Display a link to  newer posts, if there are any, with the text 'newer' ?></div>
					<div class="next-page"><?php next_posts_link( 'Ouder' ); // Display a link to  older posts, if there are any, with the text 'older' ?></div>
				</div><!-- pagination -->


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>
			
			</div>
			
		</div>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>