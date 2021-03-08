
(function($) {
    "use strict";

    //TODO- min order
    if ($('.project-detail-outer').length > 0) {
        $('.project-detail-outer .add-to-cart .cart-button').attr('href', '#');
        $('.project-detail-outer .add-to-cart .cart-button').on('click', function(){

            //var qty = $('.product_top_section input[type=number]').val();
            var filePath = window.location.pathname;
            var chunks = filePath.split('/');
            var shopUrl = 'cart-113.php?act=add&id=' + chunks.pop();//filePath.substr(1);
            location.href = shopUrl;
        });
        $('.add-to-cart .cart-button').attr('href', '#');
        $('.add-to-cart .cart-button').on('click', function(){
            var id = $('.add-to-cart').has(this).find('a').attr('href');
            var shopUrl = 'cart-113.php?act=add&id=' + id;
            location.href = shopUrl;
        });
    } else {
        $('.cart-button').attr('href', '#');
        $('.cart-button').on('click', function(){
            var id = $('.add-to-cart').has(this).find('a').attr('href');
            var shopUrl = 'cart-113.php?act=add&id=' + id;
            location.href = shopUrl;
        });
    }
})(jQuery);