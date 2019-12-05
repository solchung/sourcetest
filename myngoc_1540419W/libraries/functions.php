<?php if(!defined('_lib')) die("Error");

ini_set ('memory_limit', '256M');
function unzip_chuanhoa($s){
$s = str_replace('&#039;', "'", $s);
$s = str_replace('&quot;', '"', $s);
$s = str_replace('&lt;', '<', $s);
$s = str_replace('&gt;', '>', $s);
return $s;
}
function rebuild_date( $format, $time = 0 )
{
    if ( ! $time ) $time = time();

	$lang = array();
	$lang['sun'] = 'CN';
	$lang['mon'] = 'T2';
	$lang['tue'] = 'T3';
	$lang['wed'] = 'T4';
	$lang['thu'] = 'T5';
	$lang['fri'] = 'T6';
	$lang['sat'] = 'T7';
	$lang['sunday'] = 'Chủ nhật';
	$lang['monday'] = 'Thứ hai';
	$lang['tuesday'] = 'Thứ ba';
	$lang['wednesday'] = 'Thứ tư';
	$lang['thursday'] = 'Thứ năm';
	$lang['friday'] = 'Thứ sáu';
	$lang['saturday'] = 'Thứ bảy';
	$lang['january'] = 'Tháng Một';
	$lang['february'] = 'Tháng Hai';
	$lang['march'] = 'Tháng Ba';
	$lang['april'] = 'Tháng Tư';
	$lang['may'] = 'Tháng Năm';
	$lang['june'] = 'Tháng Sáu';
	$lang['july'] = 'Tháng Bảy';
	$lang['august'] = 'Tháng Tám';
	$lang['september'] = 'Tháng Chín';
	$lang['october'] = 'Tháng Mười';
	$lang['november'] = 'Tháng M. một';
	$lang['december'] = 'Tháng M. hai';
	$lang['jan'] = 'T01';
	$lang['feb'] = 'T02';
	$lang['mar'] = 'T03';
	$lang['apr'] = 'T04';
	$lang['may2'] = 'T05';
	$lang['jun'] = 'T06';
	$lang['jul'] = 'T07';
	$lang['aug'] = 'T08';
	$lang['sep'] = 'T09';
	$lang['oct'] = 'T10';
	$lang['nov'] = 'T11';
	$lang['dec'] = 'T12';

    $format = str_replace( "r", "D, d M Y H:i:s O", $format );
    $format = str_replace( array( "D", "M" ), array( "[D]", "[M]" ), $format );
    $return = date( $format, $time );

    $replaces = array(
        '/\[Sun\](\W|$)/' => $lang['sun'] . "$1",
        '/\[Mon\](\W|$)/' => $lang['mon'] . "$1",
        '/\[Tue\](\W|$)/' => $lang['tue'] . "$1",
        '/\[Wed\](\W|$)/' => $lang['wed'] . "$1",
        '/\[Thu\](\W|$)/' => $lang['thu'] . "$1",
        '/\[Fri\](\W|$)/' => $lang['fri'] . "$1",
        '/\[Sat\](\W|$)/' => $lang['sat'] . "$1",
        '/\[Jan\](\W|$)/' => $lang['jan'] . "$1",
        '/\[Feb\](\W|$)/' => $lang['feb'] . "$1",
        '/\[Mar\](\W|$)/' => $lang['mar'] . "$1",
        '/\[Apr\](\W|$)/' => $lang['apr'] . "$1",
        '/\[May\](\W|$)/' => $lang['may2'] . "$1",
        '/\[Jun\](\W|$)/' => $lang['jun'] . "$1",
        '/\[Jul\](\W|$)/' => $lang['jul'] . "$1",
        '/\[Aug\](\W|$)/' => $lang['aug'] . "$1",
        '/\[Sep\](\W|$)/' => $lang['sep'] . "$1",
        '/\[Oct\](\W|$)/' => $lang['oct'] . "$1",
        '/\[Nov\](\W|$)/' => $lang['nov'] . "$1",
        '/\[Dec\](\W|$)/' => $lang['dec'] . "$1",
        '/Sunday(\W|$)/' => $lang['sunday'] . "$1",
        '/Monday(\W|$)/' => $lang['monday'] . "$1",
        '/Tuesday(\W|$)/' => $lang['tuesday'] . "$1",
        '/Wednesday(\W|$)/' => $lang['wednesday'] . "$1",
        '/Thursday(\W|$)/' => $lang['thursday'] . "$1",
        '/Friday(\W|$)/' => $lang['friday'] . "$1",
        '/Saturday(\W|$)/' => $lang['saturday'] . "$1",
        '/January(\W|$)/' => $lang['january'] . "$1",
        '/February(\W|$)/' => $lang['february'] . "$1",
        '/March(\W|$)/' => $lang['march'] . "$1",
        '/April(\W|$)/' => $lang['april'] . "$1",
        '/May(\W|$)/' => $lang['may'] . "$1",
        '/June(\W|$)/' => $lang['june'] . "$1",
        '/July(\W|$)/' => $lang['july'] . "$1",
        '/August(\W|$)/' => $lang['august'] . "$1",
        '/September(\W|$)/' => $lang['september'] . "$1",
        '/October(\W|$)/' => $lang['october'] . "$1",
        '/November(\W|$)/' => $lang['november'] . "$1",
        '/December(\W|$)/' => $lang['december'] . "$1" );

    return preg_replace( array_keys( $replaces ), array_values( $replaces ), $return );
}
function get_name_face($link)
{
	if(strpos($link,'/')!==false)
	{
		$tmp=explode('/',$link);
		return $tmp[3];
	}
	else
	{
		return $link;
	}
}

