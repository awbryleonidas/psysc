$(function(){
	// groups
	var opts=$("#select-groups").html(), opts2="<option></option>"+opts;
	$("select.populate-groups").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts2:opts); });
   	$("#groups").select2();
    $('#groups').data().select2.updateSelection(default_groups);

    // datatables
    $('#submit').click(function(e){
    	e.preventDefault();

    	var ajax_load = '<span class="help-block text-center">Loading...</span>';
        $(ajax_load).load(ajax_url, {
			'first_name': $('#first_name').val(),
			'last_name': $('#last_name').val(),
			'email': $('#email').val(),
			'username': $('#username').val(),
			'password': $('#password').val(),
			'password_confirm': $('#password_confirm').val(),
			'groups': $('#groups').val(),
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