<section class="block myaccount">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-16"> <h4 class="text-uppercase login-welcome">Hi, Pavita</h4></div>
        </div>
        <div class="row myaccount-contianer row-eq-height">

            <?php include "menu.php"; ?>
            <div class="col-sm-11 col-md-12 col-lg-13 column-right">
                <h3 >Access Details </h3>
                <div class="row">
                    <div class="col-xs-16">
                        <p class="sub-title2">Change of an email address</p>
                        <p class="sub-text">If you wish to update the e-mail address associated with this account, please fill in the following fields. Your password is requested for security reasons.</p>
                    </div>

                </div>
                <form class="form-horizontal form-on-white">



                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">New Email </label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="New Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Confirm New Email </label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Confirm New Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-4"><button type="submit" class="btn btn-lg btn-default">Update Email address</button></div>

                    </div>


                </form>

                <div class="row">
                    <div class="col-xs-16">
                        <p class="sub-title2">Change Password</p>
                        <p class="sub-text">If you wish to change the password to access your account, please provide the following information:</p>
                    </div>

                </div>
                <form class="form-horizontal form-on-white">



                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Current Password </label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Current Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">New Password </label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="New Password">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Show Password</a>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-4"><button type="submit" class="btn btn-lg btn-default">Change Password</button></div>

                    </div>


                </form>



            </div>

        </div>
    </div>
</section>