<?php
/**
 * Cento Theme  v2.1.54 (https://jakson.co)
 * Copyright 2018 https://jakson.co)
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html	

 Cento theme functions and definitions
 * @package centotheme
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}



//  Elementor Settings for Demo Import & Font Awesome 4x
add_action( 'after_switch_theme', function( $stylesheet, $old_theme_obj = null )  { 

    add_post_meta( 999999, '_elementor_edit_mode', '0', true );    
    update_option( 'elementor_load_fa4_shim', 'yes', 'yes' ) ;


    
}, 10, 2 );


	




// Check if Blog Pages

function is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}




//  Update the OCDI Success Notice
 
add_filter( 'gettext', 'cento_translate_ocdi_strings', 999, 3 );
 
function cento_translate_ocdi_strings( $translated, $text, $domain ) {
	
		$url = admin_url( '/options-permalink.php' ) ;
		$newtext= 'The demo import has finished. Please check your site and make sure that everything has imported correctly. If it did, you can deactivate the %3$sOne Click Demo Import%4$s plugin, because it has done its job.
		
		<br><br>
		Please now <b>Save your Permalinks settings</b>  - use the link below to do that now (click the "Save Changes" button on that page). 
		
		<br>
		<a class="cento-options-button" href="' . $url . '">Save Permalinks <span class="dashicons dashicons-arrow-right-alt"></a> <br>';
 


// STRING 1
$translated = str_ireplace( 'The demo import has finished. Please check your page and make sure that everything has imported correctly. If it did, you can deactivate the %3$sOne Click Demo Import%4$s plugin, because it has done its job', $newtext, $translated );


/* 
// STRING 2
$translated = str_ireplace( 'Original Text', 'New Text', $translated );
*/

// ETC.
 
return $translated;
}



// Theme support for LifterLMS course and lesson sidebars

function cento_llms_theme_support(){
	add_theme_support( 'lifterlms-sidebars' );
}
add_action( 'after_setup_theme', 'cento_llms_theme_support' );
 
 

 
// Add Admin Notice to Widgets Page
global $pagenow;
if ( $pagenow == 'widgets.php' ) :

    function cento_widget_admin_notice() {
	    
	    $gloablcustomizer = admin_url() . "/customize.php?autofocus[section]=cento_global_parts";
           
         echo '<div class="notice notice-info is-dismissible"><p>You can add Widgets to the Sidebars (the "Global Sections" of the website) here, but with Cento Theme, the content for this can be created with Elementor Templates and assigned to "Global Sections" in the Customizer <a href="' . $gloablcustomizer . '">Here</a>  <br>Check out the full <a href="https://centotheme.com/tutorials?utm_source=centotheme&utm_medium=customizer#core-section-1" class="external-link" target="_blank">Global Sections Tutorial Here<span class="screen-reader-text"> (opens in a new window)</span></a> </p></div>';
           
    }
    add_action( 'admin_notices', 'cento_widget_admin_notice' );

endif;
  
 
 
//  Remove The AE Plugin's CPT
function remove_post_type(){
    unregister_post_type( 'ae_global_templates' );
}
add_action('init','remove_post_type');
 

 
 
//  Remove some Menu Options
//  function plt_hide_elementor_menus() {
// 
// 	remove_submenu_page('elementor', 'go_elementor_pro');
// 	remove_submenu_page('elementor', 'elementor_custom_fonts');	
// 	remove_submenu_page('edit.php?post_type=elementor_library', 'popup_templates');
// 	remove_submenu_page('edit.php?post_type=elementor_library', 'theme_templates');
// 
// }
// 
// add_action('admin_menu', 'plt_hide_elementor_menus', 503);
 
 
 
 
//  Remove some Customiser Options
add_action( "customize_register", "cento_customize_register" );
function cento_customize_register( $wp_customize ) {

$wp_customize->remove_control("header_image");
// $wp_customize->remove_panel("widgets");

$wp_customize->remove_section("colors");
$wp_customize->remove_section("background_image");
// $wp_customize->remove_section("static_front_page");

}



  
//  Kirki Customizer contorls
if( class_exists( 'Kirki' ) ) {
require get_template_directory() . '/cento/inc/cento-kirki.php';
}


