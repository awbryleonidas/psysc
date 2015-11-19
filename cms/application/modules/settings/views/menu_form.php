<?php echo form_open(current_url(), array('class'=>'form-horizontal', 'role'=>'form'));?>

	<div class="row">

		<div class="col-md-6">

			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?=lang('header_personal_info')?></h3>
				</div>

				<div class="box-body">

					<div class="form-group">
						<label class="col-sm-3 control-label" for="menu_text"><?=lang('label_text')?>:</label>
						<?php $formdata = array('id'=>'menu_text', 'name'=>'menu_text', 'value'=>set_value('menu_text', isset($record->menu_text) ? $record->menu_text : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-9">
							<?php echo form_input($formdata); ?>
							<?php echo form_error('menu_text'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="menu_link"><?=lang('label_link')?>:</label>
						<?php $formdata = array('id'=>'menu_link', 'name'=>'menu_link', 'value'=>set_value('menu_link', isset($record->menu_link) ? $record->menu_link : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-9">
							<?php echo form_input($formdata); ?>
							<?php echo form_error('menu_link'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="menu_permission"><?=lang('label_permission')?>:</label>
						<?php $formdata = array('id'=>'menu_permission', 'name'=>'menu_permission', 'value'=>set_value('menu_permission', isset($record->menu_permission) ? $record->menu_permission : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-9">
							<?php echo form_input($formdata); ?>
							<?php echo form_error('menu_permission'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="menu_icon"><?=lang('label_icon')?>:</label>
						<?php $formdata = array('id'=>'menu_icon', 'name'=>'menu_icon', 'value'=>set_value('menu_icon', isset($record->menu_icon) ? $record->menu_icon : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-9">
							<?php echo form_input($formdata); ?>
							<?php echo form_error('menu_icon'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="menu_parent_id"><?=lang('label_parent_id')?>:</label>
						<div class="col-sm-9">
							<?php echo form_dropdown('menu_parent_id', $menu_items, set_value('menu_parent_id', (isset($record->menu_parent_id) && $record->menu_parent_id != '') ? $record->menu_parent_id : ''), 'id="menu_parent_id" class="form-control"'); ?>
							<?php echo form_error('menu_parent_id'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="menu_order"><?=lang('label_order')?>:</label>
						<div class="col-sm-3">
							<?php $options = array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10); ?>
							<?php echo form_dropdown('menu_order', $options, set_value('menu_order', isset($record->menu_order) ? $record->menu_order : 1), 'id="menu_order" class="form-control"'); ?>
							<?php echo form_error('menu_order'); ?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-4">
							<div class="checkbox">
								<label>
									<input <?php echo ($page_type == 'view') ? 'disabled="disabled"' : ''; ?> name="menu_active" type="checkbox" value="1" <?php echo set_checkbox('menu_active', 1, (isset($record->menu_active) && $record->menu_active == 1) ? TRUE : FALSE); ?> /> <?=lang('label_active')?>
								</label>
							</div>
							<?php echo form_error('menu_active'); ?>
						</div>
					</div>

				</div>

			</div>

		</div>


		<div class="col-md-6">

		</div>

		<div class="col-md-12">
			<div class="form-actions">
				<?php echo form_hidden('submit', 1); ?>				
				
				<a class="btn btn-default" href="<?php echo site_url('settings/menu'); ?>">
					<i class="fa fa-arrow-circle-left"></i> <?=lang('button_back')?>
				</a>

				<?php if ($page_type == 'view'): ?>
					<a class="btn btn-primary" href="<?php echo site_url('settings/menu/edit/' . $record->menu_id); ?>">
						<i class="fa fa-pencil-square"></i> <?=lang('button_edit_this')?>
					</a>
				<?php elseif ($page_type == 'add'): ?>
					<button class="btn btn-primary" type="submit" class="form-action">
						<i class="fa fa-save"></i> <?=lang('button_add_menu')?>
					</button>
				<?php else: ?>
					<button class="btn btn-primary" type="submit" class="form-action">
						<i class="fa fa-save"></i> <?=lang('button_update_menu')?>
					</button>
				<?php endif; ?>
			</div>
		</div>
	</div>	
<?php echo form_close();?>