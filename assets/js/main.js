// For Victim Module //
var arrestUploadImg;

$(document).ready(function () {

    $('.victim_m').click(function (e) {
        e.stopImmediatePropagation();
        var ps = $('#ps option:selected').html();
        //alert(ps);
        var no = $('#fir_no').val();
        var date = $('#fir_date').val();
        var ps_val = $('#ps').val();
        if (ps_val == '') {
            alert("Please select Police Station");
            return false;
        }
        if (no == '') {
            alert("Please Enter FIR No");
            return false;
        }
        if (date == '') {
            alert("Please select a Date");
            return false;
        }

        $('#v_victim').modal({
            backdrop: 'static'
        });
        $('#v_nameofps').val(ps);
        $('#v_fir_no').val(no);
        $('#v_fir_date').val(date);

    });


    $("#victim").keyup(function (e) {
        e.stopImmediatePropagation();

        var victimRowCount = $("#v_table tbody tr").length;
        var v = $('#victim').val();
        if ($("#victim").val() == '' || victimRowCount >= v) {
            $(".vtable").hide();
            $(".victim_m").prop("disabled", true);
        }
        else {
            $(".vtable").show();
            $(".victim_m").prop("disabled", false);
        }

    });



    //Victim Edit Module----------->
    $("#v_edit_table tbody").on('click', '.victim_e', function (e) {
        e.stopImmediatePropagation();
        var ps = $('#ps option:selected').html();
        var row = $(this).closest(".rowdata");
        var vId = $(row).find('#victim_id').val();
        //alert(ps.trim());
        var no = $('#fir_no').val();
        var date = $('#fir_date').val();
        var ps_val = $('#ps').val();

        $.ajax({
            mimeType: 'text/html; charset=utf-8',
            url: master + '/welcome/fetch_victim_details',
            method: 'post',
            data: {
                vId: vId
            },
            dataType: "json",
            success: function (data) {
                report = JSON.parse(JSON.stringify(data));
                $('#e_victim').modal({ backdrop: 'static', keyboard: false });
                $('#v_edit_id').val(vId);
                $('#v_edit_psname').val(ps.trim());
                $('#v_edit_firno').val(no);
                $('#v_edit_firdate').val(date);
                $('#v_edit_name').val(report[0].name);
                $('#v_edit_fathername').val(report[0].f_name);
                $('#v_edit_address').val(report[0].address);
                $('#v_edit_age').val(report[0].age);
                $('#v_edit_gender').val(report[0].gender);
                $('#v_edit_contact').val(report[0].contact);
            }
        });
    });

    //Victim Delete----------->
    $("#v_edit_table tbody").on('click', '.victim_delete', function (e) {
        e.stopImmediatePropagation();
        var ps = $('#ps option:selected').html();
        var row = $(this).closest(".rowdata");
        var vId = $(row).find('#victim_id').val();
        alert(vId);
        // var no = $('#fir_no').val();
        // var date = $('#fir_date').val();
        // var ps_val = $('#ps').val();

        $.ajax({
            mimeType: 'text/html; charset=utf-8',
            url: master + '/welcome/fetch_victim_details',
            method: 'post',
            data: {
                vId: vId
            },
            dataType: "json",
            success: function (data) {
                report = JSON.parse(JSON.stringify(data));
                $('#e_victim').modal({ backdrop: 'static', keyboard: false });
                $('#v_edit_id').val(vId);
                $('#v_edit_psname').val(ps.trim());
                $('#v_edit_firno').val(no);
                $('#v_edit_firdate').val(date);
                $('#v_edit_name').val(report[0].name);
                $('#v_edit_fathername').val(report[0].f_name);
                $('#v_edit_address').val(report[0].address);
                $('#v_edit_age').val(report[0].age);
                $('#v_edit_gender').val(report[0].gender);
                $('#v_edit_contact').val(report[0].contact);
            }
        });
    });
    //Arrest Edit Module----------->

    $("#a_edit_table tbody").on('click', '.arrest_e', function (e) {
        e.stopImmediatePropagation();
        var ps = $('#ps option:selected').html();
        var row = $(this).closest(".rowdata");
        var aId = $(row).find('#arrest_id').val();
        //alert(vId);
        var no = $('#fir_no').val();
        var date = $('#fir_date').val();
        var ps_val = $('#ps').val();
        $.ajax({
            mimeType: 'text/html; charset=utf-8',
            url: master + '/welcome/fetch_arrest_details',
            method: 'post',

            data: {
                aId: aId

            },
            dataType: "json",
            success: function (data) {
                report = JSON.parse(JSON.stringify(data));

                $('#e_arrest').modal({ backdrop: 'static', keyboard: false });
                var imgSrc = report[0]?.image;
                if (imgSrc != "") {
                    $('#ImgPreview').attr('src', '../../../upload/arrest_persons/' + imgSrc);
                } else {
                    // $('#ImgPreview').attr('src', '');
                    // $('#ImgPreview').removeAttr('src');
                    $('#ImgPreview').attr('src', '../../../assets/image/no_image.jpeg');
                }

                // $('#e_arrest').modal({ backdrop: 'static', keyboard: false });
                $('#a_edit_id').val(aId);
                $('#a_edit_psname').val(ps.trim());
                $('#a_edit_firno').val(no);
                $('#a_edit_firdate').val(date);
                $('#a_edit_name').val(report[0].name);
                $('#a_edit_nickname').val(report[0].nick_name);
                $('#a_edit_fathername').val(report[0].father_name);
                $('#a_edit_address').val(report[0].address);
                $('#a_edit_mobile').val(report[0].mobile_no);
                $('#a_edit_age').val(report[0].age);
                $('#a_edit_gender').val(report[0].gender);
                $('#a_edit_caselink').val(report[0].other_case_link);
                $('#a_edit_modus').val(report[0].modus_operandi);
                $('#a_edit_arrestdate').val(formatedate(report[0].arrest_date));
                $('#a_edit_status').val(report[0].status);
                $('#a_edit_physical').val(report[0].identification_mark);
            }
        });
    });



    //Arrest Person Delete--------->

    $("#a_edit_table tbody").on('click', '.arrest_delete', function (e) {
        e.stopImmediatePropagation();
        var ps = $('#ps option:selected').html();
        var row = $(this).closest(".rowdata");
        var aId = row.find("input[name='arrest_id']").val();
        var case_id = $('#case_id').val();
        // alert(aId);
        // alert(case_id);
        $.ajax({
            mimeType: 'text/html; charset=utf-8',
            url: master + '/welcome/delete_arrest_person',
            method: 'post',

            data: {
                aId: aId,
                case_id: case_id
            },
            dataType: "json",
            success: function (data) {
                report = JSON.parse(JSON.stringify(data));
                console.log(report);
                if (report) {
                    alert("Delete Sucessfully");
                    reloadArrestTable(case_id);
                }

            }
        });
    });

    function reloadArrestTable(case_id) {
        $.ajax({
            url: master + '/welcome/reload_arrest_table',
            method: 'post',
            data: {
                case_id: case_id
            },
            dataType: "json",
            success: function (data) {
                const report = data;
                //console.log("report=======1111>>", report);
                // Clear existing table rows except the header
                $('#a_edit_table tbody').empty();
                // Append rows with updated data
                report.forEach((item) => {
                    $('#a_edit_table tbody').append(`
                   <tr class="rowdata" data-arrest_id="${item.a_id}">
                        <td style="display:none;"><input type="hidden" id="arrest_id" name="arrest_id" value="${item.a_id}">${item.a_id}</td>
                        <td>${item.name}</td>
                        <td>${item.nick_name}</td>
                        <td>${item.father_name}</td>
                        <td>${item.address}</td>
                        <td>${item.mobile_no}</td>
                        <td>${item.age}</td>
                        <td>${item.gender}</td>
                        <td>${item.other_case_link}</td>
                        <td>${item.modus_operandi}</td>
                        <td>${formatedate(item.arrest_date)}</td>
                        <td>${item.status}</td>
                        <td>${item.identification_mark}</td>
                        <td style="width:9%">
                            <div class="tooltip">
                                <button type="button" class="btn btn-primary arrest_e"><i class="fa fa-edit"></i></button>
                                <span class="tooltiptext">Edit</span>
                            </div>
                            <div class="tooltip">
                                <button type="button" class="btn btn-danger arrest_delete"><i class="fa fa-trash"></i></button>
                                <span class="tooltiptext">Delete</span>
                            </div>
						</td>
                    </tr>
                `);
                });
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error);
            }
        });
    }


    //For Arrest Module//
    $('.arrest_m').click(function (e) {
        e.stopImmediatePropagation();
        var ps = $('#ps option:selected').html();
        var no = $('#fir_no').val();
        var date = $('#fir_date').val();
        var ps_val = $('#ps').val();
        if (ps_val == '') {
            alert("Please select Police Station");
            return false;
        }
        if (no == '') {
            alert("Please Enter FIR No");
            return false;
        }
        if (date == '') {
            alert("Please select a Date");
            return false;
        }
        $('#a_arrest').modal({
            backdrop: 'static'

        });
        $('#ImgPreview').attr('src', '');
        $('#ImgPreview').removeAttr('src');
        $('#imageInput').val('');
        // console.log ($('#ImgPreview').attr('src'));
        // console.log ($('#arrest_image').val());
        $('#a_nameofps').val(ps);
        $('#a_fir_no').val(no);
        $('#a_fir_date').val(date);

    });

    // Date------05.12.2023-------new edit----------->
    $("#arrest").keyup(function (e) {
        e.stopImmediatePropagation();
        var arrestrowcount = $("#a_table tbody tr").length;
        var arr = $('#arrest').val();
        if ($("#arrest").val() == '' || arrestrowcount >= arr) {
            $(".atable").hide();
            $(".arrest_m").prop("disabled", true);
        }
        else {
            $(".atable").show();
            $(".arrest_m").prop("disabled", false);
        }
    });


    //For Seizure Module//
    $('.seizure_m').click(function (e) {
        //alert('ss')
        e.stopImmediatePropagation();
        var ps = $('#ps option:selected').html();
        var no = $('#fir_no').val();
        var date = $('#fir_date').val();
        var ps_val = $('#ps').val();
        if (ps_val == '') {
            alert("Please select Police Station");
            return false;
        }
        if (no == '') {
            alert("Please Enter FIR No");
            return false;
        }
        if (date == '') {
            alert("Please select a Date");
            return false;
        }
        $('#s_seizure').modal({
            backdrop: 'static'
        });
        $('#s_nameofps').val(ps);
        $('#s_fir_no').val(no);
        $('#s_fir_date').val(date);

    });


    $('#allcase tbody').on('click', '.view_allcase', function (e) {
        //$('.view_allcase').click(function(e){ 
        e.stopImmediatePropagation();
        var row = $(this).closest(".row_alldata");
        var caseid = $(row).find('#case_id').val();
        //alert(caseid);
        $.ajax({
            mimeType: 'text/html; charset=utf-8',
            url: master + '/welcome/view_allcase',
            method: 'post',
            data: {
                caseid: caseid
            },
            dataType: "json",
            success: function (data) {
                report = JSON.parse(JSON.stringify(data));
                //alert(report[0].name_of_ps);
                $('#view_case').modal({
                    backdrop: 'static'
                });
                $('.view_ps').html(report[0].name_of_ps);
                $('.view_caseno').html(report[0].fir_no);
                $('.view_date').html(formatedate(report[0].fir_date));
                $('.view_us').html(report[0].us);
                $('.view_crimehead').html(report[0].crimehead);
                $('.view_gist').html(report[0].gist);
                $('.view_arrest').html(report[0].arrest);
            }
        });

    });



    $('#newcase tbody').on('click', '.veiw_newcase', function (e) {
        //$('.view_allcase').click(function(e){ 
        e.stopImmediatePropagation();
        var row = $(this).closest(".row_newdata");
        var caseid = $(row).find('#case_id').val();
        //alert(caseid);
        $.ajax({
            mimeType: 'text/html; charset=utf-8',
            url: master + '/welcome/view_newcase',
            method: 'post',
            data: {
                caseid: caseid
            },
            dataType: "json",
            success: function (data) {
                report = JSON.parse(JSON.stringify(data));
                //alert(report[0].name_of_ps);
                $('#view_case').modal({
                    backdrop: 'static'
                });
                $('.view_ps').html(report[0].name_of_ps);
                $('.view_caseno').html(report[0].fir_no);
                $('.view_date').html(formatedate(report[0].fir_date));
                $('.view_us').html(report[0].us);
                $('.view_crimehead').html(report[0].crimehead);
                $('.view_gist').html(report[0].gist);
                $('.view_arrest').html(report[0].arrest);
            }
        });

    });

    $('#approvedcase tbody').on('click', '.view_approvedcase', function (e) {
        //$('.view_allcase').click(function(e){ 
        e.stopImmediatePropagation();
        var row = $(this).closest(".row_approveddata");
        var caseid = $(row).find('#case_id').val();
        //alert(caseid);
        $.ajax({
            mimeType: 'text/html; charset=utf-8',
            url: master + '/welcome/view_approvedcase',
            method: 'post',
            data: {
                caseid: caseid
            },
            dataType: "json",
            success: function (data) {
                report = JSON.parse(JSON.stringify(data));
                //alert(report[0].name_of_ps);
                $('#view_case').modal({
                    backdrop: 'static'
                });
                $('.view_ps').html(report[0].name_of_ps);
                $('.view_caseno').html(report[0].fir_no);
                $('.view_date').html(formatedate(report[0].fir_date));
                $('.view_us').html(report[0].us);
                $('.view_crimehead').html(report[0].crimehead);
                $('.view_gist').html(report[0].gist);
                $('.view_arrest').html(report[0].arrest);
            }
        });

    });



    // PS Disposal Case Module-------------->
    $('#allpscase tbody').on('click', '.view_allpscase', function (e) {
        //$('.view_allcase').click(function(e){ 
        e.stopImmediatePropagation();
        var row = $(this).closest(".row_allpsdata");
        var caseid = $(row).find('#case_id').val();
        //alert(caseid);
        $.ajax({
            mimeType: 'text/html; charset=utf-8',
            url: master + '/welcome/view_allcase',
            method: 'post',
            data: {
                caseid: caseid
            },
            dataType: "json",
            success: function (data) {
                report = JSON.parse(JSON.stringify(data));
                $('#view_cscase').modal({
                    backdrop: 'static'
                });
                $('.view_csps').html(report[0].name_of_ps);
                $('.view_cscaseno').html(report[0].fir_no);
                $('.view_csdate').html(report[0].fir_date);
                $('.view_csus').html(report[0].us);
                $('.view_cscrimehead').html(report[0].crimehead);
                $('.view_csgist').html(report[0].gist);
                $('.view_csarrest').html(report[0].arrest);
            }
        });

    });

    // Court Disposal Case Module-------------->
    $('#allcscase tbody').on('click', '.view_allcscase', function (e) {
        //$('.view_allcase').click(function(e){ 
        e.stopImmediatePropagation();
        var row = $(this).closest(".row_allcsdata");
        var caseid = $(row).find('#case_id').val();
        //alert(caseid);
        $.ajax({
            mimeType: 'text/html; charset=utf-8',
            url: master + '/welcome/view_court_disposal',
            method: 'post',
            data: {
                caseid: caseid
            },
            dataType: "json",
            success: function (data) {
                report = JSON.parse(JSON.stringify(data));
                $('#view_courtcase').modal({
                    backdrop: 'static'
                });
                $('.view_csps').html(report[0].name_of_ps);
                $('.view_cscaseno').html(report[0].fir_no);
                $('.view_csdate').html(report[0].fir_date);
                $('.view_csus').html(report[0].us);
                $('.view_cscrimehead').html(report[0].crimehead);
                $('.view_csgist').html(report[0].gist);
                $('.view_csarrest').html(report[0].arrest);
                $('.view_cscs').html(report[0].cs_no);
                $('.view_cs_date').html(report[0].cs_date);
                $('.view_cs_persons').html(report[0].person_cs);
                $('.view_cs_sec').html(report[0].section_of_law);
            }
        });

    });

    // Seizure View Module-------------->
    $('#seizuredata tbody').on('click', '.view_allseizure', function (e) {
        //$('.view_allcase').click(function(e){ 
        e.stopImmediatePropagation();
        var row = $(this).closest(".row_seizuredata");
        var caseid = $(row).find('#case_id').val();
        var gdeno = $(row).find('#gde_no').val();
        alert(gdeno);
        $.ajax({
            mimeType: 'text/html; charset=utf-8',
            url: master + '/welcome/view_all_seizure_data',
            method: 'post',
            data: {
                caseid: caseid,
                gdeno: gdeno
            },
            dataType: "json",
            success: function (data) {
                report = JSON.parse(JSON.stringify(data));
                $('#view_seizure').modal({
                    backdrop: 'static'
                });
                if(gdeno!=0){
                $('.view_sps').html(report[0].name_of_ps);
                $('.view_scaseno').html(report[0].fir_no);
                $('.view_sdate').html(formatedate(report[0].fir_date));
                $('.view_sarms').html(report[0].arms);
                $('.view_sarms_type').html(report[0].arms_type);
                $('.view_sammunition').html(report[0].ammunition);
                $('.view_sammunition_type').html(report[0].ammunition_type);
                $('.view_sexplosive').html(report[0].explosive);
                $('.view_sexplosive_type').html(report[0].explosive_type);
                $('.view_sid_seizure').html(report[0].id_seizure);
                $('.view_sid_destroy').html(report[0].id_destroy);
                $('.view_sbomb').html(report[0].bomb);
                $('.view_sganja').html(report[0].ganja);
                $('.view_sherion').html(report[0].herion);
                $('.view_sfire_cracker').html(report[0].fire_cracker);
                $('.view_sboard_money').html(report[0].board_money);
                $('.view_sunclaim_property').html(report[0].unclaim_property);
                $('.view_ssuspicious_property').html(report[0].suspicious_property);
                $('.view_sother').html(report[0].other);
                }
            }
        });

    });

    ///--------------------------------UD Modul---------------------------------Edit due------------------------------------>
    // Seizure View Module-------------->
    $('#allud_data tbody').on('click', '.view_uddetails', function (e) {
        //$('.view_allcase').click(function(e){ 
        e.stopImmediatePropagation();
        var row = $(this).closest(".row_allud_data");
        var ud_id = $(row).find('#ud_id').val();
        //alert(udid);
        $.ajax({
            mimeType: 'text/html; charset=utf-8',
            url: master + '/welcome/view_all_ud_data',
            method: 'post',
            data: {
                ud_id: ud_id
            },
            dataType: "json",
            success: function (data) {
                report = JSON.parse(JSON.stringify(data));
                $('#view_ud_data').modal({
                    backdrop: 'static'
                });
                $('.ud_ps').html(report[0].name_of_ps);
                $('.ud_caseno').html(report[0].ud_no);
                $('.ud_date').html(formatedate(report[0].ud_date));
                $('.ud_religion').html(report[0].ud_religion);
                $('.ud_caste').html(report[0].ud_caste);
                $('.ud_gender').html(report[0].ud_gender);
                $('.ud_age').html(report[0].age);
                $('.ud_howtodeath').html(report[0].how_to_death);
                $('.ud_reasondeath').html(report[0].reason_death);
                $('.ud_profession').html(report[0].profession_death);
                $('.ud_socialstatus').html(report[0].social_death);
                $('.ud_education').html(report[0].education_death);
                $('.ud_po').html(report[0].ud_place);
                $('.ud_caseref').html(report[0].ud_case_ref);
            }
        });

    });

    //------crime method Show -----//

    $('#crimehead').change(function (e) {

        var crimehead = $('#crimehead').val();
        $.ajax({
            url: master + '/welcome/get_crime_method',
            method: 'post',
            data: {
                crimehead: crimehead
            },
            dataType: "json",
            success: function (response) {
                $('#crime_method').empty();
                $('#crime_method').append("<option value=''>Method of crime...</option>");
                $.each(response, function (index, data) {
                    $('#crime_method').append('<option value="' + data['crime_method_id'] + '">' + data['crimemethod'] + '</option>');
                });
            }
        });
    });



    ///// add victim /////

    var vi_no = 1;
    $('#add_victim').click(function (e) {
        e.stopImmediatePropagation();
        var v_name = $('#v_name').val();
        var v_fathername = $('#v_fathername').val();
        var v_address = $('#v_address').val();
        var v_age = $('#v_age').val();
        var v_gender = $('#v_gender').val();
        //alert (v_name);
        var v_contact = $('#v_contact').val();
        if (v_name == '') {
            alert("Please Enter Victim Name");
            return false;
        }
        if (v_fathername == '') {
            alert("Please Enter Victim Father Name");
            return false;
        }
        if (v_age == '') {
            alert("Please Input Victim Age");
            return false;
        }
        if (v_gender == '') {
            alert("Please select gender");
            return false;
        }


        $('#v_table > tbody').append("<tr><td> <input type='hidden' id='vi_no' name='vi_no[]' value='" + vi_no + "' > " + vi_no + "</td><td> <input type='hidden' id='vi_name' name='vi_name[]' value='" + v_name + "' > " + v_name + "</td><td> <input type='hidden' id='vi_fathername' name='vi_fathername[]' value='" + v_fathername + "' >" + v_fathername + "</td><td> <input type='hidden' id='vi_address' name='vi_address[]' value='" + v_address + "' >" + v_address + "</td><td> <input type='hidden' id='vi_age' name='vi_age[]' value='" + v_age + "' >" + v_age + "</td><td> <input type='hidden' id='vi_gender' name='vi_gender[]' value='" + v_gender + "' >" + v_gender + "</td><td> <input type='hidden' id='vi_contact' name='vi_contact[]' value='" + v_contact + "' >" + v_contact + "</td><td><input type='button' id='v_DeleteButton' name='' value='DELETE' ></td></tr>");



        vi_no++;

        //Table First Row hide Function------13.12.2023------>
        $(' td:nth-child(1),th:nth-child(1)').hide();

        $('#v_name').val('');
        $('#v_fathername').val('');
        $('#v_address').val('');
        $('#v_age').val('');
        $('#v_gender').val('');
        $('#v_contact').val('');
        $('#v_victim').modal('hide');


        var victimRowCount = $("#v_table tbody tr").length;
        var v = $('#victim').val();
        if (victimRowCount == v) {
            $(".victim_m").prop("disabled", true);
        }
        else {
            $(".victim_m").prop("disabled", false);
        }
    });

    //Table Row Delete Function------12.12.2023------>

    $("#v_table").on("click", "#v_DeleteButton", function (e) {
        e.stopImmediatePropagation();
        var result = window.confirm("Do you want to delete the Victim?");
        if (result) {
            $(this).closest("tr").remove();
            var victimRowCount = $("#v_table tbody tr").length;
            var v = $('#victim').val();
            if (victimRowCount == v) {
                $(".victim_m").prop("disabled", true);
            }
            else {
                $(".victim_m").prop("disabled", false);
            }
        }
    });


    //// ADD ARREST ///////
    var ar_no = 1;
    $('#add_arrest').click(function (e) {
        e.stopImmediatePropagation();
        var a_name = $('#a_name').val();
        var a_nickname = $('#a_nickname').val();
        var a_fathername = $('#a_fathername').val();
        var a_address = $('#a_address').val();
        var a_mobile = $('#a_mobile').val();
        var a_age = $('#a_age').val();
        var a_gender = $('#a_gender').val();
        var a_caselink = $('#a_caselink').val();
        var a_modus = $('#a_modus').val();
        var a_date = $('#a_date').val();
        var a_status = $('#a_status').val();
        var a_physical = $('#a_physical').val();
        var arrest_image_path = $('#arrest_image_path').val();

        if (a_name == '') {
            alert("Please Entry Arrest Person Name");
            return false;
        }
        if (a_fathername == '') {
            alert("Please Entry Arrest Person Father Name");
            return false;
        }
        if (a_age == '') {
            alert("Please input Arrest Person age");
            return false;
        }
        if (a_gender == '') {
            alert("Please Entry Arrest Person Gender");
            return false;
        }
        if (a_caselink == '') {
            alert("Please Entry Arrest Person previous any Case Link");
            return false;
        }
        if (a_modus == '') {
            alert("Please Entry Modus Operandi");
            return false;
        }
        if (a_date == '') {
            alert("Please Entry Arrest date");
            return false;
        }
        if (a_status == '') {
            alert("Please Entry Arrest Person Status");
            return false;
        }
        if (arrestUploadImg) {
            saveFileToServer(arrestUploadImg, ar_no, a_name, a_nickname, a_fathername, a_address, a_mobile, a_age, a_gender, a_caselink, a_modus, a_date, a_status, a_physical);
        }
        else {
            $('#a_table > tbody').append("<tr><td><input type='hidden' id='ar_no' name='ar_no[]' value='" + ar_no + "'>" + ar_no + "</td><td><input type='hidden' id='ar_name' name='ar_name[]' value='" + a_name + "'>" + a_name + "</td><td><input type='hidden' id='ar_nickname' name='ar_nickname[]' value='" + a_nickname + "'>" + a_nickname + "</td><td><input type='hidden' id='ar_fathername' name='ar_fathername[]' value='" + a_fathername + "'>" + a_fathername + "</td><td><input type='hidden' id='ar_address' name='ar_address[]' value='" + a_address + "'>" + a_address + "</td><td><input type='hidden' id='ar_mobile' name='ar_mobile[]' value='" + a_mobile + "'>" + a_mobile + "</td><td><input type='hidden' id='ar_age' name='ar_age[]' value='" + a_age + "'>" + a_age + "</td><td><input type='hidden' id='ar_gender' name='ar_gender[]' value='" + a_gender + "'>" + a_gender + "</td><td><input type='hidden' id='ar_caselink' name='ar_caselink[]' value='" + a_caselink + "'>" + a_caselink + "</td><td><input type='hidden' id='ar_modus' name='ar_modus[]' value='" + a_modus + "'>" + a_modus + "</td><td><input type='hidden' id='ar_date' name='ar_date[]' value='" + a_date + "'>" + a_date + "</td><td><input type='hidden' id='ar_status' name='ar_status[]' value='" + a_status + "'>" + a_status + "</td><td><input type='hidden' id='ar_physical' name='ar_physical[]' value='" + a_physical + "'>" + a_physical + "</td><td><input type='hidden' id='arrest_image' name='arrest_image[]' value=''></td><td><input type='button' id='a_DeleteButton' name='' value='DELETE'></td></tr>");
        }
        ar_no++;
        $(' td:nth-child(1),th:nth-child(1)').hide();
        $('#a_name').val('');
        $('#a_nickname').val('');
        $('#a_fathername').val('');
        $('#a_address').val('');
        $('#a_mobile').val('');
        $('#a_age').val('');
        $('#a_gender').val('');
        $('#a_caselink').val('');
        $('#a_modus').val('');
        $('#a_date').val('');
        $('#a_status').val('');
        $('#a_physical').val('');
        $('#ImgPreview').attr('src', '');
        $('#ImgPreview').removeAttr('src');
        // $("#ImgPreview").remove();
        $('#imageInput').val('');
        // $('#arrest_image').val('');


        /// New update on 05.12.2023--------------->
        $('#a_arrest').modal('hide');
        arrestUploadImg = "";

        var arrestrowcount = $("#a_table tbody tr").length;
        var arr = $('#arrest').val();
        if (arrestrowcount == arr) {
            $(".arrest_m").prop("disabled", true);
        }
        else {
            $(".arrest_m").prop("disabled", false);
        }


    });

    //For Image Preview----->
    $('#imageInput').change(function (e) {
        e.stopImmediatePropagation();
        let file = this.files[0];
        arrestUploadImg = file;
        //console.log("abc"+file.name);
        var url = URL.createObjectURL(file);
        $('#ImgPreview').attr('src', url);
    });

    function saveFileToServer(file, ar_no, a_name, a_nickname, a_fathername, a_address, a_mobile, a_age, a_gender, a_caselink, a_modus, a_date, a_status, a_physical) {
        var formData = new FormData();
        formData.append('file', file);

        $.ajax({
            url: '../../upload/upload.php',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                var responseData = JSON.parse(response);
                if (responseData.status) {
                    var finalimageid = responseData.filename;

                    $('#a_table > tbody').append("<tr><td><input type='hidden' id='ar_no' name='ar_no[]' value='" + ar_no + "'>" + ar_no + "</td><td><input type='hidden' id='ar_name' name='ar_name[]' value='" + a_name + "'>" + a_name + "</td><td><input type='hidden' id='ar_nickname' name='ar_nickname[]' value='" + a_nickname + "'>" + a_nickname + "</td><td><input type='hidden' id='ar_fathername' name='ar_fathername[]' value='" + a_fathername + "'>" + a_fathername + "</td><td><input type='hidden' id='ar_address' name='ar_address[]' value='" + a_address + "'>" + a_address + "</td><td><input type='hidden' id='ar_mobile' name='ar_mobile[]' value='" + a_mobile + "'>" + a_mobile + "</td><td><input type='hidden' id='ar_age' name='ar_age[]' value='" + a_age + "'>" + a_age + "</td><td><input type='hidden' id='ar_gender' name='ar_gender[]' value='" + a_gender + "'>" + a_gender + "</td><td><input type='hidden' id='ar_caselink' name='ar_caselink[]' value='" + a_caselink + "'>" + a_caselink + "</td><td><input type='hidden' id='ar_modus' name='ar_modus[]' value='" + a_modus + "'>" + a_modus + "</td><td><input type='hidden' id='ar_date' name='ar_date[]' value='" + a_date + "'>" + a_date + "</td><td><input type='hidden' id='ar_status' name='ar_status[]' value='" + a_status + "'>" + a_status + "</td><td><input type='hidden' id='ar_physical' name='ar_physical[]' value='" + a_physical + "'>" + a_physical + "</td><td><input type='hidden' id='arrest_image' name='arrest_image[]' value='" + finalimageid + "'>" + finalimageid + "</td><td><input type='button' id='a_DeleteButton' name='' value='DELETE' ></td></tr>");

                    $(' td:nth-child(1),th:nth-child(1)').hide();
                    var arrestrowcount = $("#a_table tbody tr").length;
                    var arr = $('#arrest').val();
                    if (arrestrowcount == arr) {
                        $(".arrest_m").prop("disabled", true);
                    }
                    else {
                        $(".arrest_m").prop("disabled", false);
                    }
                }

            },
            error: function (error) {
            }
        });
    }




    //Table Row Delete Function------12.12.2023------>

    $("#a_table").on("click", "#a_DeleteButton", function (e) {
        e.stopImmediatePropagation();
        var result = window.confirm("Do you want to delete the Accused Person?");
        if (result) {
            $(this).closest("tr").remove();
            var arrestrowcount = $("#a_table tbody tr").length;
            var arr = $('#arrest').val();
            if (arrestrowcount == arr) {
                $(".arrest_m").prop("disabled", true);
            }
            else {
                $(".arrest_m").prop("disabled", false);
            }
        }
        // alert("Do you want to Delete");

    });

    /////// ADD SEIZURE ////////
    var se_no = 1;
    $('#add_seizure').click(function (e) {
        e.stopImmediatePropagation();
        var s_arms = $('#s_arms').val();
        var st_arms = $('#st_arms').val();
        var s_ammu = $('#s_ammu').val();
        var s_ta = $('#s_ta').val();
        var s_exp = $('#s_exp').val();
        var s_te = $('#s_te').val();
        var s_ids = $('#s_ids').val();
        var s_idd = $('#s_idd').val();
        var s_bomb = $('#s_bomb').val();
        var s_ganja = $('#s_ganja').val();
        var s_herion = $('#s_herion').val();
        var s_fc = $('#s_fc').val();
        var s_bm = $('#s_bm').val();
        var s_up = $('#s_up').val();
        var s_sp = $('#s_sp').val();
        var s_os = $('#s_os').val();

        if (s_arms == "" && st_arms == "" && s_ammu == "" && s_ta == "" && s_exp == "" && s_te == "" && s_ids == "" && s_idd == "" && s_bomb == "" && s_ganja == "" && s_herion == "" && s_fc == "" && s_bm == "" && s_up == "" && s_sp == "" && s_os == "") {
            alert("Please Entry Any Seizure which was Involve this case");
            return false;
        }
        else {
            $('#s_table > tbody').append("<tr><td><input type='hidden' id='se_no' name='se_no[]' value='" + se_no + "'>" + se_no + "</td><td><input type='hidden' id='se_arms' name='se_arms[]' value='" + s_arms + "'>" + s_arms + "</td><td><input type='hidden' id='se_type_arms' name='se_type_arms[]' value='" + st_arms + "'>" + st_arms + "</td><td><input type='hidden' id='se_ammu' name='se_ammu[]' value='" + s_ammu + "'>" + s_ammu + "</td><td><input type='hidden' id='se_ta' name='se_ta[]' value='" + s_ta + "'>" + s_ta + "</td><td><input type='hidden' id='se_exp' name='se_exp[]' value='" + s_exp + "'>" + s_exp + "</td><td><input type='hidden' id='se_te' name='se_te[]' value='" + s_te + "'>" + s_te + "</td><td><input type='hidden' id='se_ids' name='se_ids[]' value='" + s_ids + "'>" + s_ids + "</td><td><input type='hidden' id='se_idd' name='se_idd[]' value='" + s_idd + "'>" + s_idd + "</td><td><input type='hidden' id='se_bomb' name='se_bomb[]' value='" + s_bomb + "'>" + s_bomb + "</td><td><input type='hidden' id='se_ganja' name='se_ganja[]' value='" + s_ganja + "'>" + s_ganja + "</td><td><input type='hidden' id='se_herion' name='se_herion[]' value='" + s_herion + "'>" + s_herion + "</td><td><input type='hidden' id='se_fc' name='se_fc[]' value='" + s_fc + "'>" + s_fc + "</td><td><input type='hidden' id='se_bm' name='se_bm[]' value='" + s_bm + "'>" + s_bm + "</td><td><input type='hidden' id='se_up' name='se_up[]' value='" + s_up + "'>" + s_up + "</td><td><input type='hidden' id='se_sp' name='se_sp[]' value='" + s_sp + "'>" + s_sp + "</td><td><input type='hidden' id='se_os' name='se_os[]' value='" + s_os + "'>" + s_os + "</td><td><input type='button' id='s_DeleteButton' name='' value='DELETE' ></td></tr>");
        }
        se_no++;
        $(' td:nth-child(1),th:nth-child(1)').hide();
        $('s_arms').val('');
        $('st_arms').val('');
        $('s_ammu').val('');
        $('s_ta').val('');
        $('s_exp').val('');
        $('s_te').val('');
        $('s_ids').val('');
        $('s_idd').val('');
        $('s_bomb').val('');
        $('s_ganja').val('');
        $('s_herion').val('');
        $('s_fc').val('');
        $('s_bm').val('');
        $('s_up').val('');
        $('s_sp').val('');
        $('s_os').val('');
        $('#s_seizure').modal('hide');
    });

    $("#s_table").on("click", "#s_DeleteButton", function () {
        $(this).closest("tr").remove();

    });
});


