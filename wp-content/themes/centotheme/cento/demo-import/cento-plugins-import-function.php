<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	
	


// Demo Plugin Functions


require get_template_directory() . '/cento/demo-import/plugin_install_functions/cento_plugins_demo_0.php';
require get_template_directory() . '/cento/demo-import/plugin_install_functions/cento_plugins_demo_5.php';
require get_template_directory() . '/cento/demo-import/plugin_install_functions/cento_plugins_demo_6.php';
require get_template_directory() . '/cento/demo-import/plugin_install_functions/cento_plugins_demo_7.php';
require get_template_directory() . '/cento/demo-import/plugin_install_functions/cento_plugins_demo_8.php';
require get_template_directory() . '/cento/demo-import/plugin_install_functions/cento_plugins_demo_10.php';
require get_template_directory() . '/cento/demo-import/plugin_install_functions/cento_plugins_demo_11.php';
require get_template_directory() . '/cento/demo-import/plugin_install_functions/cento_plugins_demo_ex.php';




function install_plugin( $plugin_zip ) {
  include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';x
  wp_cache_flush();
  
  $upgrader = new Plugin_Upgrader();
  $installed = $upgrader->install( $plugin_zip );

  return $installed;
}

function upgrade_plugin( $plugin_slug ) {
  include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
  wp_cache_flush();
  
  $upgrader = new Plugin_Upgrader();
  $upgraded = $upgrader->upgrade( $plugin_slug );

  return $upgraded;
  
}



// - End - The Pluign Install Functions





// Render the Page and call the Install plugin Function 

function plugininstall_run_functione() { 
	
$centodemochosen = get_option ( 'cento_demo_chosen') ;	
$explugs = get_option ( 'cento-explugs-checkbox') ;
$centodemo = get_option ( 'cento_demo_in_use') ;
$baseplugincheck = cento_check_base_plugin ();

	if ( $baseplugincheck ==1	 
		 ) {		 
			 $baseok = 1 ;		 
			} else {		 
			 $baseok = 0 ;		 
	   }
	
	
	
	
	
	if( $explugs ==1) {
	
		$str = 'replace_plugin_ex();';
		
		} elseif ( empty($centodemo) && empty($centodemochosen) || $baseok == 0) {
		
		$str = 'replace_plugin_0();';	
			
		} elseif ($centodemochosen < 5  )   {
		
		$str = 'replace_plugin_0();';
		
		} else {
			
		$str = 'replace_plugin_' . $centodemochosen . '();';			
		
	}


    return eval($str); 
}

