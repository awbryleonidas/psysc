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
						<li><a href="#contact">Contact Us</a></li>
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
										<!-- START SINGLE FEATURED ITEAM #2 -->
										<div class="panel panel-default wow fadeInLeft">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
														<span class="fa fa-check-square-o"></span><?php echo $config['about_us_panel_name_3'] ;?>
													</a>
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse">
												<div class="panel-body">
													<?php echo $config['about_us_panel_text_3'] ;?>
												</div>
											</div>
										</div>
										<!-- START SINGLE FEATURED ITEAM #2 -->
										<div class="panel panel-default wow fadeInLeft">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
														<span class="fa fa-check-square-o"></span><?php echo $config['about_us_panel_name_4'] ;?>
													</a>
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse">
												<div class="panel-body">
													<?php echo $config['about_us_panel_text_4'] ;?>
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
						<a class="media-center testi_img" href="#">
							<img class="displayed" src="<?php echo site_url('cms/'.$events['featured_event_image_1'])?>" width="100%" alt="img">
						</a><br><br>
						<h4 class="media-heading text-center"><?php echo $events['featured_event_title_1']?>1</h4>
						<div class="text-center">
							<p><?php echo $events['featured_event_description_1']?></p>
						</div>
					</li>
					<!-- BEGIN SINGLE TESTIMONIAL SLIDE#2 -->
					<li>
						<a class="media-center testi_img" href="#">
							<img class="displayed" src="<?php echo site_url('cms/'.$events['featured_event_image_2'])?>" width="150%" alt="img">
						</a><br><br>
						<h4 class="media-heading text-center"><?php echo $events['featured_event_title_2']?>2</h4>
						<div class="text-center">
							<p><?php echo $events['featured_event_description_2']?></p>
						</div>
					</li>
					<!-- BEGIN SINGLE TESTIMONIAL SLIDE#3 -->
					<li>
						<a class="media-center testi_img" href="#">
							<img class="displayed" src="<?php echo site_url('cms/'.$events['featured_event_image_3'])?>" width="150%" alt="img">
						</a><br><br>
						<h4 class="media-heading text-center"><?php echo $events['featured_event_title_3']?>3</h4>
						<div class="text-center">
							<p><?php echo $events['featured_event_description_3']?></p>
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
									<span><i class="fa fa-calendar"></i><?php echo $item->news_panel_created_on?></span>
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

<!--=========== BEGIN CONTACT SECTION ================-->
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<!-- START CONTACT HEADING -->
				<div class="heading">
					<h2 class="wow fadeInLeftBig">Contact Us</h2>
					<p><?php echo $config['config_contact_text']?></p>
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

						<form action="save_feedback" method="post">
							<input class="form-control" type="text" placeholder="Name" name="feedback_name">
							<input class="form-control" type="email" placeholder="Email" name="feedback_email">
							<input class="form-control" type="text" placeholder="Subject" name="feedback_subject">
							<textarea class="form-control" cols="30" rows="10" placeholder="Your Message"  name="feedback_message"></textarea>
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
	<!--<div class="slider_overlay"></div>-->
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="container">
				<div class="contact_feature">
					<!-- BEGIN CALL US FEATURE -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="single_contact_feaured wow fadeInUp">
							<i class="fa fa-phone"></i>
							<h4>Call Us</h4>
							<p><?php echo $config['config_contact']?></p>
						</div>
					</div>
					<!-- BEGIN CALL US FEATURE -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="single_contact_feaured wow fadeInUp">
							<i class="fa fa-envelope-o"></i>
							<h4>Email Address</h4>
							<p><?php echo $config['config_email']?></p>
						</div>
					</div>
					<!-- BEGIN CALL US FEATURE -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="single_contact_feaured wow fadeInUp">
							<i class="fa fa-map-marker"></i>
							<h4>Office Location</h4>
							<p><?php echo $config['config_office_location']?></p>
						</div>
					</div>
					<!-- BEGIN CALL US FEATURE -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="single_contact_feaured wow fadeInUp">
							<i class="fa fa-clock-o"></i>
							<h4>Working Hours</h4>
							<p><?php echo $config['config_working_hours']?></p>
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
					<p><?php echo $config['config_subscribe_text']?></p>
				</div>
				<!-- BEGIN SUBSCRIVE FORM -->
				<form class="subscribe_form" method="post" action="save_subscriber">
					<div class="subscrive_group wow fadeInUp">
						<input class="form-control subscribe_mail" type="email" placeholder="Enter your email address" name="subscriber_email">
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
<!--<script src="<?php /*echo site_url('assets')*/?>/js/modernizr.custom.js"></script>
<script src="<?php /*echo site_url('assets')*/?>/js/classie.js"></script>
<script src="<?php /*echo site_url('assets')*/?>/js/elastic_grid.min.js"></script>
<script src="<?php /*echo site_url('assets')*/?>/js/portfolio_slider.js"></script>-->

<!-- Custom js-->
<script src="<?php echo site_url('assets')?>/js/custom.js"></script>
</body>
</html>