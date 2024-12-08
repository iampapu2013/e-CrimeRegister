<style>
    .btnedit:hover {
        background-color: RoyalBlue;
    }

    .btnedit {
        background-color: DodgerBlue;
        border: none;
        color: white;
        padding: 12px 16px;
        font-size: 16px;
        cursor: pointer;
    }

    .btnview:hover {
        background-color: #003300;
    }

    .btnview {
        background-color: #006600;
        border: none;
        color: white;
        padding: 12px 16px;
        font-size: 16px;
        cursor: pointer;
    }

    .btndelete:hover {
        background-color: #780000;
    }

    .btndelete {
        background-color: #FF0000;
        border: none;
        color: white;
        padding: 12px 16px;
        font-size: 16px;
        cursor: pointer;
    }

    .row_allud_data:hover {
            background-color: #dcdcdc;
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

<div class="t--ab">
    <button class="tablinks" onclick="openCity(event, 'all')" id="defaultOpen"></button>
    <!--  <button class="tablinks" onclick="openCity(event, 'new')">New Case</button>
    <button class="tablinks" onclick="openCity(event, 'approved')">Approved Case</button> -->
</div>

<div id="all" class="tabcontent">
    <h3 style="text-align: center;margin-top: 13px; color: blue;text-decoration: underline;">ALL UD CASE</h3>

    <div class="row mt-1">
        <div class="col-sm-8 pl-4"></div>
        <div class="col-sm-4 pr-5 mb-2 mt-1"><a href="<?php echo site_url('welcome/ud_entry_form'); ?>"
                Style="font-size:16px"><button type="button" class="btn btn-primary float-right"><b>Add New
                        UD</b></button></a></div>
    </div>


    <div class="table-responsive">
        <table id="allud_data" class="table table-bordered" style="width: 100%">
            <thead>
                <tr class="bg-secondary" style="color:white">
                    <th>Name of PS</th>
                    <th>UD Number</th>
                    <th>UD Date</th>
                    <th style="display:none;">Details of UD</th>
                    <th style="display:none;">UD ID</th>

                    <th style="width:9%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($edit_ud as $row) {
                    //echo $row->fir_date;
                    $ud_date = $row->ud_date;
                    $orderdate = explode('-', $ud_date);
                    $day = $orderdate[2];
                    $month = $orderdate[1];
                    $year = $orderdate[0];
                    $date = $day . '-' . $month . '-' . $year;
                    //echo $row;
                    ?>
                    <tr class="row_allud_data">
                        <td><?php echo $row->name_of_ps; ?></td>
                        <td><?php echo $row->ud_no; ?></td>
                        <td><?php echo $date; ?></td>
                        <td style="display:none;">
                            <h6><span style="font-weight: bold;"><?php echo $row->name_of_ps; ?> </span></h6>

                            <span style="font-weight: bold;">UD Number: </span><?php echo $row->ud_no; ?>
                            <br>
                            <span style="font-weight: bold;">UD Date: </span><?php echo $date; ?>
                            <br>
                            <span style="font-weight: bold;">Religion: </span><?php echo $row->ud_religion; ?>
                            <br>
                            <span style="font-weight: bold;">Caste: </span><?php echo $row->ud_caste; ?>
                            <br>
                            <span style="font-weight: bold;">Gender: </span><?php echo $row->ud_gender; ?>
                            <br>
                            <span style="font-weight: bold;">Age: </span><?php echo $row->age; ?>
                            <br>
                            <span style="font-weight: bold;">How to Death: </span><?php echo $row->how_to_death; ?>
                            <br>
                            <span style="font-weight: bold;">Reason Death: </span><?php echo $row->reason_death; ?>
                            <br>
                            <span style="font-weight: bold;">Profession: </span><?php echo $row->profession_death; ?>
                            <br>
                            <span style="font-weight: bold;">Social Status: </span><?php echo $row->social_death; ?>
                            <br>
                            <span style="font-weight: bold;">Education Qualification:
                            </span><?php echo $row->education_death; ?>
                            <br>
                            <span style="font-weight: bold;">Place of Occurrence: </span><?php echo $row->ud_place; ?>
                            <br>
                            <span style="font-weight: bold;">Case Reference: </span><?php echo $row->ud_case_ref; ?>
                        </td>
                        <td style="display:none;"><input type="text" id="ud_id" name="ud_id" value="<?php echo $row->ud_id; ?>">
                        </td>

                        <td> <a href="<?php echo site_url('welcome/edit_ud_form/' . $row->ud_id); ?>">
                                <button class="btnedit"><i class="fa fa-edit"></i></button></a>
                            <button type="button" class="btnview view_uddetails"><i class="fa fa-eye"></i></button>
                        </td>

                    </tr>

                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<!-- UD Data View Module -->

<div id="view_ud_data" class="modal fade view_cscase">
    <div class="modal-dialog modal-lg"> <!--for Big Model -->
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title font-weight-bold text-white">UD Details </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" style="table-layout: fixed;word-break: break-all;">
                            <tbody>
                                <tr>
                                    <i>
                                        <h3 style="color:blue"><span class="ud_ps"></span> UD No. <span
                                                class="ud_caseno"></span>
                                            Dated. <span class="ud_date"></span></h3>
                                    </i>
                                    <P style="font-size:20px">
                                        <b>Religion: </b></span><i class="ud_religion"></i>
                                        <br>
                                        <b>Caste: </b></span><i class="ud_caste"></i>
                                        <br>
                                        <b>Gender: </b></span><i class="ud_gender"></i>
                                        <br>
                                        <b>Age: </b></span><i class="ud_age"></i>
                                        <br>
                                        <b>How to Death: </b></span><i class="ud_howtodeath"></i>
                                        <br>
                                        <b>Reason Death: </b></span><i class="ud_reasondeath"></i>
                                        <br>
                                        <b>Profession: </b></span><i class="ud_profession"></i>
                                        <br>
                                        <b>Social Status: </b></span><i class="ud_socialstatus"></i>
                                        <br>
                                        <b>Education Qualification: </b></span><i class="ud_education"></i>
                                        <br>
                                        <b>Place of Occurrence: </b></span><i class="ud_po"></i>
                                        <br>
                                        <b>Case Reference: </b></span><i class="ud_caseref"></i>
                                    </P>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Script For Tab -->
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen").click();
</script>