<?php 
		$d->reset();
		$sql_detail = "select id,photo from #_hasp where hienthi=1 and id_photo='".$tintuc_detail[0]['id']."' and com='".$com_type."' order by stt desc";
		$d->query($sql_detail);
		$count_hinhanh = $d->result_array();
		
		
?>


<div class="row pd0 mg0 ">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
<div class="product">
    <div class="title_right "><h2><span><?= $tintuc_detail[0]["ten_$lang"] ?></span></h2></div>
    <div class="box_content">   
		<div class="text_center">
		<div class="fotorama" data-width="1200" data-ratio="1200/467" data-max-width="100%"  data-nav="thumbs">
		  <?php for ($i = 0; $i < count($count_hinhanh); $i++) { ?>	
				<img src="thumb/640x340/2/<?= _upload_news_l . $count_hinhanh[$i]['photo'] ?>" alt="<?= $tintuc_detail[0]['ten_'.$lang] ?>" title="<?= $tintuc_detail[0]['ten_'.$lang] ?>" />
		  <?php }?>
		</div>
		</div>
		<div class="content">
			<?= $tintuc_detail[0]["noidung_$lang"] ?>
		</div>

        <div class="thongtin_sp">
            <div class="clear" style="height:20px;"></div>
            <div class="fb-comments" data-href="http://<?= $config_url ?>/<?=$tintuc_detail[0]['tenkhongdau_'.$lang]?>" data-width="100%" data-num-posts="10"></div>
            
            <div class="clear"></div>
        </div>
        <!---end tag-->



    </div>   
</div>
</div>
	
</div>





<div class="clear" style="height:20px;"></div>

<div class="row pd0 mg0 ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="title_right "><h2><?= _cacbaikhac ?></h2></div>
    </div>
</div>

<div class="">
<?php


for ($j = 0, $count_spmoi = count($tintuc_khac); $j < $count_spmoi; $j++) { ?>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">	
						<a href="<?=$tintuc_khac[$j]["tenkhongdau_$lang"]?>">
									 <div class="item_product_s wow flipInX" >

											<div class="zoom_product_s">
												<img src="thumb/375x315/1/<?php
												if ($tintuc_khac[$j]['photo'] != NULL)
													echo _upload_news_l . $tintuc_khac[$j]['photo'];
												else
													echo 'images/no-image-available.png';
												?>" alt="<?= $tintuc_khac[$j]["ten_$lang"] ?>" />
												
												
											</div>
											<div class="name_product_s">
													<h3>
														<?= $tintuc_khac[$j]["ten_$lang"] ?>
													</h3>
													<p><?=catchuoi($tintuc_khac[$j]["mota_$lang"],50)?></p>
											</div>
									  
										</div><!--item_product-->
								</a>
			
			</div>		
<?php } ?>
    <div class="clear"></div>
    <div class="wrap_paging">
        <div class="paging paging_ajax clearfix"><?= pagesListLimit_layout($url_link, $totalRows, $pageSize, $offset) ?></div>
    </div><!--end wrap_paging-->
</div><!--box_product-->

<script>
$(".content_tab[id^='tab']").hide(); // Hide all content
    $("#tab_content li:first").attr("id","current"); // Activate the first tab
    $(".content_tab#tab1").fadeIn(); // Show first tab's content
    
    $('#tab_content a').click(function(e) {
        e.preventDefault();
        if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
         return;       
        }
        else{             
          $(".content_tab").hide(); // Hide all content
          $("#tab_content li").attr("id",""); //Reset id's
          $(this).parent().attr("id","current"); // Activate this
          $('#' + $(this).attr('name')).fadeIn(); // Show content for the current tab
        }
    });
</script>