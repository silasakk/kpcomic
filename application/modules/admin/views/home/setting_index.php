<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Setting Grid
	</div>
	<a href="admin/home/setting" class="btn btn-success pull-right"><span>Add Grid</span></a>
</div>

<div class="content-wrapper">

<div class="col-md-12 panel">
	<strong>Grid คืออะไร?</strong>
	<hr>
	<p>
		Grid คือรูปแบบ layout ที่สามารถสร้างขึ้นเองได้โดยการเลือกจำนวน Column ที่เป็นเลขคู่เทานั้น
		รูปแบบที่เลือกจะถูกแสดงอยู่ที่หน้าแรก
	</p>
</div>
<form action="admin/home/save_gds" method="post">
<ul class="ls-grid">
	<?php foreach ($layouts as $value) :?>
	<li class="col-sm-4 hb300">
		<div class="tplical">
			<label><input type="radio" <?php echo ($value->grid_selected == 1) ? "checked" : "" ?> value="<?php echo $value->id ?>" name="select-grid"> GridID : <?php echo $value->id ?></label>
			<a class="del_grid" href="admin/home/del_grid/<?php echo $value->id ?>" onclick="return confirm('คุณยืนยันที่จะลบใช่หรือไม่')" ><i class="fa fa-times"></i></a>
			<a class="edit_grid"  href="admin/home/setting/<?php echo $value->id ?>"><i class="fa fa-pencil"></i></a>
		</div>
		<div class="packery">
				<?php foreach (unserialize($value->layout_context) as $key => $v) :?>

				<div data-index="<?php echo $v['index'] ?>" class="<?php echo $v['width'] ?> col-xs-12 item <?php echo $v['height'] ?>"><?php echo $v['index'] ?></div>
					
				<?php endforeach; ?>
		</div>
	</li>
	<?php endforeach;  ?>
</ul>
<br>
<div class="form-group form-actions">
	<div class="col-sm-10">
		<button type="reset" class="btn btn-default">Cancel</button>
  		<button type="submit" class="btn btn-success">Save</button>
	</div>
	</div>
</form>

<script>
	var $container = $('.packery').packery({
		  itemSelector: '.item',
		  gutter: 0,
		  "columnWidth": ".col-sm-4",
		  "rowHeight": 50,
		  "percentPosition": true,
	});
</script>
</div>