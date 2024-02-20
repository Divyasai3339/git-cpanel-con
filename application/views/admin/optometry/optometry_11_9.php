<!-- raju -->

<style type="text/css">
    .img_cl{
        margin-left: -307px !important;
    }
     .view_optometry .panel-heading {
           font-size: 18px !important;
           font-weight: bolder !important;
           color: white !important;
           background: #459696 !important;
           font-family: auto;
       }
            .panel-body {
             background: #e5f3f3 !important;
             
       }
   
       .complaint_data ul li.list-group-item {
           line-break: anywhere;
       }
   
       .complaint_data {
           max-height: 300px;
           overflow-y: scroll;
       }
   
       #form_optometry .list-group-item {
           padding: 5px 10px !important;
       }
   
       #form_optometry .panel-heading {
           background: #459696 !important;
           font-size: 16px;
       }

    #form_optometry .list_complaint_trash {
        position: absolute;
        right: 4%;
        color: red;
        display: none;
        z-index: 100;
        cursor: pointer;
    }

    #form_optometry .od_complaints .list-group-item {
        position: relative;
        z-index: 99
    }
    .txt_center td{
    /* color: blue !important; */
    text-align: center !important;
  }
  
   .txt_center th{
    /* color: blue !important; */
    text-align: center !important;
  }
  .cntr{
       text-align: center !important;
  }

    #form_optometry .od_complaints .list-group-item:hover .list_complaint_trash {
        display: block;
        top: 10%
    }

    #form_optometry .os_complaints .list-group-item {
        position: relative;
        z-index: 99
    }

    #form_optometry .os_complaints .list-group-item:hover .list_complaint_trash {
        display: block;
        top: 10%
    }
    .my_class{
        font-size: 17px;
    font-family: auto;
    color: white !important;
     padding-left: 5px !important;
    }
    .plus_icon{
        color: white !important;
    }
    .plus_icons{
        color: #459696 !important;
    }
    .auto_fill{
         font-size: 16px;
        color: white !important;
         padding-right: 5px !important;
    }
    #form_optometry .panel-heading {
        background: #459696 !important;
        font-size: 16px;
    }

    .modaled .panel-body {
          background: #e5f3f3 !important;
    }
    .tit{
        font-size:24px !important;
    }
    .modal_head{
        background:#05386B !important;
    }
    .bdr{
        border:1px solid red !important;
    }

    /* #form_optometry .od_complaints{
  border: 1px solid #293faf;
  min-height: 200px;
}
#form_optometry .os_complaints{
  border: 1px solid #293faf;
  min-height: 200px;
} */

 .atf_selected_btn {
       background: #05386B !important;
       color: white !important;
   }
   .table .table-striped .table-bordered{
       color: #05386B !important;
       background: #D7CEC7 !important;
   }
   .atf_cancel_btn {
       background: #05386B !important;
       color: white !important;
   }
   .atf_save_btn {
       background-color: #05386B !important;
       color: white !important;
   }
   
   .borders th{
       border: 1px solid black !important;
       text-align: center !important;
   }
   .table-bordered> th{
       text-align:center !important;
   }
   .atf_value_container {
       width: 200px !important;
   }
   .atf_sph_p_title{
        width: 200px !important;
        text-align: center !important;
   }
   .table-bordered {
       /*border: 1px solid #ddd;*/
       text-align: center !important;
   }
   
   .table-bordered>tbody>tr>th{
       text-align: center !important;
   }
    .od_input{
        width: 200px !important;
   }
    .os_input{
        width: 200px !important;
   }
   .mdls{
      background-color: #c0d6df !important
   }
   .table-stripeds tr {
      background: #F3FFFF !important;
   }
