/**
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
$(function() {

	// $("body").tooltip({ selector: '[tooltip-toggle=tooltip]' });

	$('#datatables').dataTable({
		"bRetrieve": true,
		"lengthMenu": [[-1, 5, 100, 300], ["All", 50, 100, 300]],
		"pagingType": "simple",
		"language": {
			"paginate": {
				"previous": 'Prev',
				"next": 'Next',
			}
		},
		"bAutoWidth": false,
		"aoColumns": [{ "bSortable": true },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false }],
	});

    // positions the button next to searchbox
    $('.btn-actions').appendTo('div.dataTables_filter');

    // executes functions when the modal closes
    $('body').on('hidden.bs.modal', '.modal', function () {        
        // eg. destroys the wysiwyg editor
    });
    
	// $('.group_permission').addClass('border-red');

	// console.log($('.group_permission').children());
});

$(document).on("change", ".group_permission", function(){
	var group_id = $(this).attr('group_id');
	var permission_id = $(this).attr('permission_id');
	var permission_level = $(this).val();
	var post_url = '../update_permission/' + group_id + '/' + permission_id + '/' + permission_level;
	var ajax_load = '...';
	$.post(post_url);
	console.log(permission_level);

	
	if (permission_level > 0) {
		$(this).removeClass('border-red');
	    $(this).addClass('border-green');
	}
	else {
		$(this).removeClass('border-green');
	    $(this).addClass('border-red');
	}
});
