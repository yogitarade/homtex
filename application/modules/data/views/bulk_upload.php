<head>
<meta charset="utf-8">
<title>jQuery UI Datepicker - Default functionality</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
 <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
        

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
echo form_open_multipart('data/addData/bulk_upload_data/', $attributes); ?>
<div class="page-header position-relative" style="margin-right: 26%;">				
											 	
                <p style="text-align: center; font-size: 41px;">
                   Bulk Uploading Data<br>
                </p>
					
<div class="position-relative" style="margin-right: 0%;">	

        
        <?php echo form_error('firm_image'); ?>
        <input id="firm_image"  input type="file" name="userfile" value="" />
		</label>
		</p>


    <div class="col-md-offset-3 col-md-9"  style="margin-left: 27%;">
        <button id="myDIV" class="btn btn-info" type="submit" name="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                </button>

				</div>
    </div>    
    </div>    
</p>
 </div><!--/.page-header-->     
<?php echo form_close(); ?>
