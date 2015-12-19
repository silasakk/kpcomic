<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>
	<div class="page-title">
		Add Store
	</div>
</div>
<div class="content-wrapper" ng-init="mtype=1">
	<form id="new-customer" class="form-horizontal" method="post" action="admin/store/save/<?php echo $data[0]->id ?>" role="form">
		<?php if(isset($layout)): ?>
			<input type="hidden" id="post_id" value="<?php echo $data[0]->id ?>">
	    <?php endif; ?>
		<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Name</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="name" required value="<?php echo $data[0]->name ?>" class="form-control" placeholder="Enter Name">
		    </div>
	  	</div>

	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Address</label>
		    <div class="col-sm-10  col-md-8">
		    	<textarea name="address" class="form-control" rows="10"   placeholder="Enter Description"><?php echo $data[0]->address ?></textarea>
		    	
		    </div>
	  	</div>
	  	
	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Tel no.</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="tel" required value="<?php echo $data[0]->tel ?>" class="form-control" placeholder="Enter Tel no.">
		    </div>
	  	</div>

	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Lat / Long</label>
		    <div class="col-sm-5  col-md-4">
		    	<input type="text" name="lat" required value="<?php echo $data[0]->lat ?>" class="form-control">
		    </div>
		    <div class="col-sm-5  col-md-4">
		    	<input type="text" name="lng" required value="<?php echo $data[0]->lng ?>" class="form-control">
		    </div>
	  	</div>
		
		<div class="ztpanel">
			<?php if($data[0]->store_time): ?>
			<?php foreach (unserialize($data[0]->store_time) as $key => $value) :?>

			<?php  
			$hh = unserialize($data[0]->hh);
			$mm = unserialize($data[0]->mm);
			?>

			<div class="form-group clcon">
			    <label class="col-sm-2 col-md-2 control-label">Store Hours </label>
			    <div class="col-sm-2">
			    	<select name="store_time[]" class="form-control">
			    		<option>Select Day</option>
			    		<option <?php echo ($value == "Monday - Friday")? "selected" : "" ?> value="Monday - Friday" >Monday - Friday</option>
			    		<option <?php echo ($value == "Monday - Saturday")? "selected" : "" ?> value="Monday - Saturday">Monday - Saturday</option>
			    		<option <?php echo ($value == "Saturday - Sunday")? "selected" : "" ?> value="Saturday - Sunday">Saturday - Sunday</option>
			    		<option <?php echo ($value == "Everyday")? "selected" : "" ?> value="Everyday">Everyday</option>
			    		<option <?php echo ($value == "Monday")? "selected" : "" ?> value="Monday">Monday</option>
			    		<option <?php echo ($value == "Tuesday")? "selected" : "" ?> value="Tuesday">Tuesday</option>
			    		<option <?php echo ($value == "Wednesday")? "selected" : "" ?> value="Wednesday">Wednesday</option>
			    		<option <?php echo ($value == "Thursday")? "selected" : "" ?> value="Thursday">Thursday</option>
			    		<option <?php echo ($value == "Friday")? "selected" : "" ?> value="Friday">Friday</option>
			    		<option <?php echo ($value == "Saturday")? "selected" : "" ?> value="Saturday">Saturday</option>
			    		<option <?php echo ($value == "Sunday")? "selected" : "" ?> value="Sunday">Sunday</option>
			    	</select>
			    </div>
			    <div class="col-sm-2">
			    	<input type="text" placeholder="Hour" name="hh[]" required value="<?php echo $hh[$key] ?>" class="form-control">
			    </div>

			    <div class="col-sm-2">
			    	<input type="text" placeholder="Minute" name="mm[]" required value="<?php echo $mm[$key] ?>" class="form-control">
			    </div>
			     <div class="col-sm-2">
			    	<div class="btn btn-default btn-primary clrow"><i class="fa fa-plus-circle"></i></div>
			    	<div class="btn btn-default btn-danger dlrow" ><i class="fa fa-times"></i></div>
			    </div>
		  	</div>
				
			<?php endforeach ?>
			<?php else: ?>
			<div class="form-group clcon">
			    <label class="col-sm-2 col-md-2 control-label">Store Hours </label>
			    <div class="col-sm-2">
			    	<select name="store_time[]" class="form-control">
			    		<option>Select Day</option>
			    		<option value="Monday - Friday" >Monday - Friday</option>
			    		<option value="Monday - Saturday">Monday - Saturday</option>
			    		<option value="Saturday - Sunday">Saturday - Sunday</option>
			    		<option value="Everyday">Everyday</option>
			    		<option value="Monday">Monday</option>
			    		<option value="Tuesday">Tuesday</option>
			    		<option value="Wednesday">Wednesday</option>
			    		<option value="Thursday">Thursday</option>
			    		<option value="Friday">Friday</option>
			    		<option value="Saturday">Saturday</option>
			    		<option value="Sunday">Sunday</option>
			    	</select>
			    </div>
			    <div class="col-sm-2">
			    	<input type="text" placeholder="Hour" name="hh[]" required  class="form-control">
			    </div>

			    <div class="col-sm-2">
			    	<input type="text" placeholder="Minute" name="mm[]" required  class="form-control">
			    </div>
			     <div class="col-sm-2">
			    	<div class="btn btn-default btn-primary clrow"><i class="fa fa-plus-circle"></i></div>
			    	<div class="btn btn-default btn-danger dlrow" ><i class="fa fa-times"></i></div>
			    </div>
		  	</div>
			<?php endif; ?>
			
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
	$(function(){
		
		$('body').on('click','.clrow',function(){
			var new_con = $('.clcon').eq(0).clone();
			$(new_con).find('input').val("");
			$(new_con).find('select option').prop("selected", false);
			$('.ztpanel').append(new_con);
		});
		$('body').on('click','.dlrow',function(){
			
			if($('.clcon').length > 1){
				$(this).parent().parent().remove();
			}else{
				var recon = $(this).parent().parent();
				$(recon).find('input').val("");
				$(recon).find('select option').prop("selected", false);
			}
		});
	})
</script>




