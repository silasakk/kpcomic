<section class="page-nobg">
    <div class="container-fluid">
        <div class="row page-content">
            <div class="col-sm-8 col-md-8 col-lg-6 col-lg-offset-2 ">


                <form class="form-horizontal register-new-container" method="post" action="shop/auth/post_register" >


                    <h3 class="text-center">new member account</h3>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-5 col-sm-offset-1 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" required class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-5 col-sm-offset-1 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" required class="form-control" id="inputPassword3" placeholder="Password">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Show Password</a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <label for="inputPassword3"  class="col-sm-5 col-sm-offset-1 control-label">Firstname</label>
                        <div class="col-sm-9">
                            <input type="text" name="firstname" class="form-control" id="inputPassword3" placeholder="Firstname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-5 col-sm-offset-1 control-label">Lastname</label>
                        <div class="col-sm-9">
                            <input type="text" name="lastname" class="form-control" id="inputPassword3" placeholder="Lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-5 col-sm-offset-1 control-label">ID/Passport #</label>
                        <div class="col-sm-9">
                            <input type="text" name="card_id" class="form-control" id="inputPassword3" placeholder="ID/Passport">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-5 col-sm-offset-1 control-label">Mobile #</label>
                        <div class="col-sm-9">
                            <input type="text" name="telephone" class="form-control" id="inputPassword3" placeholder="Mobile">
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <div class=" col-sm-12 col-sm-offset-1">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> I have read and agree to <a href="#"> term and conditions.</a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-7 ">
                            <button type="submit" class="btn btn-lg btn-block btn-default">Register</button>
                        </div>
                        <div class=" col-sm-7 ">
                            <a href="#" class="had-account">Already have an account?</a>
                        </div>
                    </div>
                </form>
                <p class="text-center or">OR</p>
                <div class="col-sm-16 register-fb">


                    <div class="col-sm-12 col-sm-offset-2"> <a onclick="fb_login();" class="btn btn-lg btn-block ">Register with facebook</a></div>

                </div>

            </div>
            <div class=" col-sm-8 col-md-8 col-lg-6  ">

                <form class="form-horizontal form-on-white register-member">
                    <h3 class="text-center">Purchase in-store before ?</h3>
                    <p class="col-sm-offset-0 col-sm-16 col-md-offset-1 col-md-14">Keep collecting points by connect your in-store member
                        account with online store account </p>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 col-sm-offset-1 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 col-sm-offset-1 control-label">Member ID</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Member ID">
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <div class=" col-sm-15 col-sm-offset-1">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> I have read and agree to <a href="#"> term and conditions.</a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" col-sm-8 col-sm-offset-1  col-md-offset-1  col-md-7 ">
                            <button type="submit" class="btn btn-lg btn-block btn-default">connect account</button>
                        </div>
                        <div class=" col-md-7 col-sm-7 ">
                            <a href="#" class="had-account">forgot your member id?</a>
                        </div>
                    </div>

                </form>





            </div>
        </div>

    </div>
</section>
