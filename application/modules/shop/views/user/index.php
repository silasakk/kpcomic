<section class="block myaccount">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-16"> <h4 class="text-uppercase login-welcome">Hi, Pavita</h4></div>
        </div>
        <div class="row myaccount-contianer row-eq-height">

            <?php include "menu.php"; ?>
            <div class="col-sm-11  col-md-12 col-lg-13 column-right">
                <h3 >My Account </h3>
                <div class="row wrapper ">
                    <div class="col-lg-2  col-md-3 col-sm-4">
                        Name
                    </div>
                    <div class="col-lg-14 col-lg-13 col-sm-12">
                        <?php echo $user[0]->name ." ".$user[0]->lastname ?> <a href="#" class="edit"><i class="pe-7s-note pe-lg "></i><small>Edit</small></a>
                    </div>
                </div>
                <div class="row wrapper">
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        E-mail
                    </div>
                    <div class="col-lg-14 col-lg-13 col-sm-12">
                        <?php echo $user[0]->email ?> <a href="#" class="edit"> <i class="pe-7s-note pe-lg "></i><small>Edit</small></a>
                    </div>
                </div>
                <div class="row wrapper">
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        Member ID
                    </div>
                    <div class="col-lg-14 col-lg-13 col-sm-12">
                        <?php echo $user[0]->member_id ?>
                    </div>
                </div>
                <div class="row wrapper">
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        Point
                    </div>
                    <div class="col-lg-14 col-lg-13 col-sm-12">
                        29232
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>