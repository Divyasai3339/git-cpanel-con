<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();

?>
<script src="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row"> 
            <div class="col-md-12">
                <div class="box box-primary"> 
                    <div class="box-header with-border">
                         <h4>EMR</h4>
                    </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="download_label"><?php
                                if ($title == 'old_patient') {
                                    echo $this->lang->line('opd_old_patient');
                                    ?>
                                    <?php
                                } else {
                                    echo $this->lang->line('opd_patient');
                                    ?>

                                <?php } ?>
                            </div>
                            <table class="table table-striped table-bordered table-hover ajaxlist" data-export-title="<?php echo $this->lang->line('opd_patient'); ?>">
                                <thead>
                                    <tr>
                                    <th><?php echo $this->lang->line('name') ?></th>
                                    <th><?php echo $this->lang->line('patient_id'); ?></th>
                                    <th><?php echo $this->lang->line('guardian_name') ?></th>
                                    <th><?php echo $this->lang->line('gender'); ?></th>
                                    <th><?php echo $this->lang->line('phone'); ?></th>
                                    <th><?php echo $this->lang->line('consultant'); ?></th>
                                    <th><?php echo $this->lang->line('last_visit'); ?></th>   
                                    <th class="text-right noExport"><?php echo $this->lang->line('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>  
            </div>
        </div> 
    </section>
</div>


<!-- Add Prescription -->
<div class="modal fade" id="add_prescription" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog pup100" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="prescription_title"></h4>
            </div>
            <form id="form_prescription" class="bckgrnd" accept-charset="utf-8" enctype="multipart/form-data" method="post">
                <div class="pup-scroll-area">
                    <div class="modal-body pt0 pb0">
                    </div>
                    <!--./modal-body-->
                </div>
                <div class="modal-footer sticky-footer">
                    <div class="pull-right">
                        <button type="submit" name="save_print" value="save_print" data-loading-text="<?php echo $this->lang->line('processing'); ?>" class="btn btn-info"><i class="fa fa-print"></i> <?php echo $this->lang->line('save_print'); ?>
                        </button>
                        <button type="submit" name="save" value="save" data-loading-text="<?php echo $this->lang->line('processing'); ?>" class="btn btn-info"><i class="fa fa-check-circle"></i> <?php echo $this->lang->line('save'); ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- Add Prescription -->


<!-- -->
<div class="modal fade" id="edit_prescription" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('edit_prescription'); ?></h4>
            </div>

            <div class="modal-body pt0 pb0" id="editdetails_prescription">
            </div>
        </div>
    </div>
</div>


<!-- -->
<div class="modal fade" id="prescriptionview" tabindex="-1" role="dialog" aria-labelledby="follow_up">
    <div class="modal-dialog modal-mid modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modalicon">
                    <div id='edit_deleteprescription'>

                    </div>
                </div>
                <h4 class="modal-title"><?php echo $this->lang->line('prescription'); ?></h4>
            </div>
            <div class="scroll-area">
                <div class="modal-body pt0 pb0" id="getdetails_prescription">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
( function ( $ ) {
    'use strict';
    $(document).ready(function () {
        initDatatable('ajaxlist','admin/optometry/getOptometryPatientsDataTable',[],[],100);
        
    });
} ( jQuery ) )
</script>
<script>
    
    function popup(data) {
        var base_url = '<?php echo base_url() ?>';
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({
            "position": "absolute",
            "top": "-1000000px"
        });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/bootstrap/css/bootstrap.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/font-awesome.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/ionicons.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/AdminLTE.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/skins/_all-skins.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/iCheck/flat/blue.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/morris/morris.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/datepicker/datepicker3.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/daterangepicker/daterangepicker-bs3.css">');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function() {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();

        }, 500);

        return true;
    }
</script>   

<script type="text/javascript">
 var presc_os_complaints = {};
var presc_od_complaints = {};
var presc_selected_complaints = {};


