<!--/slider-->
	
	<section>
		<div class="container sm">
		<h5> You are here:   <a href="<?php echo base_url();?>index.php/frontend/frontend/display_category/<?php  echo $subcatid ?>/<?php  echo $cat ?>"><?php  echo $cat ?></a>/<?php  echo $subcat ?></h5>
			<div class="row">
			<div class="col-sm-3">
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
			
			<div class="col-sm-9">
			<div class="row">
			<div class="col-sm-8">
		<div class="features_items">
						<h2 class="title text-center">Products Details</h2>
							<?php
				if($clickallproductlist){
                foreach($clickallproductlist as $clickallproductlist)
				{ 
				?>
			
					
					  <div class="col-md-12 " style="border: medium solid rgb(242, 222, 222); padding: 1%; margin-bottom: 2%;">
							<div class="row">
										<!-- <div class="col-md-4">
										<img  class="img-responsive"  id="newphoto9" src="<?php echo $clickallproductlist->firm_image; ?>" style="width: 58%;">
									 </div>-->
									  <div class="col-md-6">
									  	<table border="0" cellpadding="2" cellspacing="2">
                                    <tbody><tr>
                                        <td><strong>Firm Name</strong></td>
                                        <td width="1">:</td>
                                        <td><?php echo $clickallproductlist->firm_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Firm Contact   </strong></td>
                                        <td width="1">:</td>
                                        <td><?php echo $clickallproductlist->firm_contact; ?></td>
                                    </tr>
                                     <tr>
                                        <td><strong>Firm Address   </strong></td>
                                        <td width="1">:</td>
                                        <td><?php echo $clickallproductlist->firm_address; ?></td>
                                    </tr>
                                     <tr>
                                        <td><strong>Firm Area</strong></td>
                                        <td width="1">:</td>
                                        <td><?php echo $clickallproductlist->firm_area; ?></td>
                                    </tr>
                                     <tr>
                                        <td><strong>Firm City </strong></td>
                                        <td width="1">:</td>
                                        <td><?php echo $clickallproductlist->firm_city; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Person Name</strong></td>
                                        <td width="1">:</td>
                                        <td><?php echo $clickallproductlist->person_name; ?></td>
                                    </tr>
									
									  <tr>
                                        <td><strong>Products</strong></td>
                                        <td width="1">:</td>
                                        <td><?php echo $clickallproductlist->products; ?></td>
                                    </tr>
                                </tbody></table>
											
									  </div>
									  
									  <div class="col-md-6">
									  
									  <table border="0" cellpadding="2" cellspacing="2">
                                    <tbody><tr>
                                        <td><strong>Person Contact </strong></td>
                                        <td width="1">:</td>
                                        <td><?php echo $clickallproductlist->person_contact; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Person Email Id</strong></td>
                                        <td width="1">:</td>
                                        <td><?php echo $clickallproductlist->person_email_id; ?></td>
                                    </tr>
                                     <tr>
                                        <td><strong>Whatsapp No</strong></td>
                                        <td width="1">:</td>
                                        <td><?php echo $clickallproductlist->whatsup_no; ?></td>
                                    </tr>
                                     <tr>
                                        <td><strong>Website</strong></td>
                                        <td width="1">:</td>
                                        <td><?php echo $clickallproductlist->website; ?></td>
                                    </tr>
                                     <tr>
                                        <td><strong>Specialty</strong></td>
                                        <td width="1">:</td>
                                        <td><?php echo $clickallproductlist->specialty; ?></td>
                                    </tr>
                                    
                                </tbody></table>
									  
										
									  </div>
							</div>
							 
  </div>
  <?php 
                
                }
                }
               else{?>
                   <tr>
                        <td colspan="8">No Search Found.</td>
                    </tr>
                 <?php   }?>
  
 
							
						</div>
				</div>
			<div class="col-sm-4">
		<div class="left-image" style="margin-bottom: 10px;">
						<img src="http://hometex.integrationsolution.in/uploads/uploads/Dyers.png" alt="" style="width: 100%; height: 25%;" />
					</div>

					<div class="left-image" style="margin-bottom: 10px;">
						<img src="http://hometex.integrationsolution.in/uploads/uploads/Dyers.png" alt="" style="width: 100%; height: 25%;" />
					</div>
				</div>
			</div>
			</div>
						</div>
			

		
				
			
			</div>
		</div>
	</section>
	
	
	


