<span class="btn-actions">
	<a href="<?php echo site_url('users/permissions/add'); ?>" data-toggle="modal" data-target="#modal" class="btn btn-sm btn-primary btn-add"><span class="fa fa-plus"></span> <?=lang('button_add_permission')?></a>
</span>

<table class="table table-striped table-bordered table-hover responsive" id="datatables">
	<thead>
		<tr>
			<th><?=lang('index_th_id')?></th>
			<th class="mobile tablet desktop"><?=lang('index_th_permission')?></th>
			<th class="not-mobile"><?=lang('index_th_active')?></th>
			<th class="mobile tablet desktop"><?=lang('index_th_action')?></th>
		</tr>
	</thead>
	
	<tbody>
		<tr>
			<td colspan="5" class="dataTables_empty">
				<img src="<?=asset_url('img/20.gif')?>" alt="<?=lang('loading')?>" />
				<p><?=lang('loading')?></p>
			</td>
		</tr>
	</tbody>
</table>
