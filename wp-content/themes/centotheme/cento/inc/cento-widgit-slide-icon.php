<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
// Creating the widget 
class centotheme_slide_icon_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'centotheme_slide_icon_widget', 

// Widget name 
__('Slide Panel Button', 'centotheme'), 

// Widget description
array( 'description' => __( 'Add the Slide Panel Button Icon to any Widget Area', 'centotheme' ), ) 
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


	    <?php get_template_part( 'cento/templates/slide-panel'); ?>	

<div class="slide-widget-icon">
		<?php get_template_part( 'cento/templates/mobile-nav-menu-button'); ?>	
</div>


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
} // Class centotheme_slide_icon_widget ends here

// Register and load the widget
function centotheme_load_slide_icon_widget() {
	register_widget( 'centotheme_slide_icon_widget' );
}
add_action( 'widgets_init', 'centotheme_load_slide_icon_widget' );