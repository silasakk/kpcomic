<!DOCTYPE html>
<html lang="en" ng-app="milin">
<head>
    <base href="<?php echo base_url() ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Milin</title>

    <!-- Bootstrap -->
    <link href="themes/milin/bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="themes/milin/bower_components/bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet">
    <!-- Custom css -->
    <link href="themes/milin/assets/css/Pe-icon-7-stroke.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="themes/milin/bower_components/slick.js/slick/slick.css" rel="stylesheet">
    <link href="themes/milin/bower_components/slick.js/slick/slick-theme.css" rel="stylesheet">
    <link href="themes/milin/assets/css/fresco/fresco.css" rel="stylesheet">
    <link href="themes/milin/assets/css/style.css" rel="stylesheet">
    <link href="themes/milin/assets/css/packery-grid.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="themes/milin/assets/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="themes/milin/assets/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body ng-controller="cartController" <?php echo ($this->router->fetch_class()=='shop')?'class="gray"' : '' ?>>
<header id="top">
    <!-- ///////////////////// Navigation ///////////////////// -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#milin-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo base_url() ?>" class="logo"><img src="themes/milin/assets/img/logo.svg"
                                                                     alt="Milin Logo"/></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="nav-wrap">
                <div class="collapse navbar-collapse" id="milin-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right top-menu hidden-sm hidden-xs">
                        <li class="dropdown">
                            <?php if (!$this->session->userdata('user_id')): ?>
                                <a href="#" class="active " id="myAccount" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false"><p><i class="pe-7s-user pe-3x pe-va"></i><span>Account</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu myaccount-menu" aria-labelledby="myAccount">
                                    <div class="login-wrap">
                                        <form id="login" method="post" action="shop/auth/post_login" >
                                            <div class="form-group ">
                                                <label for="Username">Username</label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                       placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="Password">Password</label>
                                                <input type="password" name="password" class="form-control" id="Password"
                                                       placeholder="Password">
                                            </div>

                                            <button type="submit" class="btn btn-default btn-block btn-lg">LOGIN
                                            </button>
                                            <p class="text-center forgot-pwd">
                                                <a href="#">Forgot password?</a></p>
                                            <a onclick="fb_login();" class="btn btn-block btn-lg fb-btn">LOGIN WITH
                                                FACEBOOK</a>
                                        </form>
                                    </div>
                                    <div class="register-wrap">
                                        <a href="shop/auth/register">Register new account</a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php
                                //select query
                                $sql = "select * from member where id = '{$this->session->userdata('user_id')}' ";
                                $qry = $this->db->query($sql);
                                $result = $qry->row();
                                ?>
                                <a href="shop/user/" class="active " id="myAccount" data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false"><p><i class="pe-7s-user pe-3x pe-va"></i><span><?php echo $result->name ?></span>
                                    </p></a>
                                <div class="dropdown-menu myaccount-menu" aria-labelledby="myAccount">
                                    <div class="login-wrap">
                                        <form id="login">
                                            <div><a href="shop/user/"><i class="pe-7s-user pe-3x pe-va"></i> <?php echo $result->name ?> <?php echo $result->lastname ?></a></div>
                                        </form>
                                    </div>
                                    <div class="register-wrap">
                                        <a href="shop/auth/logout">Logout</a>
                                    </div>
                                </div>
                            <?php endif ?>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="active " id="Cart" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false"><p><i class="pe-7s-cart pe-3x pe-va"></i><span>Cart</span></p></a>

                            <div class="dropdown-menu cart-menu " aria-labelledby="Cart">

                                <div class="cart-item" ng-repeat="product in products">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <img width="65" src="{{product.icon}}">
                                        </div>
                                        <div class="col-xs-12">
                                            <div ng-click="removeCart(product)" class="remove"><a href="javascript:;"><i
                                                        class="pe-7s-close pe-3x pe-va"></i></a></div>
                                            <a href="#"><p>{{product.name}}</p></a>
                                            <small>Size {{product.size}}</small>
                                            <br>
                                            <small>Color {{product.color}}</small>
                                            <div class="row amount-price">
                                                <div class="col-xs-4">
                                                    X {{product.qty}}
                                                </div>
                                                <div class="col-xs-12 text-right">
                                                    ฿ {{ product.price | number : 2}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="cart-total">
                                    <div class="row cart-total-container">
                                        <div class="col-xs-6">
                                            Subtotal
                                        </div>
                                        <div class="col-xs-10 text-right">
                                            ฿ {{ subtotal | number : 2}}
                                        </div>
                                    </div>
                                    <div class="row cart-total-container">
                                        <div class="col-xs-6">
                                            EST. Shipping
                                        </div>
                                        <div class="col-xs-10 text-right">
                                            ฿ 0
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-checkout-btn">
                                    <a href="shop/cart" class="btn btn-default btn-block btn-lg">View Cart</a>
                                </div>
                            </div>
                            <!--                            <div class="dropdown-menu cart-menu " aria-labelledby="Cart">

                                                            <div class="cart-empty text-center ">
                                                                <span class="empty"> Cart Empty</span>
                                                            </div>


                                                            <div class="cart-checkout-btn">
                                                                <a class="btn btn-default btn-block btn-lg">View cart</a>
                                                            </div>
                                                        </div>-->
                            <!--/////  Cart with items ///////-->
                            <!--<div class="dropdown-menu cart-menu " aria-labelledby="Cart">-->
                            <!--<div class="cart-item ">-->
                            <!--<div class="row">-->
                            <!--<div class="col-xs-4">-->
                            <!--<img src="themes/milin/assets/img/thumb65x65.png" >-->
                            <!--</div>-->
                            <!--<div class="col-xs-12">-->
                            <!--<div class="remove"><a href="#"><i class="pe-7s-close pe-3x pe-va"></i></a></div>-->
                            <!--<a href="#"><p>Tank Top </p> </a>-->
                            <!--<small>Size S/2</small>-->
                            <!--<div class="row amount-price">-->
                            <!--<div class="col-xs-4">-->
                            <!--X 1-->
                            <!--</div>-->
                            <!--<div class="col-xs-12 text-right">-->
                            <!--฿ 1,200.00-->
                            <!--</div>-->
                            <!--</div>-->

                            <!--</div>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--<div class="cart-item ">-->
                            <!--<div class="row">-->
                            <!--<div class="col-xs-4">-->
                            <!--<img src="themes/milin/assets/img/thumb65x65.png" >-->
                            <!--</div>-->
                            <!--<div class="col-xs-12">-->
                            <!--<div class="remove"><a href="#"><i class="pe-7s-close pe-3x pe-va"></i></a></div>-->
                            <!--<a href="#"><p>Tank Top </p> </a>-->
                            <!--<small>Size S/2</small>-->
                            <!--<div class="row amount-price">-->
                            <!--<div class="col-xs-4">-->
                            <!--x 1-->
                            <!--</div>-->
                            <!--<div class="col-xs-12 text-right">-->
                            <!--฿ 1,200.00-->
                            <!--</div>-->
                            <!--</div>-->

                            <!--</div>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--<div class="cart-total">-->
                            <!--<div class="row cart-total-container">-->
                            <!--<div class="col-xs-4">-->
                            <!--Subtotal-->
                            <!--</div>-->
                            <!--<div class="col-xs-12 text-right">-->
                            <!--฿ 2,400.00-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--<div class="row cart-total-container">-->
                            <!--<div class="col-xs-4">-->
                            <!--Shipping-->
                            <!--</div>-->
                            <!--<div class="col-xs-12 text-right">-->
                            <!--฿ 100.00-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--<div class="cart-checkout-btn">-->
                            <!--<a  class="btn btn-default btn-block btn-lg">View Cart</a>-->
                            <!--</div>-->
                            <!--</div>-->
                        </li>
                    </ul>
                    <ul class="nav navbar-nav main-nav ">
                        <li class="dropdown ">
                            <?php
                            $active = "";

                            if ($this->uri->segment(3) == "lookbook") {
                                $active = "active";
                            }
                            ?>
                            <a href="#" class="dropdown-toggle <?php echo $active ?>" data-toggle="dropdown"
                               role="button"
                               aria-haspopup="true" aria-expanded="false">Lookbook</a>

                            <div class="collections dropdown-menu row row-eq-height-md">
                                <div class="col-xs-16 col-md-8 col-menu-wrap milin-col-wrap">
                                    <img src="themes/milin/assets/img/milin-sm.svg">
                                    <ul class="list-unstyled col-menu milin-col">
                                        <?php
                                        //------------slide------------
                                        $sql = "select * from collections where brand ='milin' order by created_at DESC";
                                        $qry = $this->db->query($sql);
                                        $menu_lookbook = $qry->result();
                                        ?>
                                        <?php foreach ($menu_lookbook as $valeu): ?>
                                            <li>
                                                <a href="<?php echo base_url() ?>blog/home/lookbook/<?php echo $valeu->slug ?>"><?php echo $valeu->name ?></a>
                                            </li>
                                        <?php endforeach; ?>


                                    </ul>
                                </div>
                                <div class="col-xs-16 col-md-8 col-menu-wrap mimi-col-wrap">
                                    <img src="themes/milin/assets/img/mimi-sm.svg">
                                    <ul class="list-unstyled col-menu milin-col">
                                        <?php
                                        //------------slide------------
                                        $sql = "select * from collections where brand ='mimi' order by created_at DESC";
                                        $qry = $this->db->query($sql);
                                        $menu_lookbook = $qry->result();
                                        ?>
                                        <?php foreach ($menu_lookbook as $valeu): ?>
                                            <li>
                                                <a href="<?php echo base_url() ?>blog/home/lookbook/<?php echo $valeu->slug ?>"><?php echo $valeu->name ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>


                            </div>
                        </li>
                        <li>
                            <?php
                            $active = "";

                            if ($this->uri->segment(3) == "press") {
                                $active = "active";
                            }
                            ?>
                            <a href="blog/home/press" class="<?php echo $active ?>">Press</a>
                        </li>
                        <li>
                            <?php
                            $active = "";

                            if ($this->uri->segment(3) == "event") {
                                $active = "active";
                            }
                            ?>
                            <a href="blog/home/event" class="<?php echo $active ?>">Events</a>
                        </li>
                        <li class="dropdown">
                            <?php
                            $active = "";

                            if ($this->uri->segment(3) == "brand" || $this->uri->segment(3) == "biography") {
                                $active = "active";
                            }
                            ?>
                            <a href="javascript;:" class="dropdown-toggle <?php echo $active ?>" data-toggle="dropdown"
                               role="button"
                               aria-haspopup="true" aria-expanded="false">About</a>
                            <ul class="dropdown-menu">
                                <li><a href="blog/home/brand">Brand</a></li>
                                <li><a href="blog/home/biography">Biography</a></li>
                            </ul>
                        </li>
                        <li>
                            <?php
                            $active = "";

                            if ($this->uri->segment(3) == "contact") {
                                $active = "active";
                            }
                            ?>
                            <a href="blog/home/contact" class="<?php echo $active ?>">Contact</a>
                        </li>
                        <li class="shop-btn">
                            <a href="shop" class="btn ">E-Shop</a>
                        </li>
                        <li class="visible-xs visible-sm">
                            <?php
                            $active = "";

                            if ($this->uri->segment(3) == "store") {
                                $active = "active";
                            }
                            ?>
                            <a href="blog/home/store" class="<?php echo $active ?>">Store Locator</a>
                        </li>

                    </ul>


                </div>
                <!-- /.navbar-collapse -->
            </div>
        </div>
        <!-- /.container -->
    </nav>
</header>

<?php echo $template['body']; ?>

<!-- /////////////////////Footers ///////////////////// -->
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-8 text-right col-md-push-8 ">
                <nav class="nav-footer">
                    <ul class="list-inline">
                        <li><a href="https://instagram.com/milin_brand" target="_blank"><i
                                    class="fa fa-instagram fa-lg"></i></a> <a href="https://www.facebook.com/milinbrand"
                                                                              target="_blank"><i
                                    class="fa fa-facebook-official fa-lg"></i></a></li>
                        <li><a href="#">Subcribe</a></li>
                        <li><a href="blog/home/store">Store locator</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Sitemap</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-8 col-sm-8 col-md-pull-8 ">
                <p class="copyright">&copy; Copyright 2015 FRONT ROW CO., LTD. ALL RIGHT RESERVED</p>
            </div>
        </div>
    </div>

</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="themes/milin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="themes/milin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="themes/milin/assets/js/angular.min.js"></script>
<script src="themes/milin/assets/js/jquery.infinitescroll.js"></script>
<script src="themes/milin/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="themes/milin/assets/js/isotope.pkgd.min.js"></script>
<script src="themes/milin/assets/js/packery.pkgd.min.js"></script>

<script src="themes/milin/bower_components/slick.js/slick/slick.min.js"></script>
<script src="themes/milin/assets/js/fresco.js"></script>
<script src="themes/milin/assets/js/jquery.blImageCenter.js"></script>
<script src="themes/milin/assets/js/script.js"></script>
<script src="themes/milin/assets/js/shop.js"></script>

<script>
    $(window).load(function () {


        var $container = $('.packery').packery({
            itemSelector: '.item',
            gutter: 0,
            "columnWidth": ".col-sm-4",
            "rowHeight": 90,
            "percentPosition": true,
        });

        var $container = $('.iso');

        // Fire Isotope only when images are loaded
        $container.imagesLoaded(function () {
            $container.isotope({
                itemSelector: '.block-item',

            });
            $container.infinitescroll({
                    navSelector: '#page_nav',    // selector for the paged navigation
                    nextSelector: '#page_nav a',  // selector for the NEXT link (to page 2)
                    itemSelector: '.block-item',     // selector for all items you'll retrieve
                    loading: {
                        finishedMsg: 'No more pages to load.',
                        img: 'http://i.imgur.com/qkKy8.gif'
                    }
                },
                // call Isotope as a callback
                function (newElements) {
                    //$container.isotope('appended', $(newElements));
                    var $newElems = $(newElements);
                    $newElems.imagesLoaded(function () {
                        $container.isotope('appended', $newElems);
                    });
                }
            );
        });

        $('#events').infinitescroll({
                navSelector: '#page_nav',    // selector for the paged navigation
                nextSelector: '#page_nav a',  // selector for the NEXT link (to page 2)
                itemSelector: '.block-item',     // selector for all items you'll retrieve
                loading: {
                    finishedMsg: 'No more pages to load.',
                    img: 'http://i.imgur.com/qkKy8.gif'
                }
            },
            // call Isotope as a callback
            function (newElements) {
                $('#events').append($(newElements));
            }
        );


    })

    window.fbAsyncInit = function () {
        FB.init({
            appId: '775964555863788',
            oauth: true,
            status: true, // check login status
            cookie: true, // enable cookies to allow the server to access the session
            xfbml: true, // parse XFBML
            version: 'v2.5'
        });

    };

    function fb_login() {
        FB.login(function (response) {

            if (response.authResponse) {

                access_token = response.authResponse.accessToken; //get access token
                user_id = response.authResponse.userID; //get FB UID

                FB.api('/me', 'get', {
                    access_token: access_token,
                    fields: 'id,first_name,last_name,email'
                }, function (response) {
                    jQuery.ajax({
                        url: "shop/service/facebook_login",
                        type: 'post',
                        dataType: 'json',
                        data: {'data': response},
                        success: function (response) {
                            window.location = '<?php echo current_url()  ?>';
                        }
                    });

                });

            } else {
                //user hit cancel button
                //console.log('User cancelled login or did not fully authorize.');

            }
        }, {
            scope: 'public_profile,email'
        });
    }
    // Load the SDK asynchronously
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>


</body>
</html>
