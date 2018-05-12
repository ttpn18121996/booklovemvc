<?php 
	$catModel = new Category();
	
	$con = new Controller();

	// Lấy danh sách thể loại
	$cat = $catModel->select('name, alias')->where('status', '1')->where('module', 'san-pham')->get();

	//Lấy danh sách tác giả
	$aut = $catModel->select('name, alias')->where('status', '1')->where('module', 'tac-gia')->get();

	// Lấy danh sách nhà xuất bản
	$producer = $catModel->select('name, alias')->where('status', '1')->where('module', 'nxb')->get();


	if (isset($_SESSION['cart'])) {
		$total = count($_SESSION['cart']);
	}
	
 ?>
<div class="sideMenu">
	<div class="closeTrigger"><span><i class="fa fa-chevron-left" aria-hidden="true"></i></span></div>
	<ul class="sideMenu-ul mg-top-20">
		<li><a href="<?php Autoload::URL('home/index') ?>">Trang chủ</a></li>
		<li><a href="<?php Autoload::URL('home/about') ?>">Giới thiệu</a></li>
		<li class="has-children">
			<a href="<?php Autoload::URL('product') ?>">Thể loại</a><span class="click-dropdown"><i class="fa fa-caret-down"></i></span>
			<ul>
				<?php foreach ($cat as $item): ?>
					<li><a href="<?php Autoload::URL('product/category/'.$item->alias) ?>"><?php echo $item->name ?></a></li>
				<?php endforeach ?>
			</ul>
		</li>
		<li class="has-children">
			<a href="<?php Autoload::URL('product') ?>">Tác giả</a><span class="click-dropdown"><i class="fa fa-caret-down"></i></span>
			<ul>
				<?php foreach ($aut as $item): ?>
					<li><a href="<?php Autoload::URL('product/author/'.$item->alias) ?>"><?php echo $item->name ?></a></li>
				<?php endforeach ?>
			</ul>
		</li>
		<li class="has-children">
			<a href="<?php Autoload::URL('product') ?>">NXB</a><span class="click-dropdown"><i class="fa fa-caret-down"></i></span>
			<ul>
				<?php foreach ($producer as $item): ?>
					<li><a href="<?php Autoload::URL('product/producer/'.$item->alias) ?>"><?php echo $item->name ?></a></li>
				<?php endforeach ?>
			</ul>
		</li>
		<li><a href="<?php Autoload::URL('home/contact') ?>">Liên hệ</a></li>
	</ul>
</div>