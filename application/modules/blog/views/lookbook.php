<!-- ///////////////////// Block 16 columns ///////////////////// -->
<style type="text/css">
	.fr-overlay-background {
		background-image: url("./uploads/<?php echo $data[0]->background ?>");

	}
</style>
<section class=" page">
    <div class="container-fluid">
        <div class="row page-content">
            <div class="col-lg-3 col-md-5 col-sm-4 collection-left-wrap ">
                <h1 class="page-title">
                    <?php if($data[0]->showname1): ?>
                        <span><?php echo $data[0]->showname1 ?></span><br>
                    <?php endif ?>
                    <?php if($data[0]->showname2): ?>
                        <span><?php echo $data[0]->showname2 ?></span><br>
                    <?php endif ?>
                    <?php if($data[0]->showname3): ?>
                        <span><?php echo $data[0]->showname3 ?></span><br>
                    <?php endif ?>
                </h1>

                <h5><?php echo $data[0]->season ?></h5>
                <div class="story">
                    <p>
                    <?php echo $data[0]->story_exc ?>
                	</p>


                <p class="text-uppercase"><a href="#" data-toggle="modal" data-target="#fullstory">View Full Story</a></p>

                </div>
                </div>

            <div class="col-lg-12 col-md-11 col-sm-10 col-sm-offset-2 col-md-offset-0 col-lg-offset-1 content-wrap-right block ">
                <div class="row iso">
                	<?php $item = unserialize($data[0]->item) ?>

                	<?php if(!empty($item)): ?>
					<?php foreach($item as $k=>  $value): ?>
                		<div class="col-md-5 block-item">

                			<?php 
                			$tag="";
                			foreach ($value["pd"]["name"] as $key => $v) {
                				if($value["pd"]["url"][$key]){
                					$tag[] = '<a href="'.$value["pd"]["url"][$key].'" target="_blank" >'.$value["pd"]["name"][$key].'</a>';
                				}else{
                					$tag[] = $value["pd"]["name"][$key];
                				}
                				
                			} ?>
	                        <a href='./uploads/<?php echo $value["image"] ?>'
	                           class='fresco'
	                           data-fresco-group='example'
	                           data-fresco-caption='<?php echo join(" / ",$tag) ?>'>
	                            <?php if($value["image"]): ?>
									<img src='./uploads/<?php echo $value["image"] ?>' alt='' class="img-responsive thumbnail"/>
			    				<?php endif; ?>
	                            
	                        </a>
	                    </div>
					<?php endforeach; ?>
                	<?php endif; ?>
                    
                </div>
            </div>
            <p class=" back-to-top"><i class="pe-7s-up-arrow pe-3x pe-va"></i><a href="<?php echo current_url() ?>#top" > Back to Top</a></p>

        </div>
    </div>
    <!-- Modal -->
	<div class="modal fade" id="fullstory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-body">
	           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h1 class="page-title text-center"><?php echo str_replace(" ", "<br>", $data[0]->name) ?></h1>

	                <h5 class="text-center"><?php echo $data[0]->season ?></h5><br/>
	                <p class="caption"><strong><?php echo $data[0]->story_exc ?></strong></p>

	                <?php echo $data[0]->story ?>
	            </div>

	        </div>
	    </div>
	</div>
</section>