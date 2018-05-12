<?php 
class Model
{
	public $db, $className;
	protected $table;
	protected $col = "*";
	protected $condition_join = "";
	protected $condition = "";
	protected $order = "id ASC";
	protected $limit = "";

	//Trang hiện tại
    public $currentPage = 1;
    //Vị trí đang đứng
    protected $position = 0;
	//Tổng số trang
    public $totalOfPage;

	public function __construct()
	{
		$this->className = get_class($this);
		$this->db = new Database();
		$this->currentPage = isset($_GET["p"]) ? $_GET["p"] : "1";
	}

	/*
	* Hàm lấy tên cột cần select
	* $col tên các cột trong table cần lấy
	*/
	public function select($col = "*")
	{
		$this->col = $col;
		return $this;
	}

	/*
	* Hàm lấy điều kiện select
	* $param1 là tên cột của bảng
	* $param2 là toán tử nếu truyền 3 tham số
	* $param2 là giá trị nếu truyền 2 tham số
	* $param3 là giá trị
	*/
	public function where($param1 = "", $param2 = "", $param3 = "")
	{
		if ($param1 != "" && $param2 != "") {
			if ($param3 != "") {
				if ($this->condition != "") {
					$this->condition .= " and ".$param1." ".$param2." '".$param3."'";
				} else {
					$this->condition = $param1." ".$param2." '".$param3."'";
				}
			} else {
				if ($this->condition != "") {
					$this->condition .= " and ".$param1." = '".$param2."'";
				} else {
					$this->condition = $param1." = '".$param2."'";
				}
			}
		} else {
			$this->condition .= "";
		}
		return $this;
	}

	/*
	* Hàm lấy điều kiện or để select
	* $param1 là tên cột của bảng
	* $param2 là toán tử nếu truyền 3 tham số
	* $param2 là giá trị nếu truyền 2 tham số
	* $param3 là giá trị 
	*/
	public function orWhere($param1 = "", $param2 = "", $param3 = "")
	{
		if ($this->condition != "") {
			if ($param1 != "" && $param2 != "") {
				if ($param3 != "") {
					$this->condition .= " or ".$param1.$param2."'".$param3."'";
				} else {
					$this->condition .= " or ".$param1." = '".$param2."'";
				}
			} else {
				$this->condition .= "";
			}
		} else {
			$this->condition .= "";
		}
		return $this;
	}

	/*
	* Hàm xét điều hiện tồn tại trong mảng
	* $list là mảng cần để kiểm tra điều kiện
	* $field là tên cột trong table để kiểm tra, so vớ mảng
	*/
	public function whereIn($list, $field = "id")
	{
		$arraylist = join(",", $list);
		$this->condition = " {$field} IN ({$arraylist}) ";
		return $this;
	}

	/*
	* Hàm xét điều hiện không tồn tại trong mảng
	* $list là mảng cần để kiểm tra điều kiện
	* $field là tên cột trong table để kiểm tra, so vớ mảng
	*/
	public function whereNotIn($list, $field = "id")
	{
		$arraylist = join(",", $list);
		$this->condition = " {$field} NOT IN ({$arraylist}) ";
		return $this;
	}

	/*
	* Hàm lấy order để sắp xếp
	* $order cột và kiểu sắp xếp
	*/
	public function orderBy($order = "id ASC")
	{
		$this->order = $order;
		return $this;
	}

	/*
	* Hàm lấy giới hạn số lượng sản phẩm
	* $limit điều kiện giới hạn số dòng cần lấy
	*/
	public function take($limit = "")
	{
		$this->limit = $limit;
		return $this;
	}

	/*
	* Lấy danh sách
	*/
	public function get()
	{
		if ($this->condition == "") {
			if ($this->condition_join == "") {
				if ($this->limit == "") {
					$sql = "SELECT $this->col FROM $this->table ORDER BY $this->order";
				} else {
					$sql = "SELECT $this->col FROM $this->table ORDER BY $this->order LIMIT $this->limit";
				}
			} else {
				if ($this->limit == "") {
					$sql = "SELECT $this->col FROM $this->table $this->condition_join ORDER BY $this->order";
				} else {
					$sql = "SELECT $this->col FROM $this->table $this->condition_join ORDER BY $this->order LIMIT $this->limit";
				}
			}
		} else {
			if ($this->condition_join == "") {
				if ($this->limit == "") {
					$sql = "SELECT $this->col FROM $this->table WHERE $this->condition ORDER BY $this->order";
				} else {
					$sql = "SELECT $this->col FROM $this->table WHERE $this->condition ORDER BY $this->order LIMIT $this->limit";
				}
			} else {
				if ($this->limit == "") {
					$sql = "SELECT $this->col FROM $this->table $this->condition_join WHERE $this->condition ORDER BY $this->order";
				} else {
					$sql = "SELECT $this->col FROM $this->table $this->condition_join WHERE $this->condition ORDER BY $this->order LIMIT $this->limit";
				}
			}
		}
		
		$this->reset();
		$q = $this->db->QueryResult($sql);
		return $q->fetchAll(PDO::FETCH_CLASS);
	}

