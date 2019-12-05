
<div class="row pd0 mg0 ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="title_right wow zoomInUp"><h2><?= $title_tcat ?></h2></div>
    </div>
</div>
<div class="row pd0 mg0 ">

        <div class="box_content">
            <div class="content">
                <?php
                if (count($tintuc) > 0) {
                    for ($i = 0, $count_tintuc = count($tintuc); $i < $count_tintuc; $i++) {
                        ?>
                  
                
               	    	    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 wow fadeInLeftBig">
                            <a href="<?=$tintuc[$i]["tenkhongdau_$lang"]?>" title="<?=$tintuc[$i]["ten_$lang"]?>">
                            <div class="box_news " >
                                <div class="image_boder">
                                     <img src="thumb/376x300/1/<?php if($tintuc[$i]['photo']!=NULL) echo _upload_news_l.$tintuc[$i]['photo']; else echo 'images/no-image-available.png';?>" alt="<?=$tintuc[$i]["ten_$lang"]?>"/>
                                </div>
                                <h2> <?=$tintuc[$i]["ten_$lang"]?></h2>               
                                <p>
                                    <?=catchuoi($tintuc[$i]["mota_$lang"],150)?>
                                </p>
								<div class="icon_xemthem2">Xem thêm</div>
                                <div class="clear" ></div>             
                            </div>
                            </a>
                        </div>
                
                <?php } }else echo '<p class="notice">'._noidungdangcapnhat.'</p>';  ?>    
                <div class="clear"></div>
                 <div class="paging paging_ajax clearfix"><?=pagesListLimit_layout($url_link , $totalRows , $pageSize, $offset)?></div>
                <div class="clear"></div>
            </div></div>

</div>



