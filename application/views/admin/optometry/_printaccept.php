<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/sh-print.css">
<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
//print_r($visit_data);
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
                            <img src="<?php echo site_url('uploads/printing/1.jpg'); ?>" class="img-responsive" style="height:100px; width: 100%;">
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
                    
                    <table width="80%" class="table-bordered">
                        <tr><td style="text-align:left;padding-left:10px"><?php echo "Lens Type: " .$optomery_data->acceptance_data->accp_lens; ?></td>
                        <td style="text-align:left;padding-left:10px"><?php echo "Lens Coating: " .$optomery_data->acceptance_data->accp_coating; ?></td>
                        </tr>
                    </table>

                 
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    
                    <table width="80%" class="table-bordered"><tr><td style="text-align:left;padding-left:10px"><?php echo "Notes: " .$optomery_data->acceptance_data->accp_notes; ?></td></tr>
                    </table>

                <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />

                     
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