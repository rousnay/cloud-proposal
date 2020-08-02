<?php
/**
 * cloud proposal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cloud_proposal
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'cloud_proposal_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cloud_proposal_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cloud proposal, use a find and replace
		 * to change 'cloud-proposal' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cloud-proposal', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'cloud-proposal' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'cloud_proposal_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'cloud_proposal_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cloud_proposal_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'cloud_proposal_content_width', 640 );
}
add_action( 'after_setup_theme', 'cloud_proposal_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cloud_proposal_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cloud-proposal' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cloud-proposal' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cloud_proposal_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cloud_proposal_scripts() {


	wp_enqueue_style('cloud-proposal-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 4.5, false );

	wp_enqueue_style('cloud-proposal-bookblock-css', get_template_directory_uri() . '/css/bookblock.css', array(), 2.1, false );

	wp_enqueue_style( 'cloud-proposal-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_style_add_data( 'cloud-proposal-style', 'rtl', 'replace' );

	wp_enqueue_script( 'cloud-proposal-modernizr-custom-js', get_template_directory_uri() . '/js/modernizr.custom.js', array('jquery'), _S_VERSION, false );


	wp_enqueue_script( 'cloud-proposal-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );


	wp_enqueue_script( 'cloud-proposal-jquerypp-custom-js', get_template_directory_uri() . '/js/jquerypp-custom.js', array('jquery'), _S_VERSION, true );


	wp_enqueue_script( 'cloud-proposal-jquery-bookblock-js', get_template_directory_uri() . '/js/jquery.bookblock.min.js', array('jquery'), _S_VERSION, true );


	wp_enqueue_script( 'cloud-proposal-theme-settings-js', get_template_directory_uri() . '/js/theme-settings.js', array('jquery'), _S_VERSION, true );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cloud_proposal_scripts' );

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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/**
 * Custom Include files
 */

// ACF Settings
include_once( get_stylesheet_directory() . '/includes/acf-settings.php' );


//Proposal post types
include_once( get_stylesheet_directory() . '/includes/custom-posts.php' );


//Post duplicator
include_once( get_stylesheet_directory() . '/includes/duplicator.php' );


//Capability manager (user rule)
include_once( get_stylesheet_directory() . '/includes/theme-settings.php' );
