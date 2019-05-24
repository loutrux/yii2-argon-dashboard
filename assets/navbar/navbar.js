/**
 * Listen to scroll to change header opacity class
 */
function checkScroll(){
    var startY = $('.navbar').height() * 2; //The point where the navbar changes in px

    if($(window).scrollTop() > startY){
        $('.navbar').addClass("scrolled");
    }
    if($(window).scrollTop() < startY/2){
        $('.navbar').removeClass("scrolled");
    }
}

if($('.navbar').length > 0){
    $(window).on("scroll load resize", function(){
        checkScroll();
    });
}

$('.navbar-close').click(function () {
    alert($(this).parents('.navbar-collapse').html());
    $(this).parents('.navbar-collapse').addClass('collapse');
    $(this).parents('.navbar-collapse').removeClass('collapsing');
})

/**
 * Expand main container
 */
function toggleMainView(){
    $('#community-sidebar').toggle();
    $('#community-main').toggleClass('col-lg-8');
    $('#community-main').toggleClass('col-lg-12');
    $('#hide-on-scroll').toggle();
    $('#show-on-scroll').toggleClass('show-on-scroll');
    $('.expand-button').toggleClass('d-none');
}
