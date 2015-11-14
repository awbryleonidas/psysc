<?php // Adds X-Frame-Options to HTTP header, so that page can only be shown in an iframe of the same site.
header('X-Frame-Options: SAMEORIGIN'); // FF 3.6.9+ Chrome 4.1+ IE 8+ Safari 4+ Opera 10.5+
$user = $this->ion_auth->user()->row();
?><!DOCTYPE html>
<html>
<head> 
	<meta charset="UTF-8">
	<title><?php echo $this->config->item('cms_title'); ?> | <?php echo $page_heading; ?></title> 
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link href="<?php echo assets_url('plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo assets_url('plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo assets_url('themes/adminlte/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo assets_url('themes/adminlte/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo assets_url('plugins/alertifyjs/css/alertify.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo assets_url('plugins/alertifyjs/css/themes/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo assets_url('plugins/jquery-ui/jquery-ui.css'); ?>" rel="stylesheet" type="text/css" />

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
<body class="skin-black-light sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		
		<header class="main-header">
			<!-- Logo -->
			<a href="<?php echo site_url(); ?>" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><?php echo $this->config->item('cms_title'); ?></span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo site_url($user->photo); ?>" class="user-image" alt="User Image"/>
								<span class="hidden-xs"><?php echo $user->first_name; ?> <?php echo $user->last_name; ?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo site_url($user->photo); ?>" class="img-circle" alt="User Image" />
									<p>
										<?php echo $user->first_name; ?> <?php echo $user->last_name; ?>
										<small><?php echo $user->email; ?></small>
									</p>
								</li>
								<!-- Menu Body -->
								<li class="user-body">
									<a href="<?php echo site_url('users/password'); ?>" data-toggle="modal" data-target="#modal" class="btn btn-default btn-flat btn-block">Change Password</a>
									<a href="<?php echo site_url('users/profile'); ?>" data-toggle="modal" data-target="#modal" class="btn btn-default btn-flat btn-block">Change Profile</a>
									<a href="<?php echo site_url('users/photo'); ?>" class="btn btn-default btn-flat btn-block">Change Photo</a>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="text-center">
										<a href="<?php echo site_url('users/logout'); ?>" class="btn btn-default btn-flat btn-block">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
						<!-- Control Sidebar Toggle Button -->
						<li>
							<!--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Logo -->
				<br><div class="logo-img text-center"><img src="<?php echo base_url('assets/images/logo.png');?>" style="width: 90%" alt="Logo" /></div><br>
				<!-- Sidebar user panel -->
				<!--<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php /*echo site_url($user->photo); */?>" class="img-circle" alt="User Image" />
					</div>
					<div class="pull-left info">
						<p><?php /*echo $user->first_name; */?> <?php /*echo $user->last_name; */?></p>

						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>-->
				<!-- search form -->
				<form action="#" method="get" class="sidebar-form hide">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search..."/>
						<span class="input-group-btn">
							<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
				<!-- /.search form -->



				<?php echo $this->app_menu->show(); ?>


				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu hide">
					<li class="header">MAIN NAVIGATION</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
							<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-files-o"></i>
							<span>Layout Options</span>
							<span class="label label-primary pull-right">4</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
							<li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
							<li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
							<li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
						</ul>
					</li>
					<li>
						<a href="../widgets.html">
							<i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">Hot</small>
						</a>
					</li>						
					<li class="treeview">
						<a href="#">
							<i class="fa fa-pie-chart"></i>
							<span>Charts</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
							<li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
							<li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
							<li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
						</ul>
					</li>						
					<li class="treeview">
						<a href="#">
							<i class="fa fa-laptop"></i>
							<span>UI Elements</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
							<li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
							<li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
							<li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
							<li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
							<li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-edit"></i> <span>Forms</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
							<li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
							<li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-table"></i> <span>Tables</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
							<li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
						</ul>
					</li>
					<li>
						<a href="../calendar.html">
							<i class="fa fa-calendar"></i> <span>Calendar</span>
							<small class="label pull-right bg-red">3</small>
						</a>
					</li>
					<li>
						<a href="../mailbox/mailbox.html">
							<i class="fa fa-envelope"></i> <span>Mailbox</span>
							<small class="label pull-right bg-yellow">12</small>
						</a>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-folder"></i> <span>Examples</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
							<li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>
							<li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
							<li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
							<li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
							<li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
							<li><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
						</ul>
					</li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
				 	<?php echo $page_heading; ?>
					<small><?php echo $page_subhead; ?></small>
				</h1>
				<?php echo $this->breadcrumbs->show(); ?>
			</section>

			<!-- Main content -->
			<section class="content">
				<?php echo $content; ?>
			</section><!-- /.content -->
		</div><!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>C. L</b>eonidas
			</div>
			<strong>Copyright &copy; <?php echo date('Y'); ?> .</strong> All rights reserved.
		</footer>
		
		<!-- Control Sidebar -->			

		<!-- Add the sidebar's background. This div must be placed
				 immediately after the control sidebar -->
		<div class='control-sidebar-bg'></div>
	</div><!-- ./wrapper -->

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
						<img src="<?php echo assets_url('images/loading3.gif')?>" alt="Loading..." />
						<p>Loading...</p>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="modal" id="modal_large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
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
						<img src="<?php echo assets_url('images/loading3.gif')?>" alt="Loading..." />
						<p>Loading...</p>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="modal" id="modal_restricted" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only"><?php echo lang('button_close')?></span>
					</button>
					<h4 class="modal-title" id="myModalLabel"><?php echo lang('title_restricted')?></h4>
				</div>
				<div class="modal-body">
					<div class="text-center">
						<div id="message" class="callout callout-danger callout-dismissable">
							<?php echo lang('error_page_restricted')?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						<i class="fa fa-times"></i> <?php echo lang('button_close')?>
					</button>
				</div>
			</div>
		</div>
	</div>

	<script>site_url = '<?php echo site_url(); ?>';</script>

	<!-- jQuery 2.1.4 -->
	<script src="<?php echo assets_url('plugins/jquery/jquery-2.1.4.min.js'); ?>"></script>
	<!-- jquery-ui -->
	<script src="<?php echo assets_url('plugins/jquery-ui/jquery-ui.js'); ?>"></script>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="<?php echo assets_url('plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
	<!-- SlimScroll -->
	<script src="<?php echo assets_url('plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
	<!-- FastClick -->
	<script src="<?php echo assets_url('plugins/fastclick/fastclick.min.js'); ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo assets_url('themes/adminlte/js/app.min.js'); ?>" type="text/javascript"></script>
	
	<script src="<?php echo assets_url('plugins/alertifyjs/alertify.min.js'); ?>" type="text/javascript"></script>
	<!-- Dropzone -->
	<script src="<?php echo assets_url('plugins/dropzone/dropzone.js'); ?>" type="text/javascript"></script>

	<script src="<?php echo assets_url('scripts/scripts.js'); ?>" type="text/javascript"></script>

	<?php echo $_scripts; // loads additional js files ?>

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