<section class="block myaccount">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-16"> <h4 class="text-uppercase login-welcome">Hi, Pavita</h4></div>
        </div>
        <div class="row myaccount-contianer row-eq-height">

            <?php include "menu.php"; ?>
            <div class="col-sm-11 col-md-12 col-lg-13 column-right">
                <h3 >Personal Info </h3>
                <?php if($msg = $this->session->flashdata('msg') ): ?>
                <div class="text-success text-center well"><?php echo $msg; ?></div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-xs-16">
                        <p class="sub-title">Contact Address</p>
                    </div>

                </div>
                <form class="form-horizontal form-on-white" method="post" action="shop/user/info_save" >

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 col-md-2 control-label">Firstname</label>
                        <div class="col-sm-5 col-md-6">
                            <input type="text" class="form-control" name="name" value="<?php echo $user[0]->name ?>"  placeholder="Enter Firstname">
                        </div>
                        <label for="inputEmail3" class="col-sm-3 col-md-2 control-label">Lastname</label>
                        <div class="col-sm-5 col-md-6">
                            <input type="text" class="form-control" name="lastname"  value="<?php echo $user[0]->lastname ?>" placeholder="Enter Lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 col-md-2 control-label">ID/Passport</label>
                        <div class="col-sm-5 col-md-6">
                            <input type="number" class="form-control" name="card_id" value="<?php echo $user[0]->card_id ?>"   placeholder="Enter ID or passport no">
                        </div>
                        <label for="inputEmail3" class="col-sm-3 col-md-2 control-label">Birthday</label>
                        <div class="col-sm-5 col-md-6">
                            <input type="date" class="form-control" name="birthday" value="<?php echo $user[0]->birthday ?>"  placeholder="dd/mm/yyy">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 col-md-2 control-label">Address</label>
                        <div class="col-sm-13 col-md-14">
                            <input type="text" class="form-control" name="address" value="<?php echo @$user[0]->address ?>"  placeholder="No.,Floor,Street,District">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 col-md-2 control-label">City</label>
                        <div class="col-sm-5 col-md-6">
                            <input type="text" class="form-control" name="city" value="<?php echo @$user[0]->city ?>"   placeholder="Enter City">
                        </div>
                        <label for="inputEmail3" class="col-sm-3 col-md-2 control-label">Country</label>
                        <div class="col-sm-5 col-md-6">
                            <div class="select">
                                <label>
                                    <select name="country" class="form-control  ">
                                        <option>Select Country</option>
                                        <?php //select query
                                        $sql = "select * from `location` where parent_id = 0 order by name asc ";
                                        $qry = $this->db->query($sql);
                                        $list = $qry->result();
                                        foreach($list as $v): ?>
                                            <option <?php echo ($v->name == @$user[0]->country)?"selected" : "" ?> ><?php echo $v->name ?></option>
                                        <?php endforeach ?>

                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 col-md-2 control-label">Postcode</label>
                        <div class="col-sm-5 col-md-6">
                            <input type="text" class="form-control" name="post_code" value="<?php echo @$user[0]->post_code ?>"  placeholder="Postcode">
                        </div>
                        <label for="inputEmail3" class="col-sm-3 col-md-2 control-label">Mobile</label>
                        <div class="col-sm-5 col-md-6">
                            <input type="text" class="form-control" name="telephone" value="<?php echo $user[0]->telephone ?>"  placeholder="Mobile no">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-lg btn-default">Update</button>

                </form>



            </div>

        </div>
    </div>
</section>