<?php echo form_open(uri_string());?>

	<div class="box">

		<div class="box-body">

			<div class="row">

				<div class="col-md-6">

					<h3>User Info</h3>

					<p>
						<?php echo lang('edit_user_fname_label', 'first_name');?> <br />
						<?php echo form_input($first_name);?>
						<?php echo form_error('first_name'); ?>
					</p>

					<p>
						<?php echo lang('edit_user_lname_label', 'last_name');?> <br />
						<?php echo form_input($last_name);?>
						<?php echo form_error('last_name'); ?>
					</p>

					<p>
						<?php echo lang('edit_user_company_label', 'company');?> <br />
						<?php echo form_input($company);?>
						<?php echo form_error('company'); ?>
					</p>

					<p>
						<?php echo lang('edit_user_phone_label', 'phone');?> <br />
						<?php echo form_input($phone);?>
						<?php echo form_error('phone'); ?>
					</p>

					
				</div>

				<div class="col-md-6">

					<?php if ($this->ion_auth->is_admin()): ?>

						<h3><?php echo lang('edit_user_groups_heading');?></h3>
						<?php foreach ($groups as $group):?>
							<div class="checkbox">
								<?php
								$gID=$group['id'];
								$checked = null;
								$item = null;
								foreach($currentGroups as $grp) {
										if ($gID == $grp->id) {
												$checked= ' checked="checked"';
										break;
										}
								}
								?>
								<label>
									<input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
									<?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
								</label>
							</div>
						<?php endforeach?>

					<?php endif ?>

					<h3>Password</h3>
					<p>
						<?php echo lang('edit_user_password_label', 'password');?> <br />
						<?php echo form_input($password);?>
						<?php echo form_error('password'); ?>
					</p>

					<p>
						<?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
						<?php echo form_input($password_confirm);?>
						<?php echo form_error('password_confirm'); ?>
					</p>

				</div>

			</div>

			<?php echo form_hidden('id', $user->id);?>
			<?php echo form_hidden($csrf); ?>
	
		</div><!-- /.box-body -->

		<div class="box-footer">
			<?php echo form_submit('submit', lang('edit_user_submit_btn'), 'class="btn btn-primary"');?>
		</div><!-- /.box-footer-->

	</div><!-- /.box -->

<?php echo form_close();?>