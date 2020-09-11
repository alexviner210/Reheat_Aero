<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package centotheme
 * #centocode
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'centotheme_container_type' );

$hideabovefooter = rwmb_meta( 'hideglobal-hide_checkbox_3' ) ;

$hidefooter = rwmb_meta( 'hideglobal-hide_checkbox_4' ) ;

$hidecopyright = rwmb_meta( 'hideglobal-hide_checkbox_5' ) ;



?>

<?php if ( $hideabovefooter != 1 ) {

 get_template_part( 'cento/sidebars/sidebar-abovefooter'); 
 
 } ?>


<?php if ( $hidefooter != 1 ) {

get_template_part( 'cento/sidebars/sidebar-footer');
 
} ?>



<?php if ( $hidecopyright != 1 ) {
	
get_template_part( 'cento/sidebars/sidebar-copyright'); 

} ?>




<div><a href="#top" id="scrolltop" title="Back to top"></a></div>

<?php wp_footer(); ?>

</body>

</html>
