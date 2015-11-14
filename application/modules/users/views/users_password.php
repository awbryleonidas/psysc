<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only"><?=lang('button_close')?></span>
	</button>
	<h4 class="modal-title" id="myModalLabel"><?=$page_heading?></h4>
</div>

<div class="modal-body">

	<div id="message" class="callout callout-danger callout-dismissable"></div>
		
	<?php echo form_open(current_url(), array('class'=>'form-horizontal'));?>

		<div class="form-group">
			<label class="col-xs-4 control-label" for="old_password"><?=lang('label_old_password')?>:</label>
			<div class="col-xs-7">
				<?php $formdata = array('id'=>'old_password', 'name'=>'old_password', 'value'=>set_value('old_password'), 'class'=>'form-control', 'maxlength'=>'20'); ?>
				<?php echo form_password($formdata);?>
				<div id="error_old_password"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-4 control-label" for="new_password"><?=lang('label_new_password')?>:</label>
			<div class="col-xs-7">
				<?php $formdata = array('id'=>'new_password', 'name'=>'new_password', 'value'=>set_value('new_password'), 'class'=>'form-control', 'maxlength'=>'20'); ?>
				<?php echo form_password($formdata);?>
				<div id="error_new_password"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-4 control-label" for="new_password_confirm"><?=lang('label_new_password2')?>:</label>
			<div class="col-xs-7">
				<?php $formdata = array('id'=>'new_password_confirm', 'name'=>'new_password_confirm', 'value'=>set_value('new_password_confirm'), 'class'=>'form-control', 'maxlength'=>'20'); ?>
				<?php echo form_password($formdata);?>
				<div id="error_new_password_confirm"></div>
			</div>
		</div>
	
	<?php echo form_close();?>

</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-times"></i> <?=lang('button_close')?>
	</button>

	<button id="submit" class="btn btn-primary" type="submit">
		<i class="fa fa-save"></i> <?=lang('button_change_password')?>
	</button>
</div>

<script>
$(function(){
    $('#submit').click(function(e){
    	e.preventDefault();

    	var ajax_url = "<?php echo current_url(); ?>";
    	var ajax_load = '<span class="help-block text-center">Loading...</span>';
        $(ajax_load).load(ajax_url, {
			'old_password': $('#old_password').val(),
			'new_password': $('#new_password').val(),
			'new_password_confirm': $('#new_password_confirm').val(),
		}, function(data){
			var o = jQuery.parseJSON(data);
			if (o.success === false) {
				$('#message').show();
				$('#message').html(o.message);
				if (o.errors) {
					for (var form_name in o.errors) {
						$('#error_' + form_name).html(o.errors[form_name]);
					}
				}
			}
			else
			{
				// window.location.reload(true);
				// $('#datatables').dataTable().fnDraw();
				$('#modal').modal('hide');
				alert('<?=lang('password_success')?>');
			}

			console.log(data);
		});
    });

    $('#message').hide();
    $('input').bind('keypress', function (event) {
        var regex = new RegExp("^[ .a-zA-Z0-9\b\r\n]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
});
</script>