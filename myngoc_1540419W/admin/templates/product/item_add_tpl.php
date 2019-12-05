<link rel="stylesheet" href="../js/select2-master/dist/css/select2.css">
<script src="../js/select2-master/dist/js/select2.full.js"></script>

<script type="text/javascript">
	$(document).ready(function(e) {
		$('.del').click(function(e){
				$(this).parent().remove();
        	});

		$('.plus').click(function(e) {
	            $('.loadgia').append("<div class='gia'><img class='del' src='images/delete.png' alt='delete' width='20' height='20' /><input type='text' autocomplete='off' name='color[]' value='<?=$slgia[$j]?>' class='input' placeholder='Nhập màu' style='width:200px;float:left;'/></div><div class='clear'></div>");
	            $('.del').click(function(e){
					$(this).parent().remove();
        		});
	    	});	
	});
</script>
<script type="text/javascript" src="js/script_gaconit.js"></script>
<script type="text/javascript">
<?php
if (@$_REQUEST['act'] == 'edit' and $item['id_list'] != 0) {
    ?>
        load_list_edit('<?= $_GET["typechild"] ?>',<?= $item['id_list'] ?>);
    <?php
    if ($item['id_cat'] != 0) {
        ?>
            load_cat_edit('<?= $_GET["typechild"] ?>',<?= $item['id_list'] ?>, <?= $item['id_cat'] ?>);
        <?php
    } else {
        ?>
            load_cat('<?= $_GET["typechild"] ?>',<?= $item['id_list'] ?>);

        <?php
    }
    if ($item['id_item'] != 0) {
        ?>
            load_item_edit('<?= $_GET["typechild"] ?>',<?= $item['id_list'] ?>, <?= $item['id_cat'] ?>, <?= $item['id_item'] ?>);
        <?php
    } else if ($item['id_cat'] != 0) {
        ?>
            load_item('<?= $_GET["typechild"] ?>',<?= $item['id_cat'] ?>);



        <?php
    }
    if ($item['id_sub'] != 0) {
        ?>
            load_sub_edit('<?= $_GET["typechild"] ?>',<?= $item['id_list'] ?>, <?= $item['id_cat'] ?>, <?= $item['id_item'] ?>, <?= $item['id_sub'] ?>);
        <?php
    } else if ($item['id_item'] != 0) {
        ?>
            load_sub('<?= $_GET["typechild"] ?>',<?= $item['id_item'] ?>);


        <?php
    }
} else {
    ?>
        load_list('<?= $_GET["typechild"] ?>');
    <?php
}
?>

</script>

<script type="text/javascript">

<?php
if (@$_REQUEST['act'] == 'edit' and $item['id_tinh'] != 0) {
    ?>
        load_tinh_edit(<?= $item['id_tinh'] ?>);
    <?php
    if ($item['id_huyen'] != 0) {
        ?>
            load_huyen_edit(<?= $item['id_tinh'] ?>, <?= $item['id_huyen'] ?>);
        <?php
    } else {
        ?>
            load_huyen(<?= $item['id_tinh'] ?>);

        <?php
    }
    if ($item['id_phuong'] != 0) {
        ?>
            load_phuong_edit(<?= $item['id_tinh'] ?>, <?= $item['id_huyen'] ?>, <?= $item['id_phuong'] ?>);
        <?php
    } else if ($item['id_huyen'] != 0) {
        ?>
            load_phuong(<?= $item['id_huyen'] ?>);



        <?php
    }
    if ($item['id_duong'] != 0) {
        ?>
            load_duong_edit(<?= $item['id_tinh'] ?>, <?= $item['id_huyen'] ?>, <?= $item['id_phuong'] ?>, <?= $item['id_duong'] ?>);
        <?php
    } else if ($item['id_huyen'] != 0) {
        ?>
            
         load_duong(<?= $item['id_huyen'] ?>);   

        <?php
    }
} else {
    ?>
        load_tinh();
    <?php
}
?>
</script>




<script type="text/javascript">
    $(function () {
        $("#khoihanh").datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            // dayNamesMin: [ "CN", "T2", "T3", "T4", "T5", "T6", "T7" ],
            // monthNamesShort: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
            yearRange: "1900:now"
        });
    });
</script>



