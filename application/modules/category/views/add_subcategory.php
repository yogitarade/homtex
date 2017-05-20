<head>
<meta charset="utf-8">
<title>jQuery UI Datepicker - Default functionality</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#from_date" ).datepicker();
$( "#to_date" ).datepicker();
});

function doconfirm()
{
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}




<script>
function showCustomer(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("txtHint").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "http://localhost/hometex/index.php/category/category/SubCategoryid ?q="+str, true);
  xhttp.send();
}
</script>
</script>
<style>

	.fileContainer {  
    overflow: hidden;
    position: relative;
	background-color:#E7FE72;
	border: 2px dotted #FFF ;
    padding: 1px;
    border-color: #FFF;
	margin-top: -5%;
margin-left: 35%;
}

.fileContainer [type=file] {
    cursor: inherit;
    display: block;
    font-size: 999px;
    filter: alpha(opacity=0);
    min-height: 100%;
    min-width: 100%;
    opacity: 0;
    position: absolute;
    right: 0;
    text-align: right;
    top: 0;
}

-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}
body {
margin:0;
padding:0;
font-family: 'Roboto Slab', serif;
}
div#envelope{
width: 55%;
margin: 10px 30% 10px 25%;
padding:10px 0;
border: 2px solid gray;
border-radius:10px;
}
form{
width:70%;
margin:4% 15%;
}
header{
background-color: #4180C5;
text-align: center;
padding-top: 12px;
padding-bottom: 8px;
margin-top: -11px;
margin-bottom: -8px;
border-radius: 10px 10px 0 0;
color: aliceblue;
}

/* Makes responsive fields. Sets size and field alignment.*/
input[type=text]{
margin-bottom: 20px;
margin-top: 10px;
width:100%;
padding: 15px;
border-radius:5px;
border:1px solid #7ac9b7;
}
input[type=submit]
{
margin-bottom: 20px;
width:100%;
padding: 15px;
border-radius:5px;
border:1px solid #7ac9b7;
background-color: #4180C5;
color: aliceblue;
font-size:15px;
cursor:pointer;
}
#submit:hover
{
background-color: black;
}
textarea{
width:100%;
padding: 15px;
margin-top: 10px;
border:1px solid #7ac9b7;
border-radius:5px;
margin-bottom: 20px;
resize:none;
}
input[type=text]:focus,textarea:focus {
border-color: #4697e4;
}



h2{
font-size:16px;
}
p{
font-size:14px;
}
label{
font-size:12px;
}
input[type=submit]{
padding:5px;
}
input[type=text]{
padding: 8px;
}
div#envelope{
width: 80%;
margin: 10px 30% 10px 11%;
}

input[type=submit]
{
padding:4px;
font-size:12px;
}
input[type=text]{
padding: 8px;
}
label{
font-size:12px;
}
h2{
font-size:15px;
}
p{
font-size:20px;
}
div#envelope{
width: 80%;
margin: 10px 30% 10px 11%;
}
</style>
</head>
<?php  

$attributes = array('class' => '', 'id' => '');
echo form_open_multipart('category/category/AddSubCategory/', $attributes); ?>
<div class="page-header position-relative">				
					<div class="post_header" style="text-align: center;">						 	
                <p>					
Add Sub Category<br>
</p>
				</div>				
    
<div class="row">
    <div class="col-sm-6">
<p>
        <label for="category_name1" class="common_class">Category Name<span class="required">*</span></label>
        <?php echo form_error('category_name1'); ?>
		 <select name="category_name" style="margin-left: 7%;" >
		  <?php
	 if($category){
		 
                foreach($category as $category)
				{  
	 ?>      
  <option value="<?php  echo $category->ads_category_id;?>"><?php echo $category->category_name; ?></option>
  <?php  } } ?>
</select> 
				
				
</p>



<p style="text-align: center;>
        <label for="ads_sub_category_name" class="common_class">Sub Category Name</label>
        <?php echo form_error('ads_sub_category_name'); ?>
        <input id="ads_sub_category_name" class="field" type="text" name="ads_sub_category_name" value=""/>
</p>

<p >
<p > 

<label for="name" class="common_class">Add Sub Category Image(200 x 200)</label>
<?php echo form_error('image'); ?>
		
        <input id="image"  input type="file" name="userfile" value="" />

</p>



 </div>    
  </div>  
<br>
    <div class="col-md-offset-3 col-md-9" style="margin-left: 37%;">
        <button class="btn btn-info" type="submit" name="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                </button>

                &nbsp; &nbsp; &nbsp;
                <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                </button>
    </div>    
   
</p>
 </div><!--/.page-header-->     
 <table aria-describedby="sample-table-2_info" id="txtHint" class="table table-striped table-bordered table-hover dataTable">
        <thead>
                <tr role="row">
                    
                    <th aria-label="" style="width: 51px;" colspan="1" rowspan="1" role="columnheader" class="center sorting_disabled">
                        <label>
                                <input type="checkbox">
                                <span class="lbl"></span>
                        </label>
                    </th>
					<th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">Sr. No.</th>
					
					<th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">Sub Category Id</th>
					
                     <th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">Category Name</th>
					 
					  <th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">Sub Category Name</th>
                     
					   <th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">Sub Category Image</th>
					   
						 <th aria-label="Domain: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">Action</th>
						
                </tr>

        </thead>


            <tbody aria-relevant="all" aria-live="polite" role="alert">
               <?php
				//print_r($data);exit;
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
                                 <?php echo $row->ads_sub_category_id; ?>
                        </td>
						
                        <td class=" ">
                                <?php echo $row->category_name; ?>
                        </td>
						
						 <td class=" ">
                                <?php echo $row->ads_sub_category_name; ?>
                        </td>
                        
						<td class=" ">
                              <img src ="<?php echo $row->ads_sub_category_image_path; ?>" style="width: 100%; height: 90px;">
                        </td>
                        
                      
						<td class="td-actions ">
                            <div class="hidden-phone visible-desktop action-buttons">
                              <a class="green" href="<?php echo base_url()?>index.php/category/category/subcatedit/<?php  
                                 echo $row->ads_sub_category_id;  ?>"> edit
                                </a>

                                <a class="red" href="<?php echo base_url()?>index.php/category/category/deleteads/<?php  
                                     echo $row->ads_sub_category_id;?>" ><i class="icon-trash bigger-130"  onClick="return doconfirm();">delete</i> </a>
                                                                
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
<?php echo form_close(); 
 ?>
