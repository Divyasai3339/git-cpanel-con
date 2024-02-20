<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('products_stock'); ?></h3>
                        <div class="box-tools pull-right">

                            <?php if ($this->rbac->hasPrivilege('import_product', 'can_view')) { ?>                
                                <a data-toggle="modal" href="<?php echo base_url(); ?>admin/stores/import" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> <?php echo $this->lang->line('import_product'); ?>
                                </a>
                            <?php } ?>

                            <?php if ($this->rbac->hasPrivilege('product', 'can_add')) { ?>
                                <a data-toggle="modal" onclick="holdModal('myModal')" class="btn btn-primary btn-sm addproduct"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add_product'); ?></a> 
                            <?php } ?>

                            <?php if ($this->rbac->hasPrivilege('product_purchase', 'can_view')) { ?>
                                <a href="<?php echo base_url(); ?>admin/stores/purchase" class="btn btn-primary btn-sm"><i class="fa fa-reorder"></i> <?php echo $this->lang->line('purchase'); ?></a>
                            <?php } ?>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="download_label"><?php echo $this->lang->line('products_stock'); ?></div>
                       <!--  <form action="<?php echo site_url('admin/stores/bulk_delete') ?>" method="POST" id="deletebulk"> -->
                        
                        <!-- <div class=""> -->
                        <?php if ($this->rbac->hasPrivilege('product', 'can_delete')) { ?>
                            <button type="button" class="btn btn-primary pull-right btn-sm mt10 delete_selected" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('please_wait'); ?>"><i class="fa fa-trash"></i> <?php echo $this->lang->line('delete_selected'); ?>
                            </button>
                        <?php } ?>
                        <!-- </div>  -->
                      <div class="table-responsive-mobile">   
                        <table class="table table-striped table-bordered table-hover ajaxlist " cellspacing="0" width="100%" data-export-title="<?php echo $this->lang->line('products_stock'); ?>">
                            <thead>
                                <tr>
                                    <th class="noExport"><input type="checkbox" name="checkAll"> #</th>
                                    <th><?php echo $this->lang->line('product_name'); ?></th>
                                    <th><?php echo $this->lang->line('product_company'); ?></th>
                                    <th><?php echo $this->lang->line('product_composition'); ?></th>
                                    <th><?php echo $this->lang->line('product_category'); ?></th> 
                                    <th><?php echo $this->lang->line('product_group'); ?></th>
                                    <th><?php echo $this->lang->line('unit'); ?></th>
                                    <th><?php echo $this->lang->line('available_qty'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>                            
                      </div>
                      <!-- </form>   -->
                    </div>
                </div>                                                    
            </div>                                                                                                                                          
        </div>  
    </section>
</div>

<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-toggle="tooltip" title="<?php echo $this->lang->line('close'); ?>" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('add_product_details'); ?></h4> 
            </div>
            <form id="formadd" accept-charset="utf-8" method="post" class="ptt10" enctype="multipart/form-data"> 
                <div class="scroll-area">
                    <div class="modal-body pt0 pb0">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 paddlr">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('product_name'); ?></label>
                                            <small class="req"> *</small> 
                                            <input id="product_name" name="product_name" placeholder="" type="text" class="form-control"/>
                                            <span class="text-danger"><?php echo form_error('product_name'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputFile">
                                                <?php echo $this->lang->line('product_category'); ?></label>
                                            <small class="req"> *</small> 
                                            <div>
                                                <select class="form-control select2 product_category_id" style="width:100%" name='product_category_id' >
                                                    <option value="<?php echo set_value('product_category_id'); ?>"><?php echo $this->lang->line('select') ?>
                                                    </option>
                                                    <?php foreach ($productCategory as $dkey => $dvalue) {
                                                        ?>
                                                        <option value="<?php echo $dvalue["id"]; ?>"><?php echo $dvalue["product_category"] ?>
                                                        </option>   
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <span class="text-danger"><?php echo form_error('product_category_id'); ?></span>
                                        </div>
                                    </div>  
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('product_company'); ?></label>
                                            <small class="req"> *</small> 
                                            <input type="text" name="product_company" value="" class="form-control">
                                            <span class="text-danger"><?php echo form_error('product_company'); ?></span>
                                        </div>
                                    </div> 
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('product_composition'); ?></label>
                                            <small class="req"> *</small> 
                                            <input type="text" name="product_composition" value="" class="form-control">
                                            <span class="text-danger"><?php echo form_error('product_composition'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('product_group'); ?><small class="req"> *</small></label>
                                            <input type="text" name="product_group" value="" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('unit'); ?></label>
                                            <small class="req"> *</small> 
                                            <input type="text" name="unit" class="form-control">
                                            <span class="text-danger"><?php echo form_error('unit'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('min_level'); ?></label>
                                            <input type="text" name="min_level" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('re_order_level'); ?></label>
                                            <input type="text" name="reorder_level" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group"> 
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('tax'); ?></label>
                            <div class="input-group">

                            
                                <input type="text" class="form-control right-border-none" name="vat" autocomplete="off">
                                <span class="input-group-addon "> %</span>
                            </div>
                        </div>
                                        
                                    </div> 
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('unit_packing'); ?></label>
                                            <small class="req"> *</small> 
                                            <input type="text" name="unit_packing" class="form-control">
                                            <span class="text-danger"><?php echo form_error('unit_packing'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('vat_a_c'); ?></label>
                                            <input type="text" name="vat_ac" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('note'); ?></label>
                                            <textarea name="note" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('product_photo_jpg_jpeg_png'); ?></label>
                                            <input type="file" name="file" id="file" class="form-control filestyle" />
                                        </div>
                                    </div>
                                </div><!--./row-->   

                            </div><!--./col-md-12-->       
                        </div><!--./row--> 
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="pull-right">
                        <button type="submit" id="formaddbtn" data-loading-text="<?php echo $this->lang->line('processing'); ?>" class="btn btn-info pull-right"><i class="fa fa-check-circle"></i> <?php echo $this->lang->line('save'); ?></button>

                    </div>
                </div>
            </form> 
        </div>
    </div>    
</div>


<div class="modal fade" id="myModalImport" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-toggle="tooltip" title="<?php echo $this->lang->line('close'); ?>" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('add') . " " . $this->lang->line('product'); ?></h4> 
            </div>
            <form id="formimp" accept-charset="utf-8" method="post" class="ptt10" enctype="multipart/form-data">
                <div class="modal-body pt0 pb0">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 paddlr">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">
                                            <?php echo $this->lang->line('product') . " " . $this->lang->line('category'); ?></label>
                                        <small class="req"> *</small> 
                                        <div>
                                            <select class="form-control select2 product_category_id" style="width:100%" name='product_category_id' >
                                                <option value="<?php echo set_value('product_category_id'); ?>"><?php echo $this->lang->line('select') ?>
                                                </option>
                                                <?php foreach ($productCategory as $dkey => $dvalue) {
                                                    ?>
                                                    <option value="<?php echo $dvalue["id"]; ?>"><?php echo $dvalue["product_category"] ?>
                                                    </option>   
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <span class="text-danger"><?php echo form_error('product_category_id'); ?></span>
                                    </div>
                                </div>  

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('product'); ?>CSV File Upload</label>
                                        <input type="file" name="product_image" class="form-control filestyle" />
                                    </div>
                                </div>
                            </div><!--./row-->   

                    </div><!--./col-md-12-->       
                </div><!--./row--> 
            </div>
            <div class="modal-footer">
                <button type="submit" id="formimpbtn" data-loading-text="<?php echo $this->lang->line('processing') ?>" class="btn btn-info pull-right">Import <?php echo $this->lang->line('product'); ?></button>

            </div>
         </form>
        </div>
    </div>    
</div>
<!-- dd -->
<div class="modal fade" id="myModaledit" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" data-toggle="tooltip" title="<?php echo $this->lang->line('close'); ?>" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('edit_product_details'); ?></h4> 
            </div>
            <form id="formedit" accept-charset="utf-8" enctype="multipart/form-data"  method="post" class="ptt10">
                <div class="scroll-area">
                 
                   <div class="modal-body pt0 pb0">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 paddlr">
                           
                                <div class="row">
                                    <input type="hidden" name="id" id="id" value="<?php echo set_value('id'); ?>">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('product_name'); ?></label>
                                            <small class="req"> *</small> 
                                            <input type="text" id="products_name" name="product_name" value="<?php echo set_value('product_name'); ?>" class="form-control">
                                            <span class="text-danger"><?php echo form_error('product_name'); ?></span>
                                        </div>
                                    </div> 
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputFile">
                                                <?php echo $this->lang->line('product_category'); ?></label>
                                            <small class="req"> *</small> 
                                            <div><select class="form-control select2" style="width:100%" name='product_category_id' id="products_category_id" >
                                                    <option value="<?php echo set_value('product_category_id'); ?>"><?php echo $this->lang->line('select') ?></option>
                                                    <?php foreach ($productCategory as $dkey => $dvalue) {
                                                        ?>
                                                        <option value="<?php echo $dvalue["id"]; ?>"><?php echo $dvalue["product_category"] ?></option>   
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <span class="text-danger"><?php echo form_error('product_category_id'); ?></span>
                                        </div>
                                    </div>  
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('product_company'); ?></label>
                                            <small class="req"> *</small> 
                                            <input type="text" id="product_company" name="product_company" value="<?php echo set_value('product_company'); ?>" class="form-control">
                                            <span class="text-danger"><?php echo form_error('product_company'); ?></span>
                                        </div>
                                    </div> 
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('product_composition'); ?></label>
                                            <small class="req"> *</small> 
                                            <input type="text" id="product_composition" name="product_composition" value="<?php echo set_value('product_composition'); ?>" class="form-control">
                                            <span class="text-danger"><?php echo form_error('product_composition'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('product_group'); ?></label>
                                            <small class="req"> *</small> 
                                            <input type="text" id="product_group" name="product_group" value="<?php echo set_value('product_group'); ?>" class="form-control">
                                            <span class="text-danger"><?php echo form_error('product_group'); ?></span>
                                        </div>
                                    </div>
                                
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('unit'); ?></label>
                                            <small class="req"> *</small> 
                                            <input type="text" name="unit" id="unit" value="<?php echo set_value('unit'); ?>" class="form-control">
                                            <span class="text-danger"><?php echo form_error('unit'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('min_level'); ?></label>
                                            <input type="text" name="min_level" id="min_level" value="<?php echo set_value('min_level'); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('re_order_level'); ?></label>
                                            <input type="text" name="reorder_level" id="reorder_level"  value="<?php echo set_value('reorder_level'); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        
                        <div class="form-group"> 
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('tax'); ?></label>
                            <div class="input-group">

                            
                                <input type="text"  value="<?php echo set_value('vat'); ?>" class="form-control right-border-none"  id="vat" name="vat" autocomplete="off">
                                <span class="input-group-addon "> %</span>
                            </div>
                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('unit_packing'); ?></label>
                                            <small class="req"> *</small> 
                                            <input type="text" id="unit_packing"  name="unit_packing" class="form-control" value="<?php echo set_value('unit_packing'); ?>">
                                            <span class="text-danger"><?php echo form_error('unit_packing'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('vat_a_c'); ?></label>
                                            <input type="text" id="vat_ac" name="vat_ac" value="<?php echo set_value('vat_ac'); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('note'); ?></label>
                                            <textarea type="text" id="edit_note" name="edit_note"  class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('product_photo'); ?></label>
                                            <input type="file"  name="product_image"  class="form-control filestyle" />
                                            <span class="text-danger"><?php echo form_error('image'); ?>
                                                <input type="hidden"  name="pre_product_image" id="pre_product_image"  class="form-control" />
                                        </div>
                                    </div>
                                </div><!--./row-->   

                        </div><!--./col-md-12-->       
                    </div><!--./row--> 
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="formeditbtn" data-loading-text="<?php echo $this->lang->line('processing') ?>" class="btn btn-info pull-right" ><i class="fa fa-check-circle"></i> <?php echo $this->lang->line('save'); ?></button>

            </div>
           </form>   
        </div>
    </div>    
</div>
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog pup100" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" data-toggle="tooltip" data-placement="bottom"  title="Close" data-dismiss="modal">&times;</button>
                <div class="modalicon"> 
                    <div id='edit_delete' class="">
                        <a href="#" onclick="holdModal('editModal')" data-toggle="modal" title="" data-original-title="<?php echo $this->lang->line('edit'); ?>"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-toggle="tooltip" title="" data-original-title="<?php echo $this->lang->line('delete') ?>"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
                <h4 class="modal-title"><?php echo $this->lang->line('product_details'); ?></h4> 
            </div>
            <div class="modal-body pt0 pb0">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 paddlr">
                        <form id="view" accept-charset="utf-8" method="get" class="ptt10">
                            <div class="col-lg-1 col-md-2 col-sm-4">
                                <img id="product_image" src="#" style="width:100px;height: 100px;" />
                            </div>    
                            <div class="col-lg-11 col-md-10 col-sm-8">
                                <div class="table-responsive">
                                    <table class="table mb0 table-striped table-bordered examples">
                                        <tr>
                                            <th></th>
                                            <td></td>
                                            <th width="15%"><?php echo $this->lang->line('product_name'); ?></th>
                                            <td width="35%"><span id='product_names'></span></td>
                                            <th width="15%"><?php echo $this->lang->line('product_category'); ?></th>
                                            <td width="35%"><span id="product_category_ids"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td></td>
                                            <th width="15%"><?php echo $this->lang->line('product_company'); ?></th>
                                            <td width="35%"><span id='product_companys'></span></td>
                                            <th width="15%"><?php echo $this->lang->line('product_composition'); ?></th>
                                            <td width="35%"><span id="product_compositions"></span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td></td>
                                            <th width="15%"><?php echo $this->lang->line('product_group'); ?></th>
                                            <td width="35%"><span id='product_groups'></span></td>
                                            <th width="15%"><?php echo $this->lang->line('unit'); ?></th>
                                            <td width="35%"><span id="units"></span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td></td>
                                            <th width="15%"><?php echo $this->lang->line('min_level'); ?></th>
                                            <td width="35%"><span id='min_levels'></span></td>
                                            <th width="15%"><?php echo $this->lang->line('re_order_level'); ?></th>
                                            <td width="35%"><span id="reorder_levels"></span>
                                            </td>

                                        </tr>
                                        <tr>                                  <th></th>
                                            <td></td>
                                            <th width="15%"><?php echo $this->lang->line('vat'); ?>(%)</th>
                                            <td width="35%"><span id='vats'></span></td>
                                            <th width="15%"><?php echo $this->lang->line('unit_packing'); ?></th>
                                            <td width="35%"><span id="unit_packings"></span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td></td>

                                            <th width="15%"><?php echo $this->lang->line('vat_a_c'); ?></th>
                                            <td width="35%"><span id="vat_acs"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>    
                            </div>
                        </form>            
                    </div><!--./col-md-12-->       
                </div><!--./row-->
                <div id="tabledata"></div> 
            </div>
            <div class="modal-footer">
                <div class="pull-right paddA10">
                </div>
            </div>
        </div>
    </div>    
</div>
<div class="modal fade" id="addBulkModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('add') . " " . $this->lang->line('stock') ?></h4> 
            </div>
             <form id="formbatch" accept-charset="utf-8" method="post" class="ptt10">
            <div class="modal-body pt0 pb0">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 paddlr">
                        <input type="hidden" name="stores_id" id="pharm_id">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('batch') . " " . $this->lang->line('no'); ?></label>
                                        <small class="req"> *</small> 
                                        <input type="text" name="batch_no" class="form-control">
                                        <span class="text-danger"><?php echo form_error('batch_no'); ?></span>
                                    </div>
                                </div> 
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('expire') . " " . $this->lang->line('date'); ?></label>
                                        <small class="req"> *</small> 
                                        <input type="text" id="expiry" name="expiry_date" class="form-control">
                                        <span class="text-danger"><?php echo form_error('expiry_date'); ?></span>
                                    </div>
                                </div> 
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('inward') . " " . $this->lang->line('date'); ?></label>
                                        <small class="req"> *</small> 
                                        <input type="text" id="inward_date" name="inward_date" class="form-control date">
                                        <span class="text-danger"><?php echo form_error('inward_date'); ?></span>
                                    </div>
                                </div> 

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('packing') . " " . $this->lang->line('qty'); ?></label>
                                        <small class="req"> *</small> 
                                        <input type="text" name="packing_qty" class="form-control">
                                        <span class="text-danger"><?php echo form_error('packing_qty'); ?></span>
                                    </div>
                                </div> 
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('purchase_rate') . " (" . $currency_symbol . ")"; ?></label>

                                        <input type="text" name="purchase_rate_packing" class="form-control">
                                        <span class="text-danger"><?php echo form_error('purchase_rate_packing'); ?></span>
                                    </div>
                                </div> 
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('quantity'); ?></label>
                                        <small class="req"> *</small> 
                                        <input type="text" name="quantity" class="form-control">
                                        <span class="text-danger"><?php echo form_error('quantity'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('mrp') . " (" . $currency_symbol . ")"; ?></label>
                                        <small class="req"> *</small> 
                                        <input type="text" name="mrp" class="form-control">
                                        <span class="text-danger"><?php echo form_error('mrp'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('sale_price') . " (" . $currency_symbol . ")"; ?></label>
                                        <small class="req"> *</small> 
                                        <input  name="sale_rate" type="text" class="form-control"/>
                                        <span class="text-danger"><?php echo form_error('sale_rate'); ?></span>
                                    </div>
                                </div> 
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('batch') . " " . $this->lang->line('amount') . " (" . $currency_symbol . ")"; ?></label>

                                        <input type="text" name="amount" class="form-control">
                                        <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                    </div>
                                </div> 
                            </div><!--./row-->   

                    </div><!--./col-md-12-->       

                </div><!--./row--> 

            </div>
               <div class="modal-footer">
                     <button type="submit" id="formbatchbtn" data-loading-text="<?php echo $this->lang->line("processing") ?>" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                </div>
           </form>   
        </div>
      
    </div>    
</div>

<div class="modal fade" id="addBadStockModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close close_btn" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('add_bad_stock'); ?></h4> 
            </div>
            
             <form id="formstock" accept-charset="utf-8" method="post" class="ptt10">  
                <div class="modal-body pt0 pb0">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 paddlr">
                            <input type="hidden" name="stores_id" id="pharm_id" >
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('batch_no'); ?></label>
                                        <small class="req"> *</small> 
                                        <select name="batch_no" onchange="getExpire(this.value)" id="batch_stock_no" class="form-control">
                                            <option value=""><?php echo $this->lang->line('select') ?></option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('batch_no'); ?></span>
                                    </div>
                                </div> 
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('expiry_date'); ?></label>
                                        <small class="req"> *</small> 
                                        <input type="text" id="batch_expire"  name="expiry_date" id="stockexpiry_date" class="form-control date">
                                        <span class="text-danger"><?php echo form_error('expiry_date'); ?></span>
                                    </div>
                                </div> 
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('outward_date'); ?></label>
                                        <small class="req"> *</small> 
                                        <input type="text"  name="inward_date" value="<?php echo date($this->customlib->getHospitalDateFormat()) ?>" class="form-control date">
                                        <span class="text-danger"><?php echo form_error('inward_date'); ?></span>
                                    </div>
                                </div> 
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('qty'); ?></label>
                                        <small class="req"> *</small> 
                                        <input type="text" name="packing_qty" class="form-control">
                                        <input type="hidden" name="stores_id" id="stores_stock_id" class="form-control">
                                        
                                        <input type="hidden" name="available_quantity" id="batch_available_qty" class="form-control">
                                        <input type="hidden" name="product_batch_id" id="product_batch_id" class="form-control">
                                        <span class="text-danger"><?php echo form_error('packing_qty'); ?></span>
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('note'); ?></label>
                                        <textarea  name="note" class="form-control "></textarea>
                                    </div>
                                </div> 

                            </div><!--./row-->   
                    </div><!--./col-md-12-->       
                </div><!--./row--> 
            </div>
            <div class="modal-footer">
                <button type="submit" id="formstockbtn" data-loading-text="<?php echo $this->lang->line('processing') ?>" class="btn btn-info pull-right"><i class="fa fa-check-circle"></i> <?php echo $this->lang->line('save'); ?></button>
            </div>
          </form>    
        </div>
    </div>    
</div>
<script type="text/javascript">
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });
    $(function () {
        $('#easySelectable').easySelectable();
    })

    
</script>

<script type="text/javascript">
                    (function ($) {
                        //selectable html elements
                        $.fn.easySelectable = function (options) {
                            var el = $(this);
                            var options = $.extend({
                                'item': 'li',
                                'state': true,
                                onSelecting: function (el) {

                                },
                                onSelected: function (el) {

                                },
                                onUnSelected: function (el) {

                                }
                            }, options);
                            el.on('dragstart', function (event) {
                                event.preventDefault();
                            });
                            el.off('mouseover');
                            el.addClass('easySelectable');
                            if (options.state) {
                                el.find(options.item).addClass('es-selectable');
                                el.on('mousedown', options.item, function (e) {
                                    $(this).trigger('start_select');
                                    var offset = $(this).offset();
                                    var hasClass = $(this).hasClass('es-selected');
                                    var prev_el = false;
                                    el.on('mouseover', options.item, function (e) {
                                        if (prev_el == $(this).index())
                                            return true;
                                        prev_el = $(this).index();
                                        var hasClass2 = $(this).hasClass('es-selected');
                                        if (!hasClass2) {
                                            $(this).addClass('es-selected').trigger('selected');
                                            el.trigger('selected');
                                            options.onSelecting($(this));
                                            options.onSelected($(this));
                                        } else {
                                            $(this).removeClass('es-selected').trigger('unselected');
                                            el.trigger('unselected');
                                            options.onSelecting($(this))
                                            options.onUnSelected($(this));
                                        }
                                    });
                                    if (!hasClass) {
                                        $(this).addClass('es-selected').trigger('selected');
                                        el.trigger('selected');
                                        options.onSelecting($(this));
                                        options.onSelected($(this));
                                    } else {
                                        $(this).removeClass('es-selected').trigger('unselected');
                                        el.trigger('unselected');
                                        options.onSelecting($(this));
                                        options.onUnSelected($(this));
                                    }
                                    var relativeX = (e.pageX - offset.left);
                                    var relativeY = (e.pageY - offset.top);
                                });
                                $(document).on('mouseup', function () {
                                    el.off('mouseover');
                                });
                            } else {
                                el.off('mousedown');
                            }
                        };
                    })(jQuery);
</script>
<script type="text/javascript">
            $(document).ready(function (e) {
                $("#formadd").on('submit', (function (e) {
                    e.preventDefault();
                    $("#formaddbtn").button('loading');
                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/stores/add',
                        type: "POST",
                        data: new FormData(this),
                        dataType: 'json',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            if (data.status == "fail") {
                                var message = "";
                                $.each(data.error, function (index, value) {
                                    message += value;
                                });
                                errorMsg(message);
                            } else {
                                successMsg(data.message);
                                window.location.reload(true);
                            }
                            $("#formaddbtn").button('reset');
                        },
                        error: function () {
                           
                        }

                    });
                }));
            });

            $(document).ready(function (e) {
                $("#formstock").on('submit', (function (e) {
                    e.preventDefault();
                    $("#formstockbtn").button('loading');
                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/stores/addBadStock',
                        type: "POST",
                        data: new FormData(this),
                        dataType: 'json',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            if (data.status == "fail") {
                                var message = "";
                                $.each(data.error, function (index, value) {
                                    message += value;
                                });
                                errorMsg(message);
                            } else {
                                successMsg(data.message);
                                window.location.reload(true);
                            }
                            $("#formstockbtn").button('reset');
                        },
                        error: function () {

                        }
                    });
                }));
            });
            $(document).ready(function (e) {
                $("#formedit").on('submit', (function (e) {
                    e.preventDefault();
                    $("#formeditbtn").button('loading');
                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/stores/update',
                        type: "POST",
                        data: new FormData(this),
                        dataType: 'json',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            if (data.status == "fail") {
                                var message = "";
                                $.each(data.error, function (index, value) {
                                    message += value;
                                });
                                errorMsg(message);
                            } else {
                                successMsg(data.message);
                                window.location.reload(true);
                            }
                            $("#formeditbtn").button('reset');
                        },
                        error: function () {

                        }
                    });
                }));
            }); 
            $(document).ready(function (e) {

                $('#batch_expire,#stockexpiry_date').datepicker({
                    format: "M/yyyy",
                    viewMode: "months",
                    minViewMode: "months",
                    autoclose: true
                });
            });
            function getRecord(id) {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/stores/getDetails',
                    type: "POST",
                    data: {stores_id: id},
                    dataType: 'json',
                    success: function (data) {
                        $("#id").val(data.id);
                        $("#products_name").val(data.product_name);
                        $("#products_category_id").val(data.product_category_id);
                        $("#product_company").val(data.product_company);
                        $("#product_composition").val(data.product_composition);
                        $("#product_group").val(data.product_group);
                        $("#unit").val(data.unit);
                        $("#min_level").val(data.min_level);
                        $("#reorder_level").val(data.reorder_level);
                        $("#vat").val(data.vat); 
                        $("#unit_packing").val(data.unit_packing); 
                        $("#pre_product_image").val(data.pre_product_image);
                        $("#vat_ac").val(data.vat_ac);
                        $("#edit_note").val(data.note);
                        $("#updateid").val(id);
                        $("#viewModal").modal('hide');
                        $(".select2").select2().select2('val', data.product_category_id);
                        holdModal('myModaledit');
                    },
                });
            }
            function viewDetail(id) {
               
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/stores/getDetails',
                    type: "POST",
                    data: {stores_id: id},
                    dataType: 'json',
                    success: function (data) {
                        $.ajax({
                            url: '<?php echo base_url(); ?>admin/stores/getProductBatch',
                            type: "POST",
                            data: {stores_id: id},
                            success: function (data) {
                                $('#tabledata').html(data);
                            },
                        });
                        if (data.product_image != "") {
                            $("#product_image").attr('src', '<?php echo base_url() ?>' + data.product_image+'<?php echo img_time(); ?>');
                        } else {
                            $("#product_image").attr('src', '<?php echo base_url() ?>uploads/patient_images/no_image.png<?php echo img_time(); ?>');

                        }

                        $("#product_names").html(data.product_name);
                        $("#product_category_ids").html(data.product_category);
                        $("#product_companys").html(data.product_company);
                        $("#product_compositions").html(data.product_composition);
                        $("#product_groups").html(data.product_group);
                        $("#units").html(data.unit);
                        $("#min_levels").html(data.min_level);
                        $("#reorder_levels").html(data.reorder_level);
                        $("#vats").html(data.vat);
                        $("#unit_packings").html(data.unit_packing);
                        $("#supplys").html(data.supply);
                        $("#vat_acs").html(data.vat_ac);
                        $('#edit_delete').html("<?php if ($this->rbac->hasPrivilege('product', 'can_edit')) { ?><a href='#'' onclick='getRecord(" + id + ")' data-toggle='tooltip' data-placement='bottom'  data-original-title='<?php echo $this->lang->line('edit'); ?>'><i class='fa fa-pencil'></i></a><?php } if ($this->rbac->hasPrivilege('product', 'can_delete')) { ?><a onclick='delete_record(" + id + ")'  href='#'  data-toggle='tooltip'  data-placement='bottom' data-original-title='<?php echo $this->lang->line('delete'); ?>'><i class='fa fa-trash'></i></a><?php } ?>");
                        holdModal('viewModal');
                    },
                });
            }
            function addBulk(id) {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/stores/getStores',
                    type: "POST",
                    data: {stores_id: id},
                    dataType: 'json',
                    success: function (data) {
                        $("#pharm_id").val(id);
                        holdModal('addBulkModal');
                    },
                })
            }
            $(document).ready(function (e) {
                $("#formbatch").on('submit', (function (e) {
                    e.preventDefault();
                    $("#formbatchbtn").button("loading");
                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/stores/productBatch',
                        type: "POST",
                        data: new FormData(this),
                        dataType: 'json',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            if (data.status == "fail") {
                                var message = "";
                                $.each(data.error, function (index, value) {
                                    message += value;
                                });
                                errorMsg(message);
                            } else {
                                successMsg(data.message);
                                window.location.reload(true);
                            }
                            $("#formbatchbtn").button('reset');
                        },
                        error: function () {
                            
                        }
                    });
                }));
            });
            function delete_record(id) {
                if (confirm('<?php echo $this->lang->line('are_you_sure'); ?>')) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/stores/delete/' + id,
                        type: "POST",
                        data: {opdid: ''},
                        dataType: 'json',
                        success: function (data) {
                            if (data.status == "fail") {
                                var message = "";
                                $.each(data.error, function (index, value) {
                                    message += value;
                                });
                                errorMsg(message);
                            } else {
                                successMsg(data.message);
                                window.location.reload(true);
                            }
                        }
                    })
                }
            }
            function holdModal(modalId) {
                $('#' + modalId).modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
            }

            function addbadstock(id) {
                $("#stores_stock_id").val(id);
                getbatchnolist(id);
                holdModal('addBadStockModal');
            }

 
            function getbatchnolist(id, selectid = '') {
                var div_data = "";
                $("#batch_stock_no").html("<option value=''><?php echo $this->lang->line('select') ?></option>");
                $.ajax({
                    type: "POST",
                    url: base_url + "admin/stores/getBatchNoList",
                    data: {'stores_id': id},
                    dataType: 'json',
                    success: function (res) {
                        console.log(res);
                        $.each(res, function (i, obj)
                        {
                            var sel = "";
                            if (obj.batch_no == selectid) {
                                sel = "selected";
                            }
                            div_data += "<option " + sel + " value='" + obj.batch_no + "'>" + obj.batch_no + "</option>";
                        });
                        $('#batch_stock_no').append(div_data);
                    }
                });
            }

            function getExpire(batch_no) {
               
                if(batch_no==""){
                 $("#batch_expire").val('');
               }else{
                    $.ajax({
                        type: "POST",
                        url: base_url + "admin/stores/getExpireDate",
                        data: {'batch_no': batch_no},
                        dataType: 'json',
                        success: function (data) {
                            if (data != null) {
                                $('#batch_expire').val(data.expiry);
                                $('#batch_available_qty').val(data.available_quantity);
                                $('#product_batch_id').val(data.id);
                            }
                        }
                    });
               }
            }

    $(document).on('click','.delete_selected',function(){
       
      var $this = $(this);
     
let obj =  [];;
       
       $('input:checkbox.enable_delete').each(function () {
       (this.checked ? obj.push($(this).val()) : "");
 });
if (confirm('<?php echo $this->lang->line('are_you_sure_you_want_to_delete_this'); ?>')) {
      $.ajax({
          url: base_url+'admin/stores/bulk_delete',          
          type: "POST",
          dataType: 'json',
          data:{'delete_id':obj},
           beforeSend: function() {
            $this.button('loading');
               
          },
          success: function(res) {     
            if(res.status == 0){
 var message = "";
                                $.each(res.error, function (index, value) {
                                    message += value;
                                });
                                errorMsg(message);
            }else{

          successMsg(res.message);
            }
          $this.button('reset');
          // errorMsg(res.error.delete_id);
         if(res.status){
            table.ajax.reload();
         }
          },
          error: function(xhr) { // if error occured
             alert("Error occured.please try again");
             $this.button('reset');
                
      },
      complete: function() {
            $this.button('reset');
              
      }
      });
  }
  });

    $('.close_btn').click(function(){
        $('#formstock')[0].reset();
    });
</script>


<script type="text/javascript">
// $(".addproduct").click(function(){
// 	$('#formadd').trigger("reset");	
// });
$('#myModal').on('hidden.bs.modal', function () {
     $(".filestyle").next(".dropify-clear").trigger("click");
    $(".product_category_id").select2("val", "");
    $('#formadd').find('input:text, input:password, input:file, textarea').val('');
    $('#formadd').find('select option:selected').removeAttr('selected');
    $('#formadd').find('input:checkbox, input:radio').removeAttr('checked');
});

$("input[name='checkAll']").click(function () {
    $("input[name='stores[]']").not(this).prop('checked', this.checked);
});
</script>
<!-- //========datatable start===== -->
<script type="text/javascript">
( function ( $ ) {
    'use strict';
    $(document).ready(function () {
        initDatatable('ajaxlist','admin/stores/getstoresDatatable',[],[],100,[
          { 'bSortable': false, 'aTargets': [ 0,-1 ] }
       ]);
    });
} ( jQuery ) )
</script>
<!-- //========datatable end===== -->