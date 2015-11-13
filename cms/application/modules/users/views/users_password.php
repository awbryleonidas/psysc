<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only"><?php echo lang('button_close')?></span>
	</button>
	<h4 class="modal-title" id="myModalLabel"><?php echo $page_heading?></h4>
</div>

<div class="modal-body">
	<?php echo form_open(current_url(), array('class'=>'form-horizontal'));?>

		<div class="form-group">
			<label class="col-sm-4 control-label" for="old"><?php echo lang('old')?>:</label>
			<div class="col-sm-7">
				<?php echo form_password(array('id'=>'old', 'name'=>'old', 'value'=>set_value('old'), 'class'=>'form-control'));?>
				<div id="error-old"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-4 control-label" for="new"><?php echo lang('new')?>:</label>
			<div class="col-sm-7">
				<?php echo form_password(array('id'=>'new', 'name'=>'new', 'value'=>set_value('new'), 'class'=>'form-control'));?>
				<div id="error-new"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-4 control-label" for="new_confirm"><?php echo lang('new_confirm')?>:</label>
			<div class="col-sm-7">
				<?php echo form_password(array('id'=>'new_confirm', 'name'=>'new_confirm', 'value'=>set_value('new_confirm'), 'class'=>'form-control'));?>
				<div id="error-new_confirm"></div>
			</div>
		</div>

	<?php echo form_close();?>
</div>

<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-times"></i> <?php echo lang('button_close')?>
	</button>

	<button id="submit" class="btn btn-success" type="submit">
		<i class="fa fa-save"></i> <?php echo lang('button_password')?>
	</button>
</div>