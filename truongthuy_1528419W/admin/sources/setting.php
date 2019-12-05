<?php	
if(isset($_POST) && isset($_SESSION[$login_name])){
	if($_SESSION[$login_name]==false)
	{
		redirect("index.php");	
	}
}
if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_setting();
		$template = "setting/item_add";
		break;
	case "save":
		save_setting();
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

function get_setting(){
	global $d, $item;

	$sql = "select * from #_setting limit 0,1";
	$d->query($sql);
	
	$item = $d->fetch_array();
}

function save_setting(){
	global $d,$config;
	$file_name=changeTitle($_POST['title_vi']).fns_Rand_digit(0,3,5);
	$file_name2=changeTitle($_POST['title_vi']).fns_Rand_digit(0,3,5);
	//$x = explode(".",$file_name2);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");
	
	
	if($photo = upload_image("file", 'mp3|wav|flac|MP3|WAV|FLAC|jpg|png|gif|JPG|jpeg|JPEG',_upload_hinhanh,$file_name)){
			$data['filenhac'] = $photo;
			$d->setTable('setting');			
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['filenhac']);
			}
		}	
	

	if($photo = upload_image("img", _format_duoihinh, _upload_hinhanh,$file_name2)){
			$data['favicon'] = $photo;	
			$d->setTable('setting');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['favicon']);	
			}
		}	
		
		if($photo = upload_image("image_map", _format_duoihinh, _upload_hinhanh,$file_name2)){
			$data['image_map'] = $photo;	
			$d->setTable('setting');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['image_map']);	
			}
		}
	if($photo = upload_image("watermark", 'png,PNG', '../upload/','watermark')){	
			clearcache();
			
		}	
	$data['link_map'] = magic_quote($_POST['link_map']);
	$data['act_map'] = isset($_POST['act_map']) ? 1 : 0;	
	$data['api'] = magic_quote($_POST['api']);
	
		
	$data['is_active '] = isset($_POST['active']) ? 1 : 0;
	$data['author_web'] = magic_quote($_POST['author_web']);




	foreach ($config["lang"] as $key => $value) {
				
		
		$data['h1_'.$value] = magic_quote($_POST['h1_'.$value]);
		$data['h2_'.$value] = magic_quote($_POST['h2_'.$value]);	
		$data['title_'.$value] = magic_quote($_POST['title_'.$value]);
		
		$data['keywords_'.$value] = magic_quote($_POST['keyword_'.$value]);
		$data['deschar_'.$value] = magic_quote($_POST['deschar_'.$value]);
		$data['description_'.$value] = magic_quote($_POST['description_'.$value]);



		$data['ten_'.$value] = magic_quote($_POST['ten_'.$value]);
		$data['silogan_'.$value] = magic_quote($_POST['silogan_'.$value]);
		$data['diachi_'.$value] = magic_quote($_POST['diachi_'.$value]);
		$data['copyright_'.$value] = magic_quote($_POST['copyright_'.$value]);
		$data['mailphanhoi_'.$value] = magic_quote($_POST['mailphanhoi_'.$value]);
		
		$data['mota_'.$value] = magic_quote($_POST['mota_'.$value]);
			

	}
		
	
	
	$data['dienthoai'] = $_POST['dienthoai'];
	$data['hotline'] = $_POST['hotline'];
	$data['email'] = $_POST['email'];
	$data['website'] = $_POST['website'];
	$data['fanpage'] = magic_quote($_POST['fanpage']);
	
	
	$data['toado'] = $_POST['toado'];

	
	$data['id_analytics'] = $_POST['id_analytics'];
	$data['code_analytics'] = magic_quote($_POST['code_analytics']);
	$data['geo_meta'] = magic_quote($_POST['geo_meta']);
	$data['codechat'] = magic_quote($_POST['codechat']);
	

	
	$data['iphost'] = magic_quote($_POST['iphost']);
	$data['usernameaccount'] = magic_quote($_POST['usernameaccount']);
	$data['mailhost'] = magic_quote($_POST['mailhost']);
	$data['password'] = magic_quote($_POST['password']);


	$data['email_server'] = magic_quote($_POST['email_server']);
	$data['mailhost'] = magic_quote($_POST['mailhost']);
	$data['port_servermail'] = magic_quote($_POST['port_servermail']);
	$data['password_server'] = magic_quote($_POST['password_server']);


	$data['gmail'] = magic_quote($_POST['gmail']);
	$data['pass_gmail'] = magic_quote($_POST['pass_gmail']);
	$data['port_gmail'] = magic_quote($_POST['port_gmail']);
	$data['skype'] = magic_quote($_POST['skype']);
	$data['zalo'] = magic_quote($_POST['zalo']);	
	$data['phantrang_sp'] =  (int) $_POST['phantrang_sp'];
	$data['phantrang_bv'] =  (int) $_POST['phantrang_bv'];
	
	
	$d->reset();
	$d->setTable('setting');
	if($d->update($data))
		header("Location:index.php?com=setting&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=setting&act=capnhat");
}

?>