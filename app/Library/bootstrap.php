<?php
require_once 'app/Library/config.php';
require_once 'app/Library/autoload.php';
require_once 'app/Library/cart.php';
require_once 'app/Library/functions.php';
require_once 'app/Controllers/controller.php';
require_once 'app/Models/model.php';
require_once 'app/Database/database.php';

class Bootstrap
{
	
	public function __construct()
	{
		//Chạy sesssion
		session_start();
		global $app_path, $contr_path, $view_path, $model_path, $url;
		//Tạo biến bỏ fix cứng
		$this->app_path = $app_path;
		$this->contr_path = $contr_path;
		$this->view_path = $view_path;
		$this->model_path = $model_path;
		
	}

	//Load masterlayout
	public function Init()
	{
		//Kiểm tra dữ liệu gửi qua. Nếu không có thì mặc định là home
		$controller = isset($_GET["c"]) ? mb_convert_case($_GET["c"], MB_CASE_TITLE)."Controller" : "HomeController";

		if (strpos($controller, "Admin") !== false) {
			$controller = str_replace("Admin", "", $controller);
			if ($controller == "Controller") {
				$controller = "AdminController";
			} else {
				$controller = str_replace("Controller", "", $controller);
				$controller = "Admin".mb_convert_case($controller, MB_CASE_TITLE)."Controller";
			}
		}

		//Nếu file yêu cầu không tồn tại thì đẩy tới trang lỗi
		if(!file_exists("$this->app_path/$this->contr_path/$controller.php")) {
			header("Location: 404.html");
			exit();
		}
		//Nếu không có lỗi nào trong quá trình kiểm tra thì gọi file controller đó lên
		require "$this->app_path/$this->contr_path/$controller.php";

		//Sau khi gọi controller lên tiếp tục kiểm tra class
		if(!class_exists($controller)) {
			header('Location: 404.html');
			exit();
		}
		//Tạo đối tượng
		$c = new $controller;
		$action = isset($_GET["a"]) ? $_GET["a"] : "index";
		if(!method_exists($controller, $action)) {
			header("Location: 404.html");
			exit();
		}
		$c->$action();

	}
}
