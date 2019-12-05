<?php 
$d->reset();
$sql = "select ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,id,photo,background from #_product_list where hienthi=1 and com='product' and noibat>0  order by stt asc ";
$d->query($sql);
$cata_index = $d->result_array();

$d->reset();
$sql_news = "select ten_$lang,tenkhongdau_$lang,noidung_$lang,id,photo,thumb,mota_$lang,ngaytao from #_news where hienthi=1 and com='bacsi' and tinnoibat>0  order by stt,id asc";
$d->query($sql_news);
$bacsi = $d->result_array();

$d->reset();
$sql_news = "select ten_$lang,tenkhongdau_$lang,noidung_$lang,id,photo,thumb,mota_$lang,ngaytao from #_news where hienthi=1 and com='khachhang' and tinnoibat>0  order by stt,id asc";
$d->query($sql_news);
$khachhang = $d->result_array();
?>
<div class="container pd0">
<div class="row pd0 mg0 ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
        <div class="title_right "><a ><h2>catalogue</h2></a></div>
    </div>
</div>
</div>
<div class="container2 pd0">
<div class="box_catalogue">
	<?php for($i=0;$i<count($cata_index);$i++) {?>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
			<div class="item_cata">
				<a href="<?=$cata_index[$i]["tenkhongdau"]?>/">
				<div class="img_cata">
					<img src="thumb/580x140/1/<?= _upload_product_list_l . $cata_index[$i]["background"] ?>" />
					<div class="img_text">
						<h3><?=$cata_index[$i]["ten"]?></h3>
					</div>
				</div>
				</a>
				<div class="list_cata">
					<div class="row pd0 mg0 ">
					<?php 
						$d->reset();
						$sql = "select ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,id,id_list from #_product_cat where hienthi=1 and id_list=".$cata_index[$i]["id"]." and com='product'  order by stt asc limit 0,5 ";
						$d->query($sql);
						$list_cata = $d->result_array();
						for($j=0;$j<count($list_cata);$j++){
					?>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
								<a href="<?= $cata_index[$i]["tenkhongdau"] ?>/<?= $list_cata[$j]["tenkhongdau"] ?>/"><?=$list_cata[$j]['ten']?></a>
							</div>
					<?php }?>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 spec_cata">
								<a href="<?=$cata_index[$i]["tenkhongdau"]?>/">All Vitamins & Supplements >></a>
							</div>
					</div>
				</div>
			</div>
		</div>
	<?php }?>
</div>
</div>


<div class="container2 pd0">
	<div class="row pd0 mg0 ">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
		<div class="title-index">
        <h3 class="title-index-name"><?=_thongtinbacsi?></h3>
		</div><!--END title_index--> 
		
		<div class="box_spec r_spec">
		<?php for($i=0;$i<count($bacsi);$i++) {?>
		<a href="thong-tin-bac-si/<?=$bacsi[$i]["tenkhongdau_$lang"]?>-<?=$bacsi[$i]["id"]?>.html">
		<div class="item_spec">
			<div class="box_1">
			<img src="thumb/145x145/1/<?php if($bacsi[$i]['photo']!=NULL) echo _upload_news_l.$bacsi[$i]['photo']; else echo 'images/no-image-available.png';?>" alt="<?=$bacsi[$i]["ten_$lang"]?>"/>
			<h3><?=$bacsi[$i]["ten_$lang"]?></h3>
			<p><?=$bacsi[$i]["mota_$lang"]?></p>
			</div>
			<div class="box_2">
			<p><?=$bacsi[$i]["noidung_$lang"]?></p>
			</div>
		</div>
		</a>
		<?php }?>
		</div>
		
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
		<div class="title-index">
        <h3 class="title-index-name"><?=_khachhangnoivechungtoi?></h3>
		</div><!--END title_index--> 
		
		<div class="box_spec_2 r_spec">
		<?php for($i=0;$i<count($khachhang);$i++) {?>
		<div class="item_spec2">
			<div class="box2_1">
			<img src="thumb/145x145/1/<?php if($khachhang[$i]['photo']!=NULL) echo _upload_news_l.$khachhang[$i]['photo']; else echo 'images/no-image-available.png';?>" alt="<?=$khachhang[$i]["ten_$lang"]?>"/>
			<h3><?=$khachhang[$i]["ten_$lang"]?></h3>
			<p><?=$khachhang[$i]["mota_$lang"]?></p>
			</div>
			<div class="box2_2">
			<p><?=$khachhang[$i]["noidung_$lang"]?></p>
			</div>
		</div>
		<?php }?>
		</div>
		</div>
	</div>
</div>


<script type="text/javascript">
            $(document).ready(function () {
                $('.r_spec').slick({
					autoplay: true,
                    dots: false,
                    infinite: true,
                    speed: 1000,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    fade: true,
                    responsive: [
                        {
                            breakpoint: 1034,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: false
                            }
                        },
                        {
                            breakpoint: 630,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }

                    ]
                });

            });
        </script>