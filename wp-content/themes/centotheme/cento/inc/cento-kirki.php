<?php
/**
 * Kirki Advanced Customizer
 */

/**
 * Create our panels and sections.
 */
 
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	

 
function kirki_demo_panels_sections( $wp_customize ) {
	
	
// initial Setup
Kirki::add_config( 'cento_kirki_id', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

	

	
	/**
	 * Add panels
	 */


	$wp_customize->add_section( 'cento_navbar', array(
		'title'       => __( 'Nav Bar', 'centotheme' ),
		'priority'    => 99,
// 		'panel'       => 'default_controls',
		'description' => __( '<p>Style the Nav Bar and Menu <br> <a href="https://centotheme.com/tutorials?utm_source=centotheme&utm_medium=customizer#core-section-2" class="external-link" target="_blank">Tutorial Here<span class="screen-reader-text"> (opens in a new window)</span></a></p>', 'centotheme' ),
		'help' => '123',
	) );


	$wp_customize->add_section( 'cento_panel', array(
		'title'       => __( 'Mobile Slide Panel', 'centotheme' ),
		'priority'    => 99,
		'description' => __( '<p>Mobile Slide Panel <a href="https://centotheme.com/tutorials?utm_source=centotheme&utm_medium=customizer#core-section-2" class="external-link" target="_blank">Tutorial Here<span class="screen-reader-text"> (opens in a new window)</span></a></p>', 'centotheme' ),
	) );




	$wp_customize->add_section( 'cento_left_menu', array(
		'title'       => __( 'Left Sidebar', 'centotheme' ),
		'priority'    => 99,
		'description' => __( '<p>Cento Left Sidebar <a href="https://centotheme.com/tutorials?utm_source=centotheme&utm_medium=customizer#core-section-3" class="external-link" target="_blank">Tutorial Here<span class="screen-reader-text"> (opens in a new window)</span></a></p>', 'centotheme' ),

	) );


	$wp_customize->add_section( 'cento_global_parts', array(
		'title'       => __( 'Global  Sections', 'centotheme' ),
		'priority'    => 99,
// 		'panel'       => 'default_controls',
		'description' => __( '<p>Assign Elementor Templates to the <b>Global Sections</b> of the Site (Widget Areas) like the Footer, Copyright or Slide Panel etc.<br><br>These will appear on all pages and can be turned off at Page/Post level <a href="https://centotheme.com/tutorials?utm_source=centotheme&utm_medium=customizer#core-section-1" class="external-link" target="_blank">Tutorial Here<span class="screen-reader-text"> (opens in a new window)</span></a></p>', 'centotheme' ),
	) );


	$wp_customize->add_section( 'cento_typography', array(
		'title'       => __( 'Typography', 'centotheme' ),
		'priority'    => 99,
		'description' => __( '<p>Adjust "Theme" Typography  - The Headings & Text on Pages created with Elementor will not be affected <a href="https://centotheme.com/tutorials?utm_source=centotheme&utm_medium=customizer#core-section-3" class="external-link" target="_blank">Tutorial Here<span class="screen-reader-text"> (opens in a new window)</span></a></p>', 'centotheme' ),
	) );



}
add_action( 'customize_register', 'kirki_demo_panels_sections' );



/**
 * Add our controls.
 */
function kirki_demo_controls( $controls ) {





// These Goes in the Uderstrap Theme Layout Panel

	$controls[] = array(
		'type'     => 'checkbox',
		'settings' => 'hide_nav',
		'label'    => esc_html__( 'Hide Nav Bar / Hide Left Sidebar on Mobile', 'centotheme' ),
		'description' => 'For "Left Sidebar Sites" - will hide the main Nav Bar on Desktop and the Left Sidebar on Mobile <a href="https://centotheme.com/tutorials?utm_source=centotheme&utm_medium=customizer#core-section-3" class="external-link" target="_blank">Left Sidebar Site Tutorial Here<span class="screen-reader-text"> (opens in a new window)</span></a>.', 'centotheme',

		'section'  => 'centotheme_theme_layout_options',
		'default'  => esc_html__( '', 'textdomain' ),
		'priority' => 100,
		'transport' => 'auto',
		
	 );


		$controls[] = array(		
		'label'             => __( 'Blog Sidebar Positioning', 'centotheme' ),		
		'description'       => __(		
			'Set the Blog sidebar\'s position (note: this is for the WP default Blog pages).',		
			'centotheme'		
		),		
		'section'           => 'centotheme_theme_layout_options',		
		'settings'          => 'centotheme_sidebar_position_blog',		
		'type'              => 'select',		
		'sanitize_callback' => 'centotheme_theme_slug_sanitize_select',		
		'choices'           => array(		
			'right' => __( 'Right sidebar', 'centotheme' ),		
			'left'  => __( 'Left sidebar', 'centotheme' ),		
			'both'  => __( 'Left & Right sidebars', 'centotheme' ),		
			'none'  => __( 'No sidebar', 'centotheme' ),		
		),		
		'priority'          => '101',		
		'transport' => 'auto',		
		'default'  => 'right',		
		);



// Left Sidbar List Menu  ////

$sidebar_pos = get_theme_mod( 'centotheme_sidebar_position' );


// if ( 'left' === $sidebar_pos || 'right' === $sidebar_pos ||'both' === $sidebar_pos ) {
	
if ( 'left' === $sidebar_pos || 'both' === $sidebar_pos ) {
	
	
	$value6b = Kirki::get_option( 'cento_kirki_id', 'cento_global_left_sidebar' );
	$url6b = admin_url('post.php?post=' .$value6b . '&action=elementor');	
	
	$value7b = Kirki::get_option( 'cento_kirki_id', 'cento_global_right_sidebar' );
	$url7b = admin_url('post.php?post=' .$value7b . '&action=elementor');	
	
		if (! empty($value6b) ) {
			
		$link6b = (' <a href="' . $url6b .'" target="_blank"> Edit Elementor Left Template here</a> <br>');	
		} else {
			
		$link6b = null;	
		
		}
		
		if (! empty($value7b) ) {
			
		$link7b = (' <a href="' . $url7b .'" target="_blank"> Edit Elementor Right Template here</a> <br>');	
		} else {
			
		$link7b = null;	
		
		}		
		
		

	$controls[] = array(
	'type'        => 'custom',
	'settings'    => 'cento_global_left_sidebar_link_b',
	'label'       => __( 'Edit the Sidebar Elementor Templates', 'textdomain' ),
	'section'     => 'cento_left_menu',
	'default'     => $link6b . $link7b,
	
	'priority'    => 10,
     );



	$controls[] = array(
		'type'     => 'text',
		'settings' => 'sidebar_content_padding',
		'label'    => esc_html__( 'Content Padding', 'centotheme' ),
		'section'  => 'cento_left_menu',
		'default'  => esc_html__( 'inherit', 'textdomain' ),
		'priority' => 120,
		'transport' => 'auto',
		'output'      => array(
			array(
				'element'  => '#content',
				'property' => 'padding',
// 				'units'    => ' !important'
			),
		),		
		
	 );







	$controls[] = array(
		'type'     => 'text',
		'settings' => 'sidebar_width',
		'label'    => esc_html__( 'Left Sidebar Width', 'centotheme' ),
		'description' => 'Set the width for the Left Sidebar', 'centotheme',

		'section'  => 'cento_left_menu',
		'default'  => '25%',
		'priority' => 110,
		'transport' => 'auto',
		'output'      => array(
			array(
				'element'  => '#left-sidebar, #left-sidebar .elementor',
				'property' => 'max-width',
// 				'units'    => ' !important'
			),
		),		
		
	 );






	$controls[] = array(
		'type'     => 'text',
		'settings' => 'fix-left-sidebar',
		'label'    => esc_html__( 'Minimum % Width @ Pixels', 'centotheme' ),
		'description' => 'Set minimum width - good for horizontal Tablet', 'centotheme',

		'section'  => 'cento_left_menu',
		'default'  => '25%',
		'priority' => 120,
		'transport' => 'auto',

/*
		'output'      => array(
			array(
				'element'  => '#left-sidebar, #left-sidebar .elementor',
				'property' => 'min-width',
			),
		),		
*/

	 );





	$controls[] = array(
		'type'     => 'text',
		'settings' => 'sidebar_max_width',
		'label'    => esc_html__( '', 'centotheme' ),
		'description' => 'The pixel width for Min Width', 'centotheme',

		'section'  => 'cento_left_menu',
		'default'  => esc_html__( '980px', 'textdomain' ),
		'priority' => 125,
		'transport' => 'auto',

		
	 );






	$controls[] = array(
		'type'     => 'text',
		'settings' => 'sidebar_content_padding',
		'label'    => esc_html__( 'Content Padding', 'centotheme' ),
		'section'  => 'cento_left_menu',
		'default'  => esc_html__( 'inherit', 'textdomain' ),
		'priority' => 130,
		'transport' => 'auto',
		'output'      => array(
			array(
				'element'  => '#content',
				'property' => 'padding',
// 				'units'    => ' !important'
			),
		),		
		
	 );




} //  End IF for Left Sdidebar





// Typography ///////
	

	
		$controls[] = array(
			'type'        => 'typography',
			'settings'    => 'cento_typopg_h1',
			'label'       => esc_attr__( 'H1', 'centotheme' ),
			'description' => esc_attr__( '', 'centotheme' ),
			'section'     => 'cento_typography',
			'priority'    => 10,
			'default'     => array(
				'font-family'    => 'Roboto',
				'variant'        => '300',
				'font-size'      => '56px',
				'line-height'    => '1.1',
				'letter-spacing' => '-2px',
				'color'          => '#7a7a7a',
				'text-transform' => 'none',
				'text-align'     => 'inherit',

							),
		    'output'      => array(
		        array(
		            'element'  => 'h1, h1 a',
		            'property' => 'font-family',
		        ),
		
		    ),
			'transport' => 'auto',
			
		
		    );
		
			
		$controls[] = array(
			'type'        => 'typography',
			'settings'    => 'cento_typopg_h2',
			'label'       => esc_attr__( 'H2', 'centotheme' ),
			'description' => esc_attr__( '', 'centotheme' ),
			'section'     => 'cento_typography',
			'priority'    => 10,
			'default'     => array(
				'font-family'    => 'Roboto',
				'variant'        => '300',
				'font-size'      => '44px',
				'line-height'    => '1.1',
				'letter-spacing' => '-2px',
				'color'          => '#7a7a7a',
				'text-transform' => 'none',
				'text-align'     => 'inherit',
		
			),
		    'output'      => array(
		        array(
		            'element'  => 'h2, h2 a',
		            'property' => 'font-family',
		        ),
		
		    ),
			'transport' => 'auto',
			
		
		    );			

			
		$controls[] = array(
			'type'        => 'typography',
			'settings'    => 'cento_typopg_h3',
			'label'       => esc_attr__( 'H3', 'centotheme' ),
			'description' => esc_attr__( '', 'centotheme' ),
			'section'     => 'cento_typography',
			'priority'    => 10,
			'default'     => array(
				'font-family'    => 'Roboto',
				'variant'        => 'regular',
				'font-size'      => '32px',
				'line-height'    => '1.2',
				'letter-spacing' => '0',
				'color'          => '#7a7a7a',
				'text-transform' => 'none',
				'text-align'     => 'inherit',

		
			),
		    'output'      => array(
		        array(
		            'element'  => 'h3, h3 a',
		            'property' => 'font-family',
		        ),
		
		    ),
			'transport' => 'auto',
			
		
		    );		
	
	
		$controls[] = array(
			'type'        => 'typography',
			'settings'    => 'cento_typopg_h4',
			'label'       => esc_attr__( 'H4, H5, H6', 'centotheme' ),
			'description' => esc_attr__( '', 'centotheme' ),
			'section'     => 'cento_typography',
			'priority'    => 10,
			'default'     => array(
				'font-family'    => 'Roboto',
				'variant'        => '300',
				'font-size'      => '24px',
				'line-height'    => '1.3',
				'letter-spacing' => '0',
				'color'          => '#7a7a7a',
				'text-transform' => 'none',
				'text-align'     => 'inherit',

		
			),
		    'output'      => array(
		        array(
		            'element'  => 'h4, h4 a, h5, h5 a, h6, h6 a',
		            'property' => 'font-family',
		        ),
		
		    ),
			'transport' => 'auto',
			
		
		    );	
	
	
	
	
			$controls[] = array(
			'type'        => 'typography',
			'settings'    => 'cento_typopg_body',
			'label'       => esc_attr__( 'Body Text', 'centotheme' ),
			'description' => esc_attr__( '', 'centotheme' ),
			'section'     => 'cento_typography',
			'priority'    => 10,
			'default'     => array(
				'font-family'    => 'Roboto',
				'variant'        => 'regular',
				'font-size'      => '1rem',
				'line-height'    => '1.5',
				'letter-spacing' => '0',
				'color'          => '#7a7a7a',
				'text-transform' => 'none',
				'text-align'     => 'inherit',

		
			),
		    'output'      => array(
		        array(
		            'element'  => 'body',
		            'property' => 'font-family',
		        ),
		
		    ),
			'transport' => 'auto',
			
		
		    );	
	
	



			$controls[] = array(
			'type'        => 'typography',
			'settings'    => 'cento_typopg_widget_title',
			'label'       => esc_attr__( 'Widget Title', 'centotheme' ),
			'description' => esc_attr__( '', 'centotheme' ),
			'section'     => 'cento_typography',
			'priority'    => 10,
			'default'     => array(
				'font-family'    => 'Roboto',
				'variant'        => '300',
				'font-size'      => '34px',
				'line-height'    => '1.3',
				'letter-spacing' => '-1px',
				'color'          => '#7a7a7a',
				'text-transform' => 'none',
				'text-align'     => 'inherit',

		
			),
		    'output'      => array(
		        array(
		            'element'  => '.widget-title, .cento-ele-sidebar h5',
		            'property' => 'font-family',
		        ),
		
		    ),
			'transport' => 'auto',
			
		
		    );	


			$controls[] = array(
			'type'        => 'typography',
			'settings'    => 'cento_typopg_widget_text',
			'label'       => esc_attr__( 'Widget Text', 'centotheme' ),
			'description' => esc_attr__( '', 'centotheme' ),
			'section'     => 'cento_typography',
			'priority'    => 10,
			'default'     => array(
				'font-family'    => 'Roboto',
				'variant'        => 'regular',
				'font-size'      => '18px',
				'line-height'    => '1.5',
				'letter-spacing' => '0',
				'color'          => '#7a7a7a',
				'text-transform' => 'none',
				'text-align'     => 'inherit',

		
			),
		    'output'      => array(
		        array(
		            'element'  => 'aside, cento-ele-sidebar',
		            'property' => 'font-family',
		        ),
		
		    ),
			'transport' => 'auto',
			
		
		    );	
	



// Nav Bar ///////


	$controls[] = array(
		'type'        => 'color',
		'settings'     => 'color_navbar',
		'label'       => __( 'Nav Bar Color', 'centotheme' ),
		'section'     => 'cento_navbar',
		'default'     => '#dddddd',
		'choices'     => array(
		'alpha' => true,
			),
		'priority'    => 10,
		'transport' => 'auto',
		'output'      => array(
			array(
				'element'  => '#wrapper-navbar nav.bg-primary, div#wrapper-navbar, #mysticky-nav.wrapfixed, #wrapper-navbar .navbar.navbar-expand-md.navbar-dark.bg-primary.myfixed',

				'property' => 'background-color',
// 				'units'    => ' !important'
			),
		),


	);





	$controls[] = array(
		'type'        => 'color',
		'settings'     => 'color_navbar_dropdown',
		'label'       => __( 'Menu Dropdown Background Color', 'centotheme' ),
		'section'     => 'cento_navbar',
		'default'     => '#cecece',
		'choices'     => array(
		'alpha' => true,
			),
		'priority'    => 10,
		'transport' => 'auto',
		'output'      => array(
			array(
				'element'  => '.navbar-nav .dropdown-menu',
				'property' => 'background-color',
				'units'    => ' !important'
			),
		),


	);




	$controls[] = array(
		'type'        => 'color',
		'settings'     => 'color_navbar_hamburger',
		'label'       => __( 'Mobile Menu Icon Color', 'centotheme' ),
		'section'     => 'cento_navbar',
		'default'     => '#ffffff',
		'choices'     => array(
		'alpha' => true,
			),
		'priority'    => 10,
		'transport' => 'auto',
		'output'      => array(
			array(
				'element'  => '.slide-float.js-toggleSidebar',
				'property' => 'color',
				'units'    => ' !important'
			),
		),


	);




	$controls[] = array(
		'type'     => 'text',
		'settings' => 'nav_padding',
		'label'    => esc_html__( 'Padding', 'centotheme' ),
		'section'  => 'cento_navbar',
		'default'  => esc_html__( '0', 'textdomain' ),
		'priority' => 10,
		'transport' => 'auto',
		'output'      => array(
			array(
				'element'  => '.navbar',
				'property' => 'padding',
				'units'    => ' !important'
			),
		),		
		
	 );


	$controls[] = array(
		'type'     => 'text',
		'settings' => 'nav_margin',
		'label'    => esc_html__( 'Margin Menu', 'centotheme' ),
		'section'  => 'cento_navbar',
		'default'  => esc_html__( '0 0 0 auto !important', 'textdomain' ),
		'priority' => 10,
		'transport' => 'auto',
		'output'      => array(
			array(
				'element'  => '.navbar-expand-md .navbar-nav',
				'property' => 'margin',
// 				'units'    => ' !important'
			),
		),		
		
	 );
	 
	 
	$controls[] = array(
		'type'     => 'text',
		'settings' => 'nav_sticky_opacity',
		'label'    => esc_html__( 'Sticky Nav Bar Opacity', 'centotheme' ),
		'section'  => 'cento_navbar',
		'default'  => esc_html__( '.95', 'textdomain' ),
		'priority' => 10,
		'transport' => 'auto',
		'output'      => array(
			array(
				'element'  => '#mysticky-nav.wrapfixed',
				'property' => 'opacity',
				'units'    => ' !important'
			),
		),		
	 );
	



	$controls[] = array(
	'type'        => 'typography',
	'settings'    => 'text_logo',
	'label'       => esc_attr__( 'Text Logo', 'centotheme' ),
	'description' => esc_attr__( '', 'centotheme' ),
	'section'     => 'cento_navbar',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '900',
		'font-size'      => '28px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#ffffff',
		'text-transform' => 'uppercase',
		'text-align'     => 'left',

	),
    'output'      => array(
        array(
            'element'  => '.navbar-dark .navbar-brand a, .navbar-dark .navbar-brand',
            'property' => 'font-family',
        ),

    ),
	'transport' => 'auto',
	

    );



	$controls[] = array(
	'type'        => 'typography',
	'settings'    => 'menu_text',
	'label'       => esc_attr__( 'Menu Text', 'centotheme' ),
	'description' => esc_attr__( '', 'centotheme' ),
	'help'        => esc_attr__( '', 'centotheme' ),
	'section'     => 'cento_navbar',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '300',
		'font-size'      => '16px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#ffffff',
		'text-transform' => 'none',
	),
    'output'      => array(
        array(
            'element'  => '.navbar-dark .navbar-nav .nav-link, a.nav-link, .navbar-nav .dropdown-menu a',
            'property' => 'font-family',
        ),

    ),
	'transport' => 'auto',
	

    );




	$controls[] = array(
	'type'        => 'typography',
	'settings'    => 'menu_text_active',
	'label'       => esc_attr__( 'Active Menu Item', 'centotheme' ),
	'description' => esc_attr__( '', 'centotheme' ),
	'help'        => esc_attr__( 'Hello', 'centotheme' ),
	'section'     => 'cento_navbar',
	'priority'    => 10,	
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '300',
		'font-size'      => '16px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#ffffff',
		'text-transform' => 'none',
	),
    'output'      => array(
        array(
            'element'  => '.navbar-dark .navbar-nav .active > .nav-link',
            'property' => 'font-family',
        ),

    ),
	'transport' => 'auto',
	

    );











