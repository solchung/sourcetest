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
	
	$captcha = $_POST['token'];
	$email = $_POST['email'];
	$first_name = $_POST['first_name'];
	$noidung = $_POST['noidung'];
	$sex = $_POST['sex'];
	$diachi = $_POST['diachi_newsletter'];
	$khoahoc_name= $_POST['khoahoc_name'];
	$thoigianbd= $_POST['thoigianbd'];
	$thoigiankt= $_POST['thoigiankt'];
	
	
	
	if(!$captcha){
		echo 0;
		exit;
    }
	$secretKey = $config_secret;
	$ip = $_SERVER['REMOTE_ADDR'];
	
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array('secret' => $secretKey, 'response' => $captcha);

	$options = array(
	'http' => array(
	  'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	  'method'  => 'POST',
	  'content' => http_build_query($data)
	)
	);
	  
	$context  = stream_context_create($options);
	$response = file_get_contents($url, false, $context);
	$responseKeys = json_decode($response,true);
	header('Content-type: application/json');  
	
	if($responseKeys["success"] && $responseKeys["score"] >= 0.5) {
	

		
	// $sql = "select * from #_newsletter where email='$email'";
	// $d->query($sql);

	// if($d->num_rows()>0){
		// echo 1;return;	
	// }
	

	$d->reset();
	$sql = "insert into #_newsletter (email,hoten,sex,stt,hienthi,ngaytao,noidung,diachi,khoahoc,ngaybatdau,ngayketthuc) value('$email','$first_name','$sex',1,1,".time().",'$noidung','$diachi','$khoahoc_name','$thoigianbd','$thoigiankt')";
	if($d->query($sql))
	{
		echo 2;
	}
	else 
	{ 
		echo 3;
	}
	
	}else{
		echo 0;
	}
	
?>