<?php
/**
 * Sidebar setup for Navbar.
 *
 * @package centotheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container   = get_theme_mod( 'centotheme_container_type' );

if( class_exists( 'Kirki' ) ) {
 $thisoption = Kirki::get_option( 'cento_kirki_id' , 'cento_global_header' );
}

 $hidenavglobal = rwmb_meta( 'hideglobal-hide_checkbox_6' ) ;

?>

<?php

if ( ! empty($hidenavglobal) ) {
	return;
}

?>



<?php if ( is_active_sidebar( 'sidebar-navbar' ) || ! empty($thisoption) ) : ?>

	<!-- ******************* The Top Row Widget Area ******************* -->

	<div class="wrapper" id="wrapper-navbar">

		<div class="<?php echo esc_attr( $container ); ?> navbar-content" id="navbar-content" tabindex="-1">

			<div class="row">

					<?php if (! empty($thisoption) ) { ?>
					<div class="widget col-md-12"> <?php 	echo do_shortcode('[INSERT_ELEMENTOR id="' . $thisoption . '"]'); ?> </div>
					<?php } ?>	
					

					<?php dynamic_sidebar( 'sidebar-navbar' ); ?>
				

			</div>

		</div>

	</div><!-- #wrapper-navbar -->

<?php endif; ?>
