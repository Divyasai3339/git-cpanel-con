<?php 
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();

?>  

            <form id="patient_discharge" accept-charset="utf-8" action="<?php echo base_url()?>admin/bill/add_discharge" method="post" class="">
            
                <input type="hidden" name="opd_id" value="<?php echo $opd_id;?>" class="form-control" >
              
               <input type="hidden" name="id" value="<?php  if(!empty($discharge_card)){ echo $discharge_card['id']; } ?>"  class="form-control" >
         
                <input type="hidden" name="ipd_id" value="<?php echo $ipd_id;?>"  class="form-control" >
                <input type="hidden" name="case_reference_id" value="<?php echo $case_id; ?>" class="form-control">
 
                            <div class="row">
                              <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('discharge_date'); ?></label><small class="req"> *</small> 
                                        <input type="text" name="discharge_date"  value="<?php if((!empty($discharge_card)) && $discharge_card['discharge_date']!=''){ echo $this->customlib->YYYYMMDDHisTodateFormat($discharge_card['discharge_date']); }   ?>" class="form-control datetime" autocomplete="off">
                                        <span class="text-danger"></span>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('discharge_status'); ?></label> 
                                        <select class="form-control death_status" name="death_status">
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        <?php foreach ($death_status as $key => $value) {
                                            ?>
                                            <option <?php if((!empty($discharge_card)) && $discharge_card['discharge_status']==$key){ echo "selected"; }   ?> value="<?php echo $key ?>" ><?php echo $value ?></option>
                                        <?php } ?>
                                        </select>    
                                        
                                    </div>
                                </div>
                                 <!-- <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email"><?php echo $this->lang->line('note'); ?></label>
                                        <textarea name="note" id="note" class="form-control" ><?php if(!empty($discharge_card)){ echo $discharge_card['note'];  } ?></textarea>
                                    </div>
                                </div>  -->
                               
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email"><?php echo $this->lang->line('diagnosis'); ?></label>
                                        <textarea name="diagnosis" id="diagnosis" class="form-control" ><?php if(!empty($discharge_card)){ echo $discharge_card['diagnosis'];  } ?></textarea>
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email"><?php echo 'Chief Complaints'; ?></label>
                                        <textarea name="investigations" id="investigations" class="form-control" ><?php if(!empty($discharge_card)){ echo $discharge_card['investigations'];  } ?></textarea>
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email"><?php echo 'Patient Conditions at the time of Discharge'; ?></label>
                                        <textarea name="treatment_home" id="treatment_home" class="form-control" ><?php if(!empty($discharge_card)){ echo $discharge_card['treatment_home'];  } ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="clinical_findings"><?php echo 'Post Operative Vision'; ?></label>
                                        <textarea name="clinical_findings" id="clinical_findings" class="form-control" ><?php if(!empty($discharge_card)){ echo $discharge_card['clinical_findings'];  } ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- new column added -->
                            <div class="row" style="display: none;">
                               
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rbs_fbs"><?php echo 'R.B.S / F.B.S : '; ?></label>
                                        <textarea name="rbs_fbs" id="rbs_fbs" class="form-control" ><?php if(!empty($discharge_card)){ echo $discharge_card['rbs_fbs'];  } ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="duct_syringing"><?php echo 'Duct Syringing'; ?></label>
                                        <textarea name="duct_syringing" id="duct_syringing" class="form-control" ><?php if(!empty($discharge_card)){ echo $discharge_card['duct_syringing'];  } ?></textarea>
                                    </div>
                                </div> 
                            </div>
                            <div class="row" style="display: none;">
                            <div class="col-sm-12">
                                    <div class="form-group">
                                    <label for="email"><?php echo 'IOL Power Calculation/A.scan : ' ; ?></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="od_os"><?php echo 'OD / OS: '; ?></label>
                                                <input type="text" name="od_os" id="od_os" class="form-control" value="<?php if(!empty($discharge_card)){ echo $discharge_card['od_os'];  } ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="k1"><?php echo 'K1: '; ?></label>
                                                <input type="text" name="k1" id="k1" class="form-control" value="<?php if(!empty($discharge_card)){ echo $discharge_card['k1'];  } ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="k2"><?php echo 'K2: '; ?></label>
                                                <input type="text" name="k2" id="k2" class="form-control" value="<?php if(!empty($discharge_card)){ echo $discharge_card['k2'];  } ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="iol"><?php echo 'I.O.L: '; ?></label>
                                                <input type="text" name="iol" id="iol" class="form-control" value="<?php if(!empty($discharge_card)){ echo $discharge_card['iol'];  } ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                          <div class="row death_status_div" style="display: none;">
                                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('death_date'); ?></label><small class="req"> *</small> 
                                        <input type="text" value="<?php if((!empty($discharge_card)) && $discharge_card['death_date']!=''){ echo $this->customlib->YYYYMMDDHisTodateFormat($discharge_card['death_date']); }   ?>" style="z-index: 1700;" name="death_date" id="death_date" class="form-control datetime">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('guardian_name'); ?></label><small class="req"> *</small>
                                        <input type="hidden" name="patient_id" value="<?php echo $patient_id;?>">
                                        <input type="hidden" name="deathrecord_id" value="<?php if(!empty($deathrecord)){ echo $deathrecord['id'];  } ?>">
                                        <input type="text" value="<?php echo $guardian_name;?>" name="guardian_name" id="guardian_name" class="form-control">
                                        <span class="text-danger"><?php echo form_error('guardian_name'); ?></span>
                                    </div>
                                </div> 

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email"><?php echo $this->lang->line('report'); ?></label>
                                        <textarea name="death_report" id="death_report" class="form-control" ><?php if(!empty($deathrecord)){ echo $deathrecord['death_report'];  } ?></textarea>
                                    </div>
                                </div>
                                <div class="">
                                <?php
                                echo display_custom_fields('death_report');
                                ?>
                                </div>
                                
                                </div>
                                 <div class="row reffer_div" style="display: none;">
                           
                                     <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('referral_date'); ?></label>
                                        <input type="text" value="<?php if((!empty($discharge_card)) && $discharge_card['refer_date']!=''){ echo $this->customlib->YYYYMMDDHisTodateFormat($discharge_card['refer_date']); }   ?>" name="referral_date" id="referral_date" class="form-control datetime">
                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('referral_hospital_name'); ?> </label><small class="req"> *</small> 
                                        <input type="text" value="<?php if((!empty($discharge_card)) && $discharge_card['refer_to_hospital']!=''){ echo $discharge_card['refer_to_hospital']; }   ?>" name="hospital_name" id="hospital_name" class="form-control ">
                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('reason_for_referral'); ?></label>
                                        <input type="text" value="<?php if((!empty($discharge_card)) && $discharge_card['reason_for_referral']!=''){ echo $discharge_card['reason_for_referral']; }   ?>" name="reason_for_referral" id="reason_for_referral" class="form-control ">
                                        
                                    </div>
                                </div>
                                
                                </div>
                <div class="row">                
                    <div class="box-footer col-md-12">
                        <div class="pull-right">
                          <input id="add_paymentbtn" type="submit" data-loading-text="<?php echo $this->lang->line('processing'); ?>" value="<?php echo $this->lang->line('save'); ?>" class="btn btn-info pull-right printsavebtn" id="saveprint">
                        </div>
                    </div>
                </div>
        </form>
<script type="text/javascript">
    $('.death_status').trigger("change");
    <?php if((!empty($discharge_card))){ ?>  
$('#allpayments_print').html(' <a href="javascript:void(0);"   class=" print_dischargecard" data-recordId="<?php echo $discharge_card['id'];?>" data-case_id="<?php echo $case_id; ?>" data-ipd_id="<?php echo $ipd_id; ?>" ><i class="fa fa-print"></i> </a> ');

<?php }   ?>
    
</script>