<?php
$d->reset();
$sql_banner_giua = "select banner_$lang from #_banner where com='banner_top' ";
$d->query($sql_banner_giua);
$row_logo = $d->fetch_array();

$d->reset();
$sql_banner = "select banner_$lang from #_banner where com='banner_giua' ";
$d->query($sql_banner);
$row_banner = $d->fetch_array();


$d->reset();
$sql_banner = "select banner_$lang from #_banner where com='banner_phai' ";
$d->query($sql_banner);
$row_banner_mobile = $d->fetch_array();

$d->reset();
$sql = "select ten_$lang,id,link,photo from #_image_url where hienthi=1 and com='mangxahoi' order by stt asc";
$d->query($sql);
$mxh = $d->result_array();


$d->reset();
$sql = "select ten_$lang,tenkhongdau_$lang,id from #_product_list where hienthi=1 and com='product' order by stt asc";
$d->query($sql);
$list_product = $d->result_array();



?>

	
<div class="banner_s">

		<div class="banner_top"> 
		<div class="container">
			<div class="row pd0 mg0 ">
				
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0 thongtin_top ">
				<div class="row pd0 mg0 ">
					
					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pd0 ">
						<a  class="b_map">
						 Địa chỉ: <span><?=$row_setting["diachi_$lang"]?></span> 
						</a>
					</div>
					
					
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pd0  text_right">
						<a  class="b_hotline">
						Hotline: <span><?=$row_setting["hotline"]?></span><br>
						</a>
				
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pd0 text_right">
						<a  class="b_email">
						Email: <span><?=$row_setting["email"]?></span><br>
						</a>				
					</div>
					
					
				</div>
				</div>
			
			</div>
		</div>
		</div>	
	
	<div class="banner_logo_menu"> 
	<div class="container">
	<div class="row pd0 mg0">

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0 banner_logo banner_mobile">
			<a href="">
					<img class="logo_main" src="<?= _upload_hinhanh_l . $row_banner_mobile["banner_$lang"] ?>" alt="<?= $row_banner_mobile["banner_$lang"] ?>" />
			</a>
			
		</div>

		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 banner_text">
			<a href="">
					<img class="logo_des" src="thumb/85x85/2/<?= _upload_hinhanh_l . $row_logo["banner_$lang"] ?>" alt="<?= $row_logo["banner_$lang"] ?>" />
	
			</a>
		
		</div>
		
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pd0">
			<div class="menu_s">

				<?php include _template . "layout/menu_top.php"; ?>
				
				<div id="search_frm_<?= $lang ?>" class="search_frm_s search2" >
					<form action=""  method="get" name="frm_search" id="frm_search" onsubmit="return false;">
						<input type="text" id="search_input" name="keyword"  value="<?= _valuetk ?>" onblur="if (this.value == '')
									this.value = '<?= _valuetk ?>'" onfocus="if (this.value == '<?= _valuetk ?>')
												this.value = ''" />

						<div class="img_search">
							<a href="javascript:void(0);" id="tnSearch" name="searchAct">
							
								<img  src="images/icon_search.png" name="searchAct" alt="<?= _valuetk ?>" id="tnSearch"/>
							</a>
						</div>

					</form>
				</div>	
			</div>	
		</div>
		
	</div>		
	</div>
	</div>



	
	
</div>