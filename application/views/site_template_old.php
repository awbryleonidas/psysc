<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PSYSC</title>

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
	<link id="orginal" href="<?php echo site_url('assets')?>/css/themes/lynch-theme.css" rel="stylesheet">
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
<!-- BEGIN PRELOADER -->
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
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
					<!--<a class="navbar-brand" href="#">PSYC<span>.org</span></a>-->

					<!-- IMG BASED LOGO  -->
					<a class="navbar-brand" href="#"><img src="<?php echo site_url('assets')?>/img/logo.png" alt="logo" width="25%"></a>


				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul id="top-menu" class="nav navbar-nav navbar-right main_nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#clients">Events</a></li>
						<li><a href="#blog">News</a></li>
						<!--<li><a href="#gallery">Gallery</a></li>-->
						<li><a href="#contact">Contact Us</a></li>
						<!--<li><a href="#pricing">Join Us</a></li>-->
						<!--<li><a href="<?php /*echo site_url('index.php/site/sign_up')*/?>">Sign Up</a></li>-->
						<!--<li><a href="<?php /*echo site_url('index.php/site/login')*/?>">Login</a></li>-->
					</ul>
				</div>


				<!--/.nav-collapse -->
			</div>
		</nav>
	</div>
	<!-- END MENU -->

	<!-- BEGIN SLIDER AREA-->
	<div class="slider_area">
		<!-- BEGIN SLIDER-->
		<div id="slides">
			<ul class="slides-container">

				<!-- THE FIRST SLIDE-->
				<li>
					<!-- FIRST SLIDE OVERLAY -->
					<div class="slider_overlay"></div>
					<!-- FIRST SLIDE MAIN IMAGE -->
					<img src="<?php echo site_url('cms').'/'.$config['home_image_1']?>" alt="img">
					<!-- FIRST SLIDE CAPTION-->
					<div class="slider_caption">
						<h2><?php echo $config['home_text_1'] ;?></h2>
						<p><?php echo $config['home_caption_1'] ;?></p>
						<a href="#<?php echo $config['home_link_1'] ;?>" class="slider_btn"><?php echo $config['home_text_link_1'] ;?></a>
					</div>
				</li>

				<!-- THE SECOND SLIDE-->
				<li>
					<!-- SECOND SLIDE OVERLAY -->
					<div class="slider_overlay"></div>
					<!-- SECOND SLIDE MAIN IMAGE -->
					<img src="<?php echo site_url('cms').'/'.$config['home_image_2']?>" alt="img">
					<!-- SECOND SLIDE CAPTION-->
					<div class="slider_caption">
						<h2><?php echo $config['home_text_2'] ;?></h2>
						<p><?php echo $config['home_caption_2'] ;?></p>
						<a href="#<?php echo $config['home_link_2'] ;?>" class="slider_btn"><?php echo $config['home_text_link_2'] ;?></a>
					</div>
				</li>

				<!-- THE THIRD SLIDE-->
				<li>
					<!-- THIRD SLIDE OVERLAY -->
					<div class="slider_overlay"></div>
					<!-- THIRD SLIDE MAIN IMAGE -->
					<img src="<?php echo site_url('cms').'/'.$config['home_image_3']?>" alt="img">
					<!-- THIRD SLIDE CAPTION-->
					<div class="slider_caption">
						<h2><?php echo $config['home_text_3'] ;?></h2>
						<p><?php echo $config['home_caption_3'] ;?></p>
						<a href="#<?php echo $config['home_link_3'] ;?>" class="slider_btn"><?php echo $config['home_text_link_3'] ;?></a>
					</div>
				</li>
			</ul>
			<!-- BEGIN SLIDER NAVIGATION -->
			<nav class="slides-navigation">
				<!-- PREV IN THE SLIDE -->
				<a class="prev" href="/item1">
					<span class="icon-wrap"></span>
					<h3><strong>Prev</strong></h3>
				</a>
				<!-- NEXT IN THE SLIDE -->
				<a class="next" href="/item3">
					<span class="icon-wrap"></span>
					<h3><strong>Next</strong></h3>
				</a>
			</nav>
		</div>
		<!-- END SLIDER-->
	</div>
	<!-- END SLIDER AREA -->
	<span class="hide"><center><a href="<?php echo site_url('index.php/site/sign_up')?>">Sign Up</a><a href="<?php echo site_url('index.php/site/login')?>">Login</a></center></span>
