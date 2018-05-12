<?php 
class AdminProductController extends Controller
{
	private $data = null;
	private $productModel;
	
	public function __construct()
	{
		parent::__construct();
		require("app/Models/Product.php");
		require("app/Models/Category.php");
		$this->productModel = new Product();
		$this->categoryModel = new Category();
	}

	public function index()
	{
		$numb = 10;
		$cat = $this->categoryModel->where("status", "1")->where("module", "san-pham")->where("level", "1")->get();
		$aut = $this->categoryModel->where("status", "1")->where("module", "tac-gia")->where("level", "1")->get();
		$prc = $this->categoryModel->where("status", "1")->where("module", "nxb")->where("level", "1")->get();
		if (isset($_GET['param'])) {
			if ($_GET['alias'] == 'san-pham') {
				$rs = $this->productModel->where("category_id1", $_GET['param'])->orderBy("id desc")->paginate($this->productModel->positionPage($numb), $numb);
			} elseif ($_GET['alias'] == 'tac-gia') {
				$rs = $this->productModel->where("category_id2", $_GET['param'])->orderBy("id desc")->paginate($this->productModel->positionPage($numb), $numb);
			} elseif ($_GET['alias'] == 'nxb') {
				$rs = $this->productModel->where("category_id3", $_GET['param'])->orderBy("id desc")->paginate($this->productModel->positionPage($numb), $numb);
			} else {
				$rs = null;
			}
		} else {
			//Chia trang
			$rs = $this->productModel->orderBy("id desc")->paginate($this->productModel->positionPage($numb), $numb);
		}
		$this->data = array(
			'data' => $rs,
			'cat' => $cat,
			'aut' => $aut,
			'prc' => $prc
		);
		$this->view('index', $this->data, 'admin');
	}

	public function getAdd()
	{
		$cat = $this->categoryModel->where("status", "1")->where("module", "san-pham")->where("level", "1")->get();
		$aut = $this->categoryModel->where("status", "1")->where("module", "tac-gia")->where("level", "1")->get();
		$prc = $this->categoryModel->where("status", "1")->where("module", "nxb")->where("level", "1")->get();
		$this->data = array(
			'cat' => $cat,
			'aut' => $aut,
			'prc' => $prc
		);
		$this->view('edit', $this->data, 'admin');
	}

	public function postAdd()
	{
		$arr_cur = array('VNĐ', 'USD', 'EUR', 'AUD', 'JPY');
		if (isset($_POST['submit'])) {
			$currency = $arr_cur[$_POST['currency']];
			$author = $this->categoryModel->select("name")->where("id", $_POST['category_id2'])->where("module", "tac-gia")->getArray();
			$producer = $this->categoryModel->select("name")->where("id", $_POST['category_id3'])->where("module", "nxb")->getArray();
			$data = array(
				'name' => $_POST['name'],
				'alias' => alias($_POST['name']),
				'category_id1' => $_POST['category_id1'],
				'category_id2' => $_POST['category_id2'],
				'category_id3' => $_POST['category_id3'],
				'author' => $author[0]['name'],
				'producer' => $producer[0]['name'],
				'price' => $_POST['price'],
				'sale' => $_POST['sale'],
				'real_price' => $_POST['real_price'],
				'currency' => $currency,
				'description' => addslashes($_POST['description']),
				'content' => addslashes($_POST['content']),
				'hot_1' => $_POST['hot_1'],
				'hot_2' => $_POST['hot_2'],
				'hot_3' => $_POST['hot_3'],
				'status' => $_POST['status'],
				'created' => date("Y-m-d"),
				'updated' => date("Y-m-d")
			);
			if($picture = uploadImg("picture", "imgs/products/")) {
				$data += ['picture' => $picture];
			}
			$this->productModel->add($data);
			echo '<script>alert("Thêm thành công!");</script>';
			echo '<script>window.location="'.Autoload::URL("admin/adminproduct", "return").'"</script>';
		}
	}

	public function getUpdate()
	{
		if (isset($_GET['param'])) {
			$rs = $this->productModel->where("id", $_GET['param'])->where("alias", $_GET['alias'])->get();
			$cat = $this->categoryModel->where("status", "1")->where("module", "san-pham")->where("level", "1")->get();
			$aut = $this->categoryModel->where("status", "1")->where("module", "tac-gia")->where("level", "1")->get();
			$prc = $this->categoryModel->where("status", "1")->where("module", "nxb")->where("level", "1")->get();

			$this->data = array(
				'data' => $rs,
				'cat' => $cat,
				'aut' => $aut,
				'prc' => $prc
			);
			$this->view('edit', $this->data, 'admin');
		}
	}

	public function postUpdate()
	{
		$arr_cur = array('VNĐ', 'USD', 'EUR', 'AUD', 'JPY');
		if (isset($_POST['submit']) && isset($_GET['param'])) {
			$currency = $arr_cur[$_POST['currency']];
			$author = $this->categoryModel->select("name")->where("id", $_POST['category_id2'])->where("module", "tac-gia")->getArray();
			$producer = $this->categoryModel->select("name")->where("id", $_POST['category_id3'])->where("module", "nxb")->getArray();
			$data = array(
				'name' => $_POST['name'],
				'alias' => alias($_POST['name']),
				'category_id1' => $_POST['category_id1'],
				'category_id2' => $_POST['category_id2'],
				'category_id3' => $_POST['category_id3'],
				'author' => $author[0]['name'],
				'producer' => $producer[0]['name'],
				'price' => $_POST['price'],
				'sale' => $_POST['sale'],
				'real_price' => $_POST['real_price'],
				'currency' => $currency,
				'description' => addslashes($_POST['description']),
				'content' => addslashes($_POST['content']),
				'hot_1' => $_POST['hot_1'],
				'hot_2' => $_POST['hot_2'],
				'hot_3' => $_POST['hot_3'],
				'status' => $_POST['status'],
				'updated' => date("Y-m-d")
			);
			$row = $this->productModel->select("picture")->where("id", $_GET['param'])->where("alias", $_GET['alias'])->get();
			if($picture = uploadImg("picture", "imgs/products/")) {
				$data += ['picture' => $picture];
				if ($row != 0) {
					if ($row[0]->picture != "noimg.png") {
						deleteImg("imgs/products/".$row[0]->picture);
					}
				}
			}
			$this->productModel->where("id", $_GET['param'])->where("alias", $_GET['alias'])->update($data);
			echo '<script>alert("Cập nhật thành công!");</script>';
			echo '<script>window.location="'.Autoload::URL("admin/adminproduct", "return").'"</script>';
		}
	}

	public function delete()
	{
		if (isset($_POST['id'])) {
			$item = $this->productModel->where("id", $_POST['id'])->getFirst();
			deleteImg("imgs/products/".$item->picture);
			$this->productModel->where("id", $_POST['id'])->delete();
			echo "ok";
		}
		
	}

	public function updatestt()
	{
		if (isset($_POST['id'])) {
			$rs = $this->productModel->select("status")->where("id", $_POST['id'])->getFirst();
			if ($rs->status == 0) {
				$data = array('status' => 1);
			} else {
				$data = array('status' => 0);
			}
			$this->productModel->where("id", $_POST['id'])->update($data);
			$rs = $this->productModel->select("status")->where("id", $_POST['id'])->getFirst();
			echo $rs->status;
		}
	}
}
