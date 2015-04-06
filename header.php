<?php
	global $post;
	$current = $post->ID;
	$imageArray = wp_get_attachment_image_src( get_post_thumbnail_id($current), 'full' ); $header = $imageArray[0];
?>
<!doctype html>
<html>
	<head>
		<title>Starlight Orchestra</title>
		<style type="text/css">
			@import "/wp-content/themes/starlightorchestra/style.css";
		</style>
		<meta name="viewport" content="width=device-width">
		<!--[if gte IE 9]>
			<style type="text/css">
				.gradient {
					filter: none;
				}
		</style>
		<![endif]-->
		<link rel="stylesheet" href="/wp-content/themes/starlightorchestra/js/nivo-slider.css" type="text/css" />
	</head>
	<body>
		
		<div id="all" <?php if(!is_front_page()) echo 'class="interior"';?>>
		
			<div id="header" <?php if(!is_front_page()) echo 'class="interior" style="background: url('.$header.') no-repeat center center"';?>>
				<div class="wrap">
					<h1><a href="/"><img src="/wp-content/themes/starlightorchestra/img/logo<?php if(!is_front_page()) echo '-white'; ?>.png" alt="Starlight Orchestra" /></a></h1>
					<div id="nav">
						<ul>
							<?php
							$args = array(
								'menu'            => 'Main Menu',
								'menu_class'      => 'menu',
								'items_wrap'      => '%3$s'
							);
							wp_nav_menu($args); ?>
						</ul>
					</div>
					<div id="social">
						<ul class="social">
<!-- 							<li class="client"><a href="#">Client Login</a></li> -->
							<li class="facebook"><a href="https://www.facebook.com/starlightorchestras"><span>Facebook</span></a></li>
				 			<li class="twitter"><a href="https://twitter.com/starlightorch"><span>Twitter</span></a></li>
				 			<li class="instagram"><a href="http://instagram.com/starlightorchestras"><span>Instagram</span></a></li>
				 			<li class="youtube"><a href="http://www.youtube.com/StarlightOrchestras"><span>YouTube</span></a></li>
						</ul>
					</div>	
				</div>
				<?php if(!is_front_page() && $current!==103) { ?>						
					<div id="header-slides">
						<ul>
							<?php postpage(138); ?>
						</ul>
					</div>						
				<?php } ?>
			</div>		