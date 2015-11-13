/**
 * @package     Codifire
 * @version     1.0
 * @author      Randy Nivales <randynivales@gmail.com>
 * @copyright   Copyright (c) 2014-2015, Randy Nivales
 * @link        randynivales@gmail.com
 */
$(function() {

    var oTable = $('#datatables').dataTable({
        "bProcessing": false,
        "bServerSide": true,
        "sAjaxSource": "permissions/datatables",
        "lengthMenu": [[50, 100, 300, -1], [50, 100, 300, "All"]],
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
                "aTargets": [2],
                "mRender": function (data, type, full) {
                    if (data == 1) {
                        return '<span class="label label-info">Simple</span>';
                    }
                    else {
                        return '<span class="label label-primary">Full</span>';
                    }
                },
                "sClass": "col-md-1 text-center",
            },

            {
                "aTargets": [3],
                "mRender": function (data, type, full) {
                    if (data == 1) {
                        return '<span class="label label-success">Active</span>';
                    }
                    else {
                        return '<span class="label label-default">Deleted</span>';
                    }
                },
                "sClass": "col-md-1 text-center",
            },

            {
                "aTargets": [4],
                "bSortable": false,
                 "mRender": function (data, type, full) {
                     html = '<a href="permissions/edit/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-xs btn-warning"><span class="fa fa-pencil"></span></a>';

                    html += ' <a href="permissions/delete/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-xs btn-danger"><span class="fa fa-trash-o"></span></a>';

                    return html;
                },
                "sClass": "col-md-1 text-center",
            },
        ]
    });

    // positions the button next to searchbox
    $('.btn-actions').appendTo('div.dataTables_filter');

    // executes functions when the modal closes
    $('body').on('hidden.bs.modal', '.modal', function () {        
        // eg. destroys the wysiwyg editor
    });
} );
