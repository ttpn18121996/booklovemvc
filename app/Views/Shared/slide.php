<?php 
	include_once "$app_path/$model_path/Picture.php";
	$pic = new Picture();

	//Lấy danh sách hình ảnh slide
	$slide = $pic->where('status', '1')->where('module', 'slide')->orderBy('id asc')->get();
 ?>
<div class="row">
	<div class="owl-carousel owl-theme" id="banner">
		<?php foreach ($slide as $item): ?>
			<div class="item">
		    	<a href="#"><img src="<?php Autoload::URL('imgs/'.$item->picture) ?>" alt="<?php echo $item->name ?>"></a>
		    </div>
		<?php endforeach ?>
	</div>
</div>