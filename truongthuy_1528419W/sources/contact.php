<?php if(!defined('_source')) die("Error");
		$title_bar= _lienhe;
		if(!empty($_POST)  && isset($_POST['recaptcha_response'])){
			// Build POST request:
			$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
			$recaptcha_secret = $config_secret;
			$recaptcha_response = $_POST['recaptcha_response'];
		
			// Make and decode POST request:
			$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
			$recaptcha = json_decode($recaptcha);
			
			if ($recaptcha->score >= 0.5) {
                            
			} else {
				
				transfer('Vượt quá số lần gửi mail. Vui lòng thực hiện lại sau vài phút','//'.$config_url.'/lien-he');
			}

			
			
			$data["hoten"] = magic_quote($_POST["ten"]);
			$data['diachi'] = magic_quote($_POST['diachi']);
			$data['dienthoai'] = magic_quote($_POST['dienthoai']);
			$data['email'] = magic_quote($_POST['email']);
			$data['tieude'] = magic_quote($_POST['tieude1']);
			$data['noidung'] = magic_quote($_POST['noidung']);		
			$data['ngaytao'] = time();
			$data['stt'] = 1;
			$data['hienthi'] = 1;
			
			
			//$d->setTable('contact');
			
			$subject = "Thư liên hệ từ ".$row_setting["title_$lang"];
			$body = '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thư liên hệ từ website '.$row_setting["ten_$lang"].'</th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Họ tên :</th><td>'.$_POST["ten"].'</td>
				</tr>
				<tr>
					<th>Địa chỉ :</th><td>'.$_POST['diachi'].'</td>
				</tr>
				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
				</tr>
				<tr>
					<th>Email :</th><td>'.$_POST['email'].'</td>
				</tr>
				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
				</tr>';
			$body .= '</table>';
			
					
			$d->setTable('contact');
			if($d->insert($data));
			
			include_once "phpmailer/class.phpmailer.php";


				 //Khởi tạo đối tượng
        $mail = new PHPMailer();
        //Thiet lap thong tin nguoi gui va email nguoi gui
        $mail->IsSMTP(); // Gọi đến class xử lý SMTP
        $mail->SMTPAuth = true;                  // Sử dụng đăng nhập vào account
        $mail->Host = $row_setting["iphost"];     // Thiết lập thông tin của SMPT
        $mail->Username = $row_setting["usernameaccount"]; // SMTP account username
        $mail->Password = $row_setting["password"];           // SMTP account password
        $mail->SetFrom($row_setting["mailhost"], $row_setting["ten_$lang"]);

        //Thiết lập thông tin người nhận
        $mail->AddAddress($_POST['email'], $_POST["ten"]);
        $mail->AddAddress($row_setting['email'], $row_setting["ten_$lang"]);

        //Thiết lập email nhận email hồi đáp
        //nếu người nhận nhấn nút Reply
        $mail->AddReplyTo($row_setting['email'], $row_setting["ten_$lang"]);


/*=====================================
 * THIET LAP NOI DUNG EMAIL
 *=====================================*/

//Thiết lập tiêu đề
$mail->Subject    = "Thông tin liên hệ";

//Thiết lập định dạng font chữ
$mail->CharSet = "utf-8";

$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";

//Thiết lập nội dung chính của email
$mail->MsgHTML($body);

if(!$mail->Send()) {
 			 transfer( "Có lỗi xảy ra!",'//'.$config_url.'/lien-he');
} else {
			 
			transfer("Gửi liên hệ thành công!<br/>",'//'.$config_url.'/lien-he');	
}	
		}

		$d->reset();
		$sql_contact = "select noidung_$lang,mota_$lang,ten_$lang,keyword_$lang,description_$lang,h1_$lang,h2_$lang,photo from #_info where com='lienhe' ";
		$d->query($sql_contact);
		$company_contact = $d->fetch_array();
		
		if($company_contact["keyword_$lang"]!='')
		$row_setting["keywords_$lang"]=$company_contact["keyword_$lang"];
		if($row["description_$lang"]!='')
		$row_setting["description_$lang"]=$company_contact["description_$lang"];

		if($company_contact["title_$lang"]!='')
		$row_setting["h1_$lang"]=$company_contact["title_$lang"];		

		if($company_contact["title_$lang"]!='')
		$row_setting["h2_$lang"]=$company_contact["title_$lang"];	
		if($company_contact["title_$lang"]!='')
		{
				$title_bar=$company_contact["title_$lang"];		
				$title_tcat=$company_contact["title_$lang"];	
		}
		else
			
		{
				$title_bar=$com_title;		
				$title_tcat=$com_title;		
				
		}


		$d->reset();
		$sql="select id,ten_$lang, mota_$lang, toado from #_bando where hienthi=1 and com='bando' order by stt,id desc limit 0,4";
		$d->query($sql);
		$map=$d->result_array();



		

		$d->reset();
		$sql_banner_giua = "select banner_$lang from #_banner where com='banner_top' ";
		$d->query($sql_banner_giua);
		$row_logo = $d->fetch_array();
		
			$image=$http.$config_url."/"._upload_hinhanh_l.$row_logo["banner_$lang"]."";
		if($company_contact["photo"]!=""){
			$image=$http.$config_url."/"._upload_info_l.$company_contact["photo"]."";
		}	
		$url_web= getCurrentPageURL();

		$description_web=strip_tags($row_setting["title_$lang"]);
			



	
?>