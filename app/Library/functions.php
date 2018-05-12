<?php 
// Tạo tên định danh không dấu
function alias($str)
{
	$str = str_replace("'", "", $str);
	$str = str_replace('"', "", $str);
	$str = str_replace('(', "", $str);
	$str = str_replace(')', "", $str);
	$str = str_replace('!', "", $str);
	$str = str_replace('$', "", $str);
	$str = noneUnicode($str);
	$str = str_replace(" ", "-", $str);
	$str = str_replace('----', "-", $str);
	$str = str_replace('---', "-", $str);
	$str = str_replace('--', "-", $str);
	
	return $str;
}

// Khử dấu tiếng Việt
function noneUnicode($str)
{
	$arr = array(
		'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		'd' => 'đ|Đ',
		'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
		'o' => 'ó|ò|ỏ|õ|ọ|ô|ồ|ố|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
	);
	foreach ($arr as $khongdau => $codau) {
		$a = explode("|", $codau);
		$str = mb_convert_case(str_replace($a, $khongdau, $str), MB_CASE_LOWER);
		// MB_CASE_UPPER | MB_CASE_TITLE | MB_CASE_LOWER
	}
	return $str;
}

// Upload file hình ảnh
function uploadImg($file, $upload_url)
{
	$extension = 'jpg|jpeg|png|gif';
	if (isset($_FILES[$file]) && !$_FILES[$file]['error']) {
		$ext = end(explode(".", $_FILES[$file]['name']));
		$name = basename($_FILES[$file]['name'], ".".$ext);
		$newname = $name.'-'.time();
		if (stripos($extension, $ext) === false) {
			echo 'Chỉ hỗ trợ upload file hình ảnh';
		}
		if (file_exists($upload_url.$newname.'.'.$ext)) {
			for ($i=0; $i < 10; $i++) { 
				if (!file_exists($upload_url.$newname.$i.'.'.$ext)) {
					$_FILES[$file]['name'] = $newname.$i.'.'.$ext;
					break;
				}
			}
		} else {
			$_FILES[$file]['name'] = $newname.'.'.$ext;
		}

		if (!copy($_FILES[$file]["tmp_name"], $upload_url.$_FILES[$file]['name'])) {
			if ( !move_uploaded_file($_FILES[$file]["tmp_name"], $upload_url.$_FILES[$file]['name']))	{
				return false;
			}
		}
		return $_FILES[$file]['name'];
	}
	return false;
}

// Xoá file hình ảnh
function deleteImg($filename)
{
	return @unlink($filename);
}
