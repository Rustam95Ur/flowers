$(window).on('hashchange', function () {
    if (window.location.hash) {
        let page = window.location.hash.replace('#', '');
        if (page === Number.NaN || page <= 0) {
            return false;
        } else {
            product_filter(page);
        }
    }
});
/*  POPOVER JS END*/
window.onpageshow = function () {
    let url_parameters = window.location.search;
    if (url_parameters.length === 0) clear_for_load()
};
$(document).ready(function () {

    let url_parameters = window.location.search;
    if (url_parameters.length === 0) clear_for_load()
    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();

        $('li').removeClass('active');
        $(this).parent('li').addClass('active');

        let page = $(this).attr('href').split('page=')[1];
        let filter = $('#filter_form').serialize()
        product_filter(filter, page)
    });

});


function product_filter(filter, page = 1) {
    let ajax_url = '?' + filter + '&page=' + page
    setupPage();
    history.pushState(ajax_url, document.title, ajax_url);
    onpopstate = function (event) {
        setupPage(event.state);
    }

    function setupPage() {
        document.links[0].href = ''
        document.links[0].href = ajax_url;
    }
    $.ajax(
        {
            url: ajax_url,
            type: "get",
            datatype: "html",
            beforeSend: function(){
                $("#product_list").empty().html('');
                $("#product_preloader").show()
            },
            complete: function(){
                $("#product_preloader").hide()
            },
            success: function (data) {
                $("#product_list").empty().html(data);

            },
            error: function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR)
                console.log(ajaxOptions)
                console.log(thrownError)
            }
        });
}


function clear_filter() {
    $("input[type=checkbox]").prop('checked', false)
    $('.custom-select-trigger').text('по умолчанию')
    $('#inputState').find('option:not(:first)').remove();
    let filter = $('#filter_form').serialize()
    product_filter(filter, '')
    $("input[name=title]").val('')
}

function clear_for_load() {
    $("input[type=checkbox]").prop('checked', false)
    $("input[name=title]").val('')
}

$('#search-main').on('keyup', function () {
    let filter = $('#filter_form').serialize()
    product_filter(filter)
})

$(".form-check-input").change(function () {
    let filter = $('#filter_form').serialize()
    product_filter(filter)
});

$("select[name='sort']").change(function () {
    let filter = $('#filter_form').serialize()
    product_filter(filter)
});
let amount = $('#amount')
amount.on('keyup', function () {
    let min_max_val = $(this).val().split('-'),
        updated_range_val = [];
    for (let i = 0; i < min_max_val.length; ++i) {
        let update_val = min_max_val[i].replace(currency_right_icon, '').replace(currency_left_icon, '').replace(/[a-zа-яё]/gi, '').replace(/[^a-zа-яё0-9\s]/gi, '')
        updated_range_val.push(update_val)
    }
    SliderRange(parseInt(updated_range_val[0]), updated_range_val[1], currency_value);
    let filter = $('#filter_form').serialize()
    setTimeout(function () {
        product_filter(filter)
    }, 3000);
})

/*--------------------------------
 Price Slider Active
 -------------------------------- */
if (amount.val()) {
    let count_array = amount.val().split('-'),
        start_val = count_array[0].replace(currency_left_icon, '').replace(currency_right_icon, ''),
        end_val = count_array[1].replace(currency_left_icon, '').replace(currency_right_icon, '');
    SliderRange(start_val, end_val, currency_value);
} else {
    start_val = 0
    end_val = 200000 * currency_value
    SliderRange(start_val, end_val, currency_value);
}

function SliderRange(start = 0, end = 200000, currency_value = 1) {
    let slider_range = $("#slider-range")
    slider_range.slider({
        range: true,
        min: 0,
        max: 200000 * currency_value,
        values: [start, end],
        slide: function (event, ui) {
            if ((ui.values[0] + 39) >= ui.values[1]) {
                return false;
            }
            let min_val = currency_left_icon + ' ' + ui.values[0] + ' ' + currency_right_icon
            let max_val = currency_left_icon + ' ' + ui.values[1] + ' ' + currency_right_icon
            $("#amount").val(min_val + " - " + max_val);
            let filter = $('#filter_form').serialize()
            setTimeout(function () {
                product_filter(filter)
            }, 1000);
        }
    });
    let slider_min_val = currency_left_icon + ' ' + slider_range.slider("values", 0) + ' ' + currency_right_icon,
        slider_max_val = currency_left_icon + ' ' + slider_range.slider("values", 1) + ' ' + currency_right_icon;
    $("#amount").val(slider_min_val + " - " + slider_max_val);
}




