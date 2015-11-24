<div class="box box-primary">
	<div class="box-body">
		<?php if ($this->acl->restrict('Content.Team_panel.Add', 'return')): ?>
			<span class="btn-actions">
				<a href="<?=site_url('content/team_panel/add')?>" data-toggle="modal" data-target="#modal" class="btn btn-sm btn-success btn-add" id="btn_add"><span class="fa fa-plus"></span> <?=lang('button_add')?></a>
			</span>
		<?php endif; ?>
		<table class="table table-striped table-bordered table-hover dt-responsive" id="datatables">
			<thead>
			<tr>
				<th><?=lang('index_id')?></th>
				<th class="mobile tablet desktop"><?=lang('index_image')?></th>
				<th class="mobile tablet desktop"><?=lang('index_position')?></th>
				<th class="mobile tablet desktop"><?=lang('index_name')?></th>
				<th class="mobile tablet desktop"><?=lang('index_action')?></th>
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
	</div>
</div>