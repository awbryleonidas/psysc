
$( "#campaign_name" ).change(function() {
    var campaign_name = $(this).val();
    var post_url = 'overview/save_campaign/' + campaign_name;
    var ajax_load = '...';
    $.post(post_url);
//    $("#dibdib").load(location.href + " #dibdib");
});


$(function() {
    var $campaign_name = $('#campaign_name'),
        $campaign_start = $('#campaign_start'),
        $campaign_end = $('#campaign_end');
    $campaign_name.change(function() {
        if ($campaign_name.val() != '') {
            $campaign_start.removeAttr('disabled');
            $campaign_end.removeAttr('disabled');
        } else {
            $campaign_start.attr('disabled', 'disabled').val('');
            $campaign_end.attr('disabled', 'disabled').val('');
        }
    }).trigger('change');

    $.ajax
    ({
        url: 'overview/fetch_region',
        type: 'POST',
        dataType: 'json',
        success: function(data)
        {
            console.log(data);

            Highcharts.theme = {
                colors: ['#009D30', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572',
                    '#FF9655', '#FFF263', '#6AF9C4'],
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 500, 500],
                        stops: [
                            [0, 'rgb(255, 255, 255)'],
                            [1, 'rgb(240, 240, 255)']
                        ]
                    },
                },
                title: {
                    style: {
                        color: '#000',
                        font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
                    }
                },
                subtitle: {
                    style: {
                        color: '#666666',
                        font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
                    }
                },

                legend: {
                    itemStyle: {
                        font: '9pt Trebuchet MS, Verdana, sans-serif',
                        color: 'black'
                    },
                    itemHoverStyle:{
                        color: 'gray'
                    }
                }
            };

            // Apply the theme
            Highcharts.setOptions(Highcharts.theme);

            $('#container_chart').highcharts({

                credits: {
                    text: 'Milo CRM',
                    href: ''
                },
                title: {
                    text: 'TOTAL START AND COMPLETED SESSIONS PER REGION'
                },
                xAxis: {
                    categories: data.ticks
                },
                series: [{
                    type: 'column',
                    name: 'Consumers',
                    data: data.data_value
                }, {
                    type: 'spline',
                    name: 'Completed Session',
                    data: data.completed_sessions,
                    marker: {
                        lineWidth: 2,
                        lineColor: Highcharts.getOptions().colors[3],
                        fillColor: 'white'
                    }
                }]
            });
        },
        error: function () {
            $('#div_filter_region').html("You must first select a date range and specific filters you want to view.");
            //alert("An error occurred.");
        }
    });


    $('.input-daterange').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        startDate: '2015-01-01',
        endDate: $campaign_name.val()+'-12-31'
    });
});