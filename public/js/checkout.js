$('#use_bonus').on('change', function () {
    if (!$(this).is(':checked')) {
        $('#updated_price').hide()
    } else {
        $('#updated_price').show()
    }
})
