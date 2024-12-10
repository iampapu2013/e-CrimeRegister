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

    .btn_show {
        display: none;
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
        <h3 style="text-align: center; color: blue;text-decoration: underline">Seizure Search</h3>

    </div>
</div>

<div class="container">
    <div class="form-row">
        <div class="column note" style="width: 30%; height: auto;">
            <h5 class="text-center" style="margin-top:3%; color:white">Seizure Search</h5>
            <hr>
            <p>
            <h5>You can search with: <br><br>A) Select Seizure Type <br>B) Select Seizure Type with From Date and TO
                Date also</h5>
            </p>
        </div>
        <div class="column" style="background-color:#eee; width: 70%;height: auto;">
            <div class="form-row " style="margin-top:3%">

                <input type="hidden" class="form-control" value="<?php echo $user_id ?>" id="user_id" name="user_id">

                <div class="form-group common_input_div col-md-12">
                    <label for="seizure_search_ps">Police Station Name:<span style="color: red">&nbsp;*</span></label>
                    <select name="seizure_search_ps" style="height: auto" class="form-control" id="seizure_search_ps">
                        <option value="">Select Police Station</option>
                        <?php
                        foreach ($get_policestation as $row) {
                            echo '<option value="' . $row->ps_id . '">' . $row->name_of_ps . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label for="seizure_type">
                        <h5>Select Seizure Type<span style="color: red">&nbsp;*</span></h5>
                    </label>
                    <select id="seizure_type" name="seizure_type" style="height: auto" class="form-control crimehead">
                        <option value="">Select Seizure Type</option>
                        <?php
                        foreach ($get_seizure_type as $row1) {
                            echo '<option value="' . $row1->seizure_type . '">' . $row1->seizure_lable . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="seizure_search_from_date"><b>From Date:<span
                                style="color: red">&nbsp;*</span></b></label>
                    <input type="text" class="form-control" id="seizure_search_from_date"
                        name="seizure_search_from_date" autocomplete="off" />
                </div>

                <div class="form-group col-md-6">
                    <label for="seizure_search_to_date"><b>To Date:<span style="color: red">&nbsp;*</span></b></label>
                    <input type="text" class="form-control" id="seizure_search_to_date" name="seizure_search_to_date"
                        autocomplete="off" />
                </div>
                <div class="form-group col-md-12" style="text-align:right">
                    <!-- <label for="crimeSearchSubmit">&nbsp;</label> -->
                    <div class="form-group">
                        <button type="submit" id="seizure_data" class="btn btn-success seizure_data">Save as
                            Excel</button>
                    </div>
                </div>

            </div>
        </div>
    </div>