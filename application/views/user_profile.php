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

<!--=========== BEGIN HEADER SECTION ================-->
<header id="header">
	<!-- BEGIN MENU -->
	<div class="menu_area">
		<nav class="navbar navbar-default navbar-fixed-top blog_menu" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<!-- LOGO -->

					<!-- TEXT BASED LOGO -->
					<a class="navbar-brand hide" href="index.html">PSYSC<span>org</span></a>

					<!-- IMG BASED LOGO  -->
					<a class="navbar-brand" href="#"><img src="<?php echo site_url('assets')?>/img/logo.png" alt="logo" width="25%"></a>


				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right main_nav">
						<li><a href="<?php echo site_url()?>">Home</a></li>
						<li class=""><a href="blog-archive.html">Logout</a></li>
						<li class="active"><a href="blog-archive.html">Blog</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
	</div>
	<!-- END MENU -->

</header>
<!--=========== End HEADER SECTION ================-->

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
<div class="col-lg-8 col-md-8 col-sm-12">
	<!-- BEGAIN BLOG CONTENT -->
	<div class="blogdetails_content">
		<h2>Hi, Aubrey!</h2>
		<div class="post_commentbox hide">
			<a href="#"><i class="fa fa-user"></i>cleonidas</a>
			<span><i class="fa fa-calendar"></i>6:49 AM</span>
			<a href="#"><i class="fa fa-tags"></i>Technology</a>
		</div>
		<br>

		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Aubrey leonidas</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo asset_url('images/unknown.jpg')?>" style="width: 100%" class="img-circle"> </div>

					<div class=" col-md-9 col-lg-9 ">
						<table class="table table-user-information">
							<tbody>
							<tr>
								<td>School/University:</td>
								<td>GMA Network</td>
							</tr>
							<tr>
								<td>Joined date:</td>
								<td>06/23/2013</td>
							</tr>
							<tr>
								<td>Date of Birth</td>
								<td>01/24/1988</td>
							</tr>

							<tr>
							<tr>
								<td>Gender</td>
								<td>Female</td>
							</tr>
							<tr>
								<td>Home Address</td>
								<td>Metro Manila,Philippines</td>
							</tr>
							<tr>
								<td>Email</td>
								<td><a href="mailto:che.leonidas@gmail.com">che.leonidas@gmail.com</a></td>
							</tr>
							<td>Phone Number</td>
							<td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
							</td>

							</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

			<div class="hide">
			<img class="img-center" src="<?php echo site_url('assets')?>/img/news.jpg" alt="img">
			<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
			<blockquote>
				But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes
			</blockquote>
			<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
			<ul>
				<li>The second largest social network in existence</li>
				<li>The second largest social network in existence</li>
				<li>The awesome thing about setting your page</li>
				<li>The second largest social network in existence</li>
				<li>The awesome thing about setting your page</li>
			</ul>
			<h1>This is H1 Tag</h1>
			<h2>This is H2 Tag</h2>
			<h3>This is H3 Tag</h3>
			<h4>This is H4 Tag</h4>
			<h5>This is H5 Tag</h5>
			<h6>This is H6 Tag</h6>
			<button class="btn default-btn">Default</button>
			<button class="btn btn-red">Red Button</button>
			<button class="btn btn-yellow">Yellow Button</button>
			<button class="btn btn-green">Green Button</button>
			<button class="btn btn-black">Black Button</button>
			<button class="btn btn-orange">Orange Button</button>
			<button class="btn btn-blue">Blue Button</button>
			<button class="btn btn-lime">Lime Button</button>
		</div>
		<!-- Start social share -->
		<div class="social_link">
			<ul class="sociallink_nav">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
			</ul>
		</div>
		<!-- End social share -->
	</div>
	<!-- Start single blog navigation -->
	<div class="post_navigation hide">
		<a href="#" class="previous_nav wow fadeInLeft"><i class="fa fa-hand-o-left"></i>Previous Post</a>
		<a href="#" class="next_nav wow fadeInRight">Next Post <i class="fa fa-hand-o-right"></i></a>
	</div>
	<!-- End single blog navigation -->

	<!-- Start similar post -->
	<div class="similar_post">
		<h2>Latest News you may like <i class="fa fa-thumbs-o-up"></i></h2>
		<ul class="popular_tab">
			<li>
				<div class="media">
					<div class="media-left">
						<a href="#" class="news_img">
							<img alt="img" src="<?php echo site_url('assets')?>/img/news.jpg" class="media-object">
						</a>
					</div>
					<div class="media-body">
						<a href="#">Dummy text of the printing and typesetting industry</a>
						<span class="feed_date">27.02.15</span>
					</div>
				</div>
			</li>
			<li>
				<div class="media">
					<div class="media-left">
						<a href="#" class="news_img">
							<img alt="img" src="<?php echo site_url('assets')?>/img/news.jpg" class="media-object">
						</a>
					</div>
					<div class="media-body">
						<a href="#">Dummy text of the printing and typesetting industry</a>
						<span class="feed_date">28.02.15</span>
					</div>
				</div>
			</li>
			<li>
				<div class="media">
					<div class="media-left">
						<a href="#" class="news_img">
							<img alt="img" src="<?php echo site_url('assets')?>/img/news.jpg" class="media-object">
						</a>
					</div>
					<div class="media-body">
						<a href="#">Dummy text of the printing and typesetting industry</a>
						<span class="feed_date">28.02.15</span>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<!-- End similar post -->
