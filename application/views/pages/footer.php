<footer>
    <div class="footer-area shadow-lg active">
        <p>© Copyright 2023. Hooghly Rural Police District</p>
    </div>
</footer>
<!-- footer area end-->

<!-- jquery latest version -->
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-2.2.4.min.js">
    // var jQuery_2_2_4 = $.noConflict(true);   
</script><!--yes ????????

    <! --For Date picker-->
<!-- <script src="<//?php //echo base_url(); ?>assets/js/jquery-3.3.1.min.js">
    var jQuery_3_3_1 = $.noConflict(true);
    </script> -->

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js">
    var jQuery_3_5_1 = $.noConflict(true);
    </script> -->
<!-- ///////////// -->
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- <script src="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css"></script> --><!---------NEW----------->

<!-- this is for logout -->
<!--   <script src="<?php //echo base_url(); ?>assets/js/owl.carousel.min.js"></script>   -->

<!-- this is for Responsive Menu -->
<script src="<?php echo base_url(); ?>assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slicknav.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>


<!-- others plugins -->
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/gijgo.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<!-- For Google Map -->
<script src="<?php echo base_url(); ?>assets/js/mapscript.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<!-- Datepicker only Year show -->
<!-- <script src="<//?php echo base_url(); ?>assets/js/main.js"></script> -->
<!---------DataTable----------->
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<!---------For EXCEL Download----------->
<script src="<?php echo base_url(); ?>assets/js/xlsx.full.min.js"></script>

<script>
    // $(document).ready(function () {
    //     $("#allcase").DataTable();
    //     $("#allpscase").DataTable();
    //     $("#newcase").DataTable();
    //     $("#approvedcase").DataTable();
    //     $("#allcscase").DataTable();
    // });

</script>


<script>
    $('#fir_date').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'dd/mm/yyyy',
        autoclose: true,
        //autocomplete: off;
    });
    //--------- For Crime Method ------------//
    var master = "<?php echo site_url(); ?>";
</script>
<script>
    $('#do').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'dd/mm/yyyy',
        autoclose: true,
    });
</script>
<script>
    // Flashdata FIR Save Successfully auto Hide
    $(function () {
        setTimeout(function () { $("#hideDiv").fadeOut(1000); }, 3000)
    })
    $(document).ready(function () {
    $("#allcase").DataTable();
    $("#allpscase").DataTable();
    $("#newcase").DataTable();
    $("#approvedcase").DataTable();
    $("#allcscase").DataTable();
    $("#seizuredata").DataTable();
    $("#allud_data").DataTable();
});
//For Date picker--->
$('#acc_arrestdate').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#arrestdate').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#ud_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#a_arrestdate').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#arrest_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#a_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#arrest_entry_fir_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#seizure_entry_gde_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#cs_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#frt_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#frmf_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#transfer_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#victim_fir_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#court_disposal_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#crime_search_from_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#crime_search_to_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#psdisposal_search_from_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#psdisposal_search_to_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#seizure_search_to_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#seizure_search_from_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd/mm/yyyy',autoclose: true,});
$('#a_edit_arrestdate').datepicker({uiLibrary: 'bootstrap4',format: 'dd-mm-yyyy',autoclose: true,});
$('#rta_date').datepicker({uiLibrary: 'bootstrap4',format: 'dd-mm-yyyy',autoclose: true,});
</script>
</body>

</html>