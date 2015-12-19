<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Contact Us

	</div>

</div>
<div class="content-wrapper" ng-init="mtype=1">
	<form id="new-customer" class="form-horizontal" method="post" action="admin/setting/save_contact/<?php echo $data[0]->id ?>" role="form">
		<h2 class="text-center">Contact Us Page</h2><br>
		<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Address</label>
		    <div class="col-sm-10  col-md-8">
		    	<textarea name="address" class="form-control" rows="2"  placeholder="Enter Address"><?php echo $data[0]->address ?></textarea>
		    	
		    </div>
	  	</div>
		<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Tel</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="tel" required value="<?php echo $data[0]->tel ?>" class="form-control mask-phone" placeholder="Enter Tel">
		    </div>
	  	</div>

	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Fax</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="fax" required value="<?php echo $data[0]->fax ?>" class="form-control mask-fax" placeholder="Enter Fax">
		    </div>
	  	</div>

		<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Email</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="email" name="email" required value="<?php echo $data[0]->email ?>" class="form-control" placeholder="Enter Email">
		    </div>
	  	</div>

	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Email Contact</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="email" name="contact_email" required value="<?php echo $data[0]->contact_email ?>" class="form-control" placeholder="Enter Email Contact">
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