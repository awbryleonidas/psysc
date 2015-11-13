/**
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
$(function() {

	// renders the datatables (datatables.net)
    var oTable = $('#datatables').dataTable({ 
	    "bProcessing": false,
		"bServerSide": true,
		"sAjaxSource": "menus/datatables",
		"lengthMenu": [[50, 100, 200, 500], [50, 100, 200, 500]],
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
				"aTargets": [6],
				"mRender": function (data, type, full) {
					if (data == 1) {
						return '<span class="label label-success">Active</span>';
					}
					else {
						return '<span class="label label-default">Disabled</span>';
					}
				},
				"sClass": "col-md-1 text-center",
			},

			{
				"aTargets": [7],
				"bSortable": false,
				"mRender": function (data, type, full) {

					html = '<a href="menus/form/view/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="View" class="btn btn-xs btn-success"><span class="fa fa-eye"></span></a>';

                    html += ' <a href="menus/form/edit/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-xs btn-warning"><span class="fa fa-pencil"></span></a>';

                    html += ' <a href="menus/delete/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-xs btn-danger"><span class="fa fa-trash-o"></span></a>';

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
