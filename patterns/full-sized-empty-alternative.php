<?php
/**
 * Title: Full-sized Section (alternative Colors)
 * Slug: lupus/full-sized-empty-alternative
 * Categories: lupus/full-sized-sections, lupus/empty-sections, lupus/alternative-colors-sections
 * Description: Section that covers the whole screen with text in alternative colors
 */
?>
<!-- wp:group {"tagName":"section","className":"full-sized full-width secondary-color-scheme","layout":{"type":"constrained"}} -->
<section class="wp-block-group full-sized full-width secondary-color-scheme">
    <!-- wp:paragraph {"align":"left","placeholder":"Subtitle (please delete this block if you don't use it)","className":"subtitle","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"small"} -->
    <p class="has-text-align-left subtitle has-small-font-size" style="text-transform:uppercase"><?php esc_html_e('Subtitle', 'lupus') ?></p>
    <!-- /wp:paragraph -->
    
    <!-- wp:heading {"level":3,"placeholder":"Title","style":{"typography":{"textTransform":"uppercase"}}} -->
    <h3 class="wp-block-heading" style="text-transform:uppercase"><?php esc_html_e('Title', 'lupus') ?></h3>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"placeholder":"Content…"} -->
    <p><?php esc_html_e('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'lupus') ?></p>
    <!-- /wp:paragraph -->
</section>
<!-- /wp:group -->
 <!-- wp:html -->
<div class="scroll-bar"></div>
<!-- /wp:html -->