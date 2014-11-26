$(document).ready(function(e) {
    
	
	$(document).on("contextmenu", ".rclickable", function(e){
	   $("div.cmenu").css( {display:"block", position:"absolute", top:event.pageY, left: event.pageX+20});
	   $('.generate').attr('id', $(this).attr('id'));
	   $('.delete').attr('id', $(this).attr('id'));
	   return false;
	});
			 
	
	$(document).click(function(e){
		//$(".cmenu li").css('background-color', '#fff');
	   $(".cmenu").css('display','none');
	});
	
});