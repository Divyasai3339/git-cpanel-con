<style type="text/css">
    .img_cl{
        margin-left: -307px !important;
    }
     .view_optometry .panel-heading {
           font-size: 18px !important;
           font-weight: bolder !important;
           color: white !important;
           background: #829079 !important;
           font-family: auto;
       }
            .panel-body {
             background: #ede6b9 !important;
             
       }
   
       .complaint_data ul li.list-group-item {
           line-break: anywhere;
       }
   
       .complaint_data {
           max-height: 300px;
           overflow-y: scroll;
       }
   
       #form_optometry .list-group-item {
           padding: 5px 10px !important;
       }
   
       #form_optometry .panel-heading {
           background: #829079 !important;
           font-size: 16px;
       }

    #form_optometry .list_complaint_trash {
        position: absolute;
        right: 4%;
        color: red;
        display: none;
        z-index: 100;
        cursor: pointer;
    }

    #form_optometry .od_complaints .list-group-item {
        position: relative;
        z-index: 99
    }

    #form_optometry .od_complaints .list-group-item:hover .list_complaint_trash {
        display: block;
        top: 10%
    }

    #form_optometry .os_complaints .list-group-item {
        position: relative;
        z-index: 99
    }

    #form_optometry .os_complaints .list-group-item:hover .list_complaint_trash {
        display: block;
        top: 10%
    }
    .my_class{
        font-size: 17px;
    font-family: auto;
    color: white !important;
     padding-left: 5px !important;
    }
    .plus_icon{
        color: white !important;
    }
    .plus_icons{
        color: #829079 !important;
    }
    .auto_fill{
         font-size: 16px;
        color: white !important;
         padding-right: 5px !important;
    }
    #form_optometry .panel-heading {
        background: #829079 !important;
        font-size: 16px;
    }

    .modaled .panel-body {
          background: #ede6b9 !important;
    }
    .tit{
        font-size:24px !important;
    }
    .modal_head{
        background:#05386B !important;
    }
    .bdr{
        border:1px solid red !important;
    }

    /* #form_optometry .od_complaints{
  border: 1px solid #293faf;
  min-height: 200px;
}
#form_optometry .os_complaints{
  border: 1px solid #293faf;
  min-height: 200px;
} */

 .atf_selected_btn {
       background: #05386B !important;
       color: white !important;
   }
   .table .table-striped .table-bordered{
       color: #05386B !important;
       background: #D7CEC7 !important;
   }
   .atf_cancel_btn {
       background: #05386B !important;
       color: white !important;
   }
   .atf_save_btn {
       background-color: #05386B !important;
       color: white !important;
   }
   
   .borders th{
       border: 1px solid black !important;
       text-align: center !important;
   }
   .table-bordered> th{
       text-align:center !important;
   }
   .atf_value_container {
       width: 200px !important;
   }
   .atf_sph_p_title{
        width: 200px !important;
        text-align: center !important;
   }
   .table-bordered {
       /*border: 1px solid #ddd;*/
       text-align: center !important;
   }
   
   .table-bordered>tbody>tr>th{
       text-align: center !important;
   }
    .od_input{
        width: 200px !important;
   }
    .os_input{
        width: 200px !important;
   }
   .mdls{
      background-color: #c0d6df !important
   }
   .table-stripeds tr {
      background: #F3FFFF !important;
   }
