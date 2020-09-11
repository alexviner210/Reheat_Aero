<?php
/**
 * Left sidebar check.
 *
 * @package centotheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<?php
$sidebar_pos = get_theme_mod( 'centotheme_sidebar_position' );
$sidebar_posblog = get_theme_mod( 'centotheme_sidebar_position_blog' ); 
$isblog = is_blog () ;
?>

<!--Cento Global Part #centocode -->
<?php
if( class_exists( 'Kirki' ) ) {
	$thisoption = Kirki::get_option( 'cento_kirki_id' , 'cento_global_left_sidebar' );		
	$rightoption = Kirki::get_option( 'cento_kirki_id' , 'cento_global_right_sidebar' );
}
?>


<?php if ( 'left' === $sidebar_pos || 'both' === $sidebar_pos || ! empty($thisoption) && 'none' != $sidebar_pos || $isblog == true && $sidebar_posblog =='left' || $isblog == true && $sidebar_posblog =='both' ) : ?>
	<?php get_template_part( 'sidebar-templates/sidebar', 'left' ); ?>
<?php endif; ?>

<div class="col-md content-area" id="primary">
