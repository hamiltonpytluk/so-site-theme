<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
 get_header(); ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
						
		 			<div class="post">
		 				<div class="feature"><?php the_post_thumbnail('large'); ?></div>
		 				<div class="copy">
		 					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		 					<span>posted on <?php the_time('F jS, Y'); ?></span><span class="rest"> | by <?php the_author(); ?> | Filed under: <?php the_category(', '); ?><br /><?php the_tags(); ?></span>
		 					<?php the_content(); ?>
		 				</div>
		 				<div class="social">
		 					<a href="https://twitter.com/starlightorch" class="twitter-follow-button" data-show-count="false" data-lang="en" data-show-screen-name="false">Follow @starlightorch</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		 					<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
		 				</div>
		 				<?php disqus_embed('starlightorchestra'); ?>
		 				<div id="disqus_thread"></div>
						<script type="text/javascript">
						    var disqus_shortname = 'starlightorchestra'; 
						    (function() {
						        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
						        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
						        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
						    })();
						</script>
		 			</div><!--//.post-->
		 			
	 			<?php											 
					endwhile;
					wp_reset_postdata();
				?>
		 		
<?php get_footer(); ?>