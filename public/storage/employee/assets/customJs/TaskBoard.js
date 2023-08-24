$(document).ready(function(){
    $('.task-viewer').each(function(){
        $(this).addClass('d-none');
    });

    $('.task-title-checker').each(function(task){
        // pid on task click
        $(this).click(function(){
            // get data-pid 
            var pid = $(this).attr("data-pid");
            // search pid in .task-viewer element attribute data-pvid
            var pvid = $('.task-viewer[data-pvid="'+pid+'-viewer"]').attr('data-pvid');
            $('.task-viewer').each(function(){
                if($(this).attr('data-pvid') == pvid){
                    $(this).addClass('d-block');
                    $(this).removeClass('d-none');
                }
                else{
                    $(this).removeClass('d-block');
                    $(this).addClass('d-none');
                }
            });
        });
    });

    $('.task-desc-viewer').summernote({
        height: 200,
        toolbar: [],
        disableDragAndDrop: true,
        disableResizeEditor: true,
        disableGrammar: true,
    });
}); 