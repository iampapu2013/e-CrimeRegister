<style>
    .order-card {
        color: #fff;
    }

    .bg-c-blue {
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
</style>

<?php foreach ($countdetails as $row) {
    $case_count = $row->count_for_case_id;
    $arrest_count = $row->count_for_arrest;
    $disposal_case_count = $row->count_for_case_disposal;
    $pending_case_count = $row->count_for_case_disposal_pending;

    $dacoity_count = $row->count_for_dacoity;
    $count_for_cs_dacoity = $row->count_for_cs_dacoity;
    $count_for_fr_dacoity = $row->count_for_fr_dacoity;
    $count_for_pending_dacoity = $row->count_for_pending_dacoity;
    $dacoity_arrest = $row->count_for_dacoity_arrest;

    $robbery_count = $row->count_for_robbery;
    $count_for_cs_robbery = $row->count_for_cs_robbery;
    $count_for_fr_robbery = $row->count_for_fr_robbery;
    $count_for_pending_robbery = $row->count_for_pending_robbery;
    $robbery_arrest = $row->count_for_robbery_arrest;

    $burglary_count = $row->count_for_burglary;
    $count_for_cs_burglary = $row->count_for_cs_burglary;
    $count_for_fr_burglary = $row->count_for_fr_burglary;
    $count_for_pending_burglary = $row->count_for_pending_burglary;
    $burglary_arrest = $row->count_for_burglary_arrest;

    $theft_count = $row->count_for_theft;
    $count_for_cs_theft = $row->count_for_cs_theft;
    $count_for_fr_theft = $row->count_for_fr_theft;
    $count_for_pending_theft = $row->count_for_pending_theft;
    $theft_arrest = $row->count_for_theft_arrest;

    $murder_count = $row->count_for_murder;
    $count_for_cs_murder = $row->count_for_cs_murder;
    $count_for_fr_murder = $row->count_for_fr_murder;
    $count_for_pending_murder = $row->count_for_pending_murder;
    $murder_arrest = $row->count_for_murder_arrest;

    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <div class="text-center">
                            <h4>Case Reported</h4>
                        </div><br>
                        <a href="#" class="text-dark">
                            <h2 class="text-center"> <?php echo $case_count; ?> </h2>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <div class="text-center">
                            <h4>Case Disposal</h4>
                        </div><br>
                        <a href="#" class="text-dark">
                            <h2 class="text-center"> <?php echo $disposal_case_count; ?></h2>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-block">
                        <div class="text-center">
                            <h4>Case Pending</h4>
                        </div><br>
                        <a href="#" class="text-dark">
                            <h2 class="text-center"> <?php echo $pending_case_count; ?></h2>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <div class="text-center">
                            <h4>Persons Arrested</h4>
                        </div><br>
                        <a href="#" class="text-dark">
                            <h2 class="text-center"> <?php echo $arrest_count; ?></h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="form-group has-search f-right" style="width: 200px;">

        </div>

        <table class="table table-hover border">
            <thead>
                <tr>
                    <th>Head</th>
                    <th>Case Reported</th>
                    <th>Case Charge Sheeted</th>
                    <th>Case FR</th>
                    <th>Case Pending</th>
                    <th>Persons Arrest</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Dacoity</th>
                    <td><a href="#">
                            <h5><?php echo $dacoity_count; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_cs_dacoity; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_fr_dacoity; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_pending_dacoity; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $dacoity_arrest; ?></h5>
                        </a></td>
                </tr>
                <tr>
                    <th>Robbery</th>
                    <td><a href="#">
                            <h5><?php echo $robbery_count; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_cs_robbery; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_fr_robbery; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_pending_robbery; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $robbery_arrest; ?></h5>
                        </a></td>
                </tr>
                <tr>
                    <th>Burglary</th>
                    <td><a href="#">
                            <h5><?php echo $burglary_count; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_cs_burglary; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_fr_burglary; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_pending_burglary; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $burglary_arrest; ?></h5>
                        </a></td>
                </tr>
                <tr>
                    <th>Theft</th>
                    <td><a href="#">
                            <h5><?php echo $theft_count; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_cs_theft; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_fr_theft; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_pending_theft; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $theft_arrest; ?></h5>
                        </a></td>
                </tr>
                <tr>
                    <th>Murder</th>
                    <td><a href="#">
                            <h5><?php echo $murder_count; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_cs_murder; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_fr_murder; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $count_for_pending_murder; ?></h5>
                        </a></td>
                    <td><a href="#">
                            <h5><?php echo $murder_arrest; ?></h5>
                        </a></td>
                </tr>

            </tbody>
        </table>

    </div>
    <?php
}
?>