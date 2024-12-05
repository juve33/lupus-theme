<?php
/**
 * Title: Standard Section
 * Slug: lupus/standard-empty
 * Categories: lupus/standard-sections, lupus/empty-sections, lupus/standard-colors-sections
 * Description: Standard section with text
 */
?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"}} -->
<section class="wp-block-group">
    <!-- wp:paragraph {"align":"left","placeholder":"Subtitle (please delete this block if you don't use it)","className":"subtitle","fontSize":"small"} -->
    <p class="has-text-align-left subtitle has-small-font-size"><?php esc_html_e('Subtitle', 'lupus') ?></p>
    <!-- /wp:paragraph -->
    
    <!-- wp:heading {"level":3,"placeholder":"Title"} -->
    <h3 class="wp-block-heading"><?php esc_html_e('Title', 'lupus') ?></h3>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"placeholder":"Content…"} -->
    <p><?php esc_html_e('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'lupus') ?></p>
    <!-- /wp:paragraph -->
</section>
<!-- /wp:group -->