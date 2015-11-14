<table class="table table-striped table-bordered table-hover responsive" id="datatables">
	<thead>
		<tr>
			<th><?=lang('index_th_id')?></th>
			<th><?=lang('index_th_date')?></th>
			<th><?=lang('index_th_user')?></th>
			<th><?=lang('index_th_table')?></th>
			<th><?=lang('index_th_table_id')?></th>
			<th><?=lang('index_th_action')?></th>
			<th><?=lang('index_th_message')?></th>
			<th><?=lang('index_th_ip')?></th>
			<th class="mobile tablet desktop"><?=lang('index_th_details')?></th>
		</tr>	
	</thead>
	<tbody>
		<tr>
			<td colspan="9" class="dataTables_empty">
				<img src="<?=asset_url('img/20.gif')?>" alt="<?=lang('loading')?>" />
				<p><?=lang('loading')?></p>
			</td>
		</tr>
	</tbody>
</table>

<div class="modal" id="audittrail_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        	<span aria-hidden="true">&times;</span>
        	<span class="sr-only"><?=lang('button_close')?></span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><?=lang('text_audittrail_details')?></h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=lang('button_close')?></button>
      </div>
    </div>
  </div>
</div>