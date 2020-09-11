<?php
/**
 * Sidebar setup for Top Row.
 *
 * @package centotheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container   = get_theme_mod( 'centotheme_container_type' );

if( class_exists( 'Kirki' ) ) {
 $thisoption = Kirki::get_option( 'cento_kirki_id' , 'cento_global_above_footer' );
}
?>




<?php if ( is_active_sidebar( 'sidebar-abovefooter' ) || ! empty($thisoption) ) : ?>

	<!-- ******************* Above Footer Widget Area ******************* -->

	<div class="wrapper" id="wrapper-abovefooter">

   <div class="<?php echo esc_attr( $container ); ?> abovefooter-content" id="abovefooter-content" tabindex="-1">


			<div class="row">

				<?php if (! empty($thisoption) ) { ?>
				<div class="widget col-md-12"> <?php 	echo do_shortcode('[INSERT_ELEMENTOR id="' . $thisoption . '"]'); ?> </div>
				<?php } ?>	

				<?php dynamic_sidebar( 'sidebar-abovefooter' ); ?>

			</div>

		</div>

	</div><!-- #wrapper-abovefooter -->

<?php endif; ?>
