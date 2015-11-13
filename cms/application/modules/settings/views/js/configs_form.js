$(function() {

    $('#submit').click(function(e) {

        e.preventDefault();

        var ajax_load 	 = '<span class="help-block text-center">Loading...</span>';

        $(ajax_load).load(ajax_url, {
            'config_name': $('#config_name').val(),
            'config_value' : $('#config_value').val(), 
        }, function(data) {

            var response = jQuery.parseJSON(data);
            if(response.success === false) {
                alertify.error(response.message);
                if(response.errors) {
                    for (var form_name in response.errors) {
                        console.log(form_name);
                        $('#error-' + form_name).html(response.errors[form_name]);
                    }
                }
            } else {
                $('#datatables').dataTable().fnDraw();
                $('#modal').modal('hide');
                restore_modal();
                alertify.success(response.message);
            }

            console.log(data);
        });
    });

    $('form input').keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
    
});
