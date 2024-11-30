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
		width: 330px
	}

	.error {

		color: #FF0000;

	}

	.preview-image {
		width: 140px;
		height: 140px;
		border-radius: 5px;
		border: 1px;
	}

	#ImgPreview {
		width: 150px;
		height: 150px;
		border-style: double;
	}

	.borderbox {
		margin: 30px 100px 0px 100px;
		border: 2px solid black;
		border-radius: 5px;
		padding: 13px;
	}

	#inputSec {
		padding: 20px;

		#latInput,
		#lngInput {
			height: 30px;
			width: 150px;
		}

		#placeNameInput {
			height: 30px;
			width: 40%;
		}
	}

	#openModal {
		padding: 10px 20px;
		background-color: #008CBA;
		color: white;
		border: none;
		font-size: 16px;
		cursor: pointer;
		/* position: fixed;
	  top: 10px;
	  left: 10px; */
		z-index: 1000;
		border-radius: 5px;
	}

	#openModal:hover {
		background-color: #005f75;
	}

	#closeModal {
		padding: 10px 20px;
		background-color: #008CBA;
		color: white;
		border: none;
		font-size: 16px;
		cursor: pointer;
		border-radius: 5px;
	}

	.modal {
		display: none;
		position: fixed;
		z-index: 999;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, 0.5);
	}

	.modal-content {
		position: relative;
		width: 100%;
		height: 100%;
	}

	.modal-header {
		background-color: #fff;
		padding: 10px;
		text-align: center;
		font-size: 20px;
		color: #333;
	}

	.modal-header input {
		width: 80%;
		padding: 10px;
		margin-top: 10px;
		border: 1px solid #ccc;
		border-radius: 5px;
	}

	.close {
		position: absolute;
		top: 20px;
		right: 20px;
		font-size: 30px;
		color: #888;
		cursor: pointer;
	}

	#map {
		width: 100%;
		height: calc(100% - 60px);
		/* Adjust based on header height */
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
		<h4 style="text-align: center;margin-top: 13px"> Road Traffic Accident Entry Form</h4>
	</div>
</div>
<form id="rta_entry_form" style="margin:30px 45px" action="<?php echo site_url('welcome/add_rta'); ?>" method="post">

	<div class="form-row ">
		<div class="form-group common_input_div col-md-3">
			<label for="rta_ps">Name of PS:</label>
			<select name="rta_ps" style="height: auto" class="form-control" id="rta_ps">
				<option value="">Select Police Station</option>
				<?php
				foreach ($get_policestation as $row) {
					echo '<option value="' . $row->ps_id . ',' . $row->ps_short_nm . '">' . $row->name_of_ps . '</option>';
				}
				?>
			</select>
			<?php echo form_error('rta_ps', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>

		<div class="form-group col-md-3">
			<label for="rta_date">Accident Date:</label>
			<input type="text" name="rta_date" id="rta_date" class="form-control">
			<?php echo form_error('rta_date', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>

		<div class="form-group col-md-3">
			<label for="rta_time">Accident Time:</label>
			<input type="time" name="rta_time" id="rta_time" class="form-control">
			<?php echo form_error('rta_time', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>

		<div class="form-group col-md-3">
			<label for="type_of_road">Type of Road:</label>
			<select id="type_of_road" name="type_of_road" style="height: auto" class="form-control">
				<option value="">Type of Road...</option>
				<option value="NH">National Highway</option>
				<option value="SH">State Highway</option>
				<option value="Other">Other Road</option>
			</select>
			<?php echo form_error('type_of_road', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>
	</div>

	<div class="form-row ">
		<div class="form-group col-md-2">
			<label for="rta_case_no">RTA Case No:</label>
			<input type="text" name="rta_case_no" id="rta_case_no" class="form-control">
			<?php echo form_error('rta_case_no', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>

		<div class="form-group col-md-10">
			<label for="rta_case_ref">Case Reference:</label>
			<input type="text" class="form-control" id="rta_case_ref" name="rta_case_ref" placeholder="Case Reference">
			<?php echo form_error('rta_case_ref', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>
	</div>

	<div class="form-row ">
		<div class="form-group col-md-1">
			<label for="victim">&nbsp;</label>
			<div class="form-group">
				<!-- Modul Open Button -->
				<button type="button" id="openModal" class="btn btn-primary open_map"><b>Open Map</b></button>
			</div>
		</div>

		<div class="form-group col-md-2">
			<label for="latInput">Latitude:</label>
			<input type="text" name="latInput" id="latInput" class="form-control" readonly>
		</div>

		<div class="form-group col-md-2">
			<label for="lngInput">Longitude:</label>
			<input type="text" name="lngInput" id="lngInput" class="form-control" readonly>
		</div>
		<div class="form-group col-md-7">
			<label for="placeNameInput">Place of Occurrence:</label>
			<input type="text" name="placeNameInput" id="placeNameInput" class="form-control"
				placeholder="Place of Occurrence">
				<?php echo form_error('placeNameInput', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>
	</div>

	<div class="form-row ">
		<div class="form-group col-md-3">
			<label for="rta_kiled">Number of Person Kiled:</label>
			<input type="text" name="rta_kiled" id="rta_kiled" class="form-control">
			<?php echo form_error('rta_kiled', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>
		<div class="form-group col-md-3">
			<label for="rta_injure">Number of Person Injure:</label>
			<input type="text" name="rta_injure" id="rta_injure" class="form-control">
			<?php echo form_error('rta_injure', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>
		<div class="form-group col-md-3">
			<label for="rta_offending_vehicle">Type of Offending Vehicle:</label>
			<input type="text" name="rta_offending_vehicle" id="rta_offending_vehicle" class="form-control">
			<?php echo form_error('rta_offending_vehicle', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>
		<div class="form-group col-md-3">
			<label for="rta_victim_vehicle">Type of Victim Vehicle:</label>
			<input type="text" name="rta_victim_vehicle" id="rta_victim_vehicle" class="form-control">
			<?php echo form_error('rta_victim_vehicle', '<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>
	</div>
	<div class="form-row ">
		<div class="form-group col-md-12">
			<label for="rta_reason">Reason of Accident:</label>
			<input type="text" name="rta_reason" id="rta_reason" class="form-control" placeholder="Reason of Accident">
		</div>
	</div>
	<div class=" form-group col-md-12" style="text-align:right;">
		<button type="Submit" id="v_rowcount" class="btn btn-success">Submit..</button>
		<button type="button" class="btn btn-danger">Cancel</button>
	</div>
</form>


<!-- Modal with the map -->
<div id="myModal" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close"><button id="closeModal">Go</button></span>
			<input type="text" id="searchInput" placeholder="Search for a place">
		</div>
		<div id="map"></div>
	</div>
</div>