$(document).ready(function () {

    //block or restrict characters in textbox
    $('#v_age').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
    $('#a_age').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
    $('#v_contact').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
    $('#fir_no').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
    $('#victim').keypress(function (e) {
        console.log("aaaa->", e);
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }

    });
    $('#arrest').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
    $('#propertie').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
    $('#ud_case_no').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
    $('#a_mobile').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
    $('#s_exp,#s_ids,#s_idd,#s_arms,#s_ammu,#s_bomb,#s_ganja,#s_herion,#s_fc,#s_bm').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46) {
            return false;
        }
    });
    $('#seizure_edit_arms,#seizure_edit_ammu,#seizure_edit_exp,#seizure_edit_ids,#seizure_edit_idd,#seizure_edit_bomb,#seizure_edit_ganja,#seizure_edit_herion,#seizure_edit_fc,#seizure_edit_bm').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46) {
            return false;
        }
    });
});
////-----Table Row Count Function---------->////////

$("#case_entry_form").submit(function (e) {
    e.stopImmediatePropagation();
    var victimRowCount = $("#v_table tbody tr").length;
    var arrestrowcount = $("#a_table tbody tr").length;
    var v = $('#victim').val();
    var a = $('#arrest').val();
    if (v != victimRowCount) {
        alert("Please input victim details..")
        return false
    }
    if (a != arrestrowcount) {
        alert("Please input Arrest Persons details...")
        return false
    }
});

