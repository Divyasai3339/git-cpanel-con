<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();

?>
<!-- <style>
    table.dataTable tbody th.dt-body-right, table.dataTable tbody td.dt-body-right{
        text-align: left !important;
    }
</style>     -->
<script src="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row"> 
            <div class="col-md-12">
                <div class="box box-primary"> 
                    <div class="box-header with-border">
                         <h4><?php echo $this->lang->line('surgeries'); ?></h4>
                    </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="download_label"><?php
                                if ($title == 'old_patient') {
                                    echo $this->lang->line('opd_old_patient');
                                    ?>
                                    <?php
                                } else {
                                    echo $this->lang->line('opd_patient');
                                    ?>

                                <?php } ?>
                            </div>
                            <table class="table table-striped table-bordered table-hover aajaxlist" data-export-title="<?php echo $this->lang->line('opd_patient'); ?>">
                                <thead>
                                    <tr>
                                    <th><?php echo $this->lang->line('name') ?></th>
                                    <th><?php echo $this->lang->line('patient_id'); ?></th>
                                    <!-- <th><?php echo $this->lang->line('guardian_name') ?></th> -->
                                    <!-- <th><?php echo $this->lang->line('gender'); ?></th> -->
                                    <th><?php echo $this->lang->line('phone'); ?></th>
                                    <th><?php echo $this->lang->line('consultant'); ?></th>
                                    <th><?php echo $this->lang->line('last_visit'); ?></th>   
                                    <th><?php echo $this->lang->line('surgeries') ?></th>
                                    <th class="text-right noExport"><?php echo $this->lang->line('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>  
            </div>
        </div> 
    </section>
</div>



<!-- Surgeries Add-->

<div class="modal fade modaled" id="add_surgeries" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header modal_head">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title tit" id="optometry_title"><?php echo $this->lang->line('surgeries'); ?></h4>
            </div>
            <form id="form_surgeries" accept-charset="utf-8" enctype="multipart/form-data" method="post">
                <div class="">
                    <div class="modal-body  pb0 ">
                        <?php //var_dump($patient_data);die;
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id; ?>">
                                <input type="hidden" name="surgery_id" id="optometry_id" value="">
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="opd_id" id="opd_id" value="">
                                <input type="hidden" name="visit_id" id="visit_id" value="">
                            </div>
                        </div>
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Surgeon Name <small class="req"> *</small></label>
                                            <div>
                                                <input type="text" name="surgeon_name" id="surgeon_name" class="form-control" placeholder="Surgeon Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Anesthetist Name</label>
                                            <div>
                                                <input type="text" name="anesthetist_name" id="anesthetist_name" class="form-control" placeholder="Anesthetist Name">
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Surgery Date <small class="req"> *</small></label>
                                            <div>
                                                <input type="date" name="surgery_date" id="surgery_date" class="form-control" placeholder="Surgery Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Charges</label>
                                            <div>
                                                <input type="text" name="charges" id="charges" class="form-control" placeholder="Charges">
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Lens details</label>
                                            <div>
                                                <textarea name="lens_details" id="lens_details" cols="30" rows="10" class="form-control" placeholder="Lens details"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div><!--End row-->

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
<!-- Surgeries Add-->

<!-- view surgery-->

<div class="modal fade" id="view_surgery" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="optometry_title">View Surgery Data</h4>
            </div>

            <div class="modal-body pt0 pb0">
                <input type="hidden" id="surgeryId" value="" />
                <div class="view_surgery">


                </div>




            </div>

        </div>
    </div>
</div>



<script type="text/javascript">
( function ( $ ) {
    'use strict';
    $(document).ready(function () {
        initDatatable('aajaxlist','admin/optometry/getSurgriesOptometryPatientsDataTable',[],[],100);
        
    });
} ( jQuery ) )



</script>


<script type="text/javascript">
    $(document).ready(function (e) {
        $("#form_surgeries").on('submit', (function (e) {
        let clicked_submit_btn= $(this).closest('form').find(':submit');
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/optometry/addsurgery',
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                 beforeSend: function() {
                 clicked_submit_btn.button('loading') ; 

                },
                success: function (data) {
                    if (data.status == "fail") {
                        var message = "";
                        $.each(data.error, function (index, value) {
                            message += value;
                        });
                        errorMsg(message);
                    } else {
                        successMsg(data.message);
                        
                        $("#add_surgeries").modal('toggle');
                       
                    }
                        clicked_submit_btn.button('reset'); 
                },
                 error: function(xhr) { // if error occured
        alert('<?php echo $this->lang->line("error_occurred_please_try_again"); ?>');

         clicked_submit_btn.button('reset') ; 
             },
    complete: function() {
     clicked_submit_btn.button('reset') ; 
    }
            });
        }));
    });

    </script>



<script>
    
    function popup(data) {
        var base_url = '<?php echo base_url() ?>';
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({
            "position": "absolute",
            "top": "-1000000px"
        });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/bootstrap/css/bootstrap.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/font-awesome.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/ionicons.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/AdminLTE.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/skins/_all-skins.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/iCheck/flat/blue.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/morris/morris.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/datepicker/datepicker3.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/daterangepicker/daterangepicker-bs3.css">');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function() {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();

        }, 500);

        return true;
    }

    function getRecord_counselling(opd,visit_id,patient_id='') {
        if(patient_id!=''){
            $('#patient_id').val(patient_id);
        }
        $('#opd_id').val(opd);
        $('#visit_id').val(visit_id);
        $('#opd_no').val("OPDN" + opd);
        $('#add_surgeries').modal('show');
        resetForm('form_surgeries');

    }


    function resetForm(id) {
        $("#" + id).trigger("reset");
        $('#' + id + " .select2").val('').trigger('change');

    }


    $(document).on('click', '.viewOptometryData', function(e) {
            //e.preventDefault();
            var opd = $(this).data('opd');
            var id = $(this).data('surgery_id');
            var visitid = $(this).data('visitid');
            getSurgeryData(id,visitid);

    })


function getSurgeryData(surgeryId,visitid="") {

$.ajax({
    url: "<?php echo base_url(); ?>admin/optometry/getSurgeryData/" + surgeryId,
    type: 'POST',
    data: {},
    dataType: 'json',
    success: function(data) {
        //console.log(JSON.stringify(data));
        var sresult = data.data;
        $('#view_surgery').modal('toggle');
        $('#surgeryId').val(surgeryId);
        $('.view_surgery').empty();
        var html = "";
        html += '<div  class="col-md-12"><div style="float:right"><button class="btn btn-primary editOptometry" data-id="' + sresult.id + '">Edit</button> &nbsp;<button class="btn btn-primary print_emr" data-id="' + sresult.id + '" data-visitid="' + visitid + '">Print</button></div></div><br><br>';
        html += '<div class="panel-body">';
        html += '<div class="row"><div class="col-lg-2"><b>Surgeon Name</b></div><div class="col-lg-4">'+sresult.surgeon_name+'</div><div class="col-lg-2"><b>Anesthetist Name</b></div><div class="col-lg-4">'+sresult.anesthetist_name+'</div></div>';
        html += '</div>';

        html += '<br>';
        $('.view_surgery').html(html);

    }
})

}


    $(document).on('click', '.print_surgeries', function() {

            var opd_id = $(this).data('id');
            var visitid = $(this).data('visitid');
            //alert(visitid);
            var $this = $(this);

            $.ajax({
                url: '<?php echo base_url("admin/optometry/print_surgeries"); ?>',
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
</script>   




