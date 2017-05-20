<html lang="en">
    <head>
	<body>

</body>
        <meta charset="utf-8">
        <title>Panipatexpoters</title>

        <link href="<?php echo base_url(); ?>assets/css/ace-ie.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" />        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css"/>

        <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function()
            {
                /* $("#login_form").validate(
                 {
                 rules:
                 {
                 username:"required",
                 password:"required"
                 },
                 messages:
                 {
                 username:"Enter user name",
                 password:"Enter password"
                 },
                 submitHandler:function(form)
                 {
                 form.submit();
                 }
                 });*/

            });
            
            
	$(document).ready(function(){
		
		$(".login-error").fadeOut(7000);
		$(".login-error").css({"background-color":"#5CB85C","padding":"2% 4% 2% 4%","width": "92%","margin":"2% 0% 0% 0%","font-weight":"bold"});
                 });
        </script>

    </head>
    <style>
        
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
                     <marquee width="100%" color="white"><font size="20" font color="red" face="Verdana"><b>Panipat</b></font></marquee>
                                <h1>
                                   <!--<i class="icon-leaf green"></i>-->
                                    <span class="">Welcome to Panipat</span>
                                   
                                </h1>

                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <!--<h4 class="header blue lighter bigger">
                                                    <i class="icon-coffee green"></i>
                                                Please Enter Your Information
                                            </h4>-->

                                            <div class="space-6"></div>
                                            <?php echo form_open('login', array('id' => 'login_form')); ?>

                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">                                
                                                    <input class="form-control" id="username" name="username"  placeholder="Username" type="text"><?php echo form_error('username'); ?>
                                                   
                                                </span>
                                            </label>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input class="form-control" id="passowrd" name="password" placeholder="Password" type="password"><?php echo form_error('password'); ?>
                                                    
                                                </span>
                                            </label>
                                            <div class="space"></div>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <!--<label class="inline">
                                                    <input class="ace" name="remember" id="remember" type="checkbox" value="1">
                                                    <span class="lbl"> Remember Me</span>
                                                </label>-->
                                                <input type="submit" name="submit" value="Login"  class="width-35 pull-right btn btn-sm btn-primary" id="submit"/>
                                                <?php
                                                echo form_close();
                                                ?>
                                            </div>

                                        </div><!-- /.widget-main -->

                                        <div class="toolbar clearfix">
                                            
                                            </div>
                                        </div>
                                    </div><!-- /.widget-body -->
                                </div><!-- /.login-box -->
                             
                        </div><!-- /.position-relative -->

                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->


    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement)
            document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
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
