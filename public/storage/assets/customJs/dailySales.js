$(document).ready(function() {
    initDailySalesChart(null);
    
    function initDailySalesChart(data = null){
        var dynamicData = (data == null) ? [{
                                period: '2011',
                                all_sales: 10,
                                ads_sales: 5,
                            }, {
                                period: '2012',
                                all_sales: 35,
                                ads_sales: 89,
                            }, {
                                period: '2013',
                                all_sales: 25,
                                ads_sales: 15,
                            }, {
                                period: '2014',
                                all_sales: 80,
                                ads_sales: 12,
                            }, {
                                period: '2015',
                                all_sales: 30,
                                ads_sales: 32,
                            }, {
                                period: '2016',
                                all_sales: 25,
                                ads_sales: 127,
                            }, {
                                period: '2017',
                                all_sales: 98,
                                ads_sales: 10,
                            }
                        ] : data;
        $("#chart-area-spline").empty();
        var chart_daily_sales = new Morris.Area({
            element: 'chart-area-spline',
            data: dynamicData,
            lineColors: ['#7149C6', '#FFD93D'],
            xkey: 'period',
            ykeys: ['all_sales', 'ads_sales'],
            labels: ['All Sales', 'Ads Sales'],
            pointSize: 0,
            lineWidth: 0,
            resize: true,
            fillOpacity: 0.8,
            behaveLikeLine: true,
            gridLineColor: '#eeeeee',
            hideHover: 'auto',
            parseTime: false,
        });
    }

    // submit chart-loader-form using ajax
    $('#chart-loader-form').submit(function(e) {
        e.preventDefault();

        var caccount_id = document.getElementById("caccount-id");
        var value = caccount_id.options[caccount_id.selectedIndex].value;
        var text = caccount_id.options[caccount_id.selectedIndex].text;
        var dayOption = $('.radio_days_length:checked').data('days');

        var inputValue = $(this).data("days");
        var lastDays = [];
        var forInputField = [];
        var caccount = document.getElementById("caccount-id");
        var caccount_id = caccount.options[caccount.selectedIndex].value;

        for (var i = 0; i < inputValue; i++) {
            var d = new Date();
            d.setDate(d.getDate() - i);
            lastDays.push(d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate());
            
            var month = (d.getMonth() < 10) ? '0' + (d.getMonth() + 1) : (d.getMonth() + 1);
            var day = (d.getDate() < 10) ? '0' + d.getDate() : d.getDate();
            forInputField.push(day + '/' + month + '/' + d.getFullYear());
            
        }

        var allSales = 0;
        var tacos = 0;
        var adsSales = 0;
        var acos = 0;
        var cost = 0;
        var clicks = 0;
        var impressions = 0;
        var allSalesArray = [];
        var adsSalesArray = [];
        var datesList = [];
        $.ajax({
            url: '/admin/custom-reports/daily-sales/get-data',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
            },
            data: {
                days: dayOption,
                caccount_id: caccount_id,
            },
            success: function(response) {
                $('#all-sales').text("$" + response.total_sales);
                $('#tacos').text(response.average_tacos + "%");
                $('#ads-sales').text("$" + response{"version":3,"names":["validate","node","key","val","fields","NODE_FIELDS","type","field","validateField","validateChild","optional","NODE_PARENT_VALIDATIONS"],"sources":["../../src/validators/validate.ts"],"sourcesContent":["import {\n  NODE_FIELDS,\n  NODE_PARENT_VALIDATIONS,\n  type FieldOptions,\n} from \"../definitions\";\nimport type * as t from \"..\";\n\nexport default function validate(\n  node: t.Node | undefined | null,\n  key: string,\n  val: any,\n): void {\n  if (!node) return;\n\n  const fields = NODE_FIELDS[node.type];\n  if (!fields) return;\n\n  const field = fields[key];\n  validateField(node, key, val, field);\n  validateChild(node, key, val);\n}\n\nexport function validateField(\n  node: t.Node | undefined | null,\n  key: string,\n  val: any,\n  field: FieldOptions | undefined | null,\n): void {\n  if (!field?.validate) return;\n  if (field.optional && val == null) return;\n\n  field.validate(node, key, val);\n}\n\nexport function validateChild(\n  node: t.Node | undefined | null,\n  key: string,\n  val?: t.Node | undefined | null,\n) {\n  if (val == null) return;\n  const validate = NODE_PARENT_VALIDATIONS[val.type];\n  if (!validate) return;\n  validate(node, key, val);\n}\n"],"mappings":";;;;;;;;AAAA;AAOe,SAASA,QAAQ,CAC9BC,IAA+B,EAC/BC,GAAW,EACXC,GAAQ,EACF;EACN,IAAI,CAACF,IAAI,EAAE;EAEX,MAAMG,MAAM,GAAGC,wBAAW,CAACJ,IAAI,CAACK,IAAI,CAAC;EACrC,IAAI,CAACF,MAAM,EAAE;EAEb,MAAMG,KAAK,GAAGH,MAAM,CAACF,GAAG,CAAC;EACzBM,aAAa,CAACP,IAAI,EAAEC,GAAG,EAAEC,GAAG,EAAEI,KAAK,CAAC;EACpCE,aAAa,CAACR,IAAI,EAAEC,GAAG,EAAEC,GAAG,CAAC;AAC/B;AAEO,SAASK,aAAa,CAC3BP,IAA+B,EAC/BC,GAAW,EACXC,GAAQ,EACRI,KAAsC,EAChC;EACN,IAAI,EAACA,KAAK,YAALA,KAAK,CAAEP,QAAQ,GAAE;EACtB,IAAIO,KAAK,CAACG,QAAQ,IAAIP,GAAG,IAAI,IAAI,EAAE;EAEnCI,KAAK,CAACP,QAAQ,CAACC,IAAI,EAAEC,GAAG,EAAEC,GAAG,CAAC;AAChC;AAEO,SAASM,aAAa,CAC3BR,IAA+B,EAC/BC,GAAW,EACXC,GAA+B,EAC/B;EACA,IAAIA,GAAG,IAAI,IAAI,EAAE;EACjB,MAAMH,QAAQ,GAAGW,oCAAuB,CAACR,GAAG,CAACG,IAAI,CAAC;EAClD,IAAI,CAACN,QAAQ,EAAE;EACfA,QAAQ,CAACC,IAAI,EAAEC,GAAG,EAAEC,GAAG,CAAC;AAC1B"}                  allowClear: false,
        width: '100%',
        minimumResultsForSearch: Infinity
    });

    $('#ins_tasks').select2({
        placeholder: 'Select Option',
        allowClear: false,
        width: '100%',
        minimumResultsForSearch: Infinity
    });

    $('#ins_meeting_notes').select2({
        placeholder: 'Select Option',
        allowClear: false,
        width: '100%',
        minimumResultsForSearch: Infinity
    });
});