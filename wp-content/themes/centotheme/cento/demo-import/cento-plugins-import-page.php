<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	

	
// 	Create an Admin Page for the fuunction

add_action( 'admin_menu', 'plugininstall_add_admin_menu' );
add_action( 'admin_init', 'plugininstall_settings_init' );


function plugininstall_add_admin_menu(  ) { 

	add_menu_page( 'Install Plugin', 'Install Plugin', 'manage_options', 'install_plugin', 'plugininstall_options_page' );

}


function plugininstall_settings_init(  ) { 

	register_setting( 'pluginPage', 'plugininstall_settings' );

	add_settings_section(
		'plugininstall_pluginPage_section', 
		__( 'Your section description', 'instalplug' ), 
		'plugininstall_settings_section_callback', 
		'pluginPage'
	);


}


function plugininstall_settings_section_callback(  ) { 

	echo __( 'This section description', 'instalplug' );

}

// - End  - Create an Admin Page for the fuunction






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
  include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
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

function plugininstall_options_page() { 
	
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

	

?>

<div id="cento-plug-install" class="cento-plug-install-page">


		<div class="">
				<div class="">
					
					
						
						<div class="">
							
							
							<div class="">
								
								
								<h2>Hold Tight! Installing Plugins...</h2>
								<br>
								
	
							</div>
							

							<div class="evaluate-plugins">
								
								  <span><?php echo ( eval($str) ); ?> </span>
									        	
							</div>
							
 <?php if( empty($centodemochosen) ) { ?>
	 
	
							
							<div id ="choosetemplate" class="cento-plugin-install-button"><a class="cento-options-button" href="#" onclick="self.parent.tb_remove(); self.parent.location = '/wp-admin/themes.php?page=pt-one-click-demo-import'">All Done! Now Choose a Demo Template <span class="dashicons dashicons-arrow-right-alt"></span> </a></div>
							
 <?php } else { ?>


							<div id ="choosetemplate" class="cento-plugin-install-button"><a class="cento-options-button" href="#" onclick="self.parent.tb_remove(); self.parent">Great! - Lets run that import again!</a></div>


 <?php } ?>							
							
						</div>
					
					
				</div>
				

				
		</div>
</div>
<div></div>


<?php
}


?>
