<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <!--<div class="box-tools pull-right mb-5">-->
        <!--                    <a  class="btn btn-primary btn-sm addMasterCategoryModal" ><i class="fa fa-plus"></i> <?php echo $this->lang->line('add_new_master_category'); ?></a>-->
        <!--                </div>-->
            <?php $this->load->view('admin/master/master_tabs') ?>
            <div class="col-md-8">
                <div class="box box-primary" id="tachelist">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"><?php echo $title; ?></h3>
                        
                        
                        <div class="box-tools ">
                            <a  class="btn btn-primary btn-sm addMasterDataModal"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add'); ?></a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="mailbox-controls">
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"><?php echo $this->lang->line('medicine_category_list'); ?></div>
                            <table class="table table-striped table-bordered table-hover ajaxlist">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="">
                        <div class="mailbox-controls">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="addMasterCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-mid" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title modal_title">Add Category Master</h4>
            </div>
            <form id="formAddCategoryMasterData" action="#" method="post" accept-charset="utf-8">
                <div class="modal-body pt0 pb0">
                    <!-- <input type="hidden" name="master_type" id="master_type" class="master_type" value="" /> -->
                    <div class="ptt10">
                        <div class="form-group">
                            <input name="Id" type="hidden" class="form-control hdnId" id="hdnId" value="0" />
                            <label for="master_category"><?php echo $this->lang->line('name'); ?></label><small class="req"> *</small>
                            <input autofocus="" name="master_category" placeholder="" type="text" class="form-control master_category" id="master_category" value="" />
                        </div>
                    </div>
                </div>
                <!--./modal-body-->
                <div class="modal-footer">
                    <button type="submit" id="formaddcategorybtn" data-loading-text="<?php echo $this->lang->line('processing'); ?>" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                </div>
            </form>
        </div>
        <!--./row-->
    </div>
</div>

<!-- Add Prescription -->
<div class="modal fade" id="add_prescription" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog pup100" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="prescription_title"></h4>
            </div>
            <form id="form_prescription" accept-charset="utf-8" enctype="multipart/form-data" method="post">
                <div class="pup-scroll-area">
                    <div class="modal-body pt0 pb0">
                    </div>
                    <!--./modal-body-->
                </div>
                <div class="modal-footer sticky-footer">
                    <div class="pull-right">
                        <!-- <button type="submit" name="save_print" value="save_print" data-loading-text="<?php echo $this->lang->line('processing'); ?>" class="btn btn-info"><i class="fa fa-print"></i> <?php echo $this->lang->line('save_print'); ?>
                        </button> -->
                        <button type="submit" name="save" value="save" data-loading-text="<?php echo $this->lang->line('processing'); ?>" class="btn btn-info"><i class="fa fa-check-circle"></i> <?php echo $this->lang->line('save'); ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- Add Prescription -->


<!-- -->
<div class="modal fade" id="prescriptionview" tabindex="-1" role="dialog" aria-labelledby="follow_up">
    <div class="modal-dialog modal-mid modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <div class="modalicon">
                    <div id='edit_deleteprescription'>

                    </div>
                </div> -->
                <h4 class="modal-title"><?php echo $this->lang->line('prescription'); ?></h4>
            </div>
            <div class="scroll-area">
                <div class="modal-body pt0 pb0" id="getdetails_prescription">
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/master/addMasterModal');?>
<?php $this->load->view('admin/master/addMasterCategoryModal');?>

