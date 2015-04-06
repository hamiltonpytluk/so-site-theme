<?php 
	//	Template Name: Our Story (or Default) Page
	get_header(); ?>
				
		<?php while ( have_posts() ) : the_post(); ?>
						
		 	<div id="content">
				<div class="full">
					<div class="wrap clearfix">
						<div class="left">
							<ul>
<?php wp_list_pages('title_li=&amp;exclude=34,36&amp;child_of='.$post->parent.''); ?>
	
							</ul>						
						</div>
						<div class="right">
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