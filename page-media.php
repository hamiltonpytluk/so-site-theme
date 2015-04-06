<?php 
	//	Template Name: Media Page
	get_header(); ?>
				
		<?php while ( have_posts() ) : the_post(); ?>
						
		 	<div id="content">
				<div class="full">
					<div class="wrap clearfix">
						<div class="both">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		 			
		<?php											 
			endwhile;
			wp_reset_postdata();
		?>
		 		
<?php get_footer(); ?>