<script>
    $(document).ready(function(e) {
        $(document).on('click', '.addMasterDataModal', function(e) {
            e.preventDefault();
            $('.master_type').val('');
            var type = '<?php echo $this->uri->segment(3);?>';
            $('.master_type').val(type);
            $('#addMasterDataModal').modal('toggle');
            $('.master_name').val('');
            $('.hdnId').val('0');
        });

        // my category code 

        $(document).on('click', '.addMasterCategoryModal', function(e) {
            e.preventDefault();
            // $('.master_type').val('');
            var type = '<?php echo $this->uri->segment(3);?>';
            // $('.master_type').val(type);
            $('#addMasterCategoryModal').modal('toggle');
            $('.master_category').val('');
            $('.hdnId').val('0');

        });
        $('#formAddCategoryMasterData').on('submit', (function(e) {
            $("#formaddcategorybtn").button('loading');
            e.preventDefault();
            var id = $('.hdnId').val();
            var masterkey = $.trim($('.master_category').val().toLowerCase());
            var mastercategory = $.trim($('.master_category').val());
            var type = $.trim($('.master_type').val());

            // if (type == "") {
            //     $('#addMasterCategoryModal').modal('toggle');
            //     errorMsg('Something Went wrong..');
            //     return false;
            // }
            $.ajax({
                url: baseurl + "admin/admin/saveMasterCategoryData",
                type: "POST",
                data: {
                    'id': id,
                    'masterkey': masterkey,
                    'mastercategory': mastercategory,
                    'type': type
                },
                dataType: 'json',
                success: function(data) {
                    if (data.flag == "1") {
                        successMsg(data.msg);
                        location.reload();
                        $('#addMasterCategoryModal').modal('toggle');
                    } else if (data.flag == "2") {
                        $('#addMasterCategoryModal').modal('toggle');
                        errorMsg("Data is already Present");
                    } else {
                        $('#addMasterCategoryModal').modal('toggle');
                        errorMsg(data.message);
                        //window.location.reload(true);
                    }
                    $("#formaddcategorybtn").button('reset');
                },
                error: function() {

                }
            });


        }));
        $('#formAddMasterData').on('submit', (function(e) {
            $("#formaddbtn").button('loading');
            e.preventDefault();
            var id = $('.hdnId').val();
            var masterkey = $.trim($('.master_name').val().toLowerCase());
            var mastername = $.trim($('.master_name').val());
            var type = $.trim($('.master_type').val());
            if (type == "") {
                $('#addMasterDataModal').modal('toggle');
                errorMsg('Something Went wrong..');
                return false;
            }
            $.ajax({
                url: baseurl + "admin/admin/saveMasterData",
                type: "POST",
                data: {
                    'id': id,
                    'masterkey': masterkey,
                    'mastername': mastername,
                    'type': type
                },
                dataType: 'json',
                success: function(data) {
                    if (data.flag == "1") {
                        successMsg(data.msg);
                        initDatatable('ajaxlist', 'admin/admin/getMasterData/<?php echo $this->uri->segment(3); ?>', [], [], 100);
                        $('#addMasterDataModal').modal('toggle');
                    } else if (data.flag == "2") {
                        $('#addMasterDataModal').modal('toggle');
                        errorMsg("Data is already Present");
                    } else {
                        $('#addMasterDataModal').modal('toggle');
                        errorMsg(data.message);
                        //window.location.reload(true);
                    }
                    $("#formaddbtn").button('reset');
                },
                error: function() {

                }
            });


        }));
        $(document).on('click', '.btnDeleteMaster', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (confirm('Do you really want to delete ..?')) {
                $.ajax({
                    url: baseurl + "admin/admin/deleteMasterData",
                    type: "POST",
                    data: {
                        'id': id
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.flag == 1) {
                            successMsg(data.msg);
                            initDatatable('ajaxlist', 'admin/admin/getMasterData/<?php echo $this->uri->segment(3); ?>', [], [], 100);
                        } else {
                            errorMsg(data.msg)
                        }
                    }
                })
            }
        })
        $(document).on('click', '.btnEditMaster', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            
            $.ajax({
                url: baseurl + "admin/admin/getSingleMasterData",
                type: "POST",
                data: {
                    'id': id
                },
                dataType: 'json',
                success: function(data) {
                    if (data.flag == 1) {
                        $('#addMasterDataModal').modal('toggle');
                        $('.hdnId').val(data.data.id);
                        $('.master_name').val(data.data.master_value);
                    } else {
                        errorMsg(data.msg)
                    }
                }
            })
        })

    });


</script>


<script type="text/javascript">
    (function($) {
        'use strict';
        $(document).ready(function() {
            initDatatable('ajaxlist', 'admin/admin/getMasterData/<?php echo $this->uri->segment(3); ?>', [], [], 100);
        });
    }(jQuery))
</script>

<!-- Added by chitranjan-->
<script type="text/javascript">
var prescription_rows = 2;

