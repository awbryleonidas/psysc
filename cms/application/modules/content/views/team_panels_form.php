<style>
.dropzone {
	margin: 0;
	padding: 0;
	border: 2px dashed rgba(0, 0, 0, 0.3);
	margin-bottom: 20px;
	width: 124px;
	min-height: 124px;
	/*margin-left: -10px;*/
	/*margin: 0 auto;*/
}

.dz-message span { display: none; }
.dz-message:after { content: 'Drag the file here or click to upload'; }
.dz-preview, .dz-complete { margin: 0 !important; padding: 0 !important; }
.dz-image { border-radius: 0 !important; }
</style>
<div class="modal-position">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only"><?=lang('button_close')?></span>
	</button>
	<h4 class="modal-title" id="myModalLabel"><?=$page_heading?> <?php echo (isset($record)) ? " no. $record->team_panel_id" : '';?></h4>
</div>

<div class="modal-body">

	<div id="message" class="callout callout-danger callout-dismissable"></div>

	<div class="form-horizontal <?php //echo (isset($record)&&($record->team_panel_is_external)) ? 'hide' : ''; ?>">
		<p>Image must be cropped to square before uploading. This uploader will automatically resize the image to mobile and tablet sizes.</p>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="team_panel_description"><?=lang('label_image')?>:</label>
			<div class="col-sm-4">
				<?php echo form_open(site_url('content/team_panel/upload'), array('class'=>'dropzone', 'id' => 'dropzone'));?>
					<input type="file" name="file" class="hide" />
				<?php echo form_close();?>
			</div>
			<div class="col-sm-6">
				<?php if (isset($record->team_panel_image)): ?>
					<img src="<?php echo site_url($record->team_panel_image); ?>" width="120" />
				<?php endif; ?>
			</div>
			<div class="col-sm-offset-2 col-sm-10">
				<div id="error_team_panel_image"></div>
			</div>
		</div>

	</div>


	<div class="clearfix"></div>

	<?php echo form_open(current_url(), array('class'=>'form-horizontal'));?>


		<div class="form-group">
			<label class="col-sm-2 control-label" for="team_panel_position"><?=lang('label_position')?>:</label>
			<?php $formdata = array('id'=>'team_panel_position', 'name'=>'label_position', 'value'=>set_value('team_panel_position', isset($record->team_panel_position) ? $record->team_panel_position : ''), 'class'=>'form-control', 'placeholder' => ''); ?>
			<div class="col-sm-9">
				<?php echo form_input($formdata); ?>
				<div id="error_team_panel_position"></div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="team_panel_name"><?=lang('label_name')?>:</label>
			<?php $formdata = array('id'=>'team_panel_name', 'name'=>'label_name', 'value'=>set_value('team_panel_name', isset($record->team_panel_name) ? $record->team_panel_name : ''), 'class'=>'form-control', 'placeholder' => ''); ?>
			<div class="col-sm-9">
				<?php echo form_input($formdata); ?>
				<div id="error_team_panel_name"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="team_panel_description"><?=lang('label_description')?>:</label>
			<div class="col-sm-9">
				<?php $formdata = array('id'=>'team_panel_description', 'name'=>'team_panel_description', 'rows'=>'3', 'value'=>set_value('team_panel_description', isset($record->team_panel_description) ? $record->team_panel_description : ''), 'class'=>'form-control'); ?>
				<?php echo form_textarea($formdata); ?>
				<div id="error_team_panel_description"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-2 control-label" for="team_panel_type"><?=lang('label_type')?>:</label>
			<div class="col-xs-9">
				<?php $alert_type = array(
						'1' => 'NEC', '2' => 'BOT'
				);?>
				<?php echo form_dropdown('team_panel_type', $alert_type, set_value('team_panel_type', (isset($record->team_panel_type) && $record->team_panel_type != '') ? $record->team_panel_type : ''), 'id="team_panel_type" class="form-control" onchange="valueChanged()"'); ?>
				<div id="error_team_panel_type"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="team_panel_facebook"><?=lang('label_facebook')?>:</label>
			<?php $formdata = array('id'=>'team_panel_facebook', 'name'=>'label_facebook', 'value'=>set_value('team_panel_facebook', isset($record->team_panel_facebook) ? $record->team_panel_facebook : ''), 'class'=>'form-control', 'placeholder' => ''); ?>
			<div class="col-sm-9">
				<?php echo form_input($formdata); ?>
				<div id="error_team_panel_facebook"></div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="team_panel_twitter"><?=lang('label_twitter')?>:</label>
			<?php $formdata = array('id'=>'team_panel_twitter', 'name'=>'label_twitter', 'value'=>set_value('team_panel_twitter', isset($record->team_panel_twitter) ? $record->team_panel_twitter : ''), 'class'=>'form-control', 'placeholder' => ''); ?>
			<div class="col-sm-9">
				<?php echo form_input($formdata); ?>
				<div id="error_team_panel_twitter"></div>
			</div>
		</div>

		<div class="form-group hide">
			<label class="col-sm-2 control-label" for="team_panel_active">Hide These:</label>
			<div class="col-sm-9">
				<?php echo form_input(array('id'=>'team_panel_image', 'name'=>'team_panel_image', 'value'=>set_value('team_panel_image', isset($record->team_panel_image) ? $record->team_panel_image : ''), 'class'=>'form-control'));?>
			</div>
		</div>
	<?php echo form_close();?>

</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-times"></i> <?=lang('button_close')?>
	</button>
	<?php if ($page_type == 'add'): ?>
		<button id="submit" class="btn btn-success" type="submit">
			<i class="fa fa-save"></i> <?=lang('button_add')?>
		</button>
	<?php else: ?>
		<button id="submit" class="btn btn-success" type="submit">
			<i class="fa fa-save"></i> <?=lang('button_update')?>
		</button>
	<?php endif; ?>
</div>

<script>
Dropzone.autoDiscover = false;
$(function(){
	//set_form();

	var myDropzone = new Dropzone("#dropzone");
    myDropzone.on("success", function(file, response) {
    	o = jQuery.parseJSON(response);
        $('#team_panel_image').val(o.large);
    });

	$('#submit').click(function(e){
		e.preventDefault();

		var ajax_url = "<?php echo current_url(); ?>";
		var ajax_load = '<span class="help-block text-center">Loading...</span>';
		$(ajax_load).load(ajax_url, {
			'team_panel_position': $('#team_panel_position').val(),
			'team_panel_description': $('#team_panel_description').val(),
			'team_panel_name': $('#team_panel_name').val(),
			'team_panel_type': $('#team_panel_type').val(),
			'team_panel_facebook': $('#team_panel_facebook').val(),
			'team_panel_twitter': $('#team_panel_twitter').val(),
			'team_panel_image': $('#team_panel_image').val(),
		}, function(data){
			var o = jQuery.parseJSON(data);
			if (o.success === false) {
				$('#message').show();
				$('#message').html(o.message);
				if (o.errors) {
					for (var form_name in o.errors) {
						$('#error_' + form_name).html(o.errors[form_name]);
					}
				}
			}
			else
			{
				$('#datatables').dataTable().fnDraw();
				$('#modal').modal('hide');
				alertify.success("<?php echo ($page_type == 'add') ? lang('add_success') : lang('edit_success'); ?>");
			}

			console.log(data);
		});
	});

	$('#message').hide();

	$('form input').keydown(function(event){
		if(event.keyCode == 13) {
			event.preventDefault();
			return false;
		}
	});
});

</script>