<?php 
class AdminInfoController extends Controller
{
	private $data = null;
	private $infoModel;

	public function __construct()
	{
		parent::__construct();
		require("app/Models/Information.php");
		$this->infoModel = new Information();
	}


	public function index()
	{
		$rs = $this->infoModel->get();

		$this->data = array('data' => $rs);
		$this->view('index', $this->data, 'admin');
	}

	public function update()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'name' => $_POST['name'],
				'title' => $_POST['title'],
				'alias' => alias($_POST['name']),
				'keyword' => $_POST['keyword'],
				'description' => addslashes($_POST['description']),
				'content' => addslashes($_POST['content']),
				'footer' => $_POST['footer'],
				'google_map' => $_POST['google_map'],
				'email' => $_POST['email'],
				'phone' => $_POST['phone'],
				'hotline' => $_POST['hotline'],
				'address' => $_POST['address'],
				'facebook' => $_POST['facebook'],
				'twitter' => $_POST['twitter'],
				'google_plus' => $_POST['google_plus'],
				'skype' => $_POST['skype'],
				'youtube' => $_POST['youtube'],
				'zalo' => $_POST['zalo'],
				'website' => $_POST['website'],
				'updated' => date("Y-m-d H:i:s")
			);
			$row = $this->infoModel->select("banner, logo, favicon")->where("id", "1")->get();
			if($banner = uploadImg("banner", "imgs/")) {
				$data += ['banner' => $banner];
				if ($row != 0) {
					if ($row[0]->banner != "noimg.png") {
						deleteImg("imgs/".$row[0]->banner);
					}
				}
			}
			if ($logo = uploadImg("logo", "imgs/")) {
				$data += ['logo' => $logo];
				if ($row != 0) {
					if ($row[0]->logo != "noimg.png") {
						deleteImg("imgs/".$row[0]->logo);
					}
				}
			}
			if ($favicon = uploadImg("favicon", "imgs/")) {
				$data += ['favicon' => $favicon];
				if ($row != 0) {
					if ($row[0]->favicon != "noimg.png") {
						deleteImg("imgs/".$row[0]->favicon);
					}
				}
			}
			$this->infoModel->update($data);
			echo '<script>alert("Cập nhật thành công!");</script>';
			echo '<script>window.location="'.Autoload::URL("admin/admininfo", "return").'"</script>';
		}
	}
}
