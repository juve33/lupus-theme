<?php

function lupustheme_theme_support() {

    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'block-patterns' );


    $color_palette = array();

    $colors = array(
        array( 'Primary Color', 'primary_color', 'primary-color' ),
        array( 'Secondary Color', 'secondary_color', 'secondary-color' ),
        array( 'Tertiary Color', 'tertiary_color', 'tertiary-color' ),
        array( 'Accent Color', 'accent_color', 'accent-color' ),
        array( 'Primary Background Color', 'primary_background_color', 'primary-background-color' ),
    );

    foreach ( $colors as $color ) :
        $theme_mod_color = get_theme_mod( $color[1] );
        if ( $theme_mod_color ) {
            array_push( $color_palette,
                array(
                    'name'  => esc_html__( $color[0], 'lupus' ),
                    'slug'  => $color[2],
                    'color' => esc_attr( $theme_mod_color ),
                )
            );
        }
    endforeach;

    add_theme_support( 'editor-color-palette', $color_palette );


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
        'pride_mode',
        array(
            'default' => "auto"
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'pride_mode',
            array(
                'label' => 'Pride Mode',
                'type' => 'radio',
                'choices'   => array(
                    'auto' => 'Automatically',
                    'rainbow-pride' => 'Rainbow Pride',
                    'trans-pride' => 'Trans Pride',
                    'none' => 'None',
                ),
                'description' => 
                                'Manually set the pride mode.<br/>
                                When set to automatically, Rainbow Pride mode is activated in June (Pride month)<br/>
                                When set to automatically, Trans Pride mode is activated on May 17th (IDAHOBIT) and March 31st (International Transgender Day of Visibility)',
                'section' => 'colors',
                'settings' => 'pride_mode',
            )
        )
    );



    $colors = array(
        array( 'Primary Color', 'primary_color', '#604734' ),
        array( 'Secondary Color', 'secondary_color', '#363636' ),
        array( 'Tertiary Color', 'tertiary_color', '#e2001a' ),
        array( 'Accent Color', 'accent_color', '#fff' ),
        array( 'Primary Background Color', 'primary_background_color', '#fff' ),
    );

    foreach ( $colors as $color ) :
        $wp_customize->add_setting(
            $color[1],
            array(
                'default' => $color[2],
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                $color[1],
                array(
                    'label' => $color[0],
                    'section' => 'colors',
                    'settings' => $color[1],
                )
            )
        );
    endforeach;



    $wp_customize->add_section(
        'socialmedia',
        array(
            'title' => 'Social Media',
            'description' => 'Add links to your social media here<br/>Empty the field to remove the link icon'
        )
    );

    $socials = array(
        array( 'Facebook', 'facebook_link', 'https://www.facebook.com/' ),
        array( 'Instagram', 'instagram_link', 'https://www.instagram.com/' ),
        array( 'Tiktok', 'tiktok_link', 'https://www.tiktok.com/' ),
        array( 'X', 'x_link', 'https://www.x.com/' ),
        array( 'Threads', 'threads_link', 'https://www.threads.net/' ),
        array( 'Github', 'github_link', 'https://www.github.com/' ),
    );

    foreach ( $socials as $social ) :
        $wp_customize->add_setting(
            $social[1],
            array(
                'default' => $social[2]
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                $social[1],
                array(
                    'label' => $social[0],
                    'section' => 'socialmedia',
                    'settings' => $social[1],
                )
            )
        );
    endforeach;

}

add_action('customize_register', 'lupustheme_customize_register');



remove_action( 'wp_head', '_wp_render_title_tag', 1 );



function lupustheme_custom_css_properties() {

    echo '<style type="text/css" id="lupustheme-colors">:root { ';

    $colors = array(
        array( 'primary_color', 'primary-color' ),
        array( 'secondary_color', 'secondary-color' ),
        array( 'tertiary_color', 'tertiary-color' ),
        array( 'accent_color', 'accent-color' ),
        array( 'primary_background_color', 'primary-background-color' ),
    );

    foreach ( $colors as $color ) :
        $theme_mod_color = get_theme_mod( $color[0] );
        if ( $theme_mod_color ) {
            echo '--' . $color[1] . ': ' . esc_attr( $theme_mod_color ) . '; ';
        }
    endforeach;

    if( function_exists( 'the_custom_logo' ) ) {

		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo = wp_get_attachment_image_src( $custom_logo_id, 500 );

        if ( $logo ) {
            echo '--logo-src: url(' . $logo[0] . '); ';
        }

	}

    $alternative_custom_logo_id = get_theme_mod( 'alternative_logo' );
    $alternative_logo = wp_get_attachment_image_src( $alternative_custom_logo_id, 500 );

    if ( $alternative_logo ) {
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
        'core/shortcode',
        'core/site-tagline',
        'core/site-title',
        'core/spacer',
        'core/table',
        'core/video',
        'tablepress/table',
        'yoast/faq-block',
        'yoast/how-to-block'
	);

	return $allowed_block_types;

}

