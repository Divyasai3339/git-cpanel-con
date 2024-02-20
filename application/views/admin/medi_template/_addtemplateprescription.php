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

<input type="hidden" name="medicine_type" value="<?php echo $medicine_type;?>">
<input type="hidden" name="action" value="add">

                
                              
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
         

                
               
<script>
    $(document).ready(function() {
       
    })
</script>