<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only"><?php echo lang('button_close')?></span>
	</button>
	<h4 class="modal-title" id="myModalLabel"><?php echo $page_heading?></h4>
</div>

<div class="modal-body">

	<?php echo form_open(current_url(), array('class'=>'form-horizontal'));?>

		<div class="form-group">
			<label class="col-sm-3 control-label" for="menu_text"><?php echo lang('menu_text')?>:</label>
			<div class="col-sm-8">
				<?php echo form_input(array('id'=>'menu_text', 'name'=>'menu_text', 'value'=>set_value('menu_text', isset($record->menu_text) ? $record->menu_text : ''), 'class'=>'form-control')); ?>
				<div id="error-menu_text"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label" for="menu_link"><?php echo lang('menu_link')?>:</label>
			<div class="col-sm-8">
				<?php echo form_input(array('id'=>'menu_link', 'name'=>'menu_link', 'value'=>set_value('menu_link', isset($record->menu_link) ? $record->menu_link : ''), 'class'=>'form-control')); ?>
				<div id="error-menu_link"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label" for="menu_perm"><?php echo lang('menu_perm')?>:</label>
			<div class="col-sm-8">
				<?php echo form_input(array('id'=>'menu_perm', 'name'=>'menu_perm', 'value'=>set_value('menu_perm', isset($record->menu_perm) ? $record->menu_perm : ''), 'class'=>'form-control')); ?>
				<div id="error-menu_perm"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label" for="menu_icon"><?php echo lang('menu_icon')?>:</label>
			<div class="col-sm-8">
				<?php echo form_input(array('id'=>'menu_icon', 'name'=>'menu_icon', 'value'=>set_value('menu_icon', isset($record->menu_icon) ? $record->menu_icon : ''), 'class'=>'form-control')); ?>
				<div id="error-menu_icon"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label" for="menu_parent"><?php echo lang('menu_parent')?>:</label>
			<div class="col-sm-8">
				<?php echo form_dropdown('menu_parent', $menu_items, set_value('menu_parent', (isset($record->menu_parent) && $record->menu_parent != '') ? $record->menu_parent : ''), 'id="menu_parent" class="form-control"'); ?>
				<div id="error-menu_parent"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label" for="menu_order"><?php echo lang('menu_order')?>:</label>
			<div class="col-sm-3">
				<?php $options = array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10); ?>
				<?php echo form_dropdown('menu_order', $options, set_value('menu_order', isset($record->menu_order) ? $record->menu_order : 1), 'id="menu_order" class="form-control"'); ?>
				<div id="error-menu_order"></div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-4">
				<div class="checkbox">
					<label>
						<input <?php echo ($page_type == 'view') ? 'disabled="disabled"' : ''; ?> id="menu_active" name="menu_active" type="checkbox" value="1" <?php echo set_checkbox('menu_active', 1, (isset($record->menu_active) && $record->menu_active == 1) ? TRUE : FALSE); ?> /> <?php echo lang('menu_active')?>
					</label>
				</div>
				<div id="error-menu_active"></div>
			</div>
		</div>		

	<?php echo form_close();?>

</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-times"></i> <?php echo lang('button_close')?>
	</button>
	<?php if ($page_type == 'add'): ?>
		<button id="submit" class="btn btn-success" type="submit">
			<i class="fa fa-save"></i> <?php echo lang('button_add')?>
		</button>
	<?php else: ?>
		<button id="submit" class="btn btn-success" type="submit">
			<i class="fa fa-save"></i> <?php echo lang('button_update')?>
		</button>
	<?php endif; ?>
</div>