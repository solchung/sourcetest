<?php 
	error_reporting(0);
	session_start();
	$session = session_id();

	@define('_template', './templates/');


	@define('_source', './sources/');
	@define('_lib', './libraries/');
	@define(_upload_folder, './media/upload/');


	include_once _lib . "config.php";

	$lang="vi";
	require_once _source . "lang_$lang.php";

	include_once _lib . "constant.php";
	include_once _lib . "functions.php";
	include_once _lib . "functions_giohang.php";
	include_once _lib . "library.php";
	include_once _lib . "class.database.php";
	include_once _lib . "file_requick.php";
    include_once _lib."SitemapGenerator.php";	
    $d = new database($config['database']);
	
	$l = 8;
    $c = 12;
	if(!function_exists("check")){
		function check($s){
			echo '<pre>';print_r($s);echo '</pre>';
		}
		
	}
   function url($url){
	   
		if(isset($_SERVER['HTTPS'])){
			$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
		}
		else{
			$protocol = 'http';
		}
		
		return $protocol . "://" . $_SERVER['HTTP_HOST']."/".$url;
	}
   


		$base = url();
        $sitemap = new SitemapGenerator($base);
       
       
		$link = array("news"=>"tin-tuc","dichvu"=>"hat-dieu-nguyen-lieu","gioithieu"=>"bai-viet");
		
		$all_c = array();
		foreach($link as $k=>$v){
			$all_c[] = "'".$k."'";
		}
	
		
		$sitemap->addUrl(url("index"),date('c'),'daily','1');

		$sitemap->addUrl(url("gioi-thieu"),date('c'),'daily','1');
		$sitemap->addUrl(url("san-pham"),date('c'),'daily','1');



		$sitemap->addUrl(url("tin-tuc"),date('c'),'daily','1');

		$sitemap->addUrl(url("hat-dieu-nguyen-lieu"),date('c'),'daily','1');
		
        $sitemap->addUrl(url("lien-he"),date('c'),'daily','1');
		

		
		$list_data = array();
		$cat_data = array();
		$sql = "select * from #_product where hienthi=1 and (com='product') order by stt,id desc";		
		$d->query($sql);
		$product = $d->result_array();	
		foreach($product as $k=>$v){
			$sitemap->addUrl(url($v['tenkhongdau_vi']),date('c',$v['ngaytao']),'daily','1');
			
			$list_data[$v['id_list']] = (int)$list_data[$v['id_list']]+1;
			$cat_data[$v['id_cat']] = (int)$cat_data[$v['id_cat']]+1;
			$item_data[$v['id_item']] = (int)$item_data[$v['id_item']]+1;
		}
		
		
	
		$sql = "select * from #_product_list where hienthi=1 and (com='product')  order by stt,id desc";		
		$d->query($sql);
		$product_list = $d->result_array();	
		$id_list = array();
		
		
		
		foreach($product_list as $k=>$v){
			$sitemap->addUrl(url($v['tenkhongdau_vi']),date('c',$v['ngaytao']),'daily','1');
			$id_list[$v['id']] = $v['tenkhongdau_vi'];
			$num = $list_data[$v['id']];
			for($i=2;$i<=ceil($num/$c);$i++){
				$sitemap->addUrl(url($v['tenkhongdau_vi']."/page=".$i),date('c',$v['ngaytao']),'daily','1');
			}
		}
		
	
		$sql = "select * from #_product_cat where hienthi=1 and (com='product') order by stt,id desc";		
		$d->query($sql);
		$product_cat = $d->result_array();	
		$id_cat = array();
	
		foreach($product_cat as $k=>$v){
		
			
			$sitemap->addUrl(url($v['tenkhongdau_vi']),date('c',$v['ngaytao']),'daily','1');
			$id_cat[$v['id']] = $v['tenkhongdau_vi'];
			$num = $list_data[$v['id']];
			for($i=2;$i<=ceil($num/$c);$i++){
				$sitemap->addUrl(url($v['tenkhongdau_vi']."/page=".$i),date('c',$v['ngaytao']),'daily','1');
			}
		}
		
	
	
		


		
		// $sql = "select * from #_news_list where hienthi=1 and com='dichvu'  order by stt,id desc";		
		// $d->query($sql);
		// $tintuc_list = $d->result_array();	
	
		// foreach($tintuc_list as $k=>$v){
			// $sitemap->addUrl(url($v['tenkhongdau_vi']),date('c',$v['ngaytao']),'daily','1');
		
			// $num = $list_data[$v['id']];
			// for($i=2;$i<=ceil($ar[$k]/$l);$i++){
				// $sitemap->addUrl(url($v['tenkhongdau_vi']."/page=".$i),date('c',$v['ngaytao']),'daily','1');
			// }
		// }
		
		// $sql = "select * from #_news_cat where hienthi=1 and com='dichvu' order by stt,id desc";		
		// $d->query($sql);
		// $tintuc_cat = $d->result_array();	
		// $id_cat = array();
	
		// foreach($product_cat as $k=>$v){
		
			
			// $sitemap->addUrl(url($v['tenkhongdau_vi']),date('c',$v['ngaytao']),'daily','1');
			// $id_cat[$v['id']] = $v['tenkhongdau_vi'];
			// $num = $list_data[$v['id']];
			// for($i=2;$i<=ceil($num/$c);$i++){
				// $sitemap->addUrl(url($v['tenkhongdau_vi']."/page=".$i),date('c',$v['ngaytao']),'daily','1');
			// }
		// }

		$sql = "select * from #_news where hienthi=1 and com in (".implode(",",$all_c).") ";		
		$d->query($sql);
		$news = $d->result_array();	
		$ar = array();
		foreach($news as $k=>$v){
			$slink = url($v['tenkhongdau_vi']);
			$sitemap->addUrl($slink,date('c',$v['ngaytao']),'weekly','1');
			$ar[$v['com']]=(int)$ar[$v['com']]+1;
	
		}
		
		

		
		foreach($link as $k=>$v){
			for($i=2;$i<=ceil($ar[$k]/$l);$i++){
				$sitemap->addUrl(url($v."/page=".$i),date('c'),'daily','1');
			}	
			
		}
		

		
		for($i=2;$i<=ceil(count($product)/$c);$i++){
			$sitemap->addUrl(url("san-pham/page=".$i),date('c'),'daily','1');
		}
	
$sitemap->createSitemap();
$xsitemap = $sitemap->toArray();
header("Content-Type: application/xml; charset=utf-8"); 
header("Content-com: text/xml");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
echo $xsitemap[0][1];


?>


