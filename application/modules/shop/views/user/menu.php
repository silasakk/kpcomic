<div class="select visible-xs myacc-select">
    <label>
        <select class="form-control  text-uppercase">

            <option> My Account</option>
            <option>Personal Info</option>
            <option>Access Detail</option>
            <option>Newsletter</option>
            <option>Address bookc</option>
            <option>Wishlist</option>
            <option>My Order</option>
        </select>
    </label>
</div>

<div class="col-xs-16 col-sm-5 col-md-4 col-lg-3 user-menu-wrapper hidden-xs">

    <ul class="list-unstyled user-menu ">
        <li><a href="shop/user" <?php echo ($this->router->fetch_method()=='index')?'class="active"' : '' ?> ><p><i class="pe-7s-user pe-2x pe-va"></i> My Account</p></a></li>
        <li><a href="shop/user/info" <?php echo ($this->router->fetch_method()=='info')?'class="active"' : '' ?> ><p><i class="pe-7s-id pe-lg pe-va"></i> Personal Info</p></a></li>
        <li><a href="shop/user/access" <?php echo ($this->router->fetch_method()=='access')?'class="active"' : '' ?>><p><i class="pe-7s-door-lock pe-lg pe-va"></i> Access Detail</p></a></li>
        <li><a href="shop/user/newsletter" <?php echo ($this->router->fetch_method()=='newsletter')?'class="active"' : '' ?>><p><i class="pe-7s-mail pe-lg pe-va"></i> Newsletter</p></a></li>
        <li><a href="shop/user/address" <?php echo ($this->router->fetch_method()=='address')?'class="active"' : '' ?>><p><i class="pe-7s-notebook pe-lg pe-va"></i> Address book</p></a></li>
        <li><a href="shop/user/wishlist" <?php echo ($this->router->fetch_method()=='wishlist')?'class="active"' : '' ?>><p><i class="pe-7s-drawer pe-lg pe-va"></i> Wishlist</p></a></li>
        <li><a href="shop/user/order" <?php echo ($this->router->fetch_method()=='order')?'class="active"' : '' ?>><p><i class="pe-7s-box1 pe-lg pe-va"></i> My Order</p></a></li>
    </ul>

</div>