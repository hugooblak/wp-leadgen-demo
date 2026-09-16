<?php
/**
 * Title: Not found
 * Slug: northpine/not-found
 * Categories: northpine-sections
 * Description: 404 message with the two most useful next steps.
 */
$img = get_theme_file_uri( 'assets/img/' );
$url = function ( $path ) { return esc_url( home_url( $path ) ); };
?>
<!-- wp:heading {"level":1,"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-xx-large-font-size">We couldn't find that page</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The link may be old. If you came here for a quote, you're one click away.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"np-track-cta"} -->
<div class="wp-block-button np-track-cta"><a class="wp-block-button__link wp-element-button" href="<?php echo $url( '/free-quote/' ); ?>">Get a free quote</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo $url( '/' ); ?>">Go to the home page</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
