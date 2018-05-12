<?php 

class HomeController extends Controller
{
	private $productModel;
	private $data = null;
	public function __construct()
	{
		parent::__construct();
		require("app/Models/Product.php");
		$this->productModel = new Product();
	}

	public function index()
	{
		$rs = $this->productModel->where("status", "1")->where("hot_1", "1")->orderBy("updated desc")->take("8")->get();
		$rs_sale = $this->productModel->where("status", "1")->where("sale", "<>", "0")->orderBy("updated desc")->get();
		$this->data = array('data' => $rs, 'data_sale' => $rs_sale);
		$this->view('index', $this->data, 'client');
	}

	public function about()
	{
		require("app/Models/Module.php");
		$obj = new Module();
		$rs = $obj->where("alias", "gioi-thieu")->getFirst();
		$this->data = array('data' => $rs);
		$this->view('about', $this->data, "client");	
	}

	public function contact()
	{
		require("app/Models/Contact.php");
		$cont = new Contact();
		if (isset($_POST['submit'])) {
			if (isset($_GET['alias'])) {
				$full_name = $_POST['full_name'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$note = $_POST['note'];
				$data = array(
					'full_name' => $full_name,
					'email' => $email,
					'phone' => $phone,
					'note' => $note,
					'module' => $_GET['alias'],
					'status' => 0,
					'created' => time(),
					'updated' => time()
				);
				$cont->add($data);
				echo '<script>alert("Thông tin đã được gửi đi!");</script>';
				echo '<script>window.location = "'.Autoload::URL('home/index', 'return').'"</script>';
			} else {
				$full_name = $_POST['full_name'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$note = $_POST['note'];
				$content = '
				<table style="color: #333333; width: 100%; border-collapse: collapse;">
					<thead>
						<tr style="color: White; background-color: #FDA30E; font-weight: bold;">
							<th style="padding: 10px 0 10px 5px; text-align: center;border-right: 1px solid #CFCFCF;">Họ và tên</th>
							<th style="padding: 10px 0 10px 5px; text-align: center;border-right: 1px solid #CFCFCF;">Email</th>
							<th style="padding: 10px 0 10px 5px; text-align: center;border-right: 1px solid #CFCFCF;">Địa chỉ</th>
							<th style="padding: 10px 0 10px 5px; text-align: center;border-right: 1px solid #CFCFCF;">Nội dung</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="padding: 10px 0 10px 5px; text-align: center;border: 1px solid #CFCFCF;">'.$full_name.'</td>
							<td style="padding: 10px 0 10px 5px; text-align: center;border: 1px solid #CFCFCF;">'.$email.'</td>
							<td style="padding: 10px 0 10px 5px; text-align: center;border: 1px solid #CFCFCF;">'.$phone.'</td>
							<td style="padding: 10px 0 10px 5px; text-align: center;border: 1px solid #CFCFCF;">'.$note.'</td>
						</tr>
					</tbody>
				</table>
				';
				$data = array(
					'full_name' => $full_name,
					'email' => $email,
					'phone' => $phone,
					'note' => $note,
					'module' => 'lien-he',
					'status' => 0,
					'created' => time(),
					'updated' => time()
				);
				$cont->add($data);
				$cont->sendMail('Liên hệ', $content);
				if ($cont == 0) {
					echo '<script>alert("Có lỗi xảy ra! Vui lòng thử lại!");</script>';
					echo '<script>window.location = "'.Autoload::URL('home/contact', 'return').'"</script>';
				} else {
					echo '<script>alert("Thông tin đã được gửi đi!");</script>';
					// echo '<script>window.location = "'.Autoload::URL('home/index', 'return').'"</script>';
				}
			}
		} else {
			if (isset($_SESSION['userclient'])) {
				$this->data = array('data' => $_SESSION['userclient']);
			}
			$this->view('contact', $this->data, "client");
		}
	}
}