add_filter( 'allowed_block_types_all', 'lupustheme_allowed_block_types', 10, 2 );



function lupustheme_add_custom_separator ( $currentSeparators ) {

    $addSeparator = [];

	$page_title_seperator = get_theme_mod( 'page_title_seperator' );

    array_push( $addSeparator, esc_attr( $page_title_seperator ) );

    $newSeparators = array_unique( array_merge( $currentSeparators, $addSeparator ));
    return $newSeparators;

}

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) {
    add_filter( 'wpseo_separator_options', 'lupustheme_add_custom_separator', 10 , 1 );
}



function lupustheme_register_pattern_categories() {

    $block_pattern_categories = array(
        array( 'Height: Standard Sections', 'Standard-sized sections', 'lupus/standard-sections' ),
        array( 'Height: Full-sized Sections', 'Sections that cover the entire height of the viewport', 'lupus/full-sized-sections' ),

        array( 'Background: Standard Color Sections', 'Sections using standard colors', 'lupus/standard-colors-sections' ),
        array( 'Background: Alternative Color Sections', 'Sections using alternative colors', 'lupus/alternative-colors-sections' ),
        array( 'Background: Background Image Sections', 'Sections with a background image', 'lupus/bgimage-sections' ),

        array( 'Background Feature: Background Logo Sections', 'Sections with the logo in the background', 'lupus/logo-sections' ),
        array( 'Background Feature: Background Text Sections', 'Sections with the text in the background', 'lupus/text-sections' ),

        array( 'Content: Image Sections', 'Sections with images', 'lupus/image-sections' ),
        array( 'Content: Empty Sections', 'Sections with only a title, subtitle and a paragraph', 'lupus/empty-sections' ),

        array( 'Special: Horizontal Scroll Sections', 'Sections that scroll horizontally', 'lupus/horizontal-sections' ),
    );

    foreach ( $block_pattern_categories as $block_pattern_category ) :
        register_block_pattern_category( $block_pattern_category[2], array( 
            'label'       => __( $block_pattern_category[0], 'lupus' ),
            'description' => __( $block_pattern_category[1], 'lupus' )
        ) );
    endforeach;
}

add_action( 'init', 'lupustheme_register_pattern_categories' );



function lupustheme_register_styles() {

    $version = wp_get_theme()->get( 'Version' );
    
    $stylesheets = array(
        array( 'main', 'main.css' ),
        array( 'variables', 'variables.css' ),
        array( 'nav', 'nav.css' ),
        array( 'blocks', 'blocks.css' ),
        array( 'general-classes', 'general-classes.css' ),
        array( 'patterns', 'patterns.css' ),
        array( 'footer', 'footer.css' ),
    );

    foreach ( $stylesheets as $stylesheet ) :
        wp_enqueue_style( 'lupustheme-' . $stylesheet[0], get_template_directory_uri() . '/assets/css/' . $stylesheet[1], array(), $version, 'all' );
    endforeach;

    wp_enqueue_style( 'lupustheme-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', array(), '6.6.0', 'all' );



    if ( ! function_exists( 'is_plugin_active' ) ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    
    $plugin_stylesheets = array(
        array( 'simple-calendar', 'simple-calendar.css', 'google-calendar-events/google-calendar-events.php' ),
        array( 'tablepress', 'tablepress.css', 'tablepress/tablepress.php' ),
        array( 'translatepress', 'translatepress.css', 'translatepress-multilingual/index.php' ),
        array( 'yoast', 'yoast.css', 'wordpress-seo/wp-seo.php' ),
    );

    foreach ( $plugin_stylesheets as $plugin_stylesheet ) :
        if ( is_plugin_active( $plugin_stylesheet[2] ) ) {
            wp_enqueue_style( 'lupustheme-' . $plugin_stylesheet[0], get_template_directory_uri() . '/assets/css/' . $plugin_stylesheet[1], array(), $version, 'all' );
        }
    endforeach;

}

add_action('wp_enqueue_scripts', 'lupustheme_register_styles');



function lupustheme_register_scripts() {

    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_script( 'lupustheme-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true );

    $scripts = array(
        array( 'main', 'main.js' ),
    );

    foreach ( $scripts as $script ) :
        wp_enqueue_script( 'lupustheme-' . $script[0], get_template_directory_uri() . '/assets/js/' . $script[1], array(), $version, true );
    endforeach;

}

add_action('wp_enqueue_scripts', 'lupustheme_register_scripts');


?>