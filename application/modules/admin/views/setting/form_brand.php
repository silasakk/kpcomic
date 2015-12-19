<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Brand

	</div>

</div>
<div class="content-wrapper" ng-init="mtype=1">
	<form id="new-customer" class="form-horizontal" method="post" action="admin/setting/save_brand/<?php echo $data[0]->id ?>" role="form">
		
		<h2 class="text-center">Brand Page</h2><br>
	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Brand Left</label>
		    <div class="col-sm-10  col-md-8">
		    	<textarea name="brand1" class="form-control summernote" rows="10"  ><?php echo $data[0]->brand1 ?></textarea>
		    	
		    </div>
	  	</div>
	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Brand Right</label>
		    <div class="col-sm-10  col-md-8">
		    	<textarea name="brand2" class="form-control summernote" rows="10"  ><?php echo $data[0]->brand2 ?></textarea>
		    	
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
	$(".mask-phone").mask("+66(99) 999-9999-9");
	$(".mask-fax").mask("+66(99) 999-9999");
</script>