<?php
define('THEME_VERSION', '1.0');
define('THEME_URL', get_template_directory_uri());
define('THEME_PATH', get_template_directory());
define('ASSETS_URL', THEME_URL .'/assets/');
define('CSS_URL', ASSETS_URL.'css/');
define('JS_URL', ASSETS_URL.'js/');
define('IMAGE_URL', ASSETS_URL.'images/');

require_once get_template_directory() . '/inc/local_dev.php';
require_once get_template_directory() . '/vendor/autoload.php';

$hook_register = new \MyTheme\Hooks\HookRegister();
$hook_register->registerAllHooks();


// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'wptheme_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function wptheme_setup() {

		load_theme_textdomain( 'wptheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		register_nav_menus(
			array(
				'header_menu' => esc_html__( 'Header menu', 'cbtw' ),
				'footer_menu'  => esc_html__( 'Footer menu', 'cbtw' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 470, 221, true);
		add_image_size('product', 370, 285, true);

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_false' );
	}
}
add_action( 'after_setup_theme', 'wptheme_setup' );

function wptheme_scripts() {

	$theme_version = getenv('ENVIRONMENT') == 'local' ? time() : '1.0.0';

	wp_enqueue_style('main', ASSETS_URL .'build/main.css', array(), $theme_version);
	wp_enqueue_script('jquery');
	
	wp_enqueue_script('slick', JS_URL .'slick.min.js', array(), $theme_version, true );

	wp_enqueue_script('main', JS_URL .'main.js', array(), $theme_version, true );

}
add_action( 'wp_enqueue_scripts', 'wptheme_scripts' );

// Remove or unregister unused WordPress Image Sizes
function wptheme_remove_custom_image_sizes() {
	remove_image_size('1536x1536');
	remove_image_size('2048x2048');
	remove_image_size('medium_large');
}
// Hook the function
add_filter('init', 'wptheme_remove_custom_image_sizes', 99, 2);

function get_custom_elementor_widgets(){
	return [
		'cbtw_product_gallery' => [
			'root_file' => '/elementor-widgets/product-gallery/main.php',
			'class_name' => 'CBTW_Product_Gallery',
			'register_styles' => [ //css id => url
				'cbtw-product-gallery' => ''
			],
			'register_scripts' => [  //js id => url
				'cbtw-product-gallery' => THEME_URL . '/elementor-widgets/product-gallery/main.js'
			]
		],
	];
}

function load_elementor_component($component_name = '', $args = []){
	get_template_part('elementor-widgets/'.$component_name, null, $args);
}