</style>
<?php
$genderList = $this->customlib->getGender_Patient();
$marital_status = $this->config->item('marital_status');
?>
<div class="modal fade" id="myModalpa" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('add_patient'); ?></h4>
            </div>
            <form id="formaddpa" accept-charset="utf-8" action="" enctype="multipart/form-data" method="post"> 
                <div class="scroll-area" style="height:500px">
                    <div class="modal-body pt0 pb0">
                        <div class="ptt10">
                            <div class="row row-eq">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('name'); ?></label><small class="req"> *</small> 
                                                <input id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                                            </div>
                                        </div>
                                       

                                        <div class="col-md-6 col-sm-12">  
                                            <div class="row">  
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label> <?php echo $this->lang->line('gender'); ?></label>
                                                        <select class="form-control" name="gender" id="addformgender">
                                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                            <?php
                                                            foreach ($genderList as $key => $value) {
                                                                ?>
                                                                <option value="<?php echo $key; ?>" <?php if (set_value('gender') == $key) echo "selected"; ?>><?php echo $value; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="dob"><?php echo $this->lang->line('date_of_birth'); ?></label> 
                                                        <input type="text" name="dob" id="birth_date" placeholder=""  class="form-control date patient_dob" /><?php echo set_value('dob'); ?>
                                                    </div>
                                                </div>
  
                                                <div class="col-sm-5" id="calculate">
                                                    <div class="form-group">
                                                        <label><?php echo $this->lang->line('age');?> </label><small class="req"> *</small> 
                                                        <div style="clear: both;overflow: hidden;">
                                                            <input type="text" placeholder="<?php echo $this->lang->line('year'); ?>" name="age[year]" id="age_year" value="" class="form-control patient_age_year" style="width: 30%; float: left;">

                                                            <input type="text" id="age_month" placeholder="<?php echo $this->lang->line('month'); ?>" name="age[month]" value="" class="form-control patient_age_month" style="width: 36%;float: left; margin-left: 4px;">
                                                             <input type="text" id="age_day" placeholder="<?php echo $this->lang->line('day'); ?>" name="age[day]" value="" class="form-control patient_age_day" style="width: 26%;float: left; margin-left: 4px;">
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>  
                                        </div>  
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="pwd"><?php echo $this->lang->line('phone'); ?></label>
                                                <div style="clear: both;overflow: hidden;">
                                                <input id="number" autocomplete="off" name="mobileno"  type="text" placeholder="" class="form-control"  value="<?php echo set_value('mobileno'); ?>" />
                                                <span class="text-danger"><?php echo form_error('mobileno'); ?></span>
                                                        </div>
                                            </div>
                                        </div> 

                                        
                                        
                                        <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label><?php echo $this->lang->line('appointment_date'); ?></label>
                                                    <small class="req"> *</small>
                                                    <input id="admission_date" name="appointment_date" placeholder="" type="text" class="form-control datetime " />
                                                    <span class="text-danger"><?php echo form_error('appointment_date'); ?></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label><?php echo $this->lang->line('place'); ?></label>
                                                    <input id="place" name="place" placeholder="" type="text" class="form-control" />
                                                </div>
                                            </div>

                                            


                                    </div><!--./row--> 
                                </div><!--./col-md-8--> 
                            </div><!--./row--> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="pull-right">
                        <button type="submit" id="formaddpabtn" data-loading-text="<?php echo $this->lang->line('processing'); ?>" class="btn btn-info pull-right"><i class="fa fa-check-circle"></i> <?php echo $this->lang->line('save'); ?></button>
                    </div>
                </div>

            </form>                            

        </div>
    </div>    
</div>


<div class="modal fade" id="view_optometry" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="optometry_title">View Optometry Data</h4>
            </div>

            <div class="modal-body pt0 pb0">
                   
            <table width="100%" class="">
                        <tr>
                        <th width="20%"><?php echo $this->lang->line("patient_name"); ?></th>
                       <td class="fnt" id="view_patient_name"></td>
                        <th width="10%"><?php echo $this->lang->line("age"); ?></th>
                        <td class="fnt" id="view_age">
                            </td>
                            <th width="10%"><?php echo $this->lang->line("gender"); ?></th>
                       <td class="fnt" id="view_gender"></td>
                    </tr>
                    </table>
                <input type="hidden" id="optometryId" value="" />
                <div class="view_optometry">


                </div>




            </div>

        </div>
    </div>
</div>


<script type="text/javascript">
    
    $(document).ready(function (e) {
        // getComplaintData();
        $("#formaddpa").on('submit', (function (e) {
          let clicked_submit_btn= $(this).closest('form').find(':submit');
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/medicalcamp/addpatient',
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
                        location.reload();
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

    function addappointmentModal(patient_id = '', modalid) {
      
        var div_data = '';
        $.ajax({
            url: '<?php echo base_url(); ?>admin/Medicalcamp/getpatientDetails',
            type: "POST",
            data: {id:patient_id},
            dataType: 'json',
            success: function (data) {
                var option = new Option(data.patient_name+" ("+data.id+")", data.id, true, true);
                $(".patient_list_ajax").append(option).trigger('change');

                $("#" + modalid).modal('show');
                holdModal(modalid);
            }
        })
    }

</script>
<script>
function getRecord_emr(opd,patient_id='') {


if(patient_id!=''){
    $('#patient_id').val(patient_id);
}
$('#opd_id').val(opd);
$('#opd_no').val("OPDN" + opd);
$('#optometry_id').empty();
$('#add_optometry').modal('show');
resetForm('form_optometry');
$.ajax({
    url: baseurl + "admin/medicalcamp/get_medicalcamp_patient",
    type: 'POST',
    data: {
        'patient_id': patient_id},
    dataType: 'json',
    success: function(data) {
        $('#patient_idsend').val(data.data.id);
        $('#patient_nameget').html(data.data.patient_name);
        $('#ageget').html(data.data.age);
        $('#genderget').html(data.data.gender);
    }
})


}

</script>

<script type="text/javascript">
       $(".patient_dob").on('changeDate', function(event, date) {
          
           var birth_date = $(".patient_dob").val();
           
            $.ajax({
                url: '<?php echo base_url(); ?>admin/patient/getpatientage',
                type: "POST",
                dataType: "json",
                data: {birth_date:birth_date},
                success: function (data) {
                  $('.patient_age_year').val(data.year); 
                  $('.patient_age_month').val(data.month);
                  $('.patient_age_day').val(data.day);
                }
           });
});
</script> 
  <script>
    //   function getComplaintData() {
    //     $.ajax({
    //         url: baseurl + "admin/optometry/get_complaints_data",
    //         type: 'POST',
    //         data: {},
    //         dataType: 'json',
    //         success: function(data) {
    //             if (data.flag == 1) {
    //                 var html = '<option value="">Select Complaints</option>';
    //                 $.each(data.data, function(key, val) {
    //                     html += '<option value="' + val.master_key + '">' + val.master_value + '</option>';
    //                 })
    //                 $('.complaint_data').html(html);
    //             }
    //         }
    //     })
    // }
        </script>


<script>
    function getMedCampData(optomId) {

         $.ajax({
             url: baseurl + "admin/medicalcamp/getMedCampData/" + optomId,
             type: 'POST',
             data: {id:optomId},
             dataType: 'json',
             success: function(data) {
                 $('#view_optometry').modal('toggle');
                 $('#optometryId').val(optomId);
                 $('.view_optometry').empty();
                 var result = data.data;
                 console.log(result);
                 var pgp = result.pgp_data;
                 var lac = result.lac_data;
                 var gon = result.gon_data;
                 var ocu = result.ocu_data;
                 var vision = result.vision_data;
                 var dryretinoscopy = result.dryretinoscopy_data;
                 var cyclo = result.cyclo_data;
                 var acceptance = result.acceptance_data;
                 var antsegment = result.antsegment_data;
                 var nct = result.nct_data;
                 var at = result.at_data;
                 var cvt = result.cvt_data;
                 var lcva = result.lcva_data;
                 var ker = result.ker_data;
                 var sch = result.sch_data;
                 var eye = result.eye_data;
                 var sta = result.sta_data;
                 var gaz = result.gaz_data;
                 var eyes = result.eyes_data;
                 var postsegment = result.postsegment_data;
                 var optometric_comments = result.optometric_comments;
                 var orbit = result.orbit;
                 var diagnosis = result.diagnosis_data;
                 var history_data = result.history_data;
                 var print_data = result.print_data;
                  var complaints_data = result.complaints_data;
                  console.log(result.patient_name);
                //  var complaintdata = JSON.parse(result.complaints_data);
                 var html = "";
                 html += '<div  class="col-md-12"><div style="float:right"><button style="display:none" class="btn btn-primary editOptometry" data-id="' + result.id + '">Edit</button> &nbsp;<button class="btn btn-primary print_emr" data-id="' + result.id + '">Print</button></div></div><br><br>';
                 
 
                $('#view_patient_name').html(result.patient_name);
                $('#view_age').html(result.age);
                $('#view_gender').html(result.gender);
 
 
                //  html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Complaints</div><div style="float:right;padding-right:15px">Print <input type="checkbox" name="complaints_print" value="1" id="complaints_print" class="opto_print"';
                //  if(print_data != null && print_data.history_print==1){html += 'checked';}
                //  html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><thead><tr><th>complaints</th><th>Duration</th><th>Medication</th><th>Condition</th></tr></thead><tbody>';
                //  console.log("complaintdata ="+complaintdata);
                 
                //  $.each(complaintdata, function(key, val) {
                //      html += '<tr><td>' + val.complaints + '</td><td>' + val.complaints +'/'+ val.complaints + '</td><td>' + val.complaints + '</td><td>' + val.complaints + '</td></tr>';
                //  })
                //  html += '</tbody></table></div></div>'
                //  html += '<br>';
 
             
                  html += '</tbody></table></div><div class="panel panel-default"style="margin-bottom: 0px;"><div class="panel-heading"><div style="float:left;padding-left:15px">Chief Complaints</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="complaints_print" value="1" id="complaints_print" class="opto_print"';
                    if(print_data != null && print_data.complaints_print==1){html += 'checked';}
                    html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + complaints_data + '</td></tr></tbody></table></div></div>';
                    
                    
                 // Visions
                 html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Visions</div><div style="float:right;padding-right:15px">Print <input type="checkbox" value="1" name="vision_print" id="vision_print" class="opto_print"';
                 if(print_data != null && print_data.vision_print==1){html += 'checked';}
                 html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th colspan="3">Distance Vision</th><th colspan="2">Near Vision</th></tr><tr><td>&nbsp;</td><td>Presenting</td><td>Pinhole</td><td>Presenting</td></tr><tr><td>OD</td><td>' + vision.vision_od_presenting + '</td><td>' + vision.vision_od_pinhole + '</td><td colspan="2">' + vision.vision_od_near_presenting + '</td></tr><tr><td>OS</td><td>' + vision.vision_os_presenting + '</td><td>' + vision.vision_os_pinhole + '</td><td colspan="2">' + vision.vision_os_near_presenting + '</td></tr></tbody></table></div></div>';
 
     
 
                
 
                 // PGP
                 html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">PGP</div><div style="float:right;padding-right:15px">Print <input type="checkbox" name="pgp_print" value="1" id="pgp_print" class="opto_print"';
                 if(print_data != null && print_data.pgp_print==1){html += 'checked';}
                 html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th>PGP</th><th>SPH</th><th>Cyl</th><th>Axis</th><th>ADD</th><th>BCVA</th><th>BCNVA</th></tr><tr><th>OD</th><td>' + pgp.pgp_od_sph + '</td><td>' + pgp.pgp_od_cyl + '</td><td>' + pgp.pgp_od_axis + '</td><td>' + pgp.pgp_od_add + '</td><td>' + pgp.pgp_od_eom + '</td><td>' + pgp.pgp_od_tropia + '</td></tr><tr><th>OS</th><td>' + pgp.pgp_os_sph + '</td><td>' + pgp.pgp_os_cyl + '</td><td>' + pgp.pgp_os_axis + '</td><td>' + pgp.pgp_os_add + '</td><td>' + pgp.pgp_os_eom + '</td><td>' + pgp.pgp_os_tropia + '</td></tr></tbody></table><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + pgp.pgp_notes + '</td></tr></tbody></table></div></div>';
 
                 
                 // Acceptance
                 html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Acceptance</div><div style="float:right;padding-right:15px">Print <input type="checkbox" name="acceptance_print" value="1" id="acceptance_print" class="opto_print"';
                 if(print_data != null && print_data.acceptance_print==1){html += 'checked';}
                 html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th style="width:20%;">Acceptance</th><td>SPH</td><td>Cyl</td><td>Axis</td><td>ADD</td><td>BCVA</td><td>BCNVA</td></tr><tr><th>OD</th><td>' + acceptance.accp_od_sph + '</td><td>' + acceptance.accp_od_cyl + '</td><td>' + acceptance.accp_od_axis + '</td><td>' + acceptance.accp_od_add + '</td><td>' + acceptance.accp_od_va + '</td><td>' + acceptance.accp_od_bcnva + '</td></tr><tr><th>OS</th><td>' + acceptance.accp_os_sph + '</td><td>' + acceptance.accp_os_cyl + '</td><td>' + acceptance.accp_os_axis + '</td><td>' + acceptance.accp_os_add + '</td><td>' + acceptance.accp_os_va + '</td><td>' + acceptance.accp_os_bcnva + '</td></tr></tbody></table><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + acceptance.accp_notes + '</td></tr></tbody></table></div></div>';
 
                 html += '<div class="panel panel-default"><div class="panel-heading">Diagnosis<div style="float:right;padding-right:15px">Print <input type="checkbox"  name="diagnosis_print" value="1" id="diagnosis_print" class="opto_print"';
                if(print_data != null && print_data.diagnosis_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th>OD</th><td>'+diagnosis.diagnosis_od+'</td></tr><tr><th>OS</th><td>'+diagnosis.diagnosis_os+'</td></tr></tbody></table></div></div>';
                
                html += '<br>';
                $('.view_optometry').html(html);

 
             }
         })
 
     } </script>