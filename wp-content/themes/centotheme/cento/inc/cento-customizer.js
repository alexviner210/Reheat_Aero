/**
 * File cento-customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

  wp.customize( 'nav_color', function( value ) {
		value.bind( function( newval ) {
			var colly = newval ;
			$( '#wrapper-navbar nav.bg-primary' ).css( 'background-color', colly );
		} );
	} );
	
	
  wp.customize( 'navtext_color', function( value ) {
		value.bind( function( newval ) {
			$( '.navbar-dark .navbar-nav .nav-link' ).css( 'color', newval );
		} );
	} );
	
	
	
} )( jQuery );