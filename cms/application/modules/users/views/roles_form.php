<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"> 
		<span aria-hidden="true">&times;</span>
		<span class="sr-only"><?php echo lang('button_close')?></span>
	</button>
	<h4 class="modal-title" id="myModalLabel"><?php echo $page_heading?></h4>
</div>

<div class="modal-body">
		
	<?php echo form_open(current_url(), array('class'=>'form-horizontal'));?>

		<div class="form-group">
			<label class="col-xs-3 control-label" for="group_name"><?php echo lang('label_role')?>:</label> 
			<div class="col-xs-8">
				<?php echo form_input(array('id'=>'group_name', 'name'=>'group_name', 'value'=>set_value('group_name', isset($record->name) ? $record->name : ''), 'class'=>'form-control'));?>
				<div id="error-group_name"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-3 control-label" for="group_description"><?php echo lang('label_description')?>:</label>
			<div class="col-xs-8">
				<?php echo form_textarea(array('id'=>'group_description', 'name'=>'group_description', 'rows'=>'5', 'value'=>set_value('group_description', isset($record->description) ? $record->description : ''), 'class'=>'form-control')); ?>
				<div id="error-group_description"></div>
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