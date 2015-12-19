<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Add Home Banner
	</div>
</div>
<div class="content-wrapper"  ng-init="mtype='<?php echo (empty($data[0]->media_type ))? 'photo' : $data[0]->media_type ?>'" >
	<form id="new-customer" class="form-horizontal" method="post" action="admin/home/save_banner/<?php echo $data[0]->id ?>" role="form">
	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Media Type</label>
		    <div class="col-sm-10  col-md-8">
		    	<div class="radio">
		    		<label ng-click="mtype='photo'">
		          		<input type="radio" ng-checked="mtype=='photo'" name="media_type" value="photo" <?php echo ($data[0]->media_type == "photo")? "checked" : ""  ?>> Photo
	        		</label> 

		        	<label ng-click="mtype='video'">
		          		<input type="radio" ng-checked="mtype=='video'" name="media_type" value="video" <?php echo ($data[0]->media_type == "video")? "checked" : ""  ?>> Video
	        		</label>
		      	</div>
		    </div>
	  	</div>
	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Size</label>
		    <div class="col-sm-10  col-md-8">
				<div class="packery">
						<?php foreach (unserialize($grid[0]->layout_context) as $key => $v) :?>

						<div  data-index="<?php echo $v['index'] ?>" class="<?php echo $v['width'] ?> col-xs-12 item <?php echo $v['height'] ?>">
							
							<!-- showimage -->
							<?php foreach ($banner as  $b) :?>
								<?php if($b->size == $v['index']): ?>
								<img src="./uploads/<?php echo $b->image ?>" class="img-banner" />
								<?php endif; ?>
							<?php endforeach ?>

							<!-- show index -->
							<span class="num"><?php echo $v['index'] ?></span>
							
							<!-- show trash -->
							<?php if($data[0]->size == $v['index']): ?>
							<span class="tra">X</span>
							<?php endif; ?>

							<?php if($v['index'] == $data[0]->size): ?>
								<input type="hidden" class="gid" name="gid" value="<?php echo $data[0]->size ?>" />
							<?php endif; ?>
						</div>
							
						<?php endforeach; ?>
				</div>
			</div>

	  	</div>
	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Recomend Size</label>
		    <div class="col-sm-10  col-md-8">
		    	<div class="size-re"></div>
		    </div>
	  	</div>
	  	
	  	<div class="form-group" ng-show="mtype=='photo'">
		    <label class="col-sm-2 col-md-2 control-label">Link</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="url" name="link" value="<?php echo $data[0]->link ?>" class="form-control" placeholder="URL">
		    </div>
	  	</div>
	  	<div class="form-group" ng-show="mtype=='video'">
		    <label class="col-sm-2 col-md-2 control-label">Video Type</label>
		    <div class="col-sm-10  col-md-8" ng-init="v_type='<?php echo (empty($data[0]->v_type ))? 'youtube' : $data[0]->v_type ?>'" >
		      	<div class="radio">
		    		<label class="h-inner">
		          		<input type="radio" ng-click="v_type='youtube'" ng-checked="v_type=='youtube'" name="v_type" value="youtube"> Youtube 
	        		</label>
	     
	        		<input type="text" ng-readonly="v_type!='youtube'" name="v_url[youtube]" value="<?php echo ($data[0]->v_type == 'youtube')? $data[0]->v_url : "" ?>" class="form-control txt-inner">
		      	</div>
		      	<div class="radio">
		    		<label class="h-inner">
		          		<input type="radio" ng-click="v_type='vimeo'"  ng-checked="v_type=='vimeo'" name="v_type" value="vimeo"> Vimeo 
	        		</label>
	        		
	        		<input type="text" ng-readonly="v_type!='vimeo'" name="v_url[vimeo]" value="<?php echo ($data[0]->v_type == 'vimeo')? $data[0]->v_url : "" ?>" class="form-control txt-inner">
		      	</div>
		      	
		    </div>
	  	</div>
	  	<div class="form-group">
		    <label class="col-sm-12 col-md-2 control-label">File Upload Mobile</label>
		    <div class="col-sm-10  col-md-8">
		    	<div class="panel-upload dropzone" id="Dropzonepanel">
		    		<button type="button" class="btn btn-upfile btn-default" onclick="$('#Dropzonepanel').click()">Select File</button>
		    		<?php if(!empty($data[0]->image) && is_file('./uploads/'.$data[0]->image)): ?>
		    		<input type="hidden" name="thumbnail[]" class="hide-thumbnail" data-size="<?php echo filesize('uploads/'.$data[0]->image) ?>" value="<?php echo $data[0]->image ?>" >
		    		<?php endif ?>
		    	</div>
		    </div>
	  	</div>

	  	<div class="form-group">
		    <label class="col-sm-12 col-md-2 control-label">File Upload Tablet</label>
		    <div class="col-sm-10  col-md-8">
		    	<div class="panel-upload dropzone" id="Dropzonepanel_tablet">
		    		<button type="button" class="btn btn-upfile btn-default" onclick="$('#Dropzonepanel_tablet').click()">Select File</button>
		    		<?php if(!empty($data[0]->image_tablet) && is_file('./uploads/'.$data[0]->image_tablet)): ?>
		    		<input type="hidden" name="thumbnail_tablet[]" class="hide-thumbnail_tablet" data-size="<?php echo filesize('uploads/'.$data[0]->image_tablet) ?>" value="<?php echo $data[0]->image_tablet ?>" >
		    		<?php endif ?>
		    	</div>
		    </div>
	  	</div>

	  	<div class="form-group form-actions">
	    	<div class="col-sm-offset-2 col-sm-10">
	    		<a href="form.html" class="btn btn-default">Cancel</a>
	      		<button type="submit" class="btn btn-success">Save</button>
    		</div>
	  	</div>
	</form>