function get_youtube_link($link)
{
	if(strpos($link,'=')!==false)
	{
		$tmp=explode('=',$link);
		return $tmp[1];
	}
	else
	{
		return $link;
	}
}

function check_ssl_content($content){
	global $config;
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {
	$pageURLs .= $pageURL."s";
	$pageURLs .= "://";
	$pageURL .= "://";
	$pageURL.=$config['arrayDomainSSL'][0];
	$pageURLs.=$config['arrayDomainSSL'][0];
	return str_replace($pageURL,$pageURLs,$content);
	}else{
	return $content;
	}
}
function get_http(){
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {
		$pageURL .= "s";
	}
	$pageURL .= "://";

	return $pageURL;
}

function clearcache(){
	$dir = "../nina@#cache";
	if (is_dir($dir)){
		if ($dh = opendir($dir)){
			while (($file = readdir($dh)) !== false){
				if($file != '.htaccess' && $file != 'index.html'){
					unlink($dir.'/'.$file);
				}
			}
		}
	}
}
function isAjaxRequest(){
	if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') 
		return true;
	return false;
}
function encrypt_password($str,$salt){return md5('$nina@'.$str.'@1365119W^');}
function matheval($equation) {
    $equation = preg_replace("/[^0-9+\-.*\/()%]/", "", $equation);
    // fix percentage calcul when percentage value < 10 
    $equation = preg_replace("/([+-])([0-9]{1})(%)/", "*(1\$1.0\$2)", $equation);
    // calc percentage 
    $equation = preg_replace("/([+-])([0-9]+)(%)/", "*(1\$1.\$2)", $equation);
    // you could use str_replace on this next line 
    // if you really, really want to fine-tune this equation 
    $equation = preg_replace("/([0-9]+)(%)/", ".\$1", $equation);
    if ($equation == "") {
        $return = 0;
    } else {
        eval("\$return=" . $equation . ";");
    }
    return $return;
    }

function bodautv($str)
{
	$text = strtolower(utf8convert($text));
	$text = preg_replace("/[^a-z0-9-\s]/", "",$text);
	$text = preg_replace('/([\s]+)/', '-', $text);
	$text = str_replace(array('%20', ' '), '-', $text);
	$text = preg_replace("/\-\-\-\-\-/","-",$text);
	$text = preg_replace("/\-\-\-\-/","-",$text);
	$text = preg_replace("/\-\-\-/","-",$text);
	$text = preg_replace("/\-\-/","-",$text);
	$text = '@'.$text.'@';
	$text = preg_replace('/\@\-|\-\@|\@/', '', $text);
	return $text;
}

function doitiensangchu($a){
	$st = "/^[1-9][0-9]*$/";
	if(preg_match($st,$a)){ //Nếu là số nguyên
		$kq = (int)($a/1000000000);
		$a=$a%1000000000;
		if($kq>=1){
			echo "$kq Tỷ ";	
		}
		$kq = (int)($a/1000000);
		$a=$a%1000000;
		if($kq>=1){
			echo "$kq Triệu ";	
		}
		$kq = (int)($a/1000);
		$a=$a%1000;
		if($kq>=1){
			echo "$kq Ngàn ";	
		}
		$kq = (int)($a/1);
		$a=$a%1;
		if($kq>=1){
			echo "$kq Đồng ";	
		}
	}
	else{	//Nếu không là số nguyên
		echo "Liên hệ";
	}
}


function getFirstImagethumb($id,$x="thumb"){
		
	global $d;
	$sql = "select $x from #_hasp where  hienthi=1 and com='hasp' and id=".$id." order by stt asc";
	$d->query($sql);
	$r = $d->fetch_array();
	return $r[$x];	
	
}


function getFirstImagephoto($id,$x="photo"){
		
	global $d;
	$sql = "select $x from #_hasp where hienthi=1 and com='hasp' and id=".$id." order by stt asc";
	$d->query($sql);
	$r = $d->fetch_array();
	return $r[$x];	
	
}

function get_donvi_gia($id=0){
  global $d, $row;
  $sql="select ten_vi from #_news where id=".$id." and com='donvigia' limit 0,1";
  $d->query($sql);
  $row=$d->fetch_array();
	return $row['ten_vi'];

} 



function get_donvi($gia,$donvi)
{
	    if($gia > 0)
		{   
		
			 if($donvi == "ngan") 
			{
                if($gia>1000) 
				{
                    $gia = $gia/1000;
                    return $gia." "."Triệu";
                } 
                return $gia." "."Ngàn";
            } 
    	    else if($donvi == "trieu") 
			{
                if($gia>1000) 
				{
                    $gia = $gia/1000;
                    return $gia." "."Tỷ";
                } 
                return $gia." "."Triệu";
            } 
			
			else if($donvi == "ty")
			{
    		  return $gia." "."Tỷ";
            }
        } 
		else if($gia == -555)
		
		{
            if($donvi == "ngan") 
			{
                return "Ngàn";    
            }
			else if($donvi == "trieu") 
			{
                return "Triệu";    
            }
			else 
			{
                return "Tỷ";
            }
        }
		else 
		
		{
            return "Đang cập nhật";
        }

}     


