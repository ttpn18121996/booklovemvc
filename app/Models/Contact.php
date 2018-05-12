<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Contact extends Model
{

	// Hàm khởi tạo
	public function __construct()
	{
		parent::__construct();
		$this->table = "tb_contact";
	}

	/*
	* Hàm gửi mail
	* $title là tiêu đề mail
	* $content là nội gửi mail
	* $mTo là mail người nhận
	* $cc là địa chỉ chuyển tiếp
	*/
	public function sendMail($title, $content, $cc='')
	{
		require 'app/vendor/autoload.php';

		$mail = new PHPMailer(true);
		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'storagejavfc@gmail.com';                 // SMTP username
		    $mail->Password = '01264196421';                           // SMTP password
		    $mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('storagejavfc@gmail.com', 'Love Book');
		    $mail->addAddress('ttpn18121996@gmail.com');     // Add a recipient
		    
		    $ccmail = explode(',', $cc);
			$ccmail = array_filter($ccmail);
			if(!empty($ccmail)){
				foreach ($ccmail as $k => $v) {
					$mail->addCC($v);
				}
			}

		    //Content
		    $mail->CharSet = ("UTF-8");
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $title;
		    $mail->Body    = $content;

		    $mail->send();
		    if(!$mail->send()) {
				return 0;
			} else {
				return 1;
			}
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}

	/*
	* Hàm lấy danh sách liên hệ từ khách hàng
	* $numb là số record trong 1 trang
	*/
	public function getList($numb = 4, $module = "lien-he")
	{
		$rs = $this->where("module", $module)->orderBy('id desc')->paginate($this->positionPage($numb), $numb);
		return $rs;
	}

	/*
	* Hàm lấy thông tin cho tiết của liên hệ từ khách hàng
	* $id là id của thông tin cần lấy
	*/
	public function getDetail($id)
	{
		$rs = $this->where("id", $id)->getFirst();
		return $rs;
	}
}
 ?>