<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Event Category

	</div>

</div>
<div class="content-wrapper" ng-init="mtype=1">
	<form id="new-customer" class="form-horizontal" method="post" action="admin/event_category/save/<?php echo $data[0]->id ?>" role="form">

		<div class="form-group" ng-show="mtype==1">
		    <label class="col-sm-2 col-md-2 control-label">Name</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="name" required value="<?php echo $data[0]->name ?>" class="form-control" placeholder="Enter Name">
		    </div>
	  	</div>

	  	<div class="form-group" ng-show="mtype==1">
		    <label class="col-sm-2 col-md-2 control-label">Order</label>
		    <div class="col-sm-5  col-md-5">
		    	<input type="number" name="order_by" required value="<?php echo $data[0]->order_by ?>"  class="form-control" placeholder="Enter Order">
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





