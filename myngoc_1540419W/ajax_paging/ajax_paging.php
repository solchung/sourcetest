<?php
session_start();
@define ( '_template' , '../templates/');
@define ( '_lib' , '../libraries/');
@define ( '_source' , '../sources/');
if(!isset($_SESSION['lang']))
{
	$_SESSION['lang']='vi';
}
$lang=$_SESSION['lang'];
include_once _lib."config.php";
include_once _lib."constant.php";
include_once _lib."functions.php";

include_once _lib."class.database.php";
include_once _source."lang_$lang.php";
include_once _lib."functions_giohang.php";
include_once _lib."file_requick.php";
include_once _lib."counter.php";
include_once "class_paging_ajax.php";
$d = new database($config['database']);
@$limit = (int) $row_setting['phantrang_sp'];
    $loai=$_POST["id_cap2"];
	if($_POST["id_cap2"]==0){
		$dieukien ='';
	}else{
		$dieukien ='and id_list='.$loai.'';
	}
	
	//$dieukien = $_POST["id_cap2"];

	$paging = new paging_ajax();
	
	$paging->class_pagination = "pagination";
	$paging->class_active = "active";
	$paging->class_inactive = "inactive";
	$paging->class_go_button = "go_button";
	$paging->class_text_total = "total";
	$paging->class_txt_goto = "txt_go_button";
	if($limit >0 ){	
		$paging->per_page = $limit;
	}else{
		$paging->per_page = 12;	
	}
	
	
	$paging->page = $_POST["page"];
	
	$paging->text_sql = "select * from table_product where hienthi=1 and com='product' and spnoibat>0  $dieukien  order by stt,id desc  ";


	$result_pag_data = $paging->GetResult();

	$message = '';
	$paging->data = "" . $message . "";



	?>
	<?php
	$j=0;
	while ($row = mysql_fetch_array($result_pag_data)) { $j++;

	?>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 pad_des">
			<div class="item_product wow flipInX" >
                <a href="<?= $row["tenkhongdau_$lang"] ?>">
                    <div class="zoom_product">
                        <img src="thumb1/275x200/1/<?php
                        if ($row['photo'] != NULL)
                            echo _upload_product_l . $row['photo'];
                        else
                            echo 'images/no-image-available.png';
                        ?>" alt="<?= $row["ten_$lang"] ?>" />
						<?php  if ($row['spmoi'] >0) {?>
						<div class="new_sp">
							New
						</div>
						<?php }?>
						<?php  if ($row['spkm'] >0) {?>
						<div class="km_sp">
							Sale
						</div>
						<?php }?>
                    </div>
                   
				
					<div class="name_product">
							
							<h3>
								<?= $row["ten_$lang"] ?>
							</h3>
							<?php if($row["giamgia"]>0){?>
								<p >Giá <span><?= number_format($row["giamgia"], 0, ",", ".") . " đ"; ?> 
									</span>
									<span class="i_giacu"class="i_giacu"><?php if ($row["gia_vnd"] == "") { ?> <?=_lienhe?> <?php } else { ?> <?= number_format($row['gia_vnd'], 0, ",", ".") . " đ"; ?> <?php } ?></span>
								</p>
								
							<?php }else{?>
								<p>Giá: <span><?php if ($row["gia_vnd"] <=0 ) { ?> <?=_lienhe?> <?php } else { ?> <?= number_format($row['gia_vnd'], 0, ",", ".") . " đ"; ?> <?php } ?></span></p>
							<?php }?>
						
				    </div>
                </a>
			
                              
            </div><!--item_product-->
	</div>
	
	<?php } ?>
	<div class="clear"></div>
	<?php if($j==0) echo "Chưa có dữ liệu ...."; else{ echo $paging->Load();}?>
	<div class="clear"></div>

	