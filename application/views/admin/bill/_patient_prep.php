<?php 
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();

?>  

            <form id="patient_prep" accept-charset="utf-8" action="<?php echo base_url()?>admin/bill/add_prep" method="post" class="">
            
                <input type="hidden" name="opd_id" value="<?php echo $opd_id;?>" class="form-control" >
              
               <input type="hidden" name="id" value="<?php  if(!empty($discharge_prep)){ echo $discharge_prep['id']; } ?>"  class="form-control" >
         
                <input type="hidden" name="ipd_id" value="<?php echo $ipd_id;?>"  class="form-control" >
                <input type="hidden" name="case_reference_id" value="<?php echo $case_id; ?>" class="form-control">
 

<!-- New Code Start -->

<!-- Pre Operation Diagnosis -->
<div class="row">
  <div class="col-md-12">
    <h4>PRE-OPERATIVE-CHECKLIST</h4>
  </div>
</div>
<div class="row">
    <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'Pre Operation Diagnosis'; ?></h5></label>
                                    </div>
    </div>
    <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo 'Right Eye'; ?><input type="text" name="pre_r"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['pre_r']!=''){ echo $discharge_prep['pre_r']; }   ?>" id="pre_r" class="form-control"/>
                                    </div>
    </div>
    <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo 'Left Eye'; ?><input type="text" name="pre_l"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['pre_l']!=''){ echo $discharge_prep['pre_l']; }   ?>" id="pre_l" class="form-control" />
                                    </div>
    </div>
</div>

<!-- Ant Segment -->
<div class="row">
    <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ant"><?php echo 'Surgery Planned'; ?></label>
                                        <input type="text" name="sur_pla" value="<?php if((!empty($discharge_prep)) && $discharge_prep['sur_pla']!=''){ echo $discharge_prep['sur_pla']; }   ?>" id="sur_pla" class="form-control"/>
                                    </div>
    </div>
    <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for=""><?php echo 'Under'; ?></label>
                                                <select name="und" id="und" class="form-control" >
                                                <option value="">Select</option>
                                                        <option value="TA" <?php if((!empty($discharge_card)) && $discharge_card['und']=='TA'){ echo "selected"; }   ?>>TA</option>
                                                        <option value="LA" <?php if((!empty($discharge_card)) && $discharge_card['und']=='LA'){ echo "selected"; }   ?>>LA</option>

                                                </select>
                                            </div>
                                        </div>

</div>
<div class="row">
    <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fun"><?php echo 'Surgery Date'; ?></label>
                                        <input type="text" name="surgery_date" value="<?php if((!empty($discharge_prep)) && $discharge_prep['surgery_date']!=''){ echo $this->customlib->YYYYMMDDHisTodateFormat($discharge_prep['surgery_date']); }   ?>" class="form-control datetime" autocomplete="off">
                                        <span class="text-danger"></span>
                                    </div>
    </div>
    <div class="col-md-3">
    <div class="form-group">
                                                <label for=""><?php echo ''; ?></label>
                                                <select name="hos" id="hos" class="form-control" >
                                                <option value="">Select</option>
                                                        <option value="Hospital" <?php if((!empty($discharge_card)) && $discharge_card['hos']=='Hospital'){ echo "selected"; }   ?>>TA</option>
                                                        <option value="PRC" <?php if((!empty($discharge_card)) && $discharge_card['hos']=='PRC'){ echo "selected"; }   ?>>LA</option>

                                                </select>
                                            </div>
    </div>
</div>
<div class="row">
  <div class="col-md-9">
                          <label for=""><?php echo 'Pre Medications'; ?></label>
                                    <div class="form-group">
                                        <textarea name="pre" id="pre" class="form-control" ><?php if(!empty($discharge_prep)){ echo $discharge_prep['pre'];  } ?></textarea>
                                    </div>
  </div>
  <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fun"><?php echo 'Given Time'; ?></label>
                                        <input type="text" name="given_date" value="<?php if((!empty($discharge_prep)) && $discharge_prep['given_date']!=''){ echo $this->customlib->YYYYMMDDHisTodateFormat($discharge_prep['given_date']); }   ?>" class="form-control datetime" autocomplete="off">
                                        <span class="text-danger"></span>
                                    </div>
    </div>
</div>

