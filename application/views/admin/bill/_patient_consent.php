<?php 
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();

?>  

            <form id="patient_consent" accept-charset="utf-8" action="<?php echo base_url()?>admin/bill/add_consent" method="post" class="">
            
                <input type="hidden" name="opd_id" value="<?php echo $opd_id;?>" class="form-control" >
              
               <input type="hidden" name="id" value="<?php  if(!empty($discharge_consent)){ echo $discharge_consent['id']; } ?>"  class="form-control" >
         
                <input type="hidden" name="ipd_id" value="<?php echo $ipd_id;?>"  class="form-control" >
                <input type="hidden" name="case_reference_id" value="<?php echo $case_id; ?>" class="form-control">
 

<!-- New Code Start -->

<!-- Pre Operation Diagnosis -->
<div class="row">
  <div class="col-md-12">
    <h4>Consent Form </h4>
  </div>
</div>

<div class="row">
<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'Surgery Date'; ?></h5></label>
                                        <input type="text" name="surgery_date" value="<?php if((!empty($discharge_consent)) && $discharge_consent['surgery_date']!=''){ echo $this->customlib->YYYYMMDDHisTodateFormat($discharge_consent['surgery_date']); }   ?>" class="form-control datetime" autocomplete="off">
                                        <span class="text-danger"></span>
                                    </div>
    </div>
    <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'Surgeon Name'; ?></h5></label>
                                        <input type="text" name="surgeon_name"  value="<?php if((!empty($discharge_consent)) && $discharge_consent['surgeon_name']!=''){ echo $discharge_consent['surgeon_name']; }   ?>" id="surgeon_name" class="form-control"/>
                                    </div>
    </div>
    <div class="col-md-3">
    <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'KMC No.'; ?></h5></label>
                                        <input type="text" name="kmc_no"  value="<?php if((!empty($discharge_consent)) && $discharge_consent['kmc_no']!=''){ echo $discharge_consent['kmc_no']; }   ?>" id="kmc_no" class="form-control"/>
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
    <?php 
    if((!empty($discharge_consent))){
         ?>  
$('#allpayments_print_consent').html(' <a href="javascript:void(0);"   class=" print_consent" data-recordId="<?php echo $discharge_consent['id'];?>" data-case_id="<?php echo $case_id; ?>" data-ipd_id="<?php echo $ipd_id; ?>" ><i class="fa fa-print"></i> </a> ');

<?php 
}   
?>
    
</script>