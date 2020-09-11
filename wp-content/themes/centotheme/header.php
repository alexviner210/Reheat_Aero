<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package centotheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'centotheme_container_type' );

$hidetopglobal = rwmb_meta( 'hideglobal-hide_checkbox_1' ) ;

$hidebelowheadglobal = rwmb_meta( 'hideglobal-hide_checkbox_2' ) ;


?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="site" id="page">

<!-- Cento Top Row Global Section  #centocode-->	
	<?php if ( $hidetopglobal != 1 ) {
	
		get_template_part( 'cento/sidebars/sidebar-toprow');	
		
	} ?>	


<!-- Cento Header Global Section  -->
	<?php 
	
		get_template_part( 'cento/sidebars/sidebar-navbar');	
		
	?>	

	
<!-- Cento Below Header  Section  -->

	<?php if ( $hidebelowheadglobal != 1 ) {
	
		get_template_part( 'cento/sidebars/sidebar-below-header');	
		
	} ?>	