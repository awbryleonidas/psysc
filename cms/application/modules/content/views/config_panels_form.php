<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only"><?=lang('button_close')?></span>
	</button>
	<h4 class="modal-title" id="myModalLabel"><?=$page_heading?></h4>
</div>

<div class="modal-body">

	<div id="message" class="callout callout-danger callout-dismissable"></div>

	<div class="form-horizontal">

		<div class="row">
			<?php //var_dump($record)?>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="config_us_panel_image_1">Image 1:</label>
				<div class="col-sm-4">
					<?php echo form_open(site_url('content/config_panel/upload'), array('class'=>'dropzone', 'id' => 'dropzone3'));?>
					<input type="file" name="file" class="hide" />
					<?php echo form_close();?>
					<div id="error_config_us_panel_image_1"></div>
				</div>
				<div class="col-sm-5">
					<?php if (isset($record['config_us_panel_image_1'])): ?>
						<img src="<?php echo site_url($record['config_us_panel_image_1']); ?>" width="120" />
					<?php endif; ?>
				</div>

			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label" for="config_us_panel_image_2">Image 2:</label>
				<div class="col-sm-4">
					<?php echo form_open(site_url('content/config_panel/upload'), array('class'=>'dropzone', 'id' => 'dropzone4'));?>
					<input type="file" name="file" class="hide" />
					<?php echo form_close();?>
					<div id="error_config_us_panel_image_2"></div>
				</div>
				<div class="col-sm-5">
					<?php if (isset($record['config_us_panel_image_1'])): ?>
						<img src="<?php echo site_url($record['config_us_panel_image_2']); ?>" width="120" />
					<?php endif; ?>
				</div>

			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label" for="hunt_beacon_coupon_image">Image 3:</label>
				<div class="col-sm-4">
					<?php echo form_open(site_url('content/config_panel/upload'), array('class'=>'dropzone', 'id' => 'dropzone5'));?>
					<input type="file" name="file" class="hide" />
					<?php echo form_close();?>
					<div id="error_config_us_panel_image_3"></div>
				</div>
				<div class="col-sm-5">
					<?php if (isset($record['config_us_panel_image_3'])): ?>
						<img src="<?php echo site_url($record['config_us_panel_image_3']); ?>" width="120" />
					<?php endif; ?>
				</div>
			</div>

			<div class="form-group hide">
				<label class="col-sm-2 control-label" for="config_us_panel_image_1">Hide This:</label>
				<div class="col-sm-9">
					<?php echo form_input(array('id'=>'config_us_panel_image_1', 'name'=>'config_us_panel_image_1', 'value'=>set_value('config_us_panel_image_1', isset($record['config_us_panel_image_1']) ? $record['config_us_panel_image_1'] : ''), 'class'=>'form-control'));?>
				</div>
			</div>
			<div class="form-group hide">
				<label class="col-sm-2 control-label" for="config_us_panel_image_2">Hide This:</label>
				<div class="col-sm-9">
					<?php echo form_input(array('id'=>'config_us_panel_image_2', 'name'=>'config_us_panel_image_2', 'value'=>set_value('config_us_panel_image_2', isset($record['config_us_panel_image_2']) ? $record['config_us_panel_image_2'] : ''), 'class'=>'form-control'));?>
				</div>
			</div>
			<div class="form-group hide">
				<label class="col-sm-2 control-label" for="config_us_panel_image_3">Hide This:</label>
				<div class="col-sm-9">
					<?php echo form_input(array('id'=>'config_us_panel_image_3', 'name'=>'config_us_panel_image_3', 'value'=>set_value('config_us_panel_image_3', isset($record['config_us_panel_image_3']) ? $record['config_us_panel_image_3'] : ''), 'class'=>'form-control'));?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
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
	
   var myDropzone3 = new Dropzone("#dropzone3");
	myDropzone3.on("success", function(file, response) {
		o = jQuery.parseJSON(response);
		$('#config_us_panel_image_1').val(o.image);
	});

   var myDropzone4 = new Dropzone("#dropzone4");
	myDropzone4.on("success", function(file, response) {
		o = jQuery.parseJSON(response);
		$('#config_us_panel_image_2').val(o.image);
	});

   var myDropzone5 = new Dropzone("#dropzone5");
	myDropzone5.on("success", function(file, response) {
		o = jQuery.parseJSON(response);
		$('#config_us_panel_image_3').val(o.image);
	});

	$('#submit').click(function(e){
		e.preventDefault();

		var ajax_url = "<?php echo current_url(); ?>";
		var ajax_load = '<span class="help-block text-center">Loading...</span>';
		$(ajax_load).load(ajax_url, {
			'config_us_panel_image_1': $('#config_us_panel_image_1').val(),
			'config_us_panel_image_2': $('#config_us_panel_image_2').val(),
			'config_us_panel_image_3': $('#config_us_panel_image_3').val(),
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
			  //  $('#datatables').dataTable().fnDraw();
				$('#modal_large').modal('hide');
				window.location.reload(true);
				// alertify.success("<?php echo ($page_type == 'add') ? lang('add_success') : lang('edit_success'); ?>");
			}

			console.log(data);
		});
	});

	$('#message').hide();
});
</script>