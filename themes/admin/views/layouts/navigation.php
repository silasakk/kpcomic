<div class="page-sidebar" id="main-menu">
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
        <!-- BEGIN SIDEBAR MENU -->
        <p class="menu-title">BROWSE<span class="pull-right"></span></p>
        <ul>

            <li class="">
                <a href=javascript:;>
                    <i class="fa fa-tachometer"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <?php
            $active = "";$on = "";
            if(in_array($this->router->fetch_class(),array('book','chapter')))
                $active = "active";$on = "open";
            ?>
            <li class="<?php echo $active?>">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span class="title">Comics</span>
                    <span class="<?php echo $on?> arrow"></span>
                </a>
                <ul class="sub-menu">
                    <?php
                    $active = "";$on = "";
                    if($this->router->fetch_class() == 'book')
                        $active = "active";$on = "open";
                    ?>
                    <li class="<?php echo $active ?>"><a href="admin/book/index_list">Comic book</a></li>

                    <?php
                    $active = "";$on = "";
                    if($this->router->fetch_class() == 'chapter')
                        $active = "active";$on = "open";
                    ?>
                    <li class="<?php echo $active ?>"><a href="admin/chapter/index_list">Chapters</a></li>


                    <!--<li><a href="javascript:;">Tags</a></li>-->
                </ul>
            </li>

            <?php
            $active = "";$on = "";
            if($this->router->fetch_class() == 'language')
                $active = "active";$on = "open";
            ?>

            <li class="<?php echo $active?>">

                <a href="javascript:;">
                    <i class="fa fa-cog"></i>
                    <span class="title">Setting</span>
                    <span class="<?php echo $on?> arrow"></span>
                </a>

                <ul class="sub-menu">
                    <?php
                    $active = "";$on = "";
                    if($this->router->fetch_class() == 'language')
                        $active = "active";$on = "open";
                    ?>
                    <li class="<?php echo $active?>"><a href="admin/language/index_list">Language</a></li>
                    <!--<li><a href="javascript:;">Users</a></li>-->
                </ul>
            </li>
            <!--<li class="">
                <a href=javascript:;>
                    <i class="fa fa-sign-out"></i>
                    <span class="title">Logout</span>
                </a>
            </li>-->
        </ul>
        <!-- END SIDEBAR MENU -->
        <div class="clearfix"></div>
    </div>
</div>