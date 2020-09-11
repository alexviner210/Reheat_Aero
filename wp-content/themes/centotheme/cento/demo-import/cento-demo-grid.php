<?php
/**
   Cento Theme Demos Files
   @package centotheme
 */
 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
 

// ensure is_plugin_active() exists (not on frontend)

if( !function_exists('is_plugin_active') ) {
	
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
}

$editions = is_plugin_active ( 'cento-edition/cento-edition.php' ) ;  

$centopro = is_plugin_active ( 'centotheme-pro/centotheme-pro.php' ) ; 



// Hide Demo 9 Import button in Pro Plugin not instlled
add_action('admin_head', 'cento_pro_import_hide');

function cento_pro_import_hide() {

$centopro = is_plugin_active ( 'centotheme-pro/centotheme-pro.php' ) ; 

if ( !$centopro ) {

  echo '<style>
		[data-name="cento pro"] .js-ocdi-gl-import-data {
		    display: none;
		  </style>';
		}
};



function ocdi_import_files() {
	

$urldemoimage = site_url() . '/wp-content/themes/centotheme/cento/demo-import/import-files/';

$urldemotheme = trailingslashit( get_template_directory() ) . 'cento/demo-import/import-files/';

	
  return array(
	  
	  
	  
    array(
      'import_file_name'             => 'Demo Import 1',
      'categories'                   => array( 'Blank Site', 'Standard' ),
      
      'local_import_file'            => $urldemotheme . 'demo-1/demo-1.xml',
      'local_import_customizer_file' => $urldemotheme . 'demo-1/demo-1.dat',
      
      'import_preview_image_url'     => $urldemoimage . 'demo-1/demo-1.jpg',
      
      'import_notice'                => __( 'Classic Blank Site' , 'centotheme' ),
      'preview_url'                  => 'https://demo-1.centotheme.com',
    ),
    
    
    
    
      array(
      'import_file_name'             => 'Demo Import 2',
      'categories'                   => array( 'Blank Site', 'Left Sidebar' ),
      
      'local_import_file'            => $urldemotheme . 'demo-2/demo-2.xml',
      'local_import_customizer_file' => $urldemotheme . 'demo-2/demo-2.dat',
      
      
      'import_preview_image_url'     => $urldemoimage . 'demo-2/demo-2.jpg',
      
      'import_notice'                => __( '' , 'centotheme' ),
      'preview_url'                  => 'https://demo-2.centotheme.com',
    ),
  
 
    
      array(
      'import_file_name'             => 'Demo Import 3',
      'categories'                   => array( 'Blank Site', 'One Page' ),
      
      'local_import_file'            => $urldemotheme . 'demo-3/demo-3.xml',
      'local_import_customizer_file' => $urldemotheme . 'demo-3/demo-3.dat',
      
      
      'import_preview_image_url'     => $urldemoimage . 'demo-3/demo-3.jpg',
      
      'import_notice'                => __( '' , 'centotheme' ),
      'preview_url'                  => 'https://demo-3.centotheme.com',
    ),
        

    
      array(
      'import_file_name'             => 'Demo Import 4',
      'categories'                   => array( 'Blank Site', 'Full Width' ),
      
      'local_import_file'            => $urldemotheme . 'demo-4/demo-4.xml',
      'local_import_customizer_file' => $urldemotheme . 'demo-4/demo-4.dat',
      
      
      'import_preview_image_url'     => $urldemoimage . 'demo-4/demo-4.jpg',
      
      'import_notice'                => __( '' , 'centotheme' ),
      'preview_url'                  => 'https://demo-4.centotheme.com',
    ),


    
      array(
      'import_file_name'             => 'Demo Import 5',
      'categories'                   => array( 'Full Site', 'Standard' ),
      
      'local_import_file'            => $urldemotheme . 'demo-5/demo-5.xml',
      'local_import_customizer_file' => $urldemotheme . 'demo-5/demo-5.dat',
      
      
      'import_preview_image_url'     => $urldemoimage . 'demo-5/demo-5.jpg',
      
      'import_notice'                => __( '' , 'centotheme' ),
      'preview_url'                  => 'https://demo-5.centotheme.com',
    ),



      array(
      'import_file_name'             => 'Demo Import 6',
      'categories'                   => array( 'Full Site', 'Full Width' ),
      
      'local_import_file'            => $urldemotheme . 'demo-6/demo-6.xml',
      'local_import_customizer_file' => $urldemotheme . 'demo-6/demo-6.dat',
      
      
      'import_preview_image_url'     => $urldemoimage . 'demo-6/demo-6.jpg',
      
      'import_notice'                => __( '' , 'centotheme' ),
      'preview_url'                  => 'https://demo-6.centotheme.com',
    ),



      array(
      'import_file_name'             => 'Demo Import 7',
      'categories'                   => array( 'Full Site', 'One Page' ),
      
      'local_import_file'            => $urldemotheme . 'demo-7/demo-7.xml',
      'local_import_customizer_file' => $urldemotheme . 'demo-7/demo-7.dat',
      
      
      'import_preview_image_url'     => $urldemoimage . 'demo-7/demo-7.jpg',
      
      'import_notice'                => __( '' , 'centotheme' ),
      'preview_url'                  => 'https://demo-7.centotheme.com',
    ),


      array(
      'import_file_name'             => 'Demo Import 8',
      'categories'                   => array( 'Full Site', 'Full Width' ),
      
      'local_import_file'            => $urldemotheme . 'demo-8/demo-8.xml',
      'local_import_customizer_file' => $urldemotheme . 'demo-8/demo-8.dat',
      
      
      'import_preview_image_url'     => $urldemoimage . 'demo-8/demo-8.jpg',
      
      'import_notice'                => __( '' , 'centotheme' ),
      'preview_url'                  => 'https://demo-8.centotheme.com',
    ),
    
    
       array(
      'import_file_name'             => 'Cento Pro',
      'categories'                   => array( 'Full Site', 'Full Width', 'One Page', 'WooCommerce', 'LMS', 'Pro'   ),
      
/*
      'local_import_file'            => $urldemotheme . 'demo-8/demo-8.xml',
      'local_import_customizer_file' => $urldemotheme . 'demo-8/demo-8.dat',
*/
      
      
      'import_preview_image_url'     => $urldemoimage . 'demo-9-pro/Cento-Pro.jpg',
      
      'import_notice'                => __( '' , 'centotheme' ),
      'preview_url'                  => 'http://jakson.co/cento-pro?utm_source=centothemefree&utm_medium=centopage',
    ),


      array(
      'import_file_name'             => 'Demo Import 10',
      'categories'                   => array( 'Full Site', 'One Page' ),
      
      'local_import_file'            => $urldemotheme . 'demo-10/demo-10.xml',
      'local_import_customizer_file' => $urldemotheme . 'demo-10/demo-10.dat',
      
      
      'import_preview_image_url'     => $urldemoimage . 'demo-10/demo-10.jpg',
      
      'import_notice'                => __( '' , 'centotheme' ),
      'preview_url'                  => 'https://demo-10.centotheme.com',
    ),


      array(
      'import_file_name'             => 'Demo Import 11',
      'categories'                   => array( 'Full Site', 'One Page' ),
      
      'local_import_file'            => $urldemotheme . 'demo-11/demo-11.xml',
      'local_import_customizer_file' => $urldemotheme . 'demo-11/demo-11.dat',
      
      
      'import_preview_image_url'     => $urldemoimage . 'demo-11/demo-11.jpg',
      
      'import_notice'                => __( '' , 'centotheme' ),
      'preview_url'                  => 'https://demo-11.centotheme.com',
    ),




    
  );  // End Array
  
  

}






if ( $editions ==1 ) {
	
	add_filter( 'pt-ocdi/import_files', 'ocdi_import_files_cento_edition' );
	
	
} 


elseif ( $centopro ==1 ) {
	
	add_filter( 'pt-ocdi/import_files', 'ocdi_import_files_cento_pro' );
	
	
} 


else {
	

add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
	
	
}