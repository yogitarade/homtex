<style>
.zoom_img img {
    margin-top: 10% !important;
    height: 165px !important;
    width: 100% !important;
    transition: -moz-transform 0.5s ease-in 0s;
    border: 5px solid #F7F7F5;
}

</style>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
  <!-- Indicators -->
  
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
  <?php
						if($slider){
						foreach($slider as $slider)
						{ 
						?>
    <div class="item">
		<img src="<?php echo $slider->slider_path; ?>" style="width:100%" >
    </div>
	<?php 
								}	
								}?>
    <div class="item active"> <img src="<?php echo $slider->slider_path; ?>" style="width:100%" >
     
    </div>
  
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> 
  </div>
	
	<section style="margin-top: 2%;">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							<?php
							if($data){
							foreach($data as $row)
							{  
							?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
<img src="<?php  echo $row->category_image_path;?>"  class="" alt="" style="width:20px; height:20px;" />
<a href="<?php echo base_url();?>index.php/frontend/frontend/display_category/<?php  echo $row->ads_category_id;?>/<?php  echo $row->category_name;?>"><?php echo $row->category_name; ?></a></h4>
								</div>
							</div>
							
							<?php 
								}
								}
							   ?>
						</div><!--/category-products-->
					
					
						
						
						
					
					</div>

					<div class="left-image" style="margin-bottom: 10px;">
						<img src="<?php echo base_url(); ?>/uploads/uploads/Dyers.jpg" alt="" style="width: 100%; height: 25%;" />
					</div>

					<div class="left-image" style="margin-bottom: 10px;">
						<img src="<?php echo base_url(); ?>/uploads/uploads/Advertisement-4.jpg" alt="" style="width: 100%; height: 25%;" />
					</div>

					

				</div>
				
				<div class="col-md-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Proudly associated with</h2>
						<div class="row">
						 <?php
				   if($popular){
                foreach($popular as $popular)
				{ 
				?>
				
						<div class="col-md-4">
						
				
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<a href="<?php echo base_url();?>index.php/frontend/frontend/display_category/<?php  echo $popular->ads_category_id;?>/<?php  echo $popular->category_name;?>" class="btn btn-default add-to-cart">
											<img src="<?php echo $popular->category_image_path; ?>" style="height: 170px; width: 238px;" alt="" />
											</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												
												
												<a href="<?php echo base_url();?>index.php/frontend/frontend/display_category/<?php  echo $popular->ads_category_id;?>/<?php  echo $popular->category_name;?>" class="btn btn-default add-to-cart">View</a>
											</div>
										</div>
								</div>
								
							</div>
							
						</div>
						
						<?php 
				}	
				}?> 
				</div>
						</div>
						
					<!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<h2 class="title text-center">Our Sponsors</h2>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
							<div class="row">
							<?php
							if($buservices){
							foreach($buservices as $buservices)
							{
							?>
							
								<div class="col-md-3">
								
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												
												<h2><?php echo $buservices->category_name; ?></h2>
											
												<div class="btn btn-default add-to-cart"><img src="<?php echo $buservices->category_image_path; ?>" alt=""  style="width: 165px; height: 163px;"/></div>
											</div>
											
										</div>
									</div>
								</div>
								
								<?php 
									}	
									}?> 
									</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="category-tab"><!--category-tab-->
						<h2 class="title text-center">Powered By</h2>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
							
							<div class="row">
							<div class="col-md-12">
							<div class="row">
							<?php
							if($ourservice){
							foreach($ourservice as $ourservice)
							{
							?>
							<div class="col-md-3">
					<div class="product-image-wrapper">
										<!--<div class="single-products">-->
											<div class="productinfo text-center">
										
											<div class="zoom_img" >
													<a  href="<?php echo base_url();?>index.php/frontend/frontend/display_category/<?php echo $ourservice->ads_category_id;?>/<?php echo $ourservice->category_name;?>" >
										
											
										<img src="<?php echo $ourservice->category_image_path; ?>"  title="<?php echo $ourservice->category_name; ?>" />
							<h4><?php echo $ourservice->category_name; ?></h4>										</a>
									</div>
									
									</div>
											
											
										</div>
							</div>
							<?php 
									}	
									}?> 
							</div>
							</div>
							</div>
								
								</div>
								
							</div>
							
						</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	
	
