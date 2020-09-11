<?php
/**
    Cento Teme Register widgetized area and update sidebar with default widgets.
    @package centotheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	
 
	

function centotheme_cento_widgets_init() {
	

	register_sidebar( array(
		'name' => __( 'Top Row', 'centotheme' ),
		'id' => 'sidebar-toprow',
		'description' => __( 'Appears at very Top of Page', 'centotheme' ),
		'before_widget' => '<div  class="widget col-md-12 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


	register_sidebar( array(
		'name' => __( 'Header', 'centotheme' ),
		'id' => 'sidebar-navbar',
		'description' => __( 'Appears in the Header Section', 'centotheme' ),
		'before_widget' => '<div  class="widget col-md-12 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );



	register_sidebar( array(
		'name' => __( 'Below Header', 'centotheme' ),
		'id' => 'sidebar-below-header',
		'description' => __( 'Appears Below the Header / Nav Bar', 'centotheme' ),
		'before_widget' => '<div  class="widget col-md-12 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	



/*
	register_sidebar( array(
		'name' => __( 'Above Main Content', 'centotheme' ),
		'description' => __( 'Appears above the Main content area', 'centotheme' ),
		'id' => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

*/

	register_sidebar( array(
		'name' => __( 'Below Main Content', 'centotheme' ),
		'description' => __( 'Appears below the Main Content Area', 'centotheme' ),
		'id' => 'sidebar-below-content',
		'before_widget' => '<div  class="widget col-md-12 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );



	register_sidebar( array(
		'name' => __( 'Above Footer', 'centotheme' ),
		'id' => 'sidebar-abovefooter',
		'description' => __( 'Appears above the Footer', 'centotheme' ),
		'before_widget' => '<div  class="widget col-md-12 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );




	register_sidebar( array(
		'name' => __( 'Footer', 'centotheme' ),
		'id' => 'sidebar-footer',
		'description' => __( 'Appears in the Footer', 'centotheme' ),
		'before_widget' => '<div  class="widget col-md-12 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	

	register_sidebar( array(
		'name' => __( 'Copyright', 'centotheme' ),
		'id' => 'sidebar-copyright',
		'description' => __( 'Appears in the Copyright', 'centotheme' ),
		'before_widget' => '<div id="%1$s" class="widget col-md-12 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


	register_sidebar( array(
		'name' => __( 'Slide Panel Mobile Menu', 'centotheme' ),
		'id' => 'sidebar-panel',
		'description' => __( 'Appears in the Slide Panel', 'centotheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );




if (class_exists('bbPress')) {

		register_sidebar(
			array(
				'name'          => __( 'bbPress Right Sidebar', 'centotheme' ),
				'id'            => 'sidebar-bbpress',
				'description'   => __( 'bbPress Right sidebar widget area', 'centotheme' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);


}


}
add_action( 'widgets_init', 'centotheme_cento_widgets_init' );


	
