<div class="box box-primary">
	<div class="box-body">
		<span class="btn-actions">
			<a href="<?=site_url('content/feeds/add')?>" data-toggle="modal" data-target="#modal" class="btn btn-sm btn-success btn-add" id="btn_add"><span class="fa fa-plus"></span> <?=lang('button_add')?></a>
		</span>
			
		<table class="table table-striped table-bordered table-hover dt-responsive" id="datatables">
			<thead>
				<tr>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
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
		<div id="thumbnails" class="row"></div>
	</div>
</div>