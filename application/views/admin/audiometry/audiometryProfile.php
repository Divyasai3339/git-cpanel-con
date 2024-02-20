<div class="modal fade" id="UploadAudiometryFilesModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="optometry_title">Audiometry</h4>
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
                                            <input type="file" name="audiometryfiles[]" class="form-control" id="audiometryfiles" data-opd="" multiple="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--./col-md-6-->
                        <div class="col-md-6 col-sm-6">
                            <form method="post" action="#" id="addAudiometryComments">
                                <div class="form-group">
                                    <label>Comments</label>
                                    <div class="">
                                        <input type="hidden" class="audiometryopdid" id="audiometryopdid" value="" />
                                        <textarea name="audiometrycomments" class="form-control" id="audiometrycomments" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button"  class="btn btn-primary printAudiometry"><i class="fa fa-print" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    <div id="audiometryfiles">
                        <div class="row">

                        </div>
                    </div>
                </div>
                <!--./box-body-->

            </div>
        </div>
    </div>
</div>

<!-- View Visit File  -->
<div class="modal fade" id="viewAudiometryFiles" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-md" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                &nbsp;
                <button type="button" class="close pupclose" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <div class="audiometryFile" style="text-align:-webkit-center">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- View Visit File  -->

<script>
    $(document).ready(function() {
        $(document).on('click', '.btnUploadAudiometryImages', function(e) {
            e.preventDefault();
            var opd = $(this).data('opd');
            $('#audiometryopdid').val('');
            $('#audiometryfiles').attr('data-opd', opd);
            $('#audiometryopdid').val(opd);
            $('#UploadAudiometryFilesModal').modal('toggle');
            loadAudiometryFiles(opd)
        })
        $(document).on('submit', '#addAudiometryComments', function(e) {
            e.preventDefault();
            var opd = $('#audiometryopdid').val();
            var comments = $('#audiometrycomments').val();

            $.ajax({
                url: "<?php echo base_url('admin/audiometry/saveComments') ?>",
                type: "POST",
                data: {
                    'comments': comments,
                    'opd_id': opd
                },
                dataType: 'Json',
                beforeSend: function() {

                },
                success: function(data, textStatus, jqXHR) {
                    if (data.flag === 1) {
                        successMsg(data.msg);
                    } else if (data.flag == 2) {
                        errorMsg(data.msg);
                    } else {
                        errorMsg(data.msg);
                    }

                },

                complete: function() {

                },
                error: function(jqXHR, textStatus, errorThrown) {

                }
            });
        })
        $(document).on('click', '.printAudiometry', function(e) {
           // e.preventDefault();
            var opd = $('#audiometryopdid').val();
            $.ajax({
                url: "<?php echo base_url('admin/audiometry/printAudiometry') ?>",
                type: "POST",
                data: {
                    'opd_id': opd
                },
                success: function(data) {
                       popup(data);
                },
            });

        })
        $("#audiometryfiles").change(function(e) {
            var opd = $(this).data('opd');
            var fd = new FormData();
            var fileInput = document.getElementById('audiometryfiles');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.mp4|\.mov|\.flv|\.wmv|\.avi|\.mpg|\.mpeg|\.rm|\.ram|\.swf|\.ogg|\.webm|\.mkv|\.wav|\.mp3|\.aac)$/i;
            if (allowedExtensions.exec(filePath)) {
                errorMsg('File Type not allowed');
                fileInput.value = '';
                return false;
            }
            var ins = fileInput.files.length;
            for (var x = 0; x < ins; x++) {
                fd.append("audiometryfiles[]", document.getElementById('audiometryfiles').files[x]);
            }
            fd.append('opd_id', opd);
            uploadAudiometryFiles(fd, opd);
        });
        $(document).on('click', '.delete_audiometry_image', function() {
            var $this = $('.btn_delete');

            var record_id = $(this).data('record_id');
            var opd = $(this).data('opd');
            if (confirm('Do you really want to delete this file')) {

                $.ajax({
                    url: "<?php echo base_url('admin/audiometry/deleteImage') ?>",
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
                            loadAudiometryFiles(opd);

                        } else {
                            errorMsg(data.msg);
                            loadAudiometryFiles(opd);
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

       
        $(document).on('click', '.audiometryImageView', function(e) {
            e.preventDefault();
            var image = $(this).data('record_id');
            var opd = $(this).data('opd');
            var path = '<?php echo base_url('uploads/audiometry/OPD'); ?>' + opd;
            $('#viewAudiometryFiles').modal('toggle');
            $('.audiometryFile').empty().html('<img class="img-responsive" src="' + path + '/' + image + '"/>');

        })
    })

    function uploadAudiometryFiles(formdata, opdid) {
        var urls = baseurl + "admin/audiometry/uploadAudiometryFiles";
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
                    loadAudiometryFiles(opdid);
                    errorMsg(response.msg);
                } else {
                    loadAudiometryFiles(opdid);
                    successMsg(response.msg);
                }

            },
            beforeSend: function() {

            },
            complete: function() {


            }
        });
    }

    function loadAudiometryFiles(opdid) {

        $.ajax({
            url: "<?php echo base_url(); ?>admin/audiometry/getAudiometryFiles",
            method: "POST",
            data: {
                'opd_id': opdid
            },
            dataType: "json",
            beforeSend: function() {
                $('#audiometryfiles .row').empty();
                $('#audiometrycomments').val('');
            },
            
            success: function(data) {
                // console.log(data);

                $('#audiometryfiles .row').empty();
                     var html = "";
                if (data.flag == 1) {
                   
                    if (Object.keys(data.data).length > 0) {
                        $.each(data.data, function(index, value) {
                            html += value;
                        });
                    }
                    // console.log(html);
                    $('#audiometrycomments').val(data.comments);

                } else {
                    html += '<div class="col-md-12">Upload Files ...</div>';
                }
                $("#audiometryfiles .row").empty().html(html);
            },
            complete: function() {


            }
        });
    }
</script>