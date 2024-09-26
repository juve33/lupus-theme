<?php

function lupustheme_theme_support() {

    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('block-patterns');

    remove_theme_support('core-block-patterns');

}

add_action('after_setup_theme', 'lupustheme_theme_support');



function lupustheme_empty_navigation() {

    echo '<ul class="navigation"></ul>';

}



function lupustheme_customize_register($wp_customize) {

    $wp_customize->add_setting(
        'alternative_logo',
        array()
    );
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'alternative_logo',
            array(
                'label' => 'Alternative Logo',
                'description' => 'Logo that replaces the main logo in sections with a logo as background',
                'section' => 'title_tagline',
                'settings' => 'alternative_logo',
            )
        )
    );



    $wp_customize->add_setting(
        'page_title_seperator',
        array(
            'default' => "-"
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'page_title_seperator',
            array(
                'label' => 'Page Title Seperator',
                'description' => 
                                'Symbol that is placed between the page title and the blog name. This is visible at the title of your browser tab or when you send the link of a page to someone on social media<br/>
                                Can be a string of symbols; can also include emojis and such things<br/>
                                Spaces are not required as they are automatically added on both sides of the symbol',
                'section' => 'title_tagline',
                'settings' => 'page_title_seperator',
            )
        )
    );



    $wp_customize->add_setting(
        'default_page_description',
        array(
            'default' => "We're a Quadball team!"
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'default_page_description',
            array(
                'label' => 'Default Page Description',
                'description' => 'For Search Engine Optimization (SEO) reasons',
                'section' => 'title_tagline',
                'settings' => 'default_page_description',
            )
        )
    );



    $wp_customize->add_setting(
        'primary_color',
        array(
            'default' => '#604734',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_setting(
        'secondary_color',
        array(
            'default' => '#363636',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_setting(
        'tertiary_color',
        array(
            'default' => '#e2001a',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_setting(
        'accent_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_setting(
        'primary_background_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label' => 'Primary Color',
                'section' => 'colors',
                'settings' => 'primary_color',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'secondary_color',
            array(
                'label' => 'Secondary Color',
                'section' => 'colors',
                'settings' => 'secondary_color',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tertiary_color',
            array(
                'label' => 'Tertiary Color',
                'section' => 'colors',
                'settings' => 'tertiary_color',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'accent_color',
            array(
                'label' => 'Accent Color',
                'section' => 'colors',
                'settings' => 'accent_color',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_background_color',
            array(
                'label' => 'Primary Background Color',
                'section' => 'colors',
                'settings' => 'primary_background_color',
            )
        )
    );



    $wp_customize->add_section(
        'socialmedia',
        array(
            'title' => 'Social Media',
            'description' => 'Add links to your social media here<br/>Empty the field to remove the link icon'
        )
    );

    $wp_customize->add_setting(
        'facebook_link',
        array(
            'default' => 'https://www.facebook.com/'
        )
    );
    $wp_customize->add_setting(
        'instagram_link',
        array(
            'default' => 'https://www.instagram.com/'
        )
    );
    $wp_customize->add_setting(
        'tiktok_link',
        array(
            'default' => 'https://www.tiktok.com/'
        )
    );
    $wp_customize->add_setting(
        'x_link',
        array(
            'default' => 'https://www.x.com/'
        )
    );
    $wp_customize->add_setting(
        'threads_link',
        array(
            'default' => 'https://www.threads.net/'
        )
    );
    $wp_customize->add_setting(
        'github_link',
        array(
            'default' => 'https://www.github.com/'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'facebook_link',
            array(
                'label' => 'Facebook',
                'section' => 'socialmedia',
                'settings' => 'facebook_link',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'instagram_link',
            array(
                'label' => 'Instagram',
                'section' => 'socialmedia',
                'settings' => 'instagram_link',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tiktok_link',
            array(
                'label' => 'Tiktok',
                'section' => 'socialmedia',
                'settings' => 'tiktok_link',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'x_link',
            array(
                'label' => 'X',
                'section' => 'socialmedia',
                'settings' => 'x_link',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'threads_link',
            array(
                'label' => 'Threads',
                'section' => 'socialmedia',
                'settings' => 'threads_link',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'github_link',
            array(
                'label' => 'Github',
                'section' => 'socialmedia',
                'settings' => 'github_link',
            )
        )
    );

}

add_action('customize_register', 'lupustheme_customize_register');



remove_action( 'wp_head', '_wp_render_title_tag', 1 );



function lupustheme_custom_css_properties() {

    echo '<style type="text/css" id="lupustheme-colors">:root { ';

    $primary_color = get_theme_mod('primary_color');
    if ($primary_color) {
        echo '--primary-color: ' . esc_attr($primary_color) . '; ';
    }
    $secondary_color = get_theme_mod('secondary_color');
    if ($secondary_color) {
        echo '--secondary-color: ' . esc_attr($secondary_color) . '; ';
    }
    $tertiary_color = get_theme_mod('tertiary_color');
    if ($tertiary_color) {
        echo '--tertiary-color: ' . esc_attr($tertiary_color) . '; ';
    }
    $accent_color = get_theme_mod('accent_color');
    if ($accent_color) {
        echo '--accent-color: ' . esc_attr($accent_color) . '; ';
    }
    $primary_background_color = get_theme_mod('primary_background_color');
    if ($primary_background_color) {
        echo '--primary-background-color: ' . esc_attr($primary_background_color) . '; ';
    }

    if(function_exists('the_custom_logo')) {

		$custom_logo_id = get_theme_mod('custom_logo');
		$logo = wp_get_attachment_image_src($custom_logo_id, 500);

        if ($logo) {
            echo '--logo-src: url(' . $logo[0] . '); ';
        }

	}

    $alternative_custom_logo_id = get_theme_mod('alternative_logo');
    $alternative_logo = wp_get_attachment_image_src($alternative_custom_logo_id, 500);

    if ($alternative_logo) {
        echo '--alternative-logo-src: url(' . $alternative_logo[0] . '); ';
    }

    echo '--hoop-src: url(' . get_template_directory_uri() . '/assets/images/hoop.svg); ';
    echo '--grass-src: url(' . get_template_directory_uri() . '/assets/images/grass.svg); ';

    echo '}</style>';

}

add_action( 'wp_head', 'lupustheme_custom_css_properties');



function lupustheme_menus() {

    $location = array(
        'primary' => "Main Navigation",
        'footer' => "Footer Menu, e.g. for legal links"
    );
    register_nav_menus($location);
    
}

add_action('init', 'lupustheme_menus');



function lupustheme_footer_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'lupus' ),
		'id'            => 'footer-widget',
		'description'   => esc_html__( 'Space for legal notices', 'lupus' ),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'lupustheme_footer_widgets_init' );



function lupustheme_allowed_block_types( $allowed_block_types, $block_editor_context ) {

	$allowed_block_types = array(
        'core/block',
        'core/button',
        'core/buttons',
        'core/code',
        'core/column',
        'core/columns',
        'core/cover',
        'core/details',
        'core/embed',
        'core/file',
        'core/gallery',
        'core/group',
        'core/heading',
        'core/html',
        'core/image',
        'core/list',
        'core/list-item',
        'core/media-text',
        'core/missing',
        'core/paragraph',
        'core/post-title',
        'core/quote',
        'core/separator',
        'core/site-tagline',
        'core/site-title',
        'core/spacer',
        'core/table',
        'core/video'
	);

	return $allowed_block_types;
}
add_filter( 'allowed_block_types_all', 'lupustheme_allowed_block_types', 10, 2 );



function lupustheme_register_pattern_categories() {

	register_block_pattern_category( 'lupus/standard-sections', array( 
		'label'       => __( 'Height: Standard Sections', 'lupus' ),
		'description' => __( 'Standard-sized sections', 'lupus' )
	) );

    register_block_pattern_category( 'lupus/full-sized-sections', array( 
		'label'       => __( 'Height: Full-sized Sections', 'lupus' ),
		'description' => __( 'Sections that cover the entire height of the viewport', 'lupus' )
	) );

    register_block_pattern_category( 'lupus/standard-colors-sections', array( 
		'label'       => __( 'Background: Standard Color Sections', 'lupus' ),
		'description' => __( 'Sections using standard colors', 'lupus' )
	) );

    register_block_pattern_category( 'lupus/alternative-colors-sections', array( 
		'label'       => __( 'Background: Alternative Color Sections', 'lupus' ),
		'description' => __( 'Sections using alternative colors', 'lupus' )
	) );

    register_block_pattern_category( 'lupus/bgimage-sections', array( 
		'label'       => __( 'Background: Background Image Sections', 'lupus' ),
		'description' => __( 'Sections with a background image', 'lupus' )
	) );

    register_block_pattern_category( 'lupus/logo-sections', array( 
		'label'       => __( 'Background Feature: Background Logo Sections', 'lupus' ),
		'description' => __( 'Sections with the logo in the background', 'lupus' )
	) );

    register_block_pattern_category( 'lupus/text-sections', array( 
		'label'       => __( 'Background Feature: Background Text Sections', 'lupus' ),
		'description' => __( 'Sections with the text in the background', 'lupus' )
	) );

    register_block_pattern_category( 'lupus/image-sections', array( 
		'label'       => __( 'Content: Image Sections', 'lupus' ),
		'description' => __( 'Sections including images', 'lupus' )
	) );

    register_block_pattern_category( 'lupus/empty-sections', array( 
		'label'       => __( 'Content: Empty Sections', 'lupus' ),
		'description' => __( 'Sections including only a title, subtitle and a paragraph', 'lupus' )
	) );

    register_block_pattern_category( 'lupus/horizontal-sections', array( 
		'label'       => __( 'Special: Horizontal Scroll Sections', 'lupus' ),
		'description' => __( 'Sections that scroll horizontally', 'lupus' )
	) );
}

add_action( 'init', 'lupustheme_register_pattern_categories' );



function lupustheme_register_styles() {

    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style('lupustheme-main', get_template_directory_uri() . '/assets/css/main.css', array(), $version, 'all');
    wp_enqueue_style('lupustheme-variables', get_template_directory_uri() . '/assets/css/variables.css', array(), $version, 'all');
    wp_enqueue_style('lupustheme-nav', get_template_directory_uri() . '/assets/css/nav.css', array(), $version, 'all');
    wp_enqueue_style('lupustheme-blocks', get_template_directory_uri() . '/assets/css/blocks.css', array(), $version, 'all');
    wp_enqueue_style('lupustheme-general-classes', get_template_directory_uri() . '/assets/css/general-classes.css', array(), $version, 'all');
    wp_enqueue_style('lupustheme-patterns', get_template_directory_uri() . '/assets/css/patterns.css', array(), $version, 'all');
    wp_enqueue_style('lupustheme-footer', get_template_directory_uri() . '/assets/css/footer.css', array(), $version, 'all');
    wp_enqueue_style('lupustheme-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', array(), '6.6.0', 'all');

}

add_action('wp_enqueue_scripts', 'lupustheme_register_styles');



function lupustheme_register_scripts() {

    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_script('lupustheme-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
    wp_enqueue_script('lupustheme-main', get_template_directory_uri() . '/assets/js/main.js', array(), $version, true);

}

add_action('wp_enqueue_scripts', 'lupustheme_register_scripts');


?>