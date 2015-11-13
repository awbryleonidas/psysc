<div class="box">
	<div class="box-body">

		<span class="btn-actions">
			<a class="btn btn-sm btn-success btn-add" href="<?php echo site_url('users/permissions'); ?>"><span class="fa fa-key"></span> <?php echo lang('button_permissions')?></a>
		</span>

		<?php if (is_array($permissions)): ?>
			<?php //pr($permissions); ?>
			<?php echo form_open(current_url());?>

			<h4><?php echo lang('permissions_th_role')?>: <?php echo $group->name; ?></h4>
			<br />
			<table class="table table-bordered table-hover responsive" id="datatables">
				
				<thead>
					<tr>
						<th class="mobile tablet desktop">Modules</th>
						<th class="text-center"><?php echo lang('permissions_th_list')?></th>
						<th class="text-center"><?php echo lang('permissions_th_view')?></a></th>
						<th class="text-center"><?php echo lang('permissions_th_add')?></a></th>
						<th class="text-center"><?php echo lang('permissions_th_edit')?></a></th>
						<th class="text-center"><?php echo lang('permissions_th_delete')?></a></th>
						<th><?php echo lang('permissions_th_other')?></th>
					</tr>
				</thead>
				
				<tbody>
				<?php //pr($module_permissions); ?>
				<?php foreach ($module_permissions as $module => $permission):?>

					<?php foreach ($permission as $controller => $methods): ?>

						<?php if ($controller == 'migrate') continue; ?>
						<tr>							
							<?php $ctlr = strtolower($module).'.'.strtolower($controller); ?>
							<?php $module_class = $module.'-'.$controller; ?>
							<?php $module_name = ($module === $controller) ? strtolower($module) : $ctlr; ?>
							<td class="mobile tablet desktop">
								<!-- <input type="checkbox" id="select-<?php echo $module_class?>" />  -->
								<?php echo str_replace('.','/',$module_name); ?>
							</td>
			
							<td class="text-center">
								<?php $grant_id = array_search($ctlr.'.list', $methods); ?>
								<?php $permission_simple = multi_array_object_search_sibling($permissions, 'permission_name', $ctlr.'.list', 'permission_simple'); ?>
								<?php $options = ($permission_simple) ? $list_options_simple : $list_options; ?>
								<?php if ($grant_id): ?>
									<?php $class = (isset($grants[$grant_id]) && $grants[$grant_id] > 0) ? 'border-green' : 'border-red'; ?>
									<?php echo form_dropdown('permission[]', $options, (isset($grants[$grant_id])) ? $grants[$grant_id] : 0, 'class="form-control group_permission ' . $class . '" permission_id="'. $grant_id .'" group_id="'. $group->id .'" tooltip-toggle="tooltip" data-placement="left" title="List Permission"'); ?>
									<?php unset($methods[$grant_id]); ?>
								<?php else: ?>
									<a class="btn btn-xs btn-default btn-add-permission" tooltip-toggle="tooltip" data-placement="left" title="Create List Permission" href="<?php echo site_url('users/permissions/add/'.$ctlr.'.list'); ?>" data-toggle="modal" data-target="#modal"><span class="fa fa-plus"></span></a>
								<?php endif; ?>
							</td>
							
							<td class="text-center">
								<?php $grant_id = array_search($ctlr.'.view', $methods); ?>
								<?php $permission_simple = multi_array_object_search_sibling($permissions, 'permission_name', $ctlr.'.view', 'permission_simple'); ?>
								<?php $options = ($permission_simple) ? $view_options_simple : $view_options; ?>
								<?php if ($grant_id): ?>
									<?php $class = (isset($grants[$grant_id]) && $grants[$grant_id] > 0) ? 'border-green' : 'border-red'; ?>
									<?php echo form_dropdown('permission[]', $options, (isset($grants[$grant_id])) ? $grants[$grant_id] : 0, 'class="form-control group_permission ' . $class . '" permission_id="'. $grant_id .'" group_id="'. $group->id .'" tooltip-toggle="tooltip" data-placement="left" title="View Permission"'); ?>
									<?php unset($methods[$grant_id]); ?>
								<?php else: ?>
									<a class="btn btn-xs btn-default btn-add-permission" tooltip-toggle="tooltip" data-placement="left" title="Create View Permission" href="<?php echo site_url('users/permissions/add/'.$ctlr.'.view'); ?>" data-toggle="modal" data-target="#modal"><span class="fa fa-plus"></span></a>
								<?php endif; ?>
							</td>
							
							<td class="text-center">
								<?php $grant_id = array_search($ctlr.'.add', $methods); ?>
								<?php if ($grant_id): ?>
									<?php $class = (isset($grants[$grant_id]) && $grants[$grant_id] > 0) ? 'border-green' : 'border-red'; ?>
									<?php echo form_dropdown('permission[]', $add_options, (isset($grants[$grant_id])) ? $grants[$grant_id] : 0, 'class="form-control group_permission ' . $class . '" permission_id="'. $grant_id .'" group_id="'. $group->id .'" tooltip-toggle="tooltip" data-placement="left" title="Add Permission"'); ?>
									<?php unset($methods[$grant_id]); ?>
								<?php else: ?>
									<a class="btn btn-xs btn-default" tooltip-toggle="tooltip" data-placement="left" title="Create Add Permission" href="<?php echo site_url('users/permissions/add/'.$ctlr.'.add'); ?>" data-toggle="modal" data-target="#modal"><span class="fa fa-plus"></span></a>
								<?php endif; ?>
							</td>
							
							<td class="text-center">
								<?php $grant_id = array_search($ctlr.'.edit', $methods); ?>
								<?php $permission_simple = multi_array_object_search_sibling($permissions, 'permission_name', $ctlr.'.edit', 'permission_simple'); ?>
								<?php $options = ($permission_simple) ? $edit_options_simple : $edit_options; ?>
								<?php if ($grant_id): ?>
									<?php $class = (isset($grants[$grant_id]) && $grants[$grant_id] > 0) ? 'border-green' : 'border-red'; ?>
									<?php echo form_dropdown('permission[]', $options, (isset($grants[$grant_id])) ? $grants[$grant_id] : 0, 'class="form-control group_permission ' . $class . '" permission_id="'. $grant_id .'" group_id="'. $group->id .'" tooltip-toggle="tooltip" data-placement="left" title="Edit Permission"'); ?>
									<?php unset($methods[$grant_id]); ?>
								<?php else: ?>
									<a class="btn btn-xs btn-default" tooltip-toggle="tooltip" data-placement="left" title="Create Edit Permission" href="<?php echo site_url('users/permissions/add/'.$ctlr.'.edit'); ?>" data-toggle="modal" data-target="#modal"><span class="fa fa-plus"></span></a>
								<?php endif; ?>
							</td>
							
							<td class="text-center">
								<?php $grant_id = array_search($ctlr.'.delete', $methods); ?>
								<?php $permission_simple = multi_array_object_search_sibling($permissions, 'permission_name', $ctlr.'.delete', 'permission_simple'); ?>
								<?php $options = ($permission_simple) ? $delete_options_simple : $delete_options; ?>
								<?php if ($grant_id): ?>
									<?php echo form_dropdown('permission[]', $options, (isset($grants[$grant_id])) ? $grants[$grant_id] : 0, 'class="form-control group_permission ' . $class . '" permission_id="'. $grant_id .'" group_id="'. $group->id .'" tooltip-toggle="tooltip" data-placement="left" title="Delete Permission"'); ?>
									<?php unset($methods[$grant_id]); ?>
								<?php else: ?>
									<a class="btn btn-xs btn-default" tooltip-toggle="tooltip" data-placement="left" title="Create Delete Permission" href="<?php echo site_url('users/permissions/add/'.$ctlr.'.delete'); ?>" data-toggle="modal" data-target="#modal"><span class="fa fa-plus"></span></a>
								<?php endif; ?>
							</td>
							
							<td>
								<table>
									<?php foreach ($methods as $grant_id => $other_method): ?>
										<tr>
											<td><?php echo str_replace($ctlr.'.', '', $other_method); ?>&nbsp;&nbsp;</td>
											<td style="padding-bottom:3px">
												<?php $class = (isset($grants[$grant_id]) && $grants[$grant_id] > 0) ? 'border-green' : 'border-red'; ?>
												<?php $permission_simple = multi_array_object_search_sibling($permissions, 'permission_name', $other_method, 'permission_simple'); ?>
												<?php $options = ($permission_simple) ? $other_options_simple : $other_options; ?>
												<?php echo form_dropdown('permission[]', $options, (isset($grants[$grant_id])) ? $grants[$grant_id] : 0, 'class="form-control group_permission ' . $class . '" permission_id="'. $grant_id .'" group_id="'. $group->id .'"'); ?>
											</td>
										</tr>
									<?php endforeach; ?>
								</table>
								<a class="btn btn-xs btn-default" tooltip-toggle="tooltip" data-placement="left" title="Create Custom Permission" href="<?php echo site_url('users/permissions/add/'); ?>" data-toggle="modal" data-target="#modal"><span class="fa fa-plus"></span></a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endforeach;?>
				
				</tbody>
				
			</table>

			<div class="row hide">
				<div class="col-md-12">

					<div class="form-actions">
						<?php echo form_hidden('submit', 1); ?>	
						
						<a class="btn btn-warning" href="<?php echo site_url('users/groups'); ?>">
							<i class="fa fa-arrow-circle-left"></i> <?php echo lang('button_back')?></i>
						</a>

						<button class="btn btn-primary" type="submit" class="form-action">
							<i class="fa fa-save"></i> <?php echo lang('button_update_permission')?></i>
						</button>
					</div>

				</div>
			</div>
				
		<?php echo form_close();?>
			
		<?php endif; ?>
	</div>
</div>