//  bbPress is instlaled

if (class_exists('bbPress')) {
require get_template_directory() . '/cento/inc/cento-bbpress.php';
}

 
 
//  Elementor Select Widget
require get_template_directory() . '/cento/inc/cento-elementor-select-widget.php';



// Side Menu
require get_template_directory() . '/cento/cssmenu/css-menu.php';



// Remove "Background" Appearance Menu
add_action('admin_menu', 'remove_unnecessary_wordpress_menus', 999);

function remove_unnecessary_wordpress_menus(){
    global $submenu;
    unset($submenu['themes.php'][20]);
}




//  Show Elementor Shortcode Link on Template List
add_filter('manage_edit-elementor_library_columns', 'posts_columns_id', 5);

add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);

	function posts_columns_id($defaults){
	$defaults['wps_post_id'] = __('Code for Widgets');
	return $defaults;
	}
	function posts_custom_id_columns($column_name, $id){
	if($column_name === 'wps_post_id'){
	echo ('[INSERT_ELEMENTOR id="' .$id . '"]' );
	}
}




//  Remove AE Templates Menu
function custom_menu_page_removing() {
    remove_menu_page( 'edit.php?post_type=ae_global_templates' );
}
add_action( 'admin_menu', 'custom_menu_page_removing' );

function trim_excerpt($text)
{
return str_replace(' [...]', '' . '...', $text);
}
add_filter('get_the_excerpt', 'trim_excerpt');



// Show Admin List Thumbnail 
add_image_size( 'crunchify-admin-post-featured-image', 120, 120, false );
 
// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_posts_columns', 'crunchify_add_post_admin_thumbnail_column', 2);
add_filter('manage_pages_columns', 'crunchify_add_post_admin_thumbnail_column', 2);
 
// Add the column
function crunchify_add_post_admin_thumbnail_column($crunchify_columns){
	$crunchify_columns['crunchify_thumb'] = __('Featured Image');
	return $crunchify_columns;
}
 
