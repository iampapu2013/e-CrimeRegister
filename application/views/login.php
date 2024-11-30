<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Crime Register Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url();?>assets/image/WBlogo.ico" rel= "icon">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css"> <!--- yes -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css"><!--- yes -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themify-icons.css"><!--- yes -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/slicknav.min.css"><!--- yes -->
    <!-- others css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/typography.css"><!--- yes For Under line -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/default-css.css"><!--- yes For font -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css"><!--- yes Style -->
    <!-- For Datepicker css -->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
    <!-- For Popup Model Arrest -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->

    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--50 ">
                <form action="<?php echo site_url('welcome/loginprocess');?>" method="post">
                    <div>
                    <div class="border" style="padding:15px 0; background-color: rgba(51, 148, 255, 0.9); text-align: center">
                        <div style="width:15%; margin:0 auto; " ><img src="<?php echo base_url();?>assets/image/logo.png"/></div>
                        <h4 class="mt-3 text-white font-weight-bold">Sign In</h4>
                        <p ><h5 class="text-white"><b style="font-family: Harrington;color: red">E</b>-Crime Register</h5></p>
                    </div>
                </div>
                    <div class="login-form-body border "> 
                        <div class="form-gp">
                            <label for="user_id">User ID</label>
                            <input type="text" name="user_id" id="user_id">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="user_password">Password</label>
                            <input type="password" name="user_password" id="user_password">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                       <!--<div class="alert-area" style="display: none;">
                            <div class="alert alert-danger" role="alert">
                                <?php echo validation_errors();
                        echo $this->session->flashdata('login_message_display');?> 
                            </div>
                        </div>-->

                        <?php if($this->session->flashdata('login_message_display')){?>
                        <div class="alert alert-danger">      
                             <?php echo $this->session->flashdata('login_message_display')?>
                            
                      </div>
                    <?php } ?>




                       <!-- <div class="alert alert-danger">
                       <h6 class="text-danger">
                        <?php echo validation_errors();
                        echo $this->session->flashdata('login_message_display');?> </h6>-->



                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>
                            <!--<div class="col-6 text-right">
                                <a href="#">Forgot Password?</a>
                            </div>-->
                        </div>
                        <div class="submit-btn-area bg-secenda">
                          <button type="submit" class="font-weight-bold" style="font-size: 17px"> Login <i class="fa fa-sign-in" Style="margin-right:3px;"></i></button>
                           
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <script src="<?php echo base_url();?>assets/js/vendor/jquery-2.2.4.min.js"></script> <!--yes ????????-->
    <!-- bootstrap 4 js -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script><!--yes for responsive navbar-->
    <script src="<?php echo base_url();?>assets/js/metisMenu.min.js"></script><!--yes for responsive navbar-->
    <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script><!--yes for responsive navbar-->
    <script src="<?php echo base_url();?>assets/js/jquery.slicknav.min.js"></script><!--yes for responsive navbar-->
    <!-- others plugins -->
    <script src="<?php echo base_url();?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url();?>assets/js/scripts.js"></script>

    <!--For Date picker-->
    <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/gijgo.min.js" type="text/javascript"></script>
     <script src="<?php echo base_url();?>assets/js/main.js"></script>
</body>

</html>