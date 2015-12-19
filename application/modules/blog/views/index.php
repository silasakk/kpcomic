<!-- ///////////////////// Slider ///////////////////// -->
<section class="slider">

    <div class="slide visible-md visible-lg">
    	<?php foreach ($slide as $key => $value) :?>
    		<div>
                <a href="<?php echo ($value->link)? $value->link : 'javascript;:'  ?>">
                    <img src="./uploads/<?php echo $value->image ?>" />
                </a>      
            </div>
    	<?php endforeach; ?>
        
        
    </div>
    <div class="slide visible-sm visible-xs">
        <?php foreach ($slide as $key => $value) :?>
            <a href="<?php echo ($value->link)? $value->link : 'javascript;:'  ?>">
        		<div><img src="<?php echo image('./uploads/'.$value->image,'slide-sm') ?>" /></div>
            </a>
    	<?php endforeach; ?>
    </div>
</section>

<!-- ///////////////////// Block 16 columns ///////////////////// -->
<section class="block">
    <div class="container">
        <div class="row packery">
        	<?php foreach (unserialize($grid[0]->layout_context) as $key => $value) :?>
        		<div class="<?php echo $value['width'] ?> <?php echo $value['height'] ?> item col-xs-12">
	                

                    <?php foreach ($banner as  $b) :?>
                        
                        <?php if($b->size == $value["index"]): ?>
                            <!-- showvideo -->
                            <?php if($b->media_type == "video" ): ?>
                                <a href="<?php echo $b->v_url ?>" class="fresco" >
                                    <?php if($b->size == $value['index']): ?>
                                        <div class="playico"></div>
                                        <?php if($b->image_tablet): ?>
                                            <img src="./uploads/<?php echo $b->image ?>" class="img-banner hidden-sm" />
                                            <img src="./uploads/<?php echo $b->image_tablet ?>" class="img-banner visible-sm" />
                                        <?php else: ?>
                                            <img src="./uploads/<?php echo $b->image ?>" class="img-banner" />
                                            
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </a>
                            <?php endif; ?>

                            <!-- showimage -->
                            <?php if($b->media_type == "photo" ): ?>
                                <a href="<?php echo $b->link ?>" target="_blank" >
                                    <?php if($b->size == $value['index']): ?>

                                        <?php if($b->image_tablet): ?>
                                            <img src="./uploads/<?php echo $b->image ?>" class="img-banner hidden-sm" />
                                            <img src="./uploads/<?php echo $b->image_tablet ?>" class="img-banner visible-sm" />
                                        <?php else: ?>
                                            <img src="./uploads/<?php echo $b->image ?>" class="img-banner" />
                                            
                                        <?php endif; ?>

                                        
                                    <?php endif; ?>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    
                    <?php endforeach ?>
	            </div>
        	<?php endforeach ?>
            
        </div>
    </div>
</section>

