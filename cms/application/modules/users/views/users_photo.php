<div class="row">
	<div class="col-md-2">
		<div class="box">
			<div class="box-body">
				<div class="row">
					<?php echo form_open(current_url(), array('class'=>'dropzone', 'id' => 'dropzone'));?>
						<input type="file" name="file" class="hide" />
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>