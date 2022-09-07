<?php


// smart jquery inclusion
if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
	wp_enqueue_script('jquery');
}

add_action( 'wp_head', 'add_viewport_meta_tag' , '1' );

function add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
}

if ( ! function_exists( 'AXIOM_theme_setup' ) ) {

	function AXIOM_theme_setup() {
		
		
		//Remove the admn bar from the front end
		add_filter('show_admin_bar', '__return_false');
		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain( 'AXIOM', get_template_directory() . '/languages' );
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );
		
		
//		Add WooCommerce theme support
//		add_theme_support( 'woocommerce' );
		
		
// 		Add support for custom headers
//		add_theme_support( 'custom-header' );

		
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

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 300, 300);
		
		
		/*
		 * Enable support for custom image sizes that can be referenced when accessing post thumbnails or when inserting images on a page.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_image_size/
		 */
		add_image_size('custom', 250, 250, array('center', 'center'));
 
			function my_custom_sizes( $sizes ) {
				return array_merge( $sizes, array(
        		'custom' => __( 'Custom' ),
    			) );
			}
		add_filter( 'image_size_names_choose', 'my_custom_sizes' );
		
		
		
		register_nav_menus(
			array(
     	'primary' => __( 'Header Menu', 'AXIOM' ),
     	'secondary' => __( 'Secondary Menu', 'AXIOM' ),
		'footer' => __( 'Footer Menu', 'AXIOM' )
    	)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
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

		/*
		 * Add support for core custom logo.
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );


		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'AXIOM' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'AXIOM' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'AXIOM' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'AXIOM' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'AXIOM' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'AXIOM' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'AXIOM' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'AXIOM' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'AXIOM' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'AXIOM' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'AXIOM' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'AXIOM' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'AXIOM' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'AXIOM' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$color1     = '#a3cd39';
		$color2 	= '#ff8e00';
		$color3     = '#2097d4';
		$color4  	= '#747474';
		$color5		= '#f6faec';
		$color6		= '#e9f5fb';
		$color7     = '#000000';
		$color8     = '#ffffff';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'AXIOM Green', 'AXIOM' ),
					'slug'  => 'green',
					'color' => $color1,
				),
				array(
					'name'  => esc_html__( 'AXIOM Orange', 'AXIOM' ),
					'slug'  => 'orange',
					'color' => $color2,
				),
				array(
					'name'  => esc_html__( 'AXIOM Blue', 'AXIOM' ),
					'slug'  => 'blue',
					'color' => $color3,
				),
				array(
					'name'  => esc_html__( 'Light Gray', 'AXIOM' ),
					'slug'  => 'light_gray',
					'color' => $color4,
				),
				array(
					'name'  => esc_html__( 'Light Green', 'AXIOM' ),
					'slug'  => 'light_green',
					'color' => $color5,
				),
				array(
					'name'  => esc_html__( 'Light Blue', 'AXIOM' ),
					'slug'  => 'light_blue',
					'color' => $color6,
				),
				array(
					'name'  => esc_html__( 'Black', 'AXIOM' ),
					'slug'  => 'black',
					'color' => $color7,
				),
				array(
					'name'  => esc_html__( 'White', 'AXIOM' ),
					'slug'  => 'white',
					'color' => $color8,
				),
			)
		);
		
		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'AXIOM' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'AXIOM' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'AXIOM' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
			)
		);
		
		

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		
		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_false' );
	}
	
	// Removes Inactive Widget areas
//	$widgets = get_option('sidebars_widgets');
//	$widgets['wp_inactive_widgets'] = array();
//	update_option('sidebars_widgets', $widgets);
	
	
}
add_action( 'after_setup_theme', 'AXIOM_theme_setup' );

/**
 * Register widget areas.
 */
function AXIOM_widgets_init() {
 
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Header Widget 1', 'AXIOM' ),
			'id'            => 'header-widget-1',
			'description'   => esc_html__( 'Add widgets here to appear in your header.', 'AXIOM' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
    	) 
	);
	
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Header Widget 2', 'AXIOM' ),
			'id'            => 'header-widget-2',
			'description'   => esc_html__( 'Add widgets here to appear in your header.', 'AXIOM' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
    	) 
	);
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Footer Widget 1', 'AXIOM' ),
			'id'            => 'footer-widget-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'AXIOM' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
    	) 
	);
	
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Footer Widget 2', 'AXIOM' ),
			'id'            => 'footer-widget-2',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'AXIOM' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
    	) 
	);
	
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'AXIOM' ),
			'id'            => 'blog-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in your blog sidebar.', 'IATS' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
    	) 
	);
	
}
add_action( 'widgets_init', 'AXIOM_widgets_init' );


