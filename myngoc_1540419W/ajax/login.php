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
	

		$email = ($_REQUEST['email']);
		$pass = ($_REQUEST['pass']);
		$sql = "select * from #_user where email='".$email."'";
		$d->query($sql);
		if($d->num_rows() == 1){
			$row = $d->fetch_array();
			if(($row['password'] == md5($pass)) && ($row['role'] == 1)){
				$_SESSION['nguyenngoctan'] = true;
				$_SESSION['login']['email'] = $email;
				$_SESSION['login']['hoten'] = $row['hoten'];
				$_SESSION['login']['id'] = $row['id'];
				
			
				$_SESSION['login']['contact_phone'] = $row['dienthoai'];
				$_SESSION['login']['contact_address'] = $row['email'];
				
				$_SESSION['login']['user'] = $row['user'];
				$_SESSION['login']['mauser'] = $row['mauser'];
				
				
				$_SESSION['login']['trangthai'] = 'now';
				$_SESSION['login']['mess'] = 'Đăng nhập thành công!';
			
			
			//Set Cookie
				setcookie("id", $row['id'], time()+86400,'/');
				setcookie("secretkey", $row['randomkey'], time()+86400,'/');
			
				
				echo 1;
			}
		}else{
			echo 0;
		}

	
	?>