</header>
<!--=========== End HEADER SECTION ================-->


<!--=========== BEGIN ABOUT SECTION ================-->
<section id="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="about_area">
					<!-- START ABOUT HEADING -->
					<div class="heading">
						<h2 class="wow fadeInLeftBig">About Us</h2>
						<p><?php echo $config['about_us_caption'] ;?></p>
					</div>

					<!-- START ABOUT CONTENT -->
					<div class="about_content">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="about_featured">
									<div class="panel-group" id="accordion">
										<!-- START SINGLE FEATURED ITEAM #1-->
										<div class="panel panel-default wow fadeInLeft">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
														<span class="fa fa-check-square-o"></span><?php echo $config['about_us_panel_name_1'] ;?>
													</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													<?php echo $config['about_us_panel_text_1'] ;?>
												</div>
											</div>
										</div>
										<!-- START SINGLE FEATURED ITEAM #2 -->
										<div class="panel panel-default wow fadeInLeft">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
														<span class="fa fa-check-square-o"></span><?php echo $config['about_us_panel_name_2'] ;?>
													</a>
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse">
												<div class="panel-body">
													<?php echo $config['about_us_panel_text_2'] ;?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="about_slider">
									<!-- BEGIN FEATURED SLIDER -->
									<div class="featured_slider">
										<!-- SINGLE SLIDE IN THE SLIDER -->
										<div class="single_iteam">
											<a href="#"> <img src="<?php echo site_url('cms').'/'.$config['about_us_panel_image_1']?>" alt="img"></a>
										</div>
										<!-- SINGLE SLIDE IN THE SLIDER -->
										<div class="single_iteam">
											<a href="#"> <img src="<?php echo site_url('cms').'/'.$config['about_us_panel_image_2']?>" alt="img"></a>
										</div>
										<!-- SINGLE SLIDE IN THE SLIDER -->
										<div class="single_iteam">
											<a href="#"> <img src="<?php echo site_url('cms').'/'.$config['about_us_panel_image_3']?>" alt="img"></a>
										</div>
									</div>
									<!-- END FEATURED SLIDER -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- BEGIN SKILLS  -->
	<div class="row hide">
		<div class="col-lg-12 col-md-12">
			<div class="skills_area">
				<div class="slider_overlay"></div>
				<div class="container">
					<div class="skills">
						<div class="heading">
							<h3 class="wow fadeInDown">Our Members</h3>
						</div>
						<!-- START SINGLE SKILL-->
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="single_skill wow fadeInUp">
								<div id="myStat" data-dimension="150" data-text="85%" data-info="" data-width="10" data-fontsize="25" data-percent="85" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
								<h4>Students</h4>
							</div>
						</div>
						<!-- START SINGLE SKILL-->
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="single_skill wow fadeInUp">
								<div id="myStathalf2" data-dimension="150" data-text="90%" data-info="" data-width="10" data-fontsize="25" data-percent="90" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
								<h4>Teachers</h4>
							</div>
						</div>
						<!-- START SINGLE SKILL-->
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="single_skill wow fadeInUp">
								<div id="myStat2" data-dimension="150" data-text="65%" data-info="" data-width="10" data-fontsize="25" data-percent="65" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
								<h4>Schools</h4>
							</div>
						</div>
						<!-- START SINGLE SKILL-->
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="single_skill wow fadeInUp">
								<div id="myStat3" data-dimension="150" data-text="75%" data-info="" data-width="10" data-fontsize="25" data-percent="75" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
								<h4>Region</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END SKILLS  -->
</section>
<!--=========== END ABOUT SECTION ================-->

