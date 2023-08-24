$(document).ready(function () {
    $('#meeting_status').select2({
        placeholder: 'Select Status',
        allowClear: true,
        width: '100%',
        minimumResultsForSearch: Infinity
    });

    $('#meeting_type').select2({
        placeholder: 'Select Type',
        allowClear: true,
        width: '100%',
        minimumResultsForSearch: Infinity
    });

    // $('.meeting-note-summer').summernote({
    //     height: 75,                 // set editor height
    //     minHeight: null,             // set minimum height of editor
    //     maxHeight: null,             // set maximum height of editor
    //     focus: true                 // set focus to editable area after initializing summernote
    // });

    $('#btn-add-meeting-note').on('click', function () {
        var meetingRow = $('#row-meeting-note').html();
        $('#row-meeting-note').append(meetingRow);
    });
});