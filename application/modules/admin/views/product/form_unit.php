<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Add Product

	</div>

</div>

<div class="content-wrapper" >
	<form id="new-customer" class="form-horizontal" method="post" action="admin/product/save_unit/<?php echo $data[0]->product_unit_id ?>" role="form">

		<div class="form-group">
			<label class="col-sm-2 col-md-2 control-label">Code</label>
			<div class="col-sm-10  col-md-8">
				<!--<input type="text" name="code" required value="<?php /*echo $data[0]->code */?>" class="form-control" placeholder="Enter Code">-->
				<input type="hidden" name="code"  value="<?php echo $data[0]->code ?>" >
				<?php echo $data[0]->code ?>
			</div>
		</div>

	  	
	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Description</label>
		    <div class="col-sm-10  col-md-8">
		    	<textarea name="detail" class="form-control " rows="6"  placeholder="Enter Description"><?php echo $data[0]->detail ?></textarea>
		    </div>
	  	</div>
	  	
	  	
	  	<div class="form-group" >
		    <label class="col-sm-2 col-md-2 control-label">Main Product</label>
		    <div class="col-sm-10  col-md-8">

				<?php
				$sql = "SELECT * FROM `product` where id  = '{$data[0]->product_id}' ";
				$qry = $this->db->query($sql);
				$rs = $qry->result();
				?>

				<input type="hidden" name="product_id"  value="<?php echo $data[0]->product_id ?>" >
				<?php echo $rs[0]->name ?>

		    	
		    </div>
	  	</div>
	  	

	  	

	  	
	  	<div class="form-group" >
		    <label class="col-sm-2 col-md-2 control-label">Size</label>
		    <div class="col-sm-10  col-md-8">
		    	<!--<select name="size_id[]" style="width: 300px;" class="select2" multiple="multiple">
		    		<?php /*
		    			$sql = "select * from product_size order by order_by";
						$qry = $this->db->query($sql);
						$rs = $qry->result();
		    		 */?>
		    		 <?php /*foreach ($rs as $key => $value): */?>
				    		 <?php /*
				    			$sql = "select * from product_meta where meta_name = 'size' and product_id = '".$data[0]->id."' and size_id ='".$value->id."' ";
								$qry = $this->db->query($sql);

				    		 */?>
		    		 		<option <?php /*echo $qry->num_rows() ? "selected" : ""  */?>  value="<?php /*echo $value->id */?>"><?php /*echo $value->name */?></option>
		    		 <?php /*endforeach */?>
		    	</select>-->

				<input type="hidden" name="size"  value="<?php echo $data[0]->size ?>" >
				<?php echo $data[0]->size ?>
		    	
		    </div>
	  	</div>
	  	
	  	<div class="form-group" >
		    <label class="col-sm-2 col-md-2 control-label">Color</label>
		    <div class="col-sm-10  col-md-8">
		    	<!--<select name="color_id[]" style="width: 300px;" class="select2" multiple="multiple">
		    		<?php /*
		    			$sql = "select * from product_color order by order_by";
						$qry = $this->db->query($sql);
						$rs = $qry->result();
		    		 */?>
		    		 <?php /*foreach ($rs as $key => $value): */?>
				    		 <?php /*
				    			$sql = "select * from product_meta where meta_name = 'color' and product_id = '".$data[0]->id."' and color_id ='".$value->id."' ";
								$qry = $this->db->query($sql);
				    		 */?>
		    		 		<option <?php /*echo $qry->num_rows() ? "selected" : ""  */?>  value="<?php /*echo $value->id */?>"><?php /*echo $value->name */?></option>
		    		 <?php /*endforeach */?>
		    		
		    	</select>-->

				<input type="hidden" name="color"  value="<?php echo $data[0]->color ?>" >
				<?php echo $data[0]->color ?>
		    	
		    </div>
	  	</div>
	  	
	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Price</label>
		    <div class="col-sm-10  col-md-8">
		    	<!--<input type="text" name="price" required value="<?php /*echo $data[0]->price */?>" class="form-control" placeholder="Enter Name">-->
				<input type="hidden" name="price"  value="<?php echo $data[0]->price ?>" >
				<?php echo $data[0]->price ?>
		    </div>
	  	</div>
	  	
	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Sale Price</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="sale_price" required value="<?php echo $data[0]->sale_price ?>" class="form-control" placeholder="Enter Name">
		    </div>
	  	</div>
	  	
	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Qty</label>
		    <div class="col-sm-10  col-md-8">
		    	<!--<input type="text" name="qty" required value="<?php /*echo $data[0]->qty */?>" class="form-control" placeholder="Enter Name">-->
				<input type="hidden" name="qty"  value="<?php echo $data[0]->qty ?>" >
				<?php echo $data[0]->qty ?>

		    </div>
	  	</div>

		<div class="form-group">
			<label class="col-sm-12 col-md-2 control-label">Thumb color</label>
			<div class="col-sm-10  col-md-8">
				<div class="panel-upload dropzone" id="Dropzonepanel_color">
					<button type="button" class="btn btn-upfile btn-default" onclick="$('#Dropzonepanel_color').click()">Select File</button>
					<?php if(!empty($data[0]->thumb_color) && is_file('./uploads/'.$data[0]->thumb_color)): ?>
						<input type="hidden" name="thumb_color[]" class="hide-color" data-size="<?php echo filesize('uploads/'.$data[0]->thumb_color) ?>" value="<?php echo $data[0]->thumb_color ?>" >
					<?php endif ?>
				</div>
			</div>
		</div>

	  	<div class="form-group">
		    <label class="col-sm-12 col-md-2 control-label">Image</label>
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
		$(document).ready(function() {
		  $(".select2").select2();
		});

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

	var mockFile3 = new Array();
	$(function() {

		var myDropzone = new Dropzone("div#Dropzonepanel_color", {
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
			$(".hide-color").remove();

			if($(mockFile3).length){

				myDropzone.removeFile(mockFile3);
				mockFile3 = 0;

			}
		});

		myDropzone.on("success", function(file,response) {
			$("#Dropzonepanel_color").append('<input type="hidden" class="hide-color" name="thumb_color[]" value="'+response+'" />');
			file.previewElement.addEventListener("click", function() {
				if(confirm("คุณต้องการลบใช่หรือไม่")){
					$(".hide-color").remove();
					myDropzone.removeFile(file);
				}
			});
		});

		if( $(".hide-color").length){
			mockFile3 = { name: $(".hide-color").val(), size: $(".hide-color").attr("data-size") };
			//myDropzone.options.addedfile.call(myDropzone, mockFile);
			//myDropzone.options.thumbnail.call(myDropzone, mockFile, "./uploads/"+$(".hide-thumbnail").val());

			myDropzone.emit("addedfile", mockFile3);

			myDropzone.emit("thumbnail", mockFile3, "./uploads/"+$(".hide-color").val());

			myDropzone.files.push(mockFile3);


			mockFile3.previewElement.addEventListener("click", function() {
				if(confirm("คุณต้องการลบใช่หรือไม่")){
					$(".hide-thumbnail").remove();
					myDropzone.removeFile(mockFile3);
					$("#Dropzonepanel_color .dz-preview ").remove();
				}
			});
			$('.dz-progress').hide();
		}
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
