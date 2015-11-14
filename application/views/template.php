<?php // Adds X-Frame-Options to HTTP header, so that page can only be shown in an iframe of the same site.
header('X-Frame-Options: SAMEORIGIN'); // FF 3.6.9+ Chrome 4.1+ IE 8+ Safari 4+ Opera 10.5+
$user = $this->ion_auth->user()->row();
?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Cigify | <?php echo $page_title; ?></title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link href="<?php echo assets_url('plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo assets_url('plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo assets_url('plugins/alertify/css/alertify-bootstrap-3.css'); ?>" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<?php echo $_styles; // loads additional css files ?>

	<!-- Custom CSS and overrides -->
	<link href="<?php echo assets_url('styles/styles.css'); ?>" rel="stylesheet" type="text/css" />

	<link rel="icon" href="<?php echo assets_url('images/favicon.png'); ?>">
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo site_url(); ?>">Cigify</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li<?php echo ($this->uri->uri_string() == '') ? ' class="active"' : ''; ?>><a href="<?php echo site_url(); ?>">Home</a></li>
					<li<?php echo ($this->uri->uri_string() == 'page/about') ? ' class="active"' : ''; ?>><a href="<?php echo site_url('page/about'); ?>">About</a></li>
					<li<?php echo ($this->uri->uri_string() == 'page/contact') ? ' class="active"' : ''; ?>><a href="<?php echo site_url('page/contact'); ?>">Contact</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sample Pages <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li<?php echo ($this->uri->uri_string() == 'page/carousel') ? ' class="active"' : ''; ?>><a href="<?php echo site_url('page/carousel'); ?>">Carousel</a></li>
							<li<?php echo ($this->uri->uri_string() == 'page/parallax') ? ' class="active"' : ''; ?>><a href="<?php echo site_url('page/parallax'); ?>">Parallax</a></li>
						</ul>
					</li>

				</ul>

				<ul class="nav navbar-nav navbar-right">
					<?php if ($this->ion_auth->logged_in()): ?>
						<li><a href="javascript:;">Hello, <?php echo $user->first_name; ?></a></li>
						<li<?php echo ($this->uri->uri_string() == 'account') ? ' class="active"' : ''; ?>><a href="<?php echo site_url('account'); ?>">Account</a></li>
						<li><a href="<?php echo site_url('user/logout'); ?>">Logout</a></li>
					<?php else: ?>
						<li<?php echo ($this->uri->uri_string() == 'user/register') ? ' class="active"' : ''; ?>><a href="<?php echo site_url('user/register'); ?>">Register</a></li>
						<li<?php echo ($this->uri->uri_string() == 'user/login') ? ' class="active"' : ''; ?>><a href="<?php echo site_url('user/login'); ?>">Login</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>

	<?php echo $content; ?>


	<footer class="footer">
		<div class="container">
			<p class="text-muted">Place footer content here.</p>
		</div>
	</footer>

	<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Loading...</h4>
				</div>
				<div class="modal-body">
					<div class="text-center">
						<img src="<?=assets_url('images/loading3.gif')?>" alt="Loading..." />
						<p>Loading...</p>
					</div>
				</div>

			</div>
		</div>
	</div>

	<script>site_url = '<?php echo site_url(); ?>';</script>


	<script src="<?php echo assets_url('plugins/jquery/jquery-2.1.4.min.js'); ?>"></script>
	<script src="<?php echo assets_url('plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo assets_url('plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo assets_url('plugins/fastclick/fastclick.min.js'); ?>"></script>
	<script src="<?php echo assets_url('plugins/alertify/js/alertify.js'); ?>" type="text/javascript"></script>

	<?php echo $_scripts; // loads additional js files ?>

	<?php if (isset($message)): ?>
		<script>alertify.success("<?php echo $message; ?>");</script>
	<?php endif; ?>

	<?php if (isset($error_message)): ?>
		<script>alertify.error("<?php echo $error_message; ?>");</script>
	<?php endif; ?>

	<?php if ($this->session->flashdata('flash_message')): ?>
		<script>alertify.success("<?php echo $this->session->flashdata('flash_message'); ?>");</script>
	<?php endif; ?>

	<?php if ($this->session->flashdata('flash_error')): ?>
		<script>alertify.error("<?php echo $this->session->flashdata('flash_error'); ?>");</script>
	<?php endif; ?>
</body>
</html>