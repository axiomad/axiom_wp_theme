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
	echo '<meta charset="utf-8">';
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
		add_image_size('home-tile-thumbnail', 160, 120, array('center', 'center'));
		add_image_size('home-tile-image', 300, 200, array('center', 'center'));
		add_image_size('home-details-image', 1200, 900, array('center', 'center'));
 
			function my_custom_sizes( $sizes ) {
				return array_merge( $sizes, array(
					'home-tile-thumbnail' => __( 'Home Tile Image' ),
					'home-tile-image' => __( 'Home Tile Image' ),
					'home-details-image' => __( 'Home Details Image' ),
    			) );
			}
		add_filter( 'image_size_names_choose', 'my_custom_sizes' );
		
		
		
		register_nav_menus(
			array(
     	'primary' => __( 'Header Menu', 'AXIOM' ),
     	'secondary' => __( 'Secondary Menu', 'AXIOM' ),
		'footer' => __( 'Footer Menu', 'AXIOM' ),
		'footer-social' => __( 'Footer Social Menu', 'AXIOM' ),
		'mobile' => __( 'Mobile Menu', 'AXIOM' )
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
					'size'      => 12,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'AXIOM' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'AXIOM' ),
					'size'      => 14,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'AXIOM' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'AXIOM' ),
					'size'      => 16,
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
				'default-color' => 'ffffff',
			)
		);
		
		// Editor color palette.

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Parade Light Green', 'AXIOM' ),
					'slug'  => 'parade_light_green',
					'color' => '#72b644',
				),
				array(
					'name'  => esc_html__( 'Parade Dark Green', 'AXIOM' ),
					'slug'  => 'parade_dark_green',
					'color' => '#145a2f',
				),
				array(
					'name'  => esc_html__( 'Parade Light Beige', 'AXIOM' ),
					'slug'  => 'parade_light-beige',
					'color' => '#f7f8d9',
				),
				array(
					'name'  => esc_html__( 'Parade Dark Beige', 'AXIOM' ),
					'slug'  => 'parade_dark_beige',
					'color' => '#abad72',
				),
				array(
					'name'  => esc_html__( 'Parade Brown', 'AXIOM' ),
					'slug'  => 'parade_brown',
					'color' => '#5a5c27',
				),
				array(
					'name'  => esc_html__( 'Parade Blue', 'AXIOM' ),
					'slug'  => 'parade_blue',
					'color' => '#64b1e4',
				),
				array(
					'name'  => esc_html__( 'Chefs Green', 'AXIOM' ),
					'slug'  => 'chefs_green',
					'color' => '#198421',
				),
				array(
					'name'  => esc_html__( 'Topography BG Green', 'AXIOM' ),
					'slug'  => 'topography_bg_green',
					'color' => '#2fab2e',
				),
				array(
					'name'  => esc_html__( 'Black', 'AXIOM' ),
					'slug'  => 'black',
					'color' => '#000000',
				),
				array(
					'name'  => esc_html__( 'White', 'AXIOM' ),
					'slug'  => 'white',
					'color' => '#ffffff',
				),
			)
		);
		
//		add_theme_support(
//			'editor-gradient-presets',
//			array(
//				array(
//					'name'     => esc_html__( 'Purple to yellow', 'AXIOM' ),
//					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
//					'slug'     => 'purple-to-yellow',
//				),
//				array(
//					'name'     => esc_html__( 'Yellow to purple', 'AXIOM' ),
//					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
//					'slug'     => 'yellow-to-purple',
//				),
//				array(
//					'name'     => esc_html__( 'Green to yellow', 'AXIOM' ),
//					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
//					'slug'     => 'green-to-yellow',
//				),
//			)
//		);
		
		

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
			'name'          => esc_html__( 'Header Widget 3', 'AXIOM' ),
			'id'            => 'header-widget-3',
			'description'   => esc_html__( 'Add widgets here to appear in your header.', 'AXIOM' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
    	) 
	);
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Sub Header Widget 1', 'AXIOM' ),
			'id'            => 'sub-header-widget-1',
			'description'   => esc_html__( 'Add widgets here to appear in your header.', 'AXIOM' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
    	) 
	);
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Sub Header Widget 2', 'AXIOM' ),
			'id'            => 'sub-header-widget-2',
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
			'name'          => esc_html__( 'Footer Widget 3', 'AXIOM' ),
			'id'            => 'footer-widget-3',
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



/**************************** Create Custom Block Category  ******************************/
add_filter( 'block_categories', function( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'siba-blocks',
                'title' => 'SIBA Blocks',
            ),
        )
    );
}, 10, 2 );


/**************************** Register Custom ACF Blocks ******************************/


