<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?><style type="text/css">
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
<script src="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row"> 
            <div class="col-md-12">
                <div class="box box-primary"> 
                    <div class="box-header with-border">
                    <h4>Medical Camp</h4>
                        <!-- <?php if ($title == 'old_patient') { ?>
                            <h3 class="box-title titlefix"><?php echo $this->lang->line('opd_old_patient'); ?></h3>
                        <?php } else { ?>
                            <h3 class="box-title titlefix"><?php echo $this->lang->line('opd_patient'); ?></h3>

                        <?php } ?>   -->
                        <div class="box-tools addmeeting">
                            <?php if ($this->rbac->hasPrivilege('opd_patient', 'can_add')) { ?>                
                             
                                <a data-toggle="modal" id="add" onclick="holdModal('myModalpa')" class="btn btn-primary btn-sm addpatient"><i class="fa fa-plus"></i>  <?php echo $this->lang->line('add_patient'); ?></a> 
                            <?php } ?> 

                        </div>    
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
                                    <th><?php echo $this->lang->line('gender'); ?></th>
                                    <th><?php echo $this->lang->line('phone'); ?></th>
                                    <th>place</th>   
                                    <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-left">
                                </tbody>
                            </table>
                        </div>
                </div>  
            </div>
        </div> 
    </section>
</div>
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog pup100" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-9">
                        <div class="p-2 select2-full-width">
                            <select onchange="get_PatientDetails(this.value)" class="form-control patient_list_ajax" <?php
                                    if ($disable_option == true) {
                                        
                                }
                                    ?> name='' id="addpatient_id">
                            </select>
                            <span class="text-danger"><?php echo form_error('refference'); ?></span>
                        </div>    
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-1">        
                         
                      <?php if ($this->rbac->hasPrivilege('patient', 'can_add')) { ?>
                                <a data-toggle="modal" id="add" onclick="holdModal('myModalpa')" class="modalbtnpatient"><i class="fa fa-plus"></i>  <span><?php echo $this->lang->line('new_patient'); ?></span></a> 
                            <?php } ?>   
                    </div>          
                </div>
            </div>   
                               
            </div><!--./modal-header-->
        <form id="formadd" accept-charset="utf-8" action="<?php echo base_url() . "admin/patient" ?>" enctype="multipart/form-data" method="post">              
            <div class="pup-scroll-area">                    
                <div class="modal-body pt0 pb0">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            
                                <input name="patient_id" id="patient_id" type="hidden" class="form-control" />
                                <input name="email" id="pemail" type="hidden" class="form-control" />
                                <input name="mobileno" id="mobnumber" type="hidden" class="form-control" />
                                <input name="patient_name" id="patientname" type="hidden" class="form-control" />
                                <input name="password" id="password" type="hidden" class="form-control" />
                                
                                <div class="row row-eq">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <div id="ajax_load"></div>
                                        <div class="row ptt10" id="patientDetails" style="display:none">
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <ul class="singlelist">
                                                    <li class="singlelist24bold">
                                                        <span id="listname"></span></li>
                                                    <li>
                                                        <i class="fas fa-user-secret" data-toggle="tooltip" data-placement="top" title="<?php echo $this->lang->line('guardian'); ?>"></i>
                                                        <span id="guardian"></span>
                                                    </li>
                                                </ul>   
                                                <ul class="multilinelist">   
                                                    <li>
                                                        <i class="fas fa-venus-mars" data-toggle="tooltip" data-placement="top" title="<?php echo $this->lang->line('gender'); ?>"></i>
                                                        <span id="genders" ></span>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-tint" data-toggle="tooltip" data-placement="top" title="<?php echo $this->lang->line('blood_group'); ?>"></i>
                                                        <span id="blood_group"></span>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-ring" data-toggle="tooltip" data-placement="top" title="<?php echo $this->lang->line('marital_status'); ?>"></i>
                                                        <span id="marital_status"></span>
                                                    </li> 
                                                </ul>  
                                                <ul class="singlelist">  
                                                    <li>
                                                        <i class="fas fa-hourglass-half" data-toggle="tooltip" data-placement="top" title="<?php echo $this->lang->line('age'); ?>"></i>
                                                        <span id="age"></span>
                                                    </li>    

                                                    <li>
                                                        <i class="fa fa-phone-square" data-toggle="tooltip" data-placement="top" title="<?php echo $this->lang->line('phone'); ?>"></i> 
                                                        <span id="listnumber"></span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-envelope" data-toggle="tooltip" data-placement="top" title="<?php echo $this->lang->line('email'); ?>"></i>
                                                        <span id="email"></span>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-street-view" data-toggle="tooltip" data-placement="top" title="<?php echo $this->lang->line('address'); ?>"></i>
                                                        <span id="address" ></span>
                                                    </li>

                                                    <li>
                                                        <b><?php echo $this->lang->line('any_known_allergies') ?> </b> 
                                                        <span id="allergies" ></span>
                                                    </li>
                                                    <li>
                                                        <b><?php echo $this->lang->line('remarks') ?> </b> 
                                                        <span id="note"></span>
                                                    </li>  
                                                    <li>
                                                        <b><?php echo $this->lang->line("tpa_id"); ?> </b> 
                                                        <span id="insurance_id" ></span>
                                                    </li>
                                                    <li>
                                                        <b><?php echo $this->lang->line("tpa_validity"); ?> </b> 
                                                        <span id="validity"></span>
                                                    </li>
                                                    <li>
                                                        <b><?php echo $this->lang->line("national_identification_number"); ?> </b> 
                                                        <span id="identification_number"></span>
                                                    </li>   
                                                </ul>                               
                                            </div><!-- ./col-md-9 -->
                                            <div class="col-md-3 col-sm-3 col-xs-3"> 
                                                <div class="pull-right">  
                                                
                                                    <?php
                                                    $file = "uploads/patient_images/no_image.png";
                                                    ?>        
                                                    <img class="modal-profile-user-img img-responsive" src="<?php echo base_url() . $file.img_time() ?>" id="image" alt="User profile picture">
                                                </div>           
                                            </div><!-- ./col-md-3 --> 
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="dividerhr"></div>
                                            </div><!--./col-md-12-->
                                            <div class="col-sm-6 col-xs-4">
                                                <div class="form-group">
                                                <label><?php echo $this->lang->line('appointment_date'); ?></label>
                                                    <small class="req"> *</small>
                                                    <input id="admission_date" name="appointment_date" placeholder="" type="text" class="form-control datetime" />
                                                    <span class="text-danger"><?php echo form_error('appointment_date'); ?></span>
                                                </div>
                                            </div>
                                          

                                  
                                            
                                           
                                            
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <?php
                                                        echo display_custom_fields('opd');
                                                        ?>
                                                    </div>
                                                </div>        
                                            </div>       
                                        </div><!--./row--> 
                                    </div><!--./col-md-8--> 
                                   
                                </div><!--./row-->        
                        </div><!--./col-md-12-->       
                    </div><!--./row--> 
                </div>
            </div>  

                <div class="box-footer sticky-footer">
                    <div class="pull-right">
                    <button type="submit" id="formaddbtn" name="save" data-loading-text="<?php echo $this->lang->line('processing') ?>" class="btn btn-info pull-right"><i class="fa fa-check-circle" ></i> <span><?php echo $this->lang->line('save'); ?></span></button>
                    </div>
                    <div class="pull-right" style="margin-right: 10px; ">
                        <button type="submit"  data-loading-text="<?php echo $this->lang->line('processing') ?>" name="save_print" class="btn btn-info pull-right printsavebtn"><i class="fa fa-print" ></i> <?php echo $this->lang->line('save_print'); ?></button>
                    </div>
                </div>
            </form>                
        </div>
    </div>    
</div>

<div class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="box-title">  <?php echo $this->lang->line('patient_details'); ?></h4> 
            </div>

            <div class="modal-body pt0 pb0">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 paddlr">
                        <form id="formedit" accept-charset="utf-8"  enctype="multipart/form-data" method="post"  class="ptt10">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('name'); ?></label><small class="req"> *</small> 
                                        <input id="patient_name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                                        <input type="hidden" id="updateid" name="updateid">
                                        <input type="hidden" id="opdid" name="opdid">
                                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('guardian_name'); ?></label>
                                        <input type="text" id="guardian_name" name="guardian_name" value="<?php echo set_value('guardian_name'); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('gender'); ?></label><small class="req"> *</small> 
                                        <select class="form-control" id="gender" name="gender">
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($genderList as $key => $value) {
                                                ?>
                                                <option value="<?php echo $key; ?>" <?php if (set_value('gender') == $key) echo "selected"; ?>><?php echo $value; ?></option>
    <?php
}
?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="pwd"><?php echo $this->lang->line('marital_status'); ?></label>
                                        <select name="marital_status" id="marital_status" class="form-control">
                                            <option value=""><?php echo $this->lang->line('select') ?></option>
