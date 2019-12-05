

<link rel="stylesheet" type="text/css" href="jcarouselresponsive/css/jcarousel.responsive.css">

<script type="text/javascript" src="jcarouselresponsive/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="jcarouselresponsive/js/jcarousel.responsive.js"></script>
<script type="text/javascript">
    var mzOptions = {zoomMode: "magnifier"};
    MagicZoomPlus.options = {
        'pan-zoom': false,
        'expand-size': 'width=480'
    }


</script>
<style>

</style>



<div class="row pd0 mg0 ">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
<div class="product">
    <div class="title_right "><h2><span><?= $row_detail["ten_$lang"] ?></span></h2></div>
    <div class="box_content">   
        <div class="col-lg-6 col-md-6  col-sm-6 col-xs-12  des320  " style="text-align: center">

            <div class="ct-l">

                <div class="ct-img">

                    <a id="Zoomer" href="<?= _upload_product_l . $row_detail["photo"] ?>"  class="MagicZoom" data-options="zoomMode: magnifier;" title="<?= $row_detail["ten_$lang"] ?>">
                        <img style="max-width: 100%;height: auto" src="<?= _upload_product_l . $row_detail["photo"] ?>" border="0" style="float:left;" />
                    </a>

                </div>
            </div><!--End ct-1-->
            <div class="ct-sp-j hinh_anh_1">
                <?php
                $count_hinhanh = count($album_hinh);
                //echo $count_hinhanh; exit;
                if ($count_hinhanh > 0) {
                    ?>   
                    <div id="slideShow" class="ImageCarouselBox jcarousel-wrapper" style="margin: 0 0 0 -15px;">               
                        <div class="ProductTinyImageList listImages jcarousel">
                            <ul style="margin-left:-20px;">      

                                <li style=" list-style-type:none; margin-right:2px; margin-bottom:10px;">
                                    <div class="TinyOuterDiv" style=" margin: 0 0 0 20px;">
                                        <div style="width: 60px; height: 60px;">

                                            <a href="<?= _upload_product_l . $row_detail['photo'] ?>" rel="zoom-id: Zoomer" rev="<?= _upload_product_l . $row_detail['photo'] ?>" title="<?= $row_detail['ten'] ?>"><img src="<?= _upload_product_l . $row_detail['thumb'] ?>" class="jshop_img_thumb" /></a>
                                        </div>
                                    </div>
                                </li>


                                <?php for ($i = 0; $i < $count_hinhanh; $i++) { ?>       
                                    <li style=" list-style-type:none; margin-right:2px; margin-bottom:10px;">
                                        <div class="TinyOuterDiv" style=" margin: 0 0 0 20px;">
                                            <div style="width: 60px; height: 60px;">

                                                <a href="<?= _upload_product_l . $album_hinh[$i]['photo'] ?>" rel="zoom-id: Zoomer" rev="<?= _upload_product_l . $album_hinh[$i]['photo'] ?>" title="<?= $row_detail['ten'] ?>"><img src="<?= _upload_product_l . $album_hinh[$i]['photo'] ?>" class="jshop_img_thumb" /></a>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>                                
                            </ul>
                        </div>
                        <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                        <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                    </div>
                <?php } ?> 

            </div><!--ct-sp-j-->

        </div><!--End colum-->
        <div class="col-lg-6 col-md-6  col-sm-6 col-xs-12 des320 ">
            <ul class="product_info_2">
	
				<li class="noborder"> <b><?= _mota ?>: </b> <?= $row_detail["mota_$lang"] ?></li>
				
                <li><b><?= _ngaydang ?>:</b><?= date('d-m-Y', $row_detail["ngaytao"]) ?></li>   

                <li class="noborder"><b><?= _luotxem ?>:</b> <?= $row_detail['luotxem'] ?></li>
		
           
            </ul> 
            <div style="margin:10px 0">
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style">
                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                    <a class="addthis_button_tweet"></a>
                    <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                    <a class="addthis_counter addthis_pill_style"></a>
                </div>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar": false};</script>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52843d4e1ff0313a"></script>
                <!-- AddThis Button END -->
            </div>

        </div> 




        <div class="thongtin_sp">
            <div class="clear" style="height:20px;"></div>
            <div id="info_deals" class="usual"> 
                <ul id="tab_content">
                    <li ><a href="#" name="tab1"><?=_thongtinsanpham?></a></li>
                    <li ><a href="#" name="tab2"><?= _binhluan?></a></li>
					
                </ul>
                <div id="tab1" class="content_tab">
                     <?= $row_detail["noidung_" . $lang] ?>
                        <div class="clear"></div>
                </div>
                <div id="tab2" class="content_tab">
					          <div class="fb-comments" data-href="http://<?=$config_url?>/san-pham/<?=$row_detail['tenkhongdau_'.$lang]?>-<?=$row_detail['id']?>.html" data-width="100%" data-num-posts="10"></div>
    
                        <div class="clear"></div>
                </div>
			
            </div>
            
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
        <div class="title_right "><h2><?= _sanphamcungloai ?></h2></div>
    </div>
</div>

<div class="box_product box_spnb">
<?php

		$a_sid=array();
		foreach($_SESSION['ss'] as $k=>$v){
		  $a_sid[$k]=$v['ssid'];
		}

		for ($j = 0, $count_spmoi = count($sanpham_khac); $j < $count_spmoi; $j++) { ?>   
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
			<a href="<?= $sanpham_khac[$j]["tenkhongdau_$lang"] ?>" title="<?=_xem?>" tabindex="0">
				    <div class="item_duan wow flipInX" >

                    <div class="zoom_duan">
                        <img src="thumb/380x390/1/<?php
                        if ($sanpham_khac[$j]['photo'] != NULL)
                            echo _upload_product_l . $sanpham_khac[$j]['photo'];
                        else
                            echo 'images/no-image-available.png';
                        ?>" alt="<?= $sanpham_khac[$j]["ten_$lang"] ?>" />
						
						<div class="name_thietke">
								<h3>
									<?= $sanpham_khac[$j]["ten_$lang"] ?>
								</h3>
							
								
						</div>
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