</div>




<script>


var mockFile = new Array();
Dropzone.autoDiscover = false;

$(function() {
	var myDropzone = new Dropzone("div#Dropzonepanel", { 
		url: "upload" , 
		maxFiles:1,
		init: function() {
		    this.hiddenFileInput.removeAttribute('multiple');
		}
	});
	
	myDropzone.on("maxfilesexceeded", function(file) {
			this.removeAllFiles();
	        this.addFile(file);
	});
	myDropzone.on("sending", function(file) {
		    $(".hide-thumbnail").remove();
			
			if($(mockFile).length){

				myDropzone.removeFile(mockFile); 
				mockFile = 0;

			}
	});

	myDropzone.on("success", function(file,response) {
		$("#Dropzonepanel").append('<input type="hidden" class="hide-thumbnail" name="thumbnail[]" value="'+response+'" />');
		file.previewElement.addEventListener("click", function() { 
			if(confirm("คุณต้องการลบใช่หรือไม่")){
				$(".hide-thumbnail").remove();
				myDropzone.removeFile(file); 
			}
		});
	});

	if( $(".hide-thumbnail").length){
		mockFile = { name: $(".hide-thumbnail").val(), size: $(".hide-thumbnail").attr("data-size") };
		//myDropzone.options.addedfile.call(myDropzone, mockFile);
		//myDropzone.options.thumbnail.call(myDropzone, mockFile, "./uploads/"+$(".hide-thumbnail").val());

		myDropzone.emit("addedfile", mockFile);

        myDropzone.emit("thumbnail", mockFile, "./uploads/"+$(".hide-thumbnail").val());

        myDropzone.files.push(mockFile);


		mockFile.previewElement.addEventListener("click", function() { 
			if(confirm("คุณต้องการลบใช่หรือไม่")){
				$(".hide-thumbnail").remove();
				myDropzone.removeFile(mockFile); 
				$("#Dropzonepanel .dz-preview ").remove();
			}
		});
		$('.dz-progress').hide();
	}
})
</script>