add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register the homepage slider block.
        acf_register_block_type(array(
            'name'              => 'homepage-slider-block',
            'title'             => __('Homepage Slider'),
            'description'       => __('Homepage slider block.'),
            'render_template'   => '/template-parts/blocks/homepage-slider/homepage-slider.php',
            'category'          => 'siba-blocks',
            'icon'              => 'images-alt2',
            'keywords'          => array( 'image, picture, pic, slider' ),
        ));
		// register the featured homes block.
        acf_register_block_type(array(
            'name'              => 'featured-homes-block',
            'title'             => __('Featured Homes'),
            'description'       => __('Featured Homes block.'),
            'render_template'   => '/template-parts/blocks/featured-home/featured-home.php',
            'category'          => 'siba-blocks',
            'icon'              => 'admin-home',
            'keywords'          => array( 'featured home, featured, featured homes' ),
        ));
		// register the Google Maps API block.
        acf_register_block_type(array(
            'name'              => 'google-maps-api',
            'title'             => __('Google Maps API'),
            'description'       => __('Google Maps API block.'),
            'render_template'   => '/template-parts/blocks/google-maps-api/google-maps-api.php',
            'category'          => 'siba-blocks',
            'icon'              => 'location-alt',
            'keywords'          => array( 'Google Maps, Maps, Maps API' ),
        ));
		// register the My Parade Signup/Login block.
        acf_register_block_type(array(
            'name'              => 'my-parade-signup',
            'title'             => __('My Parade Signup/Login'),
            'description'       => __('Display Signup/Login form for My Parade'),
            'render_template'   => '/template-parts/blocks/my-parade-registration/my-parade-registration.php',
            'category'          => 'siba-blocks',
            'icon'              => 'admin-users',
            'keywords'          => array( 'User Registration, Registration, My Parade' ),
        ));
		// register the Chef's On Parade Slider block.
        acf_register_block_type(array(
            'name'              => 'chefs-on-parade-slider',
            'title'             => __('Chefs On Parade Slider'),
            'description'       => __('Slider block for Chefs on Parade page'),
            'render_template'   => '/template-parts/blocks/chefs-on-parade-slider/chefs-on-parade-slider.php',
            'category'          => 'siba-blocks',
            'icon'              => 'images-alt2',
            'keywords'          => array( 'Chefs on Parade, Chefs, Chef' ),
        ));
		// register the Chef's On Parade Map block.
        acf_register_block_type(array(
            'name'              => 'chefs-on-parade-map',
            'title'             => __('Chefs On Parade Map'),
            'description'       => __('Map block for Chefs on Parade page'),
            'render_template'   => '/template-parts/blocks/chefs-on-parade-map/chefs-on-parade-map.php',
            'category'          => 'siba-blocks',
            'icon'              => 'location-alt',
            'keywords'          => array( 'Chefs on Parade, Chefs, Chef, Map, Chefs on parade map, chefs map' ),
        ));
		// register the Builders Page block.
        acf_register_block_type(array(
            'name'              => 'builders',
            'title'             => __('Builders'),
            'description'       => __('Block for Builders page'),
            'render_template'   => '/template-parts/blocks/builders-page/builders-page.php',
            'category'          => 'siba-blocks',
            'icon'              => 'hammer',
            'keywords'          => array( 'builders, builder' ),
        ));
		// register the Parade Award Winners block.
        acf_register_block_type(array(
            'name'              => 'winners',
            'title'             => __('Winners'),
            'description'       => __('Block for Parade Award Winners'),
            'render_template'   => '/template-parts/blocks/winners-page/winners-page.php',
            'category'          => 'siba-blocks',
            'icon'              => 'awards',
            'keywords'          => array( 'winners, vote' ),
        ));
		// register the Peoples Choice Winners block.
        acf_register_block_type(array(
            'name'              => 'peoples-choice-winners',
            'title'             => __('Peoples Choice Winners'),
            'description'       => __('Block for Peoples Choice Winners'),
            'render_template'   => '/template-parts/blocks/peoples-choice-winners/peoples-choice-winners.php',
            'category'          => 'siba-blocks',
            'icon'              => 'awards',
            'keywords'          => array( 'winners, vote, peoples choice' ),
        ));
		// register the Voting block.
        acf_register_block_type(array(
            'name'              => 'voting',
            'title'             => __('Voting'),
            'description'       => __('Block for displaying Voting'),
            'render_template'   => '/template-parts/blocks/voting/voting.php',
            'category'          => 'siba-blocks',
            'icon'              => 'awards',
            'keywords'          => array( 'voting, vote, peoples choice' ),
        ));
		// register the Sponsors Page block.
        acf_register_block_type(array(
            'name'              => 'sponsors',
            'title'             => __('Sponsors'),
            'description'       => __('Block for displaying Sponsors'),
            'render_template'   => '/template-parts/blocks/sponsors/sponsors.php',
            'category'          => 'siba-blocks',
            'icon'              => 'universal-access-alt',
            'keywords'          => array( 'sponsors' ),
        ));
		// register the Select Sponsor block.
        acf_register_block_type(array(
            'name'              => 'select-sponsors',
            'title'             => __('Select Sponsors'),
            'description'       => __('Block for choosing which sponsors will be displayed'),
            'render_template'   => '/template-parts/blocks/select-sponsor-block/select-sponsor-block.php',
            'category'          => 'siba-blocks',
            'icon'              => 'universal-access-alt',
            'keywords'          => array( 'sponsors' ),
        ));
    }
}


/**************************** REGISTER GOOGLE MAP API KEY ******************************/

// Method 1: Filter.
//function my_acf_google_map_api( $api ){
//    $api['key'] = 'AIzaSyAXfKTwChipyKvd0DZGUsENhpsn629ASsg';
//    return $api;
//}
//add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// Method 2: Setting.
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyAXfKTwChipyKvd0DZGUsENhpsn629ASsg');
}
add_action('acf/init', 'my_acf_init');

/**************************** Register Custom Post Types ******************************/


