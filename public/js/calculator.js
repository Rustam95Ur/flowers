var total_product_list = [
    {'title': 'Зелень', 'count': 1, 'price': 1000, 'checked': true, 'text': ''},
    {'title': 'Оформление', 'count': 1, 'price': 0, 'checked': true, 'text': ' (Сетка) '}
]
let currency_left_icon = $('input[name="currency_left_icon"]').val(),
    currency_right_icon = $('input[name="currency_right_icon"]').val();
var currency_value = $('input[name="currency_value"]').val()
$('input[name="order"]').val(JSON.stringify(total_product_list))
$('.calculator_count').on('keyup', function () {
    var product_count = $(this).val(),
        id = $(this).attr('id').replace('category-', ''),
        category_name = $("label[for='cbox-" + id + "']").text(),
        checked_status = false,
        price = $('#category-price-' + id).val();
    if ($('#cbox-' + id).is(':checked')) {
        checked_status = true
    }
    var info = {'title': category_name, 'count': product_count, 'price': price, 'checked': checked_status, 'text': ''}

    var found = total_product_list.some(function (el) {
        if (el.title === category_name) {
            el.count = product_count
            return true
        }
    });
    if (!found) {
        total_product_list.push(info);
    }
    get_total_price()
})
$('.category_checkbox').on('change', function () {
    var id = $(this).attr('id'),
        category_name = $("label[for='" + id + "']").text(),
        checkbox_status = true
    if (!$(this).is(':checked')) {
        checkbox_status = false
    }
    total_product_list.some(function (el) {
        if (el.title === category_name) {
            el.checked = checkbox_status
        }
    });
    get_total_price()
})
$('#green').on('change', function () {
    var value = $(this).val(),
        new_price = 1000,
        count = 1,
        checked_status = true
    if (parseInt(value) === 0) {
        new_price = 500
        count = 0
        checked_status = false
    }
    total_product_list.some(function (el) {
        if (el.title === 'Зелень') {
            el.price = new_price
            el.count = count
            el.checked = checked_status
        }
    });
    get_total_price()
})
$('#decor').on('change', function () {
    var value = $(this).val();
    total_product_list.some(function (el) {
        if (el.title === 'Оформление') {
            el.text = ' (' + value + ') '
        }
    });

    get_total_price()
})


function get_total_price() {
    document.getElementById("cart_items_table").innerHTML = '';
    var total_price = 0
    total_product_list.forEach((element) => {
        if (element.checked) {
            let price = element.count * element.price * currency_value
            let tr_val = '<tr class="cart_item"><td class="cart-product-name">' + element.title + element.text +
                '<strong class="product-quantity">×' + element.count + '</strong></td>\n' +
                '<td class="cart-product-total text-center"><span class="amount">' + currency_left_icon + ' ' + price.toFixed(2)  + '  '
                + currency_right_icon + '</span></td>\n' +
                '</tr>'
            $("#cart_items_table").append(tr_val);
            total_price += element.count * element.price * currency_value
        }
    })
    $('.amounts').text(currency_left_icon + ' ' + total_price.toFixed(2) + ' ' + currency_right_icon)
}

get_total_price()
