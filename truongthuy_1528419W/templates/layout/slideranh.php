<?php
 if($source=='index'){
	 $slider='slider';
 }else{
	 //$slider=$com_type;
	  $slider='slider';
 }

$d->reset();
$sql = "select photo,link, ten_$lang as ten, mota_$lang as mota from #_image_url where hienthi=1 and com= '".$loai."$slider' order by stt,id desc";
$d->query($sql);
$result_slider = $d->result_array();


?>

<?php 
	if($source=='index'){
		$size='1366x550';
	}else{
		$size='1366x150';
	}
?>

<link rel="stylesheet" type="text/css" href="js/bxslider/jquery.bxslider.css" />
<script type='text/javascript' src="js/bxslider/jquery.bxslider.js"></script>
<style>
    .bx-wrapper .bx-viewport{
        border: none!important;
        left:0px!important;
        box-shadow: none!important;
    }
    .bx-wrapper .bx-caption{
        text-align: left;
    }
    .bx-wrapper .bx-caption span{

        color: white!important;

    }
</style>


<div class="row pd0 mg0 ">
<div class="col-lg-12 col-md-12 col-sd-12 col-xs-12 pd0 " >
    <div class="slider-wrapper theme-default"  >
	
        <div class="banner_menu">
			<?php include _template . "layout/header.php"; ?> 
		</div>
		
	
	<?php if(count($result_slider)>0){?>
		
				<div id="slider" >
					<ul class="bxslider ">
						<?php for ($i = 0; $i < count($result_slider); $i++) { ?>
							<li class="box_hinh">
							<a href="<?= $result_slider[$i]["link"] ?>">
								<img src="thumb/<?=$size?>/1/<?=_upload_hinhanh_l.$result_slider[$i]["photo"]?>" title="<?= $result_slider[$i]["ten"] ?>" />
							</a>
							
							</li>
						<?php } ?>
					</ul>
				
				</div>
				
	<?php }?>
		</div>
</div>
</div>

<script type="text/javascript">
   
        $('.bxslider').bxSlider({
            auto:true,
            mode: 'fade',
            captions: false,
            pager: false
        });

</script>