// Slide Panel  ////


	$value8b = Kirki::get_option( 'cento_kirki_id', 'cento_global_slide_panel' );
	$url8b = admin_url('post.php?post=' .$value8b . '&action=elementor');	
	
		if (! empty($value8b) ) {
			
		$link8b = (' <a href="' . $url8b .'" target="_blank"> Edit the Elementor Template</a> <br>');

		} else {
			
		$link8b = null;	
		
		}


	$controls[] = array(
	'type'        => 'custom',
	'settings'    => 'cento_global_slide_panel_link_b',
	'label'       => __( 'Edit the Mobile Panel Elementor Template here', 'textdomain' ),
	'section'     => 'cento_panel',
	'default'     => $link8b ,
	
	'priority'    => 10,
     );




	$controls[] = array(
		'type'        => 'color',
		'settings'     => 'color_panel',
		'label'       => __( 'Panel Background Color', 'centotheme' ),
		'section'     => 'cento_panel',
		'default'     => '#1F1F1F',
		'choices'     => array(
		'alpha' => true,
			),
		'priority'    => 10,
		'transport' => 'auto',
		'output'      => array(
			array(
				'element'  => '.cento-sidebar',
				'property' => 'background-color',
				'units'    => ' !important'
			),
		),


	);
	











// Global Parts //////



   // Top Row


	$controls[] = array(
		'type'        => 'select',
		'settings'     => 'cento_global_top_row',
		'label'       => __( 'Top Row', 'kirki' ),

		'section'     => 'cento_global_parts',
		'default'     => '',
		'priority'    => 10,
        'placeholder' => esc_attr__( 'Select a Template', 'kirki' ), 
        'choices' => Kirki_Helper::get_posts( 
        
        		array(
        		
        		 'post_type' => 'elementor_library',
        		 'posts_per_page' => 99,
      		 	 
        		  ) ),		

		'transport' => 'refresh',
		
	);




	$value1 = Kirki::get_option( 'cento_kirki_id', 'cento_global_top_row' );
	$url1 = admin_url('post.php?post=' .$value1 . '&action=elementor');	
	
		if (! empty($value1) ) {
			
		$link1 = (' <a href="' . $url1 .'" target="_blank"> Edit Template</a> ') ;
		
		} else {
		
		$link1 = null ;

		}

	$controls[] = array(
	'type'        => 'custom',
	'settings'    => 'cento_global_top_row_link',
	'label'       => __( '', 'textdomain' ),
	'section'     => 'cento_global_parts',
	'default'     => $link1,

	'priority'    => 10,
     );




   // Header


	$controls[] = array(
		'type'        => 'select',
		'settings'     => 'cento_global_header',
		'label'       => __( 'Header', 'kirki' ),

		'section'     => 'cento_global_parts',
		'default'     => '',
		'priority'    => 10,
        'placeholder' => esc_attr__( 'Select a Template', 'kirki' ),    
        'choices' => Kirki_Helper::get_posts( 
        
        		array(
        		
        		 'post_type' => 'elementor_library',
        		 'posts_per_page' => 99,
      		 	 
        		  ) ),		

		'transport' => 'refresh',
		
	);


	$value10 = Kirki::get_option( 'cento_kirki_id', 'cento_global_header' );
	$url10 = admin_url('post.php?post=' .$value10 . '&action=elementor');	
	
		if (! empty($value10) ) {
			
		$link10 = (' <a href="' . $url10 .'" target="_blank"> Edit Template</a> ');	
		
		} else {
			
		$link10 = null;		

		}


	$controls[] = array(
	'type'        => 'custom',
	'settings'    => 'cento_global_header_link',
	'label'       => __( '', 'textdomain' ),
	'section'     => 'cento_global_parts',
	'default'     => $link10 ,
	
	'priority'    => 10,
     );









   // Below Header


	$controls[] = array(
		'type'        => 'select',
		'settings'     => 'cento_global_below_nav',
		'label'       => __( 'Below Header', 'kirki' ),

		'section'     => 'cento_global_parts',
		'default'     => '',
		'priority'    => 10,
        'placeholder' => esc_attr__( 'Select a Template', 'kirki' ),    
        'choices' => Kirki_Helper::get_posts( 
        
        		array(
        		
        		 'post_type' => 'elementor_library',
        		 'posts_per_page' => 99,
      		 	 
        		  ) ),		

		'transport' => 'refresh',
		
	);


	$value2 = Kirki::get_option( 'cento_kirki_id', 'cento_global_below_nav' );
	$url2 = admin_url('post.php?post=' .$value2 . '&action=elementor');	
	
		if (! empty($value2) ) {
			
		$link2 = (' <a href="' . $url2 .'" target="_blank"> Edit Template</a> ');	
		
		} else {
			
		$link2 = null;		
		
		}


	$controls[] = array(
	'type'        => 'custom',
	'settings'    => 'cento_global_below_nav_link',
	'label'       => __( '', 'textdomain' ),
	'section'     => 'cento_global_parts',
	'default'     => $link2 ,
	
	'priority'    => 10,
     );




	//  Below Main Content
	
	$controls[] = array(
		'type'        => 'select',
		'settings'     => 'cento_global_below_content',
		'label'       => __( 'Below Main Content', 'kirki' ),

		'section'     => 'cento_global_parts',
		'default'     => '',
		'priority'    => 10,
        'placeholder' => esc_attr__( 'Select a Template', 'kirki' ),    
        'choices' => Kirki_Helper::get_posts( 
        
        		array(
        		
        		 'post_type' => 'elementor_library',
        		 'posts_per_page' => 99,
      		 	 
        		  ) ),		

		'transport' => 'refresh',
		
	);


	$value11 = Kirki::get_option( 'cento_kirki_id', 'cento_global_below_content' );
	$url11 = admin_url('post.php?post=' .$value11 . '&action=elementor');	
	
		if (! empty($value11) ) {
			
		$link11 = (' <a href="' . $url11 .'" target="_blank"> Edit Template</a> ');	
		
		} else {
			
		$link11 = null;	
		
		}


	$controls[] = array(
	'type'        => 'custom',
	'settings'    => 'cento_global_below_content_link',
	'label'       => __( '', 'textdomain' ),
	'section'     => 'cento_global_parts',
	'default'     => $link11 ,
	
	'priority'    => 10,
     );









	//  Above_Footer
	
	$controls[] = array(
		'type'        => 'select',
		'settings'     => 'cento_global_above_footer',
		'label'       => __( 'Above Footer', 'kirki' ),

		'section'     => 'cento_global_parts',
		'default'     => '',
		'priority'    => 10,
        'placeholder' => esc_attr__( 'Select a Template', 'kirki' ),    
        'choices' => Kirki_Helper::get_posts( 
        
        		array(
        		
        		 'post_type' => 'elementor_library',
        		 'posts_per_page' => 99,
      		 	 
        		  ) ),		

		'transport' => 'refresh',
		
	);


	$value3 = Kirki::get_option( 'cento_kirki_id', 'cento_global_above_footer' );
	$url3 = admin_url('post.php?post=' .$value3 . '&action=elementor');	
	
		if (! empty($value3) ) {
			
		$link3 = (' <a href="' . $url3 .'" target="_blank"> Edit Template</a> ');	
		
		} else {
			
		$link3 = null;	
		
		}


	$controls[] = array(
	'type'        => 'custom',
	'settings'    => 'cento_global_above_footer_link',
	'label'       => __( '', 'textdomain' ),
	'section'     => 'cento_global_parts',
	'default'     => $link3 ,
	
	'priority'    => 10,
     );





	//  Footer
	
	$controls[] = array(
		'type'        => 'select',
		'settings'     => 'cento_global_footer',
		'label'       => __( 'Footer', 'kirki' ),

		'section'     => 'cento_global_parts',
		'default'     => '',
		'priority'    => 10,
        'placeholder' => esc_attr__( 'Select a Template', 'kirki' ),    
        'choices' => Kirki_Helper::get_posts( 
        
        		array(
        		
        		 'post_type' => 'elementor_library',
        		 'posts_per_page' => 99,
      		 	 
        		  ) ),		

		'transport' => 'refresh',
		
	);


	$value4 = Kirki::get_option( 'cento_kirki_id', 'cento_global_footer' );
	$url4 = admin_url('post.php?post=' .$value4 . '&action=elementor');	
	
		if (! empty($value4) ) {
			
		$link4 = (' <a href="' . $url4 .'" target="_blank"> Edit Template</a> ');	

		} else {
			
		$link4 = null;	
		
		}


	$controls[] = array(
	'type'        => 'custom',
	'settings'    => 'cento_global_footer_link',
	'label'       => __( '', 'textdomain' ),
	'section'     => 'cento_global_parts',
	'default'     => $link4 ,
	
	'priority'    => 10,
     );


	//  Copyright
	
	$controls[] = array(
		'type'        => 'select',
		'settings'     => 'cento_global_copyright',
		'label'       => __( 'Copyright', 'kirki' ),

		'section'     => 'cento_global_parts',
		'default'     => '',
		'priority'    => 10,
        'placeholder' => esc_attr__( 'Select a Template', 'kirki' ),    
        'choices' => Kirki_Helper::get_posts( 
        
        		array(
        		
        		 'post_type' => 'elementor_library',
        		 'posts_per_page' => 99,
      		 	 
        		  ) ),		

		'transport' => 'refresh',
		
	);


	$value5 = Kirki::get_option( 'cento_kirki_id', 'cento_global_copyright' );
	$url5 = admin_url('post.php?post=' .$value5 . '&action=elementor');	
	
		if (! empty($value5) ) {
			
		$link5 = (' <a href="' . $url5 .'" target="_blank"> Edit Template</a> ');	

		} else {
			
		$link5 = null;	
		
		}


	$controls[] = array(
	'type'        => 'custom',
	'settings'    => 'cento_global_copyright_link',
	'label'       => __( '', 'textdomain' ),
	'section'     => 'cento_global_parts',
	'default'     => $link5 ,
	
	'priority'    => 10,
     );





	//  Right Sidebar
	
	$controls[] = array(
		'type'        => 'select',
		'settings'     => 'cento_global_right_sidebar',
		'label'       => __( 'Right Sidebar', 'kirki' ),

		'section'     => 'cento_global_parts',
		'default'     => '',
		'priority'    => 10,
        'placeholder' => esc_attr__( 'Select a Template', 'kirki' ),    
        'choices' => Kirki_Helper::get_posts( 
        
        		array(
        		
        		 'post_type' => 'elementor_library',
        		 'posts_per_page' => 99,
      		 	 
        		  ) ),		

		'transport' => 'refresh',
		
	);


	$value7 = Kirki::get_option( 'cento_kirki_id', 'cento_global_right_sidebar' );
	$url7 = admin_url('post.php?post=' .$value7 . '&action=elementor');	
	
		if (! empty($value7) ) {
			
		$link7 = (' <a href="' . $url7 .'" target="_blank"> Edit Template</a> ');	
		} else {
			
		$link7 = null;	
		
		}


	$controls[] = array(
	'type'        => 'custom',
	'settings'    => 'cento_global_right_sidebar_link',
	'label'       => __( '', 'textdomain' ),
	'section'     => 'cento_global_parts',
	'default'     => $link7,
	
	'priority'    => 10,
     );






	//  Left Sidebar
	
	$controls[] = array(
		'type'        => 'select',
		'settings'     => 'cento_global_left_sidebar',
		'label'       => __( 'Left Sidebar', 'kirki' ),

		'section'     => 'cento_global_parts',
		'default'     => '',
		'priority'    => 10,
        'placeholder' => esc_attr__( 'Select a Template', 'kirki' ),    
        'choices' => Kirki_Helper::get_posts( 
        
        		array(
        		
        		 'post_type' => 'elementor_library',
        		 'posts_per_page' => 99,
      		 	 
        		  ) ),		

		'transport' => 'refresh',
		
	);


	$value6 = Kirki::get_option( 'cento_kirki_id', 'cento_global_left_sidebar' );
	$url6 = admin_url('post.php?post=' .$value6 . '&action=elementor');	
	
		if (! empty($value6) ) {
			
		$link6 = (' <a href="' . $url6 .'" target="_blank"> Edit Template</a> ');	
		} else {
			
		$link6 = null;	
		
		}


	$controls[] = array(
	'type'        => 'custom',
	'settings'    => 'cento_global_left_sidebar_link',
	'label'       => __( '', 'textdomain' ),
	'section'     => 'cento_global_parts',
	'default'     => $link6 ,
	
	'priority'    => 10,
     );






	//  Slide Panel
	
	$controls[] = array(
		'type'        => 'select',
		'settings'     => 'cento_global_slide_panel',
		'label'       => __( 'Mobile Slide Panel', 'kirki' ),

		'section'     => 'cento_global_parts',
		'default'     => '',
		'priority'    => 10,
        'placeholder' => esc_attr__( 'Select a Template', 'kirki' ),    
        'choices' => Kirki_Helper::get_posts( 
        
        		array(
        		
        		 'post_type' => 'elementor_library',
        		 'posts_per_page' => 99,
      		 	 
        		  ) ),		

		'transport' => 'refresh',
		
	);


	$value8 = Kirki::get_option( 'cento_kirki_id', 'cento_global_slide_panel' );
	$url8 = admin_url('post.php?post=' .$value8 . '&action=elementor');	
	
		if (! empty($value8) ) {
			
		$link8 = (' <a href="' . $url8 .'" target="_blank"> Edit Template</a> ');	

		} else {
			
		$link8 = null;	
		
		}


	$controls[] = array(
	'type'        => 'custom',
	'settings'    => 'cento_global_slide_panel_link',
	'label'       => __( '', 'textdomain' ),
	'section'     => 'cento_global_parts',
	'default'     => $link8 ,
	
	'priority'    => 10,
     );



	//  404 Page
	
	$controls[] = array(
		'type'        => 'select',
		'settings'     => 'cento_global_404',
		'label'       => __( '404 Page', 'kirki' ),

		'section'     => 'cento_global_parts',
		'default'     => '',
		'priority'    => 10,
        'placeholder' => esc_attr__( 'Select a Template', 'kirki' ),    
        'choices' => Kirki_Helper::get_posts( 
        
        		array(
        		
        		 'post_type' => 'elementor_library',
        		 'posts_per_page' => 99,
      		 	 
        		  ) ),		

		'transport' => 'refresh',
		
	);


	$value9 = Kirki::get_option( 'cento_kirki_id', 'cento_global_404' );
	$url9 = admin_url('post.php?post=' .$value9 . '&action=elementor');	
	
		if (! empty($value9) ) {
			
		$link9 = (' <a href="' . $url9 .'" target="_blank"> Edit Template</a> ');	

		} else {
			
		$link9 = null;	
		
		}


	$controls[] = array(
	'type'        => 'custom',
	'settings'    => 'cento_global_404_link',
	'label'       => __( '', 'textdomain' ),
	'section'     => 'cento_global_parts',
	'default'     => $link9 ,
	
	'priority'    => 10,
     );




	return $controls;

}
add_filter( 'kirki/controls', 'kirki_demo_controls' );

