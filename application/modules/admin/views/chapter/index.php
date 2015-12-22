<ul class="breadcrumb">
    <li>
        <p>YOU ARE HERE</p>
    </li>
    <li><a href="javascript:;" >Chapter</a></li>

</ul>
<div class="page-title">
    <h3>Chapter - <span class="semi-bold">All</span></h3>
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
        <a href="admin/chapter/form" class="btn btn-success btn-mini pull-right">+ Add new</a>
    </div>
    <!-- END TITLE -->
    <!-- BEGIN BODY -->
    <div class="grid-body no-border">
        <table class="table table-hover table-condensed" id="dttable">
            <thead>
            <tr>
                <th>#</th>
                <th>Comic Book</th>
                <th>Chapter</th>
                <th>Link</th>
                <th>code</th>
                <th>Language</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach($data as $key => $value):?>
                <tr>
                    <td width="100"><?php echo $key +1  ?></td>

                    <td>
                        <?php
                        $sql = "select * from book where id = '{$value->book_id}'";
                        $qry = $this->db->query($sql);
                        $row = $qry->row();
                        echo $row->name
                        ?>
                    </td>


                    <td><?php echo $value->chapter_number ?> : <?php echo strtoupper($value->chapter_name) ?></td>
                    <td><a class="btn btn-primary btn-mini " target="_blank" href="<?php echo base_url()."viewer/page/".$row->code."/".$value->chapter_number."/".$value->lang ?>"><i class="fa fa-link"></i> Link</a></td>
                    <td><?php echo $row->code ?></td>
                    <td width="100"><?php echo strtoupper($value->lang) ?></td>
                    <td width="200" >
                        <a class="btn btn-link" href="admin/chapter/form/<?php echo $value->id ?>"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-link" onclick="return confirm('คุณต้องการลบหรือไม่')" href="admin/chapter/delete/<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a>
                    </td>

                </tr>
            <?php endforeach?>

            </tbody>
        </table>
    </div>
    <!-- END BODY -->
</div>
<!-- END -->
