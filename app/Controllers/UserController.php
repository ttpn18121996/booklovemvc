<?php 
class UserController extends Controller
{
	private $data = null;
	private $userModel;
	public function __construct()
	{
		parent::__construct();
		require("app/Models/User.php");
		$this->userModel = new User();
	}

	// Hàm hiển thị trang thông tin tài khoản
	public function index()
	{
		if (isset($_SESSION['userclient'])) {
			if (isset($_POST['submit'])) {
				$data = array(
					'first_name' => $_POST['firstname'],
					'last_name' => $_POST['lastname'],
					'phone' => $_POST['phone'],
					'address' => $_POST['address']
				);
				$this->userModel->where('username', $_SESSION['userclient']->username)->update($data);
				echo '<script>alert("Cập nhật thành công!");</script>';
				echo '<script>history.back();</script>';
			} else {
				$this->view('index', $this->data, 'client');
			}
		} else {
			header("Location: ".Autoload::URL("404.html", "return"));
			exit();
		}
	}

	// Hàm xử lý đăng nhập
	public function signin()
	{
		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$pass = $_POST['pwd'];
			// Kiểm tra thông tin đăng nhập
			$check_user = $this->userModel->where('username', $email)->where('password', md5($pass))->where('role_id', '2')->where('status', '1')->getFirst();

			if ($check_user != null) {
				if ($check_user->username == $email) {
					$_SESSION['userclient'] = $check_user;
					echo '<script>history.back();</script>';
				} else {
					echo '<script>alert("Đăng nhập thất bại! Vui lòng kiểm tra lại thông tin đăng nhập!");</script>';
					echo '<script>history.back();</script>';
				}
			} else {
				echo '<script>alert("Đăng nhập thất bại! Vui lòng kiểm tra lại thông tin đăng nhập!");</script>';
				echo '<script>history.back();</script>';
			}
		} else {
			header("Location: ".Autoload::URL("404.html", "return"));
			exit();
		}
	}

	// Hàm xử lý đăng xuất
	public function signout()
	{
		$_SESSION['userclient'] = null;
		echo '<script>window.location="'.Autoload::URL('', 'return').'"</script>';
	}

	// Hàm xử lý đăng ký
	public function signup()
	{
		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$rs = $this->userModel->where('username', $email)->get();
			if ($rs == null) {
				$password = $_POST['pwd'];
				$data = array(
					'username' => $email,
					'password' => md5($password),
					'first_name' => $_POST['firstname'],
					'last_name' => $_POST['lastname'],
					'email' => $email,
					'phone' => $_POST['phone'],
					'address' => $_POST['address'],
					'role_id' => 2,
					'status' => 1
				);
				$this->userModel->add($data);
				$check_user = $this->userModel->checkAccount($email, $password);
				$_SESSION['userclient'] = $check_user;
				echo '<script>history.back();</script>';
			} else {
				echo '<script>alert("Email này đã tồn tại!");</script>';
				echo '<script>history.back();</script>';
			}
		} else {
			header("Location: ".Autoload::URL("404.html", "return"));
			exit();
		}
	}

	public function checkmail()
	{
		if ($_POST['email'] != "") {
			$email = $_POST['email'];
			$rs = $this->userModel->where('username', $email)->get();
			if ($rs != null) {
				echo "error";
			} else {
				echo "ok";
			}
		}
	}

	public function forgotpassword()
	{
		if (isset($_POST['submit'])) {
			$email = $_POST['email2'];
			$pass = $_POST['pass'];
			$newpass = $_POST['pwd2'];
			if ($email == $_SESSION['userclient']->username) {
				$check = $this->userModel->where('username', $email)->where('password', md5($pass))->where('role_id', 2)->where('status', 1)->getFirst();
				if ($check != null) {
					$data = array('password' => md5($newpass));
					$this->userModel->where('username', $check->username)->update($data);
					echo '<script>alert("Đổi mật khẩu thành công!");</script>';
					echo '<script>window.location='.Autoload::URL('', 'return').'</script>';
				} else {
					echo '<script>alert("Thông tin tài khoản chưa chính xác! Vui lòng kiểm tra lại");</script>';
					echo '<script>history.back();</script>';
				}
			} else {
				echo '<script>alert("Có lỗi xảy ra! Vui lòng thử lại");</script>';
				echo '<script>history.back();</script>';
			}
		}
	}
}