$("#case_edit_form").submit(function (e) {
    var complain = $('#complain').val();
    var ps = $('#ps').val();
});

$('#type_of_disposal').on('change', function (e) {
    e.stopImmediatePropagation();
    $('.disposal_type').hide();

    if ($(this).val() == "") {
        $("#btn_show").hide();
    }
    else {
        $("#btn_show").show();
        $('#' + $(this).val()).show();
    }
});

$('#disposaltype').on('change', function (e) {
    e.stopImmediatePropagation();
    var tbody = $('.disposal_type tbody');

    $('.btn_show').hide();

    if ($(this).val() == "") {
        $("#btn_show").hide();
        tbody.empty();
    }
    else {
        $("#btn_show").show();
        tbody.empty();
        $('#' + $(this).val()).show();
    }
});
// $("#type_of_disposal").on("change", function(e){  
//    e.stopImmediatePropagation();
//   //alert($(this).val());
//   // var formData = $(this).serialize();
//   // console.log(formData);
//     if ($(this).val()=="")
//        $("#btn_show").hide();
//     else
//        $("#btn_show").show();
// });
$('#ps_disposal_button').click(function (e) {
    e.stopImmediatePropagation();
    //$('#psdisposal_entry_form').attr('class');
    var dividName = $('#type_of_disposal').val();
    //console.log(divClass);

    if (dividName == 'CS') {
        if ($('#type_cs').val() == '') {
            alert("Please Chose Type of Charge Sheet.. ");
            return false;
        }
        if ($('#cs_no').val() == '') {
            alert("Please Enter Charge Sheet Number.. ");
            return false;
        }
        if ($('#cs_date').val() == '') {
            alert("Please Enter Charge Sheet Date.. ");
            return false;
        }
        if ($('#cs_section').val() == '') {
            alert("Please Enter Under Section.. ");
            return false;
        }
        if ($('#cs_person').val() == '') {
            alert("Please Enter Number of Charge Sheet Person.. ");
            return false;
        }
        if ($('#cs_accused_details').val() == '') {
            alert("Please Enter Charge Sheeted Accused Persons Details.. ");
            return false;
        }

    }
    if (dividName == 'FRT') {
        if ($('#frt_no').val() == '') {
            alert("Please Enter FRT Number.. ");
            return false;
        }
        if ($('#frt_date').val() == '') {
            alert("Please Enter FRT Date.. ");
            return false;
        }
    }
    if (dividName == 'FRMF') {
        if ($('#frmf_no').val() == '') {
            alert("Please Enter FRMF Number.. ");
            return false;
        }
        if ($('#frmf_date').val() == '') {
            alert("Please Enter FRMF Date.. ");
            return false;
        }
    }
    if (dividName == 'TRANSFER') {
        if ($('#transfer_unit').val() == '') {
            alert("Please Enter Transfer PS/Unit Name.. ");
            return false;
        }
        if ($('#transfer_date').val() == '') {
            alert("Please Enter Transfer Date.. ");
            return false;
        }
    }
    //alert(dividName);

})

