<?php echo form_open(uri_string());?>

	<div class="box">

		<div class="box-body">

			<div class="row">

				<div class="col-md-6">

					<h3>User Info</h3>
					
					<p>
						<?php echo lang('create_user_fname_label', 'first_name');?> <br />
						<?php echo form_input($first_name);?>
						<?php echo form_error('first_name'); ?>
					</p>

					<p>
						<?php echo lang('create_user_lname_label', 'last_name');?> <br />
						<?php echo form_input($last_name);?>
						<?php echo form_error('last_name'); ?>
					</p>

					<p>
						<?php echo lang('create_user_company_label', 'company');?> <br />
						<?php echo form_input($company);?>
						<?php echo form_error('company'); ?>
					</p>

					

					<p>
						<?php echo lang('create_user_phone_label', 'phone');?> <br />
						<?php echo form_input($phone);?>
						<?php echo form_error('phone'); ?>
					</p>

					

				</div>

				<div class="col-md-6">

					<h3>Access Info</h3>

					<p>
						<?php echo lang('create_user_email_label', 'email');?> <br />
						<?php echo form_input($email);?>
						<?php echo form_error('email'); ?>
					</p>

					<p>
						<?php echo lang('create_user_username_label', 'username');?> <br />
						<?php echo form_input($username);?>
						<?php echo form_error('username'); ?>
					</p>

					<p>
						<?php echo lang('create_user_password_label', 'password');?> <br />
						<?php echo form_input($password);?>
						<?php echo form_error('password'); ?>
					</p>

					<p>
						<?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
						<?php echo form_input($password_confirm);?>
						<?php echo form_error('password_confirm'); ?>
					</p>
				</div>

			</div>

		</div><!-- /.box-body -->

		<div class="box-footer">
			<?php echo form_submit('submit', lang('create_user_submit_btn'), 'class="btn btn-primary"');?>
		</div><!-- /.box-footer-->

	</div><!-- /.box -->

<?php echo form_close();?>