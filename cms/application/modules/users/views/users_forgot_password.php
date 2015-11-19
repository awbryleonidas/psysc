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
                <p class="login-box-msg"><?=lang('forgot_password_instruction')?></p>
                
                <?php echo form_open(current_url());?>

                    <?php if (isset($error_message)): ?>
                        <div class="alert alert-danger"><?php echo $error_message; ?></div>
                    <?php endif; ?>

                    <?php if (NULL != $this->session->flashdata('flash_error')): ?>
                        <div class="alert alert-danger"><?php echo $this->session->flashdata('flash_error'); ?></div>
                    <?php endif; ?>

                    <?php if (NULL != $this->session->flashdata('flash_message')): ?>
                        <div class="alert alert-info"><?php echo $this->session->flashdata('flash_message'); ?></div>
                    <?php endif; ?>  

                    <div class="form-group">
                        <?php $formdata = array('name'=>'user_email', 'value'=>set_value('user_email'), 'class'=>'form-control', 'placeholder'=>lang('label_email')); ?>
                        <?php echo form_input($formdata);?>
                        <?php echo form_error('user_email'); ?>
                    </div>    

                    <button type="submit" class="btn bg-yellow btn-block"><?=lang('button_send_forgot_password')?></button>  

                    <br />
                    <p class="text-center"><a href="<?php echo site_url('users/login'); ?>" class="forgot-password-link"><?=lang('forgot_password_login')?></a></p>

                    <?php echo form_hidden('submit', 1); ?>
                </form>


            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->

        <script src="<?php echo asset_url('plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
        <script src="<?php echo asset_url('js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    </body>
</html>