function get_tinhtrang($id)
	{
	    global $d, $row;
    	$sql="select ten_vi from #_news where hienthi=1 and id=".$id." and com='tinhtrang' limit 0,1";
    	$d->query($sql);
    	$row=$d->fetch_array();
		return $row['ten_vi'];
	}	
	

function get_loai_giaodich($id)
	{
	    global $d, $row;
    	$sql="select ten_vi from #_type_posting where hienthi=1  and id=".$id." limit 0,1";
    	$d->query($sql);
    	$row=$d->fetch_array();
		return $row['ten_vi'];
	}
		
	

function get_item_tinh($id)
	{
	    global $d, $row;
    	$sql="select ten_vi from #_city_list where id=".$id." limit 0,1";
    	$d->query($sql);
    	$row=$d->fetch_array();
		return $row['ten_vi'];
	}	
	

function get_item_quan($id_tinh,$id)
	{
	    global $d, $row;
    	$sql="select ten_vi from #_city_cat where id_list=".$id_tinh." and id=".$id." limit 0,1";
    	$d->query($sql);
    	$row=$d->fetch_array();
		return $row['ten_vi'];
	}
        
function get_item_khuvuc($id_tinh,$id_quan,$id)
	{
	    global $d, $row;
    	$sql="select ten_vi from #_city_item where id_list=".$id_tinh." and id_cat=".$id_quan." and id=".$id." limit 0,1";
    	$d->query($sql);
    	$row=$d->fetch_array();
		return $row['ten_vi'];
	}
    
function get_item_khuvuc_tmp($id)
	{
	    global $d, $row;
    	$sql="select ten_vi from #_city_item where id=".$id." limit 0,1";
    	$d->query($sql);
    	$row=$d->fetch_array();
		return $row['ten_vi'];
	}    
     
function get_item_duong($id_tinh,$id_quan,$id_khuvuc,$id)
	{
	    global $d, $row;
    	$sql="select ten_vi from #_city_sub where id_list=".$id_tinh." and id_cat=".$id_quan." and id_item=".$id_khuvuc." and id=".$id." limit 0,1";
    	$d->query($sql);
    	$row=$d->fetch_array();
		return $row['ten_vi'];
	} 
    	

function get_item_loaibds($id)
	{
	    global $d, $row;
    	$sql="select ten_vi from #_news where hienthi=1 and com='loaibds' and id=".$id." limit 0,1";
    	$d->query($sql);
    	$row=$d->fetch_array();
		return $row['ten_vi'];
	}
	
	
function get_hangxe($id)
	{
	    global $d, $row;
    	$sql="select ten_vi from #_news_list where hienthi=1 and com='oto' and id=".$id." limit 0,1";
    	$d->query($sql);
    	$row=$d->fetch_array();
		return $row['ten_vi'];
	}	
	
	
function get_tenxe($id)
	{
	    global $d, $row;
    	$sql="select ten_vi from #_news_cat where hienthi=1 and com='oto' and id=".$id." limit 0,1";
    	$d->query($sql);
    	$row=$d->fetch_array();
		return $row['ten_vi'];
	}	
	
function get_mauxe($id)
	{
	    global $d, $row;
    	$sql="select ten_vi from #_news where hienthi=1 and com='oto' and id=".$id." limit 0,1";
    	$d->query($sql);
    	$row=$d->fetch_array();
		return $row['ten_vi'];
	}		
	

// danh sách các đánh giá của sản phẩm đó
function getArrRating($id_product){
	global $d;
	$sql="select * from table_rating where id_product=$id_product order by ngaytao desc";
	$d->query($sql);
	$result=$d->result_array();
	return $result;
}

// Tổng số người đánh giá của sản phẩm đó
function getTotalRating($id_product){
	global $d;
	$sql="select count(id) as total from #_rating where id_product=$id_product";
	$d->query($sql);
	$result=$d->fetch_array();
	return $result['total'];
}

// lấy tổng số sao đánh giá
function getTotalStar($id_product){
	global $d;
	$sql="select sum(rating) as star from #_rating where id_product=$id_product";
	$d->query($sql);
	$result=$d->fetch_array();
	$totalStar = $result['star'];
	$totalPer = getTotalRating($id_product);
	$numStar = round($totalStar/$totalPer, 1);
	return $numStar;
}

// lấy tổng số sao đánh giá của từng loại
function getTotalStarOption($id_product,$num){
	global $d;
	$sql="select count(id) as total from #_rating where id_product=$id_product and rating=$num";
	$d->query($sql);
	$result=$d->fetch_array();
	return $result['total'];
}

// Update lại đánh giá tổng quát về sản phẩm
function updateRatingProduct($id_product,$num_rating){
	global $d;
	$sql="update table_product set num_rating='$num_rating' where id=$id_product";
	$d->query($sql);
}	
	
///Get image from URL
function uploadUrl($url,$savePath,$imageRestrict,$imageSizeRestrcit)
{
$type_upload = explode(',',$imageRestrict);
$ext = substr(basename($url),strrpos(basename($url),".")+1);
$tmp = explode('?',$ext);
$ext = $tmp[0];
$name = ChuoiNgauNhien(6);
$result = "ERROR 1";
if(!in_array($ext,$type_upload)){
    return 'ERROR 2';
}
else{
for($i=0;$i<5;$i++){
    $rd.=rand(0,9);
}
$fn = $savePath.$rd.$name.'.'.$ext;
$fp = fopen($fn,"w");
$noidung = file_get_contents($url);
fwrite($fp,$noidung,strlen($noidung));
fclose($fp);
$result = $rd.$name.'.'.$ext;
}
return $result;
}  	

