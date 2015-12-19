<section class="block myaccount">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-4"><h4 class="text-uppercase ">Checkout</h4></div>
            <div class="col-xs-12 step-container">
                <div class="row">
                    <div class="col-xs-3">
                        <p class="step"><span class="number ">1</span><span class="text-uppercase"><?php echo __('Shipping info','รายละเอียดการจัดส่ง') ?></span></p>
                    </div>
                    <div class="col-xs-4">
                        <p class="step"><span class="number active">2</span><span class="text-uppercase"><?php echo __('Confirm Order','ยืนยันรายการ') ?></span></p>
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

            <div class="col-xs-16 ">
                <div class="row orderinfo">
                    <div class="col-md-4 col-md-offset-1">
                        <h4 class="text-uppercase"><?php echo __('Order number','หมายเลขการสั่งซื้อ') ?></h4>
                        <p><?php echo $order[0]->id ?></p>
                    </div>
                    <div class="col-md-5">
                        <h4 class="text-uppercase"><?php echo __('Shipping Address','ที่อยู่การจัดส่ง') ?></h4>
                        <?php if($order[0]->guest == 0): ?>
                            <p><?php echo $order[0]->recipient ?></p>
                            <p><?php echo $order[0]->address ?><br>
                                <?php echo $order[0]->city ?> <?php echo $order[0]->country ?> <?php echo $order[0]->post_code ?><br>

                                <?php echo @$order[0]->telephone ?></p>
                        <?php else : ?>
                            <p><?php echo $order[0]->name ?> <?php echo $order[0]->lastname ?></p>
                            <p><?php echo $order[0]->address ?><br>
                                <?php echo $order[0]->city ?> <?php echo $order[0]->country ?> <?php echo $order[0]->post_code ?><br>
                                <?php echo $order[0]->email ?><br>
                                <?php echo $order[0]->telephone ?></p>
                        <?php endif; ?>

                    </div>


                    <div class="col-md-6">
                        <h4 class="text-uppercase"><?php echo __('Billing Address','ที่อยู่การจัดส่งใบกำกับภาษี') ?></h4>
                        <?php if($order[0]->billing == 0): ?>
                        <p><?php echo $order[0]->name_bil ?> <?php echo $order[0]->lastname_bil ?></p>
                        <p><?php echo $order[0]->address_bil ?><br>
                            <?php echo $order[0]->city_bil ?> <?php echo $order[0]->country_bil ?> <?php echo $order[0]->post_code_bil ?><br>

                            <?php echo $order[0]->telephone_bil ?></p>
                        <?php else : ?>
                            <p><?php echo $order[0]->name ?> <?php echo $order[0]->lastname ?></p>
                            <p><?php echo $order[0]->address ?><br>
                                <?php echo $order[0]->city ?> <?php echo $order[0]->country ?> <?php echo $order[0]->post_code ?><br>
                                <?php echo $order[0]->email_bil ?><br>
                                <?php echo $order[0]->telephone ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row table-header">
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
                    <div class="col-md-3 col-sm-3 col-xs-10 spinner text-center">

                        {{product.qty}}


                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-6 paddingtop">
                        <div class="row">
                            <div class="col-sm-9 col-md-11 col-xs-11 text-right">
                                <span class="price">฿ {{product.price * product.qty | number : 2 }}</span>
                            </div>
                            <div class="col-sm-7 col-md-5 col-xs-5 remove">

                            </div>
                        </div>


                    </div>

                </div>

                <div class="row table-row">

                    <?php
                    if($shipping_method == "register"){
                        $text = __('Delivery 3 - 5 Days','ไปรษณีย์ลงทะเบียน 3 - 5 วัน');
                        $fee = "50";
                    }else{
                        $text = __('Express Delivery 1 - 2 Days','ไปรษณีย์ EMS 1 - 2 วัน');
                        $fee = "100";
                    }

                    ?>

                    <div class="col-xs-2 "> <?php echo __('Shipping method','วิธีการจัดส่งสินค้า') ?>: </div>
                    <div class="col-xs-10  "><?php echo $text ?></div>
                    <div class="col-xs-2 "> <?php echo __('Shipping fee','ค่าขนส่ง') ?> </div>
                    <div class="col-xs-2 total  ">
                        <div class="row">
                            <div class="col-xs-11 text-right">
                                <span class="price">฿ <?php echo number_format($fee,2) ?></span>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row table-row">


                    <div class="col-xs-2 col-xs-offset-12"> <?php echo __('Discount','ส่วนลด') ?> </div>
                    <div class="col-xs-2 total  ">
                        <div class="row">
                            <div class="col-xs-11 text-right">
                                <span class="price">฿ 0.00</span>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row table-row grandtotal">


                    <div class="col-xs-2 col-xs-offset-12"> <?php echo __('Total (VAT Inc.)','ราคารวมทั้งสิ้น (รวม VAT)') ?> </div>
                    <div class="col-xs-2 total  ">
                        <div class="row">
                            <div class="col-xs-11 text-right">
                                <span class="price">฿ <?php echo number_format($order[0]->total,2) ?></span>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row action ">

                    <div class="col-xs-offset-10 col-xs-3 ">
                        <a onclick="window.history.back()" class="btn btn-primary btn-block btn-lg"> <?php echo __('back','กลับ') ?></a>
                    </div>
                    <div class="col-xs-3 ">
                        <a href="shop/confirm_order/<?php echo $order[0]->id ?>" class="btn btn-default btn-block btn-lg" ><?php echo __('confirm order','ยืนยันรายการ') ?></a>
                    </div>


                </div>

            </div>

        </div>

    </div>
</section>