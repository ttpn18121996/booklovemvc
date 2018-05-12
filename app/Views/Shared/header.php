<header class="container-fluid">
	<div class="container" id="header">
		<ul class="top-info">
			<li>
				<ul class="social">
					<li><a href="<?php Autoload::Info('facebook') ?>" title="Facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="<?php Autoload::Info('twitter') ?>" title="Twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="<?php Autoload::Info('google_plus') ?>" title="Google+" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					<li><a href="<?php Autoload::Info('youtube') ?>" title="Youtube" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
				</ul>
			</li>
			<li>
				<ul class="sign">
				<?php if (isset($_SESSION['userclient'])): ?>
					<li><a href="<?php Autoload::URL('user') ?>" title="Thông tin tài khoản"><i class="fa fa-user" aria-hidden="true"></i> Tài khoản</a></li>
					<li><a href="<?php Autoload::URL('user/signout') ?>" title="Đăng xuất"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a></li>
				<?php else: ?>
					<li><a title="Đăng nhập" data-toggle="modal" data-target="#modal-signin"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a></li>
					<li><a title="Tạo tài khoản" data-toggle="modal" data-target="#modal-signup"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tạo tài khoản</a></li>
				<?php endif ?>
					
				</ul>
			</li>
		</ul>
	</div>
</header>
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 col-sm-4 header-left">
			<h1>
				<a href="<?php Autoload::URL('home/index') ?>" title="Trang chủ"><img src="<?php Autoload::URL('imgs/'.Autoload::Info('logo', 'return')) ?>" alt="<?php Autoload::Info('name') ?>"></a>
			</h1>
		</div>
		<div class="col-md-6 col-sm-8 header-mid">
			<form action="<?php Autoload::URL('product/search') ?>" method="POST" class="">
				<div class="search-txt">
					<input type="search" name="keyword" placeholder="Tìm kiếm sản phẩm theo ...">
				</div>
				<div class="search-cbo">
					<select name="cate">
						<option value="0">Tất cả</option>
						<option value="san-pham">Thể loại</option>
						<option value="tac-gia">Tác giả</option>
						<option value="nxb">Nhà xuất bản</option>
					</select>
				</div>
				<div class="search-btn">
					<button type="submit" name="submit_search" class="myBackground"><abbr title="Tìm kiếm"><i class="fa fa-search" aria-hidden="true"></i></abbr></button>
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="col-md-3 col-sm-12 header-right">
			<ul>
				<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php Autoload::Info('email') ?></li>
				<li><i class="fa fa-mobile" aria-hidden="true"></i> <?php Autoload::Info('phone') ?></li>
				<li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php Autoload::Info('address') ?></li>
			</ul>
		</div>
	</div>
</div>
<?php include 'app/Views/Client/User/signin.php'; ?>
<?php include 'app/Views/Client/User/signup.php'; ?>