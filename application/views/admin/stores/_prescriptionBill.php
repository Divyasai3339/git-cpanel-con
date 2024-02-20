<?php 
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?>
 <?php
 if(!empty($prescription_data) && !empty($prescription_data->products) ){
?>

<div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input name="customer_name" id="patient_name" type="hidden" class="form-control"/>
                     
             
                            <input name="action_type" id="action_type" value="insert" type="hidden" class="form-control"/>
                               
                            <div class="row">
                                <div class="col-md-12">
    
                                    <div class="table-responsive">

                                         <table class="table tableover table-striped mb0 table-bordered table-hover tablefull12 tblProducts" id="tableID">
                                            <thead>
                                                <tr class="font13">
                                                    <th width="15%"><?php echo $this->lang->line('product_category'); ?><small class="req" style="color:red;"> *</small></th>
                                                    <th width="15%"><?php echo $this->lang->line('product_name'); ?><small class="req" style="color:red;"> *</small></th>
                                                    <th width="15%"><?php echo $this->lang->line('batch_no'); ?> <small class="req" style="color:red;">*</small></th>
                                                    <th width="15%"><?php echo $this->lang->line('expiry_date'); ?><small class="req" style="color:red;"> *</small></th>
                                                    <th class="text-right" width="15%"><?php echo $this->lang->line('quantity'); ?><small class="req" style="color:red;"> *</small> <?php echo " | " . $this->lang->line('available_qty'); ?></th>
                                                    <th class="text-right" width="13%"><?php echo $this->lang->line('sale_price') . ' (' . $currency_symbol . ')'; ?><small class="req" style="color:red;"> *</small></th>
                                                    <th class="text-right" width="7%"><?php echo $this->lang->line('tax'); ?></th>
                                                    <th class="text-right" width="10%"><?php echo $this->lang->line('amount') . " (" . $currency_symbol . ")"; ?><small class="req" style="color:red;"> *</small></th>
                                                     <th class="text-right" width="2%"></th>
                                                </tr>
                                            </thead>
                                            <?php 

$row_value=1;
foreach ($prescription_data->products as $product_key => $product_value) {
   
   ?>


   <tr id="row<?php echo $row_value;?>">
        
                                                <td>
                                                   <input type="hidden" name="total_rows[]" value="<?php echo $row_value;?>">

    <input type="hidden" class="post_product_category_id" value="<?php echo $product_value->product_category_id;?>">
    <input type="hidden" class="post_product_id" value="<?php echo $product_value->stores_id;?>">
      <input type="hidden" class="post_product_batch_detail_id" value="">
    <input type="hidden" class="sale_price" value="">
    <input type="hidden" class="quantity" value="">
                                                    <select class="form-control product_category select3" style="width:100%" name='product_category_id_<?php echo $row_value;?>'>
                                                        <option value="<?php echo set_value('product_category_id'); ?>"><?php echo $this->lang->line('select') ?>
                                                        </option>
                                                         <?php foreach ($productCategory as $med_cat_key => $med_cat_value) {
                        ?>
         <option value="<?php echo $med_cat_value["id"]; ?>" <?php echo set_select('product_category_id_<?php echo $row_value;?>', $med_cat_value['id'], ($med_cat_value["id"] == $product_value->product_category_id) ? TRUE :FALSE); ?>><?php echo $med_cat_value["product_category"] ?>
                          </option>
                      <?php 
                  }
                      ?>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('product_category_id[]'); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <select class="form-control select3 product_name" style="width:100%"  id="product_name0" name='product_name_id_<?php echo $row_value;?>'>
                                                        <option value=""><?php echo $this->lang->line('select') ?>
                                                        </option>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('product_name[]'); ?></span>

                                                </td>
                                                <td>
                                        
                                    <select class="form-control batch_no select3" id="batch_no0" name="batch_no_id_<?php echo $row_value;?>" >
                                    <option value=""><?php echo $this->lang->line('select') ?></option>
                                    </select>
                                                    <span class="text-danger"><?php echo form_error('batch_no[]'); ?></span>
                                                </td>
                                                <td >
                                                    <input type="text" readonly="" name="expire_date_<?php echo $row_value;?>"  id="expire_date0" class="form-control exp_date"/>

                                                </td>

                                                <td>
                                                <div class="input-group">
                                                <input type="text" name="quantity_<?php echo $row_value;?>" id="quantity0" class="form-control text-right qty">
                                                <span class="input-group-addon text-danger available_qty" style="font-size: 10pt"  id="totalqty0">&nbsp;&nbsp;</span>
                                                    </div>
                                                    <input type="hidden" class="available_quantity" name="available_quantity_<?php echo $row_value;?>" id="available_quantity0">
                                                 
                                                </td>
                                                <td class="text-right">
                                                    <input type="text" name="sale_price_<?php echo $row_value;?>" id="sale_price0"  class="form-control text-right price" readonly>
                                                    <span class="text-danger"><?php echo form_error('sale_price[]'); ?></span>
                                                </td>
                                                 <td class="text-right">
                                                    <div class="form-group"> 
                                                            <div class="input-group">
                                                            <input type="text" class="form-control right-border-none product_tax"  name="tax_<?php echo $row_value;?>" readonly id="tax0"  autocomplete="off">
                                                            <span class="input-group-addon "> %</span>
                                                            </div>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <input type="text" name="amount_<?php echo $row_value;?>" id="amount0" placeholder="" class="form-control text-right subtot" readonly>
                                                    <span class="text-danger"><?php echo form_error('net_amount[]'); ?></span>
                                                </td>
                                                <td>
                                                     <button type="button"  class="closebtn delete_row" data-row-id="<?php echo $row_value;?>" autocomplete="off"><i class="fa fa-remove"></i></button>
                                                </td>
                                            </tr>
   <?php
   $row_value++;
}
?>
                      
                                        </table>
<a class="btn btn-info addplus-xs add-record mb10" data-added="0"><i class="fa fa-plus"></i>&nbsp;<?php echo $this->lang->line('add'); ?></a>
                                         </div>
                                          
                  
                                    <div class="divider"></div>
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputFile">
                                                                    <?php echo $this->lang->line('hospital_doctor'); ?></label>
                                                                <div><select name='consultant_doctor' style="width:100%;" id="consultant_doctor" class="form-control select3" <?php
if ($disable_option == true) {
    echo "disabled";
}
?> style="width:100%"  >
                                                                        <option value=""><?php echo $this->lang->line('select') ?></option>
                                                                        <?php foreach ($doctors as $dkey => $dvalue) {
    ?>
                                                                            <option value="<?php echo $dvalue["id"]; ?>" <?php
if ((isset($doctor_select)) && ($doctor_select == $dvalue["id"])) {
        echo "selected";
    }
    ?>><?php echo composeStaffNameByString($dvalue["name"], $dvalue["surname"],$dvalue["employee_id"]); ?></option>
<?php }?>
                                                                    </select>

                                                                </div>
                                                                <span class="text-danger"><?php echo form_error('refference'); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label><?php echo $this->lang->line('doctor_name'); ?></label>
                                                                <input name="doctor_name" id="doctname" type="text" class="form-control"/>
                                                                <span class="text-danger"><?php echo form_error('doctor_name'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo $this->lang->line('note'); ?></label>
                                                        <textarea name="note" rows="3" id="note" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="">
                                                <?php
                                                echo display_custom_fields('stores');
                                                ?>
                                                </div> 
                                            </div>
                                        </div><!--./col-sm-6-->


                                        <div class="col-sm-6">
                                            <table class="printablea4">
                                                <tr>
                                                    <th width="40%"><?php echo $this->lang->line('total') . " (" . $currency_symbol . ")"; ?></th>
                                                    <td width="60%" colspan="2" class="text-right ipdbilltable">
                                                    <input type="text" placeholder="<?php echo $this->lang->line('total'); ?>" value="0" name="total" id="total" style="width: 30%; float: right" class="form-control total"/></td>
                                                </tr>

                                                <tr>
                                                    <th><?php echo $this->lang->line('discount') . " (" . $currency_symbol . ")"; ?></th>
                                                    <td class="text-right ipdbilltable">
                                                        <h4 style="float: right;font-size: 12px; padding-left: 5px;"> %</h4>
                                                <input type="text" placeholder="<?php echo $this->lang->line('discount'); ?>" name="discount_percent" id="discount_percent" class="form-control discount_percent" style="width: 70%; float: right;font-size: 12px;"/></td>

                                                    <td class="text-right ipdbilltable">
                                        <input type="text" placeholder="<?php echo $this->lang->line('discount'); ?>" value="0" onkeyup="get_percentage(this.value)" name="discount" id="discount" style="width: 50%; float: right" class="form-control discount"/></td>
                                                </tr>

                                                <tr>
                                                    <th><?php echo $this->lang->line('tax') . " (" . $currency_symbol . ")"; ?></th>
                                                    <td class="text-right ipdbilltable">
                                                      

                                                    </td>

                                                    <td class="text-right ipdbilltable">
                                                        <input type="text" placeholder="<?php echo $this->lang->line('tax'); ?>" name="tax" value="0" id="tax" style="width: 50%; float: right" class="form-control tax"/>

                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th><?php echo $this->lang->line('net_amount') . " (" . $currency_symbol . ")"; ?></th>
                                                    <td colspan="2" class="text-right ipdbilltable">
                                                        <input type="text" placeholder="<?php echo $this->lang->line('net_amount'); ?>" value="0" name="net_amount" id="net_amount" style="width: 30%; float: right" class="form-control net_amount"/></td>
                                                </tr>
                                            </table>
  <div class="row">
                                  <!--  <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date_new</label><small class="req"> *</small> 
                                        <input type="text" name="payment_date" id="date" class="form-control date" autocomplete="off">
                                        <span class="text-danger"></span>
                                    </div>
                                </div> -->
                                
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('payment_mode'); ?></label> 
                                        <select class="form-control payment_mode" name="payment_mode">
                                            <?php foreach ($payment_mode as $key => $value) {
                                                ?>
                                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
<?php
 } 
 ?>
                                        </select>    
                                        <span class="text-danger"><?php echo form_error('payment_mode'); ?></span>
                                    </div>
                                </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('payment_amount') . " (" . $currency_symbol . ")"; ?></label><small class="req"> *</small> 
                                        <input type="text" name="payment_amount" id="payment_amount" class="form-control payment_amount text-right">  
                                         <span class="text-danger"><?php echo form_error('payment_amount'); ?></span>
                                    </div>
                                </div>
                          
                              <div class="cheque_div" style="display:none;">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('cheque_no'); ?></label><small class="req"> *</small> 
                                        <input type="text" name="cheque_no" id="cheque_no" class="form-control">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('cheque_date'); ?></label><small class="req"> *</small> 
                                        <input type="text" name="cheque_date" id="cheque_date" class="form-control date">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>

                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('attach_document'); ?></label>
                                        <input type="file" class="filestyle form-control"   name="document">
                                        <span class="text-danger"><?php echo form_error('document'); ?></span> 
                                    </div>
                                </div> 
                              </div>
                            </div>

                                        </div>

                                    </div><!--./row-->
                                </div><!--./col-md-12-->


                            </div><!--./row-->
                        </div><!--./box-footer-->
                    </div><!--./col-md-12-->
<?php
 }else{
?>
<div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input name="customer_name" id="patient_name" type="hidden" class="form-control"/>
                     
                            <input name="patient_id" id="patient_id" type="hidden" class="form-control"/>
                            <input name="action_type" id="action_type" value="insert" type="hidden" class="form-control"/>
                               <a class="btn btn-sm btn-warning pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i>&nbsp;<?php echo $this->lang->line('add'); ?></a>
                            <div class="row">
                                <div class="col-md-12">
    
                                    <div class="table-responsive">

                                        <table class="table tableover table-striped table-bordered table-hover tablefull12 tblProducts" id="tableID">
                                            <thead>
                                                <tr class="font13">
                                                    <th width="15%"><?php echo $this->lang->line('product_category'); ?><small class="req" style="color:red;"> *</small></th>
                                                    <th width="15%"><?php echo $this->lang->line('product_name'); ?><small class="req" style="color:red;"> *</small></th>
                                                    <th width="15%"><?php echo $this->lang->line('batch_no'); ?> <small class="req" style="color:red;">*</small></th>
                                                    <th width="15%"><?php echo $this->lang->line('expiry_date'); ?><small class="req" style="color:red;"> *</small></th>
                                                    <th class="text-right" width="15%"><?php echo $this->lang->line('quantity'); ?><small class="req" style="color:red;"> *</small> <?php echo " | " . $this->lang->line('available_qty'); ?></th>
                                                    <th class="text-right" width="13%"><?php echo $this->lang->line('sale_price') . ' (' . $currency_symbol . ')'; ?><small class="req" style="color:red;"> *</small></th>
                                                    <th class="text-right" width="10%"><?php echo $this->lang->line('amount') . " (" . $currency_symbol . ")"; ?><small class="req" style="color:red;"> *</small></th>
                                                     <th class="text-right" width="2%"></th>
                                                </tr>
                                            </thead>
                                            <tr id="row1">
                                                <td>
                                                    <input type="hidden" name="total_rows[]" value="1">
                                                    <select class="form-control product_category select3" style="width:100%" name='product_category_id_1'>
                                                        <option value="<?php echo set_value('product_category_id'); ?>"><?php echo $this->lang->line('select') ?>
                                                        </option>
                                                        <?php foreach ($productCategory as $dkey => $dvalue) {
    ?>
                                                            <option value="<?php echo $dvalue["id"]; ?>"><?php echo $dvalue["product_category"] ?>
                                                            </option>
                                                        <?php }?>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('product_category_id[]'); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <select class="form-control select3 product_name" style="width:100%"  id="product_name0" name='product_name_id_1'>
                                                        <option value=""><?php echo $this->lang->line('select') ?>
                                                        </option>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('product_name[]'); ?></span>

                                                </td>
                                                <td>
                                        
                                    <select class="form-control batch_no select3" id="batch_no0" name="batch_no_id_1" >
                                    <option value=""><?php echo $this->lang->line('select') ?></option>
                                    </select>
                                                    <span class="text-danger"><?php echo form_error('batch_no[]'); ?></span>
                                                </td>
                                                <td >
                                                    <input type="text" readonly="" name="expire_date_1"  id="expire_date0" class="form-control exp_date"/>

                                                </td>

                                                <td>
                                                <div class="input-group">
                                                <input type="text" name="quantity_1" id="quantity0" class="form-control text-right qty">
                                                <span class="input-group-addon text-danger available_qty" style="font-size: 10pt"  id="totalqty0">&nbsp;&nbsp;</span>
                                                    </div>
                                                    <input type="hidden" class="available_quantity" name="available_quantity_1" id="available_quantity0">
                                                 
                                                </td>
                                                <td class="text-right">
                                                    <input type="text" name="sale_price_1" id="sale_price0"  class="form-control text-right price" readonly>
                                                    <span class="text-danger"><?php echo form_error('sale_price[]'); ?></span>
                                                </td>

                                                <td class="text-right">
                                                    <input type="text" name="amount_1" id="amount0" placeholder="" class="form-control text-right subtot" readonly>
                                                    <span class="text-danger"><?php echo form_error('net_amount[]'); ?></span>
                                                </td>
                                                <td>
                                                     <button type="button"  class="closebtn delete_row" data-row-id="1" autocomplete="off"><i class="fa fa-remove"></i></button>
                                                </td>
                                            </tr>
                                        </table>

     
                                    </div>
                                    <div class="divider"></div>
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputFile">
                                                                    <?php echo $this->lang->line('hospital_doctor'); ?></label>
                                                                <div><select name='consultant_doctor' style="width:100%;" id="consultant_doctor" onchange="get_Docname(this.value)" class="form-control select3" <?php
if ($disable_option == true) {
    echo "disabled";
}
?> style="width:100%"  >
                                                                        <option value=""><?php echo $this->lang->line('select') ?></option>
                                                                        <?php foreach ($doctors as $dkey => $dvalue) {
    ?>
                                                                            <option value="<?php echo $dvalue["id"]; ?>" <?php
if ((isset($doctor_select)) && ($doctor_select == $dvalue["id"])) {
        echo "selected";
    }
    ?>><?php echo $dvalue["name"] . " " . $dvalue["surname"] ?></option>
<?php }?>
                                                                    </select>

                                                                </div>
                                                                <span class="text-danger"><?php echo form_error('refference'); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label><?php echo $this->lang->line('doctor_name'); ?></label>
                                                                <input name="doctor_name" id="doctname" type="text" class="form-control"/>
                                                                <span class="text-danger"><?php echo form_error('doctor_name'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo $this->lang->line('note'); ?></label>
                                                        <textarea name="note" rows="3" id="note" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--./col-sm-6-->


                                        <div class="col-sm-6">
                                            <table class="printablea4">
                                                <tr>
                                                    <th width="40%"><?php echo $this->lang->line('total') . " (" . $currency_symbol . ")"; ?></th>
                                                    <td width="60%" colspan="2" class="text-right ipdbilltable">
                                                    <input type="text" placeholder="<?php echo $this->lang->line('total'); ?>" value="0" name="total" id="total" style="width: 30%; float: right" class="form-control total"/></td>
                                                </tr>

                                                <tr>
                                                    <th><?php echo $this->lang->line('discount') . " (" . $currency_symbol . ")"; ?></th>
                                                    <td class="text-right ipdbilltable">
                                                        <h4 style="float: right;font-size: 12px; padding-left: 5px;"> %</h4>
                                                <input type="text" placeholder="<?php echo $this->lang->line('discount'); ?>" name="discount_percent" id="discount_percent" class="form-control discount_percent" style="width: 70%; float: right;font-size: 12px;"/></td>

                                                    <td class="text-right ipdbilltable">
                                        <input type="text" placeholder="<?php echo $this->lang->line('discount'); ?>" value="0" onkeyup="get_percentage(this.value)" name="discount" id="discount" style="width: 50%; float: right" class="form-control discount"/></td>
                                                </tr>

                                                <tr>
                                                    <th><?php echo $this->lang->line('tax') . " (" . $currency_symbol . ")"; ?></th>
                                                    <td class="text-right ipdbilltable">
                                                        <h4 style="float: right;font-size: 12px;padding-left: 5px;"> %</h4><input type="text" placeholder="<?php echo $this->lang->line('tax'); ?>" name="tax_percent" value="" id="tax_percent" style="width: 70%; float: right;font-size: 12px;" class="form-control tax_percent"/>

                                                    </td>

                                                    <td class="text-right ipdbilltable">
                                                        <input type="text" placeholder="<?php echo $this->lang->line('tax'); ?>" name="tax" value="0" id="tax" style="width: 50%; float: right" class="form-control tax"/>

                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th><?php echo $this->lang->line('net_amount') . " (" . $currency_symbol . ")"; ?></th>
                                                    <td colspan="2" class="text-right ipdbilltable">
                                                        <input type="text" placeholder="<?php echo $this->lang->line('net_amount'); ?>" value="0" name="net_amount" id="net_amount" style="width: 30%; float: right" class="form-control net_amount"/></td>
                                                </tr>
                                            </table>
  <div class="row">
                                  <!--  <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date_new</label><small class="req"> *</small> 
                                        <input type="text" name="payment_date" id="date" class="form-control date" autocomplete="off">
                                        <span class="text-danger"></span>
                                    </div>
                                </div> -->
                                
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('payment_mode'); ?></label> 
                                        <select class="form-control payment_mode" name="payment_mode">
                                            <?php foreach ($payment_mode as $key => $value) {
                                                ?>
                                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
<?php
 } 
 ?>
                                        </select>    
                                        <span class="text-danger"><?php echo form_error('payment_mode'); ?></span>
                                    </div>
                                </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('payment_amount') . " (" . $currency_symbol . ")"; ?></label><small class="req"> *</small> 
                                        <input type="text" name="payment_amount" id="payment_amount" class="form-control payment_amount text-right">  
                                         <span class="text-danger"><?php echo form_error('payment_amount'); ?></span>
                                    </div>
                                </div>
                          
                              <div class="cheque_div" style="display:none;">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('cheque_no'); ?></label><small class="req"> *</small> 
                                        <input type="text" name="cheque_no" id="cheque_no" class="form-control">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('cheque_date'); ?></label><small class="req"> *</small> 
                                        <input type="text" name="cheque_date" id="cheque_date" class="form-control date">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>

                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('attach_document'); ?></label>
                                        <input type="file" class="filestyle form-control"   name="document">
                                        <span class="text-danger"><?php echo form_error('document'); ?></span> 
                                    </div>
                                </div> 
                              </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('note'); ?></label> 
                                        <textarea name="note" id="note" class="form-control"></textarea>
                                      
                                    </div>
                                </div>
                            </div>

                                        </div>

                                    </div><!--./row-->
                                </div><!--./col-md-12-->


                            </div><!--./row-->
                        </div><!--./box-footer-->
                    </div><!--./col-md-12-->
<?php
 }
 
  ?>