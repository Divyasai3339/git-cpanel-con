<?php 
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/sh-print.css">
<style>
    th{
        width:25%;
    }
    td{
        width:25%;
    }
</style>
<div class="print-area">
<div class="row">  
<div class="col-md-12">
                <?php if (!empty($print_details[0]['print_header'])) { ?>
                        <div class="pprinta4">
                            <img src="https://rajanclinic.com/uploads/printing/pre_1.jpeg" class="img-responsive" style="height:100px; width: 100%;">
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
                    <table width="100%" class="noborder_table" style="margin: 0px;">
                        <tr>
                            <th width="25%"><?php echo $this->lang->line('case_id'); ?></th>
                            <td width="25%"><?php echo $case_id;?></td>
                            <th width="25%"><?php echo $this->lang->line('ipd'); ?></th>
                            <td width="25%"><?php echo $ipd_id; ?></td>
                        </tr>
                        <tr>
                            <th width="25%"><?php echo $this->lang->line('name'); ?></th>
                            <td width="25%"><?php echo composePatientName($result1['patient_name'],$result1['patient_id']);?></td>
                            <th width="25%"><?php echo $this->lang->line('phone'); ?></th>
                            <td width="25%"><?php echo $result1['mobileno']; ?></td>
                        </tr>
                        
                        <tr>
                           
                            <th  width="25%"><?php echo $this->lang->line('age'); ?></th>
                            <td  width="25%">
                                <?php
                                if (!empty($result1['dob'])) {
                                    echo $this->customlib->getAgeBydob($result1['dob']);
                                } 
                                ?>   
                            </td>
                            <th width="25%"><?php echo $this->lang->line('address'); ?></th>
                            <td  width="25%"><?php echo $result1['address']; ?></td>
                                                  
                    </tr>
                    <tr>
                           
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
                <hr style="height: 1px; clear: both;" />

                    <h3 class="text-center text-uppercase" style="padding: 0px;margin:0px;">Patient Prep </h3>
                </div>
              
                            <table class="print-table" style="text-align: left;font-size:14px;border:0.5px solid black;">
                            <thead>
                                <tr>
                                    <th>Details</th>
                                    <th>RE</th>
                                    <th>LE</th>
                                </tr>
                            </thead>
                                <tbody>  
                                    <tr>
                                        <td>Visions : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_ant'];  } ?></td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['l_vision'];  } ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ant Segment : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_ant'];  } ?></td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['l_ant'];  } ?></td>
                                    </tr>

                                    <tr>
                                        <td>Fundus : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_fun'];  } ?></td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['l_fun'];  } ?></td>
                                    </tr>
                                    <tr>
                                        <td>A.R : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_ar'];  } ?></td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['l_ar'];  } ?></td>
                                    </tr>
                                    <tr>
                                        <td>IOP/Tension : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_iop'];  } ?></td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['l_iop'];  } ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sac/Syringing : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_sac'];  } ?></td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['l_sac'];  } ?></td>
                                    </tr>
                                   
                                    <tr>
                                        <td>K 1 Reading : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_k1'];  } ?></td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['l_k1'];  } ?></td>
                                    </tr>
                                    <tr>
                                        <td>K 2 reading  : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_k2'];  } ?></td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['l_k2'];  } ?></td>
                                    </tr>
                                    <tr>
                                        <td>AC depth : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_ac'];  } ?></td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_ac'];  } ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lens Thickness : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_len'];  } ?></td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['l_len'];  } ?></td>
                                    </tr>
                                    <tr>
                                        <td>Axial Lenght : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_axi'];  } ?></td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['l_axi'];  } ?></td>
                                    </tr>

                                    <tr>
                                        <td>Iol Power : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_iol'];  } ?></td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['l_iol'];  } ?></td>
                                    </tr>

                                     <tr>
                                        <td>B.P : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_bp'];  } ?></td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['l_bp'];  } ?></td>
                                    </tr>
                                    <tr>
                                        <td>Blood Sugar : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_blo'];  } ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Systemic illness : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['l_blo'];  } ?></td>
                                        <td></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Eye to be Operated : </td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['r_ope'];  } ?></td>
                                        <td><?php if(!empty($discharge_prep)){ echo $discharge_prep['l_ope'];  } ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date of Surgery : </td>
                                        <td>
                                            <?php if((!empty($discharge_prep)) && $discharge_prep['surgery_date']!=''){ echo $this->customlib->YYYYMMDDHisTodateFormat($discharge_prep['surgery_date']); }   ?>
        
                                        </td>
                                        <td>
                                        <?php if((!empty($discharge_prep)) && $discharge_prep['surgery_date_left']!=''){ echo $this->customlib->YYYYMMDDHisTodateFormat($discharge_prep['surgery_date_left']); }   ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>H/O : </td>
                                        <td colspan="2"><?php if(!empty($discharge_prep)){ echo $discharge_prep['ho'];  } ?></td>
                                    </tr>
                                    <tr>
                                        <td>Amount..................................................... Paid</td>
                                        <td></td>
                                    </tr>
                                    
                           
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