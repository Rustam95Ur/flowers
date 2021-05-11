var total_product_list = []

$('.calculator_count').on('keyup', function () {
    var product_count = $(this).val(),
        id = $(this).attr('id').replace('category-', ''),
        category_name = $("label[for='cbox-" + id + "']").text(),
        price = Math.floor(Math.random() * 1000)

    var info = {'title': category_name, 'count': product_count, 'price': price}

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

function get_total_price() {
    document.getElementById("cart_items_table").innerHTML = '';
    var total_price = 0
    total_product_list.forEach((element) => {
        var tr_val = '<tr class="cart_item"><td class="cart-product-name">' + element.title +
            '<strong class="product-quantity">×' + element.count + '</strong></td>\n' +
            '<td class="cart-product-total text-center"><span class="amount">' + element.count * element.price + '  ₸</span></td>\n' +
            '</tr>'
        $("#cart_items_table").append(tr_val);
        total_price += element.count * element.price
    })
    $('.amounts').text(total_price)
}

