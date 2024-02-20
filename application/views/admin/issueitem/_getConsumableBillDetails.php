
<style type="text/css">
    body{font-family: 'Roboto', sans-serif; font-weight: normal;}
</style>
<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
print_r($data);
?>
    <div id="html-2-pdfwrapper">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="">
                    <?php //if (!empty($print_details[0]['print_header'])) { ?>
                        <div class="pprinta4">
                            <img src="https://draravindshospital.com/uploads/printing/1.jpg" class="img-responsive" style="height:100px; width: 100%;">
                            <?php
                            // if (!empty($print_details[0]['print_header']))
                            {
                                // echo base_url() . $print_details[0]['print_header'].img_time();
                            }
                            ?>
                            
                        </div>
                    <?php //} ?>
                    <table width="100%" class="printablea4" style="text-align:left;">
                        <tr>
                            <td width="77%" align="text-left"><h5><?php echo $this->lang->line('bill_no') ?> : <?php echo $this->customlib->getSessionPrefixByType('pharmacy_billing').$result["id"] ?></h5>
                            </td>
                            <td width="23%" ><h5><?php echo $this->lang->line('date') . " : "; ?><?php echo date($this->customlib->getHospitalDateFormat(true, true), strtotime($result['created_date'])) ?></h5>
                            </td>
                        </tr>
                        
                        
                        
                    </table>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px">
                    <table class="printablea4" cellspacing="0" cellpadding="0" width="100%" style="text-align:left;">
                        <tr>
                            <th width="10%"><?php echo $this->lang->line('name'); ?></th>
                            <td width="10%"><?php echo $result["patient_name"]." (".$result["patient_id"].")"; ?></td>
                            <th width="10%"><?php echo $this->lang->line('phone'); ?></th>
                            <td width="10%"><?php echo $result["mobileno"]; ?></td>
                            <th width="10%"><?php echo $this->lang->line('doctor'); ?></th>
                            <td width="10%"><?php echo $result["doctor_name"]; ?></td>
                        </tr>
                        <tr>
                            <th width="10%"><?php echo $this->lang->line('case_id') ?></th> 
                            <td width="10%"><?php echo $result["case_reference_id"]; ?></td>                      
                            <th width="10%"><?php echo $this->lang->line('ipd_no') ?></th>  
                            <td width="10%"><?php echo "IPDN".$result["ipd_id"]; ?></td>
                        </tr>                     
                    </table>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px">
                    <table class="printablea4" id="testreport" width="100%" style="text-align:left;">
                        <tr>
                            <th width="20%" ><?php echo $this->lang->line('item_category'); ?></th>
                             <th width="20%"><?php echo "Item Name";//$this->lang->line('item_name'); ?></th>
                            <th><?php echo $this->lang->line('quantity'); ?></th>
                            <th><?php echo $this->lang->line('mrp'); ?></th>
                             <!--<th><?php echo $this->lang->line('batch_no'); ?></th>
                            <th><?php echo $this->lang->line('unit'); ?></th>
                            <th><?php echo $this->lang->line('expiry_date'); ?></th>-->
                            <!--<th class="text-left" style="text-align: left;"><?php echo $this->lang->line('tax'); ?></th>-->
                            <!-- <th style="text-align: right;"><?php echo $this->lang->line('amount') . ' (' . $currency_symbol . ')'; ?></th> -->
                        </tr>
                        <?php
                        foreach ($items as $bill) {
                        ?>
                            <tr>
                                <td width="20%" style="text-align:left;"><?php echo $bill["item_category"]; ?></td>
                                <td width="20%"><?php echo $bill["item_name"]; ?></td>
                                <!-- <td><?php echo $bill["batch_no"]; ?></td> -->
                                <!--<td><?php echo $bill["unit"]; ?></td>-->
                                <!-- <td><?php echo $this->customlib->getMedicine_expire_month($bill['expiry']); ?></td> -->
                                <td><?php echo $bill["quantity"]; ?></td>
                                <td><?php echo amountFormat($bill['purchase_price']); ?></td>
                                <!--<td class="text-left" style="text-align: left;"><?php echo amountFormat($tax)." (".$bill['tax']."%)"; ?></td>-->
                                <!-- <td align="right"><?php echo amountFormat($bill["sale_price"] * $bill["quantity"]); ?></td> -->
                            </tr>
                            <?php
                            }
                            ?>
                    </table>
                    
          
    
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px">
                    <p><?php
if (!empty($print_details[0]['print_footer'])) {
    echo $print_details[0]['print_footer'];
}
?></p>
                </div>
            </div>
            <!--/.col (left) -->
        </div>
    </div>