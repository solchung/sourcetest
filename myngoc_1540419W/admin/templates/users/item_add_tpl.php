<script type="text/javascript" src="js/script_gaconit.js"></script>
<script type="text/javascript">
<?php 
	if(@$_REQUEST['act']=='edit' and $item['tinh']!=0){
?>
		load_tinh_edit(<?=$item['tinh']?>);
<?php
		if($item['huyen']!=0){
?>
		load_huyen_edit(<?=$item['tinh']?>,<?=$item['huyen']?>);
<?php
		}else{
?>
		load_huyen(<?=$item['tinh']?>);

 
<?php
		}
		if($item['phuongxa']!=0){
?>
		load_phuong_edit(<?=$item['tinh']?>, <?=$item['huyen']?>, <?=$item['phuongxa']?>);
<?php
		}else if($item['huyen']!=0){
?>
		load_phuong(<?=$item['huyen']?>);
<?php
		}
	}else{
?>
	load_tinh();
<?php
	}
?>


</script>

<div class="wrapper">
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=dskhorder&act=man"><span>Xem Thành Viên</span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    
    
</div><!--end control_frm-->


<form name="frm" id="validate" class="form" method="post" action="index.php?com=users&act=save&curPage=<?=@$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">

	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Dữ liệu</h6>
		</div>		

		
        <div class="formRow">
			<label>Tải hình ảnh: </label>
			<div class="formRight ">
            					 <?php if ($_REQUEST['act']=='edit' && $item['photo']!='' ) { ?>
                                  <img width="200px" src="<?=_upload_users.$item['photo']?>">
                    <a title="Xoá ảnh" href="index.php?com=users&act=delete_img&id=<?=@$item['id']?>">Xoá ảnh</a>
                    <br>
                    <?php }?>
                    
                                <input type="file" id="file" name="file" /><img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình đại diện (ảnh JPEG, GIF , JPG , PNG)"> Width:250px;| Height:250px;
                               
			</div>
			<div class="clear"></div>
		</div>

		
        <div class="formRow">
			<label>Họ và Tên</label>
			<div class="formRight">
                <input type="text" name="hoten" title="Nhập họ tên" id="hoten" class="tipS validate[required]" value="<?=@$item['hoten']?>" />
			</div><!--end formRight-->
			<div class="clear"></div>
		</div><!--end formRow-->
        
        
        <?php /*?> <b>Hạng </b>:
      <?php
               $sql_danhmuc="select ten from table_classmember where id = '".$item['hangthanhvien']."'";
               $result=mysql_query($sql_danhmuc);
               $item_thanhvien =mysql_fetch_array($result);
               
			if($item['hangthanhvien']>0){
				echo $item_thanhvien['ten'];
			}else{
				echo '-----';
			}
          ?><br /><br /> <?php */?>

    
    
    <?php if ($_REQUEST['act']=='add'){?>
    
       <div class="formRow">
			<label>Mật khẩu</label>
			<div class="formRight">
              <input type="password" name="pass"  class="input"/>
			</div>
			<div class="clear"></div>
		</div>
     <?php }?>   
        
        
          <div class="formRow">
			<label>Email</label>
			<div class="formRight">
                <input type="text" name="email" title="Email" id="name" class="tipS validate[required]" value="<?=@$item['email']?>" />
			</div>
			<div class="clear"></div>
		</div>
        
        
         <div class="formRow">
			<label>CMND</label>
            
			<div class="formRight">
            
            <input type="text" name="cmnd"   value="<?=@$item['cmnd']?>" class="input" />
            
				
			</div>
			<div class="clear"></div>
		</div>
        
        
        <div class="formRow">
			<label>Bí danh</label>
            
			<div class="formRight">
            
            <input type="text" name="bidanh"   value="<?=@$item['bidanh']?>" class="input" />
            
				
			</div>
			<div class="clear"></div>
		</div>
        
        
         <div class="formRow">
			<label>Ngày Sinh</label>
            
			<div class="formRight">
            
            <input type="text" name="ngaysinh"   value="<?=date('d/m/Y',@$item['ngaysinh'])?>" class="input" />
            
				
			</div>
			<div class="clear"></div>
		</div>
        
        <div class="formRow">
			<label>Giới tính</label>
			<div class="formRight">
        
        <div class="canh_deu">  <input type="radio" name="gender" value="0" <?php if($item['sex']=="0") echo'checked="checked"'; ?>  disabled="disabled" />Nam</div>
        
        
         <div class="canh_deu"> <input type="radio" name="gender" value="1"  disabled="disabled"  <?php if($item['sex']=="1") echo'checked="checked"'; ?> />Nữ </div>
			</div>
			<div class="clear"></div>
		</div>
        
        
        
        
         <div class="formRow">
			<label>Địa chỉ</label>
			<div class="formRight">
            
            <div class="selector">
            <select id="id_tinh" name="id_tinh" class="main_font" onchange="load_huyen(this.value)">
                <option value="0">Chọn Tỉnh/Thành</option>
            </select>
            </div>
            
            <div class="selector">
            <select id="id_huyen" name="id_huyen" class="main_font" onchange="load_phuong(this.value)" >
                        <option value="0">Chọn Quận/Huyện</option>
             </select>
             </div>
             
             <div class="selector">
              <select id="id_phuong" name="id_phuong" class="main_font" >
                        <option value="0">Chọn Phường/Xã</option>
             </select>
             </div>
            
               <?php /*?><input type="text" name="tinh" disabled="disabled"  value="<?=@$city["ten_vi"]?>" class="input chon_disabled" />
               <input type="text" name="huyen" disabled="disabled" value="<?=@$district['ten_vi']?>" class="input chon_disabled" />
               <input type="text" name="phuongxa" disabled="disabled" value="<?=@$phuongxa['ten_vi']?>" class="input chon_disabled" /><?php */?>
               
               <div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
        
        
        
        <div class="formRow">
			<label>Khu vực sinh sống</label>
            
			<div class="formRight">
            
           <input type="text" name="khuvucsinhsong"   value="<?=@$item['khuvucsinhsong']?>" class="input" />
				
			</div>
			<div class="clear"></div>
		</div>
        
        
        
          <div class="formRow">
			<label>Điện thoại cố định</label>
            
			<div class="formRight">
            
           <input type="text" name="dienthoaicodinh"   value="<?=@$item['dienthoaicodinh']?>" class="input" />
				
			</div>
			<div class="clear"></div>
		</div>
        
        
        
          <div class="formRow">
			<label>Điện thoại di động</label>
            
			<div class="formRight">
				<input type="text" value="<?=@$item['dienthoai']?>"   name="dienthoai" title="Điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        
        
        
            <div class="formRow">
			<label>Yahoo IM</label>
            
			<div class="formRight">
            
           <input type="text" name="nick_yahoo"   value="<?=@$item['nick_yahoo']?>" class="input" />
				
			</div>
			<div class="clear"></div>
		</div>
        
        
         <div class="formRow">
			<label>Skype</label>
            
			<div class="formRight">
            
           <input type="text" name="nick_skype"   value="<?=@$item['nick_skype']?>" class="input" />
				
			</div>
			<div class="clear"></div>
		</div>
        
        
        
        
        
         <div class="formRow">
			<label>Giới thiệu bản thân</label>
            
			<div class="formRight">
            
            <textarea cols="60" rows="10" name="gioithieu" id="gioithieu"><?=@$item['gioithieu']?></textarea> 
            
        
				
			</div>
			<div class="clear"></div>
		</div>
        
        
        
           <div class="formRow">
			<label>Loại tài khoản</label>
			<div class="formRight">
        
        <div class="canh_deu">  <input type="radio" name="typeaccount" value="0" <?php if($item['loaitaikhoan']=="0") echo'checked="checked"'; ?>   />Cá nhân</div>
        
        
         <div class="canh_deu"> <input type="radio" name="typeaccount" value="1"    <?php if($item['loaitaikhoan']=="1") echo'checked="checked"'; ?> />Doanh nghiệp </div>
			</div>
			<div class="clear"></div>
		</div>
        
         <div class="formRow">
			<label>Loại Thẻ Cào</label>
            
			<div class="formRight">
            
           <input type="text" name="loaithecao11" disabled="disabled"   value="<?=@$item['loaithecao']?>" class="input" />
				
			</div>
			<div class="clear"></div>
		</div>
        
       <?php /*?> <div class="formRow">
			<label>Ngân hàng</label>
            
			<div class="formRight">
            
           <input type="text" name="nganhang"  value="<?=@$item['nganhang']?>" class="input" />
				
			</div>
			<div class="clear"></div>
		</div><?php */?>
        
        
        <?php /*?> <div class="formRow">
			<label>Số TK</label>
            
			<div class="formRight">
            
           <input type="text" name="sotaikhoan"  value="<?=@$item['sotaikhoan']?>" class="input" />
				
			</div>
			<div class="clear"></div>
		</div><?php */?>
        
        
        
        <div class="formRow">
			<label>Tiền mặt</label>
            
			<div class="formRight">
            
           <input type="text" name="tienmat"   value="<?=@$item['tienmat']?>" class="input" style="width:50%;" />&nbsp; VNĐ
				
			</div>
			<div class="clear"></div>
		</div>
        
        
         <div class="formRow">
			<label>Điêm thưởng</label>
            
			<div class="formRight">
            
           <input type="text" name="diemthuong"   value="<?=@$item['diemthuong']?>" class="input" style="width:50%;" />&nbsp; EP
				
			</div>
			<div class="clear"></div>
		</div>
        
     
        

		     
       
        <div class="formRow">
          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          <div class="formRight">
          
            
            <input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
            <label for="check1">Hiển thị</label>            
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
            </div>
            <div class="clear"></div>
        </div>
		
    
		
	
    <div class="formRow">
			<div class="formRight">
            
            
       
    <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="blueB" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=users&act=man'" class="blueB" />        
            
            
			</div>
			<div class="clear"></div>
		</div>	
		
		
	</div>  
	
</form>



</div><!--end wrapper-->
