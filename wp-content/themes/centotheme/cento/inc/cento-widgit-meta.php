<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	

// Creating the widget 
class centotheme_meta_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'centotheme_meta_widget', 

// Widget name 
__('Single Post Meta Widget', 'centotheme'), 

// Widget description
array( 'description' => __( 'Add the Post Meta to any Widget Area', 'centotheme' ), ) 
);
}



// Widget front-end
public function widget( $args, $instance ) {
// $title = apply_filters( 'widget_title', $instance['title'] );


echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];


?>
		<div class="entry-meta">

			<?php centotheme_posted_on(); ?>

	
	
		</div><!-- .entry-meta --> 
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
} // Class centotheme_meta_widget ends here

// Register and load the widget
function centotheme_load_meta_widget() {
	register_widget( 'centotheme_meta_widget' );
}
add_action( 'widgets_init', 'centotheme_load_meta_widget' );