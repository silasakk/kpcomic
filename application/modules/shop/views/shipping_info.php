<section class="block checkout">
    <div class="container-fluid">
        <form method="post" action="shop/add_order_info" >
            <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
            <div class="row">
                <div class="col-xs-4"><h4 class="text-uppercase ">Checkout</h4></div>
                <div class="col-xs-12 step-container">
                    <div class="row">
                        <div class="col-xs-3">
                            <p class="step"><span class="number active">1</span><span class="text-uppercase"><?php echo __('Shipping info','รายละเอียดการจัดส่ง') ?></span></p>
                        </div>
                        <div class="col-xs-4">
                            <p class="step"><span class="number">2</span><span class="text-uppercase"><?php echo __('Confirm Order','ยืนยันรายการ') ?></span></p>
                        </div>
                        <div class="col-xs-3">
                            <p class="step"><span class="number">3</span><span class="text-uppercase"><?php echo __('Payment','การชำระเงิน') ?></span></p>
                        </div>
                        <div class="col-xs-3">
                            <p class="step"><span class="number">4</span><span class="text-uppercase"><?php echo __('Complete','การสั่งซท่อเสร็จสมบูรณ์') ?></span></p>
                        </div>
                        <div class="col-xs-3 text-right">
                            <p class="lang-switch"><a href="shop/lang_switch/en" <?php echo $_COOKIE['lang'] == 'en' ? 'class="active"' : ''?> >EN</a><a href="shop/lang_switch/th" <?php echo $_COOKIE['lang'] == 'th' ? 'class="active"' : ''?> >ไทย</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row checkout-container  cart-wrap">
                <div class="col-md-8">

                    <div class="form-horizontal form-on-white ">
                        <h4 class="text-uppercase address-title"><?php echo __('Shipping address','ที่อยู่สำหรับจัดส่งสินค้า') ?></h4>



                        <div class="form-group">

                            <label  class="col-sm-5 control-label" ><?php echo __('Select from Address Book','เลือกจากรายการที่อยู่ของคุณ') ?></label>
                            <div class="col-sm-9">
                                <div class="select">
                                    <label>
                                        <select  name="select_address" id="select_address" ng-model="selectAddress" ng-init="selectAddress='0'"  class="form-control  ">
                                            <option  value="0"   ><?php echo __('Select Address','เลือกที่อยู่') ?></option>
                                            <?php
                                            //select query
                                            $sql = "select * from member_address where member_id = '{$this->session->userdata('user_id')}' ";
                                            $qry = $this->db->query($sql);
                                            $result = $qry->result();
                                            foreach($result as $value):
                                                ?>
                                                <option value="<?php echo $value->id ?>" ><?php echo $value->name ?></option>

                                            <?php endforeach; ?>

                                        </select>
                                    </label>
                                </div>
                                <div class="text-danger"><small><i class="fa fa-exclamation"></i> <?php echo __('please select address','กรุณาเลือกที่อยู่ของคุณ') ?></small></div>
                                <a href="shop/user/form_address" class="new-address"><?php echo __('Add new address','เพิ่มที่อยู่ใหม่') ?></a>
                            </div>
                        </div>


                    </div>



                </div>
                <div class="col-md-8">
                    <h4 class="text-uppercase address-title"><?php echo __('Billing address','ที่อยู่จัดส่งใบกำกับภาษี') ?></h4>
                    <div class="form-horizontal">

                        <div class="form-horizontal form-on-white"  >

                            <div class="form-group" ng-show="billing=='0'">

                                <label  class="col-sm-5 control-label" ><?php echo __('Select from Address Book','เลือกจากรายการที่อยู่ของคุณ') ?></label>
                                <div class="col-sm-9">
                                    <div class="select">
                                        <label>
                                            <select required name="select_billing"  ng-model="selectBilling" ng-init="selectBilling='0'"  class="form-control  ">
                                                <option  value="0"   ><?php echo __('Select Address','เลือกที่อยู่') ?></option>
                                                <?php
                                                //select query
                                                $sql = "select * from member_address where member_id = '{$this->session->userdata('user_id')}' ";
                                                $qry = $this->db->query($sql);
                                                $result = $qry->result();
                                                foreach($result as $value):
                                                    ?>
                                                    <option value="<?php echo $value->id ?>" ><?php echo $value->name ?></option>

                                                <?php endforeach; ?>

                                            </select>
                                        </label>
                                    </div>

                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="col-sm-10">
                                <div class="radio paddingbottom" ng-init="billing=1">
                                    <label>
                                        <input type="radio" name="billing" ng-disabled="selectAddress == '0'" ng-model="billing" name="optionsRadios" id="optionsRadios1" value="1" checked>
                                        <?php echo __('Same with my shipping address','ใช้ที่อยู่เดียวกับที่อยู่ในการจัดส่งสินค้า') ?>
                                    </label>
                                </div>
                                <div class="radio paddingbottom">
                                    <label>
                                        <input type="radio" name="billing" ng-disabled="selectAddress == '0'" ng-model="billing" name="optionsRadios" id="optionsRadios1" value="0" >
                                        <?php echo __('Use different address','ใช้ที่อยู่อื่น') ?>
                                    </label>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>

            </div>
            <div class="row checkout-container" >

                <?php
                //select query
                $sql = "select * from member_address where member_id = '{$this->session->userdata('user_id')}' ";
                $qry = $this->db->query($sql);
                $result = $qry->result();
                foreach($result as $value):
                    ?>
                    <div class="show-address col-sm-7 col-xs-10 col-xs-offset-1" ng-show="'<?php echo $value->id ?>' === selectAddress">
                        <p><?php echo $value->recipient ?></p>
                        <p><?php echo $value->address ?></p>
                        <p><?php echo $value->city ?> <?php echo $value->country ?> <?php echo $value->post_code ?></p>
                        <p><?php echo $value->telephone ?></p>
                    </div>

                <?php endforeach; ?>

                <?php
                //select query
                $sql = "select * from member_address where member_id = '{$this->session->userdata('user_id')}' ";
                $qry = $this->db->query($sql);
                $result = $qry->result();
                foreach($result as $value):
                    ?>
                    <div class="show-address col-sm-7  col-xs-10 col-xs-offset-1" ng-show="'<?php echo $value->id ?>' === selectBilling">
                        <p><?php echo $value->recipient ?></p>
                        <p><?php echo $value->address ?></p>
                        <p><?php echo $value->city ?> <?php echo $value->country ?> <?php echo $value->post_code ?></p>
                        <p><?php echo $value->telephone ?></p>
                    </div>

                <?php endforeach; ?>



            </div>
            <div class="row checkout-container  cart-wrap-middle">
                <div class="col-md-6 col-md-offset-1 shipping-option">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <h4 class="text-uppercase"><?php echo __('Shipping method','วิธีการจัดส่งสินค้า') ?></h4>
                                <div class="radio paddingbottom">
                                    <label>
                                        <input type="radio" name="shipping_method" name="optionsRadios" id="optionsRadios1" value="register"  <?php echo ($shipping == 'register') ? "checked" : "" ?>>
                                        <?php echo __('Delivery 3 - 5 Days','ไปรษณีย์ลงทะเบียน 3 - 5 วัน') ?> <!--<span class="free">FREE</span>-->
                                    </label>
                                </div>
                                <div class="radio paddingbottom">
                                    <label>
                                        <input type="radio" name="shipping_method" name="optionsRadios" id="optionsRadios1" value="ems" <?php echo ($shipping == 'ems') ? "checked" : "" ?> >
                                        <?php echo __('Express Delivery 1 - 2 Days','ไปรษณีย์ EMS 1 - 2 วัน') ?>
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
                                <h4 class="text-uppercase"><?php echo __('Payment Method','วิธีการชำระเงิน') ?></h4>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="payment_method" id="optionsRadios1" value="payment_gateway" checked>
                                        <img src="themes/milin/assets/img/card.png"> Pay with Credit card
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="payment_method" id="optionsRadios1" value="paypal" >
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
                    <a onclick="window.history.back()" class="btn btn-primary btn-block btn-lg"><?php echo __('Back to cart','กลับสู่ตระกร้าสินค้า') ?></a>
                </div>
                <div class="col-xs-3 ">
                    <button class="btn btn-default btn-block btn-lg proceed" type="submit"><?php echo __('Proceed','ดำเนินการต่อ') ?></button>
                </div>



            </div>
        </form>
    </div>
</section>

