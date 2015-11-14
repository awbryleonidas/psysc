<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$this->config->item('application_name')?> - Forgot Password</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo asset_url('css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset_url('css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><img src="<?php echo asset_url('img/milo logo.png'); ?>" alt="Logo" width="150" /></a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg"><?=lang('reset_password_instruction')?></p>
                
                <?php echo form_open(current_url());?>

                    <?php if (isset($error_message)): ?>
                        <div class="alert alert-danger"><?php echo $error_message; ?></div>
                    <?php endif; ?>
                    <?php if (isset($ion_auth_error_message)): ?>
                        <div class="alert alert-danger"><?php echo $ion_auth_error_message; ?></div>
                    <?php endif; ?>

                    <?php if (NULL != $this->session->flashdata('flash_error')): ?>
                        <div class="alert alert-danger"><?php echo $this->session->flashdata('flash_error'); ?></div>
                    <?php endif; ?>

                    <?php if (NULL != $this->session->flashdata('flash_message')): ?>
                        <div class="alert alert-info"><?php echo $this->session->flashdata('flash_message'); ?></div>
                    <?php endif; ?>
                    <?php if(!isset($ion_auth_error_message)):?>

                        <div class="form-group">
                            <?php $formdata = array('name'=>'new_password', 'value'=>set_value('new_password'),'maxlength'=> '20', 'class'=>'form-control', 'placeholder'=>lang('label_new_password')); ?>
                            <?php echo form_password($formdata);?>
                            <?php echo form_error('new_password'); ?>
                        </div>
                        <div class="form-group">
                            <?php $formdata = array('name'=>'new_password_confirm', 'value'=>set_value('new_password_confirm'),'maxlength'=> '20', 'class'=>'form-control', 'placeholder'=>lang('label_new_password2')); ?>
                            <?php echo form_password($formdata);?>
                            <?php echo form_error('new_password_confirm'); ?>
                        </div>

                        <button type="submit" class="btn bg-yellow btn-block"><?=lang('button_change_password')?></button>
                    <?php endif; ?>

                <br />
                <p class="text-center"><a href="<?php echo site_url('users/login'); ?>" class="forgot-password-link"><?=lang('forgot_password_login')?></a></p>

                    <?php echo form_hidden('submit', 1); ?>
                </form>


            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->

        <script src="<?php echo asset_url('plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
        <script src="<?php echo asset_url('js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
            $('input').bind('keypress', function (event) {
                var regex = new RegExp("^[ .a-zA-Z0-9\b\r\n]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            });
        </script>
    </body>
</html>