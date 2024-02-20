<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();

?>
<style type="text/css">
</style>

<script src="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row"> 
            <div class="col-md-12">
                <div class="box box-primary"> 
                <form role="form" action="<?php echo base_url() ?>admin/optometry/counsellingindexfilter" method="post" class="">
                        <div class="box-body row">
                            <?php echo $this->customlib->getCSRF(); ?>          
                            <div class="col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label><?php echo 'Time Duration'; ?></label>                                        
                                        <input type="text" autocomplete="off" name="date" class="form-control  date"  value="<?php  echo set_value('date') ?>">
                                    </div><span class="text-danger"><?php echo form_error('date'); ?></span>                            
                            </div> 
                            <div class="col-sm-3 col-md-3">
                                <div class="form-group">  
                                    <label><?php echo 'Patient Status'; ?></label>
                                   <select name="status" id="status" class="form-control" >
                                                    <option>Select</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Completed">Completed</option>
                                                    <option value="Not Intrested">Not Intrested</option>
                                                    
                                                </select>
                                    <span class="text-danger"><?php echo form_error('status'); ?></span>
                                </div>  
                            </div>
                             <div class="col-sm-3 col-md-3">
                                <div class="form-group">  
                                    <label><?php echo 'Insurer'; ?></label>
                                    <select class="form-control" id="insurer" name='insurer' >
                                                            <option value="0"><?php echo $this->lang->line('select'); ?></option>
                                                            <?php foreach ($organisation as $orgkey => $orgvalue) {
                                                                ?>
                                                                <option value="<?php echo $orgvalue["organisation_name"]; ?>"><?php echo $orgvalue["organisation_name"] ?></option>   
                                                            <?php } ?>
                                                        </select>
                                                        
                                    <span class="text-danger"><?php echo form_error('status'); ?></span>
                                </div>  
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                </div>
                            </div>
                        </div>     
                    </form>
                    
                    <div class="box-header with-border">
                         <h4>Counselling</h4>
                       
                         
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
                                    <th><?php echo $this->lang->line('case_id') ?></th>
                                    <th>Surgery</th>
                                    <th><?php echo $this->lang->line('phone'); ?></th>
                                    <th><?php echo $this->lang->line('consultant'); ?></th>
                                    <th><?php echo "Date"; ?></th>
                                    <!--<th><?php echo $this->lang->line('last_visit'); ?></th>   -->
                                     <th>Status</th> 
                                     <th>Follow UP Date</th> 
                                    <th class="text-right noExport"><?php echo $this->lang->line('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody style="text-align:left !important;">
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


<!-- COUNSELLING-->
<!-- Surgeries Add-->

<div class="modal fade modaled" id="add_surgeries" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header modal_head">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title tit" id="optometry_title"><?php echo $this->lang->line('surgeries'); ?></h4>
            </div>
            <form id="form_surgeries" accept-charset="utf-8" enctype="multipart/form-data" method="post">
                <div class="">
                    <div class="modal-body  pb0 ">
                        <?php //var_dump($patient_data);die;
                        
                        
                        ?>
                        <div class="row">
                            <div class="col-md-3"><b>Patient Name:</b> <span id="patient_name"><?php echo $patient_data->patient_name; ?></span></div>
                            <div class="col-md-3"><b>Age:</b> <span id="age"><?php echo $patient_data->age; ?></span></div>
                            <div class="col-md-3"><b>Gender:</b> <span id="gender"><?php echo $patient_data->gender; ?></span></div>
                            
                             <div class="col-md-3"><b>Surgery:</b> <span id="surgery_name"><?php echo $opdcoun_data->surgery_recommendations; ?></span></div>
                            <div class="col-md-3"><b>Case Id:</b> <span id="case_id"><?php echo $visit_data->case_reference_id; ?></span></div>
                            <div class="col-md-3"><b>Consultant Doctor:</b> <span id="doctor_id"><?php echo $visit_all->name; ?></span></div>
                            <div class="col-md-3"><b>Gender:</b> <span id="gender"><?php echo $patient_data->gender; ?></span></div>
                            
                            <div class="col-md-6">
                                 <input type="hidden" name="case_reference_id" id="case_id" value="<?php echo $case_reference_id; ?>">
                                 
                               
                                <input type="hidden" name="surgery_id" id="optometry_id" value="">
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="opd_id" id="opd_id" value="">
                                <input type="hidden" name="visit_id" id="visit_id" value="">
                                    <input type="hidden" name="patient_id" id="patient_id" value="">
                            </div>
                        </div>
                         
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Surgeon Name <small class="req"> *</small></label>
                                            <div>
                                                
                                          <select class="form-control select2"  name='surgeon_name' id="surgeon_name" style="width:100%" >
                                                <option value="<?php echo set_value('doctor'); ?>"><?php echo $this->lang->line('select') ?></option>
                                                <?php foreach ($doctors as $dkey => $dvalue) {
                                            ?>
                                                <option value="<?php echo $dvalue["name"]; ?>"><?php echo $dvalue["name"] . " " . $dvalue["surname"] ." (". $dvalue["employee_id"].")" ?></option>
                                            <?php }?>
                                          </select>
                                      </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Anesthetist Name</label>
                                            <div>
                                                      
                                          <select class="form-control select2"  name='anesthetist_name' id="anesthetist_name" style="width:100%" >
                                                <option value="<?php echo set_value('doctor'); ?>"><?php echo $this->lang->line('select') ?></option>
                                                <?php foreach ($doctors as $dkey => $dvalue) {
                                            ?>
                                                <option value="<?php echo $dvalue["name"]; ?>"><?php echo $dvalue["name"] . " " . $dvalue["surname"] ." (". $dvalue["employee_id"].")" ?></option>
                                            <?php }?>
                                          </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End row-->
                                <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Operated Eye</label>
                                            <div>
                                                 <select name="operated_eye" id="operated_eye" class="form-control" >
                                                    <option>Select</option>
                                                    <option value="OD">OD</option>
                                                    <option value="OS">OS</option>
                                                    <option value="Both">Both</option>
                                                    <option value="General">General</option>
                                                    
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Surgery Date <small class="req"> *</small></label>
                                            <div>
                                                <input type="date" name="surgery_date" id="surgery_date" class="form-control" placeholder="Surgery Date">
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div><!--End row-->
                                <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Reporting Date <small class="req"> *</small></label>
                                            <div>
                                                <input type="date" name="reporting_date" id="reporting_date" class="form-control" placeholder="Reporting Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Booked By</label>
                                            <div>
                                                 <select class="form-control select2"  name='booked_by' id="booked_by" style="width:100%" >
                                                <option value="<?php echo set_value('doctor'); ?>"><?php echo $this->lang->line('select') ?></option>
                                                <?php foreach ($alldoctors as $dkey => $dvalue) {
                                            ?>
                                                <option value="<?php echo $dvalue["name"]; ?>"><?php echo $dvalue["name"] . " " . $dvalue["surname"] ." (". $dvalue["employee_id"].")" ?></option>
                                            <?php }?>
                                          </select>
                                          
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End row-->
                                 <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Rate</label>
                                            <div>
                                                <input type="text" name="rate" id="rate" class="form-control" placeholder="Rate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Package</label>
                                            <div>
                                                <input type="text" name="package" id="package" class="form-control" placeholder="Package">
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Bed Type</label>
                                            <div>
                                                <input type="text" name="bed_type" id="bed_type" class="form-control" placeholder="Bed Type">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Amount</label>
                                            <div>
                                                <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount">
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End row-->
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Insurer</label>
                                            <div>
                                                <select class="form-control" id="insurer" name='insurer' >
                                                            <option value="0"><?php echo $this->lang->line('select'); ?></option>
                                                            <?php foreach ($organisation as $orgkey => $orgvalue) {
                                                                ?>
                                                                <option value="<?php echo $orgvalue["organisation_name"]; ?>"><?php echo $orgvalue["organisation_name"] ?></option>   
                                                            <?php } ?>
                                                        </select>
                                                        
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End row-->
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Patient Notes</label>
                                            <div>
                                                <input type="text" name="patient_notes" id="patient_notes" class="form-control" placeholder="Patient Notes">
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Counsellor Remarks</label>
                                            <div>
                                                <input type="text" name="counsellor_remarks" id="counsellor_remarks" class="form-control" placeholder="Counsellor Remarks">
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End row-->
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">FollwUp Date</label>
                                            <div>
                                                <input type="date" name="followup_date" id="followup_date" class="form-control" placeholder="FollwUp Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <div>
                                                <select name="status" id="status" class="form-control" >
                                                    <option>Select</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Completed">Completed</option>
                                                    <option value="Not Intrested">Not Intrested</option>
                                                    
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End row-->

                            </div>
                        </div>
                       
               
        </div>
        <!--./modal-body-->
    </div>
    <div class="modal-footer">
        <div class="pull-right">

            <button type="submit" name="save" value="save" data-loading-text="<?php echo $this->lang->line('processing'); ?>" class="btn btn-info"><i class="fa fa-check-circle"></i>
                <?php echo $this->lang->line('save'); ?>
            </button>
        </div>
    </div>
    </form>
</div>
</div>
</div>
<!-- Surgeries Add-->

<!-- view surgery-->

<div class="modal fade" id="view_surgery" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="optometry_title">View Surgery Data</h4>
            </div>

            <div class="modal-body pt0 pb0">
                <input type="hidden" id="surgeryId" value="" />
                <div class="view_surgery">


                </div>




            </div>

        </div>
    </div>
</div>


<script src="https://www.jqueryscript.net/demo/Minimal-Stopwatch-Timer-Plugin-For-jQuery/dist/timer.jquery.min.js"></script>
<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';
( function ( $ ) {
    'use strict';
    $(document).ready(function () {
        initDatatable('ajaxlist','admin/optometry/counsellinggetOptometryPatientsDataTable',[],[],100);
        
    });
} ( jQuery ) )
</script>
<script type="text/javascript">
 $(document).ready(function (e) {
        $("#form_surgeries").on('submit', (function (e) {
        let clicked_submit_btn= $(this).closest('form').find(':submit');
        alert('abc');
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/optometry/addsurgery',
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                 beforeSend: function() {
                 clicked_submit_btn.button('loading') ; 

                },
                success: function (data) {
                    if (data.status == "fail") {
                        var message = "";
                        $.each(data.error, function (index, value) {
                            message += value;
                        });
                        errorMsg(message);
                    } else {
                        successMsg(data.message);
                        
                        $("#add_surgeries").modal('toggle');
                       
                    }
                        clicked_submit_btn.button('reset'); 
                },
                 error: function(xhr) { // if error occured
        alert('<?php echo $this->lang->line("error_occurred_please_try_again"); ?>');

         clicked_submit_btn.button('reset') ; 
             },
    complete: function() {
     clicked_submit_btn.button('reset') ; 
    }
            });
        }));
    });
 (function()
 {
   var timer_list=[]; 
  $(document).on('click','.time_btn',function(){
    var id=$(this).data('id');
    
    countDownTimer(id)
    $(this).hide();
    if(localStorage.getItem("opid_arr"))
    {
      var arr_str=localStorage.getItem("opid_arr");
     
      var arr=JSON.parse(arr_str)
    
      if(jQuery.inArray(id, arr) != -1){

      }
      else{
        arr.push(id)
      }
     
      localStorage.setItem("opid_arr",JSON.stringify(arr))
    }
    else
    {
        var arr=[id];
        localStorage.setItem("opid_arr",JSON.stringify(arr))
    }
  });
  
  
})();
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

  
</script>