//------------Victim Update From Edit Form------------>  

$('#victim_update').click(function (e) {
    e.stopImmediatePropagation();
    // var row = $(this).closest(".row_approveddata");
    // var caseid = $(row).find('#case_id').val();
    var caseid = $('#case_id').val();
    var v_edit_id = $('#v_edit_id').val();
    var v_edit_name = $('#v_edit_name').val();
    var v_edit_fathername = $('#v_edit_fathername').val();
    var v_edit_address = $('#v_edit_address').val();
    var v_edit_age = $('#v_edit_age').val();
    var v_edit_gender = $('#v_edit_gender').val();
    var v_edit_contact = $('#v_edit_contact').val();
    //  alert(caseid);
    $.ajax({
        url: master + '/welcome/victim_update_data',
        method: 'post',
        data: {
            caseid: caseid,
            v_edit_id: v_edit_id,
            v_edit_name: v_edit_name,
            v_edit_fathername: v_edit_fathername,
            v_edit_address: v_edit_address,
            v_edit_age: v_edit_age,
            v_edit_gender: v_edit_gender,
            v_edit_contact: v_edit_contact,
        },
        dataType: "json",
        success: function (data) {
            report = JSON.parse(JSON.stringify(data));
            reloadTableData(v_edit_id);
        }
    });
    $('#e_victim').modal('hide');
})

