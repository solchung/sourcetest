

<div class="wrapper">
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=product&act=man_rating"><span>Đánh giá</span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    
    
</div><!--end control_frm-->



<form name="supplier" id="validate" class="form" action="index.php?com=product&act=save_rating&curPage=<?=$_REQUEST['curPage']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>		
        

		<div class="formRow">
			<label>Họ tên </label>
			<div class="formRight">
				<input type="text" value="<?=@$item['ten']?>" name="ten" title="Nội dung tiêu đề  bài viết" class="tipS" />
			</div><!--end formRight-->
            
			<div class="clear"></div>           
		</div><!--end formRow-->
		
		
		<div class="formRow">
			<label>Email </label>
			<div class="formRight">
				<input type="text" value="<?=@$item['email']?>" name="email" title="Nội dung tiêu đề  bài viết" class="tipS" />
			</div><!--end formRight-->
            
			<div class="clear"></div>           
		</div><!--end formRow-->
		
		
	
		
		<div class="formRow">
			<label>Tiêu đề </label>
			<div class="formRight">
				<input type="text" value="<?=@$item['tieude']?>" name="tieude" title="Nội dung tiêu đề  bài viết" class="tipS" />
			</div><!--end formRight-->
            
			<div class="clear"></div>           
		</div><!--end formRow-->
		
		
		
			
		<div class="formRow">
			<label>Nội Dung </label>
			<div class="formRight">
			
			<textarea rows="8" cols=""   name="noidung" id="noidung"><?=@$item['noidung']?></textarea>
				
			</div><!--end formRight-->
            
			<div class="clear"></div>           
		</div><!--end formRow-->
        
        
		
        <div class="formRow">
          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          <div class="formRight">
           
            <input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
            <label for="check1">Hiển thị</label>            
          </div>
          <div class="clear"></div>
        </div>
       

	
		
		
	</div>  
	<div class="widget">

		<div class="formRow">
			<div class="formRight">
            
            <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
			<input type="hidden" name="id_product" id="id_product" value="<?=@$_GET['id_product']?>" />
	<input type="hidden" name="referer_link" id="id" value="index.php?com=product&act=man_rating&id_product=<?=$_GET['id_product']?>&curPage=<?=$_REQUEST['curPage']?>" />
	<input type="submit" value="Lưu" class="blueB" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_rating&id_product=<?=$_GET['id_product']?>&curPage=<?=$_REQUEST['curPage']?>'" class="blueB" />
            
            

			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>

</div><!--end wrapper-->