<!--=========== BEGIN TEAM SECTION ================-->
<section id="team">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<!-- START BLOG HEADING -->
				<div class="heading">
					<h2 class="wow fadeInLeftBig">Board of Trustees</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="clients_content">
					<div class="row">
						<!-- BEGIN CLIENTS SLIDER -->
						<div class="clients_slider">
							<!-- BEGIN SINGLE -->
							<?php foreach ($bots as $bot):?>
								<div class="col-lg-3 col-md-3 col-sm-3">
									<div class="single_client">
										<img src="<?php echo site_url('cms').'/'.$bot->team_panel_image?>" width="50%" alt="clients Brand">
										<h4><?php echo $bot->team_panel_name?></h4>
										<h6><?php echo $bot->team_panel_position?></h6>
										<p>
											<?php echo $bot->team_panel_description?>
										</p>
									</div>
								</div>
							<?php endforeach;?>
						</div>
						<!-- END SINGLE -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<!-- BEGIN ABOUT HEADING -->
				<div class="heading">
					<h2 class="wow fadeInLeftBig">Our Team</h2>
				</div>
				<div class="team_area">
					<!-- BEGIN TEAM SLIDER -->
					<div class="team_slider">
						<!-- BEGIN SINGLE TEAM SLIDE#1 -->
						<?php foreach ($necs as $nec):?>
						<div class="col-lg-3 col-md-3 col-sm-4">
							<div class="single_team wow fadeInUp">
								<div class="team_img">
									<img src="<?php echo site_url('cms').'/'.$nec->team_panel_image?>" width="50%" alt="img">
								</div>
								<h5 class=""><?php echo $nec->team_panel_name?></h5>
								<span><?php echo $nec->team_panel_position?></span>
								<p>
									<?php echo $nec->team_panel_description?>
								</p>
								<div class="team_social">
									<a href="<?php echo $nec->team_panel_facebook?>"><i class="fa fa-facebook"></i></a>
									<a href="<?php echo $nec->team_panel_twitter?>"><i class="fa fa-twitter"></i></a>
									<!--<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>-->
								</div>
							</div>
						</div>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--=========== END TEAM SECTION ================-->

<!--=========== BEGIN SERVICE SECTION ================-->
<section id="service" class="hide">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<!-- BEGIN SERVICE HEADING -->
				<div class="heading">
					<h2 class="wow fadeInLeftBig">Our Services</h2>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<!-- BEGIN SERVICE  -->
				<div class="service_area">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<!-- BEGIN SINGLE SERVICE -->
							<div class="single_service wow fadeInLeft">
								<div class="service_iconarea">
									<span class="fa fa-line-chart service_icon"></span>
								</div>
								<h3 class="service_title">Planning & Strategy</h3>
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<!-- BEGIN SINGLE SERVICE -->
							<div class="single_service wow fadeInRight">
								<div class="service_iconarea">
									<span class="fa fa-suitcase service_icon"></span>
								</div>
								<h3 class="service_title">Corporate Branding</h3>
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<!-- BEGIN SINGLE SERVICE -->
							<div class="single_service wow fadeInLeft">
								<div class="service_iconarea">
									<span class="fa fa-eraser service_icon"></span>
								</div>
								<h3 class="service_title">Web Desing & Development</h3>
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<!-- BEGIN SINGLE SERVICE -->
							<div class="single_service wow fadeInRight">
								<div class="service_iconarea">
									<span class="fa fa-paper-plane service_icon"></span>
								</div>
								<h3 class="service_title">SEO,SMM and Internet marketing</h3>
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<!-- BEGIN SINGLE SERVICE -->
							<div class="single_service wow fadeInLeft">
								<div class="service_iconarea">
									<span class="fa fa-envelope-o service_icon"></span>
								</div>
								<h3 class="service_title">Email Marketing</h3>
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<!-- BEGIN SINGLE SERVICE -->
							<div class="single_service wow fadeInRight">
								<div class="service_iconarea">
									<span class="fa fa-support service_icon"></span>
								</div>
								<h3 class="service_title">Premium Customer SUpport</h3>
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--=========== END SERVICE SECTION ================-->