function reloadTableData(v_edit_id) {
    $.ajax({
        url: master + '/welcome/reload_table_data_victim',
        method: 'post',
        data: {
            vEditId: v_edit_id
        },
        dataType: "json",
        success: function (data) {
            report = JSON.parse(JSON.stringify(data));
            var rowIndex = findRowIndexByVId(report[0].v_id);
            //alert(rowIndex);
            console.log("report=======>>", report);
            //location.reload();
            if (rowIndex !== -1) {
                $('#v_edit_table tr:eq(' + rowIndex + ') td:eq(2)').text(report[0].name);
                $('#v_edit_table tr:eq(' + rowIndex + ') td:eq(3)').text(report[0].f_name);
                $('#v_edit_table tr:eq(' + rowIndex + ') td:eq(4)').text(report[0].address);
                $('#v_edit_table tr:eq(' + rowIndex + ') td:eq(5)').text(report[0].age);
                $('#v_edit_table tr:eq(' + rowIndex + ') td:eq(6)').text(report[0].gender);
                $('#v_edit_table tr:eq(' + rowIndex + ') td:eq(7)').text(report[0].contact);
            }
        }
    });
}

function findRowIndexByVId(v_id) {
    var table = document.getElementById("v_edit_table");
    for (var i = 1; i < table.rows.length; i++) {
        var row = table.rows[i];
        var value = document.createElement('div');
        value.innerHTML = row.cells[0].innerHTML;
        var victim_id = value.querySelector("#victim_id").value;
        if (victim_id.trim() === v_id) {
            return i;
        }
    }
    return -1;
}

