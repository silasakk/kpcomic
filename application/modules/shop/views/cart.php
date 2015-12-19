<section class="block myaccount">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-9"><h4 class="text-uppercase login-welcome"><?php echo __('Shopping Cart','ตระกร้าสินค้า') ?></h4></div>
            <div class="col-xs-7 text-right">
                <p class="lang-switch"><a href="shop/lang_switch/en" <?php echo $_COOKIE['lang'] == 'en' ? 'class="active"' : ''?> >EN</a><a href="shop/lang_switch/th" <?php echo $_COOKIE['lang'] == 'th' ? 'class="active"' : ''?> >ไทย</a></p>
            </div>
        </div>
        <div class="row myaccount-contianer  cart-wrap">

            <div class="col-xs-16 ">
                <div class="row table-header hidden-xs">
                    <div class="col-md-2 col-sm-2"><?php echo __('Product','สินค้า') ?></div>
                    <div class="col-md-4 col-sm-3"><?php echo __('Description','รายละเอียด') ?></div>
                    <div class="col-md-2 col-sm-2"><?php echo __('Color','สี') ?></div>
                    <div class="col-md-2 col-sm-2"><?php echo __('Size','ขนาด') ?></div>
                    <div class="col-md-3 col-sm-2"><?php echo __('Quantity','จำนวน') ?></div>
                    <div class="col-md-3  col-sm-4 text-center"><?php echo __('Price','ราคา') ?></div>

                </div>
                <div class="row table-row" ng-repeat="product in products">
                    <div class="col-md-2 col-sm-2 col-xs-4"><img width="65" src="{{product.icon}}"></div>
                    <div class="col-md-4 col-sm-3 paddingtop col-xs-8"><span class="title visible-xs">Product:</span> {{product.name}} <br> Code: {{product.code}}</div>
                    <div class="col-md-2 col-sm-2 paddingtop col-xs-8"><span class="title visible-xs">Color:</span> {{product.color}}</div>
                    <div class="col-md-2 col-sm-2 paddingtop col-xs-8"><span class="title visible-xs">Size:</span> {{product.size}}</div>
                    <div class="col-md-3 col-sm-3 col-xs-10 spinner">
                        <span class="title visible-xs"><?php echo __('Quantity','จำนวน') ?> :</span>
                        <input type="text" class="form-control" value="{{product.qty}}" ng-value="{{product.qty}}">
                        <button ng-click="plusqty(product)" class="btn  " type="button"><i class="fa fa-plus "></i></button>
                        <button ng-click="minusqty(product)" class="btn " type="button"><i class="fa  fa-minus"></i></button>

                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-6 paddingtop">
                        <div class="row">
                            <div class="col-sm-9 col-md-11 col-xs-11 text-right">
                                <span class="price">฿ {{product.price * product.qty | number : 2 }}</span>
                            </div>
                            <div class="col-sm-7 col-md-5 col-xs-5 remove">
                                <a href="javascript:;" ng-click="removeCart(product)" ><i class="pe-7s-close  "></i></a>
                            </div>
                        </div>


                    </div>

                </div>


                <div class="row table-row">

                    <div class="col-md-11 col-sm-9 col-xs-7"> {{products.length}} <?php echo __('Products in your shopping cart','สินค้าในตระกร้าของคุณ') ?></div>
                    <div class="col-md-2 text-right total col-sm-3 col-xs-3"><?php echo __('Subtotal','ราคารวม') ?></div>
                    <div class="col-md-3 total col-sm-3 col-xs-4">
                        <div class="row">
                            <div class="col-md-11 col-sm-11 text-right">
                                <span class="price">฿ {{ subtotal | number : 2 }}</span>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="row myaccount-contianer  cart-wrap-middle">

            <form method="post" action="shop/shipping_info" class="form-inline" id="add_order" >
                <div class="col-md-16 col-sm-16 col-xs-16 shipping">

                    <div class="row ">

                        <div class="col-md-12 col-sm-9 col-xs-7"><h4><?php echo __('Shipping method','วิธีการจัดส่งสินค้า') ?></h4>

                        </div>
                        <!--<div class="col-md-3 text-right col-sm-7 col-xs-9">Shipping to <span class="country">thailand</span><a href="#" class="edit"><i class="pe-7s-note pe-lg "></i><small>Edit</small></a></div>-->


                    </div>
                    <div class="row ">

                        <div class="col-md-12 col-sm-10 col-xs-16">
                            <div class="row" ng-init="shipping = {method : 'register'}">
                                <div class=" col-md-4 col-sm-8 col-xs-16">
                                    <label class="">
                                        <input type="radio" ng-model="shipping.method" ng-change="shippingCost()" name="shipping_method"  value="register">
                                        <?php echo __('Delivery 3 - 5 Days','ไปรษณีย์ลงทะเบียน 3 - 5 วัน') ?>
                                    </label>


                                </div>
                                <div class=" col-md-4 col-sm-8 col-xs-16">

                                    <label class="">
                                        <input type="radio" ng-model="shipping.method" ng-change="shippingCost()" name="shipping_method" value="ems">
                                        <?php echo __('Express Delivery 1 - 2 Days','ไปรษณีย์ EMS 1 - 2 วัน') ?>
                                    </label>

                                </div>
                            </div>


                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-9 text-right total "><?php echo __('Shipping fee','ค่าขนส่ง') ?></div>
                        <div class="col-md-2 col-sm-3 col-xs-7 total ">
                            <div class="row">
                                <div class="col-md-11 col-sm-11 col-xs-11 text-right" ng-init="shipping.cost=50">

                                    <span class="price">฿ {{shipping.cost}}</span>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-16 col-sm-16 col-xs-16 grandtotal">
                    <div class="row ">

                        <div class="col-md-12 col-sm-10 col-xs-8 ">

                                <div class="form-group codebox">
                                    <label for="exampleInputName2"><?php echo __('Promotion Code','โปรโมชั่นโค๊ด') ?></label>
                                    <input type="text" class="form-control" id="exampleInputName2" placeholder="">
                                </div>

                                <button type="submit" class="btn btn-default"><?php echo __('Apply','ตกลง') ?></button>


                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right text"><?php echo __('Total','ราคารวมทั้งสิ้น') ?></div>
                        <div class="col-md-2 col-sm-3 col-xs-6 text">
                            <div class="row">
                                <div class="col-md-11 text-right">

                                    <span class="price">฿ {{ subtotal + shipping.cost | number : 2 }}</span>
                                </div>

                            </div>
                        </div>


                    </div>

                </div>
                <div class="col-md-16 action col-sm-16 col-xs-16">
                    <div class="row ">

                        <div class="col-md-offset-10 col-md-3 col-sm-8 ">
                            <a href="shop" class="btn btn-primary btn-block btn-lg"><?php echo __('Continue shopping','เลือกสินค้าต่อ') ?></a>
                        </div>
                        <div class="col-md-3 col-sm-8">
                            <?php if($this->session->userdata('user_id')): ?>
                                <a class="btn btn-default btn-block btn-lg"  ng-click="preparecart(products,'go');" ><?php echo __('checkout','เช็คเอาท์') ?></a>
                            <?php else: ?>
                                <a class="btn btn-default btn-block btn-lg"  data-toggle="modal"  ng-click="preparecart(products)" data-target="#myModal"><?php echo __('checkout','เช็คเอาท์') ?></a>
                            <?php endif ?>
                        </div>


                    </div>

                </div>
            </form>
        </div>
    </div>
