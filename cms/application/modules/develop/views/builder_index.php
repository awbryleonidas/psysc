<div class="box">
	<div class="box-body">
		<div class="bottom-margin2">
			<a href="<?php echo site_url('develop/builder/add/module'); ?>" class="btn btn-sm btn-primary"><span class="fa fa-plus"></span> New Module</a>
		</div>
		<table class="table table-striped table-bordered table-hover dt-responsive" id="datatables">
			<thead>
				<tr>
					<th class="col-sm-1 text-center"><?php echo lang('index_module')?></th>
					<th><?php echo lang('index_controllers')?></th>
				</tr>	
			</thead>
			<tbody>
				<?php foreach ($modules as $module => $files): ?>
					<tr>
						<td class="text-center"><?php echo $module; ?></td>
						<td>
							<?php foreach ($files as $file => $details): ?>
								<span class="label label-default"><?php echo $file; ?></span>
							<?php endforeach; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>