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
    <div class="col-lg-4"> <h3 style="text-align: center; color: blue;text-decoration: underline">COURT DISPOSAL FORM...</h3> </div>
    <div class="col-lg-4"> </div>
</div>
        


<form  id="court_disposal_entry_form" style="margin:30px 45px;" action="<?php echo site_url('welcome/add_court_disposal');?>" method="post">

  
       
    <?php foreach ($court_desposal_entry_data as $row) {
              //For FIR Date ---->
        //echo $courtdisposalrow;die();
        $fir_date=$row['fir_date'];
       // $fir_date=$row->fir_date;
        $orderdate=explode('-',$fir_date);
        $day=$orderdate[2];
        $month=$orderdate[1];
        $year=$orderdate[0];
        $date=$day.'-'.$month.'-'.$year;
        $cs_date=$row['cs_date'];
        $csorderdate=explode('-', $cs_date);
        $csday=$csorderdate[2];
        $csmonth=$csorderdate[1];
        $csyear=$csorderdate[0];
        $csdate=$csday.'-'.$csmonth.'-'.$csyear;
        $case_id=$row['case_id'];
    ?>    
    <div class="form-row borderbox">

        <div class="form-group col-md-4">
            <label for="court_disposal_caseid" >Case ID:</label>
            <input type="text" class="form-control" id="court_disposal_caseid" value="<?php echo $case_id;?>" name="court_disposal_caseid" style="pointer-events: none;" readonly>
        </div>

        <div class="form-group common_input_div col-md-4 cs_div">
            <label for="disposal_ps">Name of PS:</label>
            <select name="disposal_ps" style="height: auto"class="form-control" id="disposal_ps" readonly>
                <option value="<?php echo $row['ps_id']; ?>"><?php echo $row['name_of_ps']; ?></option>
                <?php 
                    $ps=$row['ps_id'];
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
            <label for="court_disposal_fir_no">FIR No.</label>
            <input type="text" class="form-control" id="court_disposal_fir_no" name="court_disposal_fir_no"  value="<?php echo $row['fir_no'];?>"style="pointer-events: none;" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="court_disposal_fir_date" >FIR Date:</label>
            <input type="text" class="form-control" id="court_disposal_fir_date" value="<?php echo $date;?>" name="court_disposal_fir_date" style="pointer-events: none;" readonly>
        </div>
        <div class="form-group col-md-12">
            <label for="court_disposal_us" >Under Section:</label>
            <input type="text" class="form-control" id="court_disposal_us" value="<?php echo $row['us'];?>" name="court_disposal_us" style="pointer-events: none;" readonly>
        </div>
        <div class="form-group col-md-12">
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
        </div>
        <div class="form-group col-md-4">
            <label for="court_disposal_cs_no" >CS Number:</label>
            <input type="text" class="form-control" id="court_disposal_cs_no" value="<?php echo $row['cs_no'];?>" name="court_disposal_cs_no" style="pointer-events: none;" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="court_disposal_cs_date" >CS Date:</label>
            <input type="text" class="form-control" id="court_disposal_cs_date" value="<?php echo $csdate;?>" name="court_disposal_cs_date" style="pointer-events: none;" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="court_disposal_person_cs" >Person CS:</label>
            <input type="text" class="form-control" id="court_disposal_person_cs" value="<?php echo $row['person_cs'];?>" name="court_disposal_person_cs" style="pointer-events: none;" readonly>
        </div>
         <div class="form-group col-md-12">
            <label for="court_disposal_person_cs" >CS Section:</label>
            <input type="text" class="form-control" id="court_disposal_person_cs" value="<?php echo $row['section_of_law'];?>" name="court_disposal_person_cs" style="pointer-events: none;" readonly>
        </div>
        <?php
            }
            ?>

          <!--   COURT DISPOSAL ENTRY FORM -->
        <div class="form-group col-md-12">
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
        </div>
        <div class="form-group col-md-4">
            <label for="gr_no" >GR Number:<span style="color: red">&nbsp;*</span></label>
            <input type="text" class="form-control" id="gr_no" name="gr_no">
            <?php echo form_error('gr_no','<div style="color:red; font-style: italic;">', '</div>'); ?>
        </div>
        <div class="form-group col-md-4"> 
            <label for="type_of_court_disposal">Type of Court Disposal<span style="color: red">&nbsp;*</span></label> 
            <select id="type_of_court_disposal" name="type_of_court_disposal" class="form-control" style="height: auto">
                <option value="">Type of Court Disposal...</option>
                <option value="Acquitted">Acquitted</option>
                <option value="Conviction">Conviction</option>
            </select>
            <?php echo form_error('type_of_court_disposal','<div style="color:red; font-style: italic;">', '</div>'); ?>
        </div>

        <div class="form-group col-md-4">
            <label for="court_disposal_accused_person" >Accused Persons:<span style="color: red">&nbsp;*</span></label>
            <input type="text" class="form-control" id="court_disposal_accused_person" name="court_disposal_accused_person">
        </div>

        <div class="form-group col-md-4">
            <label for="court_disposal_date" >Date of Disposal:<span style="color: red">&nbsp;*</span></label>
            <input type="text" class="form-control" id="court_disposal_date" name="court_disposal_date">
        </div>
        
        <div class="form-group col-md-4">
            <label for="disposal_court_name" >Disposal Court Name:<span style="color: red">&nbsp;*</span></label>
            <input type="text" class="form-control" id="disposal_court_name" name="disposal_court_name">
        </div>

        <div class="form-group col-md-12">
            <label for="gist_of_disposal" >Gist Of Disposal:<span style="color: red">&nbsp;*</span></label>
            <input type="text" class="form-control" id="gist_of_disposal" name="gist_of_disposal">
        </div>

    <div class=" form-group col-md-12" style="text-align:right;">
            <button type="Submit" id="court_disposal_button" class="btn btn-success">Submit</button>
            <button type="button" class="btn btn-danger">Cancel</button>
    </div>
</div>

</form>