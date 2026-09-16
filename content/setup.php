<?php
/**
 * Demo site setup for Northpine.
 *
 * Creates the pages from the theme's patterns, imports the old site's articles through
 * migrate.php, builds the menu, sets the front page, and adds three sample leads so the
 * Leads inbox isn't empty. Safe to run again: it skips anything that already exists.
 *
 * Playground runs this automatically (see blueprint.json).
 * Local run:  wp eval-file content/setup.php
 *
 * @package Northpine
 */

defined( 'ABSPATH' ) || exit;

wp_set_current_user( 1 ); // Admin, so block markup is saved exactly as written.

/**
 * Pattern markup with nested pattern references expanded, so saved pages hold plain editable blocks.
 */
function nps_pattern( $slug ) {
	$pattern = WP_Block_Patterns_Registry::get_instance()->get_registered( $slug );
	if ( ! $pattern ) {
		nps_log( "Missing pattern: $slug" );
		return '';
	}
	return preg_replace_callback(
		'#<!-- wp:pattern \{"slug":"([^"]+)"\} /-->#',
		function ( $m ) {
			return nps_pattern( $m[1] );
		},
		$pattern['content']
	);
}

function nps_log( $msg ) {
	if ( defined( 'WP_CLI' ) && WP_CLI ) {
		WP_CLI::log( $msg );
	}
}

function nps_page( $slug, $title, $content, $excerpt, $template = '' ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		return $existing->ID;
	}
	$id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_name'    => $slug,
			'post_title'   => $title,
			'post_content' => $content,
			'post_excerpt' => $excerpt,
			'meta_input'   => $template ? array( '_wp_page_template' => $template ) : array(),
		)
	);
	nps_log( "Page: $title" );
	return $id;
}

/* --------------------------------------------------------------------------
 * Site settings
 * ----------------------------------------------------------------------- */
update_option( 'blogname', 'Northpine Roofing' );
update_option( 'blogdescription', 'Roof replacement and storm damage repair in Millbrook and nearby towns. Fixed written quotes within 48 hours.' );
update_option( 'timezone_string', 'America/Los_Angeles' );
update_option( 'date_format', 'F j, Y' );
update_option( 'posts_per_page', 9 );

// Remove WordPress's sample content.
foreach ( array( 'hello-world' => 'post', 'sample-page' => 'page' ) as $slug => $type ) {
	$sample = get_page_by_path( $slug, OBJECT, $type );
	if ( $sample ) {
		wp_delete_post( $sample->ID, true );
	}
}
$privacy_draft = get_page_by_path( 'privacy-policy' );
if ( $privacy_draft && 'draft' === $privacy_draft->post_status ) {
	wp_delete_post( $privacy_draft->ID, true );
}

/* --------------------------------------------------------------------------
 * Pages
 * ----------------------------------------------------------------------- */
$home = nps_page(
	'home',
	'Roof replacement in Millbrook',
	nps_pattern( 'northpine/page-home' ),
	'Roof replacement and storm damage repair in Millbrook and nearby towns. Fixed written quotes within 48 hours and a 25-year workmanship warranty.',
	'page-landing'
);

nps_page(
	'roof-replacement',
	'Roof replacement',
	nps_pattern( 'northpine/page-replacement' ),
	'Full roof replacement with one fixed price in writing, done in 1 to 2 days, with a 25-year workmanship warranty.',
	'page-landing'
);

nps_page(
	'storm-damage',
	'Storm and hail damage',
	nps_pattern( 'northpine/page-storm' ),
	'Free storm and hail damage inspection with a photo report for your insurer. We can meet your adjuster on site.',
	'page-landing'
);

$quote = nps_page(
	'free-quote',
	'Free quote',
	nps_pattern( 'northpine/quote-funnel' ),
	'Get a free, fixed written roof quote within 48 hours. Four quick questions.',
	'page-focus'
);

$thanks = nps_page(
	'thank-you',
	'Thank you',
	nps_pattern( 'northpine/thank-you' ),
	'Your quote request has been received.',
	'page-focus'
);

$about_content = <<<'HTML'
<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">Northpine is a family roofing company from Millbrook. We started in 2004 with one truck and a rule we still follow: the price we write down is the price you pay.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Today we're a team of 18, and every roof is installed by our own crews, not subcontractors. Our owner walks every finished job with the homeowner.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">What you can count on</h2>
<!-- /wp:heading -->

