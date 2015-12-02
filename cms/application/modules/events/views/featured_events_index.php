<div class="row">

	<div class="col-md-12">

		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Featured Event Settings</h3>
			</div>

			<div class="box-body">

				<?php echo form_open(current_url(), array('class'=>'form-horizontal', 'role'=>'form'));?>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="featured_event_title_1">Event Title 1:</label>
					<?php $formdata = array('id'=>'featured_event_title_1', 'name'=>'featured_event_title_1', 'value'=>set_value('featured_event_title_1', isset($config['featured_event_title_1']) ? $config['featured_event_title_1'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_featured_event_title_1')?></div>
						<?php echo form_error('featured_event_title_1'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="featured_event_description_1">Featured Description 1:</label>
					<?php $formdata = array('id'=>'featured_event_description_1', 'name'=>'featured_event_description_1', 'value'=>set_value('featured_event_description_1', isset($config['featured_event_description_1']) ? $config['featured_event_description_1'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<?php echo form_error('featured_event_description_1'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="featured_event_title_2">Event Title 2:</label>
					<?php $formdata = array('id'=>'featured_event_title_2', 'name'=>'featured_event_title_2', 'value'=>set_value('featured_event_title_2', isset($config['featured_event_title_2']) ? $config['featured_event_title_2'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_featured_event_title_2')?></div>
						<?php echo form_error('featured_event_title_2'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="featured_event_description_2">Featured Description 2:</label>
					<?php $formdata = array('id'=>'featured_event_description_2', 'name'=>'featured_event_description_2', 'value'=>set_value('featured_event_description_2', isset($config['featured_event_description_2']) ? $config['featured_event_description_2'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<?php echo form_error('featured_event_description_2'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="featured_event_title_3">Event Title 3:</label>
					<?php $formdata = array('id'=>'featured_event_title_3', 'name'=>'featured_event_title_3', 'value'=>set_value('featured_event_title_3', isset($config['featured_event_title_3']) ? $config['featured_event_title_3'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_featured_event_title_3')?></div>
						<?php echo form_error('featured_event_title_3'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="featured_event_description_3">Featured Description 3:</label>
					<?php $formdata = array('id'=>'featured_event_description_3', 'name'=>'featured_event_description_3', 'value'=>set_value('featured_event_description_3', isset($config['featured_event_description_3']) ? $config['featured_event_description_3'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<?php echo form_error('featured_event_description_3'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-4">
						<a href="<?=site_url('events/featured_event/change_interface')?>" data-toggle="modal" data-target="#modal" class="btn btn-success btn-add form-action" id="btn_add"><span class="fa fa-asterisk"></span> Change Interface</a>
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
