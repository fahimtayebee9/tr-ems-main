$(document).ready(function () {
    // set visibility false by default for all containing leave-type-open class
    $('.leave-type-open').css('visibility', 'hidden');
    $('#application-type-mdl').change(function () {
        console.log($('#application-type-mdl').val());
        // set visibility true for all containing leave-type-open class if application-type-mdl is selected 1
        if ($('#application-type-mdl').val() == 1) {
            $('.leave-type-open').css('visibility', 'visible');
        }
        else {
            $('.leave-type-open').css('visibility', 'hidden');
        }
    });

    $('#application-desc-editor').summernote({
        height: 200,
        placeholder: 'Application Description',
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
    });

}); 