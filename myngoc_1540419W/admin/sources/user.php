<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "login":
		if(!empty($_POST)) login();
		$template = "user/login";
		break;
	case "admin_edit":
		edit();
		$template = "user/admin_add";
		break;
	case "logout":
		logout();
		break;	
	case "man":
		get_items();
		$template = "user/items";
		break;
	case "add":
		$template = "user/item_add";
		break;
	case "edit":
		get_item();
		$template = "user/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	default:
		$template = "index";
}

//////////////////
function get_items(){
	global $d, $items, $paging;
	
	$sql = "select * from #_user where role=1 order by username";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=user&act=man";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=user&act=man");
	
	$sql = "select * from #_user where id='".$id."' and role=1";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=user&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=user&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
		$id =  themdau($_POST['id']);
		
		// kiem tra
		$d->reset();
		$d->setTable('user');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()>0){
			$row = $d->fetch_array();
			if($row['role'] != 1) transfer("Bạn không có quyền trên tài khoản này.<br>Mọi thắc mắc xin liên hệ quản trị website.", "index.php?com=user&act=man");
		}
		
		// kiem tra ten trung
		$d->reset();
		$d->setTable('user');
		$d->setWhere('username', $_POST['username']);
		$d->select();
		if($d->num_rows()>0) transfer("Tên dăng nhập nay đã có.<br>Xin chọn tên khác.", "index.php?com=user&act=edit&id=".$id);
		
		
		$data['username'] = $_POST['username'];
		if($_POST['password']!="")
			$data['password'] = encrypt_password($_POST['password']);
		$data['email'] = $_POST['email'];
		$data['hoten'] = $_POST['hoten'];
		$data['sex'] = $_POST['sex'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['nick_yahoo'] = $_POST['nick_yahoo'];
		$data['nick_skype'] = $_POST['nick_skype'];
		$data['diachi'] = $_POST['diachi'];
		$data['congty'] = $_POST['congty'];
		$data['country'] = $_POST['country'];
		$data['city'] = $_POST['city'];
		
		$d->reset();
		$d->setTable('user');
		$d->setWhere('id', $id);
		$d->setWhere('role', 1);
		if($d->update($data))
			transfer("Dữ liệu đã được cập nhật", "index.php?com=user&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=user&act=man");
	
	}else{ // them moi
	
		// kiem tra ten trung
		$d->reset();
		$d->setTable('user');
		$d->setWhere('username', $_POST['username']);
		$d->select();
		if($d->num_rows()>0) transfer("Tên dăng nhập nay đã có.<br>Xin chọn tên khác.", "index.php?com=user&act=edit&id=".$id);
		
		if($_POST['password']=="") transfer("Chưa nhập mật khẩu", "index.php?com=user&act=add");
		
		$data['username'] = $_POST['username'];
		$data['password'] = encrypt_password($_POST['password']);
		$data['email'] = $_POST['email'];
		$data['hoten'] = $_POST['hoten'];
		$data['sex'] = $_POST['sex'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['nick_yahoo'] = $_POST['nick_yahoo'];
		$data['nick_skype'] = $_POST['nick_skype'];
		$data['diachi'] = $_POST['diachi'];
		$data['congty'] = $_POST['congty'];
		$data['country'] = $_POST['country'];
		$data['city'] = $_POST['city'];
		$data['role'] = 1;
		$data['com'] = "user";
		
		$d->setTable('user');
		if($d->insert($data))
			transfer("Dữ liệu đã được lưu", "index.php?com=user&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=user&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		// kiem tra
		$d->reset();
		$d->setTable('user');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()>0){
			$row = $d->fetch_array();
			if($row['role'] != 1) transfer("Bạn không có quyền trên tài khoản này.<br>Mọi thắc mắc xin liên hệ quản trị website.", "index.php?com=user&act=man");
		}
		
		// xoa item
		$sql = "delete from #_user where id='".$id."'";
		if($d->query($sql))
			transfer("Dữ liệu đã được xóa", "index.php?com=user&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=user&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=user&act=man");
}


///////////////////////
/*function edit(){
	global $d, $item, $login_name;
	
	if(!empty($_POST)){
		$sql = "select * from #_user where username!='".$_SESSION['login']['username']."' and username='".$_POST['username']."' and role=3";
		$d->query($sql);
		if($d->num_rows() > 0) transfer("Tên đăng nhập này đã có","index.php?com=user&act=edit");
		
		$sql = "select * from #_user where username='".$_SESSION['login']['username']."'";
		$d->query($sql);
		if($d->num_rows() == 1){
			$row = $d->fetch_array();
			if($row['password'] != encrypt_password($_POST['oldpassword'])) transfer("Mật khẩu không chính xác","index.php?com=user&act=edit");
		}else{
			die('Hệ thống bị lỗi. Xin liên hệ với admin. <br>Cám ơn.');
		}
		
		$data['username'] = $_POST['username'];
		if($_POST['new_pass']!="") 
			$data['password'] = encrypt_password($_POST['new_pass']);
		$data['hoten'] = $_POST['hoten'];
		$data['email'] = $_POST['email'];
		$data['nick_yahoo'] = $_POST['nick_yahoo'];
		$data['nick_skype'] = $_POST['nick_skype'];
		$data['dienthoai'] = $_POST['dienthoai'];
		
		$d->reset();
		$d->setTable('user');
		$d->setWhere('username', $_SESSION['login']['username']);
		if($d->update($data)){
			session_unset();
			transfer("Dữ liệu đã được lưu.","index.php");
		}
	}
	
	$sql = "select * from #_user where username='".$_SESSION['login']['username']."'";
	$d->query($sql);
	if($d->num_rows() == 1){
		$item = $d->fetch_array();
	}
}*/


function edit(){
	global $d, $item, $login_name;
	if(!empty($_POST)){
		$sql = "select * from #_user where username='".$_SESSION['login']['username']."'";
		$d->query($sql);
		if($d->num_rows() == 1){
			$row = $d->fetch_array();
			if($row['password'] != encrypt_password($_POST['oldpassword'])) transfer("Mật khẩu không chính xác","index.php?com=user&act=admin_edit");
		}else{
			die('Hệ thống bị lỗi. Xin liên hệ với admin. <br>Cám ơn.');
		}
		if($_POST['new_pass']!="") 
			$data['password'] = encrypt_password($_POST['new_pass']);
			
		$data['username'] = $_POST['username'];	
		$data['hoten'] = $_POST['hoten'];
		$data['email'] = $_POST['email'];
		$data['dienthoai'] = $_POST['dienthoai'];
		
		$d->reset();
		$d->setTable('user');
		$d->setWhere('username', $_SESSION['login']['username']);
		if($d->update($data)){
			session_unset();
			transfer("Dữ liệu đã được lưu.","index.php?com=user&act=admin_edit");
		}
	}
	
	$sql = "select * from #_user where username='".$_SESSION['login']['username']."'";
	$d->query($sql);
	if($d->num_rows() == 1){
		$item = $d->fetch_array();
	}
}
	
function login(){
	global $d, $login_name,$config;
	
	$username = magic_quote($_POST['username']);
	$password = magic_quote($_POST['password']);
	$ip = getRealIPAddress();
			//Kiểm tra có IP bị khóa login hay không
			$sql = "select id,login_ip,login_attempts,attempt_time,locked_time from #_user_limit WHERE login_ip =  '$ip'  ORDER BY id DESC LIMIT 1 ";
			$d->query($sql);
			
			if($d->num_rows() == 1){				
			$row = $d->result_array();	
		
			$id_login = $row[0]['id'];			
			$time_now = time();
			//Kiểm tra thời gian bị khóa đăng nhập
			if($row[0]['locked_time']>0){
			$locked_time = $row[0]['locked_time'];		   
			$delay_time = $config['login']['delay'];
			$interval = $time_now  - $locked_time;
			if($interval <= $delay_time*60){
			$time_remain = $delay_time*60 - $interval;
			$msg = "Xin lỗi..!Vui lòng thử lại sau ". round($time_remain/60)." phút..!";
			transfer($msg, "index.php?com=user&act=login");
			
			}else{				        	       
			$sql="update #_user_limit set login_attempts = 0,attempt_time = '$time_now' ,locked_time = 0 where id = '$id_login'";
			$d->query($sql);			          
			}	
			}		   
			}
	
	$sql = "select * from #_user where username='".$username."'";
	$d->query($sql);
	if($d->num_rows() == 1){
		$row = $d->fetch_array();
		if(($row['password']== encrypt_password($password)) && ($row['role'] == 3)){
		//----kiem tra dang nhap---//
			$timenow = time();
			$id_user = $row['id'];
			$ip= getRealIPAddress();
			$user_agent = $_SERVER['HTTP_USER_AGENT'];
		//Ghi log truy cập thành công
			$sql="insert into #_user_log (id_user,ip,timelog,user_agent) values ('$id_user','$ip','$timenow','$user_agent')";
			$d->query($sql);
		//Tạo token và login session			
			$cookiehash = md5(sha1($row['password'].$row['username']));
			$token = md5(time());
			$sql = "update #_user SET login_session= '$cookiehash', lastlogin = '$timenow', user_token = '$token'  WHERE id ='$id_user'";
			$d->query($sql);	
			$_SESSION['login_session'] = $cookiehash;
			$_SESSION['login_token'] = $token;
		//----eND kiem tra dang nhap---//
			
			$_SESSION[$login_name] = true;
			$_SESSION['isLoggedIn'] = true;
			$_SESSION['login']['username'] = $username;
			$_SESSION['login']['id'] = $row['id'];
		//Login thành công thì reset số lần login sai và thời gian khóa	
			$d->reset();
			$sql = "select id,login_ip,login_attempts,attempt_time,locked_time from #_user_limit where login_ip =  '$ip'  order by  id desc limit 1";
			$d->query($sql);
			if($d->num_rows()==1){
				$row_limitlogin = $d->result_array();
				$id_login = $row_limitlogin[0]['id'];						
				$sql="update #_user_limit set login_attempts = 0,locked_time = 0 where id = '$id_login'";
				$d->query($sql);
			}
			
			transfer("Đăng nhập thành công","index.php");
		}else{
			
			
			$d->reset();
			$sql = "select id,login_ip,login_attempts,attempt_time,locked_time from #_user_limit where login_ip =  '$ip'  order by  id desc limit 1";
			$d->query($sql);			
			if($d->num_rows()==1){//Trường hơp đã tồn tại trong database				
			$row = $d->result_array();				
			$id_login = $row[0]['id'];
			$attempt =$row[0]['login_attempts'];//Số lần thực hiện
			$noofattmpt = $config['login']['attempt'];//Số lần giới hạn
			if($attempt<$noofattmpt){//Trường hợp còn trong giới hạn
			$attempt = $attempt +1;					
			$sql="update #_user_limit set login_attempts = '$attempt' where id = '$id_login'";
			$d->query($sql);					
			$no_ofattmpt =  $noofattmpt+1;
			$remain_attempt = $no_ofattmpt - $attempt;
			$msg = 'Sai thông tin. Còn '.$remain_attempt.' lần thử!';
			}else{//Trường hợp vượt quá giới hạn
			if($row[0]['locked_time']==0){
			$attempt = $attempt +1;
			$timenow = time();
			$sql="update #_user_limit set login_attempts = '$attempt' ,locked_time = '$timenow' where id = '$id_login'";
			$d->query($sql);	                  
			}else{
			$attempt = $attempt +1;	                  
			$sql="update #_user_limit set login_attempts = '$attempt' where id = '$id_login'";
			$d->query($sql);
			}

			$delay_time = $config['login']['delay'];
			$msg = "Bạn đã hết lần thử. Vui lòng thử lại sau ".$delay_time." phút!";
			}
			}else{//Trường hợp IP lần đầu tiên đăng nhập sai
			$timenow = time();
			$d->reset();
			$sql="insert into #_user_limit (login_ip,login_attempts,attempt_time,locked_time) values('$ip',1,'$timenow',0)";
			$d->query($sql);
			$remain_attempt = $config['login']['attempt'];
			$msg = 'Sai thông tin. Còn '.$remain_attempt.' lần thử!';	
			
			}transfer($msg, "index.php?com=user&act=login");	
		}
		
	}
	transfer("Tên đăng nhập, mật khẩu không chính xác", "index.php?com=user&act=login");
}

function logout(){
	global $login_name;
	$_SESSION[$login_name] = false;
	transfer("Đăng xuất thành công", "index.php?com=user&act=login");
}
?>