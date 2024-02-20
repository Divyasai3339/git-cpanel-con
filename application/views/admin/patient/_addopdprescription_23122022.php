<style>
    .presc_complaint_data {
        max-height: 200px;
        overflow-y: scroll;
    }

    .presc_complaint_data .list-group-item {
        padding: 5px 5px 0px 5px;
    }
    .add_master_icons {
        cursor: pointer;
        font-size: 18px;
        color: blue;
    }
</style>

<input type="hidden" name="visit_details_id" value="<?php echo $visit_details_id;?>">
<input type="hidden" name="action" value="add">
<input type="hidden" name="ipd_prescription_basic_id" value="0">
                <div class="row">
                    <div class="col-sm-9">
                    <div class="ptt10">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('header_note'); ?></label> 
                                    <textarea style="height:50px"  name="header_note" class="form-control" id="compose-textareaneww" ></textarea>
                                </div> 
                                <hr/>
                            </div>
                            <div class="col-sm-12">
                    <h5><b>History</b></h5>
                    <div class="presc_history_container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=" ">
                                        Tx/Sx</label>
                                    <div><select name='disease[]' id="disease" class="form-control select2 disease" style="width:100%">
                                            <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                            </option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Duration</label>
                                            <div>
                                                <input type="text" class="form-control" name="duration[]" id="duration" class="duration" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Period</label>
                                            <select name='period[]' id="period" class="form-control select2 period" style="width:100%">
                                                <option value="Days">
                                                    Days
                                                </option>
                                                <option value="Months">
                                                    Months
                                                </option>
                                                <option value="Years">
                                                    Years
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=" ">
                                        Medication</label>
                                    <div>
                                        <input type="text" class="form-control" name="medication[]" id="medication" class="medication" />
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=" ">
                                        Condition</label>
                                    <div><input type="text" name='condition[]' id="condition" class="form-control  condition" style="width:100%">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary addPrescNewHistory"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
                    </div>
                    <hr />
                </div>

                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('complaints_category'); ?></label>
                                                <select class="form-control select2 complaintstype" style="width: 100%" name='complaint_type_id' id="complaints_type">
                                                    <option value=""><?php echo $this->lang->line('select'); ?> </option>
                                                    <?php
                                                    foreach ($complaintstype as $fvalue) {
                                                    ?>
                                                        <option value="<?php echo $fvalue["id"]; ?>"><?php echo $fvalue["category"] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <label for="filterinput">
                                                <?php echo $this->lang->line('complaints_list'); ?></label>
                                            <div id="dd" class="wrapper-dropdown-3">
                                                <input class="form-control filterinput" type="text">
                                                <ul class="dropdown scroll150 section_ul">
                                                    <li><label class="checkbox"><?php echo $this->lang->line('select'); ?></label></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('complaints_description'); ?></label>
                                                <textarea name="complaints_description" id="complaints_description" class="form-control"> </textarea>
                                            </div>
                                        </td>
                                        <td> <label><?php echo $this->lang->line('complaints_print'); ?> </label><br /><input type="checkbox" name="complaints_print" value="yes" checked></td>
                                    </tr>
                                </table>
                            </div>


                             <div class="col-sm-12">  
                                <table class="table table-striped table-bordered table-hover" >
                                    <tr>
                                        <td><div class="form-group">
                                            <label><?php echo $this->lang->line('finding_category'); ?></label>
                                            <select class="form-control select2 findingtype" style="width: 100%" name='finding_type_id' id="finding_type">
                                                <option value=""><?php echo $this->lang->line('select'); ?> </option>
                                                <?php
                                                foreach ($findingtype as $fvalue) {
                                                ?>
                                                <option value="<?php echo $fvalue["id"]; ?>"><?php echo $fvalue["category"] ?>
                                                            </option>   
                                                        <?php } ?>
                                             </select>
                                            </div>
                                        </td>
                                        <td>
                                           
                                                <label for="filterinput"> 
                                                    <?php echo $this->lang->line('finding_list'); ?></label>
                                                <div id="dd" class="wrapper-dropdown-3">
                                                    <input class="form-control filterinput" type="text">
                                                    <ul class="dropdown scroll150 section_ul">
                                                        <li><label class="checkbox"><?php echo $this->lang->line('select'); ?></label></li>
                                                    </ul>
                                                </div>
                                           
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                 <label><?php echo $this->lang->line('finding_description'); ?></label>
                                                    <textarea name="finding_description" id="finding_description"  class="form-control"> </textarea> 
                                            </div>
                                        </td>
                                        <td>  <label><?php echo $this->lang->line('finding_print'); ?> </label><br/><input type="checkbox" name="finding_print" value="yes" checked></td>
                                    </tr>
                                </table>
                            </div>

                              
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-11"><label for="opd_procedure">
                                    Examinations</label></div>
                            <div class="col-md-1 text-right">
                                <span class="fa fa-plus add_master_icons add_examination" data-type="examinations"></span>
                            </div>
                        </div>
                        <select name="examinations[]" id="examinations" multiple="multiple" class="form-control  examinations" style="width:100%">
                            <option value="">Select</option>
                        </select>
                    </div>
                    <hr />
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-11"><label for="opd_procedure">
                                    Diagnosis</label></div>
                            <div class="col-md-1 text-right">
                                <span class="fa fa-plus add_master_icons add_diagnosis" data-type="diagnosis"></span>
                            </div>
                        </div>
                        <select name="diagnosis[]" id="diagnosis" multiple="multiple" class="form-control  diagnosis" value="['test_no_4']" style="width:100%">
                            <option value="">Select</option>
                        </select>
                    </div>
                    <hr />
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-11"><label for="opd_procedure">
                                    OPD Procedure</label></div>
                            <div class="col-md-1 text-right">
                                <span class="fa fa-plus add_master_icons add_opd_procedure" data-type="opd_procedure"></span>
                            </div>
                        </div>
                        <select name="opd_procedure[]" id="opd_procedure" multiple="multiple" class="form-control  opd_procedure" style="width:100%">
                            <option value="">Select</option>
                        </select>
                    </div>
                    <hr />
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-11"><label for="opd_procedure">
                                    Surgery Recommendations</label></div>
                            <div class="col-md-1 text-right">
                                <span class="fa fa-plus add_master_icons add_surgery_recommendations" data-type="surgery_recommendations"></span>
                            </div>
                        </div>
                        <select name="surgery_recommendations[]" id="surgery_recommendations" multiple="multiple" class="form-control  surgery_recommendations" style="width:100%">
                            <option value="">Select</option>
                        </select>
                    </div>
                    <hr />
                </div>
                              
                                <table class="table table-striped table-bordered table-hover mb0" id="tableID">
                                <tr id="row1">
                                        <td> 
                                        <input type="hidden" name="rows[]" value="1">          
                                            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                                <div class="">
                                                    <label>
                                                <?php echo $this->lang->line('medicine_category'); ?></label> 
                                                <select class="form-control select2 medicine_category" style="width: 100%" name='medicine_cat_1'>
                                                <option value="<?php echo set_value('medicine_category_id'); ?>"><?php echo $this->lang->line('select'); ?>
                                                        </option>
                                                <?php
                                                foreach ($medicineCategory as $dkey => $dvalue) {
                                                ?>
                                                <option value="<?php echo $dvalue["id"]; ?>"><?php echo $dvalue["medicine_category"] ?>
                                                            </option>   
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>                      
                                            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                                <div class="">
                                                    <label><?php echo $this->lang->line('medicine'); ?></label>
                                                    <select class="form-control select2 medicine_name" data-rowid="1" style="width: 100%"  name="medicine_1">
                                                        <option value=""><?php echo $this->lang->line('select');?></option>
                                                    </select>
                                                    <div id="suggesstion-box0"><small id="stock_info_1"> </small></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                                <div class="">
                                                    <label><?php echo $this->lang->line("dose"); ?></label>
                                                    <select class="form-control select2 medicine_dosage" style="width: 100%"  name="dosage_1">
                                                <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    </select>
                                                </div> 
                                            </div>
                                            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                                <div class="">
                                                <label><?php echo $this->lang->line("dose_interval"); ?></label> 
                                                <select class="form-control  select2 interval_dosage" style="width:100%" id="interval_dosage_id" name='interval_dosage_1'>
                                                        <option value="<?php echo set_value('interval_dosage_id'); ?>"><?php echo $this->lang->line('select') ?>
                                                        </option>
                                                            <?php foreach ($intervaldosage as $dkey => $dvalue) {
                                                            ?>
                                                            <option value="<?php echo $dvalue["id"]; ?>"><?php echo $dvalue["name"] ?>
                                                            </option>
                                                                    <?php }?>
                                                        </select>   
                                                        <span class="text-danger"><?php echo form_error('interval_dosage_id'); ?></span>
                                                </div> 
                                            </div>
                                            
                                            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                                <div class="">
                                                    <label><?php echo $this->lang->line("dose_duration"); ?></label> 
                                                <select class="form-control  select2" style="width:100%" id="interval_dosage_id" name='duration_dosage_1'>
                                                        <option value="<?php echo set_value('interval_dosage'); ?>"><?php echo $this->lang->line('select') ?>
                                                        </option>
                                                            <?php foreach ($durationdosage as $dkey => $dvalue) {
                                                            ?>
                                                            <option value="<?php echo $dvalue["id"]; ?>"><?php echo $dvalue["name"] ?>
                                                            </option>
                                                                    <?php }?>
                                                        </select>   
                                                        <span class="text-danger"><?php echo form_error('interval_dosage_id'); ?></span>
                                                </div> 
                                            </div>
                                            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                                <div class="">
                                                    <label><?php echo $this->lang->line('instruction'); ?></label> 
                                                    <textarea name="instruction_1" style="height: 28px;" class="form-control" ></textarea>
                                                </div> 
                                            </div>
                                        </td>
                                        <td>    
                                            <button type="button" class="closebtn delete_row crossbtnfa"  data-row-id="1" autocomplete="off"><i class="fa fa-remove"></i></button>
                                        </td>
                                    </tr>
                                </table>            
                          
                            <div class="col-sm-12">
                                     <a class="btn btn-info add-record addplus-xs" data-added="0"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add_medicine');?></a>
                                <hr>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('footer_note'); ?></label> 
                                    <textarea style="height:50px" rows="1" name="footer_note" class="form-control" id="compose-textareass"></textarea>
                                </div> 
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="col-sm-3">
                    <div class="ptt10">
                    <div class="col-sm-12">
                        <div class="form-group">
                        <label>
                             <?php echo $this->lang->line('pathology'); ?></label>
                            
                             <select class="form-control multiselect2" style="width: 100%" name='pathology[]' multiple id="pathologyOpt">
                             
                                <?php foreach ($pathology as $key => $value) { ?>
                                    <option value="<?php echo $value["id"]; ?>"><?php echo " (".$value["short_name"].") ".$value["test_name"]; ?>
                                     </option>   
                                <?php } ?>
                             </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                        <label>
                             <?php echo $this->lang->line('radiology'); ?></label>
                             <select class="form-control multiselect2" style="width: 100%" name='radiology[]' id="radiologyOpt" multiple>
                            
                                <?php foreach ($radiology as $key => $value) { ?>
                                    <option value="<?php echo $value["id"]; ?>"><?php echo " (".$value["short_name"].") ".$value["test_name"]; ?>
                                     </option>   
                                <?php } ?>
                             </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="ptt10">
                        <label for="exampleInputEmail1"><?php echo $this->lang->line('notification_to'); ?></label>
                             <?php
                                foreach ($roles as $role_key => $role_value) {
                                            $userdata = $this->customlib->getUserData();
                                            $role_id = $userdata["role_id"];
                                            ?>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="visible[]" value="<?php echo $role_value['id']; ?>" <?php if ($role_value["id"] == $role_id) {
                                                 echo "checked onclick='return false;'";
                                                }
                                             ?> <?php echo set_checkbox('visible[]', $role_value['id'], false) ?> /> <b><?php echo $role_value['name']; ?></b> </label>
                                    </div>
                                    <?php
                                    }
                                    ?>
                     </div>
                    </div>
                </div>
                </div>
                </div> 
<script>
    $(document).ready(function() {
       
        $('#formAddMasterData').on('submit', (function(e) {
            $("#formaddbtn").button('loading');
            e.preventDefault();
            var id = $('.hdnId').val();
            var masterkey = $.trim($('.master_name').val().toLowerCase());
            var mastername = $.trim($('.master_name').val());
            var type = $.trim($('.master_type').val());
            if (type == "") {
                $('#addMasterDataModal').modal('toggle');
                errorMsg('Something Went wrong..');
                return false;
            }
            $.ajax({
                url: baseurl + "admin/admin/saveMasterData",
                type: "POST",
                data: {
                    'id': id,
                    'masterkey': masterkey,
                    'mastername': mastername,
                    'type': type
                },
                dataType: 'json',
                success: function(data) {
                    if (data.flag == "1") {
                        successMsg(data.msg);
                        $('#addMasterDataModal').modal('toggle');
                        if (type == "examinations") {
                            loadMasterData('examinations', 'examinations');
                        }else if (type == "ent_complaint") {
                            loadMasterData('ent_complaint', 'ent_complaint');
                        } else if (type == "diagnosis") {
                            loadMasterData('diagnosis', 'diagnosis');
                        } else if (type = "opd_procedure") {
                            loadMasterData('opd_procedure', 'opd_procedure');
                        } else if (type = "surgery_recommendations") {
                            loadMasterData('surgery_recommendations', 'surgery_recommendations');
                        }

                    } else if (data.flag == "2") {
                        $('#addMasterDataModal').modal('toggle');
                        errorMsg("Data is already Present");
                    } else {
                        $('#addMasterDataModal').modal('toggle');
                        errorMsg(data.message);
                        //window.location.reload(true);
                    }
                    $("#formaddbtn").button('reset');
                },
                error: function() {

                }
            });


        }));

        $(document).on('click', '.add_examination', function(e) {
            e.preventDefault();
            $('#addMasterDataModal').modal('toggle');
            $('.hdnId').val('0');
            $('.master_type').val('');
            var type = $(this).data('type');
            $('.master_type').val(type);
        });
        
        $(document).on('click', '.add_ent_complaint', function(e) {
            e.preventDefault();
            $('#addMasterDataModal').modal('toggle');
            $('.hdnId').val('0');
            $('.master_type').val('');
            var type = $(this).data('type');
            $('.master_type').val(type);
        });
        
        $(document).on('click', '.add_opd_procedure', function(e) {
            e.preventDefault();
            $('#addMasterDataModal').modal('toggle');
            $('.hdnId').val('0');
            $('.master_type').val('');
            var type = $(this).data('type');
            $('.master_type').val(type);
        });
        $(document).on('click', '.add_diagnosis', function(e) {
            e.preventDefault();
            $('#addMasterDataModal').modal('toggle');
            $('.hdnId').val('0');
            $('.master_type').val('');
            var type = $(this).data('type');
            $('.master_type').val(type);
        });
        $(document).on('click', '.add_surgery_recommendations', function(e) {
            e.preventDefault();
            $('#addMasterDataModal').modal('toggle');
            $('.hdnId').val('0');
            $('.master_type').val('');
            var type = $(this).data('type');
            $('.master_type').val(type);
        })
    })
</script>