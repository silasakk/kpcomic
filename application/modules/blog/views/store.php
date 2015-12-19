<!-- ///////////////////// Block 16 columns ///////////////////// -->
<section class=" page">
    <div class="container-fluid">
        <div class="row page-content store">
            <div class="col-lg-4 col-md-5 col-sm-4 store-left-wrap ">
                <h1 class="page-title"><span>Store</span><br/><span>Locator</span></h1>
                <ul class="list-unstyled stores hidden-xs">
                	<?php foreach($data as $value): ?>
						<li >
							<?php 
							$last = $this->uri->total_segments();
							$record_num = $this->uri->segment($last);
								?>
							<a href="<?php echo base_url() ?>blog/home/store/<?php echo $value->slug ?>" 
								class="<?php echo ($value->slug == urldecode($record_num) )? 'active' : '' ?>">
							<?php echo $value->name ?>
							</a>
						</li>
                	<?php endforeach; ?>
                    
                </ul>
                <div class="select">
                    <label>
                        <select class="form-control visible-xs text-uppercase" onchange='window.location=$(this).val()'>
                        	<?php foreach($data as $value): ?>
	                        	<?php 
	                        	//get slug current
								$last = $this->uri->total_segments();
								$record_num = $this->uri->segment($last);
								?>
								<option 
									<?php echo ($value->slug == urldecode($record_num) )? ' selected'  : '' ?>
									value="<?php echo base_url() ?>blog/home/store/<?php echo $value->slug ?>">

									<?php echo $value->name ?>
								
								</option>
		                	<?php endforeach; ?>
                            
                        </select>
                    </label>
                </div>
            </div>
            <div class="col-lg-11 col-md-10 col-sm-10 col-sm-offset-2 col-md-offset-1 col-lg-offset-1 content-wrap-right">
                <div class="row">
                    <div class=" col-sm-16 col-md-7  ">
                        <h4 class="text-uppercase store-name"><?php echo $store[0]->name ?></h4>

                        <p><strong>Address</strong></p>

                        <p><?php echo $store[0]->address ?></p>

                        <p><strong>Telephone</strong></p>

                        <p><?php echo $store[0]->tel ?></p>

                        <p><strong>Store Hours</strong></p>
						<?php foreach(unserialize($store[0]->store_time) as $key => $value): ?>

						<?php 
							$store_time = unserialize($store[0]->store_time);
							$hh = unserialize($store[0]->hh);	
							$mm = unserialize($store[0]->mm);	
						?>
						<p><?php echo $hh[$key]  ?> - <?php echo $mm[$key]  ?> <?php echo $store_time[$key]  ?></p>
						<?php endforeach; ?>
                        

                        <p class="link-to-googlemap"><i class="pe-7s-map-marker pe-va"></i><a href=""> View on
                            googlemap</a></p>

                    </div>
                    <div class=" col-sm-16 col-md-9 col-lg-8 googlemap ">
                        <div class="thumbnail">
                        <div id="map-canvas"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBU_ql1kp-_FAbx64wMd0Inv6dj1Ck1LQU"></script>
    <script>
    function init_map() {
    var myOptions = {
        zoom: 14,
        center: new google.maps.LatLng(<?php echo $store[0]->lat ?>, <?php echo $store[0]->lng ?>),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    }
	    map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);
	    marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(<?php echo $store[0]->lat ?>, <?php echo $store[0]->lng ?>)});
        var a = '<?php echo addslashes($store[0]->name) ?>';
        var b = '<?php echo $string = trim(preg_replace('/\s\s+/', ' ', $store[0]->address)); ?>';
	    infowindow = new google.maps.InfoWindow({content: "<strong>"+a+"</strong><br>"+b});
	    google.maps.event.addListener(marker, 'click', function () {
	        infowindow.open(map, marker);
	    });
	    infowindow.open(map, marker);
	}
	google.maps.event.addDomListener(window, 'load', init_map);
	</script>
</section>