function prescComplaintMake(indicator, key, value) {
        presc_selected_complaints[key] = indicator;
        if (indicator == "od") {
            if (key in presc_os_complaints) {
                delete presc_os_complaints[key];
            }
            presc_od_complaints[key] = value;
        }
        if (indicator == "os") {
            if (key in presc_od_complaints) {
                delete presc_od_complaints[key];
            }
            presc_os_complaints[key] = value;
        }
        if (indicator == "both") {
            if (key in presc_os_complaints && key in presc_od_complaints) {

            } else if (!key in presc_os_complaints && key in presc_od_complaints) {
                presc_os_complaints[key] = value;
            } else if (key in presc_os_complaints && !key in presc_od_complaints) {
                presc_od_complaints[key] = value;
            } else {
                presc_od_complaints[key] = value;
                presc_os_complaints[key] = value;
            }
        }

        var od_html = "";
        $.each(presc_od_complaints, function(od_key, od_value) {
            var param = "'" + od_key + "','od'";
            od_html += '<li class="list-group-item ' + od_key + '_list">' + od_value + '</li>';
        });
        $('.presc_od_complaints ul').html(od_html);
        var os_html = "";
        $.each(presc_os_complaints, function(os_key, os_value) {
            os_html += '<li class="list-group-item ' + os_key + '_list">' + os_value + '</li>';
        })
        $('.presc_os_complaints ul').html(os_html);

    }


 function getRecord_id(visitid) {

$('#prescription_title').html('<?php echo $this->lang->line('add_prescription'); ?>');
$.ajax({
    url: base_url + 'admin/prescription/addopdPrescription',
    dataType: 'JSON',
    data: {
        'visit_detail_id': visitid
    },
    type: "POST",
    beforeSend: function() {},
    success: function(res) {
        $('.modal-body', "#add_prescription").html(res.page);
        $('.modal-body', "#add_prescription").find('table').find('.select2').select2();
        $('.modal-body', "#add_prescription").find('.multiselect2').select2({
            placeholder: 'Select',
            allowClear: false,
            minimumResultsForSearch: 2
        });
        $('#add_prescription').modal('show');
        getPrescComplaintData();
        getDiseaseData();
        $('.examinations').select2();
        $('.diagnosis').select2();
        $('.opd_procedure').select2();
        $('.surgery_recommendations').select2();
        $('.footer_note').select2();
        loadMasterData('examinations', 'examinations');
        loadMasterData('diagnosis', 'diagnosis');
        loadMasterData('opd_procedure', 'opd_procedure');
        loadMasterData('surgery_recommendations', 'surgery_recommendations');
        loadMasterData('footer_note', 'footer_note');


    },

    complete: function() {
        $("#compose-textareass,#compose-textareaneww").wysihtml5({
            toolbar: {
                "image": false,
            }
        });
    },
    error: function(xhr) { // if error occured
        alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");


    }
});
}



function edit_prescription(id) {
        $("#prescription_title").html('<?php echo $this->lang->line('edit_prescription'); ?>');
        $.ajax({
            url: base_url + 'admin/prescription/editopdPrescription',
            dataType: 'JSON',
            data: {
                'prescription_id': id
            },
            type: "POST",
            beforeSend: function() {

            },
            success: function(res) {
                $('#prescriptionview').modal('hide');
                $('.modal-body', "#add_prescription").html(res.page);
                var medicineTable = $('.modal-body', "#add_prescription").find('table#tableID');
                medicineTable.find('.select2').select2();
                $('.modal-body', "#add_prescription").find('.multiselect2').select2({
                    placeholder: 'Select',
                    allowClear: false,
                    minimumResultsForSearch: 2
                });
                prescription_rows = medicineTable.find('tr').length + 1;
                medicineTable.find("tbody tr").each(function() {
                    var medicine_category_obj = $(this).find("td select.medicine_category");
                    var post_medicine_category_id = $(this).find("td input.post_medicine_category_id").val();
                    var post_medicine_id = $(this).find("td input.post_medicine_id").val();
                    var dosage_id = $(this).find("td input.post_dosage_id").val();
                    var medicine_dosage = getDosages(post_medicine_category_id, dosage_id);
                    $(this).find('.medicine_dosage').html(medicine_dosage);
                    $(this).find('.medicine_dosage').select2().select2('val', dosage_id);
                    getMedicine(medicine_category_obj, post_medicine_category_id, post_medicine_id);
                });
                $('#add_prescription').modal('show');
                getPrescriptionComplaintAndHistoryData(id)
                getPrescComplaintData();
                $('.examinations').select2();
                $('.diagnosis').select2();
                $('.opd_procedure').select2();
                $('.surgery_recommendations').select2();
                $('.footer_note').select2();
                loadMasterData('examinations', 'examinations', selectedExaminations);
                loadMasterData('diagnosis', 'diagnosis', selectedDiagnosis);
                loadMasterData('opd_procedure', 'opd_procedure', selectedOpdProcedures);
                loadMasterData('surgery_recommendations', 'surgery_recommendations', selectedSurgeryRecommendations);
                loadMasterData('footer_note', 'footer_note', selectedFooterNote);

            },
            complete: function() {
                $("#compose-textareas,#compose-textareanew").wysihtml5({
                    toolbar: {
                        "image": false,
                    }
                });

            },
            error: function(xhr) { // if error occured
                alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");


            }
        });
    }


    function printprescription(visitid) {
        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            url: base_url + 'admin/prescription/printPrescription',
            type: 'GET',
            data: {
                visitid: visitid
            },
            dataType: "JSON",

            success: function(result) {
                popup(result.page);
            }
        });
    }



