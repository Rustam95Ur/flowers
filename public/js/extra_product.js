let product_price = $('input[name="product_price"]').val(),
    extra_products_price = [];
$('input[name="extra"]').on('change', function () {
    var price = $(this).val(),
        id = $(this).attr('id');
    if ($(this).is(':checked')) {
        extra_products_price.push({'id': id, 'price': price})
    } else {
        extra_products_price.some(function (el, index) {
            if (el.id === id) {
                extra_products_price.splice(index, 1);
            }
        });
    }
    extra_total_price()
})

function extra_total_price() {
    if (extra_products_price.length > 0) {
        $('#total_extra_price').show()
        var extra_products = '',
            total_price = parseInt(product_price);
        extra_products_price.forEach(function (item) {
            extra_products += ' + ' + item.price + ' ₸'
            total_price += parseInt(item.price)

        })
        document.getElementById('extra_prices').innerHTML = product_price + ' ₸' + extra_products + ' = ' + total_price + ' ₸'
    } else {
        $('#total_extra_price').hide()
        $('#extra_prices').append('')
    }
}

function product_and_extra_add(product_id) {
    $('#product_add_cart_btn').addClass('bg-success');
    update_cart(product_id, $('.cart-plus-minus-box').val());
    if (extra_products_price.length > 0) {
        extra_products_price.forEach(function (item) {
            setTimeout(function () {
                update_cart(item.id.replace('extra_product_', ''), 1);
            }, 2000);
        })
    }
}
