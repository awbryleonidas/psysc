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
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only"><?=lang('button_close')?></span>
	</button>
	<h4 class="modal-title" id="myModalLabel"><?=$page_heading?> <?php echo (isset($record)) ? " no. $record->news_panel_id" : '';?></h4>
</div>

<div class="modal-body">

	<div id="message" class="callout callout-danger callout-dismissable"></div>

	<div class="form-horizontal <?php //echo (isset($record)&&($record->news_panel_is_external)) ? 'hide' : ''; ?>">
		<p>Image must be cropped to square before uploading. This uploader will automatically resize the image to mobile and tablet sizes.</p>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="news_panel_caption"><?=lang('label_image')?>:</label>
			<div class="col-sm-4">
				<?php echo form_open(site_url('content/news_panel/upload'), array('class'=>'dropzone', 'id' => 'dropzone'));?>
					<input type="file" name="file" class="hide" />
				<?php echo form_close();?>
			</div>
			<div class="col-sm-6">
				<?php if (isset($record->news_panel_image)): ?>
					<img src="<?php echo site_url($record->news_panel_image); ?>" width="120" />
				<?php endif; ?>
			</div>
			<div class="col-sm-offset-2 col-sm-10">
				<div id="error_news_panel_image"></div>
			</div>
		</div>

	</div>


	<div class="clearfix"></div>

	<?php echo form_open(current_url(), array('class'=>'form-horizontal'));?>


		<div class="form-group">
			<label class="col-sm-2 control-label" for="news_panel_header"><?=lang('label_header')?>:</label>
			<?php $formdata = array('id'=>'news_panel_header', 'name'=>'label_header', 'value'=>set_value('news_panel_header', isset($record->news_panel_header) ? $record->news_panel_header : ''), 'class'=>'form-control', 'placeholder' => ''); ?>
			<div class="col-sm-9">
				<?php echo form_input($formdata); ?>
				<div id="error_news_panel_header"></div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="news_panel_author"><?=lang('label_author')?>:</label>
			<?php $formdata = array('id'=>'news_panel_author', 'name'=>'label_author', 'value'=>set_value('news_panel_author', isset($record->news_panel_author) ? $record->news_panel_author : ''), 'class'=>'form-control', 'placeholder' => ''); ?>
			<div class="col-sm-9">
				<?php echo form_input($formdata); ?>
				<div id="error_news_panel_author"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="news_panel_caption"><?=lang('label_caption')?>:</label>
			<div class="col-sm-9">
				<?php $formdata = array('id'=>'news_panel_caption', 'name'=>'news_panel_caption', 'rows'=>'3', 'value'=>set_value('news_panel_caption', isset($record->news_panel_caption) ? $record->news_panel_caption : ''), 'class'=>'form-control'); ?>
				<?php echo form_textarea($formdata); ?>
				<div id="error_news_panel_caption"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="news_panel_tags"><?=lang('label_tags')?>:</label>
			<div class="col-sm-9">
				<?php $formdata = array('id'=>'news_panel_tags', 'name'=>'news_panel_tags', 'rows'=>'3', 'value'=>set_value('news_panel_tags', isset($record->news_panel_tags) ? $record->news_panel_tags : ''), 'class'=>'form-control'); ?>
				<?php echo form_textarea($formdata); ?>
				<div id="error_news_panel_tags"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="news_panel_link"><?=lang('label_link')?>:</label>
			<?php $formdata = array('id'=>'news_panel_link', 'name'=>'label_link', 'value'=>set_value('news_panel_link', isset($record->news_panel_link) ? $record->news_panel_link : ''), 'class'=>'form-control', 'placeholder' => ''); ?>
			<div class="col-sm-9">
				<?php echo form_input($formdata); ?>
				<div id="error_news_panel_link"></div>
			</div>
		</div>

		<div class="form-group hide">
			<label class="col-sm-2 control-label" for="news_panel_active">Hide These:</label>
			<div class="col-sm-9">
				<?php echo form_input(array('id'=>'news_panel_image', 'name'=>'news_panel_image', 'value'=>set_value('news_panel_image', isset($record->news_panel_image) ? $record->news_panel_image : ''), 'class'=>'form-control'));?>
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
        $('#news_panel_image').val(o.large);
    });

	$('#submit').click(function(e){
		e.preventDefault();

		var ajax_url = "<?php echo current_url(); ?>";
		var ajax_load = '<span class="help-block text-center">Loading...</span>';
		$(ajax_load).load(ajax_url, {
			'news_panel_header': $('#news_panel_header').val(),
			'news_panel_caption': $('#news_panel_caption').val(),
			'news_panel_author': $('#news_panel_author').val(),
			'news_panel_tags': $('#news_panel_tags').val(),
			'news_panel_link': $('#news_panel_link').val(),
			'news_panel_image': $('#news_panel_image').val(),
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