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
                        <p class="step"><span class="number ">2</span><span class="text-uppercase"><?php echo __('Confirm Order','ยืนยันรายการ') ?></span></p>
                    </div>
                    <div class="col-xs-3">
                        <p class="step"><span class="number active">3</span><span class="text-uppercase"><?php echo __('Payment','การชำระเงิน') ?></span></p>
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

            <div class="col-md-16 text-center  msg">

                <h3><?php echo __('We’re redirecting to payment gateway','เรากำลังเปลี่ยนเส้นทางไปยังหน้าการชำระเงิน') ?> .....</h3>

                <h5> <?php echo __('Please wait for 2-5 seconds.','กรุณารอ 2-5 วินาที') ?> </h5>

                <script>
                    setTimeout(function(){
                        window.location = '<?php echo base_url()?>shop/checkout_complete/<?php echo $order_id?>';
                    },2000)
                </script>
            </div>







        </div>

    </div>

    </div>
</section>