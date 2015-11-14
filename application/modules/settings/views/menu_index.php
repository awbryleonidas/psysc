<span class="btn-actions">
	<a class="btn btn-sm btn-primary btn-add" href="<?php echo site_url('settings/menu/add'); ?>"><span class="fa fa-plus"></span> <?=lang('button_add_menu')?></a>
</span>
<table class="table table-striped table-bordered table-hover dt-responsive" id="datatables">
	<thead>
		<tr>
			<th><?=lang('index_th_id')?></th>
			<th><?=lang('index_th_text')?></th>
			<th><?=lang('index_th_link')?></th>
			<th><?=lang('index_th_permission')?></th>
			<th><?=lang('index_th_icon')?></th>
			<!-- <th><?=lang('index_th_parent_id')?></th> -->
			<th><?=lang('index_th_order')?></th>
			<th><?=lang('index_th_active')?></th>
			<th class="mobile tablet desktop"><?=lang('index_th_action')?></th>
		</tr>	
	</thead>
	<tbody>
		<tr>
			<td colspan="8" class="dataTables_empty">
				<img src="<?=asset_url('img/20.gif')?>" alt="<?=lang('loading')?>" />
				<p><?=lang('loading')?></p>
			</td>
		</tr>
	</tbody>
</table>