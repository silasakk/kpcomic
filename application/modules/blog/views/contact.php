<!-- ///////////////////// Block 16 columns ///////////////////// -->
<section class=" page">
    <div class="container-fluid">
        <div class="row page-content">
            <div class="col-lg-4 col-md-5 col-sm-3 ">
                <h1 class="page-title">Contact</h1>
            </div>
            <div class="col-lg-12 col-md-11 col-sm-12 col-sm-offset-1 col-md-offset-0 col-lg-offset-0 content-wrap-right">
                <div class="row">
                    <div class=" col-sm-8 col-md-8 col-md-offset-0 col-lg-6 col-lg-offset-1 ">
                        <p class="text-uppercase"> <strong>Milin Showroom Office</strong></p>
                        <p class="text-uppercase">Front Row Company Limited</p>
                        <p><?php echo $data[0]->address ?></p>
                       <p> <i class="pe-7s-call pe-lg pe-va"></i>  <?php echo $data[0]->tel ?> <br>
                            <i class="pe-7s-print pe-lg pe-va"></i>  <?php echo $data[0]->fax ?> <br>
                       <i class="pe-7s-mail-open-file pe-lg pe-va"></i>  <?php echo $data[0]->email ?></p>


                    </div>
                    <div class=" col-sm-7 col-md-8 col-lg-7 ">
                        <p>To contact us, please use the form below</p>
                        <form method="post" action="blog/home/contact" >
                            <div class="form-group form-on-white">
                                <label for="yourName">Your Name</label>
                                <input type="text" class="form-control" name="name" id="yourName" placeholder="Your Name">
                            </div>
                            <div class="form-group form-on-white">
                                <label for="yourEmail">Email address</label>
                                <input type="email" class="form-control" name="email" id="yourEmail" placeholder="Email">
                            </div>
                            <div class="form-group ">
                                <label for="yourEmail">Department</label>
                            <div class="select">
                                <label>
                                    <select class="form-control" name="dept" >
                                        <option value="General Enquiry" >General Enquiry</option>
                                        <option value="Sales & Marketing">Sales & Marketing</option>
                                        <option value="Others">Others</option>

                                    </select>
                                </label>
                            </div>
                                </div>
                            <div class="form-group form-on-white">
                                <label for="yourMSG">Message</label>
                                <textarea class="form-control" name="msg"  id="yourMSG" rows="4"  placeholder="Message"></textarea>
                            </div>

                            <button type="submit" class="btn btn-default">Send</button>
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>
</section>