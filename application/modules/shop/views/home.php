<!-- ///////////////////// Block 16 columns ///////////////////// -->
<section class=" shop">
    <div class="container-fluid">
        <?php include 'menu-product.php' ?>
        <div class="row product-container">
            <div class="col-xs-16 shop-stage">
                <div class="col-sm-8 col-md-8 col-xs-8">

                    <small> Showing: <?php echo rawurldecode($text) ?>   </small>
                    <small> Result: <?php echo $total_rows ?> items</small>
                </div>
                <?php if($page): ?>
                <div class="col-sm-8 col-md-8 col-xs-8 text-right">
                    <small class="paginations">
                        <span>Page:</span>

                        <?php echo $page ?>

                    </small>
                </div>
                <?php endif ?>
            </div>
            <?php foreach ($data as $value): ?>
                <div class="col-md-4 col-sm-8 col-xs-16 product-item ">


                    <a href="shop/item/<?php echo $value->slug ?>">
                        <div class="img-holder">
                            <img src="./uploads/<?php echo $value->image_hover ?>"
                                 class="img-responsive center-block buttom">
                            <img src="./uploads/<?php echo $value->image ?>" class="img-responsive center-block top">
                        </div>
                    </a>
                    <a href=shop/item/<?php echo $value->slug ?>"">
                        <p class="product-name"><?php echo $value->name ?></p>

                        <p class="product-price">
                            <?php if (!$value->sale_price): ?>
                                <span class="">฿ <?php echo number_format($value->price) ?></span>
                            <?php else: ?>
                                <span class="sale">฿ <?php echo number_format($value->price) ?></span> <span
                                    class="sale-price">฿ <?php echo number_format($value->sale_price) ?>
                                    <?php echo 100 - (floor(($value->sale_price * 100) / $value->price)) ?>% off</span>
                            <?php endif; ?>
                        </p>
                    </a>

                    <a href="javascript:;" ng-click="addCart('<?php echo ($value->product_unit_id) ?>')"
                       class="btn btn-primary add-to-cart"><i class="pe-7s-cart pe-lg "></i>Add to cart</a>

                </div>
            <?php endforeach; ?>

            <?php if(!$data): ?>
                <div class="col-sm-16 text-center"> Sorry Data Not Found !</div>
            <?php endif; ?>


            <div class="col-xs-16 shop-stage-bottom">
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <small> Showing: <?php echo rawurldecode($text) ?></small>
                    <small> Result: <?php echo $total_rows ?> items</small>
                </div>
                <?php if($page): ?>
                <div class=" col-sm-8 col-md-8 col-xs-8 text-right ">
                    <small class="paginations">
                        <span>Page:</span>

                        <?php echo $page ?>

                    </small>
                </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>

