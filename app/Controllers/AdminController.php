<?php 
class AdminController extends Controller
{
	private $data = null;
	private $userModel;
	public function __construct()
	{
		parent::__construct();
		require("app/Models/User.php");

		$this->userModel = new User();
	}

	public function index()
	{
		$this->view('index', $this->data, 'admin');
	}

	// Mở trang đăng nhập
	public function getLogin()
	{
		if (isset($_SESSION['useradmin'])) {
			header("Location: ".Autoload::URL('admin', 'return'));
			exit;
		} else {
			$this->view('login');
		}
	}

	// Kiểm tra thông tin thực hiện đăng nhập
	public function postLogin()
	{
		if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			// Kiểm tra thông tin đăng nhập
			$check_user = $this->userModel->where("username", $username)->where("password", md5($password))->where("role_id", "<>", "2")->where("status", "1")->getFirst();
			
			if ($check_user != null) {
				if ($check_user->username == $username) {
					$_SESSION['useradmin'] = $check_user;
					header("Location: ".Autoload::URL('admin', 'return'));
					exit;
				} else {
					echo '<script>alert("Đăng nhập thất bại! Vui lòng kiểm tra lại thông tin đăng nhập!");</script>';
					echo '<script>history.back();</script>';
				}
				
			} else {
				echo '<script>alert("Đăng nhập thất bại! Vui lòng kiểm tra lại thông tin đăng nhập!");</script>';
				echo '<script>history.back();</script>';
			}
			
		}
	}

	// Đăng xuất
	public function logout()
	{
		$_SESSION['useradmin'] = null;
		header("Location: ".Autoload::URL("admin/admin/getLogin", "return"));
    	exit;
	}

	// Lấy thông tin trang giới thiệu
	public function about()
	{
		require("app/Models/Module.php");
		$obj = new Module();
		if (isset($_POST['submit'])) {
			$data = array(
				'content' => $_POST['content'],
				'keyword' => $_POST['keyword'],
				'description' => $_POST['description'],
				'status' => '1',
				'updated' => time()
			);
			$obj->where("alias", "gioi-thieu")->update($data);
			echo '<script>alert("Cập nhật thành công!");</script>';
			echo '<script>history.back();</script>';
		} else {
			$rs = $obj->where("alias", "gioi-thieu")->getFirst();
			$this->data = array('data' => $rs);
			$this->view("about", $this->data, "admin");
		}
		
	}
}
