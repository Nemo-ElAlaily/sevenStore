jQuery(document).ready(function(){

jQuery("#btnToggle").click(function(){

    jQuery('.u-sidebar--left').fadeIn(100);
    setTimeout(function(){jQuery('.btnClose').fadeIn('show')}, 500);
    jQuery('body , html').animate({marginLeft: "70px"},1000);
     jQuery('.sidebar-header-parent').fadeIn(100);
  
});


jQuery('.btnClose i').click(function(){

    jQuery('#sidebarHeader1').animate({left: '-340px'},1000);
    setTimeout(function(){jQuery('.btnClose').fadeOut('hide')}, 100);
    jQuery('body , html').animate({marginLeft: "0"},1000);
    jQuery('.sidebar-header-parent').fadeOut(300);
});
jQuery('.toggleSide i ').click(function(){
    jQuery('#sidebarHeader1').animate({left: '0'},1000);
});

jQuery(window).scroll(function(){
    if(jQuery(this).scrollTop() > 100){

        jQuery('.btnUp').fadeIn(100);
    } else{
        jQuery('.btnUp').fadeOut(100);
    }
});

jQuery('.btnUp i').click(function(){

    jQuery('html , body').animate({scrollTop: 0} , 800);
});


jQuery('#btnsetting').click(function(){

    jQuery('#orders').hide(100);
    jQuery('#withdraw').hide(100);

    jQuery('#setting').show(100);

});


jQuery('#btwithdraw').click(function(){

    jQuery('#orders').hide(100);
    jQuery('#setting').hide(100);

    jQuery('#withdraw').show(100);

});

jQuery('#btnorders').click(function(){

    jQuery('#withdraw').hide(100);
    jQuery('#setting').hide(100);

    jQuery('#orders').show(100);

});


});

