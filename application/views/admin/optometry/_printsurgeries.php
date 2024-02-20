<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/sh-print.css">
<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
//print_r($visit_data);
?>
<style>
  .txt_center th{
    /* color: blue !important; */
    text-align: left !important;
  }
.txt_center td{
    /* color: blue !important; */
    text-align: left !important;
    /*border:1px solid black;*/
    width:30% !important;
  }
  .fullwidth td{
      width:100% !important;
  }
</style>
<div class="print-area" style="margin-left:50px">
    <html lang="en">
    <div id="html-2-pdfwrapper">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="pprinta4">
                    <?php 
                    // if (!empty($print_details['print_header'])) { 
                    ?>
                        <img src="https://sivaeyehospital.com/uploads/printing/emr_print.jpeg" class="img-responsive" style="height:100px; width: 100%;">
                    <?php 
                    // } 
                    ?>
                    <div style="height: 10px; clear: both;"></div>
                </div>
                <div class="">
                
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="100%" class="noborder_table txt_center" style="display:block">
                        <tr>
                             <th width=""><?php echo $this->lang->line("patient_name"); ?></th>
                            <td width=""><?php echo $result['patient_name'] ?> (<?php echo $result['id'] ?>)</td>
                             <th><?php echo $this->lang->line('consultant_doctor'); ?></th>
                            <td><?php echo $result['name'] . " " . $result['surname'] ?> (<?php echo $result['employee_id'] ?>)</td>
                            
                         </tr>  
                        <tr>
                            <th width=""><?php echo $this->lang->line("age"); ?>/<?php echo $this->lang->line("gender"); ?></th>
                            <td><?php
                                echo $this->customlib->getPatientAge($result['age'], $result['month'], $result['day']);
                                ?>/<?php echo $result['gender'] ?></td>
                                <th width=""><?php echo $this->lang->line("phone"); ?></th>
                            <td><?php echo $result['mobileno'] ?></td>
                        </tr>
                        
                    </table>
                    
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top:0px" />
                    <table width="100%" class="table noborder_table txt_center">
                        <tr>
                             <th width="25%">Surgeon Name</th>
                                <td><?php echo $surgery->surgeon_name ?></td>
                                <th width="25%">Anesthetist Name</th>
                                <td width=""><?php echo $surgery->anesthetist_name ?></td>
                        </tr>
                        <tr>
                             <th width="">Operated Eye</th>
                                <td width=""><?php echo $surgery->operated_eye ?></td>
                                <th width="">Surgery Date</th>
                                 <td class="fnt"><?php echo $this->customlib->YYYYMMDDHisTodateFormat($surgery->surgery_date); ?></td>
                               
                        </tr>
                         <tr>
                             <th width="">Reporting Date</th>
                              <td class="fnt"><?php echo $this->customlib->YYYYMMDDHisTodateFormat($surgery->reporting_date); ?></td>
                                
                                <th width="">Booked By</th>
                                <td width=""><?php echo $surgery->booked_by ?></td>
                        </tr>
                        <tr>
                             <th width="">Rate</th>
                                <td width=""><?php echo $surgery->rate ?></td>
                                <th width="">Package</th>
                                <td width=""><?php echo $surgery->package ?></td>
                        </tr>
                        <tr>
                             <th width="">Bed Type</th>
                                <td width=""><?php echo $surgery->bed_type ?></td>
                                <th width="">Amount</th>
                                <td width=""><?php echo $surgery->amount ?></td>
                        </tr>
                        <tr>
                             <th width="">Insurer</th>
                                <td width=""><?php echo $surgery->insurer ?></td>
                                
                        </tr>
                        <tr>
                                <th width="">Patient Notes</th>
                                <td class="fullwidth" colspan="3"><?php echo $surgery->patient_notes ?></td>
                        </tr>
                        <tr>
                                <th width="">Counsellor Remarks</th>
                                <td class="fullwidth" colspan="3"><?php echo $surgery->counsellor_remarks ?></td>
                        </tr>
                         <tr>
                             <th width="">FollwUp Date</th>
                              <td class="fnt"><?php echo $this->customlib->YYYYMMDDHisTodateFormat($surgery->followup_date); ?></td>
                                
                                <th width="">Status</th>
                                <td width=""><?php echo $surgery->status ?></td>
                        </tr>
                        
                    </table>
                    
                    <table width="100%" class="printablea4" style="margin-left:50px;">
                        <tr>
                            <td><?php
                                if (!empty($print_details['print_footer'])) {
                                    echo $print_details['print_footer'];
                                }
                                ?></td>
                        </tr>
                    </table><br/><br/><br/><br/>

                    <p class="text-right" style="margin-right:100px">Authorised Signature</p>
                </div>
            </div>
            <!--/.col (left) -->
        </div>
    </div>
</div>