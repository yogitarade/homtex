<?php /*
$hash = base64_encode('admin');
echo $hash;
echo base64_decode($hash);*/
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Luckydraw</title>
        
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
                    $("#forgetpwd_form").validate(
                      {
                        rules:
                        {
                           useremail: {
                            required: true,
                            email: true
                            }
                        },
                          messages:
                        {
                            useremail: "Enter a valid email address"
                        },
                        submitHandler:function(form)
                        {
                            form.submit();
                        }
                     });
                });
	</script>
        
</head>
<style>
    .light-login {
    background: url('<?php echo base_url();?>assets/css/images/pattern.jpg') repeat scroll 0% 0% #DFE0E2;
}
 .error{
    color:#FF0000;
}
</style>

<body class="login-layout light-login">
		<div class="main-container">
		 <div class="main-content">
		    <div class="row">
                     <div class="col-sm-10 col-sm-offset-1">
			<div class="login-container">
                            <div class="center">
                                <h1>
                                    <span class="red">Welcome to</span>
                                        <span class="grey" id="id-text2">Luckydraw</span>
                                </h1>
                            </div>
<div class="space-6"></div>

<div class="position-relative">
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header green lighter bigger">
                            <i class="ace-icon fa fa-users blue"></i>
                          Retrieve Password
                    </h4>
 <div class="space-6"></div>
<p> Enter your details to begin: </p>
<?php echo form_open('login/forgotpassword', array('id' => 'forgetpwd_form')); ?>
  <label class="block clearfix">
    <span class="block input-icon input-icon-right">
        <input class="form-control" placeholder="Email" type="email" name="useremail" id="useremail">
        <i class="ace-icon fa fa-envelope"></i>
    </span>
 </label>
<?php
echo $err;
?>
 
 <div class="clearfix">
    <input type="submit" name="submit" value="Submit" class="width-48 pull-right btn btn-sm btn-success" id="submit"/>
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

	

</body>
</html>