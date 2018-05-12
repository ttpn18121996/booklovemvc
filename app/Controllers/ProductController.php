<?php 

class ProductController extends Controller
{
	private $productModel;
	private $categoryModel;
	private $data = null;
	private $numb = 12;
	private $c;
	public function __construct()
	{
		parent::__construct();
		$this->c = mb_convert_case(str_replace("Controller", "", get_class()), MB_CASE_LOWER);
		require("app/Models/Product.php");
		include "app/Models/Category.php";
		$this->productModel = new Product();
		$this->categoryModel = new Category();
	}

	public function index()
	{
		$rs = $this->productModel->where("status", "1")->paginate($this->productModel->positionPage($this->numb), $this->numb);

		// Xuất dữ liệu
		$this->data = array('data' => $rs);
		$this->view('index', $this->data, 'client');
	}

	// Lấy danh sách sản phẩm theo thể loại
	public function category()
	{
		if (isset($_GET['alias'])) {
			$id_cat = $this->categoryModel->select("id")->where("alias", $_GET['alias'])->where("module", "san-pham")->where("level", "1")->where("status", "1")->get();
			$rs = null;
			if ($id_cat != null) {
				// Chia trang
				$rs = $this->productModel->where("category_id1", $id_cat[0]->id)->where("status", "1")->paginate($this->productModel->positionPage($this->numb), $this->numb);
			}
		} else {
			$rs = $this->productModel->where("status", "1")->paginate($this->productModel->positionPage($this->numb), $this->numb);
		}

		// Xuất dữ liệu
		$this->data = array('data' => $rs);
		$this->view('index', $this->data, 'client');
	}

	// Lấy danh sách sản phẩm theo tác giả
	public function author()
	{
		if (isset($_GET['alias'])) {
			$id_cat = $this->categoryModel->select("id")->where("alias", $_GET['alias'])->where("module", "tac-gia")->where("level", "1")->where("status", "1")->get();
			$rs = null;
			if ($id_cat != null) {
				// Chia trang
				$rs = $this->productModel->where("category_id2", $id_cat[0]->id)->where("status", "1")->paginate($this->productModel->positionPage($this->numb), $this->numb);
			}
		} else {
			$rs = $this->productModel->where("status", "1")->paginate($this->productModel->positionPage($this->numb), $this->numb);
		}
		// Xuất dữ liệu
		$this->data = array('data' => $rs);
		$this->view('index', $this->data, 'client');
	}

	// Lấy danh sách sản phẩm theo nhà xuất bản
	public function producer()
	{
		if (isset($_GET['alias'])) {
			$id_cat = $this->categoryModel->select("id")->where("alias", $_GET['alias'])->where("module", "nxb")->where("level", "1")->where("status", "1")->get();
			$rs = null;
			if ($id_cat != null) {
				// Chia trang
				$rs = $this->productModel->where("category_id3", $id_cat[0]->id)->where("status", "1")->paginate($this->productModel->positionPage($this->numb), $this->numb);
			}
		} else {
			$rs = $this->productModel->where("status", "1")->paginate($this->productModel->positionPage($this->numb), $this->numb);
		}
		// Xuất dữ liệu
		$this->data = array('data' => $rs);
		$this->view('index', $this->data, 'client');
	}

	// Lấy thông tin chi tiết sản phẩm
	public function detail()
	{
		$rs = $this->productModel->select("tb_product.*, cat.name as cate")
		->join("(select id, name from tb_category where module = 'san-pham') as cat", "tb_product.category_id1", "=", "cat.id")->where("alias", $_GET['alias'])->where("tb_product.id", $_GET['param'])->getFirst();

		// Lấy danh sách sản phẩm liên quan
		$re = $this->productModel->select("id, name, alias, picture, price, sale,real_price, currency")->where("status", "1")->where("id", "<>", $rs->id)->where("category_id1", $rs->category_id1)->orWhere("category_id2", $rs->category_id2)->orWhere("category_id3", $rs->category_id3)->orderBy("updated DESC")->get();

		$this->data = array('data' => $rs, 'data1' => $re);
		$this->view('detail', $this->data, 'client');
	}

	public function search()
	{
		$rs = null;
		if (isset($_POST['submit_search'])) {
			$keyword = $_POST['keyword'];
			$cate = $_POST['cate'];
			
			if ($cate == 'san-pham') {
				$id_cat = $this->categoryModel->select("id")->where("alias", "like", "%".alias($keyword)."%")->where("module", "san-pham")->where("level", "1")->where("status", "1")->get();
				if ($id_cat != null) {
					$rs = $this->productModel->where("category_id1", $id_cat[0]->id)->where("status", "1")->paginate($this->productModel->positionPage($this->numb), $this->numb);
				}
			} elseif ($cate == "tac-gia") {
				$id_cat = $this->categoryModel->select("id")->where("alias", "like", "%".alias($keyword)."%")->where("module", "tac-gia")->where("level", "1")->where("status", "1")->get();
				if ($id_cat != null) {
					$rs = $this->productModel->where("category_id2", $id_cat[0]->id)->where("status", "1")->paginate($this->productModel->positionPage($this->numb), $this->numb);
				}
			} elseif ($cate == "nxb") {
				$id_cat = $this->categoryModel->select("id")->where("alias", "like", "%".alias($keyword)."%")->where("module", "nxb")->where("level", "1")->where("status", "1")->get();
				if ($id_cat != null) {
					$rs = $this->productModel->where("category_id3", $id_cat[0]->id)->where("status", "1")->paginate($this->productModel->positionPage($this->numb), $this->numb);
				}
			} else {
				$rs = $this->productModel->where("status", "1")->where("alias", "like", "%".alias($keyword)."%")->paginate($this->productModel->positionPage($this->numb), $this->numb);
			}
		}

		// Xuất dữ liệu
		$this->data = array('data' => $rs);
		$this->view('index', $this->data, 'client');
	}
}
