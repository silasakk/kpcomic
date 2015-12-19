<section class="block myaccount">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-16"> <h4 class="text-uppercase login-welcome">Hi, Pavita</h4></div>
        </div>
        <div class="row myaccount-contianer row-eq-height">

            <?php include "menu.php"; ?>
            <div class="col-sm-11 col-md-12 col-lg-13  column-right-fullwidth">
                <h3 >Add New Address </h3>
                <div class="row">
                    <div class="col-xs-8">
                        <p class="sub-text2">Please fill below information</p>
                    </div>


                </div>

                <form class="form-horizontal form-on-white" method="post" action="shop/user/save_address/<?php echo @$address[0]->id ?>" >



                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-6">
                            <input  type="text" name="name" class="form-control"  value="<?php echo $address[0]->name ?>"  placeholder="Enter Name">
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">Recipient</label>
                        <div class="col-sm-6">
                            <input  type="text" name="recipient" class="form-control" value="<?php echo $address[0]->recipient ?>"  placeholder="Enter Recipient">
                        </div>

                    </div>



                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-14">
                            <input  type="text" name="address" class="form-control" required value="<?php echo $address[0]->address ?>"  placeholder="No.,Floor,Street,District">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-6">
                            <input  type="text" name="city" class="form-control" required value="<?php echo $address[0]->city ?>"  placeholder="Enter City">
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-6">
                            <div class="select">
                                <label>
                                    <select required name="country" class="form-control">
                                        <option>Select Country</option>
                                        <?php //select query
                                        $sql = "select * from `location` where parent_id = 0 order by name asc ";
                                        $qry = $this->db->query($sql);
                                        $list = $qry->result();
                                        foreach($list as $v): ?>
                                            <option <?php echo ($v->name == @$address[0]->country)?"selected" : "" ?> ><?php echo $v->name ?></option>
                                        <?php endforeach ?>

                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Postcode</label>
                        <div class="col-sm-6">
                            <input  type="text" class="form-control" required name="post_code" value="<?php echo $address[0]->post_code ?>"  placeholder="Postcode">
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">Mobile</label>
                        <div class="col-sm-6">
                            <input  type="text" class="form-control" name="telephone" value="<?php echo $address[0]->telephone ?>"  placeholder="Mobile no">
                        </div>

                    </div>
                    <div class="form-group">

                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-lg btn-block btn-default">Save</button>
                        </div>

                    </div>


                </form>



            </div>

        </div>
    </div>
</section>