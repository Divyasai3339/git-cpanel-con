<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/sh-print.css">
<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?>
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
                        <img src="https://sivaeyehospital.com/uploads/printing/pre_1.jpeg" class="img-responsive" style="height:100px; width: 100%;">
                    <?php 
                    // } 
                    ?>
                    <div style="height: 10px; clear: both;"></div>
                </div>
                <div class="">
                    <?php
                    $date = $result->presdate;
                    ?>
                     <table width="100%" class="printablea4">
                        <tr>
                            <td><b><?php echo $this->lang->line('prescription'); ?> <?php echo $this->customlib->getSessionPrefixByType('opd_prescription') . $result->prescription_id; ?></b></td>
                            <td></td>
                            <th class="text-right"></th>
                            <td class="text-right"><b><?php echo $this->lang->line('date'); ?> : <?php
                                                                                                    if (!empty($result->presdate)) {
                                                                                                        echo $this->customlib->YYYYMMDDTodateFormat($date);
                                                                                                    }
                                                                                                    ?></b>
                            </td>
                        </tr>
                    </table>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="100%" class="noborder_table">
                        <tr>
                            <th width="25%"><?php echo $this->lang->line("opd_id"); ?></th>
                            <td width="25%"><?php echo $this->customlib->getSessionPrefixByType('opd_no') . $result->opd_detail_id; ?>
                            </td>
                             <th width="25%"><?php echo $this->lang->line("patient_name"); ?></th>
                            <td width="25%"><?php echo $result->patient_name ?> (<?php echo $result->id ?>)</td>
                            
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
                                echo $this->customlib->getPatientAge($result->age, $result->month, $result->day);
                                ?>/<?php echo $result->gender ?></td>
                                <th width="25%"><?php echo $this->lang->line("phone"); ?></th>
                            <td><?php echo $result->mobileno ?></td>
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
                            <td><?php echo $result->name . " " . $result->surname ?> (<?php echo $result->doctor_id ?>)</td>
                            <th><?php echo $this->lang->line('prescribe_by'); ?></th>
                            <td><?php echo $result->prescribe_by_name . " " . $result->prescribe_by_surname ?> (<?php echo $result->prescribe_by_employee_id ?>)</td>
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
                    <!--<table width="100%" class="printablea4" style="margin-left:50px;">-->
                    <!--    <tr>-->
                    <!--        <td style="margin-bottom: 0;"><?php echo $result->header_note ?></td>-->
                    <!--    </tr>-->
                    <!--</table>-->

                    
                    <hr>
                    <?php /*
                    <table width="100%" class="printablea4" style="margin-left:50px;">
                        <tr>
                            <?php if ($result->symptoms != '') { ?>
                                <td></td>
                                <td colspan="<?php echo $colspan; ?>" width="<?php echo $width; ?>">
                                    <b><?php echo $this->lang->line("symptoms"); ?></b>:<br><?php echo nl2br($result->symptoms)  ?>
                                </td>
                            <?php } ?>

                            <?php if (trim($result->complaints_description) != '') { ?>
                            <td><?php echo $val->complaints_type . " " . $val; ?></td>
                            
                            <td width="<?php echo $width; ?>">
                                <b><?php echo $this->lang->line("chief_complaints"); ?></b>:<br>
                                <?php echo $result->ccat;?> -

                                <?php echo nl2br($result->complaints_description); ?>
                            </td>
                        <?php }  ?>
                        <?php $complaints = json_decode($result->complaints);
                if (!empty($complaints)) { ?>
                        <td width="<?php echo $width; ?>">
                        <table width="50%" class="printablea4">
                        <tr>
                            <th>Duration</th>
                        </tr>
                        <?php $i = 1;
                        foreach ($complaints as $key => $val) { ?>
                            <tr>
                                <td><?php echo $val->durations . " " . $val->periods; ?></td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </table>
                        </td>
                <?php } ?>
                        </tr>
                    </table>  */ ?>
                    
                    <?php if (trim($result->complaints_description) != '' || $result->symptoms != '') { ?>
                    <?php $complaintsdesc = json_decode($result->complaints_description);
                        if (!empty($complaintsdesc)) { ?>
                            <h4><?php echo $this->lang->line("chief_complaints"); ?></h4>
                            <table width="100%" class=" table table-striped table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Complaints Category</th>
                                    <th>Complaints Description</th>
                                    <th>Duration</th>
                                    <th>Period</th>
                                </tr>
                                <?php $i = 1;
                                foreach ($complaintsdesc as $key => $val) { 
                                    $compdata = $this->complaints_model->getfindingcategory($val->complaint_type_id);
                                    if($compdata['category']!=''){
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $compdata['category']; ?></td>
                                        <td><?php echo str_replace(array('[',']'),'',$val->complaints_description); ?></td>
                                        <td><?php echo $val->durations; ?></td>
                                        <td><?php echo $val->periods; ?></td>
                                    </tr>
                                <?php $i++;}
                                } ?>
                            </table>
                        <?php } ?>
                        <?php } ?>

