<?php
/**
 * Title: Price guide
 * Slug: northpine/price-guide
 * Categories: northpine-sections
 * Description: Honest price ranges by home size, what changes the price, and a link to get an exact number.
 */
$img = get_theme_file_uri( 'assets/img/' );
$url = function ( $path ) { return esc_url( home_url( $path ) ); };
?>
<!-- wp:group {"align":"full","anchor":"pricing","className":"np-sec-price","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div id="pricing" class="wp-block-group alignfull np-sec-price" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow">Price guide</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">What does a new roof cost?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"ink-soft"} -->
<p class="has-ink-soft-color has-text-color">Most people want a number before they talk to anyone. Here are the ranges we see for asphalt shingle roofs. Your written quote gives the exact price.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">What moves the price</h3>
<!-- /wp:heading -->

<!-- wp:list {"className":"is-style-checklist","fontSize":"small"} -->
<ul class="wp-block-list is-style-checklist has-small-font-size"><!-- wp:list-item -->
<li>Roof size and how steep it is</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Layers of old roofing to remove</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Rotten boards that need replacing</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Shingle line and colour you choose</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:group {"className":"is-style-card","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-card"><!-- wp:table {"hasFixedLayout":false,"className":"np-price-table"} -->
<figure class="wp-block-table np-price-table"><table><thead><tr><th>Home size</th><th>Typical roof area</th><th>Price range</th></tr></thead><tbody><tr><td>Small (1–2 bed)</td><td>1,000–1,400 sq ft</td><td>$8,500–$12,000</td></tr><tr><td>Medium (3 bed)</td><td>1,500–2,200 sq ft</td><td>$11,500–$17,500</td></tr><tr><td>Large (4+ bed)</td><td>2,300–3,200 sq ft</td><td>$16,000–$26,000</td></tr></tbody></table><figcaption class="wp-element-caption">Sample prices for this demo. Includes tear-off, underlayment, shingles, flashing, ventilation, permit and cleanup.</figcaption></figure>
<!-- /wp:table -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Financing:</strong> spread the cost from about $129 a month (sample, on approved credit).</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"np-track-cta"} -->
<div class="wp-block-button np-track-cta"><a class="wp-block-button__link wp-element-button" href="<?php echo $url( '/free-quote/' ); ?>">Get my exact price</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
