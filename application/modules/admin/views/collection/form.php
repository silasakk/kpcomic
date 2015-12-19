<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>
	<div class="page-title">
		Add Collection
	</div>
</div>
<div class="content-wrapper" ng-init="mtype=1">
	<form id="new-customer" class="form-horizontal" method="post" action="admin/Collection/save/<?php echo $data[0]->id ?>" role="form">

		<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Name</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="name" required value="<?php echo $data[0]->name ?>" class="form-control" placeholder="Enter Name">
		    </div>
	  	</div>

	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">SHOW Name</label>
		    <div class="col-sm-5  col-md-5">
		    	<input type="text" name="showname1" required value="<?php echo $data[0]->showname1 ?>" class="form-control" placeholder="Enter showname 1">
		    	<input type="text" name="showname2"  value="<?php echo $data[0]->showname2 ?>" class="form-control" placeholder="Enter showname 2">
		    	<input type="text" name="showname3"  value="<?php echo $data[0]->showname3 ?>" class="form-control" placeholder="Enter showname 3">

		    </div>
	  	</div>


	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Season</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="season" required value="<?php echo $data[0]->season ?>" class="form-control" placeholder="Enter Name">
		    </div>
	  	</div>

	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Story excerpt</label>
		    <div class="col-sm-10  col-md-8">
		    	<textarea name="story_exc" class="form-control" rows="5"   placeholder="Enter Short Story"><?php echo $data[0]->story_exc ?></textarea>
		    	
		    </div>
	  	</div>

		<div class="form-group">
			<label class="col-sm-2 col-md-2 control-label">Brand</label>
			<div class="col-sm-10  col-md-8">
				<select class="form-control" name="brand">
					<option  value="" >select</option>
					<option <?php echo ($data[0]->brand == "milin")?"selected" : "" ?> value="milin" >Milin</option>
					<option <?php echo ($data[0]->brand == "mimi")?"selected" : "" ?> value="mimi" >MiMi</option>
				</select>

			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-12 col-md-2 control-label">Background</label>
			<div class="col-sm-10  col-md-8">
				<div class="panel-upload dropzone" id="Dropzonepanel">
					<button type="button" class="btn btn-upfile btn-default" onclick="$('#Dropzonepanel').click()">Select File</button>
					<?php if(!empty($data[0]->background) && is_file('./uploads/'.$data[0]->background)): ?>
						<input type="hidden" name="thumbnail[]" class="hide-thumbnail" data-size="<?php echo filesize('uploads/'.$data[0]->background) ?>" value="<?php echo $data[0]->background ?>" >
					<?php endif ?>
				</div>
			</div>
		</div>

	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Story</label>
		    <div class="col-sm-10  col-md-8">
		    	<textarea name="story" class="form-control summernote" rows="10"   placeholder="Enter Description"><?php echo $data[0]->story ?></textarea>
		    	
		    </div>
	  	</div>
		<hr>
	  	<div class="form-group">
		    <label class="col-sm-3 col-md-2 control-label">Collection Item</label>
		    <div class="col-sm-10  col-md-8">
		    	<button type="button" class="btn btn-default add-panel-group" >Add More</button>
		    </div>
	  	</div>
		<?php $item = unserialize($data[0]->item) ?>

		<?php if(!empty($item)): ?>
		<div class="zone-area">
			<?php foreach($item as $k=>  $value): ?>
			<div class="form-group panel-group">
			    <div class="col-sm-10">
			    	<div class="panel-col">
			    		<div class="del-box"><i class="fa fa-times"></i></div>
			    		<input type="file" class="fileToUpload"/>
			    		<div class="col-sm-2">
			    			<div class="zoneup">
			    				<i class="fa fa-plus-circle"></i>
			    				<div class="progressbar"></div>
			    				<?php if($value["image"]): ?>
									<img src="./uploads/<?php echo $value["image"] ?>" alt="">
									<input type="hidden" class="hide-gall" name="image[]" value="<?php echo $value["image"] ?>"  />
			    				<?php endif; ?>
			    			</div>
			    		</div>
			    		<div class="col-sm-10">
			    			<div class="ztitle">Product link</div>
				
			    			<div class="zpanel-pd">
			    				
			    				<?php foreach ($value["pd"]["name"] as $key => $v) :?>
			    				<div class="clcon">
			    					<div class="form-group">
									    <label class="col-sm-2 control-label">Name</label>
									    <div class="col-sm-8">
									    	<input type="text" name="pd_name[<?php echo $k ?>][]" required  value="<?php echo $value["pd"]["name"][$key] ?>" class="form-control" placeholder="Enter Name">
									    </div>
								  	</div>
								  	<div class="form-group">
									    <label class="col-sm-2 control-label">URL</label>
									    <div class="col-sm-8">
									    	<input type="text" name="pd_url[<?php echo $k ?>][]"  value="<?php echo $value["pd"]["url"][$key]?>" class="form-control" placeholder="Enter URL">
									    </div>
								  	</div>
								  	<div class="pdctl">
								  		<div class="btn btn-default btn-primary clrow"><i class="fa fa-plus-circle"></i></div>
										<div class="btn btn-default btn-danger dlrow" ><i class="fa fa-times"></i></div>
								  	</div>
								  	<hr>
			    				</div>
			    					
			    				<?php endforeach; ?>
			    				
			    			</div>

			    			
			    		</div>
			    	</div>
			    </div>
		  	</div>
		  	<?php endforeach; ?>
		</div>
	<?php else: ?>
		<div class="zone-area">
			<div class="form-group panel-group">
			    <div class="col-sm-10">
			    	<div class="panel-col">
			    		<div class="del-box"><i class="fa fa-times"></i></div>
			    		<input type="file" class="fileToUpload"/>
			    		<div class="col-sm-2">
			    			<div class="zoneup">
			    				<i class="fa fa-plus-circle"></i>
			    				<div class="progressbar"></div>
			    			</div>
			    		</div>
			    		<div class="col-sm-10">
			    			<div class="ztitle">Product link</div>

			    			<div class="zpanel-pd">
			    				<div class="clcon">
			    					<div class="form-group">
									    <label class="col-sm-2 control-label">Name</label>
									    <div class="col-sm-8">
									    	<input type="text" name="pd_name[0][]" required  class="form-control" placeholder="Enter Name">
									    </div>
								  	</div>
								  	<div class="form-group">
									    <label class="col-sm-2 control-label">URL</label>
									    <div class="col-sm-8">
									    	<input type="text" name="pd_url[0][]"   class="form-control" placeholder="Enter URL">
									    </div>
								  	</div>
								  	<div class="pdctl">
								  		<div class="btn btn-default btn-primary clrow"><i class="fa fa-plus-circle"></i></div>
										<div class="btn btn-default btn-danger dlrow" ><i class="fa fa-times"></i></div>
								  	</div>
								  	<hr>
			    				</div>
			    				
			    			</div>

			    			
			    		</div>
			    	</div>
			    </div>
		  	</div>
		</div>
	<?php endif; ?>




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

