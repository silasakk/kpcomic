<section class=" shop" >
    <div class="container-fluid" >
        <?php include 'menu-product.php' ?>
        <div class="row product-container">
            <div class="col-xs-16 shop-stage">
                <div class="col-md-8">
                    <small>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home  "></i></a></li>
                            <li><a href="shop">Shop</a></li>
                            <li><a href="shop/brand/<?php echo $data[0]->brand ?>"><?php echo $data[0]->brand ?></a>
                            </li>
                            <li>
                                <a href="shop/collection/<?php echo rawurlencode(str_replace("/", "|", $data[0]->collection)); ?>"><?php echo $data[0]->collection ?></a>
                            </li>
                            <li>
                                <a href="shop/category/<?php echo rawurlencode(str_replace("/", "|", $data[0]->category)); ?>"><?php echo $data[0]->category ?></a>
                            </li>
                            <li class="active"><?php echo $data[0]->name ?></li>
                        </ol>
                    </small>
                </div>

            </div>
            <div class="col-sm-6 col-lg-6 col-lg-offset-1 ">
                <img src="./uploads/<?php echo $data[0]->image ?>" class="center-block img-responsive">
            </div>
            <div class="col-sm-2 col-lg-2 small-thumb">

                <?php
                if ($data[0]->gallery):
                    foreach (unserialize($data[0]->gallery) as $value): ?>
                        <img src="./uploads/<?php echo $value['image'] ?>" style="width: 66px"
                             class="center-block  thumbnail">
                    <?php endforeach;
                endif;
                ?>


            </div>
            <div class=" col-sm-8 col-lg-5 item-detail">
                <a href="#"> <i class="pe-7s-angle-left  "></i>
                    <small>Back</small>
                </a>

                <h1><?php echo $data[0]->name ?></h1>

                <p>COLLECTION: <a
                        href="shop/collection/<?php echo rawurlencode(str_replace("/", "|", $data[0]->collection)); ?>"><?php echo $data[0]->collection ?></a>
                </p>
                <h4>Details:</h4>

                <div>
                    <?php echo $data[0]->detail ?>
                </div>

                <?php
                /*PRODUCT UNIT*/

                $sql = "select * from product_unit where product_id = '{$data[0]->product_id}' order by price asc ";
                $qry = $this->db->query($sql);
                $product_unit = $qry->result();
                $product_unit = $product_unit[0];


                ?>

                <p class="price "><span class="sale">
                        ฿ <?php echo number_format($product_unit->price) ?></span>
                    <?php if ($product_unit->sale_price): ?>
                    <span
                        class="sale-price">฿ <?php echo number_format($product_unit->sale_price) ?> <?php echo 100 - (floor(($product_unit->sale_price * 100) / $product_unit->price)) ?>
                        % off</p>
            <?php endif; ?>

                <hr>
                <div class="row colour-select">
                    <div class="col-sm-16 col-lg-16 colour-thumb">
                        <h4>Colour:</h4>
                        <?php
                        /*PRODUCT COLOR*/
                        $sql = "select * from product_unit where product_id = '{$data[0]->product_id}' group by color order by color asc ";
                        $qry = $this->db->query($sql);
                        $product_color = $qry->result();

                        foreach ($product_color as $value):
                            ?>
                            <a href="javascript:;" onclick="colorgetCode($(this))" data-color="<?php echo $value->color ?>"  class="sel_color <?php echo $product_unit->color == $value->color ? 'selected' : '' ?>" >
                                <img width="50" src="./uploads/<?php echo ($value->thumb_color) ? $value->thumb_color :  $value->image ?>" class="thumbnail img-responsive">
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="row row-eq-height">
                    <div class="col-xs-10 col-sm-12 col-lg-8">
                        <h4>Select Size:</h4>
                        <div class="select">
                            <label>
                                <select class="form-control sel_size"  onchange="sizegetCode()">
                                    <option value="0">Select Size</option>

                                    <?php
                                    /*PRODUCT COLOR*/
                                    $sql = "select * from product_unit where product_id = '{$data[0]->product_id}' group by size order by size asc ";
                                    $qry = $this->db->query($sql);
                                    $product_size = $qry->result();

                                    foreach ($product_size as $value):
                                        ?>
                                        <option <?php echo $product_unit->size == $value->size ? 'selected' : '' ?> ><?php echo $value->size ?></option>


                                    <?php endforeach; ?>

                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-lg-8 size-chart">
                        <p><a href="#">Size Chart</a></p>
                    </div>
                </div>
                <div class="row button-set">
                    <div class="col-xs-8 col-sm-8">
                        <input type="hidden" id="mainproduct" value="<?php echo $data[0]->product_id ?>" />
                        <input type="hidden" id="singleCode"  value="<?php echo ($product_unit->product_unit_id) ?>" />
                        <a href="javascript:;" ng-click="addCart()" class="btn btn-default btn-lg btn-block"><i class="pe-7s-cart pe-lg "></i>Add to
                            cart</a>
                    </div>
                    <div class="col-xs-8 col-sm-8">
                        <a href="#" class="btn btn-primary btn-lg btn-block">Add to wishlist</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-16 col-lg-14 col-lg-offset-1">
                <hr/>
                <p class="related">You May Also Like</p>

                <div class="row">
                    <?php
                    $sql = "select
                            product.*,
                            product_unit.product_unit_id,
                            product_unit.price,
                            product_unit.sale_price
                            from  product
                            left join product_unit on product.product_id = product_unit.product_id
                            group by product_unit.product_id
                            order by rand() limit 0,4
                            ";
                    $qry = $this->db->query($sql);
                    $result = $qry->result();
                    foreach ($result as $value):
                        ?>
                        <div class="col-md-4 col-sm-8 col-xs-16 product-item ">


                            <a href="shop/item/<?php echo $value->slug ?>">
                                <div class="img-holder">
                                    <img src="./uploads/<?php echo $value->image_hover ?>"
                                         class="img-responsive center-block buttom">
                                    <img src="./uploads/<?php echo $value->image ?>"
                                         class="img-responsive center-block top">
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
                                            <?php echo 100 - (floor(($value->sale_price * 100) / $value->price)) ?>
                                            % off</span>
                                    <?php endif; ?>
                                </p>
                            </a>
                            <a href="javascript:;"
                               ng-click="addCart('<?php echo ($value->product_unit_id) ?>')"
                               class="btn btn-primary add-to-cart"><i class="pe-7s-cart pe-lg "></i>Add to cart</a>

                        </div>
                    <?php endforeach ?>


                </div>
            </div>

        </div>


    </div>
</section>