$(document).on('click', '.add-record', function() {

var rowCount = $('#tableID tr').length;

// var prescription_rows=rowCount+1;
var cat_row = "";
var medicine_row = "";
var dose_row = "";
var dose_interval_row = "";
var dose_duration_row = "";
var instruction_row = "";
var closebtn_row = "";
if (rowCount == 0) {
    cat_row = "<label><?php echo $this->lang->line('medicine_category'); ?></label>";
    medicine_row = "<label><?php echo $this->lang->line('medicine'); ?></label>";
    dose_row = " <label><?php echo $this->lang->line("dose"); ?></label>";
    dose_interval_row = " <label><?php echo $this->lang->line("dose_interval"); ?></label>";
    dose_duration_row = " <label><?php echo $this->lang->line("dose_duration"); ?></label>";
    instruction_row = " <label><?php echo $this->lang->line("instruction"); ?></label>";
    closebtn_row = " <label>&nbsp;</label>";
}

var div = "<input type='hidden' name='rows[]' value='" + prescription_rows + "' autocomplete='off'><div id=row1><div class='col-lg-2 col-md-4 col-sm-6 col-xs-6'><div col-sm-2 col-xs-6 '>" + cat_row + " <select class='form-control select2 medicine_category'  name='medicine_cat_" + prescription_rows + "'  id='medicine_cat" + prescription_rows + "'><option value='<?php echo set_value('medicine_category_id'); ?>'><?php echo $this->lang->line('select'); ?></option><?php foreach ($medicineCategory as $dkey => $dvalue) { ?><option value='<?php echo $dvalue["id"]; ?>'><?php echo $dvalue["medicine_category"] ?></option><?php } ?></select></div></div><div class='col-lg-2 col-md-4 col-sm-6 col-xs-6'><div>" + medicine_row + " <select class='form-control select2 medicine_name' data-rowId='" + prescription_rows + "'  name='medicine_" + prescription_rows + "' id='search-query" + prescription_rows + "'><option value='l'><?php echo $this->lang->line('select') ?></option></select><small id='stock_info_" + prescription_rows + "''> </small></div></div><div class='col-lg-2 col-md-4 col-sm-6 col-xs-6'><div>" + dose_row + "<select  class='form-control select2 medicine_dosage' name='dosage_" + prescription_rows + "' id='search-dosage" + prescription_rows + "'><option value='l'><?php echo $this->lang->line('select'); ?></option></select></div></div><div class='col-lg-2 col-md-4 col-sm-6 col-xs-6'><div>" + dose_interval_row + "<select  class='form-control select2 interval_dosage' name='interval_dosage_" + prescription_rows + "' id='search-interval-dosage" + prescription_rows + "'><option value='<?php echo set_value('interval_dosage_id'); ?>'><?php echo $this->lang->line('select'); ?></option><?php foreach ($intervaldosage as $dkey => $dvalue) { ?><option value='<?php echo $dvalue["id"]; ?>'><?php echo $dvalue["name"] ?></option><?php } ?></select></div></div><div class='col-lg-2 col-md-4 col-sm-6 col-xs-6'><div> " + dose_duration_row + "<select class='form-control select2 duration_dosage' name='duration_dosage_" + prescription_rows + "' id='search-duration-dosage" + prescription_rows + "'><option value='<?php echo set_value('duration_dosage_id'); ?>'><?php echo $this->lang->line('select') ?></option><?php foreach ($durationdosage as $dkey => $dvalue) { ?><option value='<?php echo $dvalue["id"]; ?>'><?php echo $dvalue["name"] ?></option><?php } ?></select></div></div><div class='col-lg-2 col-md-4 col-sm-6 col-xs-6'><div>" + instruction_row + "<textarea style='height:28px' name='instruction_" + prescription_rows + "' class=form-control id=description></textarea></div></div></div>";

var row = "<tr id='row" + prescription_rows + "'><td>" + div + "</td><td>" + closebtn_row + "<button type='button' onclick='delete_row(" + prescription_rows + ")' data-row-id='" + prescription_rows + "' class='closebtn delete_row'><i class='fa fa-remove'></i></button></td></tr>";
$('#tableID').append(row).find('.select2').select2();
prescription_rows++;
});

    function getRecord_id(medicine_type) {

            $('#prescription_title').html('<?php echo $this->lang->line('add_prescription'); ?>');
            $.ajax({
                url: base_url + 'admin/prescription/addTemplatePrescription',
                dataType: 'JSON',
                data: {
                    'medicine_type': medicine_type
                },
                type: "POST",
                beforeSend: function() {},
                success: function(res) {
                    $('.modal-body', "#add_prescription").html(res.page);
                    $('.modal-body', "#add_prescription").find('table').find('.select2').select2();
                    $('.modal-body', "#add_prescription").find('.multiselect2').select2({
                        placeholder: 'Select',
                        allowClear: false,
                        minimumResultsForSearch: 2
                    });
                    $('#add_prescription').modal('show');
                
                },

                complete: function() {
                    $("#compose-textareass,#compose-textareaneww").wysihtml5({
                        toolbar: {
                            "image": false,
                        }
                    });
                },
                error: function(xhr) { // if error occured
                    alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");


                }
            });
     }


    function delete_row(id) {
        var table = document.getElementById("tableID");
        var rowCount = table.rows.length;
        $("#row" + id).html("");

    }
    $(document).on('click', '.delete_row', function(e) {

        var del_row_id = $(this).data('rowId');
        var del_record_id = $(this).data('recordId');
        var result = confirm("<?php echo $this->lang->line('delete_confirm') ?>");

        if (result) {
            $("#row" + del_row_id).remove();
        }

    });

    $(document).on('select2:select', '.medicine_category', function() {
        getMedicine($(this), $(this).val(), 0);
        selected_medicine_category_id = $(this).val();
        var medicine_dosage = getDosages(selected_medicine_category_id);
        $(this).closest('tr').find('.medicine_dosage').html(medicine_dosage);

    });

    function getMedicine(med_cat_obj, val, medicine_id) {

        var medicine_colomn = med_cat_obj.closest('tr').find('.medicine_name');
        medicine_colomn.html("");
        $.ajax({
            url: '<?php echo base_url(); ?>admin/pharmacy/get_medicine_name',
            type: "POST",
            data: {
                medicine_category_id: val
            },
            dataType: 'json',
            beforeSend: function() {
                medicine_colomn.html("<option value=''><?php echo $this->lang->line('select') ?></option>");

            },
            success: function(res) {
                var div_data = "<option value=''><?php echo $this->lang->line('select') ?></option>";
                $.each(res, function(i, obj) {
                    var sel = "";
                    if (medicine_id == obj.id) {
                        sel = "selected";
                    }
                    div_data += "<option value=" + obj.id + " " + sel + ">" + obj.medicine_name + "</option>";

                });

                medicine_colomn.html(div_data);
                medicine_colomn.select2("val", medicine_id);

            }
        });
    }



    $(document).on('select2:select', '.medicine_name', function() {

            var row_id_val = $(this).data('rowid');
            $.ajax({
                type: "POST",
                url: base_url + "admin/pharmacy/get_medicine_stockinfo",
                data: {
                    'pharmacy_id': $(this).val()
                },
                dataType: 'json',
                success: function(res) {
                    $('#stock_info_' + row_id_val).html(res);
                }
            });

    });


