<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only"><?php echo lang('button_close')?></span>
	</button>
	<h4 class="modal-title" id="myModalLabel"><?php echo lang('text_auditlog_details')?></h4>
</div>
<div class="modal-body">

	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?php echo lang('header_auditlog_info')?></h3>
		</div>

		<div class="box-body">

			<table class="table table-condensed">
				<tr><td class="col-md-3"><?php echo lang('label_id')?></td><td><?php echo $auditlog->auditlog_id?></td></tr>
				<tr><td class="col-md-3"><?php echo lang('label_action')?></td><td><?php echo ucfirst($auditlog->auditlog_action)?></td></tr>
				<tr><td class="col-md-3"><?php echo lang('label_user')?></td><td><?php echo $auditlog->first_name?> <?php echo $auditlog->last_name?></td></tr>
				<tr><td class="col-md-3"><?php echo lang('label_user_ip')?></td><td><?php echo $auditlog->auditlog_user_ip?></td></tr>
				<tr><td class="col-md-3"><?php echo lang('label_user_agent')?></td><td><?php echo $auditlog->auditlog_user_agent?></td></tr>
				<tr><td class="col-md-3"><?php echo lang('label_date')?></td><td><?php echo $auditlog->auditlog_created_on?></td></tr>
				<tr><td class="col-md-3"><?php echo lang('label_data')?></td><td><pre><?php print_r(json_decode($auditlog->auditlog_data))?></pre></td></tr></tr>
			</table>

		</div>
	</div>

</div> 
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> <?php echo lang('button_close')?></button>
</div> 