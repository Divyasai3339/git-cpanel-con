<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/sh-print.css">
<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
//print_r($result);
?>
<style>
  .txt_center th{
    /* color: blue !important; */
    text-align: center !important;
  }
.txt_center td{
    /* color: blue !important; */
    text-align: center !important;
  }
</style>
<div class="print-area" style="margin-left:50px">
    <html lang="en">
    <div id="html-2-pdfwrapper">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="pprinta4">
                                  <?php if (!empty($print_details[0]['print_header'])) { ?>
                        <div class="pprinta4">
                            <img src="https://draravindshospital.com/uploads/printing/1.jpg" class="img-responsive" style="height:100px; width: 100%;">
                        </div>
                    <?php } ?>
                    <div style="height: 10px; clear: both;"></div>
                </div>
                <div class="">
              
                <table width="100%" class="printablea4">
                    <tr>
                        <th><?php echo $this->lang->line('prescription'); ?> : <?php echo $this->customlib->getSessionPrefixByType('opd_prescription') . $optomery_data->opd_id; ?></th>
                        <td></td>
                        <th class="text-right"></th>
                        <th class="text-right"><?php echo $this->lang->line('date'); ?> : <?php  if (!empty($result->appointment_date)) {
                                echo $this->customlib->YYYYMMDDTodateFormat($result->appointment_date);
                                                                                            }
                                                                                            ?>
                        </th>
                    </tr>
                </table>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="100%" class="noborder_table">
                        <tr>
                            <th width="25%"><?php echo $this->lang->line("opd_id"); ?></th>
                            <td width="25%">
                              
                            </td>
                             <th width="25%"><?php echo $this->lang->line("patient_name"); ?></th>
                            <td width="25%"><?php echo $result->patient_name ?> (<?php echo $result->id ?>)</td>
                            </tr>

                        <tr>
                            <th width="25%"><?php echo $this->lang->line("age"); ?>/<?php echo $this->lang->line("gender"); ?></th>
                            <td><?php
                                echo $this->customlib->getPatientAge($result->age, $result->month, $result->day);
                                ?>/<?php echo $result->gender ?></td>
                                <th width="25%"><?php echo $this->lang->line("phone"); ?></th>
                            <td><?php echo $result->mobileno ?></td>
                        </tr>
                     
                        <tr>
                            <th><?php echo $this->lang->line('consultant_doctor'); ?></th>
                            <td><?php echo $result->name . " " . $result->surname ?> (<?php echo $result->employee_id ?>)</td>
                            <th><?php echo $this->lang->line('prescribe_by'); ?></th>
                            <td></td>
                        </tr>

                    </table>
                    <hr>
                    <h3 class="box-title text-center text-uppercase">Medical Records</h3>
                  <?php
                    if(!empty($optomery_data->complaints_data) && isset($optomery_data->print_data->complaints_print) && $optomery_data->print_data->complaints_print==1){
                    ?>      
                    <h4>Complaints</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="100%" class="noborder_table">
                      <tr>
				                <td class="sps"  width="50%"><?php echo $optomery_data->complaints_data; ?>
				                </td>
                      </tr>                       
                  </table>
                  <?php
                    }if(!empty($optomery_data->history_data) && isset($optomery_data->print_data->history_print) && $optomery_data->print_data->history_print==1){
                   ?>
                  <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                  <h4>History</h4>
                    <table width="100%" class=" table table-striped table-hover">
                        <tr>
                            <th>#</th>
                            <th>Disease</th>
                            <th>Duration</th>
                            <th>Medication</th>
                            <th>Condition</th>
                        </tr>
                        <?php $i = 1;
                        foreach ($optomery_data->history_data as $key => $val) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $val->disease; ?></td>
                                <td><?php echo $val->duration . " " . $val->period; ?></td>
                                <td><?php echo $val->medication; ?></td>
                                <td><?php echo $val->condition; ?></td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </table>

                    <?php }if(isset($optomery_data->print_data->vision_print) && $optomery_data->print_data->vision_print==1){
                   ?>
                  <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Visions</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered txt_center" >
                        <tr>
                          <th width="10%"></th>
                          <th colspan="2" class="text-center" width="25%">Distance Vision</th>
                          <th class="text-center" width="25%">Near Vision</th>
                        </tr>
                        <tr>
                          <th width="10%"></th>
                          <th width="25%">Presenting</th>
                          <th width="25%">Pinhole</th>
                          <th width="25%">Presenting</th>
                        </tr>
                        <tr>
                          <td width="10%">OD</td>
                          <td><?php echo $optomery_data->vision_data->vision_od_presenting;?></td>
                          <td><?php echo $optomery_data->vision_data->vision_od_pinhole;?></td>
                          <td><?php echo $optomery_data->vision_data->vision_od_near_presenting;?></td>
                        </tr>
                        <tr>
                          <td width="25%">OS</td>
                          <td><?php echo $optomery_data->vision_data->vision_os_presenting;?></td>
                          <td><?php echo $optomery_data->vision_data->vision_os_pinhole;?></td>
                          <td><?php echo $optomery_data->vision_data->vision_os_near_presenting;?></td>
                        </tr>
                    </table>
                    
                    <?php
                    }if(isset($optomery_data->print_data->retinoscope_print) && $optomery_data->print_data->retinoscope_print==1){
                     ?>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                  
                    <?php
                    }if(isset($optomery_data->print_data->cylco_print) && $optomery_data->print_data->cylco_print==1){
                     ?>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Cyclo</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered txt_center">
                        <tr>
                          <th width="25%">Cyclo</th>
                          <th>SPH</th>
                          <th>Cyl</th>
                          <th>Axis</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->cyclo_data->cyclo_od_sph;?></td>
                            <td><?php echo $optomery_data->cyclo_data->cyclo_od_cyl;?></td>
                            <td><?php echo $optomery_data->cyclo_data->cyclo_od_axis;?></td>
                        </tr>
                        <tr>
                            <td>OS</td>
                            <td><?php echo $optomery_data->cyclo_data->cyclo_os_sph;?></td>
                            <td><?php echo $optomery_data->cyclo_data->cyclo_os_cyl;?></td>
                            <td><?php echo $optomery_data->cyclo_data->cyclo_os_axis;?></td>
                        </tr>
                    </table>
                    <?php } ?>

                    
                    <!-- PGP -->
                    <?php if(isset($optomery_data->print_data->pgp_print) && $optomery_data->print_data->pgp_print==1){ ?>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>PGP</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered txt_center">
                      <tr>
                        <th>PGP</th>
                        <th>SPH</th>
                        <th>Cyl</th>
                        <th>Axis</th>
                        <th>ADD</th>
                        <th>BCVA</th>
                        <th>BCNVA</th>
                      </tr>
					  <tr>
                        <td>OD</td>
						
                        <td><?php echo $optomery_data->pgp_data->pgp_od_sph;?></td>
                        <td><?php echo $optomery_data->pgp_data->pgp_od_cyl;?></td>
                        <td><?php echo $optomery_data->pgp_data->pgp_od_axis;?></td>
                        <td><?php echo $optomery_data->pgp_data->pgp_od_add;?></td>
                        <td><?php echo $optomery_data->pgp_data->pgp_od_eom;?></td>
                        <td><?php echo $optomery_data->pgp_data->pgp_od_tropia;?></td>
                      </tr>
                      <tr>
                        <td>OS</td>
                        <td><?php echo $optomery_data->pgp_data->pgp_os_sph;?></td>
                        <td><?php echo $optomery_data->pgp_data->pgp_os_cyl;?></td>
                        <td><?php echo $optomery_data->pgp_data->pgp_os_axis;?></td>
                        <td><?php echo $optomery_data->pgp_data->pgp_os_add;?></td>
                        <td><?php echo $optomery_data->pgp_data->pgp_os_eom;?></td>
                        <td><?php echo $optomery_data->pgp_data->pgp_os_tropia;?></td>
                      </tr>
                  </table>
                  <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />

                    <table width="80%" class="table-bordered"><tr><td style="text-align:left;padding-left:10px"><?php echo "Notes: " .$optomery_data->pgp_data->pgp_notes; ?></td></tr>
                    </table>

                  
                    <!-- Acceptance -->
                    <?php
                    }if(isset($optomery_data->print_data->acceptance_print) && $optomery_data->print_data->acceptance_print==1){
                     ?>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Acceptance</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered txt_center">
                        <tr>
                          <th width="25%">Acceptance</th>
                          <th>SPH</th>
                          <th>Cyl</th>
                          <th>Axis</th>
                          <th>ADD</th>
                          <th>BCVA</th>
                          <th>BCNVA</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->acceptance_data->accp_od_sph;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_od_cyl;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_od_axis;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_od_add;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_od_va;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_od_bcnva;?></td>
                        </tr>
                        <tr>
                            <td>OS</td>
                            <td><?php echo $optomery_data->acceptance_data->accp_os_sph;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_os_cyl;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_os_axis;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_os_add;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_os_va;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_os_bcnva;?></td>
                        </tr>
                    </table>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />

                    <table width="80%" class="table-bordered"><tr><td style="text-align:left;padding-left:10px"><?php echo "Notes: " .$optomery_data->acceptance_data->accp_notes; ?></td></tr>
                    </table>

                    <!-- Keratometry -->
                    <?php
                    }if(isset($optomery_data->print_data->ker_print) && $optomery_data->print_data->ker_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Keratometry</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered txt_center">
                        <tr>
                            <th>Keratometry</th>
                            <th colspan="2">H-Axis</th>
                            <th colspan="2">V-Axis</th>
                            <th>AVG Val</th>
                            <th>CYL Val</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->ker_data->ker_od_ha1;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_od_ha2;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_od_va1;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_od_va2;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_od_av;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_od_cy;?></td>
                        </tr>
                        <tr>
                        <td>OS</td>
                            <td><?php echo $optomery_data->ker_data->ker_os_ha1;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_os_ha2;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_os_va1;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_os_va2;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_os_av;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_os_cy;?></td>
                        </tr>
                    </table>
                   
                    <!-- NCT -->
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <?php
                    }if(isset($optomery_data->print_data->nct_print) && $optomery_data->print_data->nct_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Non Contact Tenometry</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered txt_center">
                        <tr>
                           <th colspan="4">NCT in mm/hg</th>
                         </tr>
                        <tr>
                            <th>NCT</th>
                            <th>Before Dilaton</th>
                            <th>After Dialation</th>
                            <th>Time</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->nct_data->nt_od_va_bf;?></td>
                            <td><?php echo $optomery_data->nct_data->nt_od_va_af;?></td>
                            <td><?php echo $optomery_data->nct_data->nt_od_time_bf;?></td>
                        </tr>
                        <tr>
                            <td>OS</td>
                            <td><?php echo $optomery_data->nct_data->nt_os_va_bf;?></td>
                            <td><?php echo $optomery_data->nct_data->nt_os_va_af;?></td>
                            <td><?php echo $optomery_data->nct_data->nt_os_time_bf;?></td>
                        </tr>
                    </table>
                    
                    <!-- ATN -->
                    <?php
                    }if(isset($optomery_data->print_data->at_print) && $optomery_data->print_data->at_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4> Applanatim Tenometry</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered txt_center">
                        <tr>
                           <th colspan="4">ATN in mm/hg</th>
                         </tr>
                        <tr>
                            <th>ATN</th>
                            <th>Before Dilaton</th>
                            <th>After Dialation</th>
                            <th>Time</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->at_data->at_od_va_bf;?></td>
                            <td><?php echo $optomery_data->at_data->at_od_va_af;?></td>
                            <td><?php echo $optomery_data->at_data->at_od_time_bf;?></td>
                        </tr>
                        <tr>
                            <td>OS</td>
                            <td><?php echo $optomery_data->at_data->at_os_va_bf;?></td>
                            <td><?php echo $optomery_data->at_data->at_os_va_af;?></td>
                            <td><?php echo $optomery_data->at_data->at_os_time_bf;?></td>
                        </tr>
                    </table>


                    <!-- CVT -->
                    <?php
                    }if(isset($optomery_data->print_data->cvt_print) && $optomery_data->print_data->cvt_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4> Colour Vision Test</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="60%" class="table-bordered txt_center">
                        <tr>
                            <th width="40%">Ishihara Colour Vision</th>
                            <th>Values</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->cvt_data->cvt_od;?></td>
                        </tr>
                        <tr>
                            <td>OS</td>
                            <td><?php echo $optomery_data->cvt_data->cvt_os;?></td>
                        </tr>
                    </table>

                    <!-- LCVA -->
                    <?php
                    }if(isset($optomery_data->print_data->lcva_print) && $optomery_data->print_data->lcva_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>LCVA</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered txt_center">
                 
                        <tr>
                            <th>LCVA</th>
                            <th>SPH</th>
                            <th>CYL</th>
                            <th>Axis</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->lcva_data->lcva_od_sph;?></td>
                            <td><?php echo $optomery_data->lcva_data->lcva_od_cyl;?></td>
                            <td><?php echo $optomery_data->lcva_data->lcva_od_axis;?></td>
                        </tr>
                        <tr>
                            <td>OS</td>
                            <td><?php echo $optomery_data->lcva_data->lcva_os_sph;?></td>
                            <td><?php echo $optomery_data->lcva_data->lcva_os_cyl;?></td>
                            <td><?php echo $optomery_data->lcva_data->lcva_os_axis;?></td>
                        </tr>
                    </table>

                   <!-- Ant Segment -->
                   <?php
                    }if(isset($optomery_data->print_data->antsegment_print) && $optomery_data->print_data->antsegment_print==1){
                     ?>  
                     <!-- POST Segment -->
                    <?php
                    }if(isset($optomery_data->print_data->postsegment_print) && $optomery_data->print_data->postsegment_print==1){
                     ?> 
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Post Segments</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered txt_center">
                        <tr>
                          <th width="25%">Ant Segments</th>
                          <td>OD</td>
                          <td>OS</td>
                        </tr>
                        <tr>
                        <th>Ant vitreous</th>
                        <td><?php echo $optomery_data->postsegment_data->ps_od_fundus;?></td>
                        <td><?php echo $optomery_data->postsegment_data->ps_os_fundus;?></td>
                        </tr>
                        <tr>
                        <th>Cup/Disc</th>
                        <td><?php echo $optomery_data->postsegment_data->ps_od_cupdisc;?></td>
                        <td><?php echo $optomery_data->postsegment_data->ps_os_cupdisc;?></td>
                        </tr>
                        
                        <tr>
                        <th>Macula</th>
                        <td><?php echo $optomery_data->postsegment_data->ps_od_macula;?></td>
                        <td><?php echo $optomery_data->postsegment_data->ps_os_macula;?></td>
                        </tr>
                        <tr>
                        <th>Vessels</th>
                        <td><?php echo $optomery_data->postsegment_data->ps_od_vessels;?></td>
                        <td><?php echo $optomery_data->postsegment_data->ps_os_vessels;?></td>
                        </tr>
                        <tr>
                        <th>Periphery</th>
                        <td><?php echo $optomery_data->postsegment_data->ps_od_iop;?></td>
                        <td><?php echo $optomery_data->postsegment_data->ps_os_iop;?></td>
                        </tr>
                        <tr>
                        
                    </table>
                    
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />

                    <table width="80%" class="table-bordered"><tr><td style="text-align:left;padding-left:10px"><?php echo "Notes: " . $optomery_data->postsegment_data->ps_notes; ?></td></tr></table>

                    <!-- Lacrimal Patency -->
                    <?php
                    }if(isset($optomery_data->print_data->lac_print) && $optomery_data->print_data->lac_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Lacrimal patency</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered txt_center">
                        <tr>
                            <th>Lacrimal patency</th>
                            <th>Watering</th>
                            <th>Regurgitation</th>
                            <th>Discharge</th>
                            <th>Syringing</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->lac_data->lac_od_wat;?></td>
                            <td><?php echo $optomery_data->lac_data->lac_od_reg;?></td>
                            <td><?php echo $optomery_data->lac_data->lac_od_dis;?></td>
                            <td><?php echo $optomery_data->lac_data->lac_od_syr;?></td>
                        </tr>
                        <tr>
                        <td>OS</td>
                            <td><?php echo $optomery_data->lac_data->lac_os_wat;?></td>
                            <td><?php echo $optomery_data->lac_data->lac_os_reg;?></td>
                            <td><?php echo $optomery_data->lac_data->lac_os_dis;?></td>
                            <td><?php echo $optomery_data->lac_data->lac_os_syr;?></td>
                        </tr>
                    </table>

                    <!-- Dre Eye Evaluation -->
                    <?php
                    }if(isset($optomery_data->print_data->eye_print) && $optomery_data->print_data->eye_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Dry Eye Evaluation</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <!-- Schrimers test -->
                    <table width="80%" class="table-bordered txt_center">
                        <tr>
                            <th>Schirmers Test</th>
                            <th>&nbsp;</th>
                            <th>mm in</th>
                            <th>minutes</th>
                            <th>&nbsp;</th>
                            <th>mm in</th>
                            <th>minutes</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo 'I';?></td>
                            <td><?php echo $optomery_data->sch_data->sch_od_mmf;?></td>
                            <td><?php echo $optomery_data->sch_data->sch_od_minf;?></td>
                            <td><?php echo 'II';?></td>
                            <td><?php echo $optomery_data->sch_data->sch_od_mms;?></td>
                            <td><?php echo $optomery_data->sch_data->sch_od_mins;?></td>
                        </tr>
                        <tr>
                        <td>OS</td>
                        <td><?php echo 'I';?></td>
                            <td><?php echo $optomery_data->sch_data->sch_os_mmf;?></td>
                            <td><?php echo $optomery_data->sch_data->sch_os_minf;?></td>
                            <td><?php echo 'II';?></td>
                            <td><?php echo $optomery_data->sch_data->sch_os_mms;?></td>
                            <td><?php echo $optomery_data->sch_data->sch_os_mins;?></td>
                        </tr>
                    </table>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />

                    <!-- Eye Evaluation -->
                    <table width="80%" class="table-bordered txt_center">
                        <tr>
                          <th width="25%">Eye evaluation</th>
                          <th>Tear Meniscus Height</th>
                          <th>Basic Secretion Test</th>
                          <th>Impression Cytology</th>
                          <th>Tear Breakup Time</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->eye_data->eye_tea_od;?></td>
                            <td><?php echo $optomery_data->eye_data->eye_bas_od;?></td>
                            <td><?php echo $optomery_data->eye_data->eye_imp_od;?></td>
                            <td><?php echo $optomery_data->eye_data->eye_tear_od;?></td>
                        </tr>
                        <tr>
                            <td>OS</td>
                            <td><?php echo $optomery_data->eye_data->eye_tea_os;?></td>
                            <td><?php echo $optomery_data->eye_data->eye_bas_os;?></td>
                            <td><?php echo $optomery_data->eye_data->eye_imp_os;?></td>
                            <td><?php echo $optomery_data->eye_data->eye_tear_os;?></td>
                        </tr>
                    </table>

                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />

                    <!-- Staining -->
                    <table width="80%" class="table-bordered txt_center">
                        <tr>
                        <th width="25%">Staining</th>
                        <th>Flourescein</th>
                        <th>Rose Bengal</th>
                        <th>Lissemine Green</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->sta_data->sta_flo_od;?></td>
                            <td><?php echo $optomery_data->sta_data->sta_ros_od;?></td>
                            <td><?php echo $optomery_data->sta_data->sta_lis_od;?></td>
                        </tr>
                        <tr>
                            <td>OS</td>
                            <td><?php echo $optomery_data->sta_data->sta_flo_os;?></td>
                            <td><?php echo $optomery_data->sta_data->sta_ros_os;?></td>
                            <td><?php echo $optomery_data->sta_data->sta_lis_os;?></td>
                        </tr>
                    </table>

                    <?php } ?>


                     
                    <!-- Gaze Eavalutation -->
                    <?php if(!empty($optomery_data->gaz_data) && isset($optomery_data->print_data->gaz_print) && $optomery_data->print_data->gaz_print==1){
                            ?>
                        <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                        <h4><b>Gaze Evalution</b></h4>
                        <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                        <table class="table" width="80%">
                            <tbody>
                            <tr>
                                <td colspan="2" style="border:0px !important;"><?php echo $optomery_data->gaz_data->gaz_l1 ;?></td>
                                <td colspan="2" style="border:0px !important;"><?php echo $optomery_data->gaz_data->gaz_m1 ;?></td>
                                <td style="border:0px !important;"><?php echo $optomery_data->gaz_data->gaz_r1 ;?></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="border:0px !important;">&nbsp;</td>
                            </tr>
                            <tr>
                                    <td style="margin-bottom:10px;border:0px !important;margin-top:10px !important;"><?php echo $optomery_data->gaz_data->gaz_l2 ;?></td>
                                    <td style="border:0px !important;"><img src="<?php echo site_url('uploads/popup/l.png') ?>" height="80px" style="margin-left:50px; margin-top:-30px;"></td>
                                    <td style="border:0px !important;"><?php echo $optomery_data->gaz_data->gaz_m2 ;?></td>
                                    <td style="border:0px !important;"><img src="<?php echo site_url('uploads/popup/r.png') ?>" height="80px" style="margin-left:50px;margin-top:-30px;"></td>
                                    <td style="border:0px !important;"><?php echo $optomery_data->gaz_data->gaz_r2 ;?></td>
                            </tr>
                            <tr>
                                    <td colspan="2" style="border:0px !important;"><?php echo $optomery_data->gaz_data->gaz_l3 ;?></td>
                                    <td colspan="2" style="border:0px !important;"><?php echo $optomery_data->gaz_data->gaz_m3 ;?></td>
                                    <td style="border:0px !important;"><?php echo $optomery_data->gaz_data->gaz_r3 ;?></td>
                            </tr>
                            
                            </tbody>
                        </table>
                        <?php } ?>
                    
                        <!-- Ocular matality -->
                    <?php //Added by chitranjan
                        if(!empty($optomery_data->ocu_data) && isset($optomery_data->print_data->ocu_print) && $optomery_data->print_data->ocu_print==1){
                    ?>
                        <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                        <h4><b>Ocular Motility</b></h4>
                        <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                        <table class="table">
                            <tbody>
                            <tr><th>RSR LIO</th><th align="center">RSR LSR</th><th>RIO LSR</th></tr>
                            <tr>
                                <td><?php echo $optomery_data->ocu_data->ocu_1.' '.$optomery_data->ocu_data->ocu_r1;?></td>
                                <td><?php echo $optomery_data->ocu_data->ocu_2.' '.$optomery_data->ocu_data->ocu_r2;?></td>
                                <td><?php echo $optomery_data->ocu_data->ocu_3.' '.$optomery_data->ocu_data->ocu_r3;?></td>
                            </tr>
                            <tr><th>RLR LMR</th><th></th><th>RMR LLR</th></tr>
                            <tr>
                                <td><?php echo $optomery_data->ocu_data->ocu_4.' '.$optomery_data->ocu_data->ocu_r4;?></td>
                                <td><img src="<?php echo site_url('uploads/popup/13.png') ?>" height="100px" style="margin: -55px;"></td>
                                <td><?php echo $optomery_data->ocu_data->ocu_5.' '.$optomery_data->ocu_data->ocu_r5;?></td>
                            </tr>
                            <tr>
                                <th>RIR LSO</th><th>RIR LIR</th><th>RSO LIR</th>
                            </tr>
                            <tr>
                                <td><?php echo $optomery_data->ocu_data->ocu_6.' '.$optomery_data->ocu_data->ocu_r6;?></td>
                                <td><?php echo $optomery_data->ocu_data->ocu_7.' '.$optomery_data->ocu_data->ocu_r7;?></td>
                                <td><?php echo $optomery_data->ocu_data->ocu_8.' '.$optomery_data->ocu_data->ocu_r8;?></td>
                            </tr>
                            </tbody>
                        </table>
                        <?php } ?>

                        <!-- Goneoscopy -->
                    <?php 
                    if(!empty($optomery_data->gon_data) && isset($optomery_data->print_data->gon_print) && $optomery_data->print_data->gon_print==1){
                        ?>
                        <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                        <h4><b>Goneoscopy</b></h4>
                        <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />

                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width:50%;text-align:center;">OD</th>
                                    <th style="width:50%;text-align:center;">OS</th>
                                </tr>
                                <tr>
                                    <td style="width:50%;">
                                        <table class="table" border="0">
                                        <tr>
                                        <td></td>
                                        <td style="text-align:center;"><?php echo $optomery_data->gon_data->gon_od_1; ?></td>
                                        <td></td>
                                        </tr>
                                        <tr height="50px"></tr>
                                        <tr>
                                        <td><?php echo $optomery_data->gon_data->gon_od_2; ?></td>
                                        <td><img src="<?php echo site_url('uploads/popup/14.png'); ?>" style="width: 200px;margin: -65px 0px 0px 20px;"></td>
                                        <td><?php echo $optomery_data->gon_data->gon_od_3; ?></td>
                                        </tr>
                                        <tr height="10px"></tr>
                                        <tr>
                                        <td></td>
                                        <td style="text-align:center;"><?php echo $optomery_data->gon_data->gon_od_4; ?></td>
                                        <td></td>
                                        </tr>
                                        </tbody>
                                        </table>
                                    </td>
                                    <td style="width:50%;">
                                        <table class="table" border="0">
                                        <tbody>
                                        <tr>
                                        <td></td>
                                        <td style="text-align:center;"><?php echo $optomery_data->gon_data->gon_os_1; ?></td>
                                        <td></td>
                                        </tr>
                                        <tr height="50px"></tr>
                                        <tr>
                                        <td><?php echo $optomery_data->gon_data->gon_os_2; ?></td>
                                        <td><img src="<?php echo site_url('uploads/popup/14.png'); ?>" style="width: 200px;margin: -65px 0px 0px 20px;"></td>
                                        <td><?php echo $optomery_data->gon_data->gon_os_3; ?></td>
                                        </tr>
                                        <tr height="10px"></tr>
                                        <tr>
                                        <td></td>
                                        <td style="text-align:center;"><?php echo $optomery_data->gon_data->gon_os_4; ?></td>
                                        <td></td>
                                        </tr>
                                        </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    <?php }  ?>
                    
                    
                    <!-- Eye Values -->
                    <?php
                    if(isset($optomery_data->print_data->eyes_print) && $optomery_data->print_data->eyes_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Eye Values</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered txt_center">
                        <tr>
                            <th>Eye Values</th>
                            <th>Goneoscopy</th>
                            <th>Size</th>
                            <th>CupDisc</th>
                            <th>Neuro Retinal RIM</th>
                            <th>Hemorrhage</th>
                            <th>NFL Defects</th>
                            <th>Peripapillary Atrophy</th>
                            <th>CR Degeneration</th>

                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->eyes_data->eyes_gon_od;?></td>
                            <td><?php echo $optomery_data->eyes_data->eyes_siz_od;?></td>
                            <td><?php echo $optomery_data->eyes_data->eyes_cup_od;?></td>
                            <td><?php echo $optomery_data->eyes_data->eyes_neu_od;?></td>
                            <td><?php echo $optomery_data->eyes_data->eyes_hem_od;?></td>
                            <td><?php echo $optomery_data->eyes_data->eyes_nfl_od;?></td>
                            <td><?php echo $optomery_data->eyes_data->eyes_per_od;?></td>
                            <td><?php echo $optomery_data->eyes_data->eyes_cr_od; ?></td>
                        </tr>
                        <tr>
                        <td>OS</td>
                            <td><?php echo $optomery_data->eyes_data->eyes_gon_os;?></td>
                            <td><?php echo $optomery_data->eyes_data->eyes_siz_os;?></td>
                            <td><?php echo $optomery_data->eyes_data->eyes_cup_os;?></td>
                            <td><?php echo $optomery_data->eyes_data->eyes_neu_os;?></td>
                            <td><?php echo $optomery_data->eyes_data->eyes_hem_os;?></td>
                            <td><?php echo $optomery_data->eyes_data->eyes_nfl_os;?></td>
                            <td><?php echo $optomery_data->eyes_data->eyes_per_os;?></td>
                            <td><?php echo $optomery_data->eyes_data->eyes_cr_os; ?></td>
                        </tr>
                    </table>
                    

                    <!-- orbit -->
                    <?php
                    }if(isset($optomery_data->print_data->orbit_print) && $optomery_data->print_data->orbit_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4> Orbit</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered"><tr><td style="text-align:left;padding-left:10px"><?php echo $optomery_data->orbit; ?></td></tr></table>
                    

                    

                        <!-- Medicines -->
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <?php if (!empty($result->medicines)) { ?>
                        <h4 style="margin-left:50px;"><?php echo $this->lang->line("medicines"); ?></h4>
                        <table class="table table-striped table-hover" style="margin-left:50px;">
                            <tr>
                                <th width="2%" class="text text-left">#</th>
                                <th width="13%" class="text text-left"><?php echo $this->lang->line("medicine_category"); ?></th>
                                <th width="11%" class="text text-center"><?php echo $this->lang->line("medicine"); ?></th>
                                <th width="13%" class="text text-center"><?php echo $this->lang->line("dosage"); ?></th>
                                <th width="13%" class="text text-center"><?php echo $this->lang->line("dose_interval"); ?></th>
                                <th width="13%" class="text text-center"><?php echo $this->lang->line("dose_duration"); ?></th>
                                <th width="35%" class="text text-center"><?php echo $this->lang->line("instruction"); ?></th>
                            </tr>
                            <?php $medsl = '';
                            foreach ($result->medicines as $pkey => $pvalue) {
                                $medsl++;
                            ?>
                                <tr>
                                    <td class="text text-left"><?php echo $medsl; ?></td>
                                    <td class="text text-left"><?php echo $pvalue->medicine_category; ?></td>
                                    <td class="text text-center"><?php echo $pvalue->medicine_name; ?></td>
                                    <td class="text text-center"><?php echo $pvalue->dosage . " " . $pvalue->unit; ?></td>
                                    <td class="text text-center"><?php echo $pvalue->dose_interval_name; ?></td>
                                    <td class="text text-center"><?php echo $pvalue->dose_duration_name; ?></td>
                                    <td class="text text-center"><?php echo $pvalue->instruction; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } ?>
                    <?php if (!empty($result->tests)) {

                        $r = $p = 0;
                        foreach ($result->tests as $test_key => $test_value) {
                            if ($test_value->test_name != "") {
                                $p = 1;
                            }
                        }
                        foreach ($result->tests as $test_key => $test_value) {
                            if ($test_value->radio_test_name != "") {
                                $r = 1;
                            }
                        }


                    ?>
                        <table class="table table-striped table-hover" width="100%" style="margin-left:50px;">
                            <tr>
                                <?php
                                if ($p == 1) {  ?>
                                    <th><?php echo $this->lang->line("pathology_test");  ?></th>
                                <?php  }   ?>
                                <?php if ($r == 1) {  ?>
                                    <th><?php echo $this->lang->line("radiology_test"); ?></th>
                                <?php   }  ?>
                            </tr>
                            <tr>
                                <td width="50%"><?php $sl = '';
                                                foreach ($result->tests as $test_key => $test_value) {  ?>
                                        <table>
                                            <?php if ($test_value->test_name != "") {
                                                        $sl++; ?> <tr>
                                                    <td><?php echo $sl . '. ' . $test_value->test_name . " (" . $test_value->short_name . ")"; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    <?php } ?>
                                </td>
                                <td><?php $slradiology = '';
                                    foreach ($result->tests as $test_key => $test_value) {  ?>
                                        <table>
                                            <?php if ($test_value->test_name == "") {
                                                $slradiology++; ?> <tr>
                                                    <td><?php echo $slradiology . '. ' . $test_value->radio_test_name . " (" . $test_value->radio_short_name . ")"; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    <?php } ?>
                    <?php }if(isset($optomery_data->print_data->diagnosis_print) && $optomery_data->print_data->diagnosis_print==1){ ?>
                    <?php if (!empty($optomery_data->diagnosis_data)) { ?>
                    <h4>Diagnosis</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="60%" class="table-bordered txt_center"><tr><th width="20%">OD</th><td><?php echo $optomery_data->diagnosis_data->diagnosis_od;  ?></td></tr><tr><th width="20%">OS</th><td><?php echo $optomery_data->diagnosis_data->diagnosis_os;  ?></td></tr></table>
                    <?php 
                    }
                   }
                   ?>
                   <?php
                   if(isset($optomery_data->print_data->optocomments_print) && $optomery_data->print_data->optocomments_print==1){ ?>
                    <?php if (!empty($optomery_data->optometric_comments)) { ?>
                    <h4>Comments</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="50%" class="table-bordered txt_center"><tr><td style="text-align:left;padding-left:10px"><?php echo $optomery_data->optometric_comments; ?></td></tr></table>
                    <?php 
                    }
                   }
                     ?>    
                    <b style="margin-left:50px;"><?php echo "Notes"; ?></b>:<br>
                    <table width="100%" class="printablea4" style="margin-left:50px;">
                        <tr>
                            <td><?php echo $result->footer_note; ?></td>
                        </tr>
                    </table>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top:0px" />
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