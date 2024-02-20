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
                <?php
                $date = $result['appointment_date'];
                ?>
                <table width="100%" class="printablea4">
                    <tr>
                        <th><?php echo $this->lang->line('prescription'); ?> : <?php echo $this->customlib->getSessionPrefixByType('opd_prescription') . $optomery_data->opd_id; ?></th>
                        <td></td>
                        <th class="text-right"></th>
                        <th class="text-right"><?php echo $this->lang->line('date'); ?> : <?php
                                                                                            if (!empty($result['appointment_date'])) {
                                                                                                echo $this->customlib->YYYYMMDDTodateFormat($date);
                                                                                            }
                                                                                            ?>
                        </th>
                    </tr>
                </table>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="100%" class="noborder_table">
                        <tr>
                            <th width="25%"><?php echo $this->lang->line("opd_id"); ?></th>
                            <td width="25%"><?php echo $this->customlib->getSessionPrefixByType('opd_no') . $result['opd_detail_id']; ?>
                            </td>
                             <th width="25%"><?php echo $this->lang->line("patient_name"); ?></th>
                            <td width="25%"><?php echo $result['patient_name'] ?> (<?php echo $result['id'] ?>)</td>
                            
                            <!--<th width="25%"><?php echo $this->lang->line("checkup_id"); ?></th>-->
                            <!--<td width="25%"><?php echo $this->customlib->getSessionPrefixByType('checkup_id') . $result->visitid; ?>-->
                            <!--</td>-->
                        </tr>
                        <!--<tr>-->
                        <!--    <th width="25%"><?php echo $this->lang->line("patient_name"); ?></th>-->
                        <!--    <td width="25%"><?php echo $result->patient_name ?> (<?php echo $result->id ?>)</td>-->
                            
                        <!--</tr>-->
                        <tr>
                            <th width="25%"><?php echo $this->lang->line("age"); ?>/<?php echo $this->lang->line("gender"); ?></th>
                            <td><?php
                                echo $this->customlib->getPatientAge($result['age'], $result['month'], $result['day']);
                                ?>/<?php echo $result['gender'] ?></td>
                                <th width="25%"><?php echo $this->lang->line("phone"); ?></th>
                            <td><?php echo $result['mobileno'] ?></td>
                        </tr>
                        <!--<tr>-->
                        <!--    <th width="25%"><?php echo $this->lang->line("gender"); ?></th>-->
                        <!--    <td><?php echo $result->gender ?></td>-->
                        <!--    <th width="25%"><?php echo $this->lang->line("weight"); ?></th>-->
                        <!--    <td><?php echo $result->weight ?></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                        <!--    <th width="25%"><?php echo $this->lang->line("bp"); ?></th>-->
                        <!--    <td><?php echo $result->bp ?></td>-->
                        <!--    <th width="25%"><?php echo $this->lang->line("height"); ?></th>-->
                        <!--    <td><?php echo $result->height ?></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                        <!--    <th width="25%"><?php echo $this->lang->line("known_allergies"); ?></th>-->
                        <!--    <td><?php echo $result->any_allergies ?></td>-->
                        <!--    <th width="25%"><?php echo $this->lang->line("blood_group"); ?></th>-->
                        <!--    <td><?php echo $result->blood_group_name ?></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                        <!--    <th width="25%"><?php echo $this->lang->line("phone"); ?></th>-->
                        <!--    <td width="25%"><?php echo $result->mobileno ?></td>-->
                        <!--    <th width="25%"><?php echo $this->lang->line("email"); ?></th>-->
                        <!--    <td width="25%"><?php echo $result->email ?></td>-->
                        <!--</tr>-->
                        <tr>
                            <th><?php echo $this->lang->line('consultant_doctor'); ?></th>
                            <td><?php echo $result['name'] . " " . $result['surname'] ?> (<?php echo $result['employee_id'] ?>)</td>
                            <th><?php echo $this->lang->line('prescribe_by'); ?></th>
                            <td><?php echo $result['prescribe_by_name'] . " " . $result['prescribe_by_surname'] ?> (<?php echo $result['prescribe_by_employee_id'] ?>)</td>
                        </tr>
                        <!-- <tr>
                             <th width="25%"><?php echo $this->lang->line("phone"); ?></th>
                            <td width="25%"><?php echo $result->mobileno ?></td>
                        </tr> -->
                        <!--<tr>-->
                        <!--    <th><?php echo $this->lang->line('generated_by'); ?></th>-->
                        <!--    <td><?php echo $result->generated_by_name . " " . $result->generated_by_surname ?> (<?php echo $result->generated_by_employee_id ?>)</td>-->
                        <!--    <th><?php echo $this->lang->line('temperature'); ?></th>-->
                        <!--    <td><?php echo $result->temperature; ?></td>-->
                        <!--</tr>-->
                    </table>
                    <hr>
                    <h3 class="box-title text-center text-uppercase">Medical Records</h3>
                    <?php
                    if(isset($optomery_data->print_data->complaints_print) && $optomery_data->print_data->complaints_print==1){
                    ?>                                                                             
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Complaints</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="100%" class="noborder_table">
                       
                      <tr>
                        <th style="text-align:center">OD</th>
                        <th style="text-align:center">OS</th>
                      </tr>
					  <?php $complain_data = json_decode($optomery_data->complaints_data->selected_complaints,true);?>
                      <tr>
						<td width="50%">						
							<table class=" table table-striped table-hover" width="100%">
								 <?php 
									foreach ($complain_data as $key => $val) {
									if($val == 'both' || $val == 'od')
									{
										
									
									?>
									<tr>
										<td class="text-left">
											<?php echo $key;?>
										</td>
									</tr>
									<?php }
									} ?>
							</table>
						</td>
						
                        <td width="50%">
							<table class=" table table-striped table-hover" width="100%">
								 <?php 
									foreach ($complain_data as $key => $val) {
									if($val == 'both' || $val == 'os')
									{
										
									
									?>
									<tr>
										<td class="text-left">
											<?php echo $key;?>
										</td>
									</tr>
									<?php }
									} ?>
							</table>
						</td>
                      </tr>                       
                  </table>
                  <?php
                    }if(isset($optomery_data->print_data->history_print) && $optomery_data->print_data->history_print==1){
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
                    <?php }if(isset($optomery_data->print_data->pgp_print) && $optomery_data->print_data->pgp_print==1){ ?>
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
                        <th>EOM</th>
                        <th>Tropia</th>
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
                  <?php
                   }if(isset($optomery_data->print_data->vision_print) && $optomery_data->print_data->vision_print==1){
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
                    <h4>Retinoscopy</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered txt_center">
                        <tr>
                          <th width="25%">Dry Retinoscopy</th>
                          <th>SPH</th>
                          <th>Cyl</th>
                          <th>Axis</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->dryretinoscopy_data->drs_od_sph;?></td>
                            <td><?php echo $optomery_data->dryretinoscopy_data->drs_od_cyl;?></td>
                            <td><?php echo $optomery_data->dryretinoscopy_data->drs_od_axis;?></td>
                        </tr>
                        <tr>
                            <td>OS</td>
                            <td><?php echo $optomery_data->dryretinoscopy_data->drs_os_sph;?></td>
                            <td><?php echo $optomery_data->dryretinoscopy_data->drs_os_cyl;?></td>
                            <td><?php echo $optomery_data->dryretinoscopy_data->drs_os_axis;?></td>
                        </tr>
                    </table>
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
                          <th>VA</th>
                          <th>ADD</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->acceptance_data->accp_od_sph;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_od_cyl;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_od_axis;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_od_va;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_od_add;?></td>
                        </tr>
                        <tr>
                            <td>OS</td>
                            <td><?php echo $optomery_data->acceptance_data->accp_os_sph;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_os_sph;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_os_sph;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_os_sph;?></td>
                            <td><?php echo $optomery_data->acceptance_data->accp_os_sph;?></td>
                        </tr>
                    </table>
                    <?php
                    }if(isset($optomery_data->print_data->antsegment_print) && $optomery_data->print_data->antsegment_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Ant Segments</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered txt_center">
                        <tr>
                          <th width="25%">Ant Segments</th>
                          <th>Lids</th>
                          <th>Sclera</th>
                          <th>Conjuctiva</th>
                          <th>Cornea</th>
                          <th>A.C</th>
                          <th>Pupil</th>
                          <th>Lens</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->antsegment_data->as_od_lids;?></td>
                            <td><?php echo $optomery_data->antsegment_data->as_od_sclera;?></td>
                            <td><?php echo $optomery_data->antsegment_data->as_od_conjuctiva;?></td>
                            <td><?php echo $optomery_data->antsegment_data->as_od_cornea;?></td>
                            <td><?php echo $optomery_data->antsegment_data->as_od_ac;?></td>
                            <td><?php echo $optomery_data->antsegment_data->as_od_pupil;?></td>
                            <td><?php echo $optomery_data->antsegment_data->as_od_lens;?></td>
                        </tr>
                        <tr>
                            <td>OS</td>
                            <td><?php echo $optomery_data->antsegment_data->as_os_lids;?></td>
                            <td><?php echo $optomery_data->antsegment_data->as_os_lids;?></td>
                            <td><?php echo $optomery_data->antsegment_data->as_os_lids;?></td>
                            <td><?php echo $optomery_data->antsegment_data->as_os_lids;?></td>
                            <td><?php echo $optomery_data->antsegment_data->as_os_lids;?></td>
                            <td><?php echo $optomery_data->antsegment_data->as_os_lids;?></td>
                            <td><?php echo $optomery_data->antsegment_data->as_os_lids;?></td>
                        </tr>
                    </table>
                    <?php
                    }if(isset($optomery_data->print_data->postsegment_print) && $optomery_data->print_data->postsegment_print==1){
                     ?> 
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Post Segments</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="80%" class="table-bordered txt_center">
                        <tr>
                          <th width="25%">Post Segments</th>
                          <th>Fundus</th>
                          <th>Cup/DIsc</th>
                          <th>Macula</th>
                          <th>Vessels</th>
                          <th>IOP(mm in Hg)</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->postsegment_data->ps_od_fundus;?></td>
                            <td><?php echo $optomery_data->postsegment_data->ps_od_cupdisc;?></td>
                            <td><?php echo $optomery_data->postsegment_data->ps_od_macula;?></td>
                            <td><?php echo $optomery_data->postsegment_data->ps_od_vessels;?></td>
                            <td><?php echo $optomery_data->postsegment_data->ps_od_iop;?></td>
                        </tr>
                        <tr>
                            <td>OS</td>
                            <td><?php echo $optomery_data->postsegment_data->ps_os_fundus;?></td>
                            <td><?php echo $optomery_data->postsegment_data->ps_os_cupdisc;?></td>
                            <td><?php echo $optomery_data->postsegment_data->ps_os_macula;?></td>
                            <td><?php echo $optomery_data->postsegment_data->ps_os_vessels;?></td>
                            <td><?php echo $optomery_data->postsegment_data->ps_os_iop;?></td>
                        </tr>
                    </table>

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
                    <?php } //Close Checking ?>
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