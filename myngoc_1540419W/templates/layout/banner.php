<?php	
	
	$d->reset();
    $sql = "select * from #_photo where com='banner_top'";
    $d->query($sql);
    $item = $d->fetch_array();
	

	
	
	
	

?>
<div class="banner_top">
<div class="banner_flash">

<a href="index.html" style="width: 100%;z-index: 11;position: RELATIVE;"><img src="<?=_upload_hinhanh_l.$item["photo_$lang"]?>"  height="165" /></a>
<?php /*?><object width="1000" height="160" data="<?=_upload_hinhanh_l.$item["photo_$lang"]?>" type="application/x-shockwave-flash">
<param value="<?=_upload_hinhanh_l.$item["photo_$lang"]?>" name="movie">
<param value="high" name="quality">
<param value="transparent" name="wmode">
</object>
<?php */?>
<div class="clear"></div>
</div><!--end banner_flash-->


<div class="free_tran">


 
<?php /*?><div class="lang_con">


 <span><a href="langs/vi" title="Tiếng việt" id="flag_vi"><img src="images/lang_vi.png" width="30" height="21" style=" width:30px; height:21px;" alt="Tiếng việt" title="Tiếng việt"></a>
 </span>&nbsp;
 
 <span><a href="langs/en" title="English" id="flag_en"><img src="images/lang_en.png" width="28" height="21" style=" width:28px; height:21px;" alt="English" title="English">
 </a></span>


   <div class="clear"></div>
</div><!--end lang_con-->
<?php */?>


     
    
 <div class="clear"></div>

		
          <div class="huongdan_muahang">
   
   <a href=""><img src="images/icon_huongdanmuahang.png" width="339" height="63" /></a>
   </div><!--end huongdan_muahang-->
   
   <div class="clear"></div>


<?php /*?><div id="shop_cart_index">
<?php include _template."layout/shop_cart.php"; ?>

</div><!--end shop_cart_index--><?php */?>


</div><!--end free_tran-->
<div class="clear"></div>



</div><!--end banner_top-->


