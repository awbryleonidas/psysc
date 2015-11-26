<div class="row">

	<div class="col-md-12">

		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Event Settings</h3>
			</div>

			<div class="box-body">

				<?php echo form_open(current_url(), array('class'=>'form-horizontal', 'role'=>'form'));?>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="event_youtube_link_3">Youtube Link:</label>
					<?php $formdata = array('id'=>'event_youtube_link_3', 'name'=>'event_youtube_link_3', 'value'=>set_value('event_youtube_link_3', isset($config['event_youtube_link_3']) ? $config['event_youtube_link_3'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_event_youtube_link_3')?></div>
						<?php echo form_error('event_youtube_link_3'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="event_description_3">Event Description:</label>
					<?php $formdata = array('id'=>'event_description_3', 'name'=>'event_description_3', 'value'=>set_value('event_description_3', isset($config['event_description_3']) ? $config['event_description_3'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<?php echo form_error('event_description_3'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="event_highlight_description_3">Highlight Description:</label>
					<?php $formdata = array('id'=>'event_highlight_description_3', 'name'=>'event_highlight_description_3', 'value'=>set_value('event_highlight_description_3', isset($config['event_highlight_description_3']) ? $config['event_highlight_description_3'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<?php echo form_error('event_highlight_description_3'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="event_faqs_3">FAQs:</label>
					<?php $formdata = array('id'=>'event_faqs_3', 'name'=>'event_faqs_3', 'value'=>set_value('event_faqs_3', isset($config['event_faqs_3']) ? $config['event_faqs_3'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<?php echo form_error('event_faqs_3'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="event_register_3">How to Register:</label>
					<?php $formdata = array('id'=>'event_register_3', 'name'=>'event_register_3', 'value'=>set_value('event_register_3', isset($config['event_register_3']) ? $config['event_register_3'] : ''), 'class'=>'form-control', 'rows'=>'2'); ?>
					<div class="col-sm-8">
						<?php echo form_textarea($formdata); ?>
						<?php echo form_error('event_register_3'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="event_fb_link_3">Facebook Link:</label>
					<?php $formdata = array('id'=>'event_fb_link_3', 'name'=>'event_fb_link_3', 'value'=>set_value('event_fb_link_3', isset($config['event_fb_link_3']) ? $config['event_fb_link_3'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_event_fb_link_3')?></div>
						<?php echo form_error('event_fb_link_3'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="event_contact_3">Contact Details:</label>
					<?php $formdata = array('id'=>'event_contact_3', 'name'=>'event_contact_3', 'value'=>set_value('event_contact_3', isset($config['event_contact_3']) ? $config['event_contact_3'] : ''), 'class'=>'form-control'); ?>
					<div class="col-sm-8">
						<?php echo form_input($formdata); ?>
						<div class="help-text"><?=lang('text_event_contact_3')?></div>
						<?php echo form_error('event_contact_3'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-4">
						<a href="<?=site_url('events/event_3/change_interface')?>" data-toggle="modal" data-target="#modal" class="btn btn-success btn-add form-action" id="btn_add"><span class="fa fa-asterisk"></span> Change Highlight Image</a>
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
