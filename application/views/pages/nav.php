<div class="header-area header-bottom">
    <div class="mainh eader-area ">
        <div class="row align-items-center">
            <div class="col-md-9  d-none d-lg-block">
                <div class="horizontal-menu">
                    <nav>
                        <ul id="nav_menu" style="font-size:17px;">
                            <li class="active">
                                <a href="<?php echo site_url('welcome/dashbordpage'); ?>"><i Style="font-size:17px"
                                        class="fa fa-home"></i><span>dashboard</span></a>

                            </li>
                            <?php
                            if ($this->session->userdata['logged_in']['user_type_id'] == '5' || $this->session->userdata['logged_in']['user_type_id'] == '6') {


                                ?>
                                <li>
                                    <a href="javascript:void(0)"><i Style="font-size:17px"
                                            class="fa fa-plus-square"></i><span>Entry</span></a>
                                    <ul class="submenu">
                                        <li><a href="<?php echo site_url('welcome/caseentry'); ?>"
                                                Style="font-size:16px">Case Entry</a></li>
                                        <li><a href="<?php echo site_url('welcome/psdisposal'); ?>"
                                                Style="font-size:16px">PS
                                                Disposal Entry</a></li>
                                        <li><a href="<?php echo site_url('welcome/court_disposal'); ?>"
                                                Style="font-size:16px">Court Disposal Entry</a></li>
                                    </ul>
                                </li>

                                <?php
                            }
                            if ($this->session->userdata['logged_in']['user_type_id'] == '1') {
                                ?>

                                <li>
                                    <a href="javascript:void(0)"><i Style="font-size:17px"
                                            class="fa fa-plus-square"></i><span>Entry</span></a>
                                    <ul class="submenu">
                                        <li><a href="<?php echo site_url('welcome/admin_caseentry'); ?>"
                                                Style="font-size:16px">Case Entry</a></li>
                                        <li><a href="<?php echo site_url('welcome/psdisposal'); ?>"
                                                Style="font-size:16px">PS
                                                Disposal Entry</a></li>
                                        <li><a href="<?php echo site_url('welcome/court_disposal'); ?>"
                                                Style="font-size:16px">Court Disposal Entry</a></li>
                                        <li><a href="<?php echo site_url('welcome/crimehead'); ?>"
                                                Style="font-size:16px">Crime Head</a></li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>

                            <?php

                            if ($this->session->userdata['logged_in']['user_type_id'] == '6') {
                                ?>

                                <li>
                                    <a href="javascript:void(0)"><i Style="font-size:17px"
                                            class="fa fa-edit"></i><span>Edit</span></a>
                                    <ul class="submenu">
                                        <li><a href="<?php echo site_url('welcome/admin_caseentry'); ?>"
                                                Style="font-size:16px">Case Edit...</a></li>
                                        <li><a href="linechart.html" Style="font-size:16px">PS Disposal Edit</a></li>
                                        <li><a href="piechart.html" Style="font-size:16px">Court Disposal Edit</a></li>
                                        <li><a href="piechart.html" Style="font-size:16px">Arrest Persons Edit</a></li>
                                        <li><a href="piechart.html" Style="font-size:16px">Victim Edit</a></li>
                                        <li><a href="piechart.html" Style="font-size:16px">Seizure Edit</a></li>
                                    </ul>
                                </li>

                                <?php
                            }
                            ?>



                            <li>
                                <a href="avascript:void(0)"><i Style="font-size:17px"
                                        class="ti-slice"></i><span>Add</span></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo site_url('welcome/arrest_entry'); ?>"
                                            Style="font-size:16px">Add Arrest</a></li>
                                    <li><a href="<?php echo site_url('welcome/victim_entry'); ?>"
                                            Style="font-size:16px">Add Victim</a></li>
                                    <li><a href="<?php echo site_url('welcome/seizure_entry'); ?>"
                                            Style="font-size:16px">Add Seizure</a></li>
                                    <li><a href="<?php echo site_url('welcome/rta_page'); ?>"
                                            Style="font-size:16px">Add RTA</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="avascript:void(0)"><i Style="font-size:17px" class="fa fa-table"></i>
                                    <span>RTA </span></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo site_url('welcome/rta_page'); ?>"
                                            Style="font-size:16px">Add</a>
                                    </li>
                                    <li><a href="<?php echo site_url('welcome/rta_page2'); ?>"
                                            Style="font-size:16px">Add2</a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a href="avascript:void(0)"><i Style="font-size:17px" class="fa fa-table"></i>
                                    <span>Seizure </span></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo site_url('welcome/seizure_entry'); ?>"
                                            Style="font-size:16px">Add Seizure</a></li>
                                    <li><a href="<?php echo site_url('welcome/edit_seizure'); ?>"
                                            Style="font-size:16px">Edit Seizure</a></li>
                                </ul>
                            </li>
                            <li><a href="maps.html"><i Style="font-size:17px"
                                        class="fa fa-ambulance"></i><span>UD</span></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo site_url('welcome/ud_entry_form'); ?>"
                                            Style="font-size:16px">Add UD</a></li>
                                    <li><a href="<?php echo site_url('welcome/edit_ud'); ?>" Style="font-size:16px">Edit
                                            UD</a></li>
                                </ul>
                            </li>

                            <li><a href="#"><i Style="font-size:17px" class="fa fa-file "></i><span>Search</span></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo site_url('welcome/crime_search'); ?>"
                                            Style="font-size:16px">Crime Search</a></li>
                                    <li><a href="<?php echo site_url('welcome/criminal_search'); ?>"
                                            Style="font-size:16px">Criminal Search</a></li>
                                    <li><a href="<?php echo site_url('welcome/ps_disposal_search'); ?>"
                                            Style="font-size:16px">Disposal Search</a></li>
                                    <li><a href="<?php echo site_url('welcome/seizure_search'); ?>"
                                            Style="font-size:16px">Seizure Search</a></li>
                                    <!-- <li><a href="linechart.html" Style="font-size:16px">Criminal Search</a></li> -->
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- nav and search button -->

            <!-- mobile_menu -->
            <div class="col-12 d-block d-lg-none">
                <div id="mobile_menu"></div>
            </div>
        </div>
    </div>
</div>