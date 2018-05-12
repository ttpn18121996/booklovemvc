<?php 
class AdminCategoryController extends Controller
{
	private $data = null;
	private $categoryModel;
	public function __construct()
	{
		parent::__construct();
		require "app/Models/Category.php";
		$this->categoryModel = new Category();
	}

	public function index()
	{
		
	}

	public function category_product()
	{
		$rs = $this->categoryModel->getCategoryByModule("san-pham", 10);

		$this->data = array('data' => $rs);
		$this->view('category_product', $this->data, 'admin');
	}

	public function author_product()
	{
		$rs = $this->categoryModel->getCategoryByModule("tac-gia", 10);

		$this->data = array('data' => $rs);
		$this->view('category_product', $this->data, 'admin');
	}

	public function producer_product()
	{
		$rs = $this->categoryModel->getCategoryByModule("nxb", 10);

		$this->data = array('data' => $rs);
		$this->view('category_product', $this->data, 'admin');
	}

	public function getAdd()
	{
		if (isset($_GET['alias'])) {
			if ($_GET['alias'] == 'san-pham') {
				$as = 'thể loại';
			} elseif ($_GET['alias'] == 'tac-gia') {
				$as = 'tác giả';
			} elseif ($_GET['alias'] == 'nxb') {
				$as = 'nhà xuất bản';
			} else {
				$as = '';
			}
			$this->data = array('as' => $as);
			$this->view('edit', $this->data, 'admin');
		}
	}

	public function postAdd()
	{
		if (isset($_GET['alias']) && isset($_POST['submit'])) {
			$module = $_GET['alias'];
			$data = array(
				'name' => $_POST['name'],
				'alias' => alias($_POST['name']),
				'level' => 1,
				'module' => $module,
				'status' => 1
			);
			$this->categoryModel->add($data);
			echo '<script>alert("Thêm thành công!");</script>';
			echo '<script>history.back();</script>';
		}
	}

	public function getUpdate()
	{
		if (isset($_GET['param'])) {
			$rs = $this->categoryModel->where("id", $_GET['param'])->where("alias", $_GET['alias'])->getFirst();
			$as = $rs->name;
			$this->data = array('data' => $rs, 'as' => $as);
			$this->view('edit', $this->data, 'admin');
		}
	}

	public function postUpdate()
	{
		if (isset($_GET['param']) && isset($_POST['submit'])) {
			$data = array(
				'name' => $_POST['name'],
				'alias' => alias($_POST['name']),
				'status' => $_POST['status']
			);
			$this->categoryModel->where("id", $_GET['param'])->where("alias", $_GET['alias'])->update($data);
			echo '<script>alert("Cập nhật thành công!");</script>';
			echo '<script>history.back();</script>';
		}
	}

	public function delete()
	{
		if (isset($_POST['id'])) {
			$this->categoryModel->where("id", $_POST['id'])->delete();
			echo "ok";
		}
	}

	public function updatestt()
	{
		if (isset($_POST['id'])) {
			$rs = $this->categoryModel->select("status")->where("id", $_POST['id'])->getFirst();
			if ($rs->status == 0) {
				$data = array('status' => 1);
			} else {
				$data = array('status' => 0);
			}
			$this->categoryModel->where("id", $_POST['id'])->update($data);
			$rs = $this->categoryModel->select("status")->where("id", $_POST['id'])->getFirst();
			echo $rs->status;
		}
	}
}
