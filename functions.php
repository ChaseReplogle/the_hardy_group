<?php
/**
 * hardy_group functions and definitions
 *
 * @package hardy_group
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'hardy_group_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hardy_group_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on hardy_group, use a find and replace
	 * to change 'hardy_group' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'hardy_group', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'hardy_group' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'hardy_group_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // hardy_group_setup
add_action( 'after_setup_theme', 'hardy_group_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function hardy_group_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'hardy_group' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'hardy_group_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hardy_group_scripts() {
	wp_enqueue_style( 'hardy_group-style', get_stylesheet_uri() );

	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css');

	wp_enqueue_style( 'font-open_sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800');
	wp_enqueue_style( 'font-fjalla', 'http://fonts.googleapis.com/css?family=Fjalla+One');

	wp_enqueue_script( 'hardy_group-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'hardy_group-fitvid', get_template_directory_uri() . '/js/fitvid.js', array(), '20120206', true );

	wp_enqueue_script( 'hardy_group-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hardy_group_scripts' );

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';



/**
 * Remove Admin Bar
 */
add_filter('show_admin_bar', '__return_false');



/**
 * Theme support for Thumbnails
 */
add_theme_support( 'post-thumbnails', array( 'post', 'team', 'page', 'endorsement', 'product', 'book-reviews' ) );



function new_excerpt_more($more) { return '...'; } add_filter('excerpt_more', 'new_excerpt_more');






add_filter( 'gform_pre_render_3', 'topics_select' );
add_filter( 'gform_pre_validation_3', 'topics_select' );
add_filter( 'gform_pre_submission_filter_3', 'topics_select' );
add_filter( 'gform_admin_pre_render_3', 'topics_select' );
function topics_select( $form ) {

    foreach ( $form['fields'] as &$field ) {

        if ( strpos( $field->cssClass, 'topics_select' ) === false ) {
            continue;
        }

        // you can add additional parameters here to alter the posts that are retrieved
        // more info: [http://codex.wordpress.org/Template_Tags/get_posts](http://codex.wordpress.org/Template_Tags/get_posts)
        $posts = get_posts( 'numberposts=-1&post_status=publish&post_type=topics&level=3' );

        $choices = array();

        foreach ( $posts as $post ) {
        	$cost_amount = get_field( "cost", $post->ID );
            $choices[] = array( 'text' => $post->post_title . ' - ' . $cost_amount, 'value' => $post->post_title, 'price' => $cost_amount );
        }

        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select a Topic';
        $field->choices = $choices;

    }

    return $form;
}





add_filter( 'gform_pre_render_4', 'populate_prices' );
add_filter( 'gform_pre_validation_4', 'populate_prices' );
add_filter( 'gform_pre_submission_filter_4', 'populate_prices' );
add_filter( 'gform_admin_pre_render_4', 'populate_prices' );
function populate_prices( $form ) {

    foreach ( $form['fields'] as &$field ) {

        if (  strpos( $field->cssClass, 'populate-price' ) === false ) {
            continue;
        }

        // you can add additional parameters here to alter the posts that are retrieved
        // more info: [http://codex.wordpress.org/Template_Tags/get_posts](http://codex.wordpress.org/Template_Tags/get_posts)

        $choices = array();

        	if( have_rows('item') ):
				while ( have_rows('item') ) : the_row();
					$text = get_sub_field('title');
					$price = get_sub_field('price');
					$title = '' . $text . ' (' . $price . ')';
					$choices[] = array( 'text' => $title, 'price' => $price );
				endwhile;
				endif;


        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select a Product';
        $field->choices = $choices;

    }

    return $form;
}


add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    ul.infusionsoft_map_field_groupId_checkboxes, ul.infusionsoft_checkboxes {
  max-height: none!important;
}
  </style>';
}







add_filter( 'gform_pre_render_6', 'consulting_select' );
add_filter( 'gform_pre_validation_6', 'consulting_select' );
add_filter( 'gform_pre_submission_filter_6', 'consulting_select' );
add_filter( 'gform_admin_pre_render_6', 'consulting_select' );
function consulting_select( $form ) {

    foreach ( $form['fields'] as &$field ) {

        if ( strpos( $field->cssClass, 'consulting_select' ) === false ) {
            continue;
        }

        // you can add additional parameters here to alter the posts that are retrieved
        // more info: [http://codex.wordpress.org/Template_Tags/get_posts](http://codex.wordpress.org/Template_Tags/get_posts)
        $posts = get_posts( 'numberposts=-1&post_status=publish&post_type=topics&level=4' );

        $choices = array();

        foreach ( $posts as $post ) {
        	$cost_amount = get_field( "cost", $post->ID );
            $choices[] = array( 'text' => $post->post_title . ' - ' . $cost_amount, 'value' => $post->post_title, 'price' => $cost_amount );
        }

        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select a Topic';
        $field->choices = $choices;

    }

    return $form;
}