/**
 * Configuration sample for the Kirki Customizer
 */
function kirki_demo_configuration_sample() {

    $args = array(
//         'logo_image'    => 'http://kirki.org/images/logo.png',
        'description'   => __( 
        
        
        '<p>
        
        Need some Help with Cento Theme? - 
        
        <a href="https://centotheme.com/tutorials?utm_source=centotheme&utm_medium=customizer" class="external-link" target="_blank">Tutorials Here<span class="screen-reader-text"> (opens in a new window)</span></a>
        
         <a href="https://jakson.co/forums?utm_source=centotheme&utm_medium=customizer" class="external-link" target="_blank">Support Forums Here<span class="screen-reader-text"> (opens in a new window)</span></a>
       
        </p/
        
        
        
        ', 'centotheme', 'centotheme' ),
/*
        'color_accent'  => '#00bcd4',
        'color_back'    => '#455a64',
*/
    );

    return $args;

}
add_filter( 'kirki/config', 'kirki_demo_configuration_sample' );




$value = get_theme_mod( 'site_title_font_family', array() );

if ( isset( $value['font-family'] ) ) {
	echo '<p>' . sprintf( esc_html__( 'Font Family: %s', 'textdomain' ), $value['font-family'] ) . '</p>';
}
if ( isset( $value['variant'] ) ) {
	echo '<p>' . sprintf( esc_html__( 'Variant: %s', 'textdomain' ), $value['variant'] ) . '</p>';
}
if ( isset( $value['font-size'] ) ) {
	echo '<p>' . sprintf( esc_html__( 'Font Size: %s', 'textdomain' ), $value['font-size'] ) . '</p>';
}
if ( isset( $value['line-height'] ) ) {
	echo '<p>' . sprintf( esc_html__( 'Line Height: %s', 'textdomain' ), $value['line-height'] ) . '</p>';
}
if ( isset( $value['letter-spacing'] ) ) {
	echo '<p>' . sprintf( esc_html__( 'Letter Spacing: %s', 'textdomain' ), $value['letter-spacing'] ) . '</p>';
}
if ( isset( $value['color'] ) ) {
	echo '<p>' . sprintf( esc_html__( 'Color: %s', 'textdomain' ), $value['color'] ) . '</p>';
}


