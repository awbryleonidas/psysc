$(function(){
    $('#submit').click(function(e){
    	e.preventDefault();

    	var ajax_load = '<span class="help-block text-center">Loading...</span>';
        $(ajax_load).load(ajax_url, {
			'permission_name': $('#permission_name').val(),
			'permission_simple': $('#permission_simple').is(':checked') ? 1 : 0,
			'permission_active': $('#permission_active').is(':checked') ? 1 : 0
		}, function(data){
			var o = jQuery.parseJSON(data);
			if (o.success === false) {
				$('#message').show();
				$('#message').html(o.message);
				if (o.errors) {
					for (var form_name in o.errors) {
						$('#error-' + form_name).html(o.errors[form_name]);
					}
				}
			}
			else
			{
				// window.location.reload(true);
				$('#datatables').dataTable().fnDraw();
				$('#modal').modal('hide');
				alertify.success(o.message);
			}

			console.log(data);
		});
    });

    $('#message').hide();
});