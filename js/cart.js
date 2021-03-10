$(document).ready(function() {
    let cartList = JSON.parse(window.localStorage.getItem('cartList')) || [];
    $('.cart-button').each(function(i, value) {
        if (cartList.includes($(value).context.dataset.id)) {
            $(value).children('.fa-heart').css('color', '#db6969');
        }
    });
    $('.cart-button').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        const id = $(this).context.dataset.id;
        cartList = JSON.parse(window.localStorage.getItem('cartList')) || [];
        cartList.includes(id) ? cartList.splice(cartList.indexOf(id), 1) : cartList.push(id);
        $(this).children('.fa-heart').css('color', cartList.includes(id) ? '#db6969' : '#ffffff50');
        window.localStorage.setItem('cartList', JSON.stringify(cartList));
    })

    let filterList = [];

    const showList = () => {
        filterList.forEach(product => {
            $('.table-bordered').children('tbody').append(
                $('<tr class="product-table" />').append($('<td/>').append($('<img/>').attr('src', `images/products/${product.ProductNumber}.jpg`)
                    .attr('width', `150`).addClass('m-r10 pull-left')))
                .append($('<td/>').text(product.Name))
                .append($('<td/>').text(product.ProductNumber))
                .append($('<td/>').html(product.Content.replace(/\n/g, '<br>')))
                .append($('<td/>').html(`<input name="" type="checkbox" id="${product.Id}" value="刪除">
                <label for="${product.Id}">刪除</label>`))
            )
        });
    };

    $.ajax({
        url: 'js/products-list.json',
        dataType: 'JSON',
        method: 'GET',
        success: data => {
            filterList = data.filter(product => cartList.includes(product.Id));
            showList();
        }
    })

    // $.getJSON("../js/products-list.json", "", function(data) {

    // })

    $('.iocn-save').click(function() {
        $('input[type=checkbox]').each(function(i, value) {
            if (value.checked) {
                cartList.splice(cartList.indexOf(value.id), 1)
                $(value).parent('td').parent('tr').remove();
            }
        })
        window.localStorage.setItem('cartList', JSON.stringify(cartList));
        filterList = filterList.filter(product => cartList.includes(product.Id));
    })
});