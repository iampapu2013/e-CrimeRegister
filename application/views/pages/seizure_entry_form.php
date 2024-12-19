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
		<h3 style="text-align: center;margin-top: 13px; color: blue;text-decoration: underline;">SEIZURE ENTRY</h3>
	</div>
</div>



<form  id="arrest_form" style="margin:30px 45px" action="<?php echo site_url('welcome/add_new_seizure');?>" method="post">
		<!-- <div class="bg-success" id="hideDiv"><?php echo $this->session->flashdata('seizure_entry_message');?></div> -->
		
		<div class="bg-danger" id="hideDiv"><?php echo $this->session->flashdata('seizure_entry_error');?></div>		
		<div class="container">
	
				<div class="form-row ">
						<div class="form-group common_input_div col-md-4">
								<label for="seizure_entry_ps">Name of PS: <span style="color: red">&nbsp;*</span></label>
								<select name="seizure_entry_ps" style="height: auto"class="form-control" id="seizure_entry_ps" >
										<option value="" >Select Police Station</option>
										<?php 
										foreach($get_policestation as $row){echo '<option value="'.$row->ps_id.','.$row->ps_short_nm.','.$row->name_of_ps.'">'.$row->name_of_ps.'</option>';}
										?>
								</select>
								<?php echo form_error('seizure_entry_ps','<div style="color:red; font-style: italic;">', '</div>'); ?>	
						</div>
						<div class="form-group col-md-4">
								<label for="seizure_entry_gde_no">GDE No.<span style="color: red">&nbsp;*</span></label>
								<input type="text" class="form-control" id="seizure_entry_gde_no" name="seizure_entry_gde_no">
								<?php echo form_error('seizure_entry_gde_no','<div style="color:red; font-style: italic;">', '</div>'); ?>
								
						</div>
						<div class="form-group col-md-4">
								<label for="seizure_entry_gde_date" >GDE Date:<span style="color: red">&nbsp;*</span></label>
									<div class='input-group' >
										<input type="text" class="form-control" id="seizure_entry_gde_date" name="seizure_entry_gde_date" autoco mplete="off" />
									</div>
								<?php echo form_error('seizure_entry_gde_date','<div style="color:red; font-style: italic;">', '</div>'); ?>	
						</div>
				</div>

			
					<div class="row"> 
						<div class="col-sm-6">
							<div class="form-row ">
								<div class="form-group col-md-3">
									<label for="seizure_entry_arms">Arms:</label>
									<input type="text" value="" name="seizure_entry_arms" id="seizure_entry_arms" class="form-control">
								</div>
								<div class="form-group col-md-9">
									<label for="seizure_entry_armstype">Type of Arms:</label>
									<input type="text" name="seizure_entry_armstype" id="seizure_entry_armstype" class="form-control">
								</div>
							</div>
							<div class="form-row ">
								<div class="form-group col-md-3">
									<label for="seizure_entry_ammu">Ammunition:</label>
									<input type="text" name="seizure_entry_ammu" id="seizure_entry_ammu" class="form-control">
								</div>
								<div class="form-group col-md-9" >
									<label for="seizure_entry_ammutype">Type of Ammunition:</label>
									<input type="text" name="seizure_entry_ammutype" id="seizure_entry_ammutype" class="form-control">
								</div>
							</div>
							<div class="form-row ">
								<div class="form-group col-md-6">
									<label for="seizure_entry_exp">Explosive (Kg):</label>
									<input type="text" name="seizure_entry_exp" id="seizure_entry_exp" class="form-control">
								</div>
								<div class="form-group col-md-6" >
									<label for="seizure_entry_exptype">Type of Explosive:</label>
									<input type="text" name="seizure_entry_exptype" id="seizure_entry_exptype" class="form-control">
								</div>
							</div>
							<div class="form-row ">
								<div class="form-group col-md-6">
									<label for="seizure_entry_ids">ID LIquor Seizure (Ltrs):</label>
									<input type="text" name="seizure_entry_ids" id="seizure_entry_ids" class="form-control">
								</div>
								<div class="form-group col-md-6" >
									<label for="seizure_entry_idd">ID Liquor Destroy (Ltrs):</label>
									<input type="text" name="seizure_entry_idd" id="seizure_entry_idd" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-row">
								<div class="form-group col-md-6" >
									<label for="seizure_entry_bomb">Bomb:</label>
									<input type="text" name="seizure_entry_bomb" id="seizure_entry_bomb" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label for="seizure_entry_ganja" >Ganja (Kg):</label>
									<input type="text" name="seizure_entry_ganja" ID="seizure_entry_ganja" class="form-control">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6" >
									<label for="seizure_entry_herion">Herion (Kg):</label>
									<input type="text" name="seizure_entry_herion" id="seizure_entry_herion" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label for="seizure_entry_fc" >Fire Cracker (Kg):</label>
									<input type="text" name="seizure_entry_fc" id="seizure_entry_fc" class="form-control">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6" >
									<label for="seizure_entry_bm">Board Money:</label>
									<input type="text" name="seizure_entry_bm" id="seizure_entry_bm" class="form-control">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6" >
									<label for="seizure_entry_up">Unclaimed Property:</label>
									<input type="text" name="seizure_entry_up" id="seizure_entry_up" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label for="seizure_entry_sp" >Suspicious Property:</label>
									<input type="text" name="seizure_entry_sp" id="seizure_entry_sp" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="seizure_entry_os" >Other Seizure:</label>
							<input type="text" name="seizure_entry_os" id="seizure_entry_os" class="form-control">
						</div>
					</div> 


				<div class=" form-group " style="text-align:right">
						<button type="Submit" id="seizure_entry" class="btn btn-success">Submit</button>
						<button type="button" class="btn btn-danger">Cancel</button>
				</div>
		</div>
</form>
