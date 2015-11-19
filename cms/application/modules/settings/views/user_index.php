<?php echo form_open(current_url(), array('class'=>'form-horizontal', 'role'=>'form'));?>

	<div class="row">

				<div class="col-md-6">




			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Local Authentication</h3>
				</div>

				<div class="box-body">

					<div class="form-group">
						<label class="col-sm-4 control-label" for="min_password_length"><?=lang('label_min_password_length')?>:</label>
						<?php $formdata = array('id'=>'min_password_length', 'name'=>'min_password_length', 'value'=>set_value('min_password_length', isset($config['min_password_length']) ? $config['min_password_length'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_min_password_length')?></div>
							<?php echo form_error('min_password_length'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="max_password_length"><?=lang('label_max_password_length')?>:</label>
						<?php $formdata = array('id'=>'max_password_length', 'name'=>'max_password_length', 'value'=>set_value('max_password_length', isset($config['max_password_length']) ? $config['max_password_length'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_max_password_length')?></div>
							<?php echo form_error('max_password_length'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="user_expire"><?=lang('label_user_expire')?>:</label>
						<?php $formdata = array('id'=>'user_expire', 'name'=>'user_expire', 'value'=>set_value('user_expire', isset($config['user_expire']) ? $config['user_expire'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_user_expire')?></div>
							<?php echo form_error('user_expire'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="user_extend_on_login"><?=lang('label_user_extend_on_login')?>:</label>
						<div class="col-sm-8">
							<input type="radio" name="user_extend_on_login" value="1" <?php echo set_checkbox('user_extend_on_login', '1', ($config['user_extend_on_login'] == 1) ? TRUE : FALSE); ?> /> <?=lang('radio_yes')?>&nbsp;&nbsp;
							<input type="radio" name="user_extend_on_login" value="0" <?php echo set_checkbox('user_extend_on_login', '1', ($config['user_extend_on_login'] == 0) ? TRUE : FALSE); ?> /> <?=lang('radio_no')?>
							<div class="help-text"><?=lang('text_user_extend_on_login')?></div>
							<?php echo form_error('user_extend_on_login'); ?>
						</div>
					</div>

					

					

					<div class="form-group">
						<label class="col-sm-4 control-label" for="forgot_password_expiration"><?=lang('label_forgot_password_expiration')?>:</label>
						<?php $formdata = array('id'=>'forgot_password_expiration', 'name'=>'forgot_password_expiration', 'value'=>set_value('forgot_password_expiration', isset($config['forgot_password_expiration']) ? $config['forgot_password_expiration'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_forgot_password_expiration')?></div>
							<?php echo form_error('forgot_password_expiration'); ?>
						</div>
					</div>

				</div>
			</div>


			

		</div>

		<div class="col-md-6">


			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Login Attempts</h3>
				</div>

				<div class="box-body">

					<div class="form-group">
						<label class="col-sm-4 control-label" for="track_login_attempts"><?=lang('label_track_login_attempts')?>:</label>
						<div class="col-sm-8">
							<input type="radio" name="track_login_attempts" value="1" <?php echo set_checkbox('track_login_attempts', '1', ($config['track_login_attempts'] == 1) ? TRUE : FALSE); ?> /> <?=lang('radio_yes')?>&nbsp;&nbsp;
							<input type="radio" name="track_login_attempts" value="0" <?php echo set_checkbox('track_login_attempts', '1', ($config['track_login_attempts'] == 0) ? TRUE : FALSE); ?> /> <?=lang('radio_no')?>
							<div class="help-text"><?=lang('text_track_login_attempts')?></div>
							<?php echo form_error('track_login_attempts'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="maximum_login_attempts"><?=lang('label_maximum_login_attempts')?>:</label>
						<?php $formdata = array('id'=>'maximum_login_attempts', 'name'=>'maximum_login_attempts', 'value'=>set_value('maximum_login_attempts', isset($config['maximum_login_attempts']) ? $config['maximum_login_attempts'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_maximum_login_attempts')?></div>
							<?php echo form_error('maximum_login_attempts'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="user_lockout_time"><?=lang('label_user_lockout_time')?>:</label>
						<?php $formdata = array('id'=>'user_lockout_time', 'name'=>'user_lockout_time', 'value'=>set_value('user_lockout_time', isset($config['user_lockout_time']) ? $config['user_lockout_time'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_user_lockout_time')?></div>
							<?php echo form_error('user_lockout_time'); ?>
						</div>
					</div>

				</div>
			</div>

			


		</div>

		<div class="col-md-12">

			<div class="form-actions">
				<?php echo form_hidden('submit', 1); ?>				
				
				<a class="btn btn-default" href="<?php echo site_url('dashboard'); ?>">
					<i class="fa fa-arrow-circle-left"></i> <?=lang('button_back')?>
				</a>
				<button class="btn btn-primary" type="submit" class="form-action">
					<i class="fa fa-save"></i> <?=lang('button_update_settings')?>
				</button>
			</div>

		</div>
	</div>	
<?php echo form_close();?>



<div class="modal" id="testmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title"><?=lang('modal_send_test_mail_title')?></h4>
            </div>
            <div class="modal-body">
            	<div class="text-center">
	            	<img src="<?=asset_url('img/20.gif')?>" alt="<?=lang('loading')?>" />
					<p><?=lang('loading')?></p>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> <?=lang('button_close')?></button>
            </div>
        </div>
    </div> 
</div> 