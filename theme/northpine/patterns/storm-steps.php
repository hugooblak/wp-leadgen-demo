<?php
/**
 * Title: Storm: what to do after a storm
 * Slug: northpine/storm-steps
 * Categories: northpine-sections
 * Description: Four numbered steps for homeowners after hail or wind damage.
 */
$img = get_theme_file_uri( 'assets/img/' );
$url = function ( $path ) { return esc_url( home_url( $path ) ); };
?>
<!-- wp:group {"align":"full","className":"np-sec-steps","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group alignfull np-sec-steps" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:heading {"align":"wide"} -->
<h2 class="wp-block-heading alignwide">What to do after a storm</h2>
<!-- /wp:heading -->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","minimumColumnWidth":"14rem"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--50)"><?php
$steps = array(
	array( 'Stay safe, take photos', 'Don\'t climb on the roof. Photograph damage you can see from the ground, and any leaks inside.' ),
	array( 'Book a free inspection', 'We check the roof, gutters and vents and send you a photo report, usually within 48 hours.' ),
	array( 'Talk to your insurer', 'Send them our report. If you like, we meet the adjuster on site so nothing is missed.' ),
	array( 'We repair or replace', 'Once you approve, we schedule the work. You pay your deductible, never more than your quote.' ),
);
foreach ( $steps as $i => $step ) :
	?><!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"np-step-num"} -->
<p class="np-step-num"><?php echo (int) $i + 1; ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $step[0] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"ink-soft"} -->
<p class="has-ink-soft-color has-text-color"><?php echo esc_html( $step[1] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<?php endforeach; ?></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
