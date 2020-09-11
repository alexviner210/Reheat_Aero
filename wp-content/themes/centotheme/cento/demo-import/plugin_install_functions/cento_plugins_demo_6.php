<?php
	
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	



// Demo 6 Plugins

function replace_plugin_6() {
	


    
  $plugins = array(
    
  array(
	  'plugin_slug' => 'visual-portfolio/class-visual-portfolio.php',
	  'plugin_zip' => 'https://downloads.wordpress.org/plugin/visual-portfolio.latest-stable.zip',	  
	  'old_plugin_slug' => 'some-plugin/some-plugin.php',
	  'plugin_name' => 'Visual Portfolio',
	  ),
	  
	  array(
	  'plugin_slug' => 'contact-form-7/wp-contact-form-7.php',
	  'plugin_zip' => 'https://downloads.wordpress.org/plugin/contact-form-7.latest-stable.zip',
	  'old_plugin_slug' => 'some-plugin/some-plugin.php',
	  'plugin_name' => 'Contact Form 7',

	  )
	  

	  
  
  );
            
    
	
  
  foreach($plugins as $plugin){
      
    $plugin_slug = $plugin['plugin_slug'];
    $plugin_zip =  $plugin['plugin_zip'];
    $old_plugin_slug = $plugin['old_plugin_slug'];
    $plugin_name = $plugin['plugin_name'];
      
	
	     
//           echo '<div class="cento-plugin-checking">...Checking ' . $plugin_name . '</div>';
		  
		  if ( is_plugin_installed_6( $plugin_slug ) ) {
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
              
              $check = 1;
		      
		    }
		  } else {
			  
              echo '<h3 class="cento-plugin-fail">' . $plugin_name . ' Installed<i class="dashicons dashicons-warning"></i></h3>';
		    
		  } 
		}	
		
		}
		function is_plugin_installed_6( $slug ) {
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

// - End - Demo 6 Plugins