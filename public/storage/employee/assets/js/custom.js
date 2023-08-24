$(document).ready(function() {
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];
    
    $('#leave-type-filter').on('change', function() {
        var leave_type = $(this).val();
        if(leave_type == "*"){
            window.location.reload();
        }
        else{
            $.ajax({
                url: '/employee/leave/getByType/' + leave_type,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var count = 1;
                    $.each(data, function(key, value) {
                        var date = new Date(value.leave_from);
                        var start_date = date.getDate() + " " + monthNames[date.getMonth()] + ", " + date.getFullYear();
                        var end_date = '';
                        if(value.leave_to != null){
                            var date = new Date(value.leave_to);
                            end_date = date.getDate() + " " + monthNames[date.getMonth()] + ", " + date.getFullYear();
                        }
                        html += '<tr>';
                        html += '<td>' + count + '</td>';
                        html += '<td>' + value.leave_id + '</td>';
                        html += '<td><b>' + start_date + '</b> to <b>' + end_date + '</b></td>';
                        html += '<td>' + value.subject + '</td>';
                        // get leave status 1 for approved, 2 for pending, 3 for rejected
                        if(value.status_by_astmanager == 1 && value.status_by_hr == 1){
                            html += '<td><span class="badge badge-success">Approved</span></td>';
                        }else if(value.status_by_astmanager == 0 || value.status_by_hr == 0){
                            html += '<td><span class="badge badge-warning">Pending</span></td>';
                        }else{
                            html += '<td><span class="badge badge-danger">Rejected</span></td>';
                        }
                        // get leave type 1 for Full Day [Paid], 2 for Half Day [Unpaid], 3 for Full Day [Unpaid]
                        if(value.leave_type == 1){
                            html += '<td><span class="badge badge-success">Full Day [Paid]</span></td>';
                        }else if(value.leave_type == 2){
                            html += '<td><span class="badge badge-warning">Half Day [Unpaid]</span></td>';
                        }else{
                            html += '<td><span class="badge badge-danger">Full Day [Unpaid]</span></td>';
                        }
                        html += '<td></td>';
                        html += '</tr>';
                        count++;
                    });
                    $('#tbl-leave-applications').html(html);
                }
            });
        }
    });

    $('#leave-type-filter').select2({
        allowClear: false,
        width: '100%',
        minimumResultsForSearch: Infinity
    });

    $('#leave-start-date').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
    });
    $('#leave-end-date').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
    });

    $(document).ready(function(){
        $('.summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                 // set focus to editable area after initializing summernote
        });
    });
});
