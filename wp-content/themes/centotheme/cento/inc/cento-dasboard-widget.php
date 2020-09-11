<?php
	
/**
   Cento Theme Dashboard Widget
   @package centotheme
 */

function register_cento_dashboard_widget() {
 	global $wp_meta_boxes;

	wp_add_dashboard_widget(
		'cento_dashboard_widget',
		'CENTO THEME',
		'cento_dashboard_widget_display'
	);

 	$dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

	$my_widget = array( 'cento_dashboard_widget' => $dashboard['cento_dashboard_widget'] );
 	unset( $dashboard['cento_dashboard_widget'] );

 	$sorted_dashboard = array_merge( $my_widget, $dashboard );
 	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action( 'wp_dashboard_setup', 'register_cento_dashboard_widget' );


function cento_dashboard_widget_display() {
	
$my_theme = wp_get_theme();

	
	
?>
<div class="cent-widget">
	<div class="cento-dash-head">
		
		
		<div class="cento-dash-image"><img src="<?php echo get_template_directory_uri(); ?>/cento/img/Cento-Marker.png" width="36" height="36" alt="" /></div> 
		
		<div class="cento-dash-welcome"> <?php echo $my_theme->get( 'Name' ) . " v" . $my_theme->get( 'Version' ); ?> </div> 
				
		
		<div class="cento-dash-welcome-button"><a class="button" href="<?php echo (admin_url( 'themes.php?page=cento-theme' )); ?>">Quick Start Guide <span class="dashicons dashicons-video-alt3"></span></a> </div>
	
	</div>
	
	
    <hr class="cento-dash-hr">
    
    <div class="cento-dash-section2">

		<p>
		<strong>Need some Help?</strong>  -  <a class="" href="https://jakson.co/forums/" target="_blank">Visit the Support Forums here <span aria-hidden="true" class="dashicons dashicons-external"></a>  
		</p>
	
		<p>
		<strong>Tips and Tutorials</strong>  -  <a class="" href="https://centotheme.com/tutorials?utm_source=centotheme&utm_medium=wpdash" target="_blank">Visit Cento Tutorials <span aria-hidden="true" class="dashicons dashicons-external"></a>  
		</p>
		
		
		<p>
		<strong>Go Pro!</strong>  -  <a class="" href="https://jakson.co/cento-pro?utm_source=centofree&utm_medium=wpdash" target="_blank">Get Cento Pro <span aria-hidden="true" class="dashicons dashicons-external"></a>  
		</p>
	
		
	</div>
	

	
</div>	
<?php
	
	
	
	// Get RSS Feed(s)
	include_once(ABSPATH . WPINC . '/feed.php');
	
	// My feeds list (add your own RSS feeds urls)
	$my_feeds = array( 
				'https://jakson.co/feed/' 
				);
	
	// Loop through Feeds
	foreach ( $my_feeds as $feed) :
	
		// Get a SimplePie feed object from the specified feed source.
		$rss = fetch_feed( $feed );
		if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly 
		    // Figure out how many total items there are, and choose a limit 
		    $maxitems = $rss->get_item_quantity( 3 ); 
		
		    // Build an array of all the items, starting with element 0 (first element).
		    $rss_items = $rss->get_items( 0, $maxitems ); 
	
		    // Get RSS title
		    $rss_title = '<div class="cento-dash-news-header">News, Tutorials & Updates</div>'; 


//		    $rss_title = '<a href="'.$rss->get_permalink().'" target="_blank">Latest '.strtoupper( $rss->get_title() ).' Tutorials <span aria-hidden="true" class="dashicons dashicons-external"></a>'; 
		endif;
	
		// Display the container
		echo '<div class="rss-widget">';
		echo '<strong>'.$rss_title.'</strong>';
		echo '<hr class="cento-dash-hr">';
		
		// Starts items listing within <ul> tag
		echo '<ul>';
		
		// Check items
		if ( $maxitems == 0 ) {
			echo '<li>'.__( 'No item', 'rc_mdm').'.</li>';
		} else {
			// Loop through each feed item and display each item as a hyperlink.
			foreach ( $rss_items as $item ) :
				// Uncomment line below to display non human date
				//$item_date = $item->get_date( get_option('date_format').' @ '.get_option('time_format') );
				
				// Get human date (comment if you want to use non human date)
				$item_date = human_time_diff( $item->get_date('U'), current_time('timestamp')).' '.__( 'ago', 'rc_mdm' );
				
				// Start displaying item content within a <li> tag
				echo '<li class="cento-dash-news-item">';
				// create item link
				echo '<div class="cento-dash-news-title"><a href="'.esc_url( $item->get_permalink() ).'" title="'.$item_date.'">';
				// Get item title
				echo esc_html( $item->get_title() );
				echo '</a></div>';
				// Display date
// 				echo ' <span class="rss-date">'.$item_date.'</span><br />';
				// Get item content
				$content = $item->get_content();
				// Shorten content
				$content = wp_html_excerpt($content, 120) . '...';
				// Display content
// 				echo ($content);
				
				echo str_replace( [ '&nbsp; ', '<p>&nbsp;' ], '', $content );				
				
				// End <li> tag
				echo '</li>';
			endforeach;
		}
		// End <ul> tag
		echo '</ul></div>';

	endforeach; // End foreach feed
}