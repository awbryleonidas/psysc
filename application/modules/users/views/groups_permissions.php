<span class="btn-actions">
	<a class="btn btn-sm btn-success btn-add" href="<?php echo site_url('users/permissions'); ?>"><span class="fa fa-key"></span> <?=lang('button_permissions')?></a>
</span>

<?php if (is_array($permissions)): ?>
	
	<?php echo form_open(current_url());?>

	<h4><?=lang('permissions_th_group')?>: <?php echo $group->group_name; ?></h4>
	<br />
	<table class="table table-bordered table-hover responsive" id="datatables">
		
		<thead>
			<tr>
				<th class="mobile tablet desktop">Modules</th>
				<th class="text-center"><?=lang('permissions_th_list')?></th>
				<th class="text-center"><?=lang('permissions_th_view')?></a></th>
				<th class="text-center"><?=lang('permissions_th_add')?></a></th>
				<th class="text-center"><?=lang('permissions_th_edit')?></a></th>
				<th class="text-center"><?=lang('permissions_th_delete')?></a></th>
				<th><?=lang('permissions_th_other')?></th>
			</tr>
		</thead>
		
		<tbody>
		<?php foreach ($module_permissions as $module => $permission):?>

			<?php foreach ($permission as $controller => $methods): ?>

				<?php if ($controller == 'migrate') continue; ?>
				<tr>							
					<?php $ctlr = ucfirst($module).'.'.ucfirst($controller); ?>
					<?php $module_class = $module.'-'.$controller; ?>
					<?php $module_name = ($module === $controller) ? ucfirst($module) : $ctlr; ?>
					<td class="mobile tablet desktop">
						<!-- <input type="checkbox" id="select-<?=$module_class?>" />  -->
						<?php echo str_replace('.','/',$module_name); ?>
					</td>
	
					<td class="text-center">
						<?php $group_perm_id = array_search($ctlr.'.List', $methods); ?>
						<?php $permission_simple = multi_array_object_search_sibling($permissions, 'permission_name', $ctlr.'.List', 'permission_simple'); ?>
						<?php $options = ($permission_simple) ? $list_options_simple : $list_options; ?>
						<?php if ($group_perm_id): ?>
							<?php $class = (isset($group_perms[$group_perm_id]) && $group_perms[$group_perm_id] > 0) ? 'border-green' : 'border-red'; ?>
							<?php echo form_dropdown('permission[]', $options, (isset($group_perms[$group_perm_id])) ? $group_perms[$group_perm_id] : 0, 'class="form-control group_permission ' . $class . '" permission_id="'. $group_perm_id .'" group_id="'. $group->group_id .'" tooltip-toggle="tooltip" data-placement="left" title="List Permission"'); ?>
							<?php unset($methods[$group_perm_id]); ?>
						<?php else: ?>
							<a class="btn btn-xs btn-default btn-add-permission" tooltip-toggle="tooltip" data-placement="left" title="Create List Permission" href="<?php echo site_url('users/permissions/add/'.$ctlr.'.List'); ?>" data-toggle="modal" data-target="#modal"><span class="fa fa-plus"></span></a>
						<?php endif; ?>
					</td>
					
					<td class="text-center">
						<?php $group_perm_id = array_search($ctlr.'.View', $methods); ?>
						<?php $permission_simple = multi_array_object_search_sibling($permissions, 'permission_name', $ctlr.'.View', 'permission_simple'); ?>
						<?php $options = ($permission_simple) ? $view_options_simple : $view_options; ?>
						<?php if ($group_perm_id): ?>
							<?php $class = (isset($group_perms[$group_perm_id]) && $group_perms[$group_perm_id] > 0) ? 'border-green' : 'border-red'; ?>
							<?php echo form_dropdown('permission[]', $options, (isset($group_perms[$group_perm_id])) ? $group_perms[$group_perm_id] : 0, 'class="form-control group_permission ' . $class . '" permission_id="'. $group_perm_id .'" group_id="'. $group->group_id .'" tooltip-toggle="tooltip" data-placement="left" title="View Permission"'); ?>
							<?php unset($methods[$group_perm_id]); ?>
						<?php else: ?>
							<a class="btn btn-xs btn-default btn-add-permission" tooltip-toggle="tooltip" data-placement="left" title="Create View Permission" href="<?php echo site_url('users/permissions/add/'.$ctlr.'.View'); ?>" data-toggle="modal" data-target="#modal"><span class="fa fa-plus"></span></a>
						<?php endif; ?>
					</td>
					
					<td class="text-center">
						<?php $group_perm_id = array_search($ctlr.'.Add', $methods); ?>
						<?php if ($group_perm_id): ?>
							<?php $class = (isset($group_perms[$group_perm_id]) && $group_perms[$group_perm_id] > 0) ? 'border-green' : 'border-red'; ?>
							<?php echo form_dropdown('permission[]', $add_options, (isset($group_perms[$group_perm_id])) ? $group_perms[$group_perm_id] : 0, 'class="form-control group_permission ' . $class . '" permission_id="'. $group_perm_id .'" group_id="'. $group->group_id .'" tooltip-toggle="tooltip" data-placement="left" title="Add Permission"'); ?>
							<?php unset($methods[$group_perm_id]); ?>
						<?php else: ?>
							<a class="btn btn-xs btn-default" tooltip-toggle="tooltip" data-placement="left" title="Create Add Permission" href="<?php echo site_url('users/permissions/add/'.$ctlr.'.Add'); ?>" data-toggle="modal" data-target="#modal"><span class="fa fa-plus"></span></a>
						<?php endif; ?>
					</td>
					
					<td class="text-center">
						<?php $group_perm_id = array_search($ctlr.'.Edit', $methods); ?>
						<?php $permission_simple = multi_array_object_search_sibling($permissions, 'permission_name', $ctlr.'.Edit', 'permission_simple'); ?>
						<?php $options = ($permission_simple) ? $edit_options_simple : $edit_options; ?>
						<?php if ($group_perm_id): ?>
							<?php $class = (isset($group_perms[$group_perm_id]) && $group_perms[$group_perm_id] > 0) ? 'border-green' : 'border-red'; ?>
							<?php echo form_dropdown('permission[]', $options, (isset($group_perms[$group_perm_id])) ? $group_perms[$group_perm_id] : 0, 'class="form-control group_permission ' . $class . '" permission_id="'. $group_perm_id .'" group_id="'. $group->group_id .'" tooltip-toggle="tooltip" data-placement="left" title="Edit Permission"'); ?>
							<?php unset($methods[$group_perm_id]); ?>
						<?php else: ?>
							<a class="btn btn-xs btn-default" tooltip-toggle="tooltip" data-placement="left" title="Create Edit Permission" href="<?php echo site_url('users/permissions/add/'.$ctlr.'.Edit'); ?>" data-toggle="modal" data-target="#modal"><span class="fa fa-plus"></span></a>
						<?php endif; ?>
					</td>
					
					<td class="text-center">
						<?php $group_perm_id = array_search($ctlr.'.Delete', $methods); ?>
						<?php $permission_simple = multi_array_object_search_sibling($permissions, 'permission_name', $ctlr.'.Delete', 'permission_simple'); ?>
						<?php $options = ($permission_simple) ? $delete_options_simple : $delete_options; ?>
						<?php if ($group_perm_id): ?>
							<?php echo form_dropdown('permission[]', $options, (isset($group_perms[$group_perm_id])) ? $group_perms[$group_perm_id] : 0, 'class="form-control group_permission ' . $class . '" permission_id="'. $group_perm_id .'" group_id="'. $group->group_id .'" tooltip-toggle="tooltip" data-placement="left" title="Delete Permission"'); ?>
							<?php unset($methods[$group_perm_id]); ?>
						<?php else: ?>
							<a class="btn btn-xs btn-default" tooltip-toggle="tooltip" data-placement="left" title="Create Delete Permission" href="<?php echo site_url('users/permissions/add/'.$ctlr.'.Delete'); ?>" data-toggle="modal" data-target="#modal"><span class="fa fa-plus"></span></a>
						<?php endif; ?>
					</td>
					
					<td>
						<table>
							<?php foreach ($methods as $group_perm_id => $other_method): ?>
								<tr>
									<td><?php echo str_replace($ctlr.'.', '', $other_method); ?>&nbsp;&nbsp;</td>
									<td style="padding-bottom:3px">
										<?php $class = (isset($group_perms[$group_perm_id]) && $group_perms[$group_perm_id] > 0) ? 'border-green' : 'border-red'; ?>
										<?php $permission_simple = multi_array_object_search_sibling($permissions, 'permission_name', $other_method, 'permission_simple'); ?>
										<?php $options = ($permission_simple) ? $other_options_simple : $other_options; ?>
										<?php echo form_dropdown('permission[]', $options, (isset($group_perms[$group_perm_id])) ? $group_perms[$group_perm_id] : 0, 'class="form-control group_permission ' . $class . '" permission_id="'. $group_perm_id .'" group_id="'. $group->group_id .'"'); ?>
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
					<i class="fa fa-arrow-circle-left"></i> <?=lang('button_back')?></i>
				</a>

				<button class="btn btn-primary" type="submit" class="form-action">
					<i class="fa fa-save"></i> <?=lang('button_update_permission')?></i>
				</button>
			</div>

		</div>
	</div>
		
<?php echo form_close();?>
	
<?php endif; ?>