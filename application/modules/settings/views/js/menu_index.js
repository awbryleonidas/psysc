$(document).ready(function() {
	$("body").tooltip({ selector: '[tooltip-toggle=tooltip]' });

    var oTable = $('#datatables').dataTable({
	    "bProcessing": false,
		"bServerSide": true,
		"sAjaxSource": "menu/datatables",
		"lengthMenu": [[50, 100, 200, 500], [50, 100, 200, 500]],
		"pagingType": "simple",
		"language": {
            "paginate": {
            	"previous": 'Prev',
            	"next": 'Next',
            }
        },
		"bAutoWidth": false,
		"aaSorting": [[ 2, "asc" ]],
		"aoColumnDefs": [
			
			{
				"aTargets": [0],
				"sClass": "col-md-1 text-center",
			},

			

			{
				"aTargets": [4],
				"mRender": function (data, type, full) {
					return '<span class="' + data + '"></span>';
				},
				"sClass": "col-md-1 text-center",
			},

			{
				"aTargets": [5],
				"sClass": "col-md-1 text-center",
			},

			{
				// "sWidth": "60px",
				"aTargets": [6],
				"mRender": function (data, type, full) {
					if (data == 1) {
						return '<span class="badge bg-light-blue">Active</span>';
					}
					else {
						return '<span class="badge bg-gray">Disabled</span>';
					}
				},
				"sClass": "col-md-1 text-center",
			},

			{
				"sWidth": "100px",
				"aTargets": [7],
				"bSortable": false,
				"mRender": function (data, type, full) {

					html = '<a href="menu/view/'+full[0]+'" tooltip-toggle="tooltip" data-placement="top" title="View" class="btn btn-xs btn-success"><span class="fa fa-eye"></span></a>';

					html += ' <a href="menu/edit/'+full[0]+'" tooltip-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-xs btn-warning"><span class="fa fa-pencil"></span></a>';

                    html += ' <a href="menu/delete/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-xs btn-danger"><span class="fa fa-trash-o"></span></a>';

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
