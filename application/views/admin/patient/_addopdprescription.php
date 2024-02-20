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
    .heads{
       font-size: 15px;
        font-weight: bold;
        background:#87AAAA;
        color: white;
        font-style:italic;
    }
</style>

<input type="hidden" name="visit_details_id" value="<?php echo $visit_details_id;?>">
<input type="hidden" name="action" value="add">
<input type="hidden" name="ipd_prescription_basic_id" value="0">
                <div class="row">
                    <table width="40%" class="">
                        <tr>
                        <th width="20%"><?php echo $this->lang->line("patient_name"); ?></th>
                       <td class="fnt"><?php echo $patient_data["patient_name"]?></td>
                        <th width="10%"><?php echo $this->lang->line("age"); ?></th>
                        <td class="fnt">
                                <?php
                    echo $this->customlib->getPatientAge($patient_data['age'],$patient_data['month'],$patient_data['day']);
                                 ?>
                            </td>
                            <th width="10%"><?php echo $this->lang->line("gender"); ?></th>
                       <td class="fnt"><?php echo $patient_data["gender"] ?></td>
                    </tr>
                    </table>
                    
                    <div class="col-sm-9">
                    <div class="ptt10">
                        <div class="row">
                         
               
                            
                                <table class="table table-striped table-bordered table-hover mb0" id="tableID">
                                <div class="col-sm-12 heads"><label for="opd_procedure">Medicines</label></div>
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

                        </div>
                    </div> 
                </div>

                <div class="col-sm-3">
                    <div class="ptt10">
                    
                    
                    <div class="col-sm-12">
                        <div class="form-group">
                        <label>Medicine Templates</label>
                             <select class="form-control select2" style="width: 100%" name='med_template' id="med_template">
                                <option value="">Select</option>
                                <?php foreach ($medicine_templates as $key => $value) { ?>
                                    <option value="<?php echo $value["id"]; ?>"><?php echo $value["master_value"]; ?>
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
                        loadMasterData(type, type);
                        $('.master_name').val('');
                        $('.master_type').val('');
                        $('#addMasterDataModal').modal('toggle');
                        // if (type == "examinations") {
                        //     loadMasterData('examinations', 'examinations');
                        // }else if (type == "ent_complaint") {
                        //     loadMasterData('ent_complaint', 'ent_complaint');
                        // } else if (type == "diagnosis") {
                        //     loadMasterData('diagnosis', 'diagnosis');
                        // } else if (type = "opd_procedure") {
                        //     loadMasterData('opd_procedure', 'opd_procedure');
                        // } else if (type = "surgery_recommendations") {
                        //     loadMasterData('surgery_recommendations', 'surgery_recommendations');
                        // }else if (type = "footer_note") {
                        //     loadMasterData('footer_note', 'footer_note');
                        // }

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
        });

        $(document).on('click', '.add_footer_note', function(e) {
            e.preventDefault();
            $('#addMasterDataModal').modal('toggle');
            $('.hdnId').val('0');
            $('.master_type').val('');
            var type = $(this).data('type');
            $('.master_type').val(type);
        });
    })
</script>


<!-- ADDED BY CHITRANJAN -->

<script type="text/javascript">


$(document).on('click','.add-complains',function(){
        var rowCount = $('#tableIDS tr').length;
        //alert(rowCount);
        //var table = document.getElementById("tableIDS");
        //var total_rows=1;
        var id = ++rowCount;
        //var compcat_template=$("#complaincat-template").html();
        var div = "<td><input type='hidden' name='complainrow[]' value='"+ id +"'><div class='form-group'><select class='form-control compselect2 complaintstype' data-rowid='"+ id +"' style='width: 100%' name='complaint_type_id_"+ id +"' id='complaints_type_id_"+id+"'><option value=''><?php echo $this->lang->line('select'); ?> </option><?php foreach ($complaintstype as $fvalue) {?><option value='<?php echo $fvalue['id']; ?>'><?php echo $fvalue['category'] ?></option><?php } ?></select></div></td><td><div class='form-group'><select name='complaints_description_"+ id +"[]' id='complaints_description_"+ id +"' multiple class='form-control multiselect2 select2-hidden-accessible compselect2' style='width:100%' tabindex='-1' aria-hidden='true'><option value=''><?php echo $this->lang->line('select'); ?> </option></select></div></td><td><div class='form-group'><input type='text' class='form-control' name='durations_"+ id +"' id='durations_"+ id +"' class='durations' /></div></td><td><div class='form-group'><select name='periods_"+ id +"' id='periods_"+ id +"' class='form-control compselect2 periods' style='width:100%'><option></option><option value='Days'>Days</option><option value='Months'>Months</option><option value='Years'>Years</option></select></div></td>";
       

        var row =  "<tr id='row" + id + "'>" + div + "<td><button style='float:left' type='button' data-row-id='"+id+"' class='closebtn delete_comp'><i class='fa fa-remove'></i></button></td></tr>";
        $('#tableIDS').append(row);
        $('.compselect2').select2();
        //total_rows++;
       
    });

$(document).on('click','.delete_comp',function(e){
     var del_row_id=$(this).data('rowId');
     $("#row" + del_row_id).remove();

});


$(document).on('click','.add-finding',function(){
        var rowCount = $('#findingtableIDS tr').length;
        //alert(rowCount);
        //var table = document.getElementById("tableIDS");
        //var total_rows=1;
        var id = ++rowCount;
        //var compcat_template=$("#complaincat-template").html();
        var div = "<td><input type='hidden' name='findingrow[]' value='"+ id +"'><div class='form-group'><select class='form-control findingselect2 findingtype' data-rowid='"+ id +"' style='width: 100%' name='finding_type_id_"+ id +"' id='finding_type_id_"+ id +"'><option value=''><?php echo $this->lang->line('select'); ?> </option><?php foreach ($findingtype as $fvalue) {?><option value='<?php echo $fvalue['id']; ?>'><?php echo $fvalue['category'] ?></option>   <?php } ?></select></div></td><td><div class='form-group'><select name='finding_description_"+ id +"[]' id='finding_description_"+ id +"' multiple class='form-control multiselect2 select2-hidden-accessible findingselect2' style='width:100%' tabindex='-1' aria-hidden='true'><option value=''><?php echo $this->lang->line('select'); ?> </option></select></div></td>";
       

        var row =  "<tr id='row" + id + "'>" + div + "<td><button style='float:left' type='button' data-row-id='"+id+"' class='closebtn delete_finding'><i class='fa fa-remove'></i></button></td></tr>";
        $('#findingtableIDS').append(row);
        $('.findingselect2').select2();
        //total_rows++;
       
    });

$(document).on('click','.delete_finding',function(e){
     var del_row_id=$(this).data('rowId');
     $("#row" + del_row_id).remove();

});

</script>