<div class="wrapper">
    <div class="control_frm" style="margin-top:25px;">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="index.php?com=product&act=man&typechild=<?= @$_GET['typechild'] ?>"><span><?= $name_cap ?></span></a></li>
                <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
            </ul>
            <div class="clear"></div>
        </div>


    </div><!--end control_frm-->





    <form name="supplier" id="validate" class="form" action="index.php?com=product&act=save&typechild=<?= @$_GET['typechild'] ?>&id_list=<?= $_GET['id_list'] ?>&curPage=<?= @$_REQUEST['curPage'] ?>" method="post" enctype="multipart/form-data">
        <div class="widget">
            <div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
                <h6>Nhập dữ liệu</h6>
            </div>		


            <div class="clear"></div> 

            <div class="center_fixex">


<?php if ($danhmuc_cap1 == "on") { ?> 

                    <div class="formRow check_menu_adv">
                        <label>Danh mục cấp 1</label>
                        <div class="formRight">
                            <div class="selector">
                                <select id="id_list" name="id_list" class="get_thuoctinh" class="main_font" onchange="load_cat('<?= $_GET["typechild"] ?>', this.value)">
                                    <option value="0">Chọn danh mục cấp 1</option>
                                </select>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

<?php } ?>


                <?php if ($danhmuc_cap2 == "on") { ?>   

                    <div class="formRow check_menu_adv">
                        <label>Danh mục cấp 2</label>
                        <div class="formRight">
                            <div class="selector">
                                <select id="id_cat" name="id_cat" class="main_font" onchange="load_item('<?= $_GET["typechild"] ?>', this.value)">
                                    <option value="0">Chọn danh mục cấp 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

<?php } ?>



<?php if ($danhmuc_cap3 == "on") { ?>         
                    <div class="formRow check_menu_adv">
                        <label>Danh mục cấp 3</label>
                        <div class="formRight">
                            <div class="selector ">
                                <select id="id_item" name="id_item" class="main_font" onchange="load_sub('<?= $_GET["typechild"] ?>', this.value)">
                                    <option value="0">Chọn danh mục cấp 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

<?php } ?> 




<?php if ($danhmuc_cap4 == "on") { ?>   
                    <div class="formRow check_menu_adv">
                        <label>Danh mục cấp 4</label>
                        <div class="formRight">
                            <div class="selector ">
                                <select id="id_sub" name="id_sub" class="main_font" >
                                    <option value="0">Chọn danh mục cấp 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>


<?php } ?>


<?php if($danhmuc_thanhpho=="on"){ ?>
	    <div class="formRow check_menu_adv">
                        <label>Tỉnh/TP</label>
                        <div class="formRight">
                         <div class="selector">
                                <select id="id_tinh" name="id_tinh" class="get_thuoctinh" class="main_font" onchange="load_huyen(this.value)">
                                    <option value="0">Chọn Tỉnh/TP</option>
                                </select>
                            </div>
                         </div>
                        <div class="clear"></div>
                    </div>
                     <div class="formRow check_menu_adv">
                        <label>Quận/Huyện</label>
                        <div class="formRight">
                        <div class="selector">
                                <select id="id_huyen" name="id_huyen" class="get_thuoctinh" class="main_font" onchange="load_phuong(this.value),load_duong(this.value)">
                                    <option value="0">Chọn Quận/Huyện</option>
                                </select>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                     <div class="formRow check_menu_adv">
                        <label>Phường/Xã</label>
                        <div class="formRight">
                         <div class="selector">
                                <select id="id_phuong" name="id_phuong" class="get_thuoctinh" class="main_font">
                                    <option value="0">Chọn Phường/Xã</option>
                                </select>
                            </div>
                    </div>
                        <div class="clear"></div>
                    </div>
                     <div class="formRow check_menu_adv">
                        <label>Đường</label>
                        <div class="formRight">
                         <div class="selector">
                                <select id="id_duong" name="id_duong" class="get_thuoctinh" class="main_font" >
                                    <option value="0">Chọn Đường</option>
                                </select>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
<?php }?>

  <div class="clear"></div>
	<div class="formRow check_menu_adv hide_tinhtrang">
			<label>Loại sản phẩm:</label>
			<div class="formRight">
	
			<div class="">
			<?php $loaisanpham = explode(',', $item['loaisanpham']); ?>
				<select class="js-example-basic-multiple main_font get_thuoctinh" name="loaisanpham[]" id="loaisanpham" multiple="multiple">
				  <option value="0">Chọn gói ưu đãi</option>
					<?php 
						//Load tinh thanh
						
						$d->reset();
						$sql="select id,ten_vi from table_news_list where hienthi =1 and com='goiuudai' order by ten_vi asc";
						$d->query($sql);
						$loaisp = $d->result_array();
						for($i=0,$count_loaisp=count($loaisp);$i<$count_loaisp;$i++) { ?>
							<option <?php if (in_array($loaisp[$i]['id'], $loaisanpham)) echo 'selected'; ?> value="<?=$loaisp[$i]['id']?>"><?=$loaisp[$i]["ten_vi"]?></option>

						<?php }?>
				</select>
			</div>
		
			</div>
			<div class="clear"></div>
		</div> 
                <div class="clear"></div>




            </div><!--end center_fixex-->   






