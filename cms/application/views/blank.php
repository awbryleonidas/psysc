<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Log in</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- Bootstrap 3.3.4 -->
	<link href="<?php echo assets_url('plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link href="<?php echo assets_url('themes/adminlte/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
	<!-- iCheck -->
	<link href="<?php echo assets_url('plugins/iCheck/square/blue.css'); ?>" rel="stylesheet" type="text/css" />

	<link href="<?php echo assets_url('plugins/alertifyjs/css/alertify.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo assets_url('plugins/alertifyjs/css/themes/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="icon" href="<?php echo assets_url('images/ci.png'); ?>">
</head>
<body class="login-page">

	<?php echo $content; ?>

	<!-- jQuery 2.1.4 -->
	<script src="<?php echo assets_url('plugins/jquery/jquery-2.1.4.min.js'); ?>"></script>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="<?php echo assets_url('plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
	<!-- iCheck -->
	<script src="<?php echo assets_url('plugins/iCheck/icheck.min.js'); ?>" type="text/javascript"></script>
	<script>
	  $(function () {
		$('input').iCheck({
		  checkboxClass: 'icheckbox_square-blue',
		  radioClass: 'iradio_square-blue',
		  increaseArea: '20%' // optional
		});
	  });
	</script>
	<script src="<?php echo assets_url('plugins/alertifyjs/alertify.min.js'); ?>" type="text/javascript"></script>

	<?php if (isset($error_message)): ?>
		<script>alertify.error("<?php echo $error_message; ?>");</script>
	<?php endif; ?>

	<?php if (isset($message)): ?>
		<script>alertify.success("<?php echo $message; ?>");</script>
	<?php endif; ?>

	<?php if (NULL != $this->session->flashdata('flash_message')): ?>
		<script>alertify.success("<?php echo $this->session->flashdata('flash_message'); ?>");</script>
	<?php endif; ?>

	<?php if (NULL != $this->session->flashdata('flash_error')): ?>
		<script>alertify.error("<?php echo $this->session->flashdata('flash_error'); ?>");</script>
	<?php endif; ?>

</body>
</html>