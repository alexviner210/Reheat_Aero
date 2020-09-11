<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	



		if ( ! empty( $pagecss ) ) {
		    echo('<style>'		    
		    				
				  . $pagecss .
				    
		    	'</style>'
		    
	    
		    );
		} ;		



// Add scripts to wp_head()
function child_theme_head_script() {
	
	$hidetopow = rwmb_meta( 'centov2-hide_toprow' ) ;
	$navactivecol = rwmb_meta( 'centov2-nav_text_high_color' ) ;
	$navcol = rwmb_meta( 'centov2-nav_text_color' ) ;
	
	
	$onoff = rwmb_meta( 'centov2-content_behind_on' ) ;	
	$top_offset = rwmb_meta( 'centov2-top_offset' ) ;	
    $text_logo = rwmb_meta( 'centov2-text_logo' ) ;
    $mainhidetop = get_theme_mod('hide_toprow');
    $mainhidenav = get_theme_mod('hide_nav');
    $mainfixleftbar = get_theme_mod('fix-left-sidebar'); 
    $hidetopglobal = rwmb_meta( 'prefix-hide_checkbox_1' ) ;
    $sidebar_pos = get_theme_mod( 'centotheme_sidebar_position' );



if( class_exists( 'Kirki' ) ) {
 $navbgcol = Kirki::get_option( 'cento_kirki_id' , 'color_navbar' );		
}



	
	if ( 'left' === $sidebar_pos ) {    

		echo('<style>	
		
		.single-post #primary, .blog #primary, .archive #primary, .search #primary {
		   
		   padding: 10px;
		   }		
		     </style>' );
		
	}
    
    
	if( class_exists( 'Kirki' ) ) {
	 $leftminwidth = Kirki::get_option( 'cento_kirki_id' , 'fix-left-sidebar' );
	 $leftminat = Kirki::get_option( 'cento_kirki_id' , 'sidebar_max_width' );
	 
	}
	

		if ( ! empty( $leftminwidth ) ) {
		    echo('<style>'		    
		    				
				  .
				  
						 '@media (max-width: ' . $leftminat . ') {
						
						
							#left-sidebar,#left-sidebar .elementor  {
								max-width: ' . $leftminwidth . '!important;
							}
						
						}'
				  
				  .
				    
		    	'</style>'
		    
	    
		    );
		} ;	   
    


		if ( 'left' === $sidebar_pos || 'both' === $sidebar_pos ) {    
			
		}    
    



	$pagecss = rwmb_meta( 'centov2-css_textarea_1' ) ;


		if ( ! empty( $pagecss ) ) {
		    echo('<style>'		    
		    				
				  . $pagecss .
				    
		    	'</style>'
		    
	    
		    );
		} ;	








		if ( ! empty( $onoff) ) {
		    echo('<style>		    
		    

		    		.page-template #wrapper-navbar, .post-template #wrapper-navbar, #wrapper-navbar, #wrapper-navbar nav.bg-primary
		    		
		    		  {position: absolute;width: 100%; z-index: 1;}
		    		
		    		.page-template  #wrapper-navbar nav.bg-primary, .post-template  #wrapper-navbar nav.bg-primary, #wrapper-navbar, #wrapper-navbar nav.bg-primary
		    		
		    		  {background-color: transparent !important;}
		    		

					#archive-wrapper,#search-wrapper {
						padding-top: 60px;
					}
					




		    		
		 	/*		.elementor-html #full-width-page-wrapper {margin-top: -106px;} 
		 			
		 			.elementor-html #wrapper-navbar {margin-top: 26px;} */


			/*		 #full-width-page-wrapper, #index-wrapper, #page-wrapper, #search-wrapper, #single-wrapper, #archive-wrapper {
						padding-top: 0 !important;
					} */



		    		
		    		.navbar.navbar-expand-md.navbar-dark.bg-dark, #wrapper-navbar, div#wrapper-navbar {z-index: 1;background: transparent !important;}
		    		
		    		.elementor-html .elementor-container.elementor-column-gap-default{z-index: 2;}
		    		
		    		
		    /*		.elementor-editor-preview {padding-top: 80px; } */
		    		
		    		

		    		
		    		
		    		
		    		    
					.current_page_item .nav-link{color: ' . $navactivecol .' !important;}
		    
					.nav-link, .slide-float.js-toggleSidebar {color: ' . $navcol .' !important;}
					
					.navbar-brand{color: ' . $text_logo .' !important;}
					
					#wrapper-navbar .navbar.navbar-expand-md.navbar-dark.bg-primary.myfixed {background: ' . $navbgcol .' !important;}
						
					
		    
		    	</style>'
		    
		    
		    
		    
		    
		    );
		} ;		
	


		if ( ! empty( $hidetopow ) ) {
		    echo('<style>		    
		    				
				    #wrapper-toprow, .global-part-top-row {display: none;}
				    
		    	</style>'
		    
	    
		    );
		} ;	



		if ( ! empty( $mainhidetop ) ) {
		    echo('<style>		    
		    				
				    @media (max-width: 540px) { #wrapper-toprow, .global-part-top-row  { display: none; } }
				    
		    	</style>'
		    
	    
		    );
		} ;	

		if ( ! empty( $mainhidenav ) ) {
		    echo('<style>		    
		    				
				    @media (min-width: 768px) { #wrapper-navbar  { display: none; } }
				    
				    @media (max-width: 767px) { #left-sidebar { display: none;} }

					
/*
					@media (min-width: 768px) { #content{margin-top: 60px;} }
					
					@media (max-width: 767px) { #content{margin-top: 20px;} }
					
					.elementor-editor-active  #left-sidebar{margin-top: 30px;
*/

				    
		    	</style>'
		    
		    );
		} ;	
		
		


	
}
add_action( 'wp_head', 'child_theme_head_script' );



// 		    		#wrapper-toprow {display: none;}
	