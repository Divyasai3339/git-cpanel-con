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
<input type="hidden" name="action" value="update">
<input type="hidden" name="visit_details_id" value="<?php echo $result->visit_details_id; ?>">
<input type="hidden" name="ipd_prescription_basic_id" id="prescription_id" value="<?php echo $prescription_id ?>">
<?php
 //var_dump($result->finding_description);
if (!empty($result->tests)) {

    foreach ($result->tests as $test_prev_key => $test_prev_value) {


        if ($test_prev_value->pathology_id != "") {
?>
            <input type="hidden" name="prev_pathology[]" value="<?php echo $test_prev_value->pathology_id; ?>">
        <?php
        } elseif ($test_prev_value->radiology_id != "") {
        ?>
            <input type="hidden" name="prev_radiology[]" value="<?php echo $test_prev_value->radiology_id; ?>">
<?php
        }
    }
}

?>
<div class="row">
    <div class="col-sm-9">
        <div class="ptt10">
            <div class="row">

                
              

                <table class="table table-striped table-bordered table-hover mb0" id="tableID">
                    <?php
                    $i = 0;
                    $medicine_row = 1;
                    foreach ($result->medicines as $medicine_key => $medicine_value) {
                        if ($i == 0) {
                            $append_class = "closebtn delete_row  pt-25";
                        } else {
                            $append_class = "closebtn delete_row";
                        }
                    ?>

                        <input type="hidden" name="prev_medicine[]" value="<?php echo $medicine_value->ipd_prescription_detail_id; ?>">


                        <tr id="row<?php echo $medicine_row ?>">
                            <td>
                                <input type="hidden" name="ipd_prescription_detail_id_<?php echo $medicine_row ?>" value="<?php echo $medicine_value->ipd_prescription_detail_id; ?>">
                                <input type="hidden" name="post_medicine_category_id" value="<?php echo $medicine_value->medicine_category_id; ?>" class="post_medicine_category_id">
                                <input type="hidden" name="post_pharmacy_id" value="<?php echo $medicine_value->pharmacy_id; ?>" class="post_medicine_id">
                                <input type="hidden" name="post_dosage_id" value="<?php echo $medicine_value->dosage_id; ?>" class="post_dosage_id">
                                <input type="hidden" name="rows[]" value="<?php echo $medicine_row ?>">
                                <div class="col-sm-2 col-xs-6">
                                    <div class="">
                                        <?php if ($i == 0) { ?>
                                            <label>
                                                <?php echo $this->lang->line('medicine_category'); ?></label> <?php } ?>
                                        <select class="form-control select2 medicine_category" style="width: 100%" name='medicine_cat_<?php echo $medicine_row ?>'>
                                            <option value="<?php echo set_value('medicine_category_id'); ?>"><?php echo $this->lang->line('select') ?>
                                            </option>
                                            <?php

                                            foreach ($medicineCategory as $dkey => $dvalue) {
                                            ?>
                                                <option value="<?php echo $dvalue["id"]; ?>" <?php echo set_select('organisation', $dvalue["id"], ($medicine_value->medicine_category_id == $dvalue["id"]) ? true : false); ?>><?php echo $dvalue["medicine_category"] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-6">
                                    <div class="">
                                        <?php if ($i == 0) { ?>
                                            <label><?php echo $this->lang->line('medicine'); ?></label>
                                        <?php } ?>
                                        <select class="form-control select2 medicine_name" data-rowid="<?php echo $medicine_row ?>" style="width: 100%" name="medicine_<?php echo $medicine_row ?>">
                                            <option value=""><?php echo $this->lang->line('select') ?></option>
                                        </select>
                                        <span id="stock_info_<?php echo $medicine_row ?>"></span>
                                        <div id="suggesstion-box0"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-6">
                                    <div class="">
                                        <?php if ($i == 0) { ?>
                                            <label><?php echo $this->lang->line("dose"); ?></label>
                                        <?php } ?>
                                        <select class="form-control select2 medicine_dosage" style="width: 100%" name="dosage_<?php echo $medicine_row ?>">
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-6">
                                    <div class="">
                                        <?php if ($i == 0) { ?>
                                            <label>
                                                <?php echo $this->lang->line("dose_interval"); ?></label><?php } ?>
                                        <select class="form-control select2 medicine_category" style="width: 100%" name='interval_dosage_<?php echo $medicine_row ?>'>
                                            <option value="<?php echo set_value('dose_interval_id'); ?>"><?php echo $this->lang->line('select') ?>
                                            </option>
                                            <?php
                                            foreach ($intervaldosage as $dkey => $dvalue) {
                                            ?>
                                                <option value="<?php echo $dvalue["id"]; ?>" <?php echo set_select('interval_dosage', $dvalue["id"], ($medicine_value->dose_interval_id == $dvalue["id"]) ? true : false); ?>><?php echo $dvalue["name"] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-6">
                                    <div class="">
                                        <?php if ($i == 0) { ?>
                                            <label>
                                                <?php echo $this->lang->line("dose_duration"); ?></label> <?php } ?>
                                        <select class="form-control select2 medicine_category" style="width: 100%" name='duration_dosage_<?php echo $medicine_row ?>'>
                                            <option value="<?php echo set_value('dose_duration_id'); ?>"><?php echo $this->lang->line('select'); ?>
                                            </option>
                                            <?php
                                            foreach ($durationdosage as $dkey => $dvalue) {
                                            ?>
                                                <option value="<?php echo $dvalue["id"]; ?>" <?php echo set_select('duration_dosage', $dvalue["id"], ($medicine_value->dose_duration_id == $dvalue["id"]) ? true : false); ?>><?php echo $dvalue["name"] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-6">
                                    <div class="">
                                        <?php if ($i == 0) { ?> <label><?php echo $this->lang->line('instruction'); ?></label> <?php } ?>
                                        <textarea name="instruction_<?php echo $medicine_row ?>" style="height: 28px;" class="form-control"><?php echo $medicine_value->instruction; ?></textarea>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="<?php echo $append_class; ?>" data-row-id="<?php echo $medicine_row ?>" data-record-id="<?php echo $medicine_value->ipd_prescription_detail_id;  ?>" autocomplete="off"><i class="fa fa-remove"></i></button>

                            </td>
                        </tr>
                    <?php
                        ++$i;
                        $medicine_row++;
                    }
                    ?>
                </table>
                <div class="col-sm-12">
                    <a class="btn btn-info addplus-xs add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i>&nbsp;<?php echo $this->lang->line('add_medicine'); ?></a>
                </div>
                <br>
                <hr>

            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="ptt10">
            <!--<div class="col-sm-12">-->
            <!--    <div class="form-group">-->
            <!--        <label> <?php echo $this->lang->line('pathology'); ?></label>-->
            <!--        <select class="form-control multiselect2" style="width: 100%" name='pathology[]' multiple id="pathologyOpt">-->
            <!--            <?php foreach ($pathology as $key => $value) { ?>-->

            <!--                <option value="<?php echo $value["id"]; ?>" <?php echo check_test('pathology', $value["id"], $result) ? " selected" : "ddd" ?>><?php echo " (" . $value["short_name"] . ") " . $value["test_name"]; ?>-->
            <!--                </option>-->
            <!--            <?php } ?>-->
            <!--        </select>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-sm-12">-->
            <!--    <div class="form-group">-->
            <!--        <label>-->
            <!--            <?php echo $this->lang->line('radiology')."/OPD Procedure"; ?></label>-->
            <!--        <select class="form-control multiselect2" style="width: 100%" name='radiology[]' id="radiologyOpt" multiple>-->
            <!--            <?php foreach ($radiology as $key => $value) { ?>-->
            <!--                <option value="<?php echo $value["id"]; ?>" <?php echo check_test('radiology', $value["id"], $result) ? " selected" : "ddd" ?>><?php echo " (" . $value["short_name"] . ") " . $value["test_name"]; ?>-->
            <!--                </option>-->
            <!--            <?php } ?>-->
            <!--        </select>-->
            <!--    </div>-->
            <!--</div>-->
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
<?php $this->load->view('admin/master/addMasterModal'); ?>
<?php $this->load->view('admin/master/loadMasterDataJs'); ?>

<?php
function check_test($type, $id, $array)
{
    if (!empty($array->tests)) {
        foreach ($array->tests as $test_key => $test_value) {
            if ($type == "pathology") {
                if ($test_value->pathology_id == $id) {
                    return TRUE;
                }
            } elseif ($type == "radiology") {
                if ($test_value->radiology_id == $id) {
                    return TRUE;
                }
            }
        }
    }
    return FALSE;
}
?>
<script>
    var selectedExaminations = '<?php echo $result->examinations; ?>';
    var selectedDiagnosis = '<?php echo $result->diagnosis; ?>';
    var selectedOpdProcedures = '<?php echo $result->opd_procedure; ?>';
    var selectedSurgeryRecommendations = '<?php echo $result->surgery_recommendations; ?>';
    var selectedFooterNote = '<?php echo $result->footer_note; ?>';


    $(document).ready(function() {
        $(document).on('click', '.add_examination', function(e) {
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
                            loadMasterData('examinations', 'examinations', selectedExaminations);
                        } else if (type == "diagnosis") {
                            loadMasterData('diagnosis', 'diagnosis', selectedDiagnosis);
                        } else if (type = "opd_procedure") {
                            loadMasterData('opd_procedure', 'opd_procedure', selectedOpdProcedures);
                        } else if (type = "surgery_recommendations") {
                            loadMasterData('surgery_recommendations', 'surgery_recommendations', selectedSurgeryRecommendations);
                        }else if (type = "footer_note") {
                            loadMasterData('footer_note', 'footer_note', selectedFooterNote);
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
        var compcat_template=$("#complaincat-template").html();
        var div = "<td><input type='hidden' name='complainrow[]' value='"+ id +"'><div class='form-group'><select class='form-control compselect2 complaintstype' data-rowid='"+ id +"' style='width: 100%' name='complaint_type_id_"+ id +"' id='complaints_type_id_"+id+"'><option value=''><?php echo $this->lang->line('select'); ?> </option><?php foreach ($complaintstype as $fvalue) {?><option value='<?php echo $fvalue['id']; ?>'><?php echo $fvalue['category'] ?></option><?php } ?></select></div></td><td><div class='form-group'><select name='complaints_description_"+ id +"[]' id='complaints_description_"+ id +"' multiple class='form-control multiselect2 select2-hidden-accessible compselect2' style='width:100%' tabindex='-1' aria-hidden='true'><option value=''><?php echo $this->lang->line('select'); ?> </option></select></div></td><td><div class='form-group'><input type='text' class='form-control' name='durations_"+ id +"' id='durations_"+ id +"' class='durations' /></div></td><td><div class='form-group'><select name='periods_"+ id +"' id='periods_"+ id +"' class='form-control compselect2 periods' style='width:100%'><option value='Days'>Days</option><option value='Months'>Months</option><option value='Years'>Years</option></select></div></td>";
       

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