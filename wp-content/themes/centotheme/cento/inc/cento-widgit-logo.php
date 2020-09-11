<?php
// Creating the widget 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	


class centotheme_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'centotheme_widget', 

// Widget name 
__('Logo Widget', 'centotheme'), 

// Widget description
array( 'description' => __( 'Add the Logo to any Widget Area', 'centotheme' ), ) 
);
}



// Widget front-end
public function widget( $args, $instance ) {

echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];



		?>			
		
		
		
		<?php if ( ! has_custom_logo() ) { ?>

				<?php if ( is_front_page() && is_home() ) : ?>

					<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					
				<?php else : ?>

					<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				
				<?php endif; ?>
				
					
		<?php } else {
			
			the_custom_logo();
			
		} ?><!-- end custom logo -->




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
} // Class centotheme_widget ends here

// Register and load the widget
function centotheme_load_widget() {
	register_widget( 'centotheme_widget' );
}
add_action( 'widgets_init', 'centotheme_load_widget' );