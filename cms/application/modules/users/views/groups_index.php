<span class="btn-actions">
	<a href="<?=site_url('users/groups/add')?>" data-toggle="modal" data-target="#modal" class="btn btn-sm btn-primary btn-add" id="btn_add"><span class="fa fa-plus"></span> <?=lang('button_add_group')?></a>
</span>
	
<table class="table table-striped table-bordered table-hover dt-responsive" id="datatables">
	<thead>
		<tr>
			<th><?=lang('index_th_id')?></th>
			<th><?=lang('index_th_group')?></th>
			<th class="not-mobile"><?=lang('index_th_description')?></th>
			<th class="not-mobile"><?=lang('index_th_status')?></th>
			<th class="mobile tablet desktop"><?=lang('index_th_action')?></th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td colspan="5" class="dataTables_empty">
				<img src="<?=asset_url('images/20.gif')?>" alt="<?=lang('loading')?>" />
				<p><?=lang('loading')?></p>
			</td>
		</tr>
	</tbody>
	
</table>