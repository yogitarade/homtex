
<head>
<style>

/* Makes responsive fields. Sets size and field alignment.*/
input[type=password]{
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
input[type=password]:focus,textarea:focus {
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
input[type=password]{
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


input[type=password]{
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

// Change the css classes to suit your needs    
$attributes = array('class' => '', 'id' => 'changepwd');
echo form_open('dashboard/changepwd', $attributes); ?>
	<div class="page-header position-relative">
           <p style="text-align: center; font-size:30px;">
            Change Password
                    <small>
                            <i class="icon-double-angle-right"></i>
                    </small>
            </p>
        </div><!--/.page-header-->
<!--<?php
				  
				//print_r($data);
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
                                 <?php echo $row->ads_category_id; ?>
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
		-->
		
<p style="text-align: center;>
        <label for="oldpwd" class="common_class">Old password</label>
    <?php echo form_error('old_pwd'); ?>
    <input id="old_pwd" type="password" name="old_pwd" value="" />

	</p>

<p style="text-align: center;>
        <label for="newpwd" class="common_class">New password<span class="required">*</span></label>
 
    <input id="new_pwd" type="password" name="new_pwd"  />
    <?php echo form_error('new_pwd'); ?>
	</p>
    
<p style="text-align: center;>
        <label for="cnpwd" class="common_class">Confirm password<span class="required">*</span></label>

    <input id="cn_pwd" type="password" name="cn_pwd"  />
    <?php echo form_error('cn_pwd'); ?>
 </p>
    <?php echo $error;?>
    <div class="reset"> 
        <?php echo form_submit( 'submit', 'Submit','class="btn btn-info"'); ?>
       
    </div>

<?php  echo form_close(); ?>