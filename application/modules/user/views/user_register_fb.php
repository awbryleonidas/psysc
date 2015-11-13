<div class="container">
	<div class="register-box">
		<h2 class="form-signin-heading text-center">Register through Facebook</h2>
		<div class="register-box-body">

			<?php echo form_open("user/register_fb", 'class="form-horizontal form-register"');?>

				<?php if (isset($message)): ?>
					<div id="infoMessage" class="alert alert-danger"><?php echo $message;?></div>
				<?php endif; ?>

				<div class="form-group top-margin4">
					<div class="col-sm-12 text-center">
						<?php echo form_checkbox('terms', 1, set_checkbox('terms'), 'id="terms"'); ?> I agree to the <a href="<?php echo site_url('page/terms'); ?>" data-toggle="modal" data-target="#modal">Terms and Conditions</a>
						<?php echo form_error('terms'); ?>
					</div>
				</div>

				<div class="form-group top-margin4">
					<div class="col-sm-6 col-sm-offset-3 text-center">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Register through Facebook</button>
					</div>
				</div>

				<?php echo form_hidden('submit', 1); ?>
			</form>		

		</div>
	</div>
</div>