<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PSYSC : <?php echo $title?></title>

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/png" href="<?php echo site_url('assets')?>/img/favicon.png"/>

	<!-- CSS
	================================================== -->
	<!-- Bootstrap css file-->
	<link href="<?php echo site_url('assets')?>/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font awesome css file-->
	<link href="<?php echo site_url('assets')?>/css/font-awesome.min.css" rel="stylesheet">
	<!-- Superslide css file-->
	<link rel="stylesheet" href="<?php echo site_url('assets')?>/css/superslides.css">
	<!-- Slick slider css file -->
	<link href="<?php echo site_url('assets')?>/css/slick.css" rel="stylesheet">
	<!-- smooth animate css file -->
	<link rel="stylesheet" href="<?php echo site_url('assets')?>/css/animate.css">
	<!-- Elastic grid css file -->
	<link rel="stylesheet" href="<?php echo site_url('assets')?>/css/elastic_grid.css">
	<!-- Circle counter cdn css file -->
	<link rel='stylesheet prefetch' href='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'>
	<!-- Default Theme css file -->
	<link id="orginal" href="<?php echo site_url('assets')?>/css/themes/default-theme.css" rel="stylesheet">
	<!-- Main structure css file -->
	<link href="<?php echo site_url('assets')?>/style.css" rel="stylesheet">

	<!-- Google fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<!-- BEGAIN PRELOADER -->
<div id="preloader">
	<div id="status">&nbsp;</div>
</div>
<!-- END PRELOADER -->

<!-- SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<!-- END SCROLL TOP BUTTON -->

<!--=========== BEGIN BLOG BANNER SECTION ================-->
<section id="blogBanner">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<h2 style="color: #0068b9"><?php echo $title?></h2>
			</div>
		</div>
	</div>
</section>
<!--=========== END BLOG BANNER SECTION ================-->

<!--=========== BEGAIN BLOG SECTION ================-->
<section id="blog">
<div class="container">
<div class="row">
	<div class="text-center">
		<p><?php echo $message?></p>
		<p>Click <a href="index">here</a> to redirect.</p>
	</div>
</div>
</div>
</section>
<!--=========== END BLOG SECTION ================-->


<!--=========== BEGIN FOOTER ================-->
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="footer_left">
					<!--=========== Copyright ================-->
					<p>© <?php echo $config['application_name']?>, <?php echo date('Y')?></p>
					<!--=========== Copyright ================-->
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="footer_right">
					<ul class="social_nav">
						<li><a href="<?php echo $config['config_fb']?>"><i class="fa fa-facebook"></i></a></li>
						<li><a href="<?php echo $config['config_twitter']?>"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
<!--=========== END FOOTER ================-->

<!-- Javascript Files
 ================================================== -->

<!-- initialize jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Google map -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="<?php echo site_url('assets')?>/js/jquery.ui.map.js"></script>
<!-- For smooth animatin  -->
<script src="<?php echo site_url('assets')?>/js/wow.min.js"></script>
<!-- Bootstrap js -->
<script src="<?php echo site_url('assets')?>/js/bootstrap.min.js"></script>
<!-- superslides slider -->
<script src="<?php echo site_url('assets')?>/js/jquery.superslides.min.js" type="text/javascript"></script>
<!-- slick slider -->
<script src="<?php echo site_url('assets')?>/js/slick.min.js"></script>
<!-- for circle counter -->
<script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
<!-- for portfolio filter gallery -->
<script src="<?php echo site_url('assets')?>/js/modernizr.custom.js"></script>
<script src="<?php echo site_url('assets')?>/js/classie.js"></script>
<script src="<?php echo site_url('assets')?>/js/elastic_grid.min.js"></script>
<script src="<?php echo site_url('assets')?>/js/portfolio_slider.js"></script>

<!-- Custom js-->
<script src="<?php echo site_url('assets')?>/js/custom.js"></script>
</body>
</html>