// fix ảnh quay ngược khi up
function image_fix_orientation($path){
	$image = imagecreatefromjpeg($path);
	$exif = exif_read_data($path);
	if (!empty($exif['Orientation'])) {
		switch ($exif['Orientation']) {
			case 3:
				$image = imagerotate($image, 180, 0);
				break;
			case 6:
				$image = imagerotate($image, -90, 0);
				break;
			case 8:
				$image = imagerotate($image, 90, 0);
				break;
		}
		print_r($image);
		imagejpeg($image, $path);
	}
}
	
function pagesListLimit_layout($url , $totalRows , $pageSize = 5, $offset = 5){
	
	$url_back = $_SERVER['HTTP_REFERER'];
	
	if ($totalRows<=0) return "";
	$totalPages = ceil($totalRows/$pageSize);
	
	if ($totalPages<=1) return "";		
	if( isset($_GET["curPage"]) == true)  $currentPage = $_GET["curPage"];
	else $currentPage = 1;
	settype($currentPage,"int");	
	if ($currentPage <=0) $currentPage = 1;	
	
	if ($totalPages>=$currentPage)
	{
				$firstLink = "<li><a href=\"{$url}=1\" class=\"left\"><i class='fa fa-angle-double-left'></i></a><li>";
			
			//echo ($currentPage);
			if($currentPage == $totalPages){
				
				$lastLink="";
			}
			else 
			{
				$lastLink="<li><a href=\"{$url}={$totalPages}\" class=\"right\"><i class='fa fa-angle-double-right'></i></a></li>";
			}
			
			$from = $currentPage - (int)($offset/2);	
			$to = $from + $offset - 1;
			if ($from <=0) { $from = 1;   $to = $offset; }
		if ($to > $totalPages) { $to = $totalPages; }
			for($j = $from; $j <= $to; $j++) {
			   $qt = $url. "={$j}";
			   
			   if ($j == $currentPage) $links = $links . "<li><a href = '{$qt}' class='active'>{$j}</a></li>";		
			   else{				
				
				$links= $links . "<li><a href = '{$qt}'>{$j}</a></li>";
			   } 	   
			} //for
			
			if($currentPage == 1){
				$prevLink = "<li><a href=\"{$url}=1\" class=\"left\"><i class='fa fa-angle-left'></i></a><li>";
			}else{
				$prevj=$currentPage-1;
				$prevLink = "<li><a href=\"{$url}={$prevj}\" class=\"left\"><i class='fa fa-angle-left'></i></a><li>";
			}
			
			if($currentPage == $totalPages){
				$nextLink="";
				//$nextLink="<li><a href=\"{$url}={$totalPages}\" class=\"right\"><i class='fa fa-angle-right'></i></a></li>";
				
			}else{
				$nextj=$currentPage+1;
				$nextLink="<li><a href=\"{$url}={$nextj}\" class=\"right\"><i class='fa fa-angle-right'></i></a></li>";
			}
			
			return '<ul class="pages">'.$firstLink.$prevLink.$links.$nextLink.$lastLink.'<div class="clear"></div></ul>';
			
	}
	else 
	{
		//echo("sai");
		redirect($url_back);
	}
	
	
} 
// function pagesListLimit	

function magic_quote($str, $id_connect=false)	
{	
	if (is_array($str))
	{
		foreach($str as $key => $val)
		{
			$str[$key] = escape_str($val);
		}
		return $str;
	}
	if (is_numeric($str)) {
		return $str;
	}
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}
	if (function_exists('mysql_real_escape_string') AND is_resource($id_connect))
	{
		return mysql_real_escape_string($str, $id_connect);
	}
	elseif (function_exists('mysql_escape_string'))
	{
		return mysql_escape_string($str);
	}
	else
	{
		return addslashes($str);
	}
}
function escape_str($str, $id_connect=false)	
{	
	if (is_array($str))
	{
		foreach($str as $key => $val)
		{
			$str[$key] = escape_str($val);
		}
		
		return $str;
	}
	
	if (is_numeric($str)) {
		return $str;
	}
	
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}

	if (function_exists('mysql_real_escape_string') AND is_resource($id_connect))
	{
		return "'".mysql_real_escape_string($str, $id_connect)."'";
	}
	elseif (function_exists('mysql_escape_string'))
	{
		return "'".mysql_escape_string($str)."'";
	}
	else
	{
		return "'".addslashes($str)."'";
	}
}


function getRemoteIPAddress(){
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    return $ip;
}
  
/* If your visitor comes from proxy server you have use another function
to get a real IP address: */

