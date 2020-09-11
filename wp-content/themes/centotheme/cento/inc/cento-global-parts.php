<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}	

add_action( 'admin_menu', 'centotheme_add_parts_menu' );
add_action( 'admin_init', 'globalparts_settings_init' );


function centotheme_add_parts_menu(  ) { 

  add_submenu_page( 'themes.php', 'Global Parts', 'Global Parts', 'manage_options', 'global_parts', 'cento_global_parts' );


}


function globalparts_settings_init(  ) { 

	register_setting( 'centoglobals', 'globalparts_settings' );

	add_settings_section(
		'centoglobals_section', 
		__( '', 'centotheme' ), 
		'globalparts_settings_section_callback', 
		'centoglobals'
	);

	add_settings_field( 
		'globalparts_select_field_0', 
		__( 'Top Row', 'centotheme' ), 
		'globalparts_select_field_0_render', 
		'centoglobals', 
		'centoglobals_section' 
	);
	
	add_settings_field( 
		'globalparts_select_field_1', 
		__( 'Below Header', 'centotheme' ), 
		'globalparts_select_field_1_render', 
		'centoglobals', 
		'centoglobals_section' 
	);

	add_settings_field( 
		'globalparts_select_field_2', 
		__( 'Above Footer', 'centotheme' ), 
		'globalparts_select_field_2_render', 
		'centoglobals', 
		'centoglobals_section' 
	);

	add_settings_field( 
		'globalparts_select_field_3', 
		__( 'Footer', 'centotheme' ), 
		'globalparts_select_field_3_render', 
		'centoglobals', 
		'centoglobals_section' 
	);

	add_settings_field( 
		'globalparts_select_field_4', 
		__( 'Copyright', 'centotheme' ), 
		'globalparts_select_field_4_render', 
		'centoglobals', 
		'centoglobals_section' 
	);

	add_settings_field( 
		'globalparts_select_field_5', 
		__( 'Left Sidebar', 'centotheme' ), 
		'globalparts_select_field_5_render', 
		'centoglobals', 
		'centoglobals_section' 
	);

	add_settings_field( 
		'globalparts_select_field_6', 
		__( 'Right Sidebar', 'centotheme' ), 
		'globalparts_select_field_6_render', 
		'centoglobals', 
		'centoglobals_section' 
	);

	add_settings_field( 
		'globalparts_select_field_7', 
		__( 'Slide Panel', 'centotheme' ), 
		'globalparts_select_field_7_render', 
		'centoglobals', 
		'centoglobals_section' 
	);
	
	
	
	add_settings_field( 
		'globalparts_select_field_8', 
		__( '404 Page', 'centotheme' ), 
		'globalparts_select_field_8_render', 
		'centoglobals', 
		'centoglobals_section' 
	);

/*
	add_settings_field( 
		'globalparts_select_field_8', 
		__( 'Blog Header', 'centotheme' ), 
		'globalparts_select_field_8_render', 
		'centoglobals', 
		'centoglobals_section' 
	);

	add_settings_field( 
		'globalparts_select_field_9', 
		__( 'Blog Footer', 'centotheme' ), 
		'globalparts_select_field_9_render', 
		'centoglobals', 
		'centoglobals_section' 
	);
*/

}


function globalparts_select_field_0_render(  ) { 

	$options = get_option( 'globalparts_settings' );
	?>
				
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
		


		<?php
		$savedoptions = get_option ( 'globalparts_settings') ;
        $thisoption = $savedoptions['globalparts_select_field_0'];	
        $thisoption = preg_replace('/[^0-9]/', '', $thisoption);		
		$url = admin_url('post.php?post=' .$thisoption . '&action=elementor');	
		
		if (! empty($thisoption) ) {
			
		echo (' <a href="' . $url .'" target="_blank"> Edit Template</a> ');	
			
		}


?>



<?php

}


function globalparts_select_field_1_render(  ) { 

	$options = get_option( 'globalparts_settings' );
	?>
				
		<select class="cento-partsdrop" name='globalparts_settings[globalparts_select_field_1]'>
			
		<option></option>
			
		<?php
		global $post;
		$args = array( 
		'numberposts' => -1,
		'post_type'=> 'elementor_library', 'orderby'=> 'title', 'order' => 'ASC'
		
		);
		
		$posts = get_posts($args);
		$selected = $options['globalparts_select_field_1'];
		foreach( $posts as $post ) : setup_postdata($post); ?>
		    
		    <option value="<? echo $post->ID; ?>" <?php selected( $post->ID , $selected ); ?>><?php the_title(); ?></option>
		    
		    
		<?php endforeach; ?>
		</select>
		


		<?php
		$savedoptions = get_option ( 'globalparts_settings') ;
        $thisoption = $savedoptions['globalparts_select_field_1'];	
        $thisoption = preg_replace('/[^0-9]/', '', $thisoption);		
		$url = admin_url('post.php?post=' .$thisoption . '&action=elementor');	
		
		if (! empty($thisoption) ) {
			
		echo (' <a href="' . $url .'" target="_blank"> Edit Template</a> ');	
			
		}


?>



<?php

}


