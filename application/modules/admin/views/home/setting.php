<div class="menubar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>

	<div class="page-title">
		Add Grid
	</div>
	
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
	<div class="form-horizontal">
		<div class="form-group">
			<?php if(isset($layout)): ?>
				<input type="hidden" id="grid_id" value="<?php echo $layout[0]->id ?>">
		    <?php endif; ?>
		    <label class="col-sm-2 col-md-2 control-label">Grid Size</label>
		    <div class="col-sm-6">
		    	<select class="form-control inputgrid">
					<option value="2">2</option>
					<option value="4">4</option>
					<option value="6">6</option>
					<option value="8">8</option>
				</select>
		    </div>
		    <div class="col-sm-4">
		    	<button class="btn btn-info addgrid ">ADD</button>
		    </div>
		</div>

		<div class="form-group form-actions">
			<div class="col-sm-offset-2 col-sm-10">
				<button class="btn savegrid btn-success">SAVE</button>
			</div>
		</div>		
	</div>
</div>
<hr>
<div id="area-grid" class="packery">
	<?php if(isset($layout)): ?>
		<?php foreach (unserialize($layout[0]->layout_context) as $key => $v) :?>

			<div data-index="<?php echo $v['index'] ?>" class="<?php echo $v['width'] ?> col-xs-12 item <?php echo $v['height'] ?>">
				<?php echo $v['index'] ?>
				<i class="fa fa-caret-square-o-up"></i><i class="fa fa-caret-square-o-right"></i><i class="fa fa-caret-square-o-down"></i><i class="fa fa-caret-square-o-left"></i>
			</div>
			
		<?php endforeach; ?>
	<?php endif ?>
</div>



<script>

	Messenger.options = {
		extraClasses: 'messenger-fixed messenger-on-bottom messenger-on-right',
	    theme: 'flat'
	}
	var HeightDiv = 100;
	if($('#area-grid .item').length){
		initPack();
	}
	$(function(){

		$(".addgrid").on('click',function(){
			$('#area-grid').html("");
			var box = $('.inputgrid').val();
			for (var i = 1; i <= box; i++) {
				$('#area-grid').append('<div data-index="'+i+'" class="col-sm-4 col-xs-12 item  hb'+HeightDiv+'">'+i+'</div>');
			};
			initPack();
		});

		$(".savegrid").on('click',function(){

			if($('#area-grid .item').length){

				var dindex=[];
				var widthName=[];
				var heightName=[];

				$('#area-grid .item').each(function(){

					var classList = $(this).attr('class').split(/\s+/);

					dindex.push($(this).attr("data-index"));

					for (var i = 0; i < classList.length; i++) {

						var matchesH = classList[i].match(/hb/);
						var matchesW = classList[i].match(/col-sm-/);
						if(matchesH){
							heightName.push(matchesH.input);
						}
						if(matchesW){
							widthName.push(matchesW.input);	
						}
					}
				});

				//post to save
				var idd = "";
				if($('#grid_id').length){
					idd = $('#grid_id').val();
				}
				$.post( "admin/home/save_setting/"+idd,
					{ 
						eleindex: dindex, 
						elewidth: widthName,
						eleheight: heightName
					}
					,function(data) {
						Messenger().post("Data has been save");
				})

			}else{
				Messenger().post({
				  	message: 'Sorry, cannot save data',
				  	type: 'error',
				  	showCloseButton: true
				});
			}
			
		});
		
	})

	function initPack(){
		var $container = $('.packery').packery({
			  itemSelector: '.item',
			  gutter: 0,
			  "columnWidth": ".col-sm-4",
			  "rowHeight": 50,
			  "percentPosition": true,
		});
		$container.find('.item').each( function( i, itemElem ) {

			var draggie = new Draggabilly( itemElem );

			$container.packery( 'bindDraggabillyEvents', draggie );
		});

		$('.item').append('<i class="fa fa-caret-square-o-up"></i><i class="fa fa-caret-square-o-right"></i><i class="fa fa-caret-square-o-down"></i><i class="fa fa-caret-square-o-left"></i>');}

	//width +
	$('.packery').on('click','.fa-caret-square-o-right',function(){

		var box = $(this).parent();
		// extract class
		var classList = $(box).attr('class').split(/\s+/);

		for (var i = 0; i < classList.length; i++) {

			//find Class
		    var matches = classList[i].match(/col-sm-/);
		    if(matches){

		   		var res = matches.input.split("col-sm-");
			   	var nh = parseInt(res[1])+1;

			   	//max width
		   		if(nh <= 12){

		   			// add new class
			   		$(box).removeClass(matches.input);
			   		$(box).addClass("col-sm-"+nh);
			   		initPack();
		   		}
		   		
		   }
		}
	})
	//width -
	$('.packery').on('click','.fa-caret-square-o-left',function(){

		var box = $(this).parent();
		// extract class
		var classList = $(box).attr('class').split(/\s+/);

		for (var i = 0; i < classList.length; i++) {

			//find Class
		    var matches = classList[i].match(/col-sm-/);
		    if(matches){

		   		var res = matches.input.split("col-sm-");
			   	var nh = parseInt(res[1])-1;

			   	//min width
		   		if(nh >= 2){

		   			// add new class
			   		$(box).removeClass(matches.input);
			   		$(box).addClass("col-sm-"+nh);
			   		initPack();
		   		}
		   		
		   }
		}
	})

	//height +
	$('.packery').on('click','.fa-caret-square-o-up',function(){

		var box = $(this).parent();
		// extract class
		var classList = $(box).attr('class').split(/\s+/);

		for (var i = 0; i < classList.length; i++) {

			//find Class
		    var matches = classList[i].match(/hb/);
		    if(matches){

		   		var res = matches.input.split("hb");
			   	var nh = parseInt(res[1])+50;

			   	//max height
		   		if(nh <= 300){

		   			// add new class
			   		$(box).removeClass(matches.input);
			   		$(box).addClass("hb"+nh);
			   		initPack();
		   		}
		   		
		   }
		}
	})
	//height -
	$('.packery').on('click','.fa-caret-square-o-down',function(){

		var box = $(this).parent();
		// extract class
		var classList = $(box).attr('class').split(/\s+/);

		for (var i = 0; i < classList.length; i++) {

			//find Class
		    var matches = classList[i].match(/hb/);
		    if(matches){

		   		var res = matches.input.split("hb");
			   	var nh = parseInt(res[1])-50;

			   	//max height
		   		if(nh >= 100){

		   			// add new class
			   		$(box).removeClass(matches.input);
			   		$(box).addClass("hb"+nh);
			   		initPack();
		   		}
		   		
		   }
		}
	})

	

</script>
