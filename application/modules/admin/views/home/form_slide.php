<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Add Slide Show
	</div>
</div>
<div class="content-wrapper" >
	<form id="new-customer" class="form-horizontal" method="post" action="admin/home/save_slide/<?php echo $data[0]->id ?>" role="form">

	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Link</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="url" name="link" value="<?php echo $data[0]->link ?>" class="form-control" placeholder="URL">
		    </div>
	  	</div>
	  	
	  	<div class="form-group">
		    <label class="col-sm-12 col-md-2 control-label">File Upload</label>
		    <div class="col-sm-10  col-md-8">
		    	<div class="panel-upload dropzone" id="Dropzonepanel">
		    		<button type="button" onclick="$('#Dropzonepanel').click()" class="btn btn-upfile btn-default">Select File</button>
		    		<?php if(is_file("./uploads/".$data[0]->image)): ?>
		    			<input type="hidden" class="hide-thumbnail" data-size="<?php echo filesize('uploads/'.$data[0]->image) ?>" name="thumbnail[]" value="<?php echo $data[0]->image ?>" />
		    		<?php endif; ?>
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
