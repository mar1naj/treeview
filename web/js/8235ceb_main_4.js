$(document).ready(function(e) {

	$(document).on("contextmenu", "#root", function(e){
		$(".cmenu").css('display','none');
		$("div.rc").css( {display:"block", position:"absolute", top:event.pageY, left: event.pageX+20});
	   return false;
	});
    
	
	$(document).on("contextmenu", ".rclickable", function(e){
		$(".rc").css('display','none');
	   $("div.cmenu:not(.rc)").css( {display:"block", position:"absolute", top:event.pageY, left: event.pageX+20});
	   $('.generate').attr('id', $(this).attr('id'));
	   $('.delete').attr('id', $(this).attr('id')); 
	   return false;
	});
			 
	
	$(document).click(function(e){
		//$(".cmenu li").css('background-color', '#fff');
	   $(".cmenu").css('display','none');
	});
	
	$(document).keyup(function(e) {
		if (e.keyCode == 27) { //esc
			 $(".cmenu").css('display','none');
		}
	});
		
});

	
function quit(){
	return this.exit();
}
