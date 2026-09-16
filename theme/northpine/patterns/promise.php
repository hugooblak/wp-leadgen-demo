<?php
/**
 * Title: Promise and financing
 * Slug: northpine/promise
 * Categories: northpine-sections
 * Description: Dark section with the written guarantee and the financing offer, to remove the two biggest worries.
 */
$img = get_theme_file_uri( 'assets/img/' );
$url = function ( $path ) { return esc_url( home_url( $path ) ); };
?>
<!-- wp:group {"align":"full","className":"np-sec-promise is-style-section-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group alignfull np-sec-promise is-style-section-dark" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow">Our promise</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">If the price changes, that's on us.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Your signed quote is final. If we find rotten boards, we show you photos and the per-board price that's already in your quote. No surprise extras.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-checklist"} -->
<ul class="wp-block-list is-style-checklist"><!-- wp:list-item -->
<li>No deposit until materials arrive</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>25-year workmanship warranty, in writing</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Owner walks the finished job with you</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow">Financing</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Replace it now, pay over time.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Plans from 12 to 120 months. Checking your rate does not affect your credit score. Ask for options when we send your quote.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><span class="np-sample">Sample terms for this demo, on approved credit.</span></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"np-track-cta"} -->
<div class="wp-block-button np-track-cta"><a class="wp-block-button__link wp-element-button" href="<?php echo $url( '/free-quote/' ); ?>">Get a quote with financing</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
