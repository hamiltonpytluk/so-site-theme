<?php get_header(); ?>
				
			<div id="feature">
				<div id="slides" class="clearfix">
				
<?php
					$args = array( 'post_type' => 'slide', 'orderby' => 'menu_order', 'order' => 'ASC' );
					$loop = new WP_Query( $args );
					$i = 1;
					while ( $loop->have_posts() ) : $loop->the_post(); 
					$imageArray = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 
					$url = $imageArray[0]; 						
?>
					
					<div id="slide-<?php echo $i; ?>" class="slide" style="background:url(<?php echo $url; ?>) no-repeat center top">
						<div class="wrap">
							<h2><?php the_title(); ?></h2>
							<div class="button gradient">
								<a href="<?php echo get_post_meta($post->ID, 'Button URL', true); ?>"><?php echo get_post_meta($post->ID, 'Button Text', true); ?></a>
							</div>
						</div>
					</div>
						
<?php $i++; endwhile; ?>
					
				</div>
				<div id="buttons">
					<ul></ul>
				</div>
			</div>
	
<?php get_footer(); ?>