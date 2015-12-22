<ul class="breadcrumb">
    <li>
        <p>YOU ARE HERE</p>
    </li>
    <li><a href="javascript:;" >Book</a></li>

</ul>
<div class="page-title">
    <h3>Book - <span class="semi-bold">All</span></h3>
</div>

<!-- BEGIN -->
<div class="grid simple">
    <!-- BEGIN TITLE -->
    <div class="grid-title no-border">
        <?php if($msg = $this->session->flashdata('msg')): ?>
            <div class="alert alert-success">
                <?php echo $msg ?>
            </div>
        <?php endif; ?>

        <h4>List <span class="semi-bold">All</span>  </h4>
        <a href="admin/book/form" class="btn btn-success btn-mini pull-right">+ Add new</a>
    </div>
    <!-- END TITLE -->
    <!-- BEGIN BODY -->
    <div class="grid-body no-border">
        <table class="table table-hover table-condensed" id="dttable">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Language Available</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach($data as $key => $value):?>
                <tr>
                    <td width="50"><?php echo $key +1  ?></td>
                    <td width="300"><?php echo $value->name ?></td>
                    <td>
                        <?php
                        $sql = "select * from book where code = '{$value->code}'";
                        $qry = $this->db->query($sql);
                        $result = $qry->result();
                        $ln =array();

                        foreach($result as $v){
                            $ln[] = strtoupper($v->lang);
                        }
                        echo join(" , ",$ln)
                        ?>
                    </td>
                    <td width="200" >
                        <a class="btn btn-link" href="admin/book/form/<?php echo $value->code ?>"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-link" onclick="return confirm('คุณต้องการลบหรือไม่')" href="admin/book/delete/<?php echo $value->code ?>"><i class="fa fa-trash-o"></i></a>
                    </td>

                </tr>
            <?php endforeach?>

            </tbody>
        </table>
    </div>
    <!-- END BODY -->
</div>
<!-- END -->
