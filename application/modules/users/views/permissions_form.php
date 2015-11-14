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

		<div class="callout callout-info"><?=lang('text_instruction2')?></div>
					
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="permission_name"><?=lang('label_permission')?>:</label>
			<?php $formdata = array('id'=>'permission_name', 'name'=>'permission_name', 'value'=>set_value('permission_name', isset($record->permission_name) ? $record->permission_name : ''), 'class'=>'form-control'); ?>
			<div class="col-sm-9">
				<?php echo form_input($formdata); ?>
				<div id="error_permission_name"></div>
			</div>
			
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<div class="checkbox">
					<label>
						<input <?php echo ($page_type == 'view') ? 'disabled="disabled"' : ''; ?> id="permission_simple" name="perm_simple" type="checkbox" value="1" <?php echo set_checkbox('permission_simple', 1, (isset($record->permission_simple) && $record->permission_simple == 1) ? TRUE : FALSE); ?> /> <?=lang('label_simple')?>
					</label>
				</div>
				<div id="error_permission_simple"></div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-4">
				<div class="checkbox">
					<label>
						<input <?php echo ($page_type == 'view') ? 'disabled="disabled"' : ''; ?> id="permission_active" name="perm_active" type="checkbox" value="1" <?php echo set_checkbox('permission_active', 1, (isset($record->permission_active) && $record->permission_active == 1) ? TRUE : FALSE); ?> /> <?=lang('label_active')?>
					</label>
				</div>
				<div id="error_permission_active"></div>
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
			<i class="fa fa-save"></i> <?=lang('button_add_permission')?>
		</button>
	<?php else: ?>
		<button id="submit" class="btn btn-primary" type="submit">
			<i class="fa fa-save"></i> <?=lang('button_update_permission')?>
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