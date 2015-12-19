<section class="block myaccount">
    <div class="container">
        <h3 class="text-uppercase text-center"> <?php echo $this->session->flashdata("msg") ?></h3>
        <br><br>
        <div class="row row-eq-height">
            <div class="col-md-6 col-md-offset-1 col-sm-7 col-xs-16 ">

                <form id="login-cart" class=" form-on-white">
                    <h3 class="text-uppercase text-center">Returning customer</h3><br/>

                    <div class="form-group ">
                        <label for="Username">Username</label>
                        <input type="text" class="form-control" id="Username1" placeholder="Username"
                               name="username">
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="Password1"
                               placeholder="Password1" name="password">
                    </div>

                    <button type="submit" class="btn btn-default btn-block btn-lg">LOGIN</button>
                    <p class="text-center forgot-pwd">
                        <a href="#">Forgot password?</a></p>
                    <a class="btn btn-block btn-lg fb-btn">LOGIN WITH FACEBOOK</a>
                </form>
            </div>
            <div class="col-md-1 col-sm-1  cart-login-wrap hidden-xs col-xs-16">

            </div>

            <div class="col-md-6 col-md-offset-1 col-sm-7 col-sm-offset-1 col-xs-16 ">
                <hr class="visible-xs">
                <h3 class="text-uppercase text-center"> New Customer</h3><br/>

                <p>Creating an account with Milin and make your shipping easier.</p>
                <a class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#myModal">Register</a>
                <a class="btn btn-block btn-lg fb-btn">Register WITH FACEBOOK</a><br/><br/>

                <p>Optionally, You can checkout without creating an account with guest checkout.</p>
                <a class="btn btn-primary btn-block btn-lg" href="checkout-guestcheckout.html">Guest Checkout</a>

            </div>
        </div>

        <div class="modal-footer">

        </div>

    </div>
</section>