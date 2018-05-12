<div class="container">
	<div class="row">
		<?php include 'app/Views/Shared/left.php' ?>
		<div class="col-md-9">
			<div class="row title text-center">
				<h3>Chi tiết sản phẩm</h3>
			</div>
			<div class="row mg-top-20">
				<div class="col-sm-6 text-center">
					<img src="<?php Autoload::URL('imgs/products/'.$data->picture) ?>" alt="<?php echo $data->alias ?>" width="100%">
				</div>
				<div class="col-sm-6 detail-info">
					<h2><?php echo $data->name ?></h2>
					<h3>Thể loại: <?php echo $data->cate ?></h3>
					<h3>Tác giả: <?php echo $data->author ?></h3>
					<h3>Nhà xuất bản: <?php echo $data->producer ?></h3>
					<h3>Giá: <?php echo number_format($data->price)." ".$data->currency ?></h3>
					<h3>Giảm giá: <?php echo $data->sale ?>%</h3>
					<h3>Giá hiện tại: <?php echo number_format($data->real_price)." ".$data->currency ?></h3>
					<button type="button" class="add btn btn-warning" id="<?php echo $data->id ?>">Thêm vào giỏ hàng</button>
					<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
					<g:plusone></g:plusone>
				</div>
			</div>
			<div class="row title text-center">
				<h3>Giới thiệu</h3>
			</div>
			<div class="row mg-top-20">
				<div class="col-xs-12">
					<?php echo $data->content ?>
				</div>
			</div>
			<div class="row title text-center">
				<h3>Sản phẩm liên quan</h3>
			</div>
			<div class="row">
				<div class="owl-carousel owl-theme" id="related">
					<?php foreach ($data1 as $item) { ?>
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
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php Autoload::URL('js/ajaxCart.js') ?>"></script>