<?php foreach ($marital_status as $mkey => $mvalue) {
    ?>
                                                <option value="<?php echo $mkey ?>"><?php echo $mvalue ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">
<?php echo $this->lang->line('patient_photo'); ?></label>
                                        <div><input class="filestyle form-control" type='file' name='file' id="file" size='20' />
                                            <input type="hidden" name="patient_photo" id="patient_photo">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('file'); ?></span>
                                    </div>
                                </div>  
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('email'); ?></label>
                                        <input type="text" id="email" value="<?php echo set_value('email'); ?>" name="email" class="form-control">
                                    </div>
                                </div> 
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="pwd"><?php echo $this->lang->line('phone'); ?></label>
                                        <input id="contact" autocomplete="off" name="contact" placeholder="" type="text" class="form-control"  value="<?php echo set_value('contact'); ?>" />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label> <?php echo $this->lang->line('blood_group'); ?></label><small class="req"> *</small> 
                                        <select class="form-control" id="blood_group" name="blood_group">
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($bloodgroup as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value; ?>" <?php if (set_value('blood_group') == $key) echo "selected"; ?>><?php echo $value; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('blood_group'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('age'); ?></label>
                                        <div style="clear: both;overflow: hidden;">
                                            <input type="text" placeholder="Age" id="age" name="age" value="<?php echo set_value('age'); ?>" class="form-control" style="width: 40%; float: left;">
                                            <input type="text" placeholder="Month" id="month" name="month" value="<?php echo set_value('month'); ?>" class="form-control" style="width: 56%;float: left; margin-left: 5px;">

                                        </div>
                                    </div>
                                </div> 

                            </div><!--./row-->   
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>                    
                    </div><!--./col-md-12-->       
                </div><!--./row--> 
            </div>
            <div class="box-footer">
                <div class="pull-right paddA10">
                </div>
            </div>
            </form>   
        </div>
    </div>    
</div>




<script>   $(document).ready(function() {


$('#form_optometry').on('submit', function(e) {
    e.preventDefault();
    e.stopPropagation();
    var formdata = new FormData(this);
    // formdata.append('odcomplaints', JSON.stringify(od_complaints));
    // formdata.append('oscomplaints', JSON.stringify(os_complaints));
    // formdata.append('generalcomplaints', JSON.stringify(general_complaints));
    // formdata.append('selected_complaints', JSON.stringify(selected_complaints));
    $.ajax({
        url: baseurl + "admin/medicalcamp/addMedicalCampData",
        type: 'POST',
        data: formdata,
        dataType: 'json',
        cache: false,
        processData: false,
        contentType: false,
        success: function(data) {
            location.reload();
            // console.log(data);
            // var id = "<?php echo $this->uri->segment(4); ?>";
            // initDatatable('ajaxlistvisit', 'admin/patient/getopdvisitdatatable/' + id);
            // initDatatable('ajaxlist','admin/optometry/getOptometryPatientsDataTable',[],[],100);
            $('#add_optometry').modal('toggle');
            $("#form_optometry")[0].reset();
            if (data.flag == 1) {
                successMsg(data.msg);
            } else {
                errorMsg(data.msg);
            }
            
        }

    })

})


$(document).on('click', '.addnewhistory', function(e) {
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
    $('.history_container').append(html);
});


  $(document).on('click', '.editOptometry', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: baseurl + "admin/medicalcamp/getMedCampData/" + id,
        type: 'POST',
        data: {},
        contentType: "application/json; charset=utf-8",
        dataType: 'json',
        success: function(data) {
            resetForm('form_optometry');
            var result = data.data;
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
            var diagnosis = result.diagnosis_data;
            var history_data = result.history_data;
            console.log("history_data ="+history_data);
            var optometric_comments = result.optometric_comments;
            var complaints_data = result.complaints_data;
            var orbit = result.orbit;
            var data = [pgp,lac,gon,ocu, vision, dryretinoscopy, cyclo, acceptance, antsegment, nct, at, cvt, lcva,ker, sch, eye, sta, gaz, eyes, postsegment, diagnosis];
            // var complaintdata = JSON.parse(result.complaints_data);
            console.log("complaintdata ="+complaintdata);
            // os_complaints = JSON.parse(complaintdata.os)
            // od_complaints = JSON.parse(complaintdata.od)
            // general_complaints = JSON.parse(complaintdata.general)
            selected_complaints = complaintdata;
            console.log(selected_complaints);
            $('#view_optometry').modal('toggle');
            $('#add_optometry').modal('toggle');
            $('#patient_id').val(result.patient_id);
            $('#optometry_id').val(result.id);
            $('#opd_id').val(result.opd_id);
            // getComplaintData();
            
            var html = "";
            $.each(history_data, function(key, value) {
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
            $('.history_container').html(html);
            
            
            
            
            var html2 = "";
            var kshama = "kshama";
            $.each(complaintdata, function(key, value) {
                console.log("This is key = "+key);
                console.log(value);
                if (key == 0) {
                    html2 += '<div class="row">';
                } else {
                    html2 += '<div class="row row_' + key + '">';
                }
                html2 += '<div class="col-md-3"><div class="form-group"><label for=" ">Complaints</label><div><select name="complaints[]" id="complaints" class="form-control select2 complaint_data" style="width:100%"><option value=""><?php echo $this->lang->line('select'); ?></option>';
                html2 += '<option selected value="">+ value +</option>';
                    
               
                html2 += '</select></div></div></div>';
                html2 += '<div class="col-md-3"><div class="row"><div class="col-md-6"><div class="form-group"><label for="">Duration</label><input type="text" class="form-control" name="duration[]" id="duration" class="duration" value="' + value.duration + '" /></div></div><div class="col-md-6"><div class="form-group"><label for="">Period</label><select name="period[]" id="period" class="form-control select2 period" style="width:100%">';
                if (value.period == "Days") {
                    html2 += '<option selected value="Days">Days</option>';
                } else {
                    html2 += '<option value="Days">Days</option>';
                }
                if (value.period == "Months") {
                    html2 += '<option selected value="Months">Months</option>';
                } else {
                    html2 += '<option value="Months">Months</option>';
                }
                if (value.period == "Years") {
                    html2 += '<option selected value="Years"></option>';
                } else {
                    html2 += '<option value="Years"></option>';
                }
                html2 += '</select></div></div></div></div>';
                html2 += '<div class="col-md-3"><div class="form-group"><label for=" ">Medication</label><div><input type="text" class="form-control" name="medication[]" class="medication" id="medication" value="' + value.medication + '" /></div></div></div>';
                if (key == 0) {
                    html2 += '<div class="col-md-3"><div class="form-group"><label for=" ">Condition</label><div><input type="text" name="condition[]" id="condition" class="form-control select2 condition" value="' + value.condition + '" style="width:100%"></div></div></div>';
                } else {
                    html2 += '<div class="col-md-2"><div class="form-group"><label for=" ">Condition</label><div><input type="text" name="condition[]" id="condition" class="form-control select2 condition" value="' + value.condition + '" style="width:100%"></div></div></div>';
                    var deleteRow = "deleteHistory('row_" + key + "')";
                    html2 += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteRow + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
                }
                html2 += '</div>';
            })
            $('.complaints_container').html(html2);
            
            

            
            
           

        }
    })

})


// $(document).on("keyup", '#compalint_search', function(e) {
//     e.preventDefault();
//     var search = $('#compalint_search').val();
//     getComplaintData(search);
// })

// getComplaintData();
// getDiseaseData();
$(document).on('click', '.add_disease', function(e) {
    $('#add_disease').modal('toggle');
    resetForm('add_disease_form');
});
$(document).on('click', '.add_complaint', function(e) {
    $('#add_complaint').modal('toggle');
    resetForm('add_complaint_form');

});

$(document).on('submit', '#add_disease_form', function(e) {
    var disease = $('#disease_name').val();
    e.preventDefault();
    e.stopPropagation();
    if ($.trim(disease) == "") {
        errorMsg("Disease Name Field is Required");
        return false;
    }
    $.ajax({
        url: baseurl + "admin/optometry/add_master_data",
        type: 'POST',
        data: {
            'master_value': disease,
            'type': 'disease'
        },
        dataType: 'json',
        success: function(data) {
            if (data.flag == 1) {
                successMsg(data.msg);
                $('#add_disease').modal('toggle');
                location.reload();

            }
        }
    })
})


// $(document).on('submit', '#add_complaint_form', function(e) {
//     var complaint = $('#complaint_name').val();
//     e.preventDefault();
//     e.stopPropagation();
//     if ($.trim(complaint) == "") {
//         errorMsg("Complaint Name Field is Required");
//         return false;
//     }
//     $.ajax({
//         url: baseurl + "admin/optometry/add_master_data",
//         type: 'POST',
//         data: {
//             'master_value': complaint,
//             'type': 'complaint'
//         },
//         dataType: 'json',
//         success: function(data) {
//             if (data.flag == 1) {
//                 successMsg(data.msg);
//                 $('#add_complaint').modal('toggle');
//                 getComplaintData();
//             }
//         }
//     })

// })


$(document).on('click', '.btnUploadVisitImages', function(e) {
    e.preventDefault();
    var opd = $(this).data('opd');
    $('#visitfiles').attr('data-opd', opd);
    $('#UploadVisitFilesModal').modal('toggle');
    load(opd);
})


$("#visitfiles").change(function(e) {
    var opd = $(this).data('opd');
    var fd = new FormData();
    var fileInput = document.getElementById('visitfiles');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.mp4|\.mov|\.flv|\.wmv|\.avi|\.mpg|\.mpeg|\.rm|\.ram|\.swf|\.ogg|\.webm|\.mkv|\.wav|\.mp3|\.aac)$/i;
    if (allowedExtensions.exec(filePath)) {
        errorMsg('File Type not allowed');
        fileInput.value = '';
        return false;
    }
    var ins = fileInput.files.length;
    for (var x = 0; x < ins; x++) {
        fd.append("visitfiles[]", document.getElementById('visitfiles').files[x]);
    }
    fd.append('opd_id', opd);
    uploadData(fd, opd);
});



$(document).on('click', '.delete_visit_image', function() {
    var $this = $('.btn_delete');

    var record_id = $(this).data('record_id');
    var opd = $(this).data('opd');
    if (confirm('Do you really want to delete this file')) {

        $.ajax({
            url: "<?php echo base_url('admin/optometry/deleteImage') ?>",
            type: "POST",
            data: {
                'record_id': record_id,
                'opd_id': opd
            },
            dataType: 'Json',
            beforeSend: function() {
                $this.button('loading');
            },
            success: function(data, textStatus, jqXHR) {
                if (data.flag === 1) {
                    successMsg(data.msg);
                    load(opd);

                } else {
                    errorMsg(data.msg);
                    load(opd);
                }

            },

            complete: function() {

                $this.button('reset');
            },
            error: function(jqXHR, textStatus, errorThrown) {

            }
        });
    }

});

$(document).on('click', '.visitImageView', function(e) {
    e.preventDefault();
    var image = $(this).data('record_id');
    var opd = $(this).data('opd');
    var path = '<?php echo base_url('uploads/visits/OPD'); ?>' + opd;
    $('#viewVisitFiles').modal('toggle');
    $('.visitFile').empty().html('<img class="img-responsive" src="' + path + '/' + image + '"/>');

})

$(document).on('click', '.opto_print', function(e) {
    //var isChecked = $('.opto_print:checkbox:checked').length > 0;
    //alert(isChecked);
    var printkey = $(this).attr('id');
    if ($("#"+printkey).prop('checked') == true) {
        var printval = 1;
    } else {
        var printval = 0;
    }
             
    var optoId = $('#optometryId').val();
   
    $.ajax({
        url: "<?php echo base_url('admin/medicalcamp/savePrintSettings') ?>",
        type: "POST",
        data: {
            'print_key': printkey,
            'opto_id': optoId,
            'print_val': printval
        },
        dataType: 'json',
        success: function(data, textStatus, jqXHR) {
            //alert(data);
        }

    })

})

$(document).on('click', '.viewOptometryData', function(e) {
    //e.preventDefault();
    // var opd = $(this).data('opd');
    var id = $(this).data('opto_id');
    alert("abc");
  

    getMedCampData(id);

})


//raju
});
    </script>


