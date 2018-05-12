<?php 
class Online extends Model
{

	// Hàm khởi tạo
	public function __construct()
	{
		parent::__construct();
		$this->table = "tb_online";
	}

	/*
	* Hàm lấy danh sách thông tin truy cập
	* $numb là số record trong 1 trang
	*/
	public function getList($numb = 4)
	{
		$rs = $this->orderBy('id desc')->paginate($this->positionPage($numb), $numb);
		return $rs;
	}
}
 ?>