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

      .row_seizuredata:hover {
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

</div>

<div id="all" class="tabcontent">
      <h3 style="text-align: center;margin-top: 13px; color: blue;text-decoration: underline;">SEIZURE EDIT</h3>

      <div class="table-responsive">
            <table id="seizuredata" class="table table-bordered" style="width: 100%">
                  <thead>
                        <tr class="bg-secondary" style="color:white">
                              <th style="width:9%">Name Of PS</th>
                              <th style="width:9%">Case id</th>
                              <th>Case / GDE No</th>
                              <!-- <th>GDE No</th> -->
                              <th>Date</th>
                              <th>Under Section</th>
                              <th style="width:13%">Seizure Status (Yes/No)</th>
                              <th style="display:none">case ID</th>
                              <th style="display:none">gde ID</th>

                              <th style="width:9%">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php foreach ($edit_seizure_list as $row) {
                              //echo $row->fir_date;
                              $entry_date = $row->fir_date != null ? $row->fir_date : $row->gde_date;
                              $orderdate = explode('-', $entry_date);
                              $day = $orderdate[2];
                              $month = $orderdate[1];
                              $year = $orderdate[0];
                              $date = $day . '-' . $month . '-' . $year;

                              // $fir_date = $row->fir_date;
                              // if ($fir_date != NULL) {
                              //       $orderdate = explode('-', $fir_date);
                              //       $day = $orderdate[2];
                              //       $month = $orderdate[1];
                              //       $year = $orderdate[0];
                              //       $date = $day . '-' . $month . '-' . $year;
                              // }else{
                              //       $date='00-00-0000';
                              // }
                              //echo $date;
                              ?>
                              <tr class="row_seizuredata">
                                    <td><?php echo $row->name_of_ps != NULL ? $row->name_of_ps : $row->seizure_psname; ?></td>
                                    <td><?php echo $row->case_id; ?></td>

                                    <!-- <td> </?php echo $row->fir_no!=; ?></td> -->
                                    <td> <?php echo $row->gde_no != 0 ? '<span style="color:blue">GDE No- ' . $row->gde_no . '</span>' : '<span style="color:red">Case No- ' . $row->fir_no . '</span>'; ?>
                                    </td>
                                    <td><?php echo $date; ?></td>
                                    <td> <?php echo $row->us; ?></td>
                                    <td><?php echo $row->arms != 0 || $row->ammunition != 0 || $row->explosive != 0 || $row->id_seizure != 0 || $row->id_destroy != 0 || $row->bomb != 0 || $row->ganja != 0 || $row->herion != 0 || $row->fire_cracker != 0 || $row->board_money != 0 || $row->unclaim_property != "" || $row->suspicious_property != "" || $row->other != "" ? '<b style="color:red">Yes</b>' : '<b>No</b>' ?>
                                    </td>

                                    <td style="display:none"><input type="text" id="case_id" name="case_id"
                                                value="<?php echo $row->case_id; ?>"></td>
                                    <td style="display:none"><input type="text" id="gde_no" name="gde_no"
                                                value="<?php echo $row->gde_no; ?>"></td>

                                    <td> <a href="<?php echo site_url('welcome/seizure_edit_form/' . $row->case_id); ?>">
                                                <button class="btnedit"><i class="fa fa-edit"></i></button></a>
                                          <button type="button" class="btnview view_allseizure"><i
                                                      class="fa fa-eye"></i></button>
                                    </td>
                              </tr>
                              <?php
                        }
                        ?>
                  </tbody>
            </table>
      </div>
</div>

<div id="view_seizure" class="modal fade view_cscase">
      <div class="modal-dialog modal-lg"> <!--for Big Model -->
            <div class="modal-content">
                  <div class="modal-header bg-success">
                        <h5 class="modal-title font-weight-bold text-white">Seizure Details </h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                        <div class="row">
                              <div class="col-md-12">
                                    <table class="table table-bordered"
                                          style="table-layout: fixed;word-break: break-all;">
                                          <tbody>
                                                <tr>
                                                      <i>
                                                            <h3 style="color:blue"><span class="view_sps"></span> <span
                                                                        class="view_scaseno"></span> Dated. <span
                                                                        class="view_sdate"></span></h3>
                                                      </i>
                                                      <P style="font-size:20px">
                                                            <b>Arms:</b></span><i class="view_sarms"></i>
                                                            <br>
                                                            <b>Arms Type: </b></span><i class="view_sarms_type"></i>
                                                            <br>
                                                            <b>Ammunition: </b></span><i class="view_sammunition"></i>
                                                            <br>
                                                            <b>Ammunition Type: </b></span><i
                                                                  class="view_sammunition_type"></i>
                                                            <br>
                                                            <b>Explosive: </b></span><i class="view_sexplosive"></i>
                                                            <br>
                                                            <b>Explosive Type: </b></span><i
                                                                  class="view_sexplosive_type"></i>
                                                            <br>
                                                            <b>ID Liquor Seizure: </b></span><i
                                                                  class="view_sid_seizure"></i>
                                                            <br>
                                                            <b>ID Liquor Destroy: </b></span><i
                                                                  class="view_sid_destroy"></i>
                                                            <br>
                                                            <b>Bomb: </b></span><i class="view_sbomb"></i>
                                                            <br>
                                                            <b>Ganja: </b></span><i class="view_sganja"></i>
                                                            <br>
                                                            <b>Herion: </b></span><i class="view_sherion"></i>
                                                            <br>
                                                            <b>Fire Cracker: </b></span><i
                                                                  class="view_sfire_cracker"></i>
                                                            <br>
                                                            <b>Board Money: </b></span><i class="view_sboard_money"></i>
                                                            <br>
                                                            <b>Unclaim Property: </b></span><i
                                                                  class="view_sunclaim_property"></i>
                                                            <br>
                                                            <b>Suspicious Property: </b></span><i
                                                                  class="view_ssuspicious_property"></i>
                                                            <br>
                                                            <b>Other Seizure: </b></span><i class="view_sother"></i>
                                                            <br>
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