// Bootstrap wysiwyg
$(".summernote").summernote({
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


var t;
function upload(){
    var fileIn = t.find(".fileToUpload")[0];
    //Has any file been selected yet?
    if (fileIn.files === undefined || fileIn.files.length == 0) {
        alert("Please select a file");
        return;
    }

    
    var file = fileIn.files[0];
   
    var myFormData = new FormData();
	myFormData.append('file', file);

    $.ajax({
        url: "upload",
        type: "POST",
        data: myFormData,
        processData: false, 
        contentType: false,
        
        success: function(result){
            t.find(".progressbar").hide();
            t.find(".fileToUpload").replaceWith(t.find(".fileToUpload").clone());
            t.find('.hide-gall').remove();
            t.find('img').remove();
            t.find('.zoneup').append('<img src="uploads/'+result+'"  />');
            t.find('.zoneup').append('<input type="hidden" class="hide-gall" name="image[]" value="'+result+'"  />')
        },
        error: function(){alert("Failed");},

        xhr: function() {
            myXhr = $.ajaxSettings.xhr();
            if(myXhr.upload){
                myXhr.upload.addEventListener('progress',showProgress, false);
            } else {
                console.log("Uploadress is not supported.");
            }
            return myXhr;
        }
    });
}
function showProgress(evt) {
	t.find(".progressbar").show();
    if (evt.lengthComputable) {
        var percentComplete = (evt.loaded / evt.total) * 100;
        t.find('.progressbar').progressbar("option", "value", percentComplete );
    }  
}
$(function(){
	$(".fileToUpload").hide();
    $(".progressbar").progressbar();
    $(".progressbar").hide();
    $("body").on('click','.zoneup',function(){
    	$(this).parent().parent().find('.fileToUpload').click();
    });
    $('body').on('change','.fileToUpload' , function(){ t = $(this).parent();upload(); });
    $('body').on('click','.del-box' , function(){ 
    	if(confirm('คุณต้องการลบใช่หรือไม่')){
    		if($('.panel-group').length > 1){
    			$(this).parent().parent().parent().remove() 
    		}else{
    			$(this).parent().find('img').remove();
		    	$(this).parent().find('.hide-gall').remove();
    		}
    	} 
    	
    });
    $('.add-panel-group').on('click',function(){
    	var newz = $('.panel-group').eq(0).clone();
    	var zpanel_pd = $(newz).find(".zpanel-pd")
		var clcon = $(zpanel_pd).find('.clcon').eq(0);

		$(zpanel_pd).html(clcon);
		
    	var prefix = "[]";
        $(newz).find("input[type='text']").each(function() {
           this.name = this.name.replace(/\[[0-9]+\]/g, '['+parseInt($(".panel-col").length)+']'); 
           this.value = "";
        });

    	newz.find('img').remove();
    	newz.find('.hide-gall').remove();
    	var dd = $('.zone-area').append(newz);
    })

    //********** pdctl ********** 
    $(function(){
		
		$('body').on('click','.clrow',function(){
			var new_con = $('.clcon').eq(0).clone();
			$(new_con).find('input').val("");



			$(this).parent().parent().parent().append(new_con);
		});
		$('body').on('click','.dlrow',function(){
			
			if($(this).parent().parent().parent().find('.clcon').length > 1){
				$(this).parent().parent().remove();
			}else{
				var recon = $(this).parent().parent();
				$(recon).find('input').val("");
			
			}
		});
	})
    
});
</script>



