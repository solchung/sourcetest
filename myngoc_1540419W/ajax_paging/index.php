<?php
	session_start();
	@define ( '_template' , '../templates/');
	@define ( '_lib' , '../admin/lib/');
	@define ( '_source' , '../sources/');	
	
	$lang = $_POST["lang"];
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	
	if(isset($_POST["page"]))
    {
	$paging = new paging_ajax();
	$paging->class_pagination = "pagination";
	$paging->class_active = "active";
	$paging->class_inactive = "inactive";
	$paging->class_go_button = "go_button";
	$paging->class_text_total = "total";
	$paging->class_txt_goto = "txt_go_button";
    $paging->per_page = 5; 	
    $paging->page = $_POST["page"];
    $paging->text_sql = "select id,tieude,id_cat,photo,id_item,giaban,min,donvi from table_product where hienthi=1 order by stt,id desc";
    $result_pag_data = $paging->GetResult();
	$message = "";
	$paging->data = "" . $message . "";
    }
	
	$d->reset();
	$sql = "select ngonngu_$lang from #_ngonngu";
	$d->query($sql);
	$ngonngu = $d->result_array();
	
	$ngonngu = explode("|",$ngonngu[0]['ngonngu_'.$lang]);
?>

<div class="khung_1">
<div class="thanh_k">
	<h2><?=$ngonngu[30]?></h2>
    <?=$paging->Load()?>
</div>
<div class="khu_load_1">
<?php while ($row = mysql_fetch_array($result_pag_data)) {?>  
		<?php
            $d->reset();
            $sql = "select id,ten_$lang from #_product_cat where hienthi=1 and id='".$row['id_cat']."'";
            $d->query($sql);
            $row_ct = $d->fetch_array();
			
			$d->reset();
            $sql = "select id,ten_$lang from #_product_item where hienthi=1 and id='".$row['id_item']."'";
            $d->query($sql);
            $row_ct2 = $d->fetch_array();
        ?>
              
<div class="sp1">
 		 <div class="hinhsp">
             <a href="san-pham/<?=bodautv($row_ct['ten_'.$lang])?>/<?=bodautv($row_ct2['ten_'.$lang])?>/<?=bodautv($row['tieude'])?>/<?=$row['id']?>.html" >
             <img src="<?=_upload_sanpham_l.$row['photo']?>" width="165" height="200"   border="0" ></a>
         </div>
         <h3><a href="san-pham/<?=bodautv($row_ct['ten_'.$lang])?>/<?=bodautv($row_ct2['ten_'.$lang])?>/<?=bodautv($row['tieude'])?>/<?=$row['id']?>.html" ><?=$row['tieude']?></a></h3>
         <div ><?=$ngonngu[31]?> :  <b>$ <?=$row['giaban']?></b> </div>
         <div class="chitiet">MOQ : <b style="color:rgba(255,255,255,1);"><?=$row['min']?> / <?=$row['donvi']?></b></div>
  </div>  
  <?php } ?>   
 </div> 
</div>
