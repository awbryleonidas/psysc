$(document).ready(function() {

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

	$('.btn-actions').appendTo('div.dataTables_filter');

	// disable caching of ajax content
	$('body').on('hidden.bs.modal', '.modal', function () {
		$(this).removeData('bs.modal');
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