function changeDateFormat(dateStr) {
    return dateStr.replaceAll('/', '-');
}
//------------Arrest Persons Update From Edit Form------------>  

$('#arrest_update').click(function (e) {
    e.stopImmediatePropagation();
    // var row = $(this).closest(".row_approveddata");
    // var caseid = $(row).find('#case_id').val();
    var caseid = $('#case_id').val();
    var a_edit_id = $('#a_edit_id').val();
    var a_edit_name = $('#a_edit_name').val();
    var a_edit_nickname = $('#a_edit_nickname').val();
    var a_edit_fathername = $('#a_edit_fathername').val();
    var a_edit_address = $('#a_edit_address').val();
    var a_edit_mobile = $('#a_edit_mobile').val();
    var a_edit_age = $('#a_edit_age').val();
    var a_edit_gender = $('#a_edit_gender').val();
    var a_edit_caselink = $('#a_edit_caselink').val();
    var a_edit_modus = $('#a_edit_modus').val();
    var a_edit_arrestdate = $('#a_edit_arrestdate').val();
    console.log(a_edit_mobile);
    var a_edit_status = $('#a_edit_status').val();
    var a_edit_physical = $('#a_edit_physical').val();
    //  alert(caseid);
    $.ajax({
        url: master + '/welcome/arrest_update_data',
        method: 'post',
        data: {
            caseid: caseid,
            a_edit_id: a_edit_id,
            a_edit_name: a_edit_name,
            a_edit_nickname: a_edit_nickname,
            a_edit_fathername: a_edit_fathername,
            a_edit_address: a_edit_address,
            a_edit_mobile: a_edit_mobile,
            a_edit_age: a_edit_age,
            a_edit_gender: a_edit_gender,
            a_edit_caselink: a_edit_caselink,
            a_edit_modus: a_edit_modus,
            a_edit_arrestdate: a_edit_arrestdate,
            a_edit_status: a_edit_status,
            a_edit_physical: a_edit_physical,
        },
        dataType: "json",
        success: function (data) {
            report = JSON.parse(JSON.stringify(data));
            reloadTableDataArrest(a_edit_id, "first_update");
        }
    });
    $('#e_arrest').modal('hide');
})

function reloadTableDataArrest(a_edit_id, from) {
    $.ajax({
        url: master + '/welcome/reload_table_data_arrest',
        method: 'post',
        data: {
            aEditId: a_edit_id
        },
        dataType: "json",
        success: function (data) {
            report = JSON.parse(JSON.stringify(data));
            var rowIndex = findRowIndexByVIdArrest(report[0].a_id);

            // console.log("report=======>>", report);
            // console.log("rowIndex=======>>", rowIndex);

            if (rowIndex !== -1) {
                var visibleTds = $('#a_edit_table tr:eq(' + rowIndex + ') td:visible');
                // console.log("Visible Tds Count======: ", visibleTds.length);

                // Map data to visible `td` elements dynamically
                visibleTds.each(function (index) {
                    switch (index) {
                        case 0: // For the first visible `td`
                            $(this).text(report[0].name);
                            break;
                        case 1: // For the second visible `td`
                            $(this).text(report[0].nick_name);
                            break;
                        case 2:
                            $(this).text(report[0].father_name);
                            break;
                        case 3:
                            $(this).text(report[0].address);
                            break;
                        case 4:
                            $(this).text(report[0].mobile_no);
                            break;
                        case 5:
                            $(this).text(report[0].age);
                            break;
                        case 6:
                            $(this).text(report[0].gender);
                            break;
                        case 7:
                            $(this).text(report[0].other_case_link);
                            break;
                        case 8:
                            $(this).text(report[0].modus_operandi);
                            break;
                        case 9:
                            $(this).text(formatedate(report[0].arrest_date));
                            break;
                        case 10:
                            $(this).text(report[0].status);
                            break;
                        case 11:
                            $(this).text(report[0].identification_mark);
                            break;
                        case 12: // Render dynamic buttons in the last visible column
                            $(this).html(`
                                <div class="tooltip">
                                    <button type="button" class="btn btn-primary arrest_e"><i class="fa fa-edit"></i></button>
                                    <span class="tooltiptext">Edit</span>
                                </div>
                                <div class="tooltip">
                                    <button type="button" class="btn btn-danger arrest_delete"><i class="fa fa-trash"></i></button>
                                    <span class="tooltiptext">Delete</span>
                                </div>
                            `);
                            break;
                        default:
                            console.warn("No data mapping for visible column at index: ", index);
                    }
                });
            } else {
                console.error("Row not found for a_id: ", report[0].a_id);
            }
        }
    });
}


function findRowIndexByVIdArrest(a_id) {
    var table = document.getElementById("a_edit_table");
    for (var i = 1; i < table.rows.length; i++) {
        var row = table.rows[i];
        var value = document.createElement('div');
        value.innerHTML = row.cells[0].innerHTML;
        var arrest_id = value.querySelector("#arrest_id").value;
        if (arrest_id.trim() === a_id) {
            return i;
        }
    }
    return -1;
}

