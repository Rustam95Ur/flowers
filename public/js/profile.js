let save_page = 1
$('#edit_btn').on('click', function () {
    $('.address-info-block').hide()
    $('.address-add-block').show()
});
$(document).on('click', '.pagination a', function (event) {
    event.preventDefault();

    $('li').removeClass('active');
    $(this).parent('li').addClass('active');

    let page = $(this).attr('href').split('page=')[1];
    let ajax_url = '?page=' + page
    save_page = page
    get_orders(ajax_url)
});


function order_detail(order_id) {
    let ajax_url = '/profile/order/' + order_id
    get_orders(ajax_url)
}

function back_to_list() {
    let ajax_url = '?page=' + save_page
    get_orders(ajax_url)
}


function get_orders(ajax_url) {
    $.ajax(
        {
            url: ajax_url,
            type: "get",
            datatype: "html",
            beforeSend: function () {
                $(".order-list").empty().html('');
                $("#product_preloader").show()
            },
            complete: function () {
                $("#product_preloader").hide()
            },
            success: function (data) {
                $(".order-list").empty().html(data);

            },
            error: function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR)
                console.log(ajaxOptions)
                console.log(thrownError)
            }
        });
}