function getPrescComplaintData(search = null) {
        var searchval = $.trim(search);
        if (searchval !== "") {
            searchval = searchval
        } else {
            searchval = "";
        }
        $.ajax({
            url: baseurl + "admin/optometry/get_complaints_data",
            type: 'POST',
            data: {
                'search': searchval
            },
            dataType: 'json',
            success: function(data) {
                var html = '<ul class="list-group">';
                $.each(data, function(key, val) {
                    var onclickOdFunction = "prescComplaintMake('od','" + val.master_key + "','" + val.master_value + "')";
                    var onclickOsFunction = "prescComplaintMake('os','" + val.master_key + "','" + val.master_value + "')";
                    var onclickBothFunction = "prescComplaintMake('both','" + val.master_key + "','" + val.master_value + "')";
                    html += '<li class="list-group-item">';
                    html += '<div class="row">';
                    html += '<div class="col-md-7" style="text-align:left">' + val.master_value + '</div>';
                    html += '<div class="col-md-5" style="text-align:right">';
                    if (Object.keys(presc_selected_complaints).length > 0 || presc_selected_complaints == "") {
                        if (presc_selected_complaints[val.master_key] == "od") {
                            html += '<label><input type="radio" id="' + val.master_key + '" name="' + val.master_key + '" class="chk" checked onClick="' + onclickOdFunction + '" />Left</label> &nbsp;';
                        } else {
                            html += '<label><input type="radio" id="' + val.master_key + '" name="' + val.master_key + '" class="chk" onClick="' + onclickOdFunction + '" />Left</label> &nbsp;';
                        }
                        if (presc_selected_complaints[val.master_key] == "os") {
                            html += '<label><input type="radio" id="' + val.master_key + '" name="' + val.master_key + '" class="chk" checked onClick="' + onclickOsFunction + '"/>Right</label> &nbsp;';
                        } else {
                            html += '<label><input type="radio" id="' + val.master_key + '" name="' + val.master_key + '" class="chk" onClick="' + onclickOsFunction + '"/>Right</label> &nbsp;';
                        }
                        if (presc_selected_complaints[val.master_key] == "both") {
                            html += '<label><input type="radio" id="' + val.master_key + '" class="chk" name="' + val.master_key + '" checked onClick="' + onclickBothFunction + '"   />Both</label>';
                        } else {
                            html += '<label><input type="radio" id="' + val.master_key + '" class="chk" name="' + val.master_key + '" onClick="' + onclickBothFunction + '"   />Both</label>';
                        }
                    } else {
                        html += '<label><input type="radio" id="' + val.master_key + '" name="' + val.master_key + '" class="chk"  onClick="' + onclickOdFunction + '" />Left</label> &nbsp;';
                        html += '<label><input type="radio" id="' + val.master_key + '" name="' + val.master_key + '" class="chk" onClick="' + onclickOsFunction + '"/>Right</label> &nbsp;';
                        html += '<label><input type="radio" id="' + val.master_key + '" class="chk" name="' + val.master_key + '" onClick="' + onclickBothFunction + '"   />Both</label>';

                    }

                    html += '</div>';
                    html += '</div>';
                    html += '</li>';
                })
                html += '</ul>'
                $('.presc_complaint_data').empty().html(html);
            }
        })

    }



$(document).on('change', '#med_template', function() {

    var template_id = $(this).val();
    $('#tableID').html('');
    $.ajax({
        type: 'POST',
        url: base_url + 'admin/patient/get_template',
        data: {
            'template_id': template_id
        },

        success: function(res) {

            $('#tableID').html(res);
            $('#tableID').find('.select2').select2();

        },

    });
});