	public function getArray()
	{
		if ($this->condition == "") {
			if ($this->condition_join == "") {
				if ($this->limit == "") {
					$sql = "SELECT $this->col FROM $this->table ORDER BY $this->order";
				} else {
					$sql = "SELECT $this->col FROM $this->table ORDER BY $this->order LIMIT $this->limit";
				}
			} else {
				if ($this->limit == "") {
					$sql = "SELECT $this->col FROM $this->table $this->condition_join ORDER BY $this->order";
				} else {
					$sql = "SELECT $this->col FROM $this->table $this->condition_join ORDER BY $this->order LIMIT $this->limit";
				}
			}
		} else {
			if ($this->condition_join == "") {
				if ($this->limit == "") {
					$sql = "SELECT $this->col FROM $this->table WHERE $this->condition ORDER BY $this->order";
				} else {
					$sql = "SELECT $this->col FROM $this->table WHERE $this->condition ORDER BY $this->order LIMIT $this->limit";
				}
			} else {
				if ($this->limit == "") {
					$sql = "SELECT $this->col FROM $this->table $this->condition_join WHERE $this->condition ORDER BY $this->order";
				} else {
					$sql = "SELECT $this->col FROM $this->table $this->condition_join WHERE $this->condition ORDER BY $this->order LIMIT $this->limit";
				}
			}
		}
		$this->reset();
		$q = $this->db->QueryResult($sql);
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getFirst()
	{
		if ($this->condition == "") {
			if ($this->condition_join == "") {
				if ($this->limit == "") {
					$sql = "SELECT $this->col FROM $this->table ORDER BY $this->order";
				} else {
					$sql = "SELECT $this->col FROM $this->table ORDER BY $this->order LIMIT $this->limit";
				}
			} else {
				if ($this->limit == "") {
					$sql = "SELECT $this->col FROM $this->table $this->condition_join ORDER BY $this->order";
				} else {
					$sql = "SELECT $this->col FROM $this->table $this->condition_join ORDER BY $this->order LIMIT $this->limit";
				}
			}
		} else {
			if ($this->condition_join == "") {
				if ($this->limit == "") {
					$sql = "SELECT $this->col FROM $this->table WHERE $this->condition ORDER BY $this->order";
				} else {
					$sql = "SELECT $this->col FROM $this->table WHERE $this->condition ORDER BY $this->order LIMIT $this->limit";
				}
			} else {
				if ($this->limit == "") {
					$sql = "SELECT $this->col FROM $this->table $this->condition_join WHERE $this->condition ORDER BY $this->order";
				} else {
					$sql = "SELECT $this->col FROM $this->table $this->condition_join WHERE $this->condition ORDER BY $this->order LIMIT $this->limit";
				}
			}
		}
		$this->reset();
		$q = $this->db->QueryResult($sql);
		return $q->fetchObject();
	}

	public function join($table = "", $foreign = "", $operator = '=', $primary = "")
	{
		if ($table == "" or $foreign == "" or $operator == "" or $primary == "") {
			return "";
		} else {
			if ($this->condition_join == "") {
				$this->condition_join = " JOIN $table ON $foreign $operator $primary ";
			} else {
				$this->condition_join .= " JOIN $table ON $foreign $operator $primary ";
			}
		}
		return $this;
	}

	/*
	* Làm mới truy vấn
	*/
	public function reset()
	{
		$this->col = "*";
		$this->condition_join = "";
		$this->condition = "";
		$this->order = "id ASC";
		$this->limit = "";
	}

	/*
	* Thêm mới 1 dòng
	* $data là 1 mảng gồm key là cột cần thêm và value là giá trị
	*/
	public function add($data = array())
	{
		$key = "";
		$value = "";
		foreach ($data as $k => $v) {
			$key .= ",".$k;
			$value .= ",'".$v."'";
		}
		if($key{0} == ",") 
			$key{0} = "(";
		$key .= ")";
		if($value{0} == ",") 
			$value{0} = "(";
		$value .= ")";
		$sql = "INSERT INTO {$this->table}{$key} VALUES{$value}";
		$this->reset();
		$q = $this->db->ExeQuery($sql);
		return $q;
	}

	/*
	* Cập nhật 1 dòng
	* $data là 1 mảng gồm key là cột của bảng và value là giá trị
	* $condition là điều kiện cập nhật
	*/
	public function update($data = array())
	{
		$value = "";
		if ($data != null) {
			foreach ($data as $k => $v) {
				$value .= ", ".$k." = '".$v."' ";
			}
			if($value{0} == ",") 
				$value{0} = " ";
			if ($this->condition != "") {
				$sql = "UPDATE {$this->table} SET {$value} WHERE {$this->condition}";
			} else {
				$sql = "UPDATE {$this->table} SET {$value}";
			}
			
			$this->reset();
			$q = $this->db->ExeQuery($sql);
			return $q;
		}
	}

	/*
	* Xóa 1 dòng
	*/
	public function delete()
	{
		$sql = "DELETE FROM {$this->table} WHERE {$this->condition}";
		$q = $this->db->ExeQuery($sql);
		$this->reset();
		return $q;
	}

	/*
	* Hàm lấy sản phẩm cho 1 trang
	* $position là vị trí bắt đầu đc tính từ hàm pagination bên controller
	* $numb là số sản phẩm cần lấy
	*/
	public function paginate($position = 0, $numb = 4)
	{
		$this->limit = $position.",".$numb;
		if ($this->condition == "") {
			$sql = "SELECT $this->col FROM $this->table ORDER BY $this->order LIMIT $this->limit";
			$sql_count = "SELECT COUNT(id) AS COUNT FROM $this->table ORDER BY $this->order";
		} else {
			$sql = "SELECT $this->col FROM $this->table WHERE $this->condition ORDER BY $this->order LIMIT $this->limit";
			$sql_count = "SELECT COUNT(id) AS COUNT FROM $this->table WHERE $this->condition ORDER BY $this->order";
		}
		$this->reset();
		$q = $this->db->QueryResult($sql);
		$result = $q->fetchAll(PDO::FETCH_CLASS);

		$q1 = $this->db->QueryResult($sql_count);
		$result1 = $q1->fetchAll(PDO::FETCH_CLASS);
		//Tính số trang cần có = tổng sản phẩm / số sản phẩm 1 trang
        $totalOfPage = ($result1[0]->COUNT / $numb);
        

        if($totalOfPage <= 1) {
            $totalOfPage = 1;
        } else {
        	if ($result1[0]->COUNT % $numb == 0) {
        		$totalOfPage = round($totalOfPage,0,PHP_ROUND_HALF_UP);
        	} else {
        		$totalOfPage = round($totalOfPage+0.5,0,PHP_ROUND_HALF_UP);
        	}
        }

        $c = isset($_GET['c']) ? $_GET['c'] : "";
        if (isset($_GET['a'])) {
        	$c .= "/".$_GET['a'];
        } else {
        	$c .= "";
        }
        if (isset($_GET['alias'])) {
        	$c .= "/".$_GET['alias'];
        } else {
        	$c .= "";
        }
        if (isset($_GET['param'])) {
        	$c .= "/".$_GET['param'];
        } else {
        	$c .= "";
        }

        $body_paging = '
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<nav aria-label="Page navigation">
						<ul class="pagination">';
							//Kiểm tra để load nút trang trước
							if ($totalOfPage != 1) {
								if ($this->currentPage > 1) {
									$body_paging .= '<li><a href="'.Autoload::URL($c.'&p='.($this->currentPage-1), 'return').'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
								} 

				      			//Load các nút danh sách trang
								for ($i = 1; $i <= $totalOfPage; $i++) {
				      				//Kiểm tra trang hiện tại
									if ($i==$this->currentPage) { 
										$body_paging .= '<li class="active"><span>'.$i.'</span></li>';
									} else { 
										$body_paging .= '<li><a href="'.Autoload::URL($c.'&p='.$i.'">'.$i, 'return').'</a></li>';
									}
								}

				      			//Kiểm tra để load nút trang kế
				      			if ($this->currentPage < $totalOfPage) {
									$body_paging .= '<li><a href="'.Autoload::URL($c.'&p='.($this->currentPage + 1), 'return').'"  aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
								}
				      		}
						$body_paging .= '</ul>
					</nav>
				</div>
			</div>
		</div>
        ';
        Autoload::SetPaging($body_paging);
        $this->reset();
        return $result;
	}

	/*
	* Hàm lấy vị trí bắt đầu khi lấy sản phẩm trong danh sách
	* Vị trí hiện tại = trang hiện tại * $numb - $numb
	* VD: trang hiện tại = 2 => vị trí = 4
	*/
	public function positionPage($numb = 4)
	{
		$this->position = $this->currentPage * $numb - $numb;
		return $this->position;
	}

	/*
	* Hàm tính tổng số trang cần có
	* $numb là số sản phẩm 1 trang
	* Tổng số trang = Tổng sản phẩm / $numb và làm tròn trên
	* VD: tổng sản phẩm = 10, $numb = 4 => tổng số trang 3
	*/
	public function totalPage($numb = 4)
	{
		//Câu Select
        $sql = "SELECT COUNT(id) AS COUNT FROM $this->table";
        //Thực thi câu lệnh
        $runSql = $this->db->QueryResult($sql);

        //Lấy kết quả
        $result = $runSql->fetchAll(PDO::FETCH_CLASS);

        //Tính số trang cần có = tổng sản phẩm / số sản phẩm 1 trang
        $totalOfPage = ($result[0]->COUNT / $numb);
        //echo $result[0]->COUNT;

        if($totalOfPage <= 1) {
            return 1;
        } else {
        	if ($result[0]->COUNT % $numb == 0) {
        		return round($totalOfPage,0,PHP_ROUND_HALF_UP);
        	} else {
        		return round($totalOfPage+0.5,0,PHP_ROUND_HALF_UP);
        	}
        }
	}
}
 ?>