<script>
    $(document).on('change', '.act', function () {
        $this = $(this);
        var sys_val = $(this).val();

        var section_ul = $(this).closest('div.row').find('ul.section_ul');
        $.ajax({
            type: 'POST',
            url: base_url + 'admin/patient/getPartialsymptoms',
            data: {'sys_id': sys_val},  
            dataType: 'JSON',
            beforeSend: function () {
                $('ul.section_ul').find('li:not(:first-child)').remove();
            },
            success: function (data) {
                section_ul.append(data.record);
            },
            error: function (xhr) { // if error occured
                alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
            },
            complete: function () {
            }
        });
    });
</script>
<script type="text/javascript">

    $(document).on('click', '.remove_row', function () {
        $this = $(this);
        $this.closest('.row').remove();

    });

    $(document).mouseup(function (e)
    {
        var container = $(".wrapper-dropdown-3"); // YOUR CONTAINER SELECTOR
        if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0) // ... nor a descendant of the container
        {
            $("div.wrapper-dropdown-3").removeClass('active');
        }
    });

    $(document).on('click', '.filterinput', function () {

        if (!$(this).closest('.wrapper-dropdown-3').hasClass("active")) {
            $(".wrapper-dropdown-3").not($(this)).removeClass('active');
            $(this).closest("div.wrapper-dropdown-3").addClass('active');
        }
    });

    $(document).on('click', 'input[name="section[]"]', function () {
        $(this).closest('label').toggleClass('active_section');
    });

    $(document).on('keyup', '.filterinput', function () {

        var valThis = $(this).val().toLowerCase();
        var closer_section = $(this).closest('div').find('.section_ul > li');

        var noresult = 0;
        if (valThis == "") {
            closer_section.show();
            noresult = 1;
            $('.no-results-found').remove();
        } else {
            closer_section.each(function () {
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
        }
        ;
        if (noresult == 0) {
            closer_section.append('<li class="no-results-found"><?php echo $this->lang->line('no_result_found'); ?></li>');
        }
    });
</script>

<script type="text/javascript">   
    $('#myModal').on('hidden.bs.modal', function (e) {
        $(this).find('#formadd')[0].reset();
    });

    $('#myModalpa').on('hidden.bs.modal', function (e) {
        $(this).find('#formaddpa')[0].reset();
    });

    $(function () {
        $('#easySelectable').easySelectable();
        $('.select2').select2();    
    })

    function makeid(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }

    function get_PatientDetails(id) {       
        var base_url = "<?php echo base_url(); ?>backend/images/loading.gif";
        $("#ajax_load").html("<center><img src='" + base_url + "'/>");
        var password = makeid(5)
       if(id==''){
            $("#ajax_load").html("");
             $("#patientDetails").hide();
       }else{             
             $.ajax({
            url: '<?php echo base_url(); ?>admin/patient/patientDetails',
            type: "POST",
            data: {id: id},
            dataType: 'json',
            success: function (res) {
                
                if (res) {
                
                    $("#ajax_load").html("");
                    $("#patientDetails").show();
                    $('#patient_unique_id').html(res.id);
                    $('#patient_id').val(res.id);
                    $('#password').val(password);
                    $('#revisit_password').val(password);
                    $('#listname').html(res.patient_name+" ("+res.id+")");
                    $('#guardian').html(res.guardian_name);
                    $('#listnumber').html(res.mobileno);
                    $('#email').html(res.email);
                    $('#mobnumber').val(res.mobileno);
                    $('#pemail').val(res.email);
                    $('#patientname').val(res.patient_name);                    
                    $('#age').html(res.patient_age);
                    $('#doctname').val(res.name + " " + res.surname);
                    $("#bp").html(res.bp);
                    $("#symptoms").html(res.symptoms);
                    $("#known_allergies").html(res.known_allergies);
                    $("#insurance_id").html(res.insurance_id);
                    $("#validity").html(res.insurance_validity);
                    $("#identification_number").html(res.identification_number);
                    $("#address").html(res.address);
                    $("#note").html(res.note);
                    $("#height").html(res.height);
                    $("#weight").html(res.weight);
                    $("#genders").html(res.gender);
                    $("#marital_status").html(res.marital_status);
                    $("#blood_group").html(res.blood_group_name);
                    $("#allergies").html(res.known_allergies);
                    if(res.image !=null){
                        $("#image").attr("src", '<?php echo base_url() ?>' + res.image+ '<?php echo img_time(); ?>');
                    }else{
                        $("#image").attr("src", '<?php echo base_url() ?>uploads/patient_images/no_image.png');
                    }
                    
                } else {
                    $("#ajax_load").html("");
                    $("#patientDetails").hide();
                }
            }
        });
       }
    }
   
    function get_Charges(orgid) {
        var charge =$('.charge').val();
        $('#org_charge_amount').val('');
        var apply_amount=0;
        $.ajax({
            url: '<?php echo base_url(); ?>admin/patient/getChargeById',
            type: "POST",
            data: {charge_id: charge, organisation_id: orgid},
            dataType: 'json',
            success: function (res) {
              
                if (res) {
                    $('#percentage').val(res.percentage);
                    if (organisation_id) {
                        if(res.percentage ==null){                             
                            apply_amount=parseFloat(res.org_charge);  
                        }else{
                            apply_amount=(parseFloat(res.org_charge) * res.percentage/100)+(parseFloat(res.org_charge));
                        }
                       
                        $('#org_charge_amount').val(res.org_charge);
                        $('#apply_charge').val(res.org_charge);
                        $('#apply_amount').val(apply_amount);
                        $('#standard_charge').val(res.standard_charge);
                        $('#paid_amount').val(res.apply_amount);
                    } else {
                        if(res.percentage ==null){
                            apply_amount=parseFloat(res.standard_charge);
                        }else{
                            apply_amount=(parseFloat(res.standard_charge) * res.percentage/100)+(parseFloat(res.standard_charge));
                        }
                     
                        $('#standard_charge').val(res.standard_charge);
                        $('#apply_charge').val(res.standard_charge);
                        $('#apply_amount').val(apply_amount);
                        $('#paid_amount').val(res.apply_amount);
                    }
                } else {
                    $('#standard_charge').val('');
                    $('#apply_charge').val('');
                }
            }
        });
    }

    function get_Chargesrevisit(id) {
        $("#standard_chargerevisit").html("standard_charge");
        var orgid = $("#revisit_organisation").val();
        if (id == '') {
            id = $("#revisit_doctor").val();
        }

        $.ajax({
            url: '<?php echo base_url(); ?>admin/patient/doctCharge',
            type: "POST",
            data: {doctor: id, organisation: orgid},
            dataType: 'json',
            success: function (res) {
             
                if (res) {
                    if (orgid) {
                        $('#revisit_amount').val(res.org_charge);
                        $('#standard_chargerevisit').val(res.standard_charge);
                    } else {
                        $('#standard_chargerevisit').val(res.standard_charge);
                        $('#revisit_amount').val(res.standard_charge);
                    }
                 
                } else {
                    $('#standard_chargerevisit').val('');
                    $('#revisit_amount').val('');
                }
            }
        });
    }
   
 $(document).on('select2:select','.charge_category',function(){
       var charge_category=$(this).val();      
      $('.charge').html("<option value=''><?php echo $this->lang->line('loading') ?></option>");
     getchargecode(charge_category,"");
 });

    function getchargecode(charge_category,charge_id) {    
      var div_data = "<option value=''><?php echo $this->lang->line('select') ?></option>";
      if(charge_category != ""){
          $.ajax({
            url: base_url+'admin/charges/getchargeDetails',
            type: "POST",
            data: {charge_category: charge_category},
            dataType: 'json',
            success: function (res) {
              
                $.each(res, function (i, obj)
                {
                    var sel = "";
                    div_data += "<option value='" + obj.id + "'>" + obj.name + "</option>";

                });
                $('.charge').html(div_data);
                $(".charge").select2("val", charge_id);             
            }
        });
      }
    }

    function update_amount(apply_charge){       
        var apply_amount=apply_charge;
        var tax_percentage=$('#percentage').val();
        if(tax_percentage !='' && tax_percentage !=0){
            apply_amount=(parseFloat(apply_charge) * tax_percentage/100)+(parseFloat(apply_charge));      
                 $('#apply_amount').val(apply_amount);            
            }else{
                $('#apply_amount').val(apply_amount);
            }
    }

    $(document).on('select2:select','.charge',function(){
        var charge=$(this).val();
        var orgid = $("#organisation").val();
          var apply_amount=0;
          $('#org_charge_amount').val('');
      $.ajax({
            url: '<?php echo base_url(); ?>admin/patient/getChargeById',
            type: "POST",
            data: {charge_id: charge, organisation_id: orgid},
            dataType: 'json',
            success: function (res) {
              
                if (res) { 
                    var tax=res.percentage;
                    var quantity=$('#qty').val();
                    $('#percentage').val(tax);
                    $('#apply_charge').val(parseFloat(res.standard_charge) * quantity);
                    $('#standard_charge').val(res.standard_charge);
                    $('#schedule_charge').val(res.org_charge);                
                    $('#org_id').val(res.org_charge_id);
                    if (res.org_charge == null) {
                        if(res.percentage ==null){
                            apply_amount=parseFloat(res.standard_charge);
                        }else{
                            apply_amount=(parseFloat(res.standard_charge) * res.percentage/100)+(parseFloat(res.standard_charge));
                        }
                        
                        $('#apply_charge').val(res.standard_charge);
                        $('#apply_amount').val(apply_amount.toFixed(2));
                        $('#paid_amount').val(apply_amount.toFixed(2));
                       
                    } else {
                         if(res.percentage ==null){
                            apply_amount=parseFloat(res.org_charge);
                        }else{
                            apply_amount=(parseFloat(res.org_charge) * res.percentage/100)+(parseFloat(res.org_charge));
                        }

                        $('#org_charge_amount').val(res.org_charge);
                        $('#apply_charge').val(res.org_charge);
                        $('#apply_amount').val(apply_amount.toFixed(2));
                        $('#paid_amount').val(apply_amount.toFixed(2));                        
                      
                    }
                } else {
                   
                }
            }
        });
 });
</script>

<script type="text/javascript">    
    (function ($) {
        //selectable html elements
        $.fn.easySelectable = function (options) {
            var el = $(this);
            var options = $.extend({
                'item': 'li',
                'state': true,
                onSelecting: function (el) {

                },
                onSelected: function (el) {

                },
                onUnSelected: function (el) {

                }
            }, options);
            el.on('dragstart', function (event) {
                event.preventDefault();
            });
            el.off('mouseover');
            el.addClass('easySelectable');
            if (options.state) {
                el.find(options.item).addClass('es-selectable');
                el.on('mousedown', options.item, function (e) {
                    $(this).trigger('start_select');
                    var offset = $(this).offset();
                    var hasClass = $(this).hasClass('es-selected');
                    var prev_el = false;
                    el.on('mouseover', options.item, function (e) {
                        if (prev_el == $(this).index())
                            return true;
                        prev_el = $(this).index();
                        var hasClass2 = $(this).hasClass('es-selected');
                        if (!hasClass2) {
                            $(this).addClass('es-selected').trigger('selected');
                            el.trigger('selected');
                            options.onSelecting($(this));
                            options.onSelected($(this));
                        } else {
                            $(this).removeClass('es-selected').trigger('unselected');
                            el.trigger('unselected');
                            options.onSelecting($(this))
                            options.onUnSelected($(this));
                        }
                    });
                    if (!hasClass) {
                        $(this).addClass('es-selected').trigger('selected');
                        el.trigger('selected');
                        options.onSelecting($(this));
                        options.onSelected($(this));
                    } else {
                        $(this).removeClass('es-selected').trigger('unselected');
                        el.trigger('unselected');
                        options.onSelecting($(this));
                        options.onUnSelected($(this));
                    }
                    var relativeX = (e.pageX - offset.left);
                    var relativeY = (e.pageY - offset.top);
                });
                $(document).on('mouseup', function () {
                    el.off('mouseover');
                });
            } else {
                el.off('mousedown');
            }
        };
    })(jQuery);
</script>

<script type="text/javascript">
    $(document).ready(function (e) {
        $("form#formadd button[type=submit]").click(function() {            
         $("button[type=submit]", $(this).parents("form")).removeAttr("clicked");
        $(this).attr("clicked", "true");
    });

        $("#formadd").on('submit', (function (e) {
      var form_valid=true;
             var amount_to_be_paid=parseInt($("form#formadd #apply_amount").val());
             var amount_paying= parseInt($("form#formadd #paid_amount").val());
             if(amount_to_be_paid < amount_paying){
                 errorMsg("Invalid Amount");
                return false;
             }

             var sub_btn_clicked = $("button[type=submit][clicked=true]");       
            
             var sub_btn_clicked_name=sub_btn_clicked.attr('name');
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/patient',
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                 sub_btn_clicked.button('loading') ; 
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
                      
                         if(sub_btn_clicked_name === "save_print") {                            
                           printVisitBill(data.opd_id);
                        }  
                        table.ajax.reload( null, false );
                        $('#myModal').modal('hide');
                    }
                      sub_btn_clicked.button('reset') ; 

                },
                 error: function(xhr) { // if error occured
       alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
       sub_btn_clicked.button('reset')  ;
    },
    complete: function() {
        sub_btn_clicked.button('reset');  
    }
            }); 
        }));
    });

    function popup(data) {
        var base_url = '<?php echo base_url() ?>';
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({"position": "absolute", "top": "-1000000px"});
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
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();           
        }, 500);
        return true;
    }
    
    $(document).ready(function (e) {
        $(".printsavedata").on('click', (function (e) {            
            var form = $(this).parents('form').attr('id');
            var str = $("#" + form).serializeArray();
            var postData = new FormData();
            $.each(str, function (i, val) {
                postData.append(val.name, val.value);
            });           

            $.ajax({
                url: '<?php echo base_url(); ?>admin/patient/add_revisit',
                type: "POST",
                data: postData,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.status == "fail") {
                        var message = "";
                        $.each(data.error, function (index, value) {
                            message += value;
                        });
                        errorMsg(message);
                    } else {
                        successMsg(data.message);
                        patientid = $("#pid").val();
                        printVisitBill(patientid, data.id);
                    }
                    $("#formrevisitbtn").button('reset');
                },
                error: function () {
                    
                }
            });            
        }));
    });

    function printVisitBill(opdid) {
    $.ajax({
                url: base_url+'admin/patient/printbill',
                type: "POST",
                data: {opd_id: opdid},
                dataType: 'json',
                   beforeSend: function() {
            
                   },
                success: function (data) {
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
    }

    $(document).ready(function (e) {
        $("#formedit").on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/patient/update',
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.status == "fail") {
                        var message = "";
                        $.each(data.error, function (index, value) {
                            message += value;
                        });
                        errorMsg(message);
                    } else {
                        successMsg(data.message);
                        window.location.reload(true);
                    }
                },
                error: function () {
                   
                }
            });
        }));
    });

    /**/
    function getRecord(id) 
    {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/patient/getDetails',
            type: "POST",
            data: {recordid: id},
            dataType: 'json',
            success: function (data) {

                $("#patientid").val(data.id);
                $("#patient_name").val(data.patient_name);
                $("#contact").val(data.mobileno);
                $("#email").val(data.email);
                $("#age").val(data.age);
                $("#bp").val(data.bp);
                $("#month").val(data.month);
                $("#guardian_name").val(data.guardian_name);
                $("#appointment_date").val(data.appointment_date);
                $("#case").val(data.case_type);
                $("#symptoms").val(data.symptoms);
                $("#known_allergies").val(data.known_allergies);
                $("#refference").val(data.refference);
                $("#amount").val(data.amount);
                $("#tax").val(data.tax);
                $("#opdid").val(data.opdid);
                $("#address").val(data.address);
                $("#note").val(data.note);
                $("#height").val(data.height);
                $("#weight").val(data.weight);
                $("#updateid").val(id);
                $('select[id="blood_group"] option[value="' + data.blood_group + '"]').attr("selected", "selected");
                $('select[id="gender"] option[value="' + data.gender + '"]').attr("selected", "selected");
                $('select[id="marital_status"] option[value="' + data.marital_status + '"]').attr("selected", "selected");
                $('select[id="consultant_doctor"] option[value="' + data.cons_doctor + '"]').attr("selected", "selected");
                $('select[id="payment_mode"] option[value="' + data.payment_mode + '"]').attr("selected", "selected");
                $('select[id="casualty"] option[value="' + data.casualty + '"]').attr("selected", "selected");
            },
        })
    }

    function holdModal(modalId) {
        
        $('#' + modalId).modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    }

