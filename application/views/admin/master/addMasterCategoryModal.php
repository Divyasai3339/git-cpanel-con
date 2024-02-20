<div class="modal fade" id="addMasterCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-mid" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title modal_title">Add Category Master</h4>
            </div>
            <form id="formAddMasterData" action="#" method="post" accept-charset="utf-8">
                <div class="modal-body pt0 pb0">
                    <input type="hidden" name="master_type" id="master_type" class="master_type" value="" />
                    <div class="ptt10">
                        <div class="form-group">
                            <input name="Id" type="hidden" class="form-control hdnId" id="hdnId" value="0" />
                            <label for="master_name"><?php echo $this->lang->line('name'); ?></label><small class="req"> *</small>
                            <input autofocus="" name="master_name" placeholder="" type="text" class="form-control master_name" id="master_name" value="" />
                        </div>
                    </div>
                </div>
                <!--./modal-body-->
                <div class="modal-footer">
                    <button type="submit" id="formaddbtn" data-loading-text="<?php echo $this->lang->line('processing'); ?>" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                </div>
            </form>
        </div>
        <!--./row-->
    </div>
</div>
