<?php
	
error_reporting(0);
session_start();
$session = session_id();

//@define('_template', './templates/');
// include_once "Mobile_Detect.php";
// $detect = new Mobile_Detect;
// $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
// if($deviceType != 'computer'){
	// $_SESSION['device']=1;
	// $_SESSION['deviceType']=1;
// }else{
	// $_SESSION['device']=0;
	// $_SESSION['deviceType']=0;
// }
// if($_GET['com']=='desktop')
// {
	// $_SESSION['device']=0;
	// echo '<script language="javascript">history.go(-1)</script>';
// }
// elseif($_GET['com']=='mobile')
// {
	// $_SESSION['device']=1;
	// echo '<script language="javascript">history.go(-1)</script>';
// }

@define('_source', './sources/');
@define('_lib', './libraries/');
@define(_upload_folder, './media/upload/');


include_once _lib . "config.php";



require_once _source . "lang_$lang.php";

include_once _lib . "constant.php";
include_once _lib . "functions.php";
$http = get_http();
include_once _lib . "functions_giohang.php";
include_once _lib . "library.php";
include_once _lib . "class.database.php";
include_once _lib . "file_requick.php";	
include_once _source . "counter.php";
include_once _source . "useronline.php";
$d = new database($config['database']);

?>
<?php
	
	if($_SESSION['device']==0)
	{
		@define ('_template' ,'./templates/');
		include "desktop_tpl.php";
		//@define ('_template' ,'./m/');
		//include "mobile_tpl.php";
	}
	else
	{
		//@define ('_template' ,'./m/');
		//include "mobile_tpl.php";
		@define ('_template' ,'./templates/');
		include "desktop_tpl.php";
	}
?>