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

	</style>
</head>

<?php  

$attributes = array('class' => '', 'id' => '');
echo form_open_multipart('slider/slides/EditSlider', $attributes); ?>
<div class="page-header position-relative">				
					<div class="post_header">						 	
                <h1>
                   &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<span>Edit Ads</span><br>
                </h1>
				</div>				
  <?php
				  //$data    = $this->postadsmodel->view_post();
				  // $ads_id    = $this->uri->segment(4,'0');
				 // $row = $this->postadsmodel->edit_ads($ads_id);
				//  print_r($data);exit;
				  if($data)
				  { 
					  foreach($data as $row)
					  {
?>				  


<p>
        <?php echo form_error('slide_id'); ?>
		<img src="<?php echo $row->slider_path; ?>" style="width: 11%;">
<label for="image" class="fileContainer"><span class="required">Change Image</span>
		<input id="image" class="field"  input type="file" name="userfile" value=" <?php echo form_error('image'); ?>"/>
			<input id="id" class="field" type="hidden" name="slide_id" value="<?php echo $row->slide_id; ?>"/>
			</label>
</p>





  
<br>
    <div class="col-md-offset-3 col-md-9" style="margin-left: 27%;">
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
