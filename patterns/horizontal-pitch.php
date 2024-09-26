<?php
/**
 * Title: Horizontal Scroll Section with Pitch
 * Slug: lupus/horizontal-pitch
 * Categories: lupus/horizontal-sections, lupus/image-sections, lupus/standard-colors-sections
 * Description: Section that scrolls horizontally with a pitch in the background
 */
?>
<!-- wp:group {"tagName":"section","className":"horizontal","layout":{"type":"constrained"}} -->
<section class="wp-block-group horizontal">
    <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
    <div class="wp-block-group">
        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group">
            <!-- wp:media-text {"mediaLink":"<?php echo esc_url(get_template_directory_uri() . '/assets/images/image1.jpg') ?>","mediaType":"image","imageFill":false} -->
            <div class="wp-block-media-text is-stacked-on-mobile">
                <figure class="wp-block-media-text__media">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/image1.jpg') ?>" alt=""/>
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
         
        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group">
            <!-- wp:media-text {"mediaLink":"<?php echo esc_url(get_template_directory_uri() . '/assets/images/image1.jpg') ?>","mediaType":"image","imageFill":false} -->
            <div class="wp-block-media-text is-stacked-on-mobile">
                <figure class="wp-block-media-text__media">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/image1.jpg') ?>" alt=""/>
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
         
    </div>
    <!-- /wp:group -->
     
    <!-- wp:html -->
    <div class="pitch">
        <div class="hoops">
            <div class="hoop hoop-medium"></div>
            <div class="hoop hoop-large"></div>
            <div class="hoop hoop-small"></div>
        </div>
        <div class="hoops">
            <div class="hoop hoop-small"></div>
            <div class="hoop hoop-large"></div>
            <div class="hoop hoop-medium"></div>
        </div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="grass">
            <?php
                for ($x = 1; $x <= 65; $x++) {
                    echo '<div class="grass-row"></div>';
                }
            ?>
        </div>
    </div>
    <!-- /wp:html -->
</section>
<!-- /wp:group -->