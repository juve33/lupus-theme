<?php
/**
 * Title: Full-sized Header
 * Slug: lupus/full-sized-header
 * Categories: header
 * Description: Header that covers the whole screen
 */
?>
<!-- wp:group {"tagName":"header","className":"full-sized has-cover","layout":{"type":"constrained"}} -->
<header class="wp-block-group full-sized has-cover">
    <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri() . '/assets/images/image1.jpg') ?>","hasParallax":true,"dimRatio":0,"isUserOverlayColor":true,"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover has-parallax">
        <span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
        <div class="wp-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url(get_template_directory_uri() . '/assets/images/image1.jpg') ?>)"></div>
        <div class="wp-block-cover__inner-container">
            <!-- wp:paragraph {"align":"left","placeholder":"Subtitle (please delete this block if you don't use it)","className":"subtitle","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"small"} -->
            <p class="has-text-align-left subtitle has-small-font-size" style="text-transform:uppercase"><?php esc_html_e('Subtitle', 'lupus') ?></p>
            <!-- /wp:paragraph -->
             
            <!-- wp:heading {"level":1,"placeholder":"Title","style":{"typography":{"textTransform":"uppercase"}}} -->
            <h1 class="wp-block-heading" style="text-transform:uppercase"><?php esc_html_e('Title', 'lupus') ?></h1>
            <!-- /wp:heading -->
        </div>
    </div>
    <!-- /wp:cover -->
     
    <!-- wp:paragraph {"placeholder":"Photocredit","className":"photo-credit","fontSize":"small"} -->
    <p class="photo-credit has-small-font-size"><?php esc_html_e('Photo: Van Klaveren Photography', 'lupus') ?></p>
    <!-- /wp:paragraph -->
</header>
<!-- /wp:group -->