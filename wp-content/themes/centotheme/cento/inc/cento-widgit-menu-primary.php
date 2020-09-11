<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	

// Creating the widget 
class centotheme_primary_menu_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'centotheme_primary_menu_widget', 

// Widget name 
__('Primary Menu', 'centotheme'), 

// Widget description
array( 'description' => __( 'Add the Primary Menu to any Widget Area', 'centotheme' ), ) 
);
}



// Widget front-end
public function widget( $args, $instance ) {
// $title = apply_filters( 'widget_title', $instance['title'] );


echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];



$container = get_theme_mod( 'centotheme_container_type' );
?>




	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'centotheme' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-dark bg-primary cento-menu-widget">

		<?php if ( 'container' == $container ) : ?>
			<div class="container" >
		<?php endif; ?>





<!-- 		<?php get_template_part( 'cento/templates/mobile-nav-menu-button'); ?>	 -->

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new centotheme_WP_Bootstrap_Navwalker(),
					)
				); ?>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->






<?php

}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'centotheme' );
}
// Widget admin form
?>
<?php 
}
	
// Updating widget 
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class centotheme_primary_menu_widget ends here

// Register and load the widget
function centotheme_load_primary_menu_widget() {
	register_widget( 'centotheme_primary_menu_widget' );
}
add_action( 'widgets_init', 'centotheme_load_primary_menu_widget' );