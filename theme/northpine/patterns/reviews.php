<?php
/**
 * Title: Reviews
 * Slug: northpine/reviews
 * Categories: northpine-sections
 * Description: Three customer reviews. Labelled as sample content in this demo.
 */
$img = get_theme_file_uri( 'assets/img/' );
$url = function ( $path ) { return esc_url( home_url( $path ) ); };
?>
<!-- wp:group {"align":"full","className":"np-sec-reviews is-style-section-sand","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group alignfull np-sec-reviews is-style-section-sand" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"640px","justifyContent":"left"}} -->
<div class="wp-block-group alignwide"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow">Reviews</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">What homeowners say</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"ink-soft","fontSize":"small"} -->
<p class="has-ink-soft-color has-text-color has-small-font-size">Placeholder reviews for this demo. On a live site these come from real, verifiable reviews (for example a Google reviews feed).</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--50)"><?php
$reviews = array(
	array( 'The quote matched the final bill to the dollar. They were done in a day and a half, and I found zero nails in the yard.', 'Sample reviewer', 'Roof replacement, Ashford' ),
	array( 'After the hail storm they sent photos of every damaged area. That report is what got our claim approved.', 'Sample reviewer', 'Storm damage, Millbrook' ),
	array( 'Three companies came out. Northpine was the only one that didn\'t push us to sign on the spot.', 'Sample reviewer', 'Roof replacement, Linden Hills' ),
);
foreach ( $reviews as $r ) :
	?><!-- wp:group {"className":"is-style-card","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group is-style-card"><!-- wp:paragraph {"className":"np-stars","fontSize":"small"} -->
<p class="np-stars has-small-font-size"><span class="screen-reader-text">Rated </span>5 out of 5</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $r[0] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"ink-soft","fontSize":"small"} -->
<p class="has-ink-soft-color has-text-color has-small-font-size"><strong><?php echo esc_html( $r[1] ); ?></strong> · <?php echo esc_html( $r[2] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<?php endforeach; ?></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
