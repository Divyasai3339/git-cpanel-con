<div class="col-md-2"> 
                <div class="box border0">
                    <ul class="tablists">
                        <?php if ($this->rbac->hasPrivilege('product_category', 'can_view')) { ?>
                        <li><a href="<?php echo base_url(); ?>admin/productcategory/product" class="<?php echo set_sidebar_Submenu('admin/productcategory/product'); ?>"> <th><?php echo $this->lang->line('product_category'); ?></th></a></li>
						<?php } ?>
                         <?php  if ($this->rbac->hasPrivilege('product_supply', 'can_view')) { ?>
						 <li><a class="<?php echo set_sidebar_Submenu('admin/productcategory/supply'); ?>" href="<?php echo base_url(); ?>admin/productcategory/supply" > <th><?php echo $this->lang->line('supply'); ?></th></a></li>
 <?php }  if ($this->rbac->hasPrivilege('product_dosage', 'can_view')) { ?>
                         <li><a class="<?php echo set_sidebar_Submenu('admin/productdosage'); ?>" href="<?php echo base_url(); ?>admin/productdosage" > <th><?php echo $this->lang->line('product_dosage'); ?></th></a></li>
                    <?php }  if ($this->rbac->hasPrivilege('dosage_interval', 'can_view')) { ?>
                     <li><a class="<?php echo set_sidebar_Submenu('admin/productdosage/interval'); ?>" href="<?php echo base_url(); ?>admin/productdosage/interval" > <th><?php echo $this->lang->line('dose_interval'); ?></th></a></li>
                     <?php }  if ($this->rbac->hasPrivilege('dosage_duration', 'can_view')) { ?>
                     <li><a class="<?php echo set_sidebar_Submenu('admin/productdosage/duration'); ?>" href="<?php echo base_url(); ?>admin/productdosage/duration" > <th><?php echo $this->lang->line('dose_duration'); ?></th></a></li>
                 <?php } ?>
                    </ul>
                </div>
            </div>