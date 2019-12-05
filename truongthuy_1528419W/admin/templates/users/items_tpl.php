<script type="text/javascript">

	$(document).ready(function() {
							   
	$("#chonhet").click(function(){
		var status=this.checked;
		$("input[name='chon']").each(function(){this.checked=status;})
	});
	
	$("#send").click(function(){
		var listid="";
		$("input[name='chon']").each(function(){
			if (this.checked) listid = listid+","+this.value;
			})
		listid=listid.substr(1);	 //alert(listid);
		if (listid=="") { alert("Bạn chưa chọn email nào"); return false;}
		hoi= confirm("Xác nhận muốn gửi thư đi?");
		if (hoi==true){ document.frm.listid.value=listid; document.frm.submit();}
	});
	});
	
	
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá mục này?'))
		{
			location.href = l;	
		}
	}	
	
	function ChangeAction(str){
		if(confirm("Bạn có chắc chắn?"))
		{
			document.frm.action = str;
			document.frm.submit();
		}
	}	
	
</script>
<script type="text/javascript">
function doEnter(evt){
	// IE					// Netscape/Firefox/Opera
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch(evt);
	}
}
function onSearch(evt)
{	
		var keyword = document.getElementById("keyword").value;	
		location.href = "index.php?com=users&act=man&keyword="+keyword
		loadPage(document.location);
			
}


function select_onchange_member()
	{
		var a=document.getElementById("active_user");
		window.location ="index.php?com=users&act=man&active_user="+a.value+"&curPage=<?=$_REQUEST['curPage']?>";	
		return true;
	}


</script>

<?php
function get_main_list()
	{
		$sql="select hoten,id from table_user";
		$stmt=mysql_query($sql);
		$str='
			<select id="active_user" name="active_user" onchange="select_onchange()" class="main_font">
			<option value="">---Chọn danh mục---</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$_REQUEST['active_user'])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}


?>


<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=users&act=man"><span>Quản lý thành viên</span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>


<form name="frm" id="f" action="index.php?com=users&act=send"  method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=users&act=add'" />
    <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('index.php?com=users&act=man&multi=show');return false;" />
     <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('index.php?com=users&act=man&multi=hide');return false;" />
        <input type="button" class="blueB" value="Xoá" id="xoahet" onclick="ChangeAction('index.php?com=users&act=man&multi=del');return false;"  />
        

        
    </div> 
     
     
     <div style="float:right;">
        <div class="selector">
        
        
        
<select name="active_user" id="active_user" onchange="select_onchange_member()">
<option value="" <?php if ($_GET["active_user"]=="") {?> selected="selected" <?php }?>>Tất cả</option>
<option value="0" <?php if ($_GET["active_user"]=="0") {?> selected="selected" <?php }?>>Chưa kích hoạt</option>
<option value="1" <?php if ($_GET["active_user"]=="1") {?> selected="selected" <?php }?> >Đã kích hoạt</option>
</select>
        
Tìm kiếm: <input name="keyword" id="keyword" type="text" value="<?=@$_REQUEST['keyword']?>" /> 


        


<input type="button" value=" Tìm "  onclick="onSearch(event)"/>


			

        </div>  
    </div>
     
  	
</div>