//Crime Search------>
$('#crimeSearchSubmit').click(function (e) {
    e.stopImmediatePropagation();
    var tbody = $('.disposal_type tbody');
    tbody.empty();
    var user_id = $('#user_id').val();
    //console.log(user_id); 
    var crime_search_fir_no = $('#crimesearch_fir').val();
    var crime_search_ps = $('#crime_search_ps').val();
    var crime_search_from_date = $('#crime_search_from_date').val();
    var crime_search_to_date = $('#crime_search_to_date').val();
    var crime_search_crime_head = $('#crime_search_crime_head').val();
    var image_url = window.location.origin + '/' + window.location.pathname.split('/')[1] + '/' + 'assets/image/i.png'
    if (crime_search_fir_no == "" && crime_search_ps == "" && crime_search_from_date == "" && crime_search_to_date == "" && crime_search_crime_head == "") {
        alert("Pleae select atlast any one filed");
    }
    else if ((crime_search_from_date != "" && crime_search_to_date == "") || (crime_search_from_date == "" && crime_search_to_date != "")) {
        alert("If you select 'From Date' then select 'To Date' also OR if you select 'TO Date' then select 'From Date' also");
    }
    else {
        // alert(crime_search_ps)
        $.ajax({
            url: master + '/welcome/crime_search_data',
            method: 'post',
            data: {
                user_id: user_id,
                crime_search_fir_no: crime_search_fir_no,
                crime_search_ps: crime_search_ps,
                crime_search_from_date: crime_search_from_date,
                crime_search_to_date: crime_search_to_date,
                crime_search_crime_head: crime_search_crime_head
            },
            dataType: "json",
            success: function (response) {
                if (response.search_data.length > 0) {
                    var sl_no = 1;
                    response.search_data.forEach(function (value) {
                        var newRow = `
                            <tr>
                                <td>${sl_no}</td>
                                <td>${value.name_of_ps}</td>
                                <td>${value.fir_no}</td>
                                <td>${value.us}</td>
                                <td>${formatedate(value.fir_date)}</td>
                                <td>${value.crimehead}</td>
                                <td>${value.crimemethod || ''}</td>
                                <td class="tooltip" full-text="${value?.gist}">${value?.gist?.length > 10 ? value?.gist?.substring(0, 10) + '...' : value?.gist} <span class="tooltiptext">${value.gist}</span> </td>
                                <td>${value.arrest}</td>
                                <td>${value.victim}</td>
                                <td class="${value.type_of_ps_disposal != 'Pending' ? 'tooltip' : ''}" 
                                hover_psdisposal="${value.type_of_ps_disposal != 'Pending' ? `${value.case_id}_${value.type_of_ps_disposal}` : ''}">
                                <div class="dataview">
                                  <span>
                                    ${value.type_of_ps_disposal} 
                                  </span> 
                                  ${value.type_of_ps_disposal != 'Pending' ?
                                `<span>
                                      <img class="view_ps_disposal" style="height: 30px; float: right;cursor: pointer" src="${image_url}" onclick="open_ps_disposal_modal('${value.case_id}_${value.type_of_ps_disposal}')">
                                    </span>` : ''}
                                </div>
                                <!-- <span class="${value.type_of_ps_disposal != 'Pending' ? 'tooltiptext' : ''}">
                                  ${value.type_of_ps_disposal != 'Pending' ? `${value.case_id}_${value.type_of_ps_disposal}` : ''}
                                </span> -->
                                </td>

                                <td style="display: none">
                                ${value.type_of_ps_disposal == 'CS' && value.type_of_ps_disposal != null && value.type_of_ps_disposal != '' ?
                                `${value.type_of_ps_disposal} No: ${value.cs_no}|\n|${value.type_of_ps_disposal} Date: ${formatedate(value.cs_date)}|\n|Person: ${value.person_cs}|\n|Details: ${value.cs_accused_details}` : ''
                            }
                                ${value.type_of_ps_disposal == 'FRT' && value.type_of_ps_disposal != null && value.type_of_ps_disposal != '' ?
                                `${value.type_of_ps_disposal} No: ${value.frt_no}|\n|${value.type_of_ps_disposal} Date: ${formatedate(value.frt_date)}` : ''
                            }
                                ${value.type_of_ps_disposal == 'FRMF' && value.type_of_ps_disposal != null && value.type_of_ps_disposal != '' ?
                                `${value.type_of_ps_disposal} No: ${value.frmf_no}|\n|${value.type_of_ps_disposal} Date: ${formatedate(value.frmf_date)}` : ''
                            }
                                ${value.type_of_ps_disposal == 'TRANSFER' && value.type_of_ps_disposal != null && value.type_of_ps_disposal != '' ?
                                `Transfer Unit: ${value.transfer_unit}|\n|Transfer Date: ${formatedate(value.transfer_date)}` : ''
                            }
                                </td>

                                <td 
                                <span>
                                    ${value.type_of_ps_disposal == 'CS' ? value.type_of_court_disposal : '-'} 
                                  </span>
                                
                                    ${value.type_of_ps_disposal == 'CS' && value.type_of_court_disposal != 'Pending' ?


                                `<span> 
                                      <img class="view_court_disposal" style="height: 30px; float: right;cursor: pointer" src="${image_url}" onclick="open_court_disposal_modal('${value.case_id}_${value.type_of_court_disposal}')">
                                    </span>` : ''}
                                </td>  

                                <td style="display:none">
                                ${value.type_of_court_disposal == 'Acquitted' && value.type_of_court_disposal != null && value.type_of_court_disposal != '' ?
                                `${value.type_of_court_disposal} \n Date: ${formatedate(value.court_disposal_date)} |\n| Person Acquitted: ${(value.court_disposal_accused_person)} |\n| Gist: ${(value.gist_of_disposal)}` : ''
                            }
                                ${value.type_of_court_disposal == 'Conviction' && value.type_of_court_disposal != null && value.type_of_court_disposal != '' ?
                                `${value.type_of_court_disposal} \n Date: ${formatedate(value.court_disposal_date)} |\n| Person Conviction: ${(value.court_disposal_accused_person)} |\n| Gist: ${(value.gist_of_disposal)}` : ''
                            }
                                </td>

                                <!-- <span class="${value.type_of_ps_disposal !== 'Pending' ? 'tooltiptext' : ''}">
                                  ${value.type_of_ps_disposal !== 'Pending' ? `${value.case_id}_${value.type_of_ps_disposal}` : ''}
                                </span> -->
                                
                        `;
                        tbody.append(newRow);
                        sl_no++;
                    });
                } else {
                    var emptyRow = `
                        <tr style="color:red;  text-align: center">
                            <td  colspan="100"><h5>No data available<h5></td>
                        </tr>
                    `;
                    tbody.append(emptyRow);
                }
            }
        });
    }
});


//Crime Search------>
$('#criminal_SearchSubmit').click(function (e) {
    e.stopImmediatePropagation();
    var tbody = $('.criminal_search tbody');
    tbody.empty();
    var user_id = $('#user_id').val();
    //console.log(user_id); 
    var criminal_name = $('#criminal_name').val();
    var criminal_ps = $('#criminal_search_ps').val();
    var criminal_crimehead = $('#type_of_criminal_crime').val();

    var image_url = window.location.origin + '/' + window.location.pathname.split('/')[1] + '/' + 'assets/image/no_image.jpeg'
    var criminal_image_url = window.location.origin + '/' + window.location.pathname.split('/')[1] + '/' + 'upload/arrest_persons/no_image.jpeg'
    if (criminal_name == "" && criminal_ps == "" && criminal_crimehead == "") {
        alert("Pleae select atlast any one filed");
    }
    else {
        // alert(crime_search_ps)
        $.ajax({
            url: master + '/welcome/criminal_search_data',
            method: 'post',
            data: {
                user_id: user_id,
                criminal_name: criminal_name,
                criminal_ps: criminal_ps,
                criminal_crimehead: criminal_crimehead
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.search_criminal_data.length > 0) {
                    var sl_no = 1;
                    response.search_criminal_data.forEach(function (value) {
                        var newRow = `
                            <tr>
                            
                              <td>${sl_no}</td>
                                <td style="width:80%; font-size:20px"> 
                                <div style=""> ${value.name_of_ps}</div>
                                <div class="criminal_div" style="font-weight: bold"> Criminal Name: ${value.name} &nbsp &nbsp Age: ${value.age}  (${value.gender})
                                </div>
                                
                                <div><b> Case Reference:</b> ${value.us}</div>
                                <div><b> Crime Head:</b> ${value.crimehead}</div>
                                <div><b> Modus Operandi:</b> ${value.modus_operandi}</div>
                                <div><b> Arrest Date:</b> ${formatedate(value.arrest_date)}</div>
                                <div><b> Other Case Link:</b> ${value.other_case_link}</div>
                                <div><b> Present Status:</b> ${value.status}</div>
                                
                                </td>
                                 <td>${value.image == "" ? `<img class="no_image" src="${image_url}"/>` : `<img class="crimianl_image" src="${window.location.origin + '/' + window.location.pathname.split('/')[1] + '/' + `upload/arrest_persons/${value.image}`}"/>`}</td> 
                        `;
                        tbody.append(newRow);
                        sl_no++;
                    });
                } else {
                    var emptyRow = `
                        <tr style="color:red;  text-align: center">
                            <td  colspan="100"><h5>No data available<h5></td>
                        </tr>
                    `;
                    tbody.append(emptyRow);
                }
            }
        });
    }
});




// //PS Disposal Search--->
$('#crimeSearchSubmit_psdisposal').click(function (e) {
    e.stopImmediatePropagation();
    var tbody = $('.disposal_type tbody');
    tbody.empty();
    var case_id
    var user_id = $('#user_id').val();
    //console.log(user_id); 

    var psdisposal_search_from_date = $('#psdisposal_search_from_date').val();
    var psdisposal_search_to_date = $('#psdisposal_search_to_date').val();
    var disposaltype = $('#disposaltype').val();

    console.log(disposaltype);
    var image_url = window.location.origin + '/' + window.location.pathname.split('/')[1] + '/' + 'assets/image/i.png'
    if (disposaltype == "") {
        alert("Please select Disposal Type");
    } else if (psdisposal_search_from_date == "" && psdisposal_search_to_date == "") {
        alert("Please select From Date & To Date filed");
    }
    else if ((psdisposal_search_from_date != "" && psdisposal_search_to_date == "") || (psdisposal_search_from_date == "" && psdisposal_search_to_date != "")) {
        alert("If you select 'From Date' then select 'To Date' also OR if you select 'TO Date' then select 'From Date'");
    }
    else {
        //alert(disposal_type_data);
        $.ajax({
            url: master + '/welcome/disposal_search_alldata',
            method: 'post',
            data: {
                user_id: user_id,
                disposaltype: disposaltype,
                psdisposal_search_from_date: psdisposal_search_from_date,
                psdisposal_search_to_date: psdisposal_search_to_date
            },
            dataType: "json",
            success: function (response) {
                console.log(response);

                if (disposaltype == 'PD' ? response.ps_disposal_value.length > 0 : response.court_disposal_value.length > 0) {
                    var sl_no = 1;
                    if (disposaltype == 'PD') {
                        response.ps_disposal_value.forEach(function (value) {
                            var newRow = `
                            <tr>
                                <td>${sl_no}</td>
                                <td>${value.name_of_ps} Case No. ${value.fir_no} Date. ${formatedate(value.fir_date)} U/S- ${value.us} </td>
                                <td>${value.crimehead}</td>
                                <td>${value.type_of_disposal}</td>
                                <td>${formatedate(value.disposal_date)}</td>
                                <td>${(value.person_cs)}</td>
                                <td>${(value.transfer_unit)}</td>
                             </tr>   
                        `;
                            tbody.append(newRow);
                            sl_no++;
                        });
                    } else {
                        response.court_disposal_value.forEach(function (value) {
                            var newRow = `
                            <tr>
                                <td>${sl_no}</td>
                                <td>${value.name_of_ps} Case No. ${value.fir_no} Date. ${formatedate(value.fir_date)} U/S- ${value.us} </td>
                                <td>${value.crimehead}</td>
                                <td>${value.type_of_court_disposal}</td>
                                <td>${formatedate(value.court_disposal_date)}</td>
                                <td>${value.court_disposal_accused_person}</td>
                             </tr>   
                        `;
                            tbody.append(newRow);
                            sl_no++;
                        });
                    }
                } else {
                    var emptyRow = `
                        <tr style="color:red;  text-align: center">
                            <td  colspan="100"><h5>No data available<h5></td>
                        </tr>
                    `;
                    tbody.append(emptyRow);
                }
            }
        });
    }
});





