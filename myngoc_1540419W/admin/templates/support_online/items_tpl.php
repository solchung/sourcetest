<script language="javascript">
  function CheckDelete(l){
    if(confirm('Bạn có chắc muốn xoá mục này?'))
    {
      location.href = l;  
    }
  } 
  function ChangeAction(str){
    if(confirm("Bạn có chắc chắn?"))
    {
      document.f.action = str;
      document.f.submit();
    }
  }   



function doEnter(evt){
  // IE         // Netscape/Firefox/Opera
  var key;
  if(evt.keyCode == 13 || evt.which == 13){
    onSearch(evt);
  }
}
function onSearch(evt) {  
    var keyword = document.getElementById("keyword").value;   
    //var encoded = Base64.encode(keyword);
    location.href = "index.php?com=support_online&act=man&keyword="+keyword+"&typechild=<?=@$_GET['typechild']?>&curPage=<?=$_REQUEST['curPage']?>";
    loadPage(document.location);
      
}

  
</script>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	 
           <li><a href="index.php?com=support_online&act=man&typechild=<?=@$_GET['typechild']?>"><span>Hỗ trợ trực tuyến</span></a></li>
           <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>

        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=support_online&act=add&typechild=<?=@$_GET['typechild']?>'" />
        <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('index.php?com=support_online&act=man&typechild=<?=@$_GET['typechild']?>&multi=show');return false;" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('index.php?com=support_online&act=man&typechild=<?=@$_GET['typechild']?>&multi=hide');return false;" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('index.php?com=support_online&act=man&typechild=<?=@$_GET['typechild']?>&multi=del');return false;" />
    </div>  



     <div style="float:right;">
        <div class="selector">
Tìm kiếm: <input name="keyword" id="keyword" type="text" value="<?=@$_REQUEST['keyword']?>" /> <input type="button" value=" Tìm "  onclick="onSearch(event)"/>
        </div>  
    </div>

</div>



<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Danh sách nick hỗ trợ hiện có</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>
        <td width="200"><div>Tên<span></span></div></td>
        <td style="display:none" class="sortCol"><div>Yahoo<span></span></div></td>
         <td style="display:none" class="sortCol"><div>Skype<span></span></div></td>
         <td class="sortCol"><div>Điện thoại<span></span></div></td>
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td width="200">Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="10">
        <div class="pagination">
            <?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?>            
        </div></td>
      </tr>
    </tfoot>
    <tbody>
          <?php for($i=0, $count=count($items); $i<$count; $i++){?>
          <tr>
        <td>
            <input type="checkbox" name="iddel[]" value="<?=$items[$i]['id']?>" id="check<?=$i?>" />
        </td>
        <td align="center">
            <input type="text" value="<?=$items[$i]['stt']?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText" original-title="Nhập số thứ tự danh mục" id="number<?=$items[$i]['id']?>" onchange="return updateNumber('support_online', '<?=$items[$i]['id']?>')" />
            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$items[$i]['id']?>" src="images/loader.gif" alt="loader" /></div>
        </td>       
        <td class="title_name_data">
            <a href="index.php?com=support_online&act=edit&typechild=<?=@$_GET['typechild']?>&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['ten_vi']?></a>
        </td>

         <td style="display:none">
            <a href="index.php?com=support_online&act=edit&typechild=<?=@$_GET['typechild']?>&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['yahoo']?></a>
        </td>

        <td style="display:none">
            <a href="index.php?com=support_online&act=edit&typechild=<?=@$_GET['typechild']?>&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['skype']?></a>
        </td>
        
         <td >
            <a href="index.php?com=support_online&act=edit&typechild=<?=@$_GET['typechild']?>&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['dienthoai']?></a>
        </td>
        
        <td align="center">
           <?php 
			if(@$items[$i]['hienthi']==1)
				{
		?>
            <a href="index.php?com=support_online&act=man&typechild=<?=@$_GET['typechild']?>&hienthi=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Click để ẩn"><img src="./images/icons/color/tick.png" alt=""></a>
            <?php } else { ?>
         <a href="index.php?com=support_online&act=man&typechild=<?=@$_GET['typechild']?>&hienthi=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Click để hiện"><img src="./images/icons/color/hide.png" alt=""></a>
         <?php } ?>
         
        </td>
        
        <td class="actBtns">
            <a href="index.php?com=support_online&act=edit&typechild=<?=@$_GET['typechild']?>&id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Sửa danh mục"><img src="./images/icons/dark/pencil.png" alt=""></a>
            <a href="index.php?com=support_online&act=delete&typechild=<?=@$_GET['typechild']?>&id=<?=$items[$i]['id']?>" onclick="CheckDelete('index.php?com=support_online&act=delete&typechild=<?=@$_GET['typechild']?>&id=<?=$items[$i]['id']?>'); return false;" title="" class="smallButton tipS" original-title="Xóa danh mục"><img src="./images/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
           <?php } ?> 
                </tbody>
  </table>
</div>
</form>               