<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox"  name="chonhet" id="chonhet"  />
    </span>
    <h6>Danh sách  hiện có</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>
        <td class="sortCol"><div>Họ Tên<span></span></div></td>
     
         <td style="width:15%;">Email</td>
         
         <td width="100">Lần đăng nhập cuối</td>
        <td width="100">Đăng nhập bằng</td>
         
           <td style="width:15%;">Điện thoại</td>
           
           
         
        <td class="tb_data_small">Kích hoạt</td>
        <td width="200">Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="10">
        <div class="pagination">
       <?=$paging['paging']?>
            
        </div></td>
      </tr>
    </tfoot>
    
    
    <tbody>
         <?php for($i=0, $count=count($items); $i<$count; $i++){?>
          <tr>
       <td>
            <input type="checkbox" name="chon[]" id="chon" value="<?=$items[$i]['id']?>" class="chonxoa" />
        </td>
        <td align="center">
            <input type="text" value="<?=$items[$i]['stt']?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText" original-title="Nhập số thứ tự sản phẩm" id="number<?=$items[$i]['id']?>" onchange="return updateNumber('user', '<?=$items[$i]['id']?>')" />
            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$items[$i]['id']?>" src="images/loader.gif" alt="loader" /></div>
        </td> 
        
      
        <td class="title_name_data">
         <a href="index.php?com=users&act=edit&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['hoten']?></a>
        </td>
        
        
        
        <td>
         <a href="index.php?com=users&act=edit&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['email']?></a>
        </td>

	 <td align="center">
          <?=date("h:i:s - d/m/Y",$items[$i]['lastlogin'])?>
        </td>
       
       
       <td align="center">
          <?php if($items[$i]['oauth_provider']=='facebook'){?>
          <a href="http://facebook.com/<?=$items[$i]['oauth_uid']?>" class="lg_facebook" target="_blank"><i class="fa fa-facebook-square"></i> Facebook</a>
          <?php }elseif($items[$i]['oauth_provider']=='google'){?>
          <a href="http://plus.google.com/<?=$items[$i]['oauth_uid']?>" class="lg_google" target="_blank"><i class="fa fa-google-plus"></i> Google</a>
          <?php }else{?>
          <a href="index.php?com=users&act=edit&id=<?=$items[$i]['id']?>" class="" ><i class="fa fa-user-plus"></i>Đăng Ký Web</a>
          <?php }?>
        </td>
		
		
          <td>
         <a href="index.php?com=users&act=edit&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['dienthoai']?></a>
        </td>
        
        
        
            
       
        <td align="center">
           <?php 
			if(@$items[$i]['hienthi']==1)
				{
		?>
            <a href="index.php?com=users&act=man&hienthi=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Click để ẩn"><img src="./images/icons/color/tick.png" alt=""></a>
            <?php } else { ?>
         <a href="index.php?com=users&act=man&hienthi=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Click để hiện"><img src="./images/icons/color/hide.png" alt=""></a>
         <?php } ?>
        </td>
        
        <td class="actBtns">
      <a href="index.php?com=users&act=edit&id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Sửa"><img src="./images/icons/dark/pencil.png" alt=""></a>
            <a href="index.php?com=users&act=delete&id=<?=$items[$i]['id']?>" onclick="CheckDelete('index.php?com=users&act=delete&id=<?=$items[$i]['id']?>'); return false;" title="" class="smallButton tipS" original-title="Xóa"><img src="./images/icons/dark/close.png" alt=""></a>        </td>
      </tr>
         <?php } ?>
                </tbody>
    
    
    
  </table>
</div>
</form>





<script type="text/javascript">		
	function TreeFilterChanged_other(){		
				$('#validate').submit();		
	}	
</script>

  <?php
				$sql_danhmuc="select * from table_info where com='users' ";
				$result=mysql_query($sql_danhmuc);
				$about_users =mysql_fetch_array($result);
				
			?>      
<form name="supplier" id="validate" class="form" action="index.php?com=users&act=save_info" method="post" enctype="multipart/form-data">

<div class="widget">

 <div class="formRow">
			<label>Mô tả VI:</label>
               <div class="clear"></div>
			<div class="formRight-full">
				<textarea rows="8" cols="" title="Viết mô tả ngắn sản phẩm" class="tipS validate[required]" name="mota_vi" id="short"><?=@$about_users['mota_vi']?></textarea>
                
                
                
                <script type="text/javascript">//<![CDATA[
            window.CKEDITOR_BASEPATH='ckeditor/';
            //]]></script>
            <script type="text/javascript" src="ckeditor/ckeditor.js?t=B5GJ5GG"></script>
            <script type="text/javascript">//<![CDATA[
            CKEDITOR.replace('mota_vi', {"width":900,"height":300,});
            //]]></script>
                
			</div>
			<div class="clear"></div>
		</div><!--end formRow-->
        
        
        <div class="formRow">
			<div class="formRight">
                <input type="hidden" name="id_cat" id="id_this_product" value="<?=@$item_type['id']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged_other(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>

	</div>

</form>



