<ul class="breadcrumb">
    <li>
        <p>YOU ARE HERE</p>
    </li>
    <li><a href="javascript:;" >Language</a></li>

</ul>
<div class="page-title">
    <h3>Language - <span class="semi-bold">All</span></h3>
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
        <a href="admin/language/form" class="btn btn-success btn-mini pull-right">+ Add new</a>
    </div>
    <!-- END TITLE -->
    <!-- BEGIN BODY -->
    <div class="grid-body no-border">
        <table class="table table-hover table-condensed" id="dttable">
            <thead>
            <tr>
                <th>#</th>
                <th>Language</th>
                <th>Code</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach($data as $key => $value):?>
                <tr>
                    <td width="100"><?php echo $key +1  ?></td>
                    <td><?php echo $value->lang ?></td>
                    <td width="100"><?php echo strtoupper($value->code) ?></td>
                    <td width="200" >
                        <a class="btn btn-link" href="admin/language/form/<?php echo $value->id ?>"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-link" onclick="return confirm('คุณต้องการลบหรือไม่')" href="admin/language/delete/<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a>
                    </td>

                </tr>
            <?php endforeach?>

            </tbody>
        </table>
    </div>
    <!-- END BODY -->
</div>
<!-- END -->
