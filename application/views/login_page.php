<!DOCTYPE html>
<html>
<head> 
<title>	Crimeregisterpro</title>
	<link href="image/WBlogo.ico" rel= "icon">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css"> <!--- yes -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body> 

	<!---------- For Header Portion------------>
	
		
		<div id="header" >Hooghly Rural Police District </div>
	
		
	<div class="row">
		<div class="col-2 col-s-2" style="text-align:center;"><img src="assets/image/Logo.png"/></div>
		<div class="col-8 col-s-8 center">Crime Register Pro</div>
		<div class="col-2 col-s-2 login"><span style="border:1px solid white;border-radius:5px;padding:2px 5px; font-size:20px; cursor:pointer;" onclick="document.getElementById('id01').style.display='block'">Login</span></div>
	</div>
	
<div style="margin:0% 30%">
	<form  action="<?php //echo site_url('welcome/loginprocess');?>" method="post">
			<h2 style="color:red"><?php 
				echo validation_errors();
			?></h2>

					<label for="uname" style="color:white;font-size:16px;"> Username</label>
					<input type="text" placeholder="Enter Username" name="user_id" id="user_id" >	
					
					<label for="psw" style="color:white;font-size:16px;"> Password</label>
					<input type="password" placeholder="Enter Password" name="user_password" id="user_password">
			
					<a href="<?php echo site_url('welcome/dashbordpage');?>"><button type="button"> Login... </button></a>
				
					<label style="color:white;">
						<input type="checkbox" checked="checked" name="remember" > Remember me
					</label>
					</form>
		</div>




	<!---------- For Popup Login Form
	
	<div id="id01" class="modal">	
	<form class="modal-content animate" action="<?php echo site_url('welcome/loginprocess');?>" method="post">
		<div class="imgcontainer">
				<span onClick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				<img src="image/Logo.png" alt="WBlogo" class="logo2">
				
		</div>
		<div class="container">
			<?php 
				echo validation_errors();
			?>
					<label for="uname" style="color:white;font-size:16px;"> Username</label>
					<input type="text" placeholder="Enter Username" name="user_id" id="user_id" >	
					
					<label for="psw" style="color:white;font-size:16px;"> Password</label>
					<input type="password" placeholder="Enter Password" name="user_password" id="user_password">
			
					<button type="submit"> Login </button>
				
					<label style="color:white;">
						<input type="checkbox" checked="checked" name="remember" > Remember me
					</label>
		</div>
			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onClick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				
				
			</div>
	</form>
	</div>
	
	
	
	<!---------- For footer portion------------>
	
	<div class="login_footer" style="position: fixed; left: 0;  bottom: 0;width:100%">
<p >Contents provided by the Superintendent of Police Hooghly Rural, West Bengal. Site Designed, Hosted and Maintained by District Crime Records Bureau</p> <p style="font-size:13px">Best Viewed in Google Chrome/Firefox 60.0 or Later.</p>

</div>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>