$(document).on('change', '.complaintstype', function() {
$this = $(this);
var complaints_id = $(this).val();
var row_id_val = $(this).data('rowid');
$("#complaints_description_"+row_id_val).select2('val', '');
var options = "<option value=''><?php echo $this->lang->line('select'); ?> </option>";
$("#complaints_description_"+row_id_val).html(options);
$.ajax({
    type: 'POST',
    url: base_url + 'admin/patient/allcomplaintsbycategory',
    data: {
        'complaints_id': complaints_id
    },
    dataType: 'JSON',

    beforeSend: function() {
        // setting a timeout
        $("#complaints_description_"+row_id_val).html('');
    },
    success: function(data) {
        $.each(data, function(key,val) {
            options += "<option value='"+val.name+", "+val.description+"'>"+val.name+", "+val.description+"</option>";
        });
        $("#complaints_description_"+row_id_val).append(options);
    },
    error: function(xhr) { // if error occured
        alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");

    },
    complete: function() {

    }

});
});


$(document).on('change', '.findingtype', function() {

$this = $(this);
var finding_id = $(this).val();
var row_id_val = $(this).data('rowid');
$("#finding_description_"+row_id_val).select2('val', '');
var options = "<option value=''><?php echo $this->lang->line('select'); ?> </option>";
$("#finding_description_"+row_id_val).html(options);
$.ajax({
    type: 'POST',
    url: base_url + 'admin/patient/allfindingbycategory',
    data: {
        'finding_id': finding_id
    },
    dataType: 'JSON',

    beforeSend: function() {
        // setting a timeout
        $("#finding_description_"+row_id_val).html('');
    },
    success: function(data) {
        $.each(data, function(key,val) {
            options += "<option value='"+val.name+", "+val.description+"'>"+val.name+", "+val.description+"</option>";
        });
        $("#finding_description_"+row_id_val).append(options);

    },
    error: function(xhr) { // if error occured
        alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");

    },
    complete: function() {

    }

});
});


function view_prescription(visitid) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/prescription/getPrescription/' + visitid,
            success: function(res) {
                $("#getdetails_prescription").html(res);

            },
            error: function() {
                alert("<?php echo $this->lang->line('fail'); ?>")
            }
        });
        holdModal('prescriptionview');
    }


    function holdModal(modalId) {
        $('#' + modalId).modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    }


$(document).on('click', '.filterinput', function() {

    if (!$(this).closest('.wrapper-dropdown-3').hasClass("active")) {
        $(".wrapper-dropdown-3").not($(this)).removeClass('active');
        $(this).closest("div.wrapper-dropdown-3").addClass('active');
    }
});


$(document).on('keyup', '.filterinput', function() {

var valThis = $(this).val().toLowerCase();
var closer_section = $(this).closest('div').find('.section_ul > li');

var noresult = 0;
if (valThis == "") {
    closer_section.show();
    noresult = 1;
    $('.no-results-found').remove();
} else {
    closer_section.each(function() {
        var text = $(this).text().toLowerCase();
        var match = text.indexOf(valThis);
        if (match >= 0) {
            $(this).show();
            noresult = 1;
            $('.no-results-found').remove();
        } else {
            $(this).hide();
        }
    });
};
if (noresult == 0) {
    closer_section.append('<li class="no-results-found">No results found.</li>');
}
});


