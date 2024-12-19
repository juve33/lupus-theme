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



function lupustheme_custom_mime_types( $mimes ) {
	
	$mimes['svg']  = 'image/svg+xml';
	$mimes['woff2']  = 'font/woff2';
	$mimes['woff']  = 'font/woff';

	return $mimes;
}

add_filter( 'upload_mimes', 'lupustheme_custom_mime_types' );



function lupustheme_customize_register( $wp_customize ) {

    $wp_customize->add_setting(
        'page_title_separator',
        array(
            'default' => "-"
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'page_title_separator',
            array(
                'label' => 'Page Title Seperator',
                'description' => 
                                'Symbol that is placed between the page title and the blog name. This is visible at the title of your browser tab or when you send the link of a page to someone on social media<br/>
                                Can be a string of symbols; can also include emojis and such things<br/>
                                Spaces are not required as they are automatically added on both sides of the symbol',
                'section' => 'title_tagline',
                'settings' => 'page_title_separator',
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
        'fonts',
        array(
            'title' => 'Fonts',
            'description' =>
                "Upload your custom fonts here.<br/>
                If you don't want your font to have a certain style (e.g. italics or a bold version), you can simply select a file you already selected for that font.<br/>
                <strong>IMPORTANT: Upload both the .woff- AND the .woff2-files in the uploads menu, even though you can only select the .WOFF-FILE here</strong>"
        )
    );

    $wp_customize->add_setting(
        'emphasized_text_transform',
        array(
            'default' => 'uppercase'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'emphasized_text_transform',
            array(
                'label' => 'Emphasized Text Transform',
                'type' => 'radio',
                'choices'   => array(
                    'none' => 'None',
                    'capitalize' => 'Capitalize (Transforms the first character of each word to uppercase)',
                    'uppercase' => 'Uppercase',
                    'lowercase' => 'Lowercase',
                ),
                'description' => 'Determines the text transform of emphasized texts such as subtitles.',
                'section' => 'fonts',
                'settings' => 'emphasized_text_transform',
            )
        )
    );

    $wp_customize->add_setting(
        'emphasized_letter_spacing',
        array(
            'default' => '0.0'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'emphasized_letter_spacing',
            array(
                'label' => 'Emphasized Letter Spacing',
                'description' => 'Alter the letter spacing for emphasized texts such as headlines<br/>This alters different texts than the previous option<br/>Syntax Example: -0.03',
                'section' => 'fonts',
                'settings' => 'emphasized_letter_spacing',
            )
        )
    );

    $font_names = array(
        array( 'Header Font Name', 'header_font_name', 'Used for the bigger headers' ),
        array( 'Main Font Name', 'main_font_name', 'Used for the vast majority of texts' ),
        array( 'Secondary Font Name', 'secondary_font_name', 'Used for minor, yet emphasized texts such as subtitles' ),
        array( 'Details Font Name', 'details_font_name', 'Used for decorational purposes such as the background text in the background text patterns' ),
    );

    foreach ( $font_names as $font_name ) :
        $wp_customize->add_setting(
            $font_name[1],
            array(
                'default' => $font_name[0]
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                $font_name[1],
                array(
                    'label' => $font_name[0],
                    'description' => $font_name[2],
                    'section' => 'fonts',
                    'settings' => $font_name[1],
                )
            )
        );
    endforeach;

    $font_files = array(
        array( 'font_header_normal', 'Header Font', 'normal' ),
        array( 'font_header_italics', 'Header Font', 'italics' ),


        array( 'font_main_normal_bold', 'Main Font', 'normal bold' ),
        array( 'font_main_normal_regular', 'Main Font', 'normal regular' ),
        array( 'font_main_normal_light', 'Main Font', 'normal light' ),

        array( 'font_main_italics_bold', 'Main Font', 'italics bold' ),
        array( 'font_main_italics_regular', 'Main Font', 'italics regular' ),
        array( 'font_main_italics_light', 'Main Font', 'italics light' ),


        array( 'font_secondary_normal_bold', 'Secondary Font', 'normal bold' ),
        array( 'font_secondary_normal_regular', 'Secondary Font', 'normal regular' ),
        array( 'font_secondary_normal_light', 'Secondary Font', 'normal light' ),

        array( 'font_secondary_italics_bold', 'Secondary Font', 'italics bold' ),
        array( 'font_secondary_italics_regular', 'Secondary Font', 'italics regular' ),
        array( 'font_secondary_italics_light', 'Secondary Font', 'italics light' ),

        array( 'font_details_normal', 'Details Font', 'normal' ),
        array( 'font_details_italics', 'Details Font', 'italics' ),
    );

    foreach ( $font_files as $font_file ) :
        $wp_customize->add_setting(
            $font_file[0],
            array()
        );
        $wp_customize->add_control(
            new WP_Customize_Media_Control(
                $wp_customize,
                $font_file[0],
                array(
                    'label' => $font_file[1],
                    'description' => $font_file[2],
                    'section' => 'fonts',
                    'settings' => $font_file[0],
                    'mime_type' => 'font/woff'
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



function lupustheme_custom_fonts() {

    $custom_fonts = array();

    echo '<style type="text/css" id="lupustheme-fonts">';

    $font_files = array(
        array( 'header-font', 'header_font_name','font_header_normal', 'normal' ),
        array( 'header-font', 'header_font_name','font_header_italics', 'italic' ),


        array( 'main-font', 'main_font_name','font_main_normal_bold', 'normal', 'bold' ),
        array( 'main-font', 'main_font_name','font_main_normal_regular', 'normal', 'regular' ),
        array( 'main-font', 'main_font_name','font_main_normal_light', 'normal', 'light' ),

        array( 'main-font', 'main_font_name','font_main_italics_bold', 'italic', 'bold' ),
        array( 'main-font', 'main_font_name','font_main_italics_regular', 'italic', 'regular' ),
        array( 'main-font', 'main_font_name','font_main_italics_light', 'italic', 'light' ),


        array( 'secondary-font', 'secondary_font_name','font_secondary_normal_bold', 'normal', 'bold' ),
        array( 'secondary-font', 'secondary_font_name','font_secondary_normal_regular', 'normal', 'regular' ),
        array( 'secondary-font', 'secondary_font_name','font_secondary_normal_light', 'normal', 'light' ),

        array( 'secondary-font', 'secondary_font_name','font_secondary_italics_bold', 'italic', 'bold' ),
        array( 'secondary-font', 'secondary_font_name','font_secondary_italics_regular', 'italic', 'regular' ),
        array( 'secondary-font', 'secondary_font_name','font_secondary_italics_light', 'italic', 'light' ),


        array( 'details-font', 'details_font_name','font_details_normal', 'normal' ),
        array( 'details-font', 'details_font_name','font_details_italics', 'italic' ),
    );

    foreach ( $font_files as $font_file ) :
        $font_id = get_theme_mod( $font_file[2] );
        $font_url = wp_get_attachment_url( $font_id );

        if ( $font_url ) {

            echo '@font-face{ ';

            $font_name = get_theme_mod( $font_file[1] );
            if ( $font_name ) {
                echo 'font-family: "' . $font_name . '"; ';
                array_push( $custom_fonts, array( $font_file[0], $font_name ) );
            }
            else {
                echo 'font-family: "' . $font_file[1] . '"; ';
                array_push( $custom_fonts, array( $font_file[0], $font_file[1] ) );
            }

            echo 'src: url("' . $font_url . '2") format("woff2"), url("' . $font_url . '") format("woff"); ';
            
            echo 'font-display: swap; ';

            echo 'font-style: ' . $font_file[3] . '; ';

            if ( count($font_file) == 5 ) {
                if ( $font_file[4] == 'bold' ) {
                    echo 'font-weight: 600 1000; ';
                }
                else {
                    if ( $font_file[4] == 'light' ) {
                        echo 'font-weight: 100 300; ';
                    }
                    else {
                        echo 'font-weight: 400 500; ';
                    }
                }
            }
            else {
                echo 'font-weight: 1 1000; ';
            }

            echo '} ';

        }
    endforeach;


    $custom_fonts_unique = array_unique( $custom_fonts, SORT_REGULAR );
    echo ':root { ';
    
    foreach ( $custom_fonts_unique as $custom_font ) :
        echo '--' . $custom_font[0] . ': ' . $custom_font[1] . ',"Helvetica Neue",Helvetica,Arial,sans-serif; ';
    endforeach;

    $emphasized_text_transform = get_theme_mod( 'emphasized_text_transform' );
    if ( $emphasized_text_transform ) {
        echo '--emphasized-texttransform: ' . $emphasized_text_transform . '; ';
    }

    $emphasized_letter_spacing = get_theme_mod( 'emphasized_letter_spacing' );
    if ( $emphasized_letter_spacing ) {
        echo '--emphasized-letterspacing: ' . $emphasized_letter_spacing . 'em; ';
    }

    echo '}</style>';

}

add_action( 'wp_head', 'lupustheme_custom_fonts');



function lupustheme_custom_css_properties() {

    echo '<style type="text/css" id="lupustheme-variables">:root { ';

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
        'yoast/how-to-block',
        'lupus-plugin/header',
        'lupus-plugin/section'
	);

	return $allowed_block_types;

}

add_filter( 'allowed_block_types_all', 'lupustheme_allowed_block_types', 10, 2 );



function lupustheme_add_custom_separator ( $currentSeparators ) {

    $addSeparator = [];

	$page_title_separator = get_theme_mod( 'page_title_separator' );

    array_push( $addSeparator, esc_attr( $page_title_separator ) );

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
        array( 'lupus-plugin', 'lupus-plugin.css', 'lupus-plugin/lupus-plugin.php' ),
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
    wp_enqueue_script( 'lupustheme-jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), '3.4.1', true );

    $scripts = array(
        array( 'main', 'main.js' ),
    );

    foreach ( $scripts as $script ) :
        wp_enqueue_script( 'lupustheme-' . $script[0], get_template_directory_uri() . '/assets/js/' . $script[1], array(), $version, true );
    endforeach;

}

add_action('wp_enqueue_scripts', 'lupustheme_register_scripts');


?>