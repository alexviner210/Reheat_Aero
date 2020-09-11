<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	



// Base Plugins

function replace_plugin_0() {
	
	


	
  // Cento Version of Full Screen Overlay
  $fulscreen = get_template_directory() . '/cento/demo-import/plugins/full-screen-search-overlay.zip';  

  // Cento Version of MyStick Menu - version 2.1.x dos not work with Cento theme
  $mystick = get_template_directory() . '/cento/demo-import/plugins/mystickymenuORIG.zip';  
  
  // Cento Version of One Click Install - just puts back 'import button' on 'seelcted' import.
  $oneclick = get_template_directory() . '/cento/demo-import/plugins/one-click-demo-import.2.5.1-cento.zip';  
  

  
  
  $plugins = array(
   
      array(
	  // modify these variables with your new/old plugin values
	  'plugin_slug' => 'anywhere-elementor/anywhere-elementor.php',
	  'plugin_zip' => 'https://downloads.wordpress.org/plugin/anywhere-elementor.latest-stable.zip',
	  'old_plugin_slug' => 'some-plugin/some-plugin.php',
	  'plugin_name' => 'Anywhere Elementor',
	  ),


	  array(
	  // modify these variables with your new/old plugin values
	  'plugin_slug' => 'elementor/elementor.php',
	  'plugin_zip' => 'https://downloads.wordpress.org/plugin/elementor.latest-stable.zip',
	  'old_plugin_slug' => 'some-plugin/some-plugin.php',
	  'plugin_name' => 'Elementor',
	  ),  
	  
	  
	  array(
	  // modify these variables with your new/old plugin values
	  'plugin_slug' => 'full-screen-search-overlay/full-screen-search-cento.php',
	  'plugin_zip' => $fulscreen,
	  'old_plugin_slug' => 'some-plugin/some-plugin.php',
	  'plugin_name' => 'Full Screen Search',
	  ),
		  

	  array(
	  // modify these variables with your new/old plugin values
	  'plugin_slug' => 'kirki/kirki.php',
	  'plugin_zip' => 'https://downloads.wordpress.org/plugin/kirki.latest-stable.zip',
	  'old_plugin_slug' => 'some-plugin/some-plugin.php',
	  'plugin_name' => 'Kirki - Customizer',	  
	  ),

	  
	  	  
	   array(
	  // modify these variables with your new/old plugin values
	  'plugin_slug' => 'menu-icons/menu-icons.php',
	  'plugin_zip' => 'https://downloads.wordpress.org/plugin/menu-icons.latest-stable.zip',
	  'old_plugin_slug' => 'some-plugin/some-plugin.php',
	  'plugin_name' => 'Menu Icons',	  
	  ),
	  
  
/*
	   array(
	  // modify these variables with your new/old plugin values
	  plugin_slug => 'meta-box/meta-box.php',
	  plugin_zip => 'https://downloads.wordpress.org/plugin/meta-box.latest-stable.zip',
	  old_plugin_slug => 'some-plugin/some-plugin.php',
	  plugin_name => 'Meta Box',	  
	  ),
*/

	   array(
	  // modify these variables with your new/old plugin values
	  'plugin_slug' => 'mystickymenuORIG/mystickymenu-orig.php',
	  'plugin_zip' => $mystick,
	  'old_plugin_slug' => 'some-plugin/some-plugin.php',
	  'plugin_name' => 'My Sticky Menu',	  
	  ),
	  
	  
  	   array(
	  // modify these variables with your new/old plugin values
	  'plugin_slug' => 'one-click-demo-import-cento/one-click-demo-import-cento.php',
	  'plugin_zip' => $oneclick,
	  'old_plugin_slug' => 'some-plugin/some-plugin.php',
	  'plugin_name' => 'One Click Demo Import [Cento]',	  
	  )
	  
	  
  );
            
    
	
  
  foreach($plugins as $plugin){
      
    $plugin_slug = $plugin['plugin_slug'];
    $plugin_zip =  $plugin['plugin_zip'];
    $old_plugin_slug = $plugin['old_plugin_slug'];
    $plugin_name = $plugin['plugin_name'];
      
	
	     
//           echo '<div class="cento-plugin-checking">...Checking ' . $plugin_name . '</div>';
		  
		  if ( is_plugin_installed_0( $plugin_slug ) ) {
// 		    echo 'it\'s installed! Making sure it\'s the latest version.' ;
		    upgrade_plugin( $plugin_slug );
		    $installed = true;
		    
		  } else {
			  
// 		    echo 'it\'s not installed. Installing.';
		    $installed = install_plugin( $plugin_zip );
		  }
		  
		  if ( !is_wp_error( $installed ) && $installed ) {
			  
// 		    echo 'Activating new plugin.';
		    
		    $activate = activate_plugin( $plugin_slug );
		    
		    if ( is_null($activate) ) {
			    
// 		      echo '<br>Deactivating old plugin.<br>';
		      
		      deactivate_plugins( array( $old_plugin_slug ) );
		      
              echo '<h3 class="cento-plugin-success">' . $plugin_name . ' Installed<i class="dashicons dashicons-yes"></i></h3>';	 
              
		      
		    }
		  } else {
			  
              echo '<h3 class="cento-plugin-fail"> Could Not Install ' . $plugin_name . '<i class="dashicons dashicons-warning"></i></h3>';
		    
		  } 
		}	
		
		}
		function is_plugin_installed_0( $slug ) {
		  if ( ! function_exists( 'get_plugins' ) ) {
		    require_once ABSPATH . 'wp-admin/includes/plugin.php';
		  }
		  $all_plugins = get_plugins();
		  
		  if ( !empty( $all_plugins[$slug] ) ) {
		    return true;
		  } else {
		    return false;
	
 	  }
 	  
 	  
  }
// - End - Demo 1 Plugins