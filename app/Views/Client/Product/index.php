<div class="container">
	<div class="row">
		<?php include 'app/Views/Shared/left.php' ?>
		<div class="col-md-9">
			<div class="row title text-center">
				<h3>Sản phẩm</h3>
			</div>
			<div class="row mg-top-20">
				<?php if ($data != null){ ?>
					<?php foreach ($data as $item) { ?>
					<div class="col-md-4 col-sm-4 col-smler-6 col-xs-12 mg-top-20">
						<div class="product-box prod-animate">
							<div class="product-sale">
								<?php if ($item->sale != 0): ?>
									<span>-<?php echo $item->sale ?>%</span>
								<?php endif ?>
							</div>
							<div class="product-img">
								<img src="<?php Autoload::URL('imgs/products/'.$item->picture) ?>" alt="Thám Tử Lừng Danh Conan - Tuyển Tập Đặc Biệt: Những Câu Chuyện Lãng Mạn - Tập 1">
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
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php Autoload::Paging() ?>
<script type="text/javascript" src="<?php Autoload::URL('js/ajaxCart.js') ?>"></script>