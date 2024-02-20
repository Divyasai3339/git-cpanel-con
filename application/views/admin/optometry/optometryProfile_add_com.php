<!-- raju -->
<style type="text/css">
    .img_cl{
        margin-left: -307px !important;
    }
     .view_optometry .panel-heading {
           font-size: 18px !important;
           font-weight: bolder !important;
           color: white !important;
           background: #829079 !important;
           font-family: auto;
       }
            .panel-body {
             background: #ede6b9 !important;
             
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
           background: #829079 !important;
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
        color: #829079 !important;
    }
    .auto_fill{
         font-size: 16px;
        color: white !important;
         padding-right: 5px !important;
    }
    #form_optometry .panel-heading {
        background: #829079 !important;
        font-size: 16px;
    }

    .modaled .panel-body {
          background: #ede6b9 !important;
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
                        <?php //var_dump($patient_data);die;
                        ?>
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
                        <!-- <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="my_class" style="float:left">Complaints</div>
                                <div style="float:right" class="add_complaint"><span class="" data-toggle="tooltip" title="Add Complaint"><i class="fa fa-plus plus_icon" aria-hidden="true"></i>&nbsp;&nbsp;</span></div>
                                <br />
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Complaints</label>
                                            <div>
                                                <input type="search" name='compalint_search' id="compalint_search" class="form-control  compalint_search" placeholder="Search here for Complaints.." style="width:100%">
                                            </div>
                                        </div>
                                        <div class="complaint_data">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4 class="text-center">OD</h4>
                                                <div class="od_complaints text-center">
                                                    <ul class="list-group">

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4 class="text-center">OS</h4>
                                                <div class="os_complaints">
                                                    <ul class="list-group">

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4 class="text-center">General</h4>
                                                <div class="general_complaints text-center">
                                                    <ul class="list-group">

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> -->

                        <!-- Complaints -->
                        <div class="panel panel-default">
                        <div class="panel-heading">
                                <div class="my_class" style="float:left">Complaints</div>
                                <div style="float:right" class="add_complaint"><span class="" data-toggle="tooltip" title="Add Complaint"><i class="fa fa-plus plus_icon" aria-hidden="true"></i>&nbsp;&nbsp;</span></div>
                                <br />
                            </div>
                            <div class="panel-body">
                                <div class="complaint_container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for=" ">
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
                                                        <label for="">Select</label>
                                                        <select name='complaint_od_os[]' id="complaint_od_os" class="form-control select2 complaint_od_os" style="width:100%">
                                                            <option value="OD">
                                                                OD
                                                            </option>
                                                            <option value="OS">
                                                                OS
                                                            </option>
                                                            <option value="Both">
                                                                Both
                                                            </option>
                                                            <option value="General">
                                                                General
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Duration</label>
                                                        <div>
                                                            <input type="text" class="form-control" name="complaint_duration[]" id="complaint_duration" class="complaint_duration" />
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary addnewcomplaint"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
                                </div>
                            </div>
                        </div>

                        <!-- History -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="my_class" style="float:left">History</div>
                                <div style="float:right" class="add_disease"><span class="" data-toggle="tooltip" title="Add Disease"><i class="fa fa-plus plus_icon" aria-hidden="true"></i>&nbsp;&nbsp;</span></div>
                                <br>
                            </div>
                            <div class="panel-body">
                                <div class="history_container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for=" ">
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
                                                            <input type="text" class="form-control" name="duration[]" id="duration" class="duration" />
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for=" ">
                                                    Medication</label>
                                                <div>
                                                    <input type="text" class="form-control" name="medication[]" id="medication" class="medication" />
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for=" ">
                                                    Notes</label>
                                                <div><input type="text" name='condition[]' id="condition" class="form-control  condition" style="width:100%">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary addnewhistory"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
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
                                Visions
                                <div class="pull-right"><a class="auto_fill" href="javascript:void(0)" onclick="showAutoFillVisions()">Auto Fill</a>
                                        </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_visions">
                                    <tr>
                                        <th>Visions</th>
                                        <th colspan="2">Distance Presenting</th>
                                        <th colspan="2">Distance Pinhole</th>
                                        <th colspan="2">Near Vision</th>
                                    </tr>
                                    <tr>
                                        <th class="head">OD</th>
                                        <td>
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
                                        <td colspan="2">
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
                                        <td colspan="2">
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
                                    </tr>
                                    <tr>
                                        <th class="head">OS</th>
                                        <td>
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
                                        <td colspan="2">
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
                                        <td colspan="2">
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
                                </table>
                            </div>
                        </div>

                        <!-- Dry REtnoscope -->

                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading my_class">
                                        Dry Retinoscopy
                                        <div class="pull-right"><a class="auto_fill" href="javascript:void(0)" onclick="showAutoFillDryRetnoscoypy()">Auto Fill</a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered table_dry_retinoscope">
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
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
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
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
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
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
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
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
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
                                        <div class="pull-right"><a class="auto_fill" href="javascript:void(0)" onclick="showAutoFillCyclo()">Auto Fill</a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered">
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
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
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
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
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
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
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
                                                            ?>
                                                                <option value="<?php echo $dvalue->value; ?>">
                                                                    <?php echo $dvalue->value; ?>
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
                                    <div class="pull-right"><a class="auto_fill" href="javascript:void(0)" onclick="showAutoFillPGP()">Auto Fill</a></div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_pgp">
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
                                                <input name='pgp_od_sph' id="pgp_od_sph" class="form-control pgp_od_sph" style="width:100%"/>
                                                    <!-- <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->sph as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            +<?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select> -->
                                            </td>
                                            <td>
                                                <select name='pgp_od_cyl' id="pgp_od_cyl" class="form-control select2 pgp_od_cyl" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            +<?php echo  $dvalue->value; ?>
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
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            +<?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <!--<input type="text" name='pgp_od_eom' id="pgp_od_eom" class="form-control  pgp_od_eom">-->
                                                
                                                 <select name='pgp_od_eom' id="pgp_od_eom" class="form-control  pgp_od_eom select2" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="6/60">6/60</option>
                                                <option value="6/36">6/36</option>
                                                <option value="6/24">6/24</option>
                                                <option value="6/18">6/18</option>
                                                <option value="6/12">6/12</option>
                                                <option value="6/9">6/9</option>
                                                <option value="6/6">6/6</option>

                                            </select>
                                            </td>
                                            <td>
                                                <!--<input type="text" name='pgp_od_tropia' id="pgp_od_tropia" class="form-control  pgp_od_tropia">-->
                                                <select name='pgp_od_tropia' id="pgp_od_tropia" class="form-control  pgp_od_tropia select2" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="N36">N36</option>
                                                <option value="N24">N24</option>
                                                <option value="N12">N12</option>
                                                <option value="N8">N8</option>
                                                <option value="N6">N6</option>

                                            </select>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="head">OS</th>
                                            <td>
                                                <input type="text" name='pgp_os_sph' id="pgp_os_sph" class="form-control pgp_os_sph" style="width:100%"/>
                                                <!-- <select type="text" name='pgp_os_sph' id="pgp_os_sph" class="form-control select2 pgp_os_sph" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->sph as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select> -->
                                            </td>
                                            <td>
                                                <select type="text" name='pgp_os_cyl' id="pgp_os_cyl" class="form-control select2 pgp_os_cyl" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            +<?php echo $dvalue->value; ?>
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
                                                    <?php foreach ($optometry_options->cyl as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            +<?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <!--<input type="text" name="pgp_os_eom" id="pgp_os_eom" class="pgp_os_eom form-control" />-->
                                                
                                                <select  name="pgp_os_eom" id="pgp_os_eom" class="pgp_os_eom form-control select2" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="6/60">6/60</option>
                                                <option value="6/36">6/36</option>
                                                <option value="6/24">6/24</option>
                                                <option value="6/18">6/18</option>
                                                <option value="6/12">6/12</option>
                                                <option value="6/9">6/9</option>
                                                <option value="6/6">6/6</option>

                                            </select>
                                                
                                                
                                            </td>
                                            <td>
                                                <!--<input type="text" name="pgp_os_tropia" id="pgp_os_tropia" class="pgp_os_tropia form-control" />-->
                                                
                                                <select  name="pgp_os_tropia" id="pgp_os_tropia" class="pgp_os_tropia form-control select2" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="N36">N36</option>
                                                <option value="N24">N24</option>
                                                <option value="N12">N12</option>
                                                <option value="N8">N8</option>
                                                <option value="N6">N6</option>

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
                                <div class="pull-right"><a class="auto_fill" href="javascript:void(0)" onclick="showAutoFillAcceptance()">Auto Fill</a>
                                        </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_acceptance">
                                    <thead>
                                        <tr>
                                            <th class="head">&nbsp;</th>
                                            <th>SPH</th>
                                            <th>CYL</th>
                                            <th>AXIS</th>
                                            <th>BCVA</th>
                                            <th>ADD</th>
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
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            +<?php echo $dvalue->value; ?>
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
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            +<?php echo $dvalue->value; ?>
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
                                                <!--<input type="text" name='accp_od_va' id="accp_od_va" class="form-control  accp_od_va" style="width:100%">-->
                                                 <select name='accp_od_va' id="accp_od_va" class="form-control  accp_od_va select2" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="6/60">6/60</option>
                                                <option value="6/36">6/36</option>
                                                <option value="6/24">6/24</option>
                                                <option value="6/18">6/18</option>
                                                <option value="6/12">6/12</option>
                                                <option value="6/9">6/9</option>
                                                <option value="6/6">6/6</option>

                                            </select>
                                            </td>
                                            <td>
                                                <select name='accp_od_add' id="accp_od_add" class="form-control select2 accp_od_add" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->add as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            +<?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            
                                            <td>
                                                <!--<input type="text" name='accp_od_bcnva' id="accp_od_bcnva" class="form-control  accp_od_bcnva" style="width:100%">-->
                                                
                                                <select name='accp_od_bcnva' id="accp_od_bcnva" class="form-control  accp_od_bcnva select2" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="N36">N36</option>
                                                <option value="N24">N24</option>
                                                <option value="N12">N12</option>
                                                <option value="N8">N8</option>
                                                <option value="N6">N6</option>

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
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            +<?php echo $dvalue->value; ?>
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
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            +<?php echo $dvalue->value; ?>
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
                                                <!--<input type="text" name='accp_os_va' id="accp_os_va" class="form-control  accp_os_va" style="width:100%">-->
                                                <select  name='accp_os_va' id="accp_os_va" class="form-control  accp_os_va select2" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="6/60">6/60</option>
                                                <option value="6/36">6/36</option>
                                                <option value="6/24">6/24</option>
                                                <option value="6/18">6/18</option>
                                                <option value="6/12">6/12</option>
                                                <option value="6/9">6/9</option>
                                                <option value="6/6">6/6</option>

                                            </select>
                                            </td>
                                            <td>
                                                <select name='accp_os_add' id="accp_os_add" class="form-control select2 accp_os_add" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->add as $dkey => $dvalue) {
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            +<?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                             <td>
                                                <!--<input type="text" name='accp_os_bcnva' id="accp_os_bcnva" class="form-control  accp_os_bcnva" style="width:100%">-->
                                                <select name='accp_os_bcnva' id="accp_os_bcnva" class="form-control  accp_os_bcnva select2" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="N36">N36</option>
                                                <option value="N24">N24</option>
                                                <option value="N12">N12</option>
                                                <option value="N8">N8</option>
                                                <option value="N6">N6</option>

                                            </select>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>
                                
                                 <!--New Code-->
                                <div class="row">
                                    <div class="col-sm-12" style="font-size:14px;">
                                        <label style="font-weight: 600;">Lens Type</label><br/>
                                        <input type="checkbox" class="accp_sin" name="accp_lens" id="accp_sin" value="Single Vision">&nbsp;Single Vision&nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_bif" name="accp_lens" id="accp_sin" value="Bifocal">&nbsp;Bifocal &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_pro" name="accp_lens" id="accp_sin" value="Progressive">&nbsp;Progressive &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_gla" name="accp_lens" id="accp_gla" value="Glass">&nbsp;Glass &nbsp;&nbsp;

                                        <input type="checkbox" class="accp_kbif" name="accp_lens" id="accp_kbif" value="K Bifocal">&nbsp;K Bifocal &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_pol" name="accp_lens" id="accp_pol" value="Polarised">&nbsp;Polarised &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_pol" name="accp_lens" id="accp_pol" value="Polycarbonate">&nbsp;Polycarbonate &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_exe" name="accp_lens" id="accp_exe" value="Executive">&nbsp;Executive &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_con" name="accp_lens" id="accp_con" value="Contact Lens">&nbsp;Contact Lens &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" style="font-size:15px;" class="accp_lens" name="accp_read" id="accp_read" value="Reading Glass">&nbsp;Reading Glass &nbsp;&nbsp;&nbsp;
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-sm-12" style="font-size:14px;margin-top:5px; ">
                                        <label style="font-weight: 600;">Lens Coating</label><br/>
                                        <input type="checkbox" class="accp_arc" name="accp_coating[]" id="accp_arc" value="Arc">&nbsp;Arc&nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_hig" name="accp_coating[]" id="accp_hig" value="High Index">&nbsp;High Index &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_pho" name="accp_coating[]" id="accp_pho" value="Photochromic">&nbsp;Photochromic &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_sing" name="accp_coating" id="accp_sing" value="Aspheric">&nbsp;Aspheric &nbsp;&nbsp;

                                        <input type="checkbox" class="accp_sing" name="accp_coating" id="accp_sing" value="UV Protection">&nbsp;UV Protection &nbsp;&nbsp;&nbsp;

                                        <input type="checkbox" class="accp_sing" name="accp_coating" id="accp_sing" value="Blue Block">&nbsp;Blue Block &nbsp;&nbsp;&nbsp;

                                        
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <textarea  rows="2" class="form-control accp_notes" name="accp_notes" id="accp_notes" placeholder="Write Notes Here..."></textarea>
                                </div>
                            </div>
                        </div>
                        


                        <!-- Kerotometry -->
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Keratometry
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_ant_segment">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th colspan="3">H Axis</th>
                                            <th colspan="3">V Axis</th>
                                            <th>AVG Val</th>
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

                         <!-- TOnometry -->
                        <div class="row">

                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading my_class">
                                    Tonometry - NCT
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered table_acceptance">
                                            <thead>
                                                <tr>
                                                    <th colspan="4" style="background: #ede6b9;">NCT in mm/hg</th>
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
                                        <table class="table table-bordered table_acceptance">
                                            <thead>
                                                <tr>
                                                    <th colspan="4" style="background: #ede6b9;">ATN in mm/hg</th>
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
                                        <table class="table table-bordered table_ant_segment">
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
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered table_ant_segment">
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

                         <!-- Ant Segment -->
                         <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Ant Segment
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_ant_segment">
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
                                                <input type="text" value="Normal" name='as_od_lids' id="as_od_lids" class="form-control  as_od_lids" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Normal" name='as_os_lids' id="as_os_lids" class="form-control  as_os_lids" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Conjuctiva</th>
                                            <td>
                                                <input type="text" value="Normal" name='as_od_conjuctiva' id="as_od_conjuctiva" class="form-control  as_od_conjuctiva" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Normal" name='as_os_conjuctiva' id="as_os_conjuctiva" class="form-control  as_os_conjuctiva" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Sclera</th>
                                            <td>
                                                <input type="text" value="Normal" name='as_od_sclera' id="as_od_sclera" class="form-control  as_od_sclera" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Normal" name='as_os_sclera' id="as_os_sclera" class="form-control  as_os_sclera" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Cornea</th>
                                            <td>
                                                <input type="text" value="Clear" name='as_od_cornea' id="as_od_cornea" class="form-control  as_od_cornea" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Clear" name='as_os_cornea' id="as_os_cornea" class="form-control  as_os_cornea" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>A.C</th>
                                            <td>
                                                <input type="text" value="Normal Depth" name='as_od_ac' id="as_od_ac" class="form-control  as_od_ac" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Normal Depth" name='as_os_ac' id="as_os_ac" class="form-control  as_os_ac" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Iris</th>
                                            <td>
                                                <input type="text" value="Normal Clear & Pattern" name='as_od_iris' id="as_od_iris" class="form-control  as_od_iris" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Normal Clear & Pattern"  name='as_os_iris' id="as_os_iris" class="form-control  as_os_iris" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Pupil</th>
                                            <td>
                                                <input type="text" value="Normal Size Reacting to light"  name='as_od_pupil' id="as_od_pupil" class="form-control  as_od_pupil" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Normal Size Reacting to light"  name='as_os_pupil' id="as_os_pupil" class="form-control  as_os_pupil" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Lens</th>
                                            <td>
                                                <input type="text" value="Clear"  name='as_od_lens' id="as_od_lens" class="form-control  as_od_lens" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" value="Clear"  name='as_os_lens' id="as_os_lens" class="form-control  as_os_lens" style="width:100%">
                                            </td>
                                        </tr>
                                    </tbody>

                                    <!-- <thead>
                                        <tr>
                                            <th class="head" style="width: 5%;">&nbsp;</th>
                                            <th>Lids</th>
                                            <th>Conjuctiva</th>
                                            <th>Sclera</th>
                                            <th>Cornea</th>
                                            <th>A.C</th>
                                            <th>Iris</th>
                                            <th>Pupil</th>
                                            <th>Lens</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="head">OD</th>
                                            <td>
                                                <input type="text" name='as_od_lids' id="as_od_lids" class="form-control  as_od_lids" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_od_conjuctiva' id="as_od_conjuctiva" class="form-control  as_od_conjuctiva" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_od_sclera' id="as_od_sclera" class="form-control  as_od_sclera" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_od_cornea' id="as_od_cornea" class="form-control  as_od_cornea" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_od_ac' id="as_od_ac" class="form-control  as_od_ac" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_od_iris' id="as_od_iris" class="form-control  as_od_iris" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_od_pupil' id="as_od_pupil" class="form-control  as_od_pupil" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_od_lens' id="as_od_lens" class="form-control  as_od_lens" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="head">OS</th>
                                            <td>
                                                <input type="text" name='as_os_lids' id="as_os_lids" class="form-control  as_os_lids" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_os_conjuctiva' id="as_os_conjuctiva" class="form-control  as_os_conjuctiva" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_os_sclera' id="as_os_sclera" class="form-control  as_os_sclera" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_os_cornea' id="as_os_cornea" class="form-control  as_os_cornea" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_os_ac' id="as_os_ac" class="form-control  as_os_ac" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_os_iris' id="as_os_iris" class="form-control  as_os_iris" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_os_pupil' id="as_os_pupil" class="form-control  as_os_pupil" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_os_lens' id="as_os_lens" class="form-control  as_os_lens" style="width:100%">
                                            </td>
                                        </tr>
                                    </tbody> -->

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
                                <table class="table table-bordered table_ant_segment">
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
                                <table class="table table-bordered table_visions">
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
                            <div class="panel-heading my_class">
                                Schirmers Test
                            </div>
                            <!-- first table -->
                                <table class="table table-bordered table_ant_segment">
                                    <thead>
                                        <tr>
                                            <th>&nbsp</th>
                                            <th style="width:8%">&nbsp</th>
                                            <th>mm in</th>
                                            <th>Mintes</th>
                                            <th style="width:8%">&nbsp</th>
                                            <th>mm in</th>
                                            <th>Mintes</th>
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
                                                <input type="text" name='sch_od_minf' id="sch_od_minf" class="form-control  sch_od_minf" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" readonly placeholder="II" name='sch_od_1' id="sch_od_1" class="form-control  sch_od_1" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='sch_od_mms' id="sch_od_mms" class="form-control  sch_od_mms" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='sch_od_mins' id="sch_od_mins" class="form-control  sch_od_mins" style="width:100%">
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
                                                <input type="text" name='sch_os_minf' id="sch_os_minf" class="form-control  sch_os_minf" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" readonly placeholder="II" name='sch_od_1' id="sch_od_1" class="form-control  sch_od_1" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='sch_os_mms' id="sch_os_mms" class="form-control  sch_os_mms" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='sch_os_mins' id="sch_os_mins" class="form-control  sch_os_mins" style="width:100%">
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>

                                <!-- second table -->
                                <!-- Eye OD OS -->
                                <table class="table table-bordered table_ant_segment">
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

                                <table class="table table-bordered table_ant_segment">
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
                                <table class="table table-bordered table_visions">
                                    <tr>
                                        <td>
                                            <label class="lbl_ml">RSR LIO</label><br>
                                            <!-- <label class="lbl_ml">RSR LIO</label> -->
                                            <select name='ocu_1' id="ocu_1" class="form-control ocu_1" style="width:24%">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r1' id="ocu_r1" class="form-control ocu_r1" style="width:50%;margin-bottom:15%;margin-left: 80px;margin-top: -28px">
                                        </td>
                                        <td>
                                            <label class="lbl_ml">RSR LSR</label><br/>
                                            <select name='ocu_2' id="ocu_2" class="form-control ocu_2" style="width:24%">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r2' id="ocu_r2" class="form-control  ocu_r2" style="width:50%;margin-bottom:15%;margin-left: 80px;margin-top: -28px">
                                        </td>
                                        <td>
                                            <label class="lbl_ml">RIO LSR</label>
                                            <select name='ocu_3' id="ocu_3" class="form-control ocu_3" style="width:24%">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r3' id="ocu_r3" class="form-control  ocu_r3" style="width:50%;margin-bottom:15%;margin-left: 80px;margin-top: -28px">
                                        </td>
                                    </tr>
                                    <tr>
                                    <td>
                                            <label class="lbl_ml">RLR LMR</label>
                                            <select name='ocu_4' id="ocu_4" class="form-control ocu_4" style="width:24%">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r4' id="ocu_r4" class="form-control ocu_r4" style="width:50%;margin-bottom:15%;margin-left: 80px;margin-top: -28px">
                                        </td>
                                        <td>
                                            <img src="<?php echo site_url('uploads/popup/13.png') ?>" height="100px"  style="margin-left: -85px;margin-top:-12px;width: 324px;">
                                        </td>
                                        <td>
                                            <label class="lbl_ml">RMR LLR</label>
                                            <select name='ocu_5' id="ocu_5" class="form-control ocu_5" style="width:24%">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r5' id="ocu_r5" class="form-control ocu_r5" style="width:50%;margin-bottom:15%;margin-left: 80px;margin-top: -28px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="lbl_ml">RIR LSO</label>
                                            <select name='ocu_6' id="ocu_6" class="form-control ocu_6" style="width:24%">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r6' id="ocu_r6" class="form-control ocu_r6" style="width:50%;margin-bottom:15%;margin-left: 80px;margin-top: -28px">
                                        </td>
                                        <td>
                                            <label class="lbl_ml">RIR LIR</label>
                                            <select name='ocu_7' id="ocu_7" class="form-control ocu_7" style="width:24%">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r7' id="ocu_r7" class="form-control ocu_r7" style="width:50%;margin-bottom:15%;margin-left: 80px;margin-top: -28px">
                                        </td>
                                        <td>
                                            <label class="lbl_ml">RSO LIR</label>
                                            <select name='ocu_8' id="ocu_8" class="form-control ocu_8" style="width:24%">
                                                <option value="">
                                                <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                            <input type="text" name='ocu_r8' id="ocu_r8" class="form-control ocu_r8" style="width:50%;margin-bottom:15%;margin-left: 80px;margin-top: -28px">
                                        </td>
                                    </tr>
                                </table>
                                <div class="col-sm-12">
                                    <textarea  rows="2" class="form-control ocu_Ocular_notes" name="ocu_Ocular_notes" id="ocu_Ocular_notes" placeholder="Write Notes Here..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Goeno all  table -->
                        <style>
                            .th_fnt{
                                font-size: 12px;
                            }
                        </style>
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Eye Values
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_ant_segment">
                                    <thead>
                                        <tr>
                                            <th class="head th_fnt" style="width: 5%;">&nbsp;</th>
                                            <th class="th_fnt">Goneoscopy</th>
                                            <th class="th_fnt">Size</th>
                                            <th class="th_fnt">CupDisc</th>
                                            <th class="th_fnt">Neuro Retinal RIM</th>
                                            <th class="th_fnt">Hemorrhage</th>
                                            <th class="th_fnt">NFL Defects</th>
                                            <th class="th_fnt">Peripapillary Atrophy</th>
                                            <th class="th_fnt">CR Degeneration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="head">OD</th>
                                            <td>
                                                <input type="text" name='eyes_gon_od' id="eyes_gon_od" class="form-control  eyes_gon_od" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eyes_siz_od' id="eyes_siz_od" class="form-control  eyes_siz_od" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eyes_cup_od' id="eyes_cup_od" class="form-control  eyes_cup_od" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eyes_neu_od' id="eyes_neu_od" class="form-control  eyes_neu_od" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eyes_hem_od' id="eyes_hem_od" class="form-control  eyes_hem_od" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eyes_nfl_od' id="eyes_nfl_od" class="form-control  eyes_nfl_od" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eyes_per_od' id="eyes_per_od" class="form-control  eyes_per_od" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eyes_cr_od' id="eyes_cr_od" class="form-control  eyes_cr_od" style="width:100%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="head">OS</th>
                                            <td>
                                                <input type="text" name='eyes_gon_os' id="eyes_gon_os" class="form-control  eyes_gon_os" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eyes_siz_os' id="eyes_siz_os" class="form-control  eyes_siz_os" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eyes_cup_os' id="eyes_cup_os" class="form-control  eyes_cup_os" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eyes_neu_os' id="eyes_neu_os" class="form-control  eyes_neu_os" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eyes_hem_os' id="eyes_hem_os" class="form-control  eyes_hem_os" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eyes_nfl_os' id="eyes_nfl_os" class="form-control  eyes_nfl_os" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eyes_per_os' id="eyes_per_os" class="form-control  eyes_per_os" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='eyes_cr_os' id="eyes_cr_os" class="form-control  eyes_cr_os" style="width:100%">
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
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
                            Goneoscopy
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


                       

                        <!--Diagnosis-->
                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Diagnosis
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_ant_segment">

                                    <tbody>
                                        <tr>
                                            <th>OD</th>
                                            <td>
                                                <textarea name='diagnosis_od' id="diagnosis_od" class="form-control  diagnosis_od" style="width:100%"></textarea>
                                            </td>
                                            <td>
                                                <select name='diagnosis_fin_pro' id="diagnosis_fin_pro" class="form-control select2 diagnosis_fin_pro" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="Final">Final</option>
                                                <option value="Provisional">Provisional</option>
                                            </select>
                                            </td>
                                            <td>
                                                 <select name='diagnosis_od_os' id="diagnosis_od_os" class="form-control select2 diagnosis_od_os" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="OD">OD</option>
                                                <option value="OS">OS</option>
                                                <option value="Both">Both</option>
                                            </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>OS</th>
                                            <td>
                                            <textarea  name='diagnosis_os' id="diagnosis_os" class="form-control  diagnosis_os" style="width:100%"></textarea>
                                            </td>
                                            <td>
                                                <select name='diagnosis_os_fin_pro' id="diagnosis_os_fin_pro" class="form-control select2 diagnosis_os_fin_pro" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="Final">Final</option>
                                                <option value="Provisional">Provisional</option>
                                            </select>
                                            </td>
                                            <td>
                                                <select name='diagnosis_os_od_os' id="diagnosis_os_od_os" class="form-control select2 diagnosis_os_od_os" style="width:100%">
                                                <option value="">
                                                    <?php echo $this->lang->line('select'); ?>
                                                </option>
                                                <option value="OD">OD</option>
                                                <option value="OS">OS</option>
                                                <option value="Both">Both</option>
                                            </select>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
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
														echo "<span class='atf_v_span' onclick=\"select_value('sph_selected_val',+{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_sph_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
														echo "<span class='atf_v_span' onclick=\"select_value('sph_selected_val',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
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
                                                    echo "<span class='atf_v_span' onclick=\"select_value('cyl_selected_val',+{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_cyl_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value('cyl_selected_val',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
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
                                                        echo "<span class='atf_v_span' onclick=\"select_value('add_selected_val',+{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_add_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 4; $ii += 0.25)
                                                    {
                                                        echo "<span class='atf_v_span' onclick=\"select_value('add_selected_val',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
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
                                                    echo "<span class='atf_v_span' onclick=\"select_value_dry('sph_selected_val_dry',+{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_sph_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_dry('sph_selected_val_dry',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
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
                                                    echo "<span class='atf_v_span' onclick=\"select_value_dry('cyl_selected_val_dry',+{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_cyl_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_dry('cyl_selected_val_dry',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
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
                                                    echo "<span class='atf_v_span' onclick=\"select_value_cyclo('sph_selected_val_cyclo',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_sph_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_cyclo('sph_selected_val_cyclo',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
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
                                                    echo "<span class='atf_v_span' onclick=\"select_value_cyclo('cyl_selected_val_cyclo',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_cyl_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_cyclo('cyl_selected_val_cyclo',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
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
                                                    echo "<span class='atf_v_span' onclick=\"select_value_acceptance('sph_selected_val_acceptance',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_sph_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 20; $ii += 0.25)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_acceptance('sph_selected_val_acceptance',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
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
                                                    echo "<span class='atf_v_span' onclick=\"select_value_acceptance('cyl_selected_val_acceptance',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_cyl_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 6; $ii += 0.25)
                                                    {
                                                    echo "<span class='atf_v_span' onclick=\"select_value_acceptance('cyl_selected_val_acceptance',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
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
                                                        echo "<span class='atf_v_span' onclick=\"select_value_acceptance('add_selected_val_acceptance',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="atf_add_n_values atf_value_container">
                                                <?php 
                                                    for($ii=0.25; $ii <= 4; $ii += 0.25)
                                                    {
                                                        echo "<span class='atf_v_span' onclick=\"select_value_acceptance('add_selected_val_acceptance',-{$ii})\">-".number_format((float)$ii, 2, '.', '')."</span>"; 
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




<!--My codes end -->



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
</style>
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
            // formdata.append('odcomplaints', JSON.stringify(od_complaints));
            // formdata.append('oscomplaints', JSON.stringify(os_complaints));
            // formdata.append('generalcomplaints', JSON.stringify(general_complaints));
            // formdata.append('selected_complaints', JSON.stringify(selected_complaints));
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

        
        $(document).on('click', '.addnewhistory', function(e) {
            e.preventDefault();
            var strR = randomStr();
            var html = '<div class="row ' + strR + '">';
            html += '<div class="col-md-3"><div class="form-group"><label for=" ">Tx/Sx</label><div><select name="disease[]" id="disease" class="form-control select2 disease" style="width:100%"><option value=""><?php echo $this->lang->line('select'); ?></option><?php foreach ($disease_data as $dkey => $dvalue) { ?><option value="<?php echo $dvalue->master_key; ?>"><?php echo $dvalue->master_value; ?></option><?php } ?></select></div></div></div>';
            html += '<div class="col-md-3"><div class="row"><div class="col-md-6"><div class="form-group"><label for="">Duration</label><input type="text" class="form-control" name="duration[]" id="duration" class="duration" /></div></div><div class="col-md-6"><div class="form-group"><label for="">Period</label><select name="period[]" id="period" class="form-control select2 period" style="width:100%"><option value="Days">Days</option><option value="Months">Months</option>';
            html += '<option value="Years">Years<option></select></div></div></div></div>';
            html += '<div class="col-md-3"><div class="form-group"><label for=" ">Medication</label><div><input type="text" class="form-control" name="medication[]" class="medication" id="medication" /></div></div></div>';
            html += '<div class="col-md-2"><div class="form-group"><label for=" ">Notes</label><div><input type="text" name="condition[]" id="condition" class="form-control select2 condition" style="width:100%"></div></div></div>';
            var deleteH = "deleteHistory('" + strR + "')";
            html += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteH + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
            html += '</div>';
            $('.history_container').append(html);
        });

        $(document).on('click', '.addnewcomplaint', function(e) {
            e.preventDefault();
            var strR = randomStr();
            var html = '<div class="row ' + strR + '">';
            html += '<div class="col-md-3"><div class="form-group"><label for=" ">Complaint</label><div><select name="complaints[]" id="complaints" class="form-control select2 complaints" style="width:100%"><option value=""><?php echo $this->lang->line('select')." Complaint"; ?></option><?php foreach ($complaint_data as $dkey => $dvalue) { ?><option value="<?php echo $dvalue->master_key; ?>"><?php echo $dvalue->master_value; ?></option><?php } ?></select></div></div></div>';
            html += '<div class="col-md-3"><div class="row"><div class="col-md-6"><div class="form-group"><label for="">Select</label><select name="complaint_od_os[]" id="complaint_od_os" class="form-control select2 complaint_od_os" style="width:100%"><option value=""></option><option value="OD">OD</option><option value="OS">OS</option><option value="General">General</option><option value="Both">Both</option>';
            html += '</select></div></div><div class="col-md-6"><div class="form-group"><label for=" ">Duration</label><div><input type="text" class="form-control" name="complaint_duration[]" class="complaint_duration" id="complaint_duration" /></div></div></div></div></div>';
           
            var deleteC = "deleteComplaint('" + strR + "')";
            html += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteC + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
            html += '</div>';
            $('.complaint_container').append(html);
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
                    var lcva = result.lcva_data;
                    var ker = result.ker_data;
                    var sch = result.sch_data;
                    var eye = result.eye_data;
                    var sta = result.sta_data;
                    var gaz = result.gaz_data;
                    var eyes = result.eyes_data;
                    var postsegment = result.postsegment_data;
                    var diagnosis = result.diagnosis_data;
                    var history_data = result.history_data;
                    var complaints_data = result.complaints_data;
                    var optometric_comments = result.optometric_comments;
                    var orbit = result.orbit;
                    var data = [pgp,lac,gon,ocu, vision, dryretinoscopy, cyclo, acceptance, antsegment, nct, at, cvt, lcva,ker, sch, eye, sta, gaz, eyes, postsegment, diagnosis];
                   
                    $('#view_optometry').modal('toggle');
                    $('#add_optometry').modal('toggle');
                    $('#patient_id').val(result.patient_id);
                    $('#optometry_id').val(result.id);
                    $('#opd_id').val(result.opd_id);
                    getComplaintData();
                    
                    var html = "";

                    $.each(complaints_data, function(key, value) {
                        if (key == 0) {
                            html += '<div class="row">';
                        } else {
                            html += '<div class="row row_' + key + '">';
                        }
                        html += '<div class="col-md-3"><div class="form-group"><label for=" ">Complaint List</label><div><select name="complaints[]" id="complaints" class="form-control select2 complaints" style="width:100%"><option value=""><?php echo $this->lang->line('select'); ?></option>';
                        <?php foreach ($master_data as $dkey => $dvalues) { ?>
                            if (value.complaints == "<?php echo $dvalues->master_key; ?>") {
                                html += '<option selected value="<?php echo $dvalues->master_key; ?>"><?php echo $dvalues->master_value; ?></option>';
                            } else {
                                html += '<option  value="<?php echo $dvalues->master_key; ?>"><?php echo $dvalues->master_value; ?></option>';
                            }
                        <?php } ?>
                        html += '</select></div></div></div>';
                        html += '<div class="col-md-3"><div class="row"><div class="col-md-6"><div class="form-group"><label for="">Select</label><select name="complaint_od_os[]" id="complaint_od_os" class="form-control select2 complaint_od_os" style="width:100%">';
                        if (value.complaint_od_os == "") {
                            html += '<option selected value=""></option>';
                        } else {
                            html += '<option value=""></option>';
                        }
                        if (value.complaint_od_os == "OD") {
                            html += '<option selected value="OD">OD</option>';
                        } else {
                            html += '<option value="OD">OD</option>';
                        }
                        if (value.complaint_od_os == "OS") {
                            html += '<option selected value="OS">OS</option>';
                        } else {
                            html += '<option value="OS">OS</option>';
                        }
                        if (value.complaint_od_os == "Both") {
                            html += '<option selected value="Both">Both</option>';
                        } else {
                            html += '<option value="Both">Both</option>';
                        }
                        if (value.complaint_od_os == "General") {
                            html += '<option selected value="General">General</option>';
                        } else {
                            html += '<option value="General">General</option>';
                        }
                        html += '</select></div></div>';
                        html += '<div class="col-md-6"><div class="form-group"><label for="">Duration</label><input type="text" class="form-control" name="complaint_duration[]" id="complaint_duration" class="complaint_duration" value="' + value.complaint_duration + '" /></div></div></div></div>';
                    
                        if(key == 0){

                        }else{

                            var deleteRow = "deleteComplaint('row_" + key + "')";
                            html += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteRow + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
                        }
                        
                        html += '</div>';
                    })
                    $('.complaint_container').html(html);

                    // History
                    var html = "";
                    $.each(history_data, function(key, value) {
                        if (key == 0) {
                            html += '<div class="row">';
                        } else {
                            html += '<div class="row row_' + key + '">';
                        }
                        html += '<div class="col-md-3"><div class="form-group"><label for=" ">Disease</label><div><select name="disease[]" id="disease" class="form-control select2 disease" style="width:100%"><option value=""><?php echo $this->lang->line('select'); ?></option>';
                        <?php foreach ($disease_data as $dkey => $dvalue) { ?>
                            if (value.disease == "<?php echo $dvalue->master_key; ?>") {
                                html += '<option selected value="<?php echo $dvalue->master_key; ?>"><?php echo $dvalue->master_value; ?></option>';
                            } else {
                                html += '<option  value="<?php echo $dvalue->master_key; ?>"><?php echo $dvalue->master_value; ?></option>';
                            }
                        <?php } ?>
                        html += '</select></div></div></div>';
                        html += '<div class="col-md-3"><div class="row"><div class="col-md-6"><div class="form-group"><label for="">Duration</label><input type="text" class="form-control" name="duration[]" id="duration" class="duration" value="' + value.duration + '" /></div></div><div class="col-md-6"><div class="form-group"><label for="">Period</label><select name="period[]" id="period" class="form-control select2 period" style="width:100%">';
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
                            html += '<option selected value="Years"></option>';
                        } else {
                            html += '<option value="Years"></option>';
                        }
                        html += '</select></div></div></div></div>';
                        html += '<div class="col-md-3"><div class="form-group"><label for=" ">Medication</label><div><input type="text" class="form-control" name="medication[]" class="medication" id="medication" value="' + value.medication + '" /></div></div></div>';
                        if (key == 0) {
                            html += '<div class="col-md-3"><div class="form-group"><label for=" ">Condition</label><div><input type="text" name="condition[]" id="condition" class="form-control select2 condition" value="' + value.condition + '" style="width:100%"></div></div></div>';
                        } else {
                            html += '<div class="col-md-2"><div class="form-group"><label for=" ">Condition</label><div><input type="text" name="condition[]" id="condition" class="form-control select2 condition" value="' + value.condition + '" style="width:100%"></div></div></div>';
                            var deleteRow = "deleteHistory('row_" + key + "')";
                            html += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteRow + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
                        }
                        html += '</div>';
                    })
                    $('.history_container').html(html);
                    // var html = "";
                    // $.each(history_data, function(key, value) {
                    //     if (key == 0) {
                    //         html += '<div class="row">';
                    //     } else {
                    //         html += '<div class="row row_' + key + '">';
                    //     }
                    //     // html += '<div class="col-md-3"><div class="form-group"><label for=" ">Disease</label><div><select name="disease[]" id="disease" class="form-control select2 disease" style="width:100%"><option value=""><?php echo $this->lang->line('select'); ?></option>';
                    //     // <?php foreach ($disease_data as $dkey => $dvalue) { ?>
                    //     //     if (value.disease == "<?php echo $dvalue->master_key; ?>") {
                    //     //         html += '<option selected value="<?php echo $dvalue->master_key; ?>"><?php echo $dvalue->master_value; ?></option>';
                    //     //     } else {
                    //     //         html += '<option  value="<?php echo $dvalue->master_key; ?>"><?php echo $dvalue->master_value; ?></option>';
                    //     //     }
                    //     // <?php } ?>
                    //     // html += '</select></div></div></div>';
                    //     // html += '<div class="col-md-3"><div class="row"><div class="col-md-6"><div class="form-group"><label for="">Duration</label><input type="text" class="form-control" name="duration[]" id="duration" class="duration" value="' + value.duration + '" /></div></div><div class="col-md-6"><div class="form-group"><label for="">Period</label><select name="period[]" id="period" class="form-control select2 period" style="width:100%">';
                    //     // if (value.period == "Days") {
                    //     //     html += '<option selected value="Days">Days</option>';
                    //     // } else {
                    //     //     html += '<option value="Days">Days</option>';
                    //     // }
                    //     // if (value.period == "Months") {
                    //     //     html += '<option selected value="Months">Months</option>';
                    //     // } else {
                    //     //     html += '<option value="Months">Months</option>';
                    //     // }
                    //     // if (value.period == "Years") {
                    //     //     html += '<option selected value="Years"></option>';
                    //     // } else {
                    //     //     html += '<option value="Years"></option>';
                    //     // }
                    //     // html += '</select></div></div></div></div>';
                    //     // html += '<div class="col-md-3"><div class="form-group"><label for=" ">Medication</label><div><input type="text" class="form-control" name="medication[]" class="medication" id="medication" value="' + value.medication + '" /></div></div></div>';
                    //     // if (key == 0) {
                    //     //     html += '<div class="col-md-3"><div class="form-group"><label for=" ">Condition</label><div><input type="text" name="condition[]" id="condition" class="form-control select2 condition" value="' + value.condition + '" style="width:100%"></div></div></div>';
                    //     // } else {
                    //         html += '<div class="col-md-4"><div class="form-group"><label for=" ">Tx/Ts</label><div><input type="text" name="condition[]" id="condition" class="form-control select2 condition" value="' + value.condition + '" style="width:100%"></div></div></div>';
                    //         var deleteRow = "deleteHistory('row_" + key + "')";
                    //         html += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteRow + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
                    //     // }
                    //     html += '</div>';
                    // })
                    
                    // $('.history_container').html(html);
                    $('.optometric_comments').empty().val(optometric_comments);
                    $('.orbit').empty().val(orbit);
                    $.each(data, function(key, value) {
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
                    })

                }
            })

        })




        getComplaintData();
        getDiseaseData();
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
                        location.reload();

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
            var opd = $(this).data('opd');
            var id = $(this).data('opto_id');
            getOptometryData(id);

        })


        //raju
    });


    function resetForm(id) {
        $("#" + id).trigger("reset");
        $('#' + id + " .select2").val('').trigger('change');

    }

    function deleteHistory(id) {
        $('.' + id).remove();
    }

    function deleteComplaint(id) {
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
                    var html = '<option value="">Select Disease</option>';
                    $.each(data.data, function(key, val) {
                        html += '<option value="' + val.master_key + '">' + val.master_value + '</option>';
                    })
                    $('.disease').html(html);
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
                if (data.flag == 1) {
                    var html = '<option value="">Select Complaint</option>';
                    $.each(data.data, function(key, val) {
                        html += '<option value="' + val.master_key + '">' + val.master_value + '</option>';
                    })
                    $('.complaints').html(html);
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
          console.log(data);
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


        function getOptometryData(optomId) {

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
                var lcva = result.lcva_data;
                var ker = result.ker_data;
                var sch = result.sch_data;
                var eye = result.eye_data;
                var sta = result.sta_data;
                var gaz = result.gaz_data;
                var eyes = result.eyes_data;
                var postsegment = result.postsegment_data;
                var optometric_comments = result.optometric_comments;
                var orbit = result.orbit;
                var diagnosis = result.diagnosis_data;
                var history_data = result.history_data;
                var complaints_data = result.complaints_data;
                var print_data = result.print_data;
                 //console.log(history_data);
                // $.each(print_data,function(key,val){
                //   if(val==1){
                //     $("#"+key).attr("checked", true);
                //     $('#'+key).prop('checked',true);
                //   }else{
                //     $("#"+key).removeAttr("checked");
                //     $('#'+key).prop('checked',false);
                //   }
                // })
                // var complaintdata = JSON.parse(result.complaints_data);
                var html = "";
                html += '<div  class="col-md-12"><div style="float:right"><button class="btn btn-primary editOptometry" data-id="' + result.id + '">Edit</button> &nbsp;<button class="btn btn-primary print_emr" data-id="' + result.id + '">Print</button></div></div><br><br>';
                // complaints
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Complaints</div><div style="float:right;padding-right:15px">Print <input type="checkbox" name="complaints_print" value="1" id="complaints_print" class="opto_print"';
                if(print_data != null && print_data.complaints_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><thead><tr><th>Complaint</th><th>select</th><th>Duration</th></tr></thead><tbody>';
                $.each(complaints_data, function(key, val) {
                    html += '<tr><td>' + val.complaints + '</td><td>' + val.complaint_od_os +'</td><td>' + val.complaint_duration + '</td></tr>';
                })
                html += '</tbody></table></div></div>'
                html += '<br>';

                // History
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">History</div><div style="float:right;padding-right:15px">Print <input type="checkbox" name="history_print" value="1" id="history_print" class="opto_print"';
                if(print_data != null && print_data.history_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><thead><tr><th>Tx/Sx</th><th>Duration</th><th>Medication</th><th>Condition</th></tr></thead><tbody>';
                $.each(history_data, function(key, val) {
                    html += '<tr><td>' + val.disease + '</td><td>' + val.duration +'/'+val.period+ '</td><td>' + val.medication + '</td><td>' + val.condition + '</td></tr>';
                })
                html += '</tbody></table></div></div>'
                html += '<br>';

                // Visions
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Visions</div><div style="float:right;padding-right:15px">Print <input type="checkbox" value="1" name="vision_print" id="vision_print" class="opto_print"';
                if(print_data != null && print_data.vision_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th colspan="3">Distance Vision</th><th colspan="2">Near Vision</th></tr><tr><td>&nbsp;</td><td>Presenting</td><td>Pinhole</td><td>Presenting</td></tr><tr><td>OD</td><td>' + vision.vision_od_presenting + '</td><td>' + vision.vision_od_pinhole + '</td><td colspan="2">' + vision.vision_od_near_presenting + '</td></tr><tr><td>OS</td><td>' + vision.vision_os_presenting + '</td><td>' + vision.vision_os_pinhole + '</td><td colspan="2">' + vision.vision_os_near_presenting + '</td></tr></tbody></table></div></div>';

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
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><th style="width:20%;">Keratometry</th><td colspan="2">H Axis</td><td colspan="2">V axis</td><td>AVG Val</td><td>CYL Val</td></tr><tr><th>OD</th><td>' + ker.ker_od_ha1 + '</td><td>' + ker.ker_od_ha2 + '</td><td>' + ker.ker_od_va1 + '</td><td>' + ker.ker_od_va2 + '</td><td>' + ker.ker_od_av + '</td><td>' + ker.ker_od_cy + '</td></tr><tr><th>OS</th><td>' + ker.ker_os_ha1 + '</td><td>' + ker.ker_os_ha2 + '</td><td>' + ker.ker_os_va1 + '</td><td>' + ker.ker_os_va2 + '</td><td>' + ker.ker_os_av + '</td><td>' + ker.ker_os_cy + '</td></tr></tbody></table></div></div>';

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
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><th style="width:20%;">Schirmers Test</th><td>&nbsp</td><td>mm in</td><td>Minutes</td><td>&nbsp</td><td>mm in</td><td>Minutes</td></tr><tr><th>OD</th><td>I</td><td>' + sch.sch_od_mmf + '</td><td>' + sch.sch_od_minf + '</td><td>II</td><td>' + sch.sch_od_mms + '</td><td>' + sch.sch_od_mins + '</td></tr><tr><th>OS</th><td>I</td><td>' + sch.sch_os_mmf + '</td><td>' + sch.sch_os_minf + '</td><td>II</td><td>' + sch.sch_os_mms + '</td><td>' + sch.sch_os_mins + '</td></tr></tbody></table><table class="table table-bordered"><tbody><th style="width:20%;">Eye Evaluation</th><td>Tear Meniscus Height</td><td>Basic Secretion Test</td><td>Impression Cytology</td><td>Tear Breakup Time</td></tr><tr><th>OD</th><td>' + eye.eye_tea_od + '</td><td>' + eye.eye_bas_od + '</td><td>' + eye.eye_imp_od + '</td><td>' + eye.eye_tear_od + '</td></tr><tr><th>OS</th><td>' + eye.eye_tea_os + '</td><td>' + eye.eye_bas_os + '</td><td>' + eye.eye_imp_os + '</td><td>' + eye.eye_tear_os + '</td></tr></tbody></table><table class="table table-bordered"><tbody><th style="width:20%;">Staining</th><td>Flourescein</td><td>	Rose Bengal</td><td>Lissemine Green</td></tr><tr><th>OD</th><td>' + sta.sta_flo_od + '</td><td>' + sta.sta_ros_od + '</td><td>' + sta.sta_lis_od + '</td></tr><tr><th>OS</th><td>' + sta.sta_flo_os + '</td><td>' + sta.sta_ros_os + '</td><td>' + sta.sta_lis_os + '</td></tr></tbody></table></div></div>';

                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Gaze Evaluation</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="gaz_print" value="1" id="gaz_print" class="opto_print"';
                if(print_data != null && print_data.gaz_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><input style="margin-right: 280px;" readonly value=' + gaz.gaz_l1 + '><input style="margin-right: 0px;" readonly value=' + gaz.gaz_l2 + '><input style="float: right;" readonly value=' + gaz.gaz_l3 + '><input style="margin-right: 280px;margin-bottom: 60px;" readonly value=' + gaz.gaz_m1 + '><input style="margin-right: 0px;" readonly value=' + gaz.gaz_m2 + '><img src="<?php echo site_url('uploads/popup/l.png') ?>" height="100px"  style="margin-left: -430px;margin-top: 16px;width: 265px;"><img src="<?php echo site_url('uploads/popup/r.png') ?>" height="100px"  style="margin-left: 183px;margin-top: 20px;width: 265px;"><input style="float: right;margin-top: 51px;" readonly value=' + gaz.gaz_m3 + '><input style="margin-right: 280px;" readonly value=' + gaz.gaz_r1 + '><input style="margin-right: 0px;" readonly value=' + gaz.gaz_r2 + '><input style="float: right;" readonly value=' + gaz.gaz_r3 + '></tr></tbody></table></div></div>';

                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Ocular Motility</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="ocu_print" value="1" id="ocu_print" class="opto_print"';
                if(print_data != null && print_data.ocu_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table"><tbody><tr><th>RSR LIO</th><th align="center">RSR LSR</th><th>RIO LSR</th></tr><tr><td><input readonly value=' + ocu.ocu_1 + ''+ ocu.ocu_r1 +'></td><td><input readonly value=' + ocu.ocu_2 + ''+ ocu.ocu_r2 +'></td><td><input readonly value=' + ocu.ocu_3 + ''+ ocu.ocu_r3 +'></td></tr><tr><th>RLR LMR</th><th></th><th>RMR LLR</th></tr><tr><td><input readonly value=' + ocu.ocu_4 + ''+ ocu.ocu_r4 +'></td><td><img src="<?php echo site_url('uploads/popup/13.png') ?>" height="100px" style="margin: -55px;"></td><td><input readonly value=' + ocu.ocu_5 + ''+ ocu.ocu_r5 +'></td></tr><tr><th>RIR LSO</th><th>RIR LIR</th><th>RSO LIR</th></tr><tr><td><input readonly value=' + ocu.ocu_6 + ''+ ocu.ocu_r6 +'></td><td><input readonly value=' + ocu.ocu_7 + ''+ ocu.ocu_r7 +'></td><td><input readonly value=' + ocu.ocu_8 + ''+ ocu.ocu_r8 +'></td></tr></tbody></table><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + ocu.ocu_Ocular_notes + '</td></tr></tbody></table></div></div>';

                // html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Ocular Motility</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="ocu_print" value="1" id="ocu_print" class="opto_print"';
                // if(print_data != null && print_data.ocu_print==1){html += 'checked';}
                // html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><input readonly value=' + "RSRLIO" + '><br/><input style="margin-right: 280px;" readonly value=' + ocu.ocu_1 + + ocu.ocu_r1 +'><input readonly value=' + "RSRLSR" + '><br/><input style="margin-right: 0px;" readonly value=' + ocu.ocu_2 + + ocu.ocu_r2 +'><label>RIO LSR</label><input style="float: right;" readonly value=' + ocu.ocu_3 + + ocu.ocu_r3 +'><label></label><span>RLR LMRaa</span><input style="margin-right: 280px;margin-bottom: 60px;" readonly value=' + ocu.ocu_4 + + ocu.ocu_r4 +'><img src="<?php echo site_url('uploads/popup/13.png') ?>" height="100px"  style="margin-left: -63px;margin-top: 20px;width: 325px;"><label>RMR LLR</label><input style="float: right;margin-top: 51px;" readonly value=' + ocu.ocu_5 + + ocu.ocu_r5 +'>RIR LSO<input style="margin-right: 280px;" readonly value=' + ocu.ocu_6 + + ocu.ocu_r6 +'><input style="margin-right: 0px;" readonly value=' + ocu.ocu_7 + + ocu.ocu_r7 +'><input style="float: right;" readonly value=' + ocu.ocu_8 + + ocu.ocu_r8 +'></tr></tbody></table></div></div>';

                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Eye Values</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="eyes_print" value="1" id="eyes_print" class="opto_print"';
                if(print_data != null && print_data.eyes_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><th style="width:20%;">&nbsp;</th><td>Goneoscopy</td><td>Size</td><td>CupDisc</td><td>Neuro Retinal RIM</td><td>Hemorrhage</td><td>NFL Defects</td><td>Peripapillary Atrophy</td><td>CR Degeneration</td></tr><tr><th>OD</th><td>' + eyes.eyes_gon_od + '</td><td>' + eyes.eyes_siz_od + '</td><td>' + eyes.eyes_cup_od + '</td><td>' + eyes.eyes_neu_od + '</td><td>' + eyes.eyes_hem_od + '</td><td>' + eyes.eyes_nfl_od + '</td><td>' + eyes.eyes_per_od + '</td><td>' + eyes.eyes_cr_od + '</td></tr><tr><th>OS</th><td>' + eyes.eyes_gon_os + '</td><td>' + eyes.eyes_siz_os + '</td><td>' + eyes.eyes_cup_os + '</td><td>' + eyes.eyes_neu_os + '</td><td>' + eyes.eyes_hem_os + '</td><td>' + eyes.eyes_nfl_os + '</td><td>' + eyes.eyes_per_os + '</td><td>' + eyes.eyes_cr_os + '</td></tr></tbody></table></div></div>';

                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Goneoscopy</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="gon_print" value="1" id="gon_print" class="opto_print"';
                if(print_data != null && print_data.gon_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body" style="width:50%;"><table class="table table-bordered"><tbody><th style="width:20%;" colspan="3">OD</th></tr><tr><td style="border-right: 1px solid #ede6b9  !important;"><input class="form-control text-center" style="width:50%;margin-left: 153px;margin-bottom: 69px;" readonly value=' + gon.gon_od_1 + ' ><tr></tr></td><td style="border-right: 1px solid #ede6b9  !important;border-top: 1px solid #ede6b9  !important;border-bottom: 1px solid #ede6b9 !important;"><input class="form-control text-center" style="width:50%;float: left;" readonly value=' + gon.gon_od_2 + '></td><td style="border: 0px solid grey !important"><img src="<?php echo site_url('uploads/popup/14.png') ?>" class="img_cl" style="width: 172px;margin: -65px;"></td><td style="border-top: 1px solid #ede6b9  !important;border-bottom: 1px solid #ede6b9 !important;border-left: 0px solid !important;"><input readonly class="form-control text-center" style="width:146%;float: right;"  value=' + gon.gon_od_3 + '></td></tr><tr><td style="border-right: 1px solid #ede6b9  !important;border-top: 1px solid #ede6b9  !important;"><input class="form-control text-center" style="width:50%;margin-left: 153px;margin-top: 69px;" readonly value=' + gon.gon_od_4 + '><tr></tr></td></tbody></table><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + gon.gon_od_note + ''+ "&nbsp;" +'</td></tr></tbody></table></div><div class="panel-body" style="width:50%;margin-left: 534px;margin-top: -387px;"><table class="table table-bordered"><tbody><th style="width:20%;" colspan="3">OS</th></tr><tr><td style="border-right: 1px solid #ede6b9  !important;"><input class="form-control text-center" style="width:50%;margin-left: 153px;margin-bottom: 69px;" readonly value=' + gon.gon_os_1 + '><tr></tr></td><td style="border-right: 1px solid #ede6b9  !important;border-top: 1px solid #ede6b9  !important;border-bottom: 1px solid #ede6b9 !important;"><input class="form-control text-center" style="width:50%;float: left;" readonly value=' + gon.gon_os_2 + '></td><td style="border: 0px solid grey !important"><img src="<?php echo site_url('uploads/popup/14.png') ?>" class="img_cl" style="width: 172px;margin: -65px;"></td><td style="border-top: 1px solid #ede6b9  !important;border-bottom: 1px solid #ede6b9 !important;border-left: 0px solid !important;"><input class="form-control text-center" style="width:146%;float: right;" readonly value=' + gon.gon_os_3 + '></td></tr><tr><td style="border-right: 1px solid #ede6b9  !important;border-top: 1px solid #ede6b9  !important;"><input class="form-control text-center" style="width:50%;margin-left: 153px;margin-top: 69px;" readonly value=' + gon.gon_os_4 + '><tr></tr></td></tbody></table><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + gon.gon_os_note + ''+ "&nbsp;" +'</td></tr></tbody></table></div></div>';

                // if (orbit) {
                    html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Orbit and Adnexa</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="orbit_print" value="1" id="orbit_print" class="opto_print"';
                    if(print_data != null && print_data.orbit_print==1){html += 'checked';}
                    html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + orbit + '</td></tr></tbody></table></div></div>';
                // }

                
                // html += '<div class="panel panel-default"><div class="panel-heading">Diagnosis</div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th>OD</th><td>'+diagnosis.diagnosis_od+'</td></tr><tr><th>OS</th><td>'+diagnosis.diagnosis_os+'</td></tr></tbody></table></div></div>';
                html += '<div class="panel panel-default"><div class="panel-heading">Diagnosis<div style="float:right;padding-right:15px">Print <input type="checkbox"  name="diagnosis_print" value="1" id="diagnosis_print" class="opto_print"';
                if(print_data != null && print_data.diagnosis_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th>OD</th><td>'+diagnosis.diagnosis_od+'</td><td>'+diagnosis.diagnosis_fin_pro+'</td><td>'+diagnosis.diagnosis_od_os+'</td></tr><tr><th>OS</th><td>'+diagnosis.diagnosis_os+'</td><td>'+diagnosis.diagnosis_os_fin_pro+'</td><td>'+diagnosis.diagnosis_os_od_os+'</td></tr></tbody></table></div></div>';
                
                if (optometric_comments) {
                    html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px"> Plan of care</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="optocomments_print" value="1" id="optocomments_print" class="opto_print"';
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

var $this = $(this);

$.ajax({
    url: base_url + 'admin/optometry/printemr',
    type: "POST",
    data: {
        opd_id: opd_id
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

function atf_cyclo_close_btn_click()
{

    $("#autofillcyclo").modal('toggle');
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
    </script>