<script>


var mockFile = new Array();
Dropzone.autoDiscover = false;

$(function() {
	var myDropzone = new Dropzone("div#Dropzonepanel_tablet", { 
		url: "upload" , 
		maxFiles:1,
		init: function() {
		    this.hiddenFileInput.removeAttribute('multiple');
		}
	});
	
	myDropzone.on("maxfilesexceeded", function(file) {
			this.removeAllFiles();
	        this.addFile(file);
	});
	myDropzone.on("sending", function(file) {
		    $(".hide-thumbnail_tablet").remove();
			
			if($(mockFile).length){

				myDropzone.removeFile(mockFile); 
				mockFile = 0;

			}
	});

	myDropzone.on("success", function(file,response) {
		$("#Dropzonepanel_tablet").append('<input type="hidden" class="hide-thumbnail_tablet" name="thumbnail_tablet[]" value="'+response+'" />');
		file.previewElement.addEventListener("click", function() { 
			if(confirm("คุณต้องการลบใช่หรือไม่")){
				$(".hide-thumbnail_tablet").remove();
				myDropzone.removeFile(file); 
			}
		});
	});

	if( $(".hide-thumbnail_tablet").length){
		mockFile = { name: $(".hide-thumbnail_tablet").val(), size: $(".hide-thumbnail_tablet").attr("data-size") };
		//myDropzone.options.addedfile.call(myDropzone, mockFile);
		//myDropzone.options.thumbnail.call(myDropzone, mockFile, "./uploads/"+$(".hide-thumbnail").val());

		myDropzone.emit("addedfile", mockFile);

        myDropzone.emit("thumbnail", mockFile, "./uploads/"+$(".hide-thumbnail_tablet").val());

        myDropzone.files.push(mockFile);


		mockFile.previewElement.addEventListener("click", function() { 
			if(confirm("คุณต้องการลบใช่หรือไม่")){
				$(".hide-thumbnail").remove();
				myDropzone.removeFile(mockFile); 
				$("#Dropzonepanel_tablet .dz-preview ").remove();
			}
		});
		$('.dz-progress').hide();
	}
})
</script>

<script>
	var $container = $('.packery').packery({
		  itemSelector: '.item',
		  gutter: 0,
		  "columnWidth": ".col-sm-4",
		  "rowHeight": 50,
		  "percentPosition": true,
	});
	function rmactive(){
		$('.item').each(function(){
			$(this).removeClass("active");
		})
	}
	$(function(){
		$('.item').on("click",function(){

			
			var ww = 0;
			var hh = 0;

			var classList = $(this).attr('class').split(/\s+/);

			

			for (var i = 0; i < classList.length; i++) {

				var matchesH = classList[i].match(/hb/);
				var matchesW = classList[i].match(/col-sm-/);
				if(matchesH){
					var real_h = parseInt(matchesH.input.replace("hb", ""));
					if(real_h <= 100){
						hh = (real_h/10)*15
					}
					if(real_h > 100){
						hh = (real_h/10)*17
					}
					
				}
				if(matchesW){
					ww = (parseInt(matchesW.input.replace("col-sm-", ""))*97.5)
				}
			}
			
			
			
			$(".size-re").html("[width : "+Math.ceil(ww)+"px] "+" [height : "+hh+"px]");
			rmactive();
			$('.tra').click()
			$(this).addClass("active");
			$(this).append('<input type="hidden" class="gid" name="gid" value="'+$(this).attr("data-index")+'" />')
			
		})
		if($('.gid').length){

			$('.gid').parent().addClass("active");
		}
		$('.tra').on("click",function(){
			
			var tt = $(this).parent();
			
			$(tt).find('img').remove();
			$(tt).find('.gid').remove();
			$(tt).find('.tra').remove();
			$(tt).removeClass("active")
			return false;

		})
	})
</script>