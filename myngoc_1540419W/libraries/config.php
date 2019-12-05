<?php 
if(!defined('_lib')) die("Error");
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
include_once "AntiSQLInjection.php";
/* Developer Group Startup  (GaConIt) */

$config['author']['group'] = 'Nguyễn Ngọc Tân';
$config['author']['fullname'] = 'Solchung';
$config['author']['nickname'] = 'Solchung';
$config['author']['email'] = 'hungchungnina@gmail.com';
$config['author']['timefinish'] = '24/06/2016';


$config['login']['delay']=5;
$config['login']['attempt']=5;
/* Config Langs */

$config["langs"] = array('vi'=>'Tiếng Việt','en'=>'Tiếng Anh','cn'=>'Tiếng Trung','ge'=>'Tiếng Đức');
//$config['lang']=array('vi','en','cn','ge'); example
$config['lang']=array('vi'); // excute array langs presents
$config['lang_default'] = 'vi'; #Ngôn ngữ mặc định;

if(count($config['lang']) == 1){
	$config['langs'] = array('vi'=>'Nội dung');
}


/* config Connect Mysql  */
//$config['arrayDomainSSL'] = array("yourdomainssl.com.vn");
$config['index']=0; #Mở index 1

$config_folder='/myngoc_1540419W';
$config_url=$_SERVER["SERVER_NAME"].$config_folder;
$config['debug']=-1;    #Bật chế độ debug dành cho developer
$config['database']['servername'] = 'localhost';
$config['database']['username'] = 'demo27_myngoc';
$config['database']['password'] = 'tm3ywmOfj';
$config['database']['database'] = 'demo27_myngoc';
$config['database']['refix'] = 'table_';

/* ckfinder config */
	
$config['finder']['folder'] = $config_folder;
$config['finder']['dir'] = "/upload/";
$config['ckeditor']['width'] = '900';
$config['ckeditor']['height'] = '450';
/*recapcha_google */

$config_site='6LfBu7IUAAAAAFwLV4gcB0_9skcsxNsKV53sYNXa';
$config_secret='6LfBu7IUAAAAAF1TPPHXtZfiVy1LBx6KY5NLvD1Z';

//Lưu ngôn ngữ chọn vào $_SESSION
$lang_arr = array("vi", "en", "cn", "ge");
if (isset($_GET['lang']) == true) {
    if (in_array($_GET['lang'], $lang_arr) == true) {
        $lang = $_GET['lang'];
        $_SESSION['lang'] = $lang;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
if (isset($_SESSION['lang'])) {
    //$lang = $_SESSION['lang'];
	$lang = $config["lang_default"];
} else {
    $lang = $config["lang_default"];
}


//Config Firewall 
/*$fw_conf['firewall']='1'; //Bat tat firewall
$fw_conf['max_lockcount']=10;//So lan toi da phat hien dau hieu DDOS va khoa IP do vinh vien 
$fw_conf['max_connect']=15;//So ket noi toi da dc gioi han boi $fw_conf['time_limit']
$fw_conf['time_limit']=3;//Thoi gian dc thuc hien toi da $fw_conf['max_connect'] ket noi
$fw_conf['time_wait']=5;//Thoi gian cho de dc mo khoa khi IP bi khoa tam thoi
$fw_conf['email_admin']='nina@nina.vn';//Email lien lac voi Admin
$fw_conf['htaccess']=".htaccess";//Duong dan toi file htaccess tren server
$fw_conf['ip_allow']='';
$fw_conf['ip_deny']='';*/


?>