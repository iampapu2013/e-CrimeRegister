<style>
input[type=text],[type=number]{
	height: auto;
}
.from-group .error{
	color: red;
	
}
.colortext{
	color:red;
}
#hideDiv{
	margin-left: 40%;
	margin-right: 40%;
	font-size: 23px;
	color: white; 
	text-align: center; 
	/*border-radius: 25px; */
	width:330px
	}
.error{

  color: #FF0000;

}
</style>

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

<div class="row" style="margin:30px 45px">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<h4 style="text-align: center;margin-top: 13px"> Victim Entry </h4>
	</div>
</div>


	<!-- <h4 style="text-align: center;margin-top: 13px"> Case Entry Form </h4>


<div style="margin -left: 3px; background-color: gray; "><button type="button" style=""  class="btn btn-primary float-right  ">View All Case</button></div> -->


<form  id="victim_entry_form" style="margin:30px 45px" action="<?php echo site_url('welcome/add_victim');?>" method="post">
		<div class="bg-success" id="hideDiv"><?php echo $this->session->flashdata('case_message');?></div>
		<div class="bg-danger" id="hideDiv"><?php echo $this->session->flashdata('case_duplicate');?></div>
		<div class="bg-danger" id="hideDiv"><?php echo $this->session->flashdata('case_error');?></div>		
		<div class="container">
	
				<div class="form-row ">
						<div class="form-group common_input_div col-md-4">
								<label for="victim_ps">Name of PS:<span style="color: red">&nbsp;*</span></label>
								<select name="victim_ps" style="height: auto"class="form-control" id="victim_ps" >
										<option value="" >Select Police Station</option>
										<?php 
										foreach($get_policestation as $row){echo '<option value="'.$row->ps_id.','.$row->ps_short_nm.'">'.$row->name_of_ps.'</option>';}
										?>
								</select>
								<?php echo form_error('victim_ps','<div style="color:red; font-style: italic;">', '</div>'); ?>
						</div>
						<div class="form-group col-md-4">
								<label for="victim_fir_no">FIR No.<span style="color: red">&nbsp;*</span></label>
								<input type="text" class="form-control" id="victim_fir_no" name="victim_fir_no">
								<?php echo form_error('victim_fir_no','<div style="color:red; font-style: italic;">', '</div>'); ?>
						</div>
						<div class="form-group col-md-4">
								<label for="victim_fir_date" >FIR Date:<span style="color: red">&nbsp;*</span></label>
									<div class='input-group' >
										<input type="text" class="form-control" id="victim_fir_date" name="victim_fir_date" autoco mplete="off" />
									</div>
								<?php echo form_error('victim_fir_date','<div style="color:red; font-style: italic;">', '</div>'); ?>	
						</div>
				</div>

				<div class="form-row">
						<div class="form-group col-md-6">
							<label for="victim_name_form">Victim Name:<span style="color: red">&nbsp;*</span></label>
							<input type="text" class="form-control" name="victim_name_form" id="victim_name_form" placeholder="Victim Name..">
							<?php echo form_error('victim_name_form','<div style="color:red; font-style: italic;">', '</div>'); ?>	
						</div>
						<div class="form-group col-md-6">
							<label for="victim_fathername_form">Father Name:<span style="color: red">&nbsp;*</span></label>
							<input type="text" class="form-control" name="victim_fathername_form" id="victim_fathername_form" placeholder="Victim Father Name..">
							<?php echo form_error('victim_fathername_form','<div style="color:red; font-style: italic;">', '</div>'); ?>
						</div>	
				</div> 
				<div class="form-group">
						<label for="victim_address_form">Address:<span style="color: red">&nbsp;*</span></label>
						<input type="text" name="victim_address_form" class="form-control" id="victim_address_form" placeholder="Victim Address..">
						<?php echo form_error('victim_address_form','<div style="color:red; font-style: italic;">', '</div>'); ?>
				</div> 
				<div class="form-row">
						<div class="form-group col-md-3">
							<label for="victim_age_form">Age:<span style="color: red">&nbsp;*</span></label>
							<input type="text" name="victim_age_form" id="victim_age_form" placeholder="Victim Age.." class="form-control">
							<?php echo form_error('victim_age_form','<div style="color:red; font-style: italic;">', '</div>'); ?>
						</div>
						<div class="form-group col-md-4">
								<label for="victim_gender_form">Gender:<span style="color: red">&nbsp;*</span></label>
							<select name="victim_gender_form" id="victim_gender_form" class="form-control" style="height: auto">
								<option value="">Gender..</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
								<option value="T">Transgender</option>
							</select>
							<?php echo form_error('victim_gender_form','<div style="color:red; font-style: italic;">', '</div>'); ?>
						</div>
						<div class="form-group col-md-5">
							<label for="victim_contact_form">Contact No:</label>
							<input type="text" name="victim_contact_form" id="victim_contact_form" placeholder="Victim Contact No.." class="form-control">
						</div>
				</div>

				<div class=" form-group " style="text-align:right">
						<button type="Submit" id="add_victim" class="btn btn-success">Submit</button>
						<button type="button" class="btn btn-danger">Cancel</button>
				</div>
		</div>
</form>