<script>
function SetPatientDetail(patient_id){

     $.ajax({
            url: '<?php echo base_url(); ?>admin/optometry/GetPatientDetailcounselling',
            type: "POST",
            async: false,
            data: {
                patient_id: patient_id
            },
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $("#patient_name").val(res.patient_name);
                $("#age").val(res.age);
                $("#gender").val(res.gender);
                 $("#patients_id").val(res.id);
            }
        });
}

function SetoptoDetail(patient_id){

     $.ajax({
            url: '<?php echo base_url(); ?>admin/optometry/GetOptocounselling',
            type: "POST",
            async: false,
            data: {
                patient_id: patient_id
            },
            dataType: 'json',
            success: function(res) {
                $("#surgery_name").text(res.surgery_recommendations);
            }
        });
}

function visitDetail(opd){

     $.ajax({
            url: '<?php echo base_url(); ?>admin/optometry/GetvisitDetail',
            type: "POST",
            async: false,
            data: {
                opd: opd
            },
            dataType: 'json',
            success: function(res) {
                $("#case_id").text(res.case_reference_id);
                $("#cases_id").val(res.case_reference_id);
            }
        });
}

function visitall(opd){

     $.ajax({
            url: '<?php echo base_url(); ?>admin/optometry/Getvisitall',
            type: "POST",
            async: false,
            data: {
                opd: opd
            },
            dataType: 'json',
            success: function(res) {
                $("#doctor_id").text(res.name);
            }
        });
}

 function getRecord_counselling(opd,visit_id,patient_id) {
//   alert(patient_id);
        // if(patient_id!=''){
            $('#patient_id').val(patient_id);
        // }
        $('#opd_id').val(opd);
        $('#visit_id').val(visit_id);
        $('#opd_no').val("OPDN" + opd);
        $('#add_surgeries').modal('show');
        resetForm('form_surgeries');
        SetPatientDetail(patient_id);
        SetoptoDetail(patient_id);
        visitDetail(opd);
        visitall(opd)
    }
    
     function resetForm(id) {
        $("#" + id).trigger("reset");
        $('#' + id + " .select2").val('').trigger('change');

    }


    $(document).on('click', '.viewsurgeryData', function(e) {
            //e.preventDefault();
            var opd = $(this).data('opd');
            var id = $(this).data('surgery_id');
            var visitid = $(this).data('visitid');
            // alert(id);
            getSurgeryData(id,visitid);

    })
    
    
