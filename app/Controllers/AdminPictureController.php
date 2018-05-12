<?php 
class AdminPictureController extends Controller
{
	private $data = null;
	private $picModel;
	private $numb = 10;
	public function __construct()
	{
		parent::__construct();
		require("app/Models/Picture.php");
		$this->picModel = new Picture();
	}

	public function index()
	{
		$rs = $this->picModel->paginate($this->picModel->positionPage($this->numb), $this->numb);

		$this->data = array('data' => $rs);
		$this->view('index', $this->data, 'admin');
	}

	public function getAdd()
	{
		$this->view("edit", $this->data, "admin");
	}

	public function postAdd()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'name' => $_POST['name'],
				'alias' => alias($_POST['name']),
				'link' => $_POST['link'],
				'level' => 1,
				'module' => 'slide',
				'status' => $_POST['status'],
				'created' => date("Y-m-d", time()),
				'updated' => date("Y-m-d", time())
			);
			if($picture = uploadImg("picture", "imgs/")) {
				$data += ['picture' => $picture];
			}
			$this->picModel->add($data);
			echo '<script>alert("Thêm thành công!");</script>';
			echo '<script>window.location="'.Autoload::URL("admin/adminpicture", "return").'"</script>';
		} else {
			header("Location: ".Autoload::URL("404.html", "return"));
			exit();
		}
	}

	public function getUpdate()
	{
		if (isset($_GET['param'])) {
			$rs = $this->picModel->where("id", $_GET['param'])->where("alias", $_GET['alias'])->getFirst();
			$this->data = array('data' => $rs);
			$this->view("edit", $this->data, "admin");
		} else {
			header("Location: ".Autoload::URL("404.html", "return"));
			exit();
		}
	}

	public function postUpdate()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'name' => $_POST['name'],
				'alias' => alias($_POST['name']),
				'link' => $_POST['link'],
				'level' => 1,
				'module' => 'slide',
				'status' => $_POST['status'],
				'updated' => date("Y-m-d", time())
			);
			$row = $this->picModel->select("picture")->where("id", $_GET['param'])->where("alias", $_GET['alias'])->get();
			if($picture = uploadImg("picture", "imgs/")) {
				$data += ['picture' => $picture];
				if ($row != 0) {
					if ($row[0]->picture != "noimg.png") {
						deleteImg("imgs/".$row[0]->picture);
					}
				}
			}
			$this->picModel->where("id", $_GET['param'])->where("alias", $_GET['alias'])->update($data);
			echo '<script>alert("Cập nhật thành công!");</script>';
			echo '<script>window.location="'.Autoload::URL("admin/adminpicture", "return").'"</script>';
		} else {
			header("Location: ".Autoload::URL("404.html", "return"));
			exit();
		}
	}

	public function delete()
	{
		if (isset($_POST['id'])) {
			$item = $this->picModel->where("id", $_POST['id'])->getFirst();
			deleteImg("imgs/".$item->picture);
			$this->picModel->where("id", $_POST['id'])->delete();
			echo "ok";
		}
	}
}
