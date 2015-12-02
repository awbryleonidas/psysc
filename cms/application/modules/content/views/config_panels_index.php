<div class="row">

	<div class="col-md-12">

		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Configurations</h3>
			</div>

			<div class="box-body">

				<?php echo form_open(current_url(), array('class'=>'form-horizontal', 'role'=>'form'));?>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="config_contact_text">Contact Us Text:</label>
					<?php $formdata = array('id'=>'config_contact_text', 'name'=>'config_contact_text', 'value'=>set_value('config_contact_text', isset($config['config_contact_text']) ? $config['config_contact_text'] : ''), 'class'=>'form-control', 'rows'=>'3'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<div class="help-text"><?=lang('text_config_contact_text')?></div>
						<?php echo form_error('config_contact_text'); ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="config_subscribe_text">Subscribe Text:</label>
					<?php $formdata = array('id'=>'config_subscribe_text', 'name'=>'config_subscribe_text', 'value'=>set_value('config_subscribe_text', isset($config['config_subscribe_text']) ? $config['config_subscribe_text'] : ''), 'class'=>'form-control', 'rows'=>'3'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<div class="help-text"><?=lang('text_config_subscribe_text')?></div>
						<?php echo form_error('config_subscribe_text'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="config_contact">Contact Number:</label>
					<?php $formdata = array('id'=>'config_contact', 'name'=>'config_contact', 'value'=>set_value('config_contact', isset($config['config_contact']) ? $config['config_contact'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_config_contact')?></div>
						<?php echo form_error('config_contact'); ?>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-4 control-label" for="config_email">E-mail Address:</label>
					<?php $formdata = array('id'=>'config_email', 'name'=>'config_email', 'value'=>set_value('config_email', isset($config['config_email']) ? $config['config_email'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<?php echo form_error('config_email'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="config_office_location">Office Location:</label>
					<?php $formdata = array('id'=>'config_office_location', 'name'=>'config_office_location', 'value'=>set_value('config_office_location', isset($config['config_office_location']) ? $config['config_office_location'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_config_office_location')?></div>
						<?php echo form_error('config_office_location'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="config_working_hours">Working Hours:</label>
					<?php $formdata = array('id'=>'config_working_hours', 'name'=>'config_working_hours', 'value'=>set_value('config_working_hours', isset($config['config_working_hours']) ? $config['config_working_hours'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<?php echo form_error('config_working_hours'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="config_fb">Official Facebook Page:</label>
					<?php $formdata = array('id'=>'config_fb', 'name'=>'config_fb', 'value'=>set_value('config_fb', isset($config['config_fb']) ? $config['config_fb'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<?php echo form_error('config_fb'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="config_twitter">Official Twitter Page:</label>
					<?php $formdata = array('id'=>'config_twitter', 'name'=>'config_twitter', 'value'=>set_value('config_twitter', isset($config['config_twitter']) ? $config['config_twitter'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<?php echo form_error('config_twitter'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label"></label>
					<div class="col-sm-4">
						<button class="btn btn-primary" type="submit" class="form-action">
							<i class="fa fa-save"></i> Save Changes
						</button>
					</div>
				</div>

				<?php echo form_hidden('submit', 1); ?>

				<?php echo form_close();?>

			</div>
		</div>


	</div>
