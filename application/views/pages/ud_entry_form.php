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
	width:330px
	}
.error{

  color: #FF0000;

}

.preview-image {
    width: 140px;
    height: 140px;
    border-radius: 5px;
	border: 1px;
}
#ImgPreview{
	width: 150px;
    height: 150px;
    border-style: double;
}
.borderbox{
    margin:30px 100px 0px 100px; 
    border: 2px solid black;
    border-radius: 5px;
    padding: 13px;   
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
    <div class="col-lg-4">
                    
    </div>
    <div class="col-lg-4">
        <h4 style="text-align: center;margin-top: 13px"> UD Entry Form...</h4>
    </div>

</div>

<form  id="ud_entry_form" style="margin:30px 45px" action="<?php echo site_url('welcome/add_ud');?>" method="post">
	<div class="form-row borderbox">
		<div class="form-group common_input_div col-md-4">
			<label for="ud_ps">Name of PS:<span style="color: red">&nbsp;*</span></label>
				<select name="ud_ps" style="height: auto"class="form-control" id="ud_ps" >
					<option value="" >Select Police Station</option>
					<?php 
						foreach($get_policestation as $row){echo '<option value="'.$row->ps_id.','.$row->ps_short_nm.'">'.$row->name_of_ps.'</option>';}
					?>
				</select>
			<?php echo form_error('ud_ps','<div style="color:red; font-style: italic;">', '</div>'); ?>	
		</div>
		<div class="form-group col-md-4">
			<label for="ud_no">UD No:<span style="color: red">&nbsp;*</span></label>
			<input type="text" name="ud_no" id="ud_no" class="form-control">
			<?php echo form_error('ud_no','<div style="color:red; font-style: italic;">', '</div>'); ?>	
		</div>
		<div class="form-group col-md-4">
			<label for="ud_date" >UD Date:<span style="color: red">&nbsp;*</span></label>
			<input type="text" class="form-control" id="ud_date" name="ud_date">
			<?php echo form_error('ud_date','<div style="color:red; font-style: italic;">', '</div>'); ?>
		</div>
		
		<div class="form-group col-md-4"> 
            <label for="ud_religion">Religion:<span style="color: red">&nbsp;*</span></label> 
            <select id="ud_religion" name="ud_religion" class="form-control" style="height: auto">
                <option value="">Select Religion...</option>
                <option value="Hindu">Hindu</option>
                <option value="Muslim">Muslim</option>
                <option value="Christian">Christian</option>
                <option value="Sikh">Sikh</option>
                <option value="Other">Other</option>
            </select>
            <?php echo form_error('ud_religion','<div style="color:red; font-style: italic;">', '</div>'); ?>
        </div>
        <div class="form-group col-md-4"> 
            <label for="ud_caste">Caste:<span style="color: red">&nbsp;*</span></label> 
            <select id="ud_caste" name="ud_caste" class="form-control" style="height: auto">
                <option value="">Select Caste...</option>
                <option value="General">General</option>
                <option value="SC">Scheduled Caste</option>
                <option value="ST">Scheduled Tribes</option>
                <option value="OBC">OBC</option>
            </select>
        </div>
        <div class="form-group col-md-4"> 
            <label for="ud_gender">Gender:<span style="color: red">&nbsp;*</span></label> 
            <select id="ud_gender" name="ud_gender" class="form-control" style="height: auto">
                <option value="">Select Gender...</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Transgender">Transgender</option>
            </select>
        </div>
        <div class="form-group col-md-4"> 
            <label for="how_to_death">How to Death:<span style="color: red">&nbsp;*</span></label> 
            <select id="how_to_death" name="how_to_death" class="form-control" style="height: auto">
                <option value="">How to Death...</option>
                <option value="Hanging">Hanging</option>
                <option value="Poisoning">Poisoning</option>
                <option value="Burning">Burning</option>
                <option value="Drowning">Drowning</option>
                <option value="Electrocution">Electrocution</option>
                <option value="Fail from Hight">Fail from Hight</option>
                <option value="Stove Brust">Stove Brust</option>
                <option value="RTA">RTA</option>
                <option value="Heart Attack">Heart Attack</option>
                <option value="Snake Bite">Snake Bite</option>
                <option value="Earthquake">Earthquake</option>
                <option value="Flood">Flood</option>
                <option value="Sun Stroke">Sun Stroke</option>
                <option value="Lighting">Lighting</option>
                <option value="Epidemic">Epidemic</option>
            </select>
        </div>
        <div class="form-group col-md-4"> 
            <label for="reason_death">Reason of Death:<span style="color: red">&nbsp;*</span></label> 
            <select id="reason_death" name="reason_death" class="form-control" style="height: auto">
                <option value="">Reason of Death...</option>
                <option value="Family Problem">Family Problem</option>
                <option value="Love Affires">Love Affires</option>
                <option value="Mental Depression">Mental Depression</option>
                <option value="Property Disput">Property Disput</option>
            </select>
        </div>
        <div class="form-group col-md-4"> 
            <label for="profession_death">Profession:<span style="color: red">&nbsp;*</span></label> 
            <select id="profession_death" name="profession_death" class="form-control" style="height: auto">
                <option value="">Profession...</option>
                <option value="Student">Student</option>
                <option value="House Wife">House Wife</option>
                <option value="Service">Service</option>
                <option value="Busness">Busness</option>
                <option value="Labure">Labure</option>
                <option value="Farmer">Farmer</option>
            </select>
        </div>
       
        <div class="form-group col-md-4"> 
            <label for="social_death">Social Status:<span style="color: red">&nbsp;*</span></label> 
            <select id="social_death" name="social_death" class="form-control" style="height: auto">
                <option value="">Social Status...</option>
                <option value="Married">Married</option>
                <option value="Un-Married">Un-Married</option>
                <option value="Divorce">Divorce</option>
                <option value="Widowed">Widowed</option>
            </select>
        </div>
        <div class="form-group col-md-4"> 
            <label for="education_death">Education Qualification:<span style="color: red">&nbsp;*</span></label> 
            <select id="education_death" name="education_death" class="form-control" style="height: auto">
                <option value="">Education Qualification...</option>
                <option value="Primary (upto Class-5)">Primary (upto Class-5)</option>
                <option value="Middle (upto Class-8)">Middle (upto Class-8)</option>
                <option value="Matriculate/Secondary (upto Class-10)">Matriculate/Secondary (upto Class-10)</option>
                <option value="Higher Secondary">Higher Secondary</option>
                <option value="Graduated and above">Graduated and above</option>
                <option value="No education">No education</option>
            </select>
        </div>
        <div class="form-group col-md-4">
			<label for="ud_place">Place of Occurrence:</label>
			<input type="text" name="ud_place" id="ud_place" class="form-control">
		</div>
        <div class="form-group col-md-12">
			<label for="ud_caes_ref">Case Reference:</label>
			<input type="text" name="ud_caes_ref" id="ud_caes_ref" class="form-control">
		</div>

       <div class=" form-group col-md-12" style="text-align:right;">
			<button type="Submit" id="v_rowcount" class="btn btn-success">Submit</button>
			<button type="button" class="btn btn-danger">Cancel</button>
		</div>
	</div>

</form>


