<?php  if(!defined('_source')) die("Error");
		if(isset($_GET['keyword'])){
			$title_tcat = $com_title;
			$tukhoa = trim(strip_tags($_GET['keyword']));  
			$loai = trim(strip_tags($_GET['loai'])); 				
			if (get_magic_quotes_gpc()==false) {
				$tukhoa = mysql_real_escape_string($tukhoa);    			
			}
			
			if($loai!=''){
			$sql = "SELECT count(id) AS numrows from #_product where id_list='".$loai."' and (ten_vi like'%$tukhoa%' or ten_en like'%$tukhoa%' or tenkhongdau_$lang like'%$tukhoa%' or masp like'%$tukhoa%') and hienthi='1' and id_list='$loai'  order by stt asc,id desc";	
				
			}else{
			$sql = "SELECT count(id) AS numrows from #_product where  (ten_vi like'%$tukhoa%' or ten_en like'%$tukhoa%' or tenkhongdau_$lang like'%$tukhoa%' or masp like'%$tukhoa%') and hienthi='1'   order by stt asc,id desc";	
			}
			$d->query($sql);
			$dem = $d->fetch_array();
			
			$totalRows = $dem['numrows'];
			$page = $_GET['curPage'];

			$pageSize = 12;
			if ($limit) {

				$pageSize = $limit;
			}

			$offset = 5;

			if ($page == "")
				$page = 1;
			else
				$page = $_GET['curPage'];
			$page--;
			$bg = $pageSize * $page;
			
			if($loai!=''){
			$sql = "select * from #_product where hienthi=1  and id_list='".$loai."' and (ten_vi like'%$tukhoa%' or ten_en like'%$tukhoa%' or tenkhongdau_$lang like'%$tukhoa%' or masp like'%$tukhoa%') and hienthi='1' and id_list='$loai'   order by stt asc,id desc limit $bg,$pageSize";	
				
			}else{
			$sql = "select * from #_product where  (ten_vi like'%$tukhoa%' or ten_en like'%$tukhoa%' or tenkhongdau_$lang like'%$tukhoa%' or masp like'%$tukhoa%') and hienthi='1'   order by stt asc,id desc limit $bg,$pageSize";	
			}								
		
			$d->query($sql);
			$product = $d->result_array();	
			if($lang=='en')
				$notice = "Found <b>".count($product)."</b> results";
			else
				$notice = "Tìm thấy <b>".count($product)."</b> kết quả";
				
				
			
			
				
				
			 $url_link = getCurrentPageURL()."/page";
			
		}else{
			header('index.html');	
		}
?>