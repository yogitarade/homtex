<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Ajax Tutorial: Dynamic Loading of ComboBox using jQuery and Ajax in PHP</title>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.livequery.js"></script>

<script type="text/javascript">

$(document).ready(function() {
	
	//$('#loader').hide();
	
	$('.parent').livequery('change', function() {
		
		$(this).nextAll('.parent').remove();
		$(this).nextAll('label').remove();
		
		$('#show_sub_categories').append('<img src="loader.gif" style="float:left; margin-top:7px;" id="loader" alt="" />');
		
		$.post("<?php echo base_url();?>index.php/data/addData/subcat", {
			ads_category_id: $(this).val(),
		}, function(response){
			
			setTimeout("finishAjax('show_sub_categories', '"+escape(response)+"')", 400);
		});
		
		return false;
	});
});

function finishAjax(id, response){
  $('#loader').remove();

  $('#'+id).append(unescape(response));
} 

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

<body>

<?php  

$attributes = array('class' => '', 'id' => '');
echo form_open_multipart('data/addData/', $attributes); ?>

<div class="page-header position-relative" style="margin-right: 26%;">				
											 	
                <p style="text-align: center; font-size: 41px;">
                   Add Data<br>
                </p>
				
<div class="position-relative" style="margin-right: 0%;">	

	<br clear="all" /><br clear="all" />
	
	<div id="show_sub_categories" style="text-align: center;">
		<select name="ads_category_id" class="parent" style="padding:8px;">
		<option value="" selected="selected">-- Categories --</option>
		<?php
		$query = "select * from ht_ads_category where is_deleted = 0";
		$results = mysql_query($query);
		
		while ($rows = mysql_fetch_assoc(@$results))
		{?>
			<option value="<?php echo $rows['ads_category_id'];?>"><?php echo $rows['category_name'];?></option>
		<?php
		}?>
		</select>	
		
	</div>
	
	<p  style="text-align: center;>
        <label for="firm_name" class="common_class">Firm Name*</label>
        <?php echo form_error('firm_name'); ?>
        <input id="firm_name" type="text" name="firm_name" value="" />
</p>

<p  style="text-align: center;>
        <label for="firm_contact" class="common_class">Firm Contact*</label>
        <?php echo form_error('firm_contact'); ?>
        <input id="firm_contact" type="text" name="firm_contact" value="" />
</p>

<p  style="text-align: center;>
        <label for="firm_address" class="common_class">Firm Address*</label>
        <?php echo form_error('firm_address'); ?>
        <input id="firm_address" type="text" name="firm_address" value="" />
</p>

<p  style="text-align: center;>
        <label for="firm_area" class="common_class">Firm Area*</label>
        <?php echo form_error('firm_area'); ?>
        <input id="firm_area" type="text" name="firm_area" value="" />
</p>

<p  style="text-align: center;>
        <label for="firm_city" class="common_class">Firm City</label>
        <?php echo form_error('firm_city'); ?>
        <input id="firm_city" type="text" name="firm_city" value="" />
</p>

<p  style="text-align: center;>
        <label for="person_name" class="common_class">Person Name</label>
        <?php echo form_error('person_name'); ?>
        <input id="person_name" type="text" name="person_name" value="" />
</p>

<p  style="text-align: center;>
        <label for="person_contact" class="common_class">Person Contact</label>
        <?php echo form_error('person_contact'); ?>
        <input id="person_contact" type="text" name="person_contact" value="" />
</p>

<p  style="text-align: center;>
        <label for="person_email_id" class="common_class">Person Email Id</label>
        <?php echo form_error('person_email_id'); ?>
        <input id="person_email_id" type="text" name="person_email_id" value="" />
</p>

<p  style="text-align: center;>
        <label for="whatsup_no" class="common_class">whats app no</label>
        <?php echo form_error('whatsup_no'); ?>
        <input id="whatsup_no" type="text" name="whatsup_no" value="" />
</p>

<p  style="text-align: center;>
        <label for="website" class="common_class">Website</label>
        <?php echo form_error('website'); ?>
        <input id="website" type="text" name="website" value="" />
</p>

<p  style="text-align: center;>
        <label for="products" class="common_class">Products*</label>
        <?php echo form_error('products'); ?>
        <input id="products" type="text" name="products" value="" />
</p>

<p  style="text-align: center;>
        <label for="specialty" class="common_class">Specialty*</label>
        <?php echo form_error('specialty'); ?>
        <input id="specialty" type="text" name="specialty" value="" />
</p>

<div class="col-md-offset-3 col-md-9"  style="margin-left: 27%;">
        <button id="myDIV" class="btn btn-info" type="submit" name="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
        </button>

                &nbsp; &nbsp; &nbsp;
		<button class="btn" type="reset">
				<i class="ace-icon fa fa-undo bigger-110"></i>
				Reset
		</button>
</div>
				
	<br clear="all" /><br clear="all" />
	
</div>
</div>
<?php echo form_close(); ?>
</body>
</html>
