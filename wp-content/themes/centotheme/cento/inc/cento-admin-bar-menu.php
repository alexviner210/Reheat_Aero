<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	


if ( current_user_can( 'manage_options' ) ) {

	add_action('admin_bar_menu', 'add_toolbar_items', 999);
	
	
	function add_toolbar_items($admin_bar){
	    $admin_bar->add_menu( array(
	        'id'    => 'cento-menu',
	        'title' => '<span class="ab-icon dashicons dashicons-star-filled"></span>' .'Cento Theme',
	        'href'  => '',
	        'meta'  => array(
	            'title' =>  __('Cento Theme'),    
	            'class' => 'cento-admin-menu cento-admin-menu-top'
	                    
	        ),
	    ));


	    $admin_bar->add_menu( array(
			'id'    => 'cento-admin-page',
			'parent' => 'cento-menu',
			'title' => 'Cento Theme Start',
			'href'  => admin_url() . 'themes.php?page=cento-theme',
	        'meta'  => array(
	            'title' =>  __('Cento Theme Start'),    
				'class' => 'cento-admin-menu-sub'
	        ),
		));	
	
	
	

	
	    $admin_bar->add_menu( array(
			'id'    => 'cento-customize',
			'parent' => 'cento-menu',
			'title' => 'Customizer ',
			'href'  => admin_url() . 'customize.php',
	
	        'meta'  => array(
	            'title' => __('Customizer'),
	            'target' => '_self',
	            'class' => 'cento-admin-menu-sub'
	        ),
	    ));

	
	    $admin_bar->add_menu( array(
			'id'    => 'cento-gloab-sections',
			'parent' => 'cento-menu',
			'title' => 'Global Sections Assign',
			'href'  => admin_url() . 'customize.php?autofocus[section]=cento_global_parts',
	
	        'meta'  => array(
	            'title' => __('Global Sections'),
	//             'target' => '_blank',
	            'class' => 'cento-admin-menu-sub admin-menu-divide'
	        ),
	    ));


		if( class_exists( 'Kirki' ) ) {
		


				    $admin_bar->add_menu( array(
						'id'    => 'cento-global-edit-header',
						'parent' => 'cento-menu',
						'title' => 'Edit Global Sections:',
				
				        'meta'  => array(
				            'class' => 'cento-admin-menu-sub  admin-menu-top-padding'
				        ),
					));	
			    





		
			$value1 = Kirki::get_option( 'cento_kirki_id', 'cento_global_top_row' );
			$url1 = admin_url('post.php?post=' .$value1 . '&action=elementor');	
			
				if (! empty($value1) ) {
					
					$link1 = (' <a href="' . $url1 .'" target="_blank"> Template</a> ');	
					
			
			
				    $admin_bar->add_menu( array(
						'id'    => 'cento-global-top-row',
						'parent' => 'cento-menu',
						'title' => 'Top Row',
						'href'  =>  $url1,
				
				        'meta'  => array(
				            'title' => __('Top Row'),
				            'class' => 'cento-admin-menu-sub cento-admin-menu-indent'
				        ),
				    ));					
		
				}

			$value2 = Kirki::get_option( 'cento_kirki_id', 'cento_global_header' );
			$url2 = admin_url('post.php?post=' .$value2 . '&action=elementor');	
			
				if (! empty($value2) ) {
					
					$link2 = (' <a href="' . $url2 .'" target="_blank"> Template</a> ');	
					
			
			
				    $admin_bar->add_menu( array(
						'id'    => 'cento-global-header',
						'parent' => 'cento-menu',
						'title' => 'Header',
						'href'  =>  $url2,
				
				        'meta'  => array(
				            'title' => __('Header'),
				            'class' => 'cento-admin-menu-sub cento-admin-menu-indent'
				        ),
					));	
			    }



			$value3 = Kirki::get_option( 'cento_kirki_id', 'cento_global_below_nav' );
			$url3 = admin_url('post.php?post=' .$value3 . '&action=elementor');	
			
				if (! empty($value3) ) {
					
					$link3 = (' <a href="' . $url3 .'" target="_blank"> Template</a> ');	
					
			
			
				    $admin_bar->add_menu( array(
						'id'    => 'cento-global-below-header',
						'parent' => 'cento-menu',
						'title' => 'Below Header',
						'href'  =>  $url3,
				
				        'meta'  => array(
				            'title' => __('Below Header'),
				            'class' => 'cento-admin-menu-sub cento-admin-menu-indent'
				        ),
					));	
			    }



			$value4 = Kirki::get_option( 'cento_kirki_id', 'cento_global_above_footer' );
			$url4 = admin_url('post.php?post=' .$value4 . '&action=elementor');	
			
				if (! empty($value4) ) {
					
					$link4 = (' <a href="' . $url4 .'" target="_blank"> Template</a> ');	
					
			
			
				    $admin_bar->add_menu( array(
						'id'    => 'cento-global-above-footer',
						'parent' => 'cento-menu',
						'title' => 'Above Footer',
						'href'  =>  $url4,
				
				        'meta'  => array(
				            'title' => __('Above Footer'),
				            'class' => 'cento-admin-menu-sub cento-admin-menu-indent'
				        ),
					));	
			    }



			$value5 = Kirki::get_option( 'cento_kirki_id', 'cento_global_footer' );
			$url5 = admin_url('post.php?post=' .$value5 . '&action=elementor');	
			
				if (! empty($value5) ) {
					
					$link5 = (' <a href="' . $url5 .'" target="_blank"> Template</a> ');	
					
			
			
				    $admin_bar->add_menu( array(
						'id'    => 'cento-global-footer',
						'parent' => 'cento-menu',
						'title' => 'Footer',
						'href'  =>  $url5,
				
				        'meta'  => array(
				            'title' => __('Footer'),
				            'class' => 'cento-admin-menu-sub cento-admin-menu-indent'
				        ),
					));	
			    }



			$value6 = Kirki::get_option( 'cento_kirki_id', 'cento_global_copyright' );
			$url6 = admin_url('post.php?post=' .$value6 . '&action=elementor');	
			
				if (! empty($value6) ) {
					
					$link6 = (' <a href="' . $url6 .'" target="_blank"> Template</a> ');	
					
			
			
				    $admin_bar->add_menu( array(
						'id'    => 'cento-global-copyright',
						'parent' => 'cento-menu',
						'title' => 'Copyright',
						'href'  =>  $url6,
				
				        'meta'  => array(
				            'title' => __('Copyright'),
				            'class' => 'cento-admin-menu-sub cento-admin-menu-indent'
				        ),
					));	
			    }



			$value7 = Kirki::get_option( 'cento_kirki_id', 'cento_global_left_sidebar' );
			$url7 = admin_url('post.php?post=' .$value7 . '&action=elementor');	
			
				if (! empty($value7) ) {
					
					$link7 = (' <a href="' . $url7 .'" target="_blank"> Template</a> ');	
					
			
			
				    $admin_bar->add_menu( array(
						'id'    => 'cento-global-left-sidebar',
						'parent' => 'cento-menu',
						'title' => 'Left Side Bar',
						'href'  =>  $url7,
				
				        'meta'  => array(
				            'title' => __('Left Side Bar'),
				            'class' => 'cento-admin-menu-sub cento-admin-menu-indent'
				        ),
					));	
			    }



			$value8 = Kirki::get_option( 'cento_kirki_id', 'cento_global_right_sidebar' );
			$url8 = admin_url('post.php?post=' .$value8 . '&action=elementor');	
			
				if (! empty($value8) ) {
					
					$link8 = (' <a href="' . $url8 .'" target="_blank"> Template</a> ');	
					
			
			
				    $admin_bar->add_menu( array(
						'id'    => 'cento-global-right-sidebar',
						'parent' => 'cento-menu',
						'title' => 'Right Side Bar',
						'href'  =>  $url8,
				
				        'meta'  => array(
				            'title' => __('Right Side Bar'),
				            'class' => 'cento-admin-menu-sub cento-admin-menu-indent'
				        ),
					));	
			    }




			$value9 = Kirki::get_option( 'cento_kirki_id', 'cento_global_slide_panel' );
			$url9 = admin_url('post.php?post=' .$value9 . '&action=elementor');	
			
				if (! empty($value9) ) {
					
					$link9 = (' <a href="' . $url9 .'" target="_blank"> Template</a> ');	
					
			
			
				    $admin_bar->add_menu( array(
						'id'    => 'cento-global-slide-panel',
						'parent' => 'cento-menu',
						'title' => 'Mobile Slide Panel',
						'href'  =>  $url9,
				
				        'meta'  => array(
				            'title' => __('Mobile Slide Panel'),
				            'class' => 'cento-admin-menu-sub cento-admin-menu-indent'
				        ),
					));	
			    }



			$value10 = Kirki::get_option( 'cento_kirki_id', 'cento_global_404' );
			$url10 = admin_url('post.php?post=' .$value10 . '&action=elementor');	
			
				if (! empty($value10) ) {
					
					$link10 = (' <a href="' . $url10 .'" target="_blank"> Template</a> ');	
					
			
			
				    $admin_bar->add_menu( array(
						'id'    => 'cento-global-404',
						'parent' => 'cento-menu',
						'title' => '404 Page',
						'href'  =>  $url10,
				
				        'meta'  => array(
				            'title' => __('404 Page'),
				            'class' => 'cento-admin-menu-sub cento-admin-menu-indent'
				        ),
					));	
			    }




			$value11 = Kirki::get_option( 'cento_kirki_id', 'cento_global_below_content' );
			$url11 = admin_url('post.php?post=' .$value11 . '&action=elementor');	
			
				if (! empty($value11) ) {
					
					$link11 = (' <a href="' . $url11 .'" target="_blank"> Template</a> ');	
					
			
			
				    $admin_bar->add_menu( array(
						'id'    => 'cento-global-below-content',
						'parent' => 'cento-menu',
						'title' => 'Below Main Content',
						'href'  =>  $url11,
				
				        'meta'  => array(
				            'title' => __('Below Main Content'),
				            'class' => 'cento-admin-menu-sub cento-admin-menu-indent'
				        ),
					));	
			    }






	
		
		}

	
	}

}