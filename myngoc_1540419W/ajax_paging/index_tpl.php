<script language="javascript">
function addtocart(pid){
document.form_giohang.productid.value=pid;
document.form_giohang.command.value='add';
document.form_giohang.submit();
}
</script>
<form name="form_giohang" action="index.php" method="post">
  <input type="hidden" name="productid" />
  <input type="hidden" name="command" />
</form>
<link rel="stylesheet" type="text/css" href="ajax_paging/ajax.css"/>
<div id="info">
  <div id="sanpham">
    <?php for ($i=0; $i < count($product_list); $i++) { ?>
    <div class="khung">
      <div class="thanh_title"><h2><?=$product_list[$i]['ten_'.$lang]?></h2>  </div>
      <div class="info_tt_sp"><?=$product_list[$i]['mota_'.$lang]?></div>
      <div class="sp_right">
        <div class="hidden_tab"  id="sspnnew<?=$product_list[$i]['id']?>" rel="<?=$product_list[$i]['id']?>" title="<?=$product_list[$i]['id']?>">
          <div class="clear"></div>
          <div class="pagination"></div>
          <script>
          $().ready(function(){
          loadData(1,"#sspnnew<?=$product_list[$i]['id']?>");
          });
          </script>
        </div>
        
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>
<script>
//alert(result);
// PHƯƠNG THỨC LOAD KẾT QUẢ
function loadData(page,id_tab){
$.ajax
({
url: "ajax_paging/ajax_paging.php",
type: "POST",
data: {page:page,dieukien:$(id_tab).attr("rel")},
success: function(msg)
{
$(id_tab).html(msg);
$(id_tab+" .pagination li.active").click(function(){
var pager = $(this).attr("p");
var id_tabr = $(this).parents('.hidden_tab').attr("id");
var id_danhmucr = $(this).parents('.hidden_tab').attr("title");
loadData(pager,"#"+id_tabr);
});
}
});
}
</script>