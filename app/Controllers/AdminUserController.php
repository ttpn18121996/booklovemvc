<?php 
class AdminUserController extends Controller
{
	private $data = null;
	private $numb = 10;
	private $userModel;
	function __construct()
	{
		parent::__construct();
		require("app/Models/User.php");
		$this->userModel = new User();
	}

	public function index()
	{
		if (isset($_GET['alias'])) {
			if ($_GET['alias'] == 1) {
				$rs = $this->userModel->getListByRole('1', $this->numb);
			} else {
				$rs = $this->userModel->getListByRole('2', $this->numb);
			}
		} else {
			$rs = $this->userModel->getListByRole(null, $this->numb);
		}
		$this->data = array("data" => $rs);
		$this->view("index", $this->data, "admin");
	}

	public function updatestt()
	{
		if (isset($_POST['id'])) {
			$rs = $this->userModel->select("status")->where("id", $_POST['id'])->getFirst();
			if ($rs->status == 0) {
				$data = array('status' => 1);
			} else {
				$data = array('status' => 0);
			}
			$this->userModel->where("id", $_POST['id'])->update($data);
			$rs = $this->userModel->select("status")->where("id", $_POST['id'])->getFirst();
			echo $rs->status;
		}
	}

	public function add()
	{
		if (isset($_POST['submit'])) {
			$role = $_POST['role_id'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			if ($role == 2) {
				$check = $this->userModel->where("username", $email)->getFirst();
				if ($check != null) {
					echo '<script>alert("Email này đã tồn tại!");</script>';
					echo '<script>history.back();</script>';
				} else {
					$username = $_POST['email'];
				}
				
			} else {
				$check = $this->userModel->where("username", $username)->getFirst();
				if ($check != null) {
					echo '<script>alert("Tên đăng nhập này đã tồn tại!");</script>';
					echo '<script>history.back();</script>';
				} else {
					$username = $_POST['username'];
				}
			}
			
			$data = array(
				'username' => $username,
				'password' => md5($_POST['password']),
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'email' => $email,
				'phone' => $_POST['phone'],
				'address' => $_POST['address'],
				'role_id' => $role,
				'status' => $_POST['status']
			);
			if ($picture = uploadImg('picture', 'imgs/')) {
				$data += ['picture' => $picture];
			}
			$this->userModel->add($data);
			header('Location: '.Autoload::URL('admin/adminuser', 'return'));
			
		} else {
			$this->view('edit', $this->data, 'admin');
		}
		
	}

	public function update()
	{
		if (isset($_POST['submit'])) {
			$role = $_POST['role_id'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			if ($role == 2) {
				$check = $this->userModel->where("username", $email)->where('id', '<>', $_GET['alias'])->getFirst();
				if ($check != null) {
					echo '<script>alert("Email này đã tồn tại!");</script>';
					echo '<script>history.back();</script>';
				} else {
					$username = $_POST['email'];
				}
				
			} else {
				$check = $this->userModel->where("username", $username)->where('id', '<>', $_GET['alias'])->getFirst();
				if ($check != null) {
					echo '<script>alert("Tên đăng nhập này đã tồn tại!");</script>';
					echo '<script>history.back();</script>';
				} else {
					$username = $_POST['username'];
				}
			}
			
			$data = array(
				'username' => $username,
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'email' => $email,
				'phone' => $_POST['phone'],
				'address' => $_POST['address'],
				'role_id' => $role,
				'status' => $_POST['status']
			);
			$row = $this->userModel->select('picture')->where('id', $_GET['alias'])->getFirst();
			if ($picture = uploadImg("picture", "imgs/")) {
				$data += ['picture' => $picture];
				if ($row != 0) {
					if ($row->picture != "noimg.png") {
						deleteImg("imgs/".$row->picture);
					}
				}
			}
			$this->userModel->where('id', $_GET['alias'])->update($data);
			echo '<script>alert("Cập nhật thành công!");</script>';
			echo '<script>window.location="'.Autoload::URL("admin/adminuser", "return").'"</script>';
		} else {
			if ($_SESSION['useradmin']->role_id == 0) {
				if (isset($_GET['alias'])) {
					$rs = $this->userModel->getUserById($_GET['alias']);
					$this->data = array('data' => $rs);
					$this->view('edit', $this->data, 'admin');
				}
			} else {
				header("Location: ".Autoload::URL("404.html", "return"));
				exit();
			}
		}
	}

	public function delete()
	{
		if (isset($_POST['id'])) {
			$item = $this->userModel->where("id", $_POST['id'])->getFirst();
			if ($item->picture != 'noimg.png') {
				deleteImg("imgs/".$item->picture);
			}
			$this->userModel->where("id", $_POST['id'])->delete();
			echo "ok";
		}
	}
}
