$(document).ready(function() {
    
    $("body").tooltip({ selector: '[tooltip-toggle=tooltip]' });
	
    var oTable = $('#datatables').dataTable({
        "bProcessing": false,
        "bServerSide": true,
        "sAjaxSource": "configs/datatables",
        "lengthMenu" : [[50, 100, 300, -1], [50, 100, 300, "All"]],
        "pagingType" : "full_numbers",
        "language": {
            "paginate": {
                "previous": 'Prev',
                "next": 'Next',
            }
        },
        "bAutoWidth": false,
        "aaSorting": [[ 0, "asc" ]],
        "aoColumnDefs": [{
            "aTargets": [0],
            "sClass": "col-md-1 text-center"
        }, {
            "aTargets" : [1, 2], 
            "sClass": "col-md-5",
        }, {
            "aTargets": [3],
            "bSortable": false,
             "mRender": function (data, type, full) {
                    html = '<a href="configs/form/edit/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-xs btn-warning"><span class="fa fa-pencil"></span></a>';

                    html += ' <a href="configs/delete/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-xs btn-danger"><span class="fa fa-trash-o"></span></a>';

                    return html;
            },
            "sClass": "col-md-1 text-center",
        }]
    });

    $('.btn-actions').appendTo('div.dataTables_filter');

    // // disable caching of ajax content
    // $('body').on('hidden.bs.modal', '.modal', function () {
    //     $(this).removeData('bs.modal');
    // });
    
});