<div class="row">
                                    <div class="col-sm-12">
                                        <label>Systemic Disease</label><br/>
                                        <input type="checkbox" class="sys" id="sys" name="sys" value="DM">&nbsp;DM&nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="sys" id="sys" name="sys" value="HTN">&nbsp;HTN &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="sys" id="sys" name="sys" value="IHD">&nbsp;IHD &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="sys" id="sys" name="sys"  value="K Bifocal">&nbsp;Asthma &nbsp;&nbsp;&nbsp;</br>

                                        <input type="text" name="others" value="<?php if((!empty($discharge_prep)) && $discharge_prep['others']!=''){ echo $discharge_prep['others']; }   ?>" id="others" class="form-control" placeholder="Others"/>
                                    </div>
</div> 
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label>Allergy History</label><br/>

                                        <textarea name="ho" id="ho" class="form-control" ><?php if(!empty($discharge_prep)){ echo $discharge_prep['ho'];  } ?></textarea>
                                    </div>
                              </div>
                                </div>
                              <div class="row">
                              <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for=""><?php echo 'Pupils Dilated'; ?></label>
                                                <select name="pup" id="pup" class="form-control" >
                                                <option value="">Select</option>
                                                        <option value="Yes" <?php if((!empty($discharge_card)) && $discharge_card['pup']=='Yes'){ echo "selected"; }   ?>>Yes</option>
                                                        <option value="No" <?php if((!empty($discharge_card)) && $discharge_card['pup']=='No'){ echo "selected"; }   ?>>No</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for=""><?php echo 'Eyelash Trimmed'; ?></label>
                                                <select name="eye_tri" id="eye_tri" class="form-control" >
                                                <option value="">Select</option>
                                                        <option value="Yes" <?php if((!empty($discharge_card)) && $discharge_card['eye_tri']=='Yes'){ echo "selected"; }   ?>>Yes</option>
                                                        <option value="No" <?php if((!empty($discharge_card)) && $discharge_card['eye_tri']=='No'){ echo "selected"; }   ?>>No</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for=""><?php echo 'Consent Taken'; ?></label>
                                                <select name="consent" id="consent" class="form-control" >
                                                <option value="">Select</option>
                                                        <option value="Yes" <?php if((!empty($discharge_card)) && $discharge_card['consent']=='Yes'){ echo "selected"; }   ?>>Yes</option>
                                                        <option value="No" <?php if((!empty($discharge_card)) && $discharge_card['consent']=='No'){ echo "selected"; }   ?>>No</option>

                                                </select>
                                            </div>
                                        </div>
                              </div>
                              <div class="row">
                              <div class="col-md-3">
                                            <div class="form-group">
                                                <label for=""><?php echo 'ROPLAS'; ?></label>
                                                <select name="rop" id="rop" class="form-control" >
                                                <option value="">Select</option>
                                                        <option value="Positive" <?php if((!empty($discharge_card)) && $discharge_card['rop']=='Positive'){ echo "selected"; }   ?>>Positive</option>
                                                        <option value="Negative" <?php if((!empty($discharge_card)) && $discharge_card['rop']=='Negative'){ echo "selected"; }   ?>>Negative</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                        <label for=""><?php echo 'BP'; ?></label>
                                        <input type="text" name="bp"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['bp']!=''){ echo $discharge_prep['bp']; }   ?>" id="bp" class="form-control"/>
                                        </div>
                                        <div class="col-md-2">
                                        <label for=""><?php echo 'GRBS'; ?></label>
                                        <input type="text" name="grbs"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['grbs']!=''){ echo $discharge_prep['grbs']; }   ?>" id="grbs" class="form-control"/>
                                        </div>
                              </div>
<hr>
                              <div class="row">
  <div class="col-md-12">
    <h4>PREVIOUS EYE SURGERY DETAILS</h4>
  </div>
</div>

<div class="row">
<div class="col-sm-3">
                                            <div class="form-group">
                                                <label for=""><?php echo 'Previous Surgery'; ?></label>
                                                <select name="pre_sur" id="pre_sur" class="form-control" >
                                                <option value="">Select</option>
                                                        <option value="RE" <?php if((!empty($discharge_card)) && $discharge_card['pre_sur']=='RE'){ echo "selected"; }   ?>>RE</option>
                                                        <option value="LE" <?php if((!empty($discharge_card)) && $discharge_card['pre_sur']=='LE'){ echo "selected"; }   ?>>LE</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                        <label for=""><?php echo 'IOL Power'; ?></label>
                                        <input type="text" name="iol"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['iol']!=''){ echo $discharge_prep['iol']; }   ?>" id="iol" class="form-control"/>
                                        </div>
                                        <div class="col-md-2">
                                        <label for=""><?php echo 'Make'; ?></label>
                                        <input type="text" name="make"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['make']!=''){ echo $discharge_prep['make']; }   ?>" id="make" class="form-control"/>
                                        </div>
