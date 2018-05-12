<?php 
	$catModel = new Category();
	$cat = $catModel->select('name, alias')->where('status', '1')->where('module', 'san-pham')->get();
	$aut = $catModel->select('name, alias')->where('status', '1')->where('module', 'tac-gia')->get();
	$producer = $catModel->select('name, alias')->where('status', '1')->where('module', 'nxb')->get();
 ?>
<div class="col-md-3 left">
	<div class="row mg-top-20">
		<div class="col-xs-12">
			<div class="item-sidebar">
				<h3 class="title-sidebar text-center">Thể loại</h3>
				<ul>
					<?php foreach ($cat as $item): ?>
						<li><a href="<?php Autoload::URL('product/category/'.$item->alias) ?>"><?php echo $item->name ?></a></li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="row mg-top-20">
		<div class="col-xs-12">
			<div class="item-sidebar">
				<h3 class="title-sidebar text-center">Tác giả</h3>
				<ul>
					<?php foreach ($aut as $item): ?>
						<li><a href="<?php Autoload::URL('product/author/'.$item->alias) ?>"><?php echo $item->name ?></a></li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="row mg-top-20">
		<div class="col-xs-12">
			<div class="item-sidebar">
				<h3 class="title-sidebar text-center">Nhà xuất bản</h3>
				<ul>
					<?php foreach ($producer as $item): ?>
						<li><a href="<?php Autoload::URL('product/producer/'.$item->alias) ?>"><?php echo $item->name ?></a></li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>
</div>