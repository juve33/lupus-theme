$(document).ready(function() {
	
	$(window).scroll(function() {
		if ($(this).scrollTop() > 128){  
			$('nav').addClass("sticky");
		}
		else{
			$('nav').removeClass("sticky");
		}
	});

});