function globalparts_select_field_2_render(  ) { 

	$options = get_option( 'globalparts_settings' );
	?>
				
		<select class="cento-partsdrop" name='globalparts_settings[globalparts_select_field_2]'>
		<option></option>
		
		<?php
		global $post;
		$args = array( 
		'numberposts' => -1,
		'post_type'=> 'elementor_library', 'orderby'=> 'title', 'order' => 'ASC'
		
		);
		
		$posts = get_posts($args);

		$selected = $options['globalparts_select_field_2'];
		foreach( $posts as $post ) : setup_postdata($post); ?>
		    <option value="<? echo $post->ID; ?>" <?php selected( $post->ID , $selected ); ?>><?php the_title(); ?></option>
		    
		    
		<?php endforeach; ?>
		</select>
		


		<?php
		$savedoptions = get_option ( 'globalparts_settings') ;
        $thisoption = $savedoptions['globalparts_select_field_2'];	
        $thisoption = preg_replace('/[^0-9]/', '', $thisoption);		
		$url = admin_url('post.php?post=' .$thisoption . '&action=elementor');	
		
		if (! empty($thisoption) ) {
			
		echo (' <a href="' . $url .'" target="_blank"> Edit Template</a> ');	
			
		}


?>



<?php

}

function globalparts_select_field_3_render(  ) { 

	$options = get_option( 'globalparts_settings' );
	?>
				
		<select class="cento-partsdrop" name='globalparts_settings[globalparts_select_field_3]'>
		<option></option>
			
		<?php
		global $post;
		$args = array( 
		'numberposts' => -1,
		'post_type'=> 'elementor_library', 'orderby'=> 'title', 'order' => 'ASC'
		
		);
		
		$posts = get_posts($args);

		$selected = $options['globalparts_select_field_3'];
		foreach( $posts as $post ) : setup_postdata($post); ?>
		    <option value="<? echo $post->ID; ?>" <?php selected( $post->ID , $selected ); ?>><?php the_title(); ?></option>
		    
		    
		<?php endforeach; ?>
		</select>
		


		<?php
		$savedoptions = get_option ( 'globalparts_settings') ;
        $thisoption = $savedoptions['globalparts_select_field_3'];	
        $thisoption = preg_replace('/[^0-9]/', '', $thisoption);		
		$url = admin_url('post.php?post=' .$thisoption . '&action=elementor');	
		
		if (! empty($thisoption) ) {
			
		echo (' <a href="' . $url .'" target="_blank"> Edit Template</a> ');	
			
		}


?>



<?php

}

function globalparts_select_field_4_render(  ) { 

	$options = get_option( 'globalparts_settings' );
	?>
				
		<select class="cento-partsdrop" name='globalparts_settings[globalparts_select_field_4]'>
		<option></option>
			
		<?php
		global $post;
		$args = array( 
		'numberposts' => -1,
		'post_type'=> 'elementor_library', 'orderby'=> 'title', 'order' => 'ASC'
		
		);
		
		$posts = get_posts($args);

		$selected = $options['globalparts_select_field_4'];
		foreach( $posts as $post ) : setup_postdata($post); ?>
		    <option value="<? echo $post->ID; ?>" <?php selected( $post->ID , $selected ); ?>><?php the_title(); ?></option>
		    
		    
		<?php endforeach; ?>
		</select>
		


		<?php
		$savedoptions = get_option ( 'globalparts_settings') ;
        $thisoption = $savedoptions['globalparts_select_field_4'];	
        $thisoption = preg_replace('/[^0-9]/', '', $thisoption);		
		$url = admin_url('post.php?post=' .$thisoption . '&action=elementor');	
		
		if (! empty($thisoption) ) {
			
		echo (' <a href="' . $url .'" target="_blank"> Edit Template</a> ');	
			
		}


?>



<?php

}

function globalparts_select_field_5_render(  ) { 

	$options = get_option( 'globalparts_settings' );
	?>
				
		<select class="cento-partsdrop" name='globalparts_settings[globalparts_select_field_5]'>
		<option></option>
		
		<?php
		global $post;
		$args = array( 
		'numberposts' => -1,
		'post_type'=> 'elementor_library', 'orderby'=> 'title', 'order' => 'ASC'
		
		);
		
		$posts = get_posts($args);

		$selected = $options['globalparts_select_field_5'];
		foreach( $posts as $post ) : setup_postdata($post); ?>
		    <option value="<? echo $post->ID; ?>" <?php selected( $post->ID , $selected ); ?>><?php the_title(); ?></option>
		    
		    
		<?php endforeach; ?>
		</select>
		


		<?php
		$savedoptions = get_option ( 'globalparts_settings') ;
        $thisoption = $savedoptions['globalparts_select_field_5'];	
        $thisoption = preg_replace('/[^0-9]/', '', $thisoption);		
		$url = admin_url('post.php?post=' .$thisoption . '&action=elementor');	
		
		if (! empty($thisoption) ) {
			
		echo (' <a href="' . $url .'" target="_blank"> Edit Template</a> ');	
			
		}


?>



<?php

}

