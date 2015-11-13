<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only"><?php echo lang('button_close')?></span>
	</button>
	<h4 class="modal-title" id="myModalLabel"><?php echo $page_heading?></h4>
</div>

<div class="modal-body">

	<?php echo form_open(current_url(), array('class'=>'form-horizontal'));?>



	<?php echo form_close();?>

</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-times"></i> <?php echo lang('button_close')?>
	</button>

	<button id="submit" class="btn btn-success" type="submit">
		<i class="fa fa-level-down"></i> <?php echo lang('button_rollback')?>
	</button>
</div>