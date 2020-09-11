<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package centotheme
 * #centocode
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'centotheme_container_type' );
$sidebar_pos = get_theme_mod( 'centotheme_sidebar_position' );

?>

<div class="wrapper" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found">
						
		

		
					
						
						<?php 
							
							if( class_exists( 'Kirki' ) ) {
							 $thisoption = Kirki::get_option( 'cento_kirki_id' , 'cento_global_404' );
							}
						
							if (! empty($thisoption) ) {
								
							  ?>
									
							    <div class="<?php echo esc_attr( $container ); ?> global-part global-part-404">
									
							<?php 	echo do_shortcode('[INSERT_ELEMENTOR id="' . $thisoption . '"]'); 
								
							?> </div> <?php
								
								
							} else {
							

							?>
	

	
						
						

						<header class="page-header default-404">  <!-- #centocode -->

							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'centotheme' ); ?></h1>

						</header><!-- .page-header -->

						<div class="page-content">

							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'centotheme' ); ?></p>

							<?php get_search_form(); ?>

							<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

							<?php if ( centotheme_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>

								<div class="widget widget_categories">

									<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'centotheme' ); ?></h2>

									<ul>
										<?php
										wp_list_categories(
											array(
												'orderby'    => 'count',
												'order'      => 'DESC',
												'show_count' => 1,
												'title_li'   => '',
												'number'     => 10,
											)
										);
										?>
									</ul>

								</div><!-- .widget -->

							<?php endif; ?>

							<?php

							/* translators: %1$s: smiley */
							$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'centotheme' ), convert_smilies( ':)' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

							the_widget( 'WP_Widget_Tag_Cloud' );
							?>

						</div><!-- .page-content -->


						<?php	} //end if elementor template
						
						?>							


					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php get_footer(); ?>
