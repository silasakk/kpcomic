<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Add Event
	</div>
</div>
<div class="content-wrapper"  ng-init="mtype='<?php echo (empty($data[0]->media_type ))? 'text' : $data[0]->media_type ?>'" >
	<form id="new-customer" class="form-horizontal" method="post" action="admin/event/save/<?php echo $data[0]->id ?>" role="form">
	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Media Type</label>
		    <div class="col-sm-10  col-md-8">
		    	<div class="radio">
		    		<label ng-click="mtype='text'">
		          		<input type="radio" ng-checked="mtype=='text'" name="media_type" value="text" <?php echo ($data[0]->media_type == "text")? "checked" : ""  ?>> Text
	        		</label> 
		    		<label ng-click="mtype='gallery'">
		          		<input type="radio" ng-checked="mtype=='gallery'" name="media_type" value="gallery" <?php echo ($data[0]->media_type == "gallery")? "checked" : ""  ?>> Gallery
	        		</label> 

		        	<label ng-click="mtype='video'">
		          		<input type="radio" ng-checked="mtype=='video'" name="media_type" value="video" <?php echo ($data[0]->media_type == "video")? "checked" : ""  ?>> Video
	        		</label>
		      	</div>
		    </div>
	  	</div>

	  	<div class="form-group" >
		    <label class="col-sm-2 col-md-2 control-label">Title</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="title" required value="<?php echo $data[0]->title ?>"  class="form-control" placeholder="Enter Title">
		    </div>
	  	</div>

	  	<div class="form-group" >
		    <label class="col-sm-2 col-md-2 control-label">Category</label>
		    <div class="col-sm-10  col-md-8">
		    	<select name="category_id" class="form-control">
		    		<?php 
		    			$sql = "select * from event_category order by order_by";
						$qry = $this->db->query($sql);
						$rs = $qry->result();
		    		 ?>
		    		 <?php foreach ($rs as $key => $value): ?>
		    		 		<option <?php echo ($value->id == $data[0]->category_id)? "selected":"" ?> value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
		    		 <?php endforeach ?>
		    		
		    	</select>
		    	
		    </div>
	  	</div>



	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Date</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="e_date" required value="<?php echo $data[0]->e_date ?>"  class="form-control" placeholder="Enter Date">
		    </div>
	  	</div>

	  	
	  	
	  	
	  	<div class="form-group" ng-show="mtype=='text'">
		    <label class="col-sm-2 col-md-2 control-label">Content</label>
		    <div class="col-sm-10  col-md-8">
		    	<textarea name="content" class="form-control summernote" rows="6"  placeholder="Enter Address"><?php echo $data[0]->content ?></textarea>
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
	  	<div class="form-group" ng-show="mtype=='gallery'">
		    <label class="col-sm-12 col-md-2 control-label">Gallery</label>
		    <div class="col-sm-10  col-md-8">
		    	<div class="panel-upload dropzone" id="Dropzonepanel_gallery">
		    		<button type="button" class="btn btn-upfile btn-default" onclick="$('#Dropzonepanel_gallery').click()">Select File</button>
		    		<?php if(!empty($data[0]->gallery)): ?>
		    			<?php foreach(unserialize($data[0]->gallery) as $val): ?>
			    			<?php if(is_file('./uploads/'.$val["image"])): ?>
			    				<input type="hidden" name="gall[]" class="hide-gall" data-size="<?php echo filesize('uploads/'.$val["image"]) ?>" value="<?php echo $val["image"] ?>" >
			    			<?php endif; ?>
		    			<?php endforeach; ?>
		    		<?php endif ?>
		    	</div>
		    </div>
	  	</div>
	  	<div class="form-group">
		    <label class="col-sm-12 col-md-2 control-label">Thumbnail</label>
		    <div class="col-sm-10  col-md-8">
		    	<div class="panel-upload dropzone" id="Dropzonepanel">
		    		<button type="button" class="btn btn-upfile btn-default" onclick="$('#Dropzonepanel').click()">Select File</button>
		    		<?php if(!empty($data[0]->image) && is_file('./uploads/'.$data[0]->image)): ?>
		    		<input type="hidden" name="thumbnail[]" class="hide-thumbnail" data-size="<?php echo filesize('uploads/'.$data[0]->image) ?>" value="<?php echo $data[0]->image ?>" >
		    		<?php endif ?>
		    	</div>
		    </div>
	  	</div>
		<?php $d["meta"] = $meta ?>
	  	<?php echo $this->load->view('meta_form',$d["meta"],true); ?>

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


	var mockFile2 = new Array();
	$(function() {

		var myDropzone = new Dropzone("div#Dropzonepanel_gallery", { 
			url: "upload" , 
			
		});
		
		myDropzone.on("success", function(file,response) {
			$(file.previewElement).append('<input type="hidden" class="hide-gall" name="gall[]" value="'+response+'" />');
			file.previewElement.addEventListener("click", function() { 
				if(confirm("คุณต้องการลบใช่หรือไม่")){
					$(file.previewElement).remove();
					myDropzone.removeFile(file); 
				}
			});
		});
		
		
		if( $(".hide-gall").length){

			$(".hide-gall").each(function(i) {
			  	mockFile2 = { name: $(".hide-gall").eq(i).val(), size: $(".hide-gall").eq(i).attr("data-size") };
				
				// Call the default addedfile event handler
                myDropzone.emit("addedfile", mockFile2);

                // And optionally show the thumbnail of the file:
                myDropzone.emit("thumbnail", mockFile2, "./uploads/"+$(".hide-gall").eq(i).val());

                myDropzone.files.push(mockFile2);

                mockFile2.previewElement.addEventListener("click", function() { 
					if(confirm("คุณต้องการลบใช่หรือไม่")){
						$(".hide-gall").eq( ($(".dz-preview").index(this)) - 1 ).remove()
						$(this).remove();
						//$(".dz-preview ").eq(i).remove();
						//console.log($(".dz-preview").index(this));
						//myDropzone.removeFile($(this)); 
					}
				});

			});
		}

				


				
			
			$('.dz-progress').hide();
		
	})
	$("#Dropzonepanel_gallery").sortable({
        items:'.dz-preview',
        cursor: 'move',
        opacity: 0.5,
        containment: '#Dropzonepanel_gallery',
        distance: 20,
        tolerance: 'pointer'
    });
</script>
<script>
	function sendFile(file, editor, welEditable) {
        data = new FormData();
        data.append("file", file);
        $.ajax({
            data: data,
            type: "POST",
            url: "upload",
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                editor.insertImage(welEditable, './uploads/'+url);
            }
        });
    }
	// Bootstrap wysiwyg
	$(".summernote").summernote({
		onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
        },
		height: 240,
		toolbar: [
		    ['style', ['style']],
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['fontsize', ['fontsize']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['height', ['height']],
		    ['insert', ['picture', 'link', 'video']],
		    ['view', ['fullscreen', 'codeview']],
		    ['table', ['table']],
		]
	});
</script>