<?php if ($image_active == "on") { ?>   

                <div class="formRow">
                    <label>Tải hình ảnh: </label>
                    <div class="formRight ">
    <?php if ($_REQUEST['act'] == 'edit' && $item['thumb'] != '') { ?>

                            <img src="<?php if ($item['photo'] != NULL) echo _upload_product . $item['thumb'];
        else echo 'images/no_image.jpg'; ?>"  alt="NO PHOTO" style="max-width:300px;" />
                            <a class="delete_img_present" title="Xoá ảnh" onclick="Action_Delete_Img('index.php?com=product&act=save&typechild=<?= $_GET['typechild'] ?>&id=<?= @$item['id'] ?>&delete_img_present=delete_img');
                                    return false;">Xoá ảnh</a>
                            <br>
                        <?php } ?>

                        <input type="file" id="file" name="file" /><img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình đại diện cho sản phẩm (ảnh JPEG, GIF , JPG , PNG)"> <?= $kichthuoc_image ?>

                    </div>
                    <div class="clear"></div>
                </div>

<?php } ?>


<?php if ($mutile_image_active == "on") { ?>    


                <div class="formRow">
                    <label>Thêm Hình ảnh: </label>
                    <div class="input_mutilfull">
                        <a class="file_input" data-jfiler-name="files" data-jfiler-extensions="jpg, jpeg, png, gif"><i class="fa fa-paperclip"></i> Thêm Nhiều Hình ảnh</a>                
                        <div style="text-align:center;"> <strong>(Nhập số thứ tự cho hình ảnh liên quan !!!) </strong></div>
                    </div>
                    <div class="clear"></div>
                </div>



                <div class="clear"></div> 
    <?php if ($act == 'edit') { ?>
                    <?php if (count($list_hasp) != 0) { ?>

                        <div class="formRow">
                            <label>Hình ảnh liên quan: </label>
                            <br />
                            <div class="clear"></div> 

                            <div class="formfull pagination_hasp">


                                <div class="clear"></div>
            <?php for ($i = 0; $i < count($list_hasp); $i++) { ?>
                                    <div class="item_trich trich<?= $list_hasp[$i]['id'] ?>">
                                        <img class="img_trich" width="100px" height="140px" src="<?= _upload_product . $list_hasp[$i]['photo'] ?>" />
                                        <input type="text" id="stt_trich<?= $list_hasp[$i]['id'] ?>" value="<?= $list_hasp[$i]['stt'] ?>" onkeypress="return OnlyNumber(event)" class="tipS" onchange="return updateStthinh('hasp', '<?= $list_hasp[$i]['id'] ?>')" />
                                        <a href="javascript:void(0)" class="change_stt" rel="<?= $list_hasp[$i]['id'] ?>"><i class="fa fa-trash-o"></i></a>
                                        <div id="loader<?= $list_hasp[$i]['id'] ?>" class="loader_trich"><img src="images/loader.gif" /></div>
                                    </div>
            <?php } ?>
                                <div class="clear"></div>

                            </div>
                            <div class="clear"></div>
                        </div> 

        <?php }
    }
} ?>
		<?php if ($sanpham_active== "on") { ?>   
            <div class=" formRow">
                <label>Mã sản phẩm: </label>
                <div class="formRight">
                    <input type="text" id="masp" name="masp" value="<?php if ($item['masp'] == '') echo "";
            else echo $item['masp']; ?>"  title="Nhập mã sản phẩm" class="tipS" style="width:300px;" />
				


                </div>
                <div class="clear"></div>
            </div>
			<div class=" formRow">
                <label>Giá VND: </label>
                <div class="formRight">
                    <input type="text" id="gia_vnd" name="gia_vnd" value="<?php if ($item['gia_vnd'] == 0) echo "";
            else echo $item['gia_vnd']; ?>"  title="Nhập giá VNĐ" class="tipS" style="width:300px;" />
                </div>
                <div class="clear"></div>
            </div>
			<div class="  formRow">
                <label>Giá Giảm: </label>
                <div class="formRight">
                    <input type="text" id="giamgia" name="giamgia" value="<?php if ($item['giamgia'] == 0) echo "";
            else echo $item['giamgia']; ?>"  title="Nhập giá giảm" class="tipS" style="width:300px;" />
                </div>
                <div class="clear"></div>
            </div>
			<?php }?>
			
			<?php if ($other_active== "on") { ?>  
			<div class=" formRow">
                <label>Diện tích: </label>
                <div class="formRight">
                    <input type="text" id="dientich" name="dientich" value="<?php if ($item['dientich'] == '') echo "";
            else echo $item['dientich']; ?>"  title="Nhập diện tích" class="tipS" style="width:300px;" />
				


                </div>
                <div class="clear"></div>
            </div>
			<div class=" formRow">
                <label>Số phòng: </label>
                <div class="formRight">
                    <input type="text" id="phong" name="phong" value="<?php if ($item['phong'] == '') echo "";
            else echo $item['phong']; ?>"  title="Nhập số phòng" class="tipS" style="width:300px;" />
                </div>
                <div class="clear"></div>
            </div>
			<div class="  formRow">
                <label>Số lầu: </label>
                <div class="formRight">
                    <input type="text" id="lau" name="lau" value="<?php if ($item['lau'] == '') echo "";
            else echo $item['lau']; ?>"  title="Nhập số lầu" class="tipS" style="width:300px;" />
                </div>
                <div class="clear"></div>
            </div>
			
		
			<?php }?>
			<?php if ($map_active== "on") { ?> 
			<div class="  formRow">
                
                <div class="clear"></div>

				
				    <div class="block-info"> 
						
						<div class="row-input">
							<label id="lable-left-nomal">Nhập vị trí : </label>
							<input class="col-sm-2 form-control input" id="AddressNumber" name="AddressNumber" type="text" style="width:50%;"/>
							<input type="button" value="Tìm địa điểm" class="searchmap"  id="button_83"/>
						</div>
						<label class="control-label" style="visibility:hidden;" for="diachi">&nbsp;</label>
						<div class="row-input">
							<div class="form-editor content-item-map">
								<div class="map-wrapper">
									<div class="map-content">
										<div id="BanDo2" class="map-edit"></div>
									</div>
								</div>
								<div id="tienich" style="display:none"></div><!--tienich-->
								<div style="display:none">
									<input type="text" id="address" value="Địa chỉ" />
									<input type="button" class="button primaryAction btn btn-primary" value="Go" onclick="geocode()" /> 
									<?php
										$la=0;
										$lo=0;
									   
										$arr_tmp=explode(',', $item['toado']);
										$la=$arr_tmp[0];
										$lo=$arr_tmp[1];
					  
									?>   
									<input id="Latitude" name="Latitude" type="text" value="<?=$la?>" />
									<input id="Longitude" name="Longitude" type="text" value="<?=$lo?>" />
								</div>
							</div><!--content-item-map--> 
						</div>
						<div class="line"></div>
					</div><!--block-info-->
            </div>
			<?php }?>
            <div class="hide_tinhtrang formRow">
                <label>Size: </label>
                <div class="formRight">
                    <input type="text" id="size" name="size" value="<?php if ($item['size'] == '') echo " ";
					else echo $item['size']; ?>"  title="Nhập size" class="tipS" style="width:300px;" />
                </div>
                <div class="clear"></div>
            </div>
                
            <div class="hide_tinhtrang formRow">
                <label>Chất liệu: </label>
                <div class="formRight">
                    <input type="text" id="chatlieu" name="chatlieu" value="<?php if ($item['chatlieu'] == '') echo "";
            else echo $item['chatlieu']; ?>"  title="Nhập chất liệu" class="tipS" style="width:300px;" />
                </div>
                <div class="clear"></div>
            </div>   
            
            <div class="hide_tinhtrang formRow">
                <label>Xuất xứ: </label>
                <div class="formRight">
                    <input type="text" id="xuatxu" name="xuatxu" value="<?php if ($item['xuatxu'] == '') echo "";
            else echo $item['xuatxu']; ?>"  title="Nhập xuất xứ" class="tipS" style="width:300px;" />
                </div>
                <div class="clear"></div>
            </div>      
            
            <div class="hide_tinhtrang formRow">
                <label>Ri: </label>
                <div class="formRight">
                    <input type="text" id="ri" name="ri" value="<?php if ($item['ri'] == 0) echo "8";
            else echo $item['ri']; ?>"  title="Nhập ri" class="tipS" style="width:300px;" />
                </div>
                <div class="clear"></div>
            </div>    
                
        

           <div class="hide_tinhtrang formRow">
			<b>Màu sắc</b> 
			<div class="formRight">
				<div class="loadgia">
			    <?php 
					$slgia = explode('|',$item['color']);
					
					for($j=0;$j<count($slgia);$j++){
				?>
			    <?php if($j>0){?><b>&nbsp;</b> <?php }?>
			    <?php if($j==0){?><img class="plus" src="images/plus.png" alt="plus" width="20" height="20" /><?php }?>
			    <div class="gia">
			    	<img class="del" src="images/delete.png" alt="delete" width="20" height="20" />
			    
			    	<input type="text" autocomplete="off" name="color[]" value="<?=$slgia[$j]?>" class="input" placeholder="Nhập màu" style="width:200px;float:left;"/>
			    </div>
			    <div class="clear"></div>
			    <?php }?>
			    </div>
			</div>
			<div class="clear"></div>
		</div>


            <div class="tab_gaconit">      

                <div id="tabs_container">
                    <ul id="tabs">

                        <?php
                        foreach ($config["lang"] as $key => $value) {
                            # code...
                            $active = '';
                            if ($key == 0) {
                                $active = "active";
                            }

                            echo '<li class="' . $active . '"><a href="#tab' . $value . '">' . $config["langs"][$value] . '</a></li>';
                        }
                        ?>



                    </ul><!--tabs-->
                </div><!--tabs_container-->



                <div id="tabs_content_container">


                    <?php
                    foreach ($config["lang"] as $key => $value) {
                        # code...
                        $active = '';
                        $active_block = '';
                        if ($key == 0) {

                            $active = "active";
                            $active_block = "style='display:block;'";
                        }
                        ?> 

                        <div id="tab<?= $value ?>" class="tab_content" <?= $active_block ?>>


                            <div class="formRow">
                                <label>Tiêu đề <?= $value ?> </label>
                                <div class="formRight">
                                    <input type="text" value="<?= @$item['ten_' . $value] ?>" name="ten_<?= $value ?>" title="Nội dung tiêu đề bài viết <?= $value ?>" id="short" class="tipS validate[required]"   />
                                </div><!--end formRight-->

                                <div class="clear"></div>           
                            </div><!--end formRow-->


							<?php if($_GET["act"]=='edit' || $_GET["act"]=='edit_list' || $_GET["act"]=='edit_cat' || $_GET["act"]=='edit_item' || $_GET["act"]=='edit_sub' ){ ?>
									<div class="formRow">
										<label>Đường dẫn (Link) <?=$value?></label>
										
										<div class="formRight">
											<input type="text" value="<?=@$item['tenkhongdau_'.$value]?>" name="tenkhongdau_<?=$value?>" title="link <?=$config["langs"][$value]?> " id="short" class="tipS validate[required]" />
										</div><!--end formRight-->
										
										<div class="formRight"><br>
											<input type="button" class="blueB" onclick="CreateLink();" value="Cập nhật đường dẫn" />
										</div>
										<div class="clear"></div>           
									</div><!--end formRow-->
									<?php }?>





                            <div class="formRow">
                                <label>Mô tả <?= $value ?>:</label>
                                <div class="clear"></div>
                                <div class="formRight-full">
                                    <textarea rows="8" cols="" title="Viết mô tả ngắn sản phẩm"  name="mota_<?= $value ?>" id="short"><?= @$item['mota_' . $value] ?></textarea>
							
								</div>
                                <div class="clear"></div>
                            </div><!--end formRow-->



                            <div class="formRow">
                                <label>Nội dung <?= $value ?>: <img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Viết nội dung chính"> </label>

                                <div class="clear"></div>
                                <div class="formRight-full"><textarea name="noidung_<?= $value ?>" rows="8" cols="60"><?= @$item['noidung_' . $value] ?></textarea>
                                    <script type="text/javascript">//<![CDATA[
                                        window.CKEDITOR_BASEPATH = 'ckeditor/';
                                        //]]></script>
                                    <script type="text/javascript" src="ckeditor/ckeditor.js?t=B5GJ5GG"></script>
                                    <script type="text/javascript">//<![CDATA[
                                                    CKEDITOR.replace('noidung_<?= $value ?>', {"width":<?= $config['ckeditor']['width'] ?>, "height":<?= $config['ckeditor']['height'] ?>, });
                                                    //]]></script>
                                </div><!--END formRight-full-->
                                <div class="clear"></div>
                            </div><!--end formRow-->
							

                        </div><!--tab_content-->

                    <?php } ?>  

                </div><!--end tabs_content_container-->



            </div><!--end tab_gaconit-->





            <div class="formRow">
                <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
                <div class="formRight">
                    <input type="checkbox" name="is_index" id="check2"  <?= (!isset($item['is_index']) || $item['is_index'] == 1) ? 'checked="checked"' : '' ?>/>
                    <label for="check2">Index, Follow <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Check nếu bạn muốn Google không index danh mục này!" style="float:right; margin-top:0;" /></label>
                    <input type="checkbox" name="hienthi" id="check1" value="1" <?= (!isset($item['hienthi']) || $item['hienthi'] == 1) ? 'checked="checked"' : '' ?> />
                    <label for="check1">Hiển thị</label>            
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Số thứ tự: </label>
                <div class="formRight">
                    <input type="text" class="tipS" value="<?= isset($item['stt']) ? $item['stt'] : 1 ?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
                </div>
                <div class="clear"></div>
            </div>


        </div>  
        <div class="widget">
            <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
                <h6>Nội dung seo</h6>
            </div>
            
            <div class="formRow">
                <label>Tạo SEO <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bấm TẠO SEO để tạo Tiêu đề, Mô tả, Từ khoá cho danh mục sản phẩm"> </label>
                <div class="formRight">
                    <input type="button" class="blueB" onclick="CreateTitleSEO();" value="Tạo SEO" />
                </div>
                <div class="clear"></div>
            </div>		

             <div class="formRow hide_tinhtrang">
                <label>Tag: </label>
                <div class="formRight">
                  <textarea rows="8" cols="" title="Tag"  name="tag" id="short"><?= @$ds_tags ?></textarea>

                </div>
                <div class="clear"></div>
            </div>



            <div class="tab_gaconit">      

                <div id="tabs_seo_container">
                    <ul id="tabs_seo">

                        <?php
                        foreach ($config["lang"] as $key => $value) {
                            # code...
                            $active = '';
                            if ($key == 0) {
                                $active = "active";
                            }

                            echo '<li class="' . $active . '"><a href="#tab' . $value . '_seo">' . $config["langs"][$value] . '</a></li>';
                        }
                        ?>  

                    </ul><!--tabs_seo-->
                </div><!--tabs_container-->



                <div id="tabs_seo_content_container">


                    <?php
                    foreach ($config["lang"] as $key => $value) {
                        # code...
                        $active_block = '';
                        if ($key == 0) {

                            $active_block = "style='display:block;'";
                        }
                        ?>     

                        <div id="tab<?= $value ?>_seo" class="tab_seo_content" <?= $active_block ?>>


                            <div class="formRow hide_tinhtrang">
                                <label>H1 <?= $value ?></label>
                                <div class="formRight">
                                    <input type="text" value="<?= @$item['h1_' . $value] ?>" name="h1_<?= $value ?>" title="Nội dung thẻ meta h1 <?= $value ?> dùng để SEO" class="tipS" />
                                </div>
                                <div class="clear"></div>
                            </div>


                            <div class="formRow hide_tinhtrang">
                                <label>H2 <?= $value ?></label>
                                <div class="formRight">
                                    <input type="text" value="<?= @$item['h2_' . $value] ?>" name="h2_<?= $value ?>" title="Nội dung thẻ meta h2 <?= $value ?> dùng để SEO" class="tipS" />
                                </div>
                                <div class="clear"></div>
                            </div>


                            <div class="formRow">
                                <label>Title <?= $value ?></label>
                                <div class="formRight">
                                    <input type="text" value="<?= @$item['title_' . $value] ?>" name="title_<?= $value ?>" title="Nội dung thẻ meta Title <?= $value ?> dùng để SEO" class="tipS" />
                                </div>
                                <div class="clear"></div>
                            </div>



                            <div class="formRow hide_tinhtrang">
                                <label>Alt <?= $value ?></label>
                                <div class="formRight">
                                    <input type="text" value="<?= @$item['alt_' . $value] ?>" name="alt_<?= $value ?>" title="Nội dung thẻ meta Alt <?= $value ?> dùng để SEO" class="tipS" />
                                </div>
                                <div class="clear"></div>
                            </div>



                            <div class="formRow">
                                <label>Từ khóa <?= $value ?></label>
                                <div class="formRight">
                                    <input type="text" value="<?= @$item['keyword_' . $value] ?>" name="keyword_<?= $value ?>" title="Từ khóa chính VI cho sản phẩm" class="tipS" />
                                </div>
                                <div class="clear"></div>
                            </div>



                            <div class="formRow">
                                <label>Description <?= $value ?>:</label>
                                <div class="formRight">
                                    <textarea rows="8" cols="" title="Nội dung thẻ meta Description <?= $value ?> dùng để SEO" class="tipS" name="description_<?= $value ?>"><?= @$item['description_' . $value] ?></textarea>
                                    <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="deschar_<?= $value ?>" value="<?= @$item['deschar_' . $value] ?>" /> ký tự <b>(Tốt nhất là 160 ký tự)</b>
                                </div>
                                <div class="clear"></div>
                            </div>


                        </div><!--end tab_content-->


                    <?php } ?>   


                </div><!--end tabs_content_container-->   


            </div><!--end tab_gaconit-->   












            <div class="formRow">
                <div class="formRight">

                    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
                    <input type="hidden" name="referer_link" id="id" value="index.php?com=product&act=man&typechild=<?= $_GET['typechild'] ?>&curPage=<?= $_REQUEST['curPage'] ?>" />

                    <input type="submit" value="Hoàn tất" class="blueB" />
                    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=product&act=man&typechild=<?= $_GET['typechild'] ?>&curPage=<?= $_REQUEST['curPage'] ?>'" class="blueB" />

                </div>
                <div class="clear"></div>
            </div>
        </div>
    </form>



