<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Distributor Page</title>
        
       <link href="<?php echo base_url();?>assets/css/ace-ie.min.css" rel="stylesheet" type="text/css">
       <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
       <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
       <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />
       <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />        
       <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css"/>
	
        <script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
       
        <script type="text/javascript">
		$(document).ready(function()
                {
               
                    $("#register_form").validate(
                      {
                        rules:
                        {
                            fname:"required",
                            lname:"required",
                            contact:{
                              required:true,
                              number:true,
                              maxlength:10,
                              minlength:10
                            },
                           useremail: {
                            required: true,
                            email: true
                            },
                            password:{
                             required:true,
                             minlength:6
                            },
                            cn_password:{
                             required:true,
                             minlength:6,
                             equalTo:"#password"
                            },
                            address:"required",
                            agreement:"required"
                        },
                          messages:
                        {
                            fname:"Enter first name",
                            lname:"Enter last name",
                            contact:"Enter valid contact no",
                            useremail: "enter a valid email address",
                            password:"Enter password(atleast 6 characters)",
                            cn_password:"Enter correct confirm password",
                            address:"Enter address",
                            agreement:"check user agreement"
                        },
                        submitHandler:function(form)
                        {
                            form.submit();
                        }
                     });
                });
                
                $(document).ready(function(){
		
                    $(".login-error").fadeOut(7000);
                    $(".login-error").css({"background-color":"#5CB85C","padding":"2% 4% 2% 4%","width": "92%","margin":"2% 0% 0% 0%","font-weight":"bold"});
                
        });
	</script>
        
</head>
<style>
     .light-login {
            background: url('<?php echo base_url(); ?>assets/css/images/patter.jpg') repeat scroll 0% 0% #DFE0E2;
        }
        .error{
            color:#FF0000;
        }
        .login-error{
            color:rgba(249, 255, 0, 1);
        }
</style>

<body class="login-layout light-login">
		<div class="main-container">
		 <div class="main-content">
		    <div class="row">
                     <div class="col-sm-10 col-sm-offset-1">
			<div class="login-container">
                            <div class="center">
                                 <?php if($err!="") {?>
                                 <div class="login-error">          
                                      <?php echo $err; ?>
                                 </div>
                                <?php } ?>
                                <h1>
                                    <span class="red">Distributor Page</span>
                                       
                                </h1>
                            </div>
<div class="space-6"></div>

<div class="position-relative">
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header green lighter bigger">
                            <i class="ace-icon fa fa-users blue"></i>
                            New distributor Registration
                    </h4>
 <div class="space-6"></div>
<p> Enter your details to begin: </p>
<?php echo form_open('login/register',array('id' => 'register_form')); ?>

  <label class="block clearfix">
      <span class="block input-icon input-icon-right">	
          <input class="form-control" placeholder="First Name" type="text" name="fname" id="fname">
          <?php echo form_error('fname'); ?>
      </span>	
  </label>
 
<label class="block clearfix">
      <span class="block input-icon input-icon-right">
          <input class="form-control" placeholder="Last Name" type="text" name="lname" id="lname"> 
            <?php echo form_error('lname'); ?>
      </span>
  </label>
  
<label class="block clearfix">
      <span class="block input-icon input-icon-right">
          <input class="form-control" placeholder="Contact" type="text" name="contact" id="contact">     
 <?php echo form_error('contact'); ?>      </span>
</label>                                                                                                                                                    

<label class="block clearfix">
    <span class="block input-icon input-icon-right">
        <input class="form-control" placeholder="Email" type="text" name="useremail" id="useremail">
                <i class="ace-icon fa fa-envelope"></i>
    </span>
     <?php echo form_error('useremail'); ?>
</label>
	
<label class="block clearfix">
      <span class="block input-icon input-icon-right">
          <textarea class="form-control" placeholder="Address" name="address" id="address"></textarea>     
      <?php echo form_error('address'); ?></span>   
</label>

        
        <?php $role = $this->loginmodel->getallrole();
		//print_r($module['role']);exit;
		if($role){ ?>
        <select name="role" >                
  
    <?php foreach($role as $model){   ?>
        
            <option value="<?php echo $model->id; ?>"><?php echo  $model->role;?></option>
   <?php  } 
        }?>
        </select>   
    
<label class="block clearfix">
    <span class="block input-icon input-icon-right">
        <input class="form-control" placeholder="Password" type="password" name="password" id="password">
            <i class="ace-icon fa fa-lock"></i>
        <?php echo  form_error('password'); ?>
    </span>
</label>

<label class="block clearfix">
<span class="block input-icon input-icon-right">
<input class="form-control" placeholder="Confirm Password" type="password" name="cn_password" id="cn_password">
<i class="ace-icon fa fa-lock"></i>
<?php echo form_error('cn_password'); ?>
</span>
</label>

<label class="block">
    <input class="ace" type="checkbox" id="agreement" name="agreement" value="" >
<span class="lbl">
I accept the
<a href="#">User Agreement </a>
</span>
</label>
<label id="eror" name="eror">check it</label>


<div class="space-12"></div>
    <button type="reset" class="width-48 pull-left btn btn-sm">
    <i class="ace-icon fa fa-refresh"></i>
    <span class="bigger-110">Reset</span>
    </button>   
    <input type="submit" name="submit" value="Register" class="width-48 pull-right btn btn-sm btn-success" id="submit"/>
    <div class="space-20"></div>                                                 
</div>
</div>
										<div class="toolbar center">
                                                                                    <a href="login" class="back-to-login-link">
<i class="ace-icon fa fa-arrow-left"></i>
Back to login
</a>
</div>
<?php
    echo form_close();
?>
                                        </div><!-- /.widget-body -->
                                        </div><!-- /.signup-box -->
                                </div><!-- /.position-relative -->

                </div>
                </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

		
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
		</script>
	

</body>
</html>
