<?php
/**
 * Title: Trust strip
 * Slug: northpine/trust-strip
 * Categories: northpine-sections
 * Description: Four short proof points with icons, placed right under the hero.
 */
$img = get_theme_file_uri( 'assets/img/' );
$url = function ( $path ) { return esc_url( home_url( $path ) ); };
?>
<!-- wp:group {"align":"full","className":"np-sec-trust np-trust","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"border":{"bottom":{"color":"var:preset|color|line","width":"1px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group alignfull np-sec-trust np-trust" style="border-bottom-color:var(--wp--preset--color--line);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"14rem"}} -->
<div class="wp-block-group alignwide"><?php
$items = array(
	array( 'icon-shield', 'Licensed, bonded and insured' ),
	array( 'icon-clipboard', 'Fixed price, in writing' ),
	array( 'icon-clock', 'Quote within 48 hours' ),
	array( 'icon-storm', 'Insurance claim help' ),
);
foreach ( $items as $item ) :
	?><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"40px","height":"40px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $img . $item[0] . '.svg' ); ?>" alt="" style="width:40px;height:40px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $item[1] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<?php endforeach; ?></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
