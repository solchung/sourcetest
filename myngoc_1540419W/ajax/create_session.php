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
	
		$buoc1_value = ($_REQUEST['buoc1_value']);
		$buoc2_value = ($_REQUEST['buoc2_value']);
		$buoc3_value = ($_REQUEST['buoc3_value']);
		$buoc4_value0 = ($_REQUEST['buoc4_value0']);
		$buoc4_value1 = ($_REQUEST['buoc4_value1']);
		$buoc4_value2 = ($_REQUEST['buoc4_value2']);
		$buoc5_value = ($_REQUEST['buoc5_value']);
		$ten = ($_REQUEST['ten']);

		$email = ($_REQUEST['email']);
		$dienthoai = ($_REQUEST['dienthoai']);
	
		$_SESSION['dutinh']['buoc1_value'] = $buoc1_value;
		$_SESSION['dutinh']['buoc2_value'] = $buoc2_value;
		$_SESSION['dutinh']['buoc3_value'] = $buoc3_value;
		$_SESSION['dutinh']['buoc4_value0'] = $buoc4_value0;
		$_SESSION['dutinh']['buoc4_value1'] = $buoc4_value1;
		$_SESSION['dutinh']['buoc4_value2'] = $buoc4_value2;
		$_SESSION['dutinh']['buoc5_value'] = $buoc5_value;
		$_SESSION['dutinh']['ten'] = $ten;
		$_SESSION['dutinh']['email'] = $email;
		$_SESSION['dutinh']['dienthoai'] = $dienthoai;
			
				
		$res = array();
		$res['kt'] = 1;
		echo json_encode($res);
		

	
	?>
