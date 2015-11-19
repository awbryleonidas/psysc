<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only"><?=lang('button_close')?></span>
	</button>
	<h4 class="modal-title" id="myModalLabel"><?=$page_heading?></h4>
</div>

<div class="modal-body">
	<div id="confirm-message" class="callout callout-danger callout-dismissable"></div>
	<span class="font-130"><?=$page_confirm?></span>
</div>

<div class="modal-footer">
	<span id="confirm-loading-image" class="pull-left"><img src="<?=asset_url('img/loading3.gif')?>" /></span>

	<button type="button" class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-times"></i> <?=lang('button_close')?>
	</button>

	<button id="confirm-submit" class="btn btn-warning" type="submit">
		<i class="fa fa-check"></i> <?=$page_button?>
	</button>
</div>

<script>
$(function(){
    $('#confirm-submit').click(function(e){
    	e.preventDefault();
    	
    	$('#confirm-loading-image').show();

    	var ajax_url = "<?php echo current_url(); ?>";
    	var ajax_load = '<span class="help-block text-center">Loading...</span>';

        $(ajax_load).load(ajax_url, {
			'confirm': 1,
            'rollback_count': $( "#rollback_count option:selected" ).val(),
		}, function(data) {
			var o = jQuery.parseJSON(data);
			if (o.success === false) {
				$('#confirm-message').show();
				$('#confirm-message').html(o.message);
				if (o.errors) {
					for (var form_name in o.errors) {
						$('#error_' + form_name).html(o.errors[form_name]);
					}
				}
				$('#confirm-loading-image').hide();
			}
			else
			{
				<?php if (isset($datatables_id)): ?>
					$('<?php echo $datatables_id; ?>').dataTable().fnDraw();
					alertify.success("<?php echo (isset($page_success)) ? $page_success : 'Function was successfully completed'; ?>");
				<?php else: ?>
					window.location.reload(true);
				<?php endif; ?>
				$('#modal').modal('hide');
			}

		});
    });

    $('#confirm-message').hide();
    $('#confirm-loading-image').hide();
});
</script>