/**************************** Display Widgets in Specific Area ******************************/

//function display_widget(){
//	dynamic_sidebar( 'Left Top Header Widget' );
//	dynamic_sidebar( 'Right Top Header Widget' );
//}

//add_action('widgets_init', 'display_widget');


/**************************** Create Custom Block Category  ******************************/
//add_filter( 'block_categories', function( $categories, $post ) {
//    return array_merge(
//        $categories,
//        array(
//            array(
//                'slug'  => 'evapar-blocks',
//                'title' => 'EVAPAR Blocks',
//            ),
//        )
//    );
//}, 10, 2 );


/**************************** Register Custom ACF Blocks ******************************/


//add_action('acf/init', 'my_acf_init_block_types');
//function my_acf_init_block_types() {
//
//    // Check function exists.
//    if( function_exists('acf_register_block_type') ) {
//
//        // register the countdown timer block.
//        acf_register_block_type(array(
//            'name'              => 'countdown_timer',
//            'title'             => __('Countdown Timer'),
//            'description'       => __('A custom countdown timer block.'),
//            'render_template'   => 'template-parts/blocks/countdown-timer/countdown-timer.php',
//            'category'          => 'widgets',
//            'icon'              => 'clock',
//            'keywords'          => array( 'countdown timer' ),
//        ));
//    }
//}


/**************************** Register Custom Post Types ******************************/


//function create_posttype() {
//
//register_post_type( 'Used Equipment',
//		// CPT Options
//			array(
//				'labels' => array(
//					'name' => __( 'Used Equipment' ),
//					'singular_name' => __( 'Used Equipment' )
//				),
//				'public' => true,
//				'publicly_queryable' => true,
//				'has_archive' => false,
//				'query_var' => true,
//				'supports' => array('title', 'editor', 'custom-fields', 'excerpt', 'thumbnail'),
//				'rewrite' => array('slug' => 'used-equipment'),
//				'show_in_rest' 		  => true,
//			)
//		);
//	
//} add_action( 'init', 'create_posttype' );


/********** THIS CODE ALLOWS YOU TO USE ACF SHORTCODES TO DISPLAY CUSTOM FIELDS USING THE NATIVE WP QUERY LOOP BLOCK **********/
//You can use the Paragraph, Shortcode or List blocks to display this content with ACF shortcode

//https://myeasyguide.com/useful/use-acf-custom-fields-in-query-loop-block/
//https://www.advancedcustomfields.com/resources/shortcode/

if(!class_exists('ShortcodeExtended'))
{
  class ShortcodeExtended
  {
    public function render($attributes, $content, $data)
    {
      // just a failsafe
      if(!($data instanceof WP_Block))
      {
        return $content;
      }

      // if no ACF not activated or installed, then return early.
      if(!function_exists('get_field'))
      {
        return $content;
      }

      // if no ACF shortcode found in content, then return early.
      if(strpos($content, '[acf ') === false)
      {
        return $content;
      }

      // Native functionality is to call `wpautop`, which means we lose access to the Post ID and ACF related data
      return do_shortcode($content);
    }
  }

  add_filter('register_block_type_args', function ($args, $name)
  {
    // Here we list the native blocks we are likely to include ACF shortcodes in.
    // This list probably needs to be expanded, but suits my immediate requirements.
	// https://developer.wordpress.org/block-editor/reference-guides/core-blocks/
	  
    $validBlocks = ['core/shortcode', 'core/paragraph', 'core/list'];

    // override the native render_callback function to ensure ACF shortcodes run as expected.
    if(in_array($name, $validBlocks))
    {
      $args['render_callback'] = [new ShortcodeExtended, 'render'];
    }

    return $args;
  }, 10, 2);
}


