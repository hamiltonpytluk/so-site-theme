<?php 
	//	Template Name: Contact Page
	get_header(); ?>
				
		<?php while ( have_posts() ) : the_post(); ?>
						
		 	<div id="content">
				<div class="full">
					<div class="wrap clearfix">
						<div class="left">
							<p><?php echo get_post_meta($post->ID, 'Blurb', true); ?></p>						
						</div>
						<div class="right">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
							<form>
								<span>Your Name*</span>
								<input type="text" class="required" name="name" />
								<span>Your Email Address*</span>
								<input type="text" class="required" name="email" />
								<span>Phone*</span>
								<input type="text" class="required" name="phone" />
								<span>Company</span>
								<input type="text" name="company" />
								<span>Date of Your Event*</span>
								<input type="text" class="required" name="name" />
								<span>Your Message*</span>
								<textarea name="message"></textarea>
								<input type="submit" class="submit" name="submit" value="Submit" />
							</form>
						</div>
					</div>
				</div>
			</div>
		 			
		<?php											 
			endwhile;
			wp_reset_postdata();
		?>
		 		
<?php get_footer(); ?>