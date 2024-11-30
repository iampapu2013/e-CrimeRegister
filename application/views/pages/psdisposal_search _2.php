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
            <h3 style="text-align: center; color: blue;text-decoration: underline">PS Disposal Search</h3>

      </div>
</div>

<div class="container">
      <div class="form-row">
            <div class="column note" style="width: 30%; height: auto;">
                  <h5 class="text-center" style="margin-top:3%">PS Disposal Search</h5>
                  <hr>
                  <p>You can search with: <br> a) Criminal Name only b) PS Name along with Criminal Name c) Type of
                        Crime only
                        d) Type of Crime along with PS Name</p>
            </div>
            <div class="column" style="background-color:#eee; width: 70%;height: auto;">
                  <div class="form-row " style="margin-top:3%">
                        <div class="form-group col-md-6">
                              <label for="criminal_name">Criminal Name</label>
                              <input type="text" class="form-control" id="criminal_name" name="criminal_name">
                        </div>

                        <input type="hidden" class="form-control" value="<?php echo $user_id ?>" id="user_id"
                              name="user_id">
                        <div class="form-group common_input_div col-md-6">
                              <label for="criminal_search_ps">Police Station Name:<span
                                          style="color: red">&nbsp;*</span></label>
                              <select name="criminal_search_ps" style="height: auto" class="form-control"
                                    id="criminal_search_ps">
                                    <option value="">Select Police Station</option>
                                    <?php
                                    foreach ($get_policestation as $row) {
                                          echo '<option value="' . $row->ps_id . '">' . $row->name_of_ps . '</option>';
                                    }
                                    ?>
                              </select>
                        </div>

                        <div class="form-group col-md-12">
                              <label for="type_of_crime">Type of Crime:<span style="color: red">&nbsp;*</span></label>
                              <select id="type_of_crime" name="type_of_crime" style="height: auto"
                                    class="form-control crimehead">
                                    <option value="">Select Type of Crime</option>
                                    <option value="all">All</option>
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
                                    <button type="submit" id="crimeSearchSubmit" class="btn btn-primary">Search</button>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

</div>






<div class="container" style="margin-top:25px">

      <div class="form-row">
            
      <img id="download_crime_search" class="mt-1 mb-1" style="height: 50px; position: relative;
  float: right;cursor: pointer"src="<?php echo base_url(); ?>assets/image/excel.png" alt="logo">
            <div class="table-responsive">
                  <table class="table table-bordered" style="width: 100%">
                        <thead>
                              <tr>
                                    <th class="abcd" style="width:5%">Sl No</th>
                                    <th class="abcd">Case Details</th>
                                    <th class="abcd" style="display: none">case ID</th>
                                    <th class="abcd">Crime Head</th>
                                    <th class="abcd" style="width:9%">Disposal Type</th>
                                    <th class="abcd" style="width:9%">Disposal No</th>
                                    <th class="abcd" style="width:9%">Disposal Date</th>
                                    <th class="abcd" style="width:9%">Persons CS</th>
                                    <th class="abcd" style="width:9%">Transfer Unit</th>
                              </tr>
                        </thead>
                        <tbody>
                              
                              <?php foreach ($psdisposal_search as $row1) {
                                    //echo $row->fir_date;
                                    
                                    $fir_date = $row1->fir_date;
                                    $orderdate = explode('-', $fir_date);
                                    $day = $orderdate[2];
                                    $month = $orderdate[1];
                                    $year = $orderdate[0];
                                    $date = $day . '-' . $month . '-' . $year;
                                    //echo $date;
                                    ?>
                                   
                                    <tr class="row_alldata">
                                          
                                          <td class="abcd"> </td>
                                          <td class="abcd"><?php echo $row1->name_of_ps; ?> Case No. <?php echo $row1->fir_no; ?> Date. <?php echo $date; ?> U/S- <?php echo $row1->us; ?></td>
                                          <td class="abcd" style="display: none"><input type="text" id="case_id"
                                                      name="case_id" value="<?php echo $row1->case_id; ?>"></td>
                                          <td class="abcd"><?php echo $row1->crimehead; ?></td>
                                          <td class="abcd"><?php echo $row1->type_of_disposal; ?></td>
                                          <td class="abcd"><?php echo $row1->cs_no; ?></td>
                                          <td class="abcd"></td>
                                          <td class="abcd"></td>
                                          <td class="abcd"></td>
                                          
                                    </tr>
                                    
                                    
                                    <?php
                              }
                              ?>
                        </tbody>
                  </table>
            </div>
      </div>
</div>