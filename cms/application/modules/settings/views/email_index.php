<?php echo form_open(current_url(), array('class'=>'form-horizontal', 'role'=>'form'));?>

	<div class="row">


		<div class="col-md-6">


			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?=lang('header_email_settings')?></h3>
				</div>

				<div class="box-body">

					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_notices">Email Notifications:</label>
						<div class="col-sm-8">
							<input type="radio" name="email_notices" value="1" <?php echo set_checkbox('email_notices', '1', ($config['email_notices'] == 1) ? TRUE : FALSE); ?> /> Enabled&nbsp;&nbsp;
							<input type="radio" name="email_notices" value="0" <?php echo set_checkbox('email_notices', '1', ($config['email_notices'] == 0) ? TRUE : FALSE); ?> /> Disabled
							<div class="help-text">Enable or disable email notifications on requisition process</div>
							<?php echo form_error('email_notices'); ?>
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
						<label class="col-sm-4 control-label" for="email_useragent"><?=lang('label_email_useragent')?>:</label>
						<?php $formdata = array('id'=>'email_useragent', 'name'=>'email_useragent', 'value'=>set_value('email_useragent', isset($config['email_useragent']) ? $config['email_useragent'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_email_useragent')?></div>
							<?php echo form_error('email_useragent'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_protocol"><?=lang('label_email_protocol')?>:</label>
						<div class="col-sm-8">
							<input type="radio" name="email_protocol" value="mail" <?php echo set_checkbox('email_protocol', '1', ($config['email_protocol'] == 'mail') ? TRUE : FALSE); ?> /> <?=lang('text_protocol_mail')?><br />
							<input type="radio" name="email_protocol" value="sendmail" <?php echo set_checkbox('email_protocol', '1', ($config['email_protocol'] == 'sendmail') ? TRUE : FALSE); ?> /> <?=lang('text_protocol_sendmail')?><br />
							<input type="radio" name="email_protocol" value="smtp" <?php echo set_checkbox('email_protocol', '1', ($config['email_protocol'] == 'smtp') ? TRUE : FALSE); ?> /> <?=lang('text_protocol_smtp')?>
							<div class="help-text hide"><?=lang('text_email_protocol')?></div>
							<?php echo form_error('email_protocol'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_mailpath"><?=lang('label_email_mailpath')?>:</label>
						<?php $formdata = array('id'=>'email_mailpath', 'name'=>'email_mailpath', 'value'=>set_value('email_mailpath', isset($config['email_mailpath']) ? $config['email_mailpath'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_email_mailpath')?></div>
							<?php echo form_error('email_mailpath'); ?>
						</div>
					</div>

					

					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_mailtype"><?=lang('label_email_mailtype')?>:</label>
						<div class="col-sm-8">
							<input type="radio" name="email_mailtype" value="text" <?php echo set_checkbox('email_mailtype', '1', ($config['email_mailtype'] == 'text') ? TRUE : FALSE); ?> /> <?=lang('radio_email_text')?>&nbsp;&nbsp;
							<input type="radio" name="email_mailtype" value="html" <?php echo set_checkbox('email_mailtype', '1', ($config['email_mailtype'] == 'html') ? TRUE : FALSE); ?> /> <?=lang('radio_email_html')?>
							<div class="help-text"><?=lang('text_email_mailtype')?></div>
							<?php echo form_error('email_mailtype'); ?>
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_wordwrap"><?=lang('label_email_wordwrap')?>:</label>
						<div class="col-sm-8">
							<input type="radio" name="email_wordwrap" value="1" <?php echo set_checkbox('email_wordwrap', '1', ($config['email_wordwrap'] == 1) ? TRUE : FALSE); ?> /> <?=lang('radio_yes')?>&nbsp;&nbsp;
							<input type="radio" name="email_wordwrap" value="0" <?php echo set_checkbox('email_wordwrap', '1', ($config['email_wordwrap'] == 0) ? TRUE : FALSE); ?> /> <?=lang('radio_no')?>
							<div class="help-text"><?=lang('text_email_wordwrap')?></div>
							<?php echo form_error('email_wordwrap'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_wrapchars"><?=lang('label_email_wrapchars')?>:</label>
						<?php $formdata = array('id'=>'email_wrapchars', 'name'=>'email_wrapchars', 'value'=>set_value('email_wrapchars', isset($config['email_wrapchars']) ? $config['email_wrapchars'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_email_wrapchars')?></div>
							<?php echo form_error('email_wrapchars'); ?>
						</div>
					</div>

					

					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_charset"><?=lang('label_email_charset')?>:</label>
						<?php $formdata = array('id'=>'email_charset', 'name'=>'email_charset', 'value'=>set_value('email_charset', isset($config['email_charset']) ? $config['email_charset'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_email_charset')?></div>
							<?php echo form_error('email_charset'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_newline"><?=lang('label_email_newline')?>:</label>
						<?php $formdata = array('id'=>'email_newline', 'name'=>'email_newline', 'value'=>set_value('email_newline', isset($config['email_newline']) ? $config['email_newline'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_email_newline')?></div>
							<?php echo form_error('email_newline'); ?>
						</div>
					</div>

					

				</div>
			</div>


		</div>


		<div class="col-md-6">




			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">SMTP Settings</h3>
				</div>

				<div class="box-body">

					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_smtp_host"><?=lang('label_email_smtp_host')?>:</label>
						<?php $formdata = array('id'=>'email_smtp_host', 'name'=>'email_smtp_host', 'value'=>set_value('email_smtp_host', isset($config['email_smtp_host']) ? $config['email_smtp_host'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_email_smtp_host')?></div>
							<?php echo form_error('email_smtp_host'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_smtp_user"><?=lang('label_email_smtp_user')?>:</label>
						<?php $formdata = array('id'=>'email_smtp_user', 'name'=>'email_smtp_user', 'value'=>set_value('email_smtp_user', isset($config['email_smtp_user']) ? $config['email_smtp_user'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_email_smtp_user')?></div>
							<?php echo form_error('email_smtp_user'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_smtp_pass"><?=lang('label_email_smtp_pass')?>:</label>
						<?php $formdata = array('id'=>'email_smtp_pass', 'name'=>'email_smtp_pass', 'value'=>set_value('email_smtp_pass', isset($config['email_smtp_pass']) ? $config['email_smtp_pass'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_password($formdata); ?>
							<?php echo form_error('email_smtp_pass'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_smtp_port"><?=lang('label_email_smtp_port')?>:</label>
						<?php $formdata = array('id'=>'email_smtp_port', 'name'=>'email_smtp_port', 'value'=>set_value('email_smtp_port', isset($config['email_smtp_port']) ? $config['email_smtp_port'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_email_smtp_port')?></div>
							<?php echo form_error('email_smtp_port'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_smtp_crypto"><?=lang('label_email_smtp_crypto')?>:</label>
						<div class="col-sm-8">
							<input type="radio" name="email_smtp_crypto" value="ssl" <?php echo set_checkbox('email_smtp_crypto', '1', ($config['email_smtp_crypto'] == 'ssl') ? TRUE : FALSE); ?> /> <?=lang('radio_smtp_ssl')?>&nbsp;&nbsp;
							<input type="radio" name="email_smtp_crypto" value="tls" <?php echo set_checkbox('email_smtp_crypto', '1', ($config['email_smtp_crypto'] == 'tls') ? TRUE : FALSE); ?> /> <?=lang('radio_smtp_tls')?>
							<div class="help-text"><?=lang('text_email_smtp_crypto')?></div>
							<?php echo form_error('email_smtp_crypto'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_smtp_auth"><?=lang('label_email_smtp_auth')?>:</label>
						<div class="col-sm-8">
							<input type="radio" name="email_smtp_auth" value="1" <?php echo set_checkbox('email_smtp_auth', '1', ($config['email_smtp_auth'] == 1) ? TRUE : FALSE); ?> /> <?=lang('radio_yes')?>&nbsp;&nbsp;
							<input type="radio" name="email_smtp_auth" value="html" <?php echo set_checkbox('email_smtp_auth', '1', ($config['email_smtp_auth'] == 0) ? TRUE : FALSE); ?> /> <?=lang('radio_no')?>
							<div class="help-text"><?=lang('text_email_smtp_auth')?></div>
							<?php echo form_error('email_smtp_auth'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="email_smtp_timeout"><?=lang('label_email_smtp_timeout')?>:</label>
						<?php $formdata = array('id'=>'email_smtp_timeout', 'name'=>'email_smtp_timeout', 'value'=>set_value('email_smtp_timeout', isset($config['email_smtp_timeout']) ? $config['email_smtp_timeout'] : ''), 'class'=>'form-control'); ?>
						<div class="col-sm-8">
							<?php echo form_input($formdata); ?>
							<div class="help-text"><?=lang('text_email_smtp_timeout')?></div>
							<?php echo form_error('email_smtp_timeout'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
							<a href="<?=site_url('settings/email/testmail')?>" data-toggle="modal" data-target="#testmail" class="btn btn-success"><i class="fa fa-envelope"></i> <?=lang('button_send_test_mail')?></a> 
							<div><small><?=lang('text_save_the_settings')?></small></div>
						</div>
					</div>


					

				</div>
			</div>


		</div>

		
		<div clas="clearfix"></div>

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