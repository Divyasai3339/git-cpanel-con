<script src="<?php echo base_url(); ?>backend/plugins/ckeditor/ckeditor.js"></script>
<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();

?>
<style type="text/css">
.badge.w_op{
    background-color:red !important;
}
.badge.w_dr{
    background-color:red !important;
}
.badge.c_op{
    background-color:blue !important;
}
.badge.c_dr{
    background-color:blue !important;
}
/*.badge.t{*/
/*    padding:2px !important;*/
/*    background-color:cadetblue !important;*/
/*}*/
.status_div {

    border:0px solid grey !important;
}



.table-bordered{
    text-align:left !important;
}
</style>
<style>
    @import url(https://fonts.googleapis.com/css?family=Bree+Serif);

      body {
        background:#ebebeb;
      }
      ul.first_gallary {
          padding:0 0 0 0;
          margin:0 0 40px 0;
      }
      ul.first_gallary li {
          list-style:none;
          margin-bottom:10px;
      }

    .first_gallary .text {
      /*font-family: 'Bree Serif';*/
      color:#666;
      font-size:11px;
      margin-bottom:10px;
      padding:12px;
      background:#fff;
    }



  </style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo site_url('backend/plugins/jQuery/gallary/jquery.bsPhotoGallery.css')?>">
<!--new edit modal-->
<div class="modal fade" id="editModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog pup100" role="document">
        <form id="formedit" accept-charset="utf-8" enctype="multipart/form-data" method="post" class="ptt10">
            <div class="modal-content modal-media-content">
                <div class="modal-header modal-media-header">
                    <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> <?php echo $this->lang->line('edit_visit_details'); ?></h4>
                </div>

            </div>
            <!--./modal-header-->

            <div class="pup-scroll-area">
                <div class="modal-body pt0 pb0">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row row-eq">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div id="ajax_load"></div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="dividerhr"></div>
                                        </div>
                                        <!--./col-md-12-->
                                        <input type="hidden" name="visitid" id="visitid" class="form-control" />
                                        <input type="hidden" name="visit_transaction_id" id="visit_transaction_id" class="form-control" />
                                        <input type="hidden" name="type" id="type" value="opd" class="form-control" />
                                        <div class="col-sm-2 col-xs-4">
                                            <div class="form-group">
                                                <label for="pwd"><?php echo $this->lang->line('height'); ?></label>
                                                <input id="edit_height" name="height" type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-xs-4">
                                            <div class="form-group">
                                                <label for="pwd"><?php echo $this->lang->line('weight'); ?></label>
                                                <input id="edit_weight" name="weight" type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-xs-4">
                                            <div class="form-group">
                                                <label for="pwd"><?php echo $this->lang->line('bp'); ?></label>
                                                <input name="bp" type="text" name="bp" class="form-control" id="edit_bp" />
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-xs-4">
                                            <div class="form-group">
                                                <label for="pwd"><?php echo $this->lang->line('pulse'); ?></label>
                                                <input id="edit_pulse" name="pulse" type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-xs-4">
                                            <div class="form-group">
                                                <label for="pwd"><?php echo $this->lang->line('temperature'); ?></label>
                                                <input id="edit_temperature" name="temperature" type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-xs-4">
                                            <div class="form-group">
                                                <label for="pwd"><?php echo $this->lang->line('respiration'); ?></label>
                                                <input name="respiration" class="form-control" id="edit_respiration" type="text" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="exampleInputFile">
                                                    <?php echo $this->lang->line('symptoms_type'); ?></label>
                                                <div><select name='symptoms_type' id="act" class="form-control select2 act" style="width:100%">
                                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                        <?php foreach ($symptomsresulttype as $dkey => $dvalue) {
                                                        ?>
                                                            <option value="<?php echo $dvalue["id"]; ?>"><?php echo $dvalue["symptoms_type"]; ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span class="text-danger"><?php echo form_error('symptoms_type'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="exampleInputFile">
                                                    <?php echo $this->lang->line('symptoms'); ?></label>
                                                <div id="dd" class="wrapper-dropdown-3">
                                                    <input class="form-control filterinput" type="text">
                                                    <ul class="dropdown scroll150 section_ul">
                                                        <li><label class="checkbox"><?php echo $this->lang->line('select'); ?></label></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('symptoms_description'); ?></label>
                                                <textarea class="form-control" id="symptoms_description" name="symptoms"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="pwd"><?php echo $this->lang->line('note'); ?></label>
                                                <textarea rows="3" class="form-control" id="edit_revisit_note" name="revisit_note"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="email"><?php echo $this->lang->line('any_known_allergies'); ?></label>
                                                <textarea name="known_allergies" rows="3" id="eknown_allergies" placeholder="" class="form-control"><?php echo set_value('address'); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <div id="customfield"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--./row-->

                                </div>
                                <!--./col-md-8-->
                                <div class="col-lg-4 col-md-4 col-sm-4 col-eq ptt10">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('appointment_date'); ?></label>
                                                <small class="req"> *</small>
                                                <input name="appointment_date" class="form-control datetime" id="appointmentdate" placeholder="" type="text" class="form-control datetime" />
                                                <span class="text-danger"><?php echo form_error('appointment_date'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>
                                                    <?php echo $this->lang->line('case'); ?></label>
                                                <div><input class="form-control" type='text' name="case" id="edit_case" />
                                                </div>
                                                <span class="text-danger"><?php echo form_error('case'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>
                                                    <?php echo $this->lang->line('casualty'); ?></label>
                                                <div>
                                                    <select name="casualty" id="edit_casualty" class="form-control">
                                                        <?php foreach ($yesno_condition as $yesno_key => $yesno_value) {
                                                        ?>
                                                            <option value="<?php echo $yesno_key ?>" <?php
                                                                                                        if ($yesno_key == 'no') {
                                                                                                            echo "selected";
                                                                                                        }
                                                                                                        ?>><?php echo $yesno_value ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>

                                                </div>
                                                <span class="text-danger"><?php echo form_error('case'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>
                                                    <?php echo $this->lang->line('old_patient'); ?></label>
                                                <div>
                                                    <select name="old_patient" id="edit_oldpatient" class="form-control">
                                                        <?php foreach ($yesno_condition as $yesno_key => $yesno_value) { ?>
                                                            <option value="<?php echo $yesno_key ?>"><?php echo $yesno_value ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span class="text-danger"><?php echo form_error('case'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>
                                                    <?php echo $this->lang->line('tpa'); ?></label>
                                                <div><select class="form-control" onchange="get_Charges(this.value)" id="edit_organisation" name='organisation'>
                                                        <option value="0"><?php echo $this->lang->line('select'); ?></option>
                                                        <?php foreach ($organisation as $orgkey => $orgvalue) {
                                                        ?>
                                                            <option value="<?php echo $orgvalue["id"]; ?>"><?php echo $orgvalue["organisation_name"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span class="text-danger"><?php echo form_error('refference'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>
                                                    <?php echo $this->lang->line('reference'); ?></label>
                                                <div><input type="text" name="refference" class="form-control" id="edit_refference" />
                                                </div>
                                                <span class="text-danger"><?php echo form_error('refference'); ?></span>
                                            </div>
                                        </div>
                                        <input type="hidden" name="opdid" id="edit_opdid">

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('consultant_doctor'); ?></label><small class="req"> *</small>
                                                <select onchange="" name="consultant_doctor" <?php
                                                                                                if ($disable_option == true) {
                                                                                                    echo "disabled";
                                                                                                }
                                                                                                ?> style="width:100%" class="form-control select2" id="edit_consdoctor">
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>

                                                    <?php foreach ($doctors as $dkey => $dvvalue) { ?>
                                                        <option value="<?php echo $dvvalue["id"] ?>"><?php echo composeStaffNameByString($dvvalue["name"], $dvvalue["surname"], $dvvalue["employee_id"]); ?></option>
                                                    <?php } ?>
                                                </select>
                                                <?php if ($disable_option == true) { ?>
                                                    <input type="hidden" name="consultant_doctor" value="<?php echo $doctor_select ?>">
                                                <?php } ?>
                                            </div>
                                            <span class="text-danger"><?php echo form_error('refference'); ?></span>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('payment_date'); ?></label><small class="req"> *</small>

                                                <input type="text" name="payment_date" id="edit_visit_payment_date" class="form-control datetime" autocomplete="off">
                                                <input type="hidden" class="form-control" id="edit_visit_payment_id" name="edit_payment_id">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('amount') . " (" . $currency_symbol . ")" ?></label><small class="req"> *</small> <input type="text" name="amount" id="edit_visit_payment" class="form-control" value="">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="pwd"><?php echo $this->lang->line('payment_mode'); ?></label>
                                                <select class="form-control visit_payment_mode" name="payment_mode" id="visit_payment_mode">

                                                    <?php foreach ($payment_mode as $key => $value) {
                                                    ?>
                                                        <option value="<?php echo $key ?>" <?php
                                                                                            if ($key == 'cash') {
                                                                                                echo "selected";
                                                                                            }
                                                                                            ?>><?php echo $value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!--  <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="pwd"><?php echo $this->lang->line('paid_amount') . " (" . $currency_symbol . ")"; ?></label><small class="req"> *</small> 
                                                <input type="text" name="paid_amount" id="paid_amount" class="form-control">    
                                                <span class="text-danger"><?php echo form_error('paid_amount'); ?></span>
                                            </div>
                                        </div> -->
                                        <div class="cheque_div" style="display: none;">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label><?php echo $this->lang->line('cheque_no'); ?></label><small class="req"> *</small>
                                                    <input type="text" name="cheque_no" id="edit_visit_cheque_no" class="form-control">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label><?php echo $this->lang->line('cheque_date'); ?></label><small class="req"> *</small>
                                                    <input type="text" name="cheque_date" id="edit_visit_cheque_date" class="form-control date">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label><?php echo $this->lang->line('attach_document'); ?></label>
                                                    <input type="file" class="filestyle form-control" name="document">
                                                    <span class="text-danger"><?php echo form_error('document'); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('payment_note'); ?></label>
                                                <input type="text" name="note" id="edit_visit_payment_note" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--./row-->
                                </div>
                                <!--./col-md-4-->
                            </div>
                            <!--./row-->
                        </div>
                        <!--./col-md-12-->
                    </div>
                    <!--./row-->
                </div>
            </div>

            <div class="box-footer sticky-footer">
                <div class="pull-right">
                    <button type="submit" id="formeditbtn" name="save" data-loading-text="<?php echo $this->lang->line('processing') ?>" class="btn btn-info pull-right"><i class="fa fa-check-circle"></i> <span><?php echo $this->lang->line('save'); ?></span></button>
                </div>
            </div>
        </form>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

<script src="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row"> 
            <div class="col-md-12">
                <div class="box box-primary"> 
                    <div class="box-header with-border">
                         
                         <div class="d-flex justify-content-between" style="background-color: #05386B;">
                             <span style="color:white;font-size: 18px;">EMR</span>
                            <table>
                                <thead><tr>
                                    <th></th>
                                    <th></th></tr></thead>
                                <tbody>
                                    <tr>
                                        <td> <span style="color:white;font-size: 14px;">Checked In Patients : </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                        
                                        </td>
                                        <td><span style="color:white;font-size: 20px;" class="total_rec"></span> </td>
                                    </tr>
                                </tbody>
                             </table>
                             <table>
                                <thead><tr>
                                    <th></th>
                                    <th></th><th></th></tr></thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td> <span style="color:white;font-size: 14px;border-radius: 50%;">Waiting</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                        
                                        <span style="color:white;font-size: 14px;">AR : </span><span style="color:white;font-size: 20px;"class="text-bg-primary rounded-pill w_ar"></span>,
                                        </td>
                                        <td><span style="color:white;font-size: 14px;">, OPT :</span> <span style="color:white;font-size: 20px;" class="text-bg-primary rounded-pill w_op"></span> ,</td>
                                        <td><span style="color:white;font-size: 14px;">, DR :</span> <span style="color:white;font-size: 20px;" class="text-bg-primary rounded-pill w_dr"></span></td>
                                    </tr>
                                </tbody>
                             </table>
                             <table>
                                <thead><tr><th></th><th></th><th></th></tr></thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>
                                             <td> <span style="color:white;font-size: 14px;border-radius: 50%;">Completed</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                             
                                        <span style="color:white;font-size: 14px;">AR :</span> <span style="color:white;font-size: 20px;"class="text-bg-primary rounded-pill c_ar"></span> ,
                                        </td>
                                        <td><span style="color:white;font-size: 14px;">, OPT :</span> <span style="color:white;font-size: 20px;" class="text-bg-primary rounded-pill c_op"></span>,</td>
                                        <td><span style="color:white;font-size: 14px;">, DR :</span> <span style="color:white;font-size: 20px;" class="text-bg-primary rounded-pill c_dr"></span></td>
                                    </tr>
                                </tbody>
                             </table>

                             <div class="col-md-1">
                                 
                             </div>
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
                                        <!--<th></th>-->
                                       
                                    <th><?php echo $this->lang->line('name') ?></th>
                                     <th>Image</th>
                                    <th><?php echo 'OPDID'; ?></th>
                                    <th><?php echo $this->lang->line('guardian_name') ?></th>
                                    <th>Status</th>
                                    <th><?php echo $this->lang->line('gender'); ?></th>
                                    <th><?php echo $this->lang->line('phone'); ?></th>
                                    <th><?php echo $this->lang->line('consultant'); ?></th>
                                    <th><?php echo "Type"; ?></th>
                                    <!--<th><?php echo $this->lang->line('last_visit'); ?></th>   -->
                                     <th>Time lapse</th> 
                                     <th>Dilatation</th> 
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

<div class="modal fade" id="draw_model" tabindex="-1" role="dialog" aria-labelledby="follow_up">
    <div class="modal-dialog modal-mid modal-xl" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modalicon">
                   
                </div>
                <h4 class="modal-title">Draw Pad</h4>
                <button type="button" class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#imageModal"><i class="fa fa-plus"></i>
                                    <?php echo "Lab Images"; ?>
                                </button>
                                <input type="file" id="files" name="files" multiple>
                                <button id="showFilePropertiesButton">Show File Properties</button>
                                <button id="openFolderButton">Open Specific Folder</button>

                    <!--<a href='#'  class='btn btn-primary btn-sm pull-right btnUploadAudiometryImages' data-opd=" . $opd_id . "   data-toggle='tooltip' title='Upload Audiometry Photos'><i class='fa fa-upload'></i> <?php echo 'Add'; ?></a>           -->
            </div>
            <div class="">
                <div class="modal-body pt0 pb0">
                    <div class="some-container" id="">
                        <div id="drawr-container3" style="width:100%;height:600px;border:2px dotted gray;margin:20px;">
                     <canvas class="demo-canvas drawr-test1" id="canvas"></canvas>
                 </div>
                   </div>
                   <input type="hidden" id="opid_tag">
                   
                    
                   <input type="file" id="file-picker" style="display:none;">
                </div>
                <div class="modal-footer sticky-footer">
                    <div class="pull-right">
                        <!-- <button type="button" name="save" value="save" data-loading-text="<?php echo $this->lang->line('processing'); ?>" class="btn btn-info save_draw"><i class="fa fa-check-circle"></i> <?php echo $this->lang->line('save'); ?>
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="view_raw_model" tabindex="-1" role="dialog" aria-labelledby="follow_up">
    <div class="modal-dialog modal-mid modal-xl" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modalicon">
                   
                </div>
                <h4 class="modal-title">Draw Pad</h4>
            </div>
            <div class="pup-scroll-area">
                <div class="modal-body pt0 pb0">
                   <div id="img_div_res">
                       <ul class="first_gallary"></ul>
                   </div>
                </div>
                <div class="modal-footer sticky-footer">
                    <div class="pull-right">
                        <!-- <button type="button" name="save" value="save" data-loading-text="<?php echo $this->lang->line('processing'); ?>" class="btn btn-info save_draw"><i class="fa fa-check-circle"></i> <?php echo $this->lang->line('save'); ?>
                        </button> -->
                        <button type="button" class="close pupclose" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div id="imageCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              </div>
            <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="viewAudiometryFiles" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-md" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                 <h4 class="modal-title">Library</h4>
                
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                
                <img src="https://sivaeyehospital.com/uploads/printing/emr_print.jpeg" class="img-responsive" style="height:200px; width: 200px;">
                
                <div class="audiometryFiless" style="text-align:-webkit-center">

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

<script src="https://www.jqueryscript.net/demo/Minimal-Stopwatch-Timer-Plugin-For-jQuery/dist/timer.jquery.min.js"></script>
<script src="<?php echo site_url('backend/plugins/jQuery/draw/jquery.drawr.combined.js')?>"></script>
<script src="<?php echo site_url('backend/plugins/jQuery/gallary/jquery.bsPhotoGallery.js')?>"></script>
<script>
const showFilePropertiesButton = document.getElementById('showFilePropertiesButton');
const filesInput = document.getElementById('files');

showFilePropertiesButton.addEventListener('click', () => {
  const selectedFiles = filesInput.files;

  if (selectedFiles.length > 0) {
    for (const file of selectedFiles) {
      alert(`File name: ${file.name}, Size: ${file.size / 1024} KB, Type: ${file.type}`);
    }
  } else {
    alert('No files selected.');
  }
});
</script>
<script>
const openFolderButton = document.getElementById('openFolderButton');
const specificFolderPath = 'C:\Wallpepar'; // Replace with your actual folder path

openFolderButton.addEventListener('click', () => {
    
  const link = document.createElement('a');
  link.href = specificFolderPath;
  link.click();
});
</script>
<script type="text/javascript">

  // Click event handler for images with the "audiometryImageView" class
  $('.audiometryImageView').click(function() {
    // Clear existing carousel items
    $('#imageCarousel .carousel-inner').empty();

    // Get the directory path
    var directoryPath = 'upload/lab_images';

    // AJAX request to fetch image paths
    $.ajax({
      url: '/your-image-path-fetching-endpoint', // Replace with your endpoint URL
      method: 'GET',
      data: { directory: directoryPath }, // Optionally send directory path as a parameter
      success: function(response) {
        // Process the response (array of image paths)
        var imagePaths = response.images; // Adjust property name based on your endpoint's response format

        // Create carousel items for each image
        $.each(imagePaths, function(index, imagePath) {
          var carouselItem = `
            <div class="carousel-item ${index === 0 ? 'active' : ''}">
              <img class="d-block w-100" src="${imagePath}" alt="${imagePath}">
            </div>`;
          $('#imageCarousel .carousel-inner').append(carouselItem);
        });

        // Show the modal
        $('#imageModal').modal('show');
      },
      error: function(error) {
        console.error("Error fetching image paths:", error);
        // Handle errors appropriately, e.g., display an error message to the user
      }
    });
  });
  
var base_url = '<?php echo base_url(); ?>';
( function ( $ ) {
    'use strict';
    $(document).ready(function () {
        initDatatable('ajaxlist','admin/optometry/getOptometryPatientsDataTable',[],[],100);
        
    });
} ( jQuery ) )
</script>
<script type="text/javascript">
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
    function openDraw(op_id){

    $('#opid_tag').val('');
    $('#opid_tag').val(op_id);
    init_canvas1()
    $('#draw_model').modal('show');
}
function viewImages(opdid){
    $.ajax({
          url: '<?php echo base_url("admin/optometry/getDrawImg/");?>/'+opdid,
          type: 'GET',
          cache: false,
          processData: false, // important
          contentType: false, // important
          dataType : 'json',
          success:function(data){
            
            $('.first_gallary').html('');
            if(data!=null && data.length>0)
            {
                var str='';
                $.each(data,function(k,v){
                    str+=`<li>
                           <img alt="Night away"  src="<?php echo site_url('/');?>`+v.img_path+`">
                           <p class="text">Optional text. This will also show in the modal</p>
                       </li>`;
                })
                $('.first_gallary').html(str);
                $('.first_gallary').bsPhotoGallery({
                "classes" : "col-lg-2 col-md-4 col-sm-3 col-xs-4 col-xxs-12",
                "hasModal" : true
              });
            }
            
            $('#view_raw_model').modal('show');
          }
        });
}
$(document).on('click','.save_draw',function(){
    
    var rawCode=$("#canvas").drawr("export","image/png");
    console.log(rawCode)
    var myFormData = new FormData();
    var opid=$('#opid_tag').val();

    myFormData.append('pictureFile', rawCode);
    myFormData.append('opid',opid)

    $.ajax({
      url: '<?php echo base_url("admin/optometry/saveDraw");?>',
      type: 'POST',
      cache: false,
      processData: false, // important
      contentType: false, // important
      dataType : 'json',
      data: myFormData,
      success:function(data){
        if(data.hasOwnProperty('status') && data.status===true)
        {
            alert(data.msg)
            window.location.href='';
        }
        else
        {
            alert(data.msg)
        }
      }
    });

})
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

var prescription_rows = 2;

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

    // $(document).on('select2:select', '.medicine_category', function() {
    //     getMedicine($(this), $(this).val(), 0);
    //     selected_medicine_category_id = $(this).val();
    //     var medicine_dosage = getDosages(selected_medicine_category_id);
    //     $(this).closest('tr').find('.medicine_dosage').html(medicine_dosage);

    // });


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
             url: base_url + "admin/prescription/getPrescriptionComplaintData",
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

 $(document).on('click', '.add-record', function() {

var rowCount = $('#tableID tr').length;

// var prescription_rows=rowCount+1;
var cat_row = "";
var medicine_row = "";
var dose_row = "";
var dose_interval_row = "";
var dose_duration_row = "";
var instruction_row = "";
var closebtn_row = "";
if (rowCount == 0) {
    cat_row = "<label><?php echo $this->lang->line('medicine_category'); ?></label>";
    medicine_row = "<label><?php echo $this->lang->line('medicine'); ?></label>";
    dose_row = " <label><?php echo $this->lang->line("dose"); ?></label>";
    dose_interval_row = " <label><?php echo $this->lang->line("dose_interval"); ?></label>";
    dose_duration_row = " <label><?php echo $this->lang->line("dose_duration"); ?></label>";
    instruction_row = " <label><?php echo $this->lang->line("instruction"); ?></label>";
    closebtn_row = " <label>&nbsp;</label>";
}

var div = "<input type='hidden' name='rows[]' value='" + prescription_rows + "' autocomplete='off'><div id=row1><div class='col-lg-2 col-md-4 col-sm-6 col-xs-6'><div col-sm-2 col-xs-6 '>" + cat_row + " <select class='form-control select2 medicine_category'  name='medicine_cat_" + prescription_rows + "'  id='medicine_cat" + prescription_rows + "'><option value='<?php echo set_value('medicine_category_id'); ?>'><?php echo $this->lang->line('select'); ?></option><?php foreach ($medicineCategory as $dkey => $dvalue) { ?><option value='<?php echo $dvalue["id"]; ?>'><?php echo $dvalue["medicine_category"] ?></option><?php } ?></select></div></div><div class='col-lg-2 col-md-4 col-sm-6 col-xs-6'><div>" + medicine_row + " <select class='form-control select2 medicine_name' data-rowId='" + prescription_rows + "'  name='medicine_" + prescription_rows + "' id='search-query" + prescription_rows + "'><option value='l'><?php echo $this->lang->line('select') ?></option></select><small id='stock_info_" + prescription_rows + "''> </small></div></div><div class='col-lg-2 col-md-4 col-sm-6 col-xs-6'><div>" + dose_row + "<select  class='form-control select2 medicine_dosage' name='dosage_" + prescription_rows + "' id='search-dosage" + prescription_rows + "'><option value='l'><?php echo $this->lang->line('select'); ?></option></select></div></div><div class='col-lg-2 col-md-4 col-sm-6 col-xs-6'><div>" + dose_interval_row + "<select  class='form-control select2 interval_dosage' name='interval_dosage_" + prescription_rows + "' id='search-interval-dosage" + prescription_rows + "'><option value='<?php echo set_value('interval_dosage_id'); ?>'><?php echo $this->lang->line('select'); ?></option><?php foreach ($intervaldosage as $dkey => $dvalue) { ?><option value='<?php echo $dvalue["id"]; ?>'><?php echo $dvalue["name"] ?></option><?php } ?></select></div></div><div class='col-lg-2 col-md-4 col-sm-6 col-xs-6'><div> " + dose_duration_row + "<select class='form-control select2 duration_dosage' name='duration_dosage_" + prescription_rows + "' id='search-duration-dosage" + prescription_rows + "'><option value='<?php echo set_value('duration_dosage_id'); ?>'><?php echo $this->lang->line('select') ?></option><?php foreach ($durationdosage as $dkey => $dvalue) { ?><option value='<?php echo $dvalue["id"]; ?>'><?php echo $dvalue["name"] ?></option><?php } ?></select></div></div><div class='col-lg-2 col-md-4 col-sm-6 col-xs-6'><div>" + instruction_row + "<textarea style='height:28px' name='instruction_" + prescription_rows + "' class=form-control id=description></textarea></div></div></div>";

var row = "<tr id='row" + prescription_rows + "'><td>" + div + "</td><td>" + closebtn_row + "<button type='button' data-row-id='" + prescription_rows + "' class='closebtn delete_row'><i class='fa fa-remove'></i></button></td></tr>";
$('#tableID').append(row).find('.select2').select2();
prescription_rows++;
});



function delete_row(id) {
var table = document.getElementById("tableID");
var rowCount = table.rows.length;
$("#row" + id).html("");

}
$(document).on('click', '.delete_row', function(e) {

var del_row_id = $(this).data('rowId');
var del_record_id = $(this).data('recordId');
var result = confirm("<?php echo $this->lang->line('delete_confirm') ?>");

if (result) {
    $("#row" + del_row_id).remove();
     if(del_record_id!=''){
        delete_slected_medicine(del_record_id);
    }
}

});


function delete_slected_medicine(del_record_id){

$.ajax({
        url: "<?php echo site_url("admin/prescription/delete_slected_medicine") ?>",
        type: "POST",
        dataType: 'json',
        data: {del_record_id : del_record_id},
        success: function(data) {
            if (data.status == "fail") {
                var message = "";
                errorMsg(message);
            } else {
                successMsg(data.msg);
            }
        },
        error: function(e) {
            alert("<?php echo $this->lang->line('fail'); ?>");
            console.log(e);
        }
    });

}


$(document).on('select2:select', '.medicine_category', function() {
        getMedicine($(this), $(this).val(), 0);
        selected_medicine_category_id = $(this).val();
        var medicine_dosage = getDosages(selected_medicine_category_id);
        $(this).closest('tr').find('.medicine_dosage').html(medicine_dosage);

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

// checkout
$(document).on('click', '.check', function() {
          var opds = [];
           if(confirm("Are you sure want to checkout EMR?")){

            $("input[name='opdids[]']").each(function (index, obj) {
                if($(this).prop('checked') == true){
                    opds.push($(this).val());
                 }
            });

            $.ajax({
                type: 'POST',
                url: base_url + 'admin/optometry/opdMoveToDischarge',
                data: {
                    'opds': opds
                },
                dataType: 'JSON',
                beforeSend: function() {},
                success: function(data) {
                    $('.ajaxlist').DataTable().ajax.reload();
                },
                error: function(xhr) { // if error occured
                    alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");

                },
                complete: function() {

                }

            });
        }else{
            return false;
        }
});

function editRecord(visitid) {
       
      
        $.ajax({ 
            url: base_url+'admin/patient/getopdvisitdetails',
            type: "GET",
            data: {visitid: visitid},
            dataType: 'json',
            success: function (data) {
                $('#visitid').val(visitid);
                $('#visit_transaction_id').val(data.transaction_id);
                $('#customfield').html(data.custom_fields_value);
                $("#patientid").val(data.patient_id);
                $("#patientname").val(data.patient_name);
                $("#appointmentdate").val(data.appointment_date);
                $("#edit_case").val(data.case_type);
                $("#symptoms_description").val(data.symptoms);
                $("#edit_casualty").val(data.casualty);
                $("#edit_knownallergies").val(data.known_allergies);
                $("#edit_refference").val(data.refference);
                $("#edit_revisit_note").html(data.note);
                $("#edit_amount").val(data.apply_charge);
                $('select[id="edit_oldpatient"] option[value="' + data.patient_old + '"]').attr("selected", "selected");
                $("#edit_height").val(data.height);
                $("#edit_weight").val(data.weight);
                $("#edit_bp").val(data.bp);
                $("#edit_pulse").val(data.pulse);
                $("#edit_temperature").val(data.temperature);
                $("#edit_respiration").val(data.respiration);
                $("#edit_opdid").val(data.opdid);

                 $("#eknown_allergies").val(data.visit_known_allergies);
                 $("#edit_visit_payment_date").val(data.payment_date);
                 $("#edit_visit_payment").val(data.amount);
                 $("#visit_payment_mode").val(data.payment_mode).prop('selected');
                 $(".visit_payment_mode").trigger('change');
                 $("#edit_visit_cheque_no").val(data.cheque_no);
                 $("#edit_visit_cheque_date").val(data.cheque_date);
                 $("#edit_visit_payment_note").val(data.payment_note);
                //$("#viewModal").modal('hide');
                 
                $('select[id="edit_organisation"] option[value="'+data.organisation_id+'"]').attr("selected","selected");
                $('select[id="edit_consdoctor"] option[value="'+data.cons_doctor+'"]').attr("selected","selected");
                
                holdModal('editModal');
            },
        });
    }
function holdModal(modalId) {
    $('#' + modalId).modal({backdrop: 'static',keyboard: false,show: true});
}

function init_canvas1(){
    $("#canvas").drawr({
        "enable_scrollwheel_zooming":false
    });
    
    $(".demo-canvas").drawr("start");

    var buttoncollection = $("#canvas").drawr("button", {
        "icon":"mdi mdi-folder-open mdi-24px"
    }).on("touchstart mousedown",function(){
        //alert("demo of a custom button with your own functionality!");
        $("#media_images").click();
    });
    var buttoncollection = $("#canvas").drawr("button", {
        "icon":"mdi mdi-content-save mdi-24px"
    }).on("touchstart mousedown",function(){
        /*var imagedata = $("#canvas").drawr("export","image/png");
        var element = document.createElement('a');
        element.setAttribute('href', imagedata);// 'data:text/plain;charset=utf-8,' + encodeURIComponent("sillytext"));
        element.setAttribute('download', "test.png");
        element.style.display = 'none';
        document.body.appendChild(element);
        element.click();
        document.body.removeChild(element);*/

         var rawCode=$("#canvas").drawr("export","image/png");
            var myFormData = new FormData();
            var opid=$('#opid_tag').val();

            myFormData.append('pictureFile', rawCode);
            myFormData.append('opid',opid)

            $.ajax({
              url: '<?php echo base_url("admin/optometry/saveDraw");?>',
              type: 'POST',
              cache: false,
              processData: false, // important
              contentType: false, // important
              dataType : 'json',
              data: myFormData,
              success:function(data){
                if(data.hasOwnProperty('status') && data.status===true)
                {
                    alert(data.msg)
                    window.location.href='';
                }
                else
                {
                    alert(data.msg)
                }
              }
            });
    });
    $("#file-picker")[0].onchange = function(){
        var file = $("#file-picker")[0].files[0];
        if (!file.type.startsWith('image/')){ return }
        var reader = new FileReader();
        reader.onload = function(e) { 
            $("#canvas").drawr("load",e.target.result);
        };
        reader.readAsDataURL(file);
    };
}



</script>

<script>

    $(document).ready(function () {
        var popup_target = 'media_images';
        var date_format = '<?php echo $result = strtr($this->customlib->getHospitalDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy']) ?>';

        $('.date').datepicker({

            format: date_format,
            autoclose: true
        });



        CKEDITOR.replace('editor1',
                {
                    fullPage: true,
                    allowedContent: true

                });
        $('#mediaModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });
        $(document).on('click', '.feture_image_btn', function (event) {

            $("#mediaModal").modal('toggle', $(this));
        });
        $('#mediaModal').on('show.bs.modal', function (event) {
            var a = $(event.relatedTarget) // Button that triggered the modal
            popup_target = a[0].id;
            var button = $(event.relatedTarget) // Button that triggered the modal
            console.log(button);
            var $modalDiv = $(event.delegateTarget);
            $('.modal-media-body').html("");
            $.ajax({
                type: "POST",
                url: baseurl + "admin/front/media/getMedia",
                dataType: 'text',
                data: {},
                beforeSend: function () {

                    $modalDiv.addClass('modal_loading');
                },
                success: function (data) {
                    console.log(data);
                    $('.modal-media-body').html(data);
                },
                error: function (xhr) { // if error occured
                    $modalDiv.removeClass('modal_loading');
                },
                complete: function () {
                    $modalDiv.removeClass('modal_loading');
                },
            });
        });

        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });

        $(document).on('click', '.img_div_modal', function (event) {
            $('.img_div_modal div.fadeoverlay').removeClass('active');
            $(this).closest('.img_div_modal').find('.fadeoverlay').addClass('active');

        });

        $(document).on('click', '.add_media', function (event) {
            var content_html = $('div#media_div').find('.fadeoverlay.active').find('img').data('img');
            var is_image = $('div#media_div').find('.fadeoverlay.active').find('img').data('is_image');
            var content_name = $('div#media_div').find('.fadeoverlay.active').find('img').data('content_name');
            var content_type = $('div#media_div').find('.fadeoverlay.active').find('img').data('content_type');
            var vid_url = $('div#media_div').find('.fadeoverlay.active').find('img').data('vid_url');
            var content = "";

            if (popup_target === "media_images") {
                if (typeof content_html !== "undefined") {
                    if (is_image === 1) {
                        content = '<img src="' + content_html + '">';
                    } else if (content_type == "video") {

                        var youtubeID = YouTubeGetID(vid_url);


                        content = '<iframe id="video" width="420" height="315" src="//www.youtube.com/embed/' + youtubeID + '?rel=0" frameborder="0" allowfullscreen></iframe>';

                    } else {
                        content = '<a href="' + content_html + '">' + content_name + '</a>';

                    }
                    InsertHTML(content);
                    $('#mediaModal').modal('hide');
                }
            } else {
                if (is_image === 1) {


                    addImage(content_html);
                } else {
                    //error show
                }
                $('#mediaModal').modal('hide');
            }

        });

        function YouTubeGetID(url) {
            var ID = '';
            url = url.replace(/(>|<)/gi, '').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
            if (url[2] !== undefined) {
                ID = url[2].split(/[^0-9a-z_\-]/i);
                ID = ID[0];
            } else {
                ID = url;
            }
            return ID;
        }

        $(document).on("click", ".pagination li a", function (event) {
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_country_data(page);
        });
    });
    function addImage(content_html) {
        $('.feature_image_url').attr('src', content_html);
        $('#image').val(content_html);
        $('#image_preview').css("display", "block");
    }


    $(document).on('click', '.delete_media', function () {
        $('.feature_image_url').attr('src', '');
        $('#image').val('');
        $('#image_preview').css("display", "none");
    });

    function InsertHTML(content_html) {
        console.log(content_html);
        // Get the editor instance that we want to interact with.
        var editor = CKEDITOR.instances.editor1;


        // Check the active editing mode.
        if (editor.mode == 'wysiwyg')
        {
            editor.insertHtml(content_html);
        } else
            alert('You must be in WYSIWYG mode!');
    }



</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.btnUploadAudiometryImages', function(e) {
            alert("FF");
            e.preventDefault();
            var opd = $(this).data('opd');
            $('#audiometryopdid').val('');
            $('#audiometryfiles').attr('data-opd', opd);
            $('#audiometryopdid').val(opd);
            $('#UploadAudiometryFilesModal').modal('toggle');
            loadAudiometryFiles(opd)
        })
        $(document).on('submit', '#addAudiometryComments', function(e) {
            e.preventDefault();
            var opd = $('#audiometryopdid').val();
            var comments = $('#audiometrycomments').val();

            $.ajax({
                url: "<?php echo base_url('admin/audiometry/saveComments') ?>",
                type: "POST",
                data: {
                    'comments': comments,
                    'opd_id': opd
                },
                dataType: 'Json',
                beforeSend: function() {

                },
                success: function(data, textStatus, jqXHR) {
                    if (data.flag === 1) {
                        successMsg(data.msg);
                    } else if (data.flag == 2) {
                        errorMsg(data.msg);
                    } else {
                        errorMsg(data.msg);
                    }

                },

                complete: function() {

                },
                error: function(jqXHR, textStatus, errorThrown) {

                }
            });
        })
        $(document).on('click', '.printAudiometry', function(e) {
           // e.preventDefault();
            var opd = $('#audiometryopdid').val();
            $.ajax({
                url: "<?php echo base_url('admin/audiometry/printAudiometry') ?>",
                type: "POST",
                data: {
                    'opd_id': opd
                },
                success: function(data) {
                       popup(data);
                },
            });

        })
        $("#audiometryfiles").change(function(e) {
            var opd = $(this).data('opd');
            var fd = new FormData();
            var fileInput = document.getElementById('audiometryfiles');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.mp4|\.mov|\.flv|\.wmv|\.avi|\.mpg|\.mpeg|\.rm|\.ram|\.swf|\.ogg|\.webm|\.mkv|\.wav|\.mp3|\.aac)$/i;
            if (allowedExtensions.exec(filePath)) {
                errorMsg('File Type not allowed');
                fileInput.value = '';
                return false;
            }
            var ins = fileInput.files.length;
            for (var x = 0; x < ins; x++) {
                fd.append("audiometryfiles[]", document.getElementById('audiometryfiles').files[x]);
            }
            fd.append('opd_id', opd);
            uploadAudiometryFiles(fd, opd);
        });
        $(document).on('click', '.delete_audiometry_image', function() {
            var $this = $('.btn_delete');

            var record_id = $(this).data('record_id');
            var opd = $(this).data('opd');
            if (confirm('Do you really want to delete this file')) {

                $.ajax({
                    url: "<?php echo base_url('admin/audiometry/deleteImage') ?>",
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
                            loadAudiometryFiles(opd);

                        } else {
                            errorMsg(data.msg);
                            loadAudiometryFiles(opd);
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

       
        // $(document).on('click', '.audiometryImageView', function(e) {
        //     e.preventDefault();
        //     var path = '<?php echo base_url('uploads/lab_images/'); ?>';
        //     $('#viewAudiometryFiles').modal('toggle');
        //     $('.audiometryFiless').empty().html('<img class="img-responsive" src="' + path + '/' + image + '"/>');

        // })
    })

    function uploadAudiometryFiles(formdata, opdid) {
        var urls = baseurl + "admin/audiometry/uploadAudiometryFiles";
        $.ajax({
            url: urls,
            type: 'post',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            // dataType: "html",
            success: function(response) {
                if (response.flag == 0) {
                    loadAudiometryFiles(opdid);
                    errorMsg(response.msg);
                } else {
                    loadAudiometryFiles(opdid);
                    successMsg(response.msg);
                }

            },
            beforeSend: function() {

            },
            complete: function() {


            }
        });
    }

    function loadAudiometryFiles(opdid) {

        $.ajax({
            url: "<?php echo base_url(); ?>admin/audiometry/getAudiometryFiles",
            method: "POST",
            data: {
                'opd_id': opdid
            },
            dataType: "json",
            beforeSend: function() {
                $('#audiometryfiles .row').empty();
                $('#audiometrycomments').val('');
            },
            
            success: function(data) {
                // console.log(data);

                $('#audiometryfiles .row').empty();
                     var html = "";
                if (data.flag == 1) {
                   
                    if (Object.keys(data.data).length > 0) {
                        $.each(data.data, function(index, value) {
                            html += value;
                        });
                    }
                    // console.log(html);
                    $('#audiometrycomments').val(data.comments);

                } else {
                    html += '<div class="col-md-12">Upload Files ...</div>';
                }
                $("#audiometryfiles .row").empty().html(html);
            },
            complete: function() {


            }
        });
    }
    
    
</script>




<div class="modal fade" id="UploadAudiometryFilesModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="optometry_title">Audiometry</h4>
            </div>
            <div class="modal-body ">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="mailbox-controls">
                                <form method="post" action="#" id="fileupload">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('upload_your_file'); ?></label>
                                        <div class="files">
                                            <input type="file" name="audiometryfiles[]" class="form-control" id="audiometryfiles" data-opd="" multiple="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--./col-md-6-->
                        <div class="col-md-6 col-sm-6">
                            <form method="post" action="#" id="addAudiometryComments">
                                <div class="form-group">
                                    <label>Comments</label>
                                    <div class="">
                                        <input type="hidden" class="audiometryopdid" id="audiometryopdid" value="" />
                                        <textarea name="audiometrycomments" class="form-control" id="audiometrycomments" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button"  class="btn btn-primary printAudiometry"><i class="fa fa-print" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    <div id="audiometryfiles">
                        <div class="row">

                        </div>
                    </div>
                </div>
                <!--./box-body-->

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mediaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog pup100" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title modal-media-title" id="myModalLabel"><?php echo "Images"; ?></h4>
            </div>
            <div class="modal-body modal-media-body pupscroll">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
                <button type="button" class="btn btn-primary add_media"><?php echo $this->lang->line('add'); ?></button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/optometry/optometryProfile'); ?>
<?php $this->load->view('admin/audiometry/audiometryProfile'); ?>
<?php $this->load->view('admin/master/addMasterModal'); ?>
<?php $this->load->view('admin/master/loadMasterDataJs'); ?>