</script>
<script type="text/javascript"> 

 $("#myModal").on('hidden.bs.modal', function (e) {
     $(".filestyle").next(".dropify-clear").trigger("click");
     $("#patientDetails").hide();
     $('.select2-selection__rendered').html("");
     $('.cheque_div').css("display", "none");
     $('#formadd').find('input:text, input:password, input:file, textarea').val('');
     $('#formadd').find('select option:selected').removeAttr('selected');
     $('#formadd').find('input:checkbox, input:radio').removeAttr('checked');
 });

$(".modalbtnpatient").click(function(){		
	$('#formaddpa').trigger("reset");
	$(".dropify-clear").trigger("click");
});

 $(document).on('change','.payment_mode',function(){
   var mode=$(this).val();
   if(mode == "Cheque"){
     $('.cheque_div').css("display", "block");
   }else{
     $('.cheque_div').css("display", "none");
   }
 });

</script>
<!-- //========datatable start===== -->
<script type="text/javascript">
( function ( $ ) {
    'use strict';
    $(document).ready(function () {
        initDatatable('ajaxlist','admin/medicalcamp/getmedicalcampdatatable',[],[],100);
    });
} ( jQuery ) )
</script>
<script>
 
function resetForm(id) {
        $("#" + id).trigger("reset");
        $('#' + id + " .select2").val('').trigger('change');

    }
