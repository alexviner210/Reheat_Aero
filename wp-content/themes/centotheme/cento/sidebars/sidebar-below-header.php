<?php
/**
 * Sidebar setup for Below the Header / Nav.
 *
 * @package centotheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container   = get_theme_mod( 'centotheme_container_type' );
if( class_exists( 'Kirki' ) ) {
 $thisoption = Kirki::get_option( 'cento_kirki_id' , 'cento_global_below_nav' );
}
?>


<?php if ( is_active_sidebar( 'sidebar-below-header' ) || ! empty($thisoption)) : ?>

	<!-- ******************* The Below Header Widget Area ******************* -->

	<div class="wrapper" id="wrapper-below-header">

		<div class="<?php echo esc_attr( $container ); ?> below-header-content" id="below-header-content" tabindex="-1">

			<div class="row">
							
				
					<?php if (! empty($thisoption) ) { ?>
					<div class="widget col-md-12"> <?php 	echo do_shortcode('[INSERT_ELEMENTOR id="' . $thisoption . '"]'); ?> </div>
					<?php } ?>				
				
								
					<?php dynamic_sidebar( 'sidebar-below-header' ); ?>

			</div>

		</div>

	</div><!-- #wrapper-below-header -->

<?php endif; ?>
