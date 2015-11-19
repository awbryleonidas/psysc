<div class="row">

	<?php echo form_open(current_url(), array('class'=>'form-horizontal'));?>
	
		<div class="col-md-6">

			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?=lang('header_user_info')?></h3>
				</div>

				<div class="box-body">

					<div class="form-group">
						<label class="col-sm-3 control-label" for="user_firstname"><?=lang('label_firstname')?>:</label>
						<div class="col-sm-9">
							<?php $formdata = array('id'=>'user_firstname', 'name'=>'user_firstname', 'value'=>set_value('user_firstname', isset($record->user_firstname) ? $record->user_firstname : ''), 'class'=>'form-control'); ?>
							<?php echo form_input($formdata);?>
							<?php echo form_error('user_firstname'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="user_lastname"><?=lang('label_lastname')?>:</label>
						<div class="col-sm-9">
							<?php $formdata = array('id'=>'user_lastname', 'name'=>'user_lastname', 'value'=>set_value('user_lastname', isset($record->user_lastname) ? $record->user_lastname : ''), 'class'=>'form-control'); ?>
							<?php echo form_input($formdata);?>
							<?php echo form_error('user_lastname'); ?>
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-3 control-label" for="user_email"><?=lang('label_email')?>:</label>
						<div class="col-sm-9">
							<?php $formdata = array('id'=>'user_email', 'name'=>'user_email', 'value'=>set_value('user_email', isset($record->user_email) ? $record->user_email : ''), 'class'=>'form-control'); ?>
							<?php echo form_input($formdata);?>
							<?php echo form_error('user_email'); ?>
							<div class="help-text"><?=lang('text_form_email')?></div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="user_groups"><?=lang('label_groups')?>:</label>
						<div class="col-sm-9">
							<select id="select-groups" class="hide">
								<?php foreach ($groups as $group):?>
									<option value="<?=$group->group_id?>"><?=$group->group_name?></option>
								<?php endforeach; ?>
							</select>
							<select multiple name="user_groups[]" id="user_groups" class="populate-groups form-control"></select>
							<?php echo form_error('user_groups'); ?>
							<div class="help-text"><?=lang('text_form_groups')?></div>
						</div>
					</div>
					<script>
						var default_groups = <?=$current_groups?>;
					</script>

				</div>

			</div>

		</div>

		<div class="col-md-6">


			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?=lang('header_access_info')?></h3>
				</div>

				<div class="box-body">


					<div class="form-group">
						<label class="col-sm-3 control-label" for="user_username"><?=lang('label_username')?>:</label>
						<div class="col-sm-9">
							<?php $formdata = array('id'=>'user_username', 'name'=>'user_username', 'value'=>set_value('user_username', isset($record->user_username) ? $record->user_username : ''), 'class'=>'form-control'); ?>
							<?php echo form_input($formdata);?>
							<?php echo form_error('user_username'); ?>
							<div class="help-text"><?=lang('text_form_username')?></div>
						</div>
					</div>

					<div id="passwords">

						<div class="form-group hide-on-view">
							<label class="col-sm-3 control-label" for="user_password"><?=lang('label_password')?>:</label>
							<div class="col-sm-9">
								<?php $formdata = array('id'=>'user_password', 'name'=>'user_password', 'value'=>set_value('user_password'), 'class'=>'form-control'); ?>
								<?php echo form_password($formdata);?>
								<?php echo form_error('user_password'); ?>
								<?php if ($page_type == 'edit'): ?>
									<div class="help-text"><?=lang('edit_leave_blank')?></div>
								<?php endif; ?>
							</div>
						</div>

						<div class="form-group hide-on-view">
							<label class="col-sm-3 control-label" for="user_password_confirm"><?=lang('label_retype_password')?>:</label>
							<div class="col-sm-9">
								<?php $formdata = array('id'=>'user_password_confirm', 'name'=>'user_password_confirm', 'value'=>set_value('user_password_confirm'), 'class'=>'form-control'); ?>
								<?php echo form_password($formdata);?>
								<?php echo form_error('user_password_confirm'); ?>
							</div>
						</div>
					</div>

					


				</div>

			</div>

		</div>

		
		<div class="col-md-12">

			<div class="form-actions">
				<?php echo form_hidden('submit', 1); ?>	
				<?php echo form_hidden('page_type', $page_type); ?>				
				
				<a class="btn btn-default" href="<?php echo site_url('users'); ?>">
					<i class="fa fa-arrow-circle-left"></i> <?=lang('button_back')?>
				</a>

				<?php if ($page_type == 'view'): ?>
					<a class="btn btn-primary" href="<?php echo site_url('users/edit/' . $record->user_id); ?>">
						<i class="fa fa-pencil-square"></i> <?=lang('button_edit_this')?>
					</a>
				<?php elseif ($page_type == 'add'): ?>
					<button class="btn btn-primary" type="submit" class="form-action">
						<i class="fa fa-save"></i> <?=lang('button_add_user')?>
					</button>
				<?php else: ?>
					<button class="btn btn-primary" type="submit" class="form-action">
						<i class="fa fa-save"></i> <?=lang('button_update_user')?>
					</button>
				<?php endif; ?>
			</div>

		</div>

	<?php echo form_close();?>
		
	
</div>