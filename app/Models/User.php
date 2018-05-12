<?php 
class User extends Model
{
	
	// Hàm khởi tạo
	public function __construct()
	{
		parent::__construct();
		$this->table = 'tb_user';
	}


	public function getUserById($id)
	{
		$rs = $this->where('id', $id)->getFirst();
		return $rs;
	}

	public function getListByRole($role_id = null, $numb = 10)
	{
		if ($role_id != null) {
			$rs = $this->where('role_id', $role_id)->paginate($this->positionPage($numb), $numb);
		} else {
			$rs = $this->where('role_id', '<>' , '0')->paginate($this->positionPage($numb), $numb);
		}
		return $rs;
	}

	public function checkAccount($username, $password)
	{
		$rs = $this->where('username', $username)->where('password', md5($password))->where('status')->getFirst();
		return $rs;
	}
}
 ?>