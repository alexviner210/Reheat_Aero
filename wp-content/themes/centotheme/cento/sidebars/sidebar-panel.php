<?php
/**
 * Sidebar setup for Slide Panel.
 *
 * @package centotheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


//Cento Global Part
$thisoption = Kirki::get_option( 'cento_kirki_id' , 'cento_global_slide_panel' );	


if ( ! is_active_sidebar( 'sidebar-panel' ) && empty($thisoption)  ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	



	<!--Cento Global Part -->
	
	
	<?php if (! empty($thisoption) ) { ?>
	<div class="widget col-md-12"> <?php 	echo do_shortcode('[INSERT_ELEMENTOR id="' . $thisoption . '"]'); ?> </div>
	<?php } ?>	
	
	
	
	
	<?php dynamic_sidebar( 'sidebar-panel' ); ?>



	
	
</aside>
