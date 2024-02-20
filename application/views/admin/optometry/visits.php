<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
$genderList = $this->customlib->getGender();
?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('optometry_visits'); ?></h3>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="download_label"><?php echo $this->lang->line('optometry_visits'); ?></div>
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover ajaxlist" data-export-title="<?php echo $this->lang->line('opd_patient'); ?>">
                                <thead>
                                    <tr>
                                    <th><?php echo $this->lang->line('name') ?></th>
                                    <th><?php echo $this->lang->line('patient_id'); ?></th>
                                    <th><?php echo $this->lang->line('consultant'); ?></th>
                                    <th><?php echo $this->lang->line('optometrist'); ?></th>
                                    <th><?php echo $this->lang->line('symptoms'); ?></th>
                                    <th><?php echo $this->lang->line('appointment_date'); ?></th>   
                                    <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    (function($) {
        'use strict';
        $(document).ready(function() {
            initDatatable('ajaxlist', 'admin/optometry/getOptometryPatientVisitsDatatable/<?php echo $this->uri->segment(4)?>', [], [], 100);
        });
    }(jQuery))
</script>

<?php $this->load->view('admin/optometry/optometryProfile');?>
