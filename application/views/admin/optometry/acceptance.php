<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();

?>
<script src="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row"> 
            <div class="col-md-12">
                <div class="box box-primary"> 
                    <div class="box-header with-border">
                         <h4><?php echo $this->lang->line('acceptance'); ?></h4>
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
                                    <th><?php echo $this->lang->line('guardian_name') ?></th>
                                    <th><?php echo $this->lang->line('gender'); ?></th>
                                    <th><?php echo $this->lang->line('phone'); ?></th>
                                    <th><?php echo $this->lang->line('consultant'); ?></th>
                                    <th><?php echo $this->lang->line('last_visit'); ?></th>   
                                    <th class="text-right noExport"><?php echo $this->lang->line('acceptance') ?></th>
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



<script type="text/javascript">
( function ( $ ) {
    'use strict';
    $(document).ready(function () {
        initDatatable('aajaxlist','admin/optometry/getAcceptOptometryPatientsDataTable',[],[],100);
        
    });
} ( jQuery ) )



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


    $(document).on('click', '.print_accept', function() {

            var opd_id = $(this).data('id');
            var visitid = $(this).data('visitid');
            //alert(opd_id);
            var $this = $(this);

            $.ajax({
                url: '<?php echo base_url("admin/optometry/print_acceptance"); ?>',
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




