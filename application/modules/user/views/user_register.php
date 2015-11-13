<div class="container">
	<div class="register-box">
		<h2 class="form-signin-heading text-center">Register</h2>
		<div class="register-box-body">
			<p class="register-box-msg text-center">Please enter your information</p>

			<?php echo form_open("user/register", 'class="form-horizontal form-register"');?>

				<?php if (isset($message)): ?>
					<div id="infoMessage" class="alert alert-danger"><?php echo $message;?></div>
				<?php endif; ?>

				<span class="pull-right">
					<a href="<?php echo site_url('user/register_fb'); ?>"><img src="<?php echo assets_url('images/login_fb.png'); ?>" /></a>
				</span>
				<h3>User Information</h3>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="first_name"><?php echo lang('first_name')?>:</label>
					<div class="col-sm-7">
						<?php $formdata = array('id'=>'first_name', 'name'=>'first_name', 'value'=>set_value('first_name'), 'class'=>'form-control'); ?>
						<?php echo form_input($formdata);?>
						<?php echo form_error('first_name'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="last_name"><?php echo lang('last_name')?>:</label>
					<div class="col-sm-7">
						<?php $formdata = array('id'=>'last_name', 'name'=>'last_name', 'value'=>set_value('last_name'), 'class'=>'form-control'); ?>
						<?php echo form_input($formdata);?>
						<?php echo form_error('last_name'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="email"><?php echo lang('email')?>:</label>
					<div class="col-sm-7">
						<?php $formdata = array('id'=>'email', 'name'=>'email', 'value'=>set_value('email'), 'class'=>'form-control'); ?>
						<?php echo form_input($formdata);?>
						<?php echo form_error('email'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="company"><?php echo lang('company')?>:</label>
					<div class="col-sm-7">
						<?php $formdata = array('id'=>'company', 'name'=>'company', 'value'=>set_value('company'), 'class'=>'form-control'); ?>
						<?php echo form_input($formdata);?>
						<?php echo form_error('company'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="phone"><?php echo lang('phone')?>:</label>
					<div class="col-sm-7">
						<?php $formdata = array('id'=>'phone', 'name'=>'phone', 'value'=>set_value('phone'), 'class'=>'form-control'); ?>
						<?php echo form_input($formdata);?>
						<?php echo form_error('phone'); ?>
					</div>
				</div>


				<h3 class="top-margin4">Login Information</h3>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="username"><?php echo lang('username')?>:</label>
					<div class="col-sm-7">
						<?php $formdata = array('id'=>'username', 'name'=>'username', 'value'=>set_value('username'), 'class'=>'form-control'); ?>
						<?php echo form_input($formdata);?>
						<?php echo form_error('username'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="password"><?php echo lang('password')?>:</label>
					<div class="col-sm-7">
						<?php $formdata = array('id'=>'password', 'name'=>'password', 'value'=>set_value('password'), 'class'=>'form-control'); ?>
						<?php echo form_password($formdata);?>
						<?php echo form_error('password'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label" for="password_confirm"><?php echo lang('password_confirm')?>:</label>
					<div class="col-sm-7">
						<?php $formdata = array('id'=>'password_confirm', 'name'=>'password_confirm', 'value'=>set_value('password_confirm'), 'class'=>'form-control'); ?>
						<?php echo form_password($formdata);?>
						<?php echo form_error('password_confirm'); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-7 col-sm-offset-4">
						<?php echo form_checkbox('terms', 1, set_checkbox('terms'), 'id="terms"'); ?> I agree to the <a href="<?php echo site_url('page/terms'); ?>" data-toggle="modal" data-target="#modal">Terms and Conditions</a>
						<?php echo form_error('terms'); ?>
					</div>
				</div>

				<div class="form-group top-margin4">
					<div class="col-sm-7 col-sm-offset-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
					</div>
				</div>

				<?php echo form_hidden('submit', 1); ?>
			</form>		

		</div>
	</div>
</div>