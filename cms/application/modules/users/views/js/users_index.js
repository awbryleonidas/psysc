/**
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
$(function() {
	
	var oTable = $('#datatables').dataTable({
		"bProcessing": false,
		"bServerSide": true,
		"sAjaxSource": "users/datatables",
		"lengthMenu": [[50, 100, 300, -1], [50, 100, 300, "All"]],
		"pagingType": "full_numbers",
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
			
			{
				"aTargets": [5],
				"mRender": function (data, type, full) {
					if (data == 1) {
						return '<span class="label label-success">Active</span>';
					}
					else {
						return '<span class="label label-default">Suspended</span>';
					}
				},
				"sClass": "col-md-1 text-center",
			},

			{
				"aTargets": [6],
				"bSortable": false,
				 "mRender": function (data, type, full) {
					html = '<a href="users/edit/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-xs btn-warning"><span class="fa fa-pencil"></span></a>'; 
					if (full[5] == '1') {
						html += ' <a href="users/suspend/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Deactivate" class="btn btn-xs btn-info"><span class="fa fa-thumbs-down"></span></a>';
					}
					else {
						html += ' <a href="users/activate/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Activate" class="btn btn-xs btn-info"><span class="fa fa-thumbs-up"></span></a>';
					}                  
					html += ' <a href="users/delete/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-xs btn-danger"><span class="fa fa-trash-o"></span></a>';
					
					return html;
				},
				"sClass": "col-md-2 text-center",
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
