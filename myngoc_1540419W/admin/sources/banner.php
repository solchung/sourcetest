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
		get_banner();
		$template = "banner/logo_add";
		break;
	case "save":
		save_banner();
		break;
	#====================================
	case "man_banner":
		get_banner_giua();
		$template = "banner/banner_giua_add";
		break;
	case "save_banner_giua":
		save_banner_giua();
		break;
	
	case "man_phai":
		get_banner_phai();
		$template = "banner/banner_phai_add";
		break;
	case "save_banner_phai":
		save_banner_phai();
		break;
	case "man_info":
		get_banner_info();
		$template = "banner/banner_info_add";
		break;
	case "save_banner_info":
		save_banner_info();
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


function get_banner(){
	global $d, $item;

	$sql = "select * from #_banner where com='".$_GET[typechild]."'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_banner(){
	global $d;
	$file_name=fns_Rand_digit(0,9,3);
	$file_name2=$_FILES['file_vi']['name'];
	$file_name3=$_FILES['file_en']['name'];
	$file_name4=$_FILES['file_cn']['name'];
	$file_name5=$_FILES['file_ge']['name'];
	$x = explode(".",$file_name2);
	$x1 = explode(".",$file_name3);
	$x2 = explode(".",$file_name4);
	$x3 = explode(".",$file_name5);
	$sql = "select * from #_banner where com='$_GET[typechild]'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	//echo dump($id);
	
	if($id){ // cap nhat
		if($banner_vi = upload_image("file_vi", _format_duoihinh_banner, _upload_hinhanh,$x[0].'_vi')){
			$data['banner_vi'] = $banner_vi;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_vi']);
		}
		if($banner_en = upload_image("file_en", _format_duoihinh_banner, _upload_hinhanh,$x1[0].'_en')){
			
			$data['banner_en'] = $banner_en;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_en']);
		}

		if($banner_cn = upload_image("file_cn", _format_duoihinh_banner, _upload_hinhanh,$x2[0].'_cn')){
			$data['banner_cn'] = $banner_cn;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_cn']);
		}

		if($banner_ge = upload_image("file_ge", _format_duoihinh_banner, _upload_hinhanh,$x3[0].'_ge')){
			$data['banner_ge'] = $banner_ge;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_ge']);
		}
		
		//echo dump($id);
		$d->setTable('banner');
		$d->setWhere('id', $id);
		$d->setWhere('com',$_GET['typechild']);
		if($d->update($data))
			redirect("index.php?com=banner&act=capnhat&typechild=$_GET[typechild]");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=banner&act=capnhat&typechild=$_GET[typechild]");
	}else{ // them moi
	
		$data['banner_vi'] = upload_image("file_vi", _format_duoihinh_banner, _upload_hinhanh,$x[0].'_vi');
		if(!$data['banner_vi']) $data['banner_vi']="";
		$data['banner_en'] = upload_image("file_en", _format_duoihinh_banner, _upload_hinhanh,$x[0].'_en');
		if(!$data['banner_en']) $data['banner_en']="";

		$data['banner_cn'] = upload_image("file_cn", _format_duoihinh_banner, _upload_hinhanh,$x[0].'_cn');
		if(!$data['banner_cn']) $data['banner_cn']="";

		$data['banner_ge'] = upload_image("file_ge", _format_duoihinh_banner, _upload_hinhanh,$x[0].'_ge');
		if(!$data['banner_ge']) $data['banner_ge']="";
		$data['com'] = $_REQUEST['typechild'];
		$d->setTable('banner');
		if($d->insert($data))
		redirect("index.php?com=banner&act=capnhat&typechild=$_GET[typechild]");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=banner&act=capnhat&typechild=$_GET[typechild]");
	
}
}


function get_banner_giua(){
	global $d, $item_banner;

	$sql = "select * from #_banner where com='banner_giua'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item_banner = $d->fetch_array();
}

