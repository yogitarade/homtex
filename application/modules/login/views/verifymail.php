<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to Bluecheck</title>

        <link href="<?php echo base_url(); ?>assets/css/ace-ie.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" />        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css"/>

        <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>

    </head>
    <style>
        .light-login {
            background: url('<?php echo base_url(); ?>assets/css/images/pattern.jpg') repeat scroll 0% 0% #DFE0E2;
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
                                   <!--<i class="icon-leaf green"></i>-->

                                    <span class="red">Welcome to</span>
                                    <span class="grey" id="id-text2">Bluecheck</span>
                                </h1>

                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                    <!--<i class="icon-coffee green"></i>-->
                                                Please Enter Your Information
                                            </h4>

                                            <div class="space-6"></div>
                                            <?php echo form_open('login', array('id' => 'login_form')); ?>

                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">                                
                                                    <input class="form-control" id="username" name="username" placeholder="Username" type="text"><?php echo form_error('username'); ?>
                                                    <i class="icon-user"></i>
                                                </span>
                                            </label>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input class="form-control" id="passowrd" name="password" placeholder="Password" type="password"><?php echo form_error('password'); ?>
                                                    <i class="icon-lock"></i>
                                                </span>
                                            </label>
                                            <div class="space"></div>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input class="ace" type="checkbox">
                                                    <span class="lbl"> Remember Me</span>
                                                </label>
                                                <input type="submit" name="submit" value="Login"  class="width-35 pull-right btn btn-sm btn-primary" id="submit"/>
                                                <?php
                                                echo form_close();
                                                ?>
                                            </div>

                                        </div><!-- /.widget-main -->

                                        <div class="toolbar clearfix">
                                            <div>
                                                <a href="<?php echo base_url();?>index.php/login/forgotpassword" class="forgot-password-link">
                                                    <i class="icon-left"></i>		
                                                    I forgot my password
                                                </a>
                                            </div>
                                            <div>
                                                <a href="<?php echo base_url(); ?>index.php/login/register" class="user-signup-link">
                                                    I want to register
                                                    <i class="ace-icon fa fa-arrow-right"></i>
                                                </a>
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