jQuery(document).ready(function ($) {
    $('.yasan-modal-opener').click(function (e) { 
        e.preventDefault();
        $('.yasan-modal').toggleClass('show');
    });
    $('.close-yasan-modal').click(function (e) { 
        e.preventDefault();
        $('.yasan-modal').toggleClass('show');
    });

});