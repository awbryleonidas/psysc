<?php echo form_open(current_url(), array('class'=>'form-horizontal'));?>
<div class="box box-primary">

	<div class="box-body">

		<h3 class="form-title">Module Information</h3>

		<div class="row bottom-margin3">

			<div class="col-sm-6">

				<div class="form-group">
					<label class="col-sm-3 control-label" for="parent_module"><?php echo lang('parent_module')?>:</label>
					<div class="col-sm-9">
						<?php echo form_dropdown('parent_module', $modules, set_value('parent_module'), 'id="parent_module" class="form-control"'); ?>
						<div id="error-parent_module"></div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="module_name_plural"><?php echo lang('module_name'); ?>:</label>
					<div class="col-sm-9">
						<?php echo form_input(array('id'=>'module_name_plural', 'name'=>'module_name_plural', 'value'=>set_value('module_name_plural'), 'class'=>'form-control', 'placeholder' => lang('module_name_plural')));?>
						<?php echo form_error('module_name_plural'); ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<?php echo form_input(array('id'=>'module_name_singular', 'name'=>'module_name_singular', 'value'=>set_value('module_name_singular'), 'class'=>'form-control', 'placeholder' => lang('module_name_singular')));?>
						<?php echo form_error('module_name_singular'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="module_version"><?php echo lang('module_version'); ?>:</label>
					<div class="col-sm-3">
						<?php echo form_input(array('id'=>'module_version', 'name'=>'module_version', 'value'=>set_value('module_version', '1.0'), 'class'=>'form-control'));?>
					</div>
					<label class="col-sm-3 control-label" for="package_name"><?php echo lang('package_name'); ?>:</label>
					<div class="col-sm-3">
						<?php echo form_input(array('id'=>'package_name', 'name'=>'package_name', 'value'=>set_value('package_name', 'Codifire'), 'class'=>'form-control'));?>
					</div>
					<div class="col-sm-offset-3 col-sm-9">
						<?php echo form_error('module_version'); ?>
						<?php echo form_error('package_name'); ?>
					</div>
				</div>

			</div>

			<div class="col-sm-6">

				<div class="form-group">
					<label class="col-sm-3 control-label" for="author_name"><?php echo lang('copyright'); ?>:</label>
					<div class="col-sm-4">
						<?php echo form_input(array('id'=>'author_name', 'name'=>'author_name', 'value'=>set_value('author_name', $user->first_name . ' ' . $user->last_name), 'class'=>'form-control', 'placeholder' => lang('author_name')));?>
						<?php echo form_error('author_name'); ?>
					</div>
					<div class="col-sm-5">
						<?php echo form_input(array('id'=>'author_email', 'name'=>'author_email', 'value'=>set_value('author_email', $user->email), 'class'=>'form-control', 'placeholder' => lang('author_email')));?>
						<?php echo form_error('author_email'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="copyright_name"><?php echo lang('copyright_name'); ?>:</label>
					<div class="col-sm-5">
						<?php echo form_input(array('id'=>'copyright_name', 'name'=>'copyright_name', 'value'=>set_value('copyright_name', 'Digify, Inc.'), 'class'=>'form-control'));?>
						<?php echo form_error('copyright_name'); ?>
					</div>
					<label class="col-sm-1 control-label" for="copyright_year"><?php echo lang('copyright_year'); ?>:</label>
					<div class="col-sm-3">
						<?php echo form_input(array('id'=>'copyright_year', 'name'=>'copyright_year', 'value'=>set_value('copyright_year', date('Y')), 'class'=>'form-control'));?>
						<?php echo form_error('copyright_year'); ?>
					</div>

				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="copyright_link"><?php echo lang('copyright_link'); ?>:</label>
					<div class="col-sm-9">
						<?php echo form_input(array('id'=>'copyright_link', 'name'=>'copyright_link', 'value'=>set_value('copyright_link', 'http://www.digify.com.ph'), 'class'=>'form-control'));?>
						<?php echo form_error('copyright_link'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="module_icon"><?php echo lang('module_icon'); ?>:</label>
					<div class="col-sm-5">
						<?php echo form_input(array('id'=>'module_icon', 'name'=>'module_icon', 'value'=>set_value('module_icon', 'fa fa-leaf'), 'class'=>'form-control'));?>
						<?php echo form_error('module_icon'); ?>
					</div>
					<label class="col-sm-1 control-label" for="module_order"><?php echo lang('module_order'); ?>:</label>
					<div class="col-sm-3">
						<?php echo form_input(array('id'=>'module_order', 'name'=>'module_order', 'value'=>set_value('module_order', 2), 'class'=>'form-control'));?>
						<?php echo form_error('module_order'); ?>
					</div>

				</div>

			</div>

		</div>

		<h3 class="form-title">Table Information</h3>

		<div class="callout bg-info"><strong>Database name</strong> will be the lowercased plural name of the module (eg. customers) and <strong>primary key</strong> will be automatically created. Use underscore to separate column names. After adding the module, go to <strong>Develop > Migration Files</strong> to migrate the database then go to <strong>Users > Roles</strong> to enable the permission.</div>



		<?php $types = create_dropdown('array', 'VARCHAR,CHAR,TEXT,DATE,DATETIME,BIGINT,INT,MEDIUMINT,SMALLINT,TINYINT,DECIMAL'); ?>
		<?php $form_types = create_dropdown('array', 'INPUT,SELECT,TEXTAREA,CHECKBOX,RADIO'); ?>
		<?php $is_unsigned = create_dropdown('array', ',Unsigned'); ?>
		<?php $is_null = create_dropdown('array', ',Null'); ?>
		<?php $is_index = create_dropdown('array', ',Index'); ?>

		<div class="table_column" id="row_template">

			<div class="form-group">
				<div class="col-sm-3">
					<div class="input-group">
						<span class="input-group-addon table-name">table_</span>
						<?php echo form_input(array('name'=>'column_name[]', 'value'=>set_value('column_name[]'), 'class'=>'form-control input-sm', 'placeholder' => 'column_name'));?>
					</div>
				</div>
				<div class="col-sm-2">
					<?php echo form_dropdown('column_type[]', $types, set_select('column_type[]'), 'class="form-control input-sm"'); ?>
				</div>
				<div class="col-sm-1">
					<?php echo form_input(array('name'=>'column_length[]', 'value'=>set_value('column_length[]'), 'class'=>'form-control input-sm', 'placeholder' => 'Length'));?>
				</div>
				
				<div class="col-sm-2">
					<?php echo form_dropdown('form_type[]', $form_types, set_select('form_type[]'), 'class="form-control input-sm"'); ?>
				</div>
				<div class="col-sm-2">
					<?php echo form_dropdown('column_unsigned[]', $is_unsigned, set_select('column_unsigned[]'), 'class="form-control input-sm"'); ?>
				</div>
				<div class="col-sm-1">
					<?php echo form_dropdown('column_null[]', $is_null, set_select('column_null[]'), 'class="form-control input-sm"'); ?>
				</div>
				<div class="col-sm-1">
					<?php echo form_dropdown('column_index[]', $is_index, set_select('column_index[]'), 'class="form-control input-sm"'); ?>
				</div>

			</div>

		</div>

		<div class="help-block"><em>Use underscore to separate words.</em></div>
		
	</div>
	<div class="box-footer">
		<button id="clone" class="btn btn-warning btn-sm" type="button"><i class="fa fa-copy"></i> Another Row</button>
		<button class="btn btn-primary pull-right" type="submit"><i class="fa fa-save"></i> Create Module</button>
	</div>
</div>
<?php echo form_hidden('submit', 1); ?>	
<?php echo form_close();?>