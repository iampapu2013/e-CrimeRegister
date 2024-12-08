<style>
	input[type=text],
	[type=number] {
		height: auto;
	}

	.from-group .error {
		color: red;

	}

	.btn-success {
		padding: 8px 16px;
		border-radius: 10px;
	}

	.btn-danger {
		padding: 8px 16px;
		border-radius: 10px;
	}

	.btn-primary {
		padding: 8px 16px;
		border-radius: 10px;
	}
	.btn-secondary{
		padding: 8px 16px;
		border-radius: 10px;
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

	.preview-image {
		width: 140px;
		height: 140px;
		/* //margin-left: 80%;*/
		border-radius: 5px;
		border: 1px;
	}

	#ImgPreview {
		width: 150px;
		height: 150px;
		border-style: double;
	}

	.vtable {
		display: none;
	}
	.atable {
		display: none;
	}
	.stable {
		/* display: none; */
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
	<div class="col-lg-4">

	</div>
	<div class="col-lg-4">
		<h3 style="text-align: center;margin-top: 13px; color: blue;text-decoration: underline;"> CASE ENTRY FORM</h3>
	</div>

</div>

<form id="case_entry_form" style="margin:30px 45px" action="<?php echo site_url('welcome/add_case'); ?>" method="post">
	<!-- <div class="bg-success" id="hideDiv"><?php //echo $this->session->flashdata('case_message'); ?></div>
		<div class="bg-danger" id="hideDiv"><?php //echo $this->session->flashdata('case_duplicate'); ?></div>
		<div class="bg-danger" id="hideDiv"><?php //echo $this->session->flashdata('case_error'); ?></div> -->


	<div class="form-row ">
		<div class="form-group col-md-3">
			<label for="complain">Type of Complain:<span style="color: red">&nbsp;*</span></label>
			<select id="complain" name="complain" style="height: auto" class="form-control">
				<option value="">Type of complain...</option>
				<option value="PS">PS Complain</option>
				<option value="Court">Court Complain</option>
			</select>
			<?php echo form_error('complain', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>
		<div class="form-group common_input_div col-md-3">
			<label for="ps">Name of PS:<span style="color: red">&nbsp;*</span></label>
			<select name="ps" style="height: auto" class="form-control" id="ps">
				<option value="">Select Police Station</option>
				<?php
				foreach ($get_policestation as $row) {
					echo '<option value="' . $row->ps_id . ',' . $row->ps_short_nm . '">' . $row->name_of_ps . '</option>';
				}
				?>
			</select>
			<?php echo form_error('ps', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>
		<div class="form-group col-md-3">

			<label for="fir_no">FIR No.<span style="color: red">&nbsp;*</span></label>
			<input type="text" name="fir_no" id="fir_no" class="form-control">
			<?php echo form_error('fir_no', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>
		<div class="form-group col-md-3">
			<label for="fir_date">FIR Date:<span style="color: red">&nbsp;*</span></label>
			<input type="text" class="form-control" id="fir_date" name="fir_date" autocomplete="off">

			<?php echo form_error('fir_date', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>
	</div>

	<div class="form-group">
		<label for="us">Section of Law:<span style="color: red">&nbsp;*</span></label>
		<input type="text" class="form-control" id="us" name="us" placeholder="section of law">
		<?php echo form_error('us', '<div style="color:red; font-style: italic;">', '</div>'); ?>
	</div>

	<div class="form-row ">
		<div class="form-group col-md-6">
			<label for="crime_head">Crime Head:<span style="color: red">&nbsp;*</span></label>
			<select id="crimehead" name="crime_head" style="height: auto" class="form-control crimehead">
				<option value="" selected>Crime head...</option>
				<?php
				foreach ($get_crime_head as $row1) {
					echo '<option value="' . $row1->crime_head_id . '">' . $row1->crimehead . '</option>';
				}
				?>
			</select>
			<?php echo form_error('crime_head', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>
		<?php
		if ($user_type_id == '1' || $user_type_id == '2') {
			?>
			<div class="form-group col-md-6">
				<label for="crimemethod">Method of Crime:</label>
				<select id="crime_method" name="crime_method" style="height: auto" class="form-control">
					<option value="">Method of crime...</option>
				</select>
			</div>
			<?php
		}
		?>
	</div>
	<div class="form-group">
		<label for="gist">Gist of Case:<span style="color: red">&nbsp;*</span></label>
		<textarea class="form-control" id="gist" name="gist" placeholder="Gist of case"
			Style="height:100px;"></textarea>
		<?php echo form_error('gist', '<div style="color:red; font-style: italic;">', '</div>'); ?>
	</div>

	<div class="form-row ">
		<div class="form-group col-md-9">
			<label for="po">Place of Occurrence:<span style="color: red">&nbsp;*</span></label>
			<input type="text" name="po" id="po" class="form-control">
		</div>
		<div class="form-group col-md-3">
			<label for="do">Date of Occurrence:<span style="color: red">&nbsp;*</span></label>
			<input type="text" class="form-control" name="do" id="do">
		</div>
	</div>

	<div class="form-row ">
		<div class="form-group col-md-9">
			<label for="c_info">Complainant Information:</label>
			<input type="text" name="c_info" id="c_info" class="form-control">
		</div>
		<div class="form-group col-md-2">
			<label for="victim">Victim:</label>
			<input type="text" id="victim" name="victim" class="form-control">
		</div>
		<div class="form-group col-md-1" style="text-align:right">
			<label for="victim">&nbsp;</label>
			<div class="form-group">
				<button type="button" class="btn btn-primary victim_m" disabled><i class="fa fa-plus"></i>&nbsp;Victim
					Add</button>
			</div>
		</div>
	</div>
	<div class="form-row vtable">

		<table class="table table-bordered" id="v_table">
			<thead style="background-color:LightGray;">
				<tr>
					<th style="display:none;">Sl No</th>
					<!-- <th>Sl No</th> -->
					<th>Victim Name</th>
					<th>Father Name</th>
					<th style="width: 400px">Address</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Contact No</th>
					<th style="width: 40px">Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<div class="form-row ">
		<div class="form-group col-md-9">
			<label for="accused">Details of Accused:</label>
			<input type="text" name="accused" id="accused" class="form-control">
			<!-- <input type="text" name="accused" id="accused" class="form-conntrol"placeholder="Details of Accused" style="height: 40px"> -->
		</div>
		<div class="form-group col-md-2">
			<label for="arrest">Arrest:</label>
			<input type="text" id="arrest" name="arrest" class="form-control">
		</div>
		<div class="form-group col-md-1" style="text-align:right">
			<label for="arrest">&nbsp;</label>
			<div class="form-group">
				<button type="button" class="btn btn-primary arrest_m" disabled><i class="fa fa-plus"></i>&nbsp;Arrest
					Add</button>
			</div>
		</div>
	</div>
	<div class="form-row atable">
		<table class="table table-bordered" id="a_table">
			<thead style="background-color:LightGray;">
				<tr>

					<th style="display:none;">Sl No</th>
					<th>Arrest Persons Name</th>
					<th>Nick Name</th>
					<th>Father Name</th>
					<th style="width: 400px">Address</th>
					<th>Mobile No</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Case Link</th>
					<th>Modus Operandi</th>
					<th>Date of Arrest</th>
					<th style="width: 100px">Status</th>
					<th>Identification Mark</th>
					<th style="width: 400px">Image</th>
					<th style="width: 40px">Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<div class="form-row ">
		<div class="form-group col-md-10">
			<label for="p_stolen">Particulars of Properties Stolen/involved:</label>
			<input type="text" name="p_stolen" id="p_stolen" class="form-control">
			<!-- <textarea class="form-control" name="properties_stolen" id="properties_stolen" placeholder="Particulars of Properties Stolen/involved.." style="height: 40px"></textarea> -->
		</div>
		<div class="form-group col-md-2">
			<label for="p_value">Total Value of properties:</label>
			<input type="text" id="p_value" name="p_value" class="form-control">
		</div>
	</div>

	<div class="form-row ">
		<div class="form-group col-md-3">
			<label for="ud_no">UD Case No/Inquest Report:</label>
			<input type="text" name="ud_no" id="ud_no" class="form-control">
		</div>
		<div class="form-group col-md-3">
			<label for="ud_date">UD Date:</label>
			<input type="text" class="form-control" id="ud_date" name="ud_date">
		</div>

		<div class="form-group col-md-2">
			<div class="form-group">
				<label for="seizure">Seizure Details:</label>
				<button type="button" class="btn btn-primary seizure_m"><i class="fa fa-plus"></i>&nbsp;Add Seizure
					Details</button>
			</div>
		</div>
	</div>
	<div class="form-row stable">
		<table class="table table-bordered" id="s_table">
			<thead style="background-color:LightGray;">
				<tr>
					<th style="display:none;">Sl No</th>
					<th>Arms</th>
					<th>Type of Arms</th>
					<th>Ammunition</th>
					<th>Type of Ammunition</th>
					<th>Explosive</th>
					<th>Type of Explosive</th>
					<th>ID Liquor (S)</th>
					<th>ID Liquor (D)</th>
					<th>Bomb</th>
					<th>Ganja</th>
					<th>Herion</th>
					<th>F_Cracker</th>
					<th>Board Money</th>
					<th>Unclaimed Property</th>
					<th>Suspicious Property</th>
					<th>Others</th>
					<th style="width: 40px">Action</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>

	<div class=" form-group " style="text-align:right">
		<button type="Submit" id="v_rowcount" class="btn btn-success">Submit</button>
	</div>
</form>


<!-- Modal for Victim Persons -->

<!-- Modal HTML -->
<div id="v_victim" class="modal fade v_victim">
	<div class="modal-dialog modal-lg"> <!--for Big Model -->
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 class="modal-title font-weight-bold text-white">VICTIM DETAILS</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-row ">
						<div class="form-group col-md-4">
							<label for="nameofps">Name of PS</label>
							<input type="text" class="form-control" id="v_nameofps" name="v_nameofps" readonly>
						</div>
						<div class="form-group col-md-4">
							<label for="m_fir_no">Case No:</label>
							<input type="text" name="v_fir_no" class="form-control" id="v_fir_no" readonly>
						</div>
						<div class="form-group col-md-4">
							<label for="fir_date">Date:</label>
							<div class='input-group'>
								<input type="text" class="form-control" id="v_fir_date" name="v_fir_date" readonly />
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="name">Name:<span style="color: red">&nbsp;*</span></label>
							<input type="text" class="form-control" id="v_name" placeholder="Name..">
						</div>
						<div class="form-group col-md-6">
							<label for="fathername">Father Name:<span style="color: red">&nbsp;*</span></label>
							<input type="text" class="form-control" id="v_fathername" placeholder="Father Name..">
						</div>
					</div>
					<div class="form-group">
						<label for="address">Address:</label>
						<input type="text" name="address" class="form-control" id="v_address" placeholder="Address..">
					</div>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="age">Age:<span style="color: red">&nbsp;*</span></label>
							<input type="text" name="v_age" id="v_age" placeholder="Age.." class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="gender">Gender:<span style="color: red">&nbsp;*</span></label>
							<select name="gender" id="v_gender" class="form-control" style="height: auto">
								<option value="">Gender..</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
								<option value="T">Transgender</option>
							</select>
						</div>
						<div class="form-group col-md-5">
							<label for="contact">Contact No:</label>
							<input type="text" name="v_contact" id="v_contact" placeholder="Contact No.."
								class="form-control">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="add_victim" class="btn btn-primary">Add</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal for Arrest Persons -->

<!-- Modal HTML -->
<div id="a_arrest" class="modal fade arrest">
	<div class="modal-dialog modal-lg"> <!--for Big Model -->
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 class="modal-title font-weight-bold text-white">ARREST PERSON DETAILS</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form>

					<div class="form-row ">
						<div class="form-group col-md-4">
							<!--  <label>Image</label>
									<input accept="image/*" type='file' id="imageInput" name="file"/> -->
						</div>
						<div class="form-group col-md-5"></div>
						<div class="form-group col-md-3">
							<label>
								<h5>Image</h5>
							</label>
							<img id="ImgPreview" />
							<input accept="image/*" type='file' id="imageInput" width="100px" name="file" />
						</div>
					</div>


					<div class="form-row ">
						<div class="form-group col-md-4">
							<label for="nameofps">Name of PS</label>
							<input type="text" class="form-control" id="a_nameofps" name="a_nameofps" readonly>
						</div>
						<div class="form-group col-md-4">
							<label for="am_caseno">Case No:</label>
							<input type="number" name="a_fir_no" class="form-control" id="a_fir_no" readonly>
						</div>
						<div class="form-group col-md-4">
							<label for="a_fir_date">Date:</label>
							<div class='input-group'>
								<input type="text" class="form-control" id="a_fir_date" readonly />
							</div>
						</div>
					</div>
					<!-- Modal for Arrest Persons -->
					<!-- 
						<div class="form-row ">
							<div class="form-group col-md-4"></div>
							<div class="form-group col-md-4"></div>
							<div class="form-group col-md-4">
								<div id="imagePreview" style="text-align: center;"> <i>ACCUSED IMAGE</i></div>
								<input type="file" id="imageInput" accept="image/*" name="Image"multiple>
							</div>
						</div>	 -->

					<div class="form-row ">
						<div class="form-group col-md-4">
							<label for="a_name">Accuse Name:<span style="color: red">&nbsp;*</span></label>
							<input type="text" name="a_name" id="a_name" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="a_nickname">Nick Name:</label>
							<input type="text" name="a_nickname" id="a_nickname" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="a_fathername">Father Name:</label>
							<input type="text" class="form-control" name="a_fathername" id="a_fathername">
						</div>
					</div>
					<div class="form-group ">
						<label for="a_address">Address:</label>
						<input type="text" class="form-control" id="a_address" name="a_address">
						<!-- <span style="color:red"><?php //echo form_error('us'); ?></span> -->
					</div>
					<div class="form-row ">
						<div class="form-group col-md-4">
							<label for="a_mobile">Accuse Mobile No:</label>
							<input type="text" name="a_mobile" id="a_mobile" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="a_age">Age:<span style="color: red">&nbsp;*</span></label>
							<input type="text" name="a_age" id="a_age" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="a_gender">Gender:<span style="color: red">&nbsp;*</span></label>
							<select name="a_gender" id="a_gender" class="form-control" style="height: auto">
								<option value="">Gender..</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
								<option value="T">Transgender</option>
							</select>
						</div>
					</div>
					<div class="form-group ">
						<label for="a_caselink">Any Other Case Link:<span style="color: red">&nbsp;*</span></label>
						<input type="text" class="form-control" id="a_caselink" name="a_caselink">
					</div>
					<div class="form-row ">
						<div class="form-group col-md-4">
							<label for="a_modus">Modus Operandi:<span style="color: red">&nbsp;*</span></label>
							<input type="text" name="a_modus" id="a_modus" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="a_date">Arrest Date:<span style="color: red">&nbsp;*</span></label>
							<input type="text" name="a_date" id="a_date" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="a_status">Status:<span style="color: red">&nbsp;*</span></label>
							<select id="a_status" name="a_status" class="form-control" style="height:auto">
								<option value="">Status of Criminal...</option>
								<option>Bailed out from PS</option>
								<option>Forwarded</option>
							</select>
						</div>

					</div>
					<div class="form-group ">
						<label for="a_physical">Physical Identification Mark:</label>
						<input type="text" class="form-control" id="a_physical" name="a_physical">
					</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="add_arrest" class="btn btn-primary">Add</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal for Seizure Details--->
<!-- Modal HTML -->
<div id="s_seizure" class="modal fade ">
	<div class="modal-dialog modal-lg"> <!--for Big Model -->
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 class="modal-title font-weight-bold text-white">SEIZURE DETAILS</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-row ">
						<div class="form-group col-md-4">
							<label for="nameofps">Name of PS</label>
							<input type="text" class="form-control" name="s_nameofps" id="s_nameofps" readonly>
						</div>
						<div class="form-group col-md-4">
							<label for="caseno">Case No:</label>
							<input type="number" name="s_fir_no" id="s_fir_no" class="form-control" readonly>
						</div>
						<div class="form-group col-md-4">
							<label for="firdate">Date:</label>
							<div class='input-group'>
								<input type="text" name="s_fir_date" class="form-control" id="s_fir_date" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-row ">
								<div class="form-group col-md-3">
									<label for="s_arms">Arms:</label>
									<input type="text" name="s_arms" id="s_arms" class="form-control">
								</div>
								<div class="form-group col-md-9">
									<label for="st_arms">Type of Arms:</label>
									<input type="text" name="st_arms" id="st_arms" class="form-control">
								</div>
							</div>
							<div class="form-row ">
								<div class="form-group col-md-3">
									<label for="s_ammu">Ammunition:</label>
									<input type="text" name="s_ammu" id="s_ammu" class="form-control">
								</div>
								<div class="form-group col-md-9">
									<label for="s_ta">Type of Ammunition:</label>
									<input type="text" name="s_ta" id="s_ta" class="form-control">
								</div>
							</div>
							<div class="form-row ">
								<div class="form-group col-md-6">
									<label for="s_exp">Explosive (Kg):</label>
									<input type="text" name="s_exp" id="s_exp" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label for="s_te">Type of Explosive:</label>
									<input type="text" name="s_te" id="s_te" class="form-control">
								</div>
							</div>
							<div class="form-row ">
								<div class="form-group col-md-6">
									<label for="s_ids">ID LIquor Seizure (Ltrs):</label>
									<input type="text" name="s_ids" id="s_ids" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label for="s_idd">ID Liquor Destroy (Ltrs):</label>
									<input type="text" name="s_idd" id="s_idd" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="s_bomb">Bomb:</label>
									<input type="text" name="s_bomb" id="s_bomb" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label for="s_ganja">Ganja (Kg):</label>
									<input type="text" name="s_ganja" ID="s_ganja" class="form-control">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="s_herion">Herion (Kg):</label>
									<input type="text" name="s_herion" id="s_herion" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label for="s_fc">Fire Cracker (Kg):</label>
									<input type="text" name="s_fc" id="s_fc" class="form-control">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="s_bm">Board Money:</label>
									<input type="text" name="s_bm" id="s_bm" class="form-control">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="s_up">Unclaimed Property:</label>
									<input type="text" name="s_up" id="s_up" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label for="s_sp">Suspicious Property:</label>
									<input type="text" name="s_sp" id="s_sp" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="s_os">Other Seizure:</label>
							<input type="text" name="s_os" id="s_os" class="form-control">
						</div>
					</div>
				</form>
				<div class="modal-footer">
					<button type="button" id="add_seizure" class="btn btn-primary">Add</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

				</div>
			</div>
		</div>
	</div>
</div>