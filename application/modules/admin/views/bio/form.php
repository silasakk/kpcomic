<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Add Biography

	</div>

</div>
<div class="content-wrapper" ng-init="mtype=1">
	<form id="new-customer" class="form-horizontal" method="post" action="admin/bio/save/<?php echo $bio[0]->id ?>" role="form">
		<?php if(isset($layout)): ?>
			<input type="hidden" id="post_id" value="<?php echo $bio[0]->id ?>">
	    <?php endif; ?>
		<div class="form-group" ng-show="mtype==1">
		    <label class="col-sm-2 col-md-2 control-label">Name</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="name" required value="<?php echo $bio[0]->name ?>" class="form-control" placeholder="Enter Name">
		    </div>
	  	</div>

	  	<div class="form-group" ng-show="mtype==1">
		    <label class="col-sm-2 col-md-2 control-label">Position</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="position" required value="<?php echo $bio[0]->position ?>"  class="form-control" placeholder="Enter Position">
		    </div>
	  	</div>

	  	<div class="form-group" ng-show="mtype==1">
		    <label class="col-sm-2 col-md-2 control-label">Description</label>
		    <div class="col-sm-10  col-md-8">
		    	<textarea name="detail" class="form-control" rows="10"  placeholder="Enter Description"><?php echo $bio[0]->detail ?></textarea>
		    	
		    </div>
	  	</div>
	  	
	  	<div class="form-group">
		    <label class="col-sm-12 col-md-2 control-label">Photo Upload</label>
		    <div class="col-sm-10  col-md-8">
		    	<div class="panel-upload dropzone" id="Dropzonepanel">
		    		<button type="button" class="btn btn-upfile btn-default" onclick="$('#Dropzonepanel').click()">Select File</button>
		    		<?php if(!empty($bio[0]->image) && is_file('./uploads/'.$bio[0]->image)): ?>
		    		<input type="hidden" name="gall[]" class="hide-gall" data-size="<?php echo filesize('uploads/'.$bio[0]->image) ?>" value="<?php echo $bio[0]->image ?>" >
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

	var mockFile = 0;
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
		
				if(mockFile != 0){
					myDropzone.removeFile(mockFile); 
					mockFile = 0;
				}

				


		});
		
		
		myDropzone.on("success", function(file,response) {
			
			
			$("#Dropzonepanel").append('<input type="hidden" class="hide-gall" name="gall[]" value="'+response+'" />');
			file.previewElement.addEventListener("click", function() { 
				if(confirm("คุณต้องการลบใช่หรือไม่")){
					$(".hide-gall").remove();
					myDropzone.removeFile(file); 
				}
			});

		});

		if( $(".hide-gall").length){
			mockFile = { name: $(".hide-gall").val(), size: $(".hide-gall").attr("data-size") };
			myDropzone.options.addedfile.call(myDropzone, mockFile);
			myDropzone.options.thumbnail.call(myDropzone, mockFile, "./uploads/"+$(".hide-gall").val());
			mockFile.previewElement.addEventListener("click", function() { 
				if(confirm("คุณต้องการลบใช่หรือไม่")){
					$(".hide-gall").remove();
					myDropzone.removeFile(mockFile); 


				}
			});
			$('.dz-progress').hide();
		}
		
		
	})
</script>
