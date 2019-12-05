<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<?php
	error_reporting(0);
	session_start();
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


	

$ngoctan_xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n<urlset xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">";

$GaConIT_xml = "</urlset>";
$file_taosite = fopen("../sitemap.xml", "w+");




fwrite($file_taosite, $ngoctan_xml);

fwrite($file_taosite, "<url><loc>http://".$config_url."/index.html</loc><priority>0.1</priority></url>");
fwrite($file_taosite, "<url><loc>http://".$config_url."/gioi-thieu.html</loc><priority>0.1</priority></url>");
fwrite($file_taosite, "<url><loc>http://".$config_url."/tour.html</loc><priority>0.1</priority></url>");
fwrite($file_taosite, "<url><loc>http://".$config_url."/tin-tuc.html</loc><priority>0.1</priority></url>");
fwrite($file_taosite, "<url><loc>http://".$config_url."/thong-tin.html</loc><priority>0.1</priority></url>");
fwrite($file_taosite, "<url><loc>http://".$config_url."/tin-tuc-hang-ngay.html</loc><priority>0.1</priority></url>");
fwrite($file_taosite, "<url><loc>http://".$config_url."/lien-he.html</loc><priority>0.1</priority></url>");

fwrite($file_taosite, "<url><loc>http://".$config_url."/sitemap.xml</loc><priority>0.1</priority></url>");



$sql = "SELECT ten_$lang as ten,id,ngaytao,tenkhongdau_$lang as tenkhongdau FROM table_product_list where hienthi=1 and com='tour'";
$d->query($sql);
$sanpham = $d->result_array();
for($i=0;$i<count($sanpham);$i++){
        
fwrite($file_taosite, "<url><loc>http://".$config_url."/".$sanpham[$i]["tenkhongdau"]."/</loc><priority>1</priority></url>");
} 

$sql = "SELECT ten_$lang,id,id_list,tenkhongdau_$lang as tenkhongdau FROM table_product_cat where hienthi=1 and com='tour'";
$d->query($sql);
$sanpham = $d->result_array();
for($i=0;$i<count($sanpham);$i++){
     $d->reset();
	$sql = "select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau from table_product_list where hienthi=1 and com='tour' and  id='".$sanpham[$i]['id_list']."'";
	$d->query($sql);
	$row_ct = $d->fetch_array();
	   
fwrite($file_taosite, "<url><loc>http://".$config_url."/".$row_ct["tenkhongdau"]."/".$sanpham[$i]["tenkhongdau"]."/</loc><priority>1</priority></url>");
} 




$sql = "SELECT id,id_list,id_cat,ngaytao,tenkhongdau_$lang as tenkhongdau FROM table_product where hienthi=1 and com='tour'";
$d->query($sql);
$sanpham = $d->result_array();
for($i=0;$i<count($sanpham);$i++){

	$d->reset();
	$sql = "select id,ten_$lang as ten from #_product_list where hienthi=1 and id='".$sanpham[$i]['id_list']."' and com='tour'";
	$d->query($sql);
	$row_ct = $d->fetch_array();
	
	$d->reset();
	$sql = "select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau from #_product_cat where hienthi=1 and id='".$sanpham[$i]['id_cat']."' and com='tour'";
	$d->query($sql);
	$row_ct2 = $d->fetch_array();
        
fwrite($file_taosite, "<url><loc>http://".$config_url."/tour/".$sanpham[$i]["tenkhongdau"]."-".$sanpham[$i]['id'].".html</loc><priority>1</priority></url>");
} 




//////////////////////



$sql = "SELECT ten_$lang as ten,id,ngaytao,tenkhongdau_$lang as tenkhongdau FROM table_news where hienthi=1 and com='tintuchangngay' order by stt,ngaytao desc  ";
$d->query($sql);
$tintuchangngay = $d->result_array();
for($i=0;$i<count($tintuchangngay);$i++){
        
fwrite($file_taosite, "<url><loc>http://".$config_url."/tin-tuc-hang-ngay/".$tintuchangngay[$i]["tenkhongdau"]."-".$tintuchangngay[$i]['id'].".html</loc><priority>1</priority></url>");
} 


$sql = "SELECT ten_$lang as ten,id,ngaytao,tenkhongdau_$lang as tenkhongdau FROM table_news where hienthi=1 and com='menufooter' order by stt,ngaytao desc  ";
$d->query($sql);
$menufooter = $d->result_array();
for($i=0;$i<count($menufooter);$i++){
        
fwrite($file_taosite, "<url><loc>http://".$config_url."/thong-tin/".$menufooter[$i]["tenkhongdau"]."-".$menufooter[$i]['id'].".html</loc><priority>1</priority></url>");
} 

$sql = "SELECT ten_$lang as ten,id,ngaytao,tenkhongdau_$lang as tenkhongdau FROM table_news_list where hienthi=1 and com='news'";
$d->query($sql);
$list_news = $d->result_array();
for($i=0;$i<count($list_news);$i++){
        
fwrite($file_taosite, "<url><loc>http://".$config_url."/".$list_news[$i]["tenkhongdau"]."</loc><priority>1</priority></url>");
} 





$sql = "SELECT ten_$lang,id,ngaytao,tenkhongdau_$lang as tenkhongdau FROM table_news where hienthi=1 and com='news' order by stt,ngaytao desc  ";
$d->query($sql);
$tintuc = $d->result_array();
for($i=0;$i<count($tintuc);$i++){
        
fwrite($file_taosite, "<url><loc>http://".$config_url."/tin-tuc/".$tintuc[$i]["tenkhongdau"]."-".$tintuc[$i]['id'].".html</loc><priority>1</priority></url>");
} 




fwrite($file_taosite, $GaConIT_xml);
fclose($file_taosite);


echo "<div class=".view_sitemap." ><p>Đã tạo xong Sitemap Cho web <b>".$config_url."</b> !!!</p></div>";
?>

<style>
.view_sitemap
{
	text-align:center;
	font-size:18px;
}
.view_sitemap b
{
	font-size:20px;
}
</style>