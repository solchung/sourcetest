<?php 
	$d->reset();
		$sql="select * from #_news where hienthi=1 and com='container' and id='".$item['id_con']."' order by stt,ngaytao desc";
		$d->query($sql);
		$container_in=$d->fetch_array();
		
		$d->reset();
		$sql="select * from #_news where hienthi=1 and com='chatlieu' and id='".$item['id_chatlieu']."'  order by stt,ngaytao desc";
		$d->query($sql);
		$chatlieu_in=$d->fetch_array();
		
		$d->reset();
		$sql="select * from #_news where hienthi=1 and com='trangbi' and id='".$item['id_trangbi']."' order by stt,ngaytao desc";
		$d->query($sql);
		$trangbi_in=$d->fetch_array();
		
		$d->reset();
		$sql="select * from #_news where hienthi=1 and com='noithat' and id='".$item['id_noithata']."'  order by stt,ngaytao desc";
		$d->query($sql);
		$noithat1_in=$d->fetch_array();
		$d->reset();
		$sql="select * from #_news where hienthi=1 and com='noithat' and id='".$item['id_noithatb']."'  order by stt,ngaytao desc";
		$d->query($sql);
		$noithat2_in=$d->fetch_array();
		$d->reset();
		$sql="select * from #_news where hienthi=1 and com='noithat' and id='".$item['id_noithatc']."'  order by stt,ngaytao desc";
		$d->query($sql);
		$noithat3_in=$d->fetch_array();
		
		$d->reset();
		$sql="select * from #_news where hienthi=1 and com='thietke' and id='".$item['id_thietke']."'  order by stt,ngaytao desc";
		$d->query($sql);
		$thietke_in=$d->fetch_array();
		$tong=$item["tong"];
		$vat=$tong*10/100;
		$tong_vat=$tong+$vat;
	
?>
<div class="wrapper">
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=dutinh&act=man"><span>Xem dutinh</span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    
    
</div><!--end control_frm-->



<form name="supplier" id="validate" class="form" action="index.php?com=dutinh&act=save" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>		


		 
		
        
        <div class="formRow">
			<label>Họ và Tên</label>
			<div class="formRight">
                <input type="text" name="hoten" title="Nhập họ tên" id="name" class="tipS validate[required]" value="<?=@$item['hoten']?>" />
			</div>
			<div class="clear"></div>
		</div>
        
        
          <div class="formRow">
			<label>Email</label>
			<div class="formRight">
            <input type="text" name="email" title="Email" id="name" class="tipS validate[required]" value="<?=@$item['email']?>" />
			</div>
			<div class="clear"></div>
		</div>
        
        
          <div class="formRow">
			<label>Điện thoại</label>
            
			<div class="formRight">
				<input type="text" value="<?=@$item['dienthoai']?>" name="dienthoai" title="Điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Loại container</label>
            
			<div class="formRight">
				<input type="text" value="<?=$container_in["ten_vi"]?>" name="dienthoai" title="Điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Chất liệu</label>
            
			<div class="formRight">
				<input type="text" value="<?=$chatlieu_in["ten_vi"]?>" name="dienthoai" title="Điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
			<label>Trang bị hệ thống</label>
            
			<div class="formRight">
				<input type="text" value="<?=$trangbi_in["ten_vi"]?>" name="dienthoai" title="Điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
      
        <div class="formRow">
			<label>Nội thất</label>
            
			<div class="formRight">
				Tường:<input type="text" value="<?=$noithat1_in["ten_vi"]?>" name="dienthoai" title="Điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
			<div class="formRight">
				Trần:<input type="text" value="<?=$noithat2_in["ten_vi"]?>" name="dienthoai" title="Điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
			<div class="formRight">
				Sàn:<input type="text" value="<?=$noithat3_in["ten_vi"]?>" name="dienthoai" title="Điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        
        <div class="formRow">
			<label>Thiết kế nội thất</label>
            
			<div class="formRight">
				<input type="text" value="<?=$thietke_in["ten_vi"]?>" name="dienthoai" title="Điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
          
        <div class="formRow">
			<label>Tổng chi phí</label>
            
			<div class="formRight">
				<input type="text" value="<?= number_format($tong, 0, ",", ".").' VNĐ'; ?>" name="dienthoai" title="Điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
			<label>Tổng Tiền (VAT 10%)</label>
            
			<div class="formRight">
				<input type="text" value="<?= number_format($tong_vat, 0, ",", ".").' VNĐ'; ?>" name="dienthoai" title="Điện thoại" class="tipS" />
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
	<input type="hidden" value="Lưu" class="blueB" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=dutinh&act=man'" class="blueB" />
            
            
			</div>
			<div class="clear"></div>
		</div>	
		
		
	</div>  
	
</form>



</div><!--end wrapper-->