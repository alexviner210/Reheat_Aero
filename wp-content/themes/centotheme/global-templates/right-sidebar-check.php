<?php
/**
 * Right sidebar check.
 *
 * @package centotheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

</div><!-- #closing the primary container from /global-templates/left-sidebar-check.php -->

<?php 
$sidebar_pos = get_theme_mod( 'centotheme_sidebar_position' ); 
$sidebar_posblog = get_theme_mod( 'centotheme_sidebar_position_blog' ); 
$isblog = is_blog () ;

?>


<!--Cento Global Part #centocode -->
<?php
if( class_exists( 'Kirki' ) ) {
 $thisoption = Kirki::get_option( 'cento_kirki_id' , 'cento_global_right_sidebar' );		
}
?>


<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos || ! empty($thisoption) && 'none' != $sidebar_pos || $isblog == true && $sidebar_posblog =='right' || $isblog == true && $sidebar_posblog =='both') : ?>

	<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

<?php endif; ?>
