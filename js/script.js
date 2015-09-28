$(document).ready(function(){
	$("button").click(function(){
		$("p").hide();

});

$("#id").mouseover(function(){
	$(this).stop().animate({
		height:'150px'
	},
		{queue:false, duration:600, easing: 'easeInQuad'})
});

$("").mouseout(function(){
	$(this).stop().animate({
		height:'25px'
	},
		{queue:false, duration:600, easing: 'easeOutQuad'})
});

});

//$(document).ready(function(){
//
//});