function create_posttype() {

register_post_type( 'Parade Homes',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'Parade Homes' ),
					'singular_name' => __( 'Parade Homes' )
				),
				'public' => true,
				'show_in_menu'        => true,
				'menu_position'       => 7,
        		'menu_icon'           => 'dashicons-admin-home',
				'publicly_queryable' => true,
				'has_archive' => false,
				'query_var' => true,
				'supports' => array('thumbnail', 'title', 'custom-fields'),
				'rewrite' => array('slug' => 'parade-of-homes'),
				'show_in_rest' 		  => true,
			)
		);
register_post_type( 'Spring Tour Homes',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'Spring Tour Homes' ),
					'singular_name' => __( 'Spring Tour Homes' )
				),
				'public' => true,
				'show_in_menu'        => true,
				'menu_position'       => 8,
        		'menu_icon'           => 'dashicons-admin-home',
				'publicly_queryable' => true,
				'has_archive' => false,
				'query_var' => true,
				'supports' => array('thumbnail', 'title', 'custom-fields'),
				'rewrite' => array('slug' => 'spring-tour-of-homes'),
				'show_in_rest' 		  => true,
			)
		);
register_post_type( 'Fall Tour Homes',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'Fall Tour Homes' ),
					'singular_name' => __( 'Fall Tour Homes' )
				),
				'public' => true,
				'show_in_menu'        => true,
				'menu_position'       => 9,
        		'menu_icon'           => 'dashicons-admin-home',
				'publicly_queryable' => true,
				'has_archive' => false,
				'query_var' => true,
				'supports' => array('thumbnail', 'title', 'custom-fields'),
				'rewrite' => array('slug' => 'fall-tour-of-homes'),
				'show_in_rest' 		  => true,
			)
		);
register_post_type( 'Slideshows',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'Slideshows' ),
					'singular_name' => __( 'Slideshows' )
				),
				'public' => true,
				'show_in_menu'        => true,
				'menu_position'       => 6,
        		'menu_icon'           => 'dashicons-format-gallery',
				'publicly_queryable' => true,
				'has_archive' => false,
				'query_var' => true,
				'supports' => array('title', 'custom-fields'),
				'rewrite' => array('slug' => 'slideshows'),
				'show_in_rest' 		  => true,
			)
		);
register_post_type( 'Sponsors',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'Sponsors' ),
					'singular_name' => __( 'Sponsors' )
				),
				'public' => true,
				'show_in_menu'        => true,
				'menu_position'       => 5,
        		'menu_icon'           => 'dashicons-groups',
				'publicly_queryable' => true,
				'has_archive' => false,
				'query_var' => true,
				'supports' => array('title', 'custom-fields'),
				'rewrite' => array('slug' => 'sponsors'),
				'show_in_rest' 		  => true,
			)
		);
register_post_type( 'Builders',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'Builders' ),
					'singular_name' => __( 'Builders' )
				),
				'public' => true,
				'show_in_menu'        => true,
				'menu_position'       => 6,
        		'menu_icon'           => 'dashicons-hammer',
				'publicly_queryable' => true,
				'has_archive' => false,
				'query_var' => true,
				'supports' => array('title', 'custom-fields'),
				'rewrite' => array('slug' => 'builders'),
				'show_in_rest' 		  => true,
			)
		);	
} add_action( 'init', 'create_posttype' );


//Add Post Title to WP_Query search functionality
//https://wordpress.stackexchange.com/questions/22949/query-post-by-title
//add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );
//function title_like_posts_where( $where, $wp_query ) {
//    global $wpdb;
//    if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
//        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
//    }
//    return $where;
//}


//Filter Parade Homes Search Page based on current Parade year as set in dashboard widget
//https://support.searchandfilter.com/forums/topic/only-return-results-which-match-specific-post-meta-data/

function filter_parade_homes( $query_args ) {
		$currentYear = get_field('current_parade_year', 'option');
		$query_args["meta_query"] = array(
			"meta_query" => array(
					"key" => "parade_year",
					"value" => $currentYear,
					"compare" => "="
				),
		);	

	return $query_args;
}
add_filter( 'sf_edit_query_args', 'filter_parade_homes', 20, 2 );


/* Remove Columns from CPT Admin menu */

add_filter( 'manage_paradehomes_posts_columns', 'custom_post_columns', 10, 2 );
function custom_post_columns( $columns ) {
	
    unset(
		$columns['title'],
		$columns['date']
    );
//    break;
    
  return $columns;
}


/* Add custom post order column to post list */
//https://support.advancedcustomfields.com/forums/topic/add-sortable-acf-admin-column/

add_filter('manage_paradehomes_posts_columns' , 'add_custom_post_order_column');

function add_custom_post_order_column( $columns ){
  return array_merge ( $columns,
    array( 
		'paradeyear' => 'Parade Year',
		'thumbnail' => 'Thumbnail',
		'entry' => 'Entry Number',
		'category' => 'Category',
		'builder' => 'Builder',
		'hoty' => 'HOTY', 
		'bestext' => 'Exterior', 
		'bestint' => 'Interior', 
		'bestkit' => 'Kitchen', 
		'bestbath' => 'Bath',
		'energyeff' => 'Energy Eff',
		'peopleschoice' => 'Peoples'
	));
}


/* Display custom post order in the post list */

add_action( 'manage_paradehomes_posts_custom_column' , 'custom_post_order_value' , 10 , 2 );

