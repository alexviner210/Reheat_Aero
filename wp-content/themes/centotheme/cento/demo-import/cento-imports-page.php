<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	

// Add Text before Demo Grid


function ocdi_plugin_intro_text( $default_text ) {
	
	$centodemo = get_option ( 'cento_demo_in_use') ;
	$centodemochosen = get_option ( 'cento_demo_chosen') ;
	$baseplugincheck = cento_check_base_plugin ();
	$explugs = get_option ( 'cento-explugs-checkbox') ;
	
	$freshsite = get_option ( 'fresh_site') ;
	
	if ( $baseplugincheck ==1	 
		 ) {		 
			 $baseok = 1 ;		 
			} else {		 
			 $baseok = 0 ;		 
	   }





// For Plugin Install Popup


	add_thickbox();
	
	
	$url = add_query_arg( array(
		'action'    => 'foo_modal_box',
		'TB_iframe' => 'true',
		'width'     => '600',
		'height'    => '600'
		), 
	    admin_url( 'admin.php?page=install_plugin' ) );	
	
	function foo_render_action_page() {
	define( 'IFRAME_REQUEST', true );
	iframe_header();
	
	// ... your content here ...					
	
	
	iframe_footer();
	exit;
	}
	add_action( 'admin_action_foo_modal_box', 'foo_render_action_page' );
	
	
	

	   
	   ?>	
			
			<div class="ocdi__intro-text">





				
				<br>
				
				<h1> One Click Demo Imports <i class="dashicons dashicons-download"></i></h1>
				
				<?php if ($baseok ==1) { 
					

						if ($freshsite ==0) { ?>

						
						<div class="notice notice-error is-dismissible"> 
							<p><b>THIS SITE HAS EXISTING CONTENT!</b> - please Back Up your Files & Database before using the import function - we recommend <a href="https://jakson.co/updraftplus/" class="external-link" target="_blank">UpdraftPlus<span class="screen-reader-text"> (opens in a new window)</span></a>  <b>THERE IS NO UNDO !</b></p>
							<button type="button" class="notice-dismiss">
								<span class="screen-reader-text">Dismiss this notice.</span>
							</button>
						</div>


                        <?php }


						if (!empty($centodemo)) { ?>


						<div class="notice notice-warning is-dismissible"> 
							<p>There is existing Demo Content! - you will need to delete the existing Demo Content before importing a new Demo to avoid duplicate content - we recommend using <a href="https://wordpress.org/plugins/wp-reset/" class="external-link" target="_blank">WP Reset
								<span class="screen-reader-text"> (opens in a new window)</span></a> for this.  
								
<!-- 								<br> Check out our Tutorial on how to use WP Reset with Cento Demo Imports <a class="" href="https://jakson.co/cento-wp-reset-tutrorial?utm_source=centothemefree&utm_medium=themepage" target="_blank">Here -->
								<span class="screen-reader-text"> (opens in a new window)</span></a></p>
							<button type="button" class="notice-dismiss">
								<span class="screen-reader-text">Dismiss this notice.</span>
							</button>
						</div>



                        <?php } ?>


			

						<div class="notice notice-info is-dismissible"> 

							<p>After importing, check out the Customization Tutorials on the <a href="<?php echo (admin_url('themes.php?page=cento-theme#get-theming')); ?> " class="external-link" target="_self">Now Get Theming!<span class="screen-reader-text"> (opens in a new window)</span></a> section of the Theme Page.</p>


							<button type="button" class="notice-dismiss">
								<span class="screen-reader-text">Dismiss this notice.</span>
							</button>
						</div>






					
	
					
				<?php } else { ?>

					<hr>		
	
					<div class="imp-page-tuts-url">
						
						
						<a class="cento-options-button" href="<?php echo (admin_url( 'admin.php?page=install_plugin' )); ?>">Install Base Plugins First ! <span class="dashicons dashicons-arrow-right-alt"></a>
						
						
											
						
					</div>
					
						
					<?php  die();
										
				}
					
			
				?>
				
		
				<hr>		
			</div>
	
		
	    <?php
	
	
		


}
add_filter( 'pt-ocdi/plugin_intro_text', 'ocdi_plugin_intro_text' );






