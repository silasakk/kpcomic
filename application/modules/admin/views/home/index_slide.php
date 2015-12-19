<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Slide Show
	</div>
		<a href="admin/home/form_slide" class="btn btn-success pull-right"><span>Add New</span></a>
</div>
<div class="content-wrapper">
	<table class="table tbi">
		<tr>
			<th class="td-tool">Image</th>
			<th>Link</th>
			
			<th class="td-tool"><i class="fa fa-bolt"></i></th>
		</tr>
		<?php foreach ($data as $key => $value):?>
		<tr>
			
			<td class="td-tool">
				<?php if($value->image): ?>
					<img src="<?php echo image('./uploads/'.$value->image, 'square-xs'); ?>"/>
				<?php endif; ?>
			</td>
			<td><?php echo ($value->link) ? $value->link : "<em>None</em>" ?></td>
			<td class="td-tool">
				<a href="admin/home/form_slide/<?php echo $value->id ?>"><i class="fa fa-pencil"></i></a>
				<a href="admin/home/delete_slide/<?php echo $value->id ?>" onclick="return confirm('คุณต้องการลบใช่หรือไม่')" ><i class="fa fa-trash-o"></i></a>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
</div>