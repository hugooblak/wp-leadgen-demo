<?php
/**
 * Title: Inline call to action
 * Slug: northpine/cta-inline
 * Categories: northpine-sections
 * Description: Small box at the end of guides, linking to the quote form.
 */
$img = get_theme_file_uri( 'assets/img/' );
$url = function ( $path ) { return esc_url( home_url( $path ) ); };
?>
<!-- wp:group {"className":"is-style-card np-sec-inline","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"backgroundColor":"pine-light","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-card np-sec-inline has-pine-light-background-color has-background" style="margin-top:var(--wp--preset--spacing--60)"><!-- wp:heading {"level":2,"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">Not sure what your roof needs?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Get a free inspection and a fixed written quote within 48 hours.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"np-track-cta"} -->
<div class="wp-block-button np-track-cta"><a class="wp-block-button__link wp-element-button" href="<?php echo $url( '/free-quote/' ); ?>">Get my free quote</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