function ocdi_before_content_import( $selected_import ) {
	
	$centodemo = get_option ( 'cento_demo_in_use') ;
	$centodemochosen = get_option ( 'cento_demo_chosen') ;
	$baseplugincheck = cento_check_base_plugin ();
	$explugs = get_option ( 'cento-explugs-checkbox') ;
	
	$democlicked = $selected_import['import_file_name'];
	


	
	//Check if Base Plugs installed, die if not.
	if ( $baseplugincheck ==1 ) {	
			 
			 $baseok = 1 ;		
			  
			} else {		 
				
			 $baseok = 0 ;		 

			 $url = admin_url( 'admin.php?page=install_plugin' ) ;
			 $urlfull = '<a class="cento-options-button" href="' . $url . '">Install the Required Plugins for this Template <span class="dashicons dashicons-arrow-right-alt"></a>' ;
			
			 echo "<script>alert('Please Install the Base Plugins')</script>";
			
			 die( $urlfull );

			 
	   }		
	   

        //Demo 1 to 4
		if (
		
		'Demo Import 1' === $selected_import['import_file_name'] ||
		'Demo Import 2' === $selected_import['import_file_name'] ||
		'Demo Import 3' === $selected_import['import_file_name'] ||
		'Demo Import 4' === $selected_import['import_file_name'] 
		
			)  {		
			        update_option( 'cento_demo_chosen', 1 );
			        update_option( 'cento_demo_test', 99 );

	
		
		// Demo 5
		} elseif (  
			
		
		    'Demo Import 5' === $selected_import['import_file_name'] ) {
			
			if (
	        
	         // Needs these plgins
			 is_plugin_active ( 'visual-portfolio/class-visual-portfolio.php' )  and
			 is_plugin_active ( 'contact-form-7/wp-contact-form-7.php' )  
			 
			)  {
				  
				    echo "<script>alert('2 Awesome!  - lets get theming!  ')</script>";
		
			  } else {
				
				//bad
		
					$admin = admin_url();					
					$urlfull = '<a href="' . $admin . 'admin.php?page=install_plugin&amp;action=foo_modal_box&amp;TB_iframe=true&amp;width=600&amp;height=600" class="cento-options-button thickbox">Install the Required Plugins for this Template <span class="dashicons dashicons-admin-plugins"></span></a>';
					
						
			        
			         echo "<script>alert('You need to install additional Plugins for this Demo Template')</script>";
			 
				     die ( $urlfull . cento_delete_odci_transients (5)  );	
			                
			       
			}
	
	    } //End Demo 5    
	    
	
	    
		// Demo 6
		 elseif (  
			
		
		    'Demo Import 6' === $selected_import['import_file_name'] ) {
			
			if (
	        
	         // Needs these plgins
			 is_plugin_active ( 'visual-portfolio/class-visual-portfolio.php' )  and
			 is_plugin_active ( 'contact-form-7/wp-contact-form-7.php' )  
			 
			)  {
				  
				    echo "<script>alert('2 Awesome!  - lets get theming!  ')</script>";
		
			  } else {
				
				//bad
		
					$admin = admin_url();					
					$urlfull = '<a href="' . $admin . 'admin.php?page=install_plugin&amp;action=foo_modal_box&amp;TB_iframe=true&amp;width=600&amp;height=600" class="cento-options-button thickbox">Install the Required Plugins for this Template <span class="dashicons dashicons-admin-plugins"></span></a>';
					

			        
			         echo "<script>alert('You need to install additional Plugins for this Demo Template')</script>";
			         
			 
				     die ( $urlfull . cento_delete_odci_transients (6)  );	
			                
			       
			}
	
	    } //End Demo 6
	    
	    
		// Demo 7
		 elseif (  
			
		
		    'Demo Import 7' === $selected_import['import_file_name'] ) {
			
			if (
	        
	         // Needs these plgins
			 is_plugin_active ( 'contact-form-7/wp-contact-form-7.php' )  
			 
			)  {
				  
				    echo "<script>alert('2 Awesome!  - lets get theming!  ')</script>";
		
			  } else {
				
				//bad
		

					$admin = admin_url();					
					$urlfull = '<a href="' . $admin . 'admin.php?page=install_plugin&amp;action=foo_modal_box&amp;TB_iframe=true&amp;width=600&amp;height=600" class="cento-options-button thickbox">Install the Required Plugins for this Template <span class="dashicons dashicons-admin-plugins"></span></a>';
			
			        
			         echo "<script>alert('You need to install additional Plugins for this Demo Template')</script>";
			 
				     die ( $urlfull . cento_delete_odci_transients (7)  );	
			                
			       
			}
	
	    } //End Demo 7
	    


		// Demo 8
		 elseif (  
			
		
		    'Demo Import 8' === $selected_import['import_file_name'] ) {
			
			if (
	        
	         // Needs these plgins
			 is_plugin_active ( 'visual-portfolio/class-visual-portfolio.php' )  and			 
			 is_plugin_active ( 'contact-form-7/wp-contact-form-7.php' )  
			 
			)  {
				  
				    echo "<script>alert('2 Awesome!  - lets get theming!  ')</script>";
		
			  } else {
				
				//bad
		
					$admin = admin_url();					
					$urlfull = '<a href="' . $admin . 'admin.php?page=install_plugin&amp;action=foo_modal_box&amp;TB_iframe=true&amp;width=600&amp;height=600" class="cento-options-button thickbox">Install the Required Plugins for this Template <span class="dashicons dashicons-admin-plugins"></span></a>';
					
			
			        
			         echo "<script>alert('You need to install additional Plugins for this Demo Template')</script>";
			 
				     die ( $urlfull . cento_delete_odci_transients (8)  );	
			                
			       
			}
	
	    } //End Demo 8
	    
	    

		// Demo 10
		 elseif (  
			
		
		    'Demo Import 10' === $selected_import['import_file_name'] ) {
			
			if (
	        
	         // Needs these plgins
			 is_plugin_active ( 'contact-form-7/wp-contact-form-7.php' )  
			 
			)  {
				  
				    echo "<script>alert('2 Awesome!  - lets get theming!  ')</script>";
		
			  } else {
				
				//bad
		
					$admin = admin_url();					
					$urlfull = '<a href="' . $admin . 'admin.php?page=install_plugin&amp;action=foo_modal_box&amp;TB_iframe=true&amp;width=600&amp;height=600" class="cento-options-button thickbox">Install the Required Plugins for this Template <span class="dashicons dashicons-admin-plugins"></span></a>';
					
			
			        
			         echo "<script>alert('You need to install additional Plugins for this Demo Template')</script>";
			 
				     die ( $urlfull . cento_delete_odci_transients (10)  );	
			                
			       
			}
	
	    } //End Demo 10
	    
	    




		// Demo 11
		 elseif (  
			
		
		    'Demo Import 11' === $selected_import['import_file_name'] ) {
			
			if (
	        
	         // Needs these plgins
			 is_plugin_active ( 'ninja-forms/ninja-forms.php' )  
			 
			)  {
				  
				    echo "<script>alert('2 Awesome!  - lets get theming!  ')</script>";
		
			  } else {
				
				//bad
		
					$admin = admin_url();					
					$urlfull = '<a href="' . $admin . 'admin.php?page=install_plugin&amp;action=foo_modal_box&amp;TB_iframe=true&amp;width=600&amp;height=600" class="cento-options-button thickbox">Install the Required Plugins for this Template <span class="dashicons dashicons-admin-plugins"></span></a>';
					
			
			        
			         echo "<script>alert('You need to install additional Plugins for this Demo Template')</script>";
			 
				     die ( $urlfull . cento_delete_odci_transients (11)  );	
			                
			       
			}
	
	    } //End Demo 11













	    
	    
			
}	//End ocdi_before_content_import