<!-- wp:list {"className":"is-style-checklist"} -->
<ul class="wp-block-list is-style-checklist"><!-- wp:list-item -->
<li>Licensed, bonded and insured (licence #RC-000000, sample)</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Fixed written quotes, with no deposit until materials arrive</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>25-year workmanship warranty</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>A local office at 120 Example Street, open Monday to Saturday</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
HTML;
nps_page( 'about', 'About Northpine', $about_content . "\n\n" . nps_pattern( 'northpine/cta-inline' ), 'Family roofing company in Millbrook since 2004. Our own crews, fixed written prices, 25-year workmanship warranty.' );

// FAQ page: the same objection-handling questions, grouped by topic.
$faq_groups = array(
	'Quotes and prices' => array(
		array( 'Is the quote really free?', 'Yes. The inspection and the written quote cost nothing, and there is no pressure to sign.' ),
		array( 'Why do you ask for a deposit only when materials arrive?', 'So you never pay for work that hasn\'t started. Materials are ordered for your roof, so that is when we ask for the first payment.' ),
		array( 'Do you offer financing?', 'Yes, plans from 12 to 120 months on approved credit. Checking your rate does not affect your credit score.' ),
	),
	'The job'           => array(
		array( 'How long does a roof replacement take?', 'Most homes take one or two days. Large or steep roofs can take three.' ),
		array( 'What if it rains?', 'We check the forecast daily and never leave a roof open overnight. If rain comes in, the roof is covered with waterproof underlayment.' ),
		array( 'Will you clean up?', 'Yes. We protect plants with tarps, remove all old roofing, and sweep the whole property with magnets for nails.' ),
	),
	'Insurance and warranty' => array(
		array( 'Will insurance pay for my roof?', 'If storm damage is the cause, often yes. We document the damage and can meet your adjuster. We can\'t promise approval.' ),
		array( 'What does the workmanship warranty cover?', 'Leaks or failures caused by how we installed the roof, for 25 years. The shingle maker\'s warranty covers the materials.' ),
	),
);
$faq_content = "<!-- wp:paragraph {\"fontSize\":\"large\"} -->\n<p class=\"has-large-font-size\">Straight answers to what homeowners ask us most. Can't find yours? Call <a href=\"tel:+15550100142\">(555) 010-0142</a>.</p>\n<!-- /wp:paragraph -->";
foreach ( $faq_groups as $group => $faqs ) {
	$faq_content .= "\n\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">" . esc_html( $group ) . "</h2>\n<!-- /wp:heading -->";
	foreach ( $faqs as $f ) {
		$faq_content .= "\n\n<!-- wp:details -->\n<details class=\"wp-block-details\"><summary>" . esc_html( $f[0] ) . "</summary><!-- wp:paragraph -->\n<p>" . esc_html( $f[1] ) . "</p>\n<!-- /wp:paragraph --></details>\n<!-- /wp:details -->";
	}
}
nps_page( 'faq', 'Frequently asked questions', $faq_content . "\n\n" . nps_pattern( 'northpine/cta-inline' ), 'Answers about roof quotes, prices, financing, how long a replacement takes, insurance and warranty.' );

$privacy_content = <<<'HTML'
<!-- wp:paragraph {"backgroundColor":"sand"} -->
<p class="has-sand-background-color has-background"><strong>Sample policy for a demo site.</strong> A real policy must be written for the business and checked by a lawyer.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">What we collect</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>When you ask for a quote we collect your ZIP code, what you need, your timeline, first name, phone number and email. We also record which page or ad brought you to the site, so we know which advertising works.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">How we use it</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Only to arrange your inspection and send your quote. We keep a record of the consent you gave when you sent the form. We never sell or share your details.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Your choices</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Reply STOP to any text, or email us to have your details deleted.</p>
<!-- /wp:paragraph -->
HTML;
$privacy = nps_page( 'privacy-policy', 'Privacy policy', $privacy_content, 'How Northpine Roofing uses the details you send with the quote form.' );
update_option( 'wp_page_for_privacy_policy', $privacy );

$guides = nps_page( 'roofing-guides', 'Roofing guides', '', 'Plain answers to the questions homeowners ask about roofs.' );

update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $home );
update_option( 'page_for_posts', $guides );
update_option( 'npl_quote_page', $quote );
update_option( 'npl_thank_you_page', $thanks );

