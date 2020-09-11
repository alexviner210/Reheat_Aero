<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// To Get the Meta ID of a paticular Post Meta

function get_mid_by_key( $post_id, $meta_key ) { 
	global $wpdb; 
	$mid = $wpdb->get_var( $wpdb->prepare("SELECT meta_id FROM 
	$wpdb->postmeta WHERE post_id = %d AND meta_key = %s", $post_id, 
	$meta_key) ); 
		if( $mid != '' ) 
		 return (int)$mid; 		
		 return false; 
	} 
	






// Reset the OCDI Transients if more plugins needed

	function cento_delete_odci_transients ($thedemo) {
		
		update_option( '_transient_timeout_ocdi_importer_data', '' );
		update_option( '_transient_ocdi_importer_data', '' );
		update_option( 'cento_demo_chosen', $thedemo );
		update_option( 'cento_demo_in_use', '' );
	}




// Base Plugins Check 

	function cento_check_base_plugin () {
		
				if (
					
					 is_plugin_active ( 'anywhere-elementor/anywhere-elementor.php' )   and
					 is_plugin_active ( 'full-screen-search-overlay/full-screen-search-cento.php' )   and
					 is_plugin_active ( 'mystickymenuORIG/mystickymenu-orig.php' )   and
					 is_plugin_active ( 'one-click-demo-import-cento/one-click-demo-import-cento.php' )   and
					 is_plugin_active ( 'kirki/kirki.php' )   and
					 is_plugin_active ( 'menu-icons/menu-icons.php' )   and
					 is_plugin_active ( 'elementor/elementor.php' )
					 
					 
					 ) {
						 
						 return 1;
						 
						} else {
						 
						 return 2;
					 }
	
	
	}







// For Menu Icons Set up on Import

	function cento_setup_icon() {
	    $option_name = 'cento_icon_setup' ;
	
		if ( get_option( $option_name ) == false ) {
		    global $wpdb;
		    $table = $wpdb->prefix.'options';
			$wpdb->insert($table, array(
			    'option_name' => 'cento_icon_setup',
			    'option_value' => 'a:2:{s:6:"global";a:1:{s:10:"icon_types";a:2:{i:0;s:9:"dashicons";i:1;s:2:"fa";}}s:6:"menu_5";a:6:{s:10:"hide_label";s:0:"";s:8:"position";s:6:"before";s:14:"vertical_align";s:6:"middle";s:9:"font_size";s:3:"1.2";s:9:"svg_width";s:1:"1";s:10:"image_size";s:9:"thumbnail";}}',
			    'autoload' => 'yes', ));
			
			 wp_cache_flush();
		
			$get_icon_setup = get_option( 'cento_icon_setup' ) ;
			
			update_option( 'menu-icons', $get_icon_setup, 'yes' );	
		}
	}
	



// Set Permalink Structrure 

function cento_set_permalink(){
     global $wp_rewrite;
     $wp_rewrite->set_permalink_structure('/%postname%/');
}




