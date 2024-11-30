<?php
if(isset($this->session->userdata['logged_in']))
{

$user_id=$this->session->userdata['logged_in']['user_id'];
$user_name=$this->session->userdata['logged_in']['user_name'];
$user_type_id=$this->session->userdata['logged_in']['user_type_id'];

}
else
{
    header("location: index");
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Crime Register Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url();?>assets/image/Logo2.ico" rel= "icon">

    <!-- For Popup Model Arrest -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">


    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css"><!--- yes -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themify-icons.css"><!--- yes -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/slicknav.min.css"><!--- yes -->
    


<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/metisMenu.css">
    <!-----DataTable----------->
    <link href="<?php echo base_url();?>assets/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-----For Google Map----------->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

      
    <!-- others css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/typography.css"><!--- yes For Under line -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/default-css.css"><!--- yes For font -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css"><!--- yes Style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/global_tooltip.css"><!--- yes Style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.min.css">
       <!-- For Datepicker css -->
    <!-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->
	
<!-- --------------------------------------------- -->
    
	<style>
	ul li span, ul li i, ul li a i{
	   font-size:17px;
	}
    ul li a{
        text-decoration: none !important;
    }
	.submenu a{
	   font-size:17px;text-decoration: none ;
	}
    label{
        font-size: 15px;
        color: black
    }

    div#cs, div#frt, div#frmf, div#transfer
    {
        display:none;
    }

    /* Style For Tab */

    /* Style the tab */
    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
      background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none; 
  }

    </style>
    <!-- PS disposal page script -->

</head>

<body class="body-bg">
    
    <!-- preloader area start 
    <div id="preloader">
        <div class="loader"></div>
    </div>-->

                    <!-- Header ares start -->
	<div class="header-area header-bottom  bg-primary">
        <div class="mainhe ader-area bg-primary">
			<div class="cont ainer">
                <div class="row align-items-center ">
                    <div class="col-md-3 text-center">
                        <a><img class="mt-1 mb-1" style="height: 100px;" src="<?php echo base_url();?>assets/image/logo2.png" alt="logo"></a>
					</div>
                    <div class="col-md-6 text-center text-white">
                        <h1><b style="font-family: Harrington;color: red">E</b>-Crime Register</h1>
                    </div>

					<div class="col-md-3 text-white text-center mt-3 mb-3">
                        <div class="clea rfix d-md-inline-block d-block">
                            <div class="m-0">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Welcome: <?php echo $user_name;?><i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo site_url('welcome/changepassword');?>">Change Password</a>
                                    <a class="dropdown-item" href="<?php echo site_url('welcome/logout');?>">Log Out</a>
                                </div>
                            </div>
                        </div>
					</div>
								
                </div>
            </div>
		</div>
    </div> 
            <!-- Header ares end --
            <a href="#" class="text-white">Welcome: Hogohly Rural District</a>-->