<?php
/**
 * _s functions and definitions
 *
 * @package _s
 * @since _s 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since _s 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( '_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since _s 1.0
 */
function _s_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * WordPress.com-specific functions and definitions
	 */
	//require( get_template_directory() . '/inc/wpcom.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', '_s' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // _s_setup
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since _s 1.0
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', '_s' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => 'Right Sidebar',
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );


/**
 * Enqueue scripts and styles
 */
function _s_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );

function twentyten_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

function twentyten_continue_reading_link() {
	return '';
}

function twentyten_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

function twentyten_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyten_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );

function twentyten_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );


function accordion($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => ''
	), $atts));
	return '<div class="accordion">
				<h5><a href="#">'.$title.'</a></h5>
				<div class="accordion-content">'.do_shortcode($content).'</div>
			</div>';
}

add_shortcode( 'accordion', 'accordion' );


function bd_parse_post_variables(){
// bd_parse_post_variables function for WordPress themes by Nick Van der Vreken.
// please refer to bydust.com/using-custom-fields-in-wordpress-to-attach-images-or-files-to-your-posts/
// for further information or questions.
global $post, $post_var;

// fill in all types you'd like to list in an array, and
// the label they should get if no label is defined.
// example: each file should get label "Download" if no
// label is set for that particular file.
$types = array('image' => 'no info available',
'file' => 'Download',
'link' => 'Read more...');

// this variable will contain all custom fields
$post_var = array();
foreach(get_post_custom($post->ID) as $k => $v) $post_var[$k] = array_shift($v);

// creating the arrays
foreach($types as $type => $message){
	global ${'post_'.$type.'s'}, ${'post_'.$type.'s_label'};
	$i = 1;
	${'post_'.$type.'s'} = array();
	${'post_'.$type.'s_label'} = array();
	if( isset( $post_var[$type.$i] ) ) {
		while($post_var[$type.$i]){
			echo $type.$i.' - '.${$type.$i.'_label'};
			array_push(${'post_'.$type.'s'}, $post_var[$type.$i]);
			array_push(${'post_'.$type.'s_label'},  $post_var[$type.$i.'_label']?htmlspecialchars($post_var[$type.$i.'_label']):$message);
			$i++;
			}
		}
	}
}

function postpage($x) {
	$p = get_page( $x );
	echo $p->post_content;
}

function getmembers($location,$slug) {
	global $post;
	echo '<div class="list">';
	echo '<h4>'.$location.'</h4>';
	echo '<ul class="member-list">';
	$args = array( 'post_type' => 'members', 'orderby' => 'menu_order', 'order' => 'ASC', 'category_name'=>$slug);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		echo '<li><h5><a href="';
		the_permalink();
		echo '">';
		the_title();
		echo '</a></h5><span>';
		foreach((get_the_category()) as $category) {
			if($category->parent == 3){
				echo $category->cat_name;
			}
		}
		echo '</span></li>';
	endwhile;	
	echo '</ul>';
	echo '</div>';
}

function showwhere(){
	global $post;
	if (in_category( 'united-states' )) {
		foreach((get_the_category()) as $category) {
			if($category->parent == 3){
				echo $category->cat_name.', ';
			}
		}		
		foreach((get_the_category()) as $category) {
			if($category->parent == 30){
				echo $category->cat_name;
			}
		}		
	} else {
		foreach((get_the_category()) as $category) {
			if($category->parent == 3){
				echo $category->cat_name.', ';
			}
		}		
		foreach((get_the_category()) as $category) {
			if($category->parent == 28){
				echo $category->cat_name;
			}
		}		
	}
	
}

add_theme_support( 'post-thumbnails' ); 

function disqus_embed($disqus_shortname) {
    global $post;
    wp_enqueue_script('disqus_embed','http://'.$disqus_shortname.'.disqus.com/embed.js');
    echo '<div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = "'.$disqus_shortname.'";
        var disqus_title = "'.$post->post_title.'";
        var disqus_url = "'.get_permalink($post->ID).'";
        var disqus_identifier = "'.$disqus_shortname.'-'.$post->ID.'";
    </script>';
}

function new_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );