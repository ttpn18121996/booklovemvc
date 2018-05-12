<?php 
    if (empty($_SESSION['useradmin'])) {
        header("Location: ".Autoload::URL("admin/admin/getLogin", "return"));
        exit;
    }
    
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
	<link rel="shortcut icon" type="image/png" href="<?php Autoload::URL('imgs/favicon.png') ?>"/>
	<title>Quản lý hệ thống!</title>
	
	<!-- Bootstrap -->
    <link rel="stylesheet" href="<?php Autoload::URL('css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php Autoload::URL('css/font-awesome.min.css') ?>">
    <!-- NProgress -->
    <link href="<?php Autoload::URL('css/admin/nprogress.css') ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php Autoload::URL('css/admin/custom.min.css') ?>" rel="stylesheet">

	<!-- jQuery -->
    <script type="text/javascript" src="<?php Autoload::URL('js/admin/jquery.min.js') ?>"></script>
    <!-- CKEDITER -->
    <script type="text/javascript" src="<?php Autoload::URL('js/ckeditor/ckeditor.js') ?>"></script>
    
    <style type="text/css">
		label[class="error"]{
			font-size: 12px;
			color: #da3838;
		}
		.delete{
			cursor: pointer;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.editor').each(function() {
				$id=$(this).attr("id");
				var editor = CKEDITOR.replace(''+$id, {
                    language: 'vi',
                    filebrowserBrowseUrl :'../../js/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl : '../../js/ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl : '../../js/ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl : '../../js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl : '../../js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl : '../../js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                });
			});
		});
	</script>
</head>
<body class="nav-md">
	<div class="container body">
    	<div class="main_container">
            <!-- header content -->
            <?php include 'headerAdmin.php'; ?>
            <!-- /header content -->

            <!-- menu content -->
            <?php include 'leftAdmin.php'; ?>
            <!-- /menu content -->

        	<!-- page content -->
        	<div class="right_col" role="main">
          
          		<?php Autoload::Renderbody() ?>

        	</div>
        	<!-- /page content -->

        	<!-- footer content -->
        	<footer>
          		<div class="pull-right">
            		Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          		</div>
          		<div class="clearfix"></div>
        	</footer>
        	<!-- /footer content -->
      	</div>
    </div>
    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php Autoload::URL('js/bootstrap.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?php Autoload::URL('js/admin/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?php Autoload::URL('js/admin/nprogress.js') ?>"></script>
    
    <!-- DateJS -->
    <script src="<?php Autoload::URL('js/admin/date.js') ?>"></script>
    

    <!-- Custom Theme Scripts -->
    <script src="<?php Autoload::URL('js/admin/custom.min.js') ?>"></script>

    <!-- Validate -->
	<script type="text/javascript" src="<?php Autoload::URL('js/jquery.validate.min.js') ?>"></script>
	<script type="text/javascript" src="<?php Autoload::URL('js/messages_vi.js') ?>"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#frmReq").validate();
		});
	</script>
</body>
</html>