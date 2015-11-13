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
			<label class="col-sm-3 control-label" for="first_name"><?php echo lang('first_name')?>:</label>
			<div class="col-sm-8">
				<?php echo form_input(array('id'=>'first_name', 'name'=>'first_name', 'value'=>set_value('first_name', isset($record->first_name) ? $record->first_name : ''), 'class'=>'form-control'));?>
				<div id="error-first_name"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label" for="last_name"><?php echo lang('last_name')?>:</label>
			<div class="col-sm-8">
				<?php echo form_input(array('id'=>'last_name', 'name'=>'last_name', 'value'=>set_value('last_name', isset($record->last_name) ? $record->last_name : ''), 'class'=>'form-control'));?>
				<div id="error-last_name"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label" for="email"><?php echo lang('email')?>:</label>
			<div class="col-sm-8">
				<?php echo form_input(array('id'=>'email', 'name'=>'email', 'value'=>set_value('email', isset($record->email) ? $record->email : ''), 'class'=>'form-control'));?>
				<div id="error-email"></div>
			</div>
		</div>

	<?php echo form_close();?>
</div>

<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-times"></i> <?php echo lang('button_close')?>
	</button>
	<button id="submit" class="btn btn-success" type="submit">
		<i class="fa fa-save"></i> <?php echo lang('button_profile')?>
	</button>
</div>