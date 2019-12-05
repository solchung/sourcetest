<?php  if(!defined('_source')) die("Error");
			
		
		if(isset($_GET['tag'])){
			
			//echo ($_GET['tag']);
			
			$tukhoa = $_GET['tag'];
			$tukhoa = trim(strip_tags($tukhoa));    	
    		if (get_magic_quotes_gpc()==false) {
    			$tukhoa = mysql_real_escape_string($tukhoa);    			
    		}			
			$str='0';
			$tagkhongdau=stripUnicode($tukhoa);
			$sql="select item_id from #_tag where (tag = '$tukhoa') or (tag = '$tagkhongdau') group by item_id";
			$d->query($sql);			
			$result_id=$d->result_array();
			
			for($i=0;$i<count($result_id);$i++){
			$str.=','.$result_id[$i]['item_id'];		
			}
		//$str=substr($str,1,-1);							
			// cac tin tuc
			$title_bar='Tag:'.$tukhoa;	
			$title_tcat='Tag: <span style="text-transform:none">'.$tukhoa.'</span>';
			
			$sql_tintuc = "select count(p.id) AS numrows, p.id,p.ten_$lang,p.tenkhongdau_$lang,p.photo,p.spmoi,p.spkm,p.spbc,p.tinhtrang,p.size,p.chatlieu,p.xuatxu,p.ri,p.color,p.masp,i.tenkhongdau_$lang as tenloai, c.tenkhongdau_$lang as danhmuc from #_product as p,#_product_cat as i,#_product_list as c where p.hienthi = 1 and p.id_list=c.id and p.id_cat = i.id and  p.id in($str) order by p.stt,p.id desc";			
			
			$d->query($sql_tintuc);
			$dem = $d->fetch_array();

			$totalRows = $dem['numrows'];
			$page = $_GET['curPage'];

			$pageSize = 20;
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
			
			
			
			$d->reset();
			$sql = "select p.id,p.ten_$lang,p.tenkhongdau_$lang,p.photo,p.spmoi,p.spkm,p.spbc,p.tinhtrang,p.size,p.chatlieu,p.xuatxu,p.ri,p.color,p.masp,i.tenkhongdau_$lang as tenloai, c.tenkhongdau_$lang as danhmuc from #_product as p,#_product_cat as i,#_product_list as c where p.hienthi = 1 and p.id_list=c.id and p.id_cat = i.id and  p.id in($str) order by p.stt,p.id desc  limit $bg,$pageSize ";


			$d->query($sql);
			$product = $d->result_array();
			//echo count($product);
			$catalog_url="tag.html/tag=".$tukhoa."/";
			$url_link = getCurrentPageURL()."/page";
		}
?>