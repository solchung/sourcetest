

<div class="row pd0 mg0 ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
        <div class="title_right wow zoomInUp"><h2><?= $title_tcat ?></h2></div>
    </div>
</div>

<div class="block_content">

    
    <div class="row pd0 mg0">
    
		       <?php for($i=0;$i<count($video);$i++) {?>
									
						  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
								<div class="item_video">
								<img src="https://img.youtube.com/vi/<?=$video[$i]["link"]?>/0.jpg " alt="<?=$video[$i]["ten_$lang"]?>"/>
								<div class="title_video">
								<?=$video[$i]["ten_$lang"]?>
								</div>
								<a class="iframe" href="https://www.youtube.com/embed/<?=$video[$i]["link"]?>?autoplay=1">
									<div class="hover_video">
									</div>
								</a>
								</div>
								
							</div>
						<?php }?>
   

    </div><!--end show-pro-->
	
		<div class="wrap_paging">
            <div class="paging paging_ajax clearfix"><?=pagesListLimit_layout($url_link , $totalRows , $pageSize, $offset)?></div>
        </div><!--end wrap_paging-->  
 
</div><!--end block_content-->


	<script type="text/javascript">
		$(document).ready(function () {
			$(".iframe").fancybox({
			type: "iframe"
			});
		});
	</script>

