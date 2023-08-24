$(document).ready(function () {
    // sign_in_from select2 trigger
    $('[data-plugin="customselect"]').select2({
        placeholder: "Select an option",
        allowClear: false,
        width: '100%',
        minimumResultsForSearch: Infinity
    });

    $('.flatpickr-input').flatpickr();

    $('#graphics_card_toggle').change(function () {
        if ($('#graphics_card_toggle').val() == "yes") {
            $('#graphics_card_model').attr('disabled', false);
            $('#graphics_card_model_date').attr('disabled', false);
        }
        else {
            $('#graphics_card_model').attr('disabled', true);
            $('#graphics_card_model_date').attr('disabled', true);
        }
    });
});