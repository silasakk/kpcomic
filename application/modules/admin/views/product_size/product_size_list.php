
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Product_size List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('admin/product_size/create'), 'Create', 'class="btn btn-primary"'); ?>
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
            foreach ($product_size_data as $product_size)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $product_size->name ?></td>
		    <td><?php echo $product_size->order_by ?></td>
		    <td><?php echo $product_size->created_at ?></td>
		    <td><?php echo $product_size->updated_at ?></td>
		    <td style="text-align:center">
			<?php 
			echo anchor(site_url('admin/product_size/read/'.$product_size->id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('admin/product_size/update/'.$product_size->id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('admin/product_size/delete/'.$product_size->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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