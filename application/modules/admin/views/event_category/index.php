<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Event Category
	</div>
		<a href="admin/event_category/form" class="btn btn-success pull-right"><span>Add New</span></a>
</div>
<div class="content-wrapper">
	<table class="table tbi">
		<tr>
			
			<th>Name</th>
			
			<th class="td-tool"><i class="fa fa-bolt"></i></th>
		</tr>
		<?php foreach ($data as $key => $value):?>
		<tr>
			
			<td><?php echo $value->name ?></td>

			<td class="td-tool">
				<a href="admin/event_category/form/<?php echo $value->id ?>"><i class="fa fa-pencil"></i></a>
				<a href="admin/event_category/delete/<?php echo $value->id ?>" onclick="return confirm('คุณต้องการลบใช่หรือไม่')" ><i class="fa fa-trash-o"></i></a>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
</div>