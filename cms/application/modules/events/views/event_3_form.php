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
				<label class="col-sm-3 control-label" for="event_highlight_image_3">Image 1:</label>
				<div class="col-sm-4">
					<?php echo form_open(site_url('events/event_3/upload'), array('class'=>'dropzone', 'id' => 'dropzone3'));?>
					<input type="file" name="file" class="hide" />
					<?php echo form_close();?>
					<div id="error_event_highlight_image_3"></div>
				</div>
				<div class="col-sm-5">
					<?php if (isset($record['event_highlight_image_3'])): ?>
						<img src="<?php echo site_url($record['event_highlight_image_3']); ?>" width="120" />
					<?php endif; ?>
				</div>
			</div>

			<div class="form-group hide">
				<label class="col-sm-2 control-label" for="event_highlight_image_3">Hide This:</label>
				<div class="col-sm-9">
					<?php echo form_input(array('id'=>'event_highlight_image_3', 'name'=>'event_highlight_image_3', 'value'=>set_value('event_highlight_image_3', isset($record['event_highlight_image_3']) ? $record['event_highlight_image_3'] : ''), 'class'=>'form-control'));?>
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
		$('#event_highlight_image_3').val(o.image);
	});

	$('#submit').click(function(e){
		e.preventDefault();

		var ajax_url = "<?php echo current_url(); ?>";
		var ajax_load = '<span class="help-block text-center">Loading...</span>';
		$(ajax_load).load(ajax_url, {
			'event_highlight_image_3': $('#event_highlight_image_3').val(),
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