</div>
<div class="col-lg-4 col-md-4 col-sm-12">
	<!-- Start blog sidebar -->
	<div class="blog_sidebar">
		<!-- Start single sidebar -->
		<div class="single_blogsidebar">
			<h2>Downloadables</h2>
			<ul>
				<li>The second largest social network in existence</li>
				<li>The second largest social network in existence</li>
				<li>The awesome thing about setting your page</li>
				<li>The second largest social network in existence</li>
				<li>The awesome thing about setting your page</li>
			</ul>
		</div>
		<!-- End single sidebar -->
		<!-- Start single sidebar -->
		<div class="single_blogsidebar">
			<h2>Printables</h2>
			<ul>
				<li>The second largest social network in existence</li>
				<li>The second largest social network in existence</li>
				<li>The awesome thing about setting your page</li>
				<li>The second largest social network in existence</li>
				<li>The awesome thing about setting your page</li>
			</ul>
		</div>
		<!-- End single sidebar -->
		<!-- Start single sidebar -->
		<div class="single_blogsidebar">
			<h2>Content</h2>
			<ul>
				<li>The second largest social network in existence</li>
				<li>The second largest social network in existence</li>
				<li>The awesome thing about setting your page</li>
				<li>The second largest social network in existence</li>
				<li>The awesome thing about setting your page</li>
			</ul>
		</div>
		<!-- End single sidebar -->
		<!-- Start single sidebar -->
		<div class="single_blogsidebar">
			<h2>Buttons</h2>
			<ul>
				<li>The second largest social network in existence</li>
				<li>The second largest social network in existence</li>
				<li>The awesome thing about setting your page</li>
				<li>The second largest social network in existence</li>
				<li>The awesome thing about setting your page</li>
			</ul>
		</div>
		<!-- End single sidebar -->
		<!-- Start single sidebar -->
		<div class="single_blogsidebar hide">
			<h2>Links</h2>
			<ul>
				<li><a href="#">Links 1</a></li>
				<li><a href="#">Links 2</a>
				<li><a href="#">Links 3</a></li>
				<li><a href="#">Links 4</a></li>
			</ul>
		</div>
		<!-- End single sidebar -->
	</div>
	<!-- End blog sidebar -->
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
					<p>© C.Leonidas, 2015</p>
					<!--=========== Copyright ================-->
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="footer_right">
					<ul class="social_nav">
						<li><a href="https://facebook.com/che.leonidas"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/achechecheche"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://plus.google.com/+aubreyleonidas"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="https://ph.linkedin.com/pub/aubrey-leonidas/b9/b16/b7a"><i class="fa fa-linkedin"></i></a></li>
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