</script>
<!-- //========datatable end===== -->
 
 <?php $this->load->view('admin/medicalcamp/medicalcompaddmodal'); ?>
 <div class="modal fade modaled" id="add_optometry" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header modal_head">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title tit" id="optometry_title">Optometry</h4>
            </div>
            <form id="form_optometry" accept-charset="utf-8" enctype="multipart/form-data" method="post">
                <div class="">
                    <div class="modal-body  pb0 ">
                        <?php 
                        //var_dump($patient_data);die;
                        ?>
                        <div class="row">

                       
                    <table width="50%" class="">
                        <tr>
                        <th width="30%"><?php echo $this->lang->line("patient_name"); ?></th>
                       <td class="fnt" id="patient_nameget"></td>
                        <th width="10%"><?php echo $this->lang->line("age"); ?></th>
                        <td class="fnt" id="ageget">
                            </td>
                            <th width="10%"><?php echo $this->lang->line("gender"); ?></th>
                       <td class="fnt" id="genderget"></td>
                    </tr>
                    </table>


                            <div class="col-md-6">
                                <input type="hidden" name="patient_id" id="patient_idsend">
                                <input type="hidden" name="optometry_id" id="optometry_id" value="">
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="opd_id" id="opd_id" value="">
                            </div>
                        </div>
                        <br>
                     
                        <!--<div class="panel panel-default">-->
                        <!--    <div class="panel-heading">-->
                        <!--        <div class="my_class" style="float:left">Complaints</div>-->
                        <!--        <div style="float:right" class="add_complaint"><span class="" data-toggle="tooltip" title="Add Complaint"><i class="fa fa-plus plus_icon" aria-hidden="true"></i>&nbsp;&nbsp;</span></div>-->
                        <!--        <br>-->
                        <!--    </div>-->
                        <!--    <div class="panel-body">-->
                        <!--        <div class="complaints_container">-->
                        <!--            <div class="row">-->
                        <!--                <div class="col-md-3">-->
                        <!--                    <div class="form-group">-->
                        <!--                        <label for=" ">-->
                        <!--                        Complaints</label>-->
                        <!--                        <div><select name='complaints[]'  class="form-control select2 complaint_data" style="width:100%">-->
                        <!--                                <option value="">-->
                        <!--                                    <?php echo $this->lang->line('select'); ?>-->
                        <!--                                </option>-->
                        <!--                            </select>-->
                        <!--                        </div>-->

                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="col-md-3">-->
                        <!--                    <div class="row">-->
                        <!--                        <div class="col-md-6">-->
                        <!--                            <div class="form-group">-->
                        <!--                                <label for="">Duration</label>-->
                        <!--                                <div>-->
                        <!--                                    <input type="text" class="form-control" name="duration[]" id="duration" class="duration" />-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                        <div class="col-md-6">-->
                        <!--                            <div class="form-group">-->
                        <!--                                <label for="">Period</label>-->
                        <!--                                <select name='period[]' id="period" class="form-control select2 period" style="width:100%">-->
                        <!--                                    <option value="Days">-->
                        <!--                                        Days-->
                        <!--                                    </option>-->
                        <!--                                    <option value="Months">-->
                        <!--                                        Months-->
                        <!--                                    </option>-->
                        <!--                                    <option value="Years">-->
                        <!--                                        Years-->
                        <!--                                    </option>-->

                        <!--                                </select>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="col-md-3">-->
                        <!--                    <div class="form-group">-->
                        <!--                        <label for=" ">-->
                        <!--                            Medication</label>-->
                        <!--                        <div>-->
                        <!--                            <input type="text" class="form-control" name="medication[]" id="medication" class="medication" />-->
                        <!--                        </div>-->

                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="col-md-3">-->
                        <!--                    <div class="form-group">-->
                        <!--                        <label for=" ">-->
                        <!--                            Condition</label>-->
                        <!--                        <div><input type="text" name='condition[]' id="condition" class="form-control  condition" style="width:100%">-->

                        <!--                        </div>-->

                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div>-->
                        <!--            <button class="btn btn-primary addnewhistory"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                      
                      
                      <div class="panel panel-default">
                        <div class="panel-heading">
                                <div class="my_class" style="float:left">Chief Complaints</div>
                                <br />
                            </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-sm-12">
                                       <textarea  rows="5" class="form-control complaints_data" name="complaints_data" id="complaints_data"  placeholder="Write Complaints Here"></textarea>
                                   </div>
                                        
                                        
                                    </div><!--end row-->
                                    </div>
                            </div>
                        <!-- Visions -->

                        <style>
                            /* .table_visions th{
                            width:15%;
                          } */
                            .table_visions th.head {
                                width: 8%;
                            }
                        </style>
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Visions
                                <div class="pull-right"><a class="auto_fill" href="javascript:void(0)" onclick="showAutoFillVisions()">Auto Fill</a>
                                        </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_visions">
                                    <tr>
                                        <th>Visions</th>
                                        <th colspan="2">Distance Presenting</th>
                                        <th colspan="2">Distance Pinhole</th>
                                        <th colspan="2">Near Vision</th>
                                    </tr>
                                    <tr>
                                        <th class="head">OD</th>
                                        <td>
                                            <select name='vision_od_presenting' id="vision_od_presenting" class="form-control select2 vision_od_presenting" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <?php foreach ($optometry_options->distance_presenting as $dkey => $dvalue) {
                                                ?>
                                                    <option value="<?php echo $dvalue->value; ?>">
                                                        <?php echo $dvalue->value; ?>
                                                    </option>
                                                <?php
                                                } ?>
                                            </select>
                                        </td>
                                        <td colspan="2">
                                            <select name='vision_od_pinhole' id="vision_od_pinhole" class="form-control select2 vision_od_pinhole" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <?php foreach ($optometry_options->distance_pinhole as $dkey => $dvalue) {
                                                ?>
                                                    <option value="<?php echo $dvalue->value; ?>">
                                                        <?php echo $dvalue->value; ?>
                                                    </option>
                                                <?php
                                                } ?>
                                            </select>
                                        </td>
                                        <td colspan="2">
                                            <select name='vision_od_near_presenting' id="vision_od_near_presenting" class="form-control select2 vision_od_near_presenting" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <?php foreach ($optometry_options->nearvision as $dkey => $dvalue) {
                                                ?>
                                                    <option value="<?php echo $dvalue->value; ?>">
                                                        <?php echo $dvalue->value; ?>
                                                    </option>
                                                <?php
                                                } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="head">OS</th>
                                        <td>
                                            <select name='vision_os_presenting' id="vision_os_presenting" class="form-control select2 vision_os_presenting" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <?php foreach ($optometry_options->distance_presenting as $dkey => $dvalue) {
                                                ?>
                                                    <option value="<?php echo $dvalue->value; ?>">
                                                        <?php echo $dvalue->value; ?>
                                                    </option>
                                                <?php
                                                } ?>
                                            </select>
                                        </td>
                                        <td colspan="2">
                                            <select name='vision_os_pinhole' id="vision_os_pinhole" class="form-control select2 vision_os_pinhole" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <?php foreach ($optometry_options->distance_pinhole as $dkey => $dvalue) {
                                                ?>
                                                    <option value="<?php echo $dvalue->value; ?>">
                                                        <?php echo $dvalue->value; ?>
                                                    </option>
                                                <?php
                                                } ?>
                                            </select>
                                        </td>
                                        <td colspan="2">
                                            <select name='vision_os_near_presenting' id="vision_os_near_presenting" class="form-control select2 vision_os_near_presenting" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <?php foreach ($optometry_options->nearvision as $dkey => $dvalue) {
                                                ?>
                                                    <option value="<?php echo $dvalue->value; ?>">
                                                        <?php echo $dvalue->value; ?>
                                                    </option>
                                                <?php
                                                } ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- PGP -->
                        <style>
                            .table_pgp th {
                                width: 15%;
                            }

                            .table_pgp th.head {
                                width: 5%;
                            }
                        </style>
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                PGP
                                    <div class="pull-right"><a class="auto_fill" href="javascript:void(0)" onclick="showAutoFillPGP()">Auto Fill</a></div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_pgp">
                                    <thead>
                                        <tr>
                                            <th class="head">PGP</th>
                                            <th>SPH</th>
                                            <th>CYL</th>
                                            <th>AXIS</th>
                                            <th>ADD</th>
                                            <th>BCVA</th>
                                            <th>BCNVA</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="head">
                                                OD</th>
                                            <td>
                                                <select name='pgp_od_sph' id="pgp_od_sph" class="form-control select2 pgp_od_sph" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->sph as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='pgp_od_cyl' id="pgp_od_cyl" class="form-control select2 pgp_od_cyl" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='pgp_od_axis' id="pgp_od_axis" class="form-control select2 pgp_od_axis" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->axis as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>°">
                                                            <?php echo $dvalue->value; ?>°
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select type="text" name='pgp_od_add' id="pgp_od_add" class="form-control select2 pgp_od_add" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->add as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name='pgp_od_eom' id="pgp_od_eom" class="form-control  pgp_od_eom">
                                            </td>
                                            <td>
                                                <input type="text" name='pgp_od_tropia' id="pgp_od_tropia" class="form-control  pgp_od_tropia">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="head">OS</th>
                                            <td><select type="text" name='pgp_os_sph' id="pgp_os_sph" class="form-control select2 pgp_os_sph" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->sph as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select></td>
                                            <td>
                                                <select type="text" name='pgp_os_cyl' id="pgp_os_cyl" class="form-control select2 pgp_os_cyl" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select type="text" name='pgp_os_axis' id="pgp_os_axis" class="form-control select2 pgp_os_axis" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->axis as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>°">
                                                            <?php echo $dvalue->value; ?>°
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select type="text" name='pgp_os_add' id="pgp_os_add" class="form-control select2 pgp_os_add" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="pgp_os_eom" id="pgp_os_eom" class="pgp_os_eom form-control" />
                                            </td>
                                            <td>
                                                <input type="text" name="pgp_os_tropia" id="pgp_os_tropia" class="pgp_os_tropia form-control" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <div class="col-sm-12">
                                    <textarea  rows="2" class="form-control pgp_notes" name="pgp_notes" id="pgp_notes" placeholder="Write Notes Here..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Acceptance -->
                         
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Acceptance
                                <div class="pull-right"><a class="auto_fill" href="javascript:void(0)" onclick="showAutoFillAcceptance()">Auto Fill</a>
                                        </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_acceptance">
                                    <thead>
                                        <tr>
                                            <th class="head">&nbsp;</th>
                                            <th>SPH</th>
                                            <th>CYL</th>
                                            <th>AXIS</th>
                                            <th>ADD</th>
                                            <th>BCVA</th>
                                            <th>BCNVA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="head">OD</th>
                                            <td>
                                                <select name='accp_od_sph' id="accp_od_sph" class="form-control select2 accp_od_sph" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->sph as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='accp_od_cyl' id="accp_od_cyl" class="form-control select2 accp_od_cyl" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='accp_od_axis' id="accp_od_axis" class="form-control select2 accp_od_axis" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->axis as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>°">
                                                            <?php echo $dvalue->value; ?>°
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='accp_od_add' id="accp_od_add" class="form-control select2 accp_od_add" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->add as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name='accp_od_va' id="accp_od_va" class="form-control  accp_od_va" style="width:100%">
                                            </td>
                                            
                                            <td>
                                                <input type="text" name='accp_od_bcnva' id="accp_od_bcnva" class="form-control  accp_od_bcnva" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="head">OS</th>
                                            <td>
                                                <select name='accp_os_sph' id="accp_os_sph" class="form-control select2 accp_os_sph" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->sph as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='accp_os_cyl' id="accp_os_cyl" class="form-control select2 accp_os_cyl" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='accp_os_axis' id="accp_os_axis" class="form-control select2 accp_os_axis" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->axis as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>°">
                                                            <?php echo $dvalue->value; ?>°
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='accp_os_add' id="accp_os_add" class="form-control select2 accp_os_add" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->add as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                             <td>
                                                <input type="text" name='accp_os_va' id="accp_os_va" class="form-control  accp_os_va" style="width:100%">
                                            </td>
                                             <td>
                                                <input type="text" name='accp_os_bcnva' id="accp_os_bcnva" class="form-control  accp_os_bcnva" style="width:100%">
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>
                                
                                
                                <div class="col-sm-12">
                                    <textarea  rows="2" class="form-control accp_notes" name="accp_notes" id="accp_notes" placeholder="Write Notes Here..."></textarea>
                                </div>
                            </div>
                        </div>
                     

                      
                        <!-- Ocular Motility -->
                        <style>
                            .lbl_ml{
                                margin-left: -130px;
                            }
                        </style>

                     
                        <!-- Goeno all  table -->
                        <style>
                            .th_fnt{
                                font-size: 12px;
                            }
                        </style>
                       

                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Diagnosis
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_ant_segment">

                                    <tbody>
                                        <tr>
                                            <th>OD</th>
                                            <td>
                                                <textarea name='diagnosis_od' id="diagnosis_od" class="form-control  diagnosis_od" style="width:100%"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>OS</th>
                                            <td>
                                            <textarea  name='diagnosis_os' id="diagnosis_os" class="form-control  diagnosis_os" style="width:100%"></textarea>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>


                        <div class="panel panel-default">
                          
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
<!-- kshama -->
<!-- Vision start-->
<div class="modal fade" id="autofillvisions" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="autofillvisions_title">Auto Fill Visions</h4>
            </div>

            <div class="modal-body pt0 pb0 mdls">                
                <div class="autofillvisions">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Visions</h2>                        
                        </div>
                        
                        <div class="col-md-4">
                              <button id="od_btn_vision" class="btn atf_selected_btn" onclick="select_operation_vision('od')">OD</button>                               
                              <button class="btn" onclick="copy_od_to_os_vision()">Copy OD values to OS</button>                               
                              <button id="os_btn_vision" class="btn"  onclick="select_operation_vision('os')">OS</button>                               
                        </div>
                        <div class="col-md-2">
                              <button class="btn atf_save_btn" onclick="atf_vision_save_btn_click()">Save</button>                               
                              <button class="btn atf_cancel_btn" onclick="atf_vision_close_btn_click()">Close</button>                               
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>    
                                    <th>Distance Presenting</th>
                                    <th>Distance Pinhole</th>
                                    <th>Near Vision</th>
                                    <!--<th>ADD</th>                                    -->
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="od_dp_selected_val od_input" name="" id="">
                                        <input type="text" class="os_dp_selected_val os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_dpp_selected_val od_input" name="" id="">
                                        <input type="text" class="os_dpp_selected_val os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_nv_selected_val od_input" name="" id="">
                                        <input type="text" class="os_nv_selected_val os_input" name="" id="" style="display:none">
                                    </td>
                                </tr>                               
                                <tr>
                                    <td width="">
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>Distance Presenting</lable>
                                            </div>
                                            <div class="atf_sph_p_values atf_value_container">
                                                
												<?php foreach ($optometry_options->distance_presenting as $dkey => $dvalue) {
                                               
													 echo "<span class='atf_v_span' onclick=\"select_value_vision('dp_selected_val','".$dvalue->value."')\">".$dvalue->value."</span>"; 
                                               
                                                } ?>												
                                            </div>                                           
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>Distance Pinhole</lable>                                                
                                            </div>
                                            <div class="atf_cyl_p_values atf_value_container">											
											   <?php 
                                                    foreach ($optometry_options->distance_pinhole as $dkey => $dvalue)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_vision('dpp_selected_val','".$dvalue->value."')\">".$dvalue->value."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>                                            
                                        </div>
                                                  
                                    </td>                                 
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>Near Vision</lable>                                                
                                            </div>
                                            <div class="atf_axis_p_values atf_value_container">
                                                  <?php foreach ($optometry_options->nearvision as $dkey => $dvalue) 
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_vision('nv_selected_val','".$dvalue->value."')\">".$dvalue->value."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>                                            
                                        </div>
                                    </td>                                 
                                                  
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>
                                    <td class="atf_selected_btn">OD:</td>
                                    <td>Distance Presenting: <span class="od_dp_selected_val"></span></td>
                                    <td>Distance Pinhole: <span class="od_dpp_selected_val"></span></td>
                                    <td>Near Vision: <span class="od_nv_selected_val"></span></td>
                                    <td class="atf_selected_btn">OS:</td>
                                    <td>Distance Presenting: <span class="os_dp_selected_val"></span></td>
                                    <td>Distance Pinhole: <span class="os_dpp_selected_val"></span></td>
                                    <td>Near Vision: <span class="os_nv_selected_val"></span></td>                                   
                                </tr>
                            </table>                  
                        </div>                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--vision end-->


