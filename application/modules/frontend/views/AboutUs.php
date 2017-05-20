
	<section>
		<div class="container sm">
			<div class="row">
			
				
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">About Us</h2>
						<?php
				if($pages){
                foreach($pages as $pages)
				{  
				?>
					 <p>   <?php echo $pages->post_content; ?> </p>
					
					 <?php 
				}	
				}?>	
						
						</div>
						
		
					
				
					
				</div>
			</div>
		</div>
	</section>
	
	
	
