$(document).ready(function() {

	// $("#audittrail_details").modal({show:false});

    var oTable = $('#datatables').dataTable({
	    "bProcessing": false,
		"bServerSide": true,
		"sAjaxSource": "audittrail/datatables",
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
				"aTargets": [0],
				"sClass": "col-md-1 text-center",
			},
			{
				"aTargets": [4],
				"sClass": "col-md-1 text-center",
			},
			// {
			// 	// "sWidth": "60px",
			// 	"aTargets": [1],
			// 	"mRender": function (data, type, full) {
			// 		var jsonObj = JSON.parse(data);
			// 		var jsonPretty = JSON.stringify(jsonObj, null, '  ');
			// 		console.log(jsonPretty);
			// 		return jsonPretty;
			// 	},
			// 	"sClass": "",
			// },
			{
				// "sWidth": "100px",
				"aTargets": [8],
				"bSortable": false,
				"mRender": function (data, type, full) {
					return '<a href="audittrail/view/'+full[0]+'" data-toggle="modal" data-target="#audittrail_details" class="btn btn-xs btn-success"><span class="fa fa-eye"></span> Details</a></a> ';
				},
				"sClass": "col-md-1",
			},
		]
    });

	// disable caching of ajax content
	// $('body').on('hidden.bs.modal', '.modal', function () {
	// 	$(this).removeData('bs.modal');
	// 	$('.modal-body', this).empty();
	// });

	$('body') 
  //   .on('shown.bs.modal', '.modal', function(){ 
  //     	console.log('show'); 
  //     	$('body').css('overflow','hidden');
		// $('body').css('position','fixed');
  //   }) 
    .on('hidden.bs.modal', '.modal', function(){ 
      	$('body').css('overflow','');
		$('body').css('position','');
		$(this).removeData('bs.modal');
		$('.modal-body', this).empty();
    }); 

});