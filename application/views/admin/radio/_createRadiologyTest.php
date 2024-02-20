<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat(); 
?>
<input type="hidden" name="id" value="0">
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label><?php echo $this->lang->line('test_name'); ?></label>
                    <small class="req"> *</small> 
                    <input type="text" name="test_name" class="form-control">
                    <span class="text-danger"><?php echo form_error('test_name'); ?></span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label><?php echo $this->lang->line('short_name'); ?></label>
                    <small class="req"> *</small> 
                    <input type="text" name="short_name" class="form-control">
                    <span class="text-danger"><?php echo form_error('short_name'); ?></span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label><?php echo $this->lang->line('test_type'); ?></label>
                    
                    <input type="text" name="test_type" class="form-control">
                    <span class="text-danger"><?php echo form_error('test_type'); ?></span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="exampleInputFile">
                        <?php echo $this->lang->line('category_name'); ?></label>
                    <small class="req"> *</small> 
                    <div>
                        <select class="form-control select2" style="width: 100%" name='radiology_category_id' >
                            <option value="<?php echo set_value('radio_category_id'); ?>"><?php echo $this->lang->line('select'); ?></option>
                            <?php foreach ($categoryName as $dkey => $dvalue) {
                                ?>
                                <option value="<?php echo $dvalue["id"]; ?>"><?php echo $dvalue["lab_name"] ?></option>   
                            <?php } ?>
                        </select>
                    </div>
                    <span class="text-danger"><?php echo form_error('radio_category_id'); ?></span>
                </div>
            </div>  
        </div> 
        <div class="row">    
            <div class="col-sm-3" style="display:none">
                <div class="form-group">
                    <label><?php echo $this->lang->line('sub_category'); ?></label>
                    <input type="text" name="sub_category" class="form-control">
                </div>
            </div>
            <div class="col-sm-3" style="display:none">
                <div class="form-group">
                    <label><?php echo $this->lang->line('report_days'); ?></label>
                    <input type="number" min="0" value="0" name="report_days" class="form-control">
                </div>
            </div>
            <div class="col-sm-3" style="display:none">
                <div class="form-group">
                    <label for="exampleInputFile"><?php echo $this->lang->line('charge_category'); ?></label>
                    <small class="req">*</small> 
                    <div>
                        <select class="form-control charge_category select2" name='charge_category_id' style="width: 100%;">
                            <option value="<?php echo set_value('charge_category_id'); ?>"><?php echo $this->lang->line('select'); ?></option>
                            <?php foreach ($charge_category as $dkey => $dvalue) {
                                ?>
                                <option value="<?php echo $dvalue["id"]; ?>"><?php echo $dvalue["name"] ?></option>   
                            <?php } ?>
                        </select>
                    </div>
                    <span class="text-danger"><?php echo form_error('charge_category_id'); ?></span>
                </div>
            </div>
            <div class="col-sm-3" style="display:none">
                <div class="form-group">
                    <label for="exampleInputFile"><?php echo $this->lang->line('charge_name'); ?></label>
                    <small class="req">*</small> 
                    <div>
                        <select class="form-control charge select2" name='code' style="width: 100%"  id="code" >
                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                        </select>
                    </div>
                    <span class="text-danger"><?php echo form_error('code'); ?></span>
                </div>
            </div> 
            <div class="col-sm-3" style="display:none">
                <div class="form-group">
                    <label for="exampleInputFile"><?php echo $this->lang->line('tax'); ?> (%)</label>
                    <small class="req">*</small> 
                    <div>
                        <input readonly class="form-control" name='tax' id="tax" >
                    </div>
                    <span class="text-danger"><?php echo form_error('tax'); ?></span>
                </div>
            </div>
            <div class="col-sm-3" style="display:none">
                <div class="form-group">
                    <label for="exampleInputFile"><?php echo $this->lang->line('standard_charge'); ?></label><?php echo ' (' . $currency_symbol . ')'; ?>
                    <small class="req">*</small> 
                    <div>
                        <input class="form-control"  name='standard_charge' id="standard_charge" readonly="true">
                    </div>
                    <span class="text-danger"><?php echo form_error('code'); ?></span>
                </div>
            </div> 
            <div class="col-sm-3" style="display:none">
                <div class="form-group">
                    <label for="exampleInputFile"><?php echo $this->lang->line('amount').' ('.$currency_symbol.')'; ?></label>
                    <small class="req">*</small> 
                    <div>
                        <input readonly class="form-control" name='amount' id="amount" >
                    </div>
                    <span class="text-danger"><?php echo form_error('amount'); ?></span>
                </div>
            </div>
            <div class="">
                <?php echo display_custom_fields('radiologytest'); ?>
            </div> 
        </div><!--./row-->   
    </div><!--./col-md-12-->     
    <!--./col-md-12-->   
</div><!--./row-->               