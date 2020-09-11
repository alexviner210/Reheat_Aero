<?php
/**
   Cento Theme Page  / Quick Start
   @package centotheme
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	


// Load Options Page CSS
function cento_options_style() {
        wp_register_style( 'custom_options_css', get_template_directory_uri() . '/cento/css/options.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_options_css' );
}
add_action( 'admin_enqueue_scripts', 'cento_options_style' );







// 	Remove default Widgets on fresh install

$centodemo = get_option ( 'cento_demo_in_use') ;
$centodemochosen = get_option ( 'cento_demo_chosen') ;



function demo_page()  {

$centodemochosen = get_option ( 'cento_demo_chosen') ;
$baseplugincheck = cento_check_base_plugin ();

if ( $baseplugincheck ==1	 
	 ) {		 
		 $baseok = 1 ;		 
		} else {		 
		 $baseok = 0 ;		 
   }

?>

<div class="cento-admin-page wrap">
	<!--  wrap -->
	
	

	
	
	<div class="cento-admin-left">
		<div class="cento-options">
			<h1>Welcome to Cento Theme - Lets Get Started!</h1>
			
			<p>Hey! This page will take you through the <b>very easy</b> and <b>super quick</b> set up of the Cento Theme - just follow the 3 steps and you'l be ready to go!</p>
			
			<br>
		

			<div class="cento-admin-row">
				<h2>1. Watch the "2 Minute Set Up Tutorial"</h2>


				<div class="cento-admin-row-content">
					<p>In this video I'll give you a quick overview of Cento and take you through the process of getting the base plugins installed, choosing a Demo Template and how you can then customize our templates into  your epic website.</p>


					<div class='embed-container'>
						<iframe allowfullscreen frameborder='0' src='https://www.youtube.com/embed/rvBZv7hAf98?rel=0&amp;controls=0'></iframe>
					</div>
				</div>
			</div>


			<div class="cento-admin-row">
				<h2>2. Install the required "Base Plugins."</h2>


				<div class="cento-admin-row-content">


					<?php 					
										
						
					                                                
                    if ( $baseok==1 ) { ?>
                    
                    

					<h3><i>**Awesome, Base Plugins installed! - now go to Step 3 and choose a Demo Template to import!</i></h3>

					
					<?php } else { ?>

					<p>The Cento is a lightweight theme and only needs a few tried and tested plugins to provide all the flexibility and functionality you'll need for almost any project - get these babies installed sharpish! </p>
					
					<?php
					add_thickbox();
					
					
					$url = add_query_arg( array(
						'action'    => 'foo_modal_box',
						'TB_iframe' => 'true',
						'width'     => '600',
						'height'    => '500'
						), 
					    admin_url( 'admin.php?page=install_plugin' ) );
					
					echo '<a href="' . $url . '" class="cento-options-button thickbox">' . __( 'Install Base Plugins ', 'foo' ) . '<span class="dashicons dashicons-admin-plugins"></a>';
																																	
					
					function foo_render_action_page() {
					define( 'IFRAME_REQUEST', true );
					iframe_header('This that');
					
					// ... your content here ...					
					
					
					iframe_footer();
					exit;
					}
					add_action( 'admin_action_foo_modal_box', 'foo_render_action_page' );
					
					?>					
					
					
					<?php } ?>
				</div>
			</div>


			<div class="cento-admin-row">
				<h2>3. Choose and Import a Demo Site Template.</h2>


				<div class="cento-admin-row-content">
				
					
					<p>Choose a <b>"Blank Starter Template"</b> to get you flying out of the traps for you own Custom Design, or try a <b>"Full Site Template"</b>, get tweaking, and have a finished site in hours not days.  Word.</p>




					<?php 
						
					$centodemo = get_option ( 'cento_demo_in_use') ;
					
					
					
					if (  $baseok != 1  ) 
					
					   {
							
					        ?> <p><i> - You'll be able to select a Template once you've completed Step 1.</i></p>	<?php
							
						}
						
						
						
						
					else if (  $centodemo==""  ) 
					
					    { ?>
							
							<a class="cento-options-button" href="<?php echo (admin_url( 'themes.php?page=pt-one-click-demo-import' )); ?>">Choose a Demo Template <span class="dashicons dashicons-arrow-right-alt"></a>
						
						<?php
						}
						
						
						
					
					
					
					else { 
						
						
						echo('<h3><i>**All Plugins Installed for the imported Template! (Demo No.' . $centodemo . ') - time to get theming!</i></h3>');
						?>
						<a class="" href="<?php echo (admin_url( 'themes.php?page=pt-one-click-demo-import' )); ?>">Or Choose a Different Template</a>
					
					<?php	
					}
					
					
					?>	

			
					
					
				</div>
			</div>


			<div ID="get-theming" class="cento-admin-row">
				<h2>4. Now Get Theming!</h2>


				<div class="cento-admin-row-content">
					<p>Check out some of these selected Cento Tutorials to give you just enough knowledge to be dangerous!  For more Tips and Tutorials  - <a class="" href="https://centotheme.com/tutorials?utm_source=centotheme&utm_medium=themepage" target="_blank">View all the Tutorial Here</a></p>


					<div class="cento-admin-row-3">
						<div class='embed-container'>
							<iframe allowfullscreen frameborder='0' src='https://www.youtube.com/embed/ojoNLRXCzes?rel=0&amp;showinfo=0'></iframe>
						</div>
					</div>


					<div class="cento-admin-row-3">
						<div class='embed-container'>
							<iframe allowfullscreen frameborder='0' src='https://www.youtube.com/embed/YQl9pJ3tqP4?rel=0&amp;showinfo=0'></iframe>
							
							
						</div>
					</div>


					<div class="cento-admin-row-3">
						<div class='embed-container'>
							<iframe allowfullscreen frameborder='0' src='https://www.youtube.com/embed/mrig8Ee01GU?rel=0&amp;showinfo=0'></iframe> 
						
						</div>
					</div>
				</div>
				
				
				<div class="cento-admin-row-content">


					<div class="cento-admin-row-3">
						<div class='embed-container'>
							<iframe allowfullscreen frameborder='0' src='https://www.youtube.com/embed/0XUHv3FeQI8?rel=0&amp;showinfo=0'></iframe>
						</div>
					</div>


					<div class="cento-admin-row-3">
						<div class='embed-container'>
							<iframe allowfullscreen frameborder='0' src='https://www.youtube.com/embed/nsOnXrsA9Ys?rel=0&amp;showinfo=0'></iframe>
						</div>
					</div>


					<div class="cento-admin-row-3">
						<div class='embed-container'>
							<iframe allowfullscreen frameborder='0' src='https://www.youtube.com/embed/uVXM6c_c9zg?rel=0&amp;showinfo=0'></iframe>
						</div>
					</div>
				</div>								
				
				
			</div>
			
			
			<br>
			<br>
			<br>
			<br>


			
			
			
		</div>
	</div>
	<!-- end left section -->


	<div class="cento-admin-right">
		<!-- start right section -->


		<div class="cento-admin-right-box">
			<h3><strong>Help & Support</strong>
			</h3>

			<hr style="border: 0; background-color: #DFDFDF; height: 1px;">


			<p>For Tips and Tutorials visit - <a class="" href="https://centotheme.com/tutorials?utm_source=centothemefree&utm_medium=themepage" target="_blank">View all the Tutorial Here <span class="dashicons dashicons-external"></span></a> </p>
			
			<p>Watch an end-to-end site build here: <a class="" href="http://jakson.co/full-build-from-ready-made-design?utm_source=centothemefree&utm_medium=themepage" target="_blank">How to Build a WordPress Website with Cento Theme <span class="dashicons dashicons-external"></span></a>.</p>


			<p>Need some Help? - <a class="" href="http://jakson.co/forums/?utm_source=centothemefree&utm_medium=themepage" target="_blank">Visit the Support Forums here for fast answers <span class="dashicons dashicons-external"></span></a></p>

			
			<br>



			<h3><strong>CENTO PRO*</strong></h3>
			<p>*Coming soon...</p>
			

			<hr style="border: 0; background-color: #DFDFDF; height: 1px;">


			<p>The Free Cento Theme is awesome - Cento Pro will give you even more possibilities to explore your creativity.</p>
			
			<p>Pro comes with all the same features as Cento, but has dozens more <b>Full Site Templates</b> plus a suite of hand picked <b>Premium Plugins</b> included in the price - <a class="" href="http://jakson.co/cento-pro?utm_source=centothemefree&utm_medium=themepage" target="_blank">find out more, have your say and get a pre-launch discount here! <span class="dashicons dashicons-external"></span></a></p>
 



			<p><strong>Cento Pro Features:</strong>
			</p>


			<ul>
				<li>
					<strong>Exclusive Full Site One-click Demos</strong>

					<ul>
						<li>New Templates every week</li>
						
						<li>Specialist Template "Editions" for WooCommerce, Memberships, News & Magazine Sites, Listings, bbPress, LMS, Real Estate and loads more</li>

					</ul>
				</li>


				<li>
					<strong>Premium Plugins, including:</strong>

					<ul>

						<li>Element Pack - Pro Addon for Free Elementor (110+ elements)</li>



						<li>Slider Revolution</li>


						<li>Essential Grid</li>


<!--
						<li>WPBakery Page Builder</li>
						

						<li>Ultimate Addons for WPBakery Page Builder</li>
-->

					</ul>
				</li>


				<li><strong>Dedicated One-on-One Support Team</strong>
				</li>


				</li>
				
				
				<li><strong>14 Day No Questions Money Back Guarantee</strong>
				</li>
								
			</ul>
			<br>

			
			<div>
				<center><a class="cento-options-button" href="http://jakson.co/cento-pro?utm_source=centothemefree&utm_medium=themepage" target="_blank">PRO INFO HERE <span class="dashicons dashicons-external"></span></a></center>
			</div>		
			
			
			<br>
			<br>

			


		</div>
	</div>
	<!-- end right section -->
</div>
<!-- end wrap -->

   <?php
}

function menu_item()
{
  add_submenu_page("themes.php", "Cento Theme", "Cento Theme Start", "manage_options", "cento-theme", "demo_page"); 
  
}
 
add_action("admin_menu", "menu_item");



$freshsite = get_option ( 'fresh_site') ;

if ($freshsite ==1) {

	add_filter( 'sidebars_widgets', 'disable_all_widgets' );
	
	function disable_all_widgets( $sidebars_widgets ) {
	
	  $sidebars_widgets = array( false );
	
	  return $sidebars_widgets;
	}
	
} 