<style>
    .display{
        float: left;
        list-style: none;
        margin-left: 45px;
    }
    
    .navbar{
        height: 28px;
    }
</style>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
	
	$('#fd1').click(function(){
		//alert("test");
		$("#test").css("display", "block");
	});
	
	$('#fd2').click(function(){
		alert("test");
	});
	
	
});
function doconfirm()
{
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}
</script>

<?php  

$attributes = array('class' => '', 'id' => '');
echo form_open('post_ads/view_post/view_post', $attributes); ?>
    <div class="tab-content">
        <div id="tab1" class="tab active">
            <div class="page-header position-relative">
						<h1>
						view post
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>

			</div><!--/.page-header-->
			
			<table aria-describedby="sample-table-2_info" id="" class="table table-striped table-bordered table-hover dataTable">
        <thead>
                <tr role="row">
                    
                    <th aria-label="" style="width: 51px;" colspan="1" rowspan="1" role="columnheader" class="center sorting_disabled">
                        <label>
                                <input type="checkbox">
                                <span class="lbl"></span>
                        </label>
                    </th>
					<th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">Sr. No.</th>
                     <th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">company name</th>
                     <th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">priority</th>   
                       <th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">from</th>
                       <th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">to</th>
					   <th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">image</th>
						<th aria-label="" style="width: 146px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">link</th>
						<th aria-label="" style="width: 146px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">Action</th>

                </tr>

        </thead>


            <tbody aria-relevant="all" aria-live="polite" role="alert">
               <?php
				  
				//print_r($data);exit;
				if($data){
                foreach($data as $row)
				{  
				?>
					
                    <tr class="odd">
                        <td class="center  sorting_1">
                                <label>
                                        <input type="checkbox">
                                        <span class="lbl"></span>
                                </label>
                        </td>

						<td class=" ">
                                 <?php echo $row->ads_id; ?>
                        </td>
						
                        <td class=" ">
                                <?php echo $row->company_name; ?>
                        </td>
                        
						
                        
                        <td class=" ">
                                <?php echo $row->priority; ?>
                        </td>
                        
                        <td class=" ">
                                <?php echo $row->from_date; ?>		
                        </td>
						
						<td class=" ">
                                <?php echo $row->to_date; ?>
                        </td>
						
						<td class=" ">
                              <img src ="<?php echo $row->image_path; ?>" style="width: 100%;">
                        </td>
                        
                        <td class=" ">
                                <?php echo $row->link; ?>
                        </td>
						<td class="td-actions ">
                            <div class="hidden-phone visible-desktop action-buttons">
                                <a class="green" href="<?php echo base_url()?>index.php/post_ads/post_ads/edit/<?php  
                                 echo $row->ads_id;  ?>"> edit
                                </a>

                                <a class="red" href="<?php echo base_url()?>index.php/post_ads/post_ads/deleteads/<?php  
                                     echo $row->ads_id;?>"  onClick="return doconfirm();">delete
                                </a>
                                                                
                            </div>

                                <div class="hidden-desktop visible-phone">
                                    
                             </div>
                        </td>
                    </tr>
                <?php 
                
                }
                }
               else{?>
                   <tr>
                        <td colspan="8">No Record Found.</td>
                    </tr>
                 <?php   }?>


                </tbody></table>
        </div>
 
            
    </div>
</div>
        
			
								
					
