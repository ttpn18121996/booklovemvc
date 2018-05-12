<!-- Slide -->
<?php include 'app/Views/Shared/slide.php'; ?>
<!-- End Slide -->
<!-- Content -->
<div class="container">
	<!-- Slide Sale -->
	<div class="row title text-center">
		<h3>Sản phẩm <span class="myColor">GIẢM GIÁ</span>	</h3>
	</div>
	<div class="row">
		<div class="owl-carousel owl-theme" id="slide_sale">
			<?php foreach ($data_sale as $item) { ?>
			<div class="item">
				<div class="col-md-12">
					<div class="product-box prod-animate">
						<div class="product-sale">
							<?php if ($item->sale != 0): ?>
								<span>-<?php echo $item->sale ?>%</span>
							<?php endif ?>
						</div>
						<div class="product-img">
							<img src="<?php Autoload::URL('imgs/products/'.$item->picture) ?>" alt="<?php echo $item->name ?>">
						</div>
						<div class="product-inf text-center">
							<h2><?php Autoload::Compact($item->name, 45) ?></h2>
						</div>
						<div class="product-view">
							<a href="<?php echo $url.'product/detail/'.$item->alias.'/'.$item->id ?>">Xem chi tiết</a>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<!-- End Slide Sale -->

	<!-- Product -->
	<div class="row title text-center">
		<h3>Sản phẩm <span class="myColor">NỔI BẬT</span>	</h3>
	</div>
	<div class="row">
		<?php foreach ($data as $item) { ?>
		<div class="col-md-3 col-sm-4 col-smler-6 col-xs-12 mg-top-20">
			<div class="product-box prod-animate">
				<div class="product-sale">
					<?php if ($item->sale != 0): ?>
						<span>-<?php echo $item->sale ?>%</span>
					<?php endif ?>
				</div>
				<div class="product-img">
					<img src="<?php Autoload::URL('imgs/products/'.$item->picture) ?>" alt="<?php echo $item->name ?>">
				</div>
				<div class="product-inf text-center">
					<h2><a href="<?php echo $url.'product/detail/'.$item->alias.'/'.$item->id ?>" title="<?php echo $item->name ?>"><?php Autoload::Compact($item->name, 45) ?></a></h2>
					<p>Giá: <?php echo number_format($item->real_price)." ".$item->currency ?></p>
					<?php if ($item->sale != 0): ?>
						<p><del><?php echo number_format($item->price)." ".$item->currency ?></del></p>
					<?php else: ?>
						<p><del>&nbsp;</del></p>
					<?php endif ?>
				</div>
				<div class="product-view">
					<a href="<?php echo $url.'product/detail/'.$item->alias.'/'.$item->id ?>">Xem chi tiết</a>
					<button type="button" class="add" id="<?php echo $item->id ?>">Thêm vào giỏ hàng</button>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<!-- End Product -->
</div>
<!-- End Content -->
<script type="text/javascript" src="<?php Autoload::URL('js/ajaxCart.js') ?>"></script>