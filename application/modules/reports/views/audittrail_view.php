<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only"><?=lang('button_close')?></span>
	</button>
	<h4 class="modal-title" id="myModalLabel"><?=lang('text_audittrail_details')?></h4>
</div>
<div class="modal-body">

	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?=lang('header_audittrail_info')?></h3>
		</div>

		<div class="box-body">

			<table class="table table-condensed">
				<tr><td class="col-md-3"><?=lang('label_id')?></td><td><?=$audittrail->audittrail_id?></td></tr>
				<tr><td class="col-md-3"><?=lang('label_date')?></td><td><?=$audittrail->audittrail_date?></td></tr>
				<tr><td class="col-md-3"><?=lang('label_table')?></td><td><?=$audittrail->audittrail_table?></td></tr>
				<tr><td class="col-md-3"><?=lang('label_table_id')?></td><td><?=$audittrail->audittrail_table_id?></td></tr>
				<tr><td class="col-md-3"><?=lang('label_action')?></td><td><?=ucfirst($audittrail->audittrail_action)?></td></tr>
				<tr><td class="col-md-3"><?=lang('label_message')?></td><td><?=$audittrail->audittrail_message?></td></tr>
				<tr><td class="col-md-3"><?=lang('label_ip')?></td><td><?=$audittrail->audittrail_ip?></td></tr>
				<tr><td class="col-md-3"><?=lang('label_user_agent')?></td><td><?=$audittrail->audittrail_user_agent?></td></tr>
				<tr><td class="col-md-3"><?=lang('label_user')?></td><td><?=$audittrail->user_firstname?> <?=$audittrail->user_lastname?></td></tr>
			</table>

		</div>
	</div>

	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?=lang('header_form_data')?></h3>
		</div>

		<div class="box-body">
			<table class="table table-condensed">
				<thead>
					<th><?=lang('label_field')?></th>
					<th><?=lang('label_new')?></th>
					<th><?=lang('label_old')?></th>
				</thead>
				<tbody>
					<?php if ($new_data): ?>
						<?php foreach ($new_data as $field => $value): ?>
							<tr><td><?=$field?></td><td><?=$value?></td><td><?=(isset($old_data->{$field})) ? $old_data->{$field} : ''?></td></tr>
						<?php endforeach; ?>

					<?php elseif (! $new_data && $old_data): ?>
						<?php foreach ($old_data as $field => $value): ?>
							<tr><td><?=$field?></td><td></td><td><?=$value?></td></tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>

	</div>

</div> 
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> <?=lang('button_close')?></button>
</div> 