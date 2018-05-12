<div class="menu" id="menu">
	<div class="container">
		<div class="menu-left">
			<div class="sideTrigger"><span><i class="fa fa-bars"></i></span></div>
			<div class="navigation">
				<div class="container-fluid">
					<div class="menu-nav">
						<ul>
							<li <?php  if (($_GET['c'] == "" || $_GET['c'] == "home") && ($_GET['a'] == "" || $_GET['a'] == "index")) echo 'class="active"'; ?>><a href="<?php Autoload::URL('home/index') ?>">Trang chủ</a></li>
							<li <?php  if ($_GET['c'] == "home" && $_GET['a'] == "about") echo 'class="active"'; ?>><a href="<?php Autoload::URL('home/about') ?>">Giới thiệu</a></li>
							<li <?php  if ($_GET['c'] == "product" && $_GET['a'] == "category") echo 'class="active"'; ?>>
								<a href="<?php Autoload::URL('product/category') ?>">Thể loại</a>
								<ul>
									<?php foreach ($cat as $item): ?>
										<li><a href="<?php Autoload::URL('product/category/'.$item->alias) ?>"><?php echo $item->name ?></a></li>
									<?php endforeach ?>
								</ul>
							</li>
							<li <?php  if ($_GET['c'] == "product" && $_GET['a'] == "author") echo 'class="active"'; ?>>
								<a href="<?php Autoload::URL('product/author') ?>">Tác giả</a>
								<ul>
									<?php foreach ($aut as $item): ?>
										<li><a href="<?php Autoload::URL('product/author/'.$item->alias) ?>"><?php echo $item->name ?></a></li>
									<?php endforeach ?>
								</ul>
							</li>
							<li <?php  if ($_GET['c'] == "product" && $_GET['a'] == "producer") echo 'class="active"'; ?>>
								<a href="<?php Autoload::URL('product/producer') ?>">NXB</a>
								<ul>
									<?php foreach ($producer as $item): ?>
										<li><a href="<?php Autoload::URL('product/producer/'.$item->alias) ?>"><?php echo $item->name ?></a></li>
									<?php endforeach ?>
								</ul>
							</li>
							<li <?php  if ($_GET['c'] == "home" && $_GET['a'] == "contact") echo 'class="active"'; ?>><a href="<?php Autoload::URL('home/contact') ?>">Liên hệ</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="menu-right">
			<div class="cart-box">
				<a href="<?php Autoload::URL("cart") ?>" title="Giỏ hàng">
					<?php if (isset($_SESSION['cart'])): ?>
						<h3>
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							<?php echo number_format(Cart::TotalBill()) ?> VNĐ
						</h3>
						<p>Có <?php echo $total ?> sản phẩm</p>
					<?php else: ?>
						<h3>
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							0 VNĐ
						</h3>
						<p>Có 0 sản phẩm</p>
					<?php endif ?>
				</a>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>