
<div class="row pd0 mg0 ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
        <div class="title_right wow zoomInUp"><h2><?= $title_tcat ?></h2></div>
    </div>
</div>
    <?php
    $a_sid=array();
    foreach($_SESSION['ss'] as $k=>$v){
      $a_sid[$k]=$v['ssid'];
    }
   
    if($_GET['com']=='tim-kiem' || $_GET['com']=='tag') {?>
    <?php if(count($tintuc)<1) {?>
    <p style="font-weight: bold;">
        Không tìm thấy thông tin . <a href="index.html">Click vào đây để đến trang chủ</a>
    </p>
    <?php }?>
    <?php }?>

<div class="row pd0 mg0 ">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">	
	
<div class=" ">
    <?php for ($j = 0, $count_spmoi = count($tintuc); $j < $count_spmoi; $j++) { 
	
		
	?>



		<?php if($tintuc[$j]["email"]!=""){ ?> 
							    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 box_max_width">
								<a class="iframe " href="https://www.youtube.com/embed/<?=$tintuc[$j]["email"]?>?autoplay=1">	
								<div class="item_video">
									<img src="thumb/410x280/1/<?php
														if ($tintuc[$j]['photo'] != NULL)
															echo _upload_news_l . $tintuc[$j]['photo'];
														else
															echo 'images/no-image-available.png';
														?>" alt="<?=$tintuc[$j]["ten_$lang"]?>"/>
							
									<div class="hover_video">
									</div>
									<div class="title_video">
									<?=$tintuc[$j]["ten_$lang"]?>
									</div>
								</div>
								</a>
								</div>
							 <?php }else{?>	
					 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 box_max_width">
								<a  href="<?=$tintuc[$j]["tenkhongdau_$lang"]?>">	
								<div class="item_video">
									<img src="thumb/410x280/1/<?php
														if ($tintuc[$j]['photo'] != NULL)
															echo _upload_news_l . $tintuc[$j]['photo'];
														else
															echo 'images/no-image-available.png';
														?>" alt="<?=$tintuc[$j]["ten_$lang"]?>"/>
							
									<div class="hover_video">
									</div>
									<div class="title_video">
									<?=$tintuc[$j]["ten_$lang"]?>
									</div>
								</div>
								</a>
								</div>
								
							<?php }?>		
			
<?php } ?>
    <div class="clear"></div>
    <div class="wrap_paging">
        <div class="paging paging_ajax clearfix"><?= pagesListLimit_layout($url_link, $totalRows, $pageSize, $offset) ?></div>
		
    </div><!--end wrap_paging-->
</div><!--box_product-->

</div>

</div>


