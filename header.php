<!DOCTYPE html>
<!--
<?php
	$theme = wp_get_theme();
	if ($theme) {
		echo $theme->get('Name') . ' Theme Version ' . $theme->get('Version');
	}
?>
-->
<!--
	Released under MIT License
-->
<!--
	Copyright (c) 2024 Julian Velling
-->
<!--
	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:

	The above copyright notice and this permission notice shall be included in all
	copies or substantial portions of the Software.

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
	SOFTWARE.
-->
<html lang="<?php echo get_bloginfo('language') ?>">
<?php

	if(function_exists('the_custom_logo')) {

		//the_custom_logo();
		$custom_logo_id = get_theme_mod('custom_logo');
		$logo = wp_get_attachment_image_src($custom_logo_id);
		$icon = get_site_icon_url(512, $logo[0]);

	}

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>
		<?php
			$page_title_seperator = get_theme_mod('page_title_seperator');
			$page_title = get_bloginfo('name');

			if (!is_front_page()) {
				if ($page_title_seperator) {
					$page_title = get_the_title() . ' ' . esc_attr($page_title_seperator) . ' ' . $page_title;
				}
				else {
					$page_title = get_the_title() . ' - ' . $page_title;
				}
			}

			echo $page_title;
		?>
	</title>
    <meta name="description" content=
		"<?php
			$page_description = '';

			$default_page_description = get_theme_mod('default_page_description');
			if ($default_page_description) {
				$page_description = esc_attr($default_page_description);
			}

			if (is_front_page()) {
				$blog_description = get_bloginfo( "description" );
				if ($blog_description) {
					$page_description = $blog_description;
				}
			}

			echo $page_description;
		?>"
	/>   
	<meta name="theme-color" content=
		"<?php
			$primary_color = get_theme_mod('primary_color');
			if ($primary_color) {
				echo esc_attr($primary_color);
			} 
		?>"
	/>
    <link rel="shortcut icon" href="<?php echo $icon ?>" />
	<link rel="icon" href="<?php echo $icon ?>" />
	<meta name="keywords" content="" />

    <meta property="og:title" content=
		"<?php
			echo $page_title;
		?>"
	/>
    <meta property="og:type" content="website" />
    <meta property="og:description" content=
		"<?php 
			echo $page_description;
		?>"
	>
    <meta property="og:url" content=
	"<?php
		echo get_site_url(null, '', 'https');
	?>">

	<?php
		wp_head();
	?>

</head> 

<body <?php
		// Checks for pride month
		if (wp_date('n') == 6) {
			echo 'class="pride"';
		}
		else {
			// Checks for IDAHOBIT (May 17) and International Transgender Day of Visibility (March 31)
			if ((wp_date('F j') == 'May 17') || (wp_date('F j') == 'March 31')) {
				echo 'class="trans-pride"';
			}
		}
	?>>

	<nav>
		<div class="nav-wrapper">
			<a href="/" class="logo">
				<img src=
					"<?php
						if ($logo) {
							echo $logo[0];
						}
					?>"
				alt="Logo" />
			</a>

			<?php

				wp_nav_menu(
					array(
						'menu' => 'primary',
						'container' => '',
						'theme_location' => 'primary',
						'items_wrap' => '<ul class="navigation"><li class="menu-item hamburger-icon"><i class="fa-sharp fa-solid fa-bars" tabindex="0"></i></li>%3$s</ul>',
						'fallback_cb' => 'lupustheme_empty_navigation',
						'depth' => 2
					)
				);

				wp_nav_menu(
					array(
						'menu' => 'primary',
						'container' => '',
						'theme_location' => 'primary',
						'items_wrap' => '<ul class="hamburger-menu">%3$s</ul>',
						'after' => '<i class="fa-solid fa-chevron-down"></i>',
						'fallback_cb' => 'lupustheme_empty_navigation',
						'depth' => 2
					)
				);

			?>
			<ul class="socialmedia">
				<?php
                    $socialmedias = array(
                        array('Facebook', 'facebook', 'fab fa-facebook fa-fw'),
                        array('Instagram', 'instagram', 'fab fa-instagram fa-fw'),
                        array('Tiktok', 'tiktok', 'fab fa-tiktok fa-fw'),
                        array('X', 'x', 'fab fa-x-twitter fa-fw'),
                        array('Threads', 'threads', 'fab fa-threads fa-fw'),
                        array('Github', 'github', 'fab fa-github fa-fw'),
                    );
                ?>
                <?php foreach ($socialmedias as $socialmedia) : ?>
                <li class="menu-item">
                    <a href="<?php
                        $social_link = get_theme_mod($socialmedia[1] . '_link', '');
                        if ($social_link) {
                            echo esc_attr($social_link);
                        }
                    ?>" title="<?php echo esc_html( $socialmedia[0] ); ?>" target="_blank">
                        <i class="<?php echo esc_html( $socialmedia[2] ); ?>"></i>
                    </a>
                </li>
                <?php endforeach; ?>
			</ul>

		</div>
	</nav>

	<main>