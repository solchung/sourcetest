<script>





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

</script>

<?php
	
	$sql="select ten_vi from table_product where id=".$_GET['id_product'];
	$result=mysql_query($sql);
	$product = mysql_fetch_array($result);
	$ten_rating = $product['ten_vi'];
	$title = '<a href="index.php?com=product&act=man_rating">'.$product['ten_vi'].'</a>';
?>


<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><?=$title?></li>
                                    <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>


<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=product&act=add_rating&id_product=<?=$_GET['id_product']?>'" />
        <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('index.php?com=product&act=man_rating&id_product=<?=$_GET['id_product']?>&multi=show');return false;" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('index.php?com=product&act=man_rating&id_product=<?=$_GET['id_product']?>&multi=hide');return false;" /> 
        <input type="button" class="blueB" value="Xoá" id="xoahet" onclick="ChangeAction('index.php?com=product&act=man_rating&id_product=<?=$_GET['id_product']?>&multi=del');return false;"  />
        

        
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
    <h6>Danh sách các review hiện có</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
         <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">ID</a></td> 
        <td style="width:20%;">Họ tên/Email</td>
      
        <td style="width:20%;">Nội Dung</td>
        <td style="width:20%;" ><div>Sản phẩm<span></span></div></td>
		<td style="width:20%;" ><div>Điện thoại<span></span></div></td>
         <td class="tb_data_small"><div>Star<span></span></div></td>
         <td class="tb_data_small" ><div>Ngày gửi<span></span></div></td> 
		  <td style="width:10%;">Hiện thị</td>
        <td style="width:10%;">Thao tác</td>
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
         <?php 
         for($i=0, $count=count($items); $i<$count; $i++){?>
          <tr>
       <td>
            <input type="checkbox" name="chon[]" id="chon" value="<?=$items[$i]['id']?>" class="chon" />
        </td>

        
        <td align="center" >
       		<?=$items[$i]['id']?>
        </td> 
        
        
       
        
      
        <td class="title_name_data">
            <?=$items[$i]['ten']?>/<?=$items[$i]['email']?>
        </td>
		
		  <td>
          <?=$items[$i]['noidung']?>
        </td>
        
		<td align="center">
            <?=$ten_rating?>
        </td>
		
		<td align="center">
          <?=$items[$i]['dienthoai']?>
        </td>
        
         <td align="center">
            <?=$items[$i]['rating']?>
        </td>
		
		 <td align="center">
          <?=date('d-m-Y',$items[$i]['ngaytao']);?>
        </td>
        
       

          
        
       
         <td align="center">
           <?php 
			if(@$items[$i]['hienthi']==1)
				{
		?>
            <a href="index.php?com=product&act=man_rating&hienthi=<?=$items[$i]['id']?>&id_product=<?=$items[$i]['id_product']?>" title="" class="smallButton tipS" original-title="Click để ẩn"><img src="./images/icons/color/tick.png" alt=""></a>
            <?php } else { ?>
         <a href="index.php?com=product&act=man_rating&hienthi=<?=$items[$i]['id']?>&id_product=<?=$items[$i]['id_product']?>" title="" class="smallButton tipS" original-title="Click để hiện"><img src="./images/icons/color/hide.png" alt=""></a>
         <?php } ?>
        </td> 
        
        <td class="actBtns">
             <a href="index.php?com=product&act=edit_rating&id=<?=$items[$i]['id']?>&id_product=<?=$items[$i]['id_product']?>" title="" class="smallButton tipS" original-title="Sửa"><img src="./images/icons/dark/pencil.png" alt=""></a> 
            <a href="index.php?com=product&act=delete_rating&id=<?=$items[$i]['id']?>&id_product=<?=$items[$i]['id_product']?>" onclick="CheckDelete('index.php?com=product&act=delete_rating&id=<?=$items[$i]['id']?>&id_product=<?=$items[$i]['id_product']?>'); return false;" title="" class="smallButton tipS" original-title="Xóa"><img src="./images/icons/dark/close.png" alt=""></a>        </td>
      </tr>
         <?php } ?>
    </tbody>
    
    
    
  </table>
</div>
</form>