<!--=========== BEGIN CLIENTS SECTION ================-->
<section id="clients">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<!-- START BLOG HEADING -->
				<div class="heading">
					<h2 class="wow fadeInLeftBig">Events</h2>
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12">
				<!-- BEGIN TESTIMONIAL SLIDER -->
				<ul class="testimonial_slider">
					<!-- BEGIN SINGLE TESTIMONIAL SLIDE#1 -->
					<li>
						<div class="media testi_media">
							<a class="media-center testi_img" href="#">
								<img src="<?php echo site_url('cms/'.$events['featured_event_image_1'])?>" width="80%" alt="img">
							</a>
						</div><br><br>
						<h4 class="media-heading text-center"><?php echo $events['featured_event_title']?>1</h4>
						<div class="text-center">
							<p><?php echo $events['featured_event_description']?></p>
						</div>
					</li>
					<!-- BEGIN SINGLE TESTIMONIAL SLIDE#2 -->
					<li>
						<div class="media testi_media">
							<a class="media-center testi_img" href="#">
								<img src="<?php echo site_url('cms/'.$events['featured_event_image_2'])?>" width="80%" alt="img">
							</a>
						</div><br><br>
						<h4 class="media-heading text-center"><?php echo $events['featured_event_title']?>2</h4>
						<div class="text-center">
							<p><?php echo $events['featured_event_description']?></p>
						</div>
					</li>
					<!-- BEGIN SINGLE TESTIMONIAL SLIDE#3 -->
					<li>
						<div class="media testi_media">
							<a class="media-center testi_img" href="#">
								<img src="<?php echo site_url('cms/'.$events['featured_event_image_3'])?>" width="80%" alt="img">
							</a>
						</div><br><br>
						<h4 class="media-heading text-center"><?php echo $events['featured_event_title']?>3</h4>
						<div class="text-center">
							<p><?php echo $events['featured_event_description']?></p>
						</div>
					</li>
				</ul>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="clients_content">
					<span class="text-center"><small></small></span>
					<div class="row">
						<!-- BEGIN CLIENTS SLIDER -->
						<div class="clients_slider">
							<!-- BEGIN SINGLE CLIENT SLIDE#1 -->
							<div class="col-lg-2 col-md-2 col-sm-2">
								<div class="single_client">
									<a class="image_event" href="events_view/1"><img src="<?php echo site_url('cms/'.$events['event_highlight_image_1'])?>" width="100%" alt="<?php echo $events['event_name_1']?>"></a>
									<div class="text-content"><small>Click images for more info</small></div>
								</div>
							</div>
							<!-- BEGIN SINGLE CLIENT SLIDE#2 -->
							<div class="col-lg-2 col-md-2 col-sm-2">
								<div class="single_client">
									<a class="image_event" href="events_view/2"><img src="<?php echo site_url('cms/'.$events['event_highlight_image_2'])?>" width="100%" alt="<?php echo $events['event_name_2']?>"></a>
									<div class="text-content"><small>Click images for more info</small></div>
								</div>
							</div>
							<!-- BEGIN SINGLE CLIENT SLIDE#3 -->
							<div class="col-lg-2 col-md-2 col-sm-2">
								<div class="single_client">
									<a class="image_event" href="events_view/3"><img src="<?php echo site_url('cms/'.$events['event_highlight_image_3'])?>" width="100%" alt="<?php echo $events['event_name_3']?>"></a>
									<div class="text-content"><small>Click images for more info</small></div>
								</div>
							</div>
							<!-- BEGIN SINGLE CLIENT SLIDE#4 -->
							<div class="col-lg-2 col-md-2 col-sm-2">
								<div class="single_client">
									<a class="image_event" href="events_view/4"><img src="<?php echo site_url('cms/'.$events['event_highlight_image_4'])?>" width="100%" alt="<?php echo $events['event_name_4']?>"></a>
									<div class="text-content"><small>Click images for more info</small></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--=========== END CLIENTS SECTION ================-->

