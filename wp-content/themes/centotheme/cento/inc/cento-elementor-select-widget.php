<?php
/*

*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	


// The widget class
class Elementor_Select_Widget extends WP_Widget {

	// Main constructor
	public function __construct() {
		parent::__construct(
			'Elementor_Select_Widget',
			__( 'Elementor Template', 'centotheme' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}

	// The widget form (for the backend )
	public function form( $instance ) {

		// Set widget defaults
		$defaults = array(
			'title'    => '',
			'text'     => '',
			'textarea' => '',
			'checkbox' => '',
			'select'   => '',
		);
		
		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

		<?php // Widget Title ?>

		<?php // Dropdown ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'select' ); ?>"><?php _e( 'Choose Elementor Template', 'centotheme' ); ?></label>
			
		
<!--
		<select class="cento-partsdrop" name='globalparts_settings[globalparts_select_field_0]'>
		<option></option>
		
		<?php
		global $post;
		$args = array( 
		'numberposts' => -1,
		'post_type'=> 'elementor_library', 'orderby'=> 'title', 'order' => 'ASC'
		
		);
		
		$posts = get_posts($args);

		$selected = $options['globalparts_select_field_0'];
		foreach( $posts as $post ) : setup_postdata($post); ?>
		    <option value="<?php echo $post->ID; ?>" <?php selected( $post->ID , $selected ); ?>><?php the_title(); ?></option>
		    
		    
		<?php endforeach; ?>
		</select>			
-->
			
	
			
			<select name="<?php echo $this->get_field_name( 'select' ); ?>" id="<?php echo $this->get_field_id( 'select' ); ?>" class="widefat">
			<option></option>
			<?php
			// Your options array
			
			global $post;
			$options = array( 
			'numberposts' => -1,
			'post_type'=> 'elementor_library', 'orderby'=> 'title', 'order' => 'ASC'
			
			);
			
		    $posts = get_posts($args);

			$selected = $select ;
			foreach( $posts as $post ) : setup_postdata($post); ?>
			    <option value="<?php echo $post->ID; ?>" <?php selected( $post->ID , $selected ); ?>><?php the_title(); ?></option>
			    
			    
			<?php endforeach; ?>
			
			
			</select>			
			
			
			<?php
	
			$url = admin_url('post.php?post=' . $select . '&action=elementor');	
			
			if (! empty($select) ) {
				
			echo (' <p><a href="' . $url .'" target="_blank"> Edit Template</a> </p>');	
				
			}
			
			
			?>			
				
			
			
			
		</p>

	<?php }

	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['text']     = isset( $new_instance['text'] ) ? wp_strip_all_tags( $new_instance['text'] ) : '';
		$instance['textarea'] = isset( $new_instance['textarea'] ) ? wp_kses_post( $new_instance['textarea'] ) : '';
		$instance['checkbox'] = isset( $new_instance['checkbox'] ) ? 1 : false;
		$instance['select']   = isset( $new_instance['select'] ) ? wp_strip_all_tags( $new_instance['select'] ) : '';
		return $instance;
	}

	// Display the widget
	public function widget( $args, $instance ) {

		extract( $args );

		// Check the widget options
		$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		$text     = isset( $instance['text'] ) ? $instance['text'] : '';
		$textarea = isset( $instance['textarea'] ) ?$instance['textarea'] : '';
		$select   = isset( $instance['select'] ) ? $instance['select'] : '';
		$checkbox = ! empty( $instance['checkbox'] ) ? $instance['checkbox'] : false;

		// WordPress core before_widget hook (always include )
		echo $before_widget;

		// Display the widget
		echo '<div class="widget-text wp_widget_plugin_box">';

			// Display widget title if defined
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}

			// Display text field
			if ( $text ) {
				echo '<p>' . $text . '</p>';
			}

			// Display textarea field
			if ( $textarea ) {
				echo '<p>' . $textarea . '</p>';
			}
			
		
			

			// Display select field
			if ( $select ) {
// 				echo '<p>' . $select . '</p>';
				
				
				echo do_shortcode('[INSERT_ELEMENTOR id="' . $select . '"]');
			}





			// Display something if checkbox is true
			if ( $checkbox ) {
				echo '<p>Something awesome</p>';
			}

		echo '</div>';

		// WordPress core after_widget hook (always include )
		echo $after_widget;

	}

}

// Register the widget
function my_register_custom_widget() {
	register_widget( 'Elementor_Select_Widget' );
}
add_action( 'widgets_init', 'my_register_custom_widget' );