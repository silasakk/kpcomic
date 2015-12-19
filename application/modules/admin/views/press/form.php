<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Add Press

	</div>

</div>
<div class="content-wrapper" >
	<form id="new-customer" class="form-horizontal" method="post" action="admin/press/save/<?php echo $data[0]->id ?>" role="form">

		<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Name</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="name" required value="<?php echo $data[0]->name ?>" class="form-control" placeholder="Enter Name">
		    </div>
	  	</div>

	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Source</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="source" required value="<?php echo $data[0]->source ?>"  class="form-control" placeholder="Enter Source">
		    </div>
	  	</div>

	  	<div class="form-group">
		    <label class="col-sm-12 col-md-2 control-label">Thumbnail</label>
		    <div class="col-sm-10  col-md-8">
		    	<div class="panel-upload dropzone" id="Dropzonepanel">
		    		<button type="button" class="btn btn-upfile btn-default" onclick="$('#Dropzonepanel').click()">Select File</button>
		    		<?php if(!empty($data[0]->thumbnail) && is_file('./uploads/'.$data[0]->thumbnail)): ?>
		    		<input type="hidden" name="thumbnail[]" class="hide-thumbnail" data-size="<?php echo filesize('uploads/'.$data[0]->thumbnail) ?>" value="<?php echo $data[0]->thumbnail ?>" >
		    		<?php endif ?>
		    	</div>
		    </div>
	  	</div>

	  	<div class="form-group">
		    <label class="col-sm-12 col-md-2 control-label">Gallery</label>
		    <div class="col-sm-10  col-md-8">
		    	<div class="panel-upload dropzone" id="Dropzonepanel_gallery">
		    		<button type="button" class="btn btn-upfile btn-default" onclick="$('#Dropzonepanel_gallery').click()">Select File</button>
		    		<?php if(!empty($data[0]->item)): ?>
		    			<?php foreach(unserialize($data[0]->item) as $val): ?>
			    			<?php if(is_file('./uploads/'.$val["image"])): ?>
			    				<input type="hidden" name="gall[]" class="hide-gall" data-size="<?php echo filesize('uploads/'.$val["image"]) ?>" value="<?php echo $val["image"] ?>" >
			    			<?php endif; ?>
		    			<?php endforeach; ?>
		    		<?php endif ?>
		    	</div>
		    </div>
	  	</div>

	  	<div class="form-group form-actions">
	    	<div class="col-sm-offset-2 col-sm-10">
	    		<button type="reset" class="btn btn-default">Cancel</button>
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