/* --------------------------------------------------------------------------
 * Old site articles → posts (see migrate.php)
 * ----------------------------------------------------------------------- */
require __DIR__ . '/migrate.php';
$legacy_dir = __DIR__ . '/legacy-export';
if ( is_dir( $legacy_dir ) ) {
	npm_import_all( $legacy_dir, __DIR__ );
	nps_log( 'Imported legacy articles.' );
}

/* --------------------------------------------------------------------------
 * Main menu (Appearance → Editor → Navigation)
 * ----------------------------------------------------------------------- */
// Looked up by title: WordPress sometimes auto-creates a fallback "Navigation" menu first.
if ( ! get_posts( array( 'post_type' => 'wp_navigation', 'title' => 'Main menu', 'numberposts' => 1, 'post_status' => 'publish' ) ) ) {
	$links = array(
		array( 'Roof replacement', '/roof-replacement/', 'page' ),
		array( 'Storm damage', '/storm-damage/', 'page' ),
		array( 'Pricing', '/#pricing', 'custom' ),
		array( 'Guides', '/roofing-guides/', 'page' ),
		array( 'FAQ', '/faq/', 'page' ),
	);
	$nav = '';
	foreach ( $links as $l ) {
		$attrs = array(
			'label' => $l[0],
			'url'   => home_url( $l[1] ),
			'kind'  => 'page' === $l[2] ? 'post-type' : 'custom',
		);
		if ( 'page' === $l[2] ) {
			$page         = get_page_by_path( trim( $l[1], '/' ) );
			$attrs['id']  = $page ? $page->ID : 0;
			$attrs['type'] = 'page';
		}
		$nav .= '<!-- wp:navigation-link ' . wp_json_encode( $attrs, JSON_UNESCAPED_SLASHES ) . ' /-->';
	}
	wp_insert_post(
		array(
			'post_type'    => 'wp_navigation',
			'post_status'  => 'publish',
			'post_title'   => 'Main menu',
			'post_content' => $nav,
		)
	);
	nps_log( 'Menu created.' );
}

/* --------------------------------------------------------------------------
 * Three sample leads, so the inbox shows what real ones look like.
 * ----------------------------------------------------------------------- */
if ( post_type_exists( 'npl_lead' ) && ! get_posts( array( 'post_type' => 'npl_lead', 'numberposts' => 1 ) ) ) {
	$samples = array(
		array( 'Sample lead A', '(555) 010-0171', 'sample-a@example.com', '97001', 'storm', 'asap', 'contacted', array( 'utm_source' => 'google', 'utm_medium' => 'cpc', 'utm_campaign' => 'hail-spring', 'gclid' => 'EXAMPLE-GCLID' ), '-2 days' ),
		array( 'Sample lead B', '(555) 010-0183', 'sample-b@example.com', '97012', 'replacement', '1-3', 'new', array( 'utm_source' => 'facebook', 'utm_medium' => 'paid_social', 'utm_campaign' => 'financing' ), '-5 hours' ),
		array( 'Sample lead C', '(555) 010-0195', 'sample-c@example.com', '97003', 'inspection', 'research', 'new', array( 'referrer' => 'https://www.google.com/' ), '-40 minutes' ),
	);
	foreach ( $samples as $s ) {
		wp_insert_post(
			array(
				'post_type'   => 'npl_lead',
				'post_status' => 'publish',
				'post_title'  => $s[0] . ' · ' . npl_label( 'service', $s[4] ),
				'post_date'   => wp_date( 'Y-m-d H:i:s', strtotime( $s[8] ) ),
				'meta_input'  => array_merge(
					array(
						'name'         => $s[0],
						'phone'        => $s[1],
						'email'        => $s[2],
						'zip'          => $s[3],
						'service'      => $s[4],
						'timeline'     => $s[5],
						'status'       => $s[6],
						'landing_page' => home_url( '/' ),
						'consent_at'   => wp_date( 'Y-m-d H:i:s', strtotime( $s[8] ) ),
						'consent_text' => npl_consent_text(),
					),
					$s[7]
				),
			)
		);
	}
	nps_log( 'Sample leads added.' );
}

// Pretty links (/free-quote/ instead of ?page_id=5). Flushed last, after every page exists.
update_option( 'permalink_structure', '/%postname%/' );
flush_rewrite_rules( false );

nps_log( 'Northpine demo ready.' );
