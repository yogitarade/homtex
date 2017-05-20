
	<section>
	
	
	
<div class="container myc">
<h5> You are here:   <a href="<?php echo base_url();?>index.php/frontend/frontend/display_category/<?php  echo $catids ?>/<?php  echo $catname ?>"><?php  echo $catname ?> </a></h5>
			<div class="row">
			

			
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
						</div>
					
					</div>
	
	
	</div>
	<div class="col-md-6">
	<h2 class="title text-center">Sub Category List</h2>

				<div class="row">
				<?php
						if($moreoption){
						foreach($moreoption as $moreoption)
						{ 
						?>
				<div class="col-md-4">
					<div class="features_items"><!--features_items-->
						
						<div class="zoom_img" style="">
						<a  href="<?php echo base_url()?>index.php/frontend/frontend/clickable_more_option_productlist/<?php  
                                     echo $moreoption->ads_sub_category_id;?>/<?php  echo $catname ?>/<?php  echo $moreoption->ads_sub_category_name;?>/<?php  echo $moreoption->ads_category_id;?>" >
										<img src="<?php echo $moreoption->ads_sub_category_image_path; ?>"  title="<?php echo $moreoption->category_name; ?>" />
											<p style="text-align:center"><?php echo $moreoption->ads_sub_category_name; ?></p>
										
																	
							</a>
									</div>
					
											
									
			
						
						</div>
						
						
						</div>
<?php 
				}	
				}?>
						</div>
	

	</div>
	<div class="col-md-3">
<div class="left-image" style="margin-bottom: 10px;">
						<img src="<?php echo base_url(); ?>/uploads/uploads/Dyers.jpg" alt="" style="width: 100%; height: 25%;" />
					</div>

					<div class="left-image" style="margin-bottom: 10px;">
						<img src="<?php echo base_url(); ?>/uploads/uploads/Advertisement-4.jpg" alt="" style="width: 100%; height: 25%;" />
					</div>
	
	
	</div>
	</div>
	</div>
			
			
		</div>
		</div>
	</section>
	
	
	
