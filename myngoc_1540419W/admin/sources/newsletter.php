<?php	
if(isset($_POST) && isset($_SESSION[$login_name])){
	if($_SESSION[$login_name]==false)
	{
		redirect("index.php");	
	}
}
if(!defined('_source')) die("Error");
$urldanhmuc ="";
$url_back=$_SERVER['HTTP_REFERER'];
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=@$_REQUEST['id'];
switch($act){
	case "man":
		get_mails();
		$template = "newsletter/items";
		break;
	
	case "add":

		$template = "newsletter/item_add";
		break;
	
	case "edit":
		get_mail();
		$template = "newsletter/item_add";
		break;	
		
	case "send":
		send();
		break;
	
	case "save":
		save_mail();
		break;	
	
	case "delete":
		delete();
		break;	

		
	default:
		$template = "index";
}
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}
function get_mails()
{
	global $d, $items, $paging, $url_back;
	

	
	
	if(!empty($_POST))
	{
		$multi=$_REQUEST['multi'];
		$id_array=$_POST['chon'];
		$count=count($id_array);
		
		if($multi=='show')
		{
			for($i=0;$i<$count;$i++)
			{
				$sql = "UPDATE table_newsletter SET hienthi =1 WHERE  id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				
			}
			redirect("index.php?com=newsletter&act=man");			
		}
		
		
		if($multi=='hide')
		
		{
			
			for($i=0;$i<$count;$i++)
			{

				$sql = "UPDATE table_newsletter SET hienthi =0 WHERE  id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				
			}
			redirect("index.php?com=newsletter&act=man");			
		}
		
		
		
		
		
		
		if($multi=='del')
		{
			for($i=0;$i<$count;$i++)
			{
				$sql="SELECT * FROM table_newsletter where id='".$id_array[$i]."'";
				$d->query($sql);
				$cats= $d->fetch_array();
				
				
			
				$sql = "delete from table_newsletter where id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");		
				
				
				
				
			}
			redirect("index.php?com=newsletter&act=man");			
		}
		
		
		
		if($multi=='send_newsletter')
		{


	

	$file_name= changeTitle($_FILES['file']['name']);
	
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=newsletter&act=man");
	
	if($file = upload_image("file", 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF', _upload_hinhanh,$file_name)){
		$data['file'] = $file;
	}
	
	
	
	
	$d->setTable('setting');
	$d->select();
	$company_mail = $d->fetch_array();
	
	include_once "../phpmailer/class.phpmailer.php";	
		

		$mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = $company_mail["iphost"]; // tên SMTP server
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Username   = $company_mail["usernameaccount"]; // SMTP account username
		$mail->Password   = $company_mail["password"];
		
		


		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom($company_mail["mailhost"], $company_mail["title_vi"]);

		
		
	
		
		for ($i=0 ; $i<($count) ; $i++)		
		{
				
			$d->reset();
			$sql = "select email,id from #_newsletter where id='".$id_array[$i]."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
				
				$mail->AddAddress($row['email'], $company_mail['title_vi']);
				}
			
			}
		}

			

				
		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
 		*=====================================*/

		//Thiết lập tiêu đề
		$mail->Subject    = '['.$_POST['FullName'].']';
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	
		$body = str_replace('\"','"',$_POST['Content']);
		
		$mail->Body = $body;
		
		
		
		
		if($data['file'])
		{
		$mail->AddAttachment(_upload_hinhanh.$data['file']);
		}
		
		
		
		if($mail->Send())
		transfer("Email đã được gửi đi.", "index.php?com=newsletter&act=man");
		else
		transfer("Hệ thống bị lỗi, xin thử lại sau.", "index.php?com=newsletter&act=man");
	
	}	
	
		
		
	}
		
		
		
	
	
	
	#----------------------------------------------------------------------------------------
	if(@$_REQUEST['hienthi']!='')
	{
	$id_up = @$_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_newsletter where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_newsletter SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_newsletter SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	redirect($url_back);
	}
	#-------------------------------------------------------------------------------
	

	$sql = "select * from #_newsletter order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=ewsletter&act=man".$urldanhmuc;
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_mail(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=newsletter&act=man");
	
	$sql = "select * from #_newsletter where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=newsletter&act=man");
	$item = $d->fetch_array();
}

function save_mail(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=newsletter&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$data['sex'] = $_POST['sex'];
		$data['diachi'] = $_POST['diachi'];
		$data['email'] = $_POST['email'];
		$data['hoten'] = $_POST['hoten'];
		$data['noidung'] = $_POST['noidung'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$data['khoahoc'] = $_POST['khoahoc'];
		$data['ngaybatdau'] = $_POST['ngaybatdau'];
		$data['ngayketthuc'] = $_POST['ngayketthuc'];
		
		$d->setTable('newsletter');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=newsletter&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=newsletter&act=man");
	}else{
		
		$data['sex'] = $_POST['sex'];
		$data['diachi'] = $_POST['diachi'];
		$data['email'] = $_POST['email'];
		$data['hoten'] = $_POST['hoten'];
		$data['noidung'] = $_POST['noidung'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$data['khoahoc'] = $_POST['khoahoc'];
		$data['ngaybatdau'] = $_POST['ngaybatdau'];
		$data['ngayketthuc'] = $_POST['ngayketthuc'];
		
		$d->setTable('newsletter');
		if($d->insert($data))
			redirect("index.php?com=newsletter&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=newsletter&act=man");
	}
}


function delete(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$sql = "delete from #_newsletter where id='".$id."'";
		$d->query($sql);
		if($d->query($sql))
			redirect("index.php?com=newsletter&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=newsletter&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=newsletter&act=man");
	
		
}




?>