function save_banner_giua(){
	global $d;
	$file_name=fns_Rand_digit(0,9,3);
	$sql = "select * from #_banner where com='banner_giua'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	//echo dump($id);
	
	if($id){ // cap nhat

		if($banner_vi = upload_image("file_vi", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_vi')){
			$data['banner_vi'] = $banner_vi;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_vi']);
		}
		if($banner_en = upload_image("file_en", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_en')){
			$data['banner_en'] = $banner_en;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_en']);
		}

		if($banner_cn = upload_image("file_cn", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_cn')){
			$data['banner_cn'] = $banner_cn;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_cn']);
		}

		if($banner_ge = upload_image("file_ge", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_ge')){
			$data['banner_ge'] = $banner_ge;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_ge']);
		}
		$data['url']=$_POST['url'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		//echo dump($id);
		$d->setTable('banner');
		$d->setWhere('id', $id);
		$d->setWhere('com','banner_giua');
		if($d->update($data))
			redirect("index.php?com=banner&act=man_banner");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=banner&act=man_banner");
	}else{ // them moi
	
		$data['banner_vi'] = upload_image("file_vi", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_vi');
		if(!$data['banner_vi']) $data['banner_vi']="";
		$data['banner_en'] = upload_image("file_en", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_en');
		if(!$data['banner_en']) $data['banner_en']="";
		$data['banner_cn'] = upload_image("file_cn", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_cn');
		if(!$data['banner_cn']) $data['banner_cn']="";
		$data['banner_ge'] = upload_image("file_ge", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_ge');
		if(!$data['banner_ge']) $data['banner_ge']="";
		$data['com']='banner_giua';
		$data['url']=$_POST['url'];
		$d->setTable('banner');
		if($d->insert($data))
		redirect("index.php?com=banner&act=man_banner");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=banner&act=man_banner");
	
}
}



function get_banner_phai(){
	global $d, $item;

	$sql = "select * from #_banner where com='banner_phai'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}


function save_banner_phai(){
	global $d;
	$file_name=fns_Rand_digit(0,9,3);
	$file_name2=$_FILES['file_vi']['name'];
	$file_name3=$_FILES['file_en']['name'];
	$file_name4=$_FILES['file_cn']['name'];
	$file_name5=$_FILES['file_ge']['name'];
	$x = explode(".",$file_name2);
	$x1 = explode(".",$file_name3);
	$x2 = explode(".",$file_name4);
	$x3 = explode(".",$file_name5);
	$sql = "select * from #_banner where com='banner_phai'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	//echo dump($id);
	
	if($id){ // cap nhat
		if($banner_vi = upload_image("file_vi", _format_duoihinh_banner, _upload_hinhanh,$x[0].'_vi')){
			$data['banner_vi'] = $banner_vi;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_vi']);
		}
		if($banner_en = upload_image("file_en", _format_duoihinh_banner, _upload_hinhanh,$x1[0].'_en')){
			
			$data['banner_en'] = $banner_en;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_en']);
		}

		if($banner_cn = upload_image("file_cn", _format_duoihinh_banner, _upload_hinhanh,$x2[0].'_cn')){
			$data['banner_cn'] = $banner_cn;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_cn']);
		}

		if($banner_ge = upload_image("file_ge", _format_duoihinh_banner, _upload_hinhanh,$x3[0].'_ge')){
			$data['banner_ge'] = $banner_ge;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_ge']);
		}
		
		//echo dump($id);
		$d->setTable('banner');
		$d->setWhere('id', $id);
		$d->setWhere('com','banner_phai');
		if($d->update($data))
			redirect("index.php?com=banner&act=man_phai");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=banner&act=man_phai");
	}else{ // them moi
	
		$data['banner_vi'] = upload_image("file_vi", _format_duoihinh_banner, _upload_hinhanh,$x[0].'_vi');
		if(!$data['banner_vi']) $data['banner_vi']="";
		$data['banner_en'] = upload_image("file_en", _format_duoihinh_banner, _upload_hinhanh,$x[0].'_en');
		if(!$data['banner_en']) $data['banner_en']="";

		$data['banner_cn'] = upload_image("file_cn", _format_duoihinh_banner, _upload_hinhanh,$x[0].'_cn');
		if(!$data['banner_cn']) $data['banner_cn']="";

		$data['banner_ge'] = upload_image("file_ge", _format_duoihinh_banner, _upload_hinhanh,$x[0].'_ge');
		if(!$data['banner_ge']) $data['banner_ge']="";
		$data['com']='banner_phai';
		$d->setTable('banner');
		if($d->insert($data))
		redirect("index.php?com=banner&act=man_phai");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=banner&act=man_phai");
	
}
}


function get_banner_info(){
	global $d, $item_banner;

	$sql = "select * from #_banner where com='banner_info'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item_banner = $d->fetch_array();
}


function save_banner_info(){
	global $d;
	$file_name=fns_Rand_digit(0,9,3);
	$sql = "select * from #_banner where com='banner_info'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	//echo dump($id);
	
	if($id){ // cap nhat
		if($banner_vi = upload_image("file_vi", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_vi')){
			$data['banner_vi'] = $banner_vi;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_vi']);
		}
		if($banner_en = upload_image("file_en", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_en')){
			$data['banner_en'] = $banner_en;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_en']);
		}

		if($banner_cn = upload_image("file_cn", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_cn')){
			$data['banner_cn'] = $banner_cn;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_cn']);
		}

		if($banner_ge = upload_image("file_ge", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_ge')){
			$data['banner_ge'] = $banner_ge;
			$d->setTable('banner');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['banner_ge']);
		}
		
		//echo dump($id);
		$d->setTable('banner');
		$d->setWhere('id', $id);
		$d->setWhere('com','banner_info');
		if($d->update($data))
			redirect("index.php?com=banner&act=man_info");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=banner&act=man_info");
	}else{ // them moi
	
		$data['banner_vi'] = upload_image("file_vi", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_vi');
		if(!$data['banner_vi']) $data['banner_vi']="";
		$data['banner_en'] = upload_image("file_en", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_en');
		if(!$data['banner_en']) $data['banner_en']="";

		$data['banner_cn'] = upload_image("file_cn", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_cn');
		if(!$data['banner_cn']) $data['banner_cn']="";

		$data['banner_ge'] = upload_image("file_ge", _format_duoihinh_banner, _upload_hinhanh,$file_name.'_ge');
		if(!$data['banner_ge']) $data['banner_ge']="";
		$data['com']='banner_info';
		$d->setTable('banner');
		if($d->insert($data))
		redirect("index.php?com=banner&act=man_info");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=banner&act=man_info");
	
}
}


?>