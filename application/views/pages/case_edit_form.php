<style>
	input[type=text],
	[type=number] {
		height: auto;
	}

	.from-group .error {
		color: red;

	}

	.btn-secondary {
		padding: 8px 16px;
		border-radius: 10px;
	}

	.colortext {
		color: red;
	}

	.btneditvictim {
		background-color: DodgerBlue;
		border: none;
		color: white;
		padding: 12px 16px;
		font-size: 16px;
		cursor: pointer;
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

	.v_input_box {
		/*border: none;
	background-color: transparent;*/
	}

	.a_input_box {
		/*width:30px;
	border: none;
	background-color: transparent;*/
		overflow-wrap: break-word;
		/*white-space:pre-wrap*/

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
	<h3 style="text-align: center;margin-top: 13px; color: blue;text-decoration: underline;"> CASE EDIT FORM</h3>
	</div>
	<!-- </?php
	//if ($user_type_id == '6') {


		?>
		<div class="col-lg-4"><a href="<?php echo site_url('welcome/admin_caseentry'); ?>"Style="font-size:16px"><button type="button" class="btn btn-warning float-right" style="color:blue"><B>VIEW ALL CASE</B></button></a></div>
			
		
		</?php
	//}
	?> -->
</div>


<!-- <h4 style="text-align: center;margin-top: 13px"> Case Entry Form </h4>


<div style="margin -left: 3px; background-color: gray; "><button type="button" style=""  class="btn btn-primary float-right  ">View All Case</button></div> -->


<form id="case_edit_form" style="margin:30px 45px" action="<?php echo site_url('welcome/case_edit'); ?>" method="post">
	<!-- <div class="bg-success" id="hideDiv"></?php //echo $this->session->flashdata('case_edit_message');    ?></div> 
	<!-<div class="bg-danger" id="hideDiv"></?php //echo $this->session->flashdata('case_duplicate');    ?></div> -->
	<!-- <div class="bg-danger" id="hideDiv"></?php //echo $this->session->flashdata('case_error');    ?></div> -->
	<input type="text" class="form-control" id="userid" name="userid" value="<?php echo $user_id; ?>"
	readonly>
	<?php foreach ($edit_case as $row) {
		//For FIR Date ---->
		$fir_date = $row['fir_date'];
		$orderdate = explode('-', $fir_date);
		$day = $orderdate[2];
		$month = $orderdate[1];
		$year = $orderdate[0];
		$date = $day . '-' . $month . '-' . $year;
		?>


		<div class="form-row ">
			<!--For Case ID -->
			<input type="hidden" name="case_id" id="case_id" value="<?php echo $row['case_id']; ?>">

			<div class="form-group col-md-3">
				<label for="complain">Type of Complain:</label>
				<select id="complain" name="complain" style="height: auto" class="form-control">
					<option value="<?php echo $row['complain']; ?>">
						<?php echo $row['complain']; ?> Complain
					</option>
					<?php
					$complain = $row['complain'];

					if ($complain == 'PS') {
						echo "<option value='Court'>Court Complain</option>";
					} else {
						echo "<option value='PS'>PS Complain</option>";
					}
					?>

				</select>
				<span style="color:red">
					<?php echo form_error('complain'); ?>
				</span>
			</div>

			<div class="form-group common_input_div col-md-3">
				<label for="ps">Name of PS:</label>

				<select name="ps" style="height: auto; pointer-events: none;" class="form-control" id="ps" readonly>
					<option value="<?php echo $row['ps_id']; ?>">
						<?php echo $row['name_of_ps']; ?>
					</option>

					<?php
					$ps = $row['ps_id'];
					$getps = getps($ps);
					foreach ($getps as $fatchps) {
						$ps_code = $fatchps['ps_id'];
						$ps_name = $fatchps['name_of_ps'];
						echo "<option value='$ps_code'>$ps_name </option>";
					}
					?>
				</select>
				<span style="color: red">
					<?php echo form_error('ps') ?>
				</span>
			</div>

			<div class="form-group col-md-3">
				<label for="fir_no">FIR No.</label>
				<input type="text" class="form-control" id="fir_no" name="fir_no" value="<?php echo $row['fir_no']; ?>"
					readonly>
				<?php echo form_error('fir_no', '<div style="color:red">', '</div>'); ?>
			</div>

			<div class="form-group col-md-3">
				<label for="fir_date">FIR Date:</label>
				<div class='input-group'>
					<input type="text" class="form-control" id="fir_date" name="fir_date" value="<?php echo $date; ?>"
						autoco mplete="off" style="pointer-events: none;" readonly />
				</div>
				<span style="color:red">
					<?php echo form_error('fir_date'); ?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label for="us">Section of Law:</label>
			<input type="text" class="form-control" id="us" name="us" placeholder="section of law"
				value="<?php echo $row['us']; ?>">
			<span style="color:red">
				<?php echo form_error('us'); ?>
			</span>
		</div>

		<div class="form-row ">
			<div class="form-group col-md-6">
				<label for="crime_head">Crime Head:</label>
				<select id="crimehead" name="crime_head" style="height: auto" class="form-control crimehead">
					<option value="<?php echo $row['crime_head_id']; ?>">
						<?php echo $row['crimehead']; ?>
					</option>
					<?php
					$crimehead = $row['crime_head_id'];
					$getcrimehead = getcrimehead($crimehead);
					foreach ($getcrimehead as $fatchcrimehead) {
						$crime_code = $fatchcrimehead['crime_head_id'];
						$crime_name = $fatchcrimehead['crimehead'];
						echo "<option value='$crime_code'>$crime_name </option>";
					}
					?>
				</select>
				<span style="color:red">
					<?php echo form_error('crime_head'); ?>
				</span>
			</div>
			<?php
			if ($user_type_id == '1' || $user_type_id == '2') {


				?>
				<div class="form-group col-md-6">
					<label for="crimemethod">Method of Crime:</label>
					<select id="crime_method" name="crime_method" style="height: auto" class="form-control">
						<option value="">Method of crime...</option>
						<?php
						$crimehead = $row['crime_head_id'];
						$getcrimemethod = getcrimemethod($crimehead);
						foreach ($getcrimemethod as $fatchcrimemethod) {
							$crime_method_code = $fatchcrimemethod['crime_method_id'];
							$crime_method_name = $fatchcrimemethod['crimemethod'];
							echo "<option value='$crime_method_code'>$crime_method_name </option>";
						}
						?>
					</select>
				</div>
				<?php
			}
			?>
		</div>

		<div class="form-group">
			<label for="gist">Gist of Case</label>
			<textarea class="form-control" id="gist" name="gist" placeholder="Gist of case"
				Style="height:100px;"><?php echo $row['gist']; ?> </textarea>
		</div>

		<div class="form-row ">

			<div class="form-group col-md-9">
				<label for="po">Place of Occurrence:</label>
				<input type="text" name="po" id="po" class="form-control" value="<?php echo $row['po']; ?>">
			</div>

			<div class="form-group col-md-3">
				<label for="do">Date of Occurrence:</label>
				<input type="text" class="form-control" name="do" id="do" value="<?php echo $row['do']; ?>">
			</div>
		</div>

		<div class="form-row ">
			<div class="form-group col-md-12">
				<label for="c_info">Complainant Information:</label>
				<input type="text" name="c_info" id="c_info" class="form-control" value="<?php echo $row['c_info']; ?>">
			</div>
		</div>
		<div class="form-row vtable">
			<table class="table table-bordered" id="v_edit_table">
				<thead style="background-color: skyblue;">
					<tr>
						<th style="display: none">Victim ID</th>
						<th style="display: none">Sl No</th>
						<th>Victim Name</th>
						<th>Father Name</th>
						<th style="width: 400px">Address</th>
						<th>Age</th>
						<th>Gender</th>
						<th>Contact No</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$id_count = 1;
					foreach ($view_victim as $fatchvictim) {
						?>
						<tr class="rowdata">
							<td style="display: none"><input type="text" id="victim_id" name="victim_id"
									value="<?php echo $fatchvictim->v_id; ?>"></td>
							<td style="display: none">
								<?php echo $id_count; ?>
							</td>
							<td>
								<span>
									<?php echo $fatchvictim->name; ?>
								</span>
								<!-- <input id="v_name_edit" name="v_name_edit" class="v_input_box" value="<?php //echo $fatchvictim->name;     ?>" readonly> -->
							</td>
							<td>
								<span>
									<?php echo $fatchvictim->f_name; ?>
								</span>
								<!-- <input id="v_fathername_edit" name="v_fathername_edit" class="v_input_box" value="<?php //echo $fatchvictim->f_name;     ?>" readonly> -->
							</td>
							<td>
								<span>
									<?php echo $fatchvictim->address; ?>
								</span>
								<!-- <input id="v_address_edit" name="v_address_edit" class="v_input_box" value="<?php //echo $fatchvictim->address;     ?>" readonly> -->
							</td>
							<td>
								<span>
									<?php echo $fatchvictim->age; ?>
								</span>
								<!-- 	<input id="v_age_edit" name="v_age_edit" class="v_input_box" value="<?php //echo $fatchvictim->age;     ?>" readonly> -->
							</td>
							<td>
								<span>
									<?php echo $fatchvictim->gender; ?>
								</span>
								<!-- <input id="v_gender_edit" name="v_gender_edit"  class="v_input_box"value="<?php //echo $fatchvictim->gender;     ?>" readonly> -->
							</td>
							<td>
								<span>
									<?php echo $fatchvictim->contact; ?>
								</span>
								<!-- <input id="v_contact_edit" name="v_contact_edit" class="v_input_box" value="<?php //echo $fatchvictim->contact;     ?>" readonly> -->
							</td>




							<td style="width:9% ">
								<div class="tooltip">
									<button type="button" class="btn btn-primary victim_e"><i class="fa fa-edit"></i></button>
									<span class="tooltiptext">Edit</span>
								</div>
								<div class="tooltip">
									<button type="button" class="btn btn-danger victim_delete"><i
											class="fa fa-trash"></i></button>
									<span class="tooltiptext">Delete</span>
								</div>

							</td>
						</tr>
						<?php
						$id_count++;
					} ?>

				</tbody>
			</table>
		</div>
		<div class="form-row ">
			<div class="form-group col-md-12">
				<label for="accused">Details of Accused:</label>
				<input type="text" name="accused" id="accused" class="form-control" value="<?php echo $row['accused']; ?>">

			</div>
		</div>
		<div class="form-row ">
			<table class="table table-bordered" id="a_edit_table" style="width:100%">
				<thead style="background-color: skyblue;">
					<tr>
						<th style="display: none">Arrest ID</th>
						<th style="display: none">Sl No</th>
						<th>Arrest Persons Name</th>
						<th>Nick Name</th>
						<th>Father Name</th>
						<th>Address</th>
						<th>Mobile No</th>
						<th>Age</th>
						<th>Gender</th>
						<th>Case Link</th>
						<th>Modus Operandi</th>
						<th>Date of Arrest</th>
						<th>Status</th>
						<th>Identification Mark</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$id_count = 1;
					foreach ($view_arrest as $fatcharrest) {
						$arrest_date = $fatcharrest->arrest_date;
						$orderdate = explode('-', $arrest_date);
						$day = $orderdate[2];
						$month = $orderdate[1];
						$year = $orderdate[0];
						$arrest_person_date = $day . '-' . $month . '-' . $year;
						?>
						<tr class="rowdata">
							<td style="display: none">
								<input type="text" id="arrest_id" name="arrest_id" value="<?php echo $fatcharrest->a_id; ?>">
							</td>


							<td style="display: none">
								<?php echo $id_count; ?>
							</td>
							<td>
								<?php echo $fatcharrest->name; ?>
								<!-- <input id="a_name_edit" name="a_name_edit" class="a_input_box"
									value="</?php //echo $fatcharrest->name; ?>" readonly> -->
							</td>
							<td>
								<span>
									<?php echo $fatcharrest->nick_name; ?>
								</span>

							</td>
							<td>
								<?php echo $fatcharrest->father_name; ?>
								<!-- <input id="a_fathername_edit" name="a_fathername_edit" class="a_input_box"
									value="</?php //echo $fatcharrest->father_name; ?>" readonly> -->
							</td>
							<td>
								<?php echo $fatcharrest->address; ?>
								<!-- <input id="a_address_edit" name="a_address_edit" class="a_input_box"
									value="</?php //echo $fatcharrest->address; ?>" readonly> -->
							</td>
							<td>
								<?php echo $fatcharrest->mobile_no; ?>
								<!-- <input id="a_mobile_edit" name="a_mobile_edit" class="a_input_box"
									value="</?php //echo $fatcharrest->mobile_no; ?>" readonly> -->
							</td>
							<td>
								<?php echo $fatcharrest->age; ?>
								<!-- <input id="a_age_edit" name="a_age_edit" class="a_input_box"
									value="</?php //echo $fatcharrest->age; ?>" readonly> -->
							</td>
							<td>
								<?php echo $fatcharrest->gender; ?>
								<!-- <input id="a_gender_edit" name="a_gender_edit" class="a_input_box"
									value="</?php //echo $fatcharrest->gender; ?>" readonly> -->
							</td>
							<td>
								<?php echo $fatcharrest->other_case_link; ?>
								<!-- <input id="a_caselink_edit" name="a_caselink_edit" class="a_input_box"
									value="</?php //echo $fatcharrest->other_case_link; ?>" readonly> -->
							</td>
							<td>
								<?php echo $fatcharrest->modus_operandi; ?>
								<!-- <input id="a_modus_edit" name="a_modus_edit" class="a_input_box"
									value="</?php //echo $fatcharrest->modus_operandi; ?>" readonly> -->
							</td>
							<td>
								<?php echo $arrest_person_date;?>
								<!-- <input id="a_arrestdate_edit" name="a_arrestdate_edit" class="a_input_box"
									value="</?php //echo $fatcharrest->arrest_date; ?>" readonly> -->
							</td>
							<td>
								<?php echo $fatcharrest->status; ?>
								<!-- <input id="a_status_edit" name="a_status_edit" class="a_input_box"
									value="</?php //echo $fatcharrest->status; ?>" readonly> -->
							</td>
							<td>
								<?php echo $fatcharrest->identification_mark; ?>
								<!-- <input id="a_id_edit" name="a_id_edit" class="a_input_box"
									value="</?php //echo $fatcharrest->identification_mark; ?>" readonly> -->
							</td>


							<!-- <td><input id="v_contact_edit" name="v_contact_edit" class="v_input_box" value="</?php //echo $fatchvictim->contact;     ?>" readonly></td>  -->
							<td style="width:9%">
								<div class="tooltip">
									<button type="button" class="btn btn-primary arrest_e"><i class="fa fa-edit"></i></button>
									<span class="tooltiptext">Edit</span>
								</div>
								<div class="tooltip">
									<button type="button" class="btn btn-danger arrest_delete"><i
											class="fa fa-trash"></i></button>
									<span class="tooltiptext">Delete</span>
								</div>
							</td>
						</tr>
						<?php
						$id_count++;
					} ?>

				</tbody>
			</table>
		</div>
		<div class="form-row ">
			<div class="form-group col-md-10">
				<label for="p_stolen">Particulars of Properties Stolen/involved:</label>
				<input type="text" name="p_stolen" id="p_stolen" class="form-control"
					value="<?php echo $row['p_stolen']; ?>">
				<!-- <textarea class="form-control" name="properties_stolen" id="properties_stolen" placeholder="Particulars of Properties Stolen/involved.." style="height: 40px"></textarea> -->
			</div>
			<div class="form-group col-md-2">
				<label for="p_value">Total Value of properties:</label>
				<input type="text" id="p_value" name="p_value" class="form-control" value="<?php echo $row['p_value']; ?>">
			</div>
		</div>

		<div class="form-row ">

			<div class="form-group col-md-3">
				<label for="ud_no">UD Case No/Inquest Report:</label>
				<input type="text" name="ud_no" id="ud_no" class="form-control" value="<?php echo $row['ud_no']; ?>">
			</div>
			<div class="form-group col-md-3">
				<label for="ud_date">UD Date:</label>
				<input type="text" class="form-control" id="ud_date" name="ud_date" value="<?php echo $row['ud_date']; ?>">
			</div>

			<div class="form-group col-md-2">
				<!-- <label for="arrest">&nbsp;</label>
				<div class="form-group">
					<label for="seizure">Seizure Details:</label>
					<button type="button" class="btn btn-primary seizure_m"><i class="fa fa-plus"></i>&nbsp;Add Seizure
						Details</button>
				</div> -->
			</div>
		</div>
		<!-- <div class="form-row">
			<table class="table table-bordered" id="s_table">
				<thead>
					<tr>
						<th>Sl No</th>
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
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div> -->
	<?php } ?>
	<!---Button ID ?????-->
	<div class=" form-group " style="text-align:right">
		<!-- ID="v-rowcount" ??--->
		<button type="Submit" id="update" class="btn btn-success">Submit...</button>
		<button type="button" class="btn btn-danger">Cancel</button>
	</div>
</form>


<!-- Modal for Eidt Victim  -->

<div class="modal fade" id="e_victim">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-success text-white">
				<h5 class="modal-title">Victim Edit....</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- <form method="POST" id="victim_update" action="<?php //echo site_url('Welcome/victim_dtls_update');    ?>"> -->
				<div class="form-row ">
					<!---FOR CASE ID--->
					<input name="v_edit_id" id="v_edit_id" style="display: none">
					<div class="form-group col-md-4">
						<label for="v_edit_psname">Name of PS</label>
						<input type="text" class="form-control" id="v_edit_psname" name="v_edit_psname" readonly>
					</div>
					<div class="form-group col-md-4">
						<label for="v_edit_firno">Case No:</label>
						<input type="text" name="v_edit_firno" class="form-control" id="v_edit_firno" readonly>
					</div>
					<div class="form-group col-md-4">
						<label for="v_edit_firdate">Date:</label>
						<div class='input-group'>
							<input type="text" class="form-control" id="v_edit_firdate" name="v_edit_firdate"
								readonly />
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="name">Name:</label>
						<input type="text" class="form-control" id="v_edit_name" placeholder="Name..">
					</div>
					<div class="form-group col-md-6">
						<label for="fathername">Father Name:</label>
						<input type="text" class="form-control" id="v_edit_fathername" placeholder="Father Name..">
					</div>
				</div>
				<div class="form-group">
					<label for="address">Address:</label>
					<input type="text" name="address" class="form-control" id="v_edit_address" placeholder="Address..">
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="age">Age:</label>
						<input type="text" name="v_age" id="v_edit_age" placeholder="Age.." class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label for="gender">Gender:</label>
						<select name="gender" id="v_edit_gender" class="form-control" style="height: auto">
							<option value="">Gender..</option>
							<option value="M">Male</option>
							<option value="F">Female</option>
							<option value="T">Transgender</option>
						</select>
					</div>
					<div class="form-group col-md-5">
						<label for="contact">Contact No:</label>
						<input type="text" name="v_edit_contact" id="v_edit_contact" placeholder="Contact No.."
							class="form-control">
					</div>
				</div>
				<!-- </form> -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="victim_update" data-dismiss="modal">Update</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal for Arrest Persons -->

<!-- Modal HTML -->
<div id="e_arrest" class="modal fade arrest">
	<div class="modal-dialog modal-lg"> <!--for Big Model -->
		<div class="modal-content">
			<div class="modal-header bg-secondary">
				<h5 class="modal-title font-weight-bold text-white">Arrest Persons Details.....</h5>
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
						<input name="a_edit_id" id="a_edit_id" style="display: none">
						<div class="form-group col-md-4">
							<label for="nameofps">Name of PS....</label>
							<input type="text" class="form-control" id="a_edit_psname" name="a_edit_psname" readonly>
						</div>
						<div class="form-group col-md-4">
							<label for="am_caseno">Case No:</label>
							<input type="number" name="a_edit_firno" class="form-control" id="a_edit_firno" readonly>
						</div>
						<div class="form-group col-md-4">
							<label for="a_fir_date">Date:</label>
							<div class='input-group'>
								<input type="text" class="form-control" name="a_edit_firdate" id="a_edit_firdate"
									readonly />
							</div>
						</div>
					</div>

					<div class="form-row ">
						<div class="form-group col-md-4">
							<label for="a_name">Accuse Name:</label>
							<input type="text" name="a_edit_name" id="a_edit_name" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="a_nickname">Nick Name:</label>
							<input type="text" name="a_edit_nickname" id="a_edit_nickname" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="a_fathername">Father Name:</label>
							<input type="text" class="form-control" name="a_edit_fathername" id="a_edit_fathername">
						</div>
					</div>
					<div class="form-group ">
						<label for="a_address">Address:</label>
						<input type="text" class="form-control" id="a_edit_address" name="a_edit_address">
						<!-- <span style="color:red"><?php //echo form_error('us');    ?></span> -->
					</div>
					<div class="form-row ">
						<div class="form-group col-md-4">
							<label for="a_mobile">Accuse Mobile No:</label>
							<input type="text" name="a_edit_mobile" id="a_edit_mobile" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="a_age">Age:</label>
							<input type="text" name="a_edit_age" id="a_edit_age" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="a_gender">Gender:</label>
							<select name="a_edit_gender" id="a_edit_gender" class="form-control" style="height: auto">
								<option value="">Gender..</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
								<option value="T">Transgender</option>
							</select>
						</div>
					</div>
					<div class="form-group ">
						<label for="a_caselink">Any Other Case Link:</label>
						<input type="text" class="form-control" id="a_edit_caselink" name="a_edit_caselink">
					</div>
					<div class="form-row ">
						<div class="form-group col-md-4">
							<label for="a_modus">Modus Operandi:</label>
							<input type="text" name="a_edit_modus" id="a_edit_modus" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="a_date">Arrest Date.......:</label>
							<input type="text" name="a_edit_arrestdate" id="a_edit_arrestdate" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="a_status">Status:</label>
							<select id="a_edit_status" name="a_edit_status" class="form-control" style="height:auto">
								<option value="">Status of Criminal...</option>
								<option value="Bailed out from PS">Bailed out from PS</option>
								<option value="Forwarded">Forwarded</option>
							</select>
						</div>

					</div>
					<div class="form-group ">
						<label for="a_physical">Physical Identification Mark:</label>
						<input type="text" class="form-control" id="a_edit_physical" name="a_edit_physical">
					</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="arrest_update" data-dismiss="modal">Update</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>



<!-- Modal HTML -->
<!-- <div id="v_victim" class="modal fade v_victim">
	<div class="modal-dialog modal-lg"> <!-or Big Model 
		<div class="modal-content">
			<div class="modal-header bg-secondary">
				 <h5 class="modal-title font-weight-bold text-white">Victim Details</h5>
				 <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form>
						<div class="form-row ">
						  
						   <!-FOR CASE ID-
				 <!-<input  name="case_id" id="case_id" value="</?php //echo $row['case_id'];     ?>"> --
						 <div class="form-group col-md-4">
							 <label for="v_nameofps">Name of PS</label>
							 <input type="text" class="form-control" id="v_nameofps" name="v_nameofps" readonly>
						 </div>
				 
						<div class="form-group col-md-4">
							<label for="v_fir_no">Case No:</label>
							<input type="text" name="v_fir_no" class="form-control" id="v_fir_no" readonly>
						</div>
		
						<div class="form-group col-md-4">
							<label for="v_fir_date" >Date:</label>
				
							<div class='input-group' >
								  <input type="text" class="form-control" id="v_fir_date" name="v_fir_date" readonly />
					   
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="name">Name:</label>
							<input type="text" class="form-control" id="v_name" placeholder="Name..">
						</div>
						<div class="form-group col-md-6">
							<label for="fathername">Father Name:</label>
							<input type="text" class="form-control" id="v_fathername" placeholder="Father Name..">
						</div>	
					</div> 

						<div class="form-group">
							<label for="address">Address:</label>
							<input type="text" name="address" class="form-control" id="v_address" placeholder="Address..">
						</div> 
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="age">Age:</label>
							<input type="text" name="v_age" id="v_age" placeholder="Age.." class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="gender">Gender:</label>
							<select name="gender" id="v_gender" class="form-control" style="height: auto">
								<option value="">Gender..</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
								<option value="T">Transgender</option>
							</select>
						</div>
						<div class="form-group col-md-5">
							<label for="contact">Contact No::::</label>
							<input type="text" name="v_contact" id="v_contact" placeholder="Contact No.." class="form-control">
						
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
</div> -->

<!-- Modal for Arrest Persons -->

<!-- Modal HTML -->
<div id="a_arrest" class="modal fade arrest">
	<div class="modal-dialog modal-lg"> <!--for Big Model -->
		<div class="modal-content">
			<div class="modal-header bg-secondary">
				<h5 class="modal-title font-weight-bold text-white">Arrest Persons Details</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<form>
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
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="a_name">Name:</label>
							<input type="text" class="form-control" id="a_name" placeholder="Name..">
						</div>
						<div class="form-group col-md-6">
							<label for="a_fathername">Father Name:</label>
							<input type="text" class="form-control" id="a_fathername" placeholder="Father Name..">
						</div>
					</div>

					<div class="form-group">
						<label for="a_address">Address:</label>
						<input type="text" name="a_address" class="form-control" id="a_address" placeholder="Address..">
					</div>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="a_age">Age:</label>
							<input type="text" name="a_age" placeholder="Age.." id="a_age" class="form-control">

						</div>
						<div class="form-group col-md-3">
							<label for="a_gender">Gender:</label>
							<select name="a_gender" id="a_gender" class="form-control" style="height: auto">
								<option value="">Gender..</option>
								<option>Male</option>
								<option>Female</option>
								<option>Transgender</option>
							</select>
						</div>

						<div class="form-group col-md-3">
							<label for="a_date">Date of Arrest:</label>
							<div class="input-group">
								<input type="text" name="a_date" id="a_date" class="form-control" />
							</div>
						</div>
						<div class="form-group col-md-3">
							<label for="a_status">Status:</label>
							<select id="a_status" class="form-control" style="height:auto">
								<option value="">Status of Criminal...</option>
								<option>Bailed out from PS</option>
								<option>Forwarded</option>
							</select>
						</div>

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
			<div class="modal-header bg-secondary">
				<h5 class="modal-title font-weight-bold text-white">Seizure Details</h5>
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
									<input type="text" value="N/A" name="s_arms" id="s_arms" class="form-control">
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



<!-- Modal for Victim Edit  -->