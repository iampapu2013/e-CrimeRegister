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


  /* Ensure that the demo table scrolls */
  /*  th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }*/

  /* div.container {
        width: 80%;
    }*/
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
  <h3 style="text-align: center; color: blue;text-decoration: underline">All UD Case</h3>
  <div class="table-responsive">
    <table id="allcase" class="table table-bordered" style="width: 100%">
      <thead>
        <tr>
          <th style="width: 82%">Details of UD</th>
          <th style="display: none;">UD ID</th>

          <th style="width:1%">Action</th>
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
          <tr class="row_alldata">
            <td>
              <h6><span style="font-weight: bold;"><?php echo $row->name_of_ps; ?> </span></h6>

              <span style="font-weight: bold;">UD Number: </span><?php echo $row->ud_no; ?>
              <br>
              <span style="font-weight: bold;">UD Date: </span><?php echo $row->ud_date; ?>
              <br>
              <span style="font-weight: bold;">Religion: </span><?php echo $row->ud_religion; ?>
              <br>
              <span style="font-weight: bold;">Caste: </span><?php echo $row->ud_caste; ?>
              <br>
              <span style="font-weight: bold;">Gender: </span><?php echo $row->ud_gender; ?>
              <br>
              <span style="font-weight: bold;">How to Death: </span><?php echo $row->how_to_death; ?>
              <br>
              <span style="font-weight: bold;">Reason Death: </span><?php echo $row->reason_death; ?>
              <br>
              <span style="font-weight: bold;">Profession: </span><?php echo $row->profession_death; ?>
              <br>
              <span style="font-weight: bold;">Social Status: </span><?php echo $row->social_death; ?>
              <br>
              <span style="font-weight: bold;">Education Qualification: </span><?php echo $row->education_death; ?>
              <br>
              <span style="font-weight: bold;">Place of Occurrence: </span><?php echo $row->ud_place; ?>
              <br>
              <span style="font-weight: bold;">Case Reference: </span><?php echo $row->ud_case_ref; ?>




            </td>
            <td style="display: none;"><input type="text" id="ud_id" name="ud_id" value="<?php echo $row->ud_id; ?>"></td>

            <td> <a href="<?php echo site_url('welcome/edit_ud_form/' . $row->ud_id); ?>">
                <button class="btnedit"><i class="fa fa-edit"></i></button></a>
              <!-- <button type="button" class="btnview view_allcase"><i class="fa fa-eye"></i></button>
                                <button class="btndelete"><i class="fa fa-trash"></i></button> -->
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
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