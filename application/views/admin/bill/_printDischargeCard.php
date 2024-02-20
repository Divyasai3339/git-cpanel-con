<?php 
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/sh-print.css">
<div class="print-area">
<div class="row">  
<div class="col-md-12">
                <?php if (!empty($print_details[0]['print_header'])) { ?>
                        <div class="pprinta4">
                           <img src="https://sivaeyehospital.com/uploads/printing/pre_1.jpeg" class="img-responsive" style="height:100px; width: 100%;">
                            <?php
                            // if (!empty($print_details[0]['print_header']))
                            {
                                // echo base_url() . $print_details[0]['print_header'].img_time();
                            }
                            ?>
                            
                        </div>
                    <?php } ?>
           <div class="card mt-1">
                <div class="card-body"> 
                    <div class="row">
                        <?php 
                            $currency_symbol = $this->customlib->getHospitalCurrencyFormat();
                        ?> 
                <div class="box-body pb0">                   
                    <div class="col-md-12 col-lg-10 col-sm-9">  
                        
                <div class="">
                <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="100%" class="noborder_table">
                        <tr>
                            <th width="25%"><?php echo $this->lang->line('case_id'); ?></th>
                            <td width="25%"><?php echo $case_id;?>
                            </td>

                            <tr>
                            <th width="25%"><?php echo $this->lang->line('ipd'); ?></th>
                            <td width="25%"><?php echo $ipd_id; ?>
                        

                            </td>
                           
                             <th width="25%"><?php echo $this->lang->line('consultant_doctor'); ?></th>
                            <!-- <td width="25%"><?php echo $result['consultant_doctor'];?></td> -->

                            <td><?php echo $result1['name']." ".$result1['surname']." (".$result1['employee_id'].")" ;?></td>
                        </tr>
                        <tr>
                            <th width="25%"><?php echo $this->lang->line('name'); ?></th>
                            <td width="25%"><?php echo composePatientName($result['patient_name'],$result['patient_id']); ?></td>                                       
                            
                            <th width="25%"><?php echo 'Consultant Surgeon'; ?></th>
                            <td width="25%">
                                            <?php
                                        foreach($operation_theatre as $op_t){
                                            print_r($op_t['ass_consultant_1']);
                                        }
                                        ?></td>
                        </tr>
                      
                        <tr>
                            <th  width="25%"><?php echo $this->lang->line('gender'); ?></th>
                            <td  width="25%"><?php echo $result['gender']; ?></td>                                
                            <th width="25%"><?php echo $this->lang->line('guardian_name'); ?></th>
                            <td width="25%"><?php echo $result['guardian_name']; ?></td>
                        </tr>

                        <tr>
                            <th  width="25%"><?php echo $this->lang->line('phone'); ?></th>
                            <td  width="25%"><?php echo $result['mobileno']; ?></td>
                            <th  width="25%"><?php echo $this->lang->line('age'); ?></th>
                            <td  width="25%">
                                <?php
                                if (!empty($result['dob'])) {
                                    echo $this->customlib->getAgeBydob($result['dob']);
                                } 
                                ?>   
                            </td>
                                                  
                    </tr>
                    <tr>
                            <th width="25%"><?php echo $this->lang->line('address'); ?></th>
                            <td  width="25%"><?php echo $result['address']; ?></td>
                            <?php 
                        if($result['opdid']!='' && $result['opdid']!=0){ ?>                
                            <th  width="25%"><?php echo $this->lang->line('opd_no'); ?></th>
                            <td  width="25%"><?php
                                if($result['opdid']!='' && $result['opdid']!=0){
                                    echo $this->customlib->getSessionPrefixByType('opd_no').$result['opdid'];
                                }                                   
                                ?>
                            </td>                                   
                        <?php }  
                        if($result['ipdid']!='' && $result['ipdid']!=0){?>                     
                            <th  width="25%"><?php echo $this->lang->line('ipd_no'); ?></th>
                            <td  width="25%"><?php
                                if($result['ipdid']!='' && $result['ipdid']!=0){
                                    echo $this->customlib->getSessionPrefixByType('ipd_no').$result['ipdid'];
                                }                                            
                                ?>
                            </td>                                   
                        <?php } ?>             
                           
                    </tr>
                    </table>
                    <hr>
                    <h3 class="box-title text-center text-uppercase">Discharged Summary </h3>
                </div>

                            <table class="print-table" style="text-align: left; padding-top: 10px;">
                                <tbody>
                                    
                                <tr>                            
                                    <th ><?php echo $this->lang->line('admission_date');?></th>
                                    <td ><?php if($result1['date']!='' && $result1['date']!='0000-00-00'){
                                        echo $this->customlib->YYYYMMDDHisTodateFormat($result1['date']);
                                    } ?></td>

                                    <th ><?php echo $this->lang->line('discharge_date'); ?></th>
                                    <td >
                                        <?php if((!empty($discharge_card)) && $discharge_card['discharge_date']!=''){ echo $this->customlib->YYYYMMDDHisTodateFormat($discharge_card['discharge_date']); }   ?>

                                    </td>
                                </tr>
                                <tr>                    
                                    <th ><?php echo $this->lang->line('discharge_status'); ?></th>
                                    <td ><?php  echo $this->customlib->discharge_status($discharge_card['discharge_status']);  ?></td> 
                                    <th  width="25%"><?php echo 'D.O.S'; ?></th>
                                    <td  width="25%">
                                    <?php
                                                    foreach($operation_theatre as $op_t){

                                                        print_r($op_t['date']);

                                                    }
                                                    ?>
                                        
                                    </td>
                                </tr> 
                                    <?php 
                                         if($discharge_card['discharge_status']==1){
                                    ?>
                                    <tr>                                    
                                        <th ><?php echo $this->lang->line('death_date'); ?></th>
                                        <td >
                                            <?php if((!empty($discharge_card)) && $discharge_card['death_date']!=''){ echo $this->customlib->YYYYMMDDHisTodateFormat($discharge_card['death_date']); }   ?>
                                        </td>                           
                                        <th ><?php echo $this->lang->line('death_report'); ?></th>
                                        <td >
                                            <?php if(!empty($deathrecord)){ echo $deathrecord['death_report'];  } ?>
                                        </td> 
                                                                   
                                    </tr> 
                                    <?php
                                         }                                       
                                         if($discharge_card['discharge_status']==2){
                                    ?>
                                    <tr>                                   
                                        <th><?php echo $this->lang->line('referral_date'); ?></th>
                                        <td >
                                        	<?php if((!empty($discharge_card)) && $discharge_card['refer_date']!=''){ echo $this->customlib->YYYYMMDDHisTodateFormat($discharge_card['refer_date']); }   ?>
                                        </td>                             
                                        <th ><?php echo $this->lang->line('referral_hospital_name'); ?></th>
                                        <td >
                                        	<?php if((!empty($discharge_card)) && $discharge_card['refer_to_hospital']!=''){ echo $discharge_card['refer_to_hospital']; }   ?>
                                        </td>                                       
                                    </tr>
                                    <tr>                                   
                                        <th ><?php echo $this->lang->line('reason_for_referral'); ?></th>
                                        <td >
                                        	<?php if((!empty($discharge_card)) && $discharge_card['reason_for_referral']!=''){ echo $discharge_card['reason_for_referral']; }   ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php 
                                    if(!empty($discharge_card['field_data'])){
                                        foreach ($discharge_card['field_data'] as $key => $value) {
                                    	?>
                                        <tr> <th><?php echo $value['name']; ?></th><td><?php echo $value['field_value']; ?></td></tr>
                                    	<?php
                                        }
                                    }
                                ?>                  
          
                                </tbody>
                            </table>                  
                            <table class="print-table" style="text-align: left; padding-top: 10px;">
                                <tbody>   
                                     <tr>
                                        <td><b><?php echo 'Chief Complaints : '; ?></b><?php if(!empty($discharge_card)){ echo $discharge_card['investigations'];  } ?></td>
                                    </tr>
                                    <tr>
                                        <td><b><?php echo 'Diagnosis : '; ?></b><?php if(!empty($discharge_card)){ echo $discharge_card['diagnosis'];  } ?></td>
                                    </tr>
                                    <tr>
                                        <td><b><?php echo 'Operations'; ?></b><br>

                                            <?php
                                        foreach($operation_theatre as $op_t){
                                            print_r($op_t['category']);
                                        }
                                        ?>
                                        
                                    </td>
                                    <tr>
                                        <td><b><?php echo 'Patient Conditions at the time of Discharge : '; ?></b><?php if(!empty($discharge_card)){ echo $discharge_card['treatment_home'];  } ?></td>
                                    </tr>
                                    </tr>
                                    
                                    <tr>
                                        <td><b><?php echo 'Post Operative Vision : '; ?></b><?php if(!empty($discharge_card)){ echo $discharge_card['clinical_findings'];  } ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><b><?php echo 'Signature: '; ?></b></td>
                                        <td style="padding-right:100px;"><?php echo 'IOL Sticker'; ?></td>

                                    </tr>
                                <tbody>
                            </table>   
                            <h3 style="text-decoration:uppercase;">Your Next Appointment</h3>
                            <table class="print-table table-borderd" style="text-align: left;" >
                                <tbody>
                                    <tr>
                                        <th>&nbsp</th>
                                        <th>First Visit</th>
                                        <th>Second Visit</th>
                                        <th>Third Visit</th>
                                        <th>Forth Visit</th>
                                    </tr>
                                    <tr>
                                        <td>Date Time</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <td>Doctor</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>           
                        </div>
                    </div>                   
                </div>
            </div>
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