function custom_post_order_value( $column, $post_id ){
	
	$buildersList = new WP_Query( array( 
									'post_status' => 'publish',
									'post_type' => 'Builders',
									'meta_key' => 'builder_name',
									'orderby' => 'meta_value',
									'order' => 'ASC',
									'posts_per_page'  => -1,
									'meta_query'    => array(
										'relation'      => 'AND',
										array(
											'key'       => 'include',
											'value'     => true,
											'compare'   => '=',
										)
									),
									)
								);
$builderArray = array();

while ($buildersList->have_posts()) : $buildersList->the_post();

	$tempArray = array(
		'BuilderID' => get_the_ID(),
		'BuilderName' => get_field('builder_name', get_the_ID()),
						);
	$builderArray[get_the_ID()] = $tempArray;

endwhile;
	
  switch ( $column ) {
	  case 'paradeyear':
		  echo '<a href="post.php?post=' . $post_id . '&action=edit">' . get_post_meta ( $post_id, 'parade_year', true ) . '</a>';
		  break;
	  case 'thumbnail':
		  $thumb = get_field('photo_gallery', $post_id);
		  echo '<a href="post.php?post=' . $post_id . '&action=edit"><img src="' . $thumb[0]['sizes']['thumbnail'] . '" style="max-width:125px; width:100%; height:auto;"></a>';
		  break;
	  case 'entry':
		  echo '<a href="post.php?post=' . $post_id . '&action=edit">' . get_post_meta ( $post_id, 'entry_number', true ) . '</a>';
		  break;
		case 'category':
		  echo '<a href="post.php?post=' . $post_id . '&action=edit">' . get_post_meta ( $post_id, 'category', true ) . '</a>';
		  break;
	  case 'builder':
		  echo '<a href="post.php?post=' . $post_id . '&action=edit">' . $builderArray[get_post_meta ( $post_id, 'builder', true )]['BuilderName'] . '</a>';
		  break;
	  case 'hoty':
		  $value = get_post_meta ( $post_id, 'home_of_the_year', true );
		  if($value == true){
			  $checked = "Checked";
		  }else {
			  $checked = "";
		  }
		  echo '<input type="checkbox"' . $checked . ' class="admin-update-parade-cpt" data-acf-field="home_of_the_year" data-post-ID="' . $post_id . '" />';
		  break;
	  case 'bestext':
		  $value = get_post_meta ( $post_id, 'best_exterior', true );
		  if($value == true){
			  $checked = "Checked";
		  }else {
			  $checked = "";
		  }
		  echo '<input type="checkbox"' . $checked . ' class="admin-update-parade-cpt" data-acf-field="best_exterior" data-post-ID="' . $post_id . '" />';
		  break;
	  case 'bestint':
		  $value = get_post_meta ( $post_id, 'best_interior', true );
		  if($value == true){
			  $checked = "Checked";
		  }else {
			  $checked = "";
		  }
		  echo '<input type="checkbox"' . $checked . ' class="admin-update-parade-cpt" data-acf-field="best_interior" data-post-ID="' . $post_id . '" />';
		  break;
	  case 'bestkit':
		  $value = get_post_meta ( $post_id, 'best_kitchen', true );
		  if($value == true){
			  $checked = "Checked";
		  }else {
			  $checked = "";
		  }
		  echo '<input type="checkbox"' . $checked . ' class="admin-update-parade-cpt" data-acf-field="best_kitchen" data-post-ID="' . $post_id . '" />';
		  break;
	  case 'bestbath':
		  $value = get_post_meta ( $post_id, 'best_bath', true );
		  if($value == true){
			  $checked = "Checked";
		  }else {
			  $checked = "";
		  }
		  echo '<input type="checkbox"' . $checked . ' class="admin-update-parade-cpt" data-acf-field="best_bath" data-post-ID="' . $post_id . '" />';
		  break;
	  case 'energyeff':
		  $value = get_post_meta ( $post_id, 'energy_efficiency_award', true );
		  if($value == true){
			  $checked = "Checked";
		  }else {
			  $checked = "";
		  }
		  echo '<input type="checkbox"' . $checked . ' class="admin-update-parade-cpt" data-acf-field="energy_efficiency_award" data-post-ID="' . $post_id . '" />';
		  break;
	  case 'peopleschoice':
		  $value = get_post_meta ( $post_id, 'peoples_choice_award', true );
		  if($value == true){
			  $checked = "Checked";
		  }else {
			  $checked = "";
		  }
		  echo '<input type="checkbox"' . $checked . ' class="admin-update-parade-cpt" data-acf-field="peoples_choice_award" data-post-ID="' . $post_id . '" />';
		  break;
   }
}


/* Add custom post sort order columns */

add_filter( 'manage_edit-paradehomes_sortable_columns', 'sortable_paradehomes_custom_columns' );

function sortable_paradehomes_custom_columns( $columns ) {
//	$columns['category'] = 'category';
    $columns['entry'] = 'entry_number';
 
    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);
 
    return $columns;
}

/* Change default sort order to Entry Number ASC */
//https://stackoverflow.com/questions/31434373/in-wordpress-how-do-i-set-the-default-admin-sort-order-for-a-custom-post-type-t

add_action('pre_get_posts', 'paradehomes_default_order', 99);

function paradehomes_default_order($query) {
  if ($query->get('post_type') == 'paradehomes') {
    if ($query->get('orderby') == '') {
        $query->set('orderby', 'meta_value_num');
        $query->set('meta_key', 'entry_number');
    }
    if ($query->get('order') == '') {
        $query->set('order', 'ASC');
    }
  }
}


//Remove filters from Parade Homes CPT Admin menu
add_filter(
    'disable_months_dropdown',
    function ($disable, $type) {
        return $type === 'paradehomes';
    },
    10,
    2
);


