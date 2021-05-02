function update_cart(product_id, qty = 1, type = 'add') {
    var ajax_url = '/cart/update/' + product_id + '/' + qty + '/' + type;
    $.ajax({
        type: "GET",
        url: ajax_url,
        complete: function () {
            // cart_table_update()
            count_item();
        }
    });
}

function count_item() {
    $.ajax({
        type: "GET",
        url: '/cart/count',
        success: function (data) {
            $('#cart_count').html(data.count);
        }
    });
}
