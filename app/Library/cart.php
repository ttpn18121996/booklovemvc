<?php 
class Cart
{
	public static function Add($arr)
	{
		// Chèn thêm số lượng vào mảng
		$dem = count($arr);
		$array = array('quantity' => 1);
		$arr = array_merge($arr[$dem-1],$array);

		if (empty($_SESSION['cart'])) {
			$_SESSION['cart'] = array();
		}
		if (empty($_SESSION['cart'])) {
			array_push($_SESSION['cart'], $arr);
		} else {
			// Đếm số sản phẩm trong giỏ hàng
			$count = count($_SESSION['cart']);
			
			for ($i=0; $i < $count; $i++) { 
				if (empty($_SESSION['cart'][$i])) {
					$count++;
					continue;
				}
				if ($arr['id'] == $_SESSION['cart'][$i]['id']) {
					$_SESSION['cart'][$i]['quantity']++;
					break;
				}
				if ($i + 1 == $count) {
					array_push($_SESSION["cart"],$arr);
				}
			}
		}
		$arr_rs = array('total' => count($_SESSION['cart']), 'totalBill' => number_format(self::TotalBill()));
		return $arr_rs;
	}

	// Hàm tính tổng hoá đơn
	public static function TotalBill()
	{
		include_once 'app/Models/Product.php';
		$proModel = new Product();
		$totalBill = 0;
		if (isset($_SESSION['cart'])) {
			$ltID = array();
			$ltquantity = array();
			$count = count($_SESSION['cart']);

			for ($i=0; $i < $count; $i++) { 
				if (empty($_SESSION['cart'][$i])) {
					$count++;
					continue;
				}
				$ltID[] = $_SESSION['cart'][$i]['id'];
				$ltquantity[] = $_SESSION['cart'][$i]['quantity'];
			}
			$pro_cart = $proModel->whereIn($ltID)->orderBy("FIELD(id, ".join(",",$ltID).")")->getArray();
			
			for ($i=0; $i < count($pro_cart); $i++) { 
				$totalBill += $pro_cart[$i]['real_price']*$ltquantity[$i];
			}
			
		}
		return $totalBill;
	}

	public static function Remove($id)
	{
		$count = count($_SESSION['cart']);
		for ($i=0; $i < $count; $i++) { 
			if (empty($_SESSION['cart'][$i])) {
				$count++;
				continue;
			}
			if ($id == $_SESSION['cart'][$i]['id']) {
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		return true;
	}

	public static function Update($id, $quantity)
	{
		$count = count($_SESSION['cart']);
		for ($i=0; $i < $count; $i++) { 
			if (empty($_SESSION['cart'][$i])) {
				$count++;
				continue;
			}
			if ($id == $_SESSION['cart'][$i]['id']) {
				$_SESSION['cart'][$i]['quantity'] = $quantity;
				break;
			}
		}
		return true;
	}
}
