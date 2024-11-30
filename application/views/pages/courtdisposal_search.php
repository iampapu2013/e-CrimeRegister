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
            <h3 style="text-align: center; color: blue;text-decoration: underline">Court Disposal Search</h3>

      </div>
</div>

<div class="container">
      <div class="form-row">
            <div class="column note" style="width: 30%; height: auto; color:white">
                  <h5 class="text-center" style="margin-top:3%">Court Disposal Search</h5>
                  <hr>
                  <p style="color:white">You can search with different two date: <br>(i.e. From Date- 25/01/2024 & To
                        Date- 27/08/2024)</p>
            </div>
            <div class="column" style="background-color:#eee; width: 70%;height: auto;">
                  <div class="form-row " style="margin-top:3%">
                        <!-- <div class="form-group col-md-6">
                              <label for="criminal_name">Criminal Name</label>
                              <input type="text" class="form-control" id="criminal_name" name="criminal_name">
                        </div>

                        <input type="hidden" class="form-control" value="</?php echo $user_id ?>" id="user_id"
                              name="user_id">
                        <div class="form-group common_input_div col-md-6">
                              <label for="criminal_search_ps">Police Station Name:<span
                                          style="color: red">&nbsp;*</span></label>
                              <select name="criminal_search_ps" style="height: auto" class="form-control"
                                    id="criminal_search_ps">
                                    <option value="">Select Police Station</option>
                                    </?php
                                    foreach ($get_policestation as $row) {
                                          echo '<option value="' . $row->ps_id . '">' . $row->name_of_ps . '</option>';
                                    }
                                    ?>
                              </select>
                        </div> -->
                        <div class="form-group col-md-6">
                              <label for="crime_search_from_date">From Date:<span
                                          style="color: red">&nbsp;*</span></label>
                              <input type="text" class="form-control" id="crime_search_from_date"
                                    name="crime_search_from_date" autocomplete="off" />
                        </div>


                        <div class="form-group col-md-6">
                              <label for="crime_search_to_date">To Date:<span style="color: red">&nbsp;*</span></label>
                              <input type="text" class="form-control" id="crime_search_to_date"
                                    name="crime_search_to_date" autocomplete="off" />
                        </div>

                        <!-- <div class="form-group col-md-12">
                              <label for="type_of_crime">Type of Crime:<span style="color: red">&nbsp;*</span></label>
                              <select id="type_of_crime" name="type_of_crime" style="height: auto"
                                    class="form-control crimehead">
                                    <option value="">Select Type of Crime</option>
                                    <option value="all">All</option>
                                    </?php
                                    foreach ($get_crime_head as $row1) {
                                          echo '<option value="' . $row1->crime_head_id . '">' . $row1->crimehead . '</option>';
                                    }
                                    ?>
                              </select>
                              </?php echo form_error('crime_head', '<div style="color:red; font-style: italic;">', '</div>'); ?>
                        </div> -->

                        <div class="form-group col-md-12" style="text-align:right">
                              <!-- <label for="crimeSearchSubmit">&nbsp;</label> -->
                              <div class="form-group">
                                    <button type="submit" id="crimeSearchSubmit" class="btn btn-primary">Search</button>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

</div>




<div class="container" style="margin-top:25px">

      <img id="download_courtdisposal_search" class="mt-1 mb-1" style="height: 50px; float: right;cursor: pointer" src="<?php echo base_url(); ?>assets/image/excel.png" alt="logo">
      <div class="table-responsive">
            <table class="table table-bordered" style="width: 100%" id="courtdisposalSearch">
                  <thead style="background-color: #aaa;">
                        <tr>
                              <th style="width:5%">Sl No</th>
                              <th>Case Details</th>
                              <!-- <th style="display: none">case ID</th> -->
                              <th>Crime Head</th>
                              <th style="width:9%">Disposal Type</th>
                              <th style="width:9%">Disposal Date</th>
                              <th style="width:9%">Person</th>
                              <th style="width:9%">Details of Disposal</th>
                        </tr>
                  </thead>
                  <tbody>

                        <?php
                        $sl_no = 1;
                        foreach ($courtdisposal_search as $row1) {
                              //echo $row->fir_date;
                              $fir_date = $row1->fir_date;
                              $orderdate = explode('-', $fir_date);
                              $day = $orderdate[2];
                              $month = $orderdate[1];
                              $year = $orderdate[0];
                              $date = $day . '-' . $month . '-' . $year;
                              $disposal_date = $row1->court_disposal_date;
                              $dorderdate = explode('-', $disposal_date);
                              $day = $dorderdate[2];
                              $month = $dorderdate[1];
                              $year = $dorderdate[0];
                              $d_date = $day . '-' . $month . '-' . $year;
                              ?>
                              <tr class="row_alldata">
                                    <td><?php echo $sl_no; ?> </td>
                                    <td><?php echo $row1->name_of_ps; ?> Case No.
                                          <?php echo $row1->fir_no; ?> Date. <?php echo $date; ?> U/S-
                                          <?php echo $row1->us; ?>
                                    </td>
                                    <!-- <td style="display: none"><input type="text" id="case_id" name="case_id"
                                                      value="</?php echo $row1->case_id; ?>"></td> -->
                                    <td><?php echo $row1->crimehead; ?></td>
                                    <td><?php echo $row1->type_of_court_disposal; ?></td>
                                    <td><?php echo $d_date; ?>
                                    </td>
                                    <td>
                                          <?php echo $row1->court_disposal_accused_person; ?>
                                    </td>
                                    <td>
                                          <?php echo $row1->gist_of_disposal; ?>
                                    </td>

                              </tr>
                              <?php $sl_no++;
                        } ?>
                  </tbody>
            </table>
      </div>
</div>