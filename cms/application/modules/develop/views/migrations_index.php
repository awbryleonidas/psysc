<div class="box">
	<div class="box-body">
		<div class="bottom-margin2 hide">
			<a href="javascript:;" class="btn btn-sm btn-primary"><span class="fa fa-level-up"></span> Migrate All Modules</a>
		</div>
		<table class="table table-striped table-bordered table-hover dt-responsive" id="datatables">
			<thead>
				<tr>
					<th class="col-sm-1 text-center"><?php echo lang('index_module')?></th>
					<th class="col-sm-1 text-center"><?php echo lang('index_version')?></th>
					<th><?php echo lang('index_migration')?></th>
				</tr>	
			</thead>
			<tbody>
				<?php foreach ($migrations as $module => $files): ?>
					<?php if ($module == 'CI_core') continue; ?>
					<?php //$module = substr($module, 0, -1); ?>
					<?php $files = array_reverse($files); ?>
					<?php $latest = (isset($versions[$module])) ? $versions[$module] : 0; ?> 
					<tr>
						<td class="text-center"><?php echo $module; ?></td>
						<td class="text-center"><?php echo $latest; ?></td>
						<td class="text-center">

							<div class="input-group">
								<select class="form-control migration-files">
									<?php foreach ($files as $file): ?>
										<?php $parts = explode("/", $file); ?>
										<?php $file = array_pop($parts); ?>
										<?php list($ver, $name) = explode('_', ltrim($file, '0')); ?>
										<?php if (! in_array($file, $core_migrations)): ?>
											<option value="<?php echo $ver; ?>"><?php echo $file; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
								<div class="input-group-btn">
									<a href="<?php echo site_url('develop/migrations/rollback/' . $module . '/' . $latest); ?>" data-toggle="modal" data-target="#modal" class="btn btn-danger btn-rollback"><span class="fa fa-level-down"></span> <?php echo lang('button_rollback'); ?></a>
									<a href="<?php echo site_url('develop/migrations/migrate/' . $module); ?>" data-toggle="modal" data-target="#modal" class="btn btn-primary btn-migrate"><span class="fa fa-level-up"></span> <?php echo lang('button_migrate'); ?></a>
								</div>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>