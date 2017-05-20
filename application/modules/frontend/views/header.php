<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home-Tex</title>
    <link href="<?php echo base_url();?>assets/Eshopper/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/Eshopper/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/Eshopper/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/Eshopper/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/Eshopper/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/Eshopper/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/Eshopper/css/responsive.css" rel="stylesheet">
	
	  <script src="<?php echo base_url();?>assets/Eshopper/js/jquery.js"></script>


    <script src="<?php echo base_url();?>assets/Eshopper/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/Eshopper/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/Eshopper/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url();?>assets/Eshopper/js/price-range.js"></script>
    <script src="<?php echo base_url();?>assets/Eshopper/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>assets/Eshopper/js/main.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>assets/Eshopper/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>assets/Eshopper/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>assets/Eshopper/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>assets/Eshopper/images/ico/apple-touch-icon-57-precomposed.png">

<style type="text/css">
  .zoom_img img{
margin-top:23%;
height:100px;
width:100px;
margin-left: 16%;
-moz-transition:-moz-transform 0.5s ease-in; 
-webkit-transition:-webkit-transform 0.5s ease-in; 
-o-transition:-o-transform 0.5s ease-in;
}
.zoom_img img:hover{
	
-moz-transform:scale(2); 
-webkit-transform:scale(2);
-o-transform:scale(2);
}
</style>

</head><!--/head-->

<body>

<header id="header"><!--header-->
		<div class="header_top afixpos"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
						<img	src="<?php echo base_url();?>assets/images/email.png" style="width: 38%;"/>
						<img	src="<?php echo base_url();?>assets/images/contect.png" style="width: 36%;"/>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
								<ul class="nav navbar-nav">
								
								<li><a href="<?php echo base_url();?>index.php/login"><i class="fa fa-user"></i>Login</a></li>
								<li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header_middle afixpos"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						
							<a href="<?php echo base_url();?>"><img class="img-responsive" src="<?php echo base_url();?>assets/images/hp.jpg" alt="" style="height: 70px; width: 49%;"/></a>
							
					
					</div>
				
					
					<!--<div class="col-md-3">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<img	class="img-responsive" src="<?php echo base_url();?>assets/images/register.png" style="width: 25%; float: right;"/>
								<img	class="img-responsive" src="<?php echo base_url();?>assets/images/resume.png" style="width: 25%;float: right;"/>
								
								
							</ul>
						</div>
					</div>-->
				</div>
				</div>
			</div><!--/header-middle-->
	
		<div class="header_bottom afixpos"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo base_url();?>" class="active">Home</a></li>
								<li ><a href="<?php echo base_url();?>index.php/frontend/frontend/about_us">About Us</a> </li> 
								
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="search_box pull-right">
						<?php  
					$attributes = array('class' => '', 'id' => '');
					echo form_open('frontend/frontend/search', $attributes); ?>
							<input type="text" id="srchbx" value="" name="search_val" placeholder="Search"/>
							
							<?php echo form_error('search_val'); ?>
							<button type="submit" class="btn btn-default">Search</button>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<?php $this->load->view($module1); ?>

</div>

<footer id="footer" style="margin-top: 2%;"><!--Footer-->
		
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Address</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>A-113,Shanti Nagar,Modal Town,</li>
								<li>Panipat,(HR.)</li>
								<li>info@hellopanipat.com</li>
								
								
							</ul>
						</div>
					</div>
				<div class="col-sm-2">
					<div class="single-widget">
						<h2>Follow Us</h2>
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
					</div>
				
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2016 Hometex  All rights reserved.</p>
					<p class="pull-right">Designed by <span>Yogita Rade</span></p>
				</div>
			</div>
		</div>
		
	</footer>

</body></html>
