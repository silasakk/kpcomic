<!-- ///////////////////// Block 16 columns ///////////////////// -->
<section class=" page">
    <div class="container-fluid">
        <div class="row page-content">
            <div class="col-lg-4 col-md-5 col-sm-3 ">
                <h1 class="page-title">Biography</h1>
            </div>
            <div class="col-lg-12 col-md-11 col-sm-12 col-sm-offset-1 col-md-offset-0 col-lg-offset-0 content-wrap-right">
                <div class="row">
                    <div class=" col-sm-6 col-md-5  ">
                        <ul class="list-unstyled bio-options ">
                        	<?php foreach($data as $value): ?>
								<li >
									<?php 
									$last = $this->uri->total_segments();
									$record_num = $this->uri->segment($last);
 									?>
									<a href="<?php echo base_url() ?>blog/home/biography/<?php echo $value->slug ?>" 
										class="<?php echo ($value->slug == $record_num )? 'active' : '' ?>">
									<?php echo $value->name ?>
									</a>
								</li>
                        	<?php endforeach; ?>
                            
                            <hr/>
                        </ul>

                    </div>
                    <div class=" col-sm-10 col-md-11 bio-content">
                        <h4 class="bio-name text-uppercase"><?php echo $person[0]->name ?></h4>
                        <h5 class="text-uppercase"><?php echo $person[0]->position ?></h5>
                        <p>
                        	<?php echo $person[0]->detail ?>
                        </p>
                        <?php if($person[0]->image): ?>
                            <img src="./uploads/<?php echo $person[0]->image ?>" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>