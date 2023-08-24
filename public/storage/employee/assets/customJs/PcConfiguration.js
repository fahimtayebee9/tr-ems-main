$(document).ready(function () {
    $('#add-new-item-form').click(function () {
        // get all the options from fm-select-accessories select
        var options = $('#fm-select-accessories option');
        // loop through the options and append them to the select2
        var newListOptions = '';
        $.each(options, function (index, option) {
            newListOptions += `<option value="${option.value}">${option.text}</option>`;
        });

        $('#form-request-emp-accessory').append(`<div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="mdl-accessories-item">Accessory</label>
                        <select name="accessories[]" id="" class="form-control select2">
                            ${newListOptions}
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="mdl-accessories-description">Reason For Upgrade</label>
                    <textarea name="issues[]" id="" cols="30" rows="1" class="form-control"></textarea>
                </div>
            </div>`
        );
    });

    $('.fm-select-accessories').select2({
        placeholder: 'Select an option',
        allowClear: true,
        width: '100%'
    });
});