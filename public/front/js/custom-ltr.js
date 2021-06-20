
jQuery("#btnToggle").click(function(){

    jQuery('.u-sidebar--left').fadeIn(100);
});


jQuery('.btnClose i').click(function(){

    jQuery('#sidebarHeader1').animate({left: '-335px'},1000);
});
jQuery('.toggleSide i ').click(function(){
    jQuery('#sidebarHeader1').animate({left: '0'},1000);
})