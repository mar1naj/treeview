$(document).on("contextmenu", ".rclickable", function(e){
   $(".contextmenu").css( {display:"block", position:"absolute", top:event.pageY, left: event.pageX+20});
   return false;
});

$('.rclickable').focusout(function(){
    $(".contextmenu").css('display', 'none');
});