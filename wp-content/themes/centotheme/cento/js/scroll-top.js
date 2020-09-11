jQuery(document).ready(function($){
	$(window).scroll(function(){
        if ($(this).scrollTop() < 200) {
			$('#scrolltop') .fadeOut();
        } else {
			$('#scrolltop') .fadeIn();
        }
    });
	$('#scrolltop').on('click', function(){
		$('html, body').animate({scrollTop:0}, 'slow');
		return false;
		});
});