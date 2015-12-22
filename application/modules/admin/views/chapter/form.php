<ul class="breadcrumb">
    <li>
        <p>YOU ARE HERE</p>
    </li>
    <li><a href="admin/chapter/index_list">Chapter</a></li>
    <li><a href="javascript:;" class="active">Edit</a></li>
</ul>
<div class="page-title"><i class="icon-custom-left"></i>
    <h3>Chapter - <span class="semi-bold">Edit</span></h3>
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
        <form action="admin/chapter/save/<?php echo @$data[0]->id ?>" method="post">
            <input type="hidden" id="chapter_id" value="<?php echo @$data[0]->id ?>" >
            <div class="row-fluid">

                <div class="form-group">
                    <label class="form-label">Language</label>
                    <div class="controls">
                        <select style="width: 100%" required name="language" id="language" class="form_control">
                            <option value="">Please select..</option>
                            <?php
                            $sql = "select * from language";
                            $qry = $this->db->query($sql);
                            $result = $qry->result();
                            foreach($result as $value):?>
                                <option <?php echo (@$data[0]->lang == $value->code) ? 'selected' : '' ?> value="<?php echo $value->code ?>"><?php echo $value->lang?></option>
                            <?php endforeach;?>
                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Comic Book</label>
                    <div class="controls">
                        <select style="width: 100%" required name="comic_book" id="comic_book" class="form_control">
                            <option value="">Please select..</option>

                            <?php
                            if(isset($data[0]->lang)):

                                $sql = "select * from book where lang = '{$data[0]->lang}'";
                                $qry = $this->db->query($sql);
                                $result = $qry->result();
                                foreach($result as $value):?>
                                    <option <?php echo (@$data[0]->book_id == $value->id) ? 'selected' : '' ?> value="<?php echo $value->id ?>"><?php echo $value->name?></option>
                                <?php endforeach;?>

                            <?php endif?>

                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Chapter Number</label>
                    <div class="controls">
                        <div class="input-with-icon left">
                            <i class="fa "></i>
                            <input type="number" <?php echo (!isset($data[0]->chapter_number))? 'disabled' : ''?> required name="chapter_number" id="chapter_number" class="form-control" value="<?php echo @$data[0]->chapter_number?>">
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Chapter Name</label>
                    <div class="controls">
                        <input type="text"  required name="chapter_name" class="form-control" value="<?php echo @$data[0]->chapter_name?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Reading Mode</label>
                    <div class="controls">
                        <select style="width: 100%" required name="reading_mode" class="form_control">
                            <option <?php echo (@$data[0]->reading_mode == "rtl" )? 'selected' : ''?> value="rtl">RTL</option>
                            <option <?php echo (@$data[0]->reading_mode == "ltr" )? 'selected ': ''?>  value="ltr">LTR</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <div class="controls">
                                <select required name="status_on" class="form_control">
                                    <option <?php echo (@$data[0]->status == "visible" )? 'selected ': ''?> value="visible">Visible</option>
                                    <option <?php echo (@$data[0]->status == "invisible" )? 'selected ': ''?> value="invisible">Invisible</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Show On</label>
                            <div class="controls">
                                <div class="col-sm-12">
                                    <div class="input-append success date" style="margin-right: 60px;">
                                        <input type="text" name="dd" value="<?php echo (@$data[0]->show_on) ? date('Y-m-d',strtotime(@$data[0]->show_on)) : date('Y-m-d') ?>" class="span12">
                                        <span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></i></span>
                                    </div>

                                    <div class="input-append clockpicker ">
                                        <input type="text" name="tt" value="<?php echo (@$data[0]->show_on) ? date('H:i',strtotime(@$data[0]->show_on)) : date('H:i') ?>" class="timepicker-default span12">
                                        <span class="add-on"><span class="arrow"></span><i class="fa fa-clock-o"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Upload</label>
                    <div class="controls">
                        <div id="myId" class="dropzone no-margin">
                            <div class="fallback">
                                <input name="file" type="file" multiple />

                            </div>
                        </div>
                    </div>
                </div>


                <div class="clearfix"></div>

                <div class="form-actions">
                    <div class="pull-left">
                        <a href="admin/chapter/index_list" class="btn btn-white btn-cons" >Back</a>
                        <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                    </div>
                </div>




            </div>
        </form>


    </div>
    <!-- END BODY -->
</div>
<!-- END -->
