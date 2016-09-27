$(document).ready(function(){

	$(window).scroll(function(){
		if( $(this).scrollTop() > 0 ){
			$('menu').addClass('menu2');
		} else {
			$('menu').removeClass('menu2');
		}
	});

});