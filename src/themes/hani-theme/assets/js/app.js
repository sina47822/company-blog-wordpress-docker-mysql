jQuery(document).ready(function($){
    $('.hani-modal-opener , .hani-close-modal').click(function(e){
        e.preventDefault();

        $('.hani-modal').toggleClass('show');
    });

    $('.hani-share-opener , .close-share-modal').click(function(e){
        e.preventDefault();

        $('.share-modal').toggleClass('show');
    });

    // $('.phone-nav-toggle').click(function(e){
    //     $('body').toggleClass('phone-nav-open'):

    // });
    // $('.phone-overlay').click(function(e){
    //     $('body').removeClass('phone-nav-open'):

    // });
    // $('.phone-nav ul.sub-menu').before(
    //     '<i class="fal fa-angle-left sub-menu-arrow> </i>"'

    // );
    // $('.sub-menu-arrow').click(function(){
    //     if($(this).hasClass('fa-angle-left')){
    //         $(this).next('ul.sub-menu').show(500);
    //         $(this).removeClass('fa-angle-left').addClass('fa-angle-down');
    //     }else{

    //         $(this).next('ul.sub-menu').hide(500);
    //         $(this).removeClass('fa-angle-down').addClass('fa-angle-left');
    //     }

    // });
    
    var sticky_side = $('.sticky-side');

    if(sticky_side.length){
        var sideTop = sticky_side.offset().top;
        var post_content_left = $('.post-content').offset().left +900;

        $(window).scroll(function(){
            var currentScroll = $(window).scrollTop();

            if(currentScroll >= sideTop){
                sticky_side.css({
                    position : "fixed",
                    top: "40px",
                    'inset-inline-start' : post_content_left
                });
            }else{
                sticky_side.css({
                    position : "absolute",
                    top: "0",
                    left : "-250px",
                    'inset-inline-start' : "unset"

                });
            }
        })
    }
    
    var carousel = $('.owl-carousel')
    var slider_items = carousel.data('slider-items')
    var navigation = carousel.data('navigation')
    var pagination = carousel.data('pagination')
    var loop = carousel.data('loop')

    carousel.owlCarousel({
        loop:true,
        margin:10,
        nav:navigation,
        dot:pagination,
        navText:[
            '<i class="fal fa-angle-right"></i>',
            '<i class="fal fa-angle-left"></i>',
        ],
        rtl:true,
        responsive:{
            0:{
                items:1
            },
            400:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:slider_items
            }
        }
    })

    $(document).on("click", ".plus , .minus", function() {
        var input = $(this).closest(".quantity").find(".qty"),
            value = parseFloat(input.val()),
            max = parseFloat(input.attr("max")),
            min = parseFloat(input.attr("min")),
            step = input.attr("step");
        (value && "" !== value && "NaN" !==value) || (value == 0),
            ("" === max || "NaN" === max) || (max =""), 
            ("" === min || "NaN" === min) || (min =0),
            ("any" === step || "" === step || void 0 === step || "NaN" === parseFloat(step)) && (step = 1),
            $(this).is(".plus")
                ? input.val(
                    max && (max == value || value > max)
                    ? max
                    : value + parseFloat(step)
                )
                : min && (min == value || min > value)
                ? input.val(min)
                :value > 0 && input.val(value - parseFloat(step)),
            input.trigger("change");
    });  
});