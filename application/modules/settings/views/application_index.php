<div class="row">

	<div class="col-md-6">

		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Application Settings</h3>
			</div>

			<div class="box-body">

				<?php echo form_open(current_url(), array('class'=>'form-horizontal', 'role'=>'form'));?>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="application_name"><?=lang('label_application_name')?>:</label>
						<?php $formdata = array('id'=>'application_name', 'name'=>'application_name', 'value'=>set_value('application_name', isset($config['application_name']) ? $config['application_name'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_application_name')?></div>
							<?php echo form_error('application_name'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="application_email_from"><?=lang('label_application_email_from')?>:</label>
						<?php $formdata = array('id'=>'application_email_from', 'name'=>'application_email_from', 'value'=>set_value('application_email_from', isset($config['application_email_from']) ? $config['application_email_from'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_application_email_from')?></div>
							<?php echo form_error('application_email_from'); ?>
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
							<button class="btn btn-primary" type="submit" class="form-action">
								<i class="fa fa-save"></i> Save Changes
							</button>
						</div>
					</div>

					<?php echo form_hidden('submit', 1); ?>	

				<?php echo form_close();?>

			</div>
		</div>


	</div>

	<div class="col-md-6">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Migration Options</h3>
            </div>

            <div class="box-body">

                <a href="<?php echo site_url('settings/application/migrate')?>" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" title="Migrate" class="btn btn-primary"><span class="fa fa-table"></span> Start Migration</a>


                <a href="<?php echo site_url('settings/application/rollback')?>" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" title="Rollback" class="btn btn-primary"><span class="fa fa-arrow-circle-left"></span> Rollback Migration</a>
        </div><br>
    </div>

</div>