//function filter_cpt($query) {
//
//    global $pagenow;
//
//    $cpt = "paradehomes";
//    $cpt_key = "parade_year";
//    $cpt_value = "2023";
//
//    if (is_admin() && $pagenow=='edit.php' &&
//        isset($_GET['post_type']) && $_GET['post_type']==$cpt &&
//        isset($_GET['cpt_filter'])  && $_GET['cpt_filter'] != 'None' &&
//        $query->query['post_type'] == $cpt)  {
//      
//          $query->query_vars['meta_key'] = $cpt_key;
//          $query->query_vars['meta_value'] = $cpt_value;
//      }
//	
//		else{
//			$query->set['meta_key'] = $cpt_key;
//          	$query->set['meta_value'] = $cpt_value;
//		}
//    }
//
//add_filter( 'parse_query', 'filter_cpt' );


/**************************** CUSTOM SHORTCODES ******************************/


//Create Shortcode to count number of homes that are in Chef's On Parade
function get_chef_count() { 
 
$count = 0;
$paradeYear = get_field('current_parade_year', 'option');
$args = array(
                    'post_type'      => 'Parade Homes',
                    'publish_status' => 'published',
					'posts_per_page' => '-1',
					'meta_query'    => array(
						'relation'      => 'AND',
						array(
							'key'       => 'chefs_on_parade',
							'value'     => true,
							'compare'   => '=',
						),
						array(
							'key'       => 'parade_year',
							'value'     => $paradeYear,
							'compare'   => '=',
						),
					),
                 );
	
$query = new WP_Query($args);
	
$count = $query->found_posts;
  
// Output needs to be return
return $count;
}
// register shortcode
add_shortcode('chef_count', 'get_chef_count');


//Create Shortcode to fetch current Parade year as set on Dashboard
function get_parade_year() {

$paradeYear = get_field('current_parade_year', 'option');

// Output needs to be return
return $paradeYear;
}
// register shortcode
add_shortcode('parade_year', 'get_parade_year');


/******************** DYNAMICALLY POPULATE ACF FIELD CHOICES FROM CPT  *************************/

//DYNAMICALLY POPULATE BUILDER ACF FIELD CHOICES ON HOMES POSTS FROM BUILDERS CPT
function acf_load_builder_field_choices( $field ) {
   
$buildersList = new WP_Query( array( 
									'post_status' => 'publish',
									'post_type' => 'Builders',
									'meta_key'	=> 'builder_name',
									'orderby' => 'meta_value',
									'order' => 'ASC',
									'posts_per_page'  => -1,
									)
								);

    // reset choices
    $field['choices'] = array();
    
    $choices = array();
//	$values = array();
	
	
while ($buildersList->have_posts()) : $buildersList->the_post();
	
	$choices[] = get_the_id() . ' : ' . ucwords((string) get_field('builder_name', get_the_id()));

endwhile;
    
    // loop through array and add to field 'choices'
    if( is_array($choices) ) {
        
        foreach( $choices as $choice ) {
            $exploded = explode(' : ', $choice);
            $field['choices'][ $exploded[0] ] = $exploded[1];
        }
    }
    // return the field
    return $field;  
}

add_filter('acf/load_field/name=builder', 'acf_load_builder_field_choices');


//DYNAMICALLY POPULATE CATEGORY ACF FIELD CHOICES ON HOMES CPT FROM WP OPTIONS CATEGORIES
function acf_load_category_field_choices( $field ) {
	
	$paradeCategories = get_field('parade_homes_categories', 'option');
   
    // reset choices
    $field['choices'] = array();
    
    $choices = array();
//	$values = array();
	
	
if($paradeCategories){
	foreach($paradeCategories as $category){
		$choices[] = $category['parade_category_number'] . ' : ' . ucwords((string) $category['parade_category_label']);
	}
}
    
    // loop through array and add to field 'choices'
    if( is_array($choices) ) {
        
        foreach( $choices as $choice ) {
            $exploded = explode(' : ', $choice);
            $field['choices'][ $exploded[0] ] = $exploded[1];
        }
    }
    // return the field
    return $field;  
}

add_filter('acf/load_field/name=category', 'acf_load_category_field_choices');


//DYNAMICALLY POPULATE SPONSORSHIP LEVEL ACF FIELD CHOICES ON SELECT SPONSORS BLOCK FROM SPONSORS CPT
function acf_load_sponsorship_field_choices( $field ) {
	
	$sponsorshipLevels = new WP_Query( array( 
									'post_status' => 'publish',
									'post_type' => 'sponsors',
									'meta_key'	=> 'sort_order',
									'orderby' => 'meta_value_num',
									'order' => 'ASC',
									'posts_per_page'  => -1,
									)
								);
   
    // reset choices
    $field['choices'] = array();
    
    $choices = array();
//	$values = array();
	
	
if($sponsorshipLevels->have_posts()){
	while ($sponsorshipLevels->have_posts()) : $sponsorshipLevels->the_post();
		$title = get_the_title();
		$choices[] = $title . ' : ' . $title;
	endwhile;
}
    
    // loop through array and add to field 'choices'
    if( is_array($choices) ) {
        
        foreach( $choices as $choice ) {
            $exploded = explode(' : ', $choice);
            $field['choices'][ $exploded[0] ] = $exploded[1];
        }
    }
    // return the field
    return $field;  
}

