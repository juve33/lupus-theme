<?php

function lupustheme_theme_support() {

    add_theme_support('title-tag');
    add_theme_support('custom-logo');

}

add_action('after_setup_theme', 'lupustheme_theme_support');



function lupustheme_empty_navigation() {

    echo '<ul class="navigation"></ul>';

}

function lupustheme_empty_socialmedia() {

    echo '<ul class="navigation"></ul>';

}



function lupustheme_customize_register($wp_customize) {

    $wp_customize->remove_control('blogdescription');



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



function lupustheme_custom_colors() {

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

    echo '}</style>';

}

add_action( 'wp_head', 'lupustheme_custom_colors');



function lupustheme_menus() {

    $location = array(
        'primary' => "Main Navigation",
        'socialmedia' => "Social Media Links",
        'footer' => "Footer Menu, e.g. for legal links"
    );
    register_nav_menus($location);
    
}

add_action('init', 'lupustheme_menus');



function lupustheme_register_styles() {

    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style('lupustheme-main', get_template_directory_uri() . '/assets/css/main.css', array(), $version, 'all');
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