$(document).ready(function(){

    $(window).scroll(function(){
        if($(this).scrollTop() > 40){
            $('#topBtn').fadeIn();
        } else{
            $('#topBtn').fadeOut();
        }
    });

    $("#topBtn").click(function(){
        $('html ,body').animate({scrollTop : 0},800);
    });
});

// ityped.init(document.querySelector("#text-shadow3"), {
//     showCursor: false,
//     strings: [ 'PLUMBING SERVICE IS AVAILABLE',' CHOOSE YOUR CATEGORY'],
//     typespeed:0
// });