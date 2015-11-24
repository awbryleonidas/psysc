$(document).ready(function() {

	$("body").tooltip({ selector: '[tooltip-toggle=tooltip]' });

	var oTable = $('#datatables').dataTable({
		"bProcessing": false,
		"bServerSide": true,
		"sAjaxSource": "news_panel/datatables",
		"lengthMenu": [[10, 20, 50, 100, 300, 500, 1000], [10, 20, 50, 100, 300, 500, 1000]],
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
				// "sWidth": "70px",
				"aTargets": [1],
				"mRender": function (data, type, full) {
					// var last_udpate = new Date(full[6]);
					var last_update = $.datepicker.formatDate('M dd, yy', new Date(full[1]));
					html = last_update;
					return html;
				},
				"sClass": "col-md-2",
			},
			{
				// "sWidth": "80px",
				"aTargets": [4],
				"bSortable": false,
				"mRender": function (data, type, full) {
					// html = '<a href="department/view/'+full[0]+'"><button data-toggle="modal" data-target="#department_form" title="View" class="btn btn-xs btn-success"><span class="fa fa-eye"></span></button></a>';

					html = '<a href="news_panel/edit/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-xs btn-warning"><span class="fa fa-pencil"></span></a>';

					html += ' <a href="news_panel/delete/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-xs btn-danger"><span class="fa fa-trash-o"></span></a>';

					return html;
				},
				"sClass": "col-md-1 text-center",
			},
		]
	});

	$('.btn-actions').appendTo('div.dataTables_filter');

	// disable caching of ajax content
	$('body').on('hidden.bs.modal', '.modal', function () {
		$(this).removeData('bs.modal');
		// $('.modal-body', this).empty();
	});



});