function open_ps_disposal_modal(table_data) {
    console.log("table_data====", table_data)
    var case_id = table_data.split("_")[0]
    var type_of_disposal = table_data.split("_")[1]

    $.ajax({
        url: master + '/welcome/load_ps_disposal_data',
        method: 'post',
        data: {
            caseId: case_id,
            typeOfDisposal: type_of_disposal,
        },
        dataType: "json",
        success: function (data) {
            var success_data = data[0];
            //console.log(success_data);
            if (type_of_disposal == "CS") {
                $('#view_csdisposal_details').modal({ backdrop: 'static' });
                $('#ps_name').html(success_data.name_of_ps);
                $('#fir_no').html(success_data.fir_no);
                $('#fir_date').html(formatedate(success_data.fir_date));
                $('#date').html(success_data.cs_date);
                $('#cs_no').html(success_data.cs_no);
                $('#cs_date').html(formatedate(success_data.cs_date));
                $('#pc_sheeted').html(success_data.person_cs);
                $('#details_person').html(success_data.cs_accused_details);
            }
            if (type_of_disposal == "FRT") {
                $('#view_frtdisposal_details').modal({ backdrop: 'static' });
                $('#frt_ps_name').html(success_data.name_of_ps);
                $('#frt_fir_no').html(success_data.fir_no);
                $('#frt_fir_date').html(formatedate(success_data.fir_date));
                $('#frt_no').html(success_data.frt_no);
                $('#frt_date').html(formatedate(success_data.frt_date));
            }
            if (type_of_disposal == "FRMF") {
                $('#view_frmfdisposal_details').modal({ backdrop: 'static' });
                $('#frmf_ps_name').html(success_data.name_of_ps);
                $('#frmf_fir_no').html(success_data.fir_no);
                $('#frmf_fir_date').html(formatedate(success_data.fir_date));
                $('#frmf_no').html(success_data.frmf_no);
                $('#frmf_date').html(formatedate(success_data.frmf_date));
            }
            if (type_of_disposal == "TRANSFER") {
                $('#view_transferdisposal_details').modal({ backdrop: 'static' });
                $('#transfer_ps_name').html(success_data.name_of_ps);
                $('#transfer_fir_no').html(success_data.fir_no);
                $('#transfer_fir_date').html(formatedate(success_data.fir_date));
                $('#transfer_unit').html(success_data.transfer_unit);
                $('#transfer_date').html(formatedate(success_data.transfer_date));
            }

        }
    })
};

function open_court_disposal_modal(table_data) {
    console.log("table_data====", table_data)
    var case_id = table_data.split("_")[0]
    var type_of_disposal = table_data.split("_")[1]

    $.ajax({
        url: master + '/welcome/load_court_disposal_data',
        method: 'post',
        data: {
            caseId: case_id,
            typeOfDisposal: type_of_disposal,
        },
        dataType: "json",
        success: function (data) {
            var success_data = data[0];
            //console.log(success_data);
            if (type_of_disposal == "Acquitted") {
                $('#view_courtdisposal_details').modal({ backdrop: 'static' });
                $('#court_ps_name').html(success_data.name_of_ps);
                $('#court_fir_no').html(success_data.fir_no);
                $('#court_fir_date').html(formatedate(success_data.fir_date));
                $('#court_disposal_type').html(success_data.type_of_court_disposal);
                $('#court_disposal_date').html(formatedate(success_data.court_disposal_date));
                $('#court_disposal_accused_person').html(success_data.court_disposal_accused_person);
                $('#disposal_court_name').html(success_data.disposal_court_name);
                $('#gist_of_disposal').html(success_data.gist_of_disposal);
            }
            if (type_of_disposal == "Conviction") {
                $('#view_courtdisposal_details_con').modal({ backdrop: 'static' });
                $('#court_ps_name_con').html(success_data.name_of_ps);
                $('#court_fir_no_con').html(success_data.fir_no);
                $('#court_fir_date_con').html(formatedate(success_data.fir_date));
                $('#court_disposal_type_con').html(success_data.type_of_court_disposal);
                $('#court_disposal_date_con').html(formatedate(success_data.court_disposal_date));
                $('#court_disposal_accused_person_con').html(success_data.court_disposal_accused_person);
                $('#disposal_court_name_con').html(success_data.disposal_court_name);
                $('#gist_of_disposal_con').html(success_data.gist_of_disposal);
            }
        }
    })
};


function formatedate(dateStr) {
    // Convert the date string to a Date object
    let date = new Date(dateStr);
    // Extract the day, month, and year
    let day = String(date.getDate()).padStart(2, '0');
    let month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
    let year = date.getFullYear();

    // Format the date as 'dd-mm-yyyy'
    let formattedDate = `${day}-${month}-${year}`;
    return formattedDate;
}

// For excel Convert---------->

function get_current_date_time() {
    var now = new Date();
    var dateStr = String(now.getDate()).padStart(2, '0') + "-" +
        String(now.getMonth() + 1).padStart(2, '0') + "-" +
        now.getFullYear() + "_" +
        String(now.getHours()).padStart(2, '0') + "-" +
        String(now.getMinutes()).padStart(2, '0') + "-" +
        String(now.getSeconds()).padStart(2, '0');
    // console.log("dateStr========", dateStr)
    return dateStr;
}

// For excel Convert---------->
function downloadasexcel(type) {
    var table = document.getElementById("disposal_type");
    var rows = table.rows;
    var data = [];

    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].children;
        for (var j = 0; j < cols.length; j++) {
            if (cols[j].hasAttribute('full-text')) {
                row.push(cols[j].getAttribute('full-text').replace(/(\r\n|\n|\r)/gm, " ").trim());
            } else if (cols[j].style.display === "none") {
                row.push(cols[j].innerText.replace(/(\r\n|\n|\r)/gm, " ").trim());
            } else {
                // Insert line breaks for multiline content
                var cellContent = cols[j].innerText.trim().replace(/(\r\n|\n|\r)/gm, "\n");
                row.push(cellContent);
            }
        }
        data.push(row);
    }

    var worksheet = XLSX.utils.aoa_to_sheet(data);
    var workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, type);
    var excelBuffer = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });
    var blob = new Blob([excelBuffer], { type: 'application/octet-stream' });
    var link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.download = `${type}_${get_current_date_time()}.xlsx`;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

//For Data Table--->


$('#seizure_data').click(function (e) {
    e.stopImmediatePropagation();
    var user_id = $('#user_id').val();
    //console.log(user_id); 
    var seizure_search_ps = $('#seizure_search_ps').val();
    var seizure_type = $('#seizure_type').val();
    var seizure_search_from_date = $('#seizure_search_from_date').val();
    var seizure_search_to_date = $('#seizure_search_to_date').val();


    if (seizure_type == "" && seizure_search_from_date == "" && seizure_search_to_date == "") {
        alert("Pleae select atlast any one filed");
    }
    else if ((seizure_search_from_date != "" && seizure_search_to_date == "") || (seizure_search_from_date == "" && seizure_search_to_date != "")) {
        alert("If you select 'From Date' then select 'To Date' also OR if you select 'To Date' then select 'From Date' also");
    }
    else {
        alert(seizure_type);
        alert(seizure_search_from_date);
        alert(seizure_search_to_date);
        $.ajax({
            url: master + '/welcome/crime_search_data',
            method: 'post',
            data: {
                user_id: user_id,
                seizure_type: seizure_type,
                seizure_search_from_date: seizure_search_from_date,
                seizure_search_to_date: seizure_search_to_date,
            },
            dataType: "json",
            success: function (response) {
                // if (response.search_data.length > 0) {
                //     var sl_no = 1;
                //     response.search_data.forEach(function (value) {        
                //     });
                // } else {
                // }
            }
        });
    }
});

