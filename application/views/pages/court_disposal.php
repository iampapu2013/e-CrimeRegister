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

    .btn-secondary {
        padding: 8px 16px;
        border-radius: 10px;
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
    <h3 style="text-align: center; color: blue;text-decoration: underline">Court Disposal...</h3>
    <div class="table-responsive">
        <table id="allcscase" class="table table-bordered" style="width: 100%">
            <thead>
                <tr>
                    <th class="abcd">Case Reference</th>
                    <th class="abcd" style="display: none">case ID</th>
                    <th class="abcd">crime Head</th>
                    <th class="abcd">CS No & Date</th>
                    <th class="abcd" style="width:9%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($court_disposal as $row) {
                    //echo $row->fir_date;
                    $fir_date = $row->fir_date;
                    $orderdate = explode('-', $fir_date);
                    $day = $orderdate[2];
                    $month = $orderdate[1];
                    $year = $orderdate[0];
                    $date = $day . '-' . $month . '-' . $year;
                    $cs_date = $row->cs_date;
                    $orderdatecs = explode('-', $cs_date);
                    $day = $orderdatecs[2];
                    $month = $orderdatecs[1];
                    $year = $orderdatecs[0];
                    $datecs = $day . '-' . $month . '-' . $year;
                    ?>

                    <tr class="row_allcsdata">
                        <td class="abcd"><?php echo $row->name_of_ps; ?> Case No. <?php echo $row->fir_no; ?> Date:
                            <?php echo $date; ?> U/S: <?php echo $row->us; ?>
                        </td>
                        <td class="abcd" style="display: none"><input type="text" id="case_id" name="case_id"
                                value="<?php echo $row->case_id; ?>"></td>
                        <td class="abcd"><?php echo $row->crimehead; ?></td>
                        <td class="abcd">CS No. <?php echo $row->cs_no; ?> Date. <?php echo $datecs; ?></td>
                        <td class="abcd">
                            <div class="tooltip">
                                <a href="<?php echo site_url('welcome/court_disposal_entry_form/' . $row->case_id); ?>">
                                    <button class="btnedit"><i class="fa fa-edit"></i></button></a>
                                <span class="tooltiptext">Edit</span>
                            </div>
                            <div class="tooltip">
                                <button type="button" class="btnview view_allcscase"><i class="fa fa-eye"></i></button>
                                <span class="tooltiptext">View</span>
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

<div id="view_courtcase" class="modal fade view_cscase">
    <div class="modal-dialog modal-lg"> <!--for Big Model -->
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title font-weight-bold text-white">Case Details </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" style="table-layout: fixed;word-break: break-all;">
                            <tbody>
                                <tr>
                                    <th style="width: 20%">Name of PS:</th>
                                    <td class="view_csps"></td>
                                </tr>
                                <tr>
                                    <th>Case No:</th>
                                    <td class="view_cscaseno"></td>
                                </tr>
                                <tr>
                                    <th>Date:</th>
                                    <td class="view_csdate"></td>
                                </tr>
                                <tr>
                                    <th>Section of Law:</th>
                                    <td class="view_csus"></td>
                                </tr>
                                <tr>
                                    <th>Crime Head:</th>
                                    <td class="view_cscrimehead"></td>
                                </tr>
                                <tr>
                                    <th>Gist:</th>
                                    <td class="view_csgist "> </td>
                                </tr>
                                <tr>
                                    <th>Arrest:</th>
                                    <td class="view_csarrest"></td>
                                </tr>
                                <tr>
                                    <th>CS No:</th>
                                    <td class="view_cscs"></td>
                                </tr>
                                <tr>
                                    <th>CS Date:</th>
                                    <td class="view_cs_date"></td>
                                </tr>
                                <tr>
                                    <th>CS Persons:</th>
                                    <td class="view_cs_persons"></td>
                                </tr>
                                <tr>
                                    <th>CS Section:</th>
                                    <td class="view_cs_sec"></td>
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