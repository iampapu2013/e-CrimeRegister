<style>
	input[type=text],
	[type=number] {
		height: auto;
	}

	.from-group .error {
		color: red;

	}

	.colortext {
		color: red;
	}

	#hideDiv {
		margin-left: 40%;
		margin-right: 40%;
		font-size: 23px;
		color: white;
		text-align: center;
		/*border-radius: 25px; */
		width: 330px
	}

	.error {

		color: #FF0000;

	}
</style>

<?php
if (isset($this->session->userdata['logged_in'])) {

	$user_id = $this->session->userdata['logged_in']['user_id'];
	$user_name = $this->session->userdata['logged_in']['user_name'];
	$user_type_id = $this->session->userdata['logged_in']['user_type_id'];

} else {
	header("location: index");
}

?>

<div class="row" style="margin:30px 45px">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<h4 style="text-align: center;margin-top: 13px;color:blue"> Seizure Edit Form </h4>
	</div>
</div>



<form id="arrest_form" style="margin:30px 45px" action="<?php echo site_url('welcome/seizure_data_update'); ?>"
	method="post">

	<?php foreach ($seizure_edit_data as $editseizurerow) {
		//echo $row['arms'];die();
		//For FIR Date ---->
		$edit_arms = $editseizurerow['arms'];
		$fir_date = $editseizurerow['fir_date'];
		$orderdate = explode('-', $fir_date);
		$day = $orderdate[2];
		$month = $orderdate[1];
		$year = $orderdate[0];
		$date = $day . '-' . $month . '-' . $year;
		$case_id = $editseizurerow['case_id'];
		?>

		<!-- <div class="bg-success" id="hideDiv"></?php //echo $this->session->flashdata('seizure_entry_message'); ?></div>
		
		<div class="bg-danger" id="hideDiv"></?php //echo $this->session->flashdata('seizure_entry_error'); ?></div>		 -->
		<div class="container">
			<span style="color:red;text-align: center"><h4><?php echo $editseizurerow['name_of_ps']; ?> Case No. <?php echo $editseizurerow['fir_no']; ?>&nbsp; Dated: <?php echo $date; ?></h4></span><br>
			<input type="hidden" name="case_id" id="case_id" value="<?php echo $case_id ?>">
			<!-- <div class="form-row ">
				<div class="form-group common_input_div col-md-4">
					<label for="seizure_edit_ps">Name of PS: <span style="color: red">&nbsp;*</span></label>
					<select name="seizure_edit_ps" style="height: auto" class="form-control" id="seizure_edit_ps">
						<option value="</?php echo $editseizurerow['ps_id']; ?>">
							</?php echo $editseizurerow['name_of_ps']; ?>
						</option>

						</?php
						$ps = $editseizurerow['ps_id'];
						$getps = getps($ps);
						foreach ($getps as $fatchps) {
							$ps_code = $fatchps['ps_id'];
							$ps_name = $fatchps['name_of_ps'];
							echo "<option value='$ps_code'>$ps_name </option>";
						}
						?>
					</select>
					</?php echo form_error('seizure_edit_ps', '<div style="color:red; font-style: italic;">', '</div>'); ?>
				</div>
				<div class="form-group col-md-4">
					<label for="seizure_edit_fir_no">FIR No.<span style="color: red">&nbsp;*</span></label>
					<input type="text" class="form-control" id="seizure_edit_fir_no"
						value="</?php echo $editseizurerow['fir_no']; ?>" name="seizure_entry_fir_no">

				</div>
				<div class="form-group col-md-4">
					<label for="seizure_edit_fir_date">FIR Date:<span style="color: red">&nbsp;*</span></label>
					<div class='input-group'>
						<input type="text" class="form-control" id="seizure_edit_fir_date" name="seizure_edit_fir_date"
							value="</?php echo $date; ?>" autoco mplete="off" />
					</div>
					</?php echo form_error('seizure_entry_fir_date', '<div style="color:red; font-style: italic;">', '</div>'); ?>
				</div>
			</div> -->


			<div class="row">
				<div class="col-sm-6">
					<div class="form-row ">
						<div class="form-group col-md-3">
							<label for="seizure_edit_arms">Arms:</label>
							<input type="text" name="seizure_edit_arms" id="seizure_edit_arms"
								value="<?php echo $editseizurerow['arms'] ?>" class="form-control">
						</div>
						<div class="form-group col-md-9">
							<label for="seizure_edit_armstype">Type of Arms:</label>
							<input type="text" name="seizure_edit_armstype" id="seizure_edit_armstype" class="form-control"
								value="<?php echo $editseizurerow['arms_type']; ?>">
						</div>
					</div>
					<div class="form-row ">
						<div class="form-group col-md-3">
							<label for="seizure_edit_ammu">Ammunition:</label>
							<input type="text" name="seizure_edit_ammu" id="seizure_edit_ammu"
								value="<?php echo $editseizurerow['ammunition']; ?>" class="form-control">
						</div>
						<div class="form-group col-md-9">
							<label for="seizure_edit_ammutype">Type of Ammunition:</label>
							<input type="text" name="seizure_edit_ammutype" id="seizure_edit_ammutype"
								value="<?php echo $editseizurerow['ammunition_type']; ?>" class="form-control">
						</div>
					</div>
					<div class="form-row ">
						<div class="form-group col-md-6">
							<label for="seizure_edit_exp">Explosive (Kg):</label>
							<input type="text" name="seizure_edit_exp" id="seizure_edit_exp"
								value="<?php echo $editseizurerow['explosive']; ?>" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="seizure_edit_exptype">Type of Explosive:</label>
							<input type="text" name="seizure_edit_exptype" id="seizure_edit_exptype"
								value="<?php echo $editseizurerow['explosive_type']; ?>" class="form-control">
						</div>
					</div>
					<div class="form-row ">
						<div class="form-group col-md-6">
							<label for="seizure_edit_ids">ID LIquor Seizure (Ltrs):</label>
							<input type="text" name="seizure_edit_ids" id="seizure_edit_ids"
								value="<?php echo $editseizurerow['id_seizure']; ?>" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="seizure_edit_idd">ID Liquor Destroy (Ltrs):</label>
							<input type="text" name="seizure_edit_idd" id="seizure_edit_idd"
								value="<?php echo $editseizurerow['id_destroy']; ?>" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="seizure_edit_bomb">Bomb:</label>
							<input type="text" name="seizure_edit_bomb" id="seizure_edit_bomb"
								value="<?php echo $editseizurerow['bomb']; ?>" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="seizure_edit_ganja">Ganja (Kg):</label>
							<input type="text" name="seizure_edit_ganja" ID="seizure_edit_ganja"
								value="<?php echo $editseizurerow['ganja']; ?>" class="form-control">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="seizure_edit_herion">Herion (Kg):</label>
							<input type="text" name="seizure_edit_herion" id="seizure_edit_herion"
								value="<?php echo $editseizurerow['herion']; ?>" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="seizure_edit_fc">Fire Cracker (Kg):</label>
							<input type="text" name="seizure_edit_fc" id="seizure_edit_fc"
								value="<?php echo $editseizurerow['fire_cracker']; ?>" class="form-control">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="seizure_edit_bm">Board Money:</label>
							<input type="text" name="seizure_edit_bm" id="seizure_edit_bm"
								value="<?php echo $editseizurerow['board_money']; ?>" class="form-control">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="seizure_edit_up">Unclaimed Property:</label>
							<input type="text" name="seizure_edit_up" id="seizure_edit_up"
								value="<?php echo $editseizurerow['unclaim_property']; ?>" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="seizure_edit_sp">Suspicious Property:</label>
							<input type="text" name="seizure_edit_sp" id="seizure_edit_sp"
								value="<?php echo $editseizurerow['suspicious_property']; ?>" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group col-md-12">
					<label for="seizure_edit_os">Other Seizure:</label>
					<input type="text" name="seizure_edit_os" id="seizure_edit_os"
						value="<?php echo $editseizurerow['other']; ?>" class="form-control">
				</div>
			</div>
		<?php
	}
	?>

		<div class=" form-group " style="text-align:right">
			<button type="Submit" id="seizure_update" class="btn btn-success">Update</button>
			
		</div>
	</div>
</form>