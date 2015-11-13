<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only"><?php echo lang('button_close')?></span>
	</button>
	<h4 class="modal-title" id="myModalLabel"><?php echo $page_heading?></h4>
</div>

<div class="modal-body">
		
	<?php echo form_open(current_url(), array('class'=>'form-horizontal'));?>

		<div class="callout callout-info"><?php echo lang('text_instruction2')?></div>
					
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="permission_name"><?php echo lang('label_permission')?>:</label>
			<div class="col-sm-9">
				<?php echo form_input(array('id'=>'permission_name', 'name'=>'permission_name', 'value'=>set_value('permission_name', isset($record->permission_name) ? $record->permission_name : ''), 'class'=>'form-control')); ?>
				<div id="error-permission_name"></div>
			</div>
			
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<div class="checkbox">
					<label>
						<input <?php echo ($page_type == 'view') ? 'disabled="disabled"' : ''; ?> id="permission_simple" name="perm_simple" type="checkbox" value="1" <?php echo set_checkbox('permission_simple', 1, (isset($record->permission_simple) && $record->permission_simple == 1) ? TRUE : FALSE); ?> /> <?php echo lang('label_simple')?>
					</label>
				</div>
				<div id="error-permission_simple"></div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-4">
				<div class="checkbox">
					<label>
						<input <?php echo ($page_type == 'view') ? 'disabled="disabled"' : ''; ?> id="permission_active" name="perm_active" type="checkbox" value="1" <?php echo set_checkbox('permission_active', 1, (isset($record->permission_active) && $record->permission_active == 1) ? TRUE : FALSE); ?> /> <?php echo lang('label_active')?>
					</label>
				</div>
				<div id="error-permission_active"></div>
			</div>
		</div>
	
	<?php echo form_close();?>

</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-times"></i> <?php echo lang('button_close')?>
	</button>
	<?php if ($page_type == 'add'): ?>
		<button id="submit" class="btn btn-primary" type="submit">
			<i class="fa fa-save"></i> <?php echo lang('button_add')?>
		</button>
	<?php else: ?>
		<button id="submit" class="btn btn-primary" type="submit">
			<i class="fa fa-save"></i> <?php echo lang('button_update')?>
		</button>
	<?php endif; ?>
</div>