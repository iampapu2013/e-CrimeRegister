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

.preview-image {
    width: 140px;
    height: 140px;
   /* //margin-left: 80%;*/
    border-radius: 5px;
    border: 1px;
}
#ImgPreview{
    width: 150px;
    height: 150px;
    border-style: double;
}
.disposal_type {
    display: none;
    
}
.borderbox{
    margin:30px 150px 0px 150px; 
    border: 2px solid black;
    border-radius: 13px;
    padding: 13px;   
}
#btn_show{
    display: none;
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
    <div class="col-lg-4"> </div>
    <div class="col-lg-4"> <h4 style="text-align: center;margin-top: 13px"> FINAL FORM/REPORT</h4> </div>
    <div class="col-lg-4"> </div>
</div>
        


<form  id="psdisposal_entry_form" style="margin:30px 45px;" action="<?php echo site_url('welcome/add_ps_disposal');?>" method="post">

  
       
    <?php foreach ($edit_case as $psdisposalrow) {
                      //For FIR Date ---->
        //echo $row['fir_no'];die();
                $fir_date=$psdisposalrow['fir_date'];
                $orderdate=explode('-',$fir_date);
                $day=$orderdate[2];
                $month=$orderdate[1];
                $year=$orderdate[0];
                $date=$day.'-'.$month.'-'.$year;
                $case_id=$psdisposalrow['case_id'];
    ?>    
    <div class="form-row borderbox">
        <div class="form-group common_input_div col-md-4 cs_div">
            <label for="disposal_ps">Name of PS:</label>
            <select name="disposal_ps" style="height: auto; pointer-events: none;font-weight: bold" class="form-control" id="disposal_ps" readonly>
                <option value="<?php echo $psdisposalrow['ps_id']; ?>"><?php echo $psdisposalrow['name_of_ps']; ?></option>
                <?php 
                    $ps=$psdisposalrow['ps_id'];
                    $getps=getps($ps);
                    foreach ($getps as $fatchps) {
                    $ps_code=$fatchps['ps_id'];
                    $ps_name=$fatchps['name_of_ps'];
                    echo "<option value='$ps_code'>$ps_name </option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="disposal_fir_no">FIR No.</label>
            <input type="text" class="form-control" id="disposal_fir_no" name="disposal_fir_no"  value="<?php echo $psdisposalrow['fir_no'];?>"style="pointer-events: none;font-weight: bold" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="disposal_fir_date" >FIR Date:</label>
            <input type="text" class="form-control" id="disposal_fir_date" value="<?php echo $date;?>" name="disposal_fir_date" style="pointer-events: none; font-weight: bold" readonly>
        </div>
         <div class="form-group col-md-4" style="display:none">
            <label for="disposal_caseid" >Case ID:</label>
            <input type="text" class="form-control" id="disposal_caseid" value="<?php echo $case_id;?>" name="disposal_caseid" style="pointer-events: none;font-weight: bold" readonly>
        </div>

    </div>
    <?php
    }
    ?>



                      <!--   DropedownBox -->

    <div class="form-row borderbox" style="background-color: #92a8d1">
        <div class="form-group col-md-4"></div>
        <div class="form-group col-md-4"> 
            <label for="type_of_disposal"><h5>Type of Final Form/Report:</h5></label> 
            <select id="type_of_disposal" name="type_of_disposal" class="form-control" style="height: auto;font-size: 20px">
                <option value="">Type of Disposal</option>
                <option value="CS">Charge Sheeted</option>
                <option value="FRT">FRT</option>
                <option value="FRMF">FRMF</option>
                <option value="TRANSFER">Other Unit Transfer</option>
            </select>
        </div>
        <div class="form-group col-md-4"></div>
    </div>
    <!-- <input type="hidden" id="selected_disposal_type" name="selected_disposal_type"> -->

                           <!--  Charge Sheet Disposal Form -->
<div id="btn_show" class="borderbox">
    <div id="CS" class="disposal_type ">
        <div class="form-row">
            
            <div class="form-group col-md-4">
                <label for="type_cs">Type of Charge Sheet:<span style="color: red">&nbsp;*</span></label>
                <select id="type_cs" name="type_cs" style="height: auto" class="form-control">
                    <option value="">Type of Charge Sheet...</option>
                    <option value="Original">Original</option>
                    <option value="Supplementary">Supplementary</option>
                </select> 
                <?php echo form_error('type_cs','<div style="color:red; font-style: italic;">', '</div>'); ?>  
            </div>
            <div class="form-group col-md-4">
                <label for="cs_no">Charge Sheet No:<span style="color: red">&nbsp;*</span></label>
                <input type="text" name="cs_no" id="cs_no" class="form-control">
                 <?php echo form_error('cs_no','<div style="color:red; font-style: italic;">', '</div>'); ?>  
            </div>
            <div class="form-group common_input_div col-md-4">
                <label for="cs_date">Charge Sheet Date:<span style="color: red">&nbsp;*</span></label>
                <input type="text" name="cs_date" id="cs_date" class="form-control">
                <?php echo form_error('cs_date','<div style="color:red; font-style: italic;">', '</div>'); ?>  
            </div>
            <div class="form-group col-md-10">
                <label for="cs_section">Section of Law:<span style="color: red">&nbsp;*</span></label>
                <input type="text" name="cs_section" id="cs_section" class="form-control">
            </div>
            <div class="form-group common_input_div col-md-2">
                <label for="cs_person">Persons of CS:<span style="color: red">&nbsp;*</span></label>
                <input type="text" name="cs_person" id="cs_person" class="form-control">
            </div>
            <div class="form-group col-md-12">
                <label for="cs_accused_details">Details of Accused Persons:<span style="color: red">&nbsp;*</span></label>
                <textarea class="form-control" id="cs_accused_details" name="cs_accused_details" placeholder="Details of Accused persons...." Style="height:100px;"></textarea>
            </div>
       </div>
        </div>
     
    
            
       

                        <!--  FRT Disposal Form -->
    <div id="FRT" class="disposal_type" name="parameter_name">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="frt_no">FRT No:<span style="color: red">&nbsp;*</span></label>
                <input type="text" name="frt_no" id="frt_no" class="form-control">
                <?php echo form_error('frt_no','<div style="color:red; font-style: italic;">', '</div>'); ?>
            </div>
            <div class="form-group common_input_div col-md-6">
                <label for="frt_date">FRT Date:<span style="color: red">&nbsp;*</span></label>
                <input type="text" name="frt_date" id="frt_date" class="form-control">
                <?php echo form_error('frt_date','<div style="color:red; font-style: italic;">', '</div>'); ?>
            </div>
        </div>
    </div>


     <!--  FRMS Disposal Form -->
    <div id="FRMF" class="disposal_type">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="frmf_no">FRMF No:<span style="color: red">&nbsp;*</span></label>
                <input type="text" name="frmf_no" id="frmf_no" class="form-control">
            </div>
            <div class="form-group common_input_div col-md-6">
                <label for="frmf_date">FRMF Date:<span style="color: red">&nbsp;*</span></label>
                <input type="text" name="frmf_date" id="frmf_date" class="form-control">
            </div>
        </div>
    </div>

         <!--  Other Unit Transfer Disposal Form -->
    <div id="TRANSFER" class="disposal_type">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="transfer_unit">Transfer PS/Unit Name:<span style="color: red">&nbsp;*</span></label>
                <input type="text" name="transfer_unit" id="transfer_unit" class="form-control">
            </div>
            <div class="form-group common_input_div col-md-6">
                <label for="transfer_date">Transfer Date:<span style="color: red">&nbsp;*</span></label>
                <input type="text" name="transfer_date" id="transfer_date" class="form-control">
            </div>
        </div>
    </div>
    <div class=" form-group col-md-12" style="text-align:right;">
            <button type="Submit" id="ps_disposal_button" class="btn btn-success">Submit</button>
            <button type="button" class="btn btn-danger">Cancel</button>
    </div>
</div>

</form>