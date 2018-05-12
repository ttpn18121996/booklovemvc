<?php 
class Bill extends Model
{
	
	// Hàm khởi tạo
	public function __construct()
	{
		parent::__construct();
		$this->table = "tb_bill";
	}

	/*
	* Lấy danh sách đơn hàng và chia trang
	* $numb là số sản phẩm 1 trang
	*/
	public function getBill($numb = 4)
	{
		$rs = $this->select("id, full_name, email, phone, address, total, created")->paginate($this->positionPage($numb), $numb);
		return $rs;
	}

	/*
	* Lấy thông tin đơn hàng
	* $id là id đơn hàng cần lấy
	*/
	public function getBillById($id)
	{
		$rs = $this->where("id", $id)->getFirst();
		return $rs;
	}

	/*
	* Lấy id cao nhất của đơn hàng
	*/
	public function getMaxId()
	{
		$rs = $this->select("MAX(id) as id_max")->getFirst();
		return $rs;
	}
}
 ?>