function getDosages(medicine_category_id) {
        var dosage_opt = "<option value=''><?php echo $this->lang->line('select') ?></option>";
        var sss = '<?php echo json_encode($category_dosage); ?>';
        var aaa = JSON.parse(sss);

        if (aaa[medicine_category_id]) {
            $.each(aaa[medicine_category_id], function(key, item) {
                dosage_opt += "<option value='" + item.id + "'>" + item.dosage + "" + item.unit + "</option>";
            });

        }
        return dosage_opt;
    }



    $(document).ready(function(e) {
        $("form#form_prescription button[type=submit]").click(function() {
            $("button[type=submit]", $(this).parents("form")).removeAttr("clicked");
            $(this).attr("clicked", "true");
        });

        $("#form_prescription").on('submit', (function(e) {


            var sub_btn_clicked = $("button[type=submit][clicked=true]");
            e.preventDefault();
            //console.log(presc_selected_complaints);
            //return false;
            var formdata = new FormData(this);
            $.ajax({
                url: '<?php echo base_url(); ?>admin/patient/add_template_prescription',
                type: "POST",
                data: formdata,
                dataType: 'json',
                contentType: false,
                //cache: false,
                processData: false,
                beforeSend: function() {
                    sub_btn_clicked.button('loading');
                },
                success: function(data) {
                    if (data.status == "0") {
                        var message = "";
                        $.each(data.error, function(index, value) {
                            message += value;
                        });
                        errorMsg(message);
                    } else {
                        successMsg(data.message);
                        $('#add_prescription').modal('hide');
                        $('.ajaxlist').DataTable().ajax.reload();
                    }
                    sub_btn_clicked.button('reset');
                },
                error: function(xhr) { // if error occured
                    alert("Error occured.please try again");
                    sub_btn_clicked.button('reset');
                },
                complete: function() {
                    sub_btn_clicked.button('reset');
                }
            });
        }));
    });



    function view_prescription(template_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/prescription/getTemplatePrescription/' + template_id,
            success: function(res) {
                //alert(res);
                $("#getdetails_prescription").html(res);

            },
            error: function() {
                alert("<?php echo $this->lang->line('fail'); ?>")
            }
        });
        holdModal('prescriptionview');
    }

    function holdModal(modalId) {
        $('#' + modalId).modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    }

</script>