add_filter('acf/load_field/name=select_sponsorship_level', 'acf_load_sponsorship_field_choices');

//THIS CODE ALLOWS YOU TO USE ACF SHORTCODES TO DISPLAY CUSTOM FIELDS USING THE NATIVE WP QUERY LOOP BLOCK
//You can use the Paragraph, Shortcode, Image, HTML or List blocks to display this content with ACF shortcode

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
	  
    $validBlocks = ['core/shortcode', 'core/paragraph', 'core/list', 'core/image', 'core/html'];

    // override the native render_callback function to ensure ACF shortcodes run as expected.
    if(in_array($name, $validBlocks))
    {
      $args['render_callback'] = [new ShortcodeExtended, 'render'];
    }

    return $args;
  }, 10, 2);
}





/************************ Set the maximum allowed width ********************************/
// sets the maximum allowed width for any content added to your site, including uploaded images. The content area has a maximum width of 2,560 pixels. No content will be larger than that.


//if ( ! isset ( $content_width) )
//    $content_width = 2560; //in pixels


/************************** Enqueue scripts and styles *********************************/

function AXIOM_scripts() {
	
	// Custom styles
	wp_enqueue_style( 'parade-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	
	// Print styles.
	wp_enqueue_style( 'parade-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
	
	// Fontawesome Styles
	wp_enqueue_script( 'Fontawesome', 'https://kit.fontawesome.com/a1e80d7f83.js', array());
	
}
add_action( 'wp_enqueue_scripts', 'AXIOM_scripts' );


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


/************************* ADD GOOGLE ANALYTICS TO HEADER *****************************/

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
//add_action('wp_header', 'add_google_analytics');



/************************** ADD FAVICON TO YOUR SITE **********************************/

//function add_favicon() {
//	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/favicon.png" />';
//}
//add_action('wp_head', 'add_favicon');


/************************** ADD NEW USERS FROM FRONT END **********************************/
// register a new user
function my_parade_add_new_user() {
    if (isset( $_POST["my_parade_user_login"] ) && wp_verify_nonce($_POST['my_parade_csrf'], 'my_parade-csrf')) {
      $user_login		= $_POST["my_parade_user_login"];	
      $user_email		= $_POST["my_parade_user_email"];
      $user_first 	    = $_POST["my_parade_user_first"];
      $user_last	 	= $_POST["my_parade_user_last"];
      $user_pass		= $_POST["my_parade_user_pass"];
      $pass_confirm 	= $_POST["my_parade_user_pass_confirm"];
      
      // this is required for username checks
      require_once(ABSPATH . WPINC . '/registration.php');
      
      if(username_exists($user_login)) {
          // Username already registered
          my_parade_errors()->add('username_unavailable', __('Username already taken'));
      }
      if(!validate_username($user_login)) {
          // invalid username
          my_parade_errors()->add('username_invalid', __('Invalid username'));
      }
      if($user_login == '') {
          // empty username
          my_parade_errors()->add('username_empty', __('Please enter a username'));
      }
      if(!is_email($user_email)) {
          //invalid email
          my_parade_errors()->add('email_invalid', __('Invalid email'));
      }
      if(email_exists($user_email)) {
          //Email address already registered
          my_parade_errors()->add('email_used', __('Email already registered'));
      }
      if($user_pass == '') {
          // passwords do not match
          my_parade_errors()->add('password_empty', __('Please enter a password'));
      }
      if($user_pass != $pass_confirm) {
          // passwords do not match
          my_parade_errors()->add('password_mismatch', __('Passwords do not match'));
      }
      
      $errors = my_parade_errors()->get_error_messages();
      
      // if no errors then cretate user
      if(empty($errors)) {
          
          $new_user_id = wp_insert_user(array(
                  'user_login'		=> $user_login,
                  'user_pass'	 		=> $user_pass,
                  'user_email'		=> $user_email,
                  'first_name'		=> $user_first,
                  'last_name'			=> $user_last,
                  'user_registered'	=> date('Y-m-d H:i:s'),
                  'role'				=> 'subscriber'
              )
          );
          if($new_user_id) {
              // send an email to the admin
              wp_new_user_notification($new_user_id);
              
              // log the new user in
              wp_setcookie($user_login, $user_pass, true);
              wp_set_current_user($new_user_id, $user_login);	
              do_action('wp_login', $user_login);
              
              // send the newly created user to the home page after logging them in
              wp_redirect('/my-parade'); exit;
          }
          
      }
  
  }
}
add_action('init', 'my_parade_add_new_user');

// used for tracking error messages
function my_parade_errors(){
    static $wp_error; // global variable handle
    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}



// Sent from admin_users
add_action( 'wp_ajax_ajax_favorites_action', 'ajax_favorites_handler' );
add_action( 'wp_ajax_update_parade_cpt_action', 'update_parade_cpt_handler' );

// Sent from non-admin and anonymous users
add_action( 'wp_ajax_nopriv_ajax_favorites_action', 'please_login' );
add_action( 'wp_ajax_nopriv_update_parade_cpt_action', 'update_parade_cpt_handler' );

// define the function to be fired for logged out users
function please_login() {
   $result = array(
        'type' => 'redirect',
        'message' => 'You must be logged in to save favorite.'
    );
	echo json_encode( $result );

   die();
}


/************************** CUSTOM AJAX HANDLERS **********************************/

//Custom handler for the update Parade Homes CPT Admin functions
function update_parade_cpt_handler() {

	// Access $_POST to see what your javascript sent to the AJAX endpoint here
	$saveAction = $_POST['saveaction'];
	$post_id=$_POST['postid'];
	$acfField=$_POST['acffield'];
	
    $result = array(
        'type' => 'error',
        'message' => 'Uh oh! An error has occurred.  Please try again.'
    );

    // Manipulate your custom fields here, modifying $result as necessary
	
		// Save a repeater field value.
			$update = false;
//			$saveValue = get_field($field_key, $post_id);
//			$saveValue[] = array("parade_year"   => $paradeYear, "home_id"   => $homeId);

			if($saveAction == 'save'){
				$update = update_field($acfField, true, $post_id);
					// If above action fails, result type is set to 'error', if success, result type is set to 'success'
					   if($update === false) {
							$updateResults = array("type" => "error", "message" => "Uh oh! Update failed.  Please try again.");
							$result = array_replace($result, $updateResults);
					   } else {
							$updateResults = array("type" => "success", "message" => "Parade Home value updated.");
							$result = array_replace($result, $updateResults);
					   }
			}
			else if ($saveAction == 'remove'){
				
							$update = update_field($acfField, false, $post_id);

//				$update = delete_field($field_key,$post_id);
					// If above action fails, result type is set to 'error', if success, result type is set to 'success'
					   if($update === false) {
							$updateResults = array("type" => "error", "message" => "Uh oh! Update failed.  Please try again.");
							$result = array_replace($result, $updateResults);
					   } else {
							$updateResults = array("type" => "success", "message" => "Parade Home value updated.");
							$result = array_replace($result, $updateResults);
					   }
			}
			else {
				$updateResults = array("type" => "error", "message" => "No Data Found.");
				$result = array_replace($result, $updateResults);
			}
	
    echo json_encode( $result );

    // Note that AJAX handlers should exit() or wp_die() instead of returning
    wp_die();
}

//Custom handler for the My Favorites functions
function ajax_favorites_handler() {
    // Access $_POST to see what your javascript sent to the AJAX endpoint here
	$userId=$_POST['userid'];
	$paradeYear=$_POST['paradeyear'];
	$homeId=$_POST['entrynumber'];
	$saveAction = $_POST['saveaction'];
	
    $result = array(
        'type' => 'error',
        'message' => 'Uh oh! An error has occurred.  Please try again.'
    );

    // Manipulate your custom fields here, modifying $result as necessary
	
		// Save a repeater field value.
			$update = false;
			$post_id = 'user_' . $userId;
			$field_key = "field_638fb3289647c";
			$saveValue = get_field($field_key, $post_id);
			$saveValue[] = array("parade_year"   => $paradeYear, "home_id"   => $homeId);

			if($saveAction == 'save'){
				$update = update_field($field_key,$saveValue,$post_id);
					// If above action fails, result type is set to 'error', if success, result type is set to 'success'
					   if($update === false) {
							$updateResults = array("type" => "error", "message" => "Uh oh! Favorite not saved.  Please try again.");
							$result = array_replace($result, $updateResults);
					   } else {
							$updateResults = array("type" => "success", "message" => "Home added to My Parade Favorites.");
							$result = array_replace($result, $updateResults);
					   }
			}
			else if ($saveAction == 'remove'){
				
				if (have_rows($field_key, $post_id)){
					while (have_rows($field_key, $post_id)) : the_row();
						if(get_sub_field('home_id') == $homeId){
							$update = delete_row($field_key, get_row_index(), $post_id);
						}
					endwhile;
				}
				
//				$update = delete_field($field_key,$post_id);
					// If above action fails, result type is set to 'error', if success, result type is set to 'success'
					   if($update === false) {
							$updateResults = array("type" => "error", "message" => "Uh oh! Favorite not removed.  Please try again.");
							$result = array_replace($result, $updateResults);
					   } else {
							$updateResults = array("type" => "success", "message" => "Home removed from My Parade Favorites.");
							$result = array_replace($result, $updateResults);
					   }
			}
			else {
				$updateResults = array("type" => "error", "message" => "No Data Found.");
				$result = array_replace($result, $updateResults);
			}
	
			

    echo json_encode( $result );

    // Note that AJAX handlers should exit() or wp_die() instead of returning
    wp_die();
}

//wp_localize_script( 'ajax_script', 'ajax_object', array( 
//    'ajax_url' => admin_url( 'admin-ajax.php' )
//) );

// Fires after WordPress has finished loading, but before any headers are sent.
add_action( 'init', 'script_enqueuer' );

function script_enqueuer() {
   
   // Register the JS file with a unique handle, file location, and an array of dependencies
   	wp_register_script( "my_parade_favorites", get_template_directory_uri().'/assets/js/my_parade_favorites.js', array('jquery') );
	wp_register_script( "admin_update_parade_cpt", get_template_directory_uri().'/assets/js/admin_update_parade_homes.js', array('jquery') );
   
   // localize the script to your domain name, so that you can reference the url to admin-ajax.php file easily
   	wp_localize_script( 'my_parade_favorites', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ))); 
	wp_localize_script( 'admin_update_parade_cpt', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ))); 
   
   // enqueue jQuery library and the script(s) you registered above
