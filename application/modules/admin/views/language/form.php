<ul class="breadcrumb">
    <li>
        <p>YOU ARE HERE</p>
    </li>
    <li><a href="admin/language/index_list">Language</a></li>
    <li><a href="javascript:;" class="active">Edit</a></li>
</ul>
<div class="page-title"><i class="icon-custom-left"></i>
    <h3>Language - <span class="semi-bold">Edit</span></h3>
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
        <form action="admin/language/save" method="post">
            <div class="row-fluid">

                <div class="form-group">
                    <label class="form-label">Language</label>
                    <div class="controls">
                        <input type="text" required name="language" class="form-control" value="<?php echo $word[0]->lang?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Code</label>
                    <div class="controls">
                        <input type="text" required name="code" class="form-control" value="<?php echo $word[0]->code?>">
                    </div>
                </div>
                <h4 class="margin-top-20">Viewer Translation</h4>

                <hr>
                <div class="col-md-6">
                    <div class="muted margin-bottom-10">Word</div>
                </div>
                <div class="col-md-6">
                    <div class="muted margin-bottom-10">Translate</div>
                </div>

                <?php


                $sql = "select * from string_translation where code = 'en'";
                $qry = $this->db->query($sql);
                $result_word = $qry->result();

                $sql = "select * from string_translation where code = '{$word[0]->code}'";
                $qry = $this->db->query($sql);
                $result = $qry->result();


                foreach ($result_word as $key => $value):
                    ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label"><?php echo $result_word[$key]->text ?></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" required name="text[<?php echo str_replace(' ','__',$result_word[$key]->text) ?>]" class="form-control"
                                   value="<?php echo isset($result[$key]->text_translation) ? $result[$key]->text_translation : '' ?>" placeholder="<?php echo $result_word[$key]->text ?>" >
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="clearfix"></div>

                <div class="form-actions">
                    <div class="pull-left">
                        <a href="admin/language/index_list" class="btn btn-white btn-cons" >Back</a>
                        <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                    </div>
                </div>




            </div>
        </form>


    </div>
    <!-- END BODY -->
</div>
<!-- END -->
