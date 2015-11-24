/*

$(document).ready(function() {
	$("body").tooltip({ selector: '[tooltip-toggle=tooltip]' });

	var sSearch = GetQueryStringParams('q');
	if (sSearch) sSearch = decodeURIComponent(sSearch).trim();
	console.log(sSearch);

	var oTable = $('#datatables').dataTable({
		"oSearch": {"sSearch": sSearch},
		"bProcessing": false,
		"bServerSide": true,
		"sAjaxSource": "about_panel/datatables",
		"lengthMenu": [[40, 100, 300, -1], [40, 100, 300, "All"]],
		"pagingType": "simple",
		"language": {
			"paginate": {
				"previous": 'Prev',
				"next": 'Next',
			}
		},
		"bAutoWidth": false,
		// "aaSorting": [[ 0, "asc" ]],
		"aoColumnDefs": 
		[
			{
				"aTargets": [1],
				"mRender": function (data, type, full) {

					var status = (full[6] == 'Hidden') ? ' inactive' : '';
					var logo = (full[4]) ? full[4] : 'assets/img/placeholder_logo.png';
					var t = full[5].split(/[- :]/);
					var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
					var timeago = timeSince(d);
					// console.log(d);
					var asset_url = (full[7] == 1) ? '' : site_url;
					
					return '<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">' +
						'<div class="thumbnail">' +

						'<div class="caption caption-brand"><div class="media"><div class="media-left media-middle">' +
						'<img width="50" class="media-object" src="' + site_url + logo + '" alt="' + full[2] + '"></div>' +

						'<div class="media-body"><strong>' + full[2] + '</strong><div class="about_panel_location">' +
						'<span class="fa fa-map-marker"></span> Mall Location<span class="hidden-md hidden-sm pull-right">'
						+ timeago +' ago</span></div></div></div></div>' +

						'<div class="thumbnail' + status + '"><a data-toggle="modal" data-target="#modal" href="about_panels/edit/' + full[0] + '">' +
						'<img src="' + asset_url + data + '" class="img-responsive" width="100%" /></a><div class="caption caption-text"><p>' + full[3] + '</p></div></div><a data-toggle="modal" data-target="#modal" href="about_panels/delete/' + full[0] + '">Delete</a></div></div>';
				},
			},

			{
				"aTargets": [0,2,3,4,5,6],
				"mRender": function (data, type, full) {
					return '<span class="hide">' + data + '</span>';
				},
			},

		],
		"fnDrawCallback": function( oTable ) {
			// hide the table
			$('#datatables').hide();

			// then recreate the table as divs
			var html = '';
			$('tr', this).each(function() {
				$('td', this).each(function() {
					html += $(this).html();
					// console.log(html);
				});
			});

			$('#thumbnails').html(html);
		}
	});


	$('.btn-actions').appendTo('div.dataTables_filter');

	// disable caching of ajax content
	$('body').on('hidden.bs.modal', '.modal', function () {
		$(this).removeData('bs.modal');
		// $('.modal-body', this).empty();
	});

	// $("#modal").on("shown.bs.modal", function () {
	//     google.maps.event.trigger(map, "resize");
	// });


});

function timeSince(date) {

	var seconds = Math.floor((new Date() - date) / 1000);

	var interval = Math.floor(seconds / 31536000);

	if (interval > 1) {
		return interval + "y";
	}
	interval = Math.floor(seconds / 2592000);
	if (interval > 1) {
		return interval + "mo";
	}
	interval = Math.floor(seconds / 86400);
	if (interval > 1) {
		return interval + "d";
	}
	interval = Math.floor(seconds / 3600);
	if (interval > 1) {
		return interval + "h";
	}
	interval = Math.floor(seconds / 60);
	if (interval > 1) {
		return interval + "m";
	}
	return Math.floor(seconds) + "s";
}

function GetQueryStringParams(sParam)
{
	var sPageURL = window.location.search.substring(1);
	var sURLVariables = sPageURL.split('&');
	for (var i = 0; i < sURLVariables.length; i++)
	{
		var sParameterName = sURLVariables[i].split('=');
		if (sParameterName[0] == sParam)
		{
			return sParameterName[1];
		}
	}
}*/
