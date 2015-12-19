<!-- ///////////////////// Block 16 columns ///////////////////// -->
<section class=" page">
    <div class="container-fluid">
        <div class="row page-content">

            <div class="col-xs-16 block press">
                <div class="row iso">

                    <div class="col-sm-4 block-item ">

                        <h1 class="page-title text-left">Press</h1>
                    </div>
                    
                        <?php foreach($data as $key => $value): ?>
                        <div class="col-sm-4 block-item">
                            <div>
                                <a class="fresco" data-fresco-group="gp<?php echo $key?>" href="./uploads/<?php echo $value->thumbnail ?>"> 
                                    <img src="<?php echo image('./uploads/'.$value->thumbnail,'press_thumb') ?>" alt="" class="img-responsive thumbnail">
                                    <div class="thumbnail-overlay"><!-- [] --></div>
                                    <h4 class="text-uppercase"><?php echo $value->name ?></h4>
                                    <p><?php echo $value->source ?></p></a>
                                <?php foreach (unserialize($value->item) as  $v) :?>
                                    <a class="fresco" data-fresco-group="gp<?php echo $key?>" href="./uploads/<?php echo $v['image'] ?>"></a>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <?php endforeach; ?>
                    

                    <nav id="page_nav" style="display: none;">
                        <a href="blog/home/press_api/2"></a>
                    </nav>
                    
                    

                </div>
            </div>


        </div>
    </div>
</section>
<!-- /////////////////////Footers ///////////////////// -->