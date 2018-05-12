<?php 
class Billdetail extends Model
{
	
	// Hàm khởi tạo
	public function __construct()
	{
		parent::__construct();
		$this->table = "tb_billdetail";
	}

	/*
	* Lấy danh sách chi tiết đơn hàng theo id đơn hàng
	* $id là id đơn hàng cần lấy
	*/
	public function getBillDetailByIdBill($id)
	{
		$rs = $this->select("tb_billdetail.*, tb_product.name as name_product, tb_product.picture, tb_product.real_price")->join("tb_product", "tb_billdetail.id_product", "=", "tb_product.id")->where("id_bill", $_GET['alias'])->get();
		return $rs;
	}
}
 ?>