$(document).mouseup(function(e) {
        var container = $(".wrapper-dropdown-3"); // YOUR CONTAINER SELECTOR
        if (!container.is(e.target) // if the target of the click isn't the container...
            &&
            container.has(e.target).length === 0) // ... nor a descendant of the container
        {
            $("div.wrapper-dropdown-3").removeClass('active');
        }
    });


    $(document).ready(function(e) {
        $("form#form_prescription button[type=submit]").click(function() {
            $("button[type=submit]", $(this).parents("form")).removeAttr("clicked");
            $(this).attr("clicked", "true");
        });

        $("#form_prescription").on('submit', (function(e) {


            var sub_btn_clicked = $("button[type=submit][clicked=true]");
            var sub_btn_clicked_name = sub_btn_clicked.attr('name');
            e.preventDefault();
            //console.log(presc_selected_complaints);
            //return false;
            var formdata = new FormData(this);
            formdata.append('odcomplaints', JSON.stringify(presc_od_complaints));
            formdata.append('oscomplaints', JSON.stringify(presc_os_complaints));
            var selected_complaints = JSON.stringify(presc_selected_complaints)
            formdata.append('selected_complaints', selected_complaints);
            $.ajax({
                url: '<?php echo base_url(); ?>admin/patient/add_opd_prescription',
                type: "POST",
                data: formdata,
                dataType: 'json',
                contentType: false,
                //cache: false,
                processData: false,
                beforeSend: function() {
                    sub_btn_clicked.button('loading');
                },
                success: function(data) {
                    if (data.status == "0") {
                        var message = "";
                        $.each(data.error, function(index, value) {
                            message += value;
                        });
                        errorMsg(message);
                    } else {
                        successMsg(data.message);
                        if (sub_btn_clicked_name === "save_print") {
                            printprescription(data.visitid, true);
                        }
                        $('#add_prescription').modal('hide');
                        $('.ajaxlist').DataTable().ajax.reload();
                    }
                    sub_btn_clicked.button('reset');
                },
                error: function(xhr) { // if error occured
                    alert("Error occured.please try again");
                    sub_btn_clicked.button('reset');
                },
                complete: function() {
                    sub_btn_clicked.button('reset');
                }
            });
        }));
    });
 

    $(document).on('click', '.addPrescNewHistory', function(e) {
            e.preventDefault();
            var strR = randomStr();
            var html = '<div class="row ' + strR + '">';
            html += '<div class="col-md-3"><div class="form-group"><label for=" ">Tx/Sx</label><div><select name="disease[]" id="disease" class="form-control select2 disease" style="width:100%"><option value=""><?php echo $this->lang->line('select'); ?></option><?php foreach ($disease_data as $dkey => $dvalue) { ?><option value="<?php echo $dvalue->master_key; ?>"><?php echo $dvalue->master_value; ?></option><?php } ?></select></div></div></div>';
            html += '<div class="col-md-3"><div class="row"><div class="col-md-6"><div class="form-group"><label for="">Duration</label><input type="text" class="form-control" name="duration[]" id="duration" class="duration" /></div></div><div class="col-md-6"><div class="form-group"><label for="">Period</label><select name="period[]" id="period" class="form-control select2 period" style="width:100%"><option value="Days">Days</option><option value="Months">Months</option>';
            html += '<option value="Years">Years<option></select></div></div></div></div>';
            html += '<div class="col-md-3"><div class="form-group"><label for=" ">Medication</label><div><input type="text" class="form-control" name="medication[]" class="medication" id="medication" /></div></div></div>';
            html += '<div class="col-md-2"><div class="form-group"><label for=" ">Condition</label><div><input type="text" name="condition[]" id="condition" class="form-control select2 condition" style="width:100%"></div></div></div>';
            var deleteH = "deleteHistory('" + strR + "')";
            html += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteH + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
            html += '</div>';
            $('.presc_history_container').append(html);
        });
        
 
</script> 

<script type="text/javascript">
    function getDosages(medicine_category_id) {
        var dosage_opt = "<option value=''><?php echo $this->lang->line('select') ?></option>";
        var sss = '<?php echo json_encode($category_dosage); ?>';
        var aaa = JSON.parse(sss);

        if (aaa[medicine_category_id]) {
            $.each(aaa[medicine_category_id], function(key, item) {
                dosage_opt += "<option value='" + item.id + "'>" + item.dosage + "" + item.unit + "</option>";
            });

        }
        return dosage_opt;
    }


    function getMedicine(med_cat_obj, val, medicine_id) {

        var medicine_colomn = med_cat_obj.closest('tr').find('.medicine_name');
        medicine_colomn.html("");
        $.ajax({
            url: '<?php echo base_url(); ?>admin/pharmacy/get_medicine_name',
            type: "POST",
            data: {
                medicine_category_id: val
            },
            dataType: 'json',
            beforeSend: function() {
                medicine_colomn.html("<option value=''><?php echo $this->lang->line('select') ?></option>");

            },
            success: function(res) {
                var div_data = "<option value=''><?php echo $this->lang->line('select') ?></option>";
                $.each(res, function(i, obj) {
                    var sel = "";
                    if (medicine_id == obj.id) {
                        sel = "selected";
                    }
                    div_data += "<option value=" + obj.id + " " + sel + ">" + obj.medicine_name + "</option>";

                });

                medicine_colomn.html(div_data);
                medicine_colomn.select2("val", medicine_id);

            }
        });
}



