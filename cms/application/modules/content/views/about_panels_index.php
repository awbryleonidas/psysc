<div class="row">

	<div class="col-md-12">

		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">About Us Settings</h3>
			</div>

			<div class="box-body">

				<?php echo form_open(current_url(), array('class'=>'form-horizontal', 'role'=>'form'));?>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="about_us_caption">About Us Caption:</label>
					<?php $formdata = array('id'=>'about_us_caption', 'name'=>'about_us_caption', 'value'=>set_value('about_us_caption', isset($config['about_us_caption']) ? $config['about_us_caption'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_about_us_caption')?></div>
						<?php echo form_error('about_us_caption'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="about_us_panel_name_1">Panel 1:</label>
					<?php $formdata = array('id'=>'about_us_panel_name_1', 'name'=>'about_us_panel_name_1', 'value'=>set_value('about_us_panel_name_1', isset($config['about_us_panel_name_1']) ? $config['about_us_panel_name_1'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_about_us_panel_name_1')?></div>
						<?php echo form_error('about_us_panel_name_1'); ?>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-4 control-label" for="about_us_panel_text_1">Panel 1 Text:</label>
					<?php $formdata = array('id'=>'about_us_panel_text_1', 'name'=>'about_us_panel_text_1', 'value'=>set_value('about_us_panel_text_1', isset($config['about_us_panel_text_1']) ? $config['about_us_panel_text_1'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<?php echo form_error('about_us_panel_text_1'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="about_us_panel_name_2">Panel 2:</label>
					<?php $formdata = array('id'=>'about_us_panel_name_2', 'name'=>'about_us_panel_name_2', 'value'=>set_value('about_us_panel_name_2', isset($config['about_us_panel_name_2']) ? $config['about_us_panel_name_2'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_about_us_panel_name_2')?></div>
						<?php echo form_error('about_us_panel_name_2'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="about_us_panel_text_2">Panel 2 Text:</label>
					<?php $formdata = array('id'=>'about_us_panel_text_2', 'name'=>'about_us_panel_text_2', 'value'=>set_value('about_us_panel_text_2', isset($config['about_us_panel_text_2']) ? $config['about_us_panel_text_2'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<?php echo form_error('about_us_panel_text_2'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-4">
						<a href="<?=site_url('content/about_panel/change_interface')?>" data-toggle="modal" data-target="#modal" class="btn btn-success btn-add form-action" id="btn_add"><span class="fa fa-asterisk"></span> Change Interface</a>
					</div>
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
