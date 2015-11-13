<div class="box">
	<div class="box-body">
		<span class="btn-actions">
			<?php if ($this->acl->restrict('{{parent_module}}.{{lc_plural_module_name}}.add', 'return')): ?>
				<a href="<?php echo site_url('{{parent_module}}/{{lc_plural_module_name}}/form/add')?>" data-toggle="modal" data-target="#modal" class="btn btn-sm btn-success btn-add" id="btn_add"><span class="fa fa-plus"></span> <?php echo lang('button_add')?></a>
			<?php endif; ?>
		</span>
			
		<table class="table table-striped table-bordered table-hover dt-responsive" id="datatables">
			<thead>
				<tr>
					<th class="min-tablet"><?php echo lang('index_id')?></th>
{{view_table_heads}}
					<th class="none"><?php echo lang('index_created_on')?></th>
					<th class="none"><?php echo lang('index_created_by')?></th>
					<th class="none"><?php echo lang('index_modified_on')?></th>
					<th class="none"><?php echo lang('index_modified_by')?></th>
					<th class="all"><?php echo lang('index_action')?></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td colspan="{{view_column_count}}" class="dataTables_empty">
						<img src="<?php echo assets_url('images/20.gif')?>" alt="<?php echo lang('loading')?>" /> <p><?php echo lang('loading')?></p>
					</td>
				</tr>
			</tbody>
			
		</table>
	</div>
</div>