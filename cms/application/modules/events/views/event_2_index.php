<div class="row">

	<div class="col-md-12">

		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Event Settings</h3>
			</div>

			<div class="box-body">

				<?php echo form_open(current_url(), array('class'=>'form-horizontal', 'role'=>'form'));?>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="event_youtube_link_2">Youtube Link:</label>
					<?php $formdata = array('id'=>'event_youtube_link_2', 'name'=>'event_youtube_link_2', 'value'=>set_value('event_youtube_link_2', isset($config['event_youtube_link_2']) ? $config['event_youtube_link_2'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_event_youtube_link_2')?></div>
						<?php echo form_error('event_youtube_link_2'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="event_description_2">Event Description:</label>
					<?php $formdata = array('id'=>'event_description_2', 'name'=>'event_description_2', 'value'=>set_value('event_description_2', isset($config['event_description_2']) ? $config['event_description_2'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<?php echo form_error('event_description_2'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="event_highlight_description_2">Highlight Description:</label>
					<?php $formdata = array('id'=>'event_highlight_description_2', 'name'=>'event_highlight_description_2', 'value'=>set_value('event_highlight_description_2', isset($config['event_highlight_description_2']) ? $config['event_highlight_description_2'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<?php echo form_error('event_highlight_description_2'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="event_faqs_2">FAQs:</label>
					<?php $formdata = array('id'=>'event_faqs_2', 'name'=>'event_faqs_2', 'value'=>set_value('event_faqs_2', isset($config['event_faqs_2']) ? $config['event_faqs_2'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<?php echo form_error('event_faqs_2'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="event_register_2">How to Register:</label>
					<?php $formdata = array('id'=>'event_register_2', 'name'=>'event_register_2', 'value'=>set_value('event_register_2', isset($config['event_register_2']) ? $config['event_register_2'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<?php echo form_error('event_register_2'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="event_fb_link_2">Facebook Link:</label>
					<?php $formdata = array('id'=>'event_fb_link_2', 'name'=>'event_fb_link_2', 'value'=>set_value('event_fb_link_2', isset($config['event_fb_link_2']) ? $config['event_fb_link_2'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_event_fb_link_2')?></div>
						<?php echo form_error('event_fb_link_2'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="event_contact_2">Contact Details:</label>
					<?php $formdata = array('id'=>'event_contact_2', 'name'=>'event_contact_2', 'value'=>set_value('event_contact_2', isset($config['event_contact_2']) ? $config['event_contact_2'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_event_contact_2')?></div>
						<?php echo form_error('event_contact_2'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-4">
						<a href="<?=site_url('events/event_2/change_interface')?>" data-toggle="modal" data-target="#modal" class="btn btn-success btn-add form-action" id="btn_add"><span class="fa fa-asterisk"></span> Change Highlight Image</a>
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
