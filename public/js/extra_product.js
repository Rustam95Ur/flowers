let product_price = $('input[name="product_price"]').val(),
    extra_products_price = [],
    product_size_id = false,
    currency_left_icon = $('input[name="currency_left_icon"]').val(),
    currency_right_icon = $('input[name="currency_right_icon"]').val(),
    currency_value = $('input[name="currency_value"]').val()
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
            extra_products += ' + ' + currency_left_icon + ' ' + item.price + ' ' + currency_right_icon
            total_price += parseInt(item.price)

        })
        document.getElementById('extra_prices').innerHTML = currency_left_icon + ' ' + product_price + ' ' +
            currency_right_icon + extra_products + ' = ' + currency_left_icon + ' ' + total_price + ' '+ currency_right_icon
    } else {
        $('#total_extra_price').hide()
        $('#extra_prices').append('')
    }
}

function product_and_extra_add(product_id) {
    $('#product_add_cart_btn').addClass('bg-success');
    if (product_size_id) {
        update_cart(product_id, $('.cart-plus-minus-box').val(), 'add', '/' + product_size_id);
    } else {
        update_cart(product_id, $('.cart-plus-minus-box').val(), 'add');
    }
    if (extra_products_price.length > 0) {
        extra_products_price.forEach(function (item) {
                update_cart(item.id.replace('extra_product_', ''), 1);
        })
    }
}

$('input[name="size"]').on('change', function () {
    let id = $(this).val(),
        product_id = $('input[name="product_id"]').val()
    if ($('input[name="size"]').length > 1) {
        let url = '/product/size-price/'+ product_id +'/' + id
        get_price(url, id)
    }
})
async function get_price(url, size_id) {
    let response = await fetch(url);
    if (response.ok) {
        let json = await response.json(),
            json_price = (json.price * currency_value).toFixed(2)
        product_price = json_price
        $('#product_price').html(currency_left_icon + ' ' + json_price + ' ' + currency_right_icon)
        product_size_id = size_id
        extra_total_price()
    } else {
        console.log("Ошибка HTTP: " + response.status);
    }
}

