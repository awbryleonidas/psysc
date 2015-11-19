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
			<label class="col-xs-3 control-label" for="user_firstname"><?=lang('label_firstname')?>:</label>
			<div class="col-xs-8">
				<?php $formdata = array('id'=>'user_firstname', 'name'=>'user_firstname', 'value'=>set_value('user_firstname', isset($record->user_firstname) ? $record->user_firstname : ''), 'class'=>'form-control'); ?>
				<?php echo form_input($formdata);?>
				<div id="error_user_firstname"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-3 control-label" for="user_lastname"><?=lang('label_lastname')?>:</label>
			<div class="col-xs-8">
				<?php $formdata = array('id'=>'user_lastname', 'name'=>'user_lastname', 'value'=>set_value('user_lastname', isset($record->user_lastname) ? $record->user_lastname : ''), 'class'=>'form-control'); ?>
				<?php echo form_input($formdata);?>
				<div id="error_user_lastname"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-3 control-label" for="user_email"><?=lang('label_email')?>:</label>
			<div class="col-xs-8">
				<?php $formdata = array('id'=>'user_email', 'name'=>'user_email', 'value'=>set_value('user_email', isset($record->user_email) ? $record->user_email : ''), 'class'=>'form-control'); ?>
				<?php echo form_input($formdata);?>
				<div id="error_user_email"></div>
			</div>
		</div>
	
	<?php echo form_close();?>

</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-times"></i> <?=lang('button_close')?>
	</button>

	<button id="submit" class="btn btn-primary" type="submit">
		<i class="fa fa-save"></i> <?=lang('button_update_profile')?>
	</button>
</div>

<script>
$(function(){
    $('#submit').click(function(e){
    	e.preventDefault();

    	var ajax_url = "<?php echo current_url(); ?>";
    	var ajax_load = '<span class="help-block text-center">Loading...</span>';
        $(ajax_load).load(ajax_url, {
			'user_firstname': $('#user_firstname').val(),
			'user_lastname': $('#user_lastname').val(),
			'user_email': $('#user_email').val(),
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
			}

			console.log(data);
		});
    });

    $('#message').hide();
});
</script>