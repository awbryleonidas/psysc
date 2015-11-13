$(function(){
    $('#submit').click(function(e){
    	e.preventDefault();

    	var ajax_load = '<span class="help-block text-center">Loading...</span>';
        $(ajax_load).load(ajax_url, {
			'group_name': $('#group_name').val(),
			'group_description': $('#group_description').val(),
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