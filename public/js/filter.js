$(window).on('hashchange', function () {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page === Number.NaN || page <= 0) {
            return false;
        } else {
            product_filter(page);
        }
    }
});
/*  POPOVER JS END*/
window.onpageshow = function () {
    var url_parameters = window.location.search;
    if (url_parameters.length === 0) clear_for_load()
};
$(document).ready(function () {

    var url_parameters = window.location.search;
    if (url_parameters.length === 0) clear_for_load()
    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();

        $('li').removeClass('active');
        $(this).parent('li').addClass('active');

        var page = $(this).attr('href').split('page=')[1];
        var filter = $('#filter_form').serialize()
        product_filter(filter, page)

    });


});


function product_filter(filter, page = 1) {
    var ajax_url = '?' + filter + '&page=' + page
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
    var filter = $('#filter_form').serialize()
    product_filter(filter, '')
    $("input[name=title]").val('')
}

function clear_for_load() {
    $("input[type=checkbox]").prop('checked', false)
    $("input[name=title]").val('')
}

$('#search-main').on('keyup', function () {
    var filter = $('#filter_form').serialize()
    product_filter(filter)
})

$(".form-check-input").change(function () {
    var filter = $('#filter_form').serialize()
    product_filter(filter)
});

$("select[name='sort']").change(function () {
    var filter = $('#filter_form').serialize()
    product_filter(filter)
});
let amount = $('#amount')
amount.on('keyup', function () {
    var min_max_val = $(this).val().split('-'),
        updated_range_val = [];
    for (var i = 0; i < min_max_val.length; ++i) {
        updated_range_val.push( min_max_val[i].replace('₸', '').replace(/\s+/g, ''))
    }
    SliderRange(updated_range_val[0].replace('₸', ''), updated_range_val[1].replace('₸', ''));
    var filter = $('#filter_form').serialize()
    product_filter(filter)

})

/*--------------------------------
 Price Slider Active
 -------------------------------- */
if (amount.val()) {
    var count_array = amount.val().split('-');
    SliderRange(count_array[0].replace('₸', ''), count_array[1].replace('₸', ''));

} else {
    SliderRange()
}

function SliderRange(start = 0, end = 200000) {
    var slider_range = $("#slider-range")
    slider_range.slider({
        range: true,
        min: 0,
        max: 200000,
        values: [start, end],
        slide: function (event, ui) {
            if ((ui.values[0] + 39) >= ui.values[1]) {
                return false;
            }
            $("#amount").val(ui.values[0] + " ₸" + " - " + ui.values[1] + ' ₸');
            var filter = $('#filter_form').serialize()
            product_filter(filter)
        }
    });
    $("#amount").val(slider_range.slider("values", 0) + " ₸" +
        " - " + slider_range.slider("values", 1) + " ₸");
}




