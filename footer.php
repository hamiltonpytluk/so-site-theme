		<div id="home" <?php if(!is_front_page()) echo 'class="interior"';?>>
				<div class="full">
					<div class="wrap clearfix">
						<?php if(is_front_page()) { ?>
						<div class="testimonial">
						
							<ul>
							<?php
								$args = array( 'post_type' => 'testimonial', 'orderby' => 'menu_order', 'order' => 'ASC' );
								$loop = new WP_Query( $args );
								$i = 1;
								while ( $loop->have_posts() ) : $loop->the_post(); 				
							?>
								<li <?php if($i==1) echo 'class="on"'; ?>>
									<?php the_content(); ?>
									<span>&mdash; <?php the_title(); ?></span>
								</li>
							<? $i++; endwhile; ?>	
							</ul>
							
						</div>
						<?php } ?>
						<div class="blog col">
							<h3>Latest Blog</h3>
							<?php
								$args = array( 'post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => '1');
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); 
							?>
							<h4><?php the_title(); ?></h4>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>">Read More</a>
							<?php endwhile; ?>
						</div>
						<div class="instagram col">
							<h3>Instagram</h3>
							<div id="instafeed" class="clearfix"></div>
						</div>
						<div class="twitter col">
							<h3>Follow Us</h3>
							<div class="bubble">
								<div class="rewrap">
								<a class="twitter-timeline" href="https://twitter.com/StarlightOrch" 
								data-widget-id="435162413923450880" 
								data-theme="dark" 
								data-tweet-limit="1"  
								data-chrome="noheader nofooter noborders transparent" 
								data-link-color="#ffffff"
								>Tweets by @StarlightOrch</a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
								</div>
							</div>
							<div class="bird"></div>
						</div>
					</div>
				</div>
			</div>
		
		</div>
		
		<div id="footer">
			<div class="wrap">
				<div class="left">
					<ul class="clearfix">
						<?php
						$args = array(
							'menu'            => 'Main Menu',
							'menu_class'      => 'menu',
							'items_wrap'      => '%3$s', 
							'depth'           => '1'
						);
						wp_nav_menu($args); ?>
					</ul>
					<span>&copy; Starlight Orchestras. All Rights Reserved.</span>
				</div>
				<div class="right">
					<ul class="social">
						<li class="facebook"><a href="https://www.facebook.com/starlightorchestras"><span>Facebook</span></a></li>
			 			<li class="twitter"><a href="https://twitter.com/starlightorch"><span>Twitter</span></a></li>
			 			<li class="instagram"><a href="http://instagram.com/starlightorchestras"><span>Instagram</span></a></li>
			 			<li class="youtube"><a href="http://www.youtube.com/StarlightOrchestras"><span>YouTube</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	
		<script type="text/javascript" src="//use.typekit.net/vee8npp.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script src="/wp-content/themes/starlightorchestra/js/page.js"></script>		
		<script src="/wp-content/themes/starlightorchestra/js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
	
	</body>
</html>	