</div><!--end wrapper-->




<script type="text/javascript">


    function updateStthinh(table, id) {
        var num = jQuery('#stt_trich' + id).val();

        $('#loader' + id).css('display', 'block');
        jQuery.ajax({
            type: 'POST',
            url: baseurl + 'ajax/stt_hap.php?act=update',
            data: {'table': table, 'id': id, 'num': num},
            success: function (data) {
                $('#loader' + id).css('display', 'none');
                jQuery('#stt_trich' + id).val(num);
            }
        });
    }
    $(document).ready(function () {

<?php if (count($list_hasp) >= 13) { ?>

            $("div.pagination_hasp").quickPagination({pageSize: "13"});

<?php } ?>

        $(".change_stt").click(function (event) {
            var r = confirm("Bạn có thực sự muốn xóa hình ảnh này ?");
            if (r == true) {
                var id = $(this).attr("rel");
                $('#loader' + id).css('display', 'block');
                jQuery.ajax({
                    type: 'POST',
                    url: baseurl + 'ajax/stt_hap.php?act=delete',
                    data: {'table': 'hasp', 'id': id},
                    success: function (data) {
                        $('#loader' + id).css('display', 'none');
                        jQuery('.trich' + id).remove();
                    }
                });
            } else {
                return false;
            }

        });
    });


