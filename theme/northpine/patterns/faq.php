<?php
/**
 * Title: FAQ (objections)
 * Slug: northpine/faq
 * Categories: northpine-sections
 * Description: Open/close questions that answer the worries that stop people from asking for a quote.
 */
$img = get_theme_file_uri( 'assets/img/' );
$url = function ( $path ) { return esc_url( home_url( $path ) ); };
?>
<!-- wp:group {"align":"full","anchor":"faq","className":"np-sec-faq","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"760px"}} -->
<div id="faq" class="wp-block-group alignfull np-sec-faq" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow">Questions</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Before you ask for a quote</h2>
<!-- /wp:heading -->

<?php
$faqs = array(
	array( 'Is the quote really free? Will I get pushed to sign?', 'Yes, it\'s free. We send the quote by email and give you time to read it. There is no "sign today" discount.' ),
	array( 'How long does a roof replacement take?', 'Most homes take one or two days. Large or steep roofs can take three. We give you the start date in writing.' ),
	array( 'Do I need to be home?', 'Only for the inspection, which takes about 45 minutes. On install days we just need access to the driveway and an outdoor power socket.' ),
	array( 'Will insurance pay for my roof?', 'If storm damage is the cause, often yes. We document the damage with photos and can meet your adjuster on site. We can\'t promise a claim will be approved.' ),
	array( 'What happens if you find rotten boards?', 'We photograph them and replace them at the per-board price already written in your quote. You never get a surprise bill.' ),
	array( 'What happens to my phone number?', 'Only Northpine uses it, to arrange your quote. We don\'t sell or share your details.' ),
);
foreach ( $faqs as $f ) :
	?><!-- wp:details -->
<details class="wp-block-details"><summary><?php echo esc_html( $f[0] ); ?></summary><!-- wp:paragraph -->
<p><?php echo esc_html( $f[1] ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<?php endforeach; ?><!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<p style="margin-top:var(--wp--preset--spacing--40)">Still unsure? <a href="tel:+15550100142">Call (555) 010-0142</a> and talk to a real person.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
