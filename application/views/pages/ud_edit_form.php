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
        <h4 style="text-align: center;margin-top: 13px"> UD Edit Form........</h4>
    </div>

</div>



<form id="ud_edit_form" style="margin:30px 45px" action="<?php echo site_url('welcome/ud_update'); ?>" method="post">


    <?php foreach ($ud_update as $editudrow) {
        //echo $row['arms'];die();
        //For FIR Date ---->
        //$edit_arms=$editseizurerow['arms'];
        $ud_date = $editudrow['ud_date'];
        $orderdate = explode('-', $ud_date);
        $day = $orderdate[2];
        $month = $orderdate[1];
        $year = $orderdate[0];
        $date = $day . '-' . $month . '-' . $year;
        $ud_id = $editudrow['ud_id'];
        //echo $ud_id;die();
        ?>



        <input type="hidden" name="ud_id" id="ud_id" class="form-control" value="<?php echo $editudrow['ud_id']; ?>">



        <div class="form-row borderbox">
        <div class="form-group col-md-12">
            <span style="color:red;text-align: center">
                <h4><?php echo $editudrow['name_of_ps']; ?> UD No. <?php echo $editudrow['ud_no']; ?>&nbsp; Dated:
                    <?php echo $date; ?>
                </h4>
            </span>
            </div>

            <!-- <div class="form-group common_input_div col-md-4">
            <label for="ud_ps">Name of PS:<span style="color: red">&nbsp;*</span></label>
                <select name="ud_ps" style="height: auto"class="form-control" id="ud_ps" readonly>
                    <option value="</?php echo $editudrow['ud_ps']; ?>">
                        </?php echo $editudrow['name_of_ps']; ?>
                    </option>
                        </?php
                            $ps = $editudrow['ud_ps'];
                            $getps = getps($ps);
                            foreach ($getps as $fatchps) {
                                $ps_code = $fatchps['ud_ps'];
                                $ps_name = $fatchps['name_of_ps'];
                                echo "<option value='$ps_code'>$ps_name </option>";
                        }
                        ?>
                </select>
            </?php echo form_error('ud_ps','<div style="color:red; font-style: italic;">', '</div>'); ?> 
        </div>
        <div class="form-group col-md-4">
            <label for="ud_no">UD No:<span style="color: red">&nbsp;*</span></label>
            <input type="text" name="ud_no" id="ud_no" class="form-control" value="</?php echo $editudrow['ud_no'];?>" readonly>
            </?php echo form_error('ud_no','<div style="color:red; font-style: italic;">', '</div>'); ?> 
        </div>
        <div class="form-group col-md-4">
            <label for="ud_date" >UD Date:<span style="color: red">&nbsp;*</span></label>
            <input type="text" class="form-control" id="ud_date" name="ud_date" value="</?php echo $date?>" readonly>
            </?php echo form_error('ud_date','<div style="color:red; font-style: italic;">', '</div>'); ?>
        </div> -->
            
                <div class="form-group col-md-4">
                    <label for="ud_religion">Religion:<span style="color: red">&nbsp;*</span></label>
                    <select id="ud_religion" name="ud_religion" class="form-control" style="height: auto">
                        <option value="<?php echo $editudrow['ud_religion']; ?>">
                            <?php echo $editudrow['ud_religion']; ?>
                        </option>
                        <?php
                        $religions = array("Hindu", "Muslim", "Christian", "Sikh", "Other");
                        $religions_finalarray = array_diff($religions, array($editudrow['ud_religion']));
                        foreach ($religions_finalarray as $religion) {
                            echo '<option value="' . $religion . '">' . $religion . '</option>';
                        }
                        ?>
                    </select>
                    <?php echo form_error('ud_religion', '<div style="color:red; font-style: italic;">', '</div>'); ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="ud_caste">Caste:<span style="color: red">&nbsp;*</span></label>
                    <select id="ud_caste" name="ud_caste" class="form-control" style="height: auto">
                        <option value="<?php echo $editudrow['ud_religion']; ?>">
                            <?php echo $editudrow['ud_caste']; ?>
                        </option>
                        <?php
                        $caste = array("General", "Scheduled Caste", "Scheduled Tribes", "OBC");
                        $caste_finalarray = array_diff($caste, array($editudrow['ud_caste']));
                        foreach ($caste_finalarray as $ud_caste) {
                            echo '<option value="' . $ud_caste . '">' . $ud_caste . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="ud_gender">Gender:<span style="color: red">&nbsp;*</span></label>
                    <select id="ud_gender" name="ud_gender" class="form-control" style="height: auto">
                        <option value="<?php echo $editudrow['ud_gender']; ?>">
                            <?php echo $editudrow['ud_gender']; ?>
                        </option>
                        <?php
                        $gender = array("Male", "Female", "Transgender");
                        $gender_finalarray = array_diff($gender, array($editudrow['ud_gender']));
                        foreach ($gender_finalarray as $ud_gender) {
                            echo '<option value="' . $ud_gender . '">' . $ud_gender . '</option>';
                        }
                        ?>
                        <!-- <option value="">Select Gender...</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="st">Transgender</option> -->
                    </select>
                </div>
                <div class="form-group col-md-2">
            <label for="ud_age">Age:<span style="color: red">&nbsp;*</span></label>
            <input type="text" name="ud_age" id="ud_age" class="form-control" value="<?php echo $editudrow['age'];?>">
            <?php echo form_error('ud_age','<div style="color:red; font-style: italic;">', '</div>'); ?> 
        </div>
            <div class="form-group col-md-4">
                <label for="how_to_death">How to Death:<span style="color: red">&nbsp;*</span></label>
                <select id="how_to_death" name="how_to_death" class="form-control" style="height: auto">
                    <option value="<?php echo $editudrow['how_to_death']; ?>">
                        <?php echo $editudrow['how_to_death']; ?>
                    </option>
                    <?php
                    $how_to_death = array("Hanging", "Poisoning", "Burning", "Drowning", "Electrocution", "Fail from Hight", "Stove Brust", "RTA", "Heart Attack", "Snake Bite", "Earthquake", "Flood", "Sun Stroke", "Lighting", "Epidemic");
                    $how_to_death_finalarray = array_diff($how_to_death, array($editudrow['how_to_death']));
                    foreach ($how_to_death_finalarray as $how_to_death) {
                        echo '<option value="' . $how_to_death . '">' . $how_to_death . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="reason_death">Reason of Death:<span style="color: red">&nbsp;*</span></label>
                <select id="reason_death" name="reason_death" class="form-control" style="height: auto">
                    <option value="<?php echo $editudrow['reason_death']; ?>">
                        <?php echo $editudrow['reason_death']; ?>
                    </option>
                    <?php
                    $reason_death = array("Family Problem", "Love Affires", "Mental Depression", "Property Disput");
                    $reason_death_finalarray = array_diff($reason_death, array($editudrow['reason_death']));
                    foreach ($reason_death_finalarray as $reason_death) {
                        echo '<option value="' . $reason_death . '">' . $reason_death . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="profession_death">Profession:<span style="color: red">&nbsp;*</span></label>
                <select id="profession_death" name="profession_death" class="form-control" style="height: auto">

                    <option value="<?php echo $editudrow['profession_death']; ?>">
                        <?php echo $editudrow['profession_death']; ?>
                    </option>
                    <?php
                    $profession_death = array("Student", "House Wife", "Service", "Busness", "Labure", "Farmer");
                    $profession_death_finalarray = array_diff($profession_death, array($editudrow['profession_death']));
                    foreach ($profession_death_finalarray as $profession_death) {
                        echo '<option value="' . $profession_death . '">' . $profession_death . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="social_death">Social Status:<span style="color: red">&nbsp;*</span></label>
                <select id="social_death" name="social_death" class="form-control" style="height: auto">
                    <option value="<?php echo $editudrow['social_death']; ?>">
                        <?php echo $editudrow['social_death']; ?>
                    </option>
                    <?php
                    $social_death = array("Married", "Un-Married", "Divorce", "Widowed");
                    $social_death_finalarray = array_diff($social_death, array($editudrow['social_death']));
                    foreach ($social_death_finalarray as $social_death) {
                        echo '<option value="' . $social_death . '">' . $social_death . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="education_death">Education Qualification:<span style="color: red">&nbsp;*</span></label>
                <select id="education_death" name="education_death" class="form-control" style="height: auto">
                    <option value="<?php echo $editudrow['education_death']; ?>">
                        <?php echo $editudrow['education_death']; ?>
                    </option>
                    <?php
                    $education_death = array("Primary (upto Class-5)", "Middle (upto Class-8)", "Matriculate/Secondary (upto Class-10)", "Higher Secondary", "Graduated and above", "No education");
                    $education_death_finalarray = array_diff($education_death, array($editudrow['education_death']));
                    foreach ($education_death_finalarray as $education_death) {
                        echo '<option value="' . $education_death . '">' . $education_death . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="ud_place">Place of Occurrence:</label>
                <input type="text" name="ud_place" id="ud_place" value="<?php echo $editudrow['ud_place']; ?>"
                    class="form-control">
            </div>
            <div class="form-group col-md-12">
                <label for="ud_caes_ref">Case Reference:</label>
                <input type="text" name="ud_caes_ref" id="ud_caes_ref" value="<?php echo $editudrow['ud_case_ref']; ?>"
                    class="form-control">
            </div>

            <div class=" form-group col-md-12" style="text-align:right;">
                <button type="Submit" id="ud_update" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    <?php } ?>
</form>