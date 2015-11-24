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
						<label class="col-sm-3 control-label" for="home_text">Text:</label>
						<?php $formdata = array('id'=>'home_text', 'name'=>'home_text', 'value'=>set_value('home_text', isset($panel_1->home_panel_text) ? $panel_1->home_panel_text : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_home_text')?></div>
							<?php echo form_error('home_text'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_caption">Caption:</label>
						<?php $formdata = array('id'=>'home_caption', 'name'=>'home_caption', 'value'=>set_value('home_caption', isset($panel_1->home_panel_caption) ? $panel_1->home_panel_caption : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_home_caption')?></div>
							<?php echo form_error('home_caption'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-xs-3 control-label" for="home_link_to">Link:</label>
						<div class="col-xs-8">
							<?php $home_link = array(
								'0' => 'Home', '1' => 'About', '2' => 'Events', '3' => 'News', '4' => 'Contact Us',
							);?>
							<?php echo form_dropdown('home_link_to', $home_link, set_value('home_link_to', (isset($panel_1->home_panel_link_to) && $panel_1->home_panel_link_to != '') ? $panel_1->home_panel_link_to : ''), 'id="home_link_to" class="form-control"'); ?>
							<div id="error_home_link_to"></div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_link_text">Link Text:</label>
						<div class="col-sm-8">
							<?php $formdata = array('id'=>'home_link_text', 'name'=>'home_link_text', 'value'=>set_value('home_link_text', (isset($panel_1->home_panel_link_text) && $panel_1->home_panel_link_text !== '' ) ? $panel_1->home_panel_link_text : ''), 'class'=>'form-control'); ?>
							<?php echo form_input($formdata);?>
							<div id="error_home_link_text"></div>
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
						<label class="col-sm-3 control-label" for="home_text">Text:</label>
						<?php $formdata = array('id'=>'home_text', 'name'=>'home_text', 'value'=>set_value('home_text', isset($panel_2->home_panel_text) ? $panel_2->home_panel_text : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_home_text')?></div>
							<?php echo form_error('home_text'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_caption">Caption:</label>
						<?php $formdata = array('id'=>'home_caption', 'name'=>'home_caption', 'value'=>set_value('home_caption', isset($panel_2->home_panel_caption) ? $panel_2->home_panel_caption : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_home_caption')?></div>
							<?php echo form_error('home_caption'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-xs-3 control-label" for="home_link_to">Link:</label>
						<div class="col-xs-8">
							<?php $home_link = array(
								'0' => 'Home', '1' => 'About', '2' => 'Events', '3' => 'News', '4' => 'Contact Us',
							);?>
							<?php echo form_dropdown('home_link_to', $home_link, set_value('home_link_to', (isset($panel_2->home_panel_link_to) && $panel_2->home_panel_link_to != '') ? $panel_2->home_panel_link_to : ''), 'id="home_link_to" class="form-control"'); ?>
							<div id="error_home_link_to"></div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_link_text">Link Text:</label>
						<div class="col-sm-8">
							<?php $formdata = array('id'=>'home_link_text', 'name'=>'home_link_text', 'value'=>set_value('home_link_text', (isset($panel_2->home_panel_link_text) && $panel_2->home_panel_link_text !== '' ) ? $panel_2->home_panel_link_text : ''), 'class'=>'form-control'); ?>
							<?php echo form_input($formdata);?>
							<div id="error_home_link_text"></div>
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
						<label class="col-sm-3 control-label" for="home_text">Text:</label>
						<?php $formdata = array('id'=>'home_text', 'name'=>'home_text', 'value'=>set_value('home_text', isset($panel_3->home_panel_text) ? $panel_3->home_panel_text : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_home_text')?></div>
							<?php echo form_error('home_text'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_caption">Caption:</label>
						<?php $formdata = array('id'=>'home_caption', 'name'=>'home_caption', 'value'=>set_value('home_caption', isset($panel_3->home_panel_caption) ? $panel_3->home_panel_caption : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_home_caption')?></div>
							<?php echo form_error('home_caption'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-xs-3 control-label" for="home_link_to">Link:</label>
						<div class="col-xs-8">
							<?php $home_link = array(
								'0' => 'Home', '1' => 'About', '2' => 'Events', '3' => 'News', '4' => 'Contact Us',
							);?>
							<?php echo form_dropdown('home_link_to', $home_link, set_value('home_link_to', (isset($panel_3->home_panel_link_to) && $panel_3->home_panel_link_to != '') ? $panel_3->home_panel_link_to : ''), 'id="home_link_to" class="form-control"'); ?>
							<div id="error_home_link_to"></div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="home_link_text">Link Text:</label>
						<div class="col-sm-8">
							<?php $formdata = array('id'=>'home_link_text', 'name'=>'home_link_text', 'value'=>set_value('home_link_text', (isset($panel_3->home_panel_link_text) && $panel_3->home_panel_link_text !== '' ) ? $panel_3->home_panel_link_text : ''), 'class'=>'form-control'); ?>
							<?php echo form_input($formdata);?>
							<div id="error_home_link_text"></div>
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
