<div class="box box-primary">
	<div class="box-body">
		<?php if ($this->acl->restrict('Content.News_panel.Add', 'return')): ?>
			<span class="btn-actions">
				<a href="<?=site_url('content/news_panel/add')?>" data-toggle="modal" data-target="#modal" class="btn btn-sm btn-success btn-add" id="btn_add"><span class="fa fa-plus"></span> <?=lang('button_add')?></a>
			</span>
		<?php endif; ?>
		<table class="table table-striped table-bordered table-hover dt-responsive" id="datatables">
			<thead>
			<tr>
				<th><?=lang('index_id')?></th>
				<th class="mobile tablet desktop"><?=lang('index_created_on')?></th>
				<th class="mobile tablet desktop"><?=lang('index_header')?></th>
				<th class="mobile tablet desktop"><?=lang('index_author')?></th>
				<th class="mobile tablet desktop"><?=lang('index_action')?></th>
			</tr>
			</thead>

			<tbody>
			<tr>
				<td colspan="4" class="dataTables_empty">
					<img src="<?=asset_url('images/20.gif')?>" alt="<?=lang('loading')?>" />
					<p><?=lang('loading')?></p>
				</td>
			</tr>
			</tbody>

		</table>
	</div>
</div>