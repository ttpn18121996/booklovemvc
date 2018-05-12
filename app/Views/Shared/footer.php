<footer class="container-fluid mg-top-20">
	<div class="footer container">
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<h3>Thông tin liên hệ</h3>
				<ul>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php Autoload::Info('email') ?></li>
					<li><i class="fa fa-mobile" aria-hidden="true"></i> <?php Autoload::Info('phone') ?></li>
					<li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php Autoload::Info('address') ?></li>
				</ul>
				<ul class="social mg-top-20">
					<li><a href="<?php Autoload::Info('facebook') ?>" title="Facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="<?php Autoload::Info('twitter') ?>" title="Twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="<?php Autoload::Info('google_plus') ?>" title="Google+" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					<li><a href="<?php Autoload::Info('youtube') ?>" title="Youtube" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="col-md-2 col-sm-6">
				<h3>Danh mục</h3>
				<ul>
					<li><a href="">Trang chủ</a></li>
					<li><a href="">Giới thiệu</a></li>
					<li><a href="">Thể loại</a></li>
					<li><a href="">Tác giả</a></li>
					<li><a href="">NXB</a></li>
					<li><a href="">Liên hệ</a></li>
				</ul>
			</div>
			<div class="col-md-6 col-xs-12">
				<h3>Đăng ký nhận tin</h3>
				<form action="<?php Autoload::URL('home/contact/dang-ki-nhan-tin') ?>" method="post" class="form-horizontal">
					<div class="form-group">
						<div class="col-sm-10">
							<input type="email" name="email" class="form-control" required="required" placeholder="Nhập email">
						</div>
						<div class="col-sm-2">
							<button type="submit" name="submit" class="btn btn-warning btn-block"><i class="fa fa-paper-plane" aria-hidden="true"></i> Gửi</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="copyright text-center mg-top-20">
		&copy; 2018 LoveBook. All rights reserved | Design by Trịnh Trần Phương Nam
	</div>
</footer>