</div>
<div class="row">
<div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="email"><?php echo 'Other Remarks'; ?></label>
                                                <textarea name="oth_rem" id="oth_rem" class="form-control"   ><?php if(!empty($discharge_card)){ echo $discharge_card['oth_rem'];  } ?></textarea>
                                            </div>
                                        </div>
</div>

<!-- Vital -->
<style>
  .table th{
    border: 1px solid black;
  }
 .table td{
    border: 1px solid black;
  }
  .table {
    width: 100%;
    max-width: 90% !important;
    margin-bottom: 20px;
}
</style>
<hr>
<div class="row">
<div class="col-md-12">
    <h4>VITAL SIGNS RECORD</h4>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
  <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'Surgeon Name'; ?></h5></label>
                                        <input type="text" name="surgeon_name"  value="<?php if((!empty($discharge_card)) && $discharge_card['surgeon_name']!=''){ echo $discharge_card['surgeon_name']; }   ?>" id="surgeon_name" class="form-control"/>
                                    </div>
  </div>
  <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for=""><?php echo 'Patient admitted to the Ward for'; ?></label>
                                                <select name="pat_adm" id="pat_adm" class="form-control" >
                                                <option value="">Select</option>
                                                        <option value="RE" <?php if((!empty($discharge_card)) && $discharge_card['pat_adm']=='RE'){ echo "selected"; }   ?>>RE</option>
                                                        <option value="LE" <?php if((!empty($discharge_card)) && $discharge_card['pat_adm']=='LE'){ echo "selected"; }   ?>>LE</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
    <div class="form-group">
                                                <label for=""><?php echo ''; ?></label>
                                                <select name="vit_hos" id="vit_hos" class="form-control" >
                                                <option value="">Select</option>
                                                        <option value="Hospital" <?php if((!empty($discharge_card)) && $discharge_card['vit_hos']=='Hospital'){ echo "selected"; }   ?>>TA</option>
                                                        <option value="PRC" <?php if((!empty($discharge_card)) && $discharge_card['vit_hos']=='PRC'){ echo "selected"; }   ?>>LA</option>

                                                </select>
                                            </div>
    </div>
    <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for=""><?php echo 'Under'; ?></label>
                                                <select name="vit_und" id="vit_und" class="form-control" >
                                                <option value="">Select</option>
                                                        <option value="TA" <?php if((!empty($discharge_card)) && $discharge_card['vit_und']=='TA'){ echo "selected"; }   ?>>TA</option>
                                                        <option value="LA" <?php if((!empty($discharge_card)) && $discharge_card['vit_und']=='LA'){ echo "selected"; }   ?>>LA</option>

                                                </select>
                                            </div>
                                        </div>
</div>

<!-- Pre Op -->
<div class="row">
  <div class="col-md-12">
  <h5>Pre-OP (in ward)</h5>

  </div>
  <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'Date/Time'; ?></h5></label>
                                        <input type="text" name="pre_date" value="<?php if((!empty($discharge_consent)) && $discharge_consent['pre_date']!=''){ echo $this->customlib->YYYYMMDDHisTodateFormat($discharge_consent['pre_date']); }   ?>" class="form-control datetime" autocomplete="off">
                                        <span class="text-danger"></span>
                                    </div>
    </div>

  <div class="col-md-3">
  <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'BP'; ?></h5></label>
                                        <input type="text" name="vit_bp"  value="<?php if((!empty($discharge_card)) && $discharge_card['vit_bp']!=''){ echo $discharge_card['vit_bp']; }   ?>" id="vit_bp" class="form-control"/>
                                    </div>
  </div>
  <div class="col-md-3">
  <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'Pulse'; ?></h5></label>
                                        <input type="text" name="vit_pulse"  value="<?php if((!empty($discharge_card)) && $discharge_card['vit_pulse']!=''){ echo $discharge_card['vit_pulse']; }   ?>" id="vit_pulse" class="form-control"/>
                                    </div>
  </div>
  <div class="col-md-3">
  <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'SPO2'; ?></h5></label>
                                        <input type="text" name="vit_spo2"  value="<?php if((!empty($discharge_card)) && $discharge_card['vit_spo2']!=''){ echo $discharge_card['vit_spo2']; }   ?>" id="vit_spo2" class="form-control"/>
                                    </div>
  </div>
