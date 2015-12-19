
<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Add Member Address

	</div>

</div>
<div class="content-wrapper" >
	<form id="new-customer" class="form-horizontal" method="post" action="admin/member/save_address/<?php echo $data[0]->member_id ?>/<?php echo $data[0]->id ?>" role="form">

		<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Address</label>
		    <div class="col-sm-10  col-md-8">
				<textarea name="address" class="form-control " rows="6"  placeholder="Enter Description"><?php echo $data[0]->address ?></textarea>
		    </div>
	  	</div>
		<div class="form-group">
			<label class="col-sm-2 col-md-2 control-label">Select</label>
			<div class="col-sm-10  col-md-8">
				<select name="current" class="form-control" >
					<option <?php echo ($data[0]->current == 0)?"selected" : "" ?> value="0" >ไม่เลือก</option>
					<option <?php echo ($data[0]->current == 1)?"selected" : "" ?> value="1" >เลือก</option>

				</select>

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

