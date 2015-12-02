<section class="content">
	<div class="row">

		<div class="col-md-4">

			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Panel 1</h3>
				</div>

				<div class="box-body">

					<?php echo form_open(current_url(), array('class'=>'form-horizontal', 'role'=>'form'));?>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_text_1">Text:</label>
						<?php $formdata = array('id'=>'home_text_1', 'name'=>'home_text_1', 'value'=>set_value('home_text_1', isset($config['home_text_1']) ? $config['home_text_1'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_home_text_1')?></div>
							<?php echo form_error('home_text_1'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_caption_1">Caption:</label>
						<?php $formdata = array('id'=>'home_caption_1', 'name'=>'home_caption_1', 'value'=>set_value('home_caption_1', isset($config['home_caption_1']) ? $config['home_caption_1'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_home_caption_1')?></div>
							<?php echo form_error('home_caption_1'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-xs-3 control-label" for="home_link_1">Link:</label>
						<div class="col-xs-8">
							<?php $home_link = array(
									'about' => 'About', 'clients' => 'Events', 'blog' => 'News', 'contact' => 'Contact Us',
							);?>
							<?php echo form_dropdown('home_link_1', $home_link, set_value('home_link_1', (isset($config['home_link_1']) && $config['home_link_1'] != '') ? $config['home_link_1'] : ''), 'id="home_link_1" class="form-control"'); ?>
							<div id="error_home_link_1"></div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_text_link_1">Link Text:</label>
						<div class="col-sm-8">
							<?php $formdata = array('id'=>'home_text_link_1', 'name'=>'home_text_link_1', 'value'=>set_value('home_text_link_1', (isset($config['home_text_link_1']) && $config['home_text_link_1'] !== '' ) ? $config['home_text_link_1'] : ''), 'class'=>'form-control'); ?>
							<?php echo form_input($formdata);?>
							<div id="error_home_text_link_1"></div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-8">
							<a href="<?=site_url('content/home_panel/change_interface/1')?>" data-toggle="modal" data-target="#modal" class="btn btn-success btn-add form-action" id="btn_add"><span class="fa fa-asterisk"></span> Change Interface</a>
						</div>

					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
							<button class="btn btn-primary" type="submit" class="form-action">
								<i class="fa fa-save"></i> Save Changes
							</button>
						</div>
					</div>

					<?php echo form_hidden('panel_1', 1); ?>

					<?php echo form_close();?>

				</div>
			</div>


		</div>
		<div class="col-md-4">

			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Panel 2</h3>
				</div>

				<div class="box-body">

					<?php echo form_open(current_url(), array('class'=>'form-horizontal', 'role'=>'form'));?>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_text_2">Text:</label>
						<?php $formdata = array('id'=>'home_text_2', 'name'=>'home_text_2', 'value'=>set_value('home_text_2', isset($config['home_text_2']) ? $config['home_text_2'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_home_text_2')?></div>
							<?php echo form_error('home_text_2'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_caption_2">Caption:</label>
						<?php $formdata = array('id'=>'home_caption_2', 'name'=>'home_caption_2', 'value'=>set_value('home_caption_2', isset($config['home_caption_2']) ? $config['home_caption_2'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_home_caption_2')?></div>
							<?php echo form_error('home_caption_2'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-xs-3 control-label" for="home_link_2">Link:</label>
						<div class="col-xs-8">
							<?php $home_link = array(
									'about' => 'About', 'clients' => 'Events', 'blog' => 'News', 'contact' => 'Contact Us',
							);?>
							<?php echo form_dropdown('home_link_2', $home_link, set_value('home_link_2', (isset($config['home_link_2']) && $config['home_link_2'] != '') ? $config['home_link_2'] : ''), 'id="home_link_2" class="form-control"'); ?>
							<div id="error_home_link_2"></div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_text_link_2">Link Text:</label>
						<div class="col-sm-8">
							<?php $formdata = array('id'=>'home_text_link_2', 'name'=>'home_text_link_2', 'value'=>set_value('home_text_link_2', (isset($config['home_text_link_2']) && $config['home_text_link_2'] !== '' ) ? $config['home_text_link_2'] : ''), 'class'=>'form-control'); ?>
							<?php echo form_input($formdata);?>
							<div id="error_home_text_link_2"></div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-8">
							<a href="<?=site_url('content/home_panel/change_interface/2')?>" data-toggle="modal" data-target="#modal" class="btn btn-success btn-add form-action" id="btn_add"><span class="fa fa-asterisk"></span> Change Interface</a>
						</div>

					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
							<button class="btn btn-primary" type="submit" class="form-action">
								<i class="fa fa-save"></i> Save Changes
							</button>
						</div>
					</div>

					<?php echo form_hidden('panel_2', 1); ?>

					<?php echo form_close();?>

				</div>
			</div>
		</div>
		<div class="col-md-4">

			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Panel 3</h3>
				</div>

				<div class="box-body">

					<?php echo form_open(current_url(), array('class'=>'form-horizontal', 'role'=>'form'));?>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_text_3">Text:</label>
						<?php $formdata = array('id'=>'home_text_3', 'name'=>'home_text_3', 'value'=>set_value('home_text_3', isset($config['home_text_3']) ? $config['home_text_3'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_home_text_3')?></div>
							<?php echo form_error('home_text_3'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_caption_3">Caption:</label>
						<?php $formdata = array('id'=>'home_caption_3', 'name'=>'home_caption_3', 'value'=>set_value('home_caption_3', isset($config['home_caption_3']) ? $config['home_caption_3'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_home_caption_3')?></div>
							<?php echo form_error('home_caption_3'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-xs-3 control-label" for="home_link_3">Link:</label>
						<div class="col-xs-8">
							<?php $home_link = array(
									'about' => 'About', 'clients' => 'Events', 'blog' => 'News', 'contact' => 'Contact Us',
							);?>
							<?php echo form_dropdown('home_link_3', $home_link, set_value('home_link_3', (isset($config['home_link_3']) && $config['home_link_3'] != '') ? $config['home_link_3'] : ''), 'id="home_link_3" class="form-control"'); ?>
							<div id="error_home_link_3"></div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_text_link_3">Link Text:</label>
						<div class="col-sm-8">
							<?php $formdata = array('id'=>'home_text_link_3', 'name'=>'home_text_link_3', 'value'=>set_value('home_text_link_3', (isset($config['home_text_link_3']) && $config['home_text_link_3'] !== '' ) ? $config['home_text_link_3'] : ''), 'class'=>'form-control'); ?>
							<?php echo form_input($formdata);?>
							<div id="error_home_text_link_3"></div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-8">
							<a href="<?=site_url('content/home_panel/change_interface/3')?>" data-toggle="modal" data-target="#modal" class="btn btn-success btn-add form-action" id="btn_add"><span class="fa fa-asterisk"></span> Change Interface</a>
						</div>

					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
							<button class="btn btn-primary" type="submit" class="form-action">
								<i class="fa fa-save"></i> Save Changes
							</button>
						</div>
					</div>

					<?php echo form_hidden('panel_3', 1); ?>

					<?php echo form_close();?>

				</div>
			</div>


		</div>
	</div>
</section>
