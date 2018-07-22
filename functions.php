<?php
add_action('after_setup_theme', 'theme_supports');
//adding theme support
function theme_supports()
{
	if (function_exists('add_theme_support'))
	{
		add_theme_support( 'menus' );
		add_theme_support( 'widgets' );
		add_theme_support( 'customize-selective-refresh-widgets' ) ;
		add_theme_support( 'automatic-feed-links' ) ;
		add_theme_support( 'title-tag' ) ;
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', ) );
    add_theme_support( 'site-logo' );
		add_theme_support( 'editor-style' );
		add_theme_support( 'custom-background' ) ;
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-logo' , array( 'height'      => 100,
																							'width'       => 400,
																							'flex-height' => true,
																							'flex-width'  => true,
																							'header-text' => array( 'site-title' ,
																																			'site-description'
																																		),
																							 ) );
		add_theme_support( 'html5' , array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );
		add_theme_support( 'infinite-scroll', array( 'container' => 'main', 'footer' => 'page',	) );
		add_theme_support( 'woocommerce' );
	}
}
/*appearence menu locations*/
function theme_menus()
{
	register_nav_menus( array(
		'primary' => 'Primary',
		'social'  => 'Social Links',
		'topbar'  => 'Topbar',
		'footer'  => 'Footer',
		'user'    => 'User',
	) );
}
add_action('after_setup_theme', 'theme_menus');
//creating widget area
function theme_widgets_init()
{
	//adding primary widget area
	register_sidebar( array(
		'name'          => 'Primary Sidebar',
		'id'            => 'primary',
		'description'   => 'Add widgets here to appear in your sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	//adding secondary widget area
	register_sidebar( array(
		'name'          => 'Second Sidebar',
		'id'            => 'secondary',
		'description'   => 'Add widgets here to appear in your sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'theme_widgets_init' );
//adding titles (organised manner)
function theme_title( $title, $sep )
{
	global $paged, $page;

	if ( is_feed() )
	{
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
	{
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
	{
		$title = "$title $sep " . sprintf( __( 'Page %s', 'theme' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'theme_title', 10, 2 );
//linking styles and bootstrap scripts
function theme_register_styles()
{
	$template_URL = get_template_directory_uri();
	//registering bootstrap components
	wp_register_style( 'bootstrap_css', "$template_URL/css/bootstrap.min.css");
	wp_register_style( 'theme_css', "$template_URL/style.css");
	wp_register_style( 'theme_style', "$template_URL/css/style.css");
	wp_register_script( 'jquery_script', "$template_URL/js/jquery.min.js" , '', '', true );
	wp_register_script( 'bootstrap_script', "$template_URL/js/bootstrap.min.js" , '', '', true );
	wp_register_script( 'custom_script', "$template_URL/js/script.custom.js" , '', '', true );
	wp_localize_script( 'custom_script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	//linking ""
	wp_enqueue_style( 'bootstrap_css');
	wp_enqueue_style( 'theme_css');
	wp_enqueue_style( 'theme_style');
	wp_enqueue_script( 'jquery_script');
	wp_enqueue_script( 'bootstrap_script');
	wp_enqueue_script( 'custom_script');
}
add_action( 'wp_enqueue_scripts', 'theme_register_styles' );
//custom logo
function theme_custom_logo()
{
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	if ($image)
	{
		echo '<img src="'.$image[0].'" class="img-responsive" />';
	}
	else
	{
		echo get_bloginfo('name');
	}
}
require_once('includes/wp-bootstrap-navwalker.php');