function getSurgeryData(surgeryId,visitid="") {

$.ajax({
    url: "<?php echo base_url(); ?>admin/optometry/getSurgeryData/" + surgeryId,
    type: 'POST',
    data: {},
    dataType: 'json',
    success: function(data) {
        var sresult = data.data;
        $('#view_surgery').modal('toggle');
        $('#surgeryId').val(surgeryId);
        $('.view_surgery').empty();
        var patient_data = sresult.patient_data;
         var opd_data = sresult.opd_data;
           var visit_all = sresult.visit_all;
        var html = "";
         html += '<div class="row"><div class="col-lg-2"><b>Patient Name:</b></div><div class="col-lg-1">'+patient_data.patient_name+'</div><div class="col-lg-1"><b>Age </b></div><div class="col-lg-1">'+patient_data.age+'</div><div class="col-lg-1"><b>Gender </b></div><div class="col-lg-1">'+patient_data.gender+'</div><div class="col-lg-1"><b>Surgery </b></div><div class="col-lg-2">'+opd_data.	surgery_recommendations+'</div><div style="float:right"><button class="btn btn-primary print_surgeries" data-id="' + sresult.id + '" data-visitid="' + visitid + '">Print</button></div></div></br></br>';
       
        html += '<div class="panel-body">';
         
        html += '<div class="row"><div class="col-lg-2"><b>Surgeon Name</b></div><div class="col-lg-4">'+sresult.surgeon_name+'</div><div class="col-lg-2"><b>Anesthetist Name</b></div><div class="col-lg-4">'+sresult.anesthetist_name+'</div></div>';
         html += '<div class="row"><div class="col-lg-2"><b>Operated Eye</b></div><div class="col-lg-4">'+sresult.operated_eye+'</div><div class="col-lg-2"><b>Surgery Date</b></div><div class="col-lg-4">'+sresult.surgery_date+'</div></div>';

  html += '<div class="row"><div class="col-lg-2"><b>Reporting Date</b></div><div class="col-lg-4">'+sresult.reporting_date+'</div><div class="col-lg-2"><b>Booked By</b></div><div class="col-lg-4">'+sresult.booked_by+'</div></div>';

  html += '<div class="row"><div class="col-lg-2"><b>Rate</b></div><div class="col-lg-4">'+sresult.rate+'</div><div class="col-lg-2"><b>Package</b></div><div class="col-lg-4">'+sresult.package+'</div></div>';

  html += '<div class="row"><div class="col-lg-2"><b>Bed Type</b></div><div class="col-lg-4">'+sresult.bed_type+'</div><div class="col-lg-2"><b>Amount</b></div><div class="col-lg-4">'+sresult.amount+'</div></div>';

  html += '<div class="row"><div class="col-lg-2"><b>Insurer</b></div><div class="col-lg-4">'+sresult.insurer+'</div><div class="col-lg-2"><b>Patient Notes</b></div><div class="col-lg-4">'+sresult.patient_notes+'</div></div>';

  html += '<div class="row"><div class="col-lg-2"><b>Counsellor Remarks</b></div><div class="col-lg-4">'+sresult.counsellor_remarks+'</div><div class="col-lg-2"><b>FollwUp Date</b></div><div class="col-lg-4">'+sresult.followup_date+'</div></div>';

  html += '<div class="row"><div class="col-lg-2"><b>Status</b></div><div class="col-lg-4">'+sresult.status+'</div></div>';
  
        html += '</div>';

        html += '<br>';
        $('.view_surgery').html(html);

    }
})

}


    $(document).on('click', '.print_surgeries', function() {

            var opd_id = $(this).data('id');
            var visitid = $(this).data('visitid');
            // alert(visitid);
            var $this = $(this);

            $.ajax({
                url: '<?php echo base_url("admin/optometry/print_surgeries"); ?>',
                type: "POST",
                data: {
                    opd_id: opd_id, visitid : visitid
                },
                dataType: 'json',
                beforeSend: function() {
                    $this.button('loading');
                },
                success: function(data) {
                    popup(data.page);
                },

                error: function(xhr) { // if error occured
                    alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
                    $this.button('reset');

                },
                complete: function() {
                    $this.button('reset');

                }
            });
});
   
</script>

<?php $this->load->view('admin/optometry/optometryProfile'); ?>
<?php $this->load->view('admin/audiometry/audiometryProfile'); ?>
<?php $this->load->view('admin/master/addMasterModal'); ?>
<?php 
$this->load->view('admin/master/loadMasterDataJs');
?>