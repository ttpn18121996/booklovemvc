<?php 
class AdminContactController extends Controller
{
	private $data = null;
	private $numb = 10;
	private $contactModel;
	// Hàm khởi tạo
	public function __construct()
	{
		parent::__construct();
		require("app/Models/Contact.php");
		$this->contactModel = new Contact();
	}

	public function index()
	{
		$rs = $this->contactModel->getList($this->numb);
		$this->data = array('data' => $rs);
		$this->view("index", $this->data, "admin");
	}

	public function detail()
	{
		if (isset($_GET['alias'])) {
			$id = $_GET['alias'];
			$rs = $this->contactModel->getDetail($id);
			$dataupdate = array('status' => 1);
			$this->contactModel->where("id", $id)->update($dataupdate);
			$this->data = array('data' => $rs);
			$this->view("detail", $this->data, "admin");
		}
	}

	public function signUpForTheNewsletter()
	{
		$rs = $this->contactModel->getList($this->numb, "dang-ki-nhan-tin");
		$this->data = array('data' => $rs);
		$this->view("index", $this->data, "admin");
	}

	public function delete()
	{
		if (isset($_POST['id'])) {
			$this->contactModel->where("id", $_POST['id'])->delete();
			echo "ok";
		}
	}
}
