
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Product_category List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('admin/product_category/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>name</th>
		    <th>order_by</th>
		    <th>created_at</th>
		    <th>updated_at</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($product_category_data as $product_category)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $product_category->name ?></td>
		    <td><?php echo $product_category->order_by ?></td>
		    <td><?php echo $product_category->created_at ?></td>
		    <td><?php echo $product_category->updated_at ?></td>
		    <td style="text-align:center">
			<?php 
			echo anchor(site_url('admin/product_category/read/'.$product_category->id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('admin/product_category/update/'.$product_category->id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('admin/product_category/delete/'.$product_category->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
    </body>