<?php
	session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , '../libraries/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."construct_name.php";
	include_once _lib."functions.php";
	include_once _lib."functions_member.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";	
	include_once _lib."pclzip.php";
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";	

	
	$login_name = 'NINACO';	
	$d = new database($config['database']);	
	$archive = new PclZip($file);


	$_SESSION['SCRIPT_FILENAME'] = str_replace("/admin/index.php","",$_SERVER['SCRIPT_FILENAME']);
	$_SESSION['SERVER_FOLDER'] = $config['finder']['folder'];
	$_SESSION['UPLOAD_DIR'] = $config['finder']['dir'];

	if($_REQUEST['author']){ 
      header('Content-Type: text/html; charset=utf-8');
      echo '<pre>';
      print_r($config['author']);
      echo '</pre>';
      die();
	}


	switch($com){

		

		

	case 'quangcaobody':
			$source = "quangcaobody";
                        break;	
                
        case 'thongke':
			$source = "thongke";
			break;    
                    
		case 'contact':
			$source = "contact";
			break;
		case 'dutinh':
			$source = "dutinh";
			break;		
		
		case 'newsletter':
			$source = "newsletter";
			break;

		case 'sendmailmember':
			$source = "sendmailmember";
			break;	
			
		case 'city':
			$source = "city";
			break;		


		case 'order':
			$source = "order";
			break;

		case 'database':
			$source = "database";
			break;	
		
		case 'backup':
			$source = "backup";
			break;		
		
		case 'info':
			$source = "info";
			break;


		case 'bando':
			$source = "bando";
			break;	



		case 'news':
			$source = "news";
			break;		
	
			
			
		case 'product':
			$source = "product";				
			break;
			
		case 'users':
			$source = "users";
			break;		
			
		case 'user':
			$source = "user";
			break;		



		case 'setting':
			$source = "setting";
			break;	

		case 'support_online':
			$source = "support_online";
			break;
													

	
	case 'banner':
			$source = "banner";
			break;
			
	case 'image_url':
			$source = "image_url";
			break;		
			
	case 'hasp':
			$source = "hasp";
			break;				
			
	case 'download':
			$source = "download";
			break;		
		
			
	case 'color':
			$source = "color";
			break;		


	case 'background':
			$source = "background";
			break;

	case 'video':
			$source = "video";
			break;										
			
		default: 
			$source = "";
			$template = "index";
			break;
	}
	
	if((!isset($_SESSION[$login_name]) || $_SESSION[$login_name]==false) && $act!="login"){
		redirect("index.php?com=user&act=login");
	}
		if(isset($_SESSION[$login_name]) || $_SESSION[$login_name]==true){
		$id_user = (int)$_SESSION['login']['id'];
		$timenow = time();
		//Thoát tất cả khi đổi user, mật khẩu hoặc quá thời gian 1 tiếng không hoạt động
		$sql="select username,password,lastlogin,user_token from #_user WHERE id ='$id_user'";
		$d->query($sql);
		$row = $d->fetch_array();		
		$cookiehash = md5(sha1($row['password'].$row['username']));
		
		if( $_SESSION['login_session']!=$cookiehash || ($timenow - $row['lastlogin'])>3600 ) {
			session_destroy();	
			redirect("index.php?com=user&act=login");
		}
		if($_SESSION['login_token']!==$row['user_token']) $notice_admin = '<strong>Có người đang đăng nhập tài khoản của bạn!</strong>';
		else $notice_admin ='';
		$token = md5(time());
		$_SESSION['login_token'] = $token;
		//Cập nhật lại thời gian hoạt động và token		
		$d->reset();
		$sql = "update #_user set lastlogin = '$timenow',user_token = '$token' where id='$id_user'";
		$d->query($sql);
	}

	if($notice_admin!='') echo '<div class="nNote nFailure"><p>'.$notice_admin.'</p></div>';
	if($source!="") include _source.$source.".php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Administrator - Hệ thống quản trị nội dung</title>

<!-- Font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link href="css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="js/external.js"></script>
<script type="text/javascript" src="js/datepicker/datepicker/js/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="js/datepicker/datepicker/js/bootstrap-datepicker.js"></script>
<link href="js/datepicker/datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<script src="ckeditor/ckeditor.js" type="text/javascript" ></script>
<script src="ckfinder/ckfinder.js" type="text/javascript" ></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAd1qCCy9Qb1t3jSZoaOeMsAA--IXWWfoQ">
</script>
</head>
<?php if(isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true)){?>  
<body >




<!-- Left side content -->    
<script type="text/javascript">
$(function(){
	var num = $('#menu').children(this).length;
	for (var index=0; index<=num; index++)
	{
		var id = $('#menu').children().eq(index).attr('id');
		$('#'+id+' strong').html($('#'+id+' .sub').children(this).length);
		$('#'+id+' .sub li:last-child').addClass('last');
	}
	$('#menu .activemenu .sub').css('display', 'block');
	$('#menu .activemenu a').removeClass('inactive');
})
</script>


<script language="javascript">
	$(document).ready(function(){
    //  When user clicks on tab, this code will be executed
    $("#tabs li").click(function() {
        //  First remove class "active" from currently active tab
        $("#tabs li").removeClass('active');
 
        //  Now add class "active" to the selected/clicked tab
        $(this).addClass("active");
 
        //  Hide all tab content
        $(".tab_content").hide();
 
        //  Here we get the href value of the selected tab
        var selected_tab = $(this).find("a").attr("href");
 
        //  Show the selected tab content
        $(selected_tab).fadeIn();
 
        //  At the end, we add return false so that the click on the link is not executed
        return false;
    });
	
	
	
	$("#tabs_seo li").click(function() {
        //  First remove class "active" from currently active tab
        $("#tabs_seo li").removeClass('active');
 
        //  Now add class "active" to the selected/clicked tab
        $(this).addClass("active");
 
        //  Hide all tab content
        $(".tab_seo_content").hide();
 
        //  Here we get the href value of the selected tab
        var selected_tab = $(this).find("a").attr("href");
 
        //  Show the selected tab content
        $(selected_tab).fadeIn();
 
        //  At the end, we add return false so that the click on the link is not executed
        return false;
    });
	
});
</script>


<!-- MultiUpload -->
<link href="js/plugins/multiupload/css/jquery.filer.css" type="text/css" rel="stylesheet" />
<link href="js/plugins/multiupload/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/plugins/multiupload/jquery.filer.min.js"></script>
<!-- MultiUpload -->

<div id="leftSide">
<?php include _template."left_tpl.php";?>
</div>
<!-- Right side -->
    <div id="rightSide">
        <!-- Top fixed navigation -->
        <div class="topNav">
	        <?php include _template."header_tpl.php"?>
		</div>

<div class="wrapper">
<?php include _template.$template."_tpl.php"?>
</div></div>
    <div class="clear"></div>
</body>
<?php }else{?>
<body class="nobg loginPage">   
<?php include _template.$template."_tpl.php"?>
<!-- Footer line -->
<div id="footer">
	
</div></body>
<?php }?>
</html>

<script>

	$(document).ready(function($) {

		$('.ck_editor').each(function(index, el) {

			var id = $(this).find('textarea').attr('id');
			CKEDITOR.replace(id, {"width":<?= $config['ckeditor']['width'] ?>, "height":<?= $config['ckeditor']['height'] ?>, });



		});	

	});

</script>