</div>

<!-- intra Op -->
<div class="row">
  <div class="col-md-12">
  <h5>Intra-OP (in ward)</h5>

  </div>
  <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'Date/Time'; ?></h5></label>
                                        <input type="text" name="intra_date" value="<?php if((!empty($discharge_consent)) && $discharge_consent['intra_date']!=''){ echo $this->customlib->YYYYMMDDHisTodateFormat($discharge_consent['intra_date']); }   ?>" class="form-control datetime" autocomplete="off">
                                        <span class="text-danger"></span>
                                    </div>
    </div>

  <div class="col-md-3">
  <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'BP'; ?></h5></label>
                                        <input type="text" name="intra_vit_bp"  value="<?php if((!empty($discharge_card)) && $discharge_card['intra_vit_bp']!=''){ echo $discharge_card['intra_vit_bp']; }   ?>" id="intra_vit_bp" class="form-control"/>
                                    </div>
  </div>
  <div class="col-md-3">
  <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'Pulse'; ?></h5></label>
                                        <input type="text" name="intra_vit_pulse"  value="<?php if((!empty($discharge_card)) && $discharge_card['intra_vit_pulse']!=''){ echo $discharge_card['intra_vit_pulse']; }   ?>" id="intra_vit_pulse" class="form-control"/>
                                    </div>
  </div>
  <div class="col-md-3">
  <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'SPO2'; ?></h5></label>
                                        <input type="text" name="intra_vit_spo2"  value="<?php if((!empty($discharge_card)) && $discharge_card['intra_vit_spo2']!=''){ echo $discharge_card['intra_vit_spo2']; }   ?>" id="intra_vit_spo2" class="form-control"/>
                                    </div>
  </div>
</div>

<!-- POST Op -->
<div class="row">
  <div class="col-md-12">
  <h5>POST-OP (in ward)</h5>

  </div>
  <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'Date/Time'; ?></h5></label>
                                        <input type="text" name="post_date" value="<?php if((!empty($discharge_consent)) && $discharge_consent['post_date']!=''){ echo $this->customlib->YYYYMMDDHisTodateFormat($discharge_consent['post_date']); }   ?>" class="form-control datetime" autocomplete="off">
                                        <span class="text-danger"></span>
                                    </div>
    </div>

  <div class="col-md-3">
  <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'BP'; ?></h5></label>
                                        <input type="text" name="post_vit_bp"  value="<?php if((!empty($discharge_card)) && $discharge_card['post_vit_bp']!=''){ echo $discharge_card['post_vit_bp']; }   ?>" id="post_vit_bp" class="form-control"/>
                                    </div>
  </div>
  <div class="col-md-3">
  <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'Pulse'; ?></h5></label>
                                        <input type="text" name="post_vit_pulse"  value="<?php if((!empty($discharge_card)) && $discharge_card['post_vit_pulse']!=''){ echo $discharge_card['post_vit_pulse']; }   ?>" id="post_vit_pulse" class="form-control"/>
                                    </div>
  </div>
  <div class="col-md-3">
  <div class="form-group">
                                        <label for="operation"><h5 class="text-center"><?php echo 'SPO2'; ?></h5></label>
                                        <input type="text" name="post_vit_spo2"  value="<?php if((!empty($discharge_card)) && $discharge_card['post_vit_spo2']!=''){ echo $discharge_card['post_vit_spo2']; }   ?>" id="post_vit_spo2" class="form-control"/>
                                    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
  <h5>Payment Mode</h5>
  </div>
  <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for=""><?php echo 'Cash/Online Transfer'; ?></label>
                                                <select name="cash" id="cash" class="form-control" >
                                                <option value="">Select</option>
                                                        <option value="Cash" <?php if((!empty($discharge_card)) && $discharge_card['cash']=='Cash'){ echo "selected"; }   ?>>Cash</option>
                                                        <option value="Online" <?php if((!empty($discharge_card)) && $discharge_card['cash']=='Online'){ echo "selected"; }   ?>>Online</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        <label for=""><?php echo 'Discount'; ?></label>
                                        <input type="text" name="discount"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['discount']!=''){ echo $discharge_prep['discount']; }   ?>" id="discount" class="form-control"/>
                                        </div>
                                        <div class="col-md-3">
                                        <label for=""><?php echo 'Final amount'; ?></label>
                                        <input type="text" name="amount"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['amount']!=''){ echo $discharge_prep['amount']; }   ?>" id="amount" class="form-control"/>
                                        </div>
                                        <div class="col-md-3">
                                        <label for=""><?php echo 'Receipt No.'; ?></label>
                                        <input type="text" name="receipt"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['receipt']!=''){ echo $discharge_prep['receipt']; }   ?>" id="receipt" class="form-control"/>
                                        </div>