<?php /*
                    <?php if ($result->symptoms != '' || trim($result->complaints_description) != '') {
                        if ($result->is_complaints_print == 'yes') { ?>
                            <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <?php }
                    } ?>

                    <table width="100%" class="printablea4" style="margin-left:50px;">
                        <tr>
                            <?php if ($result->symptoms != '') { ?>
                                <td colspan="<?php echo $colspan; ?>" width="<?php echo $width; ?>">
                                    <b><?php echo $this->lang->line("symptoms"); ?></b>:<br><?php echo nl2br($result->symptoms)  ?>
                                </td>
                            <?php } ?>

                            <?php if (trim($result->finding_description) != '') { ?>
                                <?php if ($result->is_finding_print == 'yes') { ?>
                                    <td width="<?php echo $width; ?>">
                                        <b><?php echo $this->lang->line("examinations"); ?></b>:<br>
                                        <?php echo $result->fcat;?> -
                                        <?php echo nl2br($result->finding_description)  ?>
                                    </td>
                            <?php }
                            } ?>
                        </tr>
                    </table>
                    <?php if ($result->symptoms != '' || trim($result->finding_description) != '') {
                        if ($result->is_finding_print == 'yes') { ?>
                            <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <?php }
                    } ?>
                    
                    <?php
                    if ($result->is_finding_print == 'yes') {
                        $colspan = 6;
                        $width = '50%';
                    } else {
                        $colspan = 12;
                        $width = '100%';
                    } ?>
                       */ ?>

                <?php if (trim($result->finding_description) != '' || $result->symptoms != '') { ?>
                    <?php $findingdesc = json_decode($result->finding_description);
                        if (!empty($findingdesc)) { ?>
                        <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                            <h4><?php echo $this->lang->line("examinations"); ?></h4>
                            <table width="100%" class=" table table-striped table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Finding Category</th>
                                    <th>Finding Description</th>
                                    
                                </tr>
                                <?php $i = 1;
                                foreach ($findingdesc as $key => $val) { 
                                    $finddata = $this->finding_model->getfindingcategory($val->finding_type_id);
                                    if($finddata['category']!=''){
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $finddata['category']; ?></td>
                                        <td><?php echo str_replace(array('[',']','"'),'',$val->finding_description); ?></td>
                                       
                                    </tr>
                                <?php $i++;}
                                } ?>
                            </table>
                        <?php } ?>
                        <?php } ?>


                    <?php $history = json_decode($result->history); if(!empty($history)){?>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4 style="margin-left:50px;">History</h4>
                    <table width="100%" class=" table table-striped table-hover" style="margin-left:50px;">
                        <tr>
                            <th>#</th>
                            <th>Disease</th>
                            <th>Duration</th>
                            <th>Medication</th>
                            <th>Condition</th>
                        </tr>
                        <?php $i = 1;
                        foreach ($history as $key => $val) {
                        if($val->disease!=''){
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $val->disease; ?></td>
                                <td><?php echo $val->duration . " " . $val->period; ?></td>
                                <td><?php echo $val->medication; ?></td>
                                <td><?php echo $val->condition; ?></td>
                            </tr>
                        <?php $i++;}
                        } ?>
                    </table>
                    <?php } ?>

                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                <table width="100%" class="printablea4" style="margin-left:50px;">
                    <tr>
                        <th width="50%">Diagnosis</th>
                        <th width="50%">Surgery Recommendations</th>
                    </tr>
                    <tr>
                        <td><?php foreach (json_decode($result->diagnosis) as $key => $val) { ?>
                                <table width="100%" class="printablea4">
                                    <tr>
                                        <td><span class="text-capitalize"><?php echo str_replace('_',' ',$val); ?></span></td>
                                    </tr>
                                </table>
                            <?php } ?>
                        </td>
                        
                        <td><?php foreach (json_decode($result->surgery_recommendations) as $key => $val) { ?>
                                <table width="100%" class="printablea4">
                                    <tr>
                                    <td><span class="text-capitalize"><?php echo str_replace('_',' ',$val); ?></span></td>
                                    </tr>
                                </table>
                            <?php } ?>
                        </td>
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
                                    <th>Test/OPD Procedure</th>
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

                    <!-- <b style="margin-left:50px;"><?php echo "Notes"; ?></b>:<br> -->

                    <table width="100%" class="printablea4" style="margin-left:50px;">
                    <tr>
                        <th width="50%">Footer Note</th>
                    </tr>
                    <tr>
                        <td><?php foreach (json_decode($result->footer_note) as $key => $val) { ?>
                                <table width="100%" class="printablea4">
                                    <tr>
                                    <td><span class="text-capitalize"><?php echo str_replace('_',' ',$val); ?></span></td>
                                    </tr>
                                </table>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
                    <!-- <table width="100%" class="printablea4" style="margin-left:50px;">
                        <tr>
                            <td><?php echo $result->footer_note; ?></td>
                        </tr>
                    </table> -->
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