		<div class="form-group">
			<label class="col-sm-3 control-label" for="{{form_name}}"><?php echo lang('{{form_name}}')?>:</label>
			<div class="col-sm-8">
				<?php echo form_textarea(array('id'=>'{{form_name}}', 'name'=>'{{form_name}}', 'rows'=>'3', 'value'=>set_value('{{form_name}}', isset($record->{{form_name}}) ? $record->{{form_name}} : ''), 'class'=>'form-control')); ?>
				<div id="error-{{form_name}}"></div>
			</div>
		</div>

