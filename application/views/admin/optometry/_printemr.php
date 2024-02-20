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
   h4{
      font-weight:bold !important;
      font-size:12px !important;
  }
  table{
      font-size:12px !important;
  }
  .bc{
       background-color: coral;
  }
  .sps{
      padding:4px !important;
  }
  .table th{
      border:1px solid black !important;
      font-size:12px !important;
      padding: 0px !important;
  }
  .table td{
      border:1px solid black !important;
      font-size:12px !important;
      padding: 0px !important;

  }
  .table-bordered{
       border:1px solid black !important;
  }
  
   h4{
   background-color:lightgray !important;
   color:black !important;
   -webkit-print-color-adjust: exact; 
   }

   .heading{
   /*background-color:lightgray !important;*/
   color:black !important;
   font-weight: bold;
   font-size: 12px;
   -webkit-print-color-adjust: exact; 
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
                <?php
                $date = $result['appointment_date'];
                ?>
                <table width="100%" class="printablea4">
                    <tr>
                        <th><?php echo $this->lang->line('prescription'); ?> : <?php echo $this->customlib->getSessionPrefixByType('opd_prescription') . $visit_data->prescription_id; ?></th>
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
                            <td width="25%"><?php echo $this->customlib->getSessionPrefixByType('opd_no') . $optomery_data->opd_id; ?>
                            </td>
                             <th width="25%"><?php echo $this->lang->line("patient_name"); ?></th>
                            <td width="25%"><?php echo $result['patient_name'] ?> (<?php echo $result['patient_id'] ?>)</td>
                            
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
                             <th><?php echo $this->lang->line('consultant_doctor'); ?></th>
                            <td><?php echo $result['name'] . " " . $result['surname'] ?></td>
                           
                                
                        </tr>
               
                    </table>
                    <hr>
                    <!-- <h3 class="box-title text-center text-uppercase">Medical Records</h3> -->
                     <div class="row">
                        <div class="col-md-4">
                            <?php
                
                         if(!empty($optomery_data->complaints_data) && empty($optomery_data->print_data->complaints_print) && $optomery_data->print_data->complaints_print==0){
                    ?>  
                    
                    <table width="100%" style="border:1px solid black;font-size:15px !important;border-style: double !important;">
                       
                            <tr>
                               <th>Complaint</th>
                               <th></th>
                               <th></th>
                            </tr>
                               <?php $i = 1;
                        foreach ($optomery_data->complaints_data as $key => $val) { 
                        ?>
                            <tr>
                                <td style="text-align:left;padding-left:10px"><?php echo $val->complaints . "  " .$val->complaints_duration . "  " . $val->complaints_period . "   " .$val->complaints_type; ?></td>
                                
                            </tr>
                        <?php 
                        } 
                    ?>
                    </table>
                        </div>
                        
                        <div class="col-md-4">
                            <?php
                    }if(empty($optomery_data->print_data->inv_print) && $optomery_data->print_data->inv_print==0){
                   ?>
                   
                   <table width="100%" style="border:1px solid black;font-size:15px !important;border-style: double !important;">
                    
                    <tr>
                            <th>History of Present Illness</th>
                        </tr>
                        <tr>
                        <td style="text-align:left;padding-left:10px"><?php echo $optomery_data->inv; ?>
                            </td>
                        </tr>   
                       
                    </table>
                        </div>
                        
                        <div class="col-md-4">
                            
                     <?php
                    }
                    if(isset($optomery_data->print_data->history_print) && $optomery_data->print_data->history_print==1){
                   ?>
                  
                    <table width="100%" style="border:1px solid black;font-size:15px !important;border-style: double !important;">
                        <tr>
                            <th>History of Past Illness</th>
                        </tr>
                        <?php $i = 1;
                        foreach ($optomery_data->history_data as $key => $val) { 
                        ?>
                            <tr>
                                <td style="text-align:left;padding-left:10px"><?php echo $val->disease ."  " .$val->duration . " " . $val->period; ?></td>
                            </tr>
                    </table>
                    
                     <?php
                   }
                    
                    }
                   ?>
                        </div>
                        
                    </div>
                   
                    <?php if(empty($optomery_data->print_data->vision_print) && $optomery_data->print_data->vision_print==0)
                   {
                   ?>
                  <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Visual Acuity/PGP</h4>
                     <table width="100%" style="border:1px solid black;" class="table txt_center" >
                        <tr>
                          <th width="20%"></th>
                          <th colspan="4" class="text-center">OD</th>
                          <th colspan="4" class="text-center">OS</th>
                        </tr>
                        <tr>
                          <th width="10%">Unaided/PGP</th>
                          <th width="10%">Distance</th>
                          <td width="10%"><?php echo $optomery_data->vision_data->vision_od_presenting;?></td>
                          <th width="10%">Near</th>
                          <td width="10%"><?php echo $optomery_data->vision_data->vision_od_near_presenting;?></td>
                          <th width="10%">Distance</th>
                          <td width="10%"><?php echo $optomery_data->vision_data->vision_os_presenting;?></td>
                          <th width="10%">Near</th>
                          <td width="10%"><?php echo $optomery_data->vision_data->vision_os_near_presenting;?></td>
                        </tr>

                        <tr>
                          <th width="20%">Pinhole</th>
                          <td colspan="4"><?php echo $optomery_data->vision_data->vision_od_pinhole;?></td>
                          <td colspan="4"><?php echo $optomery_data->vision_data->vision_os_pinhole;?></td>
                        </tr>
                    </table>
                    
                  
                    <!-- PGP -->
                    <?php }if(isset($optomery_data->print_data->pgp_print) && $optomery_data->print_data->pgp_print==1){ ?>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Past Glass Prescripton</h4>
                    <table width="80%" class="table table-bordered txt_center">
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


                  
                    <!-- Acceptance -->
                    <?php
                    }if(empty($optomery_data->print_data->acceptance_print) && $optomery_data->print_data->acceptance_print==0)
                    {
                     ?>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>New Glass Prescripton</h4>
                    <table width="80%" class="table table-bordered txt_center">
                        <tr>
                          <th width="25%">NGP</th>
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
                    
                    <table width="80%" class="table table-bordered">
                        <tr><td style="text-align:left;padding-left:10px"><?php echo "Lens Type: " .$optomery_data->acceptance_data->accp_lens; ?></td>
                        <td style="text-align:left;padding-left:10px"><?php echo "Lens Coating: " .$optomery_data->acceptance_data->accp_coating; ?></td>
                        </tr>
                    </table>

                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />

                   <!-- Ant Segment -->
                   <?php
                    }if(empty($optomery_data->print_data->antsegment_print) && $optomery_data->print_data->antsegment_print==0){
                     ?>  
                    <h4>Ant Segments</h4>
                     <table width="80%" class="table table-bordered txt_center">
                         
                        <tr>
                          <th width="25%">Ant Segments</th>
                          <td>OD</td>
                          <td>OS</td>
                        </tr>
                        <tr>
                        <th>Lids</th>

                        <td><?php
                        
                        $as_od_lids = $optomery_data->antsegment_data->as_od_lids;?>
                        <?php 
                        foreach($as_od_lids as $item){
                            echo $item . " ";
                        }
                        ?>
                        </td>
                        <td>
                            <?php
                            $as_os_lids = $optomery_data->antsegment_data->as_os_lids;?>
                        <?php 
                        foreach($as_os_lids as $item){
                            echo $item . " ";
                        }
                        ?>
                        </td>
                        </tr>
                        <tr>
                        <th>Conjuctiva/Sclera</th>
                        <td>
                        <?php
                            $as_od_conjuctiva = $optomery_data->antsegment_data->as_od_conjuctiva;?>
                        <?php 
                        foreach($as_od_conjuctiva as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                            $as_os_conjuctiva = $optomery_data->antsegment_data->as_os_conjuctiva;?>
                        <?php 
                        foreach($as_os_conjuctiva as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                        </tr>
                        
                        <tr>
                        <th>Cornea</th>
                        <td>
                        <?php
                            $as_od_cornea = $optomery_data->antsegment_data->as_od_cornea;?>
                        <?php 
                        foreach($as_od_cornea as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                            $as_os_cornea = $optomery_data->antsegment_data->as_os_cornea;?>
                        <?php 
                        foreach($as_os_cornea as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                      
                        </tr>
                        
                        <tr>
                        <th>A.C</th>
                        <td>
                        <?php
                            $as_od_ac = $optomery_data->antsegment_data->as_od_ac;?>
                        <?php 
                        foreach($as_od_ac as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                            $as_os_ac = $optomery_data->antsegment_data->as_os_ac;?>
                        <?php 
                        foreach($as_os_ac as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                        </tr>
                        
                        <tr>
                        <th>Pupil</th>
                        <td>
                        <?php
                            $as_od_pupil = $optomery_data->antsegment_data->as_od_pupil;?>
                        <?php 
                        foreach($as_od_pupil as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                            $as_os_pupil = $optomery_data->antsegment_data->as_os_pupil;?>
                        <?php 
                        foreach($as_os_pupil as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                        
                        </tr>
                        <tr>
                        <th>Lens</th>

                        <td>
                        <?php
                            $as_od_lens = $optomery_data->antsegment_data->as_od_lens;?>
                        <?php 
                        foreach($as_od_lens as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                            $as_os_lens = $optomery_data->antsegment_data->as_os_lens;?>
                        <?php 
                        foreach($as_os_lens as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                        </tr>
                    </table>


                    <!-- POST Segment -->
                    <?php
                    }if(empty($optomery_data->print_data->postsegment_print) && $optomery_data->print_data->postsegment_print==0){
                   
                     ?> 
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Post Segments</h4>
                    <table width="80%" class="table table-bordered txt_center">
                            <tr>
                              <th width="25%">Post Segments</th>
                              <td>OD</td>
                              <td>OS</td>
                            </tr>
                            <tr>
                            <th>Vitreous</th>
                            <td>
                        <?php
                            $ps_od_fundus = $optomery_data->postsegment_data->ps_od_fundus;?>
                        <?php 
                        foreach($ps_od_fundus as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                            $ps_os_fundus = $optomery_data->postsegment_data->ps_os_fundus;?>
                        <?php 
                        foreach($ps_os_fundus as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                            </tr>
                            <tr>
                            <th>Cup/Disc</th>
                            <td>
                        <?php
                            $ps_od_cupdisc = $optomery_data->postsegment_data->ps_od_cupdisc;?>
                        <?php 
                        foreach($ps_od_cupdisc as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                            $ps_os_cupdisc = $optomery_data->postsegment_data->ps_os_cupdisc;?>
                        <?php 
                        foreach($ps_os_cupdisc as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                            </tr>
                        
                             
                            <tr>
                            <th>Macula</th>
                            <td>
                        <?php
                            $ps_od_macula = $optomery_data->postsegment_data->ps_od_macula;?>
                        <?php 
                        foreach($ps_od_macula as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                            $ps_os_macula = $optomery_data->postsegment_data->ps_os_macula;?>
                        <?php 
                        foreach($ps_os_macula as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                            </tr>
                            <tr>
                            <th>Vessels</th>
                            <td>
                        <?php
                            $ps_od_vessels = $optomery_data->postsegment_data->ps_od_vessels;?>
                        <?php 
                        foreach($ps_od_vessels as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                            $ps_os_vessels = $optomery_data->postsegment_data->ps_os_vessels;?>
                        <?php 
                        foreach($ps_os_vessels as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                            </tr>
                            <tr>
                            <th>Periphery</th>
                            <td>
                        <?php
                            $ps_od_iop = $optomery_data->postsegment_data->ps_od_iop;?>
                        <?php 
                        foreach($ps_od_iop as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                            $ps_os_iop = $optomery_data->postsegment_data->ps_os_iop;?>
                        <?php 
                        foreach($ps_os_iop as $item){
                            echo $item . " ";
                        }
                        ?>
                      </td>
                            </tr>
                            <tr>
                        
                    </table>


                    <!-- Keratometry -->
                    <?php
                    }if(isset($optomery_data->print_data->ker_print) && $optomery_data->print_data->ker_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Keratometry</h4>
                   <table width="80%" class="table-bordered table txt_center">
                        <tr>
                            <th>Keratometry</th>
                            <th>H-Axis</th>
                            <th>V-Axis</th>
                            <th>AVG K Val</th>
                            <th>CYL Val</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->ker_data->ker_od_ha1 . " @ " . $optomery_data->ker_data->ker_od_ha2;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_od_va1 . " @ " . $optomery_data->ker_data->ker_od_va2;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_od_av;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_od_cy;?></td>
                        </tr>
                        <tr>
                        <td>OS</td>
                            <td><?php echo $optomery_data->ker_data->ker_os_ha1 . " @ " . $optomery_data->ker_data->ker_os_ha2;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_os_va1 . " @ " . $optomery_data->ker_data->ker_os_va2;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_os_av;?></td>
                            <td><?php echo $optomery_data->ker_data->ker_os_cy;?></td>
                        </tr>
                    </table>
                    
                    <!-- Topography -->
                    <?php
                    }if(isset($optomery_data->print_data->top_print) && $optomery_data->print_data->top_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Topography</h4>
                   <table width="80%" class="table-bordered table txt_center">
                        <tr>
                            <th>Topography</th>
                            <th>Sim K</th>
                            <th>Min K</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo $optomery_data->top_data->top_sli_od;?></td>
                            <td><?php echo $optomery_data->top_data->top_min_od;?></td>
                        </tr>
                        <tr>
                            <td>OS</td>
                            <td><?php echo $optomery_data->top_data->top_sli_os;?></td>
                            <td><?php echo $optomery_data->top_data->top_min_os;?></td>
                        </tr>
                    </table>

                    <!-- Schirmers Test -->
                    <?php
                    }if(isset($optomery_data->print_data->sch_print) && $optomery_data->print_data->sch_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Schirmers Test</h4>
                   <!-- Schrimers test -->
                   <table width="80%" class="table-bordered table txt_center">
                        <tr>
                            <th>Schirmers Test</th>
                            <th>&nbsp;</th>
                            <th>mm in 5 minutes</th>
                            <th>&nbsp;</th>
                            <th>mm in 5 minutes</th>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td><?php echo 'I';?></td>
                            <td><?php echo $optomery_data->sch_data->sch_od_mmf;?></td>
                            <td><?php echo 'II';?></td>
                            <td><?php echo $optomery_data->sch_data->sch_od_mms;?></td>
                        </tr>
                        <tr>
                        <td>OS</td>
                        <td><?php echo 'I';?></td>
                            <td><?php echo $optomery_data->sch_data->sch_os_mmf;?></td>
                            <td><?php echo 'II';?></td>
                            <td><?php echo $optomery_data->sch_data->sch_os_mms;?></td>
                        </tr>
                    </table>


                    <!-- Pachymetry -->
                   <?php
                    }if(isset($optomery_data->print_data->pac_print) && $optomery_data->print_data->pac_print==1){
                     ?>  
                    <h4>Pachymetry</h4>
                    <table width="80%" class="table table-bordered txt_center">
                     
                        <tr>
                          <th width="25%">Pachymetry</th>
                          <th>Pachymetry</th>
                          <th>KVf</th>
                          <th>KVb</th>
                          <th>Class</th>
                          <th>HV ID</th>
                          <th>ACD</th>
                          <th>ANGLE</th>
                          <th>Pupil Diameter</th>

                        </tr>
                        <tr>
                            <th>OD</th>
                            <td><?php echo $optomery_data->pac_data->pac_od_pac;?></td>
                            <td><?php echo $optomery_data->pac_data->pac_od_kvf;?></td>
                            <td><?php echo $optomery_data->pac_data->pac_od_kvb;?></td>
                            <td><?php echo $optomery_data->pac_data->pac_od_cla;?></td>
                            <td><?php echo $optomery_data->pac_data->pac_od_hv;?></td>
                            <td><?php echo $optomery_data->pac_data->pac_od_acd;?></td>
                            <td><?php echo $optomery_data->pac_data->pac_od_ang;?></td>
                            <td><?php echo $optomery_data->pac_data->pac_od_pup;?></td>
                        </tr>
                        <tr>
                            <th>OS</th>
                            <td><?php echo $optomery_data->pac_data->pac_os_pac;?></td>
                            <td><?php echo $optomery_data->pac_data->pac_os_kvf;?></td>
                            <td><?php echo $optomery_data->pac_data->pac_os_kvb;?></td>
                            <td><?php echo $optomery_data->pac_data->pac_os_cla;?></td>
                            <td><?php echo $optomery_data->pac_data->pac_os_hv;?></td>
                            <td><?php echo $optomery_data->pac_data->pac_os_acd;?></td>
                            <td><?php echo $optomery_data->pac_data->pac_os_ang;?></td>
                            <td><?php echo $optomery_data->pac_data->pac_os_pup;?></td>
                        </tr>
                        
                        
                    </table>
                   
                    <!-- NCT -->
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <?php
                    }if(isset($optomery_data->print_data->nct_print) && $optomery_data->print_data->nct_print==1){
                     ?>  
                    <h4>Non Contact Tenometry</h4>
                    <table width="80%" class="table table-bordered txt_center">
                        <tr>
                           <th colspan="4">NCT in mm/hg</th>
                         </tr>
                        <tr>
                            <th>NCT</th>
                            <th>Before Dilatation</th>
                            <th>After Dilatation</th>
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
                    <table width="80%" class="table table-bordered txt_center">
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
                    <table width="60%" class="table table-bordered txt_center">
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
                    <table width="80%" class="table table-bordered txt_center">
                 
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
                    
                     <!-- orbit -->
                    <?php
                    }if(isset($optomery_data->print_data->orbit_print) && $optomery_data->print_data->orbit_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4> Orbit & Adnexa</h4>
                    <table width="80%" class="table table-bordered"><tr><td style="text-align:left;padding-left:10px"><?php echo $optomery_data->orbit; ?></td></tr></table>
                    

                  
                  
                    <!-- Surgery Recommendations -->
                   <?php
                    }if(isset($optomery_data->print_data->surgery_recommendations_print) && $optomery_data->print_data->surgery_recommendations_print==1){
                     ?>  
                    <span class="heading"> Surgery Recommendations : </span>
                    <?php
                        
                        $as_surgery_recommendations = $optomery_data->antsegment_data->as_surgery_recommendations;?>
                        <?php 
                        foreach($as_surgery_recommendations as $item){
                            echo ' '.$item . ",";
                        }
                        ?>
                   <br>
                    <!-- Investigations -->
                   <?php
                    }if(isset($optomery_data->print_data->investigations_print) && $optomery_data->print_data->investigations_print==1){
                     ?>  
                    <span class="heading"> Investigations : </span>
                    <?php
                        
                        $as_investigations = $optomery_data->antsegment_data->as_investigations;?>
                        <?php 
                        foreach($as_investigations as $item){
                            echo '  '.$item . ",";
                        }
                        ?>
                        <br>
                     <!-- Review Date -->
                   <?php
                    }if(isset($optomery_data->print_data->rvdate_print) && $optomery_data->print_data->rvdate_print==1){
                     ?>  
                    <span class="heading"> Review Date : </span>

                    <?php
                        
                        $as_rvdate = $optomery_data->antsegment_data->as_rvdate;?>
                        <?php 
                            echo  $as_rvdate;
                        ?>
                   <br>
                    <!-- Lacrimal Patency -->
                    <?php
                    }if(isset($optomery_data->print_data->lac_print) && $optomery_data->print_data->lac_print==1){
                     ?>  
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <h4>Lacrimal patency</h4>
                    <table width="80%" class="table table-bordered txt_center">
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
                    
                    <!-- Eye Evaluation -->
                    <table width="80%" class="table table-bordered txt_center">
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
                    <table width="80%" class="table table-bordered txt_center">
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
                        <h4><b>Gaze Evalution</b></h4>
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
                         <table class="table">
                            <tbody>
                            <tr><th style=" border:0px solid white !important;">RSR LIO</th><th style="border:0px solid white !important;margin-left:50px !important;" >RSR LSR</th><th style="border:0px solid white !important;">RIO LSR</th></tr>
                            <tr>
                                <td style="border:0px solid white !important;"><?php echo $optomery_data->ocu_data->ocu_1.' '.$optomery_data->ocu_data->ocu_r1;?></td>
                                <td style="border:0px solid white !important;"><?php echo $optomery_data->ocu_data->ocu_2.' '.$optomery_data->ocu_data->ocu_r2;?></td>
                                <td style="border:0px solid white !important;"><?php echo $optomery_data->ocu_data->ocu_3.' '.$optomery_data->ocu_data->ocu_r3;?></td>
                            </tr>
                            <tr><th style="border:0px solid white !important;">RLR LMR</th><th style="border:0px solid white !important;"></th><th style="border:0px solid white !important;">RMR LLR</th></tr>
                            <tr>
                                <td style="border:0px solid white !important;"><?php echo $optomery_data->ocu_data->ocu_4.' '.$optomery_data->ocu_data->ocu_r4;?></td>
                                <td style="border:0px solid white !important;"><img src="<?php echo site_url('uploads/popup/13.png') ?>" height="100px" style="margin: -55px;"></td>
                                <td style="border:0px solid white !important;"><?php echo $optomery_data->ocu_data->ocu_5.' '.$optomery_data->ocu_data->ocu_r5;?></td>
                            </tr>
                            <tr>
                                <th style="border:0px solid white !important;">RIR LSO</th><th style="border:0px solid white !important;">RIR LIR</th><th style="border:0px solid white !important;">RSO LIR</th>
                            </tr>
                            <tr>
                                <td style="border:0px solid white !important;"><?php echo $optomery_data->ocu_data->ocu_6.' '.$optomery_data->ocu_data->ocu_r6;?></td>
                                <td style="border:0px solid white !important;"><?php echo $optomery_data->ocu_data->ocu_7.' '.$optomery_data->ocu_data->ocu_r7;?></td>
                                <td style="border:0px solid white !important;"><?php echo $optomery_data->ocu_data->ocu_8.' '.$optomery_data->ocu_data->ocu_r8;?></td>
                            </tr>
                            </tbody>
                        </table>
                        <?php } ?>

                        <!-- Goneoscopy -->
                    <?php 
                    if(!empty($optomery_data->gon_data) && isset($optomery_data->print_data->gon_print) && $optomery_data->print_data->gon_print==1){
                        ?>
                        <h4><b>Goneoscopy</b></h4>

                         <table class="table" style="border:0px solid white;">
                            <tbody>
                                <tr>
                                    <th style="width:50%;text-align:center;border:0px solid white !important;">OD</th>
                                    <th style="width:50%;text-align:center;border:0px solid white !important;">OS</th>
                                </tr>
                                <tr>
                                    <td style="width:50%; border:0px solid white !important;" >
                                        <table style="border:0px solid white !important;" class="table" border="0">
                                        <tr>
                                        <td style="border:0px solid white !important;"></td>
                                        <td style="text-align:center; border:0px solid white !important;;"><?php echo $optomery_data->gon_data->gon_od_1; ?></td>
                                        <td  style="border:0px solid white !important;"></td>
                                        </tr>
                                        <tr height="50px"></tr>
                                        <tr>
                                        <td  style="border:0px solid white !important;"><?php echo $optomery_data->gon_data->gon_od_2; ?></td>
                                        <td  style="border:0px solid white !important;"><img src="<?php echo site_url('uploads/popup/14.png'); ?>" style="width: 200px;margin: -65px 0px 0px 20px;"></td>
                                        <td  style="border:0px solid white !important;"><?php echo $optomery_data->gon_data->gon_od_3; ?></td>
                                        </tr>
                                        <tr height="10px"></tr>
                                        <tr>
                                        <td  style="border:0px solid white !important;"></td>
                                        <td style="text-align:center;border:0px solid white !important;"><?php echo $optomery_data->gon_data->gon_od_4; ?></td>
                                        <td  style="border:0px solid white !important;"></td>
                                        </tr>
                                        </tbody>
                                        </table>
                                    </td>
                                    <td style="width:50%;border:0px solid white !important;">
                                        <table class="table"style="border:0px solid white !important;" >
                                        <tbody>
                                        <tr>
                                        <td  style="border:0px solid white !important;"></td>
                                        <td style="text-align:center;border:0px solid white !important;"><?php echo $optomery_data->gon_data->gon_os_1; ?></td>
                                        <td  style="border:0px solid white !important;"></td>
                                        </tr>
                                        <tr height="50px"></tr>
                                        <tr>
                                        <td  style="border:0px solid white !important;"><?php echo $optomery_data->gon_data->gon_os_2; ?></td>
                                        <td  style="border:0px solid white !important;"><img src="<?php echo site_url('uploads/popup/14.png'); ?>" style="width: 200px;margin: -65px 0px 0px 20px;"></td>
                                        <td  style="border:0px solid white !important;"><?php echo $optomery_data->gon_data->gon_os_3; ?></td>
                                        </tr>
                                        <tr height="10px"></tr>
                                        <tr>
                                        <td  style="border:0px solid white !important;"></td>
                                        <td style="text-align:center;border:0px solid white !important;"><?php echo $optomery_data->gon_data->gon_os_4; ?></td>
                                        <td style="border:0px solid white !important;"></td>
                                        </tr>
                                        </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php }  ?>
                    


                    

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
                    <?php 
                    // } 
                    ?>
                    
                    <?php
                    }if(!empty($optomery_data->diagnosis_data) && isset($optomery_data->print_data->diagnosis_print) && $optomery_data->print_data->diagnosis_print==1){
                   ?>
                  <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                  <h4>Diagnosis</h4>
                    <table width="100%" class=" table table-striped table-hover">
                        <tr>
                            <th>Eye type</th>
                            <th>Diagnosis</th>
                        </tr>
                        <?php $i = 1;
                        foreach ($optomery_data->diagnosis_data as $key => $val) { if($val->diagnosis_od!=''){
                        ?>
                            <tr>
                                <td><?php echo $val->diagnosis_od_os; ?></td>
                                <td><?php echo $val->diagnosis_od; ?></td>
                            </tr>
                        <?php } $i++;
                        } ?>
                    </table>
                    <?php } ?>
                   <?php
                   if(isset($optomery_data->print_data->optocomments_print) && $optomery_data->print_data->optocomments_print==1){ ?>
                    <?php if (!empty($optomery_data->optometric_comments)) { ?>
                    <h4>Plan of Care</h4>
                    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
                    <table width="50%" class="table-bordered txt_center"><tr><td style="text-align:left;padding-left:10px"><?php echo $optomery_data->optometric_comments; ?></td></tr></table>
                    <?php 
                    }
                   }
                     ?> 


<?php if (!empty($visit_data->medicines)) { ////added by chitranjan ?>
    <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
    <h4><b><?php echo $this->lang->line("medicines"); ?></b></h4>
    <table class="table">
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
        foreach ($visit_data->medicines as $pkey => $pvalue) {
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


<?php if (!empty($visit_data->tests)) {

$r = $p = 0;
foreach ($visit_data->tests as $test_key => $test_value) {
    if ($test_value->test_name != "") {
        $p = 1;
    }
}
foreach ($visit_data->tests as $test_key => $test_value) {
    if ($test_value->radio_test_name != "") {
        $r = 1;
    }
}


?>
<hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
<table class="table" width="100%">
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
                        foreach ($visit_data->tests as $test_key => $test_value) {  ?>
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
            foreach ($visit_data->tests as $test_key => $test_value) {  ?>
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

<?php if(!empty(json_decode($visit_data->diagnosis)) && !empty(json_decode($visit_data->surgery_recommendations))){ ?>
<hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />
<table width="100%" class="printablea4">
    <tr>
        <th width="50%">Diagnosis</th>
        <th width="50%">Surgery Recommendations</th>
    </tr>
    <tr>
        <td><?php foreach (json_decode($visit_data->diagnosis) as $key => $val) { ?>
                <table width="100%" class="printablea4">
                    <tr>
                        <td><span class="text-capitalize"><?php echo str_replace('_',' ',$val); ?></span></td>
                    </tr>
                </table>
            <?php } ?>
        </td>
        <td><?php foreach (json_decode($visit_data->surgery_recommendations) as $key => $val) { ?>
                <table width="100%" class="printablea4">
                    <tr>
                    <td><span class="text-capitalize"><?php echo str_replace('_',' ',$val); ?></span></td>
                    </tr>
                </table>
            <?php } ?>
        </td>
    </tr>
</table>
<!--<hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />-->
<?php } //added by chitranjan ?>
                     
                     
                    <!--<b style="margin-left:50px;"><?php echo "Notes"; ?></b>:<br>-->
                    <!--<table width="100%" class="printablea4" style="margin-left:50px;">-->
                    <!--    <tr>-->
                    <!--        <td><?php echo $result->footer_note; ?></td>-->
                    <!--    </tr>-->
                    <!--</table>-->
                    <!--<hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top:0px" />-->
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