<?php
/**
 * Sidebar setup for Below Content
 *
 * @package centotheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$container   = get_theme_mod( 'centotheme_container_type' );

if( class_exists( 'Kirki' ) ) {
 $thisoption = Kirki::get_option( 'cento_kirki_id' , 'cento_global_below_content' );
}

?>





<?php if ( is_active_sidebar( 'sidebar-below-content' ) || ! empty($thisoption)  ) : ?>

	<!-- ******************* The Top Row Widget Area ******************* -->

	<div class="wrapper" id="wrapper-below-content">

		<div class="<?php echo esc_attr( $container ); ?> below-content-content" id="below-content-content" tabindex="-1">

			<div class="row">
				
					<?php if (! empty($thisoption) ) { ?>
					<div class="widget col-md-12"> <?php 	echo do_shortcode('[INSERT_ELEMENTOR id="' . $thisoption . '"]'); ?> </div>
					<?php } ?>
						
					<?php dynamic_sidebar( 'sidebar-below-content' ); ?>
					
			</div>

		</div>

	</div><!-- #wrapper-toprow -->

<?php endif; ?>
