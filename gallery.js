jQuery(document).ready(($) => {

	
	var count = php_vars.repeater;
	var interval = php_vars.interval;
		
	var go = true;
	startTimer();

	$('a.ari-fancybox').click(stopTimer);
	$(document).on("click", function (){
		if ($('.dialog-message').children().length == 0 && go == false) {
			startTimer();
		}
	});

	function timer() {
	    if(!go) {
	        return;
	    } else {
	    
	    var out = Math.ceil(Math.random()*4);
		var imageIn = Math.ceil(Math.random()*(count-4))+4;
		var divOut = $('.gallery-image'+ out);
		var divIn = $('.gallery-image' + imageIn);
		divOut.removeClass('gallery-image'+out);
		divIn.removeClass('gallery-image'+imageIn);
		divOut.addClass('gallery-image'+imageIn);
		divIn.addClass('gallery-image'+ out);
		gsap.fromTo(divIn, {opacity: 0}, {opacity: 1, duration: 2});
	    setTimeout(timer, interval);
		}
	}

	function stopTimer(){
	    go = false;
	    console.log('Timer stopped');
	} 

	function startTimer(){
	    go = true;
	    console.log('Timer restarted');
	    timer();
	}    
});


	



	