function getRealIPAddress(){  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


function make_date($time,$dot='.',$lang='vi',$f=false){
	
	$str = ($lang == 'vi') ? date("d{$dot}m{$dot}Y",$time) : date("m{$dot}d{$dot}Y",$time);
	if($f){
		$thu['vi'] = array('Chủ nhật','Thứ hai','Thứ ba','Thứ tư','Thứ năm','Thứ sáu','Thứ bảy');
		$thu['en'] = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		$str = $thu[$lang][date('w',$time)].', '.$str;
	}
	return $str;
}

function delete_file($file){
		return @unlink($file);
}

function upload_image($file, $extension, $folder, $newname=''){
	if(isset($_FILES[$file]) && !$_FILES[$file]['error']){
		
		$ext = end(explode('.',$_FILES[$file]['name']));
		$name = basename($_FILES[$file]['name'], '.'.$ext);
		
		if(strpos($extension, $ext)===false){
			alert('Chỉ hỗ trợ upload file dạng '.$extension);
			return false; // không hỗ trợ
		}
		
		if($newname=='' && file_exists($folder.$_FILES[$file]['name']))
			for($i=0; $i<100; $i++){
				if(!file_exists($folder.$name.$i.'.'.$ext)){
					$_FILES[$file]['name'] = $name.$i.'.'.$ext;
					break;
				}
			}
		else{
			$_FILES[$file]['name'] = $newname.'.'.$ext;
		}
		
		if (!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
			if ( !move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
				return false;
			}
		}
		return $_FILES[$file]['name'];
	}
	return false;
}



//Upload file
function upload_image_index($file, $extension, $folder, $newname=''){
	if(isset($_FILES[$file]) && !$_FILES[$file]['error']){
		
		$ext = end(explode('.',$_FILES[$file]['name']));
		$name = basename($_FILES[$file]['name'], '.'.$ext);
		$name = changeTitleImage($name).'-'.fns_Rand_digit(0,9,4);		

		if(strpos($extension, $ext)===false){
			alert('Chỉ hỗ trợ upload file dạng '.$extension);
			return false; // không hỗ trợ
		}
		
		if($newname=='' or file_exists($folder.$_FILES[$file]['name']))
			for($i=0; $i<100; $i++){
				if(!file_exists($folder.$name.$i.'.'.$ext)){
					$_FILES[$file]['name'] = $name.$i.'.'.$ext;
					break;
				}
			}
		else{
			$_FILES[$file]['name'] = $newname;
		}
		
		if (!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
			if ( !move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
				return false;
			}
		}
		return $_FILES[$file]['name'];
	}
	return false;
}


function chuanhoa($s){
	$s = str_replace("'", '&#039;', $s);
	$s = str_replace('"', '&quot;', $s);
	$s = str_replace('<', '&lt;', $s);
	$s = str_replace('>', '&gt;', $s);
	return $s;
}

function themdau($s){
	$s = addslashes($s);
	return $s;
}

function bodau($s){
	$s = stripslashes($s);
	return $s;
}



function transfer($msg,$page="index.php")
{
	 $showtext = $msg;
	 $page_transfer = $page;
	 include("./templates/transfer_tpl.php");
	 exit();
}

function redirect($url=''){
	echo '<script language="javascript">window.location = "'.$url.'" </script>';
	exit();
}

function back($n=1){
	echo '<script language="javascript">history.go = "'.-intval($n).'" </script>';
	exit();
}

function dump($arr, $exit=1){
	echo "<pre>";	
		var_dump($arr);
	echo "<pre>";	
	if($exit)	exit();
}


function paging_home($r, $url='', $curPg=1, $mxR=5, $mxP=5, $class_paging='')
	{
		if($curPg<1) $curPg=1;
		if($mxR<1) $mxR=5;
		if($mxP<1) $mxP=5;
		$totalRows=count($r);
		if($totalRows==0)	
			return array('source'=>NULL, 'paging'=>NULL);
		$totalPages=ceil($totalRows/$mxR);
		if($curPg > $totalPages) $curPg=$totalPages;
		
		$_SESSION['maxRow']=$mxR;
		$_SESSION['curPage']=$curPg;

		$r2=array();
		$paging="";
		
		//-------------tao array------------------
		$start=($curPg-1)*$mxR;
		$end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
		#echo $start;
		#echo $end;
		
		$j=0;
		for($i=$start;$i<$end;$i++)
			$r2[$j++]=$r[$i];
			
		//-------------tao chuoi------------------
		$curRow = ($curPg-1)*$mxR+1;	
		if($totalRows>$mxR)
		{
			$start=1;
			$end=1;
			$paging1 ="";
			
			$jump = (($mxP%2)!=0)?floor($mxP/2):ceil($mxP/2); 	
			$firt = $curPg - $jump;
			$last = $curPg + $jump;	
			
			if($last>$totalPages)
				$last = $totalPages;
			if($firt<1)
			{
				if($totalPages>$mxP) $last -= $firt;
				$firt = 1;
			}
			if($totalPages>$mxP)
			{
				
				if($curPg>0&& $curPg <= $jump)
					$last += ($mxP-$last);
				if($curPg <= $totalPages && $curPg > $totalPages-$jump)
					$firt = ($totalPages - $mxP +1);
			}
			
			for($i=$firt;$i<=$last;$i++)
			{	
				//if(($i>((int)(($curPg-1)/$mxP))* $mxP) && ($i<=((int)(($curPg-1)/$mxP+1))* $mxP))
				{
					//if($start==1) $start=$i;
					if($i==$curPg){
						$paging1.=" <span>".$i."</span> ";//dang xem
					} 		  	
					else    
					{
						$paging1 .= " <a href='".$url."p=".$i."'  class=\"{$class_paging}\">".$i."</a> ";	
					}
					$end=$i;	
				}
			}//tinh paging
			//$paging.= "Go to page :&nbsp;&nbsp;" ;
			#if($curPg>$mxP)
			#{
			if($curPg>1){
				$paging .=" <a href='".$url."' class=\"{$class_paging}\" >&laquo;</a> "; //ve dau
				
				#$paging .=" <a href='".$url."&curPage=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
				$paging .=" <a href='".$url."p=".($curPg-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
			}
			#}
			$paging.=$paging1; 
			#if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
			#{
				#$paging .=" <a href='".$url."&curPage=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				if($curPg<$totalPages){
					$paging .=" <a href='".$url."p=".($curPg+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
					$paging .=" <a href='".$url."p=".($totalPages)."' class=\"{$class_paging}\" >&raquo;</a> "; //ve cuoi
				}
			#}
		}
		$r3['curPage']=$curPg;
		$r3['source']=$r2;
		$r3['paging']=$paging;
		$r3['total']=$totalRows;
		#echo '<pre>';var_dump($r3);echo '</pre>';
		return $r3;
	}

function paging_home11($r, $url='', $curPg=1, $mxR=5, $mxP=5, $class_paging='')
	{
		if($curPg<1) $curPg=1;
		if($mxR<1) $mxR=5;
		if($mxP<1) $mxP=5;
		$totalRows=count($r);
		if($totalRows==0)	
			return array('source'=>NULL, 'paging'=>NULL);
		$totalPages=ceil($totalRows/$mxR);
				
		
		
		
		if($curPg > $totalPages) $curPg=$totalPages;
		
		$_SESSION['maxRow']=$mxR;
		$_SESSION['curPage']=$curPg;

		$r2=array();
		$paging="";
		
		//-------------tao array------------------
		$start=($curPg-1)*$mxR;		
		$end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
		#echo $start;
		#echo $end;
		
		$j=0;
		for($i=$start;$i<$end;$i++)
			$r2[$j++]=$r[$i];
			
		//-------------tao chuoi------------------
		$curRow = ($curPg-1)*$mxR+1;	
		if($totalRows>$mxR)
		{
			
			$from = $curPg - $mxP;	
			$to = $curPg + $mxP;
			if ($from <=0) { $from = 1;   $to = $mxP*2; }
			if ($to > $totalPages) { $to = $totalPages; }
			for($j = $from; $j <= $to; $j++) {
			   if ($j == $curPg) $links = $links . "<a class=\"paginate_active\" href=\"#\">{$j}</a>";		
			   else{				
				$qt = $url. "&p={$j}";
				$links= $links . "<a class=\"paginate_button\" href = '{$qt}'>{$j}</a>";
			   } 	   
			} //for
									
			//$paging.= "Go to page :&nbsp;&nbsp;" ;
			if($curPg>$mxP)
			{
				$paging .=" <a href='".$url."' class=\"first paginate_button\" >&laquo;</a> "; //ve dau				
				$paging .=" <a href='".$url."&p=".($curPg-1)."' class=\"previous paginate_button\" >&#8249;</a> "; //ve truoc
			}else{
				$paging .=" <a href='".$url."' class=\"first paginate_button paginate_button_disabled\" >&laquo;</a> "; //ve dau				
				$paging .=" <a href='".$url."&p=".($curPg-1)."' class=\"previous paginate_button paginate_button_disabled\" >&#8249;</a> "; //ve truoc
			}
			$paging.=$links; 
			if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
			{
				$paging .=" <a href='".$url."&p=".($curPg+1)."' class=\"next paginate_button\" >&#8250;</a> "; //ke				
				$paging .=" <a href='".$url."&p=".($totalPages)."' class=\"last paginate_button\" >&raquo;</a> "; //ve cuoi
			}else{
				$paging .=" <a href='".$url."&p=".($curPg+1)."' class=\"next paginate_button paginate_button_disabled\" >&#8250;</a> "; //ke				
				$paging .=" <a href='".$url."&p=".($totalPages)."' class=\"last paginate_button paginate_button_disabled\" >&raquo;</a> "; //ve cuoi
			}
		}		
		$r3['curPage']=$curPg;
		$r3['source']=$r2;
		$r3['paging']=$paging;			
		$r3['totalRows']=$totalRows;		
		#echo '<pre>';var_dump($r3);echo '</pre>';
		return $r3;
	}
function catchuoi($chuoi,$gioihan){
// nếu độ dài chuỗi nhỏ hơn hay bằng vị trí cắt
// thì không thay đổi chuỗi ban đầu
if(strlen($chuoi)<=$gioihan)
{
return $chuoi;
}
else{
/*
so sánh vị trí cắt
với kí tự khoảng trắng đầu tiên trong chuỗi ban đầu tính từ vị trí cắt
nếu vị trí khoảng trắng lớn hơn
thì cắt chuỗi tại vị trí khoảng trắng đó
*/
if(strpos($chuoi," ",$gioihan) > $gioihan){
$new_gioihan=strpos($chuoi," ",$gioihan);
$new_chuoi = substr($chuoi,0,$new_gioihan)."...";
return $new_chuoi;
}
// trường hợp còn lại không ảnh hưởng tới kết quả
$new_chuoi = substr($chuoi,0,$gioihan)."...";
return $new_chuoi;
}
}



function utf8convert($str) {
	if(!$str) return false;
	$utf8 = array(
	'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
	'd'=>'đ|Đ',
	'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
	'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
	'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
	'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
	'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
	''=>'`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\“|\”|\:|\;|_',
	);
	foreach($utf8 as $ascii=>$uni)
	$str = preg_replace("/($uni)/i",$ascii,$str);
	return $str;
}
function changeTitle($text){
	$text = strtolower(utf8convert($text));
	$text = preg_replace("/[^a-z0-9-\s]/", "",$text);
	$text = preg_replace('/([\s]+)/', '-', $text);
	$text = str_replace(array('%20', ' '), '-', $text);
	$text = preg_replace("/\-\-\-\-\-/","-",$text);
	$text = preg_replace("/\-\-\-\-/","-",$text);
	$text = preg_replace("/\-\-\-/","-",$text);
	$text = preg_replace("/\-\-/","-",$text);
	$text = '@'.$text.'@';
	$text = preg_replace('/\@\-|\-\@|\@/', '', $text);
	return $text;
} 

function changeTitleImage($str)
{
	$text = strtolower(utf8convert($text));
	$text = preg_replace("/[^a-z0-9-\s]/", "",$text);
	$text = preg_replace('/([\s]+)/', '-', $text);
	$text = str_replace(array('%20', ' '), '-', $text);
	$text = preg_replace("/\-\-\-\-\-/","-",$text);
	$text = preg_replace("/\-\-\-\-/","-",$text);
	$text = preg_replace("/\-\-\-/","-",$text);
	$text = preg_replace("/\-\-/","-",$text);
	$text = '@'.$text.'@';
	$text = preg_replace('/\@\-|\-\@|\@/', '', $text);
	return $text;
}



function getCurrentPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";

        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    
	$pageURL = explode("/page=", $pageURL);
    return $pageURL[0];
}
function create_thumb($file, $width, $height, $folder,$file_name,$zoom_crop='1'){

// ACQUIRE THE ARGUMENTS - MAY NEED SOME SANITY TESTS?

$new_width   = $width;
$new_height   = $height;

 if ($new_width && !$new_height) {
        $new_height = floor ($height * ($new_width / $width));
    } else if ($new_height && !$new_width) {
        $new_width = floor ($width * ($new_height / $height));
    }
	
$image_url = $folder.$file;
$origin_x = 0;
$origin_y = 0;
// GET ORIGINAL IMAGE DIMENSIONS
$array = getimagesize($image_url);
if ($array)
{
    list($image_w, $image_h) = $array;
}
else
{
     die("NO IMAGE $image_url");
}
$width=$image_w;
$height=$image_h;

// ACQUIRE THE ORIGINAL IMAGE
$image_ext = trim(strtolower(end(explode('.', $image_url))));
switch(strtoupper($image_ext))
{
     case 'JPG' :
     case 'JPEG' :
         $image = imagecreatefromjpeg($image_url);
		 $func='imagejpeg';
         break;
     case 'PNG' :
         $image = imagecreatefrompng($image_url);
		 $func='imagepng';
         break;
	 case 'GIF' :
	 	 $image = imagecreatefromgif($image_url);
		 $func='imagegif';
		 break;

     default : die("UNKNOWN IMAGE TYPE: $image_url");
}

// scale down and add borders
	if ($zoom_crop == 3) {

		$final_height = $height * ($new_width / $width);

		if ($final_height > $new_height) {
			$new_width = $width * ($new_height / $height);
		} else {
			$new_height = $final_height;
		}

	}

	// create a new true color image
	$canvas = imagecreatetruecolor ($new_width, $new_height);
	imagealphablending ($canvas, false);

	// Create a new transparent color for image
	$color = imagecolorallocatealpha ($canvas, 255, 255, 255, 127);

	// Completely fill the background of the new image with allocated color.
	imagefill ($canvas, 0, 0, $color);

	// scale down and add borders
	if ($zoom_crop == 2) {

		$final_height = $height * ($new_width / $width);
		
		if ($final_height > $new_height) {
			
			$origin_x = $new_width / 2;
			$new_width = $width * ($new_height / $height);
			$origin_x = round ($origin_x - ($new_width / 2));

		} else {

			$origin_y = $new_height / 2;
			$new_height = $final_height;
			$origin_y = round ($origin_y - ($new_height / 2));

		}

	}

	// Restore transparency blending
	imagesavealpha ($canvas, true);

	if ($zoom_crop > 0) {

		$src_x = $src_y = 0;
		$src_w = $width;
		$src_h = $height;

		$cmp_x = $width / $new_width;
		$cmp_y = $height / $new_height;

		// calculate x or y coordinate and width or height of source
		if ($cmp_x > $cmp_y) {

			$src_w = round ($width / $cmp_x * $cmp_y);
			$src_x = round (($width - ($width / $cmp_x * $cmp_y)) / 2);

		} else if ($cmp_y > $cmp_x) {

			$src_h = round ($height / $cmp_y * $cmp_x);
			$src_y = round (($height - ($height / $cmp_y * $cmp_x)) / 2);

		}

		// positional cropping!
		if ($align) {
			if (strpos ($align, 't') !== false) {
				$src_y = 0;
			}
			if (strpos ($align, 'b') !== false) {
				$src_y = $height - $src_h;
			}
			if (strpos ($align, 'l') !== false) {
				$src_x = 0;
			}
			if (strpos ($align, 'r') !== false) {
				$src_x = $width - $src_w;
			}
		}

		imagecopyresampled ($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);

    } else {

        // copy and resize part of an image with resampling
        imagecopyresampled ($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    }
	


$new_file=$file_name.'_'.$new_width.'x'.$new_height.'.'.$image_ext;
// SHOW THE NEW THUMB IMAGE
if($func=='imagejpeg') $func($canvas, $folder.$new_file,100);
else $func($canvas, $folder.$new_file,floor ($quality * 0.09));

return $new_file;
}
function ChuoiNgauNhien($sokytu){
$chuoi="ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789";
for ($i=0; $i < $sokytu; $i++){
	$vitri = mt_rand( 0 ,strlen($chuoi) );
	$giatri= $giatri . substr($chuoi,$vitri,1 );
}
return $giatri;
} 


function gerenateMemberCode($sokytu){
	global $d;
	$code  = ChuoiNgauNhien($sokytu);
	$d->query("select id from #_user where mauser = '".$code."'");
	if($d->num_rows()){
		return  gerenateMemberCode($sokytu);
	}
	return $code;
}


function check_yahoo($nick_yahoo='nthaih'){
	$file = @fopen("http://opi.yahoo.com/online?u=".$nick_yahoo."&m=t&t=1","r");
	$read = @fread($file,200);
	
	if($read==false || strstr($read,"00"))
		$img = '<img src="images/yahoo_offline.png" border="0" align="absmiddle" />';
	else
		$img = '<img src="images/yahoo_online.png" border="0" align="absmiddle"/>';
	return '<a href="ymsgr:sendIM?'.$nick_yahoo.'">'.$img.'</a>';
}
function limitWord($string, $maxOut){

$string2Array = explode(' ', $string, ($maxOut + 1));

if( count($string2Array) > $maxOut ){
array_pop($string2Array);
$output = implode(' ', $string2Array)."...";
}else{
$output = $string;
}
return $output;
}

function pagesListLimitadmin($url , $totalRows , $pageSize = 5, $offset = 5){
	if ($totalRows<=0) return "";
	$totalPages = ceil($totalRows/$pageSize);
	if ($totalPages<=1) return "";		
	if( isset($_GET["p"]) == true)  $currentPage = $_GET["p"];
	else $currentPage = 1;
	settype($currentPage,"int");	
	if ($currentPage <=0) $currentPage = 1;	
	$firstLink = "<li><a href=\"{$url}\" class=\"left\">First</a><li>";
	$lastLink="<li><a href=\"{$url}&p={$totalPages}\" class=\"right\">End</a></li>";
	$from = $currentPage - $offset;	
	$to = $currentPage + $offset;
	if ($from <=0) { $from = 1;   $to = $offset*2; }
if ($to > $totalPages) { $to = $totalPages; }
	for($j = $from; $j <= $to; $j++) {
	   if ($j == $currentPage) $links = $links . "<li><a href='#' class='active'>{$j}</a></li>";		
	   else{				
		$qt = $url. "&p={$j}";
		$links= $links . "<li><a href = '{$qt}'>{$j}</a></li>";
	   } 	   
	} //for
	return '<ul class="pages">'.$firstLink.$links.$lastLink.'</ul>';
} // function pagesListLimit
function format_size ($rawSize)
  {
    if ($rawSize / 1048576 > 1) return round($rawSize / 1048576, 1) . ' MB';
    else 
      if ($rawSize / 1024 > 1) return round($rawSize / 1024, 1) . ' KB';
      else
        return round($rawSize, 1) . ' Bytes';
  }


function paging($r, $url='', $curPg=1, $mxR=5, $mxP=5, $class_paging='')
	{
		if($curPg<1) $curPg=1;
		if($mxR<1) $mxR=5;
		if($mxP<1) $mxP=5;
		$totalRows=count($r);
		if($totalRows==0)	
			return array('source'=>NULL, 'paging'=>NULL);
		$totalPages=ceil($totalRows/$mxR);
		if($curPg > $totalPages) $curPg=$totalPages;
		
		$_SESSION['maxRow']=$mxR;
		$_SESSION['curPage']=$curPg;

		$r2=array();
		$paging="";
		
		//-------------tao array------------------
		$start=($curPg-1)*$mxR;
		$end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
		#echo $start;
		#echo $end;
		
		$j=0;
		for($i=$start;$i<$end;$i++)
			$r2[$j++]=$r[$i];
			
		//-------------tao chuoi------------------
		$curRow = ($curPg-1)*$mxR+1;	
		if($totalRows>$mxR)
		{
			$start=1;
			$end=1;
			$paging1 ="";				 	 
			for($i=1;$i<=$totalPages;$i++)
			{	
				if(($i>((int)(($curPg-1)/$mxP))* $mxP) && ($i<=((int)(($curPg-1)/$mxP+1))* $mxP))
				{
					if($start==1) $start=$i;
					if($i==$curPg){
						$paging1.=" <span>".$i."</span> ";//dang xem
					} 		  	
					else    
					{
						$paging1 .= " <a href='".$url."&curPage=".$i."'  class=\"{$class_paging}\">".$i."</a> ";	
					}
					$end=$i;	
				}
			}//tinh paging
			//$paging.= "Go to page :&nbsp;&nbsp;" ;
			#if($curPg>$mxP)
			#{
				$paging .=" <a href='".$url."' class=\"{$class_paging}\" >&laquo;</a> "; //ve dau
				
				#$paging .=" <a href='".$url."&curPage=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
				$paging .=" <a href='".$url."&curPage=".($curPg-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
			#}
			$paging.=$paging1; 
			#if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
			#{
				#$paging .=" <a href='".$url."&curPage=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				$paging .=" <a href='".$url."&curPage=".($curPg+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				
				$paging .=" <a href='".$url."&curPage=".($totalPages)."' class=\"{$class_paging}\" >&raquo;</a> "; //ve cuoi
			#}
		}
		$r3['curPage']=$curPg;
		$r3['source']=$r2;
		$r3['paging']=$paging;
		#echo '<pre>';var_dump($r3);echo '</pre>';
		return $r3;
	}

?>