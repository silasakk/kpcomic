<ul class="breadcrumb">
    <li>
        <p>YOU ARE HERE</p>
    </li>
    <li><a href="admin/book/index_list">Comics Book</a> </li>
    <li><a href="#" class="active">Edit</a> </li>
</ul>
<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Comics Book - <span class="semi-bold">Edit</span></h3>
</div>

<!-- BEGIN -->
<div class="grid simple">
    <!-- BEGIN TITLE -->
    <div class="grid-title no-border">
        <h4>Form <span class="semi-bold">Edit</span></h4>
        <?php if($msg = $this->session->flashdata('msg')): ?>
            <div class="alert alert-success">
                <?php echo $msg ?>
            </div>
        <?php endif; ?>
    </div>
    <!-- END TITLE -->
    <!-- BEGIN BODY -->
    <div class="grid-body no-border">
        <form action="admin/book/save" method="post">
            <input type="hidden" name="code" value="<?php echo @$data[0]->code ?>">
            <div class="row-fluid">
                <div class="form-group">
                    <label class="form-label">Language Available</label>
                    <a class="btn btn-link pull-right" href="">Add new</a>
                    <div class="controls">
                        <select style="width: 100%" required name="language[]" multiple  id="language">
                            <?php
                            $sql = "select * from language";
                            $qry = $this->db->query($sql);
                            $result = $qry->result();
                            foreach($result as $value):?>


                                <?php
                                $sql = "select * from book where code = '{$data[0]->code}'";
                                $qry = $this->db->query($sql);
                                $result = $qry->result();
                                $check = "";

                                foreach($result as $v){
                                    if($v->lang == $value->code){
                                        $check = "selected";
                                    }
                                }

                                ?>

                                <option <?php echo $check ?> value="<?php echo $value->code ?>"><?php echo $value->lang ?></option>
                            <?php endforeach;?>


                        </select>
                    </div>
                </div>

                <?php
                $sql = "select * from language";
                $qry = $this->db->query($sql);
                $result = $qry->result();
                foreach($result as $value):
                    ?>
                    <div class="form-group hidden lang_block lang_<?php echo $value->code ?>">
                        <label class="form-label"><?php echo $value->lang ?> Name</label>
                        <div class="controls">
                            <?php
                            if(isset($data[0])) {
                                $sql = "select * from book where code = '{$data[0]->code}' and lang = '{$value->code}' ";
                                $qry = $this->db->query($sql);
                                $row = $qry->row();
                            }



                            ?>

                            <input type="text"  name="lang_name[<?php echo $value->code ?>]" value="<?php echo @$row->name ?>" class="form-control ">
                        </div>
                    </div>
                <?php endforeach;?>




                <div class="form-group">
                    <label class="form-label">Tags</label>

                    <div class="controls">
                        <select style="width: 100%" name="tags" multiple  id="tags">
                            <option value="Label1">Label1</option>
                            <option value="Label2">Label2</option>
                            <option value="Label3">Label3</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <div class="pull-left">
                        <a href="admin/chapter/index_list" class="btn btn-white btn-cons" type="button">Back</a>
                        <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <!-- END BODY -->
</div>
<!-- END -->
