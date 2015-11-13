<div class="box">
	<div class="box-body">		
		<span class="btn-actions">
			<a class="btn btn-sm btn-primary btn-add" href="<?php echo site_url('settings/menus/form/add'); ?>" data-toggle="modal" data-target="#modal"><span class="fa fa-plus"></span> <?php echo lang('button_add')?></a>
		</span>
		<table class="table table-striped table-bordered table-hover dt-responsive" id="datatables">
			<thead>
				<tr>
					<th class="none"><?php echo lang('index_th_id')?></th>
					<th class="all"><?php echo lang('index_th_text')?></th>
					<th class="min-desktop"><?php echo lang('index_th_link')?></th>
					<th class="min-desktop"><?php echo lang('index_th_permission')?></th>
					<th class="min-desktop"><?php echo lang('index_th_icon')?></th>
					<th class="min-desktop"><?php echo lang('index_th_order')?></th>
					<th class="min-tablet"><?php echo lang('index_th_active')?></th>
					<th class="all"><?php echo lang('index_th_action')?></th>
				</tr>	
			</thead>
			<tbody>
				<tr>
					<td colspan="8" class="dataTables_empty">
						<img src="<?php echo assets_url('images/20.gif')?>" alt="<?php echo lang('loading')?>" />
						<p><?php echo lang('loading')?></p>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>