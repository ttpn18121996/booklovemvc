<?php 
class AdminBillController extends Controller
{
	private $data = null;
	private $billModel;
	private $billdetailModel;
	private $numb = 10;
	public function __construct()
	{
		parent::__construct();
		require "app/Models/Bill.php";
		require "app/Models/Billdetail.php";
		$this->billModel = new Bill();
		$this->billdetailModel = new Billdetail();
	}

	public function index()
	{
		$rs = $this->billModel->getBill($this->numb);
		$this->data = array('data' => $rs);
		$this->view("index", $this->data, "admin");
	}

	public function detail()
	{
		if (isset($_GET['alias'])) {
			$rs = $this->billModel->getBillById($_GET['alias']);
			$bill_detail = $this->billdetailModel->getBillDetailByIdBill($_GET['alias']);
			$this->data = array(
				'data' => $rs,
				'bill_detail' => $bill_detail
			);
			$this->view("detail", $this->data, "admin");
		}
	}

	public function print()
	{
		if (isset($_GET['alias'])) {
			$rs = $this->billModel->getBillById($_GET['alias']);
			$bill_detail = $this->billdetailModel->getBillDetailByIdBill($_GET['alias']);
			$this->data = array(
				'data' => $rs,
				'bill_detail' => $bill_detail
			);
			$this->view("print", $this->data, "admin");
		}
	}

	public function delete()
	{
		if (isset($_POST['id'])) {
			$this->billdetailModel->where('id_bill', $_POST['id'])->delete();
			$this->billModel->where('id', $_POST['id'])->delete();
			echo 'ok';
		}
	}

	public function updatestt()
	{
		if (isset($_POST['id'])) {
			$rs = $this->billModel->select("status")->where("id", $_POST['id'])->getFirst();
			if ($rs->status == 0) {
				$data = array('status' => 1);
			} else {
				$data = array('status' => 0);
			}
			$this->billModel->where("id", $_POST['id'])->update($data);
			$rs = $this->billModel->select("status")->where("id", $_POST['id'])->getFirst();
			echo $rs->status;
		}
	}
}
