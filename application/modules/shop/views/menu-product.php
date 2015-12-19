<div class="row shop-menu row-no-padding">

    <div class="col-sm-16  col-md-9 col-lg-9 col-lg-offset-4 col-md-offset-3">
        <ul class="list-inline shop-menu-list">
            <li><a href="shop/type/new" <?php echo (@$type == "new") ? 'class="active"' : '' ?> >News
                    Arrival</a></li>
            <li><a href="shop/type/top" <?php echo (@$type == "top") ? 'class="active"' : '' ?>>Top Seller</a>
            </li>
            <li><a href="shop/type/sale" <?php echo (@$type == "sale") ? 'class="active"' : '' ?>>Sale</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Shop by Brand <i
                        class="pe-7s-angle-down pe-2x "></i></a>
                <ul class="dropdown-menu">
                    <li><a href="shop/brand/milin">Milin</a></li>
                    <li><a href="shop/brand/mimi">MiMi</a></li>

                </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Shop by Collection <i
                        class="pe-7s-angle-down pe-2x "></i></a>
                <ul class="dropdown-menu">
                    <?php
                    $sql = "select * from product_collection order by order_by ASC";
                    $qry = $this->db->query($sql);
                    $result = $qry->result();
                    foreach ($result as $value):?>
                        <li>
                            <a href="shop/collection/<?php echo  rawurlencode(str_replace("/", "|", $value->name)); ?>"><?php echo $value->name ?></a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false"> Shop by Category <i
                        class="pe-7s-angle-down pe-2x "></i> </a>
                <ul class="dropdown-menu">
                    <?php
                    $sql = "select * from product_category order by order_by ASC";
                    $qry = $this->db->query($sql);
                    $result = $qry->result();
                    foreach ($result as $value):?>
                        <li>
                            <a href="shop/category/<?php echo  rawurlencode(str_replace("/", "|", $value->name)); ?>"><?php echo $value->name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>


    </div>
    <div class=" col-sm-16 col-md-4 col-lg-3 " id="triangle-bottomright">
        <ul class="list-inline shop-menu-list sort-by text-right">
            <li class="dropdown"><i class="pe-7s-keypad  "></i>Sort by: <a href="#" class="dropdown-toggle"
                                                                           data-toggle="dropdown" role="button"
                                                                           aria-haspopup="true"
                                                                           aria-expanded="false"> <?php echo @$order == 'desc'  ? 'Descending Price' : 'Ascending Price' ?> <i class="pe-7s-angle-down pe-2x "></i></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo current_url()."?order=asc" ?>">Ascending Price</a></li>
                    <li><a href="<?php echo current_url()."?order=desc" ?>">Descending Price</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>