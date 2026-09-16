<?php
/**
 * Title: How it works (3 steps)
 * Slug: northpine/how-it-works
 * Categories: northpine-sections
 * Description: Three numbered steps from first contact to finished roof.
 */
$img = get_theme_file_uri( 'assets/img/' );
$url = function ( $path ) { return esc_url( home_url( $path ) ); };
?>
<!-- wp:group {"align":"full","className":"np-sec-steps","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group alignfull np-sec-steps" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"640px","justifyContent":"left"}} -->
<div class="wp-block-group alignwide"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow">How it works</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">From first call to finished roof in three steps</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"blockGap":{"left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--50)"><?php
$steps = array(
	array( 'Tell us about your roof', 'Answer four quick questions online, or call us. We confirm a time for a free inspection, usually within two days.' ),
	array( 'Get a fixed written price', 'We check the roof, take photos, and send a line-by-line quote. The price you sign is the price you pay.' ),
	array( 'We replace it, then clean up', 'Most roofs take one or two days. We protect your garden, sweep for nails with magnets, and walk the job with you.' ),
);
foreach ( $steps as $i => $step ) :
	?><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"np-step-num"} -->
<p class="np-step-num"><?php echo (int) $i + 1; ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $step[0] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"ink-soft"} -->
<p class="has-ink-soft-color has-text-color"><?php echo esc_html( $step[1] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<?php endforeach; ?></div>
<!-- /wp:columns -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:button {"className":"np-track-cta"} -->
<div class="wp-block-button np-track-cta"><a class="wp-block-button__link wp-element-button" href="<?php echo $url( '/free-quote/' ); ?>">Start step 1: free quote</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
