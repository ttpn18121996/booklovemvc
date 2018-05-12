<?php 
class AdminOnlineController extends Controller
{
	private $data = null;
	private $onlModel;

	public function __construct()
	{
		parent::__construct();
		require("app/Models/Online.php");
		$this->onlModel = new Online();
	}

	public function index()
	{
		$rs = $this->onlModel->getList(10);
		$total = count($this->onlModel->get());

		$this->data = array('data' => $rs, 'total' => $total);
		$this->view('index', $this->data, 'admin');
	}
}
