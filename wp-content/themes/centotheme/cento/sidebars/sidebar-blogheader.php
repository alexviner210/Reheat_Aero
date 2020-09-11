<?php
/**
 * Sidebar setup for Top Row.
 *
 * @package centotheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container   = get_theme_mod( 'centotheme_container_type' );

?>

<?php if ( is_active_sidebar( 'sidebar-blogheader' ) ) : ?>

	<!-- ******************* Blog Header Widget Area ******************* -->

	<div class="wrapper" id="wrapper-blogheader">

<!-- 		<div class="<?php echo esc_attr( $container ); ?>" id="blogheader-content" tabindex="-1"> -->
		<div class="blogheader-content" id="blogheader-content" tabindex="-1">

			<div class="row">

				<?php dynamic_sidebar( 'sidebar-blogheader' ); ?>

			</div>

		</div>

	</div><!-- #wrapper-blogheader -->

<?php endif; ?>
