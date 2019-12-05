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
					
					<div class="col-lg-6 col-md-5 col-sm-12 col-xs-12 pd0 ">
						<a  class="b_map">
						 Địa chỉ: <span><?=$row_setting["diachi_$lang"]?></span> 
						</a>
					</div>
					
					
					
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pd0 text_right">
						<a  class="b_email">
						Email: <span><?=$row_setting["email"]?></span><br>
						</a>				
					</div>
					
					<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 pd0 b_mxh text_right">
						<div class="mang_xh">
									<ul class="clearfix">    
								
									<?php for ($i = 0; $i < count($mxh); $i++) { ?>
														<li><a href="<?= $mxh[$i]["link"] ?>" target="_blank"><img src="<?= _upload_hinhanh_l . $mxh[$i]["photo"] ?>" alt="<?= $mxh["ten_$lang"] ?>" ></a></li>
									<?php } ?>									
									</ul>
									
						</div>
				
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

		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12  banner_text">
			<a href="">
					<img class="logo_des" src="thumb/166x166/2/<?= _upload_hinhanh_l . $row_logo["banner_$lang"] ?>" alt="<?= $row_logo["banner_$lang"] ?>" />
					<h2><?=$row_setting["ten_$lang"]?></h2>
			</a>
		
		</div>
		
		<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 pd0">
			<div class="menu_s">

				<?php include _template . "layout/menu_top.php"; ?>
				
				<div class="expand-search">
					<div >
							   <form action="" method="GET" name="frm_search" id="frm_search" class="form-search" onsubmit="return false;">
								<input  type="text" name="keyword" class="text_search" value="" placeholder="<?= _valuetk ?>" onkeypress="doEnter(event)" value="<?= _valuetk ?>" onblur="textboxChange(this, false, '<?= _valuetk ?>')" onfocus="textboxChange(this, true, '<?= _valuetk ?>')" /> 
										  
						</form>
						
						
						
							   <script type="text/javascript">

									jQuery(document).ready(function ($) {

										$('#tnSearch').click(function (evt) {
											onSearch(evt);
										});

									});

									function onSearch(evt) {
										var keyword = document.frm_search.keyword;
										if (keyword.value == '' || keyword.value === '<?= _valuetk ?>') {
											alert('<?= _banchuanhaptukhoa ?>');
											keyword.focus();
											return false;
										}
										location.href = 'http://<?= $config_url ?>/tim-kiem/keyword=' + keyword.value;
									}

									function doEnter(evt) {
										// IE         // Netscape/Firefox/Opera
										var key;
										if (evt.keyCode == 13 || evt.which == 13) {
											onSearch(evt);
										} else {
											return false;
										}
									}
								</script>
						</div>
				</div>
			</div>	
		</div>
		
	</div>		
	</div>
	</div>



	
	
</div>