</style>
<!-- Optometry Add-->
<?php //var_dump($optometry_options->sph_data);die;
?>
<div class="modal fade modaled" id="add_optometry" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header modal_head">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title tit" id="optometry_title">Optometry</h4>
            </div>
            <form id="form_optometry" accept-charset="utf-8" enctype="multipart/form-data" method="post">
                <div class="">
                    <div class="modal-body  pb0 ">
                        <?php 
                        ?>
                          <div class="row">
                              
                            <div class="col-md-4"><b>Patient Name:</b> <span id="patient_name"><?php echo $patient_data->patient_name; ?></span></div>
                            <div class="col-md-4"><b>Age:</b> <span id="age"><?php echo $patient_data->age; ?></span></div>
                            <div class="col-md-4"><b>Gender:</b> <span id="gender"><?php echo $patient_data->gender; ?></span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id; ?>">
                                <input type="hidden" name="optometry_id" id="optometry_id" value="">
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="opd_id" id="opd_id" value="">
                            </div>
                        </div>
                    <br>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                                <div class="my_class" style="float:left">Chief Complaints</div>
                                  <div style="float:right" class="add_complaint"><span class="" data-toggle="tooltip" title="Add Disease"><i class="fa fa-plus plus_icon" aria-hidden="true"></i>&nbsp;&nbsp;</span></div>
                                <br />
                            </div>
                                <div class="panel-body">
                                      <div class="complaints_container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for=" " class="cntr">
                                                    Complaints</label>
                                                <div><select name='complaints[]' id="complaints" class="form-control select2 complaints" style="width:100%">
                                                        <option value="">
                                                            <?php echo $this->lang->line('select'); ?>
                                                        </option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Duration</label>
                                                        <div>
                                                            <!--<input type="text" class="form-control" name="complaints_duration[]" id="duration" class="" />-->
                                                            <select name="complaints_duration[]" id="duration" class="form-control select2 " style="width:100%">
                                        <option value="1">1</option>
                                        <option value="2"> 2</option>
                                        <option value="3"> 3</option>
                                        <option value="4"> 4</option>
                                        <option value="5"> 5</option>
                                        <option value="6"> 6</option>
                                        <option value="7"> 7</option>
                                        <option value="8"> 8</option>
                                        <option value="9"> 9</option>
                                        <option value="10"> 10</option>
                                        <option value="11"> 11</option>
                                        <option value="12"> 12</option>
                                        <option value="13"> 13</option>
                                        <option value="14"> 14</option>
                                        <option value="15"> 15</option>
                                        <option value="16"> 16</option>
                                        <option value="17"> 17</option>
                                        <option value="18"> 18</option>
                                        <option value="19"> 19</option>
                                        <option value="20"> 20</option>
                                    </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Period</label>
                                                        <select name='complaints_period[]' id="" class="form-control select2" style="width:100%">
                                                            <option value="Days">
                                                                Days
                                                            </option>
                                                            <option value="Months">
                                                                Months
                                                            </option>
                                                            <option value="Years">
                                                                Years
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-3">
                                            <div class="row">
                                               
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Eye</label>
                                                        <select name='complaints_type[]' id="" class="form-control select2 " style="width:100%">
                                                            <option value="od">
                                                                OD
                                                            </option>
                                                            <option value="os">
                                                                OS
                                                            </option>
                                                            <option value="general">
                                                                General
                                                            </option>
                                                             <option value="both">
                                                                Both
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary addnewcomplaints"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
                                </div>
                                    </div>
                            </div>
                      
                        <!-- History Of Past Illness -->
                        <div class="panel panel-default">
                           <div class="panel-heading my_class">
                           History Of Present Illness
                           </div>
                           <div class="panel-body">
                                <div class="form-group">
                                   <div class="col-sm-12">
                                       <textarea  rows="5" class="form-control inv" name="inv" id="inv" placeholder="Write Notes Here"></textarea>
                                   </div>
                               </div>
                           </div>
                        </div> 

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="my_class" style="float:left">History Of Past Illness</div>
                                <div style="float:right" class="add_disease"><span class="" data-toggle="tooltip" title="Add Disease"><i class="fa fa-plus plus_icon" aria-hidden="true"></i>&nbsp;&nbsp;</span></div>
                                <br>
                            </div>
                            <div class="panel-body">
                                <div class="history_container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for=" " class="cntr">
                                                    Tx/Sx</label>
                                                <div><select name='disease[]' id="disease" class="form-control select2 disease" style="width:100%">
                                                        <option value="">
                                                            <?php echo $this->lang->line('select'); ?>
                                                        </option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Duration</label>
                                                        <div>
                                                            <!--<input type="text" class="form-control" name="duration[]" id="duration" class="duration" />-->
                                                            <select name="duration[]" id="duration" class="form-control select2 " style="width:100%">
                                        <option value="1">1</option>
                                        <option value="2"> 2</option>
                                        <option value="3"> 3</option>
                                        <option value="4"> 4</option>
                                        <option value="5"> 5</option>
                                        <option value="6"> 6</option>
                                        <option value="7"> 7</option>
                                        <option value="8"> 8</option>
                                        <option value="9"> 9</option>
                                        <option value="10"> 10</option>
                                        <option value="11"> 11</option>
                                        <option value="12"> 12</option>
                                        <option value="13"> 13</option>
                                        <option value="14"> 14</option>
                                        <option value="15"> 15</option>
                                        <option value="16"> 16</option>
                                        <option value="17"> 17</option>
                                        <option value="18"> 18</option>
                                        <option value="19"> 19</option>
                                        <option value="20"> 20</option>
                                    </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Period</label>
                                                        <select name='period[]' id="period" class="form-control select2 period" style="width:100%">
                                                            <option value="Days">
                                                                Days
                                                            </option>
                                                            <option value="Months">
                                                                Months
                                                            </option>
                                                            <option value="Years">
                                                                Years
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary addnewhistory"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
                                </div>
                                <br>
                                <div class="form-group">
                                   <div class="col-sm-12">
                                    <label>Notes:</label>
                                       <textarea  rows="2" class="form-control pre" name="pre" id="pre" placeholder="Write Notes Here"></textarea>
                                   </div>
                               </div>
                            </div>
                        </div>


                        
                        <!-- Visions -->

                        <style>
                            /* .table_visions th{
                            width:15%;
                          } */
                            .table_visions th.head {
                                width: 8%;
                            }
                        </style>
                         <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Visual Acuity
                                <div class="pull-right">
                                    <a class="Prev_visit auto_fill" href="javascript:void(0)" onclick="GetPrevVisitData('Visions')">Last Data</a>
                                    
                                    <a class="auto_fill" href="javascript:void(0)" onclick="showAutoFillVisions()">Auto Fill</a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_visions txt_center">
                                    <tr style="border-bottom: 1px solid white;">
                                        <th class="head"></th>
                                        <th colspan="4">OD</th>
                                        <th colspan="4">OS</th>

                                    </tr>
                                    <tr>
                                        <th class="head">Unaided</th>
                                        <th>Distance</th>
                                        <td>
                                            <!--<input name='vision_od_presenting' id="vision_od_presenting" class="form-control vision_od_presenting" style="width:100%"/>-->
                                            <select name='vision_od_presenting' id="vision_od_presenting" class="form-control select2 vision_od_presenting" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->distance_presenting as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select> 
                                        </td>
                                        <th>Near</th>
                                        <td>
                                            <!--<input name='vision_od_near_presenting' id="vision_od_near_presenting" class="form-control vision_od_near_presenting"  style="width:100%"/>-->
                                            
                                            <select name='vision_od_near_presenting' id="vision_od_near_presenting" class="form-control select2 vision_od_near_presenting" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->nearvision as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select> 
                                        </td>
                                        <th>Distance</th>
                                        <td>
                                            <!--<input  name='vision_os_presenting' id="vision_os_presenting" class="form-control vision_os_presenting" style="width:100%"/>-->
                                            
                                            <select name='vision_os_presenting' id="vision_os_presenting" class="form-control select2 vision_os_presenting" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->distance_presenting as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select> 
                                        </td>
                                        <th>Near</th>
                                        <td colspan="2">
                                            <!--<input  name='vision_os_near_presenting' id="vision_os_near_presenting" class="form-control vision_os_near_presenting" style="width:100%"/>-->
                                            <select name='vision_os_near_presenting' id="vision_os_near_presenting" class="form-control select2 vision_os_near_presenting" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->nearvision as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="head" style="width: 10%;">Pinhole</th>
                                        <td colspan="4">
                                            <!--<input name='vision_od_pinhole' id="vision_od_pinhole" class="form-control vision_od_pinhole" style="width:100%"/>-->
                                            <select name='vision_od_pinhole' id="vision_od_pinhole" class="form-control select2 vision_od_pinhole" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->distance_pinhole as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select> 
                                        </td>
                                        <td colspan="4">
                                            <!--<input  name='vision_os_pinhole' id="vision_os_pinhole" class="form-control vision_os_pinhole" style="width:100%"/>-->
                                            
                                            <select name='vision_os_pinhole' id="vision_os_pinhole" class="form-control select2 vision_os_pinhole" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->distance_pinhole as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select> 
                                                        
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Dry REtnoscope -->

                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading my_class">
                                        Dry Retinoscopy
                                        <div class="pull-right">
                                            <a class="Prev_visit auto_fill" href="javascript:void(0)" onclick="GetPrevVisitData('Retinoscopy')">Last Data</a>
                                    
                                            <a class="auto_fill" href="javascript:void(0)" onclick="showAutoFillDryRetnoscoypy()">Auto Fill</a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered table_dry_retinoscope txt_center">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>SPH</th>
                                                    <th>CYL</th>
                                                    <th>AXIS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>OD</th>
                                                    <td>
                                                        <select name='drs_od_sph' id="drs_od_sph" class="form-control select2 drs_od_sph" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->sph as $dkey => $dvalue) {
                                                                if($dvalue->value<0){ $sph = number_format((float)$dvalue->value, 2, '.', '');}
                                                                else{$sph = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                            ?>
                                                                <option value="<?php echo $sph; ?>">
                                                                    <?php echo $sph; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name='drs_od_cyl' id="drs_od_cyl" class="form-control select2 drs_od_cyl" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                                 if($dvalue->value<0){ $cyl = number_format((float)$dvalue->value, 2, '.', '');}
                                                                else{$cyl = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                            ?>
                                                                <option value="<?php echo $cyl; ?>">
                                                                    <?php echo $cyl; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name='drs_od_axis' id="drs_od_axis" class="form-control select2 drs_od_axis" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->axis as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>°">
                                                                    <?php echo $dvalue->value; ?>°
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>OS</th>
                                                    <td>
                                                        <select name='drs_os_sph' id="drs_os_sph" class="form-control select2 drs_os_sph" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->sph as $dkey => $dvalue) {
                                                                if($dvalue->value<0){ $sph = number_format((float)$dvalue->value, 2, '.', '');}
else{$sph = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                            ?>
                                                                <option value="<?php echo $sph; ?>">
                                                                    <?php echo $sph; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name='drs_os_cyl' id="drs_os_cyl" class="form-control select2 drs_os_cyl" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                                if($dvalue->value<0){ $cyl = number_format((float)$dvalue->value, 2, '.', '');}
else{$cyl = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                            ?>
                                                                <option value="<?php echo $cyl; ?>">
                                                                    <?php echo $cyl; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name='drs_os_axis' id="drs_os_axis" class="form-control select2 drs_os_axis" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->axis as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>°">
                                                                    <?php echo $dvalue->value; ?>°
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading my_class">
                                        Cyclo
                                        <div class="pull-right">
                                            <a class="Prev_visit auto_fill" href="javascript:void(0)" onclick="GetPrevVisitData('Cyclo')">Last Data</a>
                                            <a class="auto_fill" href="javascript:void(0)" onclick="showAutoFillCyclo()">Auto Fill</a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered txt_center">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>SPH</th>
                                                    <th>CYL</th>
                                                    <th>AXIS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="head">OD</th>
                                                    <td>
                                                        <select name='cyclo_od_sph' id="cyclo_od_sph" class="form-control select2 cyclo_od_sph" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->sph as $dkey => $dvalue) {
                                                                if($dvalue->value<0){ $sph = number_format((float)$dvalue->value, 2, '.', '');}
                                                                else{$sph = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                            ?>
                                                                <option value="<?php echo $sph; ?>">
                                                                    <?php echo $sph; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name='cyclo_od_cyl' id="cyclo_od_cyl" class="form-control select2 cyclo_od_cyl" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                               if($dvalue->value<0){ $cyl = number_format((float)$dvalue->value, 2, '.', '');}
else{$cyl = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                            ?>
                                                                <option value="<?php echo $cyl; ?>">
                                                                    <?php echo $cyl; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name='cyclo_od_axis' id="cyclo_od_axis" class="form-control select2 cyclo_od_axis" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->axis as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>°">
                                                                    <?php echo $dvalue->value; ?>°
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="head">OS</th>
                                                    <td>
                                                        <select name='cyclo_os_sph' id="cyclo_os_sph" class="form-control select2 cyclo_os_sph" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->sph as $dkey => $dvalue) {
                                                               if($dvalue->value<0){ $sph = number_format((float)$dvalue->value, 2, '.', '');}
else{$sph = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                            ?>
                                                                <option value="<?php echo $sph; ?>">
                                                                    <?php echo $sph; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name='cyclo_os_cyl' id="cyclo_os_cyl" class="form-control select2 cyclo_os_cyl" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                                if($dvalue->value<0){ $cyl = number_format((float)$dvalue->value, 2, '.', '');}
else{$cyl = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                            ?>
                                                                <option value="<?php echo $cyl; ?>">
                                                                    <?php echo $cyl; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name='cyclo_os_axis' id="cyclo_os_axis" class="form-control select2 cyclo_os_axis" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->axis as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>°">
                                                                    <?php echo $dvalue->value; ?>°
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                       

                        <!-- PGP -->
                        <style>
                            .table_pgp th {
                                width: 15%;
                            }

                            .table_pgp th.head {
                                width: 5%;
                            }
                        </style>
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                PGP
                                    <div class="pull-right">
                                        <a class="Prev_visit auto_fill" href="javascript:void(0)" onclick="GetPrevVisitData('PGP')">Last Data</a>
                                        
                                        <a class="auto_fill" href="javascript:void(0)" onclick="showAutoFillPGP()">Auto Fill</a></div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_pgp txt_center">
                                    <thead>
                                        <tr>
                                            <th class="head">PGP</th>
                                            <th>SPH</th>
                                            <th>CYL</th>
                                            <th>AXIS</th>
                                            <th>ADD</th>
                                            <th>BCVA</th>
                                            <th>BCNVA</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="head">
                                                OD</th>
                                            <td>
                                                <select name='pgp_od_sph' id="pgp_od_sph" class="form-control select2 pgp_od_sph" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->sph as $dkey => $dvalue) {
                                                        if($dvalue->value<0){ $sph = number_format((float)$dvalue->value, 2, '.', '');}
else{$sph = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                    ?>
                                                        <option value="<?php echo $sph; ?>">
                                                            <?php echo $sph; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='pgp_od_cyl' id="pgp_od_cyl" class="form-control select2 pgp_od_cyl" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                        if($dvalue->value<0){ $cyl = number_format((float)$dvalue->value, 2, '.', '');}
else{$cyl = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                    ?>
                                                        <option value="<?php echo $cyl; ?>">
                                                            <?php echo $cyl; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='pgp_od_axis' id="pgp_od_axis" class="form-control select2 pgp_od_axis" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->axis as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>°">
                                                            <?php echo $dvalue->value; ?>°
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select type="text" name='pgp_od_add' id="pgp_od_add" class="form-control select2 pgp_od_add" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->add as $dkey => $dvalue) {
                                                        if($dvalue->value<0){ $add = number_format((float)$dvalue->value, 2, '.', '');}
else{$add = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                    ?>
                                                        <option value="<?php echo $add; ?>">
                                                            <?php echo $add; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='pgp_od_eom' id="pgp_od_eom" class="form-control select2 pgp_od_eom" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->distance_presenting as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select> 
                                            </td>
                                            <td>
                                                <!--<input type="text" name='pgp_od_tropia' id="pgp_od_tropia" class="form-control  pgp_od_tropia">-->
                                          
                                            <select name='pgp_od_tropia' id="pgp_od_tropia" class="form-control select2 pgp_od_tropia" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->nearvision as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select> 
                                        </td>
                                        </tr>
                                        <tr>
                                            <th class="head">OS</th>
                                            <td><select type="text" name='pgp_os_sph' id="pgp_os_sph" class="form-control select2 pgp_os_sph" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->sph as $dkey => $dvalue) {
                                                        if($dvalue->value<0){ $sph = number_format((float)$dvalue->value, 2, '.', '');}
else{$sph = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                    ?>
                                                        <option value="<?php echo $sph; ?>">
                                                            <?php echo $sph; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select></td>
                                            <td>
                                                <select type="text" name='pgp_os_cyl' id="pgp_os_cyl" class="form-control select2 pgp_os_cyl" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                        if($dvalue->value<0){ $cyl = number_format((float)$dvalue->value, 2, '.', '');}
else{$cyl = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                    ?>
                                                        <option value="<?php echo $cyl; ?>">
                                                            <?php echo $cyl; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select type="text" name='pgp_os_axis' id="pgp_os_axis" class="form-control select2 pgp_os_axis" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->axis as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>°">
                                                            <?php echo $dvalue->value; ?>°
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select type="text" name='pgp_os_add' id="pgp_os_add" class="form-control select2 pgp_os_add" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->add as $dkey => $dvalue) {
                                                        if($dvalue->value<0){ $add = number_format((float)$dvalue->value, 2, '.', '');}
else{$add = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                    ?>
                                                        <option value="<?php echo $add; ?>">
                                                            <?php echo $add; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                
                                                <select name='pgp_os_eom' id="pgp_os_eom" class="form-control select2 pgp_os_eom" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->distance_presenting as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select> 
                                            </td>
                                            <td>
                                                <!--<input type="text" name="pgp_os_tropia" id="pgp_os_tropia" class="pgp_os_tropia form-control" />-->
                                                
                                        <select name='pgp_os_tropia' id="pgp_os_tropia" class="form-control select2 pgp_os_tropia" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->nearvision as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select> 
                                                        
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <div class="col-sm-12">
                                    <textarea  rows="2" class="form-control pgp_notes" name="pgp_notes" id="pgp_notes" placeholder="Write Notes Here..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Acceptance -->
                         
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Acceptance
                                <div class="pull-right">
                                    <a class="Prev_visit auto_fill" href="javascript:void(0)" onclick="GetPrevVisitData('Acceptance')">Last Data</a>
                                    
                                    <a class="auto_fill" href="javascript:void(0)" onclick="showAutoFillAcceptance()">Auto Fill</a>
                                        </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_acceptance txt_center">
                                    <thead>
                                        <tr>
                                            <th class="head">&nbsp;</th>
                                            <th>SPH</th>
                                            <th>CYL</th>
                                            <th>AXIS</th>
                                            <th>ADD</th>
                                            <th>BCVA</th>
                                            <th>BCNVA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="head">OD</th>
                                            <td>
                                                <select name='accp_od_sph' id="accp_od_sph" class="form-control select2 accp_od_sph" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->sph as $dkey => $dvalue) {
                                                        if($dvalue->value<0){ $sph = number_format((float)$dvalue->value, 2, '.', '');}
else{$sph = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                    ?>
                                                        <option value="<?php echo $sph; ?>">
                                                            <?php echo $sph; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='accp_od_cyl' id="accp_od_cyl" class="form-control select2 accp_od_cyl" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                        if($dvalue->value<0){ $cyl = number_format((float)$dvalue->value, 2, '.', '');}
else{$cyl = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                    ?>
                                                        <option value="<?php echo $cyl; ?>">
                                                            <?php echo $cyl; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='accp_od_axis' id="accp_od_axis" class="form-control select2 accp_od_axis" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->axis as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>°">
                                                            <?php echo $dvalue->value; ?>°
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='accp_od_add' id="accp_od_add" class="form-control select2 accp_od_add" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->add as $dkey => $dvalue) {
                                                        if($dvalue->value<0){ $add = number_format((float)$dvalue->value, 2, '.', '');}
else{$add = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                    ?>
                                                        <option value="<?php echo $add; ?>">
                                                            <?php echo $add; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <!--<input type="text" name='accp_od_va' id="accp_od_va" class="form-control  accp_od_va" style="width:100%">-->
                                                <select name='accp_od_va' id="accp_od_va" class="form-control select2 accp_od_va" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->distance_presenting as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select> 
                                            </td>
                                            
                                            <td>
                                                <!--<input type="text" name='accp_od_bcnva' id="accp_od_bcnva" class="form-control  accp_od_bcnva" style="width:100%">-->
                                        
                                        <select name='accp_od_bcnva' id="accp_od_bcnva" class="form-control select2 accp_od_bcnva" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->nearvision as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="head">OS</th>
                                            <td>
                                                <select name='accp_os_sph' id="accp_os_sph" class="form-control select2 accp_os_sph" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->sph as $dkey => $dvalue) {
                                                        if($dvalue->value<0){ $sph = number_format((float)$dvalue->value, 2, '.', '');}
else{$sph = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                    ?>
                                                        <option value="<?php echo $sph; ?>">
                                                            <?php echo $sph; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='accp_os_cyl' id="accp_os_cyl" class="form-control select2 accp_os_cyl" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                        if($dvalue->value<0){ $cyl = number_format((float)$dvalue->value, 2, '.', '');}
else{$cyl = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                    ?>
                                                        <option value="<?php echo $cyl; ?>">
                                                            <?php echo $cyl; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='accp_os_axis' id="accp_os_axis" class="form-control select2 accp_os_axis" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->axis as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>°">
                                                            <?php echo $dvalue->value; ?>°
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name='accp_os_add' id="accp_os_add" class="form-control select2 accp_os_add" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->add as $dkey => $dvalue) {
                                                        if($dvalue->value<0){ $add = number_format((float)$dvalue->value, 2, '.', '');}
else{$add = "+".number_format((float)$dvalue->value, 2, '.', '');}
                                                    ?>
                                                        <option value="<?php echo $add; ?>">
                                                            <?php echo $add; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                             <td>
                                                <!--<input type="text" name='accp_os_va' id="accp_os_va" class="form-control  accp_os_va" style="width:100%">-->
                                            <select name='accp_os_va' id="accp_os_va" class="form-control select2 accp_os_va" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->distance_presenting as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select>     
                                            </td>
                                             <td>
                                                <!--<input type="text" name='accp_os_bcnva' id="accp_os_bcnva" class="form-control  accp_os_bcnva" style="width:100%">-->
                                        
                                        <select name='accp_os_bcnva' id="accp_os_bcnva" class="form-control select2 accp_os_bcnva" style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                            <?php foreach ($optometry_options->nearvision as $dkey => $dvalue) {
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
                                                                </option>
                                                            <?php
                                                            } ?>
                                                        </select> 
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>
                                
                                
                                   <!--New Code-->
                                <div class="row">
                                    <div class="col-sm-12" style="font-size:14px;">
                                        <label style="font-weight: 600;">Lens Type</label><br/>
                                        <input type="checkbox" class="accp_lens" id="accp_lens" name="accp_lens" value="Single Vision">&nbsp;Single Vision&nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_lens" id="accp_lens" name="accp_lens" value="Bifocal">&nbsp;Bifocal &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_lens" id="accp_lens" name="accp_lens" value="Progressive">&nbsp;Progressive &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_lens" id="accp_lens" name="accp_lens"  value="Glass">&nbsp;Glass &nbsp;&nbsp;

                                        <input type="checkbox" class="accp_lens" id="accp_lens" name="accp_lens"  value="K Bifocal">&nbsp;K Bifocal &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_lens" id="accp_lens" name="accp_lens" value="Polarised">&nbsp;Polarised &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_lens" id="accp_lens" name="accp_lens" value="Polycarbonate">&nbsp;Polycarbonate &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_lens" id="accp_lens" name="accp_lens" value="Executive">&nbsp;Executive &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_lens" id="accp_lens" name="accp_lens" value="Contact Lens">&nbsp;Contact Lens &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" style="font-size:15px;" class="accp_lens" id="accp_lens" name="accp_lens" value="Reading Glass">&nbsp;Reading Glass &nbsp;&nbsp;&nbsp;
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-sm-12" style="font-size:14px;margin-top:5px; ">
                                        <label style="font-weight: 600;">Lens Coating</label><br/>
                                        <input type="checkbox" class="accp_coating" id="accp_coating" name="accp_coating" value="Arc">&nbsp;Arc&nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_coating" id="accp_coating" name="accp_coating"  value="High Index">&nbsp;High Index &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_coating" id="accp_coating" name="accp_coating"  value="Photochromic">&nbsp;Photochromic &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_coating" id="accp_coating" name="accp_coating" value="Aspheric">&nbsp;Aspheric &nbsp;&nbsp;

                                        <input type="checkbox" class="accp_coating" id="accp_coating" name="accp_coating"  value="UV Protection">&nbsp;UV Protection &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_coating" id="accp_coating" name="accp_coating" value="Blue Block">&nbsp;Blue Block &nbsp;&nbsp;&nbsp;

                                    </div>
                                </div>
                                
                                
                                <div class="col-sm-12">
                                    <textarea  rows="2" style="margin-top:5px;" class="form-control accp_notes" name="accp_notes" id="accp_notes" placeholder="Write Notes Here..."></textarea>
                                </div>
                            </div>
                        </div>
                        


                        <!-- Kerotometry -->
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Keratometry
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_ant_segment txt_center">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th colspan="3">H Axis</th>
                                            <th colspan="3">V Axis</th>
                                            <th>AVG K Val</th>
                                            <th>CYL Val</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="head">OD</th>
                                            <td>
                                                <input type="text" name='ker_od_ha1' id="ker_od_ha1" class="form-control  ker_od_ha1" style="width:100%">
                                            </td>
                                            <td>
                                                <span style="width:1%">@</span>
                                            </td>
                                            <td>
                                                <input type="text" name='ker_od_ha2' id="ker_od_ha2" class="form-control  ker_od_ha2" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='ker_od_va1' id="ker_od_va1" class="form-control  ker_od_va1" style="width:100%">
                                            </td>
                                            <td>
                                                <span style="width:1%">@</span>
                                            </td>
                                            <td>
                                                <input type="text" name='ker_od_va2' id="ker_od_va2" class="form-control  ker_od_va2" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='ker_od_av' id="ker_od_av" class="form-control  ker_od_av" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='ker_od_cy' id="ker_od_cy" class="form-control  ker_od_cy" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="head">OS</th>
                                            <td>
                                                <input type="text" name='ker_os_ha1' id="ker_os_ha1" class="form-control  ker_os_ha1" style="width:100%">
                                            </td>
                                            <td>
                                                <span style="width:1%">@</span>
                                            </td>
                                            <td>
                                                <input type="text" name='ker_os_ha2' id="ker_os_ha2" class="form-control  ker_os_ha2" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='ker_os_va1' id="ker_os_va1" class="form-control  ker_os_va1" style="width:100%">
                                            </td>
                                            <td>
                                                <span style="width:1%">@</span>
                                            </td>
                                            <td>
                                                <input type="text" name='ker_os_va2' id="ker_os_va2" class="form-control  ker_os_va2" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='ker_os_av' id="ker_os_av" class="form-control  ker_os_av" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='ker_os_cy' id="ker_os_cy" class="form-control  ker_os_cy" style="width:100%">
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        
                        
                         <div class="row">
                            <div class="col-md-6">
                                
                                <!-- Topography -->
                                <div class="panel panel-default">
                                    <div class="panel-heading my_class">
                                    Topography
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered table_ant_segment txt_center">
                                            <thead>
                                                <tr>
                                                    <th class="head">Topography</th>
                                                    <th>Slim K </th>
                                                    <th>Min K</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="head">OD</th>
                                                    <td>
                                                        <input type="text" name='top_sli_od' id="top_sli_od" class="form-control  top_sli_od" style="width:100%">
                                                    </td>
                                                    
                                                    <td>
                                                        <input type="text" name='top_min_od' id="top_min_od" class="form-control  top_min_od" style="width:100%">
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                <th class="head">OS</th>
                                                    <td>
                                                        <input type="text" name='top_sli_os' id="top_sli_os" class="form-control  top_sli_os" style="width:100%">
                                                    </td>
                                                    
                                                    <td>
                                                        <input type="text" name='top_min_os' id="top_min_os" class="form-control  top_min_os" style="width:100%">
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                  <!-- Schirmers Test -->
                                <div class="panel panel-default">
                                
                                        <div class="panel-heading my_class">
                                            Schirmers Test
                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-bordered table_ant_segment txt_center">
                                                <thead>
                                                    <tr>
                                                        <th>&nbsp</th>
                                                        <th style="width:8%">&nbsp</th>
                                                        <th>mm in 5 Mintes</th>
                                                        <th style="width:8%">&nbsp</th>
                                                        <th>mm in 5 Mintes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th class="head">OD</th>
                                                        <td>
                                                            <input type="text" readonly placeholder="I" name='sch_od_1' id="sch_od_1" class="form-control  sch_od_1" style="width:100%">
                                                        </td>
                                                        <td>
                                                            <input type="text" name='sch_od_mmf' id="sch_od_mmf" class="form-control  sch_od_mmf" style="width:100%">
                                                        </td>
                                                        
                                                        <td>
                                                            <input type="text" readonly placeholder="II" name='sch_od_1' id="sch_od_1" class="form-control  sch_od_1" style="width:100%">
                                                        </td>
                                                        <td>
                                                            <input type="text" name='sch_od_mms' id="sch_od_mms" class="form-control  sch_od_mms" style="width:100%">
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <th class="head">OS</th>
                                                        <td>
                                                            <input type="text" readonly placeholder="I" name='sch_od_1' id="sch_od_1" class="form-control  sch_od_1" style="width:100%">
                                                        </td>
                                                        <td>
                                                            <input type="text" name='sch_os_mmf' id="sch_os_mmf" class="form-control  sch_os_mmf" style="width:100%">
                                                        </td>
                                                        
                                                        <td>
                                                            <input type="text" readonly placeholder="II" name='sch_od_1' id="sch_od_1" class="form-control  sch_od_1" style="width:100%">
                                                        </td>
                                                        <td>
                                                            <input type="text" name='sch_os_mms' id="sch_os_mms" class="form-control  sch_os_mms" style="width:100%">
                                                        </td>
                                                        
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pachymetry -->
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Pachymetry
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_ant_segment txt_center">
                                    <thead>
                                        <tr>
                                            <th class="head" style="width: 15%;">Pachymetry</th>
                                             <th>Pachymetry</th>
                                            <th>KVf</th>
                                            <th>KVb</th>
                                            <th>Class</th>
                                            <th>HV ID</th>
                                            <th>ACD</th>
                                            <th>ANGLE</th>
                                            <th>Pupil Diameter</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <th class="head">OD</th>
                                            <td>
                                                <input type="text" value="" name='pac_od_pac' id="pac_od_pac" class="form-control  pac_od_pac" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="" name='pac_od_kvf' id="pac_od_kvf" class="form-control  pac_od_kvf" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="" name='pac_od_kvb' id="pac_od_kvb" class="form-control  pac_od_kvb" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="" name='pac_od_cla' id="pac_od_cla" class="form-control  pac_od_cla" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="" name='pac_od_hv' id="pac_od_hv" class="form-control  pac_od_hv" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="" name='pac_od_acd' id="pac_od_acd" class="form-control  pac_od_acd" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="" name='pac_od_ang' id="pac_od_ang" class="form-control  pac_od_ang" style="width:100%">
                                            </td>
                                            <td>
                                            <input type="text" value=""  name='pac_od_pup' id="pac_od_pup" class="form-control  pac_od_pup" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="head">OS</th>
                                            <td>
                                                <input type="text" value="" name='pac_os_pac' id="pac_os_pac" class="form-control  pac_os_pac" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="" name='pac_os_kvf' id="pac_os_kvf" class="form-control  pac_os_kvf" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="" name='pac_os_kvb' id="pac_os_kvb" class="form-control  pac_os_kvb" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="" name='pac_os_cla' id="pac_os_cla" class="form-control  pac_os_cla" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="" name='pac_os_hv' id="pac_os_hv" class="form-control  pac_os_hv" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="" name='pac_os_acd' id="pac_os_acd" class="form-control  pac_os_acd" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="" name='pac_os_ang' id="pac_os_ang" class="form-control  pac_os_ang" style="width:100%">
                                            </td>
                                            <td>
                                            <input type="text" value=""  name='pac_os_pup' id="pac_os_pup" class="form-control  pac_os_pup" style="width:100%">
                                            </td>
                                        </tr>
                                        
                                    </tbody>

                                </table>
                            </div>
                        </div>

                         <!-- TOnometry -->
                        <div class="row">

                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading my_class">
                                    Tonometry - NCT
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered table_acceptance txt_center">
                                            <thead>
                                                <tr>
                                                    <th colspan="4" style="background: #e5f3f3;">NCT in mm/hg</th>
                                                </tr>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>Before Dilatation</th>
                                                    <th>After Dilatation</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="head">OD</th>
                                                    <td>
                                                        <input type="text" name='nt_od_va_bf' id="nt_od_va_bf" class="form-control  nt_od_va_bf" style="width:100%">
                                                    </td>
                                                    <td>
                                                        <input type="text" name='nt_od_va_af' id="nt_od_va_af" class="form-control  nt_od_va_af" style="width:100%">
                                                    </td>
                                                    <td>
                                                        <input type="text" name='nt_od_time_bf' id="nt_od_time_bf" class="form-control  nt_od_time_bf datetime"style="width:100%">
                                                </td>
                                                </tr>
                                                <tr>
                                                    <th class="head">OS</th>
                                                    <td>
                                                        <input type="text" name='nt_os_va_bf' id="nt_os_va_bf" class="form-control  nt_os_va_bf" style="width:100%">
                                                    </td>
                                                    <td>
                                                        <input type="text" name='nt_os_va_af' id="nt_os_va_af" class="form-control  nt_os_va_af" style="width:100%">
                                                    </td>
                                                    <td>
                                                        <input type="text" name='nt_os_time_bf' id="nt_os_time_bf" class="form-control  nt_os_time_bf datetime" style="width:100%">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>            
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading my_class">
                                    Tonometry - ATN
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered table_acceptance txt_center">
                                            <thead>
                                                <tr>
                                                    <th colspan="4" style="background: #e5f3f3;">ATN in mm/hg</th>
                                                </tr>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>Before Dilatation</th>
                                                    <th>After Dilatation</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="head">OD</th>
                                                    <td>
                                                        <input type="text" name='at_od_va_bf' id="at_od_va_bf" class="form-control  at_od_va_bf" style="width:100%">
                                                    </td>
                                                    <td>
                                                        <input type="text" name='at_od_va_af' id="at_od_va_af" class="form-control  at_od_va_af" style="width:100%">
                                                    </td>
                                                    <td>
                                                        <input type="text" name='at_od_time_bf' id="at_od_time_bf" class="form-control  at_od_time_bf datetime" style="width:100%">
                                                </td>
                                                </tr>
                                                <tr>
                                                    <th class="head">OS</th>
                                                    <td>
                                                        <input type="text" name='at_os_va_bf' id="at_os_va_bf" class="form-control  at_os_va_bf" style="width:100%">
                                                    </td>
                                                    <td>
                                                        <input type="text" name='at_os_va_af' id="at_os_va_af" class="form-control  at_os_va_af" style="width:100%">
                                                    </td>
                                                    <td>
                                                        <input type="text" name='at_os_time_bf' id="at_os_time_bf" class="form-control  at_os_time_bf datetime" style="width:100%">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>            
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Colour Vision row -->
                        
                        <div class="row">

                            <!-- Colour Vision -->
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading my_class">
                                        Colour Vision Test
                                    </div>
                                    <!-- <div class="panel-body">
                                        <table class="table table-bordered table_ant_segment">
                                            <tbody>
                                            <div class="panel-heading my_class">
                                                Ishihara Colour Vision
                                            </div> -->
                                    <div class="panel-body">
                                        <table class="table table-bordered table_ant_segment txt_center">
                                            <tbody>
                                            <thead>
                                                <tr>
                                                    <th class="head" style="width: 5%;">&nbsp;</th>
                                                    <th colspan="3" class="text-center">Ishihara Colour Vision</th>
                                                </tr>
                                            </thead>
                                                <tr>
                                                    <th class="head">OD</th>
                                                    <td>
                                                        <input type="text" name='cvt_od' id="cvt_od" class="form-control  cvt_od" style="width:100%">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="head">OS</th>
                                                    <td>
                                                        <input type="text" name='cvt_os' id="cvt_os" class="form-control  cvt_os" style="width:100%">
                                                    </td>
                                                </tr>
                                                
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- LCVA -->
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading my_class">
                                        LCVA
                                         <div class="pull-right">
                                            <a class="auto_fill" href="javascript:void(0)" onclick="showAutoFillLcva()">Auto Fill</a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered table_ant_segment txt_center">
                                            <thead>
                                                <tr>
                                                    <th class="head" style="width: 5%;">&nbsp;</th>
                                                    <th>SPH</th>
                                                    <th>CYL</th>
                                                    <th>Axis</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="head">OD</th>
                                                    <td>
                                                        <input type="text" name='lcva_od_sph' id="lcva_od_sph" class="form-control  lcva_od_sph" style="width:100%">
                                                    </td>
                                                    <td>
                                                        <input type="text" name='lcva_od_cyl' id="lcva_od_cyl" class="form-control  lcva_od_cyl" style="width:100%">
                                                    </td>
                                                    <td>
                                                        <input type="text" name='lcva_od_axis' id="lcva_od_axis" class="form-control  lcva_od_axis" style="width:100%">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="head">OS</th>
                                                    <td>
                                                        <input type="text" name='lcva_os_sph' id="lcva_os_sph" class="form-control  lcva_os_sph" style="width:100%">
                                                    </td>
                                                    <td>
                                                        <input type="text" name='lcva_os_cyl' id="lcva_os_cyl" class="form-control  lcva_os_cyl" style="width:100%">
                                                    </td>
                                                    <td>
                                                        <input type="text" name='lcva_os_axis' id="lcva_os_axis" class="form-control  lcva_os_axis" style="width:100%">
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                         
                        <!-- Orbit Adnexa -->
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                            Orbit and Adnexa
                            </div>
                            <div class="panel-body">
                            <div class="form-group">
                                    <div class="col-sm-12">
                                        <textarea  rows="5" class="form-control orbit" name="orbit" id="orbit" placeholder="Write Notes Here"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- Ant Segment -->
                         <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Ant Segment
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_ant_segment txt_center">
                                    <thead>
                                        <tr>
                                            <th class="head" style="width: 15%;">&nbsp;</th>
                                            <th>OD</th>
                                            <th>OS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Lids</th>
                                            <td>
                                                <!--<input type="text" value="Normal" name='as_od_lids' id="as_od_lids" class="form-control  as_od_lids" style="width:100%">-->
                                             
                                                <select name='as_od_lids[]' id="as_od_lids"  class="form-control multiselect2 as_od_lids" multiple style="width:100%">
                                                            <option value="">
                                                                <?php echo $this->lang->line('select'); ?>
                                                            </option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Upper lid Stye">Upper lid Stye</option>
                                                    <option value="Lower lid Stye">Lower lid Stye</option>
                                                    <option value="Upper lid Chalazion">Upper lid Chalazion</option>
                                                    <option value="Lower lid chalazion">Lower lid chalazion</option>
                                                    <option value="Meibomitis">Meibomitis</option>
                                                    <option value="Squamous blepharitis">Squamous blepharitis</option>
                                                    <option value="Ulcerative blepharitis">Ulcerative blepharitis</option>
                                                    <option value="Partial ptosis">Partial ptosis</option>
                                                    <option value="Complete ptosis">Complete ptosis</option>
                                                    <option value="Upper lid coloboma">Upper lid coloboma</option>
                                                    <option value="Lower lid coloboma">Lower lid coloboma</option>
                                                    <option value="Ectropion">Ectropion</option>
                                                    <option value="Entropion">Entropion</option>
                                                    <option value="Distichiasis">Distichiasis</option>
                                                    <option value="Trichiasis">Trichiasis</option>
                                                    <option value="Ankyloblephron">Ankyloblephron</option>
                                                    <option value="Lateral tarsorrhaphy">Lateral tarsorrhaphy</option>
                                                    <option value="Total tarsorrhaphy">Total tarsorrhaphy</option>
                                            </select>
                                            </td>
                                            <td>
                                               
                                        <select name='as_os_lids[]' id="as_os_lids" class="form-control multiselect2 as_os_lids" multiple style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="Normal">Normal</option>
                                                <option value="Upper lid Stye">Upper lid Stye</option>
                                                <option value="Lower lid Stye">Lower lid Stye</option>
                                                <option value="Upper lid Chalazion">Upper lid Chalazion</option>
                                                <option value="Lower lid chalazion">Lower lid chalazion</option>
                                                <option value="Meibomitis">Meibomitis</option>
                                                <option value="Squamous blepharitis">Squamous blepharitis</option>
                                                <option value="Ulcerative blepharitis">Ulcerative blepharitis</option>
                                                <option value="Partial ptosis">Partial ptosis</option>
                                                <option value="Complete ptosis">Complete ptosis</option>
                                                <option value="Upper lid coloboma">Upper lid coloboma</option>
                                                <option value="Lower lid coloboma">Lower lid coloboma</option>
                                                <option value="Ectropion">Ectropion</option>
                                                <option value="Entropion">Entropion</option>
                                                <option value="Distichiasis">Distichiasis</option>
                                                <option value="Trichiasis">Trichiasis</option>
                                                <option value="Ankyloblephron">Ankyloblephron</option>
                                                <option value="Lateral tarsorrhaphy">Lateral tarsorrhaphy</option>
                                                <option value="Total tarsorrhaphy">Total tarsorrhaphy</option>
                                            </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Conjuctiva</th>
                                            <td>
                                        <select name='as_od_conjuctiva[]' id="as_od_conjuctiva" class="form-control multiselect2 as_od_conjuctiva" multiple style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="Normal">Normal</option>
                                                <option value="Circum corneal congestion">Circum corneal congestion</option>
                                                <option value="Bulbar congestion">Bulbar congestion</option>
                                                <option value="Follicular reaction">Follicular reaction</option>
                                                <option value="Papillary reaction">Papillary reaction</option>
                                                <option value="Mucous discharge">Mucous discharge</option>
                                                <option value="Purulent discharge">Purulent discharge</option>
                                                <option value="Pterygium">Pterygium</option>
                                                <option value="Pinguecula">Pinguecula</option>
                                                <option value="Phlycten">Phlycten</option>
                                                <option value="Sub conjunctival hemorrhage ">Sub conjunctival hemorrhage </option>
                                                <option value="Symblepheron">Symblepheron</option>
                                                <option value="OSSN">OSSN</option>
                                        </select>        
                                            </td>
                                            <td>
                                                
                                     <select name='as_os_conjuctiva[]' id="as_os_conjuctiva" class="form-control multiselect2 as_os_conjuctiva" multiple style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                        <option value="Normal">Normal</option>
                                        <option value="Circum corneal congestion">Circum corneal congestion</option>
                                        <option value="Bulbar congestion">Bulbar congestion</option>
                                        <option value="Follicular reaction">Follicular reaction</option>
                                        <option value="Papillary reaction">Papillary reaction</option>
                                        <option value="Mucous discharge">Mucous discharge</option>
                                        <option value="Purulent discharge">Purulent discharge</option>
                                        <option value="Pterygium">Pterygium</option>
                                        <option value="Pinguecula">Pinguecula</option>
                                        <option value="Phlycten">Phlycten</option>
                                        <option value="Sub conjunctival hemorrhage ">Sub conjunctival hemorrhage </option>
                                        <option value="Symblepheron">Symblepheron</option>
                                        <option value="OSSN">OSSN</option>
                                            </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Sclera</th>
                                            <td>
                                     <select name='as_od_sclera[]' id="as_od_sclera" class="form-control multiselect2 as_od_sclera" multiple style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                        <option value="Episcleritis">Episcleritis</option>
                                        <option value="Nodular Scleritis">Nodular Scleritis</option>
                                        <option value="Diffuse scleritis">Diffuse scleritis</option>
                                        <option value="Trabeculectomy bleb">Trabeculectomy bleb</option>
                                        <option value="Limbal staphyloma">Limbal staphyloma</option>
                                        <option value="Ciliary staphyloma">Ciliary staphyloma</option>
                                        <option value="Scleral thinning">Scleral thinning</option>

                                            </select>            
                            
                                            </td>
                                            <td>
                                     <select name='as_os_sclera[]' id="as_os_sclera" class="form-control multiselect2 as_os_sclera" multiple style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                        <option value="Episcleritis">Episcleritis</option>
                                        <option value="Nodular Scleritis">Nodular Scleritis</option>
                                        <option value="Diffuse scleritis">Diffuse scleritis</option>
                                        <option value="Trabeculectomy bleb">Trabeculectomy bleb</option>
                                        <option value="Limbal staphyloma">Limbal staphyloma</option>
                                        <option value="Ciliary staphyloma">Ciliary staphyloma</option>
                                        <option value="Scleral thinning">Scleral thinning</option>

                                            </select>    
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Cornea</th>
                                            <td>
                                                
                                     <select name='as_od_cornea[]' id="as_od_cornea" class="form-control multiselect2 as_od_cornea" multiple style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                <option value="Arcus juvenalis">Arcus juvenalis</option>
                                                <option value="Arcus senilis">Arcus senilis</option>
                                                <option value="Pterygium onto cornea">Pterygium onto cornea</option>
                                                <option value="Superficial corneal foreign body">Superficial corneal foreign body</option>
                                                <option value="Deep corneal foreign body">Deep corneal foreign body</option>
                                                <option value="Nebula">Nebula</option>
                                                <option value="Macula">Macula</option>
                                                <option value="Leucoma">Leucoma</option>
                                                <option value="Adherent leucoma">Adherent leucoma</option>
                                                <option value="Striate keratopathy">Striate keratopathy</option>
                                                <option value="Macular corneal dystrophy ">Macular corneal dystrophy </option>
                                                <option value="Granular corneal dystrophy">Granular corneal dystrophy</option>
                                                <option value="Cornea guttata">Cornea guttata</option>
                                                <option value="Dellen">Dellen</option>
                                                <option value="Superficial epithelial erosions">Superficial epithelial erosions</option>
                                                <option value="Superficial punctate keratitis">Superficial punctate keratitis</option>
                                                <option value="Corneal ulcer">Corneal ulcer</option>
                                                <option value="Corneal infiltrate">Corneal infiltrate</option>
                                                <option value="Peripheral ulcerative keratitis">Peripheral ulcerative keratitis</option>
                                                <option value="Keratoconus">Keratoconus</option>
                                                <option value="Corneal hydrops">Corneal hydrops</option>
                                                <option value="DM stripping">DM stripping</option>
                                                <option value="Fine Keratic precipitates">Fine Keratic precipitates</option>
                                                <option value="Mutton fat Keratic precipitates">Mutton fat Keratic precipitates</option>
                                                <option value="Stellate Keratic precipitates">Stellate Keratic precipitates</option>
                                                <option value="Keratoconus">Pigments on endothelium</option>
                                                <option value="Keratoconus">Microcornea</option>

                                            </select>    
                                            
                                            </td>
                                            <td>
                                        <select name='as_os_cornea[]' id="as_os_cornea" class="form-control multiselect2 as_os_cornea" multiple style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                <option value="Arcus juvenalis">Arcus juvenalis</option>
                                                <option value="Arcus senilis">Arcus senilis</option>
                                                <option value="Pterygium onto cornea">Pterygium onto cornea</option>
                                                <option value="Superficial corneal foreign body">Superficial corneal foreign body</option>
                                                <option value="Deep corneal foreign body">Deep corneal foreign body</option>
                                                <option value="Nebula">Nebula</option>
                                                <option value="Macula">Macula</option>
                                                <option value="Leucoma">Leucoma</option>
                                                <option value="Adherent leucoma">Adherent leucoma</option>
                                                <option value="Striate keratopathy">Striate keratopathy</option>
                                                <option value="Macular corneal dystrophy ">Macular corneal dystrophy </option>
                                                <option value="Granular corneal dystrophy">Granular corneal dystrophy</option>
                                                <option value="Cornea guttata">Cornea guttata</option>
                                                <option value="Dellen">Dellen</option>
                                                <option value="Superficial epithelial erosions">Superficial epithelial erosions</option>
                                                <option value="Superficial punctate keratitis">Superficial punctate keratitis</option>
                                                <option value="Corneal ulcer">Corneal ulcer</option>
                                                <option value="Corneal infiltrate">Corneal infiltrate</option>
                                                <option value="Peripheral ulcerative keratitis">Peripheral ulcerative keratitis</option>
                                                <option value="Keratoconus">Keratoconus</option>
                                                <option value="Corneal hydrops">Corneal hydrops</option>
                                                <option value="DM stripping">DM stripping</option>
                                                <option value="Fine Keratic precipitates">Fine Keratic precipitates</option>
                                                <option value="Mutton fat Keratic precipitates">Mutton fat Keratic precipitates</option>
                                                <option value="Stellate Keratic precipitates">Stellate Keratic precipitates</option>
                                                <option value="Keratoconus">Pigments on endothelium</option>
                                                <option value="Keratoconus">Microcornea</option>

                                            </select> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>A.C</th>
                                            <td>
                                        <select name='as_od_ac[]' id="as_od_ac" class="form-control multiselect2 as_od_ac" multiple style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                       <option value="Normal depth">Normal depth</option>
                        <option value="Shallow">Shallow</option>
                        <option value="Occludable">Occludable</option>
                        
                                            </select> 
                                            </td>
                                            <td> 
                                        <select name='as_os_ac[]' id="as_os_ac" class="form-control multiselect2 as_os_ac" multiple style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                       <option value="Normal depth">Normal depth</option>
                        <option value="Shallow">Shallow</option>
                        <option value="Occludable">Occludable</option>
                        
                                            </select> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Iris</th>
                                            <td>
                                        <select name='as_od_iris[]' id="as_od_iris" class="form-control multiselect2 as_od_iris" multiple style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                            <option value="Normal colour & pattern">Normal colour & pattern</option>
                                                <option value="YAG PI">YAG PI</option>
                                                <option value="Surgical PI">Surgical PI</option>
                                                <option value="Keoppe’s nodules">Keoppe’s nodules</option>
                                                <option value="Busacca’s nodules">Busacca’s nodules</option>
                                                <option value="Freckle">Freckle</option>
                                                <option value="Anton’s iridectomy">Anton’s iridectomy</option>
                                                <option value="Coloboma">Coloboma</option>
                                                <option value="NVI">NVI</option>
                                                
                                            </select> 
                                            </td>
                                            <td> 
                                        <select name='as_os_iris[]' id="as_os_iris" class="form-control multiselect2 as_os_iris" multiple style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                <option value="Normal colour & pattern">Normal colour & pattern</option>
                                                    <option value="YAG PI">YAG PI</option>
                                                    <option value="Surgical PI">Surgical PI</option>
                                                    <option value="Keoppe’s nodules">Keoppe’s nodules</option>
                                                    <option value="Busacca’s nodules">Busacca’s nodules</option>
                                                    <option value="Freckle">Freckle</option>
                                                    <option value="Anton’s iridectomy">Anton’s iridectomy</option>
                                                    <option value="Coloboma">Coloboma</option>
                                                    <option value="NVI">NVI</option>
                        
                                            </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Pupil</th>
                                            <td>
                                        <select name='as_od_pupil[]' id="as_od_pupil" class="form-control multiselect2 as_od_pupil" multiple style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                <option value="Normal size reacting to light">Normal size reacting to light</option>
                                                    <option value="Sluggish reaction">Sluggish reaction</option>
                                                    <option value="RAPD">RAPD</option>
                                                    <option value="Festooned pupil">Festooned pupil</option>
                                                    <option value="Mid dilated fixed">Mid dilated fixed</option>
                                                    <option value="Focal Posterior synechiae">Focal Posterior synechiae</option>
                                                    <option value="Broad posterior synechiae">Broad posterior synechiae</option>
                        
                                            </select>
                                            </td>
                                            <td>
                                        <select name='as_os_pupil[]' id="as_os_pupil" class="form-control multiselect2 as_os_pupil" multiple style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                        <option value="Normal size reacting to light">Normal size reacting to light</option>
                                                            <option value="Sluggish reaction">Sluggish reaction</option>
                                                            <option value="RAPD">RAPD</option>
                                                            <option value="Festooned pupil">Festooned pupil</option>
                                                            <option value="Mid dilated fixed">Mid dilated fixed</option>
                                                            <option value="Focal Posterior synechiae">Focal Posterior synechiae</option>
                                                            <option value="Broad posterior synechiae">Broad posterior synechiae</option>
                            
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Lens</th>
                                            <td>
                                            <select name='as_od_lens[]' id="as_od_lens" class="form-control multiselect2 as_od_lens" multiple style="width:100%">
                                                    <option value="Clear">Clear</option>
                                                        <option value="Aphakia">Aphakia</option>
                                                        <option value="Pseudophakia">Pseudophakia</option>
                                                        <option value="Nuclear sclerosis grade 1">Nuclear sclerosis grade 1</option>
                                                        <option value="Nuclear sclerosis grade 2">Nuclear sclerosis grade 2</option>
                                                        <option value="Nuclear sclerosis grade 3">Nuclear sclerosis grade 3</option>
                                                        <option value="Nuclear sclerosis grade 4">Nuclear sclerosis grade 4</option>
                                                        <option value="PSCC">PSCC</option>
                                                        <option value="PPC">PPC</option>
                                                        <option value="Cortical cataract">Cortical cataract</option>
                                                        <option value="Anterior lenticonus">Anterior lenticonus</option>
                                                        <option value="Posterior lenticonus">Posterior lenticonus</option>
                                                        <option value="Spherophakia">Spherophakia</option>
                                                        <option value="Subluxated">Subluxated</option>
                                                        <option value="Dislocated cataractous lens">Dislocated cataractous lens</option>
                                                        <option value="Dislocated IOL">Dislocated IOL</option>
                                                        <option value="Coloboma">Coloboma</option>
                                                        <option value="Phacodonesis">Phacodonesis</option>
                                                        
                                            </select>
                                            </td>
                                            <td>
                                     <select name='as_os_lens[]' id="as_os_lens" class="form-control multiselect2 as_os_lens" multiple style="width:100%">
                                                    <option value="Clear">Clear</option>
                                                        <option value="Aphakia">Aphakia</option>
                                                        <option value="Pseudophakia">Pseudophakia</option>
                                                        <option value="Nuclear sclerosis grade 1">Nuclear sclerosis grade 1</option>
                                                        <option value="Nuclear sclerosis grade 2">Nuclear sclerosis grade 2</option>
                                                        <option value="Nuclear sclerosis grade 3">Nuclear sclerosis grade 3</option>
                                                        <option value="Nuclear sclerosis grade 4">Nuclear sclerosis grade 4</option>
                                                        <option value="PSCC">PSCC</option>
                                                        <option value="PPC">PPC</option>
                                                        <option value="Cortical cataract">Cortical cataract</option>
                                                        <option value="Anterior lenticonus">Anterior lenticonus</option>
                                                        <option value="Posterior lenticonus">Posterior lenticonus</option>
                                                        <option value="Spherophakia">Spherophakia</option>
                                                        <option value="Subluxated">Subluxated</option>
                                                        <option value="Dislocated cataractous lens">Dislocated cataractous lens</option>
                                                        <option value="Dislocated IOL">Dislocated IOL</option>
                                                        <option value="Coloboma">Coloboma</option>
                                                        <option value="Phacodonesis">Phacodonesis</option>
                        
                                            </select>
                                            </td>
                                        </tr>
                                    </tbody>

                                    

                                </table>
                                <div class="col-sm-12">
                                    <textarea  rows="2" class="form-control as_notes" name="as_notes" id="as_notes" placeholder="Write Notes Here..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Post Segment -->
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Post Segment
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_ant_segment txt_center">
                                    <thead>
                                        <tr>
                                            <th class="head" style="width: 15%;">&nbsp;</th>
                                            <th class="head">OD</th>
                                            <th class="head">OS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Vitreous</th>
                                            <td>
                                                <input type="text" value="Normal" name='ps_od_fundus' id="ps_od_fundus" class="form-control  ps_od_fundus" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Normal" name='ps_os_fundus' id="ps_os_fundus" class="form-control  ps_os_fundus" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Disc</th>
                                            <td>
                                                <input type="text" value="Normal" name='ps_od_cupdisc' id="ps_od_cupdisc" class="form-control  ps_od_cupdisc" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Normal" name='ps_os_cupdisc' id="ps_os_cupdisc" class="form-control  ps_os_cupdisc" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>CDR</th>
                                            <td>
                                                <input type="text" value="0.3 to 0.5" name='ps_od_cdr' id="ps_od_cdr" class="form-control  ps_od_cdr" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="0.3 to 0.5" name='ps_os_cdr' id="ps_os_cdr" class="form-control  ps_os_cdr" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>NFLD</th>
                                            <td>
                                                <input type="text" value="Nil" name='ps_od_nfld' id="ps_od_nfld" class="form-control  ps_od_nfld" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Nil" name='ps_os_nfld' id="ps_os_nfld" class="form-control  ps_os_nfld" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>PPA</th>
                                            <td>
                                                <input type="text" value="Absent" name='ps_od_ppa' id="ps_od_ppa" class="form-control  ps_od_ppa" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Absent" name='ps_os_ppa' id="ps_os_ppa" class="form-control  ps_os_ppa" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Macula</th>
                                            <td>
                                                <input type="text" value="Normal FR" name='ps_od_macula' id="ps_od_macula" class="form-control  ps_od_macula" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Normal FR" name='ps_os_macula' id="ps_os_macula" class="form-control  ps_os_macula" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Vessels</th>
                                            <td>
                                                <input type="text" value="Normal Caliber" name='ps_od_vessels' id="ps_od_vessels" class="form-control  ps_od_vessels" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Normal Caliber" name='ps_os_vessels' id="ps_os_vessels" class="form-control  ps_os_vessels" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Periphery</th>
                                            <td>
                                                <input type="text" value="Normal" name='ps_od_iop' id="ps_od_iop" class="form-control  ps_od_iop" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Normal" name='ps_os_iop' id="ps_os_iop" class="form-control  ps_os_iop" style="width:100%">
                                            </td>
                                        </tr>

                                    </tbody>
                                    <!-- <thead>
                                        <tr>
                                            <th class="head" style="width: 5%;">&nbsp;</th>
                                            <th>Ant Vitreous</th>
                                            <th>Disc</th>
                                            <th>Macula</th>
                                            <th>Vessels</th>
                                            <th>Periphery</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="head">OD</th>
                                            <td>
                                                <input type="text" name='ps_od_fundus' id="ps_od_fundus" class="form-control  ps_od_fundus" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='ps_od_cupdisc' id="ps_od_cupdisc" class="form-control  ps_od_cupdisc" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='ps_od_macula' id="ps_od_macula" class="form-control  ps_od_macula" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='ps_od_vessels' id="ps_od_vessels" class="form-control  ps_od_vessels" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='ps_od_iop' id="ps_od_iop" class="form-control  ps_od_iop" style="width:100%">
                                            </td>

                                        </tr>
                                        <tr>
                                            <th class="head">OS</th>
                                            <td>
                                                <input type="text" name='ps_os_fundus' id="ps_os_fundus" class="form-control  ps_os_fundus" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='ps_os_cupdisc' id="ps_os_cupdisc" class="form-control  ps_os_cupdisc" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='ps_os_macula' id="ps_os_macula" class="form-control  ps_os_macula" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='ps_os_vessels' id="ps_os_vessels" class="form-control  ps_os_vessels" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='ps_os_iop' id="ps_os_iop" class="form-control  ps_os_iop" style="width:100%">
                                            </td>

                                        </tr>
                                    </tbody> -->

                                </table>
                                <div class="col-sm-12">
                                    <textarea  rows="2" class="form-control ps_notes" name="ps_notes" id="ps_notes" placeholder="Write Notes Here..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Lacrimal Patency -->
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Lacrimal Patency
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_visions txt_center">
                                    <tr>
                                        <th width="11%">Lacrimal Patency</th>
                                        <th>Watering</th>
                                        <th>Regurgitation</th>
                                        <th>Discharge</th>
                                        <th>Syringing</th>
                                    </tr>
                                    <tr>
                                        <th class="head">OD</th>
                                        <td>
                                            <select name='lac_od_wat' id="lac_od_wat" class="form-control select2 lac_od_wat" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name='lac_od_reg' id="lac_od_reg" class="form-control select2 lac_od_reg" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name='lac_od_dis' id="lac_od_dis" class="form-control select2 lac_od_dis" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name='lac_od_syr' id="lac_od_syr" class="form-control  lac_od_syr" style="width:100%">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="head">OS</th>
                                        <td>
                                            <select name='lac_os_wat' id="lac_os_wat" class="form-control select2 lac_os_wat" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name='lac_os_reg' id="lac_os_reg" class="form-control select2 lac_os_reg" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name='lac_os_dis' id="lac_os_dis" class="form-control select2 lac_os_dis" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name='lac_os_syr' id="lac_os_syr" class="form-control  lac_os_syr" style="width:100%">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Dry Eye Evaluation -->
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Dry Eye Evaluation
                            </div>
                            
                            <div class="panel-body">

                                <!-- second table -->
                                <!-- Eye OD OS -->
                                <table class="table table-bordered table_ant_segment txt_center">
                                    <thead>
                                        <tr>
                                            <th class="head">Eye</th>
                                            <th>Tear Meniscus Height</th>
                                            <th>Basic Secretion Test</th>
                                            <th>Impression Cytology</th>
                                            <th>Tear Breakup Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="head">OD</th>
                                            <td>
                                                <input type="text" name='eye_tea_od' id="eye_tea_od" class="form-control  eye_tea_od" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eye_bas_od' id="eye_bas_od" class="form-control  eye_bas_od" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eye_imp_od' id="eye_imp_od" class="form-control  eye_imp_od" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eye_tear_od' id="eye_tear_od" class="form-control  eye_tear_od" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="head">OS</th>
                                            <td>
                                                <input type="text" name='eye_tea_os' id="eye_tea_os" class="form-control  eye_tea_os" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eye_bas_os' id="eye_bas_os" class="form-control  eye_bas_os" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eye_imp_os' id="eye_imp_os" class="form-control  eye_imp_os" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eye_tear_os' id="eye_tear_os" class="form-control  eye_tear_os" style="width:100%">
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>

                                 <!-- Staining -->
                                <div class="panel-heading my_class">
                                Staining
                                </div>

                                <table class="table table-bordered table_ant_segment txt_center">
                                    <thead>
                                        <tr>
                                            <th class="head">Eye</th>
                                            <th>Flourescein</th>
                                            <th>Rose Bengal</th>
                                            <th>Lissemine Green</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="head">OD</th>
                                            <td>
                                                <input type="text" name='sta_flo_od' id="sta_flo_od" class="form-control  sta_flo_od" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='sta_ros_od' id="sta_ros_od" class="form-control  sta_ros_od" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='sta_lis_od' id="sta_lis_od" class="form-control  sta_lis_od" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="head">OS</th>
                                            <td>
                                                <input type="text" name='sta_flo_os' id="sta_flo_os" class="form-control  sta_flo_os" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='sta_ros_os' id="sta_ros_os" class="form-control  sta_ros_os" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='sta_lis_os' id="sta_lis_os" class="form-control  sta_lis_os" style="width:100%">
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>

                               
            
                            </div>
                        </div>

                         <!-- Gaze Evaluation -->
                         <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Gaze Evaluation
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_visions">
                                    <tr>
                                        <td>
                                            <input type="text" name='gaz_l1' id="gaz_l1" class="form-control  gaz_l1" style="width:100%;margin-bottom:15%;">
                                        </td>
                                        <td>
                                            <input type="text" name='gaz_l2' id="gaz_l2" class="form-control  gaz_l2" style="width:23%;margin-left: 272px">
                                        </td>
                                        <td>
                                            <input type="text" name='gaz_l3' id="gaz_l3" class="form-control  gaz_l3" style="width:100%;float:right;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name='gaz_m1' id="gaz_m1" class="form-control  gaz_m1" style="width:100%;margin-bottom: 15%;">
                                        </td>
                                        <td>
                                            <input type="text" name='gaz_m2' id="gaz_m2" class="form-control  gaz_m2" style="width:23%;margin-left: 272px">
                                            <img src="<?php echo site_url('uploads/popup/l.png') ?>" height="100px"  style="margin-left: -472px;margin-top: -65px;width: 280px;">
                                            
                                        </td>
                                        <td>
                                            <input type="text" name='gaz_m3' id="gaz_m3" class="form-control  gaz_m3" style="width:100%;float:right;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name='gaz_r1' id="gaz_r1" class="form-control  gaz_r1" style="width:100%;">
                                        </td>
                                        <td>
                                            <input type="text" name='gaz_r2' id="gaz_r2" class="form-control  gaz_r2" style="width:23%;margin-left: 272px">
                                            <img src="<?php echo site_url('uploads/popup/r.png') ?>" height="100px"  style="margin-left: 446px;margin-top: -190px;width: 280px;">
                                        </td>
                                        <td>
                                            <input type="text" name='gaz_r3' id="gaz_r3" class="form-control  gaz_r3" style="width:100%;float:right;">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Ocular Motility -->
                        <style>
                            .lbl_ml{
                                margin-left: -130px;
                            }
                        </style>

                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                    Ocular Motility
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_visions txt_center">
                                    <tr>
                                        <td>
                                            <label class="lbl_ml">RSR LIO</label><br>
                                            <select name='ocu_1' id="ocu_1" class="ocu_1" style="width:24%;border: 1px solid lightgray;padding: 3px;">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r1' id="ocu_r1" class="ocu_r1" style="width:50%;margin-bottom:-28px;margin-left: -4px;margin-top: -28px;border: 1px solid lightgrey;height:28px;padding-bottom: 2px;" />
                                         
                                        </td>
                                        <td>
                                            <label class="lbl_ml">RSR LSR</label><br/>
                                           
                                            <select name='ocu_2' id="ocu_2" class="ocu_2" style="width:24%;border: 1px solid lightgray;padding: 3px;">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r2' id="ocu_r2" class="ocu_r2" style="width:50%;margin-bottom:15%;margin-left: -4px;margin-top: -28px;border: 1px solid lightgrey;height:28px;padding-bottom: 2px;">
                                        </td>
                                        <td>
                                            <label class="lbl_ml">RIO LSR</label>
                                            <br><select name='ocu_3' id="ocu_3" class="ocu_3" style="width:24%;border: 1px solid lightgray;padding: 3px;">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r3' id="ocu_r3" class="ocu_r3" style="width:50%;margin-bottom:15%;margin-left: -4px;margin-top: -28px;border: 1px solid lightgrey;height:28px;padding-bottom: 2px;">
                                        </td>
                                    </tr>
                                    <tr>
                                    <td>
                                            <label class="lbl_ml">RLR LMR</label>
                                            <br><select name='ocu_4' id="ocu_4" class="ocu_4" style="width:24%;border: 1px solid lightgray;padding: 3px;">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r4' id="ocu_r4" class="ocu_r4" style="width:50%;margin-bottom:15%;margin-left: -4px;margin-top: -28px;border: 1px solid lightgrey;height:28px;padding-bottom: 2px;">
                                        </td>
                                        <td>
                                            <img src="<?php echo site_url('uploads/popup/13.png') ?>" height="100px"  style="margin-left: 0px;margin-top:-12px;width: 324px;">
                                        </td>
                                        <td>
                                            <label class="lbl_ml">RMR LLR</label>
                                            <br><select name='ocu_5' id="ocu_5" class="ocu_5" style="width:24%;border: 1px solid lightgray;padding: 3px;">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r5' id="ocu_r5" class="ocu_r5" style="width:50%;margin-bottom:15%;margin-left: -4px;margin-top: -28px;border: 1px solid lightgrey;height:28px;padding-bottom: 2px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="lbl_ml">RIR LSO</label>
                                            <br><select name='ocu_6' id="ocu_6" class="ocu_6" style="width:24%;border: 1px solid lightgray;padding: 3px;">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r6' id="ocu_r6" class="ocu_r6" style="width:50%;margin-bottom:15%;margin-left: -4px;margin-top: -28px;border: 1px solid lightgrey;height:28px;padding-bottom: 2px;">
                                        </td>
                                        <td>
                                            <label class="lbl_ml">RIR LIR</label>
                                            <br><select name='ocu_7' id="ocu_7" class="ocu_7" style="width:24%;border: 1px solid lightgray;padding: 3px;">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r7' id="ocu_r7" class="ocu_r7" style="width:50%;margin-bottom:15%;margin-left: -4px;margin-top: -28px;border: 1px solid lightgrey;height:28px;padding-bottom: 2px;">
                                        </td>
                                        <td>
                                            <label class="lbl_ml">RSO LIR</label>
                                            <br><select name='ocu_8' id="ocu_8" class="ocu_8" style="width:24%;border: 1px solid lightgray;padding: 3px;">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r8' id="ocu_r8" class="ocu_r8 select select2" style="width:50%;margin-bottom:15%;margin-left: -4px;margin-top: -28px;border: 1px solid lightgrey;height:28px;padding-bottom: 2px;">
                                        </td>
                                    </tr>
                                </table>
                                <div class="col-sm-12">
                                    <textarea  rows="2" class="form-control ocu_Ocular_notes" name="ocu_Ocular_notes" id="ocu_Ocular_notes" placeholder="Write Notes Here..."></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Goneoscopy -->
                        <style>
                            .gon_img{
                                /* background-image: url('../../../../uploads/popup/cornea.jpeg'); */
                                /* background-image: url('goneo.jpeg'); */
                                /* height: 500px;
                                width: 500px;
                                background-color: red;
                                background: url('goneo.jpeg'); */
                            }
                        </style>

                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                            Gonioscopy
                            </div>
                            <div class="panel-body">
                            <div class="form-group">
                                    <div class="col-sm-6">
                                        <div style="width:100%;" class="form-control">
                                                OD
                                                <!-- <hr/> -->
                                        </div>
                                        <!-- table -->
                                                    <table class="table table-bordered table_dry_retinoscope">
                                                        <tbody>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                                <td>
                                                                    <select name='gon_od_1' id="gon_od_1" class="form-control select2 gon_od_1" style="width:100%">
                                                                        <option value="">
                                                                            <?php echo $this->lang->line('select'); ?>
                                                                        </option>
                                                                        <?php foreach ($optometry_options->goneoscopy as $dkey => $dvalue) {
                                                                        ?>
                                                                            <option value="<?php echo $dvalue->value; ?>">
                                                                                <?php echo $dvalue->value; ?>
                                                                            </option>
                                                                        <?php
                                                                        } ?>
                                                                    </select>
                                                                </td>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                            </tr>

                                                            <!-- for space -->
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <select name='gon_od_2' id="gon_od_2" class="form-control select2 gon_od_2" style="width:100%">
                                                                        <option value="">
                                                                            <?php echo $this->lang->line('select'); ?>
                                                                        </option>
                                                                        <?php foreach ($optometry_options->goneoscopy as $dkey => $dvalue) {
                                                                        ?>
                                                                            <option value="<?php echo $dvalue->value; ?>">
                                                                                <?php echo $dvalue->value; ?>
                                                                            </option>
                                                                        <?php
                                                                        } ?>
                                                                    </select>
                                                                </td>
                                                                <td colspan="3">
                                                                <img src="<?php echo site_url('uploads/popup/14.png') ?>" style="width: 200px;margin: -65px;">
                                                                </td>
                                                                <td>
                                                                    <select name='gon_od_3' id="gon_od_3" class="form-control select2 gon_od_3" style="width:100%">
                                                                        <option value="">
                                                                            <?php echo $this->lang->line('select'); ?>
                                                                        </option>
                                                                        <?php foreach ($optometry_options->goneoscopy as $dkey => $dvalue) {
                                                                        ?>
                                                                            <option value="<?php echo $dvalue->value;?>">
                                                                                <?php echo $dvalue->value; ?>
                                                                            </option>
                                                                        <?php
                                                                        } ?>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <!-- for space -->
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                            </tr>

                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                                <td>
                                                                    <select name='gon_od_4' id="gon_od_4" class="form-control select2 gon_od_4" style="width:100%">
                                                                        <option value="">
                                                                            <?php echo $this->lang->line('select'); ?>
                                                                        </option>
                                                                        <?php foreach ($optometry_options->goneoscopy as $dkey => $dvalue) {
                                                                        ?>
                                                                            <option value="<?php echo $dvalue->value; ?>">
                                                                                <?php echo $dvalue->value; ?>
                                                                            </option>
                                                                        <?php
                                                                        } ?>
                                                                    </select>
                                                                </td>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                    </div>
                                    <div class="col-sm-6">
                                        <div style="width:100%;" class="form-control">
                                                OS
                                                <!-- <hr/> -->
                                        </div>
                                        <!-- table -->
                                                    <div class="gon_img">
                                                    <!-- <img src="<?php echo site_url('uploads/popup/goneo.jpeg') ?>" height="100px"  style="margin-left: -128px;margin-top: 10px;width: 324px;"> -->
                                                        <table class="table table-bordered table_dry_retinoscope">
                                                            <tbody>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <select name='gon_os_1' id="gon_os_1" class="form-control select2 gon_os_1" style="width:100%">
                                                                            <option value="">
                                                                                <?php echo $this->lang->line('select'); ?>
                                                                            </option>
                                                                            <?php foreach ($optometry_options->goneoscopy as $dkey => $dvalue) {
                                                                            ?>
                                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                                    <?php echo $dvalue->value; ?>
                                                                                </option>
                                                                            <?php
                                                                            } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                </tr>

                                                                <!-- for space -->
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        <select name='gon_os_2' id="gon_os_2" class="form-control select2 gon_os_2" style="width:100%">
                                                                            <option value="">
                                                                                <?php echo $this->lang->line('select'); ?>
                                                                            </option>
                                                                            <?php foreach ($optometry_options->goneoscopy as $dkey => $dvalue) {
                                                                            ?>
                                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                                    <?php echo $dvalue->value; ?>
                                                                                </option>
                                                                            <?php
                                                                            } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td colspan="3">
                                                                        <img src="<?php echo site_url('uploads/popup/14.png') ?>" style="width: 200px;margin: -65px;">
                                                                    </td>
                                                                    <td>
                                                                        <select name='gon_os_3' id="gon_os_3" class="form-control select2 gon_os_3" style="width:100%">
                                                                            <option value="">
                                                                                <?php echo $this->lang->line('select'); ?>
                                                                            </option>
                                                                            <?php foreach ($optometry_options->goneoscopy as $dkey => $dvalue) {
                                                                            ?>
                                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                                    <?php echo $dvalue->value; ?>
                                                                                </option>
                                                                            <?php
                                                                            } ?>
                                                                        </select>
                                                                    </td>
                                                                </tr>

                                                                <!-- for space -->
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <select name='gon_os_4' id="gon_os_4" class="form-control select2 gon_os_4" style="width:100%">
                                                                            <option value="">
                                                                                <?php echo $this->lang->line('select'); ?>
                                                                            </option>
                                                                            <?php foreach ($optometry_options->goneoscopy as $dkey => $dvalue) {
                                                                            ?>
                                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                                    <?php echo $dvalue->value; ?>
                                                                                </option>
                                                                            <?php
                                                                            } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                    </div>
                                    <div class="col-sm-6 mt-1">
                                        <textarea  rows="2" class="form-control gon_od_note" name="gon_od_note" id="gon_od_note" placeholder="Write Notes Here"></textarea>
                                    </div>
                                    <div class="col-sm-6 mt-1">
                                        <textarea  rows="2" class="form-control gon_os_note" name="gon_os_note" id="gon_os_note" placeholder="Write Notes Here"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                       

                        <!--Diagnosis-->
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Diagnosis
                            </div>
                            <div class="panel-body">
                                <div class="diagnosis_container">
                                    <div class="row">
                                        <div class="col-md-6 txt_center">
                                            <div class="form-group">
                                                <label for=" ">
                                                    Diagnosis</label>
                                                <div>
                                                <textarea name='diagnosis_od[]' id="diagnosis_od" class="form-control  diagnosis_od" style="width:100%"></textarea>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for=" ">
                                                    Stage</label>
                                                <div>
                                                    <select name='diagnosis_fin_pro[]' id="diagnosis_fin_pro" class="form-control select2 diagnosis_fin_pro" style="width:100%">
                                                        <option value="">
                                                            <?php echo $this->lang->line('select'); ?>
                                                        </option>
                                                        <option value="Final">Final</option>
                                                        <option value="Provisional">Provisional</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for=" ">
                                                    Eye Type</label>
                                                <div>
                                                    <select name='diagnosis_od_os[]' id="diagnosis_od_os" class="form-control select2 diagnosis_od_os" style="width:100%">
                                                        <option value="">
                                                            <?php echo $this->lang->line('select'); ?>
                                                        </option>
                                                        <option value="OD">OD</option>
                                                        <option value="OS">OS</option>
                                                        <option value="Both">Both</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div>
                                    <button class="btn btn-primary addnewdiagnosis"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
                                </div>
                               
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                            Plan of Care
                            </div>
                            <div class="panel-body">
                            <div class="form-group">
                            <div class="col-sm-12">
                                <textarea  rows="5" class="form-control optometric_comments" name="optometric_comments" id="optometric_comments" placeholder="Comments.."></textarea>
                                </div>
                            </div>
                        </div>
                </div>
        </div>
        <!--./modal-body-->
    </div>
    <div class="modal-footer">
        <div class="pull-right">

            <button type="submit" name="save" value="save" data-loading-text="<?php echo $this->lang->line('processing'); ?>" class="btn btn-info"><i class="fa fa-check-circle"></i>
                <?php echo $this->lang->line('save'); ?>
            </button>
        </div>
    </div>
    </form>
</div>
</div>
</div>
<!-- Optometry Add-->

<!-- Optometry show-->
<style>
    .view_optometry .table-bordered {
        border: 1px solid grey !important;
    }

    .view_optometry .table-bordered td {
        border: 1px solid grey !important;
        text-align: center;
    }

    .view_optometry .table-bordered th {
        border: 1px solid grey !important;
        text-align: center;
    }

    .view_optometry .list-group-item {
        padding: 5px 10px !important;
    }
</style>

<div class="modal fade" id="view_optometry" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="optometry_title">View Optometry Data</h4>
            </div>

            <div class="modal-body pt0 pb0">
                <input type="hidden" id="optometryId" value="" />
                <div class="view_optometry">


                </div>




            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="autofillPGP" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="autofillPGP_title">Auto Fill PGP</h4>
            </div>

            <div class="modal-body pt0 pb0 mdls">                
                <div class="autofillPGP">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>PGP</h2>                        
                        </div>
                        
                        <div class="col-md-4">
                              <button id="od_btn" class="btn atf_selected_btn" onclick="select_operation('od')">OD</button>                               
                              <button class="btn" onclick="copy_od_to_os()">Copy OD values to OS</button>                               
                              <button id="os_btn" class="btn"  onclick="select_operation('os')">OS</button>                               
                        </div>
                        <div class="col-md-2">
                              <button class="btn atf_save_btn" onclick="atf_save_btn_click()">Save</button>                               
                              <button class="btn atf_cancel_btn" onclick="atf_close_btn_click()">Close</button>                               
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>    
                                    <th>SPH</th>
                                    <th>CYL</th>
                                    <th>AXIS</th>
                                    <th>ADD</th>                                    
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="od_sph_selected_val od_input" name="" id="">
                                        <input type="text" class="os_sph_selected_val os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_cyl_selected_val od_input" name="" id="">
                                        <input type="text" class="os_cyl_selected_val os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_axis_selected_val od_input" name="" id="">
                                        <input type="text" class="os_axis_selected_val os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_add_selected_val od_input" name="" id="">
                                        <input type="text" class="os_add_selected_val os_input" name="" id="" style="display:none">
                                    </td>                                    
                                </tr>                               
                                <tr>
                                    <td width="">
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>SPH</lable>
                                                
                                                <span class="pull-right atf_os_span atf_sph_n_span" onclick="show_options_selection('sph','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_sph_p_span atf_selected_btn" onclick="show_options_selection('sph','p','n')">+</span> 
                                            </div>
                                            <div class="atf_sph_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
														echo "<span class='atf_v_span' onclick=\"select_value('sph_selected_val','+{$num}')\">+".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_sph_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
														echo "<span class='atf_v_span' onclick=\"select_value('sph_selected_val','-{$num}')\">-".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div> 
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>CYL</lable>
                                                <span class="pull-right atf_os_span atf_cyl_n_span" onclick="show_options_selection('cyl','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_cyl_p_span atf_selected_btn" onclick="show_options_selection('cyl','p','n')">+</span> 
                                            </div>
                                            <div class="atf_cyl_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value('cyl_selected_val','+{$num}')\">+".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_cyl_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value('cyl_selected_val','-{$num}')\">-".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>   
                                        </div>
                                                  
                                    </td>                                 
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>AXIS</lable>                                                
                                            </div>
                                            <div class="atf_axis_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0; $ii <= 180; $ii +=1)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value('axis_selected_val','{$ii}°')\">".number_format((float)$ii, 2, '.', '')."°</span>"; 
                                                    }
                                                ?>                                                
                                            </div>                                            
                                        </div>
                                    </td>                                 
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>ADD</lable>
                                                <span class="pull-right atf_os_span atf_add_n_span" onclick="show_options_selection('add','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_add_p_span atf_selected_btn" onclick="show_options_selection('add','p','n')">+</span>
                                                
                                            </div>
                                            <div class="atf_add_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 4; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                        echo "<span class='atf_v_span' onclick=\"select_value('add_selected_val','+{$num}')\">+".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_add_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 4; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                        echo "<span class='atf_v_span' onclick=\"select_value('add_selected_val','-{$num}')\">-".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>   
                                        </div>
                                    </td>                        
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>
                                    <td class="atf_selected_btn">OD:</td>
                                    <td>SPH: <span class="od_sph_selected_val"></span></td>
                                    <td>CYL: <span class="od_cyl_selected_val"></span></td>
                                    <td>AXIS: <span class="od_axis_selected_val"></span></td>
                                    <td>ADD: <span class="od_add_selected_val"></span></td>
                                    <td class="atf_selected_btn">OS:</td>
                                    <td>SPH: <span class="os_sph_selected_val"></span></td>
                                    <td>CYL: <span class="os_cyl_selected_val"></span></td>
                                    <td>AXIS: <span class="os_axis_selected_val"></span></td>
                                    <td>ADD: <span class="os_add_selected_val"></span></td>
                                </tr>
                            </table>                  
                        </div>                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- MY Codes Starts-->

<!-- Vision start-->
<div class="modal fade" id="autofillvisions" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="autofillvisions_title">Auto Fill Visions</h4>
            </div>

            <div class="modal-body pt0 pb0 mdls">                
                <div class="autofillvisions">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Visions</h2>                        
                        </div>
                        
                        <div class="col-md-4">
                              <button id="od_btn_vision" class="btn atf_selected_btn" onclick="select_operation_vision('od')">OD</button>                               
                              <button class="btn" onclick="copy_od_to_os_vision()">Copy OD values to OS</button>                               
                              <button id="os_btn_vision" class="btn"  onclick="select_operation_vision('os')">OS</button>                               
                        </div>
                        <div class="col-md-2">
                              <button class="btn atf_save_btn" onclick="atf_vision_save_btn_click()">Save</button>                               
                              <button class="btn atf_cancel_btn" onclick="atf_vision_close_btn_click()">Close</button>                               
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>    
                                    <th>Distance Presenting</th>
                                    <th>Distance Pinhole</th>
                                    <th>Near Vision</th>
                                    <!--<th>ADD</th>                                    -->
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="od_dp_selected_val od_input" name="" id="">
                                        <input type="text" class="os_dp_selected_val os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_dpp_selected_val od_input" name="" id="">
                                        <input type="text" class="os_dpp_selected_val os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_nv_selected_val od_input" name="" id="">
                                        <input type="text" class="os_nv_selected_val os_input" name="" id="" style="display:none">
                                    </td>
                                </tr>                               
                                <tr>
                                    <td width="">
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>Distance Presenting</lable>
                                            </div>
                                            <div class="atf_sph_p_values atf_value_container">
                                                
												<?php foreach ($optometry_options->distance_presenting as $dkey => $dvalue) {
                                               
													 echo "<span class='atf_v_span' onclick=\"select_value_vision('dp_selected_val','".$dvalue->value."')\">".$dvalue->value."</span>"; 
                                               
                                                } ?>												
                                            </div>                                           
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>Distance Pinhole</lable>                                                
                                            </div>
                                            <div class="atf_cyl_p_values atf_value_container">											
											   <?php 
                                                    foreach ($optometry_options->distance_pinhole as $dkey => $dvalue)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_vision('dpp_selected_val','".$dvalue->value."')\">".$dvalue->value."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>                                            
                                        </div>
                                                  
                                    </td>                                 
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>Near Vision</lable>                                                
                                            </div>
                                            <div class="atf_axis_p_values atf_value_container">
                                                  <?php foreach ($optometry_options->nearvision as $dkey => $dvalue) 
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_vision('nv_selected_val','".$dvalue->value."')\">".$dvalue->value."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>                                            
                                        </div>
                                    </td>                                 
                                                  
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>
                                    <td class="atf_selected_btn">OD:</td>
                                    <td>Distance Presenting: <span class="od_dp_selected_val"></span></td>
                                    <td>Distance Pinhole: <span class="od_dpp_selected_val"></span></td>
                                    <td>Near Vision: <span class="od_nv_selected_val"></span></td>
                                    <td class="atf_selected_btn">OS:</td>
                                    <td>Distance Presenting: <span class="os_dp_selected_val"></span></td>
                                    <td>Distance Pinhole: <span class="os_dpp_selected_val"></span></td>
                                    <td>Near Vision: <span class="os_nv_selected_val"></span></td>                                   
                                </tr>
                            </table>                  
                        </div>                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--vision end-->

<div class="modal fade" id="autofillDryRetnoscopy" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="autofillDryRetnoscopy_title">Auto Fill Dry Retnoscopy</h4>
            </div>

            <div class="modal-body pt0 pb0 mdls">                
                <div class="autofillDryRetnoscopy">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Dry Retnoscopy</h2>                        
                        </div>
                        
                        <div class="col-md-4">
                              <button id="od_btn_dry" class="btn atf_selected_btn" onclick="select_operation_dry('od')">OD</button>                               
                              <button class="btn" onclick="copy_od_to_os_dry()">Copy OD values to OS</button>                               
                              <button id="os_btn_dry" class="btn"  onclick="select_operation_dry('os')">OS</button>                               
                        </div>
                        <div class="col-md-2">
                              <button class="btn atf_save_btn" onclick="atf_dry_save_btn_click()">Save</button>                               
                              <button class="btn atf_cancel_btn" onclick="atf_dry_close_btn_click()">Close</button>                               
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>    
                                    <th>SPH</th>
                                    <th>CYL</th>
                                    <th>AXIS</th>
                                    <!--<th>ADD</th>                                    -->
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="od_sph_selected_val_dry od_input" name="" id="">
                                        <input type="text" class="os_sph_selected_val_dry os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_cyl_selected_val_dry od_input" name="" id="">
                                        <input type="text" class="os_cyl_selected_val_dry os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_axis_selected_val_dry od_input" name="" id="">
                                        <input type="text" class="os_axis_selected_val_dry os_input" name="" id="" style="display:none">
                                    </td>
                                </tr>                               
                                <tr>
                                    <td width="">
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>SPH</lable>
                                                
                                                <span class="pull-right atf_os_span atf_sph_n_span" onclick="show_options_selection_dry('sph','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_sph_p_span atf_selected_btn" onclick="show_options_selection_dry('sph','p','n')">+</span> 
                                            </div>
                                            <div class="atf_sph_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_dry('sph_selected_val_dry','+{$num}')\">+".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_sph_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_dry('sph_selected_val_dry','-{$num}')\">-".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div> 
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>CYL</lable>
                                                <span class="pull-right atf_os_span atf_cyl_n_span" onclick="show_options_selection_dry('cyl','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_cyl_p_span atf_selected_btn" onclick="show_options_selection_dry('cyl','p','n')">+</span> 
                                            </div>
                                            <div class="atf_cyl_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_dry('cyl_selected_val_dry','+{$num}')\">+".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_cyl_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_dry('cyl_selected_val_dry','-{$num}')\">-".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>   
                                        </div>
                                                  
                                    </td>                                 
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>AXIS</lable>                                                
                                            </div>
                                            <div class="atf_axis_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0; $ii <= 180; $ii +=1)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_dry('axis_selected_val_dry','{$ii}°')\">".number_format((float)$ii, 2, '.', '')."°</span>"; 
                                                    }
                                                ?>                                                
                                            </div>                                            
                                        </div>
                                    </td>                                 
                                                  
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>
                                    <td class="atf_selected_btn">OD:</td>
                                    <td>SPH: <span class="od_sph_selected_val_dry"></span></td>
                                    <td>CYL: <span class="od_cyl_selected_val_dry"></span></td>
                                    <td>AXIS: <span class="od_axis_selected_val_dry"></span></td>
                                    <td class="atf_selected_btn">OS:</td>
                                    <td>SPH: <span class="os_sph_selected_val_dry"></span></td>
                                    <td>CYL: <span class="os_cyl_selected_val_dry"></span></td>
                                    <td>AXIS: <span class="os_axis_selected_val_dry"></span></td>                                    
                                </tr>
                            </table>                  
                        </div>                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="autofillacceptance" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="autofillacceptance_title">Auto Fill Acceptance</h4>
            </div>

            <div class="modal-body pt0 pb0 mdls">                
                <div class="autofillacceptance">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Acceptance</h2>                        
                        </div>
                        
                        <div class="col-md-4">
                              <button id="od_btn_acceptance" class="btn atf_selected_btn" onclick="select_operation_acceptance('od')">OD</button>                               
                              <button class="btn" onclick="copy_od_to_os_acceptance()">Copy OD values to OS</button>                               
                              <button id="os_btn_acceptance" class="btn"  onclick="select_operation_acceptance('os')">OS</button>                               
                        </div>
                        <div class="col-md-2">
                              <button class="btn atf_save_btn" onclick="atf_acceptance_save_btn_click()">Save</button>                               
                              <button class="btn atf_cancel_btn" onclick="atf_acceptance_close_btn_click()">Close</button>                               
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>    
                                    <th>SPH</th>
                                    <th>CYL</th>
                                    <th>AXIS</th>
                                    <th>ADD</th>                                    
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="od_sph_selected_val_acceptance od_input" name="" id="">
                                        <input type="text" class="os_sph_selected_val_acceptance os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_cyl_selected_val_acceptance od_input" name="" id="">
                                        <input type="text" class="os_cyl_selected_val_acceptance os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_axis_selected_val_acceptance od_input" name="" id="">
                                        <input type="text" class="os_axis_selected_val_acceptance os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_add_selected_val_acceptance od_input" name="" id="">
                                        <input type="text" class="os_add_selected_val_acceptance os_input" name="" id="" style="display:none">
                                    </td>                                    
                                </tr>                               
                                <tr>
                                    <td width="">
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>SPH</lable>
                                                
                                                <span class="pull-right atf_os_span atf_sph_n_span" onclick="show_options_selection_acceptance('sph','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_sph_p_span atf_selected_btn" onclick="show_options_selection_acceptance('sph','p','n')">+</span> 
                                            </div>
                                            <div class="atf_sph_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_acceptance('sph_selected_val_acceptance','+{$num}')\">+".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_sph_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_acceptance('sph_selected_val_acceptance','-{$num}')\">-".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div> 
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>CYL</lable>
                                                <span class="pull-right atf_os_span atf_cyl_n_span" onclick="show_options_selection_acceptance('cyl','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_cyl_p_span atf_selected_btn" onclick="show_options_selection_acceptance('cyl','p','n')">+</span> 
                                            </div>
                                            <div class="atf_cyl_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_acceptance('cyl_selected_val_acceptance','+{$num}')\">+".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_cyl_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_acceptance('cyl_selected_val_acceptance','-{$num}')\">-".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>   
                                        </div>
                                                  
                                    </td>                                 
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>AXIS</lable>                                                
                                            </div>
                                            <div class="atf_axis_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0; $ii <= 180; $ii +=1)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_acceptance('axis_selected_val_acceptance','{$ii}°')\">".number_format((float)$ii, 2, '.', '')."°</span>"; 
                                                    }
                                                ?>                                                
                                            </div>                                            
                                        </div>
                                    </td>                                 
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>ADD</lable>
                                                <span class="pull-right atf_os_span atf_add_n_span" onclick="show_options_selection_acceptance('add','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_add_p_span atf_selected_btn" onclick="show_options_selection_acceptance('add','p','n')">+</span>
                                                
                                            </div>
                                            <div class="atf_add_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 4; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                        echo "<span class='atf_v_span' onclick=\"select_value_acceptance('add_selected_val_acceptance','+{$num}')\">+".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_add_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 4; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                        echo "<span class='atf_v_span' onclick=\"select_value_acceptance('add_selected_val_acceptance','-{$num}')\">-".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>   
                                        </div>
                                    </td>                        
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>
                                    <td class="atf_selected_btn">OD:</td>
                                    <td>SPH: <span class="od_sph_selected_val_acceptance"></span></td>
                                    <td>CYL: <span class="od_cyl_selected_val_acceptance"></span></td>
                                    <td>AXIS: <span class="od_axis_selected_val_acceptance"></span></td>
                                    <td>ADD: <span class="od_add_selected_val_acceptance"></span></td>
                                    <td class="atf_selected_btn">OS:</td>
                                    <td>SPH: <span class="os_sph_selected_val_acceptance"></span></td>
                                    <td>CYL: <span class="os_cyl_selected_val_acceptance"></span></td>
                                    <td>AXIS: <span class="os_axis_selected_val_acceptance"></span></td>
                                    <td>ADD: <span class="os_add_selected_val_acceptance"></span></td>
                                </tr>
                            </table>                  
                        </div>                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<div class="modal fade" id="autofillcyclo" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="autofillcyclo_title">Auto Fill Cyclo</h4>
            </div>

            <div class="modal-body pt0 pb0 mdls">                
                <div class="autofillcyclo">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Cyclo</h2>                        
                        </div>
                        
                        <div class="col-md-4">
                              <button id="od_btn_cyclo" class="btn atf_selected_btn" onclick="select_operation_cyclo('od')">OD</button>                               
                              <button class="btn" onclick="copy_od_to_os_cyclo()">Copy OD values to OS</button>                               
                              <button id="os_btn_cyclo" class="btn"  onclick="select_operation_cyclo('os')">OS</button>                               
                        </div>
                        <div class="col-md-2">
                              <button class="btn atf_save_btn" onclick="atf_cyclo_save_btn_click()">Save</button>                               
                              <button class="btn atf_cancel_btn" onclick="atf_cyclo_close_btn_click()">Close</button>                               
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>    
                                    <th>SPH</th>
                                    <th>CYL</th>
                                    <th>AXIS</th>
                                    <!--<th>ADD</th>                                    -->
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="od_sph_selected_val_cyclo od_input" name="" id="">
                                        <input type="text" class="os_sph_selected_val_cyclo os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_cyl_selected_val_cyclo od_input" name="" id="">
                                        <input type="text" class="os_cyl_selected_val_cyclo os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_axis_selected_val_cyclo od_input" name="" id="">
                                        <input type="text" class="os_axis_selected_val_cyclo os_input" name="" id="" style="display:none">
                                    </td>
                                  
                                </tr>                               
                                <tr>
                                    <td width="">
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>SPH</lable>
                                                
                                                <span class="pull-right atf_os_span atf_sph_n_span" onclick="show_options_selection_cyclo('sph','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_sph_p_span atf_selected_btn" onclick="show_options_selection_cyclo('sph','p','n')">+</span> 
                                            </div>
                                            <div class="atf_sph_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_cyclo('sph_selected_val_cyclo','+{$num}')\">+".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_sph_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_cyclo('sph_selected_val_cyclo','-{$num}')\">-".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div> 
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>CYL</lable>
                                                <span class="pull-right atf_os_span atf_cyl_n_span" onclick="show_options_selection_cyclo('cyl','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_cyl_p_span atf_selected_btn" onclick="show_options_selection_cyclo('cyl','p','n')">+</span> 
                                            </div>
                                            <div class="atf_cyl_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_cyclo('cyl_selected_val_cyclo','+{$num}')\">+".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_cyl_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_cyclo('cyl_selected_val_cyclo','-{$num}')\">-".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>   
                                        </div>
                                                  
                                    </td>                                 
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>AXIS</lable>                                                
                                            </div>
                                            <div class="atf_axis_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0; $ii <= 180; $ii +=1)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_cyclo('axis_selected_val_cyclo','{$ii}°')\">".number_format((float)$ii, 2, '.', '')."°</span>"; 
                                                    }
                                                ?>                                                
                                            </div>                                            
                                        </div>
                                    </td>                                 
                                      
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>
                                    <td class="atf_selected_btn">OD:</td>
                                    <td>SPH: <span class="od_sph_selected_val_cyclo"></span></td>
                                    <td>CYL: <span class="od_cyl_selected_val_cyclo"></span></td>
                                    <td>AXIS: <span class="od_axis_selected_val_cyclo"></span></td>
                                    <td class="atf_selected_btn">OS:</td>
                                    <td>SPH: <span class="os_sph_selected_val_cyclo"></span></td>
                                    <td>CYL: <span class="os_cyl_selected_val_cyclo"></span></td>
                                    <td>AXIS: <span class="os_axis_selected_val_cyclo"></span></td>                                    
                                </tr>
                            </table>                  
                        </div>                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--LCVA modal-->

<div class="modal fade" id="autofilllcva" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="autofillcyclo_title">Auto Fill LCVA</h4>
            </div>

            <div class="modal-body pt0 pb0 mdls">                
                <div class="autofilllcva">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>LCVA</h2>                        
                        </div>
                        
                        <div class="col-md-4">
                              <button id="od_btn_lcva" class="btn atf_selected_btn" onclick="select_operation_lcva('od')">OD</button>                               
                              <button class="btn" onclick="copy_od_to_os_lcva()">Copy OD values to OS</button>                               
                              <button id="os_btn_lcva" class="btn"  onclick="select_operation_lcva('os')">OS</button>                               
                        </div>
                        <div class="col-md-2">
                              <button class="btn atf_save_btn" onclick="atf_lcva_save_btn_click()">Save</button>                               
                              <button class="btn atf_cancel_btn" onclick="atf_lcva_close_btn_click()">Close</button>                               
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>    
                                    <th>SPH</th>
                                    <th>CYL</th>
                                    <th>AXIS</th>
                                    <!--<th>ADD</th>                                    -->
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="od_sph_selected_val_lcva od_input" name="" id="">
                                        <input type="text" class="os_sph_selected_val_lcva os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_cyl_selected_val_lcva od_input" name="" id="">
                                        <input type="text" class="os_cyl_selected_val_lcva os_input" name="" id="" style="display:none">
                                    </td>
                                    <td>
                                        <input type="text" class="od_axis_selected_val_lcva od_input" name="" id="">
                                        <input type="text" class="os_axis_selected_val_lcva os_input" name="" id="" style="display:none">
                                    </td>
                                  
                                </tr>                               
                                <tr>
                                    <td width="">
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>SPH</lable>
                                                
                                                <span class="pull-right atf_os_span atf_sph_n_span" onclick="show_options_selection_lcva('sph','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_sph_p_span atf_selected_btn" onclick="show_options_selection_lcva('sph','p','n')">+</span> 
                                            </div>
                                            <div class="atf_sph_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_lcva('sph_selected_val_lcva','+{$num}')\">+".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_sph_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_lcva('sph_selected_val_lcva','-{$num}')\">-".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div> 
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>CYL</lable>
                                                <span class="pull-right atf_os_span atf_cyl_n_span" onclick="show_options_selection_cyclo('cyl','n','p')">-</span> 
                                                <span class="pull-right atf_od_span atf_cyl_p_span atf_selected_btn" onclick="show_options_selection_cyclo('cyl','p','n')">+</span> 
                                            </div>
                                            <div class="atf_cyl_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_lcva('cyl_selected_val_lcva','+{$num}')\">+".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_cyl_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                        $num = number_format((float)$ii, 2, '.', '');
                                                    echo "<span class='atf_v_span' onclick=\"select_value_lcva('cyl_selected_val_lcva','-{$num}')\">-".$num."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>   
                                        </div>
                                                  
                                    </td>                                 
                                    <td>
                                        <div class="atf_container">
                                            <div class="atf_sph_p_title">
                                                <lable>AXIS</lable>                                                
                                            </div>
                                            <div class="atf_axis_p_values atf_value_container">
                                                <?php 
                                                    for($ii=0; $ii <= 180; $ii +=1)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_lcva('axis_selected_val_lcva','{$ii}°')\">".number_format((float)$ii, 2, '.', '')."°</span>"; 
                                                    }
                                                ?>                                                
                                            </div>                                            
                                        </div>
                                    </td>                                 
                                      
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered table-stripeds">
                                <tr>
                                    <td class="atf_selected_btn">OD:</td>
                                    <td>SPH: <span class="od_sph_selected_val_lcva"></span></td>
                                    <td>CYL: <span class="od_cyl_selected_val_lcva"></span></td>
                                    <td>AXIS: <span class="od_axis_selected_val_lcva"></span></td>
                                    <td class="atf_selected_btn">OS:</td>
                                    <td>SPH: <span class="os_sph_selected_val_lcva"></span></td>
                                    <td>CYL: <span class="os_cyl_selected_val_lcva"></span></td>
                                    <td>AXIS: <span class="os_axis_selected_val_lcva"></span></td>                                    
                                </tr>
                            </table>                  
                        </div>                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div








<!-- Optometry show -->

<!-- Upload Visit Files  -->

<style type="text/css">
    .files {
        /* outline: 2px dashed #424242;
         outline-offset: -10px;*/
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        padding: 0px 0px 0px 0;
        text-align: center !important;
        margin: 0;
        font-size: 1.2em;
        width: 100% !important;
    }

    .files label {
        display: block;
    }

    .files input:focus {
        /*outline: 2px dashed #92b0b3;  outline-offset: -10px;*/
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        border: 1px solid #92b0b3;
    }

    .files {
        position: relative;
        background-color: rgb(245, 245, 245);
        border: 1px solid rgba(0, 0, 0, 0.06);
    }

    .files:after {
        pointer-events: none;
        position: absolute;
        top: 14px;
        left: 20px;
        color: #767676;
        font-size: 36px;
        font-family: 'FontAwesome';
        display: block;
        margin: 0 auto;
        background-size: 100%;
        background-repeat: no-repeat;
    }

    .color input {
        background-color: #f1f1f1;
    }

    .files:before {
        position: absolute;
        bottom: 27px;
        left: 0;
        pointer-events: none;
        width: 100%;
        right: 0;
        /* height: 90px; */
        content: "Choose a file or drag it here.";
        display: block;
        margin: 0 auto;
        color: #767676;

        text-align: center;
        transition: .3s;
    }

    .files:hover:before {
        color: #faa21c;
    }

    .files input[type=file] {
        opacity: 0;
        cursor: pointer;
        height: 70px;
    }

    .modal-lg {
        width: 1100px;
    }

    @media (max-width:767px) {
        .modal-lg {
            width: 100%;
        }
    }

    .visitImages {
        padding: 5px;
        border: 1px solid grey;
        margin: 5px 5px;
    }

    .visitImages img {
        height: 150px;
        width: 100%;
    }
    table .bdr{
         border: 1px solid #05386B !important;
    }
    table .bdr th{
        border: 1px solid #05386B !important;
    }
     table.bdr td{
        border: 1px solid #05386B !important;
    }
</style>



<!-- Previous Data View Modal-->


<div class="modal fade" id="prev_visit_modal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="prev_visit_title">Prev Visit Title</h4>
            </div>

            <div class="modal-body">                
                    <div class="row prev_visit">
                    <table class="table table-bordered bdr"><tbody><tr><th colspan="3">Distance Vision</th><th colspan="2">Near Vision</th></tr><tr><td>&nbsp;</td><td>Presenting</td><td>Pinhole</td><td>Presenting</td></tr><tr><td>OD</td><td>1/60</td><td>6/60</td><td colspan="2">N-36</td></tr><tr><td>OS</td><td>1/60</td><td>6/60</td><td colspan="2">N-36</td></tr></tbody></table>
                    </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="UploadVisitFilesModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="optometry_title">Upload Files</h4>
            </div>
            <div class="modal-body ">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="mailbox-controls">
                                <form method="post" action="#" id="fileupload">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('upload_your_file'); ?></label>
                                        <div class="files">
                                            <input type="file" name="visitfiles[]" class="form-control" id="visitfiles" data-opd="" multiple="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--./col-md-6-->
                        <div class="col-md-6 col-sm-6">

                        </div>
                    </div>
                    <div id="mediaDiv">
                        <div class="row">

                        </div>
                    </div>
                </div>
                <!--./box-body-->

            </div>
        </div>
    </div>
</div>

<!-- Upload Visit Files -->


<!-- View Visit File  -->
<div class="modal fade" id="viewVisitFiles" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-md" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                &nbsp;
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <div class="visitFile" style="text-align:-webkit-center">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- View Visit File  -->


<!-- Add Disease  -->
<div class="modal fade" id="add_disease" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-sm" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="optometry_title">Add Disease</h4>
            </div>
            <div class="modal-body pt0 pb0">
                <form id="add_disease_form" class="" method="post">
                    <div class="form-group">
                        <label for="disease_name">Tx/Sx</label>
                        <input type="text" class="form-control disease_name" id="disease_name" name="disease_name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Disease  -->

<!-- Add Complaint  -->
<div class="modal fade" id="add_complaint" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-sm" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="optometry_title">Add Complaint</h4>
            </div>
            <div class="modal-body pt0 pb0">
                <form id="add_complaint_form" class="" method="post">
                    <div class="form-group">
                        <label for="disease_name">Complaint Name:</label>
                        <input type="text" class="form-control complaint_name" id="complaint_name" name="complaint_name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Complaint  -->

<!----modal starts here--->
<!-- <div id="tutorialsplaneModal" class="modal fade" role='dialog'>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title">Cornea</h4>
            </div>
            <div class="modal-body">
                         <img src="<?php echo site_url('uploads/popup/cornea.jpeg') ?>" style="width:50%;height:50%;">       
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
  </div> -->
<!--Modal ends here--->
<script>
    $(document).ready(function() {

        $('#form_optometry').on('submit', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var formdata = new FormData(this);
            //formdata.append('odcomplaints', JSON.stringify(od_complaints));
            //formdata.append('oscomplaints', JSON.stringify(os_complaints));
            //formdata.append('generalcomplaints', JSON.stringify(general_complaints));
            //formdata.append('selected_complaints', JSON.stringify(selected_complaints));
            $.ajax({
                url: baseurl + "admin/optometry/addOptimetryData",
                type: 'POST',
                data: formdata,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    //alert(data.msg);
                    var id = "<?php echo $this->uri->segment(4); ?>";
                    initDatatable('ajaxlistvisit', 'admin/patient/getopdvisitdatatable/' + id);
                    initDatatable('ajaxlist','admin/optometry/getOptometryPatientsDataTable',[],[],100);
                    $('#add_optometry').modal('toggle');
                    $("#form_optometry")[0].reset();
                    if (data.flag == 1) {
                        successMsg(data.msg);
                    } else {
                        errorMsg(data.msg);
                    }
                    
                }

            })
            

        })

         $(document).on('click', '.addnewdiagnosis', function(e) {
            e.preventDefault();
            var strR = randomStr();
            var html = '<div class="row ' + strR + '">';
            html += '<div class="col-md-6"><div class="form-group"><label for=" ">Diagnosis</label><div><textarea name="diagnosis_od[]" id="diagnosis_od" class="form-control  diagnosis_od" style="width:100%"></textarea></div></div></div>';
            // html += '</div></div></div>';
            html += '<div class="col-md-2"><div class="form-group"><label for=" ">Stage</label><div><select name="diagnosis_fin_pro[]" id="diagnosis_fin_pro" class="form-control select2 diagnosis_fin_pro" style="width:100%"><option value=""></option><option value="Final">Final</option><option value="Provisional">Provisional</option></select></div></div></div>';
            html += '<div class="col-md-2"><div class="form-group"><label for=" ">Eye Type</label><div><select name="diagnosis_od_os[]" id="diagnosis_od_os" class="form-control select2 diagnosis_od_os" style="width:100%"><option value=""></option><option value="OD">OD</option><option value="OS">OS</option><option value="Both">Both</option></select></div></div></div>';
            var deleteD = "deleteDiagnosis('" + strR + "')";
            html += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteD + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
            html += '</div>';
            $('.diagnosis_container').append(html);
        });


        $(document).on('click', '.addnewhistory', function(e) {
            e.preventDefault();
            var strR = randomStr();
            var html = '<div class="row ' + strR + '">';
            html += '<div class="col-md-3"><div class="form-group"><label for=" ">Tx/Sx</label><div><select name="disease[]" id="disease" class="form-control select2 disease" style="width:100%"><option value=""><?php echo $this->lang->line('select'); ?></option><?php foreach ($disease_data as $dkey => $dvalue) { ?><option value="<?php echo $dvalue->master_key; ?>"><?php echo $dvalue->master_value; ?></option><?php } ?></select></div></div></div>';
            html += '<div class="col-md-3"><div class="row"><div class="col-md-6"><div class="form-group"><label for="">Duration</label><select class="form-control duration" name="duration[]" id="duration" style="width:100%"><option value="">select</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8"> 8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select></div></div><div class="col-md-6"><div class="form-group"><label for="">Period</label><select name="period[]" id="period" class="form-control select2 period" style="width:100%"><option value="Days">Days</option><option value="Months">Months</option>';
            html += '<option value="Years">Years<option></select></div></div></div></div>';
           
            var deleteH = "deleteHistory('" + strR + "')";
            html += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteH + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
            html += '</div>';
            $('.history_container').append(html);
        });
        
                $(document).on('click', '.addnewcomplaints', function(e) {
                  
            e.preventDefault();
            var strR = randomStr();
            var html = '<div class="row ' + strR + '">';
            html += '<div class="col-md-3"><div class="form-group"><label for=" ">Complaints</label><div><select name="complaints[]" id="complaints" class="form-control select2 complaints" style="width:100%"><option value="">Select Complaints</option><?php foreach ($complaints_data as $dkey => $dvalue) { ?><option value="<?php echo $dvalue->master_key; ?>"><?php echo $dvalue->master_value; ?></option><?php } ?></select></div></div></div>';
            
            html += '<div class="col-md-6"><div class="row"><div class="col-md-3"><div class="form-group"><label for="">Duration</label><select class="form-control duration" name="complaints_duration[]" id="complaints_duration" style="width:100%"><option value="">select</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8"> 8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select></div></div><div class="col-md-3"><div class="form-group"><label for="">Period</label><select name="complaints_period[]" id="period" class="form-control select2 period" style="width:100%"><option value="Days">Days</option><option value="Months">Months</option>      <option value="Years">Years</option></select></div></div><div class="col-md-3"><div class="form-group"><label for="">Eye</label><select name="complaints_type[]" id="complaints_type" class="form-control  complaints_type" style="width:100%"><option value="od">OD</option><option value="os">OS</option><option value="general">General</option><option value="both">Both</option></select></div></div></div></div>';
            
            var deleteH = "deleteHistory('" + strR + "')";
            html += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteH + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
            html += '</div>';
            $('.complaints_container').append(html);
        });


        $(document).on('click', '.editOptometry', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: baseurl + "admin/optometry/getOptimetryData/" + id,
                type: 'POST',
                data: {},
                contentType: "application/json; charset=utf-8",
                dataType: 'json',
                success: function(data) {
                 
                    resetForm('form_optometry');
                    var result = data.data;
                    var patient_data = result.patient_data;
                    var pgp = result.pgp_data;
                    var lac = result.lac_data;
                    //   console.log(result);
                    var gon = result.gon_data;
                    var ocu = result.ocu_data;
                    var vision = result.vision_data;
                    var dryretinoscopy = result.dryretinoscopy_data;
                    var cyclo = result.cyclo_data;
                    var acceptance = result.acceptance_data;
                    var antsegment = result.antsegment_data;
                    var nct = result.nct_data;
                    var at = result.at_data;
                    var cvt = result.cvt_data;
                    var lcva = result.lcva_data;
                    var ker = result.ker_data;
                    var sch = result.sch_data;
                     var top = result.top_data;
                    var pac = result.pac_data;
                    var eye = result.eye_data;
                    var sta = result.sta_data;
                    var gaz = result.gaz_data;
                    var eyes = result.eyes_data;
                    var postsegment = result.postsegment_data;
                    var diagnosis_data = result.diagnosis_data;
                    var history_data = result.history_data;
                    var complaints_data = result.complaints_data;

                    var optometric_comments = result.optometric_comments;
                    var orbit = result.orbit;
                    var inv = result.inv;
                    var pre = result.pre;
                    var complaints_data = result.complaints_data;
                    var data = [pgp,lac,gon,ocu, vision, dryretinoscopy, cyclo, acceptance, antsegment, nct, at, cvt, lcva,ker, sch,top,pac, eye, sta, gaz, eyes, postsegment];
                    // $('.complaints').css("display","none");
                    $('#view_optometry').modal('toggle');
                    $('#add_optometry').modal('toggle');
                    $('#patient_id').val(result.patient_id);
                    $('#optometry_id').val(result.id);
                    $('#opd_id').val(result.opd_id);
                    // getComplaintData();
                    //added by chitranjan
                    var key = 0;
                    
                    $('#patient_name').html(patient_data.patient_name);
                    $('#age').html(patient_data.age);
                    $('#gender').html(patient_data.gender);


                     var html = "";
                    //  console.log(patient_data);
                         $.each(complaints_data, function(key, value) {
                            //   console.log("complaints_data ="+value.complaints);
                        if (key == 0) {
                            html += '<div class="row">';
                        } else {
                            html += '<div class="row row_' + key + '">';
                        }
                        html += '<div class="col-md-3"><div class="form-group"><label for=" ">Complaints</label><div><select name="complaints[]" id="complaints" class="form-control select2 complaints" style="width:100%"><option value=""><?php echo $this->lang->line('select'); ?></option>';
                        <?php foreach ($complaints_data as $dkey => $dvalue) { 
                            
                            ?>
                            
                            
                            if (value.complaints == "<?php echo $dvalue->master_value; ?>") {
                                html += '<option selected value="<?php echo $dvalue->master_value; ?>"><?php echo $dvalue->master_value; ?></option>';
                            } else {
                                html += '<option  value="<?php echo $dvalue->master_value; ?>"><?php echo $dvalue->master_value; ?></option>';
                            }
                        <?php } ?>
                        html += '</select></div></div></div>';
                        html += '<div class="col-md-3"><div class="row"><div class="col-md-6"><div class="form-group"><label for="">Duration</label><select name="complaints_duration[]" id="duration" class="form-control select2 duration" style="width:100%">';
  if (value.complaints_duration == "Select") {
  html += '<option selected value="Select">Select</option>';
} else {
  html += '<option value="Select">Select</option>';
}
if (value.complaints_duration == "1") {
  html += '<option selected value="1">1</option>';
} else {
  html += '<option value="1">1</option>';
}
if (value.complaints_duration == "2") {
  html += '<option selected value="2">2</option>';
} else {
  html += '<option value="2">2</option>';
}
if (value.complaints_duration == "3") {
  html += '<option selected value="3">3</option>';
} else {
  html += '<option value="3">3</option>';
}
if (value.complaints_duration == "4") {
  html += '<option selected value="4">4</option>';
} else {
  html += '<option value="4">4</option>';
}
if (value.complaints_duration == "5") {
  html += '<option selected value="5">5</option>';
} else {
  html += '<option value="5">5</option>';
}
if (value.complaints_duration == "6") {
  html += '<option selected value="6">6</option>';
} else {
  html += '<option value="6">6</option>';
}
if (value.complaints_duration == "7") {
  html += '<option selected value="7">7</option>';
} else {
  html += '<option value="7">7</option>';
}
if (value.complaints_duration == "8") {
  html += '<option selected value="8">8</option>';
} else {
  html += '<option value="8">8</option>';
}
if (value.complaints_duration == "9") {
  html += '<option selected value="9">9</option>';
} else {
  html += '<option value="9">9</option>';
}
if (value.complaints_duration == "10") {
  html += '<option selected value="10">10</option>';
} else {
  html += '<option value="10">10</option>';
}
if (value.complaints_duration == "11") {
  html += '<option selected value="11">11</option>';
} else {
  html += '<option value="11">11</option>';
}
if (value.complaints_duration == "12") {
  html += '<option selected value="12">12</option>';
} else {
  html += '<option value="12">12</option>';
}
if (value.complaints_duration == "13") {
  html += '<option selected value="13">13</option>';
} else {
  html += '<option value="13">13</option>';
}
if (value.complaints_duration == "14") {
  html += '<option selected value="14">14</option>';
} else {
  html += '<option value="14">14</option>';
}
if (value.complaints_duration == "15") {
  html += '<option selected value="15">15</option>';
} else {
  html += '<option value="15">15</option>';
}
if (value.complaints_duration == "16") {
  html += '<option selected value="16">16</option>';
} else {
  html += '<option value="16">16</option>';
}
if (value.complaints_duration == "17") {
  html += '<option selected value="17">17</option>';
} else {
  html += '<option value="17">17</option>';
}
if (value.complaints_duration == "18") {
  html += '<option selected value="18">18</option>';
} else {
  html += '<option value="18">18</option>';
}
if (value.complaints_duration == "19") {
  html += '<option selected value="19">19</option>';
} else {
  html += '<option value="19">19</option>';
}
if (value.complaints_duration == "20") {
  html += '<option selected value="20">20</option>';
} else {
  html += '<option value="20">20</option>';
}

                        html += '</select></div></div><div class="col-md-6"><div class="form-group"><label for="">Period</label><select name="complaints_period[]" id="period" class="form-control select2 period" style="width:100%">';
                        if (value.complaints_period == "Days") {
                            html += '<option selected value="Days">Days</option>';
                        } else {
                            html += '<option value="Days">Days</option>';
                        }
                        if (value.complaints_period == "Months") {
                            html += '<option selected value="Months">Months</option>';
                        } else {
                            html += '<option value="Months">Months</option>';
                        }
                        if (value.complaints_period == "Years") {
                            html += '<option selected value="Years">Years</option>';
                        } else {
                            html += '<option value="Years">Years</option>';
                        }
                        html += '</select></div></div></div></div>';
                         html += '<div class="col-md-2"><div class="form-group"><label for=" ">Eye</label><div><select name="complaints_type[]" id="complaints_type" class="form-control select2 complaints_type" style="width:100%">';
                            if (value.complaints_type == "Select") {
                            html += '<option selected value="Select">Select</option>';
                        } else {
                            html += '<option value="Select">Select</option>';
                        }
                        if (value.complaints_type == "OD") {
                            html += '<option selected value="OD">OD</option>';
                        } else {
                            html += '<option value="OD">OD</option>';
                        }
                        if (value.complaints_type == "OS") {
                            html += '<option selected value="OS">OS</option>';
                        } else {
                            html += '<option value="OS">OS</option>';
                        }
                         if (value.complaints_type == "general") {
                            html += '<option selected value="general">General</option>';
                        } else {
                            html += '<option value="general">General</option>';
                        }
                        if (value.complaints_type == "both") {
                            html += '<option selected value="both">Both</option>';
                        } else {
                            html += '<option value="both">Both</option>';
                        }
                        html += '</select></div></div></div>';
                        
                            var deleteRow = "deleteHistory('row_" + key + "')";
                            html += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteRow + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
                       
                        html += '</div>';
                        key++;
                    })
                    $('.complaints_container').html(html);

                     
                        var html = "";
                     
                     
                    $.each(history_data, function(key, value) {
                        // console.log("history_data ="+value.disease);
                        if (key == 0) {
                            html += '<div class="row">';
                        } else {
                            html += '<div class="row row_' + key + '">';
                        }
                        html += '<div class="col-md-3"><div class="form-group"><label for=" ">Disease</label><div><select name="disease[]" id="disease" class="form-control select2 disease" style="width:100%"><option value=""><?php echo $this->lang->line('select'); ?></option>';
                        <?php foreach ($disease_data as $dkey => $dvalue) { ?>
                            if (value.disease == "<?php echo $dvalue->master_value; ?>") {
                                html += '<option selected value="<?php echo $dvalue->master_value; ?>"><?php echo $dvalue->master_value; ?></option>';
                            } else {
                                html += '<option  value="<?php echo $dvalue->master_value; ?>"><?php echo $dvalue->master_value; ?></option>';
                            }
                        <?php } ?>
                        html += '</select></div></div></div>';
                        html += '<div class="col-md-3"><div class="row"><div class="col-md-6"><div class="form-group"><label for="">Duration</label><select name="duration[]" id="duration" class="form-control select2 duration" style="width:100%">';if (value.duration == "Select") {
  html += '<option selected value="Select">Select</option>';
} else {
  html += '<option value="Select">Select</option>';
}
if (value.duration == "1") {
  html += '<option selected value="1">1</option>';
} else {
  html += '<option value="1">1</option>';
}
if (value.duration == "2") {
  html += '<option selected value="2">2</option>';
} else {
  html += '<option value="2">2</option>';
}
if (value.duration == "3") {
  html += '<option selected value="3">3</option>';
} else {
  html += '<option value="3">3</option>';
}
if (value.duration == "4") {
  html += '<option selected value="4">4</option>';
} else {
  html += '<option value="4">4</option>';
}
if (value.duration == "5") {
  html += '<option selected value="5">5</option>';
} else {
  html += '<option value="5">5</option>';
}
if (value.duration == "6") {
  html += '<option selected value="6">6</option>';
} else {
  html += '<option value="6">6</option>';
}
if (value.duration == "7") {
  html += '<option selected value="7">7</option>';
} else {
  html += '<option value="7">7</option>';
}
if (value.duration == "8") {
  html += '<option selected value="8">8</option>';
} else {
  html += '<option value="8">8</option>';
}
if (value.duration == "9") {
  html += '<option selected value="9">9</option>';
} else {
  html += '<option value="9">9</option>';
}
if (value.duration == "10") {
  html += '<option selected value="10">10</option>';
} else {
  html += '<option value="10">10</option>';
}
if (value.duration == "11") {
  html += '<option selected value="11">11</option>';
} else {
  html += '<option value="11">11</option>';
}
if (value.duration == "12") {
  html += '<option selected value="12">12</option>';
} else {
  html += '<option value="12">12</option>';
}
if (value.duration == "13") {
  html += '<option selected value="13">13</option>';
} else {
  html += '<option value="13">13</option>';
}
if (value.duration == "14") {
  html += '<option selected value="14">14</option>';
} else {
  html += '<option value="14">14</option>';
}
if (value.duration == "15") {
  html += '<option selected value="15">15</option>';
} else {
  html += '<option value="15">15</option>';
}
if (value.duration == "16") {
  html += '<option selected value="16">16</option>';
} else {
  html += '<option value="16">16</option>';
}
if (value.duration == "17") {
  html += '<option selected value="17">17</option>';
} else {
  html += '<option value="17">17</option>';
}
if (value.duration == "18") {
  html += '<option selected value="18">18</option>';
} else {
  html += '<option value="18">18</option>';
}
if (value.duration == "19") {
  html += '<option selected value="19">19</option>';
} else {
  html += '<option value="19">19</option>';
}
if (value.duration == "20") {
  html += '<option selected value="20">20</option>';
} else {
  html += '<option value="20">20</option>';
}

                        
                         html += '</select></div></div><div class="col-md-6"><div class="form-group"><label for="">Period</label><select name="period[]" id="period" class="form-control select2 period" style="width:100%">';
                        if (value.period == "Days") {
                            html += '<option selected value="Days">Days</option>';
                        } else {
                            html += '<option value="Days">Days</option>';
                        }
                        if (value.period == "Months") {
                            html += '<option selected value="Months">Months</option>';
                        } else {
                            html += '<option value="Months">Months</option>';
                        }
                        if (value.period == "Years") {
                            html += '<option selected value="Years">Years</option>';
                        } else {
                            html += '<option value="Years">Years</option>';
                        }
                        html += '</select></div></div></div></div>';
                        
                            var deleteRow = "deleteHistory('row_" + key + "')";
                            html += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteRow + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
                       
                        html += '</div>';
                        key++;
                    })
                    $('.history_container').html(html);


                    // Diagnosis

                    var html = "";
                    $.each(diagnosis_data, function(key, value) {
                        if (key == 0) {
                            html += '<div class="row">';
                        } else {
                            html += '<div class="row row_' + key + '">';
                        }
                //         $.each(diagnosis_data, function(key, val) {
                //     html += '<tr><td>' + val.diagnosis_od + '</td><td>' + val.diagnosis_fin_pro +'</td><td>' + val.diagnosis_od_os + '</td></tr>';
                // })
                        html += '<div class="col-md-6"><div class="form-group"><label for=" ">Diagnosis</label><textarea name="diagnosis_od[]" id="diagnosis_od" class="form-control  diagnosis_od" style="width:100%">'+value.diagnosis_od+'</textarea>';
                        html += '</div></div>';
                        html += '<div class="col-md-2"><div class="form-group"><label for=" ">Stage</label><div><select name="diagnosis_fin_pro[]" id="diagnosis_fin_pro" class="form-control select2 diagnosis_fin_pro" style="width:100%">';
                        if (value.diagnosis_fin_pro == "Select") {
                            html += '<option selected value="Select">Select</option>';
                        } else {
                            html += '<option value="Select">Select</option>';
                        }
                        if (value.diagnosis_fin_pro == "Final") {
                            html += '<option selected value="Final">Final</option>';
                        } else {
                            html += '<option value="Final">Final</option>';
                        }
                        if (value.diagnosis_fin_pro == "Provisonal") {
                            html += '<option selected value="Provisonal">Provisonal</option>';
                        } else {
                            html += '<option value="Provisonal">Provisonal</option>';
                        }
                       
                        html += '</select></div></div></div>';
                        html += '<div class="col-md-2"><div class="form-group"><label for=" ">Eye Type</label><div><select name="diagnosis_od_os[]" id="diagnosis_od_os" class="form-control select2 diagnosis_od_os" style="width:100%">';
                        if (value.diagnosis_od_os == "Select") {
                            html += '<option selected value="Select">Select</option>';
                        } else {
                            html += '<option value="Select">Select</option>';
                        }
                        if (value.diagnosis_od_os == "OD") {
                            html += '<option selected value="OD">OD</option>';
                        } else {
                            html += '<option value="OD">OD</option>';
                        }
                        if (value.diagnosis_od_os == "OS") {
                            html += '<option selected value="OS">OS</option>';
                        } else {
                            html += '<option value="OS">OS</option>';
                        }
                        if (value.diagnosis_od_os == "Both") {
                            html += '<option selected value="Both">Both</option>';
                        } else {
                            html += '<option value="Both">Both</option>';
                        }
                        html += '</select></div></div></div>';
                
                        var deleteRow = "deleteDiagnosis('row_" + key + "')";
                        html += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteRow + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
                        
                        html += '</div>';
                        key++;
                    })
                    $('.diagnosis_container').html(html);
                    
                    $('.optometric_comments').empty().val(optometric_comments);
                    $('.orbit').empty().val(orbit);
                    $('.inv').empty().val(inv);
                    $('.pre').empty().val(pre);
                    $('.complaints_data').empty().val(complaints_data);
                    $.each(data, function(key, value) {
                        if(value != null  )
                        {
                            $.each(value, function(k, val) {
                            var tag = $("#" + k).get(0).tagName;
                            if (tag == "INPUT") {
                                $('#' + k).val(val);
                            } else if (tag == "SELECT") {
                                $('#' + k).select2().select2('val', val);
                            } else {
                                $('#' + k).val(val);
                            }
                        }) 
                        }
                       
                    })

                }
            })

        })


        // $(document).on("keyup", '#compalint_search', function(e) {
        //     e.preventDefault();
        //     var search = $('#compalint_search').val();
        //     getComplaintData(search);
        // })

        getDiseaseData();
        getComplaintData();
        $(document).on('click', '.add_disease', function(e) {
            $('#add_disease').modal('toggle');
            resetForm('add_disease_form');
        });
        $(document).on('click', '.add_complaint', function(e) {
            $('#add_complaint').modal('toggle');
            resetForm('add_complaint_form');

        });

        $(document).on('submit', '#add_disease_form', function(e) {
            var disease = $('#disease_name').val();
            e.preventDefault();
            e.stopPropagation();
            if ($.trim(disease) == "") {
                errorMsg("Disease Name Field is Required");
                return false;
            }
            $.ajax({
                url: baseurl + "admin/optometry/add_master_data",
                type: 'POST',
                data: {
                    'master_value': disease,
                    'type': 'disease'
                },
                dataType: 'json',
                success: function(data) {
                    if (data.flag == 1) {
                        successMsg(data.msg);
                        $('#add_disease').modal('toggle');
                        getDiseaseData();
                        // location.reload();

                    }
                }
            })
        })


        $(document).on('submit', '#add_complaint_form', function(e) {
            var complaint = $('#complaint_name').val();
            e.preventDefault();
            e.stopPropagation();
            if ($.trim(complaint) == "") {
                errorMsg("Complaint Name Field is Required");
                return false;
            }
            $.ajax({
                url: baseurl + "admin/optometry/add_master_data",
                type: 'POST',
                data: {
                    'master_value': complaint,
                    'type': 'complaint'
                },
                dataType: 'json',
                success: function(data) {
                    if (data.flag == 1) {
                        successMsg(data.msg);
                        $('#add_complaint').modal('toggle');
                        getComplaintData();
                    }
                }
            })

        })


        $(document).on('click', '.btnUploadVisitImages', function(e) {
            e.preventDefault();
            var opd = $(this).data('opd');
            $('#visitfiles').attr('data-opd', opd);
            $('#UploadVisitFilesModal').modal('toggle');
            load(opd);
        })


        $("#visitfiles").change(function(e) {
            var opd = $(this).data('opd');
            var fd = new FormData();
            var fileInput = document.getElementById('visitfiles');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.mp4|\.mov|\.flv|\.wmv|\.avi|\.mpg|\.mpeg|\.rm|\.ram|\.swf|\.ogg|\.webm|\.mkv|\.wav|\.mp3|\.aac)$/i;
            if (allowedExtensions.exec(filePath)) {
                errorMsg('File Type not allowed');
                fileInput.value = '';
                return false;
            }
            var ins = fileInput.files.length;
            for (var x = 0; x < ins; x++) {
                fd.append("visitfiles[]", document.getElementById('visitfiles').files[x]);
            }
            fd.append('opd_id', opd);
            uploadData(fd, opd);
        });



        $(document).on('click', '.delete_visit_image', function() {
            var $this = $('.btn_delete');

            var record_id = $(this).data('record_id');
            var opd = $(this).data('opd');
            if (confirm('Do you really want to delete this file')) {

                $.ajax({
                    url: "<?php echo base_url('admin/optometry/deleteImage') ?>",
                    type: "POST",
                    data: {
                        'record_id': record_id,
                        'opd_id': opd
                    },
                    dataType: 'Json',
                    beforeSend: function() {
                        $this.button('loading');
                    },
                    success: function(data, textStatus, jqXHR) {
                        if (data.flag === 1) {
                            successMsg(data.msg);
                            load(opd);

                        } else {
                            errorMsg(data.msg);
                            load(opd);
                        }

                    },

                    complete: function() {

                        $this.button('reset');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {

                    }
                });
            }

        });

        $(document).on('click', '.visitImageView', function(e) {
            e.preventDefault();
            var image = $(this).data('record_id');
            var opd = $(this).data('opd');
            var path = '<?php echo base_url('uploads/visits/OPD'); ?>' + opd;
            $('#viewVisitFiles').modal('toggle');
            $('.visitFile').empty().html('<img class="img-responsive" src="' + path + '/' + image + '"/>');

        })

        $(document).on('click', '.opto_print', function(e) {
            //var isChecked = $('.opto_print:checkbox:checked').length > 0;
            //alert(isChecked);
            var printkey = $(this).attr('id');
            if ($("#"+printkey).prop('checked') == true) {
                var printval = 1;
            } else {
                var printval = 0;
            }
                     
            var optoId = $('#optometryId').val();
           
            $.ajax({
                url: "<?php echo base_url('admin/optometry/savePrintSettings') ?>",
                type: "POST",
                data: {
                    'print_key': printkey,
                    'opto_id': optoId,
                    'print_val': printval
                },
                dataType: 'json',
                success: function(data, textStatus, jqXHR) {
                    //alert(data);
                }

            })

        })

        $(document).on('click', '.viewOptometryData', function(e) {
            //e.preventDefault();
            // console.log("running");
            var opd = $(this).data('opd');
            var id = $(this).data('opto_id');
            var visitid = $(this).data('visitid');
            getOptometryData(id,visitid);

        })


        //raju
    });


    function resetForm(id) {
        $("#" + id).trigger("reset");
        $('#' + id + " .select2").val('').trigger('change');
        $('.modal-body',"#form_optometry").find('.multiselect2').select2({   
    placeholder: 'Select',
    allowClear: false,
    minimumResultsForSearch: 2
});

    }

    function deleteHistory(id) {
        $('.' + id).remove();
    }

    function deleteDiagnosis(id) {
        $('.' + id).remove();
    }

    function getRecord_emr(opd,patient_id='') {
        if(patient_id!=''){
            $('#patient_id').val(patient_id);
        }
        $('#opd_id').val(opd);
        $('#opd_no').val("OPDN" + opd);
        $('#optometry_id').empty();
        $('#add_optometry').modal('show');
        resetForm('form_optometry');
       SetPatientDetail(patient_id);
    }

    function randomStr() {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        for (var i = 0; i < 10; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        return text;
    }

    function getDiseaseData() {
        $.ajax({
            url: baseurl + "admin/optometry/get_disease_data",
            type: 'POST',
            data: {},
            dataType: 'json',
            success: function(data) {
                if (data.flag == 1) {
                    var html = '';
                    $.each(data.data, function(key, val) {
                        html += '<option value="' + val.master_key + '">' + val.master_value + '</option>';
                         })
                    $('.disease').append(html);
                }
            }
        })
    }
  function getComplaintData() {
        $.ajax({
            url: baseurl + "admin/optometry/get_complaints_data",
            type: 'POST',
            data: {},
            dataType: 'json',
            success: function(data) {
                console.log(data.data);
                if (data.flag == 1) {
                    var html = '<option value="">Select Complaints</option>';
                   
                    $.each(data.data, function(key, val) {
                      html += '<option value="' + val.master_key + '">' + val.master_value + '</option>';
                    
                    //   <?php foreach ($complaints_data as $dkey => $dvalue) { ?>
                    //   console.log("val.master_value ="+val.master_value);
                    //         if (val.master_value == "<?php echo $dvalue->master_value; ?>") {
                    //               html += '<option selected value="' + val.master_key + '">' + val.master_value + '</option>';
                        
                    //         } else {
                    //               html += '<option value="' + val.master_key + '">' + val.master_value + '</option>';
                        
                    //         }
                    //     <?php } ?>
                    
                    })
                    
                    $('.complaints').append(html);
                }
            }
        })
    }

    // Sending AJAX request and upload file
    function uploadData(formdata, opdid) {
        var urls = baseurl + "admin/optometry/uploadVisitFiles";
        $.ajax({
            url: urls,
            type: 'post',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            // dataType: "html",
            success: function(response) {
                if (response.flag == 0) {
                    load(opdid);
                    errorMsg(response.msg);
                } else {
                    load(opdid);
                    successMsg(response.msg);
                }

            },
            beforeSend: function() {

            },
            complete: function() {


            }
        });
    }

    function load(opdid) {

        $.ajax({
            url: "<?php echo base_url(); ?>admin/optometry/getVisitFiles",
            method: "POST",
            data: {
                'opd_id': opdid
            },
            dataType: "json",
            beforeSend: function() {
                $('#mediaDiv .row').empty();
            },

            success: function(data) {
        //   console.log(data);
                $('#mediaDiv .row').empty();
                if (data.flag === 1) {
                    var html = "";
                    if (data.data.length > 0) {
                        $.each(data.data, function(index, value) {
                            html += value;
                        });
                    }
                    $("#mediaDiv .row").html(html);
                } else {}
            },
            complete: function() {


            }
        });
    }


        function getOptometryData(optomId,visitid="") {

        $.ajax({
            url: baseurl + "admin/optometry/getOptimetryData/" + optomId,
            type: 'POST',
            data: {},
            dataType: 'json',
            success: function(data) {
                $('#view_optometry').modal('toggle');
                $('#optometryId').val(optomId);
                $('.view_optometry').empty();
                var result = data.data;
                var pgp = result.pgp_data;
                var lac = result.lac_data;
                var gon = result.gon_data;
                var ocu = result.ocu_data;
                var vision = result.vision_data;
                var dryretinoscopy = result.dryretinoscopy_data;
                var cyclo = result.cyclo_data;
                var acceptance = result.acceptance_data;
                var antsegment = result.antsegment_data;
                var nct = result.nct_data;
                var at = result.at_data;
                var cvt = result.cvt_data;
                var lcva =result.lcva_data;
                var ker = result.ker_data;
                var sch = result.sch_data;
                var top = result.top_data;
                var pac = result.pac_data;
                var eye = result.eye_data;
                var sta = result.sta_data;
                var gaz = result.gaz_data;
                var eyes = result.eyes_data;
                var postsegment = result.postsegment_data;
                var optometric_comments = result.optometric_comments;
                var orbit = result.orbit;
                var complaints_data = result.complaints_data;
                var inv = result.inv;
                var pre = result.pre;
                var diagnosis_data = result.diagnosis_data;
                var history_data = result.history_data;
                var print_data = result.print_data;
                
                // console.log(complaints_data);

                var html = "";
                html += '<div  class="col-md-12"><div style="float:right"><button class="btn btn-primary editOptometry" data-id="' + result.id + '">Edit</button> &nbsp;<button class="btn btn-primary print_emr" data-id="' + result.id + '" data-visitid="' + visitid + '">Print</button></div></div><br><br>';

                // html += '</tbody></table></div><div class="panel panel-default"style="margin-bottom: 0px;"><div class="panel-heading"><div style="float:left;padding-left:15px">Chief Complaintsssssssss</div><div style="float:right;padding-right:15px">Print <input type="checkbox" checked  name="complaints_print" value="1" id="complaints_print" class="opto_print"';
                //     if(print_data != null && print_data.complaints_print==1){html += 'checked';}
                //     html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + complaints_data + '</td></tr></tbody></table></div></div>';
                
                   
                    html+='<div class="panel panel-default"style="margin-bottom: 0px;"><div class="panel-heading"><div style="float:left;padding-left:15px">Chief Complaints</div><div style="float:right;padding-right:15px">Print <input type="checkbox" checked name="history_print" value="1" id="history_print" class="opto_print"';
                    if(print_data != null && print_data.complaints_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><thead><tr><th>complaints</th><th>Duration</th><th>Eye</th></tr></thead><tbody>';
                $.each(complaints_data, function(key, val) {
                    // console.log(val.complaints);
                    html += '<tr><td>' + val.complaints + '</td><td>' + val.complaints_duration +'/'+val.complaints_period+ '</td><td>'+ val.complaints_type+'</td></tr>';
                })
                // html += '</tbody></table><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + pre + '</td></tr></tbody></table></div></div></div><br>';

                html += '</tbody></table></div><div class="panel panel-default"style="margin-bottom: 0px;"><div class="panel-heading"><div style="float:left;padding-left:15px">History Of Present Illness</div><div style="float:right;padding-right:15px">Print <input type="checkbox" checked  name="inv_print" value="1" id="inv_print" class="opto_print"';
                    if(print_data != null && print_data.inv_print==1){html += 'checked';}
                    html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + inv + '</td></tr></tbody></table></div></div>';
                    
                    html+='<div class="panel panel-default"style="margin-bottom: 0px;"><div class="panel-heading"><div style="float:left;padding-left:15px">History Of Past Illness</div><div style="float:right;padding-right:15px">Print <input type="checkbox" checked name="history_print" value="1" id="history_print" class="opto_print"';
                    if(print_data != null && print_data.history_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><thead><tr><th>Tx/Sx</th><th>Duration</th></tr></thead><tbody>';
                $.each(history_data, function(key, val) {
                    html += '<tr><td>' + val.disease + '</td><td>' + val.duration +'/'+val.period+ '</td></tr>';
                })
                html += '</tbody></table><table class="table table-bordered"><tbody><tr>Notes:</tr><tr><td style="text-align:left;padding-left:10px">' + pre + '</td></tr></tbody></table></div></div></div><br>';

                // vision
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Visual Acuity</div><div style="float:right;padding-right:15px">Print <input type="checkbox" value="1" name="vision_print" id="vision_print" class="opto_print"';
                if(print_data != null && print_data.vision_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr> <th width="20%"></th><th colspan="4">OD</th><th colspan="4">OS</th></tr><tr><th>Unaided</th><td>Distance</td><td>' + vision.vision_od_presenting + '</td><td>Near</td><td>' + vision.vision_od_near_presenting + '</td><td>Distance</td><td>' + vision.vision_os_presenting + '</td><td>Near</td><td>' + vision.vision_os_near_presenting + '</td></tr><tr><th>Pinhole</th><td colspan="4">' + vision.vision_od_pinhole + '</td><td colspan="4">' + vision.vision_os_pinhole + '</td></tr></tbody></table></div></div>';

                // Dry retnoscopy
                html += '<div class="row"><div class="col-md-6"><div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Retinoscopy</div><div style="float:right;padding-right:15px">Print <input type="checkbox" value="1" name="retinoscope_print" id="retinoscope_print" class="opto_print"';
                if(print_data != null && print_data.retinoscope_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th style="width:20%;">Retinoscopy</th><td>SPH</td><td>Cyl</td><td>Axis</td></tr><tr><th>OD</th><td>' + dryretinoscopy.drs_od_sph + '</td><td>' + dryretinoscopy.drs_od_cyl + '</td><td>' + dryretinoscopy.drs_od_axis + '</td></tr><tr><th>OS</th><td>' + dryretinoscopy.drs_od_sph + '</td><td>' + dryretinoscopy.drs_od_cyl + '</td><td>' + dryretinoscopy.drs_os_axis + '</td></tr></tbody></table></div></div></div>';

                html += '<div class="col-md-6"><div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Cyclo</div><div style="float:right;padding-right:15px">Print <input type="checkbox" value="1" name="cylco_print" id="cylco_print" class="opto_print"';
                if(print_data != null && print_data.cylco_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th style="width:20%;">Cyclo</th><td>SPH</td><td>Cyl</td><td>Axis</td></tr><tr><th>OD</th><td>' + cyclo.cyclo_od_sph + '</td><td>' + cyclo.cyclo_od_cyl + '</td><td>' + cyclo.cyclo_od_axis + '</td></tr><tr><th>OS</th><td>' + cyclo.cyclo_os_sph + '</td><td>' + cyclo.cyclo_os_cyl + '</td><td>' + cyclo.cyclo_os_axis + '</td></tr></tbody></table></div></div></div></div>';

                // PGP
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">PGP</div><div style="float:right;padding-right:15px">Print <input type="checkbox" name="pgp_print" value="1" id="pgp_print" class="opto_print"';
                if(print_data != null && print_data.pgp_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th>PGP</th><th>SPH</th><th>Cyl</th><th>Axis</th><th>ADD</th><th>BCVA</th><th>BCNVA</th></tr><tr><th>OD</th><td>' + pgp.pgp_od_sph + '</td><td>' + pgp.pgp_od_cyl + '</td><td>' + pgp.pgp_od_axis + '</td><td>' + pgp.pgp_od_add + '</td><td>' + pgp.pgp_od_eom + '</td><td>' + pgp.pgp_od_tropia + '</td></tr><tr><th>OS</th><td>' + pgp.pgp_os_sph + '</td><td>' + pgp.pgp_os_cyl + '</td><td>' + pgp.pgp_os_axis + '</td><td>' + pgp.pgp_os_add + '</td><td>' + pgp.pgp_os_eom + '</td><td>' + pgp.pgp_os_tropia + '</td></tr></tbody></table><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + pgp.pgp_notes + '</td></tr></tbody></table></div></div>';

                
                // Acceptance
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Acceptance</div><div style="float:right;padding-right:15px">Print <input type="checkbox" name="acceptance_print" value="1" id="acceptance_print" class="opto_print"';
                if(print_data != null && print_data.acceptance_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th style="width:20%;">Acceptance</th><td>SPH</td><td>Cyl</td><td>Axis</td><td>ADD</td><td>BCVA</td><td>BCNVA</td></tr><tr><th>OD</th><td>' + acceptance.accp_od_sph + '</td><td>' + acceptance.accp_od_cyl + '</td><td>' + acceptance.accp_od_axis + '</td><td>' + acceptance.accp_od_add + '</td><td>' + acceptance.accp_od_va + '</td><td>' + acceptance.accp_od_bcnva + '</td></tr><tr><th>OS</th><td>' + acceptance.accp_os_sph + '</td><td>' + acceptance.accp_os_cyl + '</td><td>' + acceptance.accp_os_axis + '</td><td>' + acceptance.accp_os_add + '</td><td>' + acceptance.accp_os_va + '</td><td>' + acceptance.accp_os_bcnva + '</td></tr></tbody></table><table class="table table-bordered"><tbody><tr><th>Lens Type</th><td style="text-align:left;padding-left:10px">' + acceptance.accp_lens+'</td><th>Lens Coating</th><td style="text-align:left;padding-left:10px">' + acceptance.accp_coating +'</td></tr></tbody></table><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + acceptance.accp_notes + '</td></tr></tbody></table></table></div></div>';

                
               // Keratometry
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Keratometry</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="ker_print" value="1" id="ker_print" class="opto_print"';
                if(print_data != null && print_data.ker_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><th style="width:20%;">Keratometry</th><td>H Axis</td><td>V axis</td><td>AVG K Val</td><td>CYL Val</td></tr><tr><th>OD</th><td>' + ker.ker_od_ha1 + " @ " + ker.ker_od_ha2 + '</td><td>' + ker.ker_od_va1 + " @ " + ker.ker_od_va2 +'</td><td>' + ker.ker_od_av + '</td><td>' + ker.ker_od_cy + '</td></tr><tr><th>OS</th><td>' + ker.ker_os_ha1 + " @ " + ker.ker_os_ha2 +'</td><td>' + ker.ker_os_va1 + " @ " + ker.ker_os_va2 +'</td><td>' + ker.ker_os_av + '</td><td>' + ker.ker_os_cy + '</td></tr></tbody></table></div></div>';
                
                // Topography
                html += '<div class="row"><div class="col-md-6"><div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Topography</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="top_print" value="1" id="top_print" class="opto_print"';
                if(print_data != null && print_data.top_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><th style="width:20%;">Topography</th><td>Slim K</td><td>Min K</td></tr><tr><th>OD</th><td>' + top.top_sli_od + '</td><td>' + top.top_min_od + '</td></tr><tr><th>OS</th><td>' + top.top_sli_os + '</td><td>' + top.top_min_os + '</td></tr></tbody></table></div></div></div>';


                // Schirmers Test
                html += '<div class="col-md-6"><div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Schirmers Test</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="sch_print" value="1" id="sch_print" class="opto_print"';
                if(print_data != null && print_data.sch_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><th style="width:20%;">Schirmers Test</th><td>&nbsp</td><td>mm in 5 Minutes</td><td>&nbsp</td><td>mm in 5 Minutes</td></tr><tr><th>OD</th><td>I</td><td>' + sch.sch_od_mmf + '</td><td>II</td><td>' + sch.sch_od_mms + '</td></tr><tr><th>OS</th><td>I</td><td>' + sch.sch_os_mmf + '</td><td>II</td><td>' + sch.sch_os_mms + '</td></tr></tbody></table></div></div></div></div>';
                
                // Pachymetry
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Pachymetry</div><div style="float:right;padding-right:15px">Print <input type="checkbox" name="pac_print" value="1" id="pac_print" class="opto_print"';
                if(print_data != null && print_data.pac_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th style="width:20%;">Pachymetry</th><td>Pachymetry</td><td>KVf</td><td>KVb</td><td>Class</td><td>HV ID</td><td>ACD</td><td>ANGLE</td><td>Pupil Diameter</td></tr><tr><th>OD</th><td>' +  pac.pac_od_pac + '</td><td>' +  pac.pac_od_kvf + '</td><td>' + pac.pac_od_kvb + '</td><td>' + pac.pac_od_cla + '</td><td>' + pac.pac_od_hv + '</td><td>' + pac.pac_od_acd + '</td><td>' + pac.pac_od_ang + '</td><td>' + pac.pac_od_pup + '</td></tr><tr><th>OS</th><td>' +  pac.pac_os_pac + '</td><td>' + pac.pac_os_kvf + '</td><td>' + pac.pac_os_kvb + '</td><td>' + pac.pac_os_cla + '</td><td>' + pac.pac_os_hv + '</td><td>' + pac.pac_os_acd + '</td><td>' + pac.pac_os_ang + '</td><td>' + pac.pac_os_pup + '</td></tr></tbody></table></div></div>';

                // Tonometry
                html += '<div class="row"><div class="col-md-6"><div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Tenometry - NCT</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="nct_print" value="1" id="nct_print" class="opto_print"';
                if(print_data != null && print_data.nct_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><th style="width:20%;">NCT in mm/hg</th><td>Before Dilatation</td><td>After Dilatation</td><td>Time</td></tr><tr><th>OD</th><td>' + nct.nt_od_va_bf + '</td><td>' + nct.nt_od_va_af + '</td><td>' + nct.nt_od_time_bf + '</td></tr><tr><th>OS</th><td>' + nct.nt_os_va_bf + '</td><td>' + nct.nt_os_va_af + '</td><td>' + nct.nt_os_time_bf + '</td></tr></tbody></table></div></div></div>';

                html += '<div class="col-md-6"><div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Tenometry - ATN</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="at_print" value="1" id="at_print" class="opto_print"';
                if(print_data != null && print_data.at_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><th style="width:20%;">ATN in mm/hg</th><td>Before Dilatation</td><td>After Dilatation</td><td>Time</td></tr><tr><th>OD</th><td>' + at.at_od_va_bf + '</td><td>' + at.at_od_va_af + '</td><td>' + at.at_od_time_bf + '</td></tr><tr><th>OS</th><td>' + at.at_os_va_bf + '</td><td>' + at.at_os_va_af + '</td><td>' + at.at_os_time_bf + '</td></tr></tbody></table></div></div></div></div>';

                html += '<div class="row"><div class="col-md-6"><div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Colour Vision Test</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="cvt_print" value="1" id="cvt_print" class="opto_print"';
                if(print_data != null && print_data.cvt_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"> <tbody><tr><th colspan="2">Ishihara Colour Vision</th></tr><tr><th style="width:20%">OD</th><td>' + cvt.cvt_od + '</td></tr><tr><th>OS</th><td>' + cvt.cvt_os + '</td></tr></tbody></table></div></div></div>';

                html += '<div class="col-md-6"><div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">LCVA</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="lcva_print" value="1" id="lcva_print" class="opto_print"';
                if(print_data != null && print_data.lcva_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><th style="width:20%;">Lcva</th><td>SPH</td><td>CYL</td><td>Axis</td></tr><tr><th>OD</th><td>' + lcva.lcva_od_sph + '</td><td>' + lcva.lcva_od_cyl + '</td><td>' + lcva.lcva_od_axis + '</td></tr><tr><th>OS</th><td>' + lcva.lcva_os_sph + '</td><td>' + lcva.lcva_os_cyl + '</td><td>' + lcva.lcva_os_axis + '</td></tr></tbody></table></div></div></div></div>';
                
                // Orbit
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Orbit and Adnexa</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="orbit_print" value="1" id="orbit_print" class="opto_print"';
                    if(print_data != null && print_data.orbit_print==1){html += 'checked';}
                    html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + orbit + '</td></tr></tbody></table></div></div>';
                    
                    // Antsegment
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Ant Segments</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="antsegment_print" value="1" id="antsegment_print" class="opto_print"';
                if(print_data != null && print_data.antsegment_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th style="width:20%;">Ant Segments</th><th>OD</th><th>OS</th><tr><td>Lids</td><td>' + antsegment.as_od_lids + '</td><td>' + antsegment.as_os_lids + '</td></tr><tr><td>Conjuctiva</td><td>' + antsegment.as_od_conjuctiva + '</td><td>' + antsegment.as_os_conjuctiva + '</td></tr><tr><td>Sclera</td><td>' + antsegment.as_od_sclera + '</td><td>' + antsegment.as_os_sclera + '</td></tr><tr><td>Cornea</td><td>' + antsegment.as_od_cornea + '</td><td>' + antsegment.as_os_cornea + '</td></tr><tr><td>A.C</td><td>' + antsegment.as_od_ac + '</td><td>' + antsegment.as_os_ac + '</td></tr><tr><td>Iris</td><td>' + antsegment.as_od_iris + '</td><td>' + antsegment.as_os_iris + '</td></tr><tr><td>Pupil</td><td>' + antsegment.as_od_pupil + '</td><td>' + antsegment.as_os_pupil + '</td></tr><tr><td>Lens</td><td>' + antsegment.as_od_lens + '</td><td>' + antsegment.as_os_lens + '</td></tr></tbody></table><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + antsegment.as_notes + '</td></tr></tbody></table></div></div>';
                                
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Post Segments</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="postsegment_print" value="1" id="postsegment_print" class="opto_print"';
                if(print_data != null && print_data.postsegment_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th style="width:20%;">Post Segments</th><th>OD</th><th>OS</th><tr><td>Vitreous</td><td>' + postsegment.ps_od_fundus + '</td><td>' + postsegment.ps_os_fundus + '</td></tr><tr><td>Cup/DIsc</td><td>' + postsegment.ps_od_cupdisc + '</td><td>' + postsegment.ps_os_cupdisc + '</td></tr><tr><td>CDR</td><td>' + postsegment.ps_od_cdr + '</td><td>' + postsegment.ps_os_cdr + '</td></tr><tr><td>NFLD</td><td>' + postsegment.ps_od_nfld + '</td><td>' + postsegment.ps_os_nfld + '</td></tr><tr><tr><td>PPA</td><td>' + postsegment.ps_od_ppa + '</td><td>' + postsegment.ps_os_ppa + '</td></tr><td>Macula</td><td>' + postsegment.ps_od_macula + '</td><td>' + postsegment.ps_os_macula + '</td></tr><tr><td>Vessels</td><td>' + postsegment.ps_od_vessels + '</td><td>' + postsegment.ps_os_vessels + '</td></tr><tr><td>Periphery</td><td>' + postsegment.ps_od_iop + '</td><td>' + postsegment.ps_os_iop + '</td></tr></tbody></table><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + postsegment.ps_notes + '</td></tr></tbody></table></div></div>';

            

                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Lacrimal Patency</div><div style="float:right;padding-right:15px">Print <input type="checkbox" name="lac_print" value="1" id="lac_print" class="opto_print"';
                if(print_data != null && print_data.lac_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th>Lacrimal Patency</th><th>Watering</th><th>Regurgitation</th><th>Discharge</th><th>Syringing</th></tr><tr><th>OD</th><td>' + lac.lac_od_wat + '</td><td>' + lac.lac_od_reg + '</td><td>' + lac.lac_od_dis + '</td><td>' + lac.lac_od_syr + '</td></tr><tr><th>OS</th><td>' + lac.lac_os_wat + '</td><td>' + lac.lac_os_reg + '</td><td>' + lac.lac_os_dis + '</td><td>' + lac.lac_os_syr + '</td></tr></tbody></table></div></div>';

                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Dry Eye Evaluation </div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="eye_print" value="1" id="eye_print" class="opto_print"';
                if(print_data != null && print_data.eye_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><th style="width:20%;">Eye Evaluation</th><td>Tear Meniscus Height</td><td>Basic Secretion Test</td><td>Impression Cytology</td><td>Tear Breakup Time</td></tr><tr><th>OD</th><td>' + eye.eye_tea_od + '</td><td>' + eye.eye_bas_od + '</td><td>' + eye.eye_imp_od + '</td><td>' + eye.eye_tear_od + '</td></tr><tr><th>OS</th><td>' + eye.eye_tea_os + '</td><td>' + eye.eye_bas_os + '</td><td>' + eye.eye_imp_os + '</td><td>' + eye.eye_tear_os + '</td></tr></tbody></table><table class="table table-bordered"><tbody><th style="width:20%;">Staining</th><td>Flourescein</td><td>	Rose Bengal</td><td>Lissemine Green</td></tr><tr><th>OD</th><td>' + sta.sta_flo_od + '</td><td>' + sta.sta_ros_od + '</td><td>' + sta.sta_lis_od + '</td></tr><tr><th>OS</th><td>' + sta.sta_flo_os + '</td><td>' + sta.sta_ros_os + '</td><td>' + sta.sta_lis_os + '</td></tr></tbody></table></div></div>';

                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Gaze Evaluation</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="gaz_print" value="1" id="gaz_print" class="opto_print"';
                if(print_data != null && print_data.gaz_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><input style="margin-right: 280px;" readonly value=' + gaz.gaz_l1 + '><input style="margin-right: 0px;" readonly value=' + gaz.gaz_l2 + '><input style="float: right;" readonly value=' + gaz.gaz_l3 + '><input style="margin-right: 280px;margin-bottom: 60px;" readonly value=' + gaz.gaz_m1 + '><input style="margin-right: 0px;" readonly value=' + gaz.gaz_m2 + '><img src="<?php echo site_url('uploads/popup/l.png') ?>" height="100px"  style="margin-left: -430px;margin-top: 16px;width: 265px;"><img src="<?php echo site_url('uploads/popup/r.png') ?>" height="100px"  style="margin-left: 183px;margin-top: 20px;width: 265px;"><input style="float: right;margin-top: 51px;" readonly value=' + gaz.gaz_m3 + '><input style="margin-right: 280px;" readonly value=' + gaz.gaz_r1 + '><input style="margin-right: 0px;" readonly value=' + gaz.gaz_r2 + '><input style="float: right;" readonly value=' + gaz.gaz_r3 + '></tr></tbody></table></div></div>';

                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Ocular Motility</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="ocu_print" value="1" id="ocu_print" class="opto_print"';
               if(print_data != null && print_data.ocu_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table"><tbody><tr><th style="border-top: 0px solid #f4f4f4;">RSR LIO</th><th align="center" style="border-top: 0px solid #f4f4f4;">RSR LSR</th><th style="border-top: 0px solid #f4f4f4;">RIO LSR</th></tr><tr><td style="border-top: 0px solid #f4f4f4;"><input readonly value=' + ocu.ocu_1 + ''+ ocu.ocu_r1 +'></td><td style="border-top: 0px solid #f4f4f4;"><input readonly value=' + ocu.ocu_2 + ''+ ocu.ocu_r2 +'></td><td style="border-top: 0px solid #f4f4f4;"><input readonly value=' + ocu.ocu_3 + ''+ ocu.ocu_r3 +'></td></tr><tr><th style="border-top: 0px solid #f4f4f4;">RLR LMR</th><th style="border-top: 0px solid #f4f4f4;"></th><th style="border-top: 0px solid #f4f4f4;">RMR LLR</th></tr><tr><td style="border-top: 0px solid #f4f4f4;"><input readonly value=' + ocu.ocu_4 + ''+ ocu.ocu_r4 +'></td><td style="border-top: 0px solid #f4f4f4;"><img src="<?php echo site_url('uploads/popup/13.png') ?>" height="100px" style="margin: -55px;"></td><td style="border-top: 0px solid #f4f4f4;"><input readonly value=' + ocu.ocu_5 + ''+ ocu.ocu_r5 +'></td></tr><tr><th style="border-top: 0px solid #f4f4f4;">RIR LSO</th><th style="border-top: 0px solid #f4f4f4;">RIR LIR</th><th style="border-top: 0px solid #f4f4f4;">RSO LIR</th></tr><tr><td style="border-top: 0px solid #f4f4f4;"><input readonly value=' + ocu.ocu_6 + ''+ ocu.ocu_r6 +'></td><td style="border-top: 0px solid #f4f4f4;"><input readonly value=' + ocu.ocu_7 + ''+ ocu.ocu_r7 +'></td><td style="border-top: 0px solid #f4f4f4;"><input readonly value=' + ocu.ocu_8 + ''+ ocu.ocu_r8 +'></td></tr></tbody></table><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + ocu.ocu_Ocular_notes + '</td></tr></tbody></table></div></div>';


                

                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Gonioscopy</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="gon_print" value="1" id="gon_print" class="opto_print"';
                if(print_data != null && print_data.gon_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body" style="width:50%;"><table class="table table-bordered"><tbody><th style="width:20%;" colspan="3">OD</th></tr><tr><td style="border-right: 1px solid #e5f3f3  !important;"><input class="form-control text-center" style="width:50%;margin-left: 153px;margin-bottom: 69px;" readonly value=' + gon.gon_od_1 + ' ><tr></tr></td><td style="border-right: 1px solid #e5f3f3  !important;border-top: 1px solid #e5f3f3  !important;border-bottom: 1px solid #e5f3f3 !important;"><input class="form-control text-center" style="width:50%;float: left;" readonly value=' + gon.gon_od_2 + '></td><td style="border: 0px solid grey !important"><img src="<?php echo site_url('uploads/popup/14.png') ?>" class="img_cl" style="width: 172px;margin: -65px;"></td><td style="border-top: 1px solid #e5f3f3  !important;border-bottom: 1px solid #e5f3f3 !important;border-left: 0px solid !important;"><input readonly class="form-control text-center" style="width:146%;float: right;"  value=' + gon.gon_od_3 + '></td></tr><tr><td style="border-right: 1px solid #e5f3f3  !important;border-top: 1px solid #e5f3f3  !important;"><input class="form-control text-center" style="width:50%;margin-left: 153px;margin-top: 69px;" readonly value=' + gon.gon_od_4 + '><tr></tr></td></tbody></table><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + gon.gon_od_note + ''+ "&nbsp;" +'</td></tr></tbody></table></div><div class="panel-body" style="width:50%;margin-left: 534px;margin-top: -387px;"><table class="table table-bordered"><tbody><th style="width:20%;" colspan="3">OS</th></tr><tr><td style="border-right: 1px solid #e5f3f3  !important;"><input class="form-control text-center" style="width:50%;margin-left: 153px;margin-bottom: 69px;" readonly value=' + gon.gon_os_1 + '><tr></tr></td><td style="border-right: 1px solid #e5f3f3  !important;border-top: 1px solid #e5f3f3  !important;border-bottom: 1px solid #e5f3f3 !important;"><input class="form-control text-center" style="width:50%;float: left;" readonly value=' + gon.gon_os_2 + '></td><td style="border: 0px solid grey !important"><img src="<?php echo site_url('uploads/popup/14.png') ?>" class="img_cl" style="width: 172px;margin: -65px;"></td><td style="border-top: 1px solid #e5f3f3  !important;border-bottom: 1px solid #e5f3f3 !important;border-left: 0px solid !important;"><input class="form-control text-center" style="width:146%;float: right;" readonly value=' + gon.gon_os_3 + '></td></tr><tr><td style="border-right: 1px solid #e5f3f3  !important;border-top: 1px solid #e5f3f3  !important;"><input class="form-control text-center" style="width:50%;margin-left: 153px;margin-top: 69px;" readonly value=' + gon.gon_os_4 + '><tr></tr></td></tbody></table><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + gon.gon_os_note + ''+ "&nbsp;" +'</td></tr></tbody></table></div></div>';

               

                // Diagnosis
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Diagnosis</div><div style="float:right;padding-right:15px">Print <input type="checkbox" name="diagnosis_print" value="1" id="diagnosis_print" class="opto_print"';
                if(print_data != null && print_data.diagnosis_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><thead><tr><th>Diagnosis</th><th>Stage</th><th>Eye Type</th></tr></thead><tbody>';
                $.each(diagnosis_data, function(key, val) {
                    html += '<tr><td>' + val.diagnosis_od + '</td><td>' + val.diagnosis_fin_pro +'</td><td>' + val.diagnosis_od_os + '</td></tr>';
                })
                html += '</tbody></table></div></div>'
                html += '<br>';

                if (optometric_comments) {
                    html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Plan of Care</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="optocomments_print" value="1" id="optocomments_print" class="opto_print"';
                    if(print_data != null && print_data.optocomments_print==1){html += 'checked';}
                    html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + optometric_comments + '</td></tr></tbody></table></div></div>';
                }

                html += '<br>';
                $('.view_optometry').html(html);

            }
        })

    }
    
$(document).on('click', '.print_emr', function() {

var opd_id = $(this).data('id');
var visitid = $(this).data('visitid');

var $this = $(this);

$.ajax({
    url: base_url + 'admin/optometry/printemr',
    type: "POST",
    data: {
        opd_id: opd_id, visitid : visitid
    },
    dataType: 'json',
    beforeSend: function() {
        $this.button('loading');
    },
    success: function(data) {
        popup(data.page);
    },

    error: function(xhr) { // if error occured
        alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
        $this.button('reset');

    },
    complete: function() {
        $this.button('reset');

    }
});
});


//show the popup box to add auto fill values for PGP
function showAutoFillPGP()
{
    $("#autofillPGP").modal('toggle');
	select_operation('od');
}

function select_value(element,value)
{
    var selected_cat = 'od';
    if($("#os_btn").hasClass('atf_selected_btn'))
    {
        selected_cat = 'os';
    }
    $("."+selected_cat+'_'+element).val(value);
    $("."+selected_cat+'_'+element).html(value);
}

function select_value_vision(element,value)
{
    var selected_cat = 'od';
    if($("#os_btn_vision").hasClass('atf_selected_btn'))
    {
        selected_cat = 'os';
    }
    $("."+selected_cat+'_'+element).val(value);
    $("."+selected_cat+'_'+element).html(value);
}

function select_value_dry(element,value)
{
    var selected_cat = 'od';
    if($("#os_btn_dry").hasClass('atf_selected_btn'))
    {
        selected_cat = 'os';
    }
    $("."+selected_cat+'_'+element).val(value);
    $("."+selected_cat+'_'+element).html(value);
}



function select_value_cyclo(element,value)
{
    var selected_cat = 'od';
    if($("#os_btn_cyclo").hasClass('atf_selected_btn'))
    {
        selected_cat = 'os';
    }
    $("."+selected_cat+'_'+element).val(value);
    $("."+selected_cat+'_'+element).html(value);
}

function select_value_lcva(element,value)
{
   
    var selected_cat = 'od';
    if($("#os_btn_lcva").hasClass('atf_selected_btn'))
    {
        selected_cat = 'os';
    }
    $("."+selected_cat+'_'+element).val(value);
    $("."+selected_cat+'_'+element).html(value);
}



function select_value_acceptance(element,value)
{
    var selected_cat = 'od';
    if($("#os_btn_acceptance").hasClass('atf_selected_btn'))
    {
        selected_cat = 'os';
    }
    $("."+selected_cat+'_'+element).val(value);
    $("."+selected_cat+'_'+element).html(value);
}



function select_operation(type)
{
    if(type == 'od')
    {
       ;
        $("#od_btn").addClass('atf_selected_btn');
        $("#os_btn").removeClass('atf_selected_btn');
       $(".od_input").show();
       $(".os_input").hide();
    }else{
       
        $("#os_btn").addClass('atf_selected_btn');
        $("#od_btn").removeClass('atf_selected_btn');
        $(".od_input").hide();
       $(".os_input").show();

    }
}

function select_operation_vision(type)
{
    if(type == 'od')
    {
       $("#od_btn_vision").addClass('atf_selected_btn');
       $("#os_btn_vision").removeClass('atf_selected_btn');
       $(".od_input").show();
       $(".os_input").hide();
    }else{
       
        $("#os_btn_vision").addClass('atf_selected_btn');
        $("#od_btn_vision").removeClass('atf_selected_btn');
        $(".od_input").hide();
       $(".os_input").show();

    }
}

function select_operation_dry(type)
{
    if(type == 'od')
    {
       $("#od_btn_dy").addClass('atf_selected_btn');
       $("#os_btn_dry").removeClass('atf_selected_btn');
       $(".od_input").show();
       $(".os_input").hide();
    }else{
       
        $("#os_btn_dry").addClass('atf_selected_btn');
        $("#od_btn_dry").removeClass('atf_selected_btn');
        $(".od_input").hide();
       $(".os_input").show();

    }
}

function select_operation_cyclo(type)
{
    if(type == 'od')
    {
       $("#od_btn_cyclo").addClass('atf_selected_btn');
       $("#os_btn_cyclo").removeClass('atf_selected_btn');
       $(".od_input").show();
       $(".os_input").hide();
    }else{
       
        $("#os_btn_cyclo").addClass('atf_selected_btn');
        $("#od_btn_cyclo").removeClass('atf_selected_btn');
        $(".od_input").hide();
       $(".os_input").show();

    }
}


function select_operation_lcva(type)
{
   
    if(type == 'od')
    {
       $("#od_btn_lcva").addClass('atf_selected_btn');
       $("#os_btn_lcva").removeClass('atf_selected_btn');
       $(".od_input").show();
       $(".os_input").hide();
    }else{
        $("#os_btn_lcva").addClass('atf_selected_btn');
        $("#od_btn_lcva").removeClass('atf_selected_btn');
        $(".od_input").hide();
       $(".os_input").show();

    }
}


function select_operation_acceptance(type)
{
    if(type == 'od')
    {
       $("#od_btn_acceptance").addClass('atf_selected_btn');
       $("#os_btn_acceptance").removeClass('atf_selected_btn');
       $(".od_input").show();
       $(".os_input").hide();
    }else{
       
        $("#os_btn_acceptance").addClass('atf_selected_btn');
        $("#od_btn_acceptance").removeClass('atf_selected_btn');
        $(".od_input").hide();
       $(".os_input").show();

    }
}

function atf_close_btn_click()
{

    $("#autofillPGP").modal('toggle');
}

function atf_save_btn_click()
{
    $("#pgp_od_sph").val($(".od_sph_selected_val").val()).trigger('change');
    $("#pgp_os_sph").val($(".os_sph_selected_val").val()).trigger('change');

    $("#pgp_od_cyl").val($(".od_cyl_selected_val").val()).trigger('change');
    $("#pgp_os_cyl").val($(".os_cyl_selected_val").val()).trigger('change');

    $("#pgp_od_axis").val($(".od_axis_selected_val").val()).trigger('change');
    $("#pgp_os_axis").val($(".os_axis_selected_val").val()).trigger('change');

    $("#pgp_od_add").val($(".od_add_selected_val").val()).trigger('change');
    $("#pgp_os_add").val($(".os_add_selected_val").val()).trigger('change');

    $("#autofillPGP").modal('toggle');
}

function atf_vision_save_btn_click()
{
    $("#vision_od_presenting").val($(".od_dp_selected_val").val()).trigger('change');
    $("#vision_os_presenting").val($(".os_dp_selected_val").val()).trigger('change');

    $("#vision_od_pinhole").val($(".od_dpp_selected_val").val()).trigger('change');
    $("#vision_os_pinhole").val($(".os_dpp_selected_val").val()).trigger('change');

    $("#vision_od_near_presenting").val($(".od_nv_selected_val").val()).trigger('change');
    $("#vision_os_near_presenting").val($(".os_nv_selected_val").val()).trigger('change');

    

    $("#autofillvisions").modal('toggle');
}


function atf_dry_save_btn_click()
{
    $("#drs_od_sph").val($(".od_sph_selected_val_dry").val()).trigger('change');
    $("#drs_os_sph").val($(".os_sph_selected_val_dry").val()).trigger('change');

    $("#drs_od_cyl").val($(".od_cyl_selected_val_dry").val()).trigger('change');
    $("#drs_os_cyl").val($(".os_cyl_selected_val_dry").val()).trigger('change');

    $("#drs_od_axis").val($(".od_axis_selected_val_dry").val()).trigger('change');
    $("#drs_os_axis").val($(".os_axis_selected_val_dry").val()).trigger('change');

    $("#autofillDryRetnoscopy").modal('toggle');
}


function atf_cyclo_save_btn_click()
{
    $("#cyclo_od_sph").val($(".od_sph_selected_val_cyclo").val()).trigger('change');
    $("#cyclo_os_sph").val($(".os_sph_selected_val_cyclo").val()).trigger('change');

    $("#cyclo_od_cyl").val($(".od_cyl_selected_val_cyclo").val()).trigger('change');
    $("#cyclo_os_cyl").val($(".os_cyl_selected_val_cyclo").val()).trigger('change');

    $("#cyclo_od_axis").val($(".od_axis_selected_val_cyclo").val()).trigger('change');
    $("#cyclo_os_axis").val($(".os_axis_selected_val_cyclo").val()).trigger('change');

    $("#autofillcyclo").modal('toggle');
}


function atf_lcva_save_btn_click()
{
    $("#lcva_od_sph").val($(".od_sph_selected_val_lcva").val()).trigger('change');
    $("#lcva_os_sph").val($(".os_sph_selected_val_lcva").val()).trigger('change');

    $("#lcva_od_cyl").val($(".od_cyl_selected_val_lcva").val()).trigger('change');
    $("#lcva_os_cyl").val($(".os_cyl_selected_val_lcva").val()).trigger('change');

    $("#lcva_od_axis").val($(".od_axis_selected_val_lcva").val()).trigger('change');
    $("#lcva_os_axis").val($(".os_axis_selected_val_lcva").val()).trigger('change');

    $("#autofilllcva").modal('toggle');
}







function atf_acceptance_save_btn_click()
{
    $("#accp_od_sph").val($(".od_sph_selected_val_acceptance").val()).trigger('change');
    $("#accp_os_sph").val($(".os_sph_selected_val_acceptance").val()).trigger('change');
												 
    $("#accp_od_cyl").val($(".od_cyl_selected_val_acceptance").val()).trigger('change');
    $("#accp_os_cyl").val($(".os_cyl_selected_val_acceptance").val()).trigger('change');

    $("#accp_od_axis").val($(".od_axis_selected_val_acceptance").val()).trigger('change');
    $("#accp_os_axis").val($(".os_axis_selected_val_acceptance").val()).trigger('change');

    $("#accp_od_add").val($(".od_add_selected_val_acceptance").val()).trigger('change');
    $("#accp_os_add").val($(".os_add_selected_val_acceptance").val()).trigger('change');

    $("#autofillacceptance").modal('toggle');
}


function copy_od_to_os()
{
    $(".os_sph_selected_val").val($(".od_sph_selected_val").val());
    $(".os_sph_selected_val").html($(".od_sph_selected_val").val());

    $(".os_cyl_selected_val").val($(".od_cyl_selected_val").val());
    $(".os_cyl_selected_val").html($(".od_cyl_selected_val").val());

    $(".os_axis_selected_val").val($(".od_axis_selected_val").val());
    $(".os_axis_selected_val").html($(".od_axis_selected_val").val());


    $(".os_add_selected_val").val($(".od_add_selected_val").val());
    $(".os_add_selected_val").html($(".od_add_selected_val").val());

    select_operation('os');
}

function copy_od_to_os_vision()
{
	$(".os_dp_selected_val").val($(".od_dp_selected_val").val());
    $(".os_dp_selected_val").html($(".od_dp_selected_val").val());
	
	$(".os_dpp_selected_val").val($(".od_dpp_selected_val").val());
    $(".os_dpp_selected_val").html($(".od_dpp_selected_val").val());

    $(".os_nv_selected_val").val($(".od_nv_selected_val").val());
    $(".os_nv_selected_val").html($(".od_nv_selected_val").val());
	
	select_operation('os');
	
}

function copy_od_to_os_dry()
{
	
	$(".os_sph_selected_val_dry").val($(".od_sph_selected_val_dry").val());
    $(".os_sph_selected_val_dry").html($(".od_sph_selected_val_dry").val());

    $(".os_cyl_selected_val_dry").val($(".od_cyl_selected_val_dry").val());
    $(".os_cyl_selected_val_dry").html($(".od_cyl_selected_val_dry").val());

    $(".os_axis_selected_val_dry").val($(".od_axis_selected_val_dry").val());
    $(".os_axis_selected_val_dry").html($(".od_axis_selected_val_dry").val());
	
	
	select_operation_dry('os');
	
}

function copy_od_to_os_cyclo()
{
	
	$(".os_sph_selected_val_cyclo").val($(".od_sph_selected_val_cyclo").val());
    $(".os_sph_selected_val_cyclo").html($(".od_sph_selected_val_cyclo").val());

    $(".os_cyl_selected_val_cyclo").val($(".od_cyl_selected_val_cyclo").val());
    $(".os_cyl_selected_val_cyclo").html($(".od_cyl_selected_val_cyclo").val());

    $(".os_axis_selected_val_cyclo").val($(".od_axis_selected_val_cyclo").val());
    $(".os_axis_selected_val_cyclo").html($(".od_axis_selected_val_cyclo").val());
	
	
	select_operation_cyclo('os');
	
}

function copy_od_to_os_lcva()
{

	$(".os_sph_selected_val_lcva").val($(".od_sph_selected_val_lcva").val());
    $(".os_sph_selected_val_lcva").html($(".od_sph_selected_val_lcva").val());

    $(".os_cyl_selected_val_lcva").val($(".od_cyl_selected_val_lcva").val());
    $(".os_cyl_selected_val_lcva").html($(".od_cyl_selected_val_lcva").val());

    $(".os_axis_selected_val_lcva").val($(".od_axis_selected_val_lcva").val());
    $(".os_axis_selected_val_lcva").html($(".od_axis_selected_val_lcva").val());
	
	
	select_operation_lcva('os');
	
}
function copy_od_to_os_acceptance()
{
	
	$(".os_sph_selected_val_acceptance").val($(".od_sph_selected_val_acceptance").val());
    $(".os_sph_selected_val_acceptance").html($(".od_sph_selected_val_acceptance").val());

    $(".os_cyl_selected_val_acceptance").val($(".od_cyl_selected_val_acceptance").val());
    $(".os_cyl_selected_val_acceptance").html($(".od_cyl_selected_val_acceptance").val());
	
    $(".os_axis_selected_val_acceptance").val($(".od_axis_selected_val_acceptance").val());
    $(".os_axis_selected_val_acceptance").html($(".od_axis_selected_val_acceptance").val());
	
	 $(".os_add_selected_val_acceptance").val($(".od_add_selected_val_acceptance").val());
    $(".os_add_selected_val_acceptance").html($(".od_add_selected_val_acceptance").val());
	
	
	select_operation_acceptance('os');
	
}




function atf_vision_close_btn_click()
{

    $("#autofillvisions").modal('toggle');
}


function show_options_selection(ele,type,hide_ele)
{
    $(".atf_"+ele+"_"+type+"_values").show();
    $(".atf_"+ele+"_"+hide_ele+"_values").hide();
    $(".atf_"+ele+"_"+type+"_span").addClass('atf_selected_btn');
    $(".atf_"+ele+"_"+hide_ele+"_span").removeClass('atf_selected_btn');
}

function show_options_selection_dry(ele,type,hide_ele)
{
    $(".atf_"+ele+"_"+type+"_values").show();
    $(".atf_"+ele+"_"+hide_ele+"_values").hide();
    $(".atf_"+ele+"_"+type+"_span").addClass('atf_selected_btn');
    $(".atf_"+ele+"_"+hide_ele+"_span").removeClass('atf_selected_btn');
}

function show_options_selection_cyclo(ele,type,hide_ele)
{
    $(".atf_"+ele+"_"+type+"_values").show();
    $(".atf_"+ele+"_"+hide_ele+"_values").hide();
    $(".atf_"+ele+"_"+type+"_span").addClass('atf_selected_btn');
    $(".atf_"+ele+"_"+hide_ele+"_span").removeClass('atf_selected_btn');
}


function show_options_selection_lcva(ele,type,hide_ele)
{
   
    $(".atf_"+ele+"_"+type+"_values").show();
    $(".atf_"+ele+"_"+hide_ele+"_values").hide();
    $(".atf_"+ele+"_"+type+"_span").addClass('atf_selected_btn');
    $(".atf_"+ele+"_"+hide_ele+"_span").removeClass('atf_selected_btn');
}


function show_options_selection_acceptance(ele,type,hide_ele)
{
    $(".atf_"+ele+"_"+type+"_values").show();
    $(".atf_"+ele+"_"+hide_ele+"_values").hide();
    $(".atf_"+ele+"_"+type+"_span").addClass('atf_selected_btn');
    $(".atf_"+ele+"_"+hide_ele+"_span").removeClass('atf_selected_btn');
}

 

// My code Starts 


// vision start 

function showAutoFillVisions()
{
    $("#autofillvisions").modal('toggle');
	select_operation_vision('od');
}
// vision end


function showAutoFillDryRetnoscoypy()
{
    $("#autofillDryRetnoscopy").modal('toggle');
	select_operation_dry('od');
}
// SELECT VALUE SAME AS PGP Line No. 2350
// SELECT OPERATION SAME AS PGP Line No.2361

function atf_dry_close_btn_click()
{

    $("#autofillDryRetnoscopy").modal('toggle');
}



// CYCLO CODES

function showAutoFillCyclo()
{
    $("#autofillcyclo").modal('toggle');
	select_operation_cyclo('od');
}

// LCVA 

function showAutoFillLcva()
{
    $("#autofilllcva").modal('toggle');
    
	select_operation_lcva('od');
}


function atf_cyclo_close_btn_click()
{

    $("#autofillcyclo").modal('toggle');
}

function atf_lcva_close_btn_click()
{

    $("#autofilllcva").modal('toggle');
}




// Acceptance



function showAutoFillAcceptance()
{
    $("#autofillacceptance").modal('toggle');
	select_operation_acceptance('od');
}

function atf_acceptance_close_btn_click()
{

    $("#autofillacceptance").modal('toggle');
}


</script>

<!--Keratometry Calculation-->
    <script>
        $(document).on("change keyup blur", "#ker_od_ha2", function() {
            var main = $('#ker_od_ha2').val();
            var discont = 180  - main;
            $('#ker_od_va2').val(discont);
        });

        $(document).on("change keyup blur", "#ker_os_ha2", function() {
            var main = $('#ker_os_ha2').val();
            var discont = 180  - main;
            $('#ker_os_va2').val(discont);
        });

        $(document).on("change keyup blur", "#ker_os_ha1,#ker_os_va1", function() {
            var main1 = $('#ker_os_ha1').val();
            var main2 = $('#ker_os_va1').val(); 
            var main3 = 2;

            var discont = parseInt(main1)  + parseInt(main2);
            var avg =  parseInt(discont) /   parseInt(main3)
            $('#ker_os_av').val(avg);
        });

        $(document).on("change keyup blur", "#ker_od_ha1,#ker_od_va1", function() {
            var main1 = $('#ker_od_ha1').val();
            var main2 = $('#ker_od_va1').val(); 
            var main3 = 2;

            var discont = parseInt(main1)  + parseInt(main2);
            var avg =  parseInt(discont) /   parseInt(main3)
            $('#ker_od_av').val(avg);
        });
        
        function deleteComplaints(id) {
        $('.' + id).remove();
        }
        
     
     //added by chitranjan

function SetPatientDetail(patient_id){

     $.ajax({
            url: '<?php echo base_url(); ?>admin/optometry/GetPatientDetail',
            type: "POST",
            async: false,
            data: {
                patient_id: patient_id
            },
            dataType: 'json',
            success: function(res) {
                $("#patient_name").text(res.patient_name);
                $("#age").text(res.age);
                $("#gender").text(res.gender);
            }
        });
}
        //Previous Data Modal
function GetPrevVisitData(title)
{
    $(".prev_visit").html('');
    $("#prev_visit_modal").modal('toggle');
	$("#prev_visit_title").html(title);
    var patient_id = $('#patient_id').val();
    //alert(patient_id);
    $.ajax({
            url: '<?php echo base_url(); ?>admin/optometry/GetLastVisitDetailByPatientID',
            type: "POST",
            //async: false,
            data: {
                patient_id: patient_id, title : title
            },
            //dataType: 'json',
            success: function(res) {
                
                $(".prev_visit").html(res);
               
            }
        });
}
    </script>