<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=info&act=man"><span><?=@$item['ten']?></span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Cập nhật</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}	
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=info&act=save&id=<?=$_REQUEST['id']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
        <?php if($config['debug']==1) { ?>
        <div class="formRow">
			<label>Tiêu đề</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['ten']?>" name="ten" title="Nội dung tiêu đề bài viết" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>	       	               
        <?php } ?>
		<div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            					<input type="file" id="file" name="img" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình đại diện cho sản phẩm (ảnh JPEG, GIF , JPG , PNG)">
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          <div class="formRight">
            <input type="checkbox" name="is_noindex" id="check2" <?=(!isset($item['is_noindex']) || $item['is_noindex']==1)?'checked="checked"':''?> />
            <label for="check2">Noindex, nofollow <img src="./images/question-button.png" alt="Check nếu bạn muốn Google không index sản phẩm này!" class="icon_question tipS" original-title="Check nếu bạn muốn Google không index sản phẩm này!" style="float:right; margin-top:0;" /></label>
                     
          </div>
          <div class="clear"></div>
        </div>       
		<div class="formRow">
			<label>Mô tả ngắn:</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Viết mô tả ngắn sản phẩm" class="tipS validate[required]" name="short" id="short"><?=@$item['mota']?></textarea>
			</div>
			<div class="clear"></div>
		</div>		
		<div class="formRow">
			<label>Nội dung chính: <img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Viết nội dung chính"> </label>
			<div class="formRight"><textarea name="content" rows="8" cols="60"><?=@$item['noidung']?></textarea>
<script type="text/javascript">//<![CDATA[
window.CKEDITOR_BASEPATH='ckeditor/';
//]]></script>
<script type="text/javascript" src="ckeditor/ckeditor.js?t=B5GJ5GG"></script>
<script type="text/javascript">//<![CDATA[
CKEDITOR.replace('content', {"width":890,"height":300,});
//]]></script>
</div>
			<div class="clear"></div>
		</div>
		
	</div>
   
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
			<h6>Nội dung seo</h6>
		</div>
		
		<div class="formRow">
			<label>Title</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['title']?>" name="title" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Từ khóa</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['keywords']?>" name="keyword" title="Từ khóa chính cho sản phẩm" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Description:</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS" name="des"><?=@$item['description']?></textarea>
                <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_char" value="<?=@$item['des_char']?>" /> ký tự <b>(Tốt nhất là 160 ký tự)</b>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="id_cat" id="id_this_product" value="<?=@$item['id_cat']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>   