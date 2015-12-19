
<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Add Member

	</div>

</div>
<div class="content-wrapper" >
	<form id="new-customer" class="form-horizontal" method="post" action="admin/member/save/<?php echo $data[0]->member_id ?>" role="form">

		<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Name</label>
		    <div class="col-sm-10  col-md-8">
		    	<input type="text" name="name" required value="<?php echo $data[0]->name ?>" class="form-control" placeholder="Enter Name">
		    </div>
	  	</div>
		<div class="form-group">
			<label class="col-sm-2 col-md-2 control-label">Lastname</label>
			<div class="col-sm-10  col-md-8">
				<input type="text" name="lastname" required value="<?php echo $data[0]->lastname ?>" class="form-control" placeholder="Enter LastName">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 col-md-2 control-label">Telephone</label>
			<div class="col-sm-10  col-md-8">
				<input type="number" name="telephone" required value="<?php echo $data[0]->telephone ?>" class="form-control" placeholder="Enter Telephone">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 col-md-2 control-label">Email</label>
			<div class="col-sm-10  col-md-8">
				<input type="text" name="email" required value="<?php echo $data[0]->email ?>" class="form-control" placeholder="Enter Email">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 col-md-2 control-label">Status</label>
			<div class="col-sm-10  col-md-8">
				<select name="enable" class="form-control">
					<option>select...</option>
					<option <?php echo ($data[0]->enable == 0 )?"selected":"" ?> value="0">Disable</option>
					<option <?php echo ($data[0]->enable == 1 )?"selected":"" ?> value="1">Enable</option>
				</select>

			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 col-md-2 control-label">Create time</label>
			<div class="col-sm-10  col-md-8">
				<p class=""><?php echo $data[0]->created_at ?></p>

			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 col-md-2 control-label">Last update</label>
			<div class="col-sm-10  col-md-8">
				<p class=""><?php echo $data[0]->updated_at ?></p>

			</div>
		</div>


		<div class="form-group">
			<label class="col-sm-2 col-md-2 control-label">Password</label>
			<div class="col-sm-10  col-md-8">
				<input type="password" name="password"  value="<?php echo $data[0]->password ?>" class="form-control" placeholder="Enter Password">

			</div>
		</div>
	  	<script>
			$("input[type='password']").focus(function(){
				this.type = "text";
			}).blur(function(){
				this.type = "password";
			})
		</script>
	  	<div class="form-group">
		    <label class="col-sm-2 col-md-2 control-label">Level</label>
		    <div class="col-sm-10  col-md-8">
				<select name="level" class="form-control">
					<option value="">select...</option>
					<option <?php echo ($data[0]->level == "0" )?"selected":"" ?> value="0">Customer</option>
					<option <?php echo ($data[0]->level == "admin" )?"selected":"" ?> value="admin">Admin</option>
				</select>
		    </div>
	  	</div>
		<div class="form-group">
			<label class="col-sm-2 col-md-2 control-label">Address</label>
			<?php
			//select query
			$sql = "select * from member_address where member_id = '{$data[0]->member_id}' ";
			$qry = $this->db->query($sql);
			$result = $qry->result();
			?>
			<div class="col-sm-10  col-md-8">
				<a href="admin/member/form_address/" class="btn btn-success btn-xs pull-right"><span>Add New</span></a>
				<br>
				<br>
				<div class="clearfix"></div>
				<table class="table tbi">
					<tr>

						<th>address</th>
						<th width="50">current</th>
						<th class="td-tool"><i class="fa fa-bolt"></i></th>
					</tr>
					<?php foreach ($result as $key => $value):?>
						<tr style="background: #f5f5f5">


							<td><?php echo $value->address ?></td>
							<td><input type="radio" <?php echo ($value->current == 1)?"checked" : "" ?> name="current" value="<?php echo $value->id ?>" ></td>

							<td class="td-tool">
								<a href="admin/member/form_address/<?php echo $value->member_id ?>/<?php echo $value->id ?>"><i class="fa fa-pencil"></i></a>
								<a href="admin/member/delete_address/<?php echo $value->member_id ?>" onclick="return confirm('คุณต้องการลบใช่หรือไม่')" ><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>


					<?php endforeach ?>
				</table>
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