<!--=========== BEGIN GALLERY SECTION ================-->
<section id="gallery" class="hide">
	<!-- BEGIN GALLERY SECTION -->
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="counter_section">
				<!-- SKILLS COUNTER OVERLAY -->
				<div class="slider_overlay"></div>
				<div class="container">
					<div class="counter_area">
						<div class="heading">
							<h3 class="wow fadeInLeft">Some Milestone Works</h3>
						</div>
						<!-- START SINGLE COUNTER-->
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="counter wow fadeInUp">
								<i class="fa fa-users fa-2x"></i>
								<h2 class="timer count-title" id="count-number" data-to="940" data-speed="1500">400</h2>
								<p class="count-text ">Clients</p>
							</div>
						</div>
						<!-- START SINGLE COUNTER-->
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="counter wow fadeInUp">
								<i class="fa fa-tasks fa-2x"></i>
								<h2 class="timer count-title" id="count-number2" data-to="1750" data-speed="1500">300</h2>
								<p class="count-text ">Projects</p>
							</div>
						</div>
						<!-- START SINGLE COUNTER-->
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="counter wow fadeInUp">
								<i class="fa fa-coffee fa-2x"></i>
								<h2 class="timer count-title" id="count-number3" data-to="300" data-speed="1500">200</h2>
								<p class="count-text ">Cup Of Coffee</p>
							</div>
						</div>
						<!-- START SINGLE COUNTER-->
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="counter wow fadeInUp">
								<i class="fa fa-bullhorn fa-2x"></i>
								<h2 class="timer count-title" id="count-number4" data-to="875" data-speed="1500">100</h2>
								<p class="count-text ">Subscribers</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END MILESTONE WORSK SECTION -->

	<!-- BEGIN GALLERY SECTION -->
	<div class="row">
		<div class="portfolio_area">
			<!-- BEGIN PORTFOLIO HEADER -->
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="container">
						<div class="heading">
							<h2 class="wow fadeInLeftBig">Gallery</h2>
							<p>Praesent molestie convallis convallis. Etiam venenatis odio quis euismod aliquet. Curabitur accumsan dui ante, quis rutrum neque sodales sit amet. Etiam consectetur posuere nibh, posuere congue felis lobortis sit amet. Pellentesque facilisis sed turpis nec volutpat. Morbi tempor nunc ut odio mattis auctor.</p>
						</div>
					</div>
				</div>
			</div>
			<!-- END GALLERY HEADER -->

			<!-- BEGIN GALLERY GALLERY -->
			<div class="row">
				<div class="portfolio_gallery">
					<div id="elastic_grid_demo"></div>
				</div>
			</div>
			<!-- END GALLERY GALLERY -->
		</div>
	</div>
	<!-- END PORTFOLIO GALLERY SECTION -->
</section>
<!--=========== END GALLERY SECTION ================-->


<!--=========== BEGIN PRICING SECTION ================-->
<section id="pricing" class="hide">
	<div class="container">
		<div class="row col-lg-12 col-md-12">
			<!-- START ABOUT HEADING -->
			<div class="heading">
				<h2 class="wow fadeInLeftBig">Our Pricing</h2>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
			</div>
		</div>
		<div class="row col-lg-12 col-md-12">
			<div class="pricing_area">
				<div class="row">
					<!-- BEGIN BASIC PRICE TABLE -->
					<div class="col-lg-3 col-md-3 col-sm-3">
						<div class="single_price wow fadeInUp">
							<h3>Basic</h3>
							<div class="price">
								<h4>25</h4>
								<span>per month</span>
							</div>
							<ul class="price_features">
								<li>Responsive <strong>Layout</strong></li>
								<li><strong>Customizable</strong> Feature</li>
								<li>Up to <strong>5 Projects</strong></li>
								<li><strong>10 GB</strong> Storage</li>
								<li>Up to <strong>100 Users</strong></li>
								<li><strong>15 GB</strong> Bandwidth</li>
								<li><strong>Security Suite</strong></li>
							</ul>
							<a href="#" class="price_btn">Select Plan</a>
						</div>
					</div>
					<!-- BEGIN STANDARD PRICE TABLE -->
					<div class="col-lg-3 col-md-3 col-sm-3">
						<div class="single_price wow fadeInUp">
							<h3>Standard</h3>
							<div class="price">
								<h4>50</h4>
								<span>per month</span>
							</div>
							<ul class="price_features">
								<li>Responsive <strong>Layout</strong></li>
								<li><strong>Customizable</strong> Feature</li>
								<li>Up to <strong>15 Projects</strong></li>
								<li><strong>20 GB</strong> Storage</li>
								<li>Up to <strong>100 Users</strong></li>
								<li><strong>35 GB</strong> Bandwidth</li>
								<li><strong>Security Suite</strong></li>
							</ul>
							<a href="#" class="price_btn">Select Plan</a>
						</div>
					</div>
					<!-- BEGIN BUSINESS PRICE TABLE -->
					<div class="col-lg-3 col-md-3 col-sm-3">
						<div class="single_price business_price wow fadeInUp">
							<h3>Business</h3>
							<div class="price">
								<h4>125</h4>
								<span>per month</span>
							</div>
							<ul class="price_features">
								<li>Responsive <strong>Layout</strong></li>
								<li><strong>Customizable</strong> Feature</li>
								<li><strong>Unlimited Projects</strong></li>
								<li><strong>75 GB</strong> Storage</li>
								<li>Up to <strong>100 Users</strong></li>
								<li><strong>150 GB</strong> Bandwidth</li>
								<li><strong>Security Suite</strong></li>
							</ul>
							<a href="#" class="price_btn">Select Plan</a>
						</div>
					</div>
					<!-- BEGIN DELUX PRICE TABLE -->
					<div class="col-lg-3 col-md-3 col-sm-3">
						<div class="single_price wow fadeInUp">
							<h3>Delux</h3>
							<div class="price">
								<h4>250</h4>
								<span>per month</span>
							</div>
							<ul class="price_features">
								<li>Responsive <strong>Layout</strong></li>
								<li><strong>Customizable</strong> Feature</li>
								<li><strong>Unlimited Projects</strong></li>
								<li><strong>175 GB</strong> Storage</li>
								<li>Up to <strong>100 Users</strong></li>
								<li><strong>750 GB</strong> Bandwidth</li>
								<li><strong>Security Suite</strong></li>
							</ul>
							<a href="#" class="price_btn">Select Plan</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--=========== END PRICING SECTION ================-->


