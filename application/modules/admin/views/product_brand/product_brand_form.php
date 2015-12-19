
        <h2 style="margin-top:0px">Product_brand <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="varchar">name <?php echo form_error('name') ?></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="name" value="<?php echo $name; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">order_by <?php echo form_error('order_by') ?></label>
                <input type="text" class="form-control" name="order_by" id="order_by" placeholder="order_by" value="<?php echo $order_by; ?>" />
            </div>
	    
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/product_brand') ?>" class="btn btn-default">Cancel</a>
	</form>