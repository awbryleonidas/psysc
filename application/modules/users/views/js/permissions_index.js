$(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });

    var oTable = $('#datatables').dataTable({
        "bProcessing": false,
        "bServerSide": true,
        "sAjaxSource": "permissions/datatables",
        "lengthMenu": [[50, 100, 300, -1], [50, 100, 300, "All"]],
        "pagingType": "simple",
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
                // "sWidth": "30px",
                "aTargets": [0],
                "sClass": "col-md-1 text-center",
            },
            {
                // "sWidth": "70px",
                "aTargets": [2],
                "mRender": function (data, type, full) {
                    if (data == 1) {
                        return '<span class="badge bg-light-blue">Active</span>';
                    }
                    else {
                        return '<span class="badge">Deleted</span>';
                    }
                },
                "sClass": "col-md-1 text-center",
            },

            {
                // "sWidth": "80px",
                "aTargets": [3],
                "bSortable": false,
                 "mRender": function (data, type, full) {
                     html = '<a href="permissions/edit/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-xs btn-warning"><span class="fa fa-pencil"></span></a>';

                    html += ' <a href="permissions/delete/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-xs btn-danger"><span class="fa fa-trash-o"></span></a>';

                    return html;
                },
                "sClass": "col-md-1",
            },
        ]
    });

    $('.btn-actions').appendTo('div.dataTables_filter');

    // disable caching of ajax content
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
        // $('.modal-body', this).empty();
    });
} );