// Let's manage Post and Page Admin Panel Columns
add_action('manage_posts_custom_column', 'crunchify_show_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'crunchify_show_post_thumbnail_column', 5, 2);
 
// Here we are grabbing featured-thumbnail size post thumbnail and displaying it
function crunchify_show_post_thumbnail_column($crunchify_columns, $crunchify_id){
	switch($crunchify_columns){
		case 'crunchify_thumb':
		if( function_exists('the_post_thumbnail') )
			echo the_post_thumbnail( 'crunchify-admin-post-featured-image' );
		else
			echo 'hmm... your theme doesn\'t support featured image...';
		break;
	}
}



//  Sticky menu Offset - the scroll top figure needs to be a Customizer Variable
add_action( 'wp_footer', function() {
	if ( ! defined( 'ELEMENTOR_VERSION' ) ) {
		return;
	}
	?>
	<script>
		jQuery( function( $ ) {
			// Add space for Elementor Menu Anchor link
			$( window ).on( 'elementor/frontend/init', function() {
				elementorFrontend.hooks.addFilter( 'frontend/handlers/menu_anchor/scroll_top_distance', function( scrollTop ) {
					return scrollTop - 74;
				} );
			} );
		} );
	</script>
	<?php
} );




//  Content Behinf Transparest Nav
require get_template_directory() . '/cento/inc/cento-trans-nav.php';
 


// Cento Activate
require get_template_directory() . '/cento/inc/cento-activate.php';
 

// Add Cento Customizer 
 require get_template_directory() . '/cento/inc/cento-customizer.php';
 

// Meta Boxes
require get_template_directory() . '/cento/meta-box/meta-box.php';
require get_template_directory() . '/cento/inc/cento-metabox.php';
 


/*
function x_your_prefix_get_meta_box( $meta_boxes ) {
	$prefix = 'prefix-';

	$meta_boxes[] = array(
		'id' => 'mboxinnit',
		'title' => esc_html__( 'Me Box', 'x-metabox-online-generator' ),
		'post_types' => array('pproperty' ),
		'context' => 'after_title',
		'priority' => 'high',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'text_1',
				'type' => 'text',
				'name' => esc_html__( 'This', 'x-metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'image_advanced_2',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Image Advanced', 'x-metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'post_3',
				'type' => 'post',
				'name' => esc_html__( 'Template', 'x-metabox-online-generator' ),
				'post_type' => 'Elementor_library',
				'field_type' => 'select_advanced',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'x_your_prefix_get_meta_box' );
*/





 
// Admin Bar Menu Link
 require get_template_directory() . '/cento/inc/cento-admin-bar-menu.php';
 

// Dashboard Widget
 require get_template_directory() . '/cento/inc/cento-dasboard-widget.php';



// Logo Widget
 require get_template_directory() . '/cento/inc/cento-widgit-logo.php';

 
 
// Meta Widget
 require get_template_directory() . '/cento/inc/cento-widgit-meta.php';
 
 
// Post Title Widget
 require get_template_directory() . '/cento/inc/cento-widgit-post-title.php';
 
 
// Post Pagination Widget
 require get_template_directory() . '/cento/inc/cento-widgit-post-pagination.php';
 
 
// Post Comments Widget
 require get_template_directory() . '/cento/inc/cento-widgit-comments.php';
 
 
 
// Nav Bar Widget
 require get_template_directory() . '/cento/inc/cento-widgit-navbar.php';
 
 
 
// Primary Menu Widget
 require get_template_directory() . '/cento/inc/cento-widgit-menu-primary.php';
 
 
 
// Slide Icon Button Widget
 require get_template_directory() . '/cento/inc/cento-widgit-slide-icon.php';
 


// Load Editor CSS
add_editor_style( '/cento/css/editor.css' );



// Admin CSS & JS
function load_custom_wp_admin_style() {

wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/cento/css/admin.css', false, '1.0.0' );
wp_enqueue_style( 'custom_wp_admin_css' );
        


wp_register_script('cento-admin-jquery', get_stylesheet_directory_uri() . '/cento/js/admin.js', array('jquery'),'1.1', true);
wp_enqueue_script('cento-admin-jquery');

   
        
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

 

// Load Theme CSS & JS
function centotheme_cento_scripts() {

$the_theme = wp_get_theme();

wp_register_script('cento-jquery', get_stylesheet_directory_uri() . '/cento/js/cento.js', array('jquery'),'1.1', true);
wp_enqueue_script('cento-jquery');





wp_register_script('cento-scroll-to', get_stylesheet_directory_uri() . '/cento/js/scroll-top.js', array('jquery'),'1.1', true);
wp_enqueue_script('cento-scroll-to');


wp_enqueue_style( 'centotheme-cento-styles', get_stylesheet_directory_uri() . '/cento/css/cento.css', array(), $the_theme->get( 'Version' ), false );
wp_enqueue_script('centotheme-cento-styles');







}
add_action( 'wp_enqueue_scripts', 'centotheme_cento_scripts' );




// Remove some of the Sidebars
function remove_some_widgets(){

	// Unregister some of the centotheme sidebars
	unregister_sidebar( 'hero' );
	unregister_sidebar( 'statichero' );
    unregister_sidebar( 'footerfull' );

}
add_action( 'widgets_init', 'remove_some_widgets', 11 );




// Cento Admin Page
require get_template_directory() . '/cento/inc/cento-theme-start.php';



// Load the Demos
require get_template_directory() . '/cento/demo-import/cento-imports-page.php';

	

// Demo Auto Import
require get_template_directory() . '/cento/demo-import/cento-plugins-import-page.php';


	

// For ODCI Transient Delete 
require get_template_directory() . '/cento/demo-import/cento-import-functions.php';




// Remove One Click Branding Message
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

 


// Add Larger Thumbnmails
add_image_size('600-Square', 600, 600, true );
add_image_size('350-Square', 350, 350, true );
add_image_size('16-9', 768, 432, true );



// Disable  Dashboard Widget
function disable_elementor_dashboard_overview_widget() {
	remove_meta_box( 'e-dashboard-overview', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'disable_elementor_dashboard_overview_widget', 40);


function disable_menu_icons_widget() {
	remove_meta_box( 'themeisle', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'disable_menu_icons_widget', 40);



// Register Cento Sideabers
 require get_template_directory() . '/cento/inc/cento-sidebars.php';
 
