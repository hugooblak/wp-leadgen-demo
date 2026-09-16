<?php
/**
 * Title: Quote funnel
 * Slug: northpine/quote-funnel
 * Categories: northpine-pages
 * Description: The full multi-step quote form with a short 'what happens next' panel beside it.
 */
$img = get_theme_file_uri( 'assets/img/' );
$url = function ( $path ) { return esc_url( home_url( $path ) ); };
?>
<!-- wp:group {"align":"full","className":"np-sec-funnel","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group alignfull np-sec-funnel" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"62%"} -->
<div class="wp-block-column" style="flex-basis:62%"><!-- wp:group {"className":"is-style-card np-lift","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-card np-lift" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"level":1,"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-xx-large-font-size">Get your free roof quote</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"ink-soft"} -->
<p class="has-ink-soft-color has-text-color">4 quick questions, about 30 seconds. A written quote within 48 hours.</p>
<!-- /wp:paragraph -->

<!-- wp:northpine/lead-form {"variant":"full"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"38%"} -->
<div class="wp-block-column" style="flex-basis:38%"><!-- wp:heading {"level":2,"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size">What happens next</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"fontSize":"small"} -->
<ol class="wp-block-list has-small-font-size"><!-- wp:list-item -->
<li>We call or text within 1 business hour to book your inspection.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>A 45-minute inspection. You get photos of everything we find.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Your fixed written quote arrives by email within 48 hours.</li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->

<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:list {"className":"is-style-checklist","fontSize":"small"} -->
<ul class="wp-block-list is-style-checklist has-small-font-size"><!-- wp:list-item -->
<li>No obligation, no pressure to sign</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>25-year workmanship warranty</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Your details are never sold or shared</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:group {"className":"is-style-card","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-card"><!-- wp:paragraph {"className":"np-stars","fontSize":"small"} -->
<p class="np-stars has-small-font-size"><span class="screen-reader-text">Rated </span>5 out of 5</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">"The quote matched the final bill to the dollar."</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"ink-soft","fontSize":"small"} -->
<p class="has-ink-soft-color has-text-color has-small-font-size">Sample review · Ashford</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
