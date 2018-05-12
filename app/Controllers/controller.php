<?php 
class Controller
{
    public function __construct()
    {
    	
    }

	// Đổ dữ liệu ra view
	public function view($viewname = null, $data = null, $uselayout = "")
	{

		global $app_path,$contr_path,$view_path,$model_path;
		$controller_name = mb_convert_case(str_replace("Controller", "", get_class($this)), MB_CASE_TITLE);
		Autoload::SetRenderBody($viewname, $data, $controller_name, $uselayout);
		if ($uselayout == "client") {
			require("$app_path/$view_path/Shared/master.php");
			
		} elseif ($uselayout == "admin") {
			require("$app_path/$view_path/Shared/masterAdmin.php");
			
		} else {
			if (strpos("-client", $viewname)) {
				$viewname = str_replace("-client", "", $viewname);
				require("$app_path/$view_path/Client/$controller_name/".$viewname.".php");
			} else {
				$controller_name = str_replace("Admin", "", $controller_name);
				if ($controller_name == "") {
					$controller_name = "Home";	
				}
				
				require("$app_path/$view_path/Admin/$controller_name/".$viewname.".php");
			}
			
		}
	}
}
