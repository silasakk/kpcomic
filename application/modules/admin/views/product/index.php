<div class="menubar">
    <div class="sidebar-toggler visible-xs">
        <i class="ion-navicon"></i>
    </div>

    <div class="page-title">
        Product
    </div>
    <a href="admin/event/form" class="btn btn-success pull-right"><span>Add New</span></a>
</div>
<div class="search-panel">
    <div class="">
        <div class="row form-horizontal">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Collection</label>
                    <div class="col-sm-9">
                        <select class="form-control ">
                            <option>All</option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Category</label>
                    <div class="col-sm-9">
                        <select class="form-control ">
                            <option>All</option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Brand</label>
                    <div class="col-sm-9">
                        <select class="form-control ">
                            <option>All</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <table class="table tbi">
        <tr>
            <th class="td-tool">Image</th>
            <th colspan="3">Name</th>


            <th class="td-tool"><i class="fa fa-bolt"></i></th>
        </tr>
        <?php foreach ($data as $key => $value):?>
            <tr style="background: #f5f5f5">
                <td class="td-tool">
                    <?php if($value->image): ?>
                        <img src="<?php echo image('./uploads/'.$value->image, 'square-xs'); ?>"/>
                    <?php endif; ?>
                </td>
                <td colspan="3" ><?php echo $value->name ?></td>

                <td class="td-tool">
                    <a href="admin/product/form/<?php echo $value->product_id ?>"><i class="fa fa-pencil"></i></a>
                    <!--<a href="admin/product/delete/<?php /*echo $value->product_id */?>" onclick="return confirm('คุณต้องการลบใช่หรือไม่')" ><i class="fa fa-trash-o"></i></a>-->
                </td>
            </tr>
            
            <?php
            //select query
            $sql = "select * from product_unit where product_id = '{$value->product_id}' ";
            $qry = $this->db->query($sql);
            $result = $qry->result();
            if(@$result): ?>

                <?php foreach($result as $key => $unit): ?>
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $unit->code ?></td>
                    <td><?php echo $unit->color ?></td>
                    <td><?php echo $unit->size ?></td>

                    <td class="td-tool">
                        <a href="admin/product/form_unit/<?php echo $unit->product_unit_id ?>"><i class="fa fa-pencil"></i></a>
                        <!--<a href="admin/product/delete/<?php /*echo $value->priduct_unit_id */?>" onclick="return confirm('คุณต้องการลบใช่หรือไม่')" ><i class="fa fa-trash-o"></i></a>-->
                    </td>
                </tr>
                <?php endforeach ?>

            <?php endif; ?>
        <?php endforeach ?>
    </table>
</div>