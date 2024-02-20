<?php 
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?>
<?php 
if($otdetails->opd_details_id != "")
{
    $patient_name = $otdetails->opd_patient_name;
    $patient_id   = $otdetails->opd_patient_id;
    $case_id      = $otdetails->opd_case_id ;

}else{
    $patient_name = $otdetails->ipd_patient_name;
    $patient_id   = $otdetails->ipd_patient_id;
    $case_id      = $otdetails->ipd_case_id ;
}
 ?>
<?php 
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/sh-print.css">
<div class="print-area">
<div class="row">  
        <div class="col-12">
               <?php if (!empty($print_details[0]['print_header'])) { ?>
                        <div class="pprinta4">
                            <img src="<?php
                            if (!empty($print_details[0]['print_header'])) {
                                echo base_url() . $print_details[0]['print_header'].img_time();
                            }
                            ?>" class="img-responsive" style="height:100px; width: 100%;">
                        </div>
                    <?php } ?>
           <div class="card mt-1">
                <div class="card-body">  
                    <div class="row">
                        <div class="col-md-6">                           
                            <p><?php echo $this->lang->line('patient') ;?>: <?php echo composePatientName($patient_name,$patient_id); ?></p>        
                        </div>
                        <div class="col-md-6 text-right">                            
                            <p><?php echo $this->lang->line('case_id') ;?>: <?php echo $case_id; ?></p>                 
                        </div>
                    </div>
                    <div class="row">
                        <?php  $currency_symbol = $this->customlib->getHospitalCurrencyFormat();  ?> 
                        <div class="box-body pb0">                   
                            <div class="col-md-12 col-lg-10 col-sm-9"> 
                            <table class="print-table" style="text-align: left; padding-top: 10px;">
                                <tbody>
                                    <tr>
                                        <th><?php echo $this->lang->line('reference_no'); ?></th>
                                        <td><?php echo $this->customlib->getSessionPrefixByType('operation_theater_reference_no'). $otdetails->id;?>  </td>                           
                                        <th><?php echo $this->lang->line('operation_name'); ?></th>
                                        <td><?php echo $otdetails->operation; ?></td>
                                    </tr> 
                                    <tr>
                                        <th ><?php echo $this->lang->line('date'); ?></th>
                                        <td><?php echo $this->customlib->YYYYMMDDHisTodateFormat($otdetails->date,$this->customlib->getHospitalTimeFormat());?></td>                                       
                                        <th ><?php echo $this->lang->line('operation_category'); ?></th>
                                        <td ><?php echo $otdetails->category; ?></td>
                                    </tr>
                                    <tr>
                                        <th ><?php echo $this->lang->line('consultant_doctor'); ?></th>
                                        <td ><?php echo $otdetails->name.' '. $otdetails->surname. ' ('. $otdetails->employee_id.')'; ?></td>                                        
                                        <th ><?php echo $this->lang->line('assistant_consultant').' 1'; ?></th>
                                        <td >
                                            <?php  echo $otdetails->ass_consultant_1; ?>   
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo $this->lang->line('assistant_consultant').' 2'; ?></th>
                                        <td ><?php echo $otdetails->ass_consultant_2; ?></td>
                                        <th ><?php echo $this->lang->line('anesthetist'); ?></th>
                                        <td ><?php echo $otdetails->anesthetist;?></td>
                                    </tr>
                                    <tr>                                    
                                        <th ><?php echo $this->lang->line('anaethesia_type'); ?></th>
                                        <td ><?php echo $otdetails->anaethesia_type;?></td>                                
                                        <th ><?php echo $this->lang->line('ot_technician'); ?></th>
                                        <td ><?php echo $otdetails->ot_technician;?></td>
                                    </tr>
                                    <tr>                                   
                                        <th ><?php echo $this->lang->line('ot_assistant'); ?></th>
                                        <td ><?php echo $otdetails->ot_assistant;?></td>
                                        <th ><?php echo $this->lang->line('remark'); ?></th>
                                        <td ><?php echo $otdetails->remark;?></td>
                                    </tr>
                                    <tr>
                                        <th ><?php echo $this->lang->line('result'); ?></th>
                                        <td ><?php echo $otdetails->result;?></td>
                                         <th ><?php echo "Batch No."; ?></th>
                                        <td ><?php echo $otdetails->batch_no;?></td>
                                    </tr>
                                    <tr>
                                        <th ><?php echo "Serial No."; ?></th>
                                        <td ><?php echo $otdetails->serial_no;?></td>
                                         <th ><?php echo "Manufacturer"; ?></th>
                                        <td ><?php echo $otdetails->manufacturer;?></td>
                                    </tr>
                                    <tr>
                                        <th ><?php echo "IOL Name"; ?></th>
                                        <td ><?php echo $otdetails->iol_name;?></td>
                                         <th ><?php echo "IOL Model"; ?></th>
                                        <td ><?php echo $otdetails->iolmodel_name;?></td>
                                    </tr>
                                    <tr>
                                        <th ><?php echo "IOL Type"; ?></th>
                                        <td ><?php echo $otdetails->ioltype_name;?></td>
                                         <th ><?php echo "Axial Length"; ?></th>
                                        <td ><?php echo $otdetails->axial_name;?></td>
                                    </tr>
                                    <tr>
                                        <th ><?php echo "A Constant"; ?></th>
                                        <td ><?php echo $otdetails->constant_name;?></td>
                                         <th ><?php echo "Power"; ?></th>
                                        <td ><?php echo $otdetails->power_name;?></td>
                                    </tr>
                                    <tr>
                                        <th ><?php echo "Optin Dioptor"; ?></th>
                                        <td ><?php echo $otdetails->optin_name;?></td>
                                         <th ><?php echo "AC/PC"; ?></th>
                                        <td ><?php echo $otdetails->acpc_name;?></td>
                                    </tr>
                                    <tr>
                                        <th ><?php echo "MFG Date"; ?></th>
                                        <td ><?php echo $otdetails->mfg_date;?></td>
                                         <th ><?php echo "Exipry Date"; ?></th>
                                        <td ><?php echo $otdetails->expiry_date;?></td>
                                    </tr>
                                    <tr>
                                        <th ><?php echo "Supplier"; ?></th>
                                        <td ><?php echo $otdetails->supplier;?></td>
                                         <th ><?php echo "Purchase Price"; ?></th>
                                        <td ><?php echo $otdetails->purchase_price;?></td>
                                    </tr>
                                    <tr>
                                        <th ><?php echo "MRP"; ?></th>
                                        <td ><?php echo $otdetails->mrp;?></td>
                                         <th ><?php echo "Invoice No."; ?></th>
                                        <td ><?php echo $otdetails->invoice_no;?></td>
                                    </tr>
                                    <tr>
                                       <th ><?php echo "Start Time"; ?></th>
                                        <td><?php echo $otdetails->start_time;?></td> 
                                        <th ><?php echo "End Time"; ?></th>
                                        <td><?php echo $otdetails->end_time;?></td>
                                    </tr>
                                    <?php  if (!empty($fields)) {
                                        foreach ($fields as $fields_key => $fields_value) {
                                            $display_field = $otdetails->{$fields_value->name};
                                            if ($fields_value->type == "link") {
                                                $display_field = "<a href=" . $otdetails->{$fields_value->name} . " target='_blank'>" . $otdetails->{$fields_value->name} . "</a>";
                                            }
                                    ?>
                                    <tr>
                                        <th ><?php echo $fields_value->name; ?></th>
                                        <td colspan="3"><?php echo $display_field;?></td>
                                    <tr>                                   
                                <?php }
                            } ?>                                    
          
                                </tbody>
                            </table>
                            </div>           
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear">
                <p>
                    <?php
                    if (!empty($print_details[0]['print_footer'])) {
                        echo $print_details[0]['print_footer'];
                    }
                    ?>                          
                </p>
            </div>
        </div>
    </div>
</div>