/*****************Change admin label from default name to custom name.******************/
//https://whiteleydesigns.com/editing-wordpress-admin-menus/


//function wd_admin_menu_rename() {
//     global $menu; // Global to get menu array
//     $menu[5][0] = 'News & Announcements'; // Change name of 'Posts' to 'News and Announcements'
//}
//add_action( 'admin_menu', 'wd_admin_menu_rename' );



/**************************** ADD MENU TO ADMIN BAR ************************************/

//add_action('admin_bar_menu', 'add_menu_item', 100);
//
//function add_menu_item( $admin_bar_communities ){
//  global $pagenow;
//  $admin_bar_communities->add_menu( array( 'id'=>'update-communities','title'=>'Update Communities','href'=>'#' ) );
//}


/************************ Set the maximum allowed width ********************************/
// sets the maximum allowed width for any content added to your site, including uploaded images. The content area has a maximum width of 2,560 pixels. No content will be larger than that.


//if ( ! isset ( $content_width) )
//    $content_width = 2560; //in pixels


/************************** Enqueue scripts and styles *********************************/

function AXIOM_scripts() {
	
	// Custom styles
	wp_enqueue_style( 'AXIOM-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	
	// Print styles.
	wp_enqueue_style( 'AXIOM-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
	
	// Fontawesome Styles
	wp_enqueue_script( 'Fontawesome', 'https://kit.fontawesome.com/a1e80d7f83.js', array());
	
	//Register custom Accordion Javascript in Footer
	wp_enqueue_script('Accordian', get_template_directory_uri() . '/assets/js/accordion.js', array(), '', true);
	
}
add_action( 'wp_enqueue_scripts', 'AXIOM_scripts' );

function AXIOM_admin_styles(){
    wp_register_style( 'AXIOM_admin_styles', get_bloginfo('stylesheet_directory') . '/admin.css', false, '1.0.0' );
    wp_enqueue_style( 'AXIOM_admin_styles' );
}
add_action('admin_enqueue_scripts', 'AXIOM_admin_styles');


/***************** ADD XFBML FACEBOOK SCRIPT TO EMBED FACEBOOK FEED ******************/

//function fb_root() {
//        echo '<div id="fb-root"></div>
//<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>';
//
//}
//add_action( 'wp_head', 'fb_root' );


/******************** REMOVE COMMENT-REPLY.MIN.JS FROM FOOTER ***********************/

function remove_comment_reply(){
	wp_deregister_script( 'comment-reply' );
}
add_action('init','remove_comment_reply');


/******************** REUSABLE BLOCKS ACCESSIBLE ON ADMIN MENU **********************/
// @link https://www.billerickson.net/reusable-blocks-accessible-in-wordpress-admin-area

function reusable_blocks_admin_menu() {
    add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
}
add_action( 'admin_menu', 'reusable_blocks_admin_menu' );


/************************* ADD GOOGLE ANALYTICS TO FOOTER *****************************/

//function add_google_analytics() {
//
//echo "<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-7N69X52T3X\"></script>
//	<script>
//  		window.dataLayer = window.dataLayer || [];
//  		function gtag(){dataLayer.push(arguments);}
// 		gtag('js', new Date());
//  		gtag('config', 'G-7N69X52T3X');
//		</script>";
//}
//
//add_action('wp_footer', 'add_google_analytics');



/************************** ADD FAVICON TO YOUR SITE **********************************/

//function add_favicon() {
//	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/favicon.png" />';
//}
//add_action('wp_head', 'add_favicon');



