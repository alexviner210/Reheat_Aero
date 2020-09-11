<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Creating the widget 

class centotheme_title_widget extends WP_Widget {
	


function __construct() {
parent::__construct(
// Base ID of your widget
'centotheme_title_widget', 

// Widget name 
__('Post Title Widget', 'centotheme'), 

// Widget description
array( 'description' => __( 'Add the Post Title to any Widget Area', 'centotheme' ), ) 
);
}



// Widget front-end
public function widget( $args, $instance ) {
// $title = apply_filters( 'widget_title', $instance['title'] );


echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

global $post;
$post_id = $post->ID; ?>

<h1 class="cento-post-title-widget"> <?php echo get_the_title( $post_id ); ?>  </h1>


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
} // Class centotheme_title_widget ends here

// Register and load the widget
function centotheme_load_title_widget() {
	register_widget( 'centotheme_title_widget' );
}
add_action( 'widgets_init', 'centotheme_load_title_widget' );