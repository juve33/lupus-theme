<?php
/**
 * Title: Standard Section with Image and Text Background (alternative Colors)
 * Slug: lupus/standard-with-image-alternative-text
 * Categories: lupus/standard-sections, lupus/image-sections, lupus/alternative-colors-sections, lupus/text-sections
 * Description: Standard section with title, text, image and text in the background in alternative colors
 */
?>
<!-- wp:group {"tagName":"section","className":"full-width secondary-color-scheme","layout":{"type":"constrained"}} -->
<section class="wp-block-group full-width secondary-color-scheme">
    <!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group">
        <!-- wp:media-text {"mediaLink":"<?php echo esc_url(get_template_directory_uri() . '/assets/images/image1.jpg') ?>","mediaType":"image","imageFill":false} -->
        <div class="wp-block-media-text is-stacked-on-mobile">
            <figure class="wp-block-media-text__media">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/image1.jpg') ?>" alt="" />
            </figure>
            <div class="wp-block-media-text__content">
                <!-- wp:paragraph {"align":"left","placeholder":"Subtitle (please delete this block if you don't use it)","className":"subtitle","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"small"} -->
                <p class="has-text-align-left subtitle has-small-font-size" style="text-transform:uppercase"><?php esc_html_e('Subtitle', 'lupus') ?></p>
                <!-- /wp:paragraph -->
                
                <!-- wp:heading {"level":3,"placeholder":"Title","style":{"typography":{"textTransform":"uppercase"}}} -->
                <h3 class="wp-block-heading" style="text-transform:uppercase"><?php esc_html_e('Title', 'lupus') ?></h3>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph {"placeholder":"Content…"} -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'lupus') ?></p>
                <!-- /wp:paragraph -->
            </div>
        </div>
        <!-- /wp:media-text -->
        
        <!-- wp:paragraph {"placeholder":"Photocredit","className":"photo-credit","fontSize":"small"} -->
        <p class="photo-credit has-small-font-size"><?php esc_html_e('Photo: Van Klaveren Photography', 'lupus') ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
    <!-- wp:paragraph {"align":"center","placeholder":"Background Text (will be automatically repeated, so no need to repeat nor to add spaces at the end)","className":"background-message-field","style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"900"}},"fontSize":"large"} -->
    <p class="has-text-align-center background-message-field has-large-font-size" style="font-style:normal;font-weight:900;text-transform:uppercase"><?php esc_html_e('Background Text', 'lupus') ?></p>
    <!-- /wp:paragraph -->
</section>
<!-- /wp:group -->