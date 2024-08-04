<!DOCTYPE html>
<html lang="en">
<?php

	if(function_exists('the_custom_logo')) {

		//the_custom_logo();
		$custom_logo_id = get_theme_mod('custom_logo');
		$logo = wp_get_attachment_image_src($custom_logo_id);

	}

?>
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content=
		"<?php
			$default_page_description = get_theme_mod('default_page_description');
			if ($default_page_description) {
				echo esc_attr($default_page_description);
			} 
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
    <link rel="shortcut icon" href="<?php echo $logo[0] ?>" />
	<link rel="icon" href="<?php echo $logo[0] ?>" />
	<meta name="keywords" content="" />

    <meta property="og:title" content="<?php get_bloginfo('name') ?>">
    <meta property="og:type" content="website" />
    <meta property="og:description" content=
		"<?php 
			$default_page_description = get_theme_mod('default_page_description');
			if ($default_page_description) {
				echo esc_attr($default_page_description);
			} 
		?>"
	>
    <meta property="og:url" content="">

	<?php
		wp_head();
	?>

</head> 

<body>

	<nav>
		<div class="nav-wrapper">
			<a href="/" class="logo">
				<img src="<?php echo $logo[0] ?>" alt="Logo" />
			</a>

			<?php

				wp_nav_menu(
					array(
						'menu' => 'primary',
						'container' => '',
						'theme_location' => 'primary',
						'items_wrap' => '<ul class="navigation">%3$s</ul>',
						'fallback_cb' => 'lupustheme_empty_navigation',
						'depth' => 2
					)
				);

			?>
			<ul class="socialmedia">
				<li class="menu-item">
					<a href="<?php
						$facebook_link = get_theme_mod('facebook_link', '');
						if ($facebook_link) {
							echo esc_attr($facebook_link);
						}
					?>" title="Facebook" target="_blank">
						<i class="fab fa-facebook fa-fw"></i>
					</a>
				</li>
				<li class="menu-item">
					<a href="<?php
						$instagram_link = get_theme_mod('instagram_link', '');
						if ($instagram_link) {
							echo esc_attr($instagram_link);
						}
					?>" title="Instagram" target="_blank">
						<i class="fab fa-instagram fa-fw"></i>
					</a>
				</li>
				<li class="menu-item">
					<a href="<?php
						$tiktok_link = get_theme_mod('tiktok_link', '');
						if ($tiktok_link) {
							echo esc_attr($tiktok_link);
						}
					?>" title="Tiktok">
						<i class="fab fa-tiktok fa-fw"></i>
					</a>
				</li>
				<li class="menu-item">
					<a href="<?php
						$x_link = get_theme_mod('x_link', '');
						if ($x_link) {
							echo esc_attr($x_link);
						}
					?>" title="X">
						<i class="fab fa-x-twitter fa-fw"></i>
					</a>
				</li>
				<li class="menu-item">
					<a href="<?php
						$threads_link = get_theme_mod('threads_link', '');
						if ($threads_link) {
							echo esc_attr($threads_link);
						}
					?>" title="Threads">
						<i class="fab fa-threads fa-fw"></i>
					</a>
				</li>
				<li class="menu-item">
					<a href="<?php
						$github_link = get_theme_mod('github_link', '');
						if ($github_link) {
							echo esc_attr($github_link);
						}
					?>" title="Github">
						<i class="fab fa-github fa-fw"></i>
					</a>
				</li>
			</ul>

		</div>
	</nav>

	<main>
		<header>
			<h1>

				<?php

					the_title();
				
				?>

			</h1>
		</header>