

<!--<link rel="stylesheet" type="text/css" href="jcarouselresponsive/css/jcarousel.responsive.css">

<script type="text/javascript" src="jcarouselresponsive/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="jcarouselresponsive/js/jcarousel.responsive.js"></script>-->
<script type="text/javascript">
    var mzOptions = {zoomMode: "magnifier"};
    MagicZoomPlus.options = {
        'pan-zoom': false,
        'expand-size': 'width=480'
    }

</script>
<style>
    .a a{
        background: linear-gradient(#64c03d, #0c932f) no-repeat scroll 0 0 rgba(0, 0, 0, 0);
        border-radius: 4px;
        color: #fff;
        padding: 5px 15px;
        margin-top:30px;
    }
    .a a:hover{
        background: linear-gradient(White, #cdcdcd) no-repeat scroll 0 0 rgba(0, 0, 0, 0);
        color: #333;
    }
    .jcarousel-skin-tango .jcarousel-container-horizontal {
        margin-left:0 !important;
        background:none;

    }
    .jcarousel-skin-tango .jcarousel-clip-horizontal {
        background: none;
        margin-left:0 !important;
        margin-right:0 !important;
        height:55px;
    }
    .jcarousel-skin-tango .jcarousel-container-horizontal {
        background:none;
        margin-top:20px !important;
        height:55px;
        border:none !important;
    }
    div.jszoom-product {
        float: left;
        padding-bottom: 10px;
        width: 100%;

        margin-right:20px;
    }
    div.thumb ul {
        list-style: none outside none;
        position: relative;
        padding:0;
    }
    div.thumb ul li {
        list-style:none;
        display: none;
        position: absolute;
        width: 100%;
        z-index: 0;
    }
    div.thumb ul li.active {
        display: block;
        z-index: 10;
    }
    .item_pro{
        height:215px !important;
    }
    .jcarousel-control-next,.jcarousel-control-prev{
        color: #dd4a4b!important;
        border: 1px solid #dd4a4b;
        border-radius: 50%;
        top: 37%!important;
    }
</style>


<div class="product">
    <div class="title_right "><h2><span><?= _chitietsanpham ?></span></h2></div>
    <div class="box_content">   
        <div class="col-lg-6 col-md-6  col-sm-6 col-xs-12  des320  " style="text-align: center">

            <div class="ct-l">

                <div class="ct-img">

                    <a id="Zoomer" href="<?= _upload_product_l . $row_detail["photo"] ?>"  class="MagicZoom" data-options="zoomMode: magnifier;" title="<?= $row_detail["ten_$lang"] ?>">
                        <img style="max-width: 100%;height: auto" src="thumb/400x400/2/<?= _upload_product_l . $row_detail["photo"] ?>" border="0" style="float:left;" />
                    </a>



                    <div class="ct-sp-j hinh_anh_1">
                        <?php
                        $count_hinhanh = count($album_hinh);

                        if ($count_hinhanh > 0) {
                            ?>   
                            <div id="slideShow" class="ImageCarouselBox jcarousel-wrapper" style="margin: 0 0 0 -15px;">               
                                <div class="ProductTinyImageList listImages jcarousel">
                                    <ul style="margin-left:-20px;">      

                                        <li style=" list-style-type:none; margin-right:2px; margin-bottom:10px;">
                                            <div class="TinyOuterDiv" style=" margin: 0 0 0 20px;">
                                                <div style="width: 60px; height: 60px;">
                                                    <a href="thumb/400x400/2/<?= _upload_product_l . $row_detail['photo'] ?>" rel="zoom-id: Zoomer" rev="<?= _upload_product_l . $row_detail['photo'] ?>" title="<?= $row_detail['ten'] ?>"><img src="<?= _upload_product_l . $row_detail['thumb'] ?>" class="jshop_img_thumb" /></a>
                                                </div>
                                            </div>
                                        </li>

                                        <?php for ($i = 0; $i < $count_hinhanh; $i++) { ?>       
                                            <li style=" list-style-type:none; margin-right:2px; margin-bottom:10px;">
                                                <div class="TinyOuterDiv" style=" margin: 0 0 0 20px;">
                                                    <div style="width: 60px; height: 60px;">

                                                        <a href="thumb/400x400/2/<?= _upload_product_l . $album_hinh[$i]['thumb'] ?>" rel="zoom-id: Zoomer" rev="<?= _upload_hinhanh_l . $album_hinh[$i]['photo'] ?>" title="picture"><img src="<?= _upload_product_l . $album_hinh[$i]['thumb'] ?>" class="jshop_img_thumb" /></a>
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


                </div>




            </div><!--End ct-1-->

        </div><!--End colum-->
        <div class="col-lg-6 col-md-6  col-sm-6 col-xs-12 des320 ">
            <ul class="product_info_2">
                <li><span ><h3 ><?= $row_detail["ten_$lang"] ?></h3></span></li>  
                <li><b>Giá: <span style="color:#F00;"><?php if ($row_detail["gianhap"] == "") { ?> <?= _lienhe ?> <?php } else { ?> <?= $row_detail["gianhap"] ?> <?php } ?></span></b></li>



                <li><b><?= _ngaydang ?>:</b><?= date('d-m-Y', $row_detail["ngaytao"]) ?></li>       

                <li class="noborder"><b><?= _luotxem ?>:</b> <?= $row_detail['luotxem'] ?></li>


                <li class="noborder"> <?= $row_detail["mota_$lang"] ?></li>
            </ul> 
            <div style="margin:10px 0">
              <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style">
                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                <a class="addthis_button_tweet"></a>
                <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                <a class="addthis_counter addthis_pill_style"></a>
                </div>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52843d4e1ff0313a"></script>
                <!-- AddThis Button END -->
            </div>

        </div>   
        <!--        <div class="row pd0 mg0">
                    <div class="col-lg-12 col-md-12   col-sm-12 col-xs-12 des320 "> 
        <?= $row_detail["noidung"] ?>
        
                    </div>
                </div>
                <div class="row pd0 mg0">
                    <div class="col-lg-12 col-md-12   col-sm-12 col-xs-12 des320 "> 
        <div class="fb-comments" data-href="http://<?= $config_url ?>/san-pham/<?= $row_detail['tenkhongdau'] ?>-<?= $row_detail['id'] ?>.html" data-width="100%" data-num-posts="10"></div>
                  
        
                    </div>
                </div>-->

        <div class="thongtin_sp">
            <div class="clear" style="height:20px;"></div>
            <div id="tab-container-1" style="margin-top:30px">
                <ul id="tab-container-1-nav" class="tablayout">
                    <li class="activeli" id="tab_1"><a href="#tab1">Thông tin chi tiết</a></li>
                    <li id="tab_2"><a href="#tab2">Giấy chứng nhận</a></li>
                    <li id="tab_3"><a href="#tab3">Video</a></li>

                </ul>
                <div class="tabs-container">
                    <div class="tab" id="tab1">
                        <?= $row_detail["noidung"] ?>
                        <div class="clear"></div>
                    </div>
                    <div class="tab" id="tab2">
                        <?= $row_detail["thongso"] ?>
                    </div>
                    <div class="tab" id="tab3">
                        <?= $row_detail["xuatxu"] ?>
                    </div>
                </div>
            </div>
            <script>
                var tabber1 = new Yetii({
                    id: 'tab-container-1',
                    active: 1,
                    timeout: null,
                    interval: null,
                    tabclass: 'tab',
                    activeclass: 'active'
                });
            </script>
            <div class="clear"></div>
        </div>
        <!---end tag-->



    </div>   
</div>
<div class="clear" style="height:20px;"></div>

<div class="row pd0 mg0 ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="title_right "><h2><?=$title_tcat?></h2></div>
    </div>
</div>

<div class="box_product">
    <?php for ($j = 0, $count_spmoi = count($sanpham_khac); $j < $count_spmoi; $j++) { ?>

        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <a href="san-pham/<?=$sanpham_khac[$j]["tenkhongdau_$lang"]?>-<?=$sanpham_khac[$j]["id"]?>.html">
            <div class="item_product" >
                    <div class="zoom_product">
                        <img src="thumb/265x240/1/<?php if($sanpham_khac[$j]['photo']!=NULL) echo _upload_product_l.$sanpham_khac[$j]['photo']; else echo 'images/no-image-available.png';?>" alt="<?= $sanpham_khac[$j]["ten_$lang"] ?>" />
                    </div>
                    <div class="name_product">
                        <h3>
                          <?= $sanpham_khac[$j]["ten_$lang"] ?>
                        </h3>
                      
                    </div>
                <div class="shadow_product">
                    
                </div>
                <div class="icon_chitiet hvr-wobble-horizontal">
                    <p><?=_chitiet?> >></p>
                </div>
                
            </div><!--item_product-->
            </a>
        </div>
    <?php } ?>
    <div class="clear"></div>
    <div class="wrap_paging">
            <div class="paging paging_ajax clearfix"><?=pagesListLimit_layout($url_link , $totalRows , $pageSize, $offset)?></div>
        </div><!--end wrap_paging-->  
</div><!--box_product-->

