<?php 
	include_once "$app_path/$model_path/Category.php";
	include "$app_path/$model_path/Online.php";
	//Kiểm tra online và lưu thông tin online
	if (!isset($_SESSION['online'])) {
		$_SESSION['online'] = time().mt_rand();
		$onlModel = new Online();
		$dt = array(
			'id_online' => $_SESSION['online'],
			'time' => time(),
			'ip' => $_SERVER['REMOTE_ADDR'],
			'name' => gethostbyaddr($_SERVER['REMOTE_ADDR'])
		);
		$onlModel->add($dt);
	}
 ?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="<?php Autoload::Info('keyword')?>"/>
	<meta name="description" content="<?php Autoload::Info('description') ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="shortcut icon" type="image/png" href="<?php Autoload::URL('imgs/'.Autoload::Info('favicon', 'return')) ?>"/>
	<title>Lovebook | Trang </title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php Autoload::URL('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php Autoload::URL('css/bootstrap-theme.min.css') ?>">
	<!-- Font awesome -->
	<link rel="stylesheet" type="text/css" href="<?php Autoload::URL('css/font-awesome.min.css') ?>">
	<!-- Owl -->
	<link rel="stylesheet" href="<?php Autoload::URL('css/owl.carousel.css') ?>">
	<link rel="stylesheet" href="<?php Autoload::URL('css/owl.theme.default.css') ?>">

	<!-- Custom -->
	<link rel="stylesheet" href="<?php Autoload::URL('css/myCss.css') ?>">

	<!-- Jquery -->
	<script type="text/javascript" src="<?php Autoload::URL('js/jquery-3.2.1.min.js') ?>"></script>

	<style>
		label[class="error"]{color: #ff5555; font-weight: normal;}
	</style>
</head>
<body>
	<div style="display: none;" id="rooturl" url="<?php Autoload::URL(); ?>"></div>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<!-- Side Menu -->
	<?php include 'menu-mobile.php'; ?>
	<!-- End Side Menu -->
	<div class="sideWrapper">
		<!-- Header -->
		<?php include 'header.php'; ?>
		<!-- End Header -->

		<!-- Menu - Navigation -->
		<?php include 'menu.php'; ?>
		<!-- End Menu - Navigation -->

		<!-- Body -->
		<div class="container-fluid" id="body">
		<?php Autoload::Renderbody() ?>
		</div>
		<!-- End Body -->

		<!-- Footer -->
		<?php include 'footer.php'; ?>
		<!-- End Footer -->

		<!-- Modal Cart -->
		<?php include 'modal.php'; ?>
		<!-- End Modal Cart -->
	</div>
	<!-- Back to top -->
	<div class="scrolltop">
		<i class="fa fa-chevron-up" aria-hidden="true"></i>
	</div>
	<!-- End Back to top -->
	<!-- Bootstrap -->
	<script type="text/javascript" src="<?php Autoload::URL('js/bootstrap.min.js') ?>"></script>
	<!-- Owl -->
	<script type="text/javascript" src="<?php Autoload::URL('js/owl.carousel.min.js') ?>"></script>
	<!-- Validate -->
	<script type="text/javascript" src="<?php Autoload::URL('js/jquery.validate.min.js') ?>"></script>
	<script type="text/javascript" src="<?php Autoload::URL('js/messages_vi.js') ?>"></script>
	<!-- Custom -->
	<script type="text/javascript" src="<?php Autoload::URL('js/myJS.js') ?>"></script>
</body>
</html>