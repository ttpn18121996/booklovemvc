<?php 
class Picture extends Model
{
	
	// Hàm khởi tạo
	public function __construct()
	{
		parent::__construct();
		$this->table = "tb_picture";
	}
}
 ?>