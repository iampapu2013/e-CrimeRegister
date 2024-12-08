<style>
      .btnedit:hover {
            background-color: RoyalBlue;
      }

      .btnedit {
            background-color: DodgerBlue;
            border: none;
            color: white;
            padding: 8px 16px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px
      }

      .btnview:hover {
            background-color: #003300;
      }

      .btnview {
            background-color: #006600;
            border: none;
            color: white;
            padding: 8px 16px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px
      }

      .btndelete:hover {
            background-color: #780000;
      }

      .btndelete {
            background-color: #FF0000;
            border: none;
            color: white;
            padding: 8px 16px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px
      }

      .btn-secondary {
            padding: 8px 16px;
            border-radius: 10px;
      }

      .row_approveddata:hover {
            background-color: #dcdcdc;
      }

      .row_alldata:hover {
            background-color: #dcdcdc;
      }

      .row_newdata:hover {
            background-color: #dcdcdc;
      }

      /* Ensure that the demo table scrolls */
      /* th, td { white-space: nowrap; } */
      .abcd {
            white-space: nowrap;
      }

      div.dataTables_wrapper {
            margin: 0 auto;
      }

      div.container {
            width: 80%;
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

<?php
if ($user_type_id == '1' || $user_type_id == '2') {
      ?>
      <div class="row mt-1">
            <div class="col-sm-8 pl-4"></div>
            <div class="col-sm-4 pr-5 mb-2 mt-1"><a href="<?php echo site_url('welcome/caseentry'); ?>"
                        Style="font-size:16px"><button type="button" class="btn btn-primary float-right"><B>ADD NEW CASE</B></button></a></div>
      </div>

      <?php
}
?>



<div class="tab bg-success">
      <button class="tablinks" onclick="openCity(event, 'all')" id="defaultOpen"><B>All Case</B></button>
      <button class="tablinks" onclick="openCity(event, 'new')"><B>New Case</B></button>
      <?php
      if ($user_type_id == '1' || $user_type_id == '2') {
            ?>
            <button class="tablinks" onclick="openCity(event, 'approved')"><B>Approved Case</B></button>
            <?php
      }
      ?>
</div>

<div id="all" class="tabcontent" id="mydata_table">
      <h3 style="text-align: center;margin-top: 13px; color: blue;text-decoration: underline;"> ALL CASE</h3>
      <div class="table-responsive">
            <table id="allcase" class="table table-bordered" style="width: 100%">
                  <thead>
                        <tr class="bg-secondary" style="color:white">
                              <th style="width:10%">Name of PS</th>
                              <th style="display: none">case ID</th>
                              <th>FIR No</th>
                              <th>FIR Date</th>
                              <th>Section of Law</th>
                              <th>Crime Head</th>
                              <th>Arrest</th>
                              <th style="display: none">Status</th>
                              <th style="width:9%">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php foreach ($get_allcase as $row) {
                              //echo $row->fir_date;
                              $fir_date = $row->fir_date;
                              $orderdate = explode('-', $fir_date);
                              $day = $orderdate[2];
                              $month = $orderdate[1];
                              $year = $orderdate[0];
                              $date = $day . '-' . $month . '-' . $year;
                              //echo $date;
                              ?>
                              <tr class="row_alldata">
                                    <td><?php echo $row->name_of_ps; ?></td>
                                    <td style="display: none"><input type="text" id="case_id" name="case_id"
                                                value="<?php echo $row->case_id; ?>"></td>
                                    <td><?php echo $row->fir_no; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo $row->us; ?></td>
                                    <td><?php echo $row->crimehead; ?></td>
                                    <td><?php echo $row->arrest; ?></td>
                                    <th style="display: none"><?php echo $row->flag; ?></th>
                                    <td>
                                          <?php
                                          if ($user_type_id == '1' || $user_type_id == '2') {
                                                ?>
                                                <div class="tooltip">
                                                      <a href="<?php echo site_url('welcome/edit_case/' . $row->case_id); ?>"><button
                                                                  class="btnedit"><i class="fa fa-edit"></i></button></a>
                                                      <span class="tooltiptext">Edit</span>
                                                </div>
                                                <!-- <a href="<?php //echo site_url('welcome/edit_case/'.$row->case_id); ?>">
                                <button class="btnedit"><i class="fa fa-edit"></i></button></a> -->
                                          <?php } ?>
                                          <div class="tooltip">
                                                <button type="button" class="btnview view_allcase"><i
                                                            class="fa fa-eye"></i></button>
                                                <span class="tooltiptext">View</span>
                                          </div>

                                          <div class="tooltip">
                                                <!-- <button class="btndelete"><i class="fa fa-trash"></i></button>
                                  <span class="tooltiptext">Delete</span> -->
                                          </div>
                                    </td>
                              </tr>
                        <?php
                        }
                        ?>
                  </tbody>
            </table>
      </div>
</div>


<div id="new" class="tabcontent">
      <h3 style="text-align: center;margin-top: 13px; color: blue;text-decoration: underline;"> NEW CASE</h3>
      <div class="table-responsive">
            <table id="newcase" class="table table-bordered" style="width: 100%">
                  <thead>
                        <tr class="bg-secondary" style="color:white">
                              <th style="width:10% ">Name of PS</th>
                              <th style="display: none">case ID</th>
                              <th>FIR NO</th>
                              <th>FIR Date</th>
                              <th>Section of Law</th>
                              <th>Crime Head</th>
                              <th>Arrest</th>
                              <th style="display: none">Status</th>
                              <th style="width:10% ">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php foreach ($get_newcase as $rownew) {
                              # code...
                              ?>
                              <tr class="row_newdata">
                                    <td style="width:10% "><?php echo $rownew->name_of_ps; ?></td>
                                    <td style="display: none"><input type="text" id="case_id" name="case_id"
                                                value="<?php echo $rownew->case_id; ?>"></td>
                                    <td><?php echo $rownew->fir_no; ?></td>
                                    <td><?php echo $rownew->fir_date; ?></td>
                                    <td><?php echo $rownew->us; ?></td>
                                    <td><?php echo $rownew->crimehead; ?></td>
                                    <td><?php echo $rownew->arrest; ?></td>
                                    <th style="display: none"><?php echo $row->flag; ?></th>
                                    <td style="width:9% ">
                                          <div class="tooltip">
                                                <a href="<?php echo site_url('welcome/edit_case/' . $rownew->case_id); ?>">
                                                      <button class="btnedit "><i class="fa fa-edit"></i></button></a>
                                                <span class="tooltiptext">Edit</span>
                                          </div>
                                          <div class="tooltip">
                                                <button class="btnview veiw_newcase"><i class="fa fa-eye"></i></button>
                                                <span class="tooltiptext">View</span>
                                          </div>
                                          <div class="tooltip">
                                                <!--  <button class="btndelete"><i class="fa fa-trash"></i></button>
                                  <span class="tooltiptext">Delete</span> -->
                                          </div>
                                    </td>
                              </tr>
                        <?php
                        }
                        ?>
                  </tbody>
            </table>
      </div>
</div>
<?php
if ($user_type_id == '1' || $user_type_id == '2') {
      ?>
      <div id="approved" class="tabcontent">
            <h3 style="text-align: center;margin-top: 13px; color: blue;text-decoration: underline;"> APPROVED CASE</h3>
            <div class="table-responsive">
                  <table id="approvedcase" class="table table-bordered" style="width: 100%">
                        <thead>
                              <tr class="bg-secondary" style="color:white">
                                    <th style="width:10%">Name of PS</th>
                                    <th style="display: none">case ID</th>
                                    <th>FIR NO</th>
                                    <th>FIR Date</th>
                                    <th>Section of Law</th>
                                    <th>Crime Head</th>
                                    <th>Arrest</th>
                                    <th style="display: none">Status</th>
                                    <th style="width:9%">Action</th>
                              </tr>
                        </thead>
                        <tbody>
                              <?php foreach ($get_approvedcase as $rowapp) {
                                    ?>
                                    <tr class="row_approveddata">
                                          <td style="width:10%"><?php echo $rowapp->name_of_ps; ?></td>
                                          <td style="display: none"><input type="text" id="case_id" name="case_id"
                                                      value="<?php echo $rowapp->case_id; ?>"></td>
                                          <td><?php echo $rowapp->fir_no; ?></td>
                                          <td><?php echo $rowapp->fir_date; ?></td>
                                          <td><?php echo $rowapp->us; ?></td>
                                          <td><?php echo $rowapp->crimehead; ?></td>
                                          <td><?php echo $rowapp->arrest; ?></td>
                                          <th style="display: none"><?php echo $rowapp->flag; ?></th>
                                          <td style="width:9%">
                                                <div class="tooltip">
                                                      <a href="<?php echo site_url('welcome/edit_case/' . $rowapp->case_id); ?>">
                                                            <button class="btnedit"><i class="fa fa-edit"></i></button></a>
                                                      <span class="tooltiptext">Edit</span>
                                                </div>
                                                <div class="tooltip">
                                                      <button class="btnview view_approvedcase"><i class="fa fa-eye"></i></button>
                                                      <span class="tooltiptext">View</span>
                                                </div>
                                                <div class="tooltip">
                                                      <!--  <button class="btndelete"><i class="fa fa-trash"></i></button>
                                      <span class="tooltiptext">Delete</span> -->
                                                </div>
                                          </td>
                                    </tr>
                              <?php
                              }
                              ?>
                        </tbody>
                  </table>
            </div>
      </div>
<?php
}
?>


<!--- MODAL FOR VIEW ALL CASE------->
<div id="view_case" class="modal fade view_case">
      <div class="modal-dialog modal-lg"> <!--for Big Model -->
            <div class="modal-content">
                  <div class="modal-header bg-success">
                        <h5 class="modal-title font-weight-bold text-white">CASE DETAILS:</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body" style="word-break: break-all">
                        <div class="row">
                              <div class="col-md-12">
                                    <table class="table table-bordered"
                                          style="table-layout: fixed;word-break: break-all;">
                                          <tbody>
                                                <tr>
                                                      <th style="width: 20%">Name of PS:</th>
                                                      <td class="view_ps"></td>
                                                </tr>
                                                <tr>
                                                      <th>Case No:</th>
                                                      <td class="view_caseno"></td>
                                                </tr>
                                                <tr>
                                                      <th>Date:</th>
                                                      <td class="view_date"></td>
                                                </tr>
                                                <tr>
                                                      <th>Section of Law:</th>
                                                      <td class="view_us"></td>
                                                </tr>
                                                <tr>
                                                      <th>Crime Head:</th>
                                                      <td class="view_crimehead"></td>
                                                </tr>
                                                <tr>
                                                      <th>Gist:</th>
                                                      <td class="view_gist "> </td>
                                                </tr>
                                                <tr>
                                                      <th>Arrest:</th>
                                                      <td class="view_arrest"></td>
                                                </tr>
                                          </tbody>
                                    </table>
                              </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn bg-warning" data-dismiss="modal">Close</button>
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