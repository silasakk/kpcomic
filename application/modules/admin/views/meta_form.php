
<hr>
<h3 class="text-center">Meta Tag</h3>
<br><br>
<div class="form-group">
<label class="col-sm-2 col-md-2 control-label">Meta Tag Title</label>
	<div class="col-sm-10  col-md-8">
		<input type="text" name="meta_tag_title"  value="<?php echo $meta[0]->meta_tag_title ?>"  class="form-control">
	</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-md-2 control-label">Meta Tag Desc</label>
	<div class="col-sm-10  col-md-8">
		<textarea name="meta_tag_desc" class="form-control" rows="5"  ><?php echo $meta[0]->meta_tag_desc ?></textarea>
	</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-md-2 control-label">Meta Tag Keyword</label>
	<div class="col-sm-10  col-md-8">
		<textarea id="meta_tag_keyword" name="meta_tag_keyword" class="form-control" rows="2"  ><?php echo $meta[0]->meta_tag_keyword ?></textarea>
		<br>
		<span class="text-help">ใส่เครื่องหมาย , คั่นระหว่างคำ</span>
	</div>
</div>