function globalparts_select_field_6_render(  ) { 

	$options = get_option( 'globalparts_settings' );
	?>
				
		<select class="cento-partsdrop" name='globalparts_settings[globalparts_select_field_6]'>
		<option></option>
		
		<?php
		global $post;
		$args = array( 
		'numberposts' => -1,
		'post_type'=> 'elementor_library', 'orderby'=> 'title', 'order' => 'ASC'
		
		);
		
		$posts = get_posts($args);

		$selected = $options['globalparts_select_field_6'];
		foreach( $posts as $post ) : setup_postdata($post); ?>
		    <option value="<? echo $post->ID; ?>" <?php selected( $post->ID , $selected ); ?>><?php the_title(); ?></option>
		    
		    
		<?php endforeach; ?>
		</select>
		


		<?php
		$savedoptions = get_option ( 'globalparts_settings') ;
        $thisoption = $savedoptions['globalparts_select_field_6'];	
        $thisoption = preg_replace('/[^0-9]/', '', $thisoption);		
		$url = admin_url('post.php?post=' .$thisoption . '&action=elementor');	
		
		if (! empty($thisoption) ) {
			
		echo (' <a href="' . $url .'" target="_blank"> Edit Template</a> ');	
			
		}


?>



<?php

}

function globalparts_select_field_7_render(  ) { 

	$options = get_option( 'globalparts_settings' );
	?>
				
		<select class="cento-partsdrop" name='globalparts_settings[globalparts_select_field_7]'>
		<option></option>
			
		<?php
		global $post;
		$args = array( 
		'numberposts' => -1,
		'post_type'=> 'elementor_library', 'orderby'=> 'title', 'order' => 'ASC'
		
		);
		
		$posts = get_posts($args);

		$selected = $options['globalparts_select_field_7'];
		foreach( $posts as $post ) : setup_postdata($post); ?>
		    <option value="<? echo $post->ID; ?>" <?php selected( $post->ID , $selected ); ?>><?php the_title(); ?></option>
		    
		    
		<?php endforeach; ?>
		</select>
		


		<?php
		$savedoptions = get_option ( 'globalparts_settings') ;
        $thisoption = $savedoptions['globalparts_select_field_7'];	
        $thisoption = preg_replace('/[^0-9]/', '', $thisoption);		
		$url = admin_url('post.php?post=' .$thisoption . '&action=elementor');	
		
		if (! empty($thisoption) ) {
			
		echo (' <a href="' . $url .'" target="_blank"> Edit Template</a> ');	
			
		}


?>



<?php

}


function globalparts_select_field_8_render(  ) { 

	$options = get_option( 'globalparts_settings' );
	?>
				
		<select class="cento-partsdrop" name='globalparts_settings[globalparts_select_field_8]'>
		<option></option>
		
		<?php
		global $post;
		$args = array( 
		'numberposts' => -1,
		'post_type'=> 'elementor_library', 'orderby'=> 'title', 'order' => 'ASC'
		
		);
		
		$posts = get_posts($args);

		$selected = $options['globalparts_select_field_8'];
		foreach( $posts as $post ) : setup_postdata($post); ?>
		    <option value="<? echo $post->ID; ?>" <?php selected( $post->ID , $selected ); ?>><?php the_title(); ?></option>
		    
		    
		<?php endforeach; ?>
		</select>
		


		<?php
		$savedoptions = get_option ( 'globalparts_settings') ;
        $thisoption = $savedoptions['globalparts_select_field_8'];	
        $thisoption = preg_replace('/[^0-9]/', '', $thisoption);		
		$url = admin_url('post.php?post=' .$thisoption . '&action=elementor');	
		
		if (! empty($thisoption) ) {
			
		echo (' <a href="' . $url .'" target="_blank"> Edit Template</a> ');	
			
		}


?>





<?php

}






function globalparts_settings_section_callback(  ) { 

	echo __( '', 'centotheme' );

}


function cento_global_parts(  ) { 

	?>
	<h2>Global Parts</h2>
	<p>Add <b>Elelementor Templates</b> to Appear in the Global Sections of the Website.</p>
	
	<form action='options.php' method='post'>


		<?php
		settings_fields( 'centoglobals' );
		do_settings_sections( 'centoglobals' );
		submit_button();
		?>


<?
	
	$options = get_option( 'globalparts_settings' );
	
	echo($options['globalparts_select_field_1']);
	
	?>

	</form>




	<?php

}

?>







