<section class=" page">
    <div class="container-fluid">
        <div class="row page-content">
            <div class="col-lg-4 col-md-5 col-sm-3 ">
                <h1 class="page-title">Events</h1>
                <ul class="list-unstyled stores hidden-xs">

                    <li><a href="blog/home/event" <?php echo ($this->uri->segment(4) == '' )?"class='active'" : "" ?>>All</a></li>
                    <?php foreach ($category as $key => $value): ?>

                        <li><a <?php echo ($this->uri->segment(4) == $value->id )?"class='active'" : "" ?> href="blog/home/event/<?php echo $value->id ?>" ><?php echo $value->name ?></a></li>
                    <?php endforeach ?>
                </ul>
                <div class="select">
                    <label>
                        <select class="form-control visible-xs text-uppercase">
                            <option>All</option>
                            <?php foreach ($category as $key => $value): ?>
                                <option><?php echo $value->name ?></option>
                                
                            <?php endforeach ?>
                        </select>
                    </label>
                </div>
            </div>
            <div id="events" class="col-lg-12 col-md-11 col-sm-12 col-sm-offset-1 col-md-offset-0 col-lg-offset-0 content-wrap-right events">
                <?php foreach ($event as $key => $value): ?>

                <div class="row block-item">
                    <div class="col-sm-12 ">

                        <?php 
                        /****************************************************************
                        TYPE TEXT
                        *****************************************************************/
                        ?>
                        <?php if($value->media_type == 'text'): ?>
                        <a href="#" data-toggle="modal" data-target="#myModal"> 
                            <img src="./uploads/<?php echo $value->image ?>" alt="" class=" ">
                            <h4 class="text-uppercase"><?php echo $value->title ?></h4>
                            <p><?php echo $value->e_date ?></p>
                        </a>
                        <?php endif; ?>

                        <?php 
                        /****************************************************************
                        TYPE GALLERY
                        *****************************************************************/
                        ?>
                        <?php if($value->media_type == 'gallery'): ?>
                         <a class="fresco" data-fresco-group="gp<?php echo $key?>" href="./uploads/<?php echo $value->image ?>"> 
                            <div class="thumbnail-overlay"><!-- [] --></div>
                            <img src="<?php echo image('./uploads/'.$value->image,'press_thumb') ?>" alt="" class=" ">
                            <h4 class="text-uppercase"><?php echo $value->title ?></h4>
                            <p><?php echo $value->e_date ?></p>
                        </a>
                        <?php foreach (unserialize($value->gallery) as  $v) :?>
                            <a class="fresco" data-fresco-group="gp<?php echo $key?>" href="./uploads/<?php echo $v['image'] ?>"></a>
                        <?php endforeach; ?>

                        
                        <?php endif; ?>

                        <?php 
                        /****************************************************************
                        TYPE VIDEO
                        *****************************************************************/
                        ?>
                        <?php if($value->media_type == 'video'): ?>
                            <a class="fresco"  href="<?php echo $value->v_url ?>"> 
                                <div class="thumbnail-overlay"><!-- [] --></div>
                                
                                <img src="<?php echo image('./uploads/'.$value->image,'press_thumb') ?>" alt="" class=" ">
                                <h4 class="text-uppercase"><?php echo $value->title ?></h4>
                                <p><?php echo $value->e_date ?></p>
                            </a>

                        
                        <?php endif; ?>



                    </div>
                </div>
                <?php 
                /****************************************************************
                TYPE TEXT
                *****************************************************************/
                 ?>
                <?php if($value->media_type == 'text'): ?>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-4"><?php echo $value->title ?><br><?php echo $value->e_date ?></div>
                                            <div class="col-md-8"><?php echo $value->content ?></div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                    
                <?php endforeach ?>
                
            </div>
            <nav id="page_nav" style="display: none;">
                <a href="blog/home/event_api/<?php echo ($this->uri->segment(4) == '' )?$this->uri->segment(4) : "all" ?>/2"></a>
            </nav>
            <p class=" back-to-top"><i class="pe-7s-up-arrow pe-3x pe-va"></i><a href="#top" > Back to Top</a></p>
        </div>
    </div>
</section>

