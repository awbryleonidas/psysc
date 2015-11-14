$(document).ready(function() {
    $("body").tooltip({ selector: '[tooltip-toggle=tooltip]' });

    var oTable = $('#datatables').dataTable({
        "bProcessing": false,
        "bServerSide": true,
        "sAjaxSource": "users/datatables",
        "lengthMenu": [[50, 100, 200, 500], [50, 100, 200, 500]],
        "pagingType": "simple",
        "language": {
            "paginate": {
                "previous": 'Prev',
                "next": 'Next',
            }
        },
        "bAutoWidth": false,
        "aaSorting": [[ 0, "asc" ]],
        "aoColumnDefs": [
            
            {
                "aTargets": [0],
                "sClass": "col-md-1 text-center",
            },

            // {
            //     "aTargets": [1, 2, 3, 4, 5, 6],
            //     "sClass": "col-md-1 text-center",
            // },

            // {
            //     "aTargets": [2],
            //     "mRender": function (data, type, full) {
            //         return full[2] + ' ' + full[3]
            //     },
            // },



            // {
            //     "aTargets": [3, 4],
            //     "visible": false,
            // },

            // {
            //     "aTargets": [6],
            //     "sClass": "text-center",
            // },

            {
                "aTargets": [3],
                "bSearchable": false,
                "bSortable": false,
            },

            // {
            //     "aTargets": [8],
            //     "bSearchable": false,
            // },

            {
                "aTargets": [4],
                "mRender": function (data, type, full) {
                    if (data == 1) {
                        return '<span class="badge bg-light-blue">Active</span>';
                    }
                    else {
                        return '<span class="badge">Inactive</span>';
                    }
                },
                "sClass": "col-md-1 text-center",
            },



            {
                "aTargets": [5],
                "bSortable": false,
                "mRender": function (data, type, full) {
                    if (full[0] != 1) {

                        html = '<a href="users/view/'+full[0]+'"><button tooltip-toggle="tooltip" data-placement="top" title="View" class="btn btn-xs btn-success"><span class="fa fa-eye"></span></button></a>';

                        html += ' <a href="users/edit/'+full[0]+'"><button tooltip-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-xs btn-warning"><span class="fa fa-pencil"></span></button></a>';

                        
                        if (full[4] == '1') {
                            html += ' <a href="users/deactivate/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Deactivate" class="btn btn-xs btn-info"><span class="fa fa-thumbs-down"></span></a>';
                        }
                        else {
                            html += ' <a href="users/activate/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Activate" class="btn btn-xs btn-info"><span class="fa fa-thumbs-up"></span></a>';
                        }

                        html += ' <a href="users/delete/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Delete"  class="btn btn-xs btn-danger"><span class="fa fa-trash-o"></span></a>';

                        return html;
                    }
                    else {
                        return '';
                    }

                    
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
