/**
 * @package     Codifire
 * @version     1.0
 * @author      Randy Nivales <randynivales@gmail.com>
 * @copyright   Copyright (c) 2014-2015, Randy Nivales
 * @link        randynivales@gmail.com
 */
$(function() {

    $("body").tooltip({ selector: '[tooltip-toggle=tooltip]' });
    
    var oTable = $('#datatables').dataTable({
        "bProcessing": false,
        "bServerSide": true,
        "sAjaxSource": "auditlogs/datatables",
        "lengthMenu": [[20, 50, 100, 300, -1], [20, 50, 100, 300, "All"]],
        "pagingType": "full_numbers",
        "language": {
            "paginate": {
                "previous": 'Prev',
                "next": 'Next',
            }
        },
        "bAutoWidth": false,
        "aaSorting": [[ 0, "desc" ]],
        "aoColumnDefs": [
            
            {
                "aTargets": [0],
                "sClass": "col-md-1 text-center",
            },

            {
                "aTargets": [5],
                "bSortable": false,
                 "mRender": function (data, type, full) {
                    html = '<a href="auditlogs/view/'+full[0]+'" data-toggle="modal" data-target="#auditlogs_details" tooltip-toggle="tooltip" data-placement="top" title="View" class="btn btn-xs btn-success"><span class="fa fa-eye"></span> View</a>';

                    return html;
                },
                "sClass": "col-md-1 text-center",
            },
        ]
    });

    $('.btn-actions').appendTo('div.dataTables_filter');

    $('body').on('hidden.bs.modal', '.modal', function () {

    });

});