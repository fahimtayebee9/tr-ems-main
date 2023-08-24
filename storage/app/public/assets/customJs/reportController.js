$(document).ready(function () {
    $('#tbl-reports-list').DataTable({
        responsive: false,
        processing: true,
        serverSide: false
    });

    $('.dlt-weekly-report').each(function () {
        $(this).click(function (e) {
            e.preventDefault();
            // trigger sweetalert2 confirmation
            var id = $(this).attr('data-rowId');

            Swal.fire({
                title: "Do you want to delete this Report ? ",
                showDenyButton: true,
                confirmButtonText: "Yes, Delete it!",
                denyButtonText: `Don't Delete`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: `/admin/custom-reports/weekly-sales/destroy/${id}`,
                        dataType: "json",
                        headers: {
                            "X-CSRF-Token": "{{ csrf_token() }}",
                        },
                        success: function (data) {
                            console.log(data);
                            if (data.status == "success") {
                                Swal.fire("Deleted!", "", "success");
                                location.reload();
                            } else {
                                Swal.fire("Error!", "", "error");
                            }
                        },
                    });
                    // refresh page
                    location.reload();
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        });
    });

    $('#download-multiple-report-accounts').select2({
        placeholder: "Select Accounts",
        allowClear: true,
        multiple: true,
        width: "100%",
    });

    $('input[name="last_ending_date"]').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true,
    });

    $('#client_account').select2({
        placeholder: "Select Client",
        allowClear: true,
        multiple: false,
        width: "100%",
    });

    // initReportSingleChart();

    
});

// trigger morris chart after page loading is complete
$(window).on('load', function () {
    $('.morris-chart-loader').each(function () {
        var id          = $(this).attr('id');
        var chartData   = JSON.parse($(this).attr('data-chartLoader'));
        var morrisData  = [];
        var __TotalSalesDataSet     = [];//['data1'];
        var __TotalAdsSalesDataSet  = [];//['data2'];
        var __TotalAdsSpendDataSet  = [];//['data3'];
        var __PeriodDataSet = [];
        for (let index = 0; index < chartData.length; index++) {
            __TotalSalesDataSet.push(chartData[index].total_sales);
            __TotalAdsSalesDataSet.push(chartData[index].total_ads_sales);
            __PeriodDataSet.push(chartData[index].period);
            __TotalAdsSpendDataSet.push(chartData[index].total_cost);
        }
        
        // $("#"+id).empty();

        console.log(__TotalSalesDataSet, __TotalAdsSalesDataSet, __TotalAdsSpendDataSet, __PeriodDataSet);

        var options = {
            chart: {
                height: 350,
                type: 'bar',
            },
            colors: ['#59c4bc', '#637aae'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',	
                },
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '14px',
                    fontFamily: 'Helvetica, Arial, sans-serif',
                    fontWeight: 'bold',
                    colors: ['#fff']
                },
                formatter: function (val) {
                    return "$" + val
                }
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        return "$" + value;
                    },
                    style: {
                        fontSize: '14px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 'bold',
                    },
                },
            },
            series: [
                {
                    name: 'Total Sales',
                    data: __TotalSalesDataSet
                }, {
                    name: 'Ads Sales',
                    data: __TotalAdsSalesDataSet
                }, {
                    name: 'Ads Spend',
                    data: __TotalAdsSpendDataSet
                }
            ],
            xaxis: {
                categories: __PeriodDataSet,
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "$" + val
                    }
                }
            },
            zoom: {
                enabled: false
            },
            legend: {
                position: 'top',
            },
            
        }
    
        var chart = new ApexCharts(
            document.querySelector('#'+id),
            options
        );
    
        chart.render();
    });
});


$(document).ready(function () {
    var toastMixin = Swal.mixin({
        toast: true,
        position: 'top-right',
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: false,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
});

$(window).on('load', function () {
    var data = [];
    $('.table_container').each(function () {
        data.push($(this).html().toString().trim());
    });
    $('input[name="tbl_comparision"]').val(JSON.stringify(data));

    var dataCht = [];
    $('.chart-html').each(function () {
        // get svg tag html and convert to string of this item
        var svg = $(this).find('svg').parent().html().toString().trim();
        dataCht.push(svg);
    });
    $('input[name="cht_comparision"]').val(JSON.stringify(dataCht));

    var dataMnotes = [];
    $('.meeting_notes_container').each(function () {
        var mnotes = $(this).html().toString().trim();
        dataMnotes.push(mnotes);
    });
    $('input[name="meetingNotesListOl"]').val(JSON.stringify(dataMnotes));
});