<div class="row">

	<div class="col-md-12">

		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Featured Event Settings</h3>
			</div>

			<div class="box-body">

				<?php echo form_open(current_url(), array('class'=>'form-horizontal', 'role'=>'form'));?>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="featured_event_title">Event Title:</label>
					<?php $formdata = array('id'=>'featured_event_title', 'name'=>'featured_event_title', 'value'=>set_value('featured_event_title', isset($config['featured_event_title']) ? $config['featured_event_title'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_featured_event_title')?></div>
						<?php echo form_error('featured_event_title'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="featured_event_description">Featured Description:</label>
					<?php $formdata = array('id'=>'featured_event_description', 'name'=>'featured_event_description', 'value'=>set_value('featured_event_description', isset($config['featured_event_description']) ? $config['featured_event_description'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<?php echo form_error('featured_event_description'); ?>
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
