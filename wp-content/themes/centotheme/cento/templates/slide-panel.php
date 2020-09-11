<?php
/**
 * Sidebar setup for Slide Panel.
 *
 * @package centotheme
 */
 ?>

	<div id="this" class="cento-sidebar sidebar-closed">
		
		<div class="cento-sidebar-container">
				
			<div class="sidebar-scroll">
				
					<?php get_template_part( 'cento/sidebars/sidebar-panel'); ?>	
					

					<?php
					$savedoptions = get_option ( 'globalparts_settings') ;
			        $thisoption = $savedoptions['globalparts_text_field_8'];	
			        $thisoption = preg_replace('/[^0-9]/', '', $thisoption);		
				
					if (! empty($thisoption) ) {
						
					echo do_shortcode('[INSERT_ELEMENTOR id=' . $thisoption . ']'); 
					
					}
				
				 ?>	
					
					
					
				
			</div><!-- .sidebar-scroll -->
		
		</div><!-- .cento-sidebar-container -->
		
	</div><!-- .cento-sidebar -->
	
	
	<div class="sidebar-overlay"></div>
