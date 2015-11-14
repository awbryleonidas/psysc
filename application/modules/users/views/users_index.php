<span class="btn-actions">
	<a class="btn btn-sm btn-primary btn-add" href="<?php echo site_url('users/add'); ?>"><span class="fa fa-plus"></span> <?=lang('button_add_user')?></a>
</span>
	
<table class="table table-striped table-bordered table-hover dt-responsive" id="datatables">
	
	<thead>
		<tr>
			<th><?=lang('index_th_id')?></th>
			<th class="mobile tablet desktop"><?=lang('index_th_firstname')?></th>
			<th><?=lang('index_th_lastname')?></th>
			<th><?=lang('index_th_groups')?></th>
			<th><?=lang('index_th_status')?></th>
			<th class="mobile tablet desktop"><?=lang('index_th_action')?></th>
		</tr>
	</thead>
	
	<tbody>
		<tr>
			<td colspan="6" class="dataTables_empty">
				<img src="<?=asset_url('img/20.gif')?>" alt="<?=lang('loading')?>" />
				<p><?=lang('loading')?></p>
			</td>
		</tr>
	</tbody>
	
</table>