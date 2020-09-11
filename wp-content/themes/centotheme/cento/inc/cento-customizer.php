<?php
/**
 * centotheme Theme Customizer
 *
 * @package centotheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	

 
 
if ( ! function_exists( 'centotheme_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function centotheme_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'centotheme_customize_register' );

if ( ! function_exists( 'centotheme_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function centotheme_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'centotheme_theme_layout_options', array(
			'title'       => __( 'Nav Bar', 'centotheme' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Cento Theme Settings', 'centotheme' ),
			'priority'    => 160,
		) );

		 //select sanitization function
        function centotheme_theme_slug_sanitize_select( $input, $setting ){
         
            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
            $input = sanitize_key($input);
 
            //get the list of possible select options 
            $choices = $setting->manager->get_control( $setting->id )->choices;
                             
            //return input if valid or return default option
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
             
        }



	
					
			
	}
} // endif function_exists( 'centotheme_theme_customize_register' ).



add_action( 'customize_register', 'centotheme_theme_customize_register' );








add_action( 'wp_head', 'cd_customizer_css');
function cd_customizer_css()
{
	
$navcol = get_theme_mod('nav_color', '#dddddd' ) ;
// $navcol = $navcol . '!important' ;
	
	
    ?>
    <?php
}




add_action( 'customize_preview_init', 'cd_customizer' );
function cd_customizer() {
	wp_enqueue_script(
		  'cd_customizer',
		  get_template_directory_uri() . '/cento/inc/cento-customizer.js', 
		  array( 'jquery','customize-preview' ),
		  '',
		  true
	);
}