</section>

<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row row-eq-height">
                        <div class="col-md-6 col-md-offset-1 col-sm-7 col-xs-16 ">

                            <form id="login" method="post" action="shop/auth/post_login" >
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
                                <a onclick="fb_login();" class="btn btn-block btn-lg fb-btn">LOGIN WITH FACEBOOK</a>
                            </form>
                        </div>
                        <div class="col-md-1 col-sm-1  cart-login-wrap hidden-xs col-xs-16">

                        </div>

                        <div class="col-md-6 col-md-offset-1 col-sm-7 col-sm-offset-1 col-xs-16 ">
                            <hr class="visible-xs">
                            <h3 class="text-uppercase text-center"> New Customer</h3><br/>
                            <p>Creating an account with Milin and make your shipping easier.</p>
                            <a class="btn btn-default btn-block btn-lg" href="shop/auth/register" >Register</a>
                            <a onclick="fb_login();" href="javascript:;" class="btn btn-block btn-lg fb-btn">Register WITH FACEBOOK</a><br/><br/>
                            <p>Optionally, You can checkout without creating an account with guest checkout.</p>
                            <a class="btn btn-primary btn-block btn-lg" onclick="$('#add_order').submit()" >Guest Checkout</a>

                        </div>
                    </div>

                    <div class="modal-footer">

                    </div>

                </div>
            </div>

        </div><!-- /.modal-content -->
    </div>
</div>