</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('.file_input').filer({
            showThumbs: true,
            templates: {
                box: '<ul class="jFiler-item-list"></ul>',
                item: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\<input type="text" name="stthinh[]" class="stthinh" />\
                                </div>\
                            </div>\
                        </li>',
                itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\<input type="text" name="stthinh[]" class="stthinh" />\
                                </div>\
                            </div>\
                        </li>',
                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: true,
                removeConfirmation: true,
                _selectors: {
                    list: '.jFiler-item-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action',
                }
            },
            addMore: true
        });
    });
</script>

<?php if ($map_active== "on") { ?> 
<script type="text/javascript">
    if ($('.content-item-map').is(':visible')) {
        var map;
        var markers;
        var latlngs;
        var gRedIcon = new google.maps.MarkerImage("../images/bds.png", new google.maps.Size(32, 45), new google.maps.Point(0, 0), new google.maps.Point(15, 45));
        var gSmallShadow = new google.maps.MarkerImage("mm_20_shadow.png", new google.maps.Size(22, 20), new google.maps.Point(0, 0), new google.maps.Point(6, 20));
        var infowindow;
        var geocoder;
        var divThongTin = "<div>Kéo thả nhà đến vị trí mới</div>";

        function initialize() {
            var olat, olng;
            olat = document.getElementById('Latitude').value;
            olng = document.getElementById('Longitude').value;
            if (olat == '' || olat == '0' || olng == '' || olng == '0') {
                olat = 10.77836;
                olng = 106.664468;
            }
            var mapOptions = {
                center: new google.maps.LatLng(olat, olng),
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            latlngs = new google.maps.LatLng(olat, olng);
            map = new google.maps.Map(document.getElementById('BanDo2'), mapOptions);
            geocoder = new google.maps.Geocoder();
            var input = document.getElementById('address');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.bindTo('bounds', map);
            infowindow = new google.maps.InfoWindow();

            var marker = new google.maps.Marker({
                map: map,
                draggable: true,
                icon: gRedIcon
            });
            if ((document.getElementById('Latitude').value != '' &&
             document.getElementById('Latitude').value != '0')
             && (document.getElementById('Longitude').value != ''
             && document.getElementById('Longitude').value != '0')) {
                marker.setPosition(new google.maps.LatLng(olat, olng));
            }
            markers = marker;
            google.maps.event.addListener(marker, 'dragstart', function () {
                var place = map.getCenter();
                updateMarkerPosition(place);

                google.maps.event.addListener(marker, 'drag', function () {
                    updateMarkerPosition(marker.getPosition());
                });

                google.maps.event.addListener(marker, 'dragend', function () {
                    geocodePosition(marker.getPosition());
                });

                marker.setPosition(place);
            });

            google.maps.event.addListener(marker, 'click', function () {
                infowindow.setContent(divThongTin);
                infowindow.open(map, marker);
            });

            google.maps.event.addListener(map, 'click', function (e) {
                geocoder.geocode(
              { 'latLng': e.latLng },
              function (results, status) {
                  if (status == google.maps.GeocoderStatus.OK) {
                      if (results[0]) {
                          if (marker) {
                              marker.setPosition(e.latLng);
                          } else {
                              marker = new google.maps.Marker({
                                  position: e.latLng,
                                  map: map
                              });
                          }
                          //infowindow.setContent(divThongTin);
                          infowindow.open(map, marker);
                          updateMarkerPosition(marker.getPosition());
                          geocodePosition(marker.getPosition());
                          infowindow.setContent(divThongTin);
                      } else {
                          document.getElementById('geocoding').innerHTML =
                        'No results found';
                      }
                  } else {
                      document.getElementById('geocoding').innerHTML =
                      'Geocoder failed due to: ' + status;
                  }
              });
            });
        }

        function geocode() {
            var address = document.getElementById("address").value;
            console.log(address);
            geocoder.geocode({
                'address': address,
                'partialmatch': true
            }, geocodeResult);
        }

        function geocodeResult(results, status) {
            if (status == 'OK' && results.length > 0) {
                map.fitBounds(results[0].geometry.viewport);
                updateGeocodePosition(results[0].geometry.location); // Update Code Position
                markers.setPosition(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng())); // lat() && lng()
                console.log(results[0].geometry.location);
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        }

        function geocodePosition(pos) {
            geocoder.geocode({
                latLng: pos
            }, function (responses) {
                if (responses && responses.length > 0) {
                    updateMarkerAddress(responses[0].formatted_address);
                } else {
                    updateMarkerAddress('Cannot determine address at this location.');
                }
            });
        }

        //Update Geocode
        function updateGeocodePosition(latlng) {// lat() && lng()
            document.getElementById('Latitude').value = latlng.lat();
            document.getElementById('Longitude').value = latlng.lng();
            latlngs = latlng;
        }
        //Update Marker Position
        function updateMarkerPosition(latlng) {
            document.getElementById('Latitude').value = latlng.lat();
            document.getElementById('Longitude').value = latlng.lng();
            latlngs = latlng;
        }

        function updateMarkerAddress(str) {
            document.getElementById('address').value = str;
        }
        var markers = new Array();
        function timdiem(diadiems, radiuss) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = new Array();
            var request = {
                location: latlngs,
                radius: radiuss,
                types: diadiems
            };
            var service = new google.maps.places.PlacesService(map);
            service.search(request, callback);
        }
        function callback(results, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                    createMarker(results[i]);
                }
            }
        }

        function createMarker(place) {
            var placeLoc = place.geometry.location;
            var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
            });

            markers[markers.length] = marker;

            google.maps.event.addListener(marker, 'click', function () {
                infowindow.setContent(place.name);
                infowindow.open(map, this);
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    }

$("#button_83").click(function () { 
		address=$(AddressNumber).val();
		$('#address').val(address);
		geocode();
});
</script>
<?php }?>
<script type="text/javascript">
    $(document).ready(function () {
		$('.js-example-basic-multiple').select2(
		);
	});
</script>	