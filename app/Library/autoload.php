<?php 
class Autoload
{
	private static $body;
	private static $viewname;
	private static $data;
	private static $controller_name;
	private static $categorypage;

	public static function SetRenderBody($viewname , $data = null, $controller_name, $categorypage)
	{
		self::$viewname = $viewname;
		self::$data = $data;
		self::$controller_name = $controller_name;
		self::$categorypage = $categorypage;
	}

	public static function Renderbody()
	{
		global $app_path, $contr_path, $view_path, $model_path, $url;
		$viewname = self::$viewname;
		$data = self::$data;
		$controller_name = self::$controller_name;
		$categorypage = self::$categorypage;
		if($data != null)
		{
			foreach ($data as $key => $value) {
				$$key = $value;
			}
		}

		if ($viewname != null) {
			
			if($categorypage == "client") {
				if (file_exists("$app_path/$view_path/Client/$controller_name/".strtolower($viewname).".php")) {
					require "$app_path/$view_path/Client/$controller_name/".strtolower($viewname).".php";
				} else {
					echo '<script>window.location="'.self::URL('404.html', 'return').'"</script>';
				}
			} elseif ($categorypage == "admin") {
				if ($controller_name == "Admin") {
					$controller_name = str_replace("Admin", "Home", $controller_name);
				} else {
					$controller_name = mb_convert_case(str_replace("Admin", "", $controller_name), MB_CASE_TITLE);
				}
				
				if (file_exists("$app_path/$view_path/Admin/$controller_name/".strtolower($viewname).".php")) {
					require "$app_path/$view_path/Admin/$controller_name/".strtolower($viewname).".php";
				} else {
					echo '<script>window.location="'.self::URL("404.html", "return").'"</script>';
				}
			} else {
				echo '<script>window.location="'.self::URL("404.html", "return").'"</script>';
			}
		}
	}

	public static function Compact($str, $numb = 300)
	{
		if (strlen($str) <= $numb ) {
			echo $str;
		} else {
			$substr = substr($str, 0, $numb)."...";
			echo $substr;
		}
		
	}

	public static function URL($link = "", $print = 'echo')
	{
		global $url;
		if ($print != 'echo') {
			return $url.$link;
		} else {
			echo $url.$link;
		}
	}

	public static function Info($col, $print = 'echo')
	{
		global $app_path, $contr_path, $view_path, $model_path;
		include_once "$app_path/$model_path/Information.php";
		$inf = new Information();
		//Lấy thông tin website
		$info = $inf->get();
		if ($print != 'echo') {
			return $info[0]->$col;
		} else {
			echo $info[0]->$col;
		}
	}

	public static function SetPaging($body)
	{
		self::$body = $body;
	}

	public static function Paging()
	{
		echo self::$body;
	}
}
