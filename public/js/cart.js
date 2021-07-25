function update_cart(product_id, qty = 1, type = 'add', size_id = '', msg_modal = false) {
    var ajax_url = '/cart/update/' + product_id + '/' + qty + '/' + type + size_id;
    let xhr = new XMLHttpRequest();
    xhr.open('GET', ajax_url, false);
    xhr.send();

    count_item();
}

function open_modal(message) {
    $('#modal_message').text(message)
    $('#add_cart_modal').modal('show');
    setTimeout(function () {
        $('#add_cart_modal').modal('hie')
    }, 5000);
}

function count_item() {
    $.ajax({
        type: "GET",
        url: '/cart/count',
        success: function (data) {
            $('#cart_count').html(data.count);
            updated_mini_cart()
        }
    });
}


function updated_mini_cart() {
    let locale = $('input[name="locale"]').val()
    $.ajax({
        type: "GET",
        url: '/' + locale + '/cart',
        success: function (data) {
            $('#mini_cart').html(data);
        }
    });
}

function update_wish_list(product_id, type = 'add') {
    var ajax_url = '/wishlist/' + product_id + '/' + type;
    $.ajax({
        type: "GET",
        url: ajax_url,
        complete: function () {
            count_wish()
        }
    });
}


function count_wish() {
    $.ajax({
        type: "GET",
        url: '/wishlists/count',
        success: function (data) {
            $('#wish_count').html(data.count);
        }
    });
}
