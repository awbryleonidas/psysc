<div class="login-box">
	<div class="login-logo"><b><?php echo lang('forgot_password_heading');?></b></div>
	<div class="login-box-body">
		<p class="login-box-msg"><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

		<?php echo form_open("users/forgot_password");?>

		      <p>
		      	<label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label> <br />
		      	<?php echo form_input($email);?>
		      	<?php echo form_error('email'); ?>
		      </p>

		      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'), 'class="btn btn-primary');?></p>

		<?php echo form_close();?>
	</div>
</div>