<div class="modal fade" id="autofillPGP" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="autofillPGP_title">Auto Fill PGP</h4>
            </div>

            <div class="modal-body pt0 pb0 mdls">                
                <div class="autofillPGP">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>PGP</h2>                        
                        </div>
                        
                        <div class="col-md-4">
                              <button id="od_btn" class="btn atf_selected_btn" onclick="select_operation('od')">OD</button>                               
                              <button class="btn" onclick="copy_od_to_os()">Copy OD values to OS</button>                               
                              <button id="os_btn" class="btn"  onclick="select_operation('os')">OS</button>                               
                        </div>
                        <div class="col-md-2">
                              <button class="btn atf_save_btn" onclick="atf_save_btn_click()">Save</button>                               
                              <button class="btn atf_cancel_btn" onclick="atf_close_btn_click()">Close</button>                               
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>    
                                    <th>SPH</th>
                                    <th>CYL</th>
                                    <th>AXIS</th>
                                    <th>ADD</th>                                    
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="od_sph_selected_val od_input" name="" id="">
                                        <input type="text" class="os_sph_selected_val os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_cyl_selected_val od_input" name="" id="">
                                        <input type="text" class="os_cyl_selected_val os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_axis_selected_val od_input" name="" id="">
                                        <input type="text" class="os_axis_selected_val os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_add_selected_val od_input" name="" id="">
                                        <input type="text" class="os_add_selected_val os_input" name="" id="" style="display:none">
                                    </td>                                    
                                </tr>                               
                                <tr>
                                    <td width="">
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>SPH</lable>
                                                
                                                <span class="pull-right atf_os_span atf_sph_n_span" onclick="show_options_selection('sph','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_sph_p_span atf_selected_btn" onclick="show_options_selection('sph','p','n')">+</span> 
                                            </div>
                                            <div class="atf_sph_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
														echo "<span class='atf_v_span' onclick=\"select_value('sph_selected_val',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_sph_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
														echo "<span class='atf_v_span' onclick=\"select_value('sph_selected_val',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div> 
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>CYL</lable>
                                                <span class="pull-right atf_os_span atf_cyl_n_span" onclick="show_options_selection('cyl','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_cyl_p_span atf_selected_btn" onclick="show_options_selection('cyl','p','n')">+</span> 
                                            </div>
                                            <div class="atf_cyl_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value('cyl_selected_val',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_cyl_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value('cyl_selected_val',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>   
                                        </div>
                                                  
                                    </td>                                 
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>AXIS</lable>                                                
                                            </div>
                                            <div class="atf_axis_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0; $ii <= 180; $ii +=1)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value('axis_selected_val','{$ii}°')\">".number_format((float)$ii, 2, '.', '')."°</span>"; 
                                                    }
                                                ?>                                                
                                            </div>                                            
                                        </div>
                                    </td>                                 
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>ADD</lable>
                                                <span class="pull-right atf_os_span atf_add_n_span" onclick="show_options_selection('add','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_add_p_span atf_selected_btn" onclick="show_options_selection('add','p','n')">+</span>
                                                
                                            </div>
                                            <div class="atf_add_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 4; $ii += 0.25)
                                                    {
                                                        echo "<span class='atf_v_span' onclick=\"select_value('add_selected_val',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_add_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 4; $ii += 0.25)
                                                    {
                                                        echo "<span class='atf_v_span' onclick=\"select_value('add_selected_val',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>   
                                        </div>
                                    </td>                        
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>
                                    <td class="atf_selected_btn">OD:</td>
                                    <td>SPH: <span class="od_sph_selected_val"></span></td>
                                    <td>CYL: <span class="od_cyl_selected_val"></span></td>
                                    <td>AXIS: <span class="od_axis_selected_val"></span></td>
                                    <td>ADD: <span class="od_add_selected_val"></span></td>
                                    <td class="atf_selected_btn">OS:</td>
                                    <td>SPH: <span class="os_sph_selected_val"></span></td>
                                    <td>CYL: <span class="os_cyl_selected_val"></span></td>
                                    <td>AXIS: <span class="os_axis_selected_val"></span></td>
                                    <td>ADD: <span class="os_add_selected_val"></span></td>
                                </tr>
                            </table>                  
                        </div>                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="autofillacceptance" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="autofillacceptance_title">Auto Fill Acceptance</h4>
            </div>

            <div class="modal-body pt0 pb0">                
                <div class="autofillacceptance">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Acceptance</h2>                        
                        </div>
                        
                        <div class="col-md-4">
                              <button id="od_btn_acceptance" class="btn atf_selected_btn" onclick="select_operation_acceptance('od')">OD</button>                               
                              <button class="btn" onclick="copy_od_to_os_acceptance()">Copy OD values to OS</button>                               
                              <button id="os_btn_acceptance" class="btn"  onclick="select_operation_acceptance('os')">OS</button>                               
                        </div>
                        <div class="col-md-2">
                              <button class="btn atf_save_btn" onclick="atf_acceptance_save_btn_click()">Save</button>                               
                              <button class="btn atf_cancel_btn" onclick="atf_acceptance_close_btn_click()">Close</button>                               
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered">
                                <tr>    
                                    <th>SPH</th>
                                    <th>CYL</th>
                                    <th>AXIS</th>
                                    <th>ADD</th>                                    
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="od_sph_selected_val_acceptance od_input" name="" id="">
                                        <input type="text" class="os_sph_selected_val_acceptance os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_cyl_selected_val_acceptance od_input" name="" id="">
                                        <input type="text" class="os_cyl_selected_val_acceptance os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_axis_selected_val_acceptance od_input" name="" id="">
                                        <input type="text" class="os_axis_selected_val_acceptance os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_add_selected_val_acceptance od_input" name="" id="">
                                        <input type="text" class="os_add_selected_val_acceptance os_input" name="" id="" style="display:none">
                                    </td>                                    
                                </tr>                               
                                <tr>
                                    <td width="">
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>SPH</lable>
                                                
                                                <span class="pull-right atf_os_span atf_sph_n_span" onclick="show_options_selection_acceptance('sph','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_sph_p_span atf_selected_btn" onclick="show_options_selection_acceptance('sph','p','n')">+</span> 
                                            </div>
                                            <div class="atf_sph_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_acceptance('sph_selected_val_acceptance',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_sph_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_acceptance('sph_selected_val_acceptance',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div> 
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>CYL</lable>
                                                <span class="pull-right atf_os_span atf_cyl_n_span" onclick="show_options_selection_acceptance('cyl','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_cyl_p_span atf_selected_btn" onclick="show_options_selection_acceptance('cyl','p','n')">+</span> 
                                            </div>
                                            <div class="atf_cyl_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_acceptance('cyl_selected_val_acceptance',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_cyl_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_acceptance('cyl_selected_val_acceptance',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>   
                                        </div>
                                                  
                                    </td>                                 
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>AXIS</lable>                                                
                                            </div>
                                            <div class="atf_axis_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0; $ii <= 180; $ii +=1)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_acceptance('axis_selected_val_acceptance','{$ii}°')\">".number_format((float)$ii, 2, '.', '')."°</span>"; 
                                                    }
                                                ?>                                                
                                            </div>                                            
                                        </div>
                                    </td>                                 
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>ADD</lable>
                                                <span class="pull-right atf_os_span atf_add_n_span" onclick="show_options_selection_acceptance('add','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_add_p_span atf_selected_btn" onclick="show_options_selection_acceptance('add','p','n')">+</span>
                                                
                                            </div>
                                            <div class="atf_add_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 4; $ii += 0.25)
                                                    {
                                                        echo "<span class='atf_v_span' onclick=\"select_value_acceptance('add_selected_val_acceptance',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_add_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 4; $ii += 0.25)
                                                    {
                                                        echo "<span class='atf_v_span' onclick=\"select_value_acceptance('add_selected_val_acceptance',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>   
                                        </div>
                                    </td>                        
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <td class="atf_selected_btn">OD:</td>
                                    <td>SPH: <span class="od_sph_selected_val_acceptance"></span></td>
                                    <td>CYL: <span class="od_cyl_selected_val_acceptance"></span></td>
                                    <td>AXIS: <span class="od_axis_selected_val_acceptance"></span></td>
                                    <td>ADD: <span class="od_add_selected_val_acceptance"></span></td>
                                    <td class="atf_selected_btn">OS:</td>
                                    <td>SPH: <span class="os_sph_selected_val_acceptance"></span></td>
                                    <td>CYL: <span class="os_cyl_selected_val_acceptance"></span></td>
                                    <td>AXIS: <span class="os_axis_selected_val_acceptance"></span></td>
                                    <td>ADD: <span class="os_add_selected_val_acceptance"></span></td>
                                </tr>
                            </table>                  
                        </div>                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script>


function copy_od_to_os()
{
    $(".os_sph_selected_val").val($(".od_sph_selected_val").val());
    $(".os_sph_selected_val").html($(".od_sph_selected_val").val());

    $(".os_cyl_selected_val").val($(".od_cyl_selected_val").val());
    $(".os_cyl_selected_val").html($(".od_cyl_selected_val").val());

    $(".os_axis_selected_val").val($(".od_axis_selected_val").val());
    $(".os_axis_selected_val").html($(".od_axis_selected_val").val());


    $(".os_add_selected_val").val($(".od_add_selected_val").val());
    $(".os_add_selected_val").html($(".od_add_selected_val").val());

    select_operation('os');
}
    function select_value(element,value)
{
    var selected_cat = 'od';
    if($("#os_btn").hasClass('atf_selected_btn'))
    {
        selected_cat = 'os';
    }
    $("."+selected_cat+'_'+element).val(value);
    $("."+selected_cat+'_'+element).html(value);
}
function atf_save_btn_click()
{
    $("#pgp_od_sph").val($(".od_sph_selected_val").val()).trigger('change');
    $("#pgp_os_sph").val($(".os_sph_selected_val").val()).trigger('change');

    $("#pgp_od_cyl").val($(".od_cyl_selected_val").val()).trigger('change');
    $("#pgp_os_cyl").val($(".os_cyl_selected_val").val()).trigger('change');

    $("#pgp_od_axis").val($(".od_axis_selected_val").val()).trigger('change');
    $("#pgp_os_axis").val($(".os_axis_selected_val").val()).trigger('change');

    $("#pgp_od_add").val($(".od_add_selected_val").val()).trigger('change');
    $("#pgp_os_add").val($(".os_add_selected_val").val()).trigger('change');

    $("#autofillPGP").modal('toggle');
}

function atf_vision_save_btn_click()
{
    $("#vision_od_presenting").val($(".od_dp_selected_val").val()).trigger('change');
    $("#vision_os_presenting").val($(".os_dp_selected_val").val()).trigger('change');
    $("#vision_od_pinhole").val($(".od_dpp_selected_val").val()).trigger('change');
    $("#vision_os_pinhole").val($(".os_dpp_selected_val").val()).trigger('change');
    $("#vision_od_near_presenting").val($(".od_nv_selected_val").val()).trigger('change');
    $("#vision_os_near_presenting").val($(".os_nv_selected_val").val()).trigger('change');
    $("#autofillvisions").modal('toggle');
}

function select_operation_acceptance(type)
{
    if(type == 'od'){
       $("#od_btn_acceptance").addClass('atf_selected_btn');
       $("#os_btn_acceptance").removeClass('atf_selected_btn');
       $(".od_input").show();
       $(".os_input").hide();
    }else{
       
        $("#os_btn_acceptance").addClass('atf_selected_btn');
        $("#od_btn_acceptance").removeClass('atf_selected_btn');
        $(".od_input").hide();
       $(".os_input").show();

    }
}

function select_value_acceptance(element,value)
{
    var selected_cat = 'od';
    if($("#os_btn_acceptance").hasClass('atf_selected_btn'))
    {
        selected_cat = 'os';
    }
    $("."+selected_cat+'_'+element).val(value);
    $("."+selected_cat+'_'+element).html(value);
}

function atf_close_btn_click()
{

    $("#autofillPGP").modal('toggle');
}
function select_operation(type)
{
    if(type == 'od')
    {
       ;
        $("#od_btn").addClass('atf_selected_btn');
        $("#os_btn").removeClass('atf_selected_btn');
       $(".od_input").show();
       $(".os_input").hide();
    }else{
       
        $("#os_btn").addClass('atf_selected_btn');
        $("#od_btn").removeClass('atf_selected_btn');
        $(".od_input").hide();
       $(".os_input").show();

    }
}
function copy_od_to_os_vision()
{
	$(".os_dp_selected_val").val($(".od_dp_selected_val").val());
    $(".os_dp_selected_val").html($(".od_dp_selected_val").val());
	
	$(".os_dpp_selected_val").val($(".od_dpp_selected_val").val());
    $(".os_dpp_selected_val").html($(".od_dpp_selected_val").val());

    $(".os_nv_selected_val").val($(".od_nv_selected_val").val());
    $(".os_nv_selected_val").html($(".od_nv_selected_val").val());
	
	select_operation('os');
	
}
    function select_value_vision(element,value)
{
    var selected_cat = 'od';
    if($("#os_btn_vision").hasClass('atf_selected_btn'))
    {
        selected_cat = 'os';
    }
    $("."+selected_cat+'_'+element).val(value);
    $("."+selected_cat+'_'+element).html(value);
}
    function select_operation_vision(type)
{
    if(type == 'od')
    {
       $("#od_btn_vision").addClass('atf_selected_btn');
       $("#os_btn_vision").removeClass('atf_selected_btn');
       $(".od_input").show();
       $(".os_input").hide();
    }else{
       
        $("#os_btn_vision").addClass('atf_selected_btn');
        $("#od_btn_vision").removeClass('atf_selected_btn');
        $(".od_input").hide();
       $(".os_input").show();

    }
}
    function showAutoFillVisions()
{
    $("#autofillvisions").modal('toggle');
	select_operation_vision('od');
}
function showAutoFillPGP()
{
    $("#autofillPGP").modal('toggle');
	select_operation('od');
}
function showAutoFillAcceptance()
{
    $("#autofillacceptance").modal('toggle');
	select_operation_acceptance('od');
}
function copy_od_to_os_acceptance()
{
	
	$(".os_sph_selected_val_acceptance").val($(".od_sph_selected_val_acceptance").val());
    $(".os_sph_selected_val_acceptance").html($(".od_sph_selected_val_acceptance").val());

    $(".os_cyl_selected_val_acceptance").val($(".od_cyl_selected_val_acceptance").val());
    $(".os_cyl_selected_val_acceptance").html($(".od_cyl_selected_val_acceptance").val());
	
    $(".os_axis_selected_val_acceptance").val($(".od_axis_selected_val_acceptance").val());
    $(".os_axis_selected_val_acceptance").html($(".od_axis_selected_val_acceptance").val());
	
	$(".os_add_selected_val_acceptance").val($(".od_add_selected_val_acceptance").val());
    $(".os_add_selected_val_acceptance").html($(".od_add_selected_val_acceptance").val());
	select_operation_acceptance('os');
	
}

function atf_acceptance_save_btn_click()
{
    $("#accp_od_sph").val($(".od_sph_selected_val_acceptance").val()).trigger('change');
    $("#accp_os_sph").val($(".os_sph_selected_val_acceptance").val()).trigger('change');
												 
    $("#accp_od_cyl").val($(".od_cyl_selected_val_acceptance").val()).trigger('change');
    $("#accp_os_cyl").val($(".os_cyl_selected_val_acceptance").val()).trigger('change');

    $("#accp_od_axis").val($(".od_axis_selected_val_acceptance").val()).trigger('change');
    $("#accp_os_axis").val($(".os_axis_selected_val_acceptance").val()).trigger('change');

    $("#accp_od_add").val($(".od_add_selected_val_acceptance").val()).trigger('change');
    $("#accp_os_add").val($(".os_add_selected_val_acceptance").val()).trigger('change');

    $("#autofillacceptance").modal('toggle');
}
function atf_acceptance_close_btn_click()
{

    $("#autofillacceptance").modal('toggle');
}
$(document).on('click', '.print_emr', function() {
var opd_id = $(this).data('id');
var $this = $(this);
$.ajax({
    url: base_url + 'admin/medicalcamp/printemr',
    type: "POST",
    data: {
        opd_id: opd_id
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