function getPrescriptionComplaintAndHistoryData(id) {
        $.ajax({
             url: baseurl + "admin/prescription/getPrescriptionComplaintData",
            type: 'POST',
            data: {
                'id': id
            },
            dataType: 'json',
            success: function(res) {
                var result = res.data;
                var complaintdata = JSON.parse(res.data.complaints);
                // presc_os_complaints = JSON.parse(complaintdata.os)
                // presc_od_complaints = JSON.parse(complaintdata.od)
                presc_selected_complaints = JSON.parse(complaintdata.selected_complaints)
                if (Object.keys(presc_selected_complaints).length > 0) {
                    var od_div = "";
                    $.each(JSON.parse(complaintdata.od), function(key, val) {
                        od_div += '<li class="list-group-item ' + key + '_list">' + val + '</li>';
                    })
                    $('.presc_od_complaints ul').empty().html(od_div);
                    var os_div = "";
                    $.each(JSON.parse(complaintdata.os), function(key, val) {
                        os_div += '<li class="list-group-item ' + key + '_list">' + val + '</li>';
                    })
                    $('.presc_os_complaints ul').empty().html(os_div);
                }
                var html = "";
                $.each(JSON.parse(result.history), function(key, value) {
                    if (key == 0) {
                        html += '<div class="row">';
                    } else {
                        html += '<div class="row row_' + key + '">';
                    }
                    html += '<div class="col-md-3"><div class="form-group"><label for=" ">Disease</label><div><select name="disease[]" id="disease" class="form-control select2 disease" style="width:100%"><option value=""><?php echo $this->lang->line('select'); ?></option>';
                    <?php foreach ($disease_data as $dkey => $dvalue) { ?>
                        if (value.disease == "<?php echo $dvalue->master_key; ?>") {
                            html += '<option selected value="<?php echo $dvalue->master_key; ?>"><?php echo $dvalue->master_value; ?></option>';
                        } else {
                            html += '<option  value="<?php echo $dvalue->master_key; ?>"><?php echo $dvalue->master_value; ?></option>';
                        }
                    <?php } ?>
                    html += '</select></div></div></div>';
                    html += '<div class="col-md-3"><div class="row"><div class="col-md-6"><div class="form-group"><label for="">Duration</label><input type="text" class="form-control" name="duration[]" id="duration" class="duration" value="' + value.duration + '" /></div></div><div class="col-md-6"><div class="form-group"><label for="">Period</label><select name="period[]" id="period" class="form-control select2 period" style="width:100%">';
                    if (value.period == "Days") {
                        html += '<option selected value="Days">Days</option>';
                    } else {
                        html += '<option value="Days">Days</option>';
                    }
                    if (value.period == "Months") {
                        html += '<option selected value="Months">Months</option>';
                    } else {
                        html += '<option value="Months">Months</option>';
                    }
                    if (value.period == "Years") {
                        html += '<option selected value="Years"></option>';
                    } else {
                        html += '<option value="Years"></option>';
                    }
                    html += '</select></div></div></div></div>';
                    html += '<div class="col-md-3"><div class="form-group"><label for=" ">Medication</label><div><input type="text" class="form-control" name="medication[]" class="medication" id="medication" value="' + value.medication + '" /></div></div></div>';
                    if (key == 0) {
                        html += '<div class="col-md-3"><div class="form-group"><label for=" ">Condition</label><div><input type="text" name="condition[]" id="condition" class="form-control select2 condition" value="' + value.condition + '" style="width:100%"></div></div></div>';
                    } else {
                        html += '<div class="col-md-2"><div class="form-group"><label for=" ">Condition</label><div><input type="text" name="condition[]" id="condition" class="form-control select2 condition" value="' + value.condition + '" style="width:100%"></div></div></div>';
                        var deleteRow = "deleteHistory('row_" + key + "')";
                        html += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteRow + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
                    }
                    html += '</div>';
                })
                $('.presc_history_container').html(html);


                
            }
        })

    }
</script>

<?php $this->load->view('admin/optometry/optometryProfile'); ?>
<?php $this->load->view('admin/audiometry/audiometryProfile'); ?>
<?php $this->load->view('admin/master/addMasterModal'); ?>
<?php $this->load->view('admin/master/loadMasterDataJs'); ?>