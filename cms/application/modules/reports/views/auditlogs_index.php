<div class="box">
	<div class="box-body">

		<table class="table table-striped table-bordered table-hover dt-responsive" id="datatables">
			<thead>
				<tr>
					<th class="none"><?php echo lang('index_id')?></th>
					<th class="all"><?php echo lang('index_action')?></th>
					<th class="min-tablet"><?php echo lang('index_user')?></th>
					<th class="min-desktop"><?php echo lang('index_ip')?></th>
					<th class="all"><?php echo lang('index_date')?></th>
					<th class="all"><?php echo lang('index_action')?></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td colspan="6" class="dataTables_empty">
						<img src="<?php echo assets_url('images/20.gif')?>" alt="<?php echo lang('loading')?>" /> <p><?php echo lang('loading')?></p>
					</td>
				</tr>
			</tbody>
			
		</table>
	</div>
</div>

<div class="modal" id="auditlogs_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only"><?php echo lang('button_close')?></span>
				</button>
				<h4 class="modal-title" id="myModalLabel"><?php echo lang('text_auditlog_details')?></h4>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('button_close')?></button>
			</div>
		</div>
	</div>
</div>