//   	wp_enqueue_script( 'jquery' );
   	wp_enqueue_script( 'my_parade_favorites' );
	wp_enqueue_script( 'admin_update_parade_cpt' );
}


/************************** CUSTOMIZE ADMIN FEATURES **********************************/

add_filter( 'views_edit-paradehomes', 'meta_views_wpse_94630', 11, 1 );

function meta_views_wpse_94630( $views ) 
{
//    $views['separator'] = '&nbsp;';
	$views['metakey'] = '<a href="edit.php?post_type=paradehomes&parade_year=2022">2022</a> | ';
    $views['metakey'] .= '<a href="edit.php?post_type=paradehomes&parade_year=2023">2023</a>';
    return $views;
}

add_action( 'load-edit.php', 'load_custom_filter_wpse_94630' );

function load_custom_filter_wpse_94630()
{
    global $typenow;

    // Adjust the Post Type
    if( 'paradehomes' != $typenow )
        return;

    add_filter( 'posts_where' , 'posts_where_wpse_94630' );
}

function posts_where_wpse_94630( $where ) 
{
    global $wpdb;       
    if ( isset( $_GET[ 'parade_year' ] ) && !empty( $_GET[ 'parade_year' ] ) ) 
    {
//        $metaKey = esc_sql( $_GET['meta_data'] );
		$metaValue = esc_sql( $_GET['parade_year'] );
        $where .= " AND ID IN (SELECT post_id FROM $wpdb->postmeta WHERE parade_year='$metaValue' )";
    }
    return $where;
}


