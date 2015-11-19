$(document).ready(function() {
    $("body").tooltip({ selector: '[tooltip-toggle=tooltip]' });
    
    var oTable = $('#datatables').dataTable({
        "bProcessing": false,
        "bServerSide": true,
        "sAjaxSource": "groups/datatables",
        "lengthMenu": [[50, 100, 300, -1], [50, 100, 300, "All"]],
        "pagingType": "simple",
        "language": {
            "paginate": {
                "previous": 'Prev',
                "next": 'Next',
            }
        },
        "bAutoWidth": false,
        "aaSorting": [[ 1, "asc" ]],
        "aoColumnDefs": [
            
            {
                "aTargets": [0],
                "sClass": "col-md-1 text-center",
            },
            
            {
                // "sWidth": "70px",
                "aTargets": [3],
                "mRender": function (data, type, full) {
                    if (data == 0) {
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
                "aTargets": [4],
                "bSortable": false,
                 "mRender": function (data, type, full) {
                    // html = '<a href="groups/view/'+full[0]+'"><button data-toggle="modal" data-target="#groups_form" title="View" class="btn btn-xs btn-success"><span class="fa fa-eye"></span></button></a>';

                    html = '<a href="groups/edit/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-xs btn-warning"><span class="fa fa-pencil"></span></a>';
                    
                    html += ' <a href="groups/permissions/'+full[0]+'" tooltip-toggle="tooltip" data-placement="top" title="Permissions" class="btn btn-xs btn-info"><span class="fa fa-lock"></span></a>';

                    if (full[0] != 1) {
                        html += ' <a href="groups/delete/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-xs btn-danger"><span class="fa fa-trash-o"></span></a>';
                    }
                    
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