</div>
<div class="row">
  <div class="col-md-12">
    Reimbursement
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <div class="form-group">
                                                <label for=""><?php echo 'Bill Given'; ?></label>
                                                <select name="bill" id="bill" class="form-control" >
                                                <option value="">Select</option>
                                                        <option value="yes" <?php if((!empty($discharge_card)) && $discharge_card['bill']=='yes'){ echo "selected"; }   ?>>yes</option>
                                                        <option value="no" <?php if((!empty($discharge_card)) && $discharge_card['bill']=='no'){ echo "selected"; }   ?>>no</option>

                                                </select>
                                            </div>
  </div>
  <div class="col-md-3">
                                        <label for=""><?php echo 'Receipt No.'; ?></label>
                                        <input type="text" name="receipt_bill"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['receipt_bill']!=''){ echo $discharge_prep['receipt_bill']; }   ?>" id="receipt_bill" class="form-control"/>
                                        </div>
</div>


<!-- Insurance Details -->
<div class="row">
  <div class="col-md-12">
  <h5>Insurance Details</h5>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
                                        <label for=""><?php echo 'Cash Less Insurance'; ?></label>
                                        <input type="text" name="cash_insu"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['cash_insu']!=''){ echo $discharge_prep['cash_insu']; }   ?>" id="cash_insu" class="form-control"/>
                                        </div>

                                        <div class="col-md-3">
                                        <label for=""><?php echo 'TPA Name'; ?></label>
                                        <input type="text" name="tpa_name"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['tpa_name']!=''){ echo $discharge_prep['tpa_name']; }   ?>" id="tpa_name" class="form-control"/>
                                        </div>

                                        <div class="col-md-3">
                                        <label for=""><?php echo 'Initial Approval'; ?></label>
                                        <input type="text" name="initial_name"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['initial_name']!=''){ echo $discharge_prep['initial_name']; }   ?>" id="initial_name" class="form-control"/>
                                        </div>

                                        <div class="col-md-3">
                                        <label for=""><?php echo 'Final Approval'; ?></label>
                                        <input type="text" name="final_name"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['final_name']!=''){ echo $discharge_prep['final_name']; }   ?>" id="final_name" class="form-control"/>
                                        </div>


  </div>
</div>


<div class="row">
  <div class="col-md-3">
                                        <label for=""><?php echo 'IPF Collected '; ?></label>
                                        <input type="text" name="ipf"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['ipf']!=''){ echo $discharge_prep['ipf']; }   ?>" id="ipf" class="form-control"/>
                                        </div>

                                        <div class="col-md-3">
                                        <label for=""><?php echo 'Co-Pay'; ?></label>
                                        <input type="text" name="copay"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['copay']!=''){ echo $discharge_prep['copay']; }   ?>" id="copay" class="form-control"/>
                                        </div>

                                        <div class="col-md-3">
                                        <label for=""><?php echo 'Higher Package Amount'; ?></label>
                                        <input type="text" name="higher"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['higher']!=''){ echo $discharge_prep['higher']; }   ?>" id="higher" class="form-control"/>
                                        </div>

                                        <div class="col-md-3">
                                        <label for=""><?php echo 'Receipt No.'; ?></label>
                                        <input type="text" name="insu_recp"  value="<?php if((!empty($discharge_prep)) && $discharge_prep['insu_recp']!=''){ echo $discharge_prep['insu_recp']; }   ?>" id="insu_recp" class="form-control"/>
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
    if((!empty($discharge_prep))){
         ?>  
$('#allpayments_print_prep').html(' <a href="javascript:void(0);"   class=" print_prep" data-recordId="<?php echo $discharge_prep['id'];?>" data-case_id="<?php echo $case_id; ?>" data-ipd_id="<?php echo $ipd_id; ?>" ><i class="fa fa-print"></i> </a> ');

<?php 
}   
?>
    
</script>