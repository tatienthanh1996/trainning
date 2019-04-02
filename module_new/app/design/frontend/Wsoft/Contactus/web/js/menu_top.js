$(document).ready(function () {
    $(window).scroll(function(){
        if($(window).scrollTop() - $(".menu").position().top < 0){
            $('.menu_top').css({'position':'relative'});
        }else{
            $('.menu_top').css({'position':'fixed'});
        }
    });

})