add_action( 'pt-ocdi/before_content_import', 'ocdi_before_content_import' );






//Remane Menu
function ocdi_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'pt-ocdi' );
	$default_settings['menu_title']  = esc_html__( 'Cento Demo Import' , 'pt-ocdi' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'pt-one-click-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'ocdi_plugin_page_setup' );


// Bigger Pop Up Box
function my_theme_ocdi_confirmation_dialog_options ( $options ) {
	return array_merge( $options, array(
		'width'       => 600,
		'dialogClass' => 'wp-dialog',
		'resizable'   => false,
		'height'      => 'auto',
		'modal'       => true,
	) );
}
add_filter( 'pt-ocdi/confirmation_dialog_options', 'my_theme_ocdi_confirmation_dialog_options', 10, 1 );




// Load the Demos
require get_template_directory() . '/cento/demo-import/cento-demo-grid.php';
 




// Set the Demo In Use

function ocdi_after_import( $selected_import ) {

// Default All-Demo settinga 

	
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary' => $main_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );
	

    
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
	
	
	
	
	

	if ( 'Demo Import 1' === $selected_import['import_file_name'] ) {
		update_option( 'cento_demo_in_use', 1 );
		update_option( 'cento_demo_chosen', '' );		
		add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );

	}
		
	elseif ( 'Demo Import 2' === $selected_import['import_file_name'] ) {
		update_option( 'cento_demo_in_use', 2 );
		update_option( 'cento_demo_chosen', '' );
	}

	elseif ( 'Demo Import 3' === $selected_import['import_file_name'] ) {
		update_option( 'cento_demo_in_use', 3 );
		update_option( 'cento_demo_chosen', '' );
	}

	elseif ( 'Demo Import 4' === $selected_import['import_file_name'] ) {
		update_option( 'cento_demo_in_use', 4 );
		update_option( 'cento_demo_chosen', '' );
	}

	elseif ( 'Demo Import 5' === $selected_import['import_file_name'] ) {
		update_option( 'cento_demo_in_use', 5 );
		update_option( 'cento_demo_chosen', '' );


		// Unset Blog Page
		update_option( 'page_for_posts', '' );
	
        // Set the VP Portfolio taxonomy
		$catid = get_cat_ID( 'Portfolio' );
		$themeta = get_mid_by_key( '635', 'vp_posts_taxonomies' ); 
	    $args = array( $catid );		
		update_meta( $themeta, 'vp_posts_taxonomies', $args );
	
		
	}

	elseif ( 'Demo Import 6' === $selected_import['import_file_name'] ) {
		update_option( 'cento_demo_in_use', 6 );
		update_option( 'cento_demo_chosen', '' );
		

		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
	
		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Portfolio' );
		$blog_page_id  = get_page_by_title( 'Blog' );
		
	
	    
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );
			
		
		
		
		
		
	}

	elseif ( 'Demo Import 7' === $selected_import['import_file_name'] ) {
		update_option( 'cento_demo_in_use', 7 );
		update_option( 'cento_demo_chosen', '' );
			
/*
		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Home' );
	    
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', '' );
*/
		
		
		
	}

	elseif ( 'Demo Import 8' === $selected_import['import_file_name'] ) {
		update_option( 'cento_demo_in_use', 8 );
		update_option( 'cento_demo_chosen', '' );
		
		// Unset Blog Page
		update_option( 'page_for_posts', '' );
	
        // Set the VP Portfolio taxonomy
		$catid = get_cat_ID( 'Portfolio' );
		$themeta = get_mid_by_key( '685', 'vp_posts_taxonomies' ); 
	    $args = array( $catid );		
		update_meta( $themeta, 'vp_posts_taxonomies', $args );

        // Unbublish Hello World       
        $helloworld = get_page_by_title( 'Hello world!', OBJECT, 'post' );
        $my_post = array(
          'ID'           => $helloworld->ID,
          'post_type' => 'post',
          'post_status'   => 'draft',
        );
        // Update the post into the database
        wp_update_post( $my_post );	

 
        // Set the Elementor Default Fonts
		$args = array (
		
			array(
					'font_family' => 'Montserrat',
					'font_weight' => 'Default',		
				),
					
			array(
					'font_family' => 'Montserrat',
					'font_weight' => 'Default',		
				),
				
			array(
					'font_family' => 'Default',
					'font_weight' => 'Default',		
				),
						
			array(
					'font_family' => 'Default',
					'font_weight' => 'Default',		
				),		
		);
			
			array_unshift($args, "phoney");
			unset($args[0]);		
			update_option( 'elementor_scheme_typography', $args, 'yes' );			

		
		

	}		

	elseif ( 'Demo Import 9' === $selected_import['import_file_name'] ) {
		update_option( 'cento_demo_in_use', 9 );
		update_option( 'cento_demo_chosen', '' );
	}



	elseif ( 'Demo Import 10' === $selected_import['import_file_name'] ) {
		update_option( 'cento_demo_in_use', 10 );
		update_option( 'cento_demo_chosen', '' );
	}



	elseif ( 'Demo Import 11' === $selected_import['import_file_name'] ) {
		update_option( 'cento_demo_in_use', 11 );
		update_option( 'cento_demo_chosen', '' );
	}



	// Unbublish Hello World       
	$helloworld = get_page_by_title( 'Hello world!', OBJECT, 'post' );
	$my_post = array(
	  'ID'           => $helloworld->ID,
	  'post_type' => 'post',
	  'post_status'   => 'draft',
	);
	// Update the post into the database
	wp_update_post( $my_post );	

  								
    // Set Menu Icon Option
    cento_setup_icon() ;
    
    
    // Set Permalink Structure
    cento_set_permalink();
    
	// Delete the Temp Meta
	delete_post_meta(999999, '_elementor_edit_mode');     	

	
		
    // Flush Cache
    wp_cache_flush();


}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import' );


