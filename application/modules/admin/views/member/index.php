<div class="menubar">
    <div class="sidebar-toggler visible-xs">
        <i class="ion-navicon"></i>
    </div>

    <div class="page-title">
        Member
    </div>
    <a href="admin/member/form" class="btn btn-success pull-right"><span>Add New</span></a>
</div>
<!--<div class="search-panel">-->
<!--    <div class="">-->
<!--        <div class="row form-horizontal">-->
<!--            <div class="col-sm-4">-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-3 control-label">Collection</label>-->
<!--                    <div class="col-sm-9">-->
<!--                        <select class="form-control ">-->
<!--                            <option>All</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-4">-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-3 control-label">Category</label>-->
<!--                    <div class="col-sm-9">-->
<!--                        <select class="form-control ">-->
<!--                            <option>All</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-4">-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-3 control-label">Brand</label>-->
<!--                    <div class="col-sm-9">-->
<!--                        <select class="form-control ">-->
<!--                            <option>All</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="content-wrapper">
    <table class="table tbi">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th class="td-tool"><i class="fa fa-bolt"></i></th>
        </tr>
        <?php foreach ($data as $key => $value):?>
            <tr style="background: #f5f5f5">

                <td><?php echo $value->name . " " . $value->lastname ?></td>
                <td><?php echo $value->email ?></td>

                <td class="td-tool">
                    <a href="admin/member/form/<?php echo $value->member_id ?>"><i class="fa fa-pencil"></i></a>
                    <a href="admin/member/delete/<?php echo $value->member_id ?>" onclick="return confirm('คุณต้องการลบใช่หรือไม่')" ><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>


        <?php endforeach ?>
    </table>
</div>