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

<?php if ( is_active_sidebar( 'sidebar-blogfooter' ) ) : ?>

	<!-- ******************* Blog Footer Widget Area ******************* -->

	<div class="wrapper" id="wrapper-blogfooter">

		<div class="<?php echo esc_attr( $container ); ?> blogfooter-content" id="blogfooter-content" tabindex="-1">

			<div class="row">

				<?php dynamic_sidebar( 'sidebar-blogfooter' ); ?>

			</div>

		</div>

	</div><!-- #wrapper-blogfooter -->

<?php endif; ?>
