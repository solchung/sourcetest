

<?php
	
	$d->reset();
	$sql = "select * from #_product_list where com='product'";
	$d->query($sql);
	$list = $d->result_array();
?>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
	            <li><a href="index.php?com=thongke&act=luotxem_cap1"><span>Lượt xem danh mục sản phẩm</span></a></li>
              <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>


<div class="widget">
  <div class="titlee" style="padding-bottom:5px;">

     <div class="timkiem" >
        <form name="search" action="index.php" method="GET" class="form giohang_ser">
      <input name="com" value="thongke" type="hidden"  />
      <input name="act" value="luotxem_cap1" type="hidden" />
      <input name="p" value="<?=($_GET['p']=='')?'1':$_GET['p']?>" type="hidden" />
      


     <!-- <input type="submit" class="blueB" value="Tìm kiếm" style="width:100px; margin:0px 0px 0px 10px;"  />-->
    </form>
    </div><!--end tim kiem-->
  </div>
</div>

<form name="f" id="f" method="post">


<div class="widget">
  <div class="title"><span class="titleIcon">
   <!-- <input type="checkbox" id="titleCheck" name="titleCheck" />-->
    </span>
    <h6>Danh sách </h6>
    <a style="float: right;
    line-height: 3;
    padding-right: 10px;" href="index.php?com=thongke&act=reset_luotxem" title="reset">Reset lượt xem</a>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        
<!--       <td class="sortCol" width="120"><div>Mã sản phẩm<span></span></div></td>     -->
        <td class="sortCol"><div>Tên danh mục<span></span></div></td>
        <td class="sortCol" width="150"><div>Lượt xem<span></span></div></td>
       
      </tr>
    </thead>
<!--    <tfoot>
      <tr>
        <td colspan="10"><div class="pagination">  <?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?>     </div></td>
      </tr>
    </tfoot>-->
    <tbody>
         <?php for($i=0, $count=count($list); $i<$count; $i++){
             
             ?>
          <tr>
     <!--  <td>
            <input type="checkbox" name="iddel[]" value="<?=$list[$i]['id']?>" id="check<?=$i?>" />
        </td>-->
        
        <td>
               <?=$list[$i]['ten_vi']?>
                </td>
                <td align="center">
               <?php 
                $sql = "select sum(luotxem) as luotxemc from #_product where id_list = ".$list[$i]['id']."   group by id_list order by id desc ";		
                $d->query($sql);
                $items = $d->fetch_array();
                echo $items['luotxemc'];
               ?>
        </td>
      
    
       
        
       
      
      </tr>
         <?php } ?>
                </tbody>
  </table>
</div>
</form>               


<script type="text/javascript">
function onSearch(evt) {	
		var datefm = document.getElementById("datefm").value;	
		var dateto = document.getElementById("dateto").value;
		var status = document.getElementById("id_tinhtrang").value;		
		//var encoded = Base64.encode(keyword);
		location.href = "index.php?com=thongke&act=luotxem&datefm="+datefm+"&dateto="+dateto+"&status="+status;
		loadPage(document.location);
			
}
$(document).ready(function(){						
	var dates = $( "#datefm, #dateto" ).datepicker({
			defaultDate: "+1w",
			dateFormat: 'dd/mm/yy',
			changeMonth: true,			
			numberOfMonths: 3,
			onSelect: function( selectedDate ) {
				var option = this.id == "datefm" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
        
		});
		
</script>