<!--=========== BEGIN BLOG SECTION ================-->
<section id="blog">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<!-- START BLOG HEADING -->
				<div class="heading">
					<h2 class="wow fadeInLeftBig">Latest News From Blog</h2>
					<p></p>
				</div>
			</div>
			<div class="col-lg-12 col-md-12">
				<!-- BEGIN BLOG CONTENT -->
				<div class="blog_content">

					<!-- BEGIN BLOG SLIDER -->
					<div class="blog_slider">
						<!-- BEGIN SINGLE BLOG -->
						<?php foreach($news as $item):?>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<div class="single_post wow fadeInUp">
								<div class="blog_img">
									<img src="<?php echo site_url('cms/'.$item->news_panel_image)?>" alt="img">
								</div>
								<h3><?php echo $item->news_panel_header?></h3>
								<div class="post_commentbox">
									<a href="#"><i class="fa fa-user"></i><?php echo $item->news_panel_author?></a>
									<span><i class="fa fa-calendar"></i><?php echo $item->news_panel_created_on?>/span>
									<!--<a href="#"><i class="fa fa-tags"></i>Technology</a>-->
								</div>
								<p><?php echo $item->news_panel_caption?></p>
								<a href="<?php echo $item->news_panel_link?>" class="read_more">Read More <i class="fa fa-angle-double-right"> </i></a>
							</div>
						</div>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--=========== END BLOG SECTION ================-->


<!--=========== BEGIN TESTIMONIAL SECTION ================-->
<section id="testimonial" class="hide">
	<div class="container">
		<div class="row">
			<div class=" col-lg-7 col-md-7 col-sm-6">
				<!-- START BLOG HEADING -->
				<div class="heading">
					<h2 class="wow fadeInLeftBig">Satisfied Customers</h2>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
				</div>
			</div>
			<div class=" col-lg-5 col-md-5 col-sm-6">
				<div class="testimonial_customer">
					<!-- BEGIN TESTIMONIAL SLIDER -->
					<ul class="testimonial_slider">
						<!-- BEGIN SINGLE TESTIMONIAL SLIDE#1 -->
						<li>
							<div class="media testi_media">
								<a class="media-left testi_img" href="#">
									<img src="img/team-1.jpg" alt="img">
								</a>
								<div class="media-body">
									<h4 class="media-heading">Alin Brown</h4>
									<span>CEO</span>
								</div>
							</div>
							<div class="testi_content">
								<p>Message of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
							</div>
						</li>
						<!-- BEGIN SINGLE TESTIMONIAL SLIDE#2 -->
						<li>
							<div class="media testi_media">
								<a class="media-left testi_img" href="#">
									<img src="<?php echo site_url('assets')?>/img/team-2.jpg" alt="img">
								</a>
								<div class="media-body">
									<h4 class="media-heading">Jon Smith</h4>
									<span>CEO</span>
								</div>
							</div>
							<div class="testi_content">
								<p>Message of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
							</div>
						</li>
						<!-- BEGIN SINGLE TESTIMONIAL SLIDE#3 -->
						<li>
							<div class="media testi_media">
								<a class="media-left testi_img" href="#">
									<img src="<?php echo site_url('assets')?>/img/team-4.jpg" alt="img">
								</a>
								<div class="media-body">
									<h4 class="media-heading">Jon Doe</h4>
									<span>Manager</span>
								</div>
							</div>
							<div class="testi_content">
								<p>Message of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!--=========== END TESTIMONIAL SECTION ================-->