//Add custom admin panel alert to Parade Homes CPT Admin Page
function parade_cpt_admin_notice(){
    global $pagenow;
    if ( $pagenow == 'edit.php' ) {
         echo '<div id="parade-cpt-alert-box" class="notice is-dismissible parade-cpt-alert-box" style="display:none;"></div>';
    }
}
add_action('admin_notices', 'parade_cpt_admin_notice');

//Add Custom Admin Stylesheets
function AXIOM_admin_styles(){
    wp_register_style( 'AXIOM_admin_styles', get_template_directory_uri() . '/assets/css/admin.css', false, '1.0.0' );
    wp_enqueue_style( 'AXIOM_admin_styles' );
}
add_action('admin_enqueue_scripts', 'AXIOM_admin_styles');


//Add Custom Login Stylesheet
function WP_login_screen_styles(){
	wp_enqueue_style('Login Screen Styles', get_template_directory_uri() . '/assets/css/admin-login-styles.css', false);
}
add_action('login_enqueue_scripts', 'WP_login_screen_styles', 10);

//Add Options Pages to Admin Menu
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Parade General Settings',
        'menu_title'    => 'Parade General Settings',
        'menu_slug'     => 'parade-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    )); 
}



//Customize Dashboard Widgets

//Delete Some Of The Default Dashboard Widgets
//https://developer.wordpress.org/reference/hooks/wp_dashboard_setup/

function remove_dashboard_widgets () {

      	//Completely remove various dashboard widgets (remember they can also be HIDDEN from admin)
      	remove_meta_box( 'dashboard_quick_press',   'dashboard', 'side' );      //Quick Press widget
      	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );      //Recent Drafts
		remove_meta_box( 'dashboard_primary',       'dashboard', 'side' );      //WordPress.com Blog
      	remove_meta_box( 'dashboard_secondary',     'dashboard', 'side' );      //Other WordPress News
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');


//Add Custom Dashboard Widgets
//https://www.youtube.com/watch?v=Vhf4qU9yKCw
add_action('wp_dashboard_setup', 'add_custom_dashboard_widgets');

function add_custom_dashboard_widgets() {
	//only add widget to dashboard if this widget to be used by users with correct privilages.
	if (current_user_can('manage_options')) {
		wp_add_dashboard_widget('parade_details', 'Parade of Homes Details', 'parade_defaults_widget');
		wp_add_dashboard_widget('parade_categories', 'Parade Categories', 'parade_categories_widget');
	}
}
//Display widgets
if(!function_exists('parade_defaults_widget')){
	function parade_defaults_widget() { 
			acf_form_head();
			acf_form(array(
				'post_id' => 'option',
        		'field_groups' => array('group_639a4f3472add'),
        		'submit_value'  => __('Update')
    		));
	}
}
if(!function_exists('parade_categories_widget')){
	function parade_categories_widget() { 
			acf_form_head();
			acf_form(array(
				'post_id' => 'option',
        		'field_groups' => array('group_63b89110871dd'),
        		'submit_value'  => __('Update')
    		));
	}
}


/***************** Remove uneeded items from Admin Menu ******************/
//https://developer.wordpress.org/reference/functions/remove_menu_page/

function remove_admin_menu_items ()      //creating functions post_remove for removing menu item
{ 
	//remove posts from admin menu as it is not used by this client
   	remove_menu_page('edit.php');
	//remove comments from admin menu as we are not using this feature
	remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'remove_admin_menu_items');   //adding action for triggering function call


/*****************Change admin label from default name to custom name.******************/
//https://whiteleydesigns.com/editing-wordpress-admin-menus/

function wd_admin_menu_rename() {
     global $menu; // Global to get menu array
     $menu[5][0] = 'News & Announcements'; // Change name of 'Posts' to 'News and Announcements'
}
add_action( 'admin_menu', 'wd_admin_menu_rename' );



/**************************** ADD MENU TO ADMIN BAR ************************************/

//add_action('admin_bar_menu', 'add_menu_item', 100);
//
//function add_menu_item( $admin_bar_communities ){
//  global $pagenow;
//  $admin_bar_communities->add_menu( array( 'id'=>'update-communities','title'=>'Update Communities','href'=>'#' ) );
//}
