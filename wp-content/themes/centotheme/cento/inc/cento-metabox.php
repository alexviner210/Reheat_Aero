<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	

	
 if ( ! function_exists( 'rwmb_meta' ) ) {
    function rwmb_meta( $key, $args = '', $post_id = null ) {
        return false;
    }
}
	



function cento_contect_behind_nav( $meta_boxes ) {
	$prefix = 'centov2-';

	$meta_boxes[] = array(
		'id' => 'centocontentnav',
		'title' => esc_html__( 'Content Behind Nav Bar', 'centotheme' ),
		'post_types' => array( 'post', 'page', 'pproperty', 'forum', 'topic' ),
		'context' => 'side',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix . 'content_behind_on',
				'name' => esc_html__( 'On / Off', 'centotheme' ),
				'type' => 'checkbox',
			),
			array(
				'id' => $prefix . 'nav_text_color',
				'name' => esc_html__( 'Nav Text/Icons Color', 'centotheme' ),
				'type' => 'color',
				'std' => '#ffffff',
			),
			array(
				'id' => $prefix . 'nav_text_high_color',
				'name' => esc_html__( 'Active Menu Colour', 'centotheme' ),
				'type' => 'color',
				'std' => '#ffffff',
			),

			array(
				'id' => $prefix . 'text_logo',
				'name' => esc_html__( 'Text Logo Colour', 'centotheme' ),
				'type' => 'color',
				'std' => '#ffffff',
			),
			
			
			
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'cento_contect_behind_nav' );




function cento_hide_global_parts( $meta_boxes ) {
	$prefix = 'hideglobal-';

	$meta_boxes[] = array(
		'id' => 'centohidesections',
		'title' => esc_html__( 'Hide Global Parts', 'centotheme' ),
		'post_types' => array('post', 'page', 'pproperty', 'forum', 'topic', 'llms_membership', 'course', 'lesson' ),   
		'context' => 'side',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'hide_checkbox_1',
				'name' => esc_html__( '', 'centotheme' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Top Row', 'centotheme' ),
			),
			array(
				'id' => $prefix . 'hide_checkbox_6',
				'name' => esc_html__( '', 'centotheme' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Header', 'centotheme' ),
			),		
			array(
				'id' => $prefix . 'hide_checkbox_2',
				'name' => esc_html__( '', 'centotheme' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Below Header / Nav', 'centotheme' ),
			),
			array(
				'id' => $prefix . 'hide_checkbox_7',
				'name' => esc_html__( '', 'centotheme' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Below Main Content', 'centotheme' ),
			),
			array(
				'id' => $prefix . 'hide_checkbox_3',
				'name' => esc_html__( '', 'centotheme' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Above Footer', 'centotheme' ),
			),		
		
			array(
				'id' => $prefix . 'hide_checkbox_4',
				'name' => esc_html__( '', 'centotheme' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Footer', 'centotheme' ),
			),
			array(
				'id' => $prefix . 'hide_checkbox_5',
				'name' => esc_html__( '', 'centotheme' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Copyright', 'centotheme' ),
			),
				
		
		
		
		),
	
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'cento_hide_global_parts' );






function cento_page_css( $meta_boxes2 ) {
	$prefix2 = 'centov2-';

	$meta_boxes2[] = array(
		'id' => 'centopagcss',
		'title' => esc_html__( 'Page CSS', 'centotheme' ),
		'post_types' => array('post', 'page', 'pproperty', 'forum', 'topic' ),
		'context' => 'side',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix2 . 'css_textarea_1',
				'type' => 'textarea',
				'name' => esc_html__( 'CSS', 'centotheme' ),
				'desc' => esc_html__( 'Add some CSS here to add to this Page', 'centotheme' ),
				'rows' => 6,
			),
		),
	);

	return $meta_boxes2;
}
add_filter( 'rwmb_meta_boxes', 'cento_page_css' );