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
			<label class="col-sm-4 control-label" for="first_name"><?php echo lang('first_name')?>:</label>
			<div class="col-sm-7">
				<?php echo form_input(array('id'=>'first_name', 'name'=>'first_name', 'value'=>set_value('first_name', isset($record->first_name) ? $record->first_name : ''), 'class'=>'form-control'));?>
				<div id="error-first_name"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-4 control-label" for="last_name"><?php echo lang('last_name')?>:</label>
			<div class="col-sm-7">
				<?php echo form_input(array('id'=>'last_name', 'name'=>'last_name', 'value'=>set_value('last_name', isset($record->last_name) ? $record->last_name : ''), 'class'=>'form-control'));?>
				<div id="error-last_name"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-4 control-label" for="email"><?php echo lang('email')?>:</label>
			<div class="col-sm-7">
				<?php echo form_input(array('id'=>'email', 'name'=>'email', 'value'=>set_value('email', isset($record->email) ? $record->email : ''), 'class'=>'form-control'));?>
				<div id="error-email"></div>
			</div>
		</div>

		

		<hr />

		<div class="form-group">
			<label class="col-sm-4 control-label" for="username"><?php echo lang('username')?>:</label>
			<div class="col-sm-7">
				<?php echo form_input(array('id'=>'username', 'name'=>'username', 'value'=>set_value('username', isset($record->username) ? $record->username : ''), 'class'=>'form-control'));?>
				<div id="error-username"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-4 control-label" for="password"><?php echo lang('password')?>:</label>
			<div class="col-sm-7">
				<?php echo form_password(array('id'=>'password', 'name'=>'password', 'value'=>set_value('password'), 'class'=>'form-control'));?>
				<div id="error-password"></div>
				<?php if ($page_type == 'edit'): ?>
					<div class="help-text"><?php echo lang('edit_leave_blank')?></div>
				<?php endif; ?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-4 control-label" for="password_confirm"><?php echo lang('password_confirm')?>:</label>
			<div class="col-sm-7">
				<?php echo form_password(array('id'=>'password_confirm', 'name'=>'password_confirm', 'value'=>set_value('password_confirm'), 'class'=>'form-control'));?>
				<div id="error-password_confirm"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-4 control-label" for="groups"><?php echo lang('groups')?>:</label>
			<div class="col-sm-7">
				<select id="select-groups" class="hide">
					<?php foreach ($groups as $group):?>
						<option value="<?php echo $group->id?>"><?php echo $group->name?></option>
					<?php endforeach; ?>
				</select>
				<select multiple name="groups[]" id="groups" class="populate-groups form-control"></select>
				<div id="error-groups"></div>
			</div>
		</div>
		<script>
			var default_groups = <?php echo $current_groups?>;
		</script>

	<?php echo form_close();?>
</div>

<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-times"></i> <?php echo lang('button_close')?>
	</button>
	<?php if ($page_type == 'add'): ?>
		<button id="submit" class="btn btn-success" type="submit">
			<i class="fa fa-save"></i> <?php echo lang('button_add')?>
		</button>
	<?php else: ?>
		<button id="submit" class="btn btn-success" type="submit">
			<i class="fa fa-save"></i> <?php echo lang('button_update')?>
		</button>
	<?php endif; ?>
</div>