



	
<div class="menu">
	<div class="">
    <div id="smoothmenu1"  class="ddsmoothmenu" >
        <ul class="clearfix">

			<li  class="font_custom <?php if ($source == 'index') echo 'active'; ?>"><a href="<?=$_SESSION['linkhome']?>" class="font_custom <?php if ($source == 'index') echo 'active'; ?>" ><?=_trangchu?></a>              
			</li>
			<li><span class="space"></span></li>
			<li class="font_custom <?php if ($_GET['com'] == 'gioi-thieu') echo 'active'; ?>"><a href="gioi-thieu"  class="font_custom <?php if ($_GET['com'] == 'gioi-thieu') echo 'active'; ?>"><?= _gioithieu?></a>   


			</li>
			<li><span class="space"></span></li>
			<li class=" font_custom <?php if ($_GET['com'] == 'thuc-don') echo 'active'; ?>"><a href="thuc-don" class="font_custom <?php if ($_GET['com'] == 'thuc-don') echo 'active'; ?>">Thực đơn</a>   
			<ul>
					<?php for ($i = 0; $i < count($list_product); $i++) { ?>
						<li class="font_custom "><a  href="<?= $list_product[$i]["tenkhongdau_$lang"] ?>" title="<?= $list_product[$i]["ten_$lang"] ?>" class="font_custom"><?= $list_product[$i]["ten_$lang"] ?></a>  
						 <?php
							$d->reset();
							$sql = "select ten_$lang,tenkhongdau_$lang,id from #_product_cat where hienthi=1 and id_list=" . $list_product[$i]["id"] . " and com='product'  order by stt asc";
							$d->query($sql);
							$cat_dichvu = $d->result_array();
							if (count($cat_dichvu) > 0) {
								?>
								<ul>
									<?php for ($j = 0; $j < count($cat_dichvu); $j++) { ?>
										<li><a href="<?= $cat_dichvu[$j]["tenkhongdau_$lang"] ?>"><?= $cat_dichvu[$j]["ten_$lang"] ?></a>
										 <?php
										$d->reset();
										$sql = "select ten_$lang,tenkhongdau_$lang,id from #_product_item where hienthi=1 and id_cat=" . $cat_dichvu[$j]["id"] . " and com='product'  order by stt asc";
										$d->query($sql);
										$item_dichvu = $d->result_array();
										if (count($item_dichvu) > 0) {
											?>
											<ul>
												<?php for ($y = 0; $y < count($item_dichvu); $y++) { ?>
													<li><a href="<?= $item_dichvu[$y]["tenkhongdau_$lang"] ?>"><?= $item_dichvu[$y]["ten_$lang"] ?></a>
													
													</li>
												<?php } ?>
											</ul>
										<?php } ?>
										
										</li>
									<?php } ?>
								</ul>
							<?php } ?>

						</li> 

					<?php } ?>
			</ul>
			</li>

			<li><span class="space"></span></li>	
			<li class="font_custom <?php if ($_GET['com'] == 'tin-tuc') echo 'active'; ?>"><a href="tin-tuc" class="font_custom <?php if ($_GET['com'] == 'tin-tuc') echo 'active'; ?>">Tin tức</a>   
			</li>
			<li><span class="space"></span></li> 
			
			<li class="font_custom <?php if ($_GET['com'] == 'hinh-anh') echo 'active'; ?>"><a href="hinh-anh" class="font_custom <?php if ($_GET['com'] == 'hinh-anh') echo 'active'; ?>">Hình ảnh</a>   
			</li>
			<li><span class="space"></span></li> 

			<li class="font_custom <?php if ($_GET['com'] == 'lien-he') echo 'active'; ?>"><a href="lien-he" class="font_custom <?php if ($_GET['com'] == 'lien-he') echo 'active'; ?>"><?= _lienhe ?></a></li>


       
        </ul>
          
    </div>
	</div>

</div>





<div id="menu_mobile_2">

<?php include _template . "layout/menu_mobi.php"; ?>
</div>

