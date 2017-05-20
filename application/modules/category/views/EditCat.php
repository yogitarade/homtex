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
echo form_open_multipart('category/category/catedit', $attributes); ?>
<div class="page-header position-relative">				
					<div class="post_header">						 	
                <h1>
                   &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<span>Edit Category</span><br>
                </h1>
				</div>				
  <?php
				  if($data)
				  { 
					  foreach($data as $row)
					  {
?>				  


<p style="text-align: center;>
        <label for="category_name" class="common_class">Company Name<span class="required"></span></label>
        <?php echo form_error('ads_category_id'); ?>
        <input id="category_name" class="field" type="text" name="category_name" value="<?php echo $row->category_name; ?>"/>
		<input id="id" class="field" type="hidden" name="ads_category_id" value="<?php echo $row->ads_category_id; ?>"/>

</p>


<p>
 
       
		<img src="<?php echo $row->category_image_path; ?>" style="width: 11%;">
		 <?php echo form_error('ads_category_id'); ?>
		<label for="image" class="fileContainer"><span class="required">Change Image</span>
		<input id="image" class="field"  input type="file" name="userfile" value=" <?php echo form_error('image'); ?>"/>
			<input id="id" class="field" type="hidden" name="ads_sub_category_id" value="<?php echo $row->ads_category_id; ?>"/>
			</label>
</p>

<p>
        <label for="is_popular" class="common_class">In Association With</label>
        <?php echo form_error('is_popular'); ?>
     Yes<input id="is_popular" type="radio" name="is_popular" value="1" checked> 
  No<input id="is_popular" type="radio" name="is_popular" value="2"> 
</p>


<p>
        <label for="leftbar" class="common_class">Left Side Bar</label>
        <?php echo form_error('leftbar'); ?>
      Yes<input id="leftbar" type="radio" name="leftbar" value="1" checked> 
  No<input id="leftbar" type="radio" name="leftbar" value="2"> 
</p>

<p>
        <label for="is_service" class="common_class">Associates With</label>
        <?php echo form_error('is_service'); ?>
     Yes<input id="is_service" type="radio" name="is_service" value="1" checked> 
  No<input id="is_service" type="radio" name="is_service" value="2"> 
</p>

<p>
        <label for="emg_popular" class="common_class">Emergency Services</label>
        <?php echo form_error('emg_popular'); ?>
      Yes<input id="emg_popular" type="radio" name="emg_popular" value="1" checked> 
  No<input id="emg_popular" type="radio" name="emg_popular" value="2"> 
</p>

    
<br>
    <div class="col-md-offset-3 col-md-9">
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
				  <?php 
					  }
				  } ?>
 </div><!--/.page-header-->     
<?php echo form_close(); 
 ?>
