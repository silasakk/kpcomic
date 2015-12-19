<section class="block checkout">
    <div class="container-fluid">
        <form method="post" action="shop/add_order_info">
            <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
            <div class="row">
                <div class="col-xs-4"><h4 class="text-uppercase ">Guest checkout</h4></div>
                <div class="col-xs-12 step-container">
                    <div class="row">
                        <div class="col-xs-3">
                            <p class="step"><span class="number active">1</span><span
                                    class="text-uppercase"><?php echo __('Shipping info', 'รายละเอียดการจัดส่ง') ?></span>
                            </p>
                        </div>
                        <div class="col-xs-4">
                            <p class="step"><span class="number">2</span><span
                                    class="text-uppercase"><?php echo __('Confirm Order', 'ยืนยันรายการ') ?></span></p>
                        </div>
                        <div class="col-xs-3">
                            <p class="step"><span class="number">3</span><span
                                    class="text-uppercase"><?php echo __('Payment', 'การชำระเงิน') ?></span></p>
                        </div>
                        <div class="col-xs-3">
                            <p class="step"><span class="number">4</span><span
                                    class="text-uppercase"><?php echo __('Complete', 'การสั่งซท่อเสร็จสมบูรณ์') ?></span>
                            </p>
                        </div>
                        <div class="col-xs-3 text-right">
                            <p class="lang-switch"><a
                                    href="shop/lang_switch/en" <?php echo $_COOKIE['lang'] == 'en' ? 'class="active"' : '' ?> >EN</a><a
                                    href="shop/lang_switch/th" <?php echo $_COOKIE['lang'] == 'th' ? 'class="active"' : '' ?> >ไทย</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row checkout-container  cart-wrap">
                <div class="col-md-8">
                    <div class="form-horizontal form-on-white ">
                        <h4 class="text-uppercase address-title"><?php echo __('Shipping address', 'ที่อยู่สำหรับจัดส่งสินค้า') ?></h4>
                        <div class="form-group">
                            <label for="inputFirstname"
                                   class="col-sm-2  control-label"><?php echo __('Firstname', 'ชื่อ') ?></label>

                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" id="inputFirstname"
                                       placeholder="Firstname_">
                            </div>
                            <label for="inputLastname"
                                   class="col-sm-2  control-label"><?php echo __('Lastname', 'นามสกุล') ?></label>
                            <div class="col-sm-6">
                                <input type="text" name="lastname" class="form-control" id="inputLastname"
                                       placeholder="Lastname_">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress"
                                   class="col-sm-2 control-label"><?php echo __('Address', 'ที่อยู่') ?></label>
                            <div class="col-sm-14">
                                <input type="text" name="address" class="form-control" id="inputAddress" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3"
                                   class="col-sm-2 control-label"><?php echo __('City', 'จังหวัด') ?></label>

                            <div class="col-sm-6">
                                <input type="text" name="city" class="form-control" id="inputEmail3"
                                       placeholder="Enter City">
                            </div>
                            <label for="inputEmail3"
                                   class="col-sm-2 control-label"><?php echo __('Country', 'ประเทศ') ?></label>
                            <div class="col-sm-6">
                                <div class="select">
                                    <label>
                                        <select required name="country" class="form-control">
                                            <option><?php echo __('Select Country', 'เลือกประเทศ') ?></option>
                                            <?php
                                            /*
                                             *
                                             * GET Country from database table location
                                             *
                                             * */

                                            $sql = "select * from `location` where parent_id = 0 order by name asc ";
                                            $qry = $this->db->query($sql);
                                            $list = $qry->result();
                                            foreach ($list as $v): ?>
                                                <option><?php echo $v->name ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3"
                                   class="col-sm-2 control-label"><?php echo __('Postcode', 'รหัสไปรษณีย์') ?></label>
                            <div class="col-sm-6">
                                <input type="number" name="post_code" class="form-control" id="inputEmail3"
                                       placeholder="Postcode">
                            </div>
                            <label for="inputEmail3"
                                   class="col-sm-2 control-label"><?php echo __('Mobile', 'เบอร์โทรศัพท์') ?></label>
                            <div class="col-sm-6">
                                <input type="number" name="telephone" class="form-control" id="inputEmail3"
                                       placeholder="Mobile no">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress"
                                   class="col-sm-2 control-label"><?php echo __('Email', 'อีเมล์') ?></label>

                            <div class="col-sm-14">
                                <input type="email" name="email" class="form-control" id="inputAddress" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h4 class="text-uppercase address-title"><?php echo __('Billing address', 'ที่อยู่การจัดส่งใบกำกับภาษี') ?></h4>
                    <?php
                    /*
                     * SHow when select billing different
                     * */
                    ?>
                    <div ng-show="billing==0" class="form-horizontal form-on-white ">
                        <div class="form-group">
                            <label for="inputFirstname"
                                   class="col-sm-2  control-label"><?php echo __('Firstname', 'ชื่อ') ?></label>
                            <div class="col-sm-6">
                                <input type="text" name="name_bil" class="form-control" id="inputFirstname"
                                       placeholder="Firstname_">
                            </div>
                            <label for="inputLastname"
                                   class="col-sm-2  control-label"><?php echo __('Lastname', 'นามสกุล') ?></label>
                            <div class="col-sm-6">
                                <input type="text" name="lastname_bil" class="form-control" id="inputLastname"
                                       placeholder="Lastname_">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress"
                                   class="col-sm-2 control-label"><?php echo __('Address', 'ที่อยู่') ?></label>
                            <div class="col-sm-14">
                                <input type="text" name="address_bil" class="form-control" id="inputAddress"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3"
                                   class="col-sm-2 control-label"><?php echo __('City', 'จังหวัด') ?></label>
                            <div class="col-sm-6">
                                <input type="text" name="city_bil" class="form-control" id="inputEmail3"
                                       placeholder="Enter City">
                            </div>
                            <label for="inputEmail3"
                                   class="col-sm-2 control-label"><?php echo __('Country', 'ประเทศ') ?></label>
                            <div class="col-sm-6">
                                <div class="select">
                                    <label>
                                        <select required name="country_bil" class="form-control">
                                            <option><?php echo __('Select Country', 'เลือกประเทศ') ?></option>
                                            <?php
                                            /*
                                             *
                                             * GET Country from database table location
                                             *
                                             * */
                                            $sql = "select * from `location` where parent_id = 0 order by name asc ";
                                            $qry = $this->db->query($sql);
                                            $list = $qry->result();
                                            foreach ($list as $v): ?>
                                                <option><?php echo $v->name ?></option>
                                            <?php endforeach ?>

                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3"
                                   class="col-sm-2 control-label"><?php echo __('Postcode', 'รหัสไปรษณีย์') ?></label>
                            <div class="col-sm-6">
                                <input type="number" name="post_code_bil" class="form-control">
                            </div>
                            <label for="inputEmail3"
                                   class="col-sm-2 control-label"><?php echo __('Mobile', 'เบอร์โทรศัพท์') ?></label>

                            <div class="col-sm-6">
                                <input type="number" name="telephone_bil" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress"
                                   class="col-sm-2 control-label"><?php echo __('Email', 'อีเมล์') ?></label>
                            <div class="col-sm-14">
                                <input type="eamil" name="email_bil" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <div class="radio paddingbottom" ng-init="billing=1">
                                    <label>
                                        <input type="radio" name="billing" ng-model="billing" id="optionsRadios1"
                                               value="1" checked>
                                        <?php echo __('Same with my shipping address', 'ใช้ที่อยู่เดียวกับที่อยู่ในการจัดส่งสินค้า') ?>
                                    </label>
                                </div>
                                <div class="radio paddingbottom">
                                    <label>
                                        <input type="radio" name="billing" ng-model="billing" id="optionsRadios1"
                                               value="0">
                                        <?php echo __('Use different address', 'ใช้ที่อยู่อื่น') ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row checkout-container  cart-wrap-middle">
                <div class="col-md-6 col-md-offset-1 shipping-option">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <h4 class="text-uppercase"><?php echo __('Shipping method', 'วิธีการจัดส่งสินค้า') ?></h4>
                                <div class="radio paddingbottom">
                                    <label>
                                        <input type="radio" name="shipping_method" name="optionsRadios"
                                               id="optionsRadios1"
                                               value="register" <?php echo ($shipping == 'register') ? "checked" : "" ?>>
                                        <?php echo __('Delivery 3 - 5 Days', 'ไปรษณีย์ลงทะเบียน 3 - 5 วัน') ?>
                                        <!--<span class="free">FREE</span>-->
                                    </label>
                                </div>
                                <div class="radio paddingbottom">
                                    <label>
                                        <input type="radio" name="shipping_method" name="optionsRadios"
                                               id="optionsRadios1"
                                               value="ems" <?php echo ($shipping == 'ems') ? "checked" : "" ?> >
                                        <?php echo __('Express Delivery 1 - 2 Days', 'ไปรษณีย์ EMS 1 - 2 วัน') ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-1">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <h4 class="text-uppercase"><?php echo __('Payment Method', 'วิธีการชำระเงิน') ?></h4>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="payment_method" id="optionsRadios1"
                                               value="payment_gateway" checked>
                                        <img src="themes/milin/assets/img/card.png"> Pay with Credit card
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="payment_method" id="optionsRadios1" value="paypal">
                                        <img src="themes/milin/assets/img/paypal.png"> Pay with Paypal
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row checkout-container  cart-wrap-middle">
                <div class="col-xs-offset-10 col-xs-3 ">
                    <a onclick="window.history.back()" class="btn btn-primary btn-block btn-lg">Back to cart</a>
                </div>
                <div class="col-xs-3 ">
                    <button class="btn btn-default btn-block btn-lg" type="submit">Proceed</button>
                </div>
            </div>
        </form>
    </div>
</section>