<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="box-tools pull-right mb-5">
                            <a  class="btn btn-primary btn-sm addMasterCategoryModal"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add_new_master_category'); ?></a>
                        </div>
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