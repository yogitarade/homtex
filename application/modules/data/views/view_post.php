<head>
<meta charset="utf-8">
<title>jQuery UI Datepicker - Default functionality</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">


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

</head>

<div class="container">
<div class="row">
<div class="col-sm-12">
						<div class="search_box pull-right" style="text-align: center; margin-right: 50%; ">
						<?php  
					$attributes = array('class' => '', 'id' => '');
					echo form_open('data/addData/Search', $attributes); ?>						
						<input id="srchbx" value="" name="search_val" placeholder="Search" type="text">
							<?php echo form_error('search_val'); ?>							
				<button type="submit" class="btn btn-default">Search</button>
						</form>
						<?php echo form_close(); ?>	</div>
											</div>
											</div>
											</div>


<?php  

$attributes = array('class' => '', 'id' => '');
echo form_open('data/addData/DisplayData', $attributes); ?>

    <div class="tab-content" style="overflow: auto;"> 
        <div id="tab1" class="tab active">
            <div class="page-header position-relative">
						<h1>
						View Data
							
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
					<th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">Category Name</th>
					<th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting"> Sub Category Name</th>
                     <th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">Firm Name</th>
                    
<th aria-label="Domain: activate to sort column ascending" style="width: 146px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">Firm Contact</th>
<th aria-label="" style="width: 146px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">Firm Address</th>

					   <th aria-label="" style="width: 146px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">Firm Area</th>
						<th aria-label="" style="width: 146px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">Firm City</th>
						<th aria-label="" style="width: 146px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">Person Name</th>
						
						<th aria-label="" style="width: 146px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">Person Contact</th>
						<th aria-label="" style="width: 146px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">Person Email Id</th>
						
<th aria-label="" style="width: 146px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">Whatsup No</th>

	<th aria-label="" style="width: 146px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">Website</th>

<th aria-label="" style="width: 146px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">Products</th>

						<th aria-label="" style="width: 146px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">Specialty</th>
						
						
						
					
	
						<th aria-label="" style="width: 146px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">Action</th>

                </tr>

        </thead>


            <tbody aria-relevant="all" aria-live="polite" role="alert">
               <?php
				if($data){
					$i=0;
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
                                 <?php echo ++$i ?>
                        </td>
						
						<td class=" ">
                                <?php echo $row->category_name; ?>
                        </td>
						
						<td class=" ">
                                <?php echo $row->ads_sub_category_name; ?>
                        </td>
						
                        <td class=" ">
                                <?php echo $row->firm_name; ?>
                        </td>
						
						<td class=" ">
                              <?php echo $row->firm_contact; ?>
                        </td>
                        
						<td class=" ">
                                <?php echo $row->firm_address; ?>
                        </td>
                        <td class=" ">
                                <?php echo $row->firm_area; ?>
                        </td>
						
						 <td class=" ">
                                <?php echo $row->firm_city; ?>
                        </td>
						
						
						 <td class=" ">
                                <?php echo $row->person_name; ?>
                        </td>
						
						<td class=" ">
                                <?php echo $row->person_contact; ?>
                        </td>
						
						<td class=" ">
                                <?php echo $row->person_email_id; ?>
                        </td>
						
							<td class=" ">
                                <?php echo $row->whatsup_no; ?>
                        </td>
						
						<td class=" ">
                                <?php echo $row->website; ?>
                        </td>		

			<td class=" ">
                                <?php echo $row->products; ?>
                        </td>
						
						<td class=" ">
                                <?php echo $row->specialty; ?>
                        </td>
						
						
						
			
						
						
						
						<td class="td-actions ">
                            <div class="hidden-phone visible-desktop action-buttons">
                                <a class="green" href="<?php echo base_url()?>index.php/data/addData/edit/<?php  
                                 echo $row->ads_id;  ?>"> edit
                                </a>

                                <a class="red" href="<?php echo base_url()?>index.php/data/addData/deleteads/<?php  
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


                </tbody>
				</table>
        </div>
 
            
    </div>
</div>
        
			
								
					
