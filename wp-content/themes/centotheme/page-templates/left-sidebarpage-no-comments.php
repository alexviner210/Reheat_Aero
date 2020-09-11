<?php
/**
 * Template Name: Left Sidebar - no comments
 * Template Post Type: post, page, forum, topic, llms_membership, course, lesson
 * This template can be used to override the default template and sidebar setup
 *
 * @package centotheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'centotheme_container_type' );

// Cento Global Part #centocode
if( class_exists( 'Kirki' ) ) {
	$thisoption = Kirki::get_option( 'cento_kirki_id' , 'cento_global_left_sidebar' );		
}


?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<?php get_template_part( 'sidebar-templates/sidebar', 'left' ); ?>

			<div
				class="<?php if ( is_active_sidebar( 'left-sidebar' ) || ! empty($thisoption) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?> content-area"
				id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>







					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->
				
				
				<!-- Cento Below Main Content  #centocode -->	
				<?php $hidebelowcontent = rwmb_meta( 'hideglobal-hide_checkbox_7' ) ;
					
					if ( $hidebelowcontent != 1 ) {
				
					get_template_part( 'cento/sidebars/sidebar-below-content');	
				
				    } ?>	


			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
