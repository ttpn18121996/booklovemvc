<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="<?php Autoload::URL('imgs/favicon.png') ?>"/>
	<title>Đăng nhập hệ thống</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php Autoload::URL('css/bootstrap.min.css') ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="<?php Autoload::URL('css/font-awesome.min.css') ?>">
	<!-- NProgress -->
	<link href="<?php Autoload::URL('css/admin/nprogress.css') ?>" rel="stylesheet">
	<!-- iCheck -->
	<link href="<?php Autoload::URL('css/admin/iCheck/blue.css') ?>" rel="stylesheet">
	<!-- Animate.css -->
	<link href="<?php Autoload::URL('css/admin/animate.min.css') ?>" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="<?php Autoload::URL('css/admin/custom.min.css') ?>" rel="stylesheet">

	<style type="text/css">
		label[class="error"]{
			font-size: 12px;
			color: #da3838;
		}
	</style>
</head>
<body class="login">
	<div>
		<a class="hiddenanchor" id="signin"></a>

		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form method="post" action="<?php Autoload::URL('admin/admin/postLogin') ?>" id="frmLogin">
						<h1>Truy cập hệ thống</h1>
						<div>
							<input type="text" name="username" class="form-control required" placeholder="Tài khoản" />
						</div>
						<div>
							<input type="password" name="password" class="form-control required" placeholder="Mật khẩu" />
						</div>
						<div>
							<button type="submit" class="btn btn-default submit" name="submit"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</button>
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							<div class="clearfix"></div>
							<br />

							<div>
								<h1><i class="fa fa-cog" aria-hidden="true"></i> Quản lý hệ thống!</h1>
								<p>&copy;2017 All Rights Reserved.</p>
							</div>
						</div>
			</form>
		  </section>
		</div>
	  </div>
	</div>
	<!-- jQuery -->
	<script type="text/javascript" src="<?php Autoload::URL('js/admin/jquery.min.js') ?>"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="<?php Autoload::URL('js/bootstrap.min.js') ?>"></script>
	<!-- FastClick -->
	<script src="<?php Autoload::URL('js/admin/fastclick.js') ?>"></script>
	<!-- NProgress -->
	<script src="<?php Autoload::URL('js/admin/nprogress.js') ?>"></script>

	<!-- Custom Theme Scripts -->
	<script src="<?php Autoload::URL('js/admin/custom.min.js') ?>"></script>

	<!-- Validate -->
	<script type="text/javascript" src="<?php Autoload::URL('js/jquery.validate.min.js') ?>"></script>
	<script type="text/javascript" src="<?php Autoload::URL('js/messages_vi.js') ?>"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			//Validate login
			$("#frmLogin").validate();
		});
	</script>
</body>
</html>