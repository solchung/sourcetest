<?php
$d->reset();
$sql = "select banner_vi from #_banner where com='banner_top'";
$d->query($sql);
$logo = $d->fetch_array();
?>


<div class="logo"> <a href="../" target="_blank" > <img src="<?= _upload_hinhanh . $logo["banner_vi"] ?>" style="width:100%;"  alt="" /> </a></div>
<div class="sidebarSep mt0"></div>
<!-- Left navigation -->
<ul id="menu" class="nav">
    <li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>
	
	<li class="categories_li<?php if ($_GET['com'] == 'product' && ($_GET['typeparent'] == 'product' || $_GET['typechild'] == 'product')) echo ' activemenu' ?>" id="menu_danhmucproduct"><a href="" title="" class="exp"><span>Danh Mục sản phẩm</span><strong></strong></a>
        <ul class="sub">
    				
			<li <?php if ($_GET['typeparent'] == 'product') echo ' class="this"' ?> ><a href="index.php?com=product&act=man_list&typeparent=product">Danh mục cấp 1</a></li>
			<li <?php if ($_GET['typeparent'] == 'product') echo ' class="this"' ?> ><a href="index.php?com=product&act=man_cat&typeparent=product">Danh mục cấp 2</a></li>
		
            <li <?php if ($_GET['typechild'] == 'product') echo ' class="this"' ?> ><a href="index.php?com=product&act=man&typechild=product">Sản phẩm</a></li>
		
        </ul>
    </li>

	

	

	
    <li class="article_li<?php if ( $_GET['com'] == 'news' && ( $_GET['typechild'] == 'khachhang' || $_GET['typechild'] == 'tailieu'|| $_GET['typechild'] == 'chinhsach'|| $_GET['typechild'] == 'news' || $_GET['typechild'] == 'dichvu')) echo ' activemenu' ?>" id="menu_baiviet"><a href="#" title="" class="exp"><span>Danh Mục Bài Viết </span><strong></strong></a>
        <ul class="sub">
			<li <?php if ($_GET['typechild'] == 'gioithieu') echo ' class="this"' ?> ><a href="index.php?com=news&act=man&typechild=gioithieu">Bài viết giới thiệu</a></li>
			
			<li <?php if ($_GET['typechild'] == 'news') echo ' class="this"' ?> ><a href="index.php?com=news&act=man&typechild=news">Tin tức</a></li>
			
			<li <?php if ($_GET['typechild'] == 'tailieu') echo ' class="this"' ?> ><a href="index.php?com=news&act=man&typechild=tailieu">Hạt điều nguyên liệu</a></li>
			
		
			<li <?php if ($_GET['typechild'] == 'video') echo ' class="this"' ?> ><a href="index.php?com=video&act=man&typechild=video">Video</a></li>
		
		
			<li <?php if ($_GET['typechild'] == 'solieu') echo ' class="this"' ?> ><a href="index.php?com=news&act=man&typechild=solieu">Số liệu</a></li>
	
        </ul>

    </li>
	



    <li class="hide_tinhtrang template_li" id="menu_trangtinhtk"><a href="#" title="" class="exp"><span>Thống kê lượt xem</span><strong></strong></a>
        <ul class="sub">
            <li><a href="index.php?com=thongke&act=luotxem_cap1">Thống kê lượt xem danh mục 1</a></li>
            <li><a href="index.php?com=thongke&act=luotxem_cap2">Thống kê lượt xem danh mục 2</a></li>
            <li><a href="index.php?com=thongke&act=luotxem">Thống kê lượt xem sản phẩm</a></li>
        </ul>
    </li>


    <li class="gallery_li<?php if ( $_GET["typechild"] == "banner_top" || $_GET["typechild"] == "banner_giua" || $_GET["typechild"] == "banner_phai" || $_GET["typechild"] == "slider" || $_GET["typechild"] == "doitac" || $_GET["typechild"] == "mangxahoi" || $_GET["typechild"] == "mangxahoift") echo ' activemenu' ?>" id="menu6"><a href="#" title="" class="exp"><span>Hình Ảnh</span><strong></strong></a>
        <ul class="sub">
		<?/**
           <li <?php if ($_GET['typechild'] == 'bg_header') echo ' class="this"' ?>><a href="index.php?com=background&act=capnhat&typechild=bg_header">Background thông kê </a></li>
		   <li <?php if ($_GET['typechild'] == 'bg_footer') echo ' class="this"' ?>><a href="index.php?com=background&act=capnhat&typechild=bg_footer">Banner mobile</a></li>
           <li <?php if ($_GET['act'] == 'capnhat' && $_GET["com"] == "banner") echo ' class="this"' ?>><a href="index.php?com=banner&act=capnhat&typechild=banner_giua">Cập nhật banner</a></li>
			<li <?php if ($_GET['act'] == 'capnhat' && $_GET["com"] == "banner") echo ' class="this"' ?>><a href="index.php?com=banner&act=capnhat&typechild=banner_phai">Cập nhật banner mobile</a></li>
		**/?>
		  
            <li <?php if ($_GET['act'] == 'capnhat' && $_GET["com"] == "banner") echo ' class="this"' ?>><a href="index.php?com=banner&act=capnhat&typechild=banner_top">Cập nhật Logo Top</a></li>
			
			
            <li <?php if ($_GET['typechild'] == 'slider') echo ' class="this"' ?>><a href="index.php?com=image_url&act=man_photo&typechild=slider">Slide Show</a></li>
		
					
			<li <?php if ($_GET['typechild'] == 'mangxahoift') echo ' class="this"' ?>><a href="index.php?com=image_url&act=man_photo&typechild=mangxahoift">Mạng xã hội footer </a></li>
			<?/**
			
			**/?>
        </ul>
    </li>
	
	
	
	<li class="template_li<?php if ( $_GET['com'] == 'info' ) echo ' activemenu' ?>" id="menu_trangtinh"><a href="#" title="" class="exp"><span>Trang tĩnh</span><strong></strong></a>
        <ul class="sub">
          
			<li <?php if ($_GET['typechild'] == 'gioithieu') echo ' class="this"' ?> ><a href="index.php?com=info&act=capnhat&typechild=gioithieu">Giới thiệu</a></li>
			<li <?php if ($_GET['typechild'] == 'product') echo ' class="this"' ?> ><a href="index.php?com=info&act=capnhat&typechild=product">Sản phẩm</a></li> 
			

			<li <?php if ($_GET['typechild'] == 'news') echo ' class="this"' ?> ><a href="index.php?com=info&act=capnhat&typechild=news">Tin tức</a></li> 	
			<li <?php if ($_GET['typechild'] == 'tailieu') echo ' class="this"' ?> ><a href="index.php?com=info&act=capnhat&typechild=tailieu">Hạt điều nguyên liệu</a></li> 
			
            <li <?php if ($_GET['typechild'] == 'lienhe') echo ' class="this"' ?> ><a href="index.php?com=info&act=capnhat&typechild=lienhe">Liên hệ</a></li> 
			<li <?php if ($_GET['typechild'] == 'footer') echo ' class="this"' ?> ><a href="index.php?com=info&act=capnhat&typechild=footer">Footer</a></li> 
			
		
		
			
        </ul>
    </li>


    <li class="setting_li<?php if ($_GET['com'] == 'setting' || $_GET['com'] == 'database' || $_GET['com'] == 'backup' || $_GET['com'] == 'user' || $_GET['com'] == 'newsletter') echo ' activemenu' ?>" id="menu8"><a href="#" title="" class="exp"><span>Cấu hình website</span><strong></strong></a>

        <ul class="sub">
			<?/**			
				<li <?php if ($_GET['com'] == 'bct') echo ' class="this"' ?>><a href="index.php?com=image_url&act=man_photo&typechild=bct">Hình bộ công thương</a></li>
				
				<li <?php if ($_GET['typechild'] == 'bando') echo ' class="this"' ?> ><a href="index.php?com=bando&act=man&typechild=bando">Bản đồ</a></li> 	
			**/?>
			<li <?php if ($_GET['com'] == 'newsletter') echo ' class="this"' ?>><a href="index.php?com=newsletter&act=man" title="">Đăng ký nhận tin</a></li>	
		
            <li <?php if ($_GET['com'] == 'setting') echo ' class="this"' ?>><a href="index.php?com=setting&act=capnhat" title="">Cấu hình chung</a></li>
			
			
			
            <li <?php if ($_GET['com'] == 'user' && $_GET['act'] == 'admin_edit') echo ' class="this"' ?>><a href="index.php?com=user&act=admin_edit">Thông tin Tài khoản</a></li>
        </ul>
    </li>
</ul>