<?php
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$session=session_id();
	@define ( '_template' , '../templates/');
	@define ( '_source' , '../sources/');
	@define ( '_lib' , '../libraries/');
	@define ( _upload_folder , '../media/upload/' );
	
	//Lưu ngôn ngữ chọn vào $_SESSION
	$lang_arr=array("vi","en","ge");
	if (isset($_GET['lang']) == true){
        if (in_array($_GET['lang'], $lang_arr)==true){
            $lang = $_GET['lang'];
            $_SESSION['lang']=$lang;
		  header('Location: '.$_SERVER['HTTP_REFERER']);
        } 
	}
    if(isset($_SESSION['lang'])){
        $lang= $_SESSION['lang'];
    }else{
        $lang="vi";
    }
	require_once _source."lang_$lang.php";	
	
    include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."functions_giohang.php";
	
	include_once _lib."library.php";
	include_once _lib."class.database.php";	
	
	include_once _lib."file_requick.php";
	$d = new database($config['database']);
	

	if(@strtolower($_REQUEST['code']) == strtolower($_SESSION['random_number']))
	{
		
		
	
	$d->reset();
	$sql="select id,hoten,email,mauser,dienthoai from #_user where hienthi=1 and email='".$_REQUEST["email"]."' and com='member' order by stt,id desc";
	$d->query($sql);
	$info_member=$d->result_array();

	
	// kiem tra email dang ki
	$d->reset();
	$d->setTable('user');
	$d->setWhere('email', $_REQUEST['email']);
	$d->select();
	if($d->num_rows()<>1){
		echo 2;	
		exit();
	}
	
	
	
	
	$email=($_REQUEST['email']);
	$string = md5(rand(0,999)*time());
	$newpass = substr($string, 15, 6);
	
	
	$d->reset();
	$data['password'] = md5($newpass);
	$d->setTable('user');
	$d->setWhere('email', ($_REQUEST['email']));
	$d->update($data);
	
	

		
	//include_once _lib."C_email.php";
	$subject = "Lấy lại mật khẩu tại ";
			
$body = '<table style="text-align:center;">';
			$body .= '
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				
				<tr  padding:10px; height:100px; margin:0 auto; width:100%;">
				
		<td colspan="2"><img src="http://'.$config_url.'/'._upload_hinhanh_l.$row_logo["banner_$lang"].'" style="height:62px;  "/></td>
														
				</tr>
				
				
				<tr>
				
				<p class="MsoNormal"><span style="font-size:10.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><u></u>&nbsp;<u></u></span></p>
				
				
					<p class="MsoNormal" align="center" style="text-align:center"><span style="font-size:13.5pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">THÔNG TIN LẤY LẠI MẬT KHẨU </span><span style="font-size:10.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><br>
</span><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Được gởi
từ hệ thống của <span style="color:#1f497d">'.$row_setting["ten_$lang"].'</span> - <span style="color:#1f497d">'.$row_setting["website"].'</span> </span><span style="font-size:10.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><u></u><u></u></span></p>	
				
				</tr>
				
				
			
		<tr>
			  <td colspan="2" style="border:none;background:#f3ebc3;padding:7.5pt 7.5pt 7.5pt 7.5pt">
			  <p class="MsoNormal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Tài khoản của bạn là '.$_REQUEST['email'].' . Dưới đây là thông tin tài khoản mơi được cấp mới: </b> <br>
			 
			  <br>
			  Email truy cập : <a href="mailto:'.$_REQUEST['email'].'">'.$_REQUEST['email'].'</a> <br>
			 Mật khẩu mới của bạn là: : '.$newpass.' 	<br>	
			 
			 	Mã Số Thành Viên:'.$info_member[0]["mauser"].'
			 
			 </td>
 		
		
		</tr>
				
				
		
				
				
			<tr>
				  <td colspan="2" style="border:none;padding:7.5pt 7.5pt 7.5pt 7.5pt">
				  <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
				   <tbody><tr>
					<td width="100%" valign="top" style="width:100%;padding:1.5pt 1.5pt 1.5pt 1.5pt">
					<p class="MsoNormal">'.$row_setting["diachi_$lang"].'</p>
					</td>
					
				   </tr>
				  </tbody></table>
				  </td>
 			</tr>
			
			
				<hr>
				
				
				<tr>
					<td colspan="2">'.$row_setting["mailphanhoi_$lang"].'</td>
				</tr>
				
		
				
				<tr>
					<td colspan="2">Lưu ý: Đây chỉ là thư thông báo. Các hồi đáp lại thông báo này sẽ không được theo dõi hoặc giải đáp.</td>
				</tr>
				';
			$body .= '</table>';
			
		
			
			include_once "../phpmailer/class.phpmailer.php";
		//Khởi tạo đối tượng
		$mail = new PHPMailer();
		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->SMTPAuth   = true;                
		
		
		
		// Sử dụng đăng nhập vào account
		
		$mail->Host       = $row_setting["iphost"];  // tên SMTP server
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Username   = $row_setting["usernameaccount"];// SMTP account username
		$mail->Password   = $row_setting["password"];   

		

		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom($row_setting["mailhost"],$row_setting["ten_$lang"]);

		//Thiết lập thông tin người nhận
		$mail->AddAddress($_REQUEST['email'], $info_member[0]['hoten']);


		//Thiết lập email nhận email hồi đáp
		//nếu người nhận nhấn nút Reply
		//$mail->AddReplyTo($row_setting['email'],$row_setting['ten']);

		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
		 *=====================================*/

		//Thiết lập tiêu đề
		$mail->Subject    = "Lấy lại mật khẩu";

		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";

		$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";

		//Thiết lập nội dung chính của email
		$mail->MsgHTML($body);

		if(!$mail->Send())
		{
					echo 2;
		}
		else 
		{
					 
					echo 1;	
		}	
		
	}
		
		else
		{
			echo 0; // invalid code
		}

		
	
	?>
