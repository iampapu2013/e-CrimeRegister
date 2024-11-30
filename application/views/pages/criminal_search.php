<style>
    .order-card {
        color: #fff;
    }

    .note {
        background: linear-gradient(45deg, #4099ff, #73b4ff);
    }

    .bg-c-green {
        background: linear-gradient(45deg, #2ed8b6, #59e0c5);
    }

    .bg-c-yellow {
        background: linear-gradient(45deg, #FFB64D, #ffcb80);
    }

    .bg-c-pink {
        background: linear-gradient(45deg, #FF5370, #ff869a);
    }


    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
        box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
        border: none;
        margin-bottom: 30px;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .card .card-block {
        padding: 25px;
    }

    .order-card i {
        font-size: 26px;
    }

    .f-left {
        float: left;
    }

    .f-right {
        float: right;
    }

    /*.ui-datepicker-calendar {
    display: none;
    }*/


    .has-search .form-control {
        padding-left: 2.375rem;
    }

    .has-search .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }

    /* .tooltip {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 500px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px;
        position: absolute;
        z-index: 1;
        bottom: -18%;
        left: 43%;
        margin-left: 36px;
        opacity: 0;
        transition: opacity 0.3s;
    } */

    /* .tooltip:hover .tooltiptext {
        visibility: visible;
        opacity: 1;
    } */

    .dataview {
        display: flex;
    }

    .btn-secondary {
        padding: 8px 16px;
        border-radius: 10px;
    }

    h3 {
        text-align: center;
        margin-bottom: 20px;
        text-decoration: underline;
    }

    * {
        box-sizing: border-box;
    }

    /* Create two equal columns that floats next to each other */
    .column {
        float: left;

        padding: 10px;
        height: 300px;
        /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
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
        <h3 style="text-align: center; color: blue;text-decoration: underline">Criminal Search</h3>

    </div>
</div>

<div class="container">
    <div class="form-row">
        <div class="column note" style="width: 30%; height: auto;">
            <h5 class="text-center" style="margin-top:3%">Criminal Search</h5>
            <hr>
            <p>You can search with: <br> a) Criminal Name only b) PS Name along with Criminal Name c) Type of Crime only
                d) Type of Crime along with PS Name</p>
        </div>
        <div class="column" style="background-color:#eee; width: 70%;height: auto;">
            <div class="form-row " style="margin-top:3%">
                <div class="form-group col-md-6">
                    <label for="criminal_name">Criminal Name</label>
                    <input type="text" class="form-control" id="criminal_name" name="criminal_name">
                </div>

                <input type="hidden" class="form-control" value="<?php echo $user_id ?>" id="user_id" name="user_id">
                <div class="form-group common_input_div col-md-6">
                    <label for="criminal_search_ps">Police Station Name:<span style="color: red">&nbsp;*</span></label>
                    <select name="criminal_search_ps" style="height: auto" class="form-control" id="criminal_search_ps">
                        <option value="">Select Police Station</option>
                        <?php
                        foreach ($get_policestation as $row) {
                            echo '<option value="' . $row->ps_id . '">' . $row->name_of_ps . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label for="type_of_criminal_crime">Type of Crime:<span style="color: red">&nbsp;*</span></label>
                    <select id="type_of_criminal_crime" name="type_of_criminal_crime" style="height: auto" class="form-control crimehead">
                        <option value="">Select Type of Crime</option>
                        <?php
                        foreach ($get_crime_head as $row1) {
                            echo '<option value="' . $row1->crime_head_id . '">' . $row1->crimehead . '</option>';
                        }
                        ?>
                    </select>
                    <?php echo form_error('crime_head', '<div style="color:red; font-style: italic;">', '</div>'); ?>
                </div>

                <div class="form-group col-md-12" style="text-align:right">
                    <!-- <label for="crimeSearchSubmit">&nbsp;</label> -->
                    <div class="form-group">
                        <button type="submit" id="criminal_SearchSubmit" class="btn btn-primary">Search</button>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>




<div class="container" style="margin-top:30px">
    <div class="form-row">

        <!-- div class="form-group has-search f-right" style="width: 100px;cursor: pointer; color: green" > -->
        <!-- <img id="download_crime_search" class="mt-1 mb-1" style="height: 50px; float: right;cursor: pointer"
        src="<//?php echo base_url(); ?>assets/image/excel.png" alt="logo"> -->

        <!--   <button type="submit" id="download_crime_search" class="btn "><img id="download_crime_search" class="mt-1 mb-1" style="height: 30px;" src="</?php //echo base_url(); ?>assets/image/excel.png" alt="logo">Download</button> -->
        <!--  </div> -->

        <table class="table table-hover border criminal_search" id="criminal_search">
            <thead style="background-color: #aaa;">
                <tr>
                    <th>Sl No</th>
                    <th>Details of Criminal</th>
                    <th>Image</th>

                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>



<!-- Modal for CS   -->

<!-- <div id="view_csdisposal_details" class="modal fade view_case" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">View PS Disposal Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 10px 65px;">
                <h3>Details of Charge Sheet</h3>
                <p>
                <h5><span id="ps_name"></span> Case No. <span id="fir_no"></span> Date. <span id="fir_date"></span>
                </h5>
                </p>
                <p>Charge Sheet No:<span id="cs_no"></span></p>
                <p>Charge Sheet Date:<span id="cs_date"></span></p>
                <p>Persons Charge Sheeted:<span id="pc_sheeted"></span></p>
                <p>Details of Person:<span id="details_person"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
<!-- Modal for FRT   -->
<!-- <div id="view_frtdisposal_details" class="modal fade view_case" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">View PS Disposal Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 10px 65px;">
                <h3>Details of FRT</h3>
                <p>
                <h5><span id="frt_ps_name"></span> Case No. <span id="frt_fir_no"></span> Date. <span
                        id="frt_fir_date"></span>
                </h5>
                </p>
                <p>FRT No:<span id="frt_no"></span></p>
                <p>FRT Date:<span id="frt_date"></span></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
<!-- Modal for FRMF   -->
<!-- <div id="view_frmfdisposal_details" class="modal fade view_case" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">View PS Disposal Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 10px 65px;">
                <h3>Details of FRMF</h3>
                <p>
                <h5><span id="frmf_ps_name"></span> Case No. <span id="frmf_fir_no"></span> Date. <span
                        id="frmf_fir_date"></span>
                </h5>
                </p>
                <p>FRMF No:<span id="frmf_no"></span></p>
                <p>FRMF Date:<span id="frmf_date"></span></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
<!-- Modal for TRANSFER   -->
<!-- <div id="view_transferdisposal_details" class="modal fade view_case" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">View PS Disposal Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 10px 65px;">
                <h3>Details of Transfer Unit</h3>
                <p>
                <h5><span id="transfer_ps_name"></span> Case No. <span id="transfer_fir_no"></span> Date. <span
                        id="transfer_fir_date"></span></h5>
                </p>
                <p><b>Transfer Unit:</b><span id="transfer_unit"></span></p>
                <p>Transfer Date:<span id="transfer_date"></span></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
<!-- Modal for Court Disposal Acquitted  -->
<!-- <div id="view_courtdisposal_details" class="modal fade view_case" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">View PS Disposal Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 10px 65px;">
                <h3>Details of Acquitted</h3>
                <p>
                <h5><span id="court_ps_name"></span> Case No. <span id="court_fir_no"></span> Date. <span
                        id="court_fir_date"></span></h5>
                </p>
                <p>Type of Court Disposal: <span id="court_disposal_type"></span></p>
                <p>Acquitted Date: <span id="court_disposal_date"></span></p>
                <p>Number of Acquitted Person: <span id="court_disposal_accused_person"></span></p>
                <p>Court Name: <span id="disposal_court_name"></span></p>
                <p>Details of Acquitted: <span id="gist_of_disposal"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
<!-- Modal for Court Disposal Conviction  -->
<!-- <div id="view_courtdisposal_details_con" class="modal fade view_case" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">View PS Disposal Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 10px 65px;">
                <h3>Details of Conviction</h3>
                <p>
                <h5><span id="court_ps_name_con"></span> Case No. <span id="court_fir_no_con"></span> Date. <span
                        id="court_fir_date_con"></span></h5>
                </p>
                <p>Type of Court Disposal: <span id="court_disposal_type_con"></span></p>
                <p>Conviction Date: <span id="court_disposal_date_con"></span></p>
                <p>Number of Convictted Person: <span id="court_disposal_accused_person_con"></span></p>
                <p>Court Name: <span id="disposal_court_name_con"></span></p>
                <p>Details of Conviction: <span id="gist_of_disposal_con"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->