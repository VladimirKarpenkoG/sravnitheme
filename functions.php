<?php
require_once( __DIR__ . '/K8Init.php');
/**
 * Reacher89 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Reacher89
 */

if ( ! function_exists( 'reacher89_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function reacher89_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Reacher89, use a find and replace
		 * to change 'reacher89' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sravnitheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'sravnitheme' ),
			'mobile' => esc_html__( 'Mobile', 'sravnitheme' ),
			'footer' => esc_html__( 'Footer', 'sravnitheme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'reacher89_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'reacher89_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function reacher89_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'reacher89_content_width', 640 );
}
add_action( 'after_setup_theme', 'reacher89_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function reacher89_widgets_init() {

}
add_action( 'widgets_init', 'reacher89_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sravni_scripts() {
	wp_enqueue_style('sravni-vendor', get_template_directory_uri() . '/css/vendor.css', array(), '20191212' );
	wp_enqueue_style('sravni-app-css', get_template_directory_uri() . '/css/app.css', array(), '20191212');
	
	wp_enqueue_script( 'sravni-chunk-vendor', get_template_directory_uri() . '/lib/chunk-vendor.js', array(), '20191212', true);
	wp_enqueue_script( 'sravni-app-js', get_template_directory_uri() . '/js/app.js', array(), '20191212', true);
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', [], '20191212', true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sravni_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

add_action( 'wp_ajax_misha', 'test_function' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_misha', 'test_function' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
// первый хук для авторизованных, второй для не авторизованных пользователей
 
function test_function(){
 
	$summa = $_POST['param1'] + $_POST['param2'];
	echo $summa;
 
	die; // даём понять, что обработчик закончил выполнение
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action( 'wp_ajax_main_filter', 'main_filter' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_main_filter', 'main_filter' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
// первый хук для авторизованных, второй для не авторизованных пользователей
 
function main_filter(){
	$args = array();
	$step = $_POST['step'] ?? 0;
	$taxonomy = $_POST['taxonomy']?? 0;
	if($step == 0) {
		$terms = get_terms(['taxonomy'=>'k8tax_group', 'fields' => 'id=>name']);
		var_dump($terms);
	}
	
 
	die; // даём понять, что обработчик закончил выполнение
}

function wpa_cpt_tags( $query ) {
    if ( $query->is_tag() && $query->is_main_query() ) {
        $query->set( 'post_type', array( 'post', 'k8pt_review' ) );
    }
}
add_action( 'pre_get_posts', 'wpa_cpt_tags' );

