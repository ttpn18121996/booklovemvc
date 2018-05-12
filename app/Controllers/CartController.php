<?php 
class CartController extends Controller
{
	private $data = null;
	private $billModel;
	private $billdetailModel;
	private $productModel;
	public function __construct()
	{
		parent::__construct();
		require("app/Models/Bill.php");
		require("app/Models/Billdetail.php");
		require("app/Models/Product.php");
		$this->billModel = new Bill();
		$this->billdetailModel = new Billdetail();
		$this->productModel = new Product();
	}

	public function index()
	{
		if (isset($_SESSION['cart'])) {
			$this->view("index", $this->data, "client");
		} else {
			header("Location: ".Autoload::URL("", "return"));
			exit();
		}
	}

	// Hàm thêm sản phẩm vào giỏ hàng
	public function add()
	{
		if (isset($_POST['id'])) {
			$id_product = $_POST['id'];
			$rs = $this->productModel->select("id, name, alias, picture, real_price, price, sale, currency")->where("id", $id_product)->getArray();
			//echo "<pre>"; var_dump($rs); echo "</pre>";
			echo json_encode(Cart::Add($rs));
		}
	}

	// Hàm xoá 1 sản phẩm trong giỏ hàng
	public function deleteItem()
	{
		if (isset($_POST['id'])) {
	        Cart::Remove($_POST['id']);
	        $array = array('total' => count($_SESSION['cart']), 'totalBill' => number_format(Cart::TotalBill()));
	        echo json_encode($array);
		}
	}

	// Hàm xoá tất cả sản phẩm trong giỏ hàng
	public function deleteAll()
	{
		$_SESSION['cart'] = null;
		header("Location: ".Autoload::URL("", "return"));
		exit();
	}

	// Hàm cập nhật số lượng giỏ hàng
	public function update()
	{
		if (isset($_POST['id']) && isset($_POST['qty'])) {
			Cart::Update($_POST['id'], $_POST['qty']);
			//Cart::Update("21", "2");
			$price = 0;
			$count = count($_SESSION['cart']);
			for ($i=0; $i < $count; $i++) { 
				if (empty($_SESSION['cart'][$i])) {
					$count++;
					continue;
				}
				if ($_POST['id'] == $_SESSION['cart'][$i]['id']) {
					$price = $_SESSION['cart'][$i]['quantity'] * $_SESSION['cart'][$i]['real_price'];
					break;
				}
			}
			$array = array('total' => count($_SESSION['cart']), 'totalBill' => number_format(Cart::TotalBill()), 'price' => number_format($price));
			// echo "<pre>";
			// var_dump($array);
			// echo "</pre>";
			echo json_encode($array);
		}
	}

	public function getPay()
	{
		if (isset($_SESSION['cart'])) {
			$this->view("pay", $this->data,"client");
		} else {
			header("Location: ".Autoload::URL("404.html", "return"));
			exit();
		}
	}

	public function postPay()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'full_name' => $_POST['full_name'],
				'email' => $_POST['email'],
				'phone' => $_POST['phone'],
				'address' => $_POST['address'],
				'status' => '0',
				'payments' => 'giao hàng thanh toán',
				'total' => Cart::TotalBill(),
				'note' => $_POST['note'],
				'created' => date("Y-m-d"),
				'updated' => date("Y-m-d")
			);
			$this->billModel->add($data);
			$getMax = $this->billModel->getMaxId();
			$idmax = $getMax->id_max;
			foreach ($_SESSION['cart'] as $key => $value) {
				$data1 = array(
					'id_bill' => $idmax,
					'id_product' => $value['id'],
					'quantity' => $value['quantity'],
					'total' => ($value['quantity']*$value['real_price'])
				);
				$this->billdetailModel->add($data1);
			}
			$_SESSION['cart'] = null;
			header("Location: ".Autoload::URL("200.html", "return"));
			exit();
		}
	}
}
