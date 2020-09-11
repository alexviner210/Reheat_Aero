<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package centotheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//Cento Global Part #centocode
if( class_exists( 'Kirki' ) ) {
 $thisoption = Kirki::get_option( 'cento_kirki_id' , 'cento_global_right_sidebar' );	
}


if ( ! is_active_sidebar( 'right-sidebar' ) && empty($thisoption) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'centotheme_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-3 widget-area" id="right-sidebar" role="complementary">
<?php else : ?>
	<div class="col-md-4 widget-area" id="right-sidebar" role="complementary">
<?php endif; ?>

	<div class="cento-right-sidebar">

		<!--Cento Global Part -->
		<?php if (! empty($thisoption) ) { echo do_shortcode('[INSERT_ELEMENTOR id="' . $thisoption . '"]');  } ?>			
			
		<?php dynamic_sidebar( 'right-sidebar' ); ?>

	</div>

</div><!-- #right-sidebar -->
