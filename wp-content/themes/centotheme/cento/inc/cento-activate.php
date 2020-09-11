<?php
/**
   Cento Theme on Activation
   @package centotheme
 */
 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	





// Redirct to Cento Theme Page on ativation
global $pagenow;

if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
	
	
    // 	Got to Start
    
	wp_redirect(admin_url("themes.php?page=cento-theme")); 
	
}
