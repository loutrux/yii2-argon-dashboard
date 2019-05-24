/**
 * Listen to .sticky-rubric scroll to change top position
 */

 /*
function checkRubrics(){
    var scrollTop = $(window).scrollTop();
    var navbarSize = $('.navbar').height();
    var tmp = ' - ' + $('.sticky-rubric').offset().top + ' - ';
    $('.sticky-rubric').each(function()
        {
            pos = $(this).offset().top - scrollTop - navbarSize;
            if (pos < 0)
            {
                $(this).attr('data-scroll',scrollTop);
                $(this).css('position','fixed');
                $(this).css('top',navbarSize);
            }
            else if ($(this).attr('data-scroll') > scrollTop )
                $(this).css({ 'position' : '', 'top' : '' });
        tmp = tmp + '(' + pos + ') ';});
    //$('.navbar').html(scrollTop + tmp);
}

$(window).on("scroll load resize", function(){
    checkRubrics();
});
*/