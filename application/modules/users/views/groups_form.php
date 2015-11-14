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
			<label class="col-xs-2 control-label" for="group_name"><?=lang('label_group')?>:</label>
			<div class="col-xs-10">
				<?php $formdata = array('id'=>'group_name', 'name'=>'group_name', 'value'=>set_value('group_name', isset($record->group_name) ? $record->group_name : ''), 'class'=>'form-control'); ?>
				<?php echo form_input($formdata);?>
				<?php //echo form_error('group_name'); ?>
				<div id="error_group_name"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-2 control-label" for="group_description"><?=lang('label_description')?>:</label>
			<div class="col-xs-10">
				<?php $formdata = array('id'=>'group_description', 'name'=>'group_description', 'rows'=>'5', 'value'=>set_value('group_description', isset($record->group_description) ? $record->group_description : ''), 'class'=>'form-control'); ?>
				<?php echo form_textarea($formdata); ?>
				<?php //echo form_error('group_description'); ?>
				<div id="error_group_description"></div>
			</div>
		</div>
	
	<?php echo form_close();?>

</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-times"></i> <?=lang('button_close')?>
	</button>
	<?php if ($page_type == 'add'): ?>
		<button id="submit" class="btn btn-primary" type="submit">
			<i class="fa fa-save"></i> <?=lang('button_add_group')?>
		</button>
	<?php else: ?>
		<button id="submit" class="btn btn-primary" type="submit">
			<i class="fa fa-save"></i> <?=lang('button_update_group')?>
		</button>
	<?php endif; ?>
</div>

<script>
$(function(){
    $('#submit').click(function(e){
    	e.preventDefault();

    	var ajax_url = "<?php echo current_url(); ?>";
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
						$('#error_' + form_name).html(o.errors[form_name]);
					}
				}
			}
			else
			{
				// window.location.reload(true);
				$('#datatables').dataTable().fnDraw();
				$('#modal').modal('hide');
				alertify.success("<?php echo ($page_type == 'add') ? lang('add_success') : lang('edit_success'); ?>");
			}

			console.log(data);
		});
    });

    $('#message').hide();
});
</script>