$(document).ready(function () {
    $('#task_status').select2({
        placeholder: 'Select Status',
        allowClear: true,
        width: '100%',
        minimumResultsForSearch: Infinity
    });
});

$(document).ready(function () {
    $('#add-task-row').on('click', function () {
        var taskRow = $('#task-row').html();
        $('#task-row').append(taskRow);
    });

    $('.task-description').summernote({
        height: 145,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true                 // set focus to editable area after initializing summernote
    });

    $('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    });

    $('.input-group-text').on('click', function () {
        $('#datepicker-autoclose').datepicker('show');
    });
});