<!--=========== BEGIN CONTACT SECTION ================-->
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<!-- START CONTACT HEADING -->
				<div class="heading">
					<h2 class="wow fadeInLeftBig">Contact Us</h2>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- BEGIN CONTACT CONTENT -->
			<div class="contact_content">
				<!-- BEGIN CONTACT FORM -->
				<div class="col-lg-5 col-md-5 col-sm-5">
					<div class="contact_form">

						<!-- FOR CONTACT FORM MESSAGE -->
						<div id="form-messages"></div>

						<form>
							<input class="form-control" type="text" placeholder="Name">
							<input class="form-control" type="email" placeholder="Email">
							<input class="form-control" type="text" placeholder="Subject">
							<textarea class="form-control" cols="30" rows="10" placeholder="Your Message"></textarea>
							<input class="submit_btn" type="submit" value="Send">
						</form>
					</div>
				</div>
				<!-- BEGIN CONTACT MAP -->
				<div class="col-lg-7 col-md-7 col-sm-7">
					<div class="contact_map">
						<!-- BEGIN GOOGLE MAP -->
						<div id="map_canvas"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--=========== END CONTACT SECTION ================-->

<!--=========== BEGIN CONTACT FEATURE SECTION ================-->
<section id="contactFeature">
	<!-- SKILLS COUNTER OVERLAY -->
	<div class="slider_overlay"></div>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="container">
				<div class="contact_feature">
					<!-- BEGIN CALL US FEATURE -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="single_contact_feaured wow fadeInUp">
							<i class="fa fa-phone"></i>
							<h4>Call Us</h4>
							<p>1-265-596-580</p>
						</div>
					</div>
					<!-- BEGIN CALL US FEATURE -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="single_contact_feaured wow fadeInUp">
							<i class="fa fa-envelope-o"></i>
							<h4>Email Address</h4>
							<p>sample@gmail.com</p>
						</div>
					</div>
					<!-- BEGIN CALL US FEATURE -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="single_contact_feaured wow fadeInUp">
							<i class="fa fa-map-marker"></i>
							<h4>Office Location</h4>
							<p>Your Company Office Location</p>
						</div>
					</div>
					<!-- BEGIN CALL US FEATURE -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="single_contact_feaured wow fadeInUp">
							<i class="fa fa-clock-o"></i>
							<h4>Working Hours</h4>
							<p>Monday-Friday 9.00-21.00</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--=========== END CONTACT FEATURE SECTION ================-->

<!--=========== BEGIN SUBSCRIBE SECTION ================-->
<section id="subscribe">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<!-- START SUBSCRIBE HEADING -->
				<div class="heading">
					<h2 class="wow fadeInLeftBig">Subscribe Us</h2>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
				</div>
				<!-- BEGIN SUBSCRIVE FORM -->
				<form class="subscribe_form">
					<div class="subscrive_group wow fadeInUp">
						<input class="form-control subscribe_mail" type="email" placeholder="Enter your email address">
						<input class="subscr_btn" type="submit" value="Subscribe">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!--=========== END SUBSCRIBE SECTION ================-->

<!--=========== BEGIN FOOTER ================-->
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="footer_left">
					<!--=========== Copyright ================-->
					<p>© PSYSC, 2015</p>
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