/**
 * Editor side of the Quote form block. No build step: plain JavaScript using WordPress's globals.
 * The preview is rendered by the same PHP as the live site, so what you see is what visitors get.
 */
( function ( wp ) {
	var el = wp.element.createElement;
	var __ = wp.i18n.__;
	var InspectorControls = wp.blockEditor.InspectorControls;
	var useBlockProps = wp.blockEditor.useBlockProps;
	var PanelBody = wp.components.PanelBody;
	var SelectControl = wp.components.SelectControl;
	var TextControl = wp.components.TextControl;
	var Disabled = wp.components.Disabled;
	var ServerSideRender = wp.serverSideRender;

	wp.blocks.registerBlockType( 'northpine/lead-form', {
		edit: function ( props ) {
			var a = props.attributes;
			return el(
				'div',
				useBlockProps(),
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: __( 'Form settings', 'northpine-leads' ) },
						el( SelectControl, {
							label: __( 'Form type', 'northpine-leads' ),
							value: a.variant,
							options: [
								{ label: __( 'Start (ZIP code only, for heroes and page ends)', 'northpine-leads' ), value: 'start' },
								{ label: __( 'Full (all 4 steps, for the quote page)', 'northpine-leads' ), value: 'full' },
							],
							onChange: function ( v ) { props.setAttributes( { variant: v } ); },
						} ),
						a.variant === 'start' && el( TextControl, {
							label: __( 'Button text', 'northpine-leads' ),
							help: __( 'Leave empty for "Start my free quote".', 'northpine-leads' ),
							value: a.buttonText,
							onChange: function ( v ) { props.setAttributes( { buttonText: v } ); },
						} ),
						el( 'p', { style: { color: '#555' } }, __( 'Questions and answer choices are set in the Northpine Leads plugin (includes/fields.php). Leads appear under Leads in the admin menu.', 'northpine-leads' ) )
					)
				),
				el( Disabled, null, el( ServerSideRender, { block: 'northpine/lead-form', attributes: a } ) )
			);
		},
		save: function () { return null; },
	} );
} )( window.wp );
