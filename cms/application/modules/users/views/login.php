<div class="login-box">
	<div class="login-logo"><b>Login</b></div>
	<div class="login-box-body">
		<p class="login-box-msg">Sign in to start your session</p>

		<?php $return = ($this->input->get('return')) ? '?return=' . urlencode($this->input->get('return')) : ''; ?>
		<?php echo form_open(current_url() . $return);?>
			<div class="form-group has-feedback">
				<?php echo form_input(array('name'=>'identity', 'value'=>set_value('identity'), 'class'=>'form-control', 'placeholder' => 'Username'));?>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				<?php echo form_error('identity'); ?>
			</div>
			<div class="form-group has-feedback">
				<input name="password" type="password" class="form-control" placeholder="Password"/>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<?php echo form_error('password'); ?>
			</div>
			<div class="row">
				<div class="col-xs-8">		
					<div class="checkbox icheck">
						<label>
							<input name="remember" type="checkbox"> Remember Me
						</label>
					</div>
				</div>
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div>
			</div>
			<?php echo form_hidden('submit', 1); ?>
			<?php echo form_hidden('return', ($this->input->get('return') ? $this->input->get('return') : '')); ?>
		</form>

		<a href="forgot_password">I forgot my password</a>

	</div>
</div>