<section class="block myaccount">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-16"><h4 class="text-uppercase login-welcome">Hi, Pavita</h4></div>
        </div>
        <div class="row myaccount-contianer row-eq-height">

            <?php include "menu.php"; ?>
            <div class="col-sm-11 col-md-12 col-lg-13  column-right-fullwidth">
                <h3>Address book </h3>
                <?php if ($msg = $this->session->flashdata('msg')): ?>
                    <div class="text-success text-center well"><?php echo $msg; ?></div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-xs-8">
                        <p class="sub-text2">Manage as many shipping addresses as you wish.</p>
                    </div>

                    <div class="col-xs-8 text-right">
                        <a href="shop/user/form_address" class="btn btn-default  btn-lg">Add new address</a>
                    </div>

                </div>

                <div class="row table-header">
                    <div class="col-sm-3">
                        Name
                    </div>
                    <div class="col-sm-5">
                        Address
                    </div>
                    <div class="col-sm-3">
                        Recipient
                    </div>
                    <div class="col-sm-3">
                        Contact
                    </div>
                </div>
                <?php
                $sql = "select * from member_address where member_id = '{$this->session->userdata('user_id')}' ";
                $qry = $this->db->query($sql);
                $result = $qry->result();
                foreach ($result as $value):
                    ?>
                    <div class="row table-row">
                        <div class="col-sm-3">
                            <?php echo $value->name ? $value->name : "-" ?>
                        </div>
                        <div class="col-sm-5">
                            <?php echo $value->address ?>
                        </div>
                        <div class="col-sm-3">
                            <?php echo $value->recipient ? $value->recipient : "-" ?>
                        </div>
                        <div class="col-sm-3">
                            <?php echo $value->telephone ? $value->telephone : "-" ?>
                        </div>
                        <div class="col-sm-2">
                            <a href="shop/user/form_address/<?php echo $value->id ?>" class="edit"><i
                                    class="pe-7s-note pe-lg "></i></a>
                            <a href="javascript:;" data-toggle="modal" data-target="#delConfirm<?php echo $value->id ?>"
                               class="edit"><i class="pe-7s-trash pe-lg "></i></a>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="delConfirm<?php echo $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Delete this address?</h4>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    <a type="button" href="shop/user/delete_address/<?php echo $value->id ?>" class="btn btn-default">Delete</a>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</section>