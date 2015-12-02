<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PSYSC : <?php echo $title?></title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/png" href="<?php echo site_url('assets')?>/img/favicon.png"/>

	<link href="<?php echo site_url('assets')?>/style_parallax.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url('assets')?>/scripts/jquery.parallax-1.1.3.js"></script>
	<script type="text/javascript" src="<?php echo site_url('assets')?>/scripts/jquery.localscroll-1.2.7-min.js"></script>
	<script type="text/javascript" src="<?php echo site_url('assets')?>/scripts/jquery.scrollTo-1.4.2-min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#nav').localScroll(800);

			//.parallax(xPosition, speedFactor, outerHeight) options:
			//xPosition - Horizontal position of the element
			//inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
			//outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
			$('#intro').parallax("50%", 0.1);
			$('#first').parallax("50%", 0.1);
			$('#second').parallax("50%", 0.1);
			$('.bg').parallax("50%", 0.4);
			$('#third').parallax("50%", 0.3);

		})
	</script>
</head>

<body>
<ul id="nav">
	<li><a href="#intro" title="Introduction"><img src="<?php echo site_url('assets')?>/images/dot.png" alt="Link" /> </a></li>
	<li><a href="#first" title="Highlights"><img src="<?php echo site_url('assets')?>/images/dot.png" alt="Link" /> </a></li>
	<li><a href="#second" title="Registration"><img src="<?php echo site_url('assets')?>/images/dot.png" alt="Link" /> </a></li>
	<li><a href="#third" title="FAQs"><img src="<?php echo site_url('assets')?>/images/dot.png" alt="Link" /> </a></li>
	<li><a href="#fifth" title="Contact Us"><img src="<?php echo site_url('assets')?>/images/dot.png" alt="Link" /> </a></li>
</ul>

<div id="intro">
	<div class="story">
		<div class="float-left">
			<h2><?php echo $title?></h2>
			<p><?php echo $description?></p>
		</div>
	</div> <!--.story-->
</div> <!--#intro-->

<div id="first">
	<div class="story">
		<div class="float-right">
			<img src="<?php echo site_url('cms').'/'.$highlight_image?>" alt="logo" width="75%">
			<p>The multiple backgrounds applied to this section are moved in a similar way to the first section -- every time the user scrolls down the page by a pixel, the positions of the backgrounds are changed.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nibh erat, sagittis sit amet congue at, aliquam eu libero. Integer molestie, turpis vel ultrices facilisis, nisi mauris sollicitudin mauris, volutpat elementum enim urna eget odio. Donec egestas aliquet facilisis. Nunc eu nunc eget neque ornare fringilla. Nam vel sodales lectus. Nulla in pellentesque eros. Donec ultricies, enim vitae varius cursus, risus mauris iaculis neque, euismod sollicitudin metus erat vitae sapien. Sed pulvinar.</p>
		</div>
	</div> <!--.story-->

</div> <!--#first-->


<div id="second">
	<div class="story">
		<div class="float-left">
			<img src="<?php echo site_url('cms').'/'.$highlight_image?>" alt="logo" width="75%">
			<p>The multiple backgrounds applied to this section are moved in a similar way to the first section -- every time the user scrolls down the page by a pixel, the positions of the backgrounds are changed.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nibh erat, sagittis sit amet congue at, aliquam eu libero. Integer molestie, turpis vel ultrices facilisis, nisi mauris sollicitudin mauris, volutpat elementum enim urna eget odio. Donec egestas aliquet facilisis. Nunc eu nunc eget neque ornare fringilla. Nam vel sodales lectus. Nulla in pellentesque eros. Donec ultricies, enim vitae varius cursus, risus mauris iaculis neque, euismod sollicitudin metus erat vitae sapien. Sed pulvinar.</p>
		</div>
	</div> <!--.story-->

</div> <!--#second-->

<div id="third">
	<div class="story"><div class="bg2"></div>
		<div class="float-right">
			<h2>FAQs</h2>
			<p><?php echo $faqs?></p>
		</div>
	</div> <!--.story-->
</div> <!--#third-->

<div id="fifth">
	<div class="story">
		<p>Check out my new plugin <a href="http://www.sequencejs.com" title="Sequence.js">Sequence.js</a> for parallax effects and a whole lot more!</p>

		<h2>Ian Lunn</h2>
		<ul>
			<li><strong>Twitter</strong>: <a href="http://www.twitter.com/IanLunn" title="Follow Ian on Twitter">@IanLunn</a></li>
			<li><strong>GitHub</strong>: <a href="http://www.github.com/IanLunn" title="Follow Ian on GitHub">IanLunn</a></li>
			<li><strong>Website</strong>: <a href="http://www.ianlunn.co.uk/" title="Ian Lunn Design">www.ianlunn.co.uk</a></li>
		</ul>

		<p>This demo is based on the <a href="http://www.nikebetterworld.com" title="Nike Better World">Nikebetterworld.com</a> website.</p>

		<h2>Credits</h2>
	</div> <!--.story-->
</div> <!--#fifth-->
</body>
</html>
