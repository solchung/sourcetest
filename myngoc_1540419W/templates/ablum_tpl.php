

<div class="row pd0 mg0 ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
        <div class="title_right wow zoomInUp"><h2><?= $title_tcat ?></h2></div>
    </div>
</div>

<div class="block_content">

    
    <div  id="gallery"  class="row pd0 mg0">
    
		       <?php for($j=0;$j<count($tintuc);$j++) {?>
									
						  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
									<a  href="<?php
																	if ($tintuc[$j]['photo'] != NULL)
																		echo _upload_hinhanh_l . $tintuc[$j]['photo'];
																	else
																		echo 'images/no-image-available.png';
																	?>" alt="<?=$tintuc[$j]["ten_$lang"]?>">	
											<div class="item_video wow flipInX" >
												<img src="thumb/270x210/1/<?php
																	if ($tintuc[$j]['photo'] != NULL)
																		echo _upload_hinhanh_l . $tintuc[$j]['photo'];
																	else
																		echo 'images/no-image-available.png';
																	?>" alt="<?=$tintuc[$j]["ten_$lang"]?>"/>
										
												<div class="hover_video">
													<h3><?=$tintuc[$j]["ten_$lang"]?></h3>
												</div>
											</div>
											</a>
								
							</div>
						<?php }?>
   

    </div><!--end show-pro-->
	
		<div class="wrap_paging">
            <div class="paging paging_ajax clearfix"><?=pagesListLimit_layout($url_link , $totalRows , $pageSize, $offset)?></div>
        </div><!--end wrap_paging-->  
 
</div><!--end block_content-->



