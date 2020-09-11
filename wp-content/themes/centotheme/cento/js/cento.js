jQuery(document).ready( function($){
	//custom Cento scripts
	
		$(document).ready(function(){
		    $(".js-toggleSidebar").click(function(){
		        $("#this").toggleClass("sidebar-closed");
		        $( 'body' ).toggleClass( 'no-scroll' );
		        $( '.sidebar-overlay' ).fadeToggle( 320 );
		    });
		});
			

	
});


// Full Screen Search


jQuery( document ).ready( function( $ ) {

    // ... display the Full Screen search when user clicks the font awesome button
    $( '.centosearch' ).on( 'click', function( event ) {
        // Prevent the default action
        event.preventDefault();

        // Display the Full Screen Search
        $( '#full-screen-search' ).addClass( 'open' );

        // Focus on the Full Screen Search Input Field
        $( '#full-screen-search input' ).focus();
    } );

    // Hide the Full Screen search when the user clicks the close button
    $( '#full-screen-search button.close' ).on( 'click', function( event ) {
        // Prevent the default event
        event.preventDefault();

        // Hide the Full Screen Search
        $( '#full-screen-search' ).removeClass( 'open' );
    } );
    

} );



jQuery(document).ready(function($){
		//get the hash tag
			//hash exist
			setTimeout(function(){
			var current = window.location.href;
			var current = current.split('#tab');
			if(current.length>1) {	
    			 $('.elementor-tab-title').removeClass('elementor-active');
    			 $('.elementor-tab-title[data-tab="'+current[1]+'"]').addClass('elementor-active');
    			 $('.elementor-tab-content').hide();
    			 $('.elementor-tab-content[data-tab="'+current[1]+'"]').show();
			 }
			}, 200);

		$('.elementor-tab-title[data-tab]').click(function(){
			var current_location = window.location.href;
			current_location = current_location.split('#');
			window.location = current_location[0]+'#tab'+$(this).attr('data-tab');
		})
	})	