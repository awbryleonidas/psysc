<div class="container">
	<div class="login-box text-center">
		<h2 class="form-signin-heading">Please sign in</h2>
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>

			<?php echo form_open("user/login", 'class="form-signin"');?>

				<?php if (isset($message)): ?>
					<div id="infoMessage" class="alert alert-warning"><?php echo $message;?></div>
				<?php endif; ?>

				<div class="form-group has-feedback">
					<input name="identity" type="text" class="form-control" placeholder="Username"/>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
					<?php echo form_error('identity'); ?>
				</div>
				<div class="form-group has-feedback">
					<input name="password" type="password" class="form-control" placeholder="Password"/>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					<?php echo form_error('password'); ?>
				</div>
				<div class="row">
					<div class="col-xs-8 text-left">		
						<div class="checkbox">
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

				<a href="forgot_password">I forgot my password</a> <br />
				<a href="facebook_login?return=<?php echo site_url(); ?>">Sign in through Facebook</a>
			</form>		

		</div>
	</div>
</div>