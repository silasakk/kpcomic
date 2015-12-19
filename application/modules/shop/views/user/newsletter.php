<section class="block myaccount">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-16"> <h4 class="text-uppercase login-welcome">Hi, Pavita</h4></div>
        </div>
        <div class="row myaccount-contianer row-eq-height">

            <?php include "menu.php"; ?>
            <div class="col-sm-11 col-md-12 col-lg-13 column-right">
                <h3 >Newsletter </h3>
                <?php if($msg = $this->session->flashdata('msg') ): ?>
                    <div class="text-success text-center well"><?php echo $msg; ?></div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-xs-16">
                        <p class="sub-text">Set up your newsletter and once a week you will receive news and information on trends from the sections you have selected.

                            Sections of interest to you:</p>
                    </div>

                </div>
                <form class="form-horizontal form-on-white" method="post" action="shop/user/save_newsletter" >



                    <div class="form-group">
                        <div class="col-sm-16">

                            <label>
                                <input type="checkbox" <?php echo $user[0]->newsletter_milin ? 'checked' : '' ?> name="milin" id="blankCheckbox" value="1" aria-label="..."> MILIN
                            </label>


                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-16">

                            <label>
                                <input type="checkbox" <?php echo $user[0]->newsletter_mimi ? 'checked' : '' ?>  name="mimi" id="blankCheckbox" value="1" aria-label="..."> MIMI
                            </label>


                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 "><button type="submit" class="btn btn-lg btn-default">Update</button></div>

                    </div>

                </form>





            </div>

        </div>
    </div>
</section>