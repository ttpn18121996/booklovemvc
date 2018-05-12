<?php 
class Category extends Model
{
	
	// Hàm khởi tạo
	public function __construct()
	{
		parent::__construct();
		$this->table = "tb_category";
	}

	/*
	* Lấy danh sách thể loại theo module và chia trang
	* $module là tên module cần lấy
	* $numb là số record 1 trang
	*/
	public function getCategoryByModule($module = null, $numb = 4)
	{
		$rs = $this->where("module", $module)->orderBy("id desc")->paginate($this->positionPage($numb), $numb);
		return $rs;
	}
}
 ?>