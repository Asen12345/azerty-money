$(function(){
    $('.list').click(function(e){
        if ($(this).next().hasClass('active')){
            $(this).next().stop().animate({height : '0'}, 250).removeClass('active');
        }else{
            $(this).next().stop().animate({height : $(this).next().find('ul').height()+'px'}, 250).addClass('active');
        }
        e.preventDefault();
    });
})
$(document).ready(function() {

    $(".owl-carousel").owlCarousel({

        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true

        // "singleItem:true" is a shortcut for:
        // items : 1,
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false

    });

});
$(function(){
    if($('.read_more').length){
        blok_height = Number($('.read_more').css('height').replace('px',''));

        if(blok_height > 80){
            $('.read_more').css('max-height','175px');
            $('.read-next').show();
        }
    }
});
$('#read_more').live('click', function(){

    if($('.read_more').css('max-height') != 'none'){
        $('.read_more').css('max-height','');
        $(this).text('Скрыть');
    } else {
        $('.read_more').css('max-height','180px');
        $(this).text('Читать полностью');
    }

    return false;
});
