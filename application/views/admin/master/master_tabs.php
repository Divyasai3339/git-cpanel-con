<style>
    .tablists li{
      display: flex
    }
</style>
<div class="col-md-4">
    <div class="box border0">
        <ul class="tablists">
            <?php foreach ($categories as $key => $val) { ?>
                <li ><a href="<?php echo base_url(); ?>admin/masterdata/<?php echo $val->master_key;?>" class=" <?php if($val->master_key==$this->uri->segment(3)){ echo "active";}?>">
                        <th><?php echo $val->master_value; ?></th>
                    </a></li>
            <?php } ?>
        </ul>
    </div>
</div>