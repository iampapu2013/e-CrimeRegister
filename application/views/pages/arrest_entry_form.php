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

	#ImgPreview {
		width: 150px;
		height: 150px;
		border-style: double;

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
		<h3 style="text-align: center;margin-top: 13px; color: blue;text-decoration: underline;"> ARREST PERSON ENTRY</h3>

	</div>
</div>


<!-- <h4 style="text-align: center;margin-top: 13px"> Case Entry Form </h4>


<div style="margin -left: 3px; background-color: gray; "><button type="button" style=""  class="btn btn-primary float-right  ">View All Case</button></div> -->


<form id="arrest_form" style="margin:30px 45px" action="<?php echo site_url('welcome/add_arrest_person'); ?>"
	enctype="multipart/form-data" method="post">
	<!-- <div class="bg-success" id="hideDiv"><?php //echo $this->session->flashdata('arrest_entry_message'); ?></div>
		<div class="bg-danger" id="hideDiv"><?php //echo $this->session->flashdata('arrest_entry_error'); ?></div>		 -->
	<div class="container">

		<div class="form-row ">
			<div class="form-group col-md-4">
				<!--  <label>Image</label>
									<input accept="image/*" type='file' id="imageInput" name="file"/> -->
			</div>
			<div class="form-group col-md-5"></div>
			<div class="form-group col-md-3">
				<div style="padding-left: 40px">
					<h5>Image</h5>
				</div>
				<img id="ImgPreview" name="arrest_image" />
				<input accept="image/*" type='file' id="imageInput" name="arrest_image" width="100px" name="file" />
				<span class="star"><small>(File size must not be greater than 40KB)</small></span>
				<?php echo form_error('arrest_image', '<div style="color:red; font-style: italic;">', '</div>'); ?>
			</div>
			<!-- <div class="form-group col-md-3">
							   <div style="padding-left: 40px"><h5>Image</h5></div>
							   <img id="ImgPreview"/>
							   <input accept="image/*" type='file' id="imageInput" width="100px" name="file"/>
						</div> -->
		</div>
		<div class="form-row ">
			<div class="form-group common_input_div col-md-4">
				<label for="arrest_entry_ps">Name of PS:<span style="color: red">&nbsp;*</span></label>
				<select name="arrest_entry_ps" style="height: auto" class="form-control" id="arrest_entry_ps">
					<option value="">Select Police Station</option>
					<?php
					foreach ($get_policestation as $row) {
						echo '<option value="' . $row->ps_id . ',' . $row->ps_short_nm . '">' . $row->name_of_ps . '</option>';
					}
					?>
				</select>
				<?php echo form_error('arrest_entry_ps', '<div style="color:red; font-style: italic;">', '</div>'); ?>
			</div>
			<div class="form-group col-md-4">
				<label for="arrest_entry_fir_no">FIR No.<span style="color: red">&nbsp;*</span></label>
				<input type="text" class="form-control" id="arrest_entry_fir_no" name="arrest_entry_fir_no">
				<?php echo form_error('arrest_entry_fir_no', '<div style="color:red; font-style: italic;">', '</div>'); ?>
			</div>
			<div class="form-group col-md-4">
				<label for="arrest_entry_fir_date">FIR Date:<span style="color: red">&nbsp;*</span></label>
				<div class='input-group'>
					<input type="text" class="form-control" id="arrest_entry_fir_date" name="arrest_entry_fir_date"
						autocomplete="off" />
				</div>
				<?php echo form_error('arrest_entry_fir_date', '<div style="color:red; font-style: italic;">', '</div>'); ?>
			</div>
		</div>
		<div class="form-row ">
			<div class="form-group col-md-4">
				<label for="acc_name">Accuse Name:</label>
				<input type="text" name="acc_name" id="acc_name" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="acc_nickname">Nick Name:</label>
				<input type="text" name="acc_nickname" id="acc_nickname" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="acc_fathername">Father Name:</label>
				<input type="text" class="form-control" name="acc_fathername" id="acc_fathername">
			</div>
		</div>
		<div class="form-group ">
			<label for="acc_address">Address:</label>
			<input type="text" class="form-control" id="acc_address" name="acc_address">
			<!-- <span style="color:red"><?php //echo form_error('us'); ?></span> -->
		</div>
		<div class="form-row ">
			<div class="form-group col-md-4">
				<label for="acc_mobile">Accuse Mobile No:</label>
				<input type="text" name="acc_mobile" id="acc_mobile" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="acc_age">Age:</label>
				<input type="text" name="acc_age" id="acc_age" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="acc_gender">Gender:</label>
				<select name="acc_gender" id="acc_gender" class="form-control" style="height: auto">
					<option value="">Gender..</option>
					<option value="M">Male</option>
					<option value="F">Female</option>
					<option value="T">Transgender</option>
				</select>
			</div>
		</div>
		<div class="form-group ">
			<label for="acc_caselink">Any Other Case Link:</label>
			<input type="text" class="form-control" id="acc_caselink" name="acc_caselink">
			<!-- <span style="color:red"><?php //echo form_error('us'); ?></span> -->
		</div>
		<div class="form-row ">
			<div class="form-group col-md-4">
				<label for="acc_modus">Modus Operandi:</label>
				<input type="text" name="acc_modus" id="acc_modus" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="acc_arrestdate">Arrest Date:</label>
				<input type="text" name="acc_arrestdate" id="acc_arrestdate" class="form-control" autocomplete="off">
			</div>
			<div class="form-group col-md-4">
				<label for="acc_status">Status:</label>
				<select name="acc_status" id="acc_status" class="form-control" style="height: auto">
					<option value="">Status of Criminal...</option>
					<option value="Bailed out from PS">Bailed out from PS</option>
					<option value="Forwarded">Forwarded</option>
				</select>
			</div>
		</div>
		<div class="form-group ">
			<label for="acc_physical">Physical Identification Mark:</label>
			<input type="text" class="form-control" id="acc_physical" name="acc_physical">
			<!-- <span style="color:red"><?php //echo form_error('us'); ?></span> -->
		</div>

		<div class=" form-group " style="text-align:right">
			<button type="Submit" id="arrest_entry" class="btn btn-success">Submit</button>
			<button type="button" class="btn btn-danger">Cancel</button>
		</div>
	</div>
</form>