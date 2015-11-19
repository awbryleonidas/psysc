<style>
.dropzone {
	margin: 0;
	padding: 0;
	border: 2px dashed rgba(0, 0, 0, 0.3);
	margin-bottom: 20px;
	width: 124px;
	min-height: 124px;
	/*margin-left: -10px;*/
	margin: 0 auto;
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
	<h4 class="modal-title" id="myModalLabel"><?=$page_heading?></h4>
</div>

<div class="modal-body">

	<div id="message" class="callout callout-danger callout-dismissable"></div>

	<div class="row">
		<?php echo form_open(current_url(), array('class'=>'dropzone', 'id' => 'dropzone'));?>
			<input type="file" name="file" class="hide" />
		<?php echo form_close();?>
	</div>

</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-times"></i> <?=lang('button_close')?>
	</button>
<!-- 
	<button id="submit" class="btn btn-primary" type="submit">
		<i class="fa fa-save"></i> <?=lang('button_change_picture')?>
	</button> -->
</div>
<script>
$(document).ready(function() {
	Dropzone.autoDiscover = false;
	$("#dropzone").dropzone({
		maxFiles: 1,
	}).on("complete", function(file) {
		console.log(file);
		if (file.xhr.responseText){
			var error = file.xhr.responseText;
			alert(error.replace(/(<([^>]+)>)/ig,""))
		}
	});

	$('#message').hide();
});
// $(function(){
//	 $('#submit').click(function(e){
//	 	e.preventDefault();

//	 	var ajax_url = "<?php echo current_url(); ?>";
//	 	var ajax_load = '<span class="help-block text-center">Loading...</span>';
//		 $(ajax_load).load(ajax_url, {
// 			'old_password': $('#old_password').val(),
// 			'new_password': $('#new_password').val(),
// 			'new_password_confirm': $('#new_password_confirm').val(),
// 		}, function(data){
// 			var o = jQuery.parseJSON(data);
// 			if (o.success === false) {
// 				$('#message').show();
// 				$('#message').html(o.message);
// 				if (o.errors) {
// 					for (var form_name in o.errors) {
// 						$('#error_' + form_name).html(o.errors[form_name]);
// 					}
// 				}
// 			}
// 			else
// 			{
// 				// window.location.reload(true);
// 				// $('#datatables').dataTable().fnDraw();
// 				$('#modal').modal('hide');
// 				alert('<?=lang('password_success')?>');
// 			}

// 			console.log(data);
// 		});
//	 });

//	 $('#message').hide();
// });
</script>