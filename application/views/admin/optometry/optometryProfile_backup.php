<!-- raju -->
<style type="text/css">
    .view_optometry .panel-heading {
        font-size: 20px !important;
        font-weight: bolder !important;
        color: #293faf;
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
        font-size: 20px;
        font-weight: bolder;
        color: #293faf;
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
    .auto_fill{
         font-size: 16px;
        color: white !important;
         padding-right: 5px !important;
    }
    #form_optometry .panel-heading {
        background: #829079 !important;
        font-size: 16px;
    }
    th{
        text-align: center;
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

    /* #form_optometry .od_complaints{
  border: 1px solid #293faf;
  min-height: 200px;
}
#form_optometry .os_complaints{
  border: 1px solid #293faf;
  min-height: 200px;
} */
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
                        <div class="panel panel-default">
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
                                            <div class="col-md-6">
                                                <h4 class="text-center">OD</h4>
                                                <div class="od_complaints text-center">
                                                    <ul class="list-group">

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="text-center">OS</h4>
                                                <div class="os_complaints">
                                                    <ul class="list-group">

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
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
                                                    Condition</label>
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
                                            <th>EOM</th>
                                            <th>Tropia</th>

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
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
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
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
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
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name='pgp_od_eom' id="pgp_od_eom" class="form-control  pgp_od_eom">
                                            </td>
                                            <td>
                                                <input type="text" name='pgp_od_tropia' id="pgp_od_tropia" class="form-control  pgp_od_tropia">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="head">OS</th>
                                            <td><select type="text" name='pgp_os_sph' id="pgp_os_sph" class="form-control select2 pgp_os_sph" style="width:100%">
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
                                                </select></td>
                                            <td>
                                                <select type="text" name='pgp_os_cyl' id="pgp_os_cyl" class="form-control select2 pgp_os_cyl" style="width:100%">
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
                                                            <?php echo $dvalue->value; ?>
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="pgp_os_eom" id="pgp_os_eom" class="pgp_os_eom form-control" />
                                            </td>
                                            <td>
                                                <input type="text" name="pgp_os_tropia" id="pgp_os_tropia" class="pgp_os_tropia form-control" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                                            <th>VA</th>
                                            <th>ADD</th>
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
                                                            <?php echo $dvalue->value; ?>
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
                                                            <?php echo $dvalue->value; ?>
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
                                                <input type="text" name='accp_od_va' id="accp_od_va" class="form-control  accp_od_va" style="width:100%">
                                            </td>
                                            <td>
                                                <select name='accp_od_add' id="accp_od_add" class="form-control select2 accp_od_add" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->add as $dkey => $dvalue) {
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
                                                    ?>
                                                        <option value="<?php echo $dvalue->value; ?>">
                                                            <?php echo $dvalue->value; ?>
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
                                                            <?php echo $dvalue->value; ?>
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
                                                <input type="text" name='accp_os_va' id="accp_os_va" class="form-control  accp_os_va" style="width:100%">
                                            </td>
                                            <td>
                                                <select name='accp_os_add' id="accp_os_add" class="form-control select2 accp_os_add" style="width:100%">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($optometry_options->add as $dkey => $dvalue) {
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
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Ant Segment
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_ant_segment">
                                    <thead>
                                        <tr>
                                            <th class="head" style="width: 5%;">&nbsp;</th>
                                            <th>Lids</th>
                                            <th>Sclera</th>
                                            <th>Conjuctiva</th>
                                            <th>Cornea</th>
                                            <th>A.C</th>
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
                                                <input type="text" name='as_od_sclera' id="as_od_sclera" class="form-control  as_od_sclera" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_od_conjuctiva' id="as_od_conjuctiva" class="form-control  as_od_conjuctiva" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_od_cornea' id="as_od_cornea" class="form-control  as_od_cornea" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_od_ac' id="as_od_ac" class="form-control  as_od_ac" style="width:100%">
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
                                                <input type="text" name='as_os_sclera' id="as_os_sclera" class="form-control  as_os_sclera" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_os_conjuctiva' id="as_os_conjuctiva" class="form-control  as_os_conjuctiva" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_os_cornea' id="as_os_cornea" class="form-control  as_os_cornea" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_os_ac' id="as_os_ac" class="form-control  as_os_ac" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_os_pupil' id="as_os_pupil" class="form-control  as_os_pupil" style="width:100%">
                                            </td>
                                            <td>
                                                <input type="text" name='as_os_lens' id="as_os_lens" class="form-control  as_os_lens" style="width:100%">
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading my_class">
                                Post Segment
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table_ant_segment">
                                    <thead>
                                        <tr>
                                            <th class="head" style="width: 5%;">&nbsp;</th>
                                            <th>Fundus</th>
                                            <th>Cup/Disc</th>
                                            <th>Macula</th>
                                            <th>Vessels</th>
                                            <th>IOP(mm in Hg)</th>

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
                                    </tbody>

                                </table>
                            </div>
                        </div>

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
                                                <textarea name='diagnosis_od' id="diagnosis_od" class="form-control  diagnosis_od" style="width:100%"></textarea/>
                                </td>
                              </tr>
                              <tr>
                                <th>OS</th>
                                <td>
                                  <textarea  name='diagnosis_os' id="diagnosis_os" class="form-control  diagnosis_os" style="width:100%"></textarea/>
                                </td>
                              </tr>
                            </tbody>

                          </table>
                    </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading my_class">
                          Optometric Comments
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

            <div class="modal-body pt0 pb0">                
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
                            <table class="table table-striped table-bordered">
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
														echo "<span class='atf_v_span' onclick=\"select_value('sph_selected_val',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
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
                                                    echo "<span class='atf_v_span' onclick=\"select_value('cyl_selected_val',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
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
                                                        echo "<span class='atf_v_span' onclick=\"select_value('add_selected_val',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
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
                            <table class="table table-striped table-bordered">
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

            <div class="modal-body pt0 pb0">                
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
                            <table class="table table-striped table-bordered">
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
                            <table class="table table-striped table-bordered">
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

            <div class="modal-body pt0 pb0">                
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
                            <table class="table table-striped table-bordered">
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
                                                    echo "<span class='atf_v_span' onclick=\"select_value_dry('sph_selected_val_dry',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
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
                                                    echo "<span class='atf_v_span' onclick=\"select_value_dry('cyl_selected_val_dry',{$ii})\">+".number_format((float)$ii, 2, '.', '')."</span>"; 
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
                            <table class="table table-striped table-bordered">
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

            <div class="modal-body pt0 pb0">                
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
                            <table class="table table-striped table-bordered">
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
                            <table class="table table-striped table-bordered">
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

            <div class="modal-body pt0 pb0">                
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
                            <table class="table table-striped table-bordered">
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
                            <table class="table table-striped table-bordered">
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
<script>
    $(document).ready(function() {

        $('#form_optometry').on('submit', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var formdata = new FormData(this);
            formdata.append('odcomplaints', JSON.stringify(od_complaints));
            formdata.append('oscomplaints', JSON.stringify(os_complaints));
            formdata.append('selected_complaints', JSON.stringify(selected_complaints));
            $.ajax({
                url: baseurl + "admin/optometry/addOptimetryData",
                type: 'POST',
                data: formdata,
                //dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {

                    var id = "<?php echo $this->uri->segment(4); ?>";
                    initDatatable('ajaxlistvisit', 'admin/patient/getopdvisitdatatable/' + id);
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
            html += '<div class="col-md-2"><div class="form-group"><label for=" ">Condition</label><div><input type="text" name="condition[]" id="condition" class="form-control select2 condition" style="width:100%"></div></div></div>';
            var deleteH = "deleteHistory('" + strR + "')";
            html += '<div class="col-md-1"><div style="padding-top:27px;" onclick="' + deleteH + '"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></div></div>';
            html += '</div>';
            $('.history_container').append(html);
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
                    var vision = result.vision_data;
                    var dryretinoscopy = result.dryretinoscopy_data;
                    var cyclo = result.cyclo_data;
                    var acceptance = result.acceptance_data;
                    var antsegment = result.antsegment_data;
                    var postsegment = result.postsegment_data;
                    var diagnosis = result.diagnosis_data;
                    var history_data = result.history_data;
                    var optometric_comments = result.optometric_comments;
                    var data = [pgp, vision, dryretinoscopy, cyclo, acceptance, antsegment, postsegment, diagnosis];
                    var complaintdata = JSON.parse(result.complaints_data);
                    os_complaints = JSON.parse(complaintdata.os)
                    od_complaints = JSON.parse(complaintdata.od)
                    selected_complaints = JSON.parse(complaintdata.selected_complaints)
                    $('#view_optometry').modal('toggle');
                    $('#add_optometry').modal('toggle');
                    $('#optometry_id').val(result.id);
                    $('#opd_id').val(result.opd_id);
                    getComplaintData();
                    var od_div = "";
                    $.each(JSON.parse(complaintdata.od), function(key, val) {
                        od_div += '<li class="list-group-item ' + key + '_list">' + val + '<span class="list_complaint_trash"><i class="fa fa-trash"></i></span></li>';
                    })
                    $('.od_complaints ul').empty().html(od_div);
                    var os_div = "";
                    $.each(JSON.parse(complaintdata.os), function(key, val) {
                        os_div += '<li class="list-group-item ' + key + '_list">' + val + '<span class="list_complaint_trash"><i class="fa fa-trash"></i></span></li>';
                    })
                    $('.os_complaints ul').empty().html(os_div);
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
                    $('.optometric_comments').empty().val(optometric_comments);
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


        $(document).on("keyup", '#compalint_search', function(e) {
            e.preventDefault();
            var search = $('#compalint_search').val();
            getComplaintData(search);
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

    function getRecord_emr(opd) {
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

    function getComplaintData(search = null) {
        var searchval = $.trim(search);
        if (searchval !== "") {
            searchval = searchval
        } else {
            searchval = "";
        }
        $.ajax({
            url: baseurl + "admin/optometry/get_complaints_data",
            type: 'POST',
            data: {
                'search': searchval
            },
            dataType: 'json',
            success: function(data) {
                var html = '<ul class="list-group">';
                $.each(data, function(key, val) {
                    var onclickOdFunction = "complaintMake('od','" + val.master_key + "','" + val.master_value + "')";
                    var onclickOsFunction = "complaintMake('os','" + val.master_key + "','" + val.master_value + "')";
                    var onclickBothFunction = "complaintMake('both','" + val.master_key + "','" + val.master_value + "')";
                    html += '<li class="list-group-item">';
                    html += '<div class="row">';
                    html += '<div class="col-md-7" style="text-align:left">' + val.master_value + '</div>';
                    html += '<div class="col-md-5" style="text-align:right">';
                    if (selected_complaints[val.master_key] == "od") {
                        html += '<label><input type="radio" id="' + val.master_key + '" name="' + val.master_key + '" class="chk" checked onClick="' + onclickOdFunction + '" />OD</label> &nbsp;';
                    } else {
                        html += '<label><input type="radio" id="' + val.master_key + '" name="' + val.master_key + '" class="chk" onClick="' + onclickOdFunction + '" />OD</label> &nbsp;';
                    }
                    if (selected_complaints[val.master_key] == "os") {
                        html += '<label><input type="radio" id="' + val.master_key + '" name="' + val.master_key + '" class="chk" checked onClick="' + onclickOsFunction + '"/>OS</label> &nbsp;';
                    } else {
                        html += '<label><input type="radio" id="' + val.master_key + '" name="' + val.master_key + '" class="chk" onClick="' + onclickOsFunction + '"/>OS</label> &nbsp;';
                    }
                    if (selected_complaints[val.master_key] == "both") {
                        html += '<label><input type="radio" id="' + val.master_key + '" class="chk" name="' + val.master_key + '" checked onClick="' + onclickBothFunction + '"   />Both</label>';
                    } else {
                        html += '<label><input type="radio" id="' + val.master_key + '" class="chk" name="' + val.master_key + '" onClick="' + onclickBothFunction + '"   />Both</label>';
                    }
                    html += '</div>';
                    html += '</div>';
                    html += '</li>';
                })
                html += '</ul>'
                $('.complaint_data').html(html);
            }
        })

    }

    var os_complaints = {};
    var od_complaints = {};
    var selected_complaints = {};

    function complaintMake(indicator, key, value) {
        selected_complaints[key] = indicator;
        if (indicator == "od") {
            if (key in os_complaints) {
                delete os_complaints[key];
            }
            od_complaints[key] = value;
        }
        if (indicator == "os") {
            if (key in od_complaints) {
                delete od_complaints[key];
            }
            os_complaints[key] = value;
        }
        if (indicator == "both") {
            if (key in os_complaints && key in od_complaints) {

            } else if (!key in os_complaints && key in od_complaints) {
                os_complaints[key] = value;
            } else if (key in os_complaints && !key in od_complaints) {
                od_complaints[key] = value;
            } else {
                od_complaints[key] = value;
                os_complaints[key] = value;
            }
        }

        var od_html = "";
        $.each(od_complaints, function(od_key, od_value) {
            var param = "'" + od_key + "','od'";
            od_html += '<li class="list-group-item ' + od_key + '_list">' + od_value + '<span class="list_complaint_trash" onclick="deleteComplaint(' + param + ')"><i class="fa fa-trash"></i></span></li>';
        });
        $('.od_complaints ul').html(od_html);
        var os_html = "";
        $.each(os_complaints, function(os_key, os_value) {
            os_html += '<li class="list-group-item ' + os_key + '_list">' + os_value + '<span class="list_complaint_trash"><i class="fa fa-trash"></i></span></li>';
        })
        $('.os_complaints ul').html(os_html);

    }

    function deleteComplaint(key, comtype) {
        if (key in os_complaints && key in od_complaints) {
            if (comtype == "od") {
                delete od_complaints[key];

            } else {
                delete os_complaints[key];
            }
        }
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
                var vision = result.vision_data;
                var dryretinoscopy = result.dryretinoscopy_data;
                var cyclo = result.cyclo_data;
                var acceptance = result.acceptance_data;
                var antsegment = result.antsegment_data;
                var postsegment = result.postsegment_data;
                var optometric_comments = result.optometric_comments;
                var diagnosis = result.diagnosis_data;
                var history_data = result.history_data;
                var print_data = result.print_data;
                // console.log(print_data);
                // $.each(print_data,function(key,val){
                //   if(val==1){
                //     $("#"+key).attr("checked", true);
                //     $('#'+key).prop('checked',true);
                //   }else{
                //     $("#"+key).removeAttr("checked");
                //     $('#'+key).prop('checked',false);
                //   }
                // })
                var complaintdata = JSON.parse(result.complaints_data);
                var html = "";
                html += '<div  class="col-md-12"><div style="float:right"><button class="btn btn-primary editOptometry" data-id="' + result.id + '">Edit</button> &nbsp;<button class="btn btn-primary print_emr" data-id="' + result.id + '">Print</button></div></div><br><br>';
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Complaints</div><div style="float:right;padding-right:15px">Print <input type="checkbox" name="complaints_print" id="complaints_print" class="opto_print" value="1"';
                if(print_data.complaints_print==1){html += 'checked';}
                html += ' /></div><br></div><div class="panel-body">';
                html += '<div class="col-md-6">';
                html += '<h3 class="text-center">OD</h3>';
                html += '<ul class="list-group">'
                $.each(JSON.parse(complaintdata.od), function(key, val) {
                    html += '<li class="list-group-item">' + val + '</li>';
                })
                html += '</ul>';
                html += '</div>';
                html += '<div class="col-md-6">';
                html += '<h3 class="text-center">OS</h3>';
                html += '<ul class="list-group">';
                $.each(JSON.parse(complaintdata.os), function(key, val) {
                    html += '<li class="list-group-item">' + val + '</li>';
                })
                html += '</ul>';
                html += '</div>';
                html += '</div></div>';
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">History</div><div style="float:right;padding-right:15px">Print <input type="checkbox" name="history_print" value="1" id="history_print" class="opto_print"';
                if(print_data.history_print==1){html += 'checked';}
                html += ' /></div></div><div class="panel-body"><table class="table table-bordered"><thead><tr><th>Tx/Sx</th><th>Duration</th><th>Medication</th><th>Condition</th></tr></thead><tbody>';
                $.each(history_data, function(key, val) {
                    html += '<tr><td>' + val.disease + '</td><td>' + val.duration + '</td><td>' + val.medication + '</td><td>' + val.condition + '</td></tr>';
                })
                html += '</tbody></table></div></div>'
                html += '<br>';
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">PGP</div><div style="float:right;padding-right:15px">Print <input type="checkbox" name="pgp_print" value="1" id="pgp_print" class="opto_print"';
                if(print_data.pgp_print==1){html += 'checked';}
                html += ' /></div></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th>PGP</th><th>SPH</th><th>Cyl</th><th>Axis</th><th>ADD</th><th>EOM</th><th>Tropia</th></tr><tr><th>OD</th><td>' + pgp.pgp_od_sph + '</td><td>' + pgp.pgp_od_cyl + '</td><td>' + pgp.pgp_od_axis + '</td><td>' + pgp.pgp_od_add + '</td><td>' + pgp.pgp_od_eom + '</td><td>' + pgp.pgp_od_tropia + '</td></tr><tr><th>OS</th><td>' + pgp.pgp_os_sph + '</td><td>' + pgp.pgp_os_cyl + '</td><td>' + pgp.pgp_os_axis + '</td><td>' + pgp.pgp_os_add + '</td><td>' + pgp.pgp_os_eom + '</td><td>' + pgp.pgp_os_tropia + '</td></tr></tbody></table></div></div>';
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Visions</div><div style="float:right;padding-right:15px">Print <input type="checkbox" value="1" name="vision_print" id="vision_print" class="opto_print"';
                if(print_data.vision_print==1){html += 'checked';}
                html += ' /></div></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th colspan="3">Distance Vision</th><th colspan="2">Near Vision</th></tr><tr><td>&nbsp;</td><td>Presenting</td><td>Pinhole</td><td>Presenting</td></tr><tr><td>OD</td><td>' + vision.vision_od_presenting + '</td><td>' + vision.vision_od_pinhole + '</td><td colspan="2">' + vision.vision_od_near_presenting + '</td></tr><tr><td>OS</td><td>' + vision.vision_os_presenting + '</td><td>' + vision.vision_os_pinhole + '</td><td colspan="2">' + vision.vision_os_near_presenting + '</td></tr></tbody></table></div></div>';
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Retinoscopy</div><div style="float:right;padding-right:15px">Print <input type="checkbox" value="1" name="retinoscope_print" id="retinoscope_print" class="opto_print"';
                if(print_data.retinoscope_print==1){html += 'checked';}
                html += ' /></div></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th>Dry Retinoscope</th><td>SPH</td><td>Cyl</td><td>Axis</td></tr><tr><th>OD</th><td>' + dryretinoscopy.drs_od_sph + '</td><td>' + dryretinoscopy.drs_od_cyl + '</td><td>' + dryretinoscopy.drs_od_axis + '</td></tr><tr><th>OS</th><td>' + dryretinoscopy.drs_od_sph + '</td><td>' + dryretinoscopy.drs_od_cyl + '</td><td>' + dryretinoscopy.drs_os_axis + '</td></tr></tbody></table></div></div>';
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Cylco</div><div style="float:right;padding-right:15px">Print <input type="checkbox" value="1" name="cylco_print" id="cylco_print" class="opto_print"';
                if(print_data.cylco_print==1){html += 'checked';}
                html += ' /></div></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th>Cylco</th><td>SPH</td><td>Cyl</td><td>Axis</td></tr><tr><th>OD</th><td>' + cyclo.cyclo_od_sph + '</td><td>' + cyclo.cyclo_od_cyl + '</td><td>' + cyclo.cyclo_od_axis + '</td></tr><tr><th>OS</th><td>' + cyclo.cyclo_os_sph + '</td><td>' + cyclo.cyclo_os_cyl + '</td><td>' + cyclo.cyclo_os_axis + '</td></tr></tbody></table></div></div>';
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Acceptance</div><div style="float:right;padding-right:15px">Print <input type="checkbox" name="acceptance_print" value="1" id="acceptance_print" class="opto_print"';
                if(print_data.acceptance_print==1){html += 'checked';}
                html += ' /></div></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th>Acceptance</th><td>SPH</td><td>Cyl</td><td>Axis</td><td>VA</td><th>ADD</th></tr><tr><th>OD</th><td>' + acceptance.accp_od_sph + '</td><td>' + acceptance.accp_od_cyl + '</td><td>' + acceptance.accp_od_axis + '</td><td>' + acceptance.accp_od_va + '</td><td>' + acceptance.accp_od_add + '</td></tr><tr><th>OS</th><td>' + acceptance.accp_os_sph + '</td><td>' + acceptance.accp_os_cyl + '</td><td>' + acceptance.accp_os_axis + '</td><td>' + acceptance.accp_os_va + '</td><td>' + acceptance.accp_os_add + '</td></tr></tbody></table></div></div>';
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Ant Segments</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="antsegment_print" value="1" id="antsegment_print" class="opto_print"';
                if(print_data.antsegment_print==1){html += 'checked';}
                html += ' /></div></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th>Ant Segments</th><td>Lids</td><td>Sclera</td><td>Conjuctiva</td><td>Cornea</td><td>A.C</td><td>Pupil</td><td>Lens</td></tr><tr><th>OD</th><td>' + antsegment.as_od_lens + '</td><td>' + antsegment.as_od_sclera + '</td><td>' + antsegment.as_od_conjuctiva + '</td><td>' + antsegment.as_od_cornea + '</td><td>' + antsegment.as_od_ac + '</td><td>' + antsegment.as_od_pupil + '</td><td>' + antsegment.as_od_lens + '</td></tr><tr><th>OS</th><td>' + antsegment.as_os_lids + '</td><td>' + antsegment.as_os_sclera + '</td><td>' + antsegment.as_os_conjuctiva + '</td><td>' + antsegment.as_os_cornea + '</td><td>' + antsegment.as_os_ac + '</td><td>' + antsegment.as_os_pupil + '</td><td>' + antsegment.as_os_lens + '</td></tr></tbody></table></div></div>';
                html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Post Segments</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="postsegment_print" value="1" id="postsegment_print" class="opto_print"';
                if(print_data.postsegment_print==1){html += 'checked';}
                html += ' /></div></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th>Post Segments</th><td>Fundus</td><td>Cup/DIsc</td><td>Macula</td><td>Vessels</td><td>IOP(mm in Hg)</td></tr><tr><th>OD</th><td>' + postsegment.ps_od_fundus + '</td><td>' + postsegment.ps_od_cupdisc + '</td><td>' + postsegment.ps_od_macula + '</td><td>' + postsegment.ps_od_vessels + '</td><td>' + postsegment.ps_od_iop + '</td></tr><tr><th>OS</th><td>' + postsegment.ps_os_fundus + '</td><td>' + postsegment.ps_os_cupdisc + '</td><td>' + postsegment.ps_os_macula + '</td><td>' + postsegment.ps_os_vessels + '</td><td>' + postsegment.ps_os_iop + '</td></tr></tbody></table></div></div>';
                // html += '<div class="panel panel-default"><div class="panel-heading">Diagnosis</div><div class="panel-body"><table class="table table-bordered"><tbody><tr><th>OD</th><td>'+diagnosis.diagnosis_od+'</td></tr><tr><th>OS</th><td>'+diagnosis.diagnosis_os+'</td></tr></tbody></table></div></div>';
                if (optometric_comments) {
                    html += '<div class="panel panel-default"><div class="panel-heading"><div style="float:left;padding-left:15px">Optometric Comments</div><div style="float:right;padding-right:15px">Print <input type="checkbox"  name="optocomments_print" value="1" id="optocomments_print" class="opto_print"';
                    if(print_data.optocomments_print==1){html += 'checked';}
                    html += ' /></div></div><div class="panel-body"><table class="table table-bordered"><tbody><tr><td style="text-align